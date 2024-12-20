<?php

declare(strict_types=1);

namespace Npds\Forum;

use IntlDateFormatter;
use Npds\Config\Config;
use Npds\Support\Error;
use Npds\Support\Sanitize;
use Npds\Support\Facades\Log;
use Npds\Support\Facades\Date;
use Npds\Support\Facades\User;
use Npds\Support\Facades\Cache;
use Npds\Support\Facades\Theme;
use Npds\Support\Facades\Groupe;
use Npds\Support\Facades\Mailer;
use Npds\Support\Facades\Language;
use Npds\Support\Facades\Metalang;


/**
 * Undocumented class
 */
class Forum 
{

    /**
     * Instance Forum.
     *
     * @var \Npds\Forum $instance
     */
    protected static Forum $instance;

    /**
     * Constructeur.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get instance class Forum.
     *
     * @return \Npds\Forum $instance
     */
    public static function getInstance()
    {
        if (isset(static::$instance)) {
            return static::$instance;
        }

        return static::$instance = new static();
    }

    function RecentForumPosts_fab($title, $maxforums, $maxtopics, $displayposter, $topicmaxchars, $hr, $decoration)
    {
        global $user;

        $topics = 0;

        settype($maxforums, "integer");
        settype($maxtopics, "integer");

        $lim = $maxforums == 0 ? '' : " LIMIT $maxforums";
        $query = $user 
            ? "SELECT * 
            FROM " . sql_prefix('forums') . " 
            ORDER BY cat_id,forum_index, forum_id" . $lim 

            : "SELECT * 
            FROM " . sql_prefix('forums') . " 
            WHERE forum_type!='9' 
            AND forum_type!='7' 
            AND forum_type!='5' 
            ORDER BY cat_id, forum_index,forum_id" . $lim;
        
        $result = sql_query($query);

        if (!$result) {
            exit();
        }

        $boxstuff = '<ul>';

        while ($row = sql_fetch_row($result)) {
            if (($row[6] == "5") or ($row[6] == "7")) {
                $ok_affich = false;

                $tab_groupe = Groupe::valid_group($user);
                $ok_affich = Groupe::groupe_forum($row[7], $tab_groupe);
            } else {
                $ok_affich = true;
            }

            if ($ok_affich) {

                $forumid = $row[0];
                $forumname = $row[1];
                $forum_desc = $row[2];

                if ($hr) {
                    $boxstuff .= '<li><hr /></li>';
                }

                if (Config::get('npds.parse') == 0) {
                    $forumname = Sanitize::FixQuotes($forumname);
                    $forum_desc = Sanitize::FixQuotes($forum_desc);
                } else {
                    $forumname = stripslashes($forumname);
                    $forum_desc = stripslashes($forum_desc);
                }

                $res = sql_query("SELECT * 
                                FROM " . sql_prefix('forumtopics') . " 
                                WHERE forum_id = '$forumid' 
                                ORDER BY topic_time DESC");

                $ibidx = sql_num_rows($res);

                $boxstuff .= '<li class="list-unstyled border-0 p-2 mt-1"><h6><a href="viewforum.php?forum=' . $forumid . '" title="' . strip_tags($forum_desc) . '" data-bs-toggle="tooltip">' . $forumname . '</a><span class="float-end badge bg-primary" title="' . translate("Sujets") . '" data-bs-toggle="tooltip">' . $ibidx . '</span></h6></li>';

                $topics = 0;
                while (($topics < $maxtopics) && ($topicrow = sql_fetch_row($res))) {

                    $topicid = $topicrow[0];
                    $tt = $topictitle = $topicrow[1];
                    $date = $topicrow[3];
                    $replies = 0;

                    $postquery = "SELECT COUNT(*) AS total 
                                FROM " . sql_prefix('posts') . " 
                                WHERE topic_id = '$topicid'";

                    if ($pres = sql_query($postquery)) {
                        if ($myrow = sql_fetch_assoc($pres)) {
                            $replies = $myrow['total'];
                        }
                    }

                    if (strlen($topictitle) > $topicmaxchars) {
                        $topictitle = substr($topictitle, 0, $topicmaxchars);
                        $topictitle .= '..';
                    }

                    if ($displayposter) {
                        $posterid = $topicrow[2];

                        $RowQ1 = Cache::Q_Select("SELECT uname 
                                        FROM " . sql_prefix('users') . " 
                                        WHERE uid = '$posterid'", 3600);

                        $myrow = $RowQ1[0];
                        $postername = $myrow['uname'];
                    }

                    if (Config::get('npds.parse') == 0) {
                        $tt =  strip_tags(Sanitize::FixQuotes($tt));
                        $topictitle = Sanitize::FixQuotes($topictitle);
                    } else {
                        $tt =  strip_tags(stripslashes($tt));
                        $topictitle = stripslashes($topictitle);
                    }

                    $boxstuff .= '<li class="list-group-item p-1 border-right-0 border-left-0 list-group-item-action"><div class="n-ellipses"><span class="badge bg-secondary mx-2" title="' . translate("Réponses") . '" data-bs-toggle="tooltip" data-bs-placement="top">' . $replies . '</span><a href="viewtopic.php?topic=' . $topicid . '&amp;forum=' . $forumid . '" >' . $topictitle . '</a></div>';
                    
                    if ($displayposter) {
                        $boxstuff .= $decoration . '<span class="ms-1">' . $postername . '</span>';
                    }
                    
                    $boxstuff .= '</li>';
                    $topics++;
                }
            }
        }

        $boxstuff .= '</ul>';

        return $boxstuff;
    }

    function get_total_topics($forum_id)
    {
        $sql = "SELECT COUNT(*) AS total 
                FROM " . sql_prefix('forumtopics') . " 
                WHERE forum_id='$forum_id'";

        if (!$result = sql_query($sql)) {
            return ("ERROR");
        }

        if (!$myrow = sql_fetch_assoc($result)) {
            return ("ERROR");
        }

        sql_free_result($result);

        return $myrow['total'];
    }

    #autodoc get_contributeurs($fid, $tid) : Retourne une chaine des id des contributeurs du sujet
    function get_contributeurs($fid, $tid)
    {
        $rowQ1 = Cache::Q_Select("SELECT DISTINCT poster_id 
                        FROM " . sql_prefix('posts') . " 
                        WHERE topic_id='$tid' 
                        AND forum_id='$fid'", 2);

        $posterids = '';

        foreach ($rowQ1 as $contribs) {
            foreach ($contribs as $contrib) {
                $posterids .= $contrib . ' ';
            }
        }

        return chop($posterids);
    }

    function get_total_posts($fid, $tid, $type, $Mmod)
    {
        $post_aff = $Mmod ? '' : " AND post_aff='1'";

        switch ($type) {
            case 'forum':
                $sql = "SELECT COUNT(*) AS total 
                        FROM " . sql_prefix('posts') . " 
                        WHERE forum_id='$fid'$post_aff";
                break;

            case 'topic':
                $sql = "SELECT COUNT(*) AS total 
                        FROM " . sql_prefix('posts') . " 
                        WHERE topic_id='$tid' 
                        AND forum_id='$fid' $post_aff";
                break;

            case 'user':
                return "0";
        }

        if (!$result = sql_query($sql)) {
            return "ERROR";
        }

        if (!$myrow = sql_fetch_assoc($result)) {
            return "0";
        }

        sql_free_result($result);

        return $myrow['total'];
    }

    function get_last_post($id, $type, $cmd, $Mmod)
    {
        // $Mmod ne sert plus - maintenu pour compatibilité
        switch ($type) {
            case 'forum':
                $sql1 = "SELECT topic_time, current_poster 
                        FROM " . sql_prefix('forumtopics') . " 
                        WHERE forum_id = '$id' 
                        ORDER BY topic_time 
                        DESC LIMIT 0,1";

                $sql2 = "SELECT uname 
                        FROM " . sql_prefix('users') . " 
                        WHERE uid=";
                break;

            case 'topic':
                $sql1 = "SELECT topic_time, current_poster 
                        FROM " . sql_prefix('forumtopics') . " 
                        WHERE topic_id = '$id'";

                $sql2 = "SELECT uname 
                        FROM " . sql_prefix('users') . " 
                        WHERE uid=";
                break;
        }

        if (!$result = sql_query($sql1)) {
            return "ERROR";
        }

        if ($cmd == 'infos') {
            if (!$myrow = sql_fetch_row($result)) {
                $val = translate("Rien");
            } else {
                $rowQ1 = Cache::Q_Select($sql2 . "'" . $myrow[1] . "'", 3600);
                $val = Date::formatTimes($myrow[0], IntlDateFormatter::SHORT, IntlDateFormatter::SHORT);
                $val .= $rowQ1 ? ' ' . User::userpopover($rowQ1[0]['uname'], 36, 2) : '';
            }
        }

        sql_free_result($result);

        return $val;
    }

    function get_moderator($user_id)
    {
        $user_id = str_replace(",", "' or uid='", $user_id);

        if ($user_id == 0) {
            return "None";
        }

        $rowQ1 = Cache::Q_Select("SELECT uname 
                        FROM " . sql_prefix('users') . " 
                        WHERE uid='$user_id'", 3600);

        $modslist = '';

        foreach ($rowQ1 as $modnames) {
            foreach ($modnames as $modname) {
                $modslist .= $modname . ' ';
            }
        }

        return chop($modslist);
    }

    function does_exists($id, $type)
    {
        switch ($type) {
            case 'forum':
                $sql = "SELECT forum_id 
                        FROM " . sql_prefix('forums') . " 
                        WHERE forum_id = '$id'";
                break;

            case 'topic':
                $sql = "SELECT topic_id 
                        FROM " . sql_prefix('forumtopics') . " 
                        WHERE topic_id = '$id'";
                break;
        }

        if (!$result = sql_query($sql)) {
            return 0;
        }

        if (!$myrow = sql_fetch_row($result)) {
            return 0;
        }

        return 1;
    }

    function is_locked($topic)
    {
        $sql = "SELECT topic_status 
                FROM " . sql_prefix('forumtopics') . " 
                WHERE topic_id = '$topic'";

        if (!$r = sql_query($sql)) {
            return false;
        }

        if (!$m = sql_fetch_assoc($r)) {
            return false;
        }

        if (($m['topic_status'] == 1) or ($m['topic_status'] == 2)) {
            return true;
        } else {
            return false;
        }
    }

    function searchblock()
    {
        return '
        <form class="row" id="forum_search" action="searchbb.php" method="post" name="forum_search">
            <input type="hidden" name="addterm" value="any" />
            <input type="hidden" name="sortby" value="0" />
            <div class="col">
            <div class="form-floating">
                <input type="text" class="form-control" name="term" id="term" placeholder="' . translate('Recherche') . '" required="required" />
                <label for="term"><i class="fa fa-search fa-lg me-2"></i>' . translate('Recherche') . '</label>
            </div>
            </div>
        </form>';
    }

    function member_qualif($poster, $posts, $rank)
    {
        $tmp = '';

        if ($ibid = Theme::image('forum/rank/post.gif')) {
            $imgtmpP = $ibid;
        } else {
            $imgtmpP = 'public/assets/images/forum/rank/post.gif';
        }

        $tmp = '<img class="n-smil" src="' . $imgtmpP . '" alt="" loading="lazy" />' . $posts . '&nbsp;';

        if ($poster != Config::get('npds.anonymous')) {
            $nux = 0;

            if ($posts >= 10 and $posts < 30) {
                $nux = 1;
            }

            if ($posts >= 30 and $posts < 100) {
                $nux = 2;
            }

            if ($posts >= 100 and $posts < 300) {
                $nux = 3;
            }

            if ($posts >= 300 and $posts < 1000) {
                $nux = 4;
            }

            if ($posts >= 1000) {
                $nux = 5;
            }

            for ($i = 0; $i < $nux; $i++) {
                $tmp .= '<i class="fa fa-star-o text-success me-1"></i>';
            }

            if ($rank) {
                if ($ibid = Theme::image("forum/rank/" . $rank . ".gif") or $ibid = Theme::image("forum/rank/" . $rank . ".png")) {
                    $imgtmpA = $ibid;
                } else {
                    $imgtmpA = "public/assets/images/forum/rank/" . $rank . ".png";
                }

                $rank = 'rank' . $rank;

                global $$rank;
                $tmp .= '<div class="my-2"><img class="n-smil" src="' . $imgtmpA . '" alt="logo rôle" loading="lazy" />&nbsp;' . Language::aff_langue($$rank) . '</div>';
            }
        }

        return $tmp;
    }

    function control_efface_post($apli, $post_id, $topic_id, $IdForum)
    {
        global $upload_table;

        include("modules/upload/include_forum/upload.conf.forum.php");

        $sql1 = "SELECT att_id, att_name, att_path 
                FROM " . sql_prefix($upload_table) . " 
                WHERE apli='$apli' 
                AND";

        $sql2 = "DELETE FROM " . sql_prefix($upload_table) . " 
                WHERE apli='$apli' AND";

        if ($IdForum != '') {
            $sql1 .= " forum_id = '$IdForum'";
            $sql2 .= " forum_id = '$IdForum'";
        } elseif ($post_id != '') {
            $sql1 .= " post_id = '$post_id'";
            $sql2 .= " post_id = '$post_id'";
        } elseif ($topic_id != '') {
            $sql1 .= " topic_id = '$topic_id'";
            $sql2 .= " topic_id = '$topic_id'";
        }

        $result = sql_query($sql1);

        while (list($att_id, $att_name, $att_path) = sql_fetch_row($result)) {
            $fic = $DOCUMENTROOT . $att_path . $att_id . "." . $apli . "." . $att_name;
            @unlink($fic);
        }

        @sql_query($sql2);
    }

    function autorize()
    {
        global $IdPost, $IdTopic, $IdForum, $user;

        list($poster_id) = sql_fetch_row(sql_query("SELECT poster_id 
                                                    FROM " . sql_prefix('posts') . " 
                                                    WHERE post_id='$IdPost' 
                                                    AND topic_id='$IdTopic'"));

        $Mmod = false;

        if ($poster_id) {
            $myrow = sql_fetch_assoc(sql_query("SELECT forum_moderator 
                                                FROM " . sql_prefix('forums') . " 
                                                WHERE (forum_id='$IdForum')"));

            if ($myrow) {

                $moderator = $this->get_moderator($myrow['forum_moderator']);
                $moderator = explode(' ', $moderator);

                if (isset($user)) {
                    $userX = base64_decode($user);
                    $userdata = explode(":", $userX);

                    for ($i = 0; $i < count($moderator); $i++) {
                        if (($userdata[1] == $moderator[$i])) {
                            $Mmod = true;
                            break;
                        }
                    }

                    if ($userdata[0] == $poster_id) {
                        $Mmod = true;
                    }
                }
            }
        }

        return ($Mmod);
    }

    function anti_flood($modoX, $paramAFX, $poster_ipX, $userdataX, $gmtX)
    {
        // anti_flood : nb de post dans les 90 puis 30 dernières minutes / les modérateurs echappent à cette règle
        // security.log est utilisée pour enregistrer les tentatives

        $compte = !array_key_exists('uname', $userdataX) ? Config::get('npds.anonymous') : $userdataX['uname'];

        if ((!$modoX) and ($paramAFX > 0)) {
            $sql = "SELECT COUNT(poster_ip) AS total 
                    FROM " . sql_prefix('posts') . " 
                    WHERE post_time>'";

            $sql2 = $userdataX['uid'] != 1 
                ? "' AND (poster_ip='$poster_ipX' OR poster_id='" . $userdataX['uid'] . "')" 
                : "' AND poster_ip='$poster_ipX'";

            $timebase = date("Y-m-d H:i", time() + ($gmtX * 3600) - 5400);

            list($time90) = sql_fetch_row(sql_query($sql . $timebase . $sql2));

            if ($time90 > ($paramAFX * 2)) {
                Log::Ecr_Log("security", "Forum Anti-Flood : " . $compte, '');

                Error::code(translate("Vous n'êtes pas autorisé à participer à ce forum"));
            } else {
                $timebase = date("Y-m-d H:i", time() + ($gmtX * 3600) - 1800);

                list($time30) = sql_fetch_row(sql_query($sql . $timebase . $sql2));

                if ($time30 > $paramAFX) {
                    Log::Ecr_Log("security", "Forum Anti-Flood : " . $compte, '');
                    Error::code(translate("Vous n'êtes pas autorisé à participer à ce forum"));
                }
            }
        }
    }

    function forum($rowQ1)
    {
        global $user, $theme, $admin, $adminforum;

        //==> droits des admin sur les forums (superadmin et admin avec droit gestion forum)
        $adminforum = false;

        if ($admin) {
            $adminX = base64_decode($admin);
            $adminR = explode(':', $adminX);

            $Q = sql_fetch_assoc(sql_query("SELECT * 
                                            FROM " . sql_prefix('authors') . " 
                                            WHERE aid='$adminR[0]' 
                                            LIMIT 1"));

            if ($Q['radminsuper'] == 1) {
                $adminforum = 1;
            } else {
                $R = sql_query("SELECT fnom, fid, radminsuper 
                                FROM " . sql_prefix('authors') . " a 
                                LEFT JOIN " . sql_prefix('droits') . " d ON a.aid = d.d_aut_aid 
                                LEFT JOIN " . sql_prefix('fonctions') . " f ON d.d_fon_fid = f.fid 
                                WHERE a.aid='$adminR[0]' 
                                AND f.fid BETWEEN 13 AND 15");
                
                if (sql_num_rows($R) >= 1) {
                    $adminforum = 1;
                }
            }
        }
        //<== droits des admin sur les forums (superadmin et admin avec droit gestion forum)

        if ($user) {
            $userX = base64_decode($user);
            $userR = explode(':', $userX);
            $tab_groupe = Groupe::valid_group($user);
        }

        if ($ibid = Theme::image("forum/icons/red_folder.gif")) {
            $imgtmpR = $ibid;
        } else {
            $imgtmpR = "public/assets/images/forum/icons/red_folder.gif";
        }

        if ($ibid = Theme::image("forum/icons/folder.gif")) {
            $imgtmp = $ibid;
        } else {
            $imgtmp = "public/assets/images/forum/icons/folder.gif";
        }

        // preparation de la gestion des folders
        $result = sql_query("SELECT forum_id, COUNT(topic_id) AS total 
                            FROM " . sql_prefix('forumtopics') . " 
                            GROUP BY (forum_id)");
        
        while (list($forumid, $total) = sql_fetch_row($result)) {
            $tab_folder[$forumid][0] = $total; // Topic
        }

        $result = sql_query("SELECT forum_id, COUNT(DISTINCT topicid) AS total 
                            FROM " . sql_prefix('forum_read') . " 
                            WHERE uid='$userR[0]' 
                            AND topicid>'0' 
                            AND status!='0' 
                            GROUP BY (forum_id)");
        
        while (list($forumid, $total) = sql_fetch_row($result)) {
            $tab_folder[$forumid][1] = $total; // Folder
        }

        // préparation de la gestion des abonnements
        $result = sql_query("SELECT forumid 
                            FROM " . sql_prefix('subscribe') . " 
                            WHERE uid='$userR[0]'");
        
        while (list($forumid) = sql_fetch_row($result)) {
            $tab_subscribe[$forumid] = true;
        }

        // preparation du compteur total_post
        $rowQ0 = Cache::Q_Select("SELECT forum_id, COUNT(post_aff) AS total 
                        FROM " . sql_prefix('posts') . " 
                        GROUP BY forum_id", 600);
        
        foreach ($rowQ0 as $row0) {
            $tab_total_post[$row0['forum_id']] = $row0['total'];
        }

        $ibid = '';

        if ($rowQ1) {
            foreach ($rowQ1 as $row) {

                $title_aff = true;

                $rowQ2 = Q_Select("SELECT * 
                                FROM " . sql_prefix('forums') . " 
                                WHERE cat_id = '" . $row['cat_id'] . "' 
                                AND SUBSTRING(forum_name,1,3)!='<!>' 
                                ORDER BY forum_index, forum_id", 21600);
                
                if ($rowQ2) {
                    foreach ($rowQ2 as $myrow) {

                        // Gestion des Forums Cachés aux non-membres
                        if (($myrow['forum_type'] != "9") or ($userR)) {

                            // Gestion des Forums réservés à un groupe de membre
                            if (($myrow['forum_type'] == "7") or ($myrow['forum_type'] == "5")) {
                                $ok_affich = Groupe::groupe_forum($myrow['forum_pass'], $tab_groupe);

                                if ((isset($admin)) and ($adminforum == 1)) {
                                    $ok_affich = true; // to see when admin mais pas assez precis
                                }
                            } else {
                                $ok_affich = true;
                            }

                            if ($ok_affich) {
                                if ($title_aff) {
                                    $title = stripslashes($row['cat_title']);

                                    if ((file_exists("themes/$theme/html/forum-cat" . $row['cat_id'] . ".html")) or (file_exists("themes/default/html/forum-cat" . $row['cat_id'] . ".html"))) {
                                        $ibid .= '
                                        <div class=" mt-3" id="catfo_' . $row['cat_id'] . '" >
                                            <a class="list-group-item list-group-item-action active" href="forum.php?catid=' . $row['cat_id'] . '"><h5 class="my-0">' . $title . '</h5></a>';
                                    } else {
                                        $ibid .= '
                                        <div class=" mt-3" id="catfo_' . $row['cat_id'] . '">
                                            <div class="list-group-item list-group-item-action active"><h5 class="my-0">' . $title . '</h5></div>';
                                    }

                                    $title_aff = false;
                                }

                                $forum_moderator = explode(' ', $this->get_moderator($myrow['forum_moderator']));
                                $Mmod = false;

                                for ($i = 0; $i < count($forum_moderator); $i++) {
                                    if (($userR[1] == $forum_moderator[$i])) {
                                        $Mmod = true;
                                    }
                                }

                                $last_post = $this->get_last_post($myrow['forum_id'], "forum", "infos", $Mmod);
                                $ibid .= '
                                <p class="mb-0 flex-column align-items-start p-3">
                                    <span class="lead d-flex w-100 mt-1">';

                                if (($tab_folder[$myrow['forum_id']][0] - $tab_folder[$myrow['forum_id']][1]) > 0) {
                                    $ibid .= '<i class="fa fa-folder text-primary fa-lg me-2 mt-1" title="' . translate("Les nouvelles contributions depuis votre dernière visite.") . '" data-bs-toggle="tooltip" data-bs-placement="right"></i>';
                                } else {
                                    $ibid .= '<i class="far fa-folder text-primary fa-lg me-2 mt-1" title="' . translate("Aucune nouvelle contribution depuis votre dernière visite.") . '" data-bs-toggle="tooltip" data-bs-placement="right"></i>';
                                }

                                $name = stripslashes($myrow['forum_name']);
                                $redirect = false;

                                if (strstr(strtoupper($name), "<a HREF")) {
                                    $redirect = true;
                                } else {
                                    $ibid .= '
                                    <a href="viewforum.php?forum=' . $myrow['forum_id'] . '" >' . $name . '</a>';
                                }

                                if (!$redirect) {
                                    $ibid .= '
                                    <span class="ms-auto"> 
                                        <span class="badge rounded-pill text-bg-secondary ms-1" title="' . translate("Contributions") . '" data-bs-toggle="tooltip">' . $tab_total_post[$myrow['forum_id']] . '</span>
                                        <span class="badge rounded-pill text-bg-secondary ms-1" title="' . translate("Sujets") . '" data-bs-toggle="tooltip">' . $tab_folder[$myrow['forum_id']][0] . '</span>
                                    </span>
                                </span>';
                                }

                                $desc = stripslashes(Metalang::meta_lang($myrow['forum_desc']));

                                if ($desc != '') {
                                    $ibid .= '<span class="d-flex w-100 mt-1">' . $desc . '</span>';
                                }

                                if (!$redirect) {
                                    $ibid .= '<span class="d-flex w-100 mt-1"> [ ';

                                    if ($myrow['forum_access'] == "0" && $myrow['forum_type'] == "0") {
                                        $ibid .= translate("Accessible à tous");
                                    }

                                    if ($myrow['forum_type'] == "1") {
                                        $ibid .= translate("Privé");
                                    }

                                    if ($myrow['forum_type'] == "5") {
                                        $ibid .= "PHP Script + " . translate("Groupe");
                                    }

                                    if ($myrow['forum_type'] == "6") {
                                        $ibid .= "PHP Script";
                                    }

                                    if ($myrow['forum_type'] == "7") {
                                        $ibid .= translate("Groupe");
                                    }

                                    if ($myrow['forum_type'] == "8") {
                                        $ibid .= translate("Texte étendu");
                                    }

                                    if ($myrow['forum_type'] == "9") {
                                        $ibid .= translate("Caché");
                                    }

                                    if ($myrow['forum_access'] == "1" && $myrow['forum_type'] == "0") {
                                        $ibid .= translate("Utilisateur enregistré");
                                    }

                                    if ($myrow['forum_access'] == "2" && $myrow['forum_type'] == "0") {
                                        $ibid .= translate("Modérateur");
                                    }

                                    if ($myrow['forum_access'] == "9") {
                                        $ibid .= '<span class="text-danger mx-2"><i class="fa fa-lock me-2"></i>' . translate("Fermé") . '</span>';
                                    }

                                    $ibid .= ' ] </span>';

                                    // Subscribe
                                    if ((Config::get('npds.subscribe')) and ($user)) {
                                        if (!$redirect) {

                                            if (Mailer::isbadmailuser($userR[0]) === false) {
                                                $ibid .= '
                                                <span class="d-flex w-100 mt-1" >
                                                    <span class="form-check">';

                                                if ($tab_subscribe[$myrow['forum_id']]) {
                                                    $ibid .= '
                                                    <input class="form-check-input n-ckbf" type="checkbox" id="subforumid' . $myrow['forum_id'] . '" name="Subforumid[' . $myrow['forum_id'] . ']" checked="checked" />';
                                                } else {
                                                    $ibid .= '
                                                    <input class="form-check-input n-ckbf" type="checkbox" id="subforumid' . $myrow['forum_id'] . '" name="Subforumid[' . $myrow['forum_id'] . ']" />';
                                                }

                                                $ibid .= '
                                                    <label class="form-check-label" for="subforumid' . $myrow['forum_id'] . '" title="' . translate("Cochez et cliquez sur le bouton OK pour recevoir un Email lors d'une nouvelle soumission dans ce forum.") . '" data-bs-toggle="tooltip" data-bs-placement="right">' . translate('Abonnement') . '</label>
                                                    </span>
                                                </span>';
                                            }
                                        }
                                    }

                                    $ibid .= '<div class="w-100 text-end"><div class="small">' . translate("Dernière contribution") . ' : ' . $last_post . '</div><hr class="mb-0"/></div>';
                                } else {
                                    $ibid .= '';
                                }
                            }
                        }
                    }

                    if (($ok_affich == false and $title_aff == false) or $ok_affich == true) {
                        $ibid .= '
                            </p>
                            </div>';
                    }
                }
            }
        }

        if ((Config::get('npds.subscribe')) and ($user) and ($ok_affich)) {
            if (Mailer::isbadmailuser($userR[0]) === false) { //proto
                $ibid .= '
                <div class="form-check mt-1">
                    <input class="form-check-input" type="checkbox" id="ckball_f" />
                    <label class="form-check-label text-body-secondary" for="ckball_f" id="ckb_status_f">Tout cocher</label>
                </div>';
            }
        }

        return $ibid;
    }

    // fonction appelée par le meta-mot forum_subfolder()
    function sub_forum_folder($forum)
    {
        global $user;

        if ($user) {
            $userX = base64_decode($user);
            $userR = explode(':', $userX);
        }

        $result = sql_query("SELECT COUNT(topic_id) AS total 
                            FROM " . sql_prefix('forumtopics') . " 
                            WHERE forum_id='$forum'");

        list($totalT) = sql_fetch_row($result);

        $result = sql_query("SELECT COUNT(DISTINCT topicid) AS total 
                            FROM " . sql_prefix('forum_read') . " 
                            WHERE uid='$userR[0]' 
                            AND topicid>'0' 
                            AND status!='0' 
                            AND forum_id='$forum'");
                            
        list($totalF) = sql_fetch_row($result);

        if ($ibid = Theme::image("forum/icons/red_sub_folder.gif")) {
            $imgtmpR = $ibid;
        } else {
            $imgtmpR = "public/assets/images/forum/icons/red_sub_folder.gif";
        }

        if ($ibid = Theme::image("forum/icons/sub_folder.gif")) {
            $imgtmp = $ibid;
        } else {
            $imgtmp = "public/assets/images/forum/icons/sub_folder.gif";
        }

        if (($totalT - $totalF) > 0) {
            $ibid = '<img src="' . $imgtmpR . '" alt="" loading="lazy" />';
        } else {
            $ibid = '<img src="' . $imgtmp . '" alt="" loading="lazy" />';
        }

        return $ibid;
    }

}
