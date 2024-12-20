<?php

declare(strict_types=1);

namespace Npds\Block;

use Npds\Auth\Auth;
use Npds\Groupe\Groupe;
use Npds\Support\Sanitize;
use Npds\Language\Language;
use Npds\Cache\SuperCacheEmpty;
use Npds\Cache\SuperCacheManager;


/**
 * Class de gestion des blocks.
 */
class Block 
{

    /**
     * Instance Block.
     *
     * @var \Npds\Block\block $instance
     */
    protected static Block $instance;

    /**
     * Instance Language.
     *
     * @var  Npds\Language\Language $instance
     */
    protected Language $language;

    /**
     * Instance Groupe.
     *
     * @var Npds\Groupe\Groupe $instance
     */
    protected Groupe $groupe;

    /**
     * Instance Auth.
     *
     * @var \Npds\Auth\Auth $instance
     */
    protected Auth $auth;


    /**
     * Constructeur.
     */
    public function __construct()
    {
        $this->language = Language::getInstance();

        $this->groupe   = Groupe::getInstance();
        
        $this->auth     = Auth::getInstance();
    }

    /**
     * Get instance class Block.
     *
     * @return \Npds\Block $instance
     */
    public static function getInstance()
    {
        if (isset(static::$instance)) {
            return static::$instance;
        }

        return static::$instance = new static();
    }

    /**
     * Blocs de Gauche
     *
     * @param   string  $moreclass  Définie la class css.
     *
     * @return  void
     */
    public function leftblocks(string $moreclass)
    {
        $this->Pre_fab_block('', 'LB', $moreclass);
    }

    /**
     * Blocs de Droite
     *
     * @param   string  $moreclass  Définie la class css.
     *
     * @return  void
     */
    public function rightblocks(string $moreclass)
    {
        $this->Pre_fab_block('', 'RB', $moreclass);
    }

    /**
     * Alias de Pre_fab_block pour meta-lang.
     *
     * @param   mixed   $Xid     Id du block. 
     * @param   string  $Xblock  Type du block droite ou gauche.
     *
     * @return  string
     */
    public function oneblock(mixed $Xid, string $Xblock)
    {
        ob_start();
            $this->Pre_fab_block($Xid, $Xblock, '');
            $tmp = ob_get_contents();
        ob_end_clean();

        return $tmp;
    }

    /**
     * Retourn array ou vide contenant la liste des autorisations (-127,-1,0,1,2...126)) SI le bloc est actif SINON ""
     * Le paramètre est le contenu du bloc (function#....)
     *
     * @param   string  $Xcontent   Expréssion pour le regex du block.
     *
     * @return  array|string|null
     */
    public function autorisation_block(string $Xcontent)
    {
        $autoX = []; 

        $auto = explode(',', $this->niv_block($Xcontent));

        // Le dernier indice indique si le bloc est actif.
        $actif = $auto[count($auto) - 1];

        // On dépile le dernier indice.
        array_pop($auto);

        foreach ($auto as $autovalue) {
            if ($this->auth->autorisation($autovalue)) {
                $autoX[] = $autovalue;
            }
        }

        if ($actif) {
            return $autoX;
        } else {
            return '';
        }
    }

    /**
     * Assure la gestion des include# et function# des blocs de NPDS.
     * Le titre du bloc est exporté (global) dans $block_title.
     *
     * @param   string  $title     Titre du block.
     * @param   string  $contentX  Contenue du block.
     *
     * @return  bool    true|false
     */
    private function block_fonction(string $title, string $contentX)
    {
        global $block_title;
        
        $block_title = $title;
        
        // For including PHP functions in block
        if (stristr($contentX, "function#")) {

            //
            $contentX = Sanitize::replaceBR($contentX);

            //
            $contentY = trim(substr($contentX, 9));

            if (stristr($contentY, "params#")) {

                return $this->callFunction($contentY);

            } else {
                if (function_exists($contentY)) {
                    $contentY();

                    return true;
                } else {
                    return false;
                }
            }
        } else {
            return false;
        }
    }

    /**
     * Calcule ne le nombre d'argumet de la function.
     *
     * @param   string  $contentY  
     *
     * @return  void
     */
    private function callFunction(string $contentY)
    {
        $pos        = strpos($contentY, "params#");
        $contentII  = trim(substr($contentY, 0, $pos));
        $params     = substr($contentY, $pos + 7);
        $prm        = explode(',', $params);

        // Remplace le param "False" par la valeur false (idem pour True)
        for ($i = 0; $i <= count($prm) - 1; $i++) {
            if ($prm[$i] == "false") {
                $prm[$i] = false;
            }

            if ($prm[$i] == "true") {
                $prm[$i] = true;
            }
        }

        // En fonction du nombre de params de la fonction : limite actuelle : 8
        if (function_exists($contentII)) {
            switch (count($prm)) {
                case 1:
                    $contentII($prm[0]);
                    break;

                case 2:
                    $contentII($prm[0], $prm[1]);
                    break;

                case 3:
                    $contentII($prm[0], $prm[1], $prm[2]);
                    break;

                case 4:
                    $contentII($prm[0], $prm[1], $prm[2], $prm[3]);
                    break;

                case 5:
                    $contentII($prm[0], $prm[1], $prm[2], $prm[3], $prm[4]);
                    break;

                case 6:
                    $contentII($prm[0], $prm[1], $prm[2], $prm[3], $prm[4], $prm[5]);
                    break;

                case 7:
                    $contentII($prm[0], $prm[1], $prm[2], $prm[3], $prm[4], $prm[5], $prm[6]);
                    break;

                case 8:
                    $contentII($prm[0], $prm[1], $prm[2], $prm[3], $prm[4], $prm[5], $prm[6], $prm[7]);
                    break;
            }

            return true;
        } else {
            return false;
        }
    }

    /**
     * Assure la fabrication réelle et le Cache d'un bloc.
     *
     * @param   string  $title    [$title description]
     * @param   int     $member   [$member description]
     * @param   string  $content  [$content description]
     * @param   int     $Xcache   [$Xcache description]
     *
     * @return  [type]            [return description]
     */
    private function fab_block(string $title, int $member, string $content, int $Xcache)
    {
        global $SuperCache, $CACHE_TIMINGS;

        // Si on cherche à charger un JS qui a déjà été chargé par pages.php alors on ne le charge pas ...
        global $pages_js;
        if ($pages_js != '') {
            
            preg_match('#src="([^"]*)#', $content, $jssrc);
            
            if (is_array($pages_js)) {
                foreach ($pages_js as $jsvalue) {
                    if (array_key_exists('1', $jssrc)) {
                        if ($jsvalue == $jssrc[1]) {
                            $content = '';
                            break;
                        }
                    }
                }
            } else {
                if (array_key_exists('1', $jssrc)) {
                    if ($pages_js == $jssrc[1]) {
                        $content = "";
                    }
                }
            }
        }

        $content = $this->language->aff_langue($content);

        if (($SuperCache) and ($Xcache != 0)) {
            $cache_clef = md5($content);
            $CACHE_TIMINGS[$cache_clef] = $Xcache;
            $cache_obj = new SuperCacheManager();
            $cache_obj->startCachingBlock($cache_clef);
        } else {
            $cache_obj = new SuperCacheEmpty();
        }

        if (($cache_obj->genereting_output == 1) or ($cache_obj->genereting_output == -1) or (!$SuperCache) or ($Xcache == 0)) {

            // For including CLASS AND URI in Block
            $content = $this->uriSidebox($content);

            // For Javascript in Block
            $content = $this->javascriptSidebox($content);

            // For including externale file in block the return MUST BE in $content
            $content  = $this->includeSidebox($content);
            
            //
            $this->renderSidebox($title, $content, $member);

            if (($SuperCache) and ($Xcache != 0)) {
                $cache_obj->endCachingBlock($cache_clef);
            }
        }
    }

    /**
     * Uri block.
     *
     * @param   string  $content  Contenue du block.
     * 
     * @return  string
     */
    private function uriSidebox(string $content)
    {
        global $B_class_title, $B_class_content;

        $B_class_title = '';
        $B_class_content = '';
        $R_uri = '';

        if (stristr($content, 'class-') or stristr($content, 'uri')) {
            $tmp = explode("\n", $content);
            $content = '';

            foreach ($tmp as $id => $class) {
                $temp = explode("#", $class);

                if ($temp[0] == "class-title") {
                    $B_class_title = str_replace("\r", "", $temp[1]);

                } else if ($temp[0] == "class-content") {
                    $B_class_content = str_replace("\r", "", $temp[1]);

                } else if ($temp[0] == "uri") {
                    $R_uri = str_replace("\r", '', $temp[1]);

                } else {
                    if ($content != '') {
                        $content .= "\n ";
                    }

                    $content .= str_replace("\r", '', $class);
                }
            }
        }

        // For BLOC URIs
        if ($R_uri) {
            global $REQUEST_URI;

            $page_ref = basename($REQUEST_URI);
            $tab_uri = explode(" ", $R_uri);

            $R_content = false;

            $tab_pref = parse_url($page_ref);
            $racine_page = $tab_pref['path'];

            if (array_key_exists('query', $tab_pref)) {
                $tab_pref = explode('&', $tab_pref['query']);
            }

            foreach ($tab_uri as $RR_uri) {
                $tab_puri = parse_url($RR_uri);
                $racine_uri = $tab_puri['path'];

                if ($racine_page == $racine_uri) {
                    if (array_key_exists('query', $tab_puri)) {
                        $tab_puri = explode('&', $tab_puri['query']);
                    }

                    foreach ($tab_puri as $idx => $RRR_uri) {
                        if (substr($RRR_uri, -1) == "*") {
                            // si le token contient *
                            if (substr($RRR_uri, 0, strpos($RRR_uri, "=")) == substr($tab_pref[$idx], 0, strpos($tab_pref[$idx], "="))) {
                                $R_content = true;
                            }
                        } else {
                            if ($RRR_uri != $tab_pref[$idx]) {
                                $R_content = false;
                            } else {
                                $R_content = true;
                            }
                        }
                    }
                }

                if ($R_content == true) {
                    break;
                }
            }

            if (!$R_content) {
                $content = '';
            }
        }

        return $content;
    }

    /**
     * Javascrypt block.
     *
     * @param   string  $content  Contenue du block.
     * 
     * @return  string
     */
    private function JavascriptSidebox(string $content)
    {
        if (!stristr($content, 'javascript')) {
            $content = nl2br($content);
        }

        return $content;
    }

    /**
     * Pour inclure un fichier externe dans le bloc le retour DOIT ÊTRE en $content.
     *
     * @param   string  $content  Contenue du block.
     * 
     * @return  string
     */
    private function includeSidebox(string $content)
    {
        if (stristr($content, 'include#')) {
            $Xcontent = false;

            // You can now, include AND cast a fonction with params in the same bloc !
            if (stristr($content, "function#")) {

                $content = Sanitize::replaceBR($content);;

                $pos = strpos($content, 'function#');

                $Xcontent   = substr(trim($content), $pos);
                $content    = substr(trim($content), 8, $pos - 10);
            } else {
                $content    = substr(trim($content), 8);
            }

            include_once($content);

            if ($Xcontent) {
                $content = $Xcontent;
            } 
        }

        return $content;
    }

    /**
     * Render sidebox.
     *
     * @param   string  $title    Titre du block.
     * @param   string  $content  Contenue du block.
     * @param   int     $member   Droit du block.
     *
     * @return  void
     */
    private function renderSidebox(string $title, string $content, int $member)
    {
        global $user, $admin;

        if (!empty($content)) {
            if (($member == 1) and (isset($user))) {
                $this->hiddenSidebox($title, $content);

            } elseif ($member == 0) {
                $this->hiddenSidebox($title, $content);

            } elseif (($member > 1) and (isset($user))) {
                $tab_groupe = $this->groupe->valid_group($user);

                if ($this->groupe->groupe_autorisation($member, $tab_groupe)) {
                    $this->hiddenSidebox($title, $content);
                }
            } elseif (($member == -1) and (!isset($user))) {
                $this->hiddenSidebox($title, $content);

            } elseif (($member == -127) and (isset($admin)) and ($admin)) {
                $this->hiddenSidebox($title, $content);
            }
        }
    }

    /**
     * Hidden content sidebox.
     *
     * @param   string  $title    Titre du block.
     * @param   string  $content  Contenue du block.
     *
     * @return  string|void
     */
    private function hiddenSidebox(string $title, string $content)
    {
        // Bloc caché
        $hidden = false;

        if (substr($content, 0, 7) == "hidden#") {
            $content = str_replace("hidden#", '', $content);
            
            $hidden = true;
        }

        // Multi-Langue
        $title = $this->language->aff_langue($title);

        if (!$this->block_fonction($title, $content)) {
            if (!$hidden) {
                themesidebox($title, $content);
            } else {
                echo $content;
            }
        }
    }

    /**
     * Assure la fabrication d'un ou de tous les blocs Gauche et Droite.
     *
     * @param   int|string     $Xid        Id du block.
     * @param   string         $Xblock     Type du block droite ou gauche.
     * @param   string         $moreclass  Class  css du block.
     *
     * @return  void
     */
    private function Pre_fab_block(int|string $Xid, string $Xblock, string $moreclass)
    {
        global $htvar, $bloc_side;
        
        if ($Xid) {
            $result = $Xblock == 'RB' 
                ? sql_query("SELECT title, content, member, cache, actif, id, css 
                            FROM " . sql_prefix('rblocks')  . " 
                            WHERE id='$Xid'") 

                : sql_query("SELECT title, content, member, cache, actif, id, css 
                            FROM " . sql_prefix('lblocks')  . " 
                            WHERE id='$Xid'");
        } else {
            $result = $Xblock == 'RB' 
                ? sql_query("SELECT title, content, member, cache, actif, id, css 
                            FROM " . sql_prefix('rblocks')  . " 
                            ORDER BY Rindex ASC") 

                : sql_query("SELECT title, content, member, cache, actif, id, css 
                            FROM " . sql_prefix('lblocks') . " 
                            ORDER BY Lindex ASC");
        }  

        $bloc_side = $Xblock == 'RB' ? 'RIGHT' : 'LEFT';

        while (list($title, $content, $member, $cache, $actif, $id, $css) = sql_fetch_row($result)) {
            if (($actif) or ($Xid)) {
                
                $htvar = ($css == 1) 
                    ? '<div class="' . $moreclass . '" id="' . $Xblock . '_' . $id . '">' 
                    : '<div class="' . $moreclass . ' ' . strtolower($bloc_side) . 'bloc">';

                $this->fab_block($title, $member, $content, $cache);
            }
        }

        sql_free_result($result);
    }
 
    /**
     * Retourne le niveau d'autorisation d'un block (et donc de certaines fonctions)
     * le paramètre (une expression régulière) est le contenu du bloc (function#....)
     *
     * @param   string  $Xcontent  Contenue du block.
     *
     * @return  mixed
     */
    private function niv_block(string $Xcontent)
    {
        $result_r = sql_query("SELECT member, actif 
                            FROM " . sql_prefix('rblocks') . " 
                            WHERE content REGEXP '$Xcontent'");
        
        if (sql_num_rows($result_r)) {
            list($member, $actif) = sql_fetch_row($result_r);

            return ($member . ',' . $actif);
        }

        sql_free_result($result_r);

        $result_l = sql_query("SELECT member, actif 
                            FROM " . sql_prefix('lblocks') . " 
                            WHERE content REGEXP '$Xcontent'");
        
        if (sql_num_rows($result_l)) {
            list($member, $actif) = sql_fetch_row($result_l);

            return ($member . ',' . $actif);
        }

        sql_free_result($result_l);
    }

}
