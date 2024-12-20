<?php

declare(strict_types=1);

use Npds\Config\Config;
use Npds\Http\Controller;
use Npds\Support\Sanitize;
use Npds\Support\Facades\Css;
use Npds\Support\Facades\Url;
use Npds\Support\Facades\Auth;
use Npds\Support\Facades\Date;
use Npds\Support\Facades\Cache;
use Npds\Support\Facades\Theme;
use Npds\Support\Facades\Mailer;
use Npds\Support\Facades\Request;
use Npds\Support\Facades\Language;


if (!function_exists("Mysql_Connexion")) {
    include("Boot/grab_globals.php");
}

/**
 * [BannerController description]
 */
class BannerController extends Controller
{

    /**
     * [description]
     */
    use BannerPrivate;


    /**
     * [viewbanner description]
     *
     * @return  void
     */
    public function viewBanner()
    {
        if (Config::get('npds.banners')) { 
            $okprint = false;

            $while_limit = 3;
            $while_cpt = 0;

            $bresult = sql_query("SELECT bid 
                                FROM " . sql_prefix('banner') . " 
                                WHERE userlevel!='9'");

            $numrows = sql_num_rows($bresult);

            while ((!$okprint) and ($while_cpt < $while_limit)) {

                // More efficient random stuff, thanks to Cristian Arroyo from http://www.planetalinux.com.ar
                if ($numrows > 0) {

                    $micro = ((int) (microtime() * 1000000));

                    mt_srand($micro);

                    $bannum = mt_rand(0, $numrows);
                } else {
                    break;
                }

                $bresult2 = sql_query("SELECT bid, userlevel 
                                    FROM " . sql_prefix('banner') . " 
                                    WHERE userlevel!='9' 
                                    LIMIT $bannum, 1");

                list($bid, $userlevel) = sql_fetch_row($bresult2);

                if ($userlevel == 0) {
                    $okprint = true;
                } else {
                    if ($userlevel == 1) {
                        if (Auth::secur_static("member")) {
                            $okprint = true;
                        }
                    }

                    if ($userlevel == 3) {
                        if (Auth::secur_static("admin")) {
                            $okprint = true;
                        }
                    }
                }

                $while_cpt = $while_cpt + 1;
            }

            // Le risque est de sortir sans un BID valide
            if (!isset($bid)) {
                $rowQ1 = Cache::Q_Select("SELECT bid 
                                FROM " . sql_prefix('banner') . " 
                                WHERE userlevel='0' 
                                LIMIT 0,1", 86400);

                if ($rowQ1) {
                    
                    $myrow = $rowQ1[0]; // erreur à l'install quand on n'a pas de banner dans la base ....
                    $bid = $myrow['bid'];

                    $okprint = true;
                }
            }

            if ($okprint) {

                $myhost = Request::getip();

                if (Config::get('npds.myIP') != $myhost){
                    sql_query("UPDATE " . sql_prefix('banner') . " 
                            SET impmade=impmade+1 
                            WHERE bid='$bid'");}

                if (($numrows > 0) and ($bid)) {

                    $aborrar = sql_query("SELECT cid, imptotal, impmade, clicks, imageurl, clickurl, date 
                                        FROM " . sql_prefix('banner') . " 
                                        WHERE bid='$bid'");

                    list($cid, $imptotal, $impmade, $clicks, $imageurl, $clickurl, $date) = sql_fetch_row($aborrar);

                    if ($imptotal == $impmade) {
                        sql_query("INSERT INTO " . sql_prefix('bannerfinish') . " 
                                VALUES (NULL, '$cid', '$impmade', '$clicks', '$date', now())");

                        sql_query("DELETE FROM " . sql_prefix('banner') . " 
                                WHERE bid='$bid'");
                    }

                    if ($imageurl != '') {
                        echo '<a href="' . site_url('banners.php?op=click&amp;bid=' . $bid) . '" target="_blank">
                                <img class="img-fluid" src="' . Language::aff_langue($imageurl) . '" alt="banner" loading="lazy" />
                            </a>';
                    } else {
                        if (stristr($clickurl, '.txt')) {
                            if (file_exists($clickurl)) {
                                include_once($clickurl);
                            }

                        } else {
                            echo $clickurl;
                        }
                    }
                }
            }
        } else {
            Url::redirect_url('index.php');
        }        
    }

    /**
     * [clickbanner description]
     *
     * @param   int  $bid  [$bid description]
     *
     * @return  void
     */
    public function clickBanner(int $bid)
    {
        $bresult = sql_query("SELECT clickurl 
                            FROM " . sql_prefix('banner') . " 
                            WHERE bid='$bid'");

        list($clickurl) = sql_fetch_row($bresult);

        sql_query("UPDATE " . sql_prefix('banner') . " 
                SET clicks=clicks+1 
                WHERE bid='$bid'");

        sql_free_result($bresult);

        if ($clickurl == '') {
            $clickurl = site_url();
        }

        Header('Location: ' . Language::aff_langue($clickurl));
    }

    /**
     * [clientlogin description]
     *
     * @return  void
     */
    public function clientLogin()
    {
        $this->headerPage();

        echo '
            <div class="card card-body mb-3">
                <h3 class="mb-4"><i class="fas fa-sign-in-alt fa-lg me-3 align-middle"></i>' . translate("Connexion") . '</h3>
                <form id="loginbanner" action="' . site_url('banners.php') .'" method="post">
                    <fieldset>
                    <div class="form-floating mb-3">
                        <input class="form-control" type="text" id="login" name="login" maxlength="10" required="required" />
                        <label for="login">' . translate("Identifiant ") . '</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" type="password" id="pass" name="pass" maxlength="10" required="required" />
                        <label for="pass">' . translate("Mot de passe") . '</label>
                        <span class="help-block">' . translate("Merci de saisir vos informations") . '</span>
                    </div>
                    <input type="hidden" name="op" value="Ok" />
                    <button class="btn btn-primary my-3" type="submit">' . translate("Valider") . '</button>
                    </div>
                    </fieldset>
                </form>
            </div>';

        $arg1 = 'var formulid=["loginbanner"];';

        Css::adminfoot('fv', '', $arg1, 'no');

        $this->footerPage();
    }

    /**
     * [bannerstats description]
     *
     * @param   string  $login  [$login description]
     * @param   string  $pass   [$pass description]
     *
     * @return  void
     */
    public function bannerStats(string $login, string $pass)
    {
        $result = sql_query("SELECT cid, name, passwd 
                            FROM " . sql_prefix('bannerclient') . " 
                            WHERE login='$login'");

        list($cid, $name, $passwd) = sql_fetch_row($result);

        if ($login == '' and $pass == '' or $pass == '') {
            $this->IncorrectLogin();

        } else {
            if ($pass == $passwd) {
                $this->headerPage();

                echo '
                <h3>' . translate("Bannières actives pour") . ' ' . $name . '</h3>
                <table data-toggle="table" data-search="true" data-striped="true" data-mobile-responsive="true" data-show-export="true" data-show-columns="true" data-icons="icons" data-icons-prefix="fa">
                    <thead>
                    <tr>
                        <th class="n-t-col-xs-1" data-halign="center" data-align="right" data-sortable="true">ID</th>
                        <th class="n-t-col-xs-2" data-halign="center" data-align="right" data-sortable="true">' . translate("Réalisé") . '</th>
                        <th class="n-t-col-xs-2" data-halign="center" data-align="right" data-sortable="true">' . translate("Impressions") . '</th>
                        <th class="n-t-col-xs-2" data-halign="center" data-align="right" data-sortable="true">' . translate("Imp. restantes") . '</th>
                        <th class="n-t-col-xs-2" data-halign="center" data-align="right" data-sortable="true">' . translate("Clics") . '</th>
                        <th class="n-t-col-xs-1" data-halign="center" data-align="right" data-sortable="true">% ' . translate("Clics") . '</th>
                        <th class="n-t-col-xs-1" data-halign="center" data-align="right">' . translate("Fonctions") . '</th>
                    </tr>
                    </thead>
                    <tbody>';

                $result = sql_query("SELECT bid, imptotal, impmade, clicks, date 
                                    FROM " . sql_prefix('banner') . " 
                                    WHERE cid='$cid'");

                while (list($bid, $imptotal, $impmade, $clicks, $date) = sql_fetch_row($result)) {

                    $random = (100 * $clicks / $impmade);

                    $percent = $impmade == 0 ? '0' : substr("$random", 0, 5);
                    $left = $imptotal == 0 ? translate("Illimité") : $imptotal - $impmade;

                    echo '
                    <tr>
                        <td>' . $bid . '</td>
                        <td>' . $impmade . '</td>
                        <td>' . $imptotal . '</td>
                        <td>' . $left . '</td>
                        <td>' . $clicks . '</td>
                        <td>' . $percent . '%</td>
                        <td>
                            <a href="' . site_url('banners.php?op=EmailStats&amp;login=' . $login . '&amp;cid=' . $cid . '&amp;bid=' . $bid) . '" >
                                <i class="far fa-envelope fa-lg me-2 tooltipbyclass" data-bs-placement="top" title="E-mail Stats"></i>
                            </a>
                        </td>
                    </tr>';
                }

                echo '
                    </tbody>
                </table>
                <div class="lead my-3">
                    <a href="' . site_url() . '" target="_blank">' . Config::get('npds.sitename') . '</a>
                </div>';

                $result = sql_query("SELECT bid, imageurl, clickurl 
                                    FROM " . sql_prefix('banner') . " 
                                    WHERE cid='$cid'");

                while (list($bid, $imageurl, $clickurl) = sql_fetch_row($result)) {
                    // $numrows = sql_num_rows($result);

                    echo '<div class="card card-body mb-3">';

                    if ($imageurl != '') {
                        echo '<p><img src="' . Language::aff_langue($imageurl) . '" class="img-fluid" />'; //pourquoi aff_langue ??
                    } else {
                        echo '<p>';
                        echo $clickurl;
                    }

                    echo '<h4 class="mb-2">Banner ID : ' . $bid . '</h4>';

                    if ($imageurl != '') {
                        echo '<p>' . translate("Cette bannière est affichée sur l'url") . ' : <a href="' . Language::aff_langue($clickurl) . '" target="_Blank" >[ URL ]</a></p>';
                    }

                    echo '<form action="' . site_url('banners.php') .'" method="get">';

                    if ($imageurl != '') {
                        echo '
                        <div class="mb-3 row">
                            <label class="control-label col-sm-12" for="url">' . translate("Changer") . ' URL</label>
                            <div class="col-sm-12">
                                <input class="form-control" type="text" name="url" maxlength="200" value="' . $clickurl . '" />
                            </div>
                        </div>';
                    } else {
                        echo '
                        <div class="mb-3 row">
                            <label class="control-label col-sm-12" for="url">' . translate("Changer") . ' URL</label>
                            <div class="col-sm-12">
                                <input class="form-control" type="text" name="url" maxlength="200" value="' . htmlentities($clickurl, ENT_QUOTES, 'UTF-8') . '" />
                            </div>
                        </div>';
                    }

                    echo '
                        <input type="hidden" name="login" value="' . $login . '" />
                        <input type="hidden" name="bid" value="' . $bid . '" />
                        <input type="hidden" name="pass" value="' . $pass . '" />
                        <input type="hidden" name="cid" value="' . $cid . '" />
                        <input class="btn btn-primary" type="submit" name="op" value="' . translate("Changer") . '" />
                        </form>
                        </p>
                    </div>';
                }

                // Finnished Banners
                echo "<br />";

                echo '
                <h3>' . translate("Bannières terminées pour") . ' ' . $name . '</h3>
                <table data-toggle="table" data-search="true" data-striped="true" data-mobile-responsive="true" data-show-export="true" data-show-columns="true" data-icons="icons" data-icons-prefix="fa">
                    <thead>
                    <tr>
                        <th class="n-t-col-xs-1" data-halign="center" data-align="right" data-sortable="true">ID</td>
                        <th data-halign="center" data-align="right" data-sortable="true">' . translate("Impressions") . '</th>
                        <th data-halign="center" data-align="right" data-sortable="true">' . translate("Clics") . '</th>
                        <th class="n-t-col-xs-1" data-halign="center" data-align="right" data-sortable="true">% ' . translate("Clics") . '</th>
                        <th data-halign="center" data-align="right" data-sortable="true">' . translate("Date de début") . '</th>
                        <th data-halign="center" data-align="right" data-sortable="true">' . translate("Date de fin") . '</th>
                    </tr>
                    </thead>
                    <tbody>';

                $result = sql_query("SELECT bid, impressions, clicks, datestart, dateend 
                                    FROM " . sql_prefix('bannerfinish') . " 
                                    WHERE cid='$cid'");

                while (list($bid, $impressions, $clicks, $datestart, $dateend) = sql_fetch_row($result)) {
                    
                    $random = (100 * $clicks / $impressions);

                    $percent = substr("$random", 0, 5);

                    echo '
                    <tr>
                        <td>' . $bid . '</td>
                        <td>' . Sanitize::wrh($impressions) . '</td>
                        <td>' . $clicks . '</td>
                        <td>' . $percent . ' %</td>
                        <td><small>' . Date::formatTimes($datestart, IntlDateFormatter::SHORT, IntlDateFormatter::SHORT) . '</small></td>
                        <td><small>' . Date::formatTimes($dateend, IntlDateFormatter::SHORT, IntlDateFormatter::SHORT) . '</small></td>
                    </tr>';
                }

                echo '
                    </tbody>
                </table>';

                Css::adminfoot('fv', '', '', 'no');

                $this->footerPage();
            } else {
                $this->IncorrectLogin();
            }
        }
    }

    /**
     * [EmailStats description]
     *
     * @param   string  $login  [$login description]
     * @param   int     $cid    [$cid description]
     * @param   int     $bid    [$bid description]
     *
     * @return  void
     */
    public function EmailStats(string $login, int $cid, int $bid)
    {
        $result = sql_query("SELECT login 
                            FROM " . sql_prefix('bannerclient') . " 
                            WHERE cid='$cid'");

        list($loginBD) = sql_fetch_row($result);

        if ($login == $loginBD) {
            $result2 = sql_query("SELECT name, email 
                                FROM " . sql_prefix('bannerclient') . " 
                                WHERE cid='$cid'");

            list($name, $email) = sql_fetch_row($result2);

            if ($email == '') {
                $this->headerPage();

                echo "<p align=\"center\">
                    <br />
                    " . translate("Les statistiques pour la bannières ID") . " : $bid " . translate("ne peuvent pas être envoyées.") . "
                    <br />
                    <br />
                    " . translate("Email non rempli pour : ") . " $name
                    <br />
                    <br />
                    <a href=\"javascript:history.go(-1)\" >
                        " . translate("Retour en arrière") . "
                    </a>
                </p>";
                
                $this->footerPage();
            } else {
                $result = sql_query("SELECT bid, imptotal, impmade, clicks, imageurl, clickurl, date 
                                    FROM " . sql_prefix('banner') . " 
                                    WHERE bid='$bid' 
                                    AND cid='$cid'");

                list($bid, $imptotal, $impmade, $clicks, $imageurl, $clickurl, $date) = sql_fetch_row($result);

                $random = (100 * $clicks / $impmade);

                $percent = $impmade == 0 ? '0' : substr("$random", 0, 5);

                if ($imptotal == 0) {
                    $left = translate("Illimité");
                    $imptotal = translate("Illimité");
                } else {
                    $left = $imptotal - $impmade;
                }

                global $sitename;

                $fecha = Date::formatTimes(time(), IntlDateFormatter::MEDIUM, IntlDateFormatter::SHORT);

                $subject = html_entity_decode(translate("Bannières - Publicité"), ENT_COMPAT | ENT_HTML401, 'UTF-8') . ' : ' . $sitename;

                $message  = "Client : $name\n" . translate("Bannière") . " ID : $bid\n" . translate("Bannière") . " Image : $imageurl\n" . translate("Bannière") . " URL : $clickurl\n\n";
                $message .= "Impressions " . translate("Réservées") . " : $imptotal\nImpressions " . translate("Réalisées") . " : $impmade\nImpressions " . translate("Restantes") . " : $left\nClicks " . translate("Reçus") . " : $clicks\nClicks " . translate("Pourcentage") . " : $percent%\n\n";
                $message .= translate("Rapport généré le") . ' : ' . "$fecha\n\n";
                
                include("signat.php");

                Mailer::send_email($email, $subject, $message, '', true, 'html', '');

                $this->headerPage();

                echo '
                <div class="card bg-light">
                    <div class="card-body"
                    <p>' . $fecha . '</p>
                    <p>' . translate("Les statistiques pour la bannières ID") . ' : ' . $bid . ' ' . translate("ont été envoyées.") . '</p>
                    <p>' . $email . ' : Client : ' . $name . '</p>
                    <p>
                        <a href="javascript:history.go(-1)" class="btn btn-primary">
                            ' . translate("Retour en arrière") . '
                        </a>
                    </p>
                    </div>
                </div>';
            }
        } else {
            $this->headerPage();

            echo '<div class="alert alert-danger">
                ' . translate("Identifiant incorrect !") . '
                <br />
                ' . translate("Merci de") . ' <a href="' . site_url('banners.php?op=login') .'" class="alert-link">
                    ' . translate("vous reconnecter.") . '
                </a>
            </div>';
        }

        $this->footerPage();
    }

    /**
     * [change_banner_url_by_client description]
     *
     * @param   string  $login  [$login description]
     * @param   string  $pass   [$pass description]
     * @param   int     $cid    [$cid description]
     * @param   int     $bid    [$bid description]
     * @param   string  $url    [$url description]
     *
     * @return  void
     */
    public function changeBannerUrlByClient(string $login, string $pass, int $cid, int $bid, string $url)
    {
        $this->headerPage();

        $result = sql_query("SELECT passwd 
                            FROM " . sql_prefix('bannerclient') . " 
                            WHERE cid='$cid'");

        list($passwd) = sql_fetch_row($result);

        if (!empty($pass) and $pass == $passwd) {
            sql_query("UPDATE " . sql_prefix('banner') . " 
                    SET clickurl='$url' 
                    WHERE bid='$bid'");

            echo '<div class="alert alert-success">
                ' . translate("Vous avez changé l'url de la bannière") . '
                <br />
                <a href="javascript:history.go(-1)" class="alert-link">
                    ' . translate("Retour en arrière") . '
                </a>
            </div>';
        } else {
            echo '<div class="alert alert-danger">
                ' . translate("Identifiant incorrect !") . '
                <br />' . translate("Merci de") . ' 
                <a href="'  . site_url('banners.php?op=login') . '" class="alert-link">
                    ' . translate("vous reconnecter.") . '
                </a>
            </div>';
        }

        $this->footerPage();
    }

}

/**
 * [BannerPrivate description]
 */
trait BannerPrivate
{

    /**
     * [IncorrectLogin description]
     *
     * @return  void
     */
    protected function IncorrectLogin()
    {
        $this->headerPage();

        echo '<div class="alert alert-danger lead">
            ' . translate("Identifiant incorrect !") . '
            <br />
            <button class="btn btn-secondary mt-2" onclick="javascript:history.go(-1)" >
                ' . translate("Retour en arrière") . '
            </button>
        </div>';
        
        $this->footerPage();
    }

    /**
     * [header_page description]
     *
     * @return  void
     */
    protected function headerPage()
    {
        global $Titlesitename, $language;

        include_once(module_path('upload.conf.php'));

        include(storage_path('meta/meta.php'));

        if ($url_upload_css) {
            $url_upload_cssX = str_replace('style.css', $language . '-style.css', $url_upload_css);

            if (is_readable($url_upload . $url_upload_cssX)) {
                $url_upload_css = $url_upload_cssX;
            }

            print("<link href=\"" . $url_upload . $url_upload_css . "\" title=\"default\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />\n");
        }

        if (file_exists(theme_path('default/include/header_head.inc'))) {
            include(theme_path('default/include/header_head.inc'));
        }

        if (file_exists(theme_path($Default_Theme . '/include/header_head.inc'))) {
            include(theme_path($Default_Theme . '/include/header_head.inc'));
        }

        $Default_Theme = Theme::defaultTheme();

        if (file_exists(theme_path($Default_Theme . '/style/style.css'))) {
            echo '<link href="' . site_url($Default_Theme . '/style/style.css') .'" rel="stylesheet" type=\"text/css\" media="all" />';
        }

        echo '
        </head>
        <body style="margin-top:64px;">
            <div class="container-fluid">
            <nav class="navbar navbar-expand-lg fixed-top bg-primary" data-bs-theme="dark">
                <div class="container-fluid">
                <a class="navbar-brand" href="' . site_url('index.php') . '"><i class="fa fa-home fa-lg me-2"></i></a>
                <span class="navbar-text">' . translate("Bannières - Publicité") . '</span>
                </div>
            </nav>
            <h2 class="mt-4">' . translate("Bannières - Publicité") . ' @ ' . $Titlesitename . '</h2>
            <p align="center">';
    }

    /**
     * [footer_page description]
     *
     * @return  void
     */
    protected function footerPage()
    {
        include(theme_path('default/include/footer_after.inc'));

        echo '</p>
                </div>
            </body>
        </html>';
    }

}


switch (Request::input('op')) 
{

    case 'click':
        controllerStart(
            BannerController::class, 'clickBanner',
            [
                // int
                Request::query('bid'),
            ]
        );
        break;
    
    case 'login':
        controllerStart(
            BannerController::class, 'clientLogin'
        );
        break;

    case 'Ok':
        controllerStart(
            BannerController::class, 'bannerStats',
            [
                // string
                Request::query('login'),
                // string
                Request::query('pass'),
            ]
        );
        break;

    case translate('Changer'):
        controllerStart(
            BannerController::class, 'changeBannerUrlByClient',
            [
                // string
                Request::query('login'),
                // string
                Request::query('pass'),
                // int
                Request::query('cid'),
                // int
                Request::query('bid'), 
                // string
                Request::query('url'),                 
            ]
        );
        break;

    case 'EmailStats':
        controllerStart(
            BannerController::class, 'EmailStats',
            [
                // string
                Request::query('login'),
                // int
                Request::query('cid'),
                // int
                Request::query('bid'),                
            ]
        );
        break;

    default:
        controllerStart(
            BannerController::class, 'viewBanner');
        break;
        
}
