<?php

declare(strict_types=1);

use Npds\Config\Config;
use Npds\Http\Controller;
use Npds\Support\Sanitize;
use Npds\Support\Versioning;
use Npds\Support\Facades\Stat;
use Npds\Support\Facades\Asset;
use Npds\Support\Facades\Theme;
use Npds\Support\Facades\Request;


if (!function_exists("Mysql_Connexion")) {
    include("Boot/grab_globals.php");
}

/**
 * [StatistiqueController description]
 */
class StatistiqueController extends Controller
{

    /**
     * [index description]
     *
     * @return  [type]  [return description]
     */
    public function index()
    {
        Theme::header();

        $dkn = sql_query("SELECT type, var, count 
                        FROM " . sql_prefix('counter') . " 
                        ORDER BY type DESC");

        $total = 0;

        while (list($type, $var, $count) = sql_fetch_row($dkn)) {

            if ($type == "total" && $var == "hits") {
                $total = (int) $count;
            } elseif ($type == "browser") {
                if ($var == "Other") {
                    $b_other = Stat::generatePourcentageAndTotal($count, $total);
                } else {
                    ${strtolower($var)} = Stat::generatePourcentageAndTotal($count, $total);
                }
            } elseif ($type == "os") {
                if ($var == "Other") {
                    $os_other = Stat::generatePourcentageAndTotal($count, $total);
                } else {  
                    ${strtolower(str_replace('/', '', $var))} = Stat::generatePourcentageAndTotal($count, $total);
                }
            }
        }

        //
        echo '
            <h2>' . translate("Statistiques") . '</h2>
            <div class="card card-body lead">
                <div>
                ' . translate("Nos visiteurs ont visualisé") . ' <span class="badge bg-secondary">' . Sanitize::wrh($total) . '</span> ' . translate("pages depuis le") . ' ' . Config::get('npds.startdate') . '
                </div>
            </div>
            <h3 class="my-4">' . translate("Navigateurs web") . '</h3>
            <table data-toggle="table" data-mobile-responsive="true">
                <thead>
                    <tr>
                        <th data-sortable="true" >' . translate("Navigateurs web") . '</th>
                        <th data-sortable="true" data-halign="center" data-align="right" >%</th>
                        <th data-align="right" ></th>
                    </tr>
                </thead>
                <tbody>';

        if ($msie[1] > 0) {
            echo '
            <tr>
                <td><img src="' . (Theme::image('stats/explorer.gif') ?: Asset::url('images/stats/explorer.gif')) . '" alt="MSIE_ico" loading="lazy"/> MSIE </td>
                <td>
                <div class="text-center small">' . $msie[1] . ' %</div>
                <div class="progress bg-light">
                    <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="' . $msie[1] . '" aria-valuemin="0" aria-valuemax="100" style="width:' . $msie[1] . '%; height:1rem;"></div>
                </div>
                </td>
                <td>' . $msie[0] . '</td>
            </tr>';
        }

        if ($netscape[1] > 0) {
            echo '
            <tr>
                <td><img src="' . (Theme::image('stats/firefox.gif') ?: Asset::url('images/stats/firefox.gif')) . '" alt="Mozilla_ico" loading="lazy"/> Mozilla </td>
                <td>
                <div class="text-center small">' . $netscape[1] . ' %</div>
                    <div class="progress bg-light">
                        <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="' . $netscape[1] . '" aria-valuemin="0" aria-valuemax="100" style="width:' . $netscape[1] . '%; height:1rem;"></div>
                    </div>
                </td>
                <td> ' . $netscape[0] . '</td>
            </tr>';
        }

        if ($opera[1] > 0) {
            echo '
            <tr>
                <td><img src="' . (Theme::image('stats/opera.gif') ?: Asset::url('images/stats/opera.gif')) . '" alt="Opera_ico" loading="lazy"/> Opera </td>
                <td>
                <div class="text-center small">' . $opera[1] . ' %</div>
                <div class="progress bg-light">
                    <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="' . $opera[1] . '" aria-valuemin="0" aria-valuemax="100" style="width:' . $opera[1] . '%; height:1rem;"></div>
                </div>
                </td>
                <td>' . $opera[0] . '</td>
            </tr>';
        }

        if ($chrome[1] > 0) {
            echo '
            <tr>
                <td><img src="' . (Theme::image('stats/chrome.gif') ?: Asset::url('images/stats/chrome.gif')) . '" alt="Chrome_ico" loading="lazy"/> Chrome </td>
                <td>
                <div class="text-center small">' . $chrome[1] . ' %</div>
                <div class="progress bg-light">
                    <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="' . $chrome[1] . '" aria-valuemin="0" aria-valuemax="100" style="width:' . $chrome[1] . '%; height:1rem;"></div>
                </div>
                </td>
                <td>' . $chrome[0] . '</td>
            </tr>';
        }

        if ($safari[1] > 0) {
            echo '
            <tr>
                <td><img src="' . (Theme::image('stats/safari.gif') ?: Asset::url('images/stats/safari.gif')) . '" alt="Safari_ico" loading="lazy"/> Safari </td>
                <td>
                <div class="text-center small">' . $safari[1] . ' %</div>
                <div class="progress bg-light">
                    <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="' . $safari[1] . '" aria-valuemin="0" aria-valuemax="100" style="width:' . $safari[1] . '%; height:1rem;"></div>
                </div>
                </td>
                <td>' . $safari[0] . '</td>
            </tr>';
        }

        if ($webtv[1] > 0) {
            echo '
            <tr>
                <td><img src="' . (Theme::image('stats/webtv.gif') ?: Asset::url('images/stats/webtv.gif')) . '"  alt="WebTV_ico" loading="lazy"/> WebTV </td>
                <td>
                <div class="text-center small">' . $webtv[1] . ' %</div>
                <div class="progress bg-light">
                    <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="' . $webtv[1] . '" aria-valuemin="0" aria-valuemax="100" style="width:' . $webtv[1] . '%; height:1rem;"></div>
                </div>
                </td>
                <td>' . $webtv[0] . '</td>
            </tr>';
        }

        if ($konqueror[1] > 0) {
            echo '
            <tr>
                <td><img src="' . (Theme::image('stats/konqueror.gif') ?: Asset::url('images/stats/konqueror.gif')) . '" alt="Konqueror_ico" loading="lazy"/> Konqueror </td>
                <td>
                <div class="text-center small">' . $konqueror[1] . ' %</div>
                <div class="progress bg-light">
                    <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="' . $konqueror[1] . '" aria-valuemin="0" aria-valuemax="100" style="width:' . $konqueror[1] . '%; height:1rem;"></div>
                </div>
                </td>
                <td>' . $konqueror[0] . '</td>
            </tr>';
        }

        if ($lynx[1] > 0) {
            echo '
            <tr>
                <td><img src="' . (Theme::image('stats/lynx.gif') ?: Asset::url('images/stats/lynx.gif')) . '" alt="Lynx_ico" loading="lazy"/> Lynx </td>
                <td>
                <div class="text-center small">' . $lynx[1] . ' %</div>
                <div class="progress bg-light">
                    <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="' . $lynx[1] . '" aria-valuemin="0" aria-valuemax="100" style="width:' . $lynx[1] . '%; height:1rem;"></div>
                </div>
                </td>
                <td>' . $lynx[0] . '</td>
            </tr>';
        }

        if ($bot[1] > 0) {
            echo '
            <tr>
                <td><img src="' . (Theme::image('stats/altavista.gif') ?: Asset::url('images/stats/altavista.gif')) . '" alt="' . translate("Moteurs de recherche") . '_ico" /> ' . translate("Moteurs de recherche") . ' </td>
                <td>
                <div class="text-center small">' . $bot[1] . ' %</div>
                <div class="progress bg-light">
                    <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="' . $bot[1] . '" aria-valuemin="0" aria-valuemax="100" style="width:' . $bot[1] . '%; height:1rem;"></div>
                </div>
                </td>
                <td>' . $bot[0] . '</td>
            </tr>';
        }

        if ($b_other[1] > 0) {
            echo '    
            <tr>
                <td><i class="fa fa-question fa-3x align-middle"></i> ' . translate("Inconnu") . ' </td>
                <td>
                <div class="text-center small">' . $b_other[1] . ' %</div>
                <div class="progress bg-light">
                    <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="' . $b_other[1] . '" aria-valuemin="0" aria-valuemax="100" style="width:' . $b_other[1] . '%; height:1rem;"></div>
                </div>
                </td>
                <td>' . $b_other[0] . '</td>
            </tr>';
        }

        echo '
                </tbody>
            </table>';

        //
        echo '
            <br />
            <h3 class="my-4">' . translate("Systèmes d'exploitation") . '</h3>
            <table data-toggle="table" data-mobile-responsive="true" >
                <thead>
                    <tr>
                        <th data-sortable="true" >' . translate("Systèmes d'exploitation") . '</th>
                        <th data-sortable="true" data-halign="center" data-align="right">%</th>
                        <th data-align="right"></th>
                    </tr>
                </thead>
                <tbody>';

        if ($windows[1] > 0) {
            echo '
            <tr>
                <td ><img src="' . (Theme::image('stats/windows.gif') ?: Asset::url('images/stats/windows.gif')) . '"  alt="Windows" loading="lazy"/>&nbsp;Windows</td>
                <td>
                <div class="text-center small">' . $windows[1] . ' %</div>
                <div class="progress bg-light">
                    <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="' . $windows[1] . '" aria-valuemin="0" aria-valuemax="100" style="width:' . $windows[1] . '%; height:1rem;"></div>
                </div>
                </td>
                <td>' . $windows[0] . '</td>
            </tr>';
        }

        if ($linux[1] > 0) {
            echo '
            <tr>
                <td ><img src="' . (Theme::image('stats/linux.gif') ?: Asset::url('images/stats/linux.gif')) . '"  alt="Linux" loading="lazy"/>&nbsp;Linux</td>
                <td>
                <div class="text-center small">' . $linux[1] . ' %</div>
                <div class="progress bg-light">
                    <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="' . $linux[1] . '" aria-valuemin="0" aria-valuemax="100" style="width:' . $linux[1] . '%; height:1rem;"></div>
                </div>
                </td>
                <td>' . $linux[0] . '</td>
            </tr>';
        }

        if ($mac[1] > 0) {
            echo '
            <tr>
                <td><img src="' . (Theme::image('stats/mac.gif') ?: Asset::url('images/stats/mac.gif')) . '"  alt="Mac/PPC" loading="lazy"/>&nbsp;Mac/PPC</td>
                <td>
                <div class="text-center small">' . $mac[1] . ' %</div>
                <div class="progress bg-light">
                    <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="' . $mac[1] . '" aria-valuemin="0" aria-valuemax="100" style="width:' . $mac[1] . '%; height:1rem;"></div>
                </div>
                </td>
                <td>' . $mac[0] . '</td>
            </tr>';
        }

        if ($freebsd[1] > 0) {
            echo '
            <tr>
                <td><img src="' . (Theme::image('stats/bsd.gif') ?: Asset::url('images/stats/bsd.gif')) . '"  alt="FreeBSD" loading="lazy"/>&nbsp;FreeBSD</td>
                <td>
                <div class="text-center small">' . $freebsd[1] . ' %</div>
                <div class="progress bg-light">
                    <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="' . $freebsd[1] . '" aria-valuemin="0" aria-valuemax="100" style="width:' . $freebsd[1] . '%; height:1rem;"></div>
                </div>
                </td>
                <td>' . $freebsd[0] . '</td>
            </tr>';
        }

        if ($sunos[1] > 0) {
            echo '
            <tr>
                <td><img src="' . (Theme::image('stats/sun.gif') ?: Asset::url('images/stats/sun.gif')) . '"  alt="SunOS" loading="lazy"/>&nbsp;SunOS</td>
                <td>
                <div class="text-center small">' . $sunos[1] . ' %</div>
                <div class="progress bg-light">
                    <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="' . $sunos[1] . '" aria-valuemin="0" aria-valuemax="100" style="width:' . $sunos[1] . '%; height:1rem;"></div>
                </div>
                </td>
                <td>' . $sunos[0] . '</td>
            </tr>';
        }

        if ($irix[1] > 0) {
            echo '
            <tr>
                <td><img src="' . (Theme::image('stats/irix.gif') ?: Asset::url('images/stats/irix.gif')) . '"  alt="IRIX" loading="lazy"/>&nbsp;IRIX</td>
                <td>
                <div class="text-center small">' . $irix[1] . ' %</div>
                <div class="progress bg-light">
                    <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="' . $irix[1] . '" aria-valuemin="0" aria-valuemax="100" style="width:' . $irix[1] . '%; height:1rem;"></div>
                </div>
                </td>
                <td>' . $irix[0] . '</td>
            </tr>';
        }

        if ($beos[1] > 0) {
            echo '
            <tr>
                <td><img src="' . (Theme::image('stats/be.gif') ?: Asset::url('images/stats/be.gif')) . '" alt="BeOS" loading="lazy"/>&nbsp;BeOS</td>
                <td>
                <div class="text-center small">' . $beos[1] . ' %</div>
                <div class="progress bg-light">
                    <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="' . $beos[1] . '" aria-valuemin="0" aria-valuemax="100" style="width:' . $beos[1] . '%; height:1rem;"></div>
                </div>
                </td>
                <td>' . $beos[0] . '</td>
            </tr>';
        }

        if ($os2[1] > 0) {
            echo '
            <tr>
                <td><img src="' . (Theme::image('stats/os2.gif') ?: Asset::url('images/stats/os2.gif')) . '" alt="OS/2" loading="lazy"/>&nbsp;OS/2</td>
                <td>
                <div class="text-center small">' . $os2[1] . ' %</div>
                <div class="progress bg-light">
                    <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="' . $os2[1] . '" aria-valuemin="0" aria-valuemax="100" style="width:' . $os2[1] . '%; height:1rem;"></div>
                </div>
                </td>
                <td>' . $os2[0] . '</td>
            </tr>';
        }

        if ($aix[1] > 0) {
            echo '
            <tr>
                <td><img src="' . (Theme::image('stats/aix.gif') ?: Asset::url('images/stats/aix.gif')) . '" alt="AIX" loading="lazy"/>&nbsp;AIX</td>
                <td>
                <div class="text-center small">' . $aix[1] . ' %</div>
                <div class="progress bg-light">
                    <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="' . $aix[1] . '" aria-valuemin="0" aria-valuemax="100" style="width:' . $aix[1] . '%; height:1rem;"></div>
                </div>
                </td>
                <td>' . $aix[0] . '</td>
            </tr>';
        }

        if ($android[1] > 0) {
            echo '
            <tr>
                <td><img src="' . (Theme::image('stats/android.gif') ?: Asset::url('images/stats/android.gif')) . '" alt="Android" loading="lazy"/>&nbsp;Android</td>
                <td>
                <div class="text-center small">' . $android[1] . ' %</div>
                <div class="progress bg-light">
                    <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="' . $android[1] . '" aria-valuemin="0" aria-valuemax="100" style="width:' . $android[1] . '%; height:1rem;"></div>
                </div>
                </td>
                <td>' . $android[0] . '</td>
            </tr>';
        }

        if ($ios[1] > 0) {
            echo '
            <tr>
                <td><img src="' . (Theme::image('stats/ios.gif') ?: Asset::url('images/stats/ios.gif')) . '" alt="Ios" loading="lazy"/> Ios</td>
                <td>
                <div class="text-center small">' . $ios[1] . ' %</div>
                <div class="progress bg-light">
                    <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="' . $ios[1] . '" aria-valuemin="0" aria-valuemax="100" style="width:' . $ios[1] . '%; height:1rem;"></div>
                </div>
                </td>
                <td>' . $ios[0] . '</td>
            </tr>';
        }

        if ($os_other[1] > 0) {
            echo '            
            <tr>
                <td><i class="fa fa-question fa-3x align-middle"></i>&nbsp;' . translate("Inconnu") . '</td>
                <td>
                <div class="text-center small">' . $os_other[1] . ' %</div>
                <div class="progress bg-light">
                    <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="' . $os_other[1] . '" aria-valuemin="0" aria-valuemax="100" style="width:' . $os_other[1] . '%; height:1rem;"></div>
                </div>
                </td>
                <td>' . $os_other[0] . '</td>
            </tr>';
        }

        echo '
                </tbody>
            </table>';

        //
        Stat::themeDistinct();

        //
        echo '
            <h3 class="my-4">' . translate("Statistiques diverses") . '</h3>
            <ul class="list-group">';

        if ($unum = sql_num_rows(sql_query("SELECT uid FROM " . sql_prefix('users'))) - 1 ?: 0 > 0) {
            echo '<li class="list-group-item d-flex justify-content-start align-items-center">
                <i class="fa fa-user fa-2x text-body-secondary me-1"></i>
                ' . translate("Utilisateurs enregistrés") . ' <span class="badge bg-secondary ms-auto">' . Sanitize::wrh($unum) . ' </span>
                </li>';
        }

        if ($gnum = sql_num_rows(sql_query("SELECT groupe_id FROM " . sql_prefix('groupes'))) ?: 0 > 0) {
            echo '<li class="list-group-item d-flex justify-content-start align-items-center">
                <i class="fa fa-users fa-2x text-body-secondary me-1"></i>
                ' . translate("Groupe") . ' <span class="badge bg-secondary ms-auto">' . Sanitize::wrh($gnum) . ' </span>
                </li>';
        }

        if ($snum = sql_num_rows(sql_query("SELECT sid FROM " . sql_prefix('stories'))) ?: 0 > 0) {
            echo '<li class="list-group-item d-flex justify-content-start align-items-center">
                <img class="me-1" src="' . (Theme::image('stats/postnew.png') ?: Asset::url('images/admin/postnew.png')) . '" alt="" loading="lazy"/>
                    ' . translate("Articles publiés") . ' <span class="badge bg-secondary ms-auto">' . Sanitize::wrh($snum) . ' </span>
                </li>';
        }

        if ($anum = sql_num_rows(sql_query("SELECT aid FROM " . sql_prefix('authors'))) ?: 0 > 0) {
            echo '<li class="list-group-item d-flex justify-content-start align-items-center">
                <i class="fa fa-user-edit fa-2x text-body-secondary me-1"></i>
                ' . translate("Auteurs actifs") . ' <span class="badge bg-secondary ms-auto">' . Sanitize::wrh($anum) . ' </span>
                </li>';
        }

        if ($cnum = sql_num_rows(sql_query("SELECT post_id 
                            FROM " . sql_prefix('posts') . " 
                            WHERE forum_id<0")) ?: 0 > 0) 
        {
            echo '<li class="list-group-item d-flex justify-content-start align-items-center">
                <i class="fa fa-comments fa-2x text-body-secondary me-1"></i>
                ' . translate("Commentaires") . ' <span class="badge bg-secondary ms-auto">' . Sanitize::wrh($cnum) . ' </span>
                </li>';
        }

        if ($secnum = sql_num_rows(sql_query("SELECT secid FROM " . sql_prefix('sections'))) ?: 0 > 0) {
            echo '<li class="list-group-item d-flex justify-content-start align-items-center">
                <img class="me-1" src="' . (Theme::image('stats/sections.png') ?: Asset::url('images/admin/sections.png')) . '" alt="" loading="lazy"/>
                    ' . translate("Rubriques spéciales") . ' <span class="badge bg-secondary ms-auto">' . Sanitize::wrh($secnum) . ' </span>
                </li>';
        }

        if ($secanum = sql_num_rows(sql_query("SELECT artid FROM " . sql_prefix('seccont'))) ?: 0 > 0) {
            echo '<li class="list-group-item d-flex justify-content-start align-items-center">
                <img class="me-1" src="' . (Theme::image('stats/sections.png') ?: Asset::url('images/admin/sections.png')) . '" alt="" loading="lazy"/>
                    ' . translate("Articles présents dans les rubriques") . ' <span class="badge bg-secondary ms-auto">' . Sanitize::wrh($secanum) . ' </span>
                </li>';
        }

        if ($subnum = sql_num_rows(sql_query("SELECT qid FROM " . sql_prefix('queue'))) ?: 0 > 0) {
            echo '<li class="list-group-item d-flex justify-content-start align-items-center">
                <img class="me-1" src="' . (Theme::image('stats/submissions.png') ?: Asset::url('images/admin/submissions.png')) . '"  alt="" />
                    ' . translate("Article en attente d'édition") . ' <span class="badge bg-secondary ms-auto">' . Sanitize::wrh($subnum) . ' </span>
                </li>';
        }

        if ($tnum = sql_num_rows(sql_query("SELECT topicid FROM " . sql_prefix('topics'))) ?: 0 > 0) {
            echo '<li class="list-group-item d-flex justify-content-start align-items-center">
                <img class="me-1" src="' . (Theme::image('stats/topicsman.png') ?: Asset::url('images/admin/topicsman.png')) . '" alt="" loading="lazy"/>
                    ' . translate("Sujets actifs") . ' <span class="badge bg-secondary ms-auto">' . Sanitize::wrh($tnum) . ' </span>
                </li>';
        }

        if ($links = sql_num_rows(sql_query("SELECT lid FROM " . sql_prefix('links_links'))) ?: 0 > 0) {
            echo '<li class="list-group-item d-flex justify-content-start align-items-center">
                <i class="fa fa-link fa-2x text-body-secondary me-1"></i>
                ' . translate("Liens présents dans la rubrique des liens web") . ' <span class="badge bg-secondary ms-auto">' . Sanitize::wrh($links) . ' </span>
                </li>';
        }

        if ($cat = ((sql_num_rows(sql_query("SELECT cid FROM " . sql_prefix('links_categories'))) ?: 0) + (sql_num_rows(sql_query("SELECT sid FROM " . sql_prefix('links_subcategories'))) ?: 0)) > 0) {
            echo '<li class="list-group-item d-flex justify-content-start align-items-center">
                <i class="fa fa-link fa-2x text-body-secondary me-1"></i>
                ' . translate("Catégories dans la rubrique des liens web") . ' <span class="badge bg-secondary ms-auto">' . Sanitize::wrh((int) $cat) . ' </span>
                </li>';
        }

        echo '    </ul>
            <br />';


        Versioning::cms(); 
        Versioning::copyright(); 

        Theme::footer();
    }
    
}

switch (Request::input('op')) 
{
    default:
        controllerStart(StatistiqueController::class, 'index');
        break;
}