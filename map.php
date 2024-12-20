<?php

declare(strict_types=1);

use Npds\Http\Controller;
use Npds\Support\Facades\Auth;
use Npds\Cache\SuperCacheEmpty;
use Npds\Support\Facades\Forum;
use Npds\Support\Facades\Theme;
use Npds\Cache\SuperCacheManager;
use Npds\Support\Facades\Request;
use Npds\Support\Facades\Language;


if (!function_exists("Mysql_Connexion")) {
    include("Boot/grab_globals.php");
}

/**
 * [FriendController description]
 */
class MapController extends Controller
{

    /**
     * [description]
     */
    use MapPrivate;


    /**
     * [index description]
     *
     * @return  [type]  [return description]
     */
    public function index()
    {
        global $SuperCache;  
             
        Theme::header();

        // Include cache manager classe

        if ($SuperCache) {
            $cache_obj = new SuperCacheManager();
            $CACHE_TIMINGS['map.php'] = 3600;
            $CACHE_QUERYS['map.php'] = '^';
            $cache_obj->startCachingPage();
        } else {
            $cache_obj = new SuperCacheEmpty();
        }
        
        if (($cache_obj->genereting_output == 1) or ($cache_obj->genereting_output == -1) or (!$SuperCache)) {
            echo '
            <h2>' . translate("Plan du site") . '</h2>
            <hr />';

            //
            $this->mapsections();

            //
            $this->mapforum();

            //
            $this->maptopics();

            //
            $this->mapcategories();

            //
            $this->mapfaq();
            
            echo '<br />';
        
            if (file_exists(theme_path('default/include/user.inc'))) {
                include(theme_path('default/include/user.inc'));
            }
        }
        
        if ($SuperCache) {
            $cache_obj->endCachingPage();
        }
        
        Theme::footer();
    }

}


/**
 * [LnlPrivate description]
 */
trait MapPrivate
{

    /**
     * [mapsections description]
     *
     * @return  void
     */
    protected function mapsections()
    {
        $tmp = '';

        $result = sql_query("SELECT rubid, rubname 
                            FROM " . sql_prefix('rubriques') . " 
                            WHERE enligne='1' 
                            AND rubname<>'Divers' 
                            AND rubname<>'Presse-papiers' 
                            ORDER BY ordre");
        
        if (sql_num_rows($result) > 0) {
            while (list($rubid, $rubname) = sql_fetch_row($result)) {

                if ($rubname != '') {
                    $tmp .= '<li>' . Language::aff_langue($rubname);
                }

                $result2 = sql_query("SELECT secid, secname, image, userlevel, intro 
                                    FROM " . sql_prefix('sections') . " 
                                    WHERE rubid='$rubid' 
                                    AND (userlevel='0' OR userlevel='') 
                                    ORDER BY ordre");
                
                if (sql_num_rows($result2) > 0) {

                    while (list($secid, $secname, $userlevel) = sql_fetch_row($result2)) {
                        if (Auth::autorisation($userlevel)) {

                            $tmp .= '<ul><li>' . Language::aff_langue($secname);

                            $result3 = sql_query("SELECT artid, title 
                                                FROM " . sql_prefix('seccont') . " 
                                                WHERE secid='$secid'");

                            while (list($artid, $title) = sql_fetch_row($result3)) {
                                $tmp .= "<ul>
                                    <li>
                                        <a href=\"" . site_url('sections.php?op=viewarticle&amp;artid=' . $artid) . "\">
                                            " . Language::aff_langue($title) . '
                                        </a>
                                    </li>
                                </ul>';
                            }

                            $tmp .= '</li>
                            </ul>';
                        }
                    }
                }

                $tmp .= '</li>';
            }
        }

        if ($tmp != '') {
            echo '
                <h3>
                <a class="" data-bs-toggle="collapse" href="#collapseSections" aria-expanded="false" aria-controls="collapseSections">
                <i class="toggle-icon fa fa-caret-down"></i></a>&nbsp;' . translate("Rubriques") . '
                <span class="badge bg-secondary float-end">' . sql_num_rows($result) . '</span>
                </h3>
            <div class="collapse" id="collapseSections">
                <div class="card card-body">
                <ul class="list-unstyled">' . $tmp . '</ul>
                </div>
            </div>
            <hr />';
        }

        sql_free_result($result);

        if (isset($result2)) {
            sql_free_result($result2);
        }

        if (isset($result3)) {
            sql_free_result($result3);
        }
    }

    /**
     * [mapforum description]
     *
     * @return  void
     */
    protected function mapforum()
    {
        $tmp = '';

        $tmp .= Forum::RecentForumPosts_fab('', 10, 0, false, 50, false, '<li>', false);

        if ($tmp != '') {
            echo '
            <h3>
                <a data-bs-toggle="collapse" href="#collapseForums" aria-expanded="false" aria-controls="collapseForums">
                    <i class="toggle-icon fa fa-caret-down"></i>
                </a>&nbsp;' . translate("Forums") . '
            </h3>
            <div class="collapse" id="collapseForums">
                <div class="card card-body">
                    ' . $tmp . '
                </div>
            </div>
            <hr />';
        }
    }

    /**
     * [maptopics description]
     *
     * @return  void
     */
    protected function maptopics()
    {
        $lis_top = '';

        $result = sql_query("SELECT topicid, topictext 
                            FROM " . sql_prefix('topics') . " 
                            ORDER BY topicname");

        while (list($topicid, $topictext) = sql_fetch_row($result)) {

            $result2 = sql_query("SELECT sid 
                                FROM " . sql_prefix('stories') . " 
                                WHERE topic='$topicid'");

            $nb_article = sql_num_rows($result2);

            $lis_top .= '<li>
                <a href="' . site_url('search.php?query=&amp;topic=' . $topicid) . '">
                    ' . Language::aff_langue($topictext) . '
                </a>&nbsp;<span class="">(' . $nb_article . ')</span>
            </li>';
        }

        if ($lis_top != '') {
            echo '
            <h3>
                <a class="" data-bs-toggle="collapse" href="#collapseTopics" aria-expanded="false" aria-controls="collapseTopics">
                    <i class="toggle-icon fa fa-caret-down"></i>
                </a>&nbsp;' . translate("Sujets") . '
                <span class="badge bg-secondary float-end">' . sql_num_rows($result) . '</span>
            </h3>
            <div class="collapse" id="collapseTopics">
                <div class="card card-body">
                    <ul class="list-unstyled">' . $lis_top . '</ul>
                </div>
            </div>
            <hr />';
        }

        sql_free_result($result);
        sql_free_result($result2);
    }

    /**
     * [mapcategories description]
     *
     * @return  void
     */
    protected function mapcategories()
    {
        $lis_cat = '';

        $result = sql_query("SELECT catid, title 
                            FROM " . sql_prefix('stories_cat') . " 
                            ORDER BY title");

        while (list($catid, $title) = sql_fetch_row($result)) {

            $result2 = sql_query("SELECT sid 
                                FROM " . sql_prefix('stories') . " 
                                WHERE catid='$catid'");

            $nb_article = sql_num_rows($result2);

            $lis_cat .= '<li>
                <a href="' . site_url('index.php?op=newindex&amp;catid=' . $catid) . '">
                    ' . Language::aff_langue($title) . '
                </a> 
                <span class="float-end badge bg-secondary"> ' . $nb_article . ' </span></li>' . "\n";
        }

        if ($lis_cat != '')
            echo '
            <h3>
                <a class="" data-bs-toggle="collapse" href="#collapseCategories" aria-expanded="false" aria-controls="collapseCategories">
                    <i class="toggle-icon fa fa-caret-down"></i>
                </a>&nbsp;' . translate("Catégories") . '
                <span class="badge bg-secondary float-end">' . sql_num_rows($result) . '</span>
            </h3>
            <div class="collapse" id="collapseCategories">
                <div class="card card-body">
                    <ul class="list-unstyled">' . $lis_cat . '</ul>
                </div>
            </div>
            <hr />';

        sql_free_result($result);

        if (isset($result2)) {
            sql_free_result($result2);
        }
    }

    /**
     * [mapfaq description]
     *
     * @return  void
     */
    protected function mapfaq()
    {
        $lis_faq = '';

        $result = sql_query("SELECT id_cat, categories 
                            FROM " . sql_prefix('faqcategories') . " 
                            ORDER BY id_cat ASC");

        while (list($id_cat, $categories) = sql_fetch_row($result)) {
            $catname = Language::aff_langue($categories);

            $lis_faq .= "<li>
                <a href=\"" . site_url('faq.php?id_cat=' . $id_cat . '&amp;myfaq=yes&amp;categories=' . urlencode($catname)) . "\">
                    " . $catname . "
                </a>
            </li>\n";
        }

        if ($lis_faq != '') {
            echo '
            <h3>
                <a class="" data-bs-toggle="collapse" href="#collapseFaq" aria-expanded="false" aria-controls="collapseFaq">
                    <i class="toggle-icon fa fa-caret-down"></i>
                </a>&nbsp;' . translate("FAQ - Questions fréquentes") . '
                <span class="badge bg-secondary float-end">' . sql_num_rows($result) . '</span>
            </h3>
            <div class="collapse" id="collapseFaq">
                <div class="card card-body">
                    <ul class="">' . $lis_faq . '</ul>
                </div>
            </div>
            <hr />';
        }

        sql_free_result($result);
    }

}


switch (Request::input('')) 
{

    default:
        controllerStart(
            MapController::class, 'index'
        );
        break;

}
