<?php

declare(strict_types=1);

use Npds\Config\Config;
use Npds\Http\Controller;
use Npds\Support\Facades\Code;
use Npds\Support\Facades\News;
use Npds\Support\Facades\User;
use Npds\Cache\SuperCacheEmpty;
use Npds\Support\Facades\Theme;
use Npds\Cache\SuperCacheManager;
use Npds\Support\Facades\Request;
use Npds\Support\Facades\Language;
use Npds\Support\Facades\Metalang;


if (!function_exists("Mysql_Connexion")) {
    include("Boot/grab_globals.php");
}


/**
 * [IndexController description]
 */
class ArticleController extends Controller
{

    /**
     * [index description]
     *
     * @param   ?int  $sid      [$sid description]
     * @param   ?int  $archive  [$archive description]
     * @param   ?int  $tid      [$tid description]
     *
     * @return  void
     */
    //public function article(?int $sid, ?int $archive, ?int $tid = 0)
    public function article(?int $sid, ?int $archive)
    {
        global $SuperCache, $topicname, $topicimage, $topictext, $boxtitle, $boxstuff;

        //if (!isset($sid) && !isset($tid)) {
        if (!isset($sid)) {
            header('Location:' . site_url('index.php'));
        }

        $xtab = (!$archive)
            ? News::news_aff("libre", "WHERE sid='$sid'", 1, 1)
            : News::news_aff("archive", "WHERE sid='$sid'", 1, 1);

        list($sid, $catid, $aid, $title, $time, $hometext, $bodytext, $comments, $counter, $topic, $informant, $notes) = $xtab[0];

        if (!$aid) {
            header('Location:' . site_url('index.php'));
        }

        sql_query("UPDATE " . sql_prefix('stories') . " 
                SET counter=counter+1 
                WHERE sid='$sid'");

        Theme::header();

        // Include cache manager
        if ($SuperCache) {
            $cache_obj = new SuperCacheManager();
            $cache_obj->startCachingPage();
        } else {
            $cache_obj = new SuperCacheEmpty();
        }

        if (($cache_obj->genereting_output == 1) or ($cache_obj->genereting_output == -1) or (!$SuperCache)) {

            $title      = Language::aff_langue(stripslashes($title));
            $hometext   = Code::aff_code(Language::aff_langue(stripslashes($hometext)));
            $bodytext   = Code::aff_code(Language::aff_langue(stripslashes($bodytext)));
            $notes      = Code::aff_code(Language::aff_langue(stripslashes($notes)));

            if ($notes != '') {
                $notes = '<div class="note blockquote">' . translate("Note") . ' : ' . $notes . '</div>';
            }

            $bodytext = $bodytext == ''
                ? Metalang::meta_lang($hometext . '<br />' . $notes)
                : Metalang::meta_lang($hometext . '<br />' . $bodytext . '<br />' . $notes);

            if ($informant == '') {
                $informant = Config::get('npds.anonymous');
            }

            News::getTopics($sid);

            if ($catid != 0) {
                $resultx = sql_query("SELECT title 
                                    FROM " . sql_prefix('stories_cat') . " 
                                    WHERE catid='$catid'");

                list($title1) = sql_fetch_row($resultx);

                $title = '<a href="' . site_url('index.php?op=newindex&amp;catid=' . $catid) . '">
                        <span>' . Language::aff_langue($title1) . '</span>
                    </a> : ' . $title;
            }

            $boxtitle = translate("Liens relatifs");

            $boxstuff = '<ul>';

            $result = sql_query("SELECT name, url 
                                FROM " . sql_prefix('related') . " 
                                WHERE tid='$topic'");

            while (list($name, $url) = sql_fetch_row($result)) {
                $boxstuff .= '<li>
                    <a href="' . $url . '" target="_blank">
                        <span>' . $name . '</span>
                    </a>
                </li>';
            }

            $boxstuff .= '
                </ul>
                <ul>
                    <li>
                        <a href="' . site_url('search.php?topic=' . $topic) . '" >
                            ' . translate("En savoir plus à propos de") . ' : 
                        </a>
                        <span class="h5">
                            <span class="badge bg-secondary" title="' . $topicname . '<hr />' . Language::aff_langue($topictext) . '" data-bs-toggle="tooltip" data-bs-html="true" data-bs-placement="right">' . Language::aff_langue($topicname) . '</span>
                        </span>
                    </li>
                    <li>
                        <a href="' . site_url('search.php?member=' . $informant) . '" >
                            ' . translate("Article de") . ' ' . $informant . '
                        </a> ' . User::userpopover($informant, 36, '') . '
                    </li>
                </ul>
                <div>
                    <span class="fw-semibold">' . translate("L'article le plus lu à propos de") . ' : </span>
                    <span class="h5">
                        <span class="badge bg-secondary" title="' . $topicname . '<hr />' . Language::aff_langue($topictext) . '" data-bs-toggle="tooltip" data-bs-html="true" data-bs-placement="right">' . Language::aff_langue($topicname) . '</span>
                    </span>
                </div>';

            $xtab = News::news_aff('big_story', "WHERE topic=$topic", 1, 1);

            list($topstory, $ttitle) = $xtab[0];

            $boxstuff .= '
                <ul>
                    <li><a href="' . site_url('article.php?sid=' . $topstory) . '" >' . Language::aff_langue($ttitle) . '</a></li>
                </ul>
                <div>
                    <span class="fw-semibold">' . translate("Les dernières nouvelles à propos de") . ' : </span>
                        <span class="h5"><span class="badge bg-secondary" title="' . $topicname . '<hr />' . Language::aff_langue($topictext) . '" data-bs-toggle="tooltip" data-bs-html="true" data-bs-placement="right">' . Language::aff_langue($topicname) . '</span>
                    </span>
                </div>';

            $xtab = (!$archive)
                ? News::news_aff('libre',   "WHERE topic=$topic AND archive='0' ORDER BY sid DESC LIMIT 0,5", 0, 5)
                : News::news_aff('archive', "WHERE topic=$topic AND archive='1' ORDER BY sid DESC LIMIT 0,5", 0, 5);

            $story_limit = 0;

            $boxstuff .= '<ul>';

            while (($story_limit < 5) and ($story_limit < sizeof($xtab))) {
                list($sid1, $catid1, $aid1, $title1) = $xtab[$story_limit];

                $story_limit++;

                $boxstuff .= '<li>
                    <a href="' . site_url('article.php?sid=' . $sid1 . '&amp;archive=' . $archive) . '" >
                        ' . Language::aff_langue(stripslashes($title1)) . '
                    </a>
                </li>';
            }

            $boxstuff .= '
                </ul>
                <p align="center">
                    <a href="' . site_url('print.php?sid=' . $sid) . '" >
                        <i class="fa fa-print fa-2x me-3" title="' . translate("Page spéciale pour impression") . '" data-bs-toggle="tooltip"></i>
                    </a>
                    <a href="' . site_url('friend.php?op=FriendSend&amp;sid=' . $sid . '&amp;archive=' . $archive) . '">
                        <i class="fa fa-2x fa-at" title="' . translate("Envoyer cet article à un ami") . '" data-bs-toggle="tooltip"></i>
                    </a>
                </p>';

            if (!$archive) {
                $previous_tab   = News::news_aff('libre', "WHERE sid<'$sid' ORDER BY sid DESC ", 0, 1);
                $next_tab       = News::news_aff('libre', "WHERE sid>'$sid' ORDER BY sid ASC ", 0, 1);
            } else {
                $previous_tab   = News::news_aff('archive', "WHERE sid<'$sid' ORDER BY sid DESC", 0, 1);
                $next_tab       = News::news_aff('archive', "WHERE sid>'$sid' ORDER BY sid ASC ", 0, 1);
            }

            if (array_key_exists(0, $previous_tab)) {
                list($previous_sid) = $previous_tab[0];
            } else {
                $previous_sid = 0;
            }

            if (array_key_exists(0, $next_tab)) {
                list($next_sid) = $next_tab[0];
            } else {
                $next_sid = 0;
            }

            Theme::themearticle(
                $aid, 
                $informant, 
                $time, 
                $title, 
                $bodytext, 
                $topic, 
                $topicname, 
                $topicimage, 
                $topictext, 
                $sid, 
                $previous_sid, 
                $next_sid, 
                $archive
            );

            // theme sans le système de commentaire en meta-mot !
            if (!function_exists("Caff_pub")) {

                if (file_exists(module_path('comments/article.conf.php'))) {

                    include(module_path('comments/article.conf.php'));
                    include(module_path('comments/comments.php'));
                }
            }
        }

        if ($SuperCache) {
            $cache_obj->endCachingPage();
        }

        Theme::footer();
    }
}


switch (Request::input('sid')) 
{

    default:
        controllerStart(ArticleController::class, 'article',
            [
                // ?int nullable
                Request::query('sid'),
                // ?int nullable
                Request::query('archive', 0),
                // ?int nullable
                //Request::query('tid')
            ]
        );
        break;

}
