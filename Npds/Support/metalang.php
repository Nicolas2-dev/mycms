<?php

declare(strict_types=1);

use Npds\Forum\Forum;
use Npds\Config\Config;
use Npds\Support\Facades\Asset;
use Npds\Support\Facades\Cache;
use Npds\Support\Facades\Theme;
use Npds\Support\Facades\Groupe;
use Npds\Support\Facades\Mailer;
use Npds\Support\Facades\Language;
use Npds\Support\Facades\Metalang;


/**
 * Cette fonction est utilisée pour intégrer des smilies et comme service pour theme_img()
 *
 * @param   string  $ibid  [$ibid description]
 *
 * @return  string|false
 */
function MM_img(string $ibid)
{
    $ibid = Metalang::arg_filter($ibid);

    $ibidX = Theme::image($ibid);

    if ($ibidX) {
        $ret = '<img src="' . $ibidX . '" alt="smiley" loading="lazy" />';
    } else {
        if (@file_exists(asset_path('images/' . $ibid))) {
            $ret = '<img src="' . Asset::url('images/' . $ibid) . '" alt="smiley" loading="lazy" />';
        } else {
            $ret = false;
        }
    }

    return $ret;
}

/**
 * [MM_forum_all description]
 *
 * @return  string
 */
function MM_forum_all()
{
    $rowQ1 = Cache::Q_Select("SELECT * FROM " . sql_prefix('catagories') . " ORDER BY cat_id", 3600);

    $Xcontent = @Forum::getInstance()->forum($rowQ1);

    return $Xcontent;
}

/**
 * [MM_forum_categorie description]
 *
 * @param   array  $arg  [$arg description]
 *
 * @return  string
 */
function MM_forum_categorie(array $arg)
{
    $arg = Metalang::arg_filter($arg);

    $bid_tab = explode(",", $arg);

    $sql = "";

    foreach ($bid_tab as $cat) {
        $sql .= "cat_id='$cat' OR ";
    }

    $sql = substr($sql, 0, -4);

    $rowQ1 = Cache::Q_Select("SELECT * FROM " . sql_prefix('catagories') . " WHERE $sql", 3600);

    $Xcontent = @Forum::getInstance()->forum($rowQ1);

    return $Xcontent;
}

/**
 * [MM_forum_message description]
 *
 * @return  string
 */
function MM_forum_message()
{
    global $user;

    $ibid = "";

    if (!$user) {
        $ibid = translate("Devenez membre et vous disposerez de fonctions spécifiques : abonnements, forums spéciaux (cachés, membres, ..), statut de lecture, ...");
    }

    if ((Config::get('npds.subscribe')) and ($user)) {
        $ibid = translate("Cochez un forum et cliquez sur le bouton pour recevoir un Email lors d'une nouvelle soumission dans celui-ci.");
    }

    return $ibid;
}

/**
 * [MM_forum_recherche description]
 *
 * @return  string
 */
function MM_forum_recherche()
{
    return @Forum::getInstance()->searchblock();
}

/**
 * [MM_forum_icones description]
 *
 * @return  string
 */
function MM_forum_icones()
{
    if ($ibid = Theme::image("forum/icons/red_folder.gif")) {
        $imgtmpR = $ibid;
    } else {
        $imgtmpR = "images/forum/icons/red_folder.gif";
    }

    if ($ibid = Theme::image("forum/icons/folder.gif")) {
        $imgtmp = $ibid;
    } else {
        $imgtmp = "images/forum/icons/folder.gif";
    }

    $ibid = "<img src=\"$imgtmpR\" border=\"\" alt=\"\" /> = " . translate("Les nouvelles contributions depuis votre dernière visite.") . "<br />";
    $ibid .= "<img src=\"$imgtmp\" border=\"\" alt=\"\" /> = " . translate("Aucune nouvelle contribution depuis votre dernière visite.");

    return $ibid;
}

/**
 * [MM_forum_subscribeON description]
 *
 * @return  string
 */
function MM_forum_subscribeON()
{
    global $user;

    $ibid = "";

    if ((Config::get('npds.subscribe')) and ($user)) {
        $userX = base64_decode($user);
        $userR = explode(':', $userX);

        if (Mailer::isbadmailuser($userR[0]) === false) {
            $ibid = '<form action="forum.php" method="post">
                    <input type="hidden" name="op" value="maj_subscribe" />';
        }
    }

    return $ibid;
}

/**
 * [MM_forum_bouton_subscribe description]
 *
 * @return  string
 */
function MM_forum_bouton_subscribe()
{
    global $user;

    if ((Config::get('npds.subscribe')) and ($user)) {
        $userX = base64_decode($user);
        $userR = explode(':', $userX);

        if (Mailer::isbadmailuser($userR[0]) === false) {
            return '<input class="btn btn-secondary" type="submit" name="Xsub" value="' . translate("OK") . '" />';
        }
    } else {
        return '';
    }
}

/**
 * [MM_forum_subscribeOFF description]
 *
 * @return  string
 */
function MM_forum_subscribeOFF()
{
    global $user;

    $ibid = "";

    if ((Config::get('npds.subscribe')) and ($user)) {
        $userX = base64_decode($user);
        $userR = explode(':', $userX);

        if (Mailer::isbadmailuser($userR[0]) === false) {
            $ibid = "</form>";
        }
    }

    return $ibid;
}

/**
 * [MM_forum_subfolder description]
 *
 * @param   array  $arg  [$arg description]
 *
 * @return  string
 */
function MM_forum_subfolder(array $arg)
{
    $forum = Metalang::arg_filter($arg);
    
    return Forum::getInstance()->sub_forum_folder($forum);
}

/**
 * Deprecated
 *
 * @return  string
 */
//function MM_forumP()
//{
//    global $cookie, $user;
//
//    /*Sujet chaud*/
//    $hot_threshold = 10;
//
//    /*Nbre posts a afficher*/
//    $maxcount = "15";
//
//    $MM_forumP = '<table cellspacing="3" cellpadding="3" width="top" border="0">'
//        . '<tr align="center" class="ligna">'
//        . '<th width="5%">' .  Language::aff_langue('[french]Etat[/french][english]State[/english]') . '</th>'
//        . '<th width="20%">' . Language::aff_langue('[french]Forum[/french][english]Forum[/english]') . '</th>'
//        . '<th width="30%">' . Language::aff_langue('[french]Sujet[/french][english]Topic[/english]') . '</th>'
//        . '<th width="5%">' .  Language::aff_langue('[french]RÃ©ponse[/french][english]Replie[/english]') . '</th>'
//        . '<th width="20%">' . Language::aff_langue('[french]Dernier Auteur[/french][english]Last author[/english]') . '</th>'
//        . '<th width="20%">' . Language::aff_langue('[french]Date[/french][english]Date[/english]') . '</th>'
//        . '</tr>';
//
//    /*Requete liste dernier post*/
//    $result = sql_query("SELECT MAX(post_id) 
//                         FROM " . sql_prefix('posts') . " 
//                         WHERE forum_id > 0 
//                         GROUP BY topic_id 
//                         ORDER BY MAX(post_id) 
//                         DESC LIMIT 0, $maxcount");
//    
//    while (list($post_id) = sql_fetch_row($result)) {
//
//        /*Requete detail dernier post*/
//        $res = sql_query("SELECT 
//				us.topic_id, us.forum_id, us.poster_id, us.post_time, 
//				uv.topic_title, 
//				ug.forum_name, ug.forum_type, ug.forum_pass, 
//				ut.uname 
//			FROM 
//				" . sql_prefix('posts') . " us, 
//				" . sql_prefix('forumtopics') . " uv, 
//				" . sql_prefix('forums') . " ug, 
//				" . sql_prefix('users') . " ut 
//			WHERE 
//				us.post_id = $post_id 
//				AND uv.topic_id = us.topic_id 
//				AND uv.forum_id = ug.forum_id 
//				AND ut.uid = us.poster_id LIMIT 1");
//        list($topic_id, $forum_id, $poster_id, $post_time, $topic_title, $forum_name, $forum_type, $forum_pass, $uname) = sql_fetch_row($res);
//
//        if (($forum_type == "5") or ($forum_type == "7")) {
//
//            $ok_affich = false;
//            $tab_groupe = Groupe::valid_group($user);
//            $ok_affich = Groupe::groupe_forum($forum_pass, $tab_groupe);
//        } else {
//
//            $ok_affich = true;
//        }
//
//        if ($ok_affich) {
//
//            /*Nbre de postes par sujet*/
//            $TableRep = sql_query("SELECT * 
//                                   FROM " . sql_prefix('posts') . " 
//                                   WHERE forum_id > 0 
//                                   AND topic_id = '$topic_id'");
//            
//            $replys = sql_num_rows($TableRep) - 1;
//
//            /*Gestion lu / non lu*/
//            $sqlR = "SELECT rid 
//                     FROM " . sql_prefix('forum_read') . " 
//                     WHERE topicid = '$topic_id' 
//                     AND uid = '$cookie[0]' 
//                     AND status != '0'";
//
//            if ($ibid = Theme::image("forum/icons/hot_red_folder.gif")) {
//                $imgtmpHR = $ibid;
//            } else {
//                $imgtmpHR = "images/forum/icons/hot_red_folder.gif";
//            }
//
//            if ($ibid = Theme::image("forum/icons/hot_folder.gif")) {
//                $imgtmpH = $ibid;
//            } else {
//                $imgtmpH = "images/forum/icons/hot_folder.gif";
//            }
//
//            if ($ibid = Theme::image("forum/icons/red_folder.gif")) {
//                $imgtmpR = $ibid;
//            } else {
//                $imgtmpR = "images/forum/icons/red_folder.gif";
//            }
//
//            if ($ibid = Theme::image("forum/icons/folder.gif")) {
//                $imgtmpF = $ibid;
//            } else {
//                $imgtmpF = "images/forum/icons/folder.gif";
//            }
//
//            if ($ibid = Theme::image("forum/icons/lock.gif")) {
//                $imgtmpL = $ibid;
//            } else {
//                $imgtmpL = "images/forum/icons/lock.gif";
//            }
//
//            if ($replys >= $hot_threshold) {
//
//                if (sql_num_rows(sql_query($sqlR)) == 0) {
//                    $image = $imgtmpHR;
//                } else {
//                    $image = $imgtmpH;
//                }
//            } else {
//
//                if (sql_num_rows(sql_query($sqlR)) == 0) {
//                    $image = $imgtmpR;
//                } else {
//                    $image = $imgtmpF; 
//                }
//            }
//
//            if ($myrow['topic_status'] != 0) {
//                $image = $imgtmpL;
//            }
//
//            $MM_forumP .= '<tr class="lignb">'
//                . '<td align="center"><img src="' . $image . '"></td>'
//                . '<td><a href="viewforum.php?forum=' . $forum_id . '">' . $forum_name . '</a></td>'
//                . '<td><a href="viewtopic.php?topic=' . $topic_id . '&forum=' . $forum_id . '">' . $topic_title . '</a></td>'
//                . '<td align="center">' . $replys . '</td>'
//                . '<td><a href="user.php?op=userinfo&uname=' . $uname . '">' . $uname . '</a></td>'
//                . '<td align="center">' . $post_time . '</td>'
//                . '</tr>';
//        }
//    }
//
//    $MM_forumP .= '</table>';
//
//    return $MM_forumP;
//}

/**
 * Deprecated function
 *
 * @return  string
 */
//function MM_forumL()
//{
//    global $cookie, $user;
//
//    /*Sujet chaud*/
//    $hot_threshold = 10;
//
//    /*Nbre posts a afficher*/
//    $maxcount = "10";
//
//    $MM_forumL = '<table cellspacing="3" cellpadding="3" width="top" border="0">'
//        . '<tr align="center" class="ligna">'
//        . '<td width="8%">' .  Language::aff_langue('[french]Etat[/french][english]State[/english]') . '</td>'
//        . '<td width="35%">' . Language::aff_langue('[french]Forum[/french][english]Forum[/english]') . '</td>'
//        . '<td width="50%">' . Language::aff_langue('[french]Sujet[/french][english]Topic[/english]') . '</td>'
//        . '<td width="7%">' .  Language::aff_langue('[french]RÃ©ponses[/french][english]Replies[/english]') . '</td>'
//        . '</tr>';
//
//    /*Requete liste dernier post*/
//    $result = sql_query("SELECT MAX(post_id) 
//                         FROM " . sql_prefix('posts') . " 
//                         WHERE forum_id > 0 
//                         GROUP BY topic_id 
//                         ORDER BY MAX(post_id) 
//                         DESC LIMIT 0, $maxcount");
//    
//    while (list($post_id) = sql_fetch_row($result)) {
//
//        /*Requete detail dernier post*/
//        $res = sql_query("SELECT 
//				us.topic_id, us.forum_id, us.poster_id, 
//				uv.topic_title, 
//				ug.forum_name, ug.forum_type, ug.forum_pass 
//			FROM 
//				" . sql_prefix('posts') . " us, 
//				" . sql_prefix('forumtopics') . " uv, 
//				" . sql_prefix('forums') . " ug 
//			WHERE 
//				us.post_id = $post_id 
//			AND uv.topic_id = us.topic_id 
//			AND uv.forum_id = ug.forum_id LIMIT 1");
//
//        list($topic_id, $forum_id, $poster_id, $topic_title, $forum_name, $forum_type, $forum_pass) = sql_fetch_row($res);
//
//        if (($forum_type == "5") or ($forum_type == "7")) {
//
//            $ok_affich = false;
//            $tab_groupe = Groupe::valid_group($user);
//            $ok_affich = Groupe::groupe_forum($forum_pass, $tab_groupe);
//        } else {
//
//            $ok_affich = true;
//        }
//
//        if ($ok_affich) {
//
//            /*Nbre de postes par sujet*/
//            $TableRep = sql_query("SELECT * 
//                                   FROM " . sql_prefix('posts') . " 
//                                   WHERE forum_id > 0 
//                                   AND topic_id = '$topic_id'");
//
//            $replys = sql_num_rows($TableRep) - 1;
//
//            /*Gestion lu / non lu*/
//            $sqlR = "SELECT rid 
//                     FROM " . sql_prefix('forum_read') . " 
//                     WHERE topicid = '$topic_id' 
//                     AND uid = '$cookie[0]' 
//                     AND status != '0'";
//
//            if ($ibid = Theme::image("forum/icons/hot_red_folder.gif")) {
//                $imgtmpHR = $ibid;
//            } else {
//                $imgtmpHR = "images/forum/icons/hot_red_folder.gif";
//            }
//
//            if ($ibid = Theme::image("forum/icons/hot_folder.gif")) {
//                $imgtmpH = $ibid;
//            } else {
//                $imgtmpH = "images/forum/icons/hot_folder.gif";
//            }
//
//            if ($ibid = Theme::image("forum/icons/red_folder.gif")) {
//                $imgtmpR = $ibid;
//            } else {
//                $imgtmpR = "images/forum/icons/red_folder.gif";
//            }
//
//            if ($ibid = Theme::image("forum/icons/folder.gif")) {
//                $imgtmpF = $ibid;
//            } else {
//                $imgtmpF = "images/forum/icons/folder.gif";
//            }
//
//            if ($ibid = Theme::image("forum/icons/lock.gif")) {
//                $imgtmpL = $ibid;
//            } else {
//                $imgtmpL = "images/forum/icons/lock.gif";
//            }
//
//            if ($replys >= $hot_threshold) {
//
//                if (sql_num_rows(sql_query($sqlR)) == 0) {
//                    $image = $imgtmpHR;
//                } else {
//                    $image = $imgtmpH;
//                }
//            } else {
//
//                if (sql_num_rows(sql_query($sqlR)) == 0) {
//                    $image = $imgtmpR;
//                } else {
//                    $image = $imgtmpF;
//                }
//            }
//
//            if ($myrow['topic_status'] != 0) {
//                $image = $imgtmpL;
//            }
//
//            $MM_forumL .= '<tr class="lignb">'
//                . '<td align="center"><img src="' . $image . '"></td>'
//                . '<td><a href="viewforum.php?forum=' . $forum_id . '">' . $forum_name . '</a></td>'
//                . '<td><a href="viewtopic.php?topic=' . $topic_id . '&forum=' . $forum_id . '">' . $topic_title . '</a></td>'
//                . '<td align="center">' . $replys . '</td>'
//                . '</tr>';
//        }
//    }
//
//    $MM_forumL .= '</table>';
//
//    return $MM_forumL;
//}
