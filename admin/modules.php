<?php



if (!function_exists('admindroits')) {
    include('die.php');
}

$f_meta_nom = 'modules';

$f_titre = adm_translate("Gestion, Installation Modules");

//==> controle droit
admindroits($aid, $f_meta_nom);
//<== controle droit

$hlpfile = "manuels/$language/modules.html";

global $language, $adminimg, $admf_ext;

include("header.php");

GraphicAdmin($hlpfile);

$handle = opendir('modules');

$modlist = '';

while (false !== ($file = readdir($handle))) {
    if (!@file_exists("modules/$file/kernel")) {

        if (is_dir("modules/$file") and ($file != '.') and ($file != '..')) {
            $modlist .= "$file ";
        }
    }
}

closedir($handle);

$modlist = explode(' ', rtrim($modlist));

$whatondb = sql_query("SELECT mnom 
                       FROM " . sql_prefix('modules'));

while ($row = sql_fetch_row($whatondb)) {
    if (!in_array($row[0], $modlist)) {
        sql_query("DELETE FROM " . sql_prefix('modules') . " 
                   WHERE mnom='" . $row[0] . "'");
    }
}

foreach ($modlist as $value) {
    $queryexiste = sql_query("SELECT mnom F
                              ROM " . sql_prefix('modules') . " 
                              WHERE mnom='" . $value . "'");

    $moexiste = sql_num_rows($queryexiste);

    if ($moexiste !== 1) {
        sql_query("INSERT INTO " . sql_prefix('modules') . " 
                   VALUES (NULL, '" . $value . "', '0')");
    }
}

adminhead($f_meta_nom, $f_titre, $adminimg);

echo '
    <hr />
    <h3>' . adm_translate("Les modules") . '</h3>
    <table id="tad_modu" data-toggle="table" data-striped="false" data-show-toggle="true" data-mobile-responsive="true" data-buttons-class="outline-secondary" data-icons="icons" data-icons-prefix="fa">
        <thead>
            <tr>
                <th data-align="center" class="n-t-col-xs-1"><img class="adm_img" src="public/assets/images/admin/module.png" alt="icon_module" /></th>
                <th data-sortable="true">' . adm_translate('Nom') . '</th>
                <th data-align="center" class="n-t-col-xs-2" >' . adm_translate('Fonctions') . '</th>
            </tr>
        </thead>
        <tbody>';

$result = sql_query("SELECT * FROM " . sql_prefix('modules') . " ORDER BY mid");

while ($row = sql_fetch_assoc($result)) {

    $icomod = '';
    $clatd = '';

    $icomod = file_exists("Modules/" . $row["mnom"] . "/" . $row["mnom"] . ".png") 
        ? '<img class="adm_img" src="modules/' . $row["mnom"] . '/' . $row["mnom"] . '.png" alt="icon_' . $row["mnom"] . '" title="" />' 
        : '<img class="adm_img" src="public/assets/images/admin/module.png" alt="icon_module" title="" />';

    if ($row["minstall"] == 0) {
        $status_chngac = file_exists("Modules/" . $row["mnom"] . "/install.conf.php") 
            ? '<a class="text-success" href="admin.php?op=Module-Install&amp;ModInstall=' . $row["mnom"] . '&amp;subop=install" ><i class="fa fa-compress fa-lg"></i><i class="fa fa-puzzle-piece fa-2x fa-rotate-90" title="' . adm_translate("Installer le module") . '" data-bs-toggle="tooltip"></i></a>' 
            : '<a class="text-success" href="admin.php?op=Module-Install&amp;ModInstall=' . $row["mnom"] . '&amp;subop=install"><i class="fa fa-check fa-lg"></i><i class="fa fa fa-puzzle-piece fa-2x fa-rotate-90" title="' . adm_translate("Pas d'installeur disponible") . ' ' . adm_translate("Marquer le module comme installé") . '" data-bs-toggle="tooltip"></i></a>';
        
        $clatd = 'table-danger';
    } else {
        $status_chngac =  file_exists("Modules/" . $row["mnom"] . "/install.conf.php") 
            ? '<a class="text-danger" href="admin.php?op=Module-Install&amp;ModDesinstall=' . $row["mnom"] . '" ><i class="fa fa-expand fa-lg"></i><i class="fa fa fa-puzzle-piece fa-2x fa-rotate-90" title="' . adm_translate("Désinstaller le module") . '" data-bs-toggle="tooltip"></i></a>' 
            : '<a class="text-danger" href="admin.php?op=Module-Install&amp;ModDesinstall=' . $row["mnom"] . '" ><i class="fa fa fa-ban fa-lg"></i><i class="fa fa fa-puzzle-piece fa-2x fa-rotate-90" title="' . adm_translate("Marquer le module comme désinstallé") . '" data-bs-toggle="tooltip"</i></a>';
        
        $clatd = 'table-success';
    }

    echo '
            <tr>
                <td class="' . $clatd . '">' . $icomod . '</td>
                <td class="' . $clatd . '">' . $row["mnom"] . '</td>
                <td class="' . $clatd . '">' . $status_chngac . '</td>
            </tr>';
}

echo '
        </tbody>
    </table>';

adminfoot('', '', '', '');