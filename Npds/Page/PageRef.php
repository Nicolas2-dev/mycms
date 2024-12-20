<?php

declare(strict_types=1);

namespace Npds\Page;

use Npds\Language\Language;


/**
 * Undocumented class
 */
class PageRef
{

    /**
     * Instance PageRef.
     *
     * @var \Npds\Page\PageRef $instance
     */
    protected static PageRef $instance;

    /**
     * Instance Language.
     *
     * @var  Npds\Language\Language
     */
    protected Language $language;

    /**
     * [$pages description]
     *
     * @var [type]
     */
    protected array $pages = [];

    /**
     * [$page_uri description]
     *
     * @var [type]
     */
    protected array $page_uri = [];

    /**
     * [$pages_ref description]
     *
     * @var [type]
     */
    protected string $pages_ref;

    /**
     * [$css_pages_ref description]
     *
     * @var [type]
     */
    protected $css_pages_ref;

    /**
     * [$js_pages_ref description]
     *
     * @var [type]
     */
    protected $js_pages_ref;


    /**
     * Constructeur.
     */
    public function __construct()
    {
        $this->language = Language::getInstance();

        $this->loadPages();
    }

    /**
     * [loadPages description]
     *
     * @return  [type]  [return description]
     */
    private function loadPages()
    {
        // LOAD pages.php and Go ...
        settype($PAGES, 'array');

        global $PAGES, $tmp_theme;

        // import pages.php specif values from theme (toutes valeurs déjà définies dans themes/pages.php seront donc modifiées !)
        if (file_exists(theme_path($tmp_theme . '/pages.php'))) {
            include(theme_path($tmp_theme . '/pages.php'));
        } else {
            require_once(theme_path('pages.php')); 
        }

        $this->pages = $PAGES;

        $this->pageUri();

        $this->pageRef();
    }


    /**
     * Get instance class PageRef.
     *
     * @return \Npds\Page\PageRef $instance
     */
    public static function getInstance()
    {
        if (isset(static::$instance)) {
            return static::$instance;
        }

        return static::$instance = new static();
    }

    /**
     * [pageUri description]
     *
     * @return  void
     */
    public function pageUri()
    {
        $this->page_uri = preg_split("#(&|\?)#", $_SERVER['REQUEST_URI']);
    }

    /**
     * [pageRef description]
     *
     * @return  void
     */
    public function pageRef()
    {
        $this->pages_ref = basename($this->page_uri[0]);
           
        // 
        $this->pageIsUser(); 
        $this->pageIsStatic(); 
        $this->pageIsModule(); 
        $this->pageIsAdmin();
        
        // 
        $this->countUriPages();
    }

    /**
     * User page can have Bloc, Title ....
     *
     * @return  void
     */
    private function pageIsUser()
    {
        if ($this->pages_ref == "user.php") {
            $this->pages_ref = substr($_SERVER['REQUEST_URI'], strpos($_SERVER['REQUEST_URI'], "user.php"));
        }
    }

    /**
     * Static page can have Bloc, Title ....
     *
     * @return  void
     */
    private function pageIsStatic()
    {
        if ($this->pages_ref == "static.php") {
            $this->pages_ref = substr($_SERVER['REQUEST_URI'], strpos($_SERVER['REQUEST_URI'], "static.php"));
        }
    }

    /**
     * Module page can have Bloc, Title ....
     *
     * @return  void
     */
    private function pageIsModule()
    {
        global $ModPath, $ModStart;

        if ($this->pages_ref == "modules.php") {
            $this->pages_ref = (isset($PAGES["modules.php?ModPath=$ModPath&ModStart=$ModStart*"]['title'])) 
                ? "modules.php?ModPath=$ModPath&ModStart=$ModStart*" 
                : substr($_SERVER['REQUEST_URI'], strpos($_SERVER['REQUEST_URI'], "modules.php"));
        }
    }

    /**
     * Admin function can have all the pages attributs except Title
     *
     * @return  void
     */
    private function pageIsAdmin()
    {
        if ($this->pages_ref == "admin.php") {
            if (array_key_exists(1, $this->page_uri)) {
                if (array_key_exists($this->pages_ref . "?" . $this->page_uri[1], $this->pages)) {
                    if (array_key_exists('title', $this->pages[$this->pages_ref . "?" . $this->page_uri[1]])) {
                        $this->pages_ref .= "?" . $this->page_uri[1];
                    }
                }
            }
        }
    }

    /**
     * [countUriPages description]
     *
     * @return  [type]  [return description]
     */
    private function countUriPages()
    {
        $Npage_uri = count($this->page_uri);

        if ($Npage_uri > 1) {
            for ($uri = 1; $uri < $Npage_uri; $uri++) {
                if (array_key_exists($this->page_uri[$uri], $this->pages)) {

                    $_page = $this->pages;

                    if (!$$_page[$this->page_uri[$uri]]['run']) {
                        header("location: " . $this->pages[$this->page_uri[$uri]]['title']);
                        die();
                    }
                }
            }
        }
    }

    /**
     * $pages doit exister - sinon c'est que la page n'est pas dans pages.php
     *
     * @return  [type]  [return description]
     */
    public function initialize()
    {
        if (array_key_exists($this->pages_ref, $this->pages)) {

            // 
            $this->pagePdst();

            // 
            $this->pageClosedOrRedirectTo(); // Bug

            // 
            $this->pageTitle(); // Bug

            // 
            $this->pageMetaDescription();

            // 
            $this->pageMetaKeywords();

            // 
            $this->pageEditeur();

            // 
            $this->cssRef();

            // 
            $this->jsRef();
        }

        return $this;
    }

    /**
     * [importCssAndJs description]
     *
     * @return  [type]  [return description]
     */
    public function importCssAndJs(string $tmp_theme)
    {
        $this->cssImport($tmp_theme);

        $this->jsImport($tmp_theme);
    }

    /**
     * [pagePdst description]
     *
     * @return  [type]  [return description]
     */
    private function pagePdst()
    {
        global $pdst;

        // what a bloc ... left, right, both, ...
        if (array_key_exists('blocs', $this->pages[$this->pages_ref])) {
            $pdst = $this->pages[$this->pages_ref]['blocs'];
        }
    }

    /**
     * [pageClosedOrRedirectTo description]
     *
     * @return  [type]  [return description]
     */
    private function pageClosedOrRedirectTo()
    {
        // block execution of page with run attribute = no
        if ($this->pages[$this->pages_ref]['run'] == "no") {
            if ($this->pages_ref == "index.php") {
                $Titlesitename = "NPDS";

                if (file_exists("storage/meta/meta.php")) {
                    include("storage/meta/meta.php");
                }

                if (file_exists("static/webclosed.txt")) {
                    include("static/webclosed.txt");
                }

                die();
            } else {
                header("location: index.php");
            }

        // run script to another 'location'
        } elseif (($this->pages[$this->pages_ref]['run'] != "yes") and (($this->pages[$this->pages_ref]['run'] != ""))) {
            header("location: " . $this->pages[$this->pages_ref]['run']);
        }
    }

    /**
     * [pageTitle description]
     *
     * @return  [type]  [return description]
     */
    private function pageTitle()
    {
        global $title, $Titlesitename, $sitename;    

        if (array_key_exists('title', $this->pages[$this->pages_ref])) {

            // Assure la gestion des titres ALTERNATIFS
            $tab_page_ref = explode("|", $this->pages[$this->pages_ref]['title']);

            if (count($tab_page_ref) > 1) {
                $this->pages[$this->pages_ref]['title'] = (strlen($tab_page_ref[1]) > 1) 
                    ? $tab_page_ref[1] 
                    : $tab_page_ref[0];
                
                $this->pages[$this->pages_ref]['title'] = strip_tags($this->pages[$this->pages_ref]['title']);
            }

            $fin_title = substr($this->pages[$this->pages_ref]['title'], -1);
            $TitlesitenameX = $this->language->aff_langue(substr($this->pages[$this->pages_ref]['title'], 0, strlen($this->pages[$this->pages_ref]['title']) - 1));

            if ($fin_title == "+") {
                $Titlesitename = $TitlesitenameX . " - " . $Titlesitename;
            } else if ($fin_title == '-') {
                $Titlesitename = $TitlesitenameX;
            }

            if ($Titlesitename == '') {
                $Titlesitename = $sitename;
            }

            // globalisation de la variable title pour marquetapage mais protection pour la zone admin
            if ($this->pages_ref != "admin.php") {
                global $title;
            }

            if (!$title) {
                $title = ($fin_title == "+" or $fin_title == "-") 
                    ? $TitlesitenameX 
                    : $this->language->aff_langue(substr($this->pages[$this->pages_ref]['title'], 0, strlen($this->pages[$this->pages_ref]['title'])));
            } else {
                $title = removeHack($title);
                //$Titlesitename = removeHack($title);
            }  
        }    
    }

    /**
     * // meta description
     *
     * @return  [type]  [return description]
     */
    public function pageMetaDescription()
    {
        global $m_description;

        settype($m_description, 'string');

        if (array_key_exists('meta-description', $this->pages[$this->pages_ref]) and ($m_description == '')) {
            $m_description = $this->language->aff_langue($this->pages[$this->pages_ref]['meta-description']);
        }
    }

    /**
     * meta keywords
     *
     * @return  [type]  [return description]
     */
    public function pageMetaKeywords()
    {
        global $m_keywords;

        settype($m_keywords, 'string');

        if (array_key_exists('meta-keywords', $this->pages[$this->pages_ref]) and ($m_keywords == '')) {
            $m_keywords = $this->language->aff_langue($this->pages[$this->pages_ref]['meta-keywords']);
        }
    }

    /**
     * Initialisation de TinyMCE
     *
     * @return  [type]  [return description]
     */
    private function pageEditeur()
    {
        global $tiny_mce, $tiny_mce_theme, $tiny_mce_relurl, $tiny_mce_init;

        if ($tiny_mce) {
            if (array_key_exists($this->pages_ref, $this->pages)) {
                if (array_key_exists('TinyMce', $this->pages[$this->pages_ref])) {
                    $tiny_mce_init = true;

                    if (array_key_exists('TinyMce-theme', $this->pages[$this->pages_ref])) {
                        $tiny_mce_theme = $this->pages[$this->pages_ref]['TinyMce-theme'];
                    }

                    if (array_key_exists('TinyMceRelurl', $this->pages[$this->pages_ref])) {
                        $tiny_mce_relurl = $this->pages[$this->pages_ref]['TinyMceRelurl'];
                    }
                } else {
                    $tiny_mce_init = false;
                }
            } else {
                $tiny_mce_init = false;
            }
        } else {
            $tiny_mce_init = false;
        }
    }

    /**
     * [getPageRef description]
     *
     * @return  [type]  [return description]
     */
    public function getPageRef()
    {
        return $this->pages_ref;
    }

    /**
     * [getPages description]
     *
     * @return  [type]  [return description]
     */
    public function getPages()
    {
        return $this->pages;
    }

    /**
     * [getcssPagesRef description]
     *
     * @return  [type]  [return description]
     */
    public function getcssPagesRef()
    {
        return $this->css_pages_ref;
    }

    /**
     * [getJsPagesRef description]
     *
     * @return  [type]  [return description]
     */
    public function getJsPagesRef()
    {
        return $this->js_pages_ref;
    }

    /**
     * [cssRef description]
     *
     * @return  [type]  [return description]
     */
    public function cssRef()
    {
        // Chargeur de CSS via PAGES.PHP
        if (array_key_exists($this->pages_ref, $this->pages)) {
            if (array_key_exists('css', $this->pages[$this->pages_ref])) {
                $this->css_pages_ref = $this->pages[$this->pages_ref]['css']; 
            } else {
                $this->css_pages_ref = '';
            }
        } else {
            $this->css_pages_ref = '';
        }
    }

    /**
     * [cssImport description]
     *
     * @return  [type]                  [return description]
     */
    public function cssImport(string $tmp_theme, bool $output = false)
    {
        //global $tmp_theme;


//dump($tmp_theme, $this->css_pages_ref);

        // Chargeur CSS spécifique
        if ($this->css_pages_ref) {

            $css_import = '';

            if (is_array($this->css_pages_ref)) {
                foreach ($this->css_pages_ref as $tab_css) {
                    $admtmp = '';
                    $op = substr($tab_css, -1);

                    if ($op == '+' or $op == '-') {
                        $tab_css = substr($tab_css, 0, -1);
                    }

                    if (stristr($tab_css, 'http://') || stristr($tab_css, 'https://')) {
                        $admtmp = "<link href='$tab_css' rel='stylesheet' type='text/css' media='all' />";
                    } else {
                        if (file_exists("Themes/$tmp_theme/style/$tab_css") and ($tab_css != '')) {
                            $admtmp = "<link href='". site_url('Themes/'.$tmp_theme.'/style/'.$tab_css) ."' rel='stylesheet' type='text/css' media='all' />";

                        } elseif (file_exists("$tab_css") and ($tab_css != '')) {
                            $admtmp = "<link href='$tab_css' rel='stylesheet' type='text/css' media='all' />";
                        }
                    }

                    if ($op == '-') {
                        $css_import .= $admtmp;
                    } else {
                        $css_import .= $admtmp;
                    }
                }
            } else {
                $oups = $this->css_pages_ref;

                settype($oups, 'string');

                $op = substr($oups, -1);
                $css = substr($oups, 0, -1);

                if (($css != '') and (file_exists("Themes/$tmp_theme/style/$css"))) {
                    if ($op == '-') {
                        $css_import .= "<link href='Themes/$tmp_theme/style/$css' rel='stylesheet' type='text/css' media='all' />";
                    } else {
                        $css_import .= "<link href='Themes/$tmp_theme/style/$css' rel='stylesheet' type='text/css' media='all' />";
                    }

                    
                }
            }

            if ($output) {
                echo $css_import;
            } else {
                return $css_import;
            } 
        }
    }

    /**
     * [jsRef description]
     *
     * @return  [type]  [return description]
     */
    public function jsRef()
    {
        if (array_key_exists($this->pages_ref, $this->pages)) {
            if (array_key_exists('js', $this->pages[$this->pages_ref])) {
                $this->js_pages_ref = $this->pages[$this->pages_ref]['js'];

                if ($this->js_pages_ref != '') {
                    global $pages_js;
                    $pages_js = $this->js_pages_ref;
                }
            } else {
                $this->js_pages_ref = '';
            }
        } else {
            $this->js_pages_ref = '';
        }
    }

    /**
     * [jsImport description]
     *
     * @return  [type]              [return description]
     */
    public function jsImport(string $tmp_theme)
    {
        //global $tmp_theme;

        if ($this->js_pages_ref) {
            if (is_array($this->js_pages_ref)) {
                foreach ($this->js_pages_ref as $k => $tab_js) {
                    if (stristr($tab_js, 'http://') || stristr($tab_js, 'https://')) {
                        echo '<script type="text/javascript" src="' . $tab_js . '"></script>';

                    } else {
                        if (file_exists("Themes/$tmp_theme/js/$tab_js") and ($tab_js != '')) {
                            echo '<script type="text/javascript" src="Themes/' . $tmp_theme . '/js/' . $tab_js . '"></script>';

                        } elseif (file_exists("$tab_js") and ($tab_js != "")) {
                            echo '<script type="text/javascript" src="' . $tab_js . '"></script>';
                        }
                    }
                }
            } else {
                if (file_exists("Themes/$tmp_theme/js/". $this->js_pages_ref)) {
                    echo '<script type="text/javascript" src="Themes/' . $tmp_theme . '/js/' . $this->js_pages_ref . '"></script>';

                } elseif (file_exists($this->js_pages_ref)) {
                    echo '<script type="text/javascript" src="' . $this->js_pages_ref . '"></script>';
                }
            }
        }
    }

}
