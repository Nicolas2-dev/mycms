<?php

namespace Npds\Groupe;

use Npds\Config\Config;


/**
 * Undocumented class
 */
class Groupe 
{

    /**
     * Instance Groupe.
     *
     * @var \Npds\Groupe $instance
     */
    protected static Groupe $instance;

    /**
     * Constructeur.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get instance class Groupe.
     *
     * @return \Npds\Groupe
     *  $instance
     */
    public static function getInstance()
    {
        if (isset(static::$instance)) {
            return static::$instance;
        }

        return static::$instance = new static();
    }

    #autodoc valid_group($xuser) : Retourne un tableau contenant la liste des groupes d'appartenance d'un membre
    function valid_group($xuser)
    {
        if ($xuser) {
            $userdata = explode(':', base64_decode($xuser));
            $user_temp = Q_select("SELECT groupe 
                                FROM " . sql_prefix('users_status') . " 
                                WHERE uid='$userdata[0]'", 3600);
            
            $groupe = $user_temp[0];
            $tab_groupe = explode(',', $groupe['groupe']);
        } else {
            $tab_groupe = '';
        }

        return $tab_groupe;
    }

    #autodoc liste_group() : Retourne une liste des groupes disponibles dans un tableau
    function liste_group()
    {
        $r = sql_query("SELECT groupe_id, groupe_name 
                        FROM " . sql_prefix('groupes') . " 
                        ORDER BY groupe_id ASC");
        
        $tmp_groupe[0] = '-> ' . adm_translate("Supprimer") . '/' . adm_translate("Choisir un groupe") . ' <-';
        
        while ($mX = sql_fetch_assoc($r)) {
            $tmp_groupe[$mX['groupe_id']] = aff_langue($mX['groupe_name']);
        }

        sql_free_result($r);

        return $tmp_groupe;
    }

    #autodoc groupe_forum($forum_groupeX, $tab_groupeX) : Retourne true ou false en fonction de l'autorisation d'un membre sur 1 (ou x) forum de type groupe
    function groupe_forum($forum_groupeX, $tab_groupeX)
    {
        return $this->groupe_autorisation($forum_groupeX, $tab_groupeX);
    }

    #autodoc groupe_autorisation($groupeX, $tab_groupeX) : Retourne true ou false en fonction de l'autorisation d'un membre sur 1 (ou x) groupe
    function groupe_autorisation($groupeX, $tab_groupeX)
    {
        $ok = false;

        if ($tab_groupeX) {
            foreach (explode(',', $groupeX) as $groupe) {
                foreach ($tab_groupeX as $groupevalue) {
                    if ($groupe == $groupevalue) {
                        $ok = true;
                        break;
                    }
                }

                if ($ok) {
                    break;
                }
            }
        }

        return $ok;
    }

    function fab_espace_groupe($gr, $t_gr, $i_gr)
    {
        global $dblink;

        $rsql = sql_fetch_assoc(sql_query("SELECT groupe_id, groupe_name, groupe_description, groupe_forum, groupe_mns, groupe_chat, groupe_blocnote, groupe_pad 
                                        FROM " . sql_prefix('groupes') . " 
                                        WHERE groupe_id='$gr'"));
        
        $content = '
            <script type="text/javascript">
            //<![CDATA[
            //==> chargement css
            if (!document.getElementById(\'bloc_ws_css\')) {
                var l_css = document.createElement(\'link\');
                l_css.href = "modules/groupe/bloc_ws.css";
                l_css.rel = "stylesheet";
                l_css.id = "bloc_ws_css";
                l_css.type = "text/css";
                document.getElementsByTagName("head")[0].appendChild(l_css);
            }
            //]]>
            </script>';

        $content .= '<div id="bloc_ws_' . $gr . '">';

        if ($t_gr == 1) {
            $content .= '<span style="font-size: 120%; font-weight:bolder;">' . aff_langue($rsql['groupe_name']) . '</span>' . "\n";
        }   

        $content .= '<p>' . aff_langue($rsql['groupe_description']) . '</p>';

        if (file_exists('storage/users_private/groupe/' . $gr . '/groupe.png') and ($i_gr == 1)){
            $content .= '<img src="storage/users_private/groupe/' . $gr . '/groupe.png" class="img-fluid mx-auto d-block rounded" alt="' . translate("Groupe") . '" loading="lazy" />';
        }

        //=> liste des membres
        $mysql_version = mysqli_get_server_info($dblink);

        $query = "SELECT uid, groupe 
                FROM " . sql_prefix('users_status') . " 
                WHERE ";

        $query .= (version_compare($mysql_version, '8.0.4', '>=')) 
            ? "groupe REGEXP '\\\\b$gr\\\\b'" 
            : "groupe REGEXP '[[:<:]]" . $gr . "[[:>:]]'";

        $query .= " ORDER BY uid ASC";

        $result = sql_query($query);

        $li_mb = '';
        $li_ic = '';

        $nb_mb = sql_num_rows($result);
        $count = 0;

        $li_mb .= '
        <div class="my-4">
        <a data-bs-toggle="collapse" data-bs-target="#lst_mb_ws_'.$gr.'" class="text-primary" id="show_lst_mb_ws_'.$gr.'" title="'.translate("Déplier la liste").'"><i id="i_lst_mb_ws_'.$gr.'" class="toggle-icon fa fa-caret-down fa-2x" >&nbsp;</i></a><i class="fa fa-users fa-2x text-body-secondary ms-3 align-middle" title="'.translate("Liste des membres du groupe.").'" data-bs-toggle="tooltip"></i>&nbsp;<a href="memberslist.php?gr_from_ws='.$gr.'" class="text-uppercase">'.translate("Membres").'</a><span class="badge bg-secondary float-end">'.$nb_mb.'</span>';

        $tab = online_members();

        $li_mb .= '<ul id="lst_mb_ws_'.$gr.'" class="list-group ul_bloc_ws collapse">';
                            
        while (list($uid, $groupe) = sql_fetch_row($result)) {

            $socialnetworks = array();
            $posterdata_extend = array();
            $res_id = array();
            $my_rs = '';

            if (!Config::get('npds.short_user')) {

                include_once('functions.php');

                $posterdata_extend = get_userdata_extend_from_id($uid);

                include('Modules/reseaux-sociaux/reseaux-sociaux.conf.php');

                if ($posterdata_extend['M2'] != '') {
                    $socialnetworks = explode(';', $posterdata_extend['M2']);

                    foreach ($socialnetworks as $socialnetwork) {
                        $res_id[] = explode('|', $socialnetwork);
                    }

                    sort($res_id);
                    sort($rs);

                    foreach ($rs as $v1) {
                        foreach ($res_id as $y1) {
                            $k = array_search($y1[0], $v1);

                            if (false !== $k) {
                                $my_rs .= '<a class="me-2" href="';

                                if ($v1[2] == 'skype') {
                                    $my_rs .= $v1[1] . $y1[1] . '?chat';
                                } else {
                                    $my_rs .= $v1[1] . $y1[1];
                                }

                                $my_rs .= '" target="_blank"><i class="fab fa-' . $v1[2] . ' fa-lg fa-fw mb-2"></i></a> ';
                                break;
                            } else {
                                $my_rs .= '';
                            }
                        }
                    }

                    $my_rsos[] = $my_rs;
                } else {
                    $my_rsos[] = '';
                }
            }

            list($uname, $user_avatar, $mns, $url, $femail) = sql_fetch_row(sql_query("SELECT uname, user_avatar, mns, url, femail 
                                                                                    FROM " . sql_prefix('users') . " 
                                                                                    WHERE uid='$uid'"));

            include('Modules/geoloc/geoloc.conf');

            settype($ch_lat, 'string');

            $useroutils = '';

            if ($uid != 1 and $uid != '') {
                $useroutils .= '<a class="list-group-item text-primary" href="user.php?op=userinfo&amp;uname=' . $uname . '" target="_blank" title="' . translate("Profil") . '" data-bs-toggle="tooltip"><i class="fa fa-2x fa-user align-middle fa-fw"></i><span class="ms-2 d-none d-sm-inline">' . translate("Profil") . '</span></a>';
            }

            if ($uid != 1) {
                $useroutils .= '<a class="list-group-item text-primary" href="powerpack.php?op=instant_message&amp;to_userid=' . $uname . '" title="' . translate("Envoyer un message interne") . '" data-bs-toggle="tooltip"><i class="far fa-2x fa-envelope align-middle fa-fw"></i><span class="ms-2 d-none d-sm-inline">' . translate("Message") . '</span></a>';
            }

            if ($femail != '') {
                $useroutils .= '<a class="list-group-item text-primary" href="mailto:' . anti_spam($femail, 1) . '" target="_blank" title="' . translate("Email") . '" data-bs-toggle="tooltip"><i class="fas fa-at fa-2x align-middle fa-fw"></i><span class="ms-2 d-none d-sm-inline">' . translate("Email") . '</span></a>';
            }

            if ($url != '') {
                $useroutils .= '<a class="list-group-item text-primary" href="' . $url . '" target="_blank" title="' . translate("Visiter ce site web") . '" data-bs-toggle="tooltip"><i class="fas fa-2x fa-external-link-alt align-middle fa-fw"></i><span class="ms-2 d-none d-sm-inline">' . translate("Visiter ce site web") . '</span></a>';
            }

            if ($mns) {
                $useroutils .= '<a class="list-group-item text-primary" href="minisite.php?op=' . $uname . '" target="_blank" target="_blank" title="' . translate("Visitez le minisite") . '" data-bs-toggle="tooltip"><i class="fa fa-2x fa-desktop align-middle fa-fw"></i><span class="ms-2 d-none d-sm-inline">' . translate("Visitez le minisite") . '</span></a>';
            }

            if (!Config::get('npds.short_user')) {
                if ($posterdata_extend[$ch_lat] != '') {
                    $useroutils .= '<a class="list-group-item text-primary" href="modules.php?ModPath=geoloc&amp;ModStart=geoloc&op=u' . $uid . '" title="' . translate("Localisation") . '" ><i class="fas fa-map-marker-alt fa-2x align-middle fa-fw"></i><span class="ms-2 d-none d-sm-inline">' . translate("Localisation") . '</span></a>';
                }   
            }

            $conn = '<i class="fa fa-plug text-body-secondary" title="' . $uname . ' ' . translate("n'est pas connecté") . '" data-bs-toggle="tooltip" ></i>';
            
            if (!$user_avatar) {
                $imgtmp = "public/assets/images/forum/avatar/blank.gif";
            } else if (stristr($user_avatar, "users_private")) {
                $imgtmp = $user_avatar;
            } else {
                if ($ibid = theme_image("forum/avatar/$user_avatar")) {
                    $imgtmp = $ibid;
                } else {
                    $imgtmp = "public/assets/images/forum/avatar/$user_avatar";
                }

                if (!file_exists($imgtmp)) {
                    $imgtmp = "public/assets/images/forum/avatar/blank.gif";
                }
            }

            $timex = false;

            for ($i = 1; $i <= $tab[0]; $i++) {
                if ($tab[$i]['username'] == $uname) {
                    $timex = time() - $tab[$i]['time'];
                }
            }

            if (($timex !== false) and ($timex < 60)) {
                $conn = '<i class="fa fa-plug faa-flash animated text-primary" title="' . $uname . ' ' . translate("est connecté") . '" data-bs-toggle="tooltip" ></i>';
            }

            $li_ic .= '<img class="n-smil" src="' . $imgtmp . '" alt="avatar" loading="lazy" />';
            $li_mb .= '
                <li class="list-group-item list-group-item-action d-flex flex-row p-2">
                    <div id="li_mb_' . $uname . '_' . $gr . '" class="n-ellipses">
                        ' . $conn . '<a class="ms-2" tabindex="0" data-bs-title="' . $uname . '" data-bs-toggle="popover" data-bs-trigger="focus" data-bs-html="true" data-bs-content=\'<div class="list-group mb-3">' . $useroutils . '</div><div class="mx-auto text-center" style="max-width:170px;">';
            
            if (!Config::get('npds.short_user')) {
                $li_mb .= $my_rsos[$count];
            }

            $li_mb .= '</div>\'>
                    <img class=" btn-outline-primary img-thumbnail img-fluid n-ava-small " src="' . $imgtmp . '" alt="avatar" title="' . $uname . '" loading="lazy" /></a>
                    <span class="ms-2">' . $uname . '</span>
                </div>
                </li>';

            $count++;
        }

        $li_mb .= '
                    <li style="clear:left;line-height:6px; background:none;">&nbsp;</li>
                    <li class="list-group-item" style="clear:left;line-height:24px;padding:6px; margin-top:0px;">' . $li_ic . '</li>
                </ul>
            </div>';

        $content .= $li_mb;
        //<== liste des membres

        //=> Forum
        $lst_for = '';
        $lst_for_tog = '';
        $nb_for_gr = '';

        if ($rsql['groupe_forum'] == 1) {
            $res_forum = sql_query("SELECT forum_id, forum_name 
                                    FROM " . sql_prefix('forums') . " 
                                    WHERE forum_pass REGEXP '$gr'");

            $nb_foru = sql_num_rows($res_forum);

            if ($nb_foru >= 1) {
                $lst_for_tog = '<a data-bs-toggle="collapse" data-bs-target="#lst_for_gr_' . $gr . '" class="text-primary" id="show_lst_for_' . $gr . '" title="' . translate("Déplier la liste") . '" ><i id="i_lst_for_gr_' . $gr . '" class="toggle-icon fa fa-caret-down fa-2x" >&nbsp;</i></a>';
                
                $lst_for .= '<ul id="lst_for_gr_' . $gr . '" class="list-group ul_bloc_ws collapse" style ="list-style-type:none;">';
                
                $nb_for_gr = '<span class="badge bg-secondary float-end">' . $nb_foru . '</span>';

                while (list($id_fo, $fo_name) = sql_fetch_row($res_forum)) {
                    $lst_for .= '<li class="list-group-item list-group-item-action"><a href="viewforum.php?forum=' . $id_fo . '">' . $fo_name . '</a></li>';
                }

                $lst_for .= '</ul>';
            }

            $content .= '
                <hr />
                <div>
                ' . $lst_for_tog . '<i class="fa fa-list-alt fa-2x text-body-secondary ms-3 align-middle" title="' . translate("Groupe") . '(' . $gr . '): ' . translate("forum") . '." data-bs-toggle="tooltip" ></i>&nbsp;<a class="text-uppercase" href="forum.php">' . translate("Forum") . '</a>' . $nb_for_gr . $lst_for . '
                </div>';
        }

        //=> wspad
        if ($rsql['groupe_pad'] == 1) {

            settype($lst_doc, 'string');
            settype($nb_doc_gr, 'string');
            settype($lst_doc_tog, 'string');

            include("Modules/wspad/config.php");

            $docs_gr = sql_query("SELECT page, editedby, modtime, ranq 
                                FROM " . sql_prefix('wspad') . " 
                                WHERE (ws_id) IN (SELECT MAX(ws_id) 
                                FROM " . sql_prefix('wspad') . " 
                                WHERE member='$gr' GROUP BY page) 
                                ORDER BY page ASC");

            $nb_doc = sql_num_rows($docs_gr);

            if ($nb_doc >= 1) {
                $lst_doc_tog = '<a data-bs-toggle="collapse" data-bs-target="#lst_doc_gr_' . $gr . '" class="text-primary" id="show_lst_doc_' . $gr . '" title="' . translate("Déplier la liste") . '"><i id="i_lst_doc_gr_' . $gr . '" class="toggle-icon fa fa-caret-down fa-2x" >&nbsp;</i></a>';
                
                $lst_doc .= '<ul id="lst_doc_gr_' . $gr . '" class="list-group ul_bloc_ws mt-3 collapse">';
                
                $nb_doc_gr = '<span class="badge bg-secondary float-end">' . $nb_doc . '</span>';

                while (list($p, $e, $m, $r) = sql_fetch_row($docs_gr)) {
                    $surlignage = $couleur[hexfromchr($e)];
                    $lst_doc .= '<li class="list-group-item list-group-item-action px-1 py-3" style="line-height:14px;"><div id="last_editor_' . $p . '" data-bs-toggle="tooltip" data-bs-placement="right" title="' . translate("Dernier éditeur") . ' : ' . $e . ' ' . formatTimes($m, IntlDateFormatter::SHORT, IntlDateFormatter::SHORT) . '" style="float:left; width:1rem; height:1rem; background-color:' . $surlignage . '"></div><i class="fa fa-edit text-body-secondary mx-1" data-bs-toggle="tooltip" title="' . translate("Document co-rédigé") . '." ></i><a href="modules.php?ModPath=wspad&amp;ModStart=wspad&amp;op=relo&amp;page=' . $p . '&amp;member=' . $gr . '&amp;ranq=' . $r . '">' . $p . '</a></li>';
                }

                $lst_doc .= '</ul>';
            }

            $content .= '
                <hr />
                <div>
                ' . $lst_doc_tog . '<i class="fa fa-edit fa-2x text-body-secondary ms-3 align-middle" title="' . translate("Co-rédaction") . '" data-bs-toggle="tooltip" data-bs-placement="right"></i>&nbsp;<a class="text-uppercase" href="modules.php?ModPath=wspad&ModStart=wspad&member=' . $gr . '" >' . translate("Co-rédaction") . '</a>' . $nb_doc_gr . $lst_doc . '
                </div>';
        }
        //<= wspad

        //=> bloc-notes
        if ($rsql['groupe_blocnote'] == 1) {
            settype($lst_blocnote_tog, 'string');
            settype($lst_blocnote, 'string');

            include_once("Modules/bloc-notes/bloc-notes.php");

            $lst_blocnote_tog = '<a data-bs-toggle="collapse" data-bs-target="#lst_blocnote_' . $gr . '" class="text-primary" id="show_lst_blocnote" title="' . translate("Déplier la liste") . '"><i id="i_lst_blocnote" class="toggle-icon fa fa-caret-down fa-2x" >&nbsp;</i></a><i class="far fa-sticky-note fa-2x text-body-secondary ms-3 align-middle"></i>&nbsp;<span class="text-uppercase">Bloc note</span>';
            
            $lst_blocnote = '
                <div id="lst_blocnote_' . $gr . '" class="mt-3 collapse">
                ' . blocnotes("shared", 'WS-BN' . $gr, '', '7', 'bg-dark text-light', false) . '
                </div>';

            $content .= '
                <hr />
                <div class="mb-2">' . $lst_blocnote_tog . $lst_blocnote . '
                </div>';
        }
        //<= bloc-notes

        $content .= '<div class="px-1 card card-body d-flex flex-row mt-3 flex-wrap text-center">';
        
        //=> Filemanager
        if (file_exists('Modules/f-manager/users/groupe_' . $gr . '.conf.php')) {
            $content .= '<a class="mx-2" href="modules.php?ModPath=f-manager&amp;ModStart=f-manager&amp;FmaRep=groupe_' . $gr . '" title="' . translate("Gestionnaire fichiers") . '" data-bs-toggle="tooltip" data-bs-placement="right"><i class="fa fa-folder fa-2x"></i></a>';
        }

        //=> Minisite
        if ($rsql['groupe_mns'] == 1) {
            $content .= '<a class="mx-2" href="minisite.php?op=groupe/' . $gr . '" target="_blank" title= "' . translate("MiniSite") . '" data-bs-toggle="tooltip" data-bs-placement="right"><i class="fa fa-desktop fa-2x"></i></a>';
        }

        //=> Chat
        settype($chat_img, 'string');

        if ($rsql['groupe_chat'] == 1) {
            $PopUp = JavaPopUp("chat.php?id=$gr&amp;auto=" . encrypt(serialize($gr)), "chat" . $gr, 380, 480);
            
            if (array_key_exists('chat_info_' . $gr, $_COOKIE)) {
                if ($_COOKIE['chat_info_' . $gr]) {
                    $chat_img = 'faa-pulse animated faa-slow';
                }
            }

            $content .= '<a class="mx-2" href="javascript:void(0);" onclick="window.open(' . $PopUp . ');" title="' . translate("Ouvrir un salon de chat pour le groupe.") . '" data-bs-toggle="tooltip" data-bs-placement="right" ><i class="fa fa-comments fa-2x ' . $chat_img . '"></i></a>';
        }
        
        //=> admin
        if (autorisation(-127)) {
            $content .= '<a class="mx-2" href="admin.php?op=groupes" ><i title="' . translate("Gestion des groupes.") . '" data-bs-toggle="tooltip" class="fa fa-cogs fa-2x"></i></a>';
        }

        $content .= '
                </div>
            </div>';

        return $content;
    }

    function fab_groupes_bloc($user, $im)
    {
        $user;
        $lstgr = array();

        $userdata = explode(':', base64_decode($user));

        $result = sql_query("SELECT DISTINCT `groupe` 
                            FROM " . sql_prefix('users_status') . " 
                            WHERE `groupe` > 1;");
        
        while (list($groupe) = sql_fetch_row($result)) {
            $pos = strpos($groupe, ',');

            if ($pos === false) {
                $lstgr[] = $groupe;
            } else {
                $arg = explode(',', $groupe);

                foreach ($arg as $v) {
                    if (!in_array($v, $lstgr, true)) {
                        $lstgr[] = $v;
                    }
                }
            }
        }

        $ids_gr = join("','", $lstgr);

        sql_free_result($result);

        $result = sql_query("SELECT groupe_id, groupe_name, groupe_description 
                            FROM " . sql_prefix('groupes') . " 
                            WHERE groupe_id IN ('$ids_gr')");

        $nb_groupes = sql_num_rows($result);
        
        $content = '
            <div id="bloc_groupes" class="">
                <ul id="lst_groupes" class="list-group list-group-flush mb-3">
                    <li class="list-group-item d-flex justify-content-between align-items-start px-0">
                    <div class="me-auto">
                        <div class="fw-bold"><i class="fa fa-users fa-2x text-body-secondary me-2"></i>' . translate('Groupes') . '</div>';
        
        $content .= $nb_groupes > 0 ? translate('Groupe ouvert') : translate('Pas de groupe ouvert');

        $content .= '
                    </div>
                    <span class="badge bg-primary rounded-pill">' . $nb_groupes . '</span>
                </li>';

        while (list($groupe_id, $groupe_name, $groupe_description) = sql_fetch_row($result)) {
            $content .= '<li class="list-group-item px-0">' . $groupe_name . '<div class="small">' . $groupe_description . '</div>';

            $content .= $im == 1 ? '<div class="text-center my-2"><img class="img-fluid" src="storage/users_private/groupe/' . $groupe_id . '/groupe.png" loading="lazy"></div>' : '';
            
            if (!file_exists('storage/users_private/groupe/ask4group_' . $userdata[0] . '_' . $groupe_id . '_.txt') and !autorisation($groupe_id)) {
                if (!autorisation(-1)) {
                    $content .= '<div class="text-end small"><a href="user.php?op=askforgroupe&amp;askedgroup=' . $groupe_id . '" title="' . translate('Envoi une demande aux administrateurs pour rejoindre ce groupe. Un message privé vous informera du résultat de votre demande.') . '" data-bs-toggle="tooltip">' . translate('Rejoindre ce groupe') . '</a></div>';
                }
            }

            $content .= '</li>';
        }

        $content .= '</ul>';

        if (autorisation(-127)) {
            $content .= '<div class="text-end"><a class="mx-2" href="admin.php?op=groupes" ><i title="' . translate("Gestion des groupes.") . '" data-bs-toggle="tooltip" data-bs-placement="left" class="fa fa-cogs fa-lg"></i></a></div>';
        }

        $content .= '</div>';

        sql_free_result($result);

        return $content;
    }

}