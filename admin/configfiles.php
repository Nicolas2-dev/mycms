<?php


if (!function_exists('admindroits')) {
    include('die.php');
}

$f_meta_nom = 'ConfigFiles';
$f_titre = adm_translate("Les fichiers de configuration");

//==> controle droit
admindroits($aid, $f_meta_nom);
//<== controle droit

global $language;
$hlpfile = "manuels/$language/configfiles.html";

function ConfigFiles($contents, $files)
{
    global $hlpfile, $language, $max_car, $f_meta_nom, $f_titre, $adminimg;

    include("header.php");

    GraphicAdmin($hlpfile);
    adminhead($f_meta_nom, $f_titre, $adminimg);

    if ($contents == '') {
        echo '
        <hr />
        <table id="tad_cfile" data-toggle="table" data-striped="true" data-show-toggle="true" data-buttons-class="outline-secondary" data-icons="icons" data-icons-prefix="fa">
            <thead>
                <tr>
                    <th class="n-t-col-xs-4" data-halign="center" data-align="center" >' . adm_translate('Nom') . '</th>
                    <th class="n-t-col-xs-6" data-halign="center" >' . adm_translate('Description') . '</th>
                    <th class="n-t-col-xs-2" data-halign="center" data-align="center" >' . adm_translate('Fonctions') . '</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="3"><span><b>/Themes/default/include</b></span></td>
                </tr>
                <tr>
                    <td><code>header_before.inc</code></td>
                    <td>' . adm_translate("Ce fichier est appelé avant que de commencer la génération de la page HTML") . '</td>
                    <td>
                        <a href="admin.php?op=ConfigFiles_load&amp;files=header_before"><i class="fa fa-edit fa-lg" title="' . adm_translate("Editer") . '" data-bs-toggle="tooltip"></i></a>
                        <a href="admin.php?op=delete_configfile&amp;file=header_before"><i class="fas fa-trash fa-lg text-danger ms-3" title="' . adm_translate("Supprimer") . '" data-bs-toggle="tooltip" ></i></a>
                    </td>
                </tr>
                <tr>
                    <td><code>header_head.inc</code></td>
                    <td>' . adm_translate("Ce fichier est appelé entre le HEAD et /HEAD lors de la génération de la page HTML") . '</td>
                    <td>
                        <a href="admin.php?op=ConfigFiles_load&amp;files=header_head"><i class="fa fa-edit fa-lg" title="' . adm_translate("Editer") . '" data-bs-toggle="tooltip"></i></a>
                    </td>
                </tr>
                <tr>
                    <td><code>body_onload.inc</code></td>
                    <td>' . adm_translate("Ce fichier est appelé dans l'évènement ONLOAD de la balise BODY => JAVASCRIPT") . '</td>
                    <td>
                        <a href="admin.php?op=ConfigFiles_load&amp;files=body_onload"><i class="fa fa-edit fa-lg" title="' . adm_translate("Editer") . '" data-bs-toggle="tooltip"></i></a>
                        <a href="admin.php?op=delete_configfile&amp;file=body_onload"><i class="fas fa-trash fa-lg text-danger ms-3" title="' . adm_translate("Supprimer") . '" data-bs-toggle="tooltip" ></i></a>
                    </td>
                </tr>
                <tr>
                    <td><code>header_after.inc</code></td>
                    <td>' . adm_translate("Ce fichier est appelé à la fin du header du thème") . '</td>
                    <td>
                        <a href="admin.php?op=ConfigFiles_load&amp;files=header_after"><i class="fa fa-edit fa-lg" title="' . adm_translate("Editer") . '" data-bs-toggle="tooltip"></i></a>
                        <a href="admin.php?op=delete_configfile&amp;file=header_after"><i class="fas fa-trash fa-lg text-danger ms-3" title="' . adm_translate("Supprimer") . '" data-bs-toggle="tooltip" ></i></a>
                    </td>
                </tr>
                <tr>
                    <td><code>footer_before.inc</code></td>
                    <td>' . adm_translate("Ce fichier est appelé avant le début du footer du thème") . '</td>
                    <td>
                        <a href="admin.php?op=ConfigFiles_load&amp;files=footer_before"><i class="fa fa-edit fa-lg" title="' . adm_translate("Editer") . '" data-bs-toggle="tooltip"></i></a>
                        <a href="admin.php?op=delete_configfile&amp;file=footer_before"><i class="fas fa-trash fa-lg text-danger ms-3" title="' . adm_translate("Supprimer") . '" data-bs-toggle="tooltip" ></i></a></td>
                </tr>
                <tr>
                    <td><code>footer_after.inc</code></td>
                    <td>' . adm_translate("Ce fichier est appelé après la fin de la génération de la page HTML") . '</td>
                    <td>
                        <a href="admin.php?op=ConfigFiles_load&amp;files=footer_after"><i class="fa fa-edit fa-lg" title="' . adm_translate("Editer") . '" data-bs-toggle="tooltip"></i></a>
                        <a href="admin.php?op=delete_configfile&amp;file=footer_after"><i class="fas fa-trash fa-lg text-danger ms-3" title="' . adm_translate("Supprimer") . '" data-bs-toggle="tooltip" ></i></a>
                    </td>
                </tr>
                <tr>
                    <td><code>new_user.inc</code></td>
                    <td>' . adm_translate("Ce fichier permet d'envoyer un MI personnalisé lorsqu'un nouveau membre s'inscrit") . '</td>
                    <td>
                        <a href="admin.php?op=ConfigFiles_load&amp;files=new_user"><i class="fa fa-edit fa-lg" title="' . adm_translate("Editer") . '" data-bs-toggle="tooltip"></i></a>
                        <a href="admin.php?op=delete_configfile&amp;file=new_user"><i class="fas fa-trash fa-lg text-danger ms-3" title="' . adm_translate("Supprimer") . '" data-bs-toggle="tooltip" ></i></a>
                    </td>
                </tr>
                <tr>
                    <td><code>user.inc</code></td>
                    <td>' . adm_translate("Ce fichier permet l'affichage d'informations complémentaires dans la page de login") . '</td>
                    <td>
                        <a href="admin.php?op=ConfigFiles_load&amp;files=user"><i class="fa fa-edit fa-lg" title="' . adm_translate("Editer") . '" data-bs-toggle="tooltip"></i></a>
                        <a href="admin.php?op=delete_configfile&amp;file=user"><i class="fas fa-trash fa-lg text-danger ms-3" title="' . adm_translate("Supprimer") . '" data-bs-toggle="tooltip" ></i></a>
                    </td>
                </tr>
                <tr>
                    <td><code>Config/Cache/Config.php</code></td>
                    <td>' . adm_translate("Ce fichier permet la configuration technique de SuperCache") . ' ( / )</td>
                    <td><a href="admin.php?op=ConfigFiles_load&amp;files=cache.config"><i class="fa fa-edit fa-lg" title="' . adm_translate("Editer") . '" data-bs-toggle="tooltip"></i></a></td>
                </tr>
                <tr>
                    <td><code>robots.txt</code></td>
                    <td>( / )</td>
                    <td><a href="admin.php?op=ConfigFiles_load&amp;files=robots"><i class="fa fa-edit fa-lg" title="' . adm_translate("Editer") . '" data-bs-toggle="tooltip"></i></a></td>
                </tr>
                <tr>
                    <td><code>humans.txt</code></td>
                    <td>( / )</td>
                    <td><a href="admin.php?op=ConfigFiles_load&amp;files=humans"><i class="fa fa-edit fa-lg" title="' . adm_translate("Editer") . '" data-bs-toggle="tooltip"></i></a></td>
                </tr>
            </tbody>
        </table>';
    } else {
        echo '
        <hr />
        <h3 class="my-3">' . adm_translate("Modification de") . ' : <span class="text-body-secondary">' . $files . '</span></h3>
        <form action="admin.php?op=ConfigFiles_save" method="post">
            <code><textarea class="form-control" name="Xtxt" rows="20" cols="70">';

        echo htmlspecialchars($contents, ENT_COMPAT | ENT_SUBSTITUTE | ENT_HTML401, 'UTF-8');
            
        echo '</textarea></code>
            <input type="hidden" name="Xfiles" value="' . $files . '" />
            <div class="mb-3 mt-3">
                <button class="btn btn-primary" type="submit" name="confirm">' . adm_translate("Sauver les modifications") . '</button> 
                <button href="admin.php?op=ConfigFiles" class="btn btn-secondary">' . adm_translate("Abandonner") . '</button>
            </div>
        </form>';
    }

    adminfoot('', '', '', '');
}

function ConfigFiles_save($Xtxt, $Xfiles)
{
    if ($Xfiles == "header_before") {
        $fp = fopen("Themes/default/include/header_before.inc", "w");
        fputs($fp, stripslashes($Xtxt));
        fclose($fp);
    } elseif ($Xfiles == "header_head") {
        $fp = fopen("Themes/default/include/header_head.inc", "w");
        fputs($fp, stripslashes($Xtxt));
        fclose($fp);
    } elseif ($Xfiles == "body_onload") {
        $fp = fopen("Themes/default/include/body_onload.inc", "w");
        fputs($fp, stripslashes($Xtxt));
        fclose($fp);
    } elseif ($Xfiles == "header_after") {
        $fp = fopen("Themes/default/include/header_after.inc", "w");
        fputs($fp, stripslashes($Xtxt));
        fclose($fp);
    } elseif ($Xfiles == "footer_before") {
        $fp = fopen("Themes/default/include/footer_before.inc", "w");
        fputs($fp, stripslashes($Xtxt));
        fclose($fp);
    } elseif ($Xfiles == "footer_after") {
        $fp = fopen("Themes/default/include/footer_after.inc", "w");
        fputs($fp, stripslashes($Xtxt));
        fclose($fp);
    } elseif ($Xfiles == "new_user") {
        $fp = fopen("Themes/default/include/new_user.inc", "w");
        fputs($fp, stripslashes($Xtxt));
        fclose($fp);
    } elseif ($Xfiles == "user") {
        $fp = fopen("Themes/default/include/user.inc", "w");
        fputs($fp, stripslashes($Xtxt));
        fclose($fp);
    } elseif ($Xfiles == "cache.config") {
        $fp = fopen("Config/Cache/Config.php", "w");
        fputs($fp, stripslashes($Xtxt));
        fclose($fp);
    } elseif ($Xfiles == "robots") {
        $fp = fopen("robots.txt", "w");
        fputs($fp, stripslashes($Xtxt));
        fclose($fp);
    } elseif ($Xfiles == "humans") {
        $fp = fopen("humans.txt", "w");
        fputs($fp, stripslashes($Xtxt));
        fclose($fp);
    }

    global $aid;
    Ecr_Log('security', "SaveConfigFile($Xfiles) by AID : $aid", '');

    header("location: admin.php?op=ConfigFiles");
}

function delete_configfile($fileX)
{
    global $hlpfile, $f_meta_nom, $f_titre, $adminimg;

    include("header.php");

    GraphicAdmin($hlpfile);
    adminhead($f_meta_nom, $f_titre, $adminimg);

    echo '
    <div class="alert alert-danger" role="alert">
        <p><strong>' . adm_translate("Supprimer le fichier") . ' ' . $fileX . ' ? </strong><br /><br /><a class="btn btn-danger btn-sm" href="admin.php?op=ConfigFiles_delete&amp;file=' . $fileX . '">' . adm_translate("Oui") . '</a>&nbsp;&nbsp;<a class="btn btn-secondary btn-sm" href="admin.php?op=ConfigFiles" >' . adm_translate("Non") . '</a></p>
    </div>';

    adminfoot('', '', '', '');
}

function ConfigFiles_delete($modele)
{
    if ($modele == 'header_before')
        @unlink("Themes/default/include/header_before.inc");
    elseif ($modele == 'header_head')
        @unlink("Themes/default/include/header_head.inc");
    elseif ($modele == 'body_onload')
        @unlink("Themes/default/include/body_onload.inc");
    elseif ($modele == 'header_after')
        @unlink("Themes/default/include/header_after.inc");
    elseif ($modele == 'footer_before')
        @unlink("Themes/default/include/footer_before.inc");
    elseif ($modele == 'footer_after')
        @unlink("Themes/default/include/footer_after.inc");
    elseif ($modele == 'new_user')
        @unlink("Themes/default/include/new_user.inc");
    elseif ($modele == 'user')
        @unlink("Themes/default/include/user.inc");

    global $aid;
    Ecr_Log('security', "DeleteConfigFile($modele) by AID : $aid", '');

    header("location: admin.php?op=ConfigFiles");
}

function copy_sample($fileX)
{
    global $hlpfile, $f_meta_nom, $f_titre, $adminimg, $header;

    if ($header != 1) {
        include("header.php");
    }

    GraphicAdmin($hlpfile);
    adminhead($f_meta_nom, $f_titre, $adminimg);

    echo '
    <hr />
    <div class="card card-body">
        <p>' . adm_translate("Créer le fichier en utilisant le modèle") . ' ? <br /><br /><a class="btn btn-primary" href="admin.php?op=ConfigFiles_create&amp;modele=' . $fileX . '" >' . adm_translate("Oui") . '</a>&nbsp;&nbsp;<a class="btn btn-secondary" href="admin.php?op=ConfigFiles" >' . adm_translate("Non") . '</a></p>
    </div>';

    adminfoot('', '', '', '');
}

function ConfigFiles_create($modele)
{
    @umask("0000");

    if ($modele == "header_before") {
        @copy("Themes/default/include/sample.header_before.inc", "Themes/default/include/header_before.inc");
        @chmod("Themes/default/include/header_before.inc", 0766);
    } elseif ($modele == "header_head") {
        @copy("Themes/default/include/sample.header_head.inc", "Themes/default/include/header_head.inc");
        @chmod("Themes/default/include/header_head.inc", 0766);
    } elseif ($modele == "body_onload") {
        @copy("Themes/default/include/sample.body_onload.inc", "Themes/default/include/body_onload.inc");
        @chmod("Themes/default/include/body_onload.inc", 0766);
    } elseif ($modele == "header_after") {
        @copy("Themes/default/include/sample.header_after.inc", "Themes/default/include/header_after.inc");
        @chmod("Themes/default/include/header_after.inc", 0766);
    } elseif ($modele == "footer_before") {
        copy("Themes/default/include/sample.footer_before.inc", "Themes/default/include/footer_before.inc");
        chmod("Themes/default/include/footer_before.inc", 0766);
    } elseif ($modele == "footer_after") {
        @copy("Themes/default/include/sample.footer_after.inc", "Themes/default/include/footer_after.inc");
        @chmod("Themes/default/include/footer_after.inc", 0766);
    } elseif ($modele == "new_user") {
        @copy("Themes/default/include/sample.new_user.inc", "Themes/default/include/new_user.inc");
        @chmod("Themes/default/include/new_user.inc", 0766);
    } elseif ($modele == "user") {
        @copy("Themes/default/include/sample.user.inc", "Themes/default/include/user.inc");
        @chmod("Themes/default/include/user.inc", 0766);
    }

    global $aid;
    Ecr_Log('security', "CreateConfigFile($modele) by AID : $aid", '');

    header("location: admin.php?op=ConfigFiles");
}

switch ($op) {
    case 'ConfigFiles_load':
        if ($files == 'header_before') {
            if (file_exists("Themes/default/include/header_before.inc")) {
                $fp = fopen("Themes/default/include/header_before.inc", "r");

                $Xcontents = fread($fp, filesize("Themes/default/include/header_before.inc"));
                fclose($fp);
                ConfigFiles($Xcontents, $files);
            } else {
                copy_sample($files);
            }

        } elseif ($files == 'header_head') {
            if (file_exists("Themes/default/include/header_head.inc")) {
                $fp = fopen("Themes/default/include/header_head.inc", "r");

                $Xcontents = fread($fp, filesize("Themes/default/include/header_head.inc"));
                fclose($fp);
                ConfigFiles($Xcontents, $files);
            } else {
                copy_sample($files);
            }

        } elseif ($files == 'body_onload') {
            if (file_exists("Themes/default/include/body_onload.inc")) {
                $fp = fopen("Themes/default/include/body_onload.inc", "r");

                $Xcontents = fread($fp, filesize("Themes/default/include/body_onload.inc"));
                fclose($fp);
                ConfigFiles($Xcontents, $files);
            } else {
                copy_sample($files);
            }

        } elseif ($files == 'header_after') {
            if (file_exists("Themes/default/include/header_after.inc")) {
                $fp = fopen("Themes/default/include/header_after.inc", "r");

                $Xcontents = fread($fp, filesize("Themes/default/include/header_after.inc"));
                fclose($fp);
                ConfigFiles($Xcontents, $files);
            } else {
                copy_sample($files);
            }

        } elseif ($files == 'footer_before') {
            if (file_exists("Themes/default/include/footer_before.inc")) {
                $fp = fopen("Themes/default/include/footer_before.inc", "r");

                $Xcontents = fread($fp, filesize("Themes/default/include/footer_before.inc"));
                fclose($fp);
                ConfigFiles($Xcontents, $files);
            } else {
                copy_sample($files);
            }

        } elseif ($files == 'footer_after') {
            if (file_exists("Themes/default/include/footer_after.inc")) {
                $fp = fopen("Themes/default/include/footer_after.inc", "r");

                $Xcontents = fread($fp, filesize("Themes/default/include/footer_after.inc"));
                fclose($fp);
                ConfigFiles($Xcontents, $files);
            } else {
                copy_sample($files);
            }

        } elseif ($files == 'new_user') {
            if (file_exists("Themes/default/include/new_user.inc")) {
                $fp = fopen("Themes/default/include/new_user.inc", "r");

                $Xcontents = fread($fp, filesize("Themes/default/include/new_user.inc"));
                fclose($fp);
                ConfigFiles($Xcontents, $files);
            } else {
                copy_sample($files);
            }

        } elseif ($files == 'user') {
            if (file_exists("Themes/default/include/user.inc")) {
                $fp = fopen("Themes/default/include/user.inc", "r");

                $Xcontents = fread($fp, filesize("Themes/default/include/user.inc"));
                fclose($fp);
                ConfigFiles($Xcontents, $files);
            } else {
                copy_sample($files);
            }

        } elseif ($files == 'cache.config') {
            if (file_exists("Config/Cache/Config.php")) {
                $fp = fopen("Config/Cache/Config.php", "r");

                $Xcontents = fread($fp, filesize("Config/Cache/Config.php"));
                fclose($fp);
                ConfigFiles($Xcontents, $files);
            }
        } elseif ($files == 'robots') {
            if (file_exists("robots.txt")) {
                $fp = fopen("robots.txt", "r");
                $Xcontents = fread($fp, filesize("robots.txt"));

                fclose($fp);
                ConfigFiles($Xcontents, $files);
            }
        } elseif ($files == 'humans') {
            if (file_exists("humans.txt")) {
                $fp = fopen("humans.txt", "r");
                $Xcontents = fread($fp, filesize("humans.txt"));

                fclose($fp);
                ConfigFiles($Xcontents, $files);
            }
        }
        break;

    case 'ConfigFiles_save':
        ConfigFiles_save($Xtxt, $Xfiles);
        break;

    case 'ConfigFiles_create':
        ConfigFiles_create($modele);
        break;

    case 'delete_configfile':
        delete_configfile($file);
        break;

    case 'ConfigFiles_delete':
        ConfigFiles_delete($file);
        break;

    default:
        ConfigFiles('', '');
        break;
}