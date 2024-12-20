<?php

declare(strict_types=1);

use Npds\Forum\Forum;
use Npds\Config\Config;
use Npds\Support\Sanitize;
use Npds\Support\Facades\Css;
use Npds\Support\Facades\Auth;
use Npds\Support\Facades\Date;
use Npds\Support\Facades\News;
use Npds\Support\Facades\Stat;
use Npds\Support\Facades\Block;
use Npds\Support\Facades\Cache;
use Npds\Support\Facades\Crypt;
use Npds\Support\Facades\Theme;
use Npds\Support\Facades\Groupe;
use Npds\Support\Facades\Online;
use Npds\Support\Facades\Request;
use Npds\Support\Facades\Smilies;
use Npds\Support\Facades\Download;
use Npds\Support\Facades\Language;


#autodoc makeChatBox($pour) :  <br />=> syntaxe : function#makeChatBox <br />params#chat_membres <br /> le parametre doit être en accord avec l'autorisation donc (chat_membres, chat_tous, chat_admin, chat_anonyme)
/**
 * Bloc ChatBox
 *
 * @param   string  $pour  [$pour description]
 *
 * @return  [type]         [return description]
 */
function makeChatBox(string $pour = '')
{
    global $user, $admin, $long_chain;

    $auto = Block::autorisation_block('params#' . $pour);
    $dimauto = count($auto);

    if (!$long_chain) {
        $long_chain = 12;
    }

    $thing = '';
    $une_ligne = false;

    if ($dimauto <= 1) {
        $counter = sql_num_rows(sql_query("SELECT message 
                                            FROM " . sql_prefix('chatbox') . " 
                                            WHERE id='" . $auto[0] . "'")) - 6;

        if ($counter < 0) {
            $counter = 0;
        }

        $result = sql_query("SELECT username, message, dbname 
                                FROM " . sql_prefix('chatbox') . " 
                                WHERE id='" . $auto[0] . "' 
                                ORDER BY date 
                                ASC LIMIT $counter,6");

        if ($result) {
            while (list($username, $message, $dbname) = sql_fetch_row($result)) {
                if (isset($username)) {
                    if ($dbname == 1) {

                        $thing .= ((!$user) and (Config::get('npds.member_list') == 1) and (!$admin)) ?
                            '<span class="">' . substr($username, 0, 8) . '.</span>' :
                            "<a href=\"" . site_url('user.php?op=userinfo&amp;uname=' . $username) . "\">" . substr($username, 0, 8) . ".</a>";
                    } else {
                        $thing .= '<span class="">' . substr($username, 0, 8) . '.</span>';
                    }
                }

                $une_ligne = true;

                $thing .= (strlen($message) > $long_chain)
                    ? "&gt;&nbsp;<span>" . Smilies::smilie(stripslashes(substr($message, 0, $long_chain))) . " </span><br />\n"
                    : "&gt;&nbsp;<span>" . Smilies::smilie(stripslashes($message)) . " </span><br />\n";
            }
        }

        $PopUp = JavaPopUp(site_url('chat.php?id=' . $auto[0] . '&amp;auto=' . Crypt::encrypt(serialize($auto[0]))), 'chat' . $auto[0], 380, 480);

        if ($une_ligne) {
            $thing .= '<hr />';
        }

        $result = sql_query("SELECT DISTINCT ip 
                                FROM " . sql_prefix('chatbox') . " 
                                WHERE id='" . $auto[0] . "' 
                                AND date >= " . (time() - (60 * 2)) . "");

        $numofchatters = sql_num_rows($result);

        $thing .= $numofchatters > 0
            ? '<div class="d-flex">
                        <a id="' . $pour . '_encours" class="fs-4" href="javascript:void(0);" onclick="window.open(' . $PopUp . ');" title="' . translate("Cliquez ici pour entrer") . ' ' . $pour . '" data-bs-toggle="tooltip" data-bs-placement="right">
                            <i class="fa fa-comments fa-2x nav-link faa-pulse animated faa-slow"></i>
                        </a>
                        <span class="badge rounded-pill bg-primary ms-auto align-self-center" title="' . translate("personne connectée.") . '" data-bs-toggle="tooltip">
                            ' . $numofchatters . '
                        </span>
                    </div>'
            : '<div>
                        <a id="' . $pour . '" href="javascript:void(0);" onclick="window.open(' . $PopUp . ');" title="' . translate("Cliquez ici pour entrer") . '" data-bs-toggle="tooltip" data-bs-placement="right">
                            <i class="fa fa-comments fa-2x "></i>
                        </a>
                    </div>';
    } else {
        if (count($auto) > 1) {

            $numofchatters = 0;
            $thing .= '<ul>';

            foreach ($auto as $autovalue) {
                $result = Cache::Q_select("SELECT groupe_id, groupe_name 
                                        FROM " . sql_prefix('groupes') . " 
                                        WHERE groupe_id='$autovalue'", 3600);

                $autovalueX = $result[0];

                $PopUp = JavaPopUp(site_url('chat.php?id=' . $autovalueX['groupe_id'] . '&auto=' . Crypt::encrypt(serialize($autovalueX['groupe_id']))), 'chat' . $autovalueX['groupe_id'], 380, 480);

                $thing .= "<li><a href=\"javascript:void(0);\" onclick=\"window.open($PopUp);\">" . $autovalueX['groupe_name'] . "</a>";

                $result = sql_query("SELECT DISTINCT ip 
                                        FROM " . sql_prefix('chatbox') . " 
                                        WHERE id='" . $autovalueX['groupe_id'] . "' 
                                        AND date >= " . (time() - (60 * 3)) . "");

                $numofchatters = sql_num_rows($result);

                if ($numofchatters) {
                    $thing .= '&nbsp;(<span class="text-danger"><b>' . sql_num_rows($result) . '</b></span>)';
                }

                echo '</li>';
            }

            $thing .= '</ul>';
        }
    }

    global $block_title;

    if ($block_title == '') {
        $block_title = translate("Bloc Chat");
    }

    Theme::themesidebox($block_title, $thing);

    sql_free_result($result);
}


#autodoc:<Powerpack_f.php>
#autodoc <span class="text-success">BLOCS NPDS</span>:
#autodoc instant_members_message() : Bloc MI (Message Interne) <br />=> syntaxe : function#instant_members_message
function instant_members_message()
{
    global $user, $admin, $long_chain;

    if (!$long_chain) {
        $long_chain = 13;
    }

    global $block_title;
    if ($block_title == '') {
        $block_title = translate("M2M bloc");
    }

    if ($user) {
        global $cookie;

        $boxstuff = '<ul>';

        $ibid = Online::online_members();
        $rank1 = '';

        for ($i = 1; $i <= $ibid[0]; $i++) {
            $timex = time() - $ibid[$i]['time'];

            if ($timex >= 60) {
                $timex = '<i class="fa fa-plug text-body-secondary" title="' . $ibid[$i]['username'] . ' ' . translate("n'est pas connecté") . '" data-bs-toggle="tooltip" data-bs-placement="right"></i>&nbsp;';
            } else {
                $timex = '<i class="fa fa-plug faa-flash animated text-primary" title="' . $ibid[$i]['username'] . ' ' . translate("est connecté") . '" data-bs-toggle="tooltip" data-bs-placement="right" ></i>&nbsp;';
            }

            if (Config::get('npds.member_invisible')) {
                if ($admin) {
                    $and = '';
                } else {
                    $and = ($ibid[$i]['username'] == $cookie[1]) ? '' : 'AND is_visible=1';
                }
            } else {
                $and = '';
            }

            $result = sql_query("SELECT uid 
                                    FROM " . sql_prefix('users') . " 
                                    WHERE uname='" . $ibid[$i]['username'] . "' $and");

            list($userid) = sql_fetch_row($result);

            if ($userid) {
                $rowQ1 = Cache::Q_Select("SELECT rang 
                                    FROM " . sql_prefix('users_status') . " 
                                    WHERE uid='$userid'", 3600);

                $myrow = $rowQ1[0];
                $rank = $myrow['rang'];
                //$tmpR = '';

                if ($rank) {
                    if ($rank1 == '') {
                        if ($rowQ2 = Q_Select("SELECT rank1, rank2, rank3, rank4, rank5 
                                                FROM " . sql_prefix('config'), 86400)) {

                            $myrow = $rowQ2[0];
                            $rank1 = $myrow['rank1'];
                            // $rank2 = $myrow['rank2'];
                            // $rank3 = $myrow['rank3'];
                            // $rank4 = $myrow['rank4'];
                            // $rank5 = $myrow['rank5'];
                        }
                    }

                    if ($ibidR = Theme::image("forum/rank/" . $rank . ".gif")) {
                        $imgtmpA = $ibidR;
                    } else {
                        $imgtmpA = "public/assets/images/forum/rank/" . $rank . ".gif";
                    }

                    $messR = 'rank' . $rank;

                    $tmpR = "<img src=\"" . $imgtmpA . "\" border=\"0\" alt=\"" . Language::aff_langue($$messR) . "\" title=\"" . Language::aff_langue($$messR) . "\" loading=\"lazy\" />";
                } else {
                    $tmpR = '&nbsp;';
                }

                $new_messages = sql_num_rows(sql_query("SELECT msg_id 
                                                            FROM " . sql_prefix('priv_msgs') . " 
                                                            WHERE to_userid = '$userid' 
                                                            AND read_msg='0' 
                                                            AND type_msg='0'"));

                if ($new_messages > 0) {
                    $PopUp = JavaPopUp(site_url('readpmsg_imm.php?op=new_msg'), 'IMM', 600, 500);

                    $PopUp = "<a href=\"javascript:void(0);\" onclick=\"window.open($PopUp);\">";

                    $icon = ($ibid[$i]['username'] == $cookie[1]) ? $PopUp : '';
                    $icon .= '<i class="fa fa-envelope fa-lg faa-shake animated" title="' . translate("Nouveau") . '<span class=\'px-2 rounded-pill bg-danger ms-2\'>' . $new_messages . '</span>" data-bs-html="true" data-bs-toggle="tooltip"></i>';

                    if ($ibid[$i]['username'] == $cookie[1]) {
                        $icon .= '</a>';
                    }
                } else {
                    $messages = sql_num_rows(sql_query("SELECT msg_id 
                                                            FROM " . sql_prefix('priv_msgs') . " 
                                                            WHERE to_userid = '$userid' 
                                                            AND type_msg='0' 
                                                            AND dossier='...'"));

                    if ($messages > 0) {

                        $PopUp = JavaPopUp(site_url('readpmsg_imm.php?op=msg'), 'IMM', 600, 500);

                        $PopUp = '<a href="javascript:void(0);" onclick="window.open(' . $PopUp . ');">';

                        $icon = ($ibid[$i]['username'] == $cookie[1]) ? $PopUp : '';
                        $icon .= '<i class="far fa-envelope-open fa-lg " title="' . translate("Nouveau") . ' : ' . $new_messages . '" data-bs-toggle="tooltip"></i></a>';
                    } else {
                        $icon = '&nbsp;';
                    }
                }

                $N = $ibid[$i]['username'];
                $M = (strlen($N) > $long_chain) ? substr($N, 0, $long_chain) . '.' : $N;

                $boxstuff .= '<li>' . $timex . '&nbsp;<a href="powerpack.php?op=instant_message&amp;to_userid=' . $N . '" title="' . translate("Envoyer un message interne") . '" data-bs-toggle="tooltip" >' . $M . '</a><span class="float-end">' . $icon . '</span></li>';
            } //suppression temporaire ... rank  '.$tmpR.'
        }

        $boxstuff .= '</ul>';

        Theme::themesidebox($block_title, $boxstuff);
    } else {
        if ($admin) {
            $ibid = Online::online_members();

            if ($ibid[0]) {

                $boxstuff = '';

                for ($i = 1; $i <= $ibid[0]; $i++) {

                    $N = $ibid[$i]['username'];
                    $M = strlen($N) > $long_chain ? substr($N, 0, $long_chain) . '.' : $N;
                    $boxstuff .= $M . '<br />';
                }

                Theme::themesidebox('<i>' . $block_title . '</i>', $boxstuff);
            }
        }
    }
}

#autodoc RecentForumPosts($title, $maxforums, $maxtopics, $dposter, $topicmaxchars,$hr,$decoration) : Bloc Forums <br />=> syntaxe :<br />function#RecentForumPosts<br />params#titre, nb_max_forum (O=tous), nb_max_topic, affiche_l'emetteur(true / false), topic_nb_max_char, affiche_HR(true / false),
function RecentForumPosts($title, $maxforums, $maxtopics, $displayposter = false, $topicmaxchars = 15, $hr = false, $decoration = null)
{
    $boxstuff = Forum::getInstance()->RecentForumPosts_fab($title, $maxforums, $maxtopics, $displayposter, $topicmaxchars, $hr, $decoration);

    global $block_title;

    if ($title == '') {
        $title = $block_title == '' ? translate("Forums infos") : $block_title;
    }

    Theme::themesidebox($title, $boxstuff);
}

#autodoc pollMain($pollID,$pollClose) : Construit le bloc sondage
function pollMain($pollID, $pollClose)
{
    global $boxTitle, $boxContent, $block_title;

    if (!isset($pollID)) {
        $pollID = 1;
    }

    if (!isset($url)) {
        $url = sprintf("pollBooth.php?op=results&amp;pollID=%d", $pollID);
    }

    $boxContent = '
        <form action="' . site_url('pollBooth.php')  . '" method="post">
            <input type="hidden" name="pollID" value="' . $pollID . '" />
            <input type="hidden" name="forwarder" value="' . site_url($url) . '" />';

    $result = sql_query("SELECT pollTitle, voters 
                         FROM " . sql_prefix('poll_desc') . " 
                         WHERE pollID='$pollID'");

    list($pollTitle, $voters) = sql_fetch_row($result);

    $boxTitle = $block_title == '' ? translate("Sondage") :  $block_title;

    $boxContent .= '<legend>' . aff_langue($pollTitle) . '</legend>';

    $result = sql_query("SELECT pollID, optionText, optionCount, voteID 
                         FROM " . sql_prefix('poll_data') . " 
                         WHERE (pollID='$pollID' AND optionText<>'') 
                         ORDER BY voteID");

    $sum = 0;
    $j = 0;

    if (!$pollClose) {
        $boxContent .= '<div class="mb-3">';

        while ($object = sql_fetch_assoc($result)) {
            $boxContent .= '
            <div class="form-check">
               <input class="form-check-input" type="radio" id="voteID' . $j . '" name="voteID" value="' . $object['voteID'] . '" />
               <label class="form-check-label d-block" for="voteID' . $j . '" >' . Language::aff_langue($object['optionText']) . '</label>
            </div>';

            $sum = $sum + $object['optionCount'];

            $j++;
        }

        $boxContent .= '</div>';
    } else {
        while ($object = sql_fetch_assoc($result)) {
            $boxContent .= '&nbsp;' . Language::aff_langue($object['optionText']) . '<br />';
            $sum = $sum + $object['optionCount'];
        }
    }

    settype($inputvote, 'string');

    if (!$pollClose) {
        $inputvote = '<button class="btn btn-outline-primary btn-sm btn-block" type="submit" value="' . translate("Voter") . '" title="' . translate("Voter") . '" >
            <i class="fa fa-check fa-lg"></i> ' . translate("Voter") . '
        </button>';
    }

    $boxContent .= '
            <div class="mb-3">' . $inputvote . '</div>
        </form>
        <a href="' . site_url('pollBooth.php?op=results&amp;pollID=' . $pollID) . '" title="' . translate("Résultats") . '">
            ' . translate("Résultats") . '
        </a>
        &nbsp;&nbsp;
        <a href="pollBooth.php">
            ' . translate("Anciens sondages") . '
        </a>
        <ul class="list-group mt-3">
            <li class="list-group-item">
                ' . translate("Votes : ") . ' 
                <span class="badge rounded-pill bg-secondary float-end">' . $sum . '</span>
            </li>';

    if (Config::get('npds.pollcomm')) {

        if (file_exists(module_path('comments/pollBoth.conf.php'))) {
            include(module_path('comments/pollBoth.conf.php'));
        }

        list($numcom) = sql_fetch_row(sql_query("SELECT COUNT(*) 
                                                 FROM " . sql_prefix('posts') . " 
                                                 WHERE forum_id='$forum' 
                                                 AND topic_id='$pollID' 
                                                 AND post_aff='1'"));

        $boxContent .= '<li class="list-group-item">
            ' . translate("Commentaire(s) : ") . ' 
            <span class="badge rounded-pill bg-secondary float-end">' . $numcom . '</span>
        </li>';
    }

    $boxContent .= '</ul>';

    themesidebox($boxTitle, $boxContent);
}

#autodoc:<Mainfile.php>
#autodoc <span class="text-success">BLOCS NPDS</span>:
#autodoc Site_Activ() : Bloc activité du site <br />=> syntaxe : function#Site_Activ
function Site_Activ()
{
    list($membres, $totala, $totalb, $totalc, $totald, $totalz) = Stat::req_stat();

    $aff = '
        <p class="text-center">' . translate("Pages vues depuis") . ' ' . Config::get('npds.startdate') . ' : <span class="fw-semibold">' . Sanitize::wrh((int) $totalz) . '</span></p>
        <ul class="list-group mb-3" id="site_active">
           <li class="my-1">' . translate("Nb. de membres") . ' <span class="badge rounded-pill bg-secondary float-end">' . Sanitize::wrh((int) $membres) . '</span></li>
           <li class="my-1">' . translate("Nb. d'articles") . ' <span class="badge rounded-pill bg-secondary float-end">' . Sanitize::wrh((int) $totala) . '</span></li>
           <li class="my-1">' . translate("Nb. de forums") . ' <span class="badge rounded-pill bg-secondary float-end">' . Sanitize::wrh((int) $totalc) . '</span></li>
           <li class="my-1">' . translate("Nb. de sujets") . ' <span class="badge rounded-pill bg-secondary float-end">' . Sanitize::wrh((int) $totald) . '</span></li>
           <li class="my-1">' . translate("Nb. de critiques") . ' <span class="badge rounded-pill bg-secondary float-end">' . Sanitize::wrh((int) $totalb) . '</span></li>
        </ul>';

    if ($ibid = Theme::image("box/top.gif")) {
        $imgtmp = $ibid;
    } else {
        $imgtmp = false;
    } // no need

    if ($imgtmp) {
        $aff .= '<p class="text-center">
            <a href="' . site_url('top.php') . '">
                <img src="' . $imgtmp . '" alt="' . translate("Top") . ' ' . Config::get('npds.top') . '" />
            </a>&nbsp;&nbsp;';

        if ($ibid = Theme::theme_image("box/stat.gif")) {
            $imgtmp = $ibid;
        } else {
            $imgtmp = false;
        }

        $aff .= '<a href="stats.php">
                <img src="' . $imgtmp . '" alt="' . translate("Statistiques") . '" />
            </a>
        </p>';
    } else {
        $aff .= '<p class="text-center">
            <a href="' . site_url('top.php') . '">
                ' . translate("Top") . ' ' . Config::get('npds.top') . '
            </a>
            &nbsp;&nbsp;
            <a href="' . site_url('stats.php')  . '" >
                ' . translate("Statistiques") . '
            </a>
        </p>';
    }

    global $block_title;
    $title = $block_title == '' ? translate("Activité du site") : $block_title;

    Theme::themesidebox($title, $aff);
}

#autodoc online() : Bloc Online (Who_Online) <br />=> syntaxe : function#online
function online()
{
    global $user, $cookie;

    $ip = Request::getip();

    $username = isset($cookie[1]) ? $cookie[1] : '';

    if ($username == '') {
        $username = $ip;
        $guest = 1;
    } else {
        $guest = 0;
    }

    $past = time() - 300;

    sql_query("DELETE FROM " . sql_prefix('session') . " 
               WHERE time < '$past'");

    $result = sql_query("SELECT time 
                         FROM " . sql_prefix('session') . " 
                         WHERE username='$username'");

    $ctime = time();

    if ($row = sql_fetch_row($result)) {
        sql_query("UPDATE " . sql_prefix('session') . " 
                   SET username='$username', time='$ctime', host_addr='$ip', guest='$guest' 
                   WHERE username='$username'");
    } else {
        sql_query("INSERT INTO " . sql_prefix('session') . " (username, time, host_addr, guest) 
                   VALUES ('$username', '$ctime', '$ip', '$guest')");
    }

    $result = sql_query("SELECT username 
                         FROM " . sql_prefix('session') . " 
                         WHERE guest=1");

    $guest_online_num = sql_num_rows($result);

    $result = sql_query("SELECT username 
                         FROM " . sql_prefix('session') . " 
                         WHERE guest=0");

    $member_online_num = sql_num_rows($result);

    //$who_online_num = $guest_online_num + $member_online_num;
    $who_online = '<p class="text-center">
        ' . translate("Il y a actuellement") . ' 
        <span class="badge bg-secondary">' . $guest_online_num . '</span> ' . translate("visiteur(s) et") .
        ' <span class="badge bg-secondary">' . $member_online_num . ' </span> ' . translate("membre(s) en ligne.") . '
        <br />';

    $content = $who_online;

    if ($user) {
        $content .= '<br />' . translate("Vous êtes connecté en tant que") . ' <strong>' . $username . '</strong>.<br />';

        $result = Cache::Q_select("SELECT uid 
                            FROM " . sql_prefix('users') . " 
                            WHERE uname='$username'", 86400);

        $uid = $result[0];

        $result2 = sql_query("SELECT to_userid 
                              FROM " . sql_prefix('priv_msgs') . " 
                              WHERE to_userid='" . $uid['uid'] . "' 
                              AND type_msg='0'");

        $numrow = sql_num_rows($result2);

        $content .= translate("Vous avez") . ' <a href="' . site_url('viewpmsg.php') . '">
            <span class="badge bg-primary">' . $numrow . '</span>
            </a> ' . translate("message(s) personnel(s).") . '</p>';
    } else {
        $content .= '<br />' . translate("Devenez membre privilégié en cliquant") . ' 
            <a href="' . site_url('user.php?op=only_newuser') . '">
                ' . translate("ici") . '
            </a>
        </p>';
    }

    global $block_title;
    $title = $block_title == '' ? translate("Qui est en ligne ?") : $block_title;

    Theme::themesidebox($title, $content);
}

#autodoc lnlbox() : Bloc Little News-Letter <br />=> syntaxe : function#lnlbox
function lnlbox()
{
    global $block_title;

    $title = $block_title == '' ? translate("La lettre") : $block_title;

    $arg1 = 'var formulid = ["lnlblock"]';

    $boxstuff = '
        <form id="lnlblock" action="' . site_url('lnl.php') . '" method="get">
            <div class="mb-3">
            <select name="op" class=" form-select">
                <option value="subscribe">' . translate("Abonnement") . '</option>
                <option value="unsubscribe">' . translate("Désabonnement") . '</option>
            </select>
            </div>
            <div class="form-floating mb-3">
            <input type="email" id="email_block" name="email" maxlength="254" class="form-control" required="required"/>
            <label for="email_block">' . translate("Votre adresse Email") . '</label>
            <span class="help-block">' . translate("Recevez par mail les nouveautés du site.") . '</span>
            </div>
            <button type="submit" class="btn btn-outline-primary btn-block btn-sm"><i class ="fa fa-check fa-lg me-2"></i>' . translate("Valider") . '</button>
        </form>'
        . Css::adminfoot('fv', '', $arg1, '0');

    Theme::themesidebox($title, $boxstuff);
}

#autodoc searchbox() : Bloc Search-engine <br />=> syntaxe : function#searchbox
function searchbox()
{
    global $block_title;

    $title = $block_title == '' ? translate("Recherche") : $block_title;

    $content = '
        <form id="searchblock" action="' . site_url('search.php') . '" method="get">
            <input class="form-control" type="text" name="query" />
        </form>';

    Theme::themesidebox($title, $content);
}

#autodoc mainblock() : Bloc principal <br />=> syntaxe : function#mainblock
function mainblock()
{
    $result = sql_query("SELECT title, content 
                         FROM " . sql_prefix('block') . " 
                         WHERE id=1");

    list($title, $content) = sql_fetch_row($result);

    global $block_title;
    if ($title == '') {
        $title = $block_title;
    }

    //must work from php 4 to 7 !..?..
    Theme::themesidebox(
        Language::aff_langue($title),
        Language::aff_langue(preg_replace_callback('#<a href=[^>]*(&)[^>]*>#', [Sanitize::class, 'changetoamp'], $content))
    );
}

#autodoc adminblock() : Bloc Admin <br />=> syntaxe : function#adminblock
function adminblock()
{
    $bloc_foncts_A = '';

    global $admin, $aid;

    if ($admin) {
        $Q = sql_fetch_assoc(sql_query("SELECT * 
                                        FROM " . sql_prefix('authors') . " 
                                        WHERE aid='$aid' 
                                        LIMIT 1"));

        $R = $Q['radminsuper'] == 1
            ? sql_query("SELECT * 
                         FROM " . sql_prefix('fonctions') . " f 
                         WHERE f.finterface =1 
                         AND f.fetat != '0' 
                         ORDER BY f.fcategorie")

            : sql_query("SELECT * 
                         FROM " . sql_prefix('fonctions') . " f 
                         LEFT JOIN " . sql_prefix('droits') . " d ON f.fdroits1 = d.d_fon_fid 
                         LEFT JOIN " . sql_prefix('authors') . " a ON d.d_aut_aid =a.aid 
                         WHERE f.finterface =1 
                         AND fetat!=0 AND d.d_aut_aid='$aid' 
                         AND d.d_droits REGEXP'^1' 
                         ORDER BY f.fcategorie");

        while ($SAQ = sql_fetch_assoc($R)) {

            $arraylecture = explode('|', $SAQ['fdroits1_descr']);

            $cat[] = $SAQ['fcategorie'];
            $cat_n[] = $SAQ['fcategorie_nom'];
            $fid_ar[] = $SAQ['fid'];

            $adminimg  = Config::get('npds.adminimg');
            $admf_ext  = Config::get('npds.admf_ext');


            if ($SAQ['fcategorie'] == 9) {
                $adminico = $adminimg . $SAQ['ficone'] . '.' . $admf_ext;
            }

            if ($SAQ['fcategorie'] == 9 and strstr($SAQ['furlscript'], "op=Extend-Admin-SubModule")) {
                if (file_exists('Modules/' . $SAQ['fnom'] . '/' . $SAQ['fnom'] . '.' . $admf_ext)) {
                    $adminico = 'modules/' . $SAQ['fnom'] . '/' . $SAQ['fnom'] . '.' . $admf_ext;
                } else {
                    $adminico = $adminimg . 'module.' . $admf_ext;
                }
            }

            if ($SAQ['fcategorie'] == 9) {
                if (preg_match('#messageModal#', $SAQ['furlscript'])) {
                    $furlscript = 'data-bs-toggle="modal" data-bs-target="#bl_messageModal"';
                }

                if (preg_match('#mes_npds_\d#', $SAQ['fnom'])) {
                    if (!in_array($aid, $arraylecture, true)) {
                        $bloc_foncts_A .= '
                                 <a class=" btn btn-outline-primary btn-sm me-2 my-1 tooltipbyclass" title="' . $SAQ['fretour_h'] . '" data-id="' . $SAQ['fid'] . '" data-bs-html="true" ' . $furlscript . ' >
                                    <img class="adm_img" src="' . $adminico . '" alt="icon_message" loading="lazy" />
                                    <span class="badge bg-danger ms-1">' . $SAQ['fretour'] . '</span>
                                 </a>';
                    }
                } else {
                    $furlscript = preg_match('#versusModal#', $SAQ['furlscript']) ?
                        'data-bs-toggle="modal" data-bs-target="#bl_versusModal"' :
                        $SAQ['furlscript'];

                    if (preg_match('#NPDS#', $SAQ['fretour_h'])) {
                        $SAQ['fretour_h'] = str_replace('NPDS', 'NPDS^', $SAQ['fretour_h']);
                    }

                    $bloc_foncts_A .= '
                        <a class=" btn btn-outline-primary btn-sm me-2 my-1 tooltipbyclass" title="' . $SAQ['fretour_h'] . '" data-id="' . $SAQ['fid'] . '" data-bs-html="true" ' . $furlscript . ' >
                           <img class="adm_img" src="' . $adminico . '" alt="icon_' . $SAQ['fnom_affich'] . '" loading="lazy" />
                           <span class="badge bg-danger ms-1">' . $SAQ['fretour'] . '</span>
                        </a>';
                }
            }
        }

        $result = sql_query("SELECT title, content 
                             FROM " . sql_prefix('block') . " 
                             WHERE id=2");

        list($title, $content) = sql_fetch_row($result);

        global $block_title;
        $title = $title == '' ? $block_title : aff_langue($title);

        $content = aff_langue(preg_replace_callback('#<a href=[^>]*(&)[^>]*>#', [Sanitize::class, 'changetoampadm'], $content));

        //==> recuperation
        $messagerie_npds = file_get_contents('https://raw.githubusercontent.com/npds/npds_dune/master/versus.txt');
        $messages_npds = explode("\n", $messagerie_npds);

        array_pop($messages_npds);

        // traitement spécifique car fonction permanente versus
        $versus_info = explode('|', $messages_npds[0]);

        $Version_Sub  = Config::get('npds.Version_Sub');
        $Version_Num = Config::get('npds.Version_Num');

        if ($versus_info[1] == $Version_Sub and $versus_info[2] == $Version_Num) {
            sql_query("UPDATE " . sql_prefix('fonctions') . " 
                       SET fetat='1', fretour='', fretour_h='Version NPDS " . $Version_Sub . " " . $Version_Num . "', furlscript='' 
                       WHERE fid='36'");
        } else {
            sql_query("UPDATE " . sql_prefix('fonctions') . " 
                       SET fetat='1', fretour='N', furlscript='data-bs-toggle=\"modal\" data-bs-target=\"#versusModal\"', fretour_h='Une nouvelle version NPDS est disponible !<br />" . $versus_info[1] . " " . $versus_info[2] . "<br />Cliquez pour télécharger.' 
                       WHERE fid='36'");
        }

        $content .= '<div class="d-flex justify-content-start flex-wrap" id="adm_block">
            ' . $bloc_foncts_A;

        if ($Q['radminsuper'] == 1) {
            $content .= '<a class="btn btn-outline-primary btn-sm me-2 my-1" title="' . translate("Vider la table chatBox") . '" data-bs-toggle="tooltip" href="powerpack.php?op=admin_chatbox_write&amp;chatbox_clearDB=OK" ><img src="public/assets/images/admin/chat.png" class="adm_img" alt="icon clear chat" loading="lazy" />&nbsp;<span class="badge bg-danger ms-1">X</span></a>';
        }

        $content .= '
            </div>
            <div class="mt-3">
                <small class="text-body-secondary"><i class="fas fa-user-cog fa-2x align-middle"></i> ' . $aid . '</small>
            </div>
            <div class="modal fade" id="bl_versusModal" tabindex="-1" aria-labelledby="bl_versusModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="bl_versusModalLabel"><img class="adm_img me-2" src="public/assets/images/admin/message_npds.png" alt="icon_" loading="lazy" />' . translate("Version") . ' NPDS^</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Vous utilisez NPDS^ ' . $Version_Sub . ' ' . $Version_Num . '</p>
                        <p>' . translate("Une nouvelle version de NPDS^ est disponible !") . '</p>
                        <p class="lead mt-3">' . $versus_info[1] . ' ' . $versus_info[2] . '</p>
                        <p class="my-3">
                            <a class="me-3" href="https://github.com/npds/npds_dune/archive/refs/tags/' . $versus_info[2] . '.zip" target="_blank" title="" data-bs-toggle="tooltip" data-original-title="Charger maintenant"><i class="fa fa-download fa-2x me-1"></i>.zip</a>
                            <a class="mx-3" href="https://github.com/npds/npds_dune/archive/refs/tags/' . $versus_info[2] . '.tar.gz" target="_blank" title="" data-bs-toggle="tooltip" data-original-title="Charger maintenant"><i class="fa fa-download fa-2x me-1"></i>.tar.gz</a>
                        </p>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
                </div>
            </div>
            <div class="modal fade" id="bl_messageModal" tabindex="-1" aria-labelledby="bl_messageModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id=""><span id="bl_messageModalIcon" class="me-2"></span><span id="bl_messageModalLabel"></span></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p id="bl_messageModalContent"></p>
                        <form class="mt-3" id="bl_messageModalForm" action="" method="POST">
                            <input type="hidden" name="id" id="bl_messageModalId" value="0" />
                            <button type="submit" class="btn btn btn-primary btn-sm">' . translate("Confirmer la lecture") . '</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                    <span class="small text-body-secondary">Information de npds.org</span><img class="adm_img me-2" src="public/assets/images/admin/message_npds.png" alt="icon_" loading="lazy" />
                    </div>
                </div>
                </div>
            </div>
            <script>
                $(function () {
                $("#bl_messageModal").on("show.bs.modal", function (event) {
                    var button = $(event.relatedTarget); 
                    var id = button.data("id");
                    $("#bl_messageModalId").val(id);
                    $("#bl_messageModalForm").attr("action", "' . site_url('admin.php?op=alerte_update') . '");
                    $.ajax({
                        url:"' . site_url('admin.php?op=alerte_api') . '",
                        method: "POST",
                        data:{id:id},
                        dataType:"JSON",
                        success:function(data) {
                            var fnom_affich = JSON.stringify(data["fnom_affich"]),
                                fretour_h = JSON.stringify(data["fretour_h"]),
                                ficone = JSON.stringify(data["ficone"]);
                            $("#bl_messageModalLabel").html(JSON.parse(fretour_h));
                            $("#bl_messageModalContent").html(JSON.parse(fnom_affich));
                            $("#bl_messageModalIcon").html("<img src=\"public/assets/images/admin/"+JSON.parse(ficone)+".png\" />");
                        }
                    });
                });
                });
            </script>
        ';

        themesidebox($title, $content);
    }
}

#autodoc ephemblock() : Bloc ephemerid <br />=> syntaxe : function#ephemblock
function ephemblock()
{
    $gmt = (int) Config::get('npds.gmt');

    $cnt = 0;

    $eday = date("d", time() + ($gmt * 3600));
    $emonth = date("m", time() + ($gmt * 3600));

    $result = sql_query("SELECT yid, content 
                         FROM " . sql_prefix('ephem') . " 
                         WHERE did='$eday' 
                         AND mid='$emonth' 
                         ORDER BY yid ASC");

    $boxstuff = '<div>' . translate("En ce jour...") . '</div>';

    while (list($yid, $content) = sql_fetch_row($result)) {
        if ($cnt == 1) {
            $boxstuff .= "\n<br />\n";
        }

        $boxstuff .= "<b>$yid</b>\n<br />\n";
        $boxstuff .= Language::aff_langue($content);
        $cnt = 1;
    }

    $boxstuff .= "<br />\n";

    global $block_title;
    $title = $block_title == '' ? translate("Ephémérides") : $block_title;

    Theme::themesidebox($title, $boxstuff);
}

#autodoc loginbox() : Bloc Login <br />=> syntaxe : function#loginbox
function loginbox()
{
    global $user;

    $boxstuff = '';

    if (!$user) {
        $boxstuff = '
        <form action="' . site_url('user.php') . '" method="post">
            <div class="mb-3">
                <label for="uname">' . translate("Identifiant") . '</label>
                <input class="form-control" type="text" name="uname" maxlength="25" />
            </div>
            <div class="mb-3">
                <label for="pass">' . translate("Mot de passe") . '</label>
                <input class="form-control" type="password" name="pass" maxlength="20" />
            </div>
            <div class="mb-3">
                <input type="hidden" name="op" value="login" />
                <button class="btn btn-primary" type="submit">' . translate("Valider") . '</button>
            </div>
            <div class="help-block">
            ' . translate("Vous n'avez pas encore de compte personnel ? Vous devriez") . ' <a href="user.php">' . translate("en créer un") . '</a>. ' . translate("Une fois enregistré") . ' ' . translate("vous aurez certains avantages, comme pouvoir modifier l'aspect du site,") . ' ' . translate("ou poster des commentaires signés...") . '
            </div>
        </form>';

        global $block_title;
        $title = $block_title == '' ? translate("Se connecter") : $block_title;

        Theme::themesidebox($title, $boxstuff);
    }
}

#autodoc userblock() : Bloc membre <br />=> syntaxe : function#userblock
function userblock()
{
    global $user, $cookie;

    if (($user) and ($cookie[8])) {
        $getblock = Cache::Q_select("SELECT ublock 
                              FROM " . sql_prefix('users') . " 
                              WHERE uid='$cookie[0]'", 86400);

        $ublock = $getblock[0];

        global $block_title;
        $title = $block_title == '' ? translate("Menu de") . ' ' . $cookie[1] : $block_title;

        Theme::themesidebox($title, $ublock['ublock']);
    }
}

#autodoc topdownload() : Bloc topdownload <br />=> syntaxe : function#topdownload
function topdownload()
{
    global $block_title;

    $title = $block_title == '' ? translate("Les plus téléchargés") : $block_title;

    $boxstuff = '<ul>';
    $boxstuff .= Download::topdownload_data('short', 'dcounter');
    $boxstuff .= '</ul>';

    if (strpos($boxstuff, '<li') === false) {
        $boxstuff = '';
    }

    Theme::themesidebox($title, $boxstuff);
}

#autodoc lastdownload() : Bloc lastdownload <br />=> syntaxe : function#lastdownload
function lastdownload()
{
    global $block_title;

    $title = $block_title == '' ? translate("Fichiers les + récents") : $block_title;

    $boxstuff = '<ul>';
    $boxstuff .= Download::topdownload_data('short', 'ddate');
    $boxstuff .= '</ul>';

    if (strpos($boxstuff, '<li') === false) {
        $boxstuff = '';
    }

    Theme::themesidebox($title, $boxstuff);
}

#autodoc oldNews($storynum) : Bloc Anciennes News <br />=> syntaxe <br />function#oldNews<br />params#$storynum,lecture (affiche le NB de lecture) - facultatif
function oldNews($storynum, $typ_aff = '')
{
    global $oldnum, $storyhome, $categories, $cat, $user, $cookie;

    $boxstuff = '<ul class="list-group">';
    $storynum = isset($cookie[3]) ? $cookie[3] : $storyhome;

    if (($categories == 1) and ($cat != '')) {
        $sel = $user ? "WHERE catid='$cat'" : "WHERE catid='$cat' AND ihome=0";
    } else {
        $sel = $user ? '' : "WHERE ihome=0";
    }

    $sel =  "WHERE ihome=0"; // en dur pour test
    $vari = 0;

    $xtab = News::news_aff('old_news', $sel, $storynum, $oldnum);

    $story_limit = 0;
    $time2 = 0;

    $a = 0;
    while (($story_limit < $oldnum) and ($story_limit < sizeof($xtab))) {
        list($sid, $title, $time, $comments, $counter) = $xtab[$story_limit];

        $story_limit++;
        $date_au_format = formatTimes($time, IntlDateFormatter::FULL);

        $comments = $typ_aff == 'lecture'
            ? '<span class="badge rounded-pill bg-secondary ms-1" title="' . translate("Lu") . '" data-bs-toggle="tooltip">' . $counter . '</span>'
            : '';

        if ($time2 == $date_au_format) {
            $boxstuff .= '<li class="list-group-item list-group-item-action d-inline-flex justify-content-between align-items-center"><a class="n-ellipses" href="article.php?sid=' . $sid . '">' . aff_langue($title) . '</a>' . $comments . '</li>';
        } else {
            if ($a == 0) {
                $boxstuff .= '<li class="list-group-item fs-6">' . $date_au_format . '</li>
                    <li class="list-group-item list-group-item-action d-inline-flex justify-content-between align-items-center"><a href="article.php?sid=' . $sid . '">' . aff_langue($title) . '</a>' . $comments . '</li>';

                $time2 = $date_au_format;

                $a = 1;
            } else {
                $boxstuff .= '<li class="list-group-item fs-6">' . $date_au_format . '</li>
                    <li class="list-group-item list-group-item-action d-inline-flex justify-content-between align-items-center"><a href="article.php?sid=' . $sid . '">' . aff_langue($title) . '</a>' . $comments . '</li>';

                $time2 = $date_au_format;
            }
        }

        $vari++;

        if ($vari == $oldnum) {
            //$storynum = isset($cookie[3]) ? $cookie[3] : $storyhome ;
            $min = $oldnum; // + $storynum;
            $boxstuff .= '<li class="text-center mt-3"><a href="search.php?min=' . $min . '&amp;type=stories&amp;category=' . $cat . '"><strong>' . translate("Articles plus anciens") . '</strong></a></li>';
        }
    }

    $boxstuff .= '</ul>';

    if (strpos($boxstuff, '<li') === false) {
        $boxstuff = '';
    }

    global $block_title;
    $boxTitle = $block_title == '' ? translate("Anciens articles") : $block_title;

    Theme::themesidebox($boxTitle, $boxstuff);
}

#autodoc bigstory() : Bloc BigStory <br />=> syntaxe : function#bigstory
function bigstory()
{
    $content = '';

    $tdate = Date::getPartOfTime(time(), 'yyyy-MM-dd');
    $xtab = News::news_aff("big_story", "WHERE (time LIKE '%$tdate%')", 1, 1);

    if (sizeof($xtab)) {
        list($fsid, $ftitle) = $xtab[0];
    } else {
        $fsid = '';
        $ftitle = '';
    }

    $content .= ($fsid == '' and $ftitle == '')
        ? '<span class="fw-semibold">' . translate("Il n'y a pas encore d'article du jour.") . '</span>'
        : '<span class="fw-semibold">' . translate("L'article le plus consulté aujourd'hui est :") . '</span><br /><br /><a href="article.php?sid=' . $fsid . '">' . Language::aff_langue($ftitle) . '</a>';

    global $block_title;
    $boxtitle = $block_title == '' ? translate("Article du Jour") : $block_title;

    Theme::themesidebox($boxtitle, $content);
}

#autodoc category() : Bloc de gestion des catégories <br />=> syntaxe : function#category
function category()
{
    global $cat;

    $result = sql_query("SELECT catid, title 
                         FROM " . sql_prefix('stories_cat') . " 
                         ORDER BY title");

    $numrows = sql_num_rows($result);

    if ($numrows == 0) {
        return;
    } else {
        $boxstuff = '<ul>';
        while (list($catid, $title) = sql_fetch_row($result)) {
            $result2 = sql_query("SELECT sid 
                                  FROM " . sql_prefix('stories') . " 
                                  WHERE catid='$catid' 
                                  LIMIT 0,1");

            $numrows = sql_num_rows($result2);

            if ($numrows > 0) {
                $res = sql_query("SELECT time 
                                  FROM " . sql_prefix('stories') . " 
                                  WHERE catid='$catid' 
                                  ORDER BY sid 
                                  DESC LIMIT 0,1");

                list($time) = sql_fetch_row($res);

                $boxstuff .= $cat == $catid
                    ? '<li><strong>' . Language::aff_langue($title) . '</strong></li>'
                    : '<li class="list-group-item list-group-item-action hyphenate"><a href="index.php?op=newcategory&amp;catid=' . $catid . '" data-bs-html="true" data-bs-toggle="tooltip" data-bs-placement="right" title="' . translate("Dernière contribution") . ' <br />' . Date::formatTimes($time) . ' ">' . Language::aff_langue($title) . '</a></li>';
            }
        }

        $boxstuff .= '</ul>';

        global $block_title;
        $title = $block_title == '' ? translate("Catégories") : $block_title;

        Theme::themesidebox($title, $boxstuff);
    }
}

#autodoc headlines() : Bloc HeadLines <br />=> syntaxe :<br />function#headlines<br />params#ID_du_canal
function headlines($hid = '', $block = true)
{
    global $rss_host_verif, $long_chain;

    if (file_exists(config_path('proxy.conf.php'))) {
        include(config_path('proxy.conf.php'));
    }

    if ($hid == '') {
        $result = sql_query("SELECT sitename, url, headlinesurl, hid 
                             FROM " . sql_prefix('headlines') . " 
                             WHERE status=1");
    } else {
        $result = sql_query("SELECT sitename, url, headlinesurl, hid 
                             FROM " . sql_prefix('headlines') . " 
                             WHERE hid='$hid' 
                             AND status=1");
    }

    while (list($sitename, $url, $headlinesurl, $hid) = sql_fetch_row($result)) {
        $boxtitle = $sitename;

        $cache_file = 'cache/' . preg_replace('[^a-z0-9]', '', strtolower($sitename)) . '_' . $hid . '.cache';
        $cache_time = 1200; //3600 origine

        //$items = 0;
        $max_items = 6;
        $rss_timeout = 15;

        $rss_font = '<span class="small">';

        if ((!(file_exists($cache_file))) or (filemtime($cache_file) < (time() - $cache_time)) or (!(filesize($cache_file)))) {
            $rss = parse_url($url);

            if ($rss_host_verif == true) {
                $verif = fsockopen($rss['host'], 80, $errno, $errstr, $rss_timeout);

                if ($verif) {
                    fclose($verif);
                    $verif = true;
                }
            } else {
                $verif = true;
            }

            if (!$verif) {
                $cache_file_sec = $cache_file . ".security";

                if (file_exists($cache_file)) {
                    $ibid = rename($cache_file, $cache_file_sec);
                }

                Theme::themesidebox($boxtitle, "Security Error");

                return;
            } else {
                if (!$long_chain) {
                    $long_chain = 15;
                }

                $fpwrite = fopen($cache_file, 'w');

                if ($fpwrite) {
                    fputs($fpwrite, "<ul>\n");

                    $flux = simplexml_load_file($headlinesurl, 'SimpleXMLElement', LIBXML_NOCDATA);
                    $namespaces = $flux->getNamespaces(true); // get namespaces
                    $ic = '';

                    //ATOM//
                    if ($flux->entry) {
                        $j = 0;
                        $cont = '';

                        foreach ($flux->entry as $entry) {
                            if ($entry->content) {
                                $cont = (string) $entry->content;
                            }

                            fputs($fpwrite, '<li><a href="' . (string)$entry->link['href'] . '" target="_blank" >' . (string) $entry->title . '</a><br />' . $cont . '</li>');

                            if ($j == $max_items) {
                                break;
                            }
                            $j++;
                        }
                    }

                    if ($flux->{'item'}) {
                        $j = 0;
                        $cont = '';

                        foreach ($flux->item as $item) {
                            if ($item->description) {
                                $cont = (string) $item->description;
                            }

                            fputs($fpwrite, '<li><a href="' . (string)$item->link['href'] . '"  target="_blank" >' . (string) $item->title . '</a><br /></li>');

                            if ($j == $max_items) {
                                break;
                            }
                            $j++;
                        }
                    }

                    //RSS
                    if ($flux->{'channel'}) {
                        $j = 0;
                        $cont = '';

                        foreach ($flux->channel->item as $item) {
                            if ($item->description) {
                                $cont = (string) $item->description;
                            }

                            fputs($fpwrite, '<li><a href="' . (string)$item->link . '"  target="_blank" >' . (string) $item->title . '</a><br />' . $cont . '</li>');

                            if ($j == $max_items) {
                                break;
                            }
                            $j++;
                        }
                    }

                    $j = 0;

                    if ($flux->image) {
                        $ico = '<img class="img-fluid" src="' . $flux->image->url . '" />&nbsp;';
                    }

                    foreach ($flux->item as $item) {
                        fputs($fpwrite, '<li>' . $ico . '<a href="' . (string) $item->link . '" target="_blank" >' . (string) $item->title . '</a></li>');

                        if ($j == $max_items) {
                            break;
                        }
                        $j++;
                    }

                    fputs($fpwrite, "\n" . '</ul>');
                    fclose($fpwrite);
                }
            }
        }

        if (file_exists($cache_file)) {
            ob_start();
            $ibid = readfile($cache_file);
            $boxstuff = $rss_font . ob_get_contents() . '</span>';
            ob_end_clean();
        }

        $boxstuff .= '<div class="text-end"><a href="' . $url . '" target="_blank">' . translate("Lire la suite...") . '</a></div>';

        if ($block) {
            Theme::themesidebox($boxtitle, $boxstuff);
            $boxstuff = '';
        } else {
            return ($boxstuff);
        }
    }
}

#autodoc bloc_langue() : Bloc langue <br />=> syntaxe : function#bloc_langue
function bloc_langue()
{
    global $block_title, $multi_langue;

    if ($multi_langue) {
        $title = $block_title == '' ? translate("Choisir une langue") : $block_title;

        Theme::themesidebox($title, Language::aff_local_langue("index.php", "choice_user_language", ''));
    }
}

#autodoc bloc_rubrique() : Bloc des Rubriques <br />=> syntaxe : function#bloc_rubrique
function bloc_rubrique()
{
    $result = sql_query("SELECT rubid, rubname, ordre 
                         FROM " . sql_prefix('rubriques') . " 
                         WHERE enligne='1' 
                         AND rubname<>'divers' 
                         ORDER BY ordre");

    $boxstuff = '<ul>';

    while (list($rubid, $rubname) = sql_fetch_row($result)) {
        $title = Language::aff_langue($rubname);

        $result2 = sql_query("SELECT secid, secname, userlevel, ordre 
                              FROM " . sql_prefix('sections') . " 
                              WHERE rubid='$rubid' 
                              ORDER BY ordre");

        $boxstuff .= '<li><strong>' . $title . '</strong></li>';

        //$ibid++;//??? only for notice ???

        while (list($secid, $secname, $userlevel) = sql_fetch_row($result2)) {
            $query3 = "SELECT artid 
                       FROM " . sql_prefix('seccont') . " 
                       WHERE secid='$secid'";

            $result3 = sql_query($query3);
            $nb_article = sql_num_rows($result3);

            if ($nb_article > 0) {
                $boxstuff .= '<ul>';
                $tmp_auto = explode(',', $userlevel);

                foreach ($tmp_auto as $userlevel) {
                    $okprintLV1 = Auth::autorisation($userlevel);

                    if ($okprintLV1) {
                        break;
                    }
                }

                if ($okprintLV1) {
                    $sec = Language::aff_langue($secname);
                    $boxstuff .= '<li><a href="sections.php?op=listarticles&amp;secid=' . $secid . '">' . $sec . '</a></li>';
                }

                $boxstuff .= '</ul>';
            }
        }
    }

    $boxstuff .= '</ul>';

    global $block_title;
    $title = $block_title == '' ? translate("Rubriques") : $block_title;

    Theme::themesidebox($title, $boxstuff);
}

#autodoc espace_groupe() : Bloc du WorkSpace <br />=> syntaxe :<br />function#bloc_espace_groupe<br />params#ID_du_groupe, Aff_img_groupe(0 ou 1) / Si le bloc n'a pas de titre, Le nom du groupe sera utilisé
function bloc_espace_groupe($gr, $i_gr)
{
    global $block_title;

    if ($block_title == '') {
        $rsql = sql_fetch_assoc(sql_query("SELECT groupe_name 
                                           FROM " . sql_prefix('groupes') . " 
                                           WHERE groupe_id='$gr'"));
        $title = $rsql['groupe_name'];
    } else {
        $title = $block_title;
    }

    Theme::themesidebox($title, Groupe::fab_espace_groupe($gr, "0", $i_gr));
}

#autodoc bloc_groupes() : Bloc des groupes <br />=> syntaxe :<br />function#bloc_groupes<br />params#Aff_img_groupe(0 ou 1) / Si le bloc n'a pas de titre, 'Les groupes' sera utilisé. Liste des groupes AVEC membres et lien pour demande d'adhésion pour l'utilisateur.
function bloc_groupes($im)
{
    global $block_title, $user;

    $title = $block_title == '' ? 'Les groupes' : $block_title;

    Theme::themesidebox($title, Groupe::fab_groupes_bloc($user, $im));
}
