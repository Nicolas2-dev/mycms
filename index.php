<?php

declare(strict_types=1);

use Npds\Config\Config;
use Npds\Http\Controller;
use Npds\Install\Install;

use Npds\Support\Facades\Edito;
use Npds\Support\Facades\News;
use Npds\Support\Facades\Theme;
use Npds\Support\Facades\User;
use Npds\Support\Facades\Request;

use Npds\Cache\SuperCacheEmpty;
use Npds\Cache\SuperCacheManager;


if (!function_exists("Mysql_Connexion")) {
    include("Boot/grab_globals.php");
}

/**
 * [IndexController description]
 */
class IndexController extends Controller
{

    /**
     * [__construct description]
     *
     * @return  [type]  [return description]
     */
    public function __construct()
    {
        //
        Install::check();
    }

    /**
     * Redirect for default Start Page of the portal
     * look at Admin Preferences for choice
     * 
     * @param   ?string  $op  [$op description]
     *
     * @return  void
     */
    function selectStartPage(?string $op)
    {
        global $index;

        if (!User::AutoReg()) {
            global $user;
            
            unset($user);
        }

        $Start_Page = Config::get('npds.Start_Page');

        if (($Start_Page == '') 
        or ($op == "index.php") 
        or ($op == "index") 
        or ($op == "edito") 
        or ($op == "edito-nonews")) 
        {
            $index = 1;

            $this->theindex($op, '', '');
            die('');
        } else { 
            Header("Location:". $Start_Page);
        }
    }

    /**
     * [theindex description]
     *
     * @param   ?string      $op       [$op description]
     * @param   int|string  $catid    [$catid description]
     * @param   int|string         $marqeur  [$marqeur description]
     *
     * @return  void
     */
    function theIndex(string $op, int|string $catid, int|string $marqeur)
    {
        Theme::header();

        // Include cache manager
        global $SuperCache;

        if ($SuperCache) {
            $cache_obj = new SuperCacheManager();
            $cache_obj->startCachingPage();
        } else {
            $cache_obj = new SuperCacheEmpty();
        }

        if (($cache_obj->genereting_output == 1) or ($cache_obj->genereting_output == -1) or (!$SuperCache)) {

            // Appel de la publication de News et la purge automatique
            News::automatednews();

            if (($op == 'newcategory') 
            or ($op == 'newtopic') 
            or ($op == 'newindex') 
            or ($op == 'edito-newindex')) 
            {
                News::aff_news($op, $catid, $marqeur);
            } else {

                $theme = Theme::getTheme();

                if (file_exists(theme_path($theme . '/central.php'))) {
                    include(theme_path($theme . '/central.php'));

                } else {
                    if (($op == 'edito') 
                    or ($op == 'edito-nonews')) 
                    {
                        Edito::aff_edito();
                    }

                    if ($op != 'edito-nonews') {
                        News::aff_news($op, $catid, $marqeur);
                    }
                }
            }
        }

        if ($SuperCache) {
            $cache_obj->endCachingPage();
        }

        Theme::footer();
    }

}

switch (Request::input('op')) 
{
    case 'newindex':
    case 'edito-newindex':
    case 'newcategory':
        controllerStart(IndexController::class, 'theIndex',
            [
                // string
                Request::query('op'),
                // int|string 
                Request::query('catid'),
                // int|string 
                Request::query('marquer')
            ]
        );
        break;
    
    case 'newtopic':
        controllerStart(IndexController::class, 'theIndex',
            [
                // string
                Request::query('op'),
                // int|string 
                Request::query('catid'),
                // int|string
                Request::query('marquer')
            ]
        );
        break;

    default:
        controllerStart(IndexController::class, 'selectStartPage',
            [
                // ?int nullable
                Request::query('op')
            ]
        );
        break;

}
