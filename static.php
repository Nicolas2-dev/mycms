<?php

declare(strict_types=1);

use Npds\Config\Config;
use Npds\Http\Controller;

use Npds\Support\Facades\Code;
use Npds\Support\Facades\Theme;
use Npds\Support\Facades\Request;
use Npds\Support\Facades\Language;
use Npds\Support\Facades\Metalang;
use Npds\Support\Facades\Log;


if (!function_exists("Mysql_Connexion")) {
    include("Boot/grab_globals.php");
}

/**
 * [StatistiqueController description]
 */
class StaticPageController extends Controller
{

    /**
     * [pages description]
     *
     * @param   string  $op        [$op description]
     * @param   int     $npds      [$npds description]
     * @param   int     $metalang  [$metalang description]
     * @param   int     $nl        [$nl description]
     *
     * @return  void
     */
    public function pageLoad(string $op, ?int $npds, ?int $metalang, ?int $nl)
    {
        global $pdst;

        $pdst = $npds;

        Theme::header();

        echo '<div id="static_cont">';

        if (($op != '') and ($op)) {

            // Troll Control for security
            if (preg_match('#^[a-z0-9_\.-]#i', $op) 
                and !stristr($op, ".*://") 
                and !stristr($op, "..") 
                and !stristr($op, "../") 
                and !stristr($op, "script") 
                and !stristr($op, "cookie") 
                and !stristr($op, "iframe") 
                and !stristr($op, "applet") 
                and !stristr($op, "object") 
                and !stristr($op, "meta")) 
            {
                if (file_exists(storage_path('static/' . $op))) {
                    if (!$metalang and !$nl) {
                        include(storage_path('static/' . $op));

                    } else {
                        $page_temp = '';

                        ob_start();
                            include(storage_path('static/' . $op));

                            $page_temp = ob_get_contents();
                        ob_end_clean();

                        if ($metalang) {
                            $page_temp = Metalang::meta_lang(Code::aff_code(Language::aff_langue($page_temp)));
                        }

                        if ($nl) {
                            $page_temp = nl2br(str_replace(' ', '&nbsp;', htmlentities($page_temp, ENT_QUOTES, 'UTF-8')));
                        }

                        echo $page_temp;
                    }

                    echo '<div class=" my-3">
                        <a href="' . site_url('print.php?sid=static:' . $op . '&amp;metalang=' . $metalang . '&amp;nl=' . $nl) . '" data-bs-toggle="tooltip" data-bs-placement="right" title="' . translate("Page spéciale pour impression") . '">
                            <i class="fa fa-2x fa-print"></i>
                        </a>
                    </div>';

                    // tracer les appels au pages statiques. 
                    // Configuration voir fichier Config/Staticpage.php.
                    if (Config::get('staticpage.active_log')) {
                        Log::Ecr_Log(Config::get('staticpage.file_log'), 'static/' . $op, '');
                    }

                } else { 
                    echo '<div class="alert alert-info">
                        ' . sprintf(translate("Merci d'entrer l'information en fonction des spécifications, cette page %s n'existe pas."), $op) . '
                    </div>';
                }
            } else {
                echo '<div class="alert alert-danger">
                    ' . sprintf(translate("Merci d'entrer l'information en fonction des spécifications, ce type de page %s n'est pas autorisé."), $op) . '
                </div>';
            }
        }

        echo '</div>';
                        
        Theme::footer();
    }

}

switch (Request::input('op')) 
{
    default:
        controllerStart(
            StaticPageController::class, 
            'pageLoad',
            [
                // string
                Request::query('op'), 
                // ?int nullable
                Request::query('npds'),
                // ?int nullable
                Request::query('metalang'),
                // ?int nullable
                Request::query('nl')               
            ]
        );
        break;

}
