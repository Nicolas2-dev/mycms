<?php

declare(strict_types=1);

use Npds\Filesystem\File;
use Npds\Http\Controller;
use Npds\Support\Sanitize;
use Npds\Support\Facades\Auth;
use Npds\Support\Facades\Date;
use Npds\Support\Facades\Theme;
use Npds\Support\Facades\Mailer;
use Npds\Support\Facades\Request;
use Npds\Support\Facades\Language;
use Npds\Filesystem\FileManagement;
use Npds\Support\Facades\Paginator;


if (!function_exists("Mysql_Connexion")) {
    include("Boot/grab_globals.php");
}

class DownloadController extends Controller
{

    /**
     * [description]
     */
    use DownloadPrivate;

    /**
     * [geninfo description]
     *
     * @param   string  $did           [$did description]
     * @param   int     $out_template  [$out_template description]
     *
     * @return  [type]                 [return description]
     */
    public function geninfo(string $did, int $out_template)
    {
        $result = sql_query("SELECT dcounter, durl, dfilename, dfilesize, ddate, dweb, duser, dver, dcategory, ddescription, perms 
                            FROM " . sql_prefix('downloads') . " 
                            WHERE did='$did'");

        list($dcounter, $durl, $dfilename, $dfilesize, $ddate, $dweb, $duser, $dver, $dcategory, $ddescription, $dperm) = sql_fetch_row($result);

        $okfile = false;

        if (!stristr($dperm, ',')) {
            $okfile = Auth::autorisation($dperm);
        } else {
            $ibidperm = explode(',', $dperm);

            foreach ($ibidperm as $v) {
                if (Auth::autorisation($v)) {
                    $okfile = true;
                    break;
                }
            }
        }

        if ($okfile) {
            // $title = $dfilename;

            if ($out_template == 1) {
                Theme::header();

                echo '
                <h2 class="mb-3">' . translate("Chargement de fichiers") . '</h2>
                <div class="card">
                    <div class="card-header"><h4>' . $dfilename . '<span class="ms-3 text-body-secondary small">@' . $durl . '</h4></div>
                    <div class="card-body">';
            }

            echo '<p><strong>' . translate("Taille du fichier") . ' : </strong>';

            // $Fichier = new File($durl);
            $objZF = new FileManagement;

            echo ($dfilesize != 0) ? $objZF->file_size_format($dfilesize, 1) : $objZF->file_size_auto($durl, 2);

            echo '</p>
                    <p><strong>' . translate("Version") . '&nbsp;:</strong>&nbsp;' . $dver . '</p>
                    <p><strong>' . translate("Date de chargement sur le serveur") . '&nbsp;:</strong>&nbsp;' . formatTimes($ddate, IntlDateFormatter::SHORT, IntlDateFormatter::NONE) . '</p>
                    <p><strong>' . translate("Chargements") . '&nbsp;:</strong>&nbsp;' . Sanitize::wrh($dcounter) . '</p>
                    <p><strong>' . translate("Catégorie") . '&nbsp;:</strong>&nbsp;' . Language::aff_langue(stripslashes($dcategory)) . '</p>
                    <p><strong>' . translate("Description") . '&nbsp;:</strong>&nbsp;' . Language::aff_langue(stripslashes($ddescription)) . '</p>
                    <p><strong>' . translate("Auteur") . '&nbsp;:</strong>&nbsp;' . $duser . '</p>
                    <p><strong>' . translate("Page d'accueil") . '&nbsp;:</strong>&nbsp;<a href="http://' . $dweb . '" target="_blank">' . $dweb . '</a></p>';
            
            if ($out_template == 1) {
                echo '
                    <a class="btn btn-primary" href="download.php?op=mydown&amp;did=' . $did . '" target="_blank" title="' . translate("Charger maintenant") . '" data-bs-toggle="tooltip" data-bs-placement="right"><i class="fa fa-lg fa-download"></i></a>
                    </div>
                </div>';

                Theme::footer();
            }
        } else {
            Header("Location: download.php");
        }
    }

    /**
     * [main description]
     *
     * @return  [type]  [return description]
     */
    public function main()
    {
        global $dcategory, $sortby, $sortorder;

        if (empty($dcategory)) {
            $dcategory  = removeHack(stripslashes(htmlspecialchars(urldecode($dcategory ?: ''), ENT_QUOTES, 'UTF-8'))); // electrobug
            $dcategory = str_replace("&#039;", "\'", $dcategory);
        }

        if (!empty($sortby)) {
            $sortby  = removeHack(stripslashes(htmlspecialchars(urldecode($sortby ?: ''), ENT_QUOTES, 'UTF-8'))); // electrobug
        }

        Theme::header();

        echo '
        <h2>' . translate("Chargement de fichiers") . '</h2>
        <hr />';

        $this->tlist();

        if ($dcategory != translate("Aucune catégorie")) {
            $this->listdownloads($dcategory, $sortby, $sortorder);
        }

        if (file_exists(storage_path('static/download.ban.txt'))) {
            include(storage_path('static/download.ban.txt'));
        }

        Theme::footer();
    }

    /**
     * [broken description]
     *
     * @param   int  $did  [$did description]
     *
     * @return  [type]     [return description]
     */
    public function broken(int $did)
    {
        global $user, $cookie, $notify_email, $notify_from, $nuke_url;

        if ($user) {
            if ($did) {

                $message = $nuke_url . "\n" . translate("Téléchargements") . " ID : $did\n" . translate("Auteur") . " $cookie[1] / IP : " . Request::getip() . "\n\n";
                
                include 'signat.php';

                Mailer::send_email($notify_email, html_entity_decode(translate("Rapporter un lien rompu"), ENT_COMPAT | ENT_HTML401, 'UTF-8'), nl2br($message), $notify_from, false, "html", '');
                
                Theme::header();

                echo '
                <div class="alert alert-success">
                <p class="lead">' . translate("Pour des raisons de sécurité, votre nom d'utilisateur et votre adresse IP vont être momentanément conservés.") . '<br />' . translate("Merci pour cette information. Nous allons l'examiner dès que possible.") . '</p>
                </div>';

                Theme::footer();
            } else {
                Header("Location: download.php");
            }
        } else {
            Header("Location: download.php");
        }
    }

    /**
     * [transferfile description]
     *
     * @param   int  $did  [$did description]
     *
     * @return  [type]     [return description]
     */
    public function transferfile(int $did)
    {
        $result = sql_query("SELECT dcounter, durl, perms 
                            FROM " . sql_prefix('downloads') . " 
                            WHERE did='$did'");

        list($dcounter, $durl, $dperm) = sql_fetch_row($result);

        if (!$durl) {
            Theme::header();

            echo '
            <h2>' . translate("Chargement de fichiers") . '</h2>
            <hr />
            <div class="lead alert alert-danger">' . translate("Ce fichier n'existe pas ...") . '</div>';

            Theme::footer();
        } else {
            if (stristr($dperm, ',')) {
                $ibid = explode(',', $dperm);

                foreach ($ibid as $v) {
                    $aut = true;

                    if (Auth::autorisation($v) == true) {
                        $dcounter++;

                        sql_query("UPDATE " . sql_prefix('downloads') . " 
                                SET dcounter='$dcounter' 
                                WHERE did='$did'");

                        header("location: " . str_replace(basename($durl), rawurlencode(basename($durl)), $durl));
                        break;
                    } else {
                        $aut = false;
                    }
                }

                if ($aut == false) {
                    Header("Location: download.php");
                }

            } else {
                if (Auth::autorisation($dperm)) {
                    $dcounter++;

                    sql_query("UPDATE " . sql_prefix('downloads') . " 
                            SET dcounter='$dcounter' 
                            WHERE did='$did'");

                    header("location: " . str_replace(basename($durl), rawurlencode(basename($durl)), $durl));
                } else {
                    Header("Location: download.php");
                }
            }
        }
    }

}

trait DownloadPrivate
{

    /**
     * [tlist description]
     *
     * @return  [type]  [return description]
     */
    protected function tlist()
    {
        global $sortby, $dcategory, $download_cat;

        if ($dcategory == '') {
            $dcategory = addslashes($download_cat);
        }

        $cate = stripslashes($dcategory);

        echo '
        <p class="lead">' . translate("Sélectionner une catégorie") . '</p>
        <div class="d-flex flex-column flex-sm-row flex-wrap justify-content-between my-3 border rounded">
            <p class="p-2 mb-0 ">';

        $acounter = sql_query("SELECT COUNT(*) 
                            FROM " . sql_prefix('downloads'));

        list($acount) = sql_fetch_row($acounter);

        if (($cate == translate("Tous")) or ($cate == '')) {
            echo '<i class="fa fa-folder-open fa-2x text-body-secondary align-middle me-2"></i><strong><span class="align-middle">' . translate("Tous") . '</span>
            <span class="badge bg-secondary ms-2 float-end my-2">' . $acount . '</span></strong>';
        } else {
            echo '<a href="download.php?dcategory=' . translate("Tous") . '&amp;sortby=' . $sortby . '"><i class="fa fa-folder fa-2x align-middle me-2"></i><span class="align-middle">' . translate("Tous") . '</span></a><span class="badge bg-secondary ms-2 float-end my-2">' . $acount . '</span>';
        }

        $result = sql_query("SELECT DISTINCT dcategory, COUNT(dcategory) 
                            FROM " . sql_prefix('downloads') . " 
                            GROUP BY dcategory 
                            ORDER BY dcategory");

        echo '</p>';

        while (list($category, $dcount) = sql_fetch_row($result)) {

            $category = stripslashes($category);
            echo '<p class="p-2 mb-0">';

            if ($category == $cate) {
                echo '<i class="fa fa-folder-open fa-2x text-body-secondary align-middle me-2"></i>
                    <strong class="align-middle">' . Language::aff_langue($category) . '
                        <span class="badge bg-secondary ms-2 float-end my-2">' . $dcount . '</span>
                    </strong>';
            } else {
                $category2 = urlencode($category);
                echo '<a href="download.php?dcategory=' . $category2 . '&amp;sortby=' . $sortby . '">
                    <i class="fa fa-folder fa-2x align-middle me-2"></i>
                    <span class="align-middle">' . Language::aff_langue($category) . '</span>
                </a><span class="badge bg-secondary ms-2 my-2 float-end">' . $dcount . '</span>';
            }

            echo '</p>';
        }

        echo '
        </div>';
    }

    /**
     * [act_dl_tableheader description]
     *
     * @param   string  $dcategory    [$dcategory description]
     * @param   string  $sortby       [$sortby description]
     * @param   string  $fieldname    [$fieldname description]
     * @param   string  $englishname  [$englishname description]
     *
     * @return  [type]                [return description]
     */
    protected function act_dl_tableheader(string $dcategory, string $sortby, string $fieldname, string $englishname)
    {
        echo '
        <a class="d-none d-sm-inline" href="download.php?dcategory=' . $dcategory . '&amp;sortby=' . $fieldname . '" title="' . translate("Croissant") . '" data-bs-toggle="tooltip" ><i class="fa fa-sort-amount-down"></i></a>&nbsp;
        ' . translate("$englishname") . '&nbsp;
        <a class="d-none d-sm-inline" href="download.php?dcategory=' . $dcategory . '&amp;sortby=' . $fieldname . '&amp;sortorder=DESC" title="' . translate("Décroissant") . '" data-bs-toggle="tooltip" ><i class="fa fa-sort-amount-up"></i></a>';
    }

    /**
     * [inact_dl_tableheader description]
     *
     * @param   string  $dcategory    [$dcategory description]
     * @param   string  $sortby       [$sortby description]
     * @param   string  $fieldname    [$fieldname description]
     * @param   string  $englishname  [$englishname description]
     *
     * @return  [type]                [return description]
     */
    protected function inact_dl_tableheader(string $dcategory, string $sortby, string $fieldname, string $englishname)
    {
        echo '
        <a class="d-none d-sm-inline" href="download.php?dcategory=' . $dcategory . '&amp;sortby=' . $fieldname . '" title="' . translate("Croissant") . '" data-bs-toggle="tooltip"><i class="fa fa-sort-amount-down" ></i></a>&nbsp;
        ' . translate("$englishname") . '&nbsp;
        <a class="d-none d-sm-inline" href="download.php?dcategory=' . $dcategory . '&amp;sortby=' . $fieldname . '&amp;sortorder=DESC" title="' . translate("Décroissant") . '" data-bs-toggle="tooltip"><i class="fa fa-sort-amount-up" ></i></a>';
    }

    /**
     * [dl_tableheader description]
     *
     * @return  [type]  [return description]
     */
    protected function dl_tableheader()
    {
        echo '</td>
        <td>';
    }

    /**
     * [popuploader description]
     *
     * @param   string  $did           [$did description]
     * @param   string  $ddescription  [$ddescription description]
     * @param   string  $dcounter      [$dcounter description]
     * @param   string  $dfilename     [$dfilename description]
     * @param   bool    $aff           [$aff description]
     *
     * @return  [type]                 [return description]
     */
    protected function popuploader(string $did, string $ddescription, string $dcounter, string $dfilename, bool $aff)
    {
        $out_template = 0;

        if ($aff) {
            echo '
                <a class="me-3" href="#" data-bs-toggle="modal" data-bs-target="#mo' . $did . '" title="' . translate("Information sur le fichier") . '" data-bs-toggle="tooltip"><i class="fa fa-info-circle fa-2x"></i></a>
                <a href="download.php?op=mydown&amp;did=' . $did . '" target="_blank" title="' . translate("Charger maintenant") . '" data-bs-toggle="tooltip"><i class="fa fa-download fa-2x"></i></a>
                <div class="modal fade" id="mo' . $did . '" tabindex="-1" role="dialog" aria-labelledby="my' . $did . '" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h4 class="modal-title text-start" id="my' . $did . '">' . translate("Information sur le fichier") . ' - ' . $dfilename . '</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" title=""></button>
                        </div>
                        <div class="modal-body text-start">';

            $this->geninfo($did, $out_template);

            echo '
                        </div>
                        <div class="modal-footer">
                            <a class="" href="download.php?op=mydown&amp;did=' . $did . '" title="' . translate("Charger maintenant") . '"><i class="fa fa-2x fa-download"></i></a>
                        </div>
                    </div>
                    </div>
                </div>';
        }
    }

    /**
     * [SortLinks description]
     *
     * @param   string  $dcategory  [$dcategory description]
     * @param   string  $sortby     [$sortby description]
     *
     * @return  [type]              [return description]
     */
    protected function SortLinks(string $dcategory, string $sortby)
    {
        global $user;

        $dcategory = stripslashes($dcategory);

        echo '
        <thead>
            <tr>
                <th class="text-center">' . translate("Fonctions") . '</th>
                <th class="text-center n-t-col-xs-1" data-sortable="true" data-sorter="htmlSorter">' . translate("Type") . '</th>
                <th class="text-center">';

        if ($sortby == 'dfilename' or !$sortby) {
            $this->act_dl_tableheader($dcategory, $sortby, "dfilename", "Nom");
        } else {
            $this->inact_dl_tableheader($dcategory, $sortby, "dfilename", "Nom");
        }

        echo '</th>
            <th class="text-center">';

        if ($sortby == "dfilesize"){
            $this->act_dl_tableheader($dcategory, $sortby, "dfilesize", "Taille");
        } else {
            $this->inact_dl_tableheader($dcategory, $sortby, "dfilesize", "Taille");
        }

        echo '</th>
            <th class="text-center">';

        if ($sortby == "dcategory") {
            $this->act_dl_tableheader($dcategory, $sortby, "dcategory", "Catégorie");
        } else {
            $this->inact_dl_tableheader($dcategory, $sortby, "dcategory", "Catégorie");
        }

        echo '</th>
            <th class="text-center">';

        if ($sortby == "ddate") {
            $this->act_dl_tableheader($dcategory, $sortby, "ddate", "Date");
        } else {
            $this->inact_dl_tableheader($dcategory, $sortby, "ddate", "Date");
        }

        echo '</th>
            <th class="text-center">';

        if ($sortby == "dver") {
            $this->act_dl_tableheader($dcategory, $sortby, "dver", "Version");
        } else{ 
            $this->inact_dl_tableheader($dcategory, $sortby, "dver", "Version");
        }

        echo '</th>
            <th class="text-center">';

        if ($sortby == "dcounter") { 
            $this->act_dl_tableheader($dcategory, $sortby, "dcounter", "Compteur");
        } else {
            $this->inact_dl_tableheader($dcategory, $sortby, "dcounter", "Compteur");
        }

        echo '</th>';

        if ($user or Auth::autorisation(-127)) {
            echo '<th class="text-center n-t-col-xs-1"></th>';
        }

        echo '
            </tr>
        </thead>';
    }

    /**
     * [listdownloads description]
     *
     * @param   string  $dcategory  [$dcategory description]
     * @param   ?string  $sortby     [$sortby description]
     * @param   ?string  $sortorder  [$sortorder description]
     *
     * @return  [type]              [return description]
     */
    protected function listdownloads(string $dcategory, ?string $sortby, ?string $sortorder)
    {
        global $perpage, $page, $download_cat, $user;

        if ($dcategory == '') {
            $dcategory = addslashes($download_cat);
        }

        if (!$sortby) {
            $sortby = 'dfilename';
        }

        if (($sortorder != "ASC") && ($sortorder != "DESC")) {
            $sortorder = "ASC";
        }

        echo '<p class="lead">';

        echo translate("Affichage filtré pour") . "&nbsp;<i>";

        if ($dcategory == translate("Tous")) {
            echo '<b>' . translate("Tous") . '</b>';
        } else {
            echo '<b>' . Language::aff_langue(stripslashes($dcategory)) . '</b>';
        }

        echo '</i>&nbsp;' . translate("trié par ordre") . '&nbsp;';

        // Shiney SQL Injection 11/2011
        $sortby2 = '';

        if ($sortby == 'dfilename') {
            $sortby2 = translate("Nom") . "";
        }

        if ($sortby == 'dfilesize') {
            $sortby2 = translate("Taille du fichier") . "";
        }

        if ($sortby == 'dcategory') {
            $sortby2 = translate("Catégorie") . "";
        }

        if ($sortby == 'ddate') {
            $sortby2 = translate("Date de création") . "";
        }

        if ($sortby == 'dver') {
            $sortby2 = translate("Version") . "";
        }

        if ($sortby == 'dcounter') {
            $sortby2 = translate("Chargements") . "";
        }

        // Shiney SQL Injection 11/2011
        if ($sortby2 == '') {
            $sortby = 'dfilename';
        }

        echo translate("de") . '&nbsp;<i><b>' . $sortby2 . '</b></i>
        </p>';

        echo '<table class="table table-hover mb-3 table-sm" id ="lst_downlo" data-toggle="table" data-striped="true" data-search="true" data-show-toggle="true" data-show-columns="true" data-mobile-responsive="true" data-buttons-class="outline-secondary" data-icons-prefix="fa" data-icons="icons">';

        $this->sortlinks($dcategory, $sortby);

        echo '<tbody>';

        if ($dcategory == translate("Tous")) {
            $sql = "SELECT COUNT(*) 
                    FROM " . sql_prefix('downloads');
        } else {
            $sql = "SELECT COUNT(*) 
                    FROM " . sql_prefix('downloads') . " 
                    WHERE dcategory='" . addslashes($dcategory) . "'";
        }

        $result = sql_query($sql);
        list($total) =  sql_fetch_row($result);

        //
        if ($total > $perpage) {
            $pages = ceil($total / $perpage);

            if ($page > $pages) {
                $page = $pages;
            }

            if (!$page) {
                $page = 1;
            }

            $offset = ($page - 1) * $perpage;
        } else {
            $offset = 0;
            $pages = 1;
            $page = 1;
        }

        //  
        $nbPages = ceil($total / $perpage);
        $current = 1;

        if ($page >= 1) {
            $current = $page;
        } elseif ($page < 1) {
            $current = 1;
        } else {
            $current = $nbPages;
        }

        settype($offset, 'integer');
        settype($perpage, 'integer');

        if ($dcategory == translate("Tous")) {
            $sql = "SELECT * 
                    FROM " . sql_prefix('downloads') . " 
                    ORDER BY $sortby $sortorder 
                    LIMIT $offset, $perpage";
        } else {
            $sql = "SELECT * 
                    FROM " . sql_prefix('downloads') . " 
                    WHERE dcategory='" . addslashes($dcategory) . "' 
                    ORDER BY $sortby $sortorder 
                    LIMIT $offset, $perpage";
        }

        $result = sql_query($sql);

        while (list($did, $dcounter, $durl, $dfilename, $dfilesize, $ddate, $dweb, $duser, $dver, $dcat, $ddescription, $dperm) = sql_fetch_row($result)) {

            $Fichier    = new File($durl); // keep for extension
            $FichX      = new FileManagement;

            $okfile = '';

            if (!stristr($dperm, ',')) {
                $okfile = Auth::autorisation($dperm);
            } else {
                $ibidperm = explode(',', $dperm);

                foreach ($ibidperm as $v) {
                    if (Auth::autorisation($v) == true) {
                        $okfile = true;
                        break;
                    }
                }
            }

            echo '<tr>
                <td class="text-center">';

            if ($okfile == true) {
                echo $this->popuploader($did, $ddescription, $dcounter, $dfilename, true);
            } else {
                echo $this->popuploader($did, $ddescription, $dcounter, $dfilename, false);
                echo '<span class="text-danger"><i class="fa fa-ban fa-lg me-1"></i>' . translate("Privé") . '</span>';
            }

            echo '</td>
                <td class="text-center">' . $Fichier->Affiche_Extention('webfont') . '</td>
                <td>';

            if ($okfile == true) {
                echo '<a href="download.php?op=mydown&amp;did=' . $did . '" target="_blank">' . $dfilename . '</a>';
            } else {
                echo '<span class="text-danger"><i class="fa fa-ban fa-lg me-1"></i>...</span>';
            }

            echo '</td>
                <td class="small text-center">';

            echo ($dfilesize != 0) 
                ? $FichX->file_size_format($dfilesize, 1) 
                : $FichX->file_size_auto($durl, 2);

            echo '</td>
                    <td>' . Language::aff_langue(stripslashes($dcat)) . '</td>
                    <td class="small text-center">' . Date::formatTimes($ddate, IntlDateFormatter::SHORT, IntlDateFormatter::NONE) . '</td>
                    <td class="small text-center">' . $dver . '</td>
                    <td class="small text-center">' . Sanitize::wrh($dcounter) . '</td>';

            if ($user != '' or Auth::autorisation(-127)) {
                echo '<td>';

                if (($okfile == true and $user != '') or Auth::autorisation(-127)) {
                    echo '<a href="download.php?op=broken&amp;did=' . $did . '" title="' . translate("Rapporter un lien rompu") . '" data-bs-toggle="tooltip"><i class="fas fa-lg fa-unlink"></i></a>';
                }

                echo '</td>';
            }

            echo '</tr>';
        }

        echo '
            </tbody>
        </table>';

        $dcategory = StripSlashes($dcategory);

        echo '<div class="mt-3"></div>' . Paginator::paginate_single('download.php?dcategory=' . $dcategory . '&amp;sortby=' . $sortby . '&amp;sortorder=' . $sortorder . '&amp;page=', '', $nbPages, $current, $adj = 3, '', $page);
    }

}


switch (Request::input('op')) 
{

    default:
    case 'main':
        controllerStart(
            DownloadController::class, 'main'
        );
        break;

    case 'mydown':
        controllerStart(
            DownloadController::class, 
            'transferfile',
            [
                // int
                Request::query('did')   
            ]
        );
        break;
        
    case 'geninfo':
        controllerStart(
            DownloadController::class, 
            'geninfo',
            [
                // int
                Request::query('did'),
                // string       
                Request::query('out_template')       
            ]
        );
        break;
    
    case 'broken':
        controllerStart(
            DownloadController::class, 
            'broken',
            [
                // int
                Request::query('did')      
            ]
        );
        break;

}
