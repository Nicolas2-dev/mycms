<?php

declare(strict_types=1);

use Npds\Http\Controller;
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
 * [ForumController description]
 */
class ForumController extends Controller
{

    /**
     * [index description]
     *
     * @param   ?int     $catid       [$catid description]
     * @param   ?string  $op          [$op description]
     * @param   ?array   $Subforumid  [$Subforumid description]
     *
     * @return  void
     */
    public function index(?int $catid, ?string $op, ?array $Subforumid)
    {
        global $SuperCache, $user, $cookie;

        $cache_obj = ($SuperCache) ? new SuperCacheManager() :  new SuperCacheEmpty();

        if ($op == "maj_subscribe") {
            if ($user) {
                settype($cookie[0], "integer");

                $result = sql_query("DELETE FROM " . sql_prefix('subscribe') . " 
                                    WHERE uid='$cookie[0]' 
                                    AND forumid!='NULL'");

                $result = sql_query("SELECT forum_id 
                                    FROM " . sql_prefix('forums') . " 
                                    ORDER BY forum_index, forum_id");

                while (list($forumid) = sql_fetch_row($result)) {
                    if (is_array($Subforumid)) {
                        if (array_key_exists($forumid, $Subforumid)) {
                            sql_query("INSERT INTO " . sql_prefix('subscribe') . " (forumid, uid) 
                                       VALUES ('$forumid','$cookie[0]')");
                        }
                    }
                }
            }
        }

        Theme::header();

        // -- SuperCache
        if (($SuperCache) and (!$user)) {
            $cache_obj->startCachingPage();
        }

        if (($cache_obj->genereting_output == 1) or ($cache_obj->genereting_output == -1) or (!$SuperCache) or ($user)) {
            $inclusion = false;

            $theme = Theme::getTheme();

            if ($catid != '') {
                if (file_exists(theme_path($theme . '/html/forum-cat$catid.html'))) {
                    $inclusion = theme_path($theme . '/html/forum-cat' . $catid . '.html');
                    
                } elseif (file_exists(theme_path('default/html/forum-cat' . $catid . '.html'))) {
                    $inclusion = theme_path('default/html/forum-cat' . $catid .'.html');
                }
            }

            if ($inclusion == false) {
                if (file_exists(theme_path($theme . '/html/forum-adv.html'))) {
                    $inclusion = theme_path($theme . '/html/forum-adv.html');

                } elseif (file_exists(theme_path($theme . '/html/forum.html'))) {
                    $inclusion = theme_path($theme . '/html/forum.html');

                } elseif (file_exists(theme_path('default/html/forum.html'))) {
                    $inclusion = theme_path('default/html/forum.html');

                } else {
                    echo theme_path('html/forum.html') .' / not find !<br />';
                }
            }

            if ($inclusion) {
                $Xcontent = join('', file($inclusion));
                echo Metalang::meta_lang(Language::aff_langue($Xcontent));
            }
        }

        // -- SuperCache
        if (($SuperCache) and (!$user)) {
            $cache_obj->endCachingPage();
        }

        Theme::footer();
    }

}


switch (Request::input('catid')) 
{

    default:
        controllerStart(
            ForumController::class, 'index',
            [
                // ?int nullable
                Request::query('catid'),                
                // ?string nullable
                Request::query('op'),                
                // ?array nullable
                Request::query('Subforumid')
            ]
        );
        break;

}
