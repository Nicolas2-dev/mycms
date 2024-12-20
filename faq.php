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
 * [FaqController description]
 */
class FaqController extends Controller
{

    /**
     * [description]
     */
    use FaqPrivate;


    /**
     * [index description]
     *
     * @return  [type]  [return description]
     */
    public function index()
    {
        global $SuperCache;

        Theme::header();

        // Include cache manager
        if ($SuperCache) {
            $cache_obj = new SuperCacheManager();
            $cache_obj->startCachingPage();
        } else {
            $cache_obj = new SuperCacheEmpty();
        }
    
        if (($cache_obj->genereting_output == 1) or ($cache_obj->genereting_output == -1) or (!$SuperCache)) {
    
            $result = sql_query("SELECT id_cat, categories 
                                 FROM " . sql_prefix('faqcategories') . " 
                                 ORDER BY id_cat ASC");
            
            echo '
            <h2 class="mb-4">' . translate("FAQ - Questions fréquentes") . '</h2>
            <hr />
            <h3 class="mb-3">' . translate("Catégories") . '<span class="badge bg-secondary float-end">' . sql_num_rows($result) . '</span></h3>
            <div class="list-group">';
    
            while (list($id_cat, $categories) = sql_fetch_row($result)) {
                $catname = urlencode(Language::aff_langue($categories));
    
                echo '<a class="list-group-item list-group-item-action" href="' . site_url('faq.php?id_cat=' . $id_cat . '&amp;myfaq=yes&amp;categories=' . $catname) . '">
                    <h4 class="list-group-item-heading">' . Language::aff_langue($categories) . '</h4>
                </a>';
            }
    
            echo '</div>';
        }
    
        if ($SuperCache) {
            $cache_obj->endCachingPage();
        }
    
        Theme::footer();
    }

    /**
     * [myFaq description]
     *
     * @param   int     $id_cat      [$id_cat description]
     * @param   string  $categories  [$categories description]
     *
     * @return  [type]               [return description]
     */
    public function myFaq(int $id_cat, string $categories)
    {
        global $SuperCache, $title;

        $title = "FAQ : " . removeHack(StripSlashes($categories));

        Theme::header();
    
        // Include cache manager
        if ($SuperCache) {
            $cache_obj = new SuperCacheManager();
            $cache_obj->startCachingPage();
        } else {
            $cache_obj = new SuperCacheEmpty();
        }
    
        if (($cache_obj->genereting_output == 1) or ($cache_obj->genereting_output == -1) or (!$SuperCache)) {
            $this->ShowFaq($id_cat, removeHack($categories));
            $this->ShowFaqAll($id_cat);
        }
    
        if ($SuperCache) {
            $cache_obj->endCachingPage();
        }
    
        Theme::footer();
    }
}

/**
 * [FaqPrivate description]
 */
trait FaqPrivate
{

    /**
     * [ShowFaq description]
     *
     * @param   int     $id_cat      [$id_cat description]
     * @param   string  $categories  [$categories description]
     *
     * @return  [type]            [return description]
     */
    protected function ShowFaq(int $id_cat, string $categories)
    {
        echo '
        <h2 class="mb-4">' . translate("FAQ - Questions fréquentes") . '</h2>
        <hr />
        <h3 class="mb-3">' . translate("Catégorie") . ' <span class="text-body-secondary"># ' . StripSlashes($categories) . '</span></h3>
        <p class="lead">
            <a href="' . site_url('faq.php') . '" title="' . translate("Retour à l'index FAQ") . '" data-bs-toggle="tooltip">
                Index
            </a>
            &nbsp;&raquo;&raquo;&nbsp;' . StripSlashes($categories) . '
        </p>';

        $result = sql_query("SELECT id, id_cat, question, answer 
                            FROM " . sql_prefix('faqanswer') . " 
                            WHERE id_cat='$id_cat'");
        
        while (list($id, $id_cat, $question, $answer) = sql_fetch_row($result)) {
        }
    }

    /**
     * [ShowFaqAll description]
     *
     * @param   int  $id_cat  [$id_cat description]
     *
     * @return  [type]        [return description]
     */
    protected function ShowFaqAll(int $id_cat)
    {
        $result = sql_query("SELECT id, id_cat, question, answer 
                            FROM " . sql_prefix('faqanswer') . " 
                            WHERE id_cat='$id_cat'");
        
        while (list($id, $id_cat, $question, $answer) = sql_fetch_row($result)) {
            echo '
            <div class="card mb-3" id="accordion_' . $id . '" role="tablist" aria-multiselectable="true">
                <div class="card-body">
                    <h4 class="card-title">
                    <a data-bs-toggle="collapse" data-parent="#accordion_' . $id . '" href="#faq_' . $id . '" aria-expanded="true" aria-controls="' . $id . '">
                        <i class="fa fa-caret-down toggle-icon"></i>
                    </a>&nbsp;' . Language::aff_langue($question) . '
                    </h4>
                    <div class="collapse" id="faq_' . $id . '" >
                    <div class="card-text">
                    ' . Metalang::meta_lang(Language::aff_langue($answer)) . '
                    </div>
                    </div>
                </div>
            </div>';
        }
    }

}


switch (Request::input('myfaq')) 
{

    case 'yes':
        controllerStart(
            FaqController::class, 'myFaq',
            [
                // int
                Request::query('id_cat'),
                // string
                Request::query('categories'),
            ]
        );
        break;

    default:
        controllerStart(
            FaqController::class, 'index');
        break;
        
}
