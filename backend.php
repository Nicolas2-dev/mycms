<?php

declare(strict_types=1);

use Npds\Config\Config;
use Npds\Http\Controller;
use Npds\Support\Facades\Date;
use Npds\Support\Facades\News;
use Npds\Feed\FeedItem;
use Npds\Feed\FeedImage;
use Npds\Support\Facades\Request;
use Npds\Support\Facades\Language;
use Npds\Support\Facades\Metalang;
use Npds\Feed\UniversalFeedCreator;


if (!function_exists("Mysql_Connexion")) {
    include("Boot/grab_globals.php");
}


/**
 * [FeedController description]
 */
class FeedController extends Controller
{
    /**
     * [fabFeed description]
     *
     * @param   string  $type      [$type description]
     * @param   string  $filename  [$filename description]
     * @param   ?int     $timeout   [$timeout description]
     *
     * @return  void
     */
    public function fabFeed(string $type, string $filename, ?int $timeout = 3600)
    {
        $rss = new UniversalFeedCreator();

        $rss->useCached($type, storage_path('rss/' .$filename), $timeout);

        $rss->title                     = Config::get('npds.sitename');
        $rss->description               = Config::get('npds.slogan');
        $rss->descriptionTruncSize      = 250;
        $rss->descriptionHtmlSyndicated = true;

        $rss->link                      = site_url();
        $rss->syndicationURL            = site_url('backend.php?op=' . $type);

        $image = new FeedImage();

        $image->title                   = Config::get('npds.sitename');
        $image->url                     = Config::get('npds.backend_image');
        $image->link                    = site_url();
        $image->description             = Config::get('npds.backend_title');
        $image->width                   = Config::get('npds.backend_width');
        $image->height                  = Config::get('npds.backend_height');
        $rss->image                     = $image;

        $storyhome = Config::get('npds.storyhome');

        $xtab = News::news_aff('index', "WHERE ihome='0' AND archive='0'", $storyhome, '');

        $story_limit = 0;
        while (($story_limit < $storyhome) and ($story_limit < sizeof($xtab))) {

            list($sid, $catid, $aid, $title, $time, $hometext, $bodytext, $comments, $counter, $topic, $informant, $notes) = $xtab[$story_limit];

            $story_limit++;

            $item = new FeedItem();

            $item->title                        = Language::preview_local_langue(Config::get('npds.backend_language'), str_replace('&quot;', '\"', $title));

            $item->link                         = site_url('article.php?sid=' . $sid);

            $item->description                  = Metalang::meta_lang(Language::preview_local_langue(Config::get('npds.backend_language'), $hometext));
            $item->descriptionHtmlSyndicated    = true;

            $item->date                         = strtotime(Date::getPartOfTime($time, 'yyyy-MM-dd H:m:s'));
            $item->source                       = site_url();
            $item->author                       = $aid;

            $rss->addItem($item);
        }

        echo $rss->saveFeed($type, storage_path('rss/' .$filename));
    }

}


switch (Request::input('op')) 
{

    case 'MBOX':
        controllerStart(FeedController::class, 'fabFeed',
            [
                'MBOX', 'MBOX-feed'
            ]
        );
        break;

    case 'OPML':
        controllerStart(FeedController::class, 'fabFeed',
            [
                'OPML', 'OPML-feed.xml'
            ]
        );
        break;

    case 'ATOM':
        controllerStart(FeedController::class, 'fabFeed',
            [
                'ATOM', 'ATOM-feed.xml'
            ]
        );
        break;

    case 'RSS1.0':
        controllerStart(FeedController::class, 'fabFeed',
            [
                'RSS1.0', 'RSS1.0-feed.xml'
            ]
        );
        break;

    case 'RSS2.0':
        controllerStart(FeedController::class, 'fabFeed',
            [
                'RSS2.0', 'RSS2.0-feed.xml'
            ]
        );
        break;

    case 'RSS0.91':
        controllerStart(FeedController::class, 'fabFeed',
            [
                'RSS0.91', 'RSS0.91-feed.xml'
            ]
        );
        break;

    default:
        controllerStart(FeedController::class, 'fabFeed',
            [
                'RSS1.0', 'RSS1.0-feed.xml'
            ]
        );
        break;

}
