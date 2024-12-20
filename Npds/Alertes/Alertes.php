<?php

declare(strict_types=1);

namespace Npds\Alertes;

use DirectoryIterator;
use Npds\Assets\Assets;
use Npds\Config\Config;
use Npds\Language\Language;
use Npds\FileManager\FileManager;


/**
 * recupérations des états des fonctions d'alertes ou activable et maj 
 * 
 * Note : (faire une fonction avec cache court dev ..)
 */
class Alertes 
{

    /**
     * Instance Alertes.
     *
     * @var \Npds\Alertes\Alertes
     */
    protected static Alertes $instance;

    /**
     * Instance Language.
     *
     * @var  Npds\Language\Language $instance
     */
    protected Language $language;

    /**
     * Instance FileManager.
     *
     * @var Npds\FileManager\FileManager $instance
     */
    protected FileManager $filemanager;
    
    /**
     * Instance Asset.
     *
     * @var  Npds\Assets\Assets $instance
     */
    protected Assets $asset;


    /**
     * Url github.
     */
    const GITHUB_URL = 'https://github.com/npds/npds_dune/archive/refs/tags';


    /**
     * Constructeur.
     */
    public function __construct()
    {
        $this->language = Language::getInstance();

        $this->filemanager = FileManager::getInstance();

        $this->asset = Assets::getInstance();
    }

    /**
     * get instance class Alertes.
     *
     * @return \Npds\Alertes $instance
     */
    public static function getInstance(): Alertes
    {
        if (isset(static::$instance)) {
            return static::$instance;
        }

        return static::$instance = new static();
    }    

    /**
     * Importation des alertes.
     *
     * @param array|null|false $Q   Retour de la requette sql, status Radminsuper de l'administrateur.
     * @param string  $aid          Id de l'administrateur.
     * 
     * @return void
     */
    public function initialise(array|null|false $Q, string $aid)
    {
        $this->articlesQueue();
        $this->autoNews();
        $this->fileManager();
        $this->utilisateurs();
        $this->referer();
        $this->critiques();
        $this->linksNews();
        $this->linksRompus();
        $this->publications($Q, $aid);
        $this->utilisateurGroupe();
    }

    /**
     * Undocumented function
     *
     * @param string  $bloc_foncts_A    Retour une chaine strin des liens d'alertes.
     * @param array   $versus_info      Tableau de version. 
     * @param string  $aid              Id de l'administrateur. 
     *             
     * @return void
     */
    public function renderMessagerie(string $bloc_foncts_A, array $versus_info, string $aid)
    {
        $this->alerteNpds($bloc_foncts_A);

        $this->renderModalJavaScrypt();   

        $this->modalVersionNpds($versus_info, $aid);

        $this->modalMessageNpds();
    }

    /**
     * Retourne bloc des alertes Npds.
     *
     * @param string $bloc_foncts_A     Retour une chaine strin des liens d'alertes.
     * 
     * @return void
     */
    public function alerteNpds(string $bloc_foncts_A)
    {
        echo '<div id="adm_men_dial" class="border rounded px-2 py-2" >
            <div id="adm_men_alert" >
                <div id="alertes">
                ' . $this->language->aff_langue($bloc_foncts_A) . '
                </div>
            </div>
        </div>';
    }

    /**
     * Retourne la modal de versionning Npds.
     *
     * @param array   $versus_info  Tableau de version. 
     * @param string  $aid          Id de l'administrateur.
     * 
     * @return void
     */
    public function modalVersionNpds(array $versus_info, string $aid)
    {
        $Version_Sub = Config::get('npds.Version_Sub');
        $Version_Num = Config::get('npds.Version_Num');

        echo '<div id ="mes_perm" class="contenair-fluid text-body-secondary" >
            <span class="car">' . $Version_Sub . ' ' . $Version_Num . ' ' . $aid . ' </span><span id="tempsconnection" class="car"></span>
        </div>
        <div class="modal fade" id="versusModal" tabindex="-1" aria-labelledby="versusModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="versusModalLabel"><img class="adm_img me-2" src="' . $this->asset->url('images/admin/message_npds.png') . '" alt="icon_" />' . adm_translate("Version") . ' NPDS</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Vous utilisez NPDS ' . $Version_Sub . ' ' . $Version_Num . '</p>
                    <p>' . adm_translate("Une nouvelle version de NPDS est disponible !") . '</p>
                    <p class="lead mt-3">' . $versus_info[1] . ' ' . $versus_info[2] . '</p>
                    <p class="my-3">
                        <a class="me-3" href="'. self::GITHUB_URL .'/' . $versus_info[2] . '.zip" target="_blank" title="" data-bs-toggle="tooltip" data-bs-original-title="Charger maintenant"><i class="fa fa-download fa-2x me-1"></i>.zip</a>
                        <a class="mx-3" href="'. self::GITHUB_URL .'/' . $versus_info[2] . '.tar.gz" target="_blank" title="" data-bs-toggle="tooltip" data-bs-original-title="Charger maintenant"><i class="fa fa-download fa-2x me-1"></i>.tar.gz</a>
                    </p>
                </div>
                <div class="modal-footer"></div>
            </div>
            </div>
        </div>';
    }

    /**
     * Retourne la modal de messagerie Npds.
     *
     * @return void
     */
    public function modalMessageNpds()
    {
        echo '<div class="modal fade" id="messageModal" tabindex="-1" aria-labelledby="messageModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id=""><span id="messageModalIcon" class="me-2"></span><span id="messageModalLabel"></span></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="messageModalContent"></p>
                    <form class="mt-3" id="messageModalForm" action="" method="POST">
                        <input type="hidden" name="id" id="messageModalId" value="0" />
                        <button type="submit" class="btn btn btn-primary btn-sm">' . adm_translate("Confirmer la lecture") . '</button>
                    </form>
                </div>
                <div class="modal-footer">
                <span class="small text-body-secondary">Information de npds.org</span><img class="adm_img me-2" src="'. $this->asset->url('images/admin/message_npds.png') .'" alt="icon_" />
                </div>
            </div>
            </div>
        </div>';
    }

    /**
     * Code javascypt de la messagerie pour la fenètre modal.
     *
     * @return void
     */
    public function renderModalJavaScrypt()
    {   
        echo "
        <script type=\"text/javascript\">
            //<![CDATA[
                $(function () {
                    $('#messageModal').on('show.bs.modal', function (event) {
                        var button  = $(event.relatedTarget); 
                        var id      = button.data('id');
                        var asset   = ". $this->asset->url('images/admin/') ."; 

                        $('#messageModalId').val(id);
                        $('#messageModalForm').attr('action', '" . site_url('admin.php?op=alerte_update') . "');
                        
                        $.ajax({
                            url:\"" . site_url('admin.php?op=alerte_api') . "\",
                            method: \"POST\",
                            data:{id:id},
                            dataType:\"JSON\",

                            success:function(data) {
                                var fnom_affich = JSON.stringify(data['fnom_affich']),
                                    fretour_h   = JSON.stringify(data['fretour_h']),
                                    ficone      = JSON.stringify(data['ficone']);

                                $('#messageModalLabel').html(JSON.parse(fretour_h));
                                $('#messageModalContent').html(JSON.parse(fnom_affich));
                                $('#messageModalIcon').html('<img src=\"' asset + JSON.parse(ficone) + '.png\" />');
                            }
                        });
                    });
                });
            //]]>
        </script>\n";
    }

    /**
     * Articles à valider.
     *
     * @return void
     */
    private function articlesQueue()
    {
        if ($newsubs = sql_select_num_rows('queue', 'qid')) {
            sql_update('fonctions', " 
                       SET fetat = '1', 
                           fretour = '" . $newsubs . "', 
                           fretour_h = '" . adm_translate("Articles en attente de validation !") . "' 
                       WHERE fid = '38'");
        } else {
            sql_update('fonctions', " 
                       SET fetat = '0', 
                           fretour = '0' 
                       WHERE fid = '38'");
        }
    }

    /**
     * news auto.
     *
     * @return void
     */
    private function autoNews()
    {
        if ($newauto = sql_select_num_rows('autonews', 'anid')) {
            sql_update('fonctions', " 
                       SET fetat = '1', 
                           fretour = '" . $newauto . "', 
                           fretour_h = '" . adm_translate("Articles programmés pour la publication.") . "' 
                       WHERE fid = 37");
        } else {
            sql_update('fonctions', " 
                       SET fetat = '0', 
                           fretour = '0', 
                           fretour_h = '' 
                       WHERE fid = 37");
        }
    }

    /**
     * Etat filemanager
     *
     * @return void
     */
    private function fileManager()
    {
        if ($this->filemanager->getStatus()) {
            sql_update('fonctions', " 
                       SET fetat = '1' 
                       WHERE fid = '27'");
        } else {
            sql_update('fonctions', " 
                       SET fetat = '0' 
                       WHERE fid = '27'");
        }
    }

    /**
     * Utilisateur à valider.
     *
     * @return void
     */
    private function utilisateurs()
    {
        if ($newsuti = sql_select_num_rows('users_status', 'uid', "WHERE uid != '1' AND open = '0'")) {
            sql_update('fonctions', " 
                       SET fetat = '1', 
                           fretour =  '" . $newsuti . "', 
                           fretour_h = '" . adm_translate("Utilisateur en attente de validation !") . "' 
                       WHERE fid = '44'");
        } else {
            sql_update('fonctions', " 
                       SET fetat = '0', 
                           fretour = '0' 
                       WHERE fid = '44'");
        }
    }

    /**
     * Référants à gérer.
     *
     * @return void
     */
    private function referer()
    {
        if (Config::get('npds.httpref') == 1) {
            if (sql_count('referer')['total'] >= Config::get('npds.httprefmax')) {
                sql_update('fonctions', " 
                           SET fetat = '1', 
                               fretour = '!!!' 
                           WHERE fid = '39'");
            }  else {
                sql_update('fonctions',  
                           "SET fetat = '0' 
                           WHERE fid = '39'");
            }
        }
    }

    /**
     * Critique en attente
     *
     * @return void
     */
    private function critiques() 
    {
        if ($critsubs = sql_select_num_rows('reviews_add')) {
            sql_update('fonctions', " 
                       SET fetat = '1',
                           fretour = '" . $critsubs . "', 
                           fretour_h = '" . adm_translate("Critique en attente de validation.") . "' 
                       WHERE fid = '35'");
        } else {
            sql_update('fonctions', " 
                       SET fetat = '0',
                           fretour = '0' 
                       WHERE fid = '35'");
        }
    }

    /**
     * Nouveau lien à valider.
     *
     * @return void
     */
    private function linksNews()
    {
        if ($newlink = sql_select_num_rows('links_newlink')) {
            sql_update('fonctions', " 
                       SET fetat = '1',
                           fretour = '" . $newlink . "', 
                           fretour_h = '" . adm_translate("Liens à valider.") . "' 
                       WHERE fid = '41'");
        } else {
            sql_update('fonctions', " 
                       SET fetat = '0',
                           fretour = '0' 
                       WHERE fid = '41'");
        }
    }

    /**
     * Lien rompu à valider.
     *
     * @return void
     */
    private function linksRompus()
    {
        if ($brokenlink = sql_select_num_rows('links_modrequest', '*', " where brokenlink='1'")) {
            sql_update('fonctions', " 
                       SET fetat = '1',
                           fretour = '" . $brokenlink . "', 
                           fretour_h = '" . adm_translate("Liens rompus à valider.") . "' 
                       WHERE fid = '42'");
        } else {
            sql_update('fonctions', " 
                       SET fetat = '0',
                           fretour = '0' 
                       WHERE fid = '42'");
        }
    }

    /**
     * Nouvelle publication.
     *
     * @param array|null|false $Q
     * @param string $aid
     * @param array|null|false $Q   Retour de la requette sql, status Radminsuper de l'administrateur.
     * @param string  $aid          Id de l'administrateur.
     * 
     * @return void
     */
    private function publications(array|null|false $Q, string $aid) 
    {
        $newpubli = $Q['radminsuper'] == 1 
            ? sql_select_num_rows('seccont_tempo') 
            : sql_select_num_rows('seccont_tempo', '*', " WHERE author = '$aid'");

        if ($newpubli) {
            sql_update('fonctions', " 
                       SET fetat = '1',
                           fretour = '" . $newpubli . "', 
                           fretour_h = '" . adm_translate("Publication(s) en attente de validation") . "' 
                       WHERE fid  = '50'");
        } else {
            sql_update('fonctions', " 
                       SET fetat = '0',
                           fretour = '0' 
                       WHERE fid = '50'");
        }
    }

    /**
     * Utilisateur(s) en attente de groupe.
     *
     * @return void
     */
    private function utilisateurGroupe()
    {
        $iterator = new DirectoryIterator($this->groupePath());
        
        $j = 0;
        foreach ($iterator as $fileinfo) {
            if ($fileinfo->isFile() and strpos($fileinfo->getFilename(), 'ask4group') !== false) {
                $j++;
            }
        }

        if ($j > 0) {
            sql_update('fonctions', " 
                       SET fetat = '1', 
                           fretour = '" . $j . "', 
                           fretour_h = '" . adm_translate("Utilisateur en attente de groupe !") . "' 
                       WHERE fid = '46'");
        } else {
            sql_update('fonctions', " 
                       SET fetat = '0',
                           fretour = '0' 
                       WHERE fid = '46'");
        }
    }

    /**
     * Retourne le chemin users_private pour les groupes.
     *
     * @return string
     */
    private function groupePath()
    {
        return storage_path('users_private/groupe');
    }

}
