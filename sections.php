<?php

declare(strict_types=1);

use Npds\Config\Config;
use Npds\Http\Controller;
use Npds\Support\Facades\Auth;
use Npds\Support\Facades\Code;
use Npds\Support\Facades\Url;
use Npds\Support\Facades\Theme;
use Npds\Support\Facades\Request;
use Npds\Support\Facades\Language;
use Npds\Support\Facades\Metalang;
use Npds\Cache\SuperCacheEmpty;
use Npds\Cache\SuperCacheManager;


if (!function_exists("Mysql_Connexion")) {
    include("Boot/grab_globals.php");
}


/**
 * [SectionController description]
 */
class SectionController extends Controller
{
    /**
     * [description]
     */
    use SectionPrivate;


    /**
     * [listsections description]
     *
     * @param   ?int  $rubric  [$rubric description]
     *
     * @return  void
     */
    public function listSections(?int $rubric)
    {
        global $admin;

        Theme::header();

        global $SuperCache;

        if ($SuperCache) {
            $cache_obj = new SuperCacheManager();
            $cache_obj->startCachingPage();
        } else {
            $cache_obj = new SuperCacheEmpty();
        }

        if (($cache_obj->genereting_output == 1) or ($cache_obj->genereting_output == -1) or (!$SuperCache)) {

            if ($rubric) {
                $sqladd = "AND rubid='" . $rubric . "'";
            } else {
                $sqladd = '';
            }

            if ($admin) {
                $result = sql_query("SELECT rubid, rubname, intro 
                                    FROM " . sql_prefix('rubriques') . " 
                                    WHERE rubname<>'Divers' 
                                    AND rubname<>'Presse-papiers' $sqladd 
                                    ORDER BY ordre");

                $nb_r = sql_num_rows($result);
            } else {
                $result = sql_query("SELECT rubid, rubname, intro 
                                    FROM " . sql_prefix('rubriques') . " 
                                    WHERE enligne='1' 
                                    AND rubname<>'Divers' 
                                    AND rubname<>'Presse-papiers' $sqladd 
                                    ORDER BY ordre");

                $nb_r = sql_num_rows($result);
            }

            $aff = '';

            if ($rubric) {
                $aff .= '<span class="lead">
                    <a href="' . site_url('sections.php') .'" title="' . translate("Retour à l'index des rubriques") . '" data-bs-toggle="tooltip">
                        Index
                    </a>
                </span>
                <hr />';
            }

            $aff .= '<h2>' . translate("Rubriques") . '<span class="float-end badge bg-secondary">' . $nb_r . '</span></h2>';

            if (sql_num_rows($result) > 0) {

                while (list($rubid, $rubname, $intro) = sql_fetch_row($result)) {
                    $result2 = sql_query("SELECT secid, secname, image, userlevel, intro 
                                        FROM " . sql_prefix('sections') . " 
                                        WHERE rubid='$rubid' 
                                        ORDER BY ordre");

                    $nb_section = sql_num_rows($result2);

                    $aff .= '
                    <hr />
                    <h3>';

                    if ($nb_section !== 0) {
                        $aff .= '<a href="#" class="arrow-toggle text-primary" data-bs-toggle="collapse" data-bs-target="#rub-' . $rubid . '" >
                                <i class="toggle-icon fa fa-caret-down"></i>
                            </a>';
                    } else {
                        $aff .= '<i class="fa fa-caret-down text-body-secondary invisible "></i>';
                    }

                    $aff .= '
                            <a class="ms-2" href="' . site_url('sections.php?rubric=' . $rubid) . '">
                                ' . Language::aff_langue($rubname) . '
                            </a>
                            <span class=" float-end">
                                #NEW#
                                <span class="badge bg-secondary" title="' . translate("Sous-rubrique") . '" data-bs-toggle="tooltip" data-bs-placement="left">
                                 ' . $nb_section . '
                                </span>
                            </span>
                        </h3>';

                    if ($intro != ''){
                        $aff .= '<p class="text-body-secondary">' . Language::aff_langue($intro) . '</p>';
                    }

                    $aff .= '<div id="rub-' . $rubid . '" class="collapse" >';

                    while (list($secid, $secname, $image, $userlevel, $intro) = sql_fetch_row($result2)) {
                        $okprintLV1 = $this->autorisationSection($userlevel);

                        $aff1 = '';
                        $aff2 = '';

                        if ($okprintLV1) {
                            $result3 = sql_query("SELECT artid, title, counter, userlevel, timestamp 
                                                FROM " . sql_prefix('seccont') . " 
                                                WHERE secid='$secid' 
                                                ORDER BY ordre");

                            $nb_art = sql_num_rows($result3);
                            
                            $aff .= '
                            <div class="card card-body mb-2" id="rub_' . $rubid . 'sec_' . $secid . '">
                                <h4 class="mb-2">';

                            if ($nb_art !== 0){ 
                                $aff .= '<a href="#" class="arrow-toggle text-primary" data-bs-toggle="collapse" data-bs-target="#sec' . $secid . '" aria-expanded="true" aria-controls="sec' . $secid . '">
                                    <i class="toggle-icon fa fa-caret-up"></i>
                                </a>&nbsp;';
                            }

                            $aff1 = aff_langue($secname) . '<span class=" float-end">#NEW#<span class="badge bg-secondary" title="' . translate("Articles") . '" data-bs-toggle="tooltip" data-bs-placement="left">
                                ' . $nb_art . '</span>
                                </span>';
                            
                            if ($image != '') {
                                if (file_exists(asset_path('images/sections/' . $image))) {
                                    $imgtmp = asset_url('images/sections/' . $image);
                                } else {
                                    $imgtmp = $image;
                                }

                                // $suffix = strtoLower(substr(strrchr(basename($image), '.'), 1));
                                $aff1 .= '<img class="img-fluid" src="' . $imgtmp . '" alt="' . Language::aff_langue($secname) . '" /><br />';
                            }

                            $aff1 .= '</h4>';

                            if ($intro != '') {
                                $aff1 .= '<p class="">' . Language::aff_langue($intro) . '</p>';
                            }

                            $aff2 = '
                            <div id="sec' . $secid . '" class="collapse show">
                                <div class="">';

                            // $noartid = false;

                            while (list($artid, $title, $counter, $userlevel, $timestamp) = sql_fetch_row($result3)) {

                                $okprintLV2 = $this->autorisationSection($userlevel);
                                $nouveau = '';

                                if ($okprintLV2) {
                                    // $noartid = true;
                                    $nouveau = 'oo';

                                    if ((time() - $timestamp) < (86400 * 7)) {
                                        $nouveau = '';
                                    }

                                    $aff2 .= '<a href="' . site_url('sections.php?op=viewarticle&amp;artid=' . $artid) . '">
                                            ' . Language::aff_langue($title) . '
                                        </a>
                                        <span class="float-end">
                                            <small>' . translate("lu : ") . ' ' . $counter . ' ' . translate("Fois") . '</small>';
                                    
                                    if ($nouveau == '') {
                                        $aff2 .= '<i class="far fa-star ms-3 text-success"></i>';

                                        $aff1 = str_replace('#NEW#', '<span class="me-2 badge bg-success animated faa-flash">N</span>', $aff1);
                                        $aff = str_replace('#NEW#', '<span class="me-2 badge bg-success animated faa-flash">N</span>', $aff);
                                    }

                                    $aff2 .= '</span><br />';
                                }
                            }

                            $aff = str_replace('#NEW#', '', $aff);
                            $aff1 = str_replace('#NEW#', '', $aff1);

                            $aff2 .= '
                                    </div>
                                </div>
                            </div>';

                        }

                        $aff .= $aff1 . $aff2;
                    }

                    $aff .= '</div>';
                }
            }

            echo $aff; 

            /*
            if ($rubric) {
                echo '<a class="btn btn-secondary" href="' . site_url('sections.php') . '">
                    ' . translate("Return to Sections Index") . '
                </a>';
            }
            */

            sql_free_result($result);
        }

        if ($SuperCache) {
            $cache_obj->endCachingPage();
        }

        Theme::footer();
    }

    /**
     * [listarticles description]
     *
     * @param   int  $secid  [$secid description]
     *
     * @return  void
     */
    public function listArticles(int $secid)
    {
        global $prev;

        $result = sql_query("SELECT secname, rubid, image, intro, userlevel 
                            FROM " . sql_prefix('sections') . " 
                            WHERE secid='$secid'");

        list($secname, $rubid, $image, $intro, $userlevel) = sql_fetch_row($result);

        list($rubname) = sql_fetch_row(sql_query("SELECT rubname 
                                                FROM " . sql_prefix('rubriques') . " 
                                                WHERE rubid='$rubid'"));

        if (Config::get('sections.sections_chemin') == 1) {
            $chemin = '<span class="lead">
                    <a href="' . site_url('sections.php') . '" title="' . translate("Retour à l'index des rubriques") . '" data-bs-toggle="tooltip">
                        Index
                    </a>
                    &nbsp;/&nbsp;
                    <a href="' . site_url('sections.php?rubric=' . $rubid) . '">
                        ' . Language::aff_langue($rubname) . '
                    </a>
                </span>';
        }

        $title =  Language::aff_langue($secname);

        Theme::header();

        global $SuperCache;
        if ($SuperCache) {
            $cache_obj = new SuperCacheManager();
            $cache_obj->startCachingPage();
        } else {
            $cache_obj = new SuperCacheEmpty();
        }

        if (($cache_obj->genereting_output == 1) or ($cache_obj->genereting_output == -1) or (!$SuperCache)) {
            $okprint1 = $this->autorisationSection($userlevel);

            if ($okprint1) {
                $result = sql_query("SELECT artid, secid, title, content, userlevel, counter, timestamp 
                                    FROM " . sql_prefix('seccont') . " 
                                    WHERE secid='$secid' 
                                    ORDER BY ordre");

                $nb_art = sql_num_rows($result);
                
                if ($prev == 1) {
                    echo '<input class="btn btn-primary" type="button" value="' . translate("Retour à l'administration") . '" onclick="javascript:history.back()" />
                    <br />
                    <br />';
                }

                //if (function_exists("themesection_title")) {
                if (method_exists(Theme::class, 'themesection_title')) {
                    Theme::themesection_title($title);
                } else {
                    echo $chemin . '
                    <hr />
                    <h3 class="mb-3">
                        ' . $title . '
                        <span class="float-end">
                            <span class="badge bg-secondary" title="' . translate("Articles") . '" data-bs-toggle="tooltip" data-bs-placement="left">
                                ' . $nb_art . '
                            </span>
                        </span>
                    </h3>';
                }

                if ($intro != '') {
                    echo Language::aff_langue($intro);
                }

                if ($image != '') {
                    if (file_exists(asset_path('images/sections/' . $image))) {
                        $imgtmp = asset_url('images/sections/' . $image);
                    } else {
                        $imgtmp = $image;
                    }

                    // $suffix = strtoLower(substr(strrchr(basename($image), '.'), 1));

                    echo '<p class="text-center"><img class="img-fluid" src="' . $imgtmp . '" alt="" /></p>';
                }

                echo '
                <p>' . translate("Voici les articles publiés dans cette rubrique.") . '</p>
                <div class="card card-body mb-3">';

                while (list($artid, $secid, $title, $content, $userlevel, $counter, $timestamp) = sql_fetch_row($result)) {
                    $okprint2 = $this->autorisationSection($userlevel);

                    if ($okprint2) {
                        $nouveau = 'oo';

                        if ((time() - $timestamp) < (86400 * 7)) {
                            $nouveau = '';
                        }

                        echo '
                        <div class="mb-1">
                            <a href="' . site_url('sections.php?op=viewarticle&amp;artid=' . $artid) . '">
                                ' . Language::aff_langue($title) . '
                            </a>
                            <small>
                                ' . translate("lu : ") . ' ' . $counter . ' ' . translate("Fois") . '
                            </small>
                            <span class="float-end">
                                <a href="' . site_url('sections.php?op=printpage&amp;artid=' . $artid) . '" title="' . translate("Page spéciale pour impression") . '" data-bs-toggle="tooltip" data-bs-placement="left">
                                    <i class="fa fa-print fa-lg"></i>
                                </a>
                            </span>';
                        
                        if ($nouveau == '') {
                            echo '&nbsp;<i class="fa fa-star-o text-success"></i>';
                        }

                        echo '</div>';

                    }
                }

                echo '</div>';

                /*
                echo '<a class="btn btn-secondary" href="' . site_url('sections.php') . '">
                    ' . translate("Return to Sections Index") . '
                </a>';
                */
            } else {
                Url::redirect_url("sections.php");
            }

            sql_free_result($result);
        }

        if ($SuperCache) {
            $cache_obj->endCachingPage();
        }

        Theme::footer();
    }

    /**
     * [viewarticle description]
     *
     * @param   int     $artid  [$artid description]
     * @param   string  $page   [$page description]
     *
     * @return  void
     */
    public function viewArticle(int $artid, string $page)
    {
        global $prev, $numpage;

        if ($this->verifAff($artid)) {
            
            $numpage = $page;

            if ($page == '') {
                sql_query("UPDATE " . sql_prefix('seccont') . " SET counter=counter+1 WHERE artid='$artid'");
            }

            $result_S = sql_query("SELECT artid, secid, title, content, counter, userlevel 
                                FROM " . sql_prefix('seccont') . " 
                                WHERE artid='$artid'");

            list($artid, $secid, $title, $Xcontent, $counter, $userlevel) = sql_fetch_row($result_S);

            list($secid, $secname, $rubid) = sql_fetch_row(sql_query("SELECT secid, secname, rubid 
                                                                    FROM " . sql_prefix('sections') . " 
                                                                    WHERE secid='$secid'"));

            list($rubname) = sql_fetch_row(sql_query("SELECT rubname 
                                                    FROM " . sql_prefix('rubriques') . " 
                                                    WHERE rubid='$rubid'"));

            $tmp_auto = explode(',', $userlevel);

            foreach ($tmp_auto as $userlevel) {
                $okprint = $this->autorisationSection($userlevel);

                if ($okprint) {
                    break;
                }
            }

            if ($okprint) {
                $pindex = substr(substr($page, 5), 0, -1);

                if ($pindex != '') {
                    $pindex = translate("Page") . ' ' . $pindex;
                }

                if (Config::get('sections.sections_chemin') == 1) {
                    $chemin = '<span class="lead">
                        <a href="' . site_url('sections.php') . '">
                            Index
                        </a>
                        &nbsp;/&nbsp;
                        <a href="' . site_url('sections.php?rubric=' . $rubid) . '">
                            ' . Language::aff_langue($rubname) . '
                        </a>
                        &nbsp;/&nbsp;
                        <a href="' . site_url('sections.php?op=listarticles&amp;secid=' . $secid) . '">
                            ' . Language::aff_langue($secname) . '
                        </a>
                    </span>';
                }

                $title = Language::aff_langue($title);

                Theme::header();

                global $SuperCache;
                if ($SuperCache) {
                    $cache_obj = new SuperCacheManager();
                    $cache_obj->startCachingPage();
                } else {
                    $cache_obj = new SuperCacheEmpty();
                }

                if (($cache_obj->genereting_output == 1) or ($cache_obj->genereting_output == -1) or (!$SuperCache)) {
                    $words = sizeof(explode(' ', $Xcontent));

                    if ($prev == 1) {
                        echo '<input class="btn btn-secondary" type="button" value="' . translate("Retour à l'administration") . '" onclick="javascript:history.back()" />
                        <br />
                        <br />';
                    }

                    //if (function_exists("themesection_title")) {
                    if (method_exists(Theme::class, 'themesection_title')) {
                        Theme::themesection_title($title);
                    } else {
                        echo $chemin . '
                        <hr />
                        <h3 class="mb-2">' . $title . '<span class="small text-body-secondary"> - ' . $pindex . '</span></h3>
                        <p>
                            <span class="text-body-secondary small">
                                (' . $words . ' ' . translate("mots dans ce texte )") . '&nbsp;-&nbsp;' . translate("lu : ") . ' ' . $counter . ' ' . translate("Fois") . '
                            </span>
                            <span class="float-end">
                                <a href="' . site_url('sections.php?op=printpage&amp;artid=' . $artid) . '" title="' . translate("Page spéciale pour impression") . '" data-bs-toggle="tooltip" data-bs-placement="left">
                                    <i class="fa fa-print fa-lg ms-3"></i>
                                </a>
                            </span>
                        </p>
                        <hr />';
                    }

                    preg_match_all('#\[page.*\]#', $Xcontent, $rs);
                    
                    $ndepages = count($rs[0]);

                    if ($page != '') {
                        $Xcontent = substr($Xcontent, strpos($Xcontent, $page) + strlen($page));
                        $multipage = true;
                    } else {
                        $multipage = false;
                    }

                    $pos_page = strpos($Xcontent, '[page');
                    $longueur = mb_strpos($Xcontent, ']', $pos_page, 'iso-8859-1') - $pos_page + 1;

                    if ($pos_page) {
                        $pageS = substr($Xcontent, $pos_page, $longueur);
                        $Xcontent = substr($Xcontent, 0, $pos_page);

                        $Xcontent .= '
                        <nav class="d-flex mt-3">
                            <ul class="mx-auto pagination pagination-sm">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#">
                                        ' . $ndepages . ' pages
                                    </a>
                                </li>';
                        
                        if ($pageS !== '[page0]') {
                            $Xcontent .= '<li class="page-item">
                                <a class="page-link" href="' . site_url('sections.php?op=viewarticle&amp;artid=' . $artid) . '">
                                    ' . translate("Début de l'article") . '
                                </a>
                            </li>';
                        }

                        $Xcontent .= '
                                <li class="page-item active">
                                    <a class="page-link">
                                        ' . preg_replace('#\[(page)(.*)(\])#', '\1 \2', $pageS) . '
                                    </a></li>
                                <li class="page-item">
                                    <a class="page-link" href="' . site_url('sections.php?op=viewarticle&amp;artid=' . $artid . '&amp;page=' . $pageS) . '" >
                                        ' . translate("Page suivante") . '
                                    </a>
                                </li>
                            </ul>
                        </nav>';
                    } else if ($multipage) {
                        $Xcontent .= '
                        <nav class="d-flex mt-3">
                            <ul class="mx-auto pagination pagination-sm">
                                <li class="page-item">
                                    <a class="page-link" href="' . site_url('sections.php?op=viewarticle&amp;artid=' . $artid . '&amp;page=[page0]') . '">
                                        ' . translate("Début de l'article") . '
                                    </a>
                                </li>
                            </ul>
                        </nav>';
                    }

                    $Xcontent = Code::aff_code(Language::aff_langue($Xcontent));

                    echo '<div id="art_sect">' . Metalang::meta_lang($Xcontent) . '</div>';

                    $artidtempo = $artid;

                    if ($rubname != 'Divers') {
                        /*
                        echo '<hr />
                            <p>
                                <a class="btn btn-secondary" href="' . site_url('sections.php') . '">
                                    ' . translate("Return to Sections Index") . '
                                </a>
                            </p>'; 

                        echo '<h4>***<strong>' . translate("Back to chapter:") . '</strong></h4>';
                        
                        echo '<ul class="list-group">
                            <li class="list-group-item">
                                <a href="' . site_url('sections.php?op=listarticles&amp;secid=' . $secid) . '">
                                    ' . aff_langue($secname) . '
                                </a>
                            </li>
                        </ul>';
                        */

                        $result3 = sql_query("SELECT artid, secid, title, userlevel 
                                            FROM " . sql_prefix('seccont') . " 
                                            WHERE (artid<>'$artid' 
                                            AND secid='$secid') 
                                            ORDER BY ordre");

                        $nb_article = sql_num_rows($result3);

                        if ($nb_article > 0) {
                            echo '
                            <h4 class="my-3">
                                ' . translate("Autres publications de la sous-rubrique") . '
                                <span class="badge bg-secondary float-end">' . $nb_article . '</span>
                            </h4>
                            <ul class="list-group">';

                            while (list($artid, $secid, $title, $userlevel) = sql_fetch_row($result3)) {
                                $okprint2 = $this->autorisationSection($userlevel);

                                if ($okprint2) {
                                    echo '<li class="list-group-item list-group-item-action">
                                        <a href="' . site_url('sections.php?op=viewarticle&amp;artid=' . $artid) . '">
                                            ' . Language::aff_langue($title) . '
                                        </a>
                                    </li>';
                                }
                            }

                            echo '</ul>';
                        }
                    }

                    $resultconnexe = sql_query("SELECT id2 
                                                FROM " . sql_prefix('compatsujet') . " 
                                                WHERE id1='$artidtempo'");

                    if (sql_num_rows($resultconnexe) > 0) {
                        echo '
                        <h4 class="my-3">' . translate("Cela pourrait vous intéresser") . '
                            <span class="badge bg-secondary float-end">' . sql_num_rows($resultconnexe) . '</span>
                        </h4>
                        <ul class="list-group">';

                        while (list($connexe) = sql_fetch_row($resultconnexe)) {

                            $resultpdtcompat = sql_query("SELECT artid, title, userlevel 
                                                        FROM " . sql_prefix('seccont') . " 
                                                        WHERE artid='$connexe'");

                            list($artid2, $title, $userlevel) = sql_fetch_row($resultpdtcompat);

                            $okprint2 = $this->autorisationSection($userlevel);

                            if ($okprint2) {
                                echo '<li class="list-group-item list-group-item-action">
                                    <a href="' . site_url('sections.php?op=viewarticle&amp;artid=' . $artid2) . '">
                                        ' . Language::aff_langue($title) . '
                                    </a>
                                </li>';
                            }
                        }

                        echo '</ul>';
                    }
                }

                sql_free_result($result_S);

                if ($SuperCache) {
                    $cache_obj->endCachingPage();
                }

                Theme::footer();
            } else {
                header('location:' . site_url('sections.php'));
            }
        } else {
            header('location:' . site_url('sections.php'));
        }    
    }

    /**
     * [PrintSecPage description]
     *
     * @param   int  $artid  [$artid description]
     *
     * @return  void
     */
    public function PrintSecPage(int $artid)
    {
        if ($this->verifAff($artid)) {

            include(storage_path('meta/meta.php'));

            echo '
                    <link rel="stylesheet" href="' . asset_url('shared/bootstrap/dist/css/bootstrap.min.css') . '" />
                </head>
                <body>
                    <div id="print_sect" max-width="640" class="container p-1 n-hyphenate">
                        <p class="text-center">';

            $site_logo = Config::get('npds.site_logo');

            echo strpos($site_logo, "/") 
                ? '<img src="' . $site_logo . '" alt="logo" />' 
                : '<img src="' . asset_url('images/' . $site_logo) . '" alt="logo" />';

            $result = sql_query("SELECT title, content 
                                FROM " . sql_prefix('seccont') . " 
                                WHERE artid='$artid'");

            list($title, $content) = sql_fetch_row($result);

            echo '<strong class="my-3 d-block">' . Language::aff_langue($title) . '</strong></p>';

            $content = Code::aff_code(Language::aff_langue($content));
            
            if (strpos($content, "[page")) {
                $content = str_replace("[page", str_repeat("-", 50) . "&nbsp;[page", $content);
            }

            echo Metalang::meta_lang($content);

            echo '
                        <hr />
                        <p class="text-center">
                        ' . translate("Cet article provient de") . ' ' . Config::get('npds.sitename') . '<br /><br />
                        ' . translate("L'url pour cet article est : ") . '
                        <a href="' . site_url('sections.php?op=viewarticle&amp;artid=' . $artid) . '">' . site_url('sections.php?op=viewarticle&amp;artid=' . $artid) . '</a>
                        </p>
                        </div>
                        <script type="text/javascript" src="' . asset_url('js/jquery.min.js') . '"></script>
                        <script type="text/javascript" src="' . asset_url('shared/bootstrap/dist/js/bootstrap.bundle.min.js') . '"></script>
                        <script type="text/javascript" src="' . asset_url('js/npds_adapt.js') . '"></script>
                    </body>
                </html>';
        } else {
            header('location:' . site_url('sections.php'));
        }            
    }

}

/**
 * [SectionPrivate description]
 */
trait SectionPrivate
{

    /**
     * [autorisation_section description]
     *
     * @param   string  $userlevel  [$userlevel description]
     *
     * @return  mixed
     */
    private function autorisationSection(string $userlevel)
    {
        $okprint = false;

        $tmp_auto = explode(',', $userlevel);

        foreach ($tmp_auto as $userlevel) {
            $okprint = Auth::autorisation($userlevel);

            if ($okprint) {
                break;
            }
        }

        return $okprint;
    }

    /**
     * [verif_aff description]
     *
     * @param   int  $artid  [$artid description]
     *
     * @return  mixed
     */
    private function verifAff(int $artid)
    {
        $okprint = false; 

        $result = sql_query("SELECT secid 
                            FROM " . sql_prefix('seccont') . " 
                            WHERE artid='$artid'");

        list($secid) = sql_fetch_row($result);

        $result = sql_query("SELECT userlevel 
                            FROM " . sql_prefix('sections') . " 
                            WHERE secid='$secid'");

        list($userlevel) = sql_fetch_row($result);

        $okprint = $this->autorisation_section($userlevel);

        return $okprint;
    }

}

switch (Request::input('op')) 
{
    case 'viewarticle':
        controllerStart(
            SectionController::class, 
            'viewArticle',
            [
                // int
                Request::query('artid'), 
                // string
                Request::query('page')
            ]
        );
        break;

    case 'listarticles':
        controllerStart(
            SectionController::class, 
            'listArticles',
            [
                // int
                Request::query('secid')
            ]
        );
        break;

    case 'printpage':
        controllerStart(
            SectionController::class, 
            'PrintSecPage',
            [
                // int
                Request::query('artid')
            ]
        );
        break;

    default:
        controllerStart(
            SectionController::class, 
            'listSections', 
            [
                // ?int nullable
                Request::query('rubric')
            ]
        );
        break;

}

