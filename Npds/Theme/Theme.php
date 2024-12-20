<?php

declare(strict_types=1);

namespace Npds\Theme;

use IntlDateFormatter;
use Npds\Page\PageRef;
use Npds\Config\Config;
use Npds\Support\Counter;
use Npds\Support\Referer;
use Npds\Support\Sanitize;
use Npds\Language\Language;
use Npds\Metalang\Metalang;

use Npds\Support\Facades\Css;
use Npds\Support\Facades\Date;
use Npds\Support\Facades\User;
use Npds\Support\Facades\Editeur;


/**
 * Class Theme
 */
class Theme 
{

    /**
     * Instance Theme.
     *
     * @var \Npds\Theme\Theme $instance
     */
    protected static Theme $instance;

    /**
     * [$theme description]
     *
     * @var string
     */
    protected string $theme;

    /**
     * [$skin description]
     *
     * @var string
     */
    protected string $skin;

    /**
     * [$header description]
     *
     * @var int
     */
    protected int $header = 1;

    /**
     * [$footer description]
     *
     * @var int
     */
    protected int $footer = 1;


    /**
     * Constructeur.
     */
    public function __construct()
    {
        //
        $this->themeInit();

        //
        $this->skinInit();
    }

    /**
     * Get instance class Theme.
     *
     * @return \Npds\Theme\Theme $instance
     */
    public static function getInstance()
    {
        if (isset(static::$instance)) {
            return static::$instance;
        }

        return static::$instance = new static();
    }

    /**
     * [themeInit description]
     *
     * @return  void
     */
    public function themeInit()
    {
        // take the right theme location !
        global $user, $cookie;

        $Default_Theme = $this->defaultTheme();

        if (isset($user) and $user != '') {

            if ($cookie[9] != '') {
                $ibix = explode('+', urldecode($cookie[9]));

                if (array_key_exists(0, $ibix)) {
                    $theme = $ibix[0];
                }  else {
                    $theme = $Default_Theme;
                }

                if (!opendir(theme_path($theme))) {
                    $theme = $Default_Theme;
                }
            } else {
                $theme = $Default_Theme;
            }
        } else {
            $theme = $Default_Theme;
        }

        $this->theme = $theme;
    }

    /**
     * [skinInit description]
     *
     * @return  void
     */
    public function skinInit()
    {
        // take the right theme location !
        global $user, $cookie;

        $Default_Skin = $this->defaultSkin();

        if (isset($user) and $user != '') {

            if ($cookie[9] != '') {
                $ibix = explode('+', urldecode($cookie[9]));

                if (array_key_exists(1, $ibix)) {
                    $skin = $ibix[1];
                } else {
                    $skin = $Default_Skin;
                }

                if (!opendir(theme_path('_skin/'. $skin))) {
                    $skin = $Default_Skin;
                }
            } else {
                $skin = $Default_Skin;
            }
        } else {

            $skin = $Default_Skin;
        }   
        
        $this->skin = $skin;
    }

    /**
     * 
     *
     * @return  Metalang
     */
    private function metalang()
    {
        return Metalang::getInstance();
    }

    /**
     * 
     *
     * @return  Language
     */
    private function language()
    {
        return Language::getInstance();
    }

    /**
     * [getTheme description]
     *
     * @return  string
     */
    public function getTheme()
    {
        return $this->theme;
    }

    /**
     * [defaultTheme description]
     *
     * @return  string
     */
    public function defaultTheme()
    {
        return Config::get('npds.Default_Theme');
    }

    /**
     * [getSkin description]
     *
     * @return  string
     */
    public function getSkin()
    {
        return $this->skin;
    }

    /**
     * [defaultSkin description]
     *
     * @return  string
     */
    public function defaultSkin()
    {
        return Config::get('npds.Default_Skin');
    }

    /**
     * [getHeader description]
     *
     * @return  int
     */
    public function getHeader()
    {
        return $this->header;
    }

    /**
     * [setHeader description]
     *
     * @param   int  $header  [$header description]
     *
     * @return  void
     */
    public function setHeader(int $header)
    {
        $this->header = $header;
    }

    /**
     * [getFooter description]
     *
     * @return  int
     */
    public function getFooter()
    {
        return $this->footer;
    }

    /**
     * [setfooter description]
     *
     * @param   int  $footer  [$footer description]
     *
     * @return  void
     */
    public function setfooter(int $footer)
    {
        $this->footer = $footer;
    }

    /**
     * Retourne le chemin complet si l'image est trouvée dans le répertoire image du thème sinon false
     *
     * @param   string  $image  Nom de l'image.
     *
     * @return  string|false
     */
    public function theme_image(string $image)
    {
        $theme = $this->getTheme();

        if (@file_exists(theme_path($theme .'/images/'. $image))) {
            return theme_path($theme  .'/images/'. $image);
        }

        return false;
    }

    /**
     * Retourne le chemin complet si l'image est trouvée dans le répertoire image du thème sinon false
     *
     * @param   string  $image  Nom de l'image.
     *
     * @return  string|false
     */
    public function image(string $image)
    {
        $theme = $this->getTheme();

        if (@file_exists(theme_path($theme .'/images/'. $image))) {
            return theme_path($theme  .'/images/'. $image);
        }

        return false;
    }

    /**
     * [head description]
     *
     * @return  void
     */
    function head()
    {
        global $tiny_mce_init, $gzhandler, $language, $theme, $user;
        
        $theme =  $this->getTheme();
        
        $skin = $this->getSkin();

        if ($gzhandler == 1) {
            ob_start("ob_gzhandler");
        }
    
        include(theme_path($theme . '/theme.php'));
    
        $page_ref = with(new PageRef())->initialize();
    
        // Meta
        if (file_exists(storage_path('meta/meta.php'))) {
            $meta_op = '';
            include(storage_path('meta/meta.php'));
        }
    
        // Favicon
        $favico = (file_exists(theme_path($theme .'/images/favicon.ico'))) 
            ? site_url('Themes/' . $theme . '/images/favicon.ico') 
            : asset_url('images/favicon.ico');
    
        echo '
        <link rel="shortcut icon" href="' . $favico . '" type="image/x-icon" />
        <link rel="apple-touch-icon" sizes="120x120" href="'. asset_url('images/favicon-120.png') .'" />
        <link rel="apple-touch-icon" sizes="152x152" href="'. asset_url('images/favicon-152.png') .'" />
        <link rel="apple-touch-icon" sizes="180x180" href="'. asset_url('images/favicon-180.png') .'" />';
    
        // Canonical
        $scheme = strtolower($_SERVER['REQUEST_SCHEME'] ?? 'http');

        $host = $_SERVER['HTTP_HOST'];
        $uri = $_SERVER['REQUEST_URI'];
    
        echo '<link rel="canonical" href="' . ($scheme . '://' . $host . $uri) . '" />';
    
        // humans.txt
        if (file_exists("humans.txt")) {
            echo '<link type="text/plain" rel="author" href="' . site_url('humans.txt') . '" />';
        }

        // Syndication RSS 
        $sitename = Config::get('npd.sitename');

        echo '
        <link href="'. site_url('backend.php?op=RSS0.91') .'" title="' . $sitename . ' - RSS 0.91" rel="alternate" type="text/xml" />
        <link href="'. site_url('backend.php?op=RSS1.0') .'" title="' . $sitename . ' - RSS 1.0" rel="alternate" type="text/xml" />
        <link href="'. site_url('backend.php?op=RSS2.0') .'" title="' . $sitename . ' - RSS 2.0" rel="alternate" type="text/xml" />
        <link href="'. site_url('backend.php?op=ATOM') .'" title="' . $sitename . ' - ATOM" rel="alternate" type="application/atom+xml" />';
    
        // Tiny_mce
        if ($tiny_mce_init) {
            echo Editeur::aff_editeur("tiny_mce", "begin");
        }
    
        // include externe JAVASCRIPT file from Themes/default/include or themes/.../include for functions, codes in the <body onload="..." event...
        $body_onloadH = '
        <script type="text/javascript">
            //<![CDATA[
                function init() {';
    
        $body_onloadF = '
                }
            //]]>
        </script>';
    
        if (file_exists(theme_path('default/include/body_onload.inc'))) {
            echo $body_onloadH;
            include(theme_path('default/include/body_onload.inc'));
            echo $body_onloadF;
        }
    
        if (file_exists(theme_path($theme . '/include/body_onload.inc'))) {
            echo $body_onloadH;
            include(theme_path($theme . '/include/body_onload.inc'));
            echo $body_onloadF;
        }
    
        // include externe file from Themes/default/include or themes/.../include for functions, codes ... - skin motor
        if (file_exists(theme_path('default/include/header_head.inc'))) {
            ob_start();
                include theme_path('default/include/header_head.inc');
                $hH = ob_get_contents();
            ob_end_clean();
    
            if ($skin != '' and substr($theme, -3) == "_sk") {
                $hH = str_replace(asset_url('shared/bootstrap/dist/css/bootstrap.min.css'), site_url('Themes/_skins/' . $skin . '/bootstrap.min.css'), $hH);
                $hH = str_replace(asset_url('shared/bootstrap/dist/css/extra.css'), site_url('Themes/_skins/' . $skin . '/extra.css'), $hH);
            }
    
            echo $hH;
        }
    
        if (file_exists(theme_path($theme . '/include/header_head.inc'))) {
            include(theme_path($theme . '/include/header_head.inc'));
        }
    
        echo Css::getInstance()->import_css($theme, $language, '');

        echo $page_ref->importCssAndJs($theme);
    
        echo '</head>';
    
        include(theme_path($theme . '/header.php'));
    }

    /**
     * [header description]
     *
     * @return  void
     */
    public function header()
    {
        // include externe file from Themes/default/include for functions, codes ...
        if (file_exists(theme_path('default/include/header_before.inc'))) {
            include(theme_path('default/include/header_before.inc'));
        }

        /**
         * [$this description]
         *
         * @var [type]
         */
        $this->head();

        Referer::update();

        Counter::update();

        // include externe file from Themes/default/include for functions, codes ...
        if (file_exists(theme_path('default/include/header_after.inc'))) {
            include(theme_path('default/include/header_after.inc'));
        }
    }

    /**
     * [footmsg description]
     *
     * @return  void
     */
    public function footmsg()
    {
        global $foot1, $foot2, $foot3, $foot4;
    
        $foot = '<p align="center">';
        if ($foot1) {
            $foot .= stripslashes($foot1) . '<br />';
        }
    
        if ($foot2) {
            $foot .= stripslashes($foot2) . '<br />';
        }
    
        if ($foot3) {
            $foot .= stripslashes($foot3) . '<br />';
        }
    
        if ($foot4) {
            $foot .= stripslashes($foot4);
        }
        $foot .= '</p>';
    
        $language = $this->language();

        echo $language->aff_langue($foot);
    }
    
    /**
     * [foot description]
     *
     * @return  void
     */
    public function foot()
    {
        global $user, $cookie9;

        $Default_Theme = $this->defaultTheme();

        if ($user) {
            $user2 = base64_decode($user);
            $cookie = explode(':', $user2);
    
            if ($cookie[9] == '') {
                $cookie[9] = $Default_Theme;
            }
    
            $ibix = explode('+', urldecode($cookie[9]));
    
            if (!opendir(theme_path($ibix[0]))) {
                include(theme_path($Default_Theme . '/footer.php'));
            } else {
                include(theme_path($ibix[0] . '/footer.php'));
            }
        } else {
            include(theme_path($Default_Theme . '/footer.php'));
        }
    
        if ($user) {
            $cookie9 = $ibix[0];
        }
    }
    
    /**
     * [footer description]
     *
     * @return  void
     */
    public function footer()
    {
        global $tiny_mce, $cookie9;
        
        $Default_Theme = $this->defaultTheme();
    
        if ($tiny_mce) {
            echo Editeur::aff_editeur('tiny_mce', 'end');
        }
    
        // include externe file from Themes/default/include for functions, codes ...
        if (file_exists(theme_path('default/include/footer_before.inc'))) {
            include(theme_path('default/include/footer_before.inc'));
        }
    
        $this->foot();
    
        // include externe file from modules/themes include for functions, codes ...
        if (isset($user)) {
            if (file_exists(theme_path($cookie9 .'/include/footer_after.inc'))) {
                include(theme_path($cookie9 . '/include/footer_after.inc'));

            } else {
                if (file_exists(theme_path('default/include/footer_after.inc'))) {
                    include(theme_path('default/include/footer_after.inc'));
                }
            }
        } else {
            if (file_exists(theme_path($Default_Theme . '/include/footer_after.inc'))) {
                include(theme_path($Default_Theme . '/include/footer_after.inc'));

            } else {
                if (file_exists(theme_path('default/include/footer_after.inc'))) {
                    include(theme_path('default/include/footer_after.inc'));
                }
            }
        }
    
        echo '
        </body>
        </html>';
    
        include("sitemap.php");
    
        sql_close();
    }

    /**
     * [themeDistinct description]
     *
     * @return  void
     */
    public function themeDistinct()
    {
        echo ' 
        <h3 class="my-4">' . translate("Thème(s)") . '</h3>
        <table data-toggle="table" data-striped="true">
            <thead>
                <tr>
                    <th data-sortable="true" data-align="center">' . translate("Thème(s)") . '</th>
                    <th data-sortable="true" data-align="center">' . translate("Skin(s)") . '</th>
                    <th data-sortable="true" data-align="center">' . translate("Nombre d'utilisateurs par thème") . '</th>
                    <th data-sortable="true" data-align="center">' . translate("Status") . '</th>
                </tr>
            </thead>
            <tbody>';
    
        $resultX = sql_query("SELECT DISTINCT(theme) FROM " . sql_prefix('users'));
        
        while (list($themelist) = sql_fetch_row($resultX)) {
            if ($themelist != '') {
        
                $ibix = explode('+', $themelist);
        
                $T_exist = is_dir(theme_path($ibix[0])) 
                    ? '<span class="text-success">' . translate("Ce thème est actif ...") . '</span>' 
                    : '<span class="text-danger">' . translate("Ce thème n'existe pas ...") . '</span>';

                $S_exist = is_dir(theme_path('_skins/'. $ibix[1])) 
                    ? sprintf('%s : ', $ibix[1]) . '<span class="text-success">' . translate("Ce skin est actif ...") . '</span>' 
                    : sprintf('%s : ', $ibix[1]) . '<span class="text-danger">' . translate("Ce skin n'existe pas ...") . '</span>';

                if ($themelist == $this->defaultTheme()) {
        
                    echo '
                        <tr>
                        <td>' . $ibix[0] . ' <b>(' . translate("par défaut") . ')</b></td>
                        <td>' . $ibix[1] . ' <b>(' . translate("par défaut") . ')</b></td>';

                    //echo '<td>' . $S_exist . ' <b>(' . translate("par défaut") . ')</b></td>';

                    echo '<td><b>' . Sanitize::wrh(
                                (
                                    (
                                        sql_num_rows(sql_query("SELECT uid 
                                        FROM " . sql_prefix('users') . " 
                                        WHERE theme='$themelist'")) ?: 0
                                    )  +  (
                                        sql_num_rows(sql_query("SELECT uid 
                                        FROM " . sql_prefix('users') . " 
                                        WHERE theme=''")) ?: 0
                                    )
                                )
                            ) . '
                            </b>
                        </td>
                        <td>' . $T_exist . '</td>
                        </tr>';
                } else {
        
                    echo '
                        <tr>';
        
                    //echo substr($ibix[0], -3) == "_sk" 
                    //    ? '<td>' . $themelist . '</td>' 
                    //    : '<td>' . $ibix[0] . '</td>';
        
                    echo '<td>' . rtrim($ibix[0], '_sk') . '</td> 
                          <td>' . $ibix[1]. '</td>'; 
                    
                    //echo '<td>' . $S_exist. '</td>'; 

                    echo '
                        <td>
                            <b>
                            ' . Sanitize::wrh(sql_num_rows(sql_query("SELECT uid FROM " . sql_prefix('users') . " WHERE theme='$themelist'")) ?: 0) . '
                            </b>
                        </td>
                        <td>' . $T_exist . '</td>
                        </tr>';
                }
            }
        }
        
        echo '
                </tbody>
            </table>';        
    }

    /**
     * [local_var description]
     *
     * @param   string  $Xcontent  [$Xcontent description]
     *
     * @return  string
     */
    public function local_var(string $Xcontent)
    {
        if (strstr($Xcontent, "!var!")) {
            $deb = strpos($Xcontent, "!var!", 0) + 5;
            $fin = strpos($Xcontent, ' ', $deb);
    
            if ($fin) {
                $H_var = substr($Xcontent, $deb, $fin - $deb);
            } else {
                $H_var = substr($Xcontent, $deb);
            }
    
            return $H_var;
        }
    }
    
    /**
     * [themeindex description]
     *
     * @param   [type]  $aid         [$aid description]
     * @param   [type]  $informant   [$informant description]
     * @param   [type]  $time        [$time description]
     * @param   [type]  $title       [$title description]
     * @param   [type]  $counter     [$counter description]
     * @param   [type]  $topic       [$topic description]
     * @param   [type]  $thetext     [$thetext description]
     * @param   [type]  $notes       [$notes description]
     * @param   [type]  $morelink    [$morelink description]
     * @param   [type]  $topicname   [$topicname description]
     * @param   [type]  $topicimage  [$topicimage description]
     * @param   [type]  $topictext   [$topictext description]
     * @param   [type]  $id          [$id description]
     *
     * @return  [type]               [return description]
     */
    public function themeindex($aid, $informant, $time, $title, $counter, $topic, $thetext, $notes, $morelink, $topicname, $topicimage, $topictext, $id)
    {
        $theme = $this->getTheme();
    
        $inclusion = false;
    
        if (file_exists(theme_path($theme . '/html/index-news.html'))) {
            $inclusion = theme_path($theme . '/html/index-news.html');

        } elseif (file_exists(theme_path('default/html/index-news.html'))) {
            $inclusion = theme_path('default/html/index-news.html');

        } else {
            echo theme_path('default/html/index-news.html'). ' ou ' . theme_path($theme . '/html/index-news.html'). 'manquant / not find !<br />';
            die();
        }
    
        $H_var = $this->local_var($thetext);
    
        if ($H_var != '') {
            ${$H_var} = true;

            $thetext = str_replace("!var!$H_var", "", $thetext);
        }
    
        if ($notes != '') {
            $notes = '<div class="note">' . translate("Note") . ' : ' . $notes . '</div>';
        }
    
        ob_start();
            include($inclusion);
            $Xcontent = ob_get_contents();
        ob_end_clean();
    
        $lire_la_suite = '';
        if ($morelink[0]) {
            $lire_la_suite = $morelink[1] . ' ' . $morelink[0] . ' | ';
        }
    
        $commentaire = '';
        if ($morelink[2]) {
            $commentaire = $morelink[2] . ' ' . $morelink[3] . ' | ';
        } else {
            $commentaire = $morelink[3] . ' | ';
        }
    
        $categorie = '';
        if ($morelink[6]) {
            $categorie = ' : ' . $morelink[6];
        }
    
        $morel = $lire_la_suite . $commentaire . $morelink[4] . ' ' . $morelink[5] . $categorie;
    
        $Xsujet = '';
        if ($topicimage != '') {

            if (!$imgtmp = $this->image('topics/' . $topicimage)) {
                $imgtmp = Config::get('npds.tipath') . $topicimage;
            }
            
            $Xsujet = '<a href="' . site_url('search.php?query=&amp;topic=' . $topic) . '">
                    <img class="img-fluid" src="' . site_url($imgtmp). '" alt="' . translate("Rechercher dans") . ' : ' . $topicname . '" title="' . translate("Rechercher dans") . ' : ' . $topicname . '<hr />' . $topictext . '" data-bs-toggle="tooltip" data-bs-html="true" />
                </a>';
        } else {
            $Xsujet = '<a href="' . site_url('search.php?query=&amp;topic=' . $topic) . '">
                    <span class="badge bg-secondary h1" title="' . translate("Rechercher dans") . ' : ' . $topicname . '<hr />' . $topictext . '" data-bs-toggle="tooltip" data-bs-html="true">' . $topicname . '</span>
                </a>';
        }
    
        $npds_METALANG_words = array(
            "'!N_publicateur!'i"        => $aid,
            "'!N_emetteur!'i"           => User::userpopover($informant, 40, 2) . '<a href="' . site_url('user.php?op=userinfo&amp;uname=' . $informant) . '">' . $informant . '</a>',
            "'!N_date!'i"               => Date::formatTimes($time, IntlDateFormatter::FULL, IntlDateFormatter::SHORT),
            "'!N_date_y!'i"             => Date::getPartOfTime($time, 'yyyy'),
            "'!N_date_m!'i"             => Date::getPartOfTime($time, 'MMMM'),
            "'!N_date_d!'i"             => Date::getPartOfTime($time, 'd'),
            "'!N_date_h!'i"             => Date::formatTimes($time, IntlDateFormatter::NONE, IntlDateFormatter::MEDIUM),
            "'!N_print!'i"              => $morelink[4],
            "'!N_friend!'i"             => $morelink[5],
            "'!N_nb_carac!'i"           => $morelink[0],
            "'!N_read_more!'i"          => $morelink[1],
            "'!N_nb_comment!'i"         => $morelink[2],
            "'!N_link_comment!'i"       => $morelink[3],
            "'!N_categorie!'i"          => $morelink[6],
            "'!N_titre!'i"              => $title,
            "'!N_texte!'i"              => $thetext,
            "'!N_id!'i"                 => $id,
            "'!N_sujet!'i"              => $Xsujet,
            "'!N_note!'i"               => $notes,
            "'!N_nb_lecture!'i"         => $counter,
            "'!N_suite!'i"              => $morel
        );
    
        $metalang = $this->metalang();
        $language = $this->language();

        echo $metalang->meta_lang($language->aff_langue(preg_replace(array_keys($npds_METALANG_words), array_values($npds_METALANG_words), $Xcontent)));
    }
    
    /**
     * [themearticle description]
     *
     * @param   [type]  $aid           [$aid description]
     * @param   [type]  $informant     [$informant description]
     * @param   [type]  $time          [$time description]
     * @param   [type]  $title         [$title description]
     * @param   [type]  $thetext       [$thetext description]
     * @param   [type]  $topic         [$topic description]
     * @param   [type]  $topicname     [$topicname description]
     * @param   [type]  $topicimage    [$topicimage description]
     * @param   [type]  $topictext     [$topictext description]
     * @param   [type]  $id            [$id description]
     * @param   [type]  $previous_sid  [$previous_sid description]
     * @param   [type]  $next_sid      [$next_sid description]
     * @param   [type]  $archive       [$archive description]
     *
     * @return  [type]                 [return description]
     */
    public function themearticle($aid, $informant, $time, $title, $thetext, $topic, $topicname, $topicimage, $topictext, $id, $previous_sid, $next_sid, $archive)
    {
        global $counter, $boxtitle, $boxstuff;
    
        $theme = $this->getTheme();

        $inclusion = false;
    
        if (file_exists(theme_path($theme . '/html/detail-news.html'))) {
            $inclusion = theme_path($theme . '/html/detail-news.html');

        } elseif (file_exists(theme_path('default/html/detail-news.html'))) {
            $inclusion = theme_path('default/html/detail-news.html');
        } else {
            echo theme_path('default/html/detail-news.html'). ' ou ' . theme_path($theme . '/html/detail-news.html'). 'manquant / not find !<br />';
            die();
        }
    
        $H_var = $this->local_var($thetext);

        if ($H_var != '') {

            ${$H_var} = true;

            $thetext = str_replace("!var!$H_var", '', $thetext);
        }
    
        ob_start();
            include($inclusion);
            $Xcontent = ob_get_contents();
        ob_end_clean();
    
        if ($previous_sid) {
            $prevArt = '<a href="' . site_url('article.php?sid=' . $previous_sid . '&amp;archive=' . $archive) . '" >
                    <i class="fa fa-chevron-left fa-lg me-2" title="' . translate("Précédent") . '" data-bs-toggle="tooltip"></i>
                    <span class="d-none d-sm-inline">' . translate("Précédent") . '</span>
                </a>';
        } else {
            $prevArt = '';
        }
    
    
        if ($next_sid) {
            $nextArt = '<a href="' . site_url('article.php?sid=' . $next_sid . '&amp;archive=' . $archive) . '" >
                    <span class="d-none d-sm-inline">' . translate("Suivant") . '</span>
                    <i class="fa fa-chevron-right fa-lg ms-2" title="' . translate("Suivant") . '" data-bs-toggle="tooltip"></i>
                </a>';
        } else {
            $nextArt = '';
        }
    
        $printP = '<a href="' . site_url('print.php?sid=' . $id) . '" title="' . translate("Page spéciale pour impression") . '" data-bs-toggle="tooltip">
                <i class="fa fa-2x fa-print"></i>
            </a>';
        
        $sendF = '<a href="' .  site_url('friend.php?op=FriendSend&amp;sid=' . $id) . '" title="' . translate("Envoyer cet article à un ami") . '" data-bs-toggle="tooltip">
                <i class="fa fa-2x fa-at"></i>
            </a>';
    
        if (!$imgtmp = $this->image('topics/' . $topicimage)) {
            $imgtmp = Config::get('npds.tipath') . $topicimage;
        }
    
        $timage = site_url($imgtmp);

        $npds_METALANG_words = array(
            "'!N_publicateur!'i"        => $aid,
            "'!N_emetteur!'i"           => User::userpopover($informant, 40, 2) . '<a href="'. site_url('user.php?op=userinfo&amp;uname=' . $informant) . '"><span class="">' . $informant . '</span></a>',
            "'!N_date!'i"               => Date::formatTimes($time, IntlDateFormatter::FULL, IntlDateFormatter::SHORT),
            "'!N_date_y!'i"             => Date::getPartOfTime($time, 'yyyy'),
            "'!N_date_m!'i"             => Date::getPartOfTime($time, 'MMMM'),
            "'!N_date_d!'i"             => Date::getPartOfTime($time, 'd'),
            "'!N_date_h!'i"             => Date::formatTimes($time, IntlDateFormatter::NONE, IntlDateFormatter::MEDIUM),
            "'!N_print!'i"              => $printP,
            "'!N_friend!'i"             => $sendF,
            "'!N_boxrel_title!'i"       => $boxtitle,
            "'!N_boxrel_stuff!'i"       => $boxstuff,
            "'!N_titre!'i"              => $title,
            "'!N_id!'i"                 => $id,
            "'!N_previous_article!'i"   => $prevArt,
            "'!N_next_article!'i"       => $nextArt,
            "'!N_sujet!'i"              => '<a href="' . site_url('search.php?query=&amp;topic=' . $topic) . '"><img class="img-fluid" src="' . $timage . '" alt="' . translate("Rechercher dans") . '&nbsp;' . $topictext . '" /></a>',
            "'!N_texte!'i"              => $thetext,
            "'!N_nb_lecture!'i"         => $counter
        );
    
        $metalang = $this->metalang();
        $language = $this->language();

        echo $metalang->meta_lang(
            $language->aff_langue(
                preg_replace(
                    array_keys($npds_METALANG_words), 
                    array_values($npds_METALANG_words), 
                    $Xcontent
                )
            )
        );
    }
    
    /**
     * [themesidebox description]
     *
     * @param   string  $title    [$title description]
     * @param   string  $content  [$content description]
     *
     * @return  string
     */
    public function themesidebox(string $title, string $content)
    {
        global $B_class_title, $B_class_content, $bloc_side, $htvar;
    
        $theme = $this->getTheme();

        $inclusion = false;
    
        if (file_exists(theme_path($theme . '/html/bloc-right.html')) and ($bloc_side == "RIGHT")) {
            $inclusion = theme_path($theme . '/html/bloc-right.html');
        }
    
        if (file_exists(theme_path($theme . '/html/bloc-left.html')) and ($bloc_side == "LEFT")) {
            $inclusion = theme_path($theme . '/html/bloc-left.html');
        }
    
        if (!$inclusion) {
            if (file_exists(theme_path($theme . '/html/bloc.html'))) {
                $inclusion = theme_path($theme . '/html/bloc.html');

            } elseif (file_exists(theme_path('default/html/bloc.html'))) {
                $inclusion = theme_path('default/html/bloc.html');

            } else {
                echo theme_path('default/html/bloc.html'). ' ou ' . theme_path($theme . '/html/bloc.html'). 'manquant / not find !<br />';
                die();
            }
        }
    
        ob_start();
            include($inclusion);
            $Xcontent = ob_get_contents();
        ob_end_clean();
    
        if ($title == 'no-title') {
            $Xcontent = str_replace('<div class="LB_title">!B_title!</div>', '', $Xcontent);
            $title = '';
        }
    
        $npds_METALANG_words = array(
            "'!B_title!'i"          => $title,
            "'!B_class_title!'i"    => $B_class_title,
            "'!B_class_content!'i"  => $B_class_content,
            "'!B_content!'i"        => $content
        );
    
        // modif ji fantôme block
        echo $htvar; 

        $metalang = $this->metalang();

        echo $metalang->meta_lang(
            preg_replace(
                array_keys($npds_METALANG_words), 
                array_values($npds_METALANG_words), 
                $Xcontent
            )
        );
        
        // modif ji fantôme block
        echo '</div>'; 
    }
    
    /**
     * [themedito description]
     *
     * @param   string  $content  [$content description]
     *
     * @return  string
     */
    public function themedito(string $content)
    {
        $theme = $this->getTheme();
    
        $inclusion = false;
    
        if (file_exists(theme_path($theme . '/html/editorial.html'))) {
            $inclusion = theme_path($theme . '/html/editorial.html');

        } elseif (file_exists(theme_path('default/html/editorial.html'))) {
            $inclusion = theme_path('default/html/editorial.html');

        } else {
            echo theme_path('editorial.html') . ' ou ' . theme_path($theme . '/html/editorial.html') . ' manquant / not find !<br />';
            die();
        }
    
        if ($inclusion) {
            ob_start();
                include($inclusion);
                $Xcontent = ob_get_contents();
            ob_end_clean();
    
            $npds_METALANG_words = array(
                "'!editorial_content!'i" => $content
            );
    
            $language = $this->language();
            $metalang = $this->metalang();

            echo $metalang->meta_lang(
                $language->aff_langue(
                    preg_replace(
                        array_keys($npds_METALANG_words), 
                        array_values($npds_METALANG_words), 
                        $Xcontent
                    )
                )
            );
        }
    
        return $inclusion;
    }

}
