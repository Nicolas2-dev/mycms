<?php


if (!function_exists("Mysql_Connexion")) {
    include("Boot/grab_globals.php");
}

include("publication.php");

settype($user, 'string');

if ($mod_admin_news > 0) {
    if (!isset($admin) and !isset($user)) {
        Header("Location: index.php");
        exit;
    }

    if ($mod_admin_news == 1) {
        if (!isset($admin) and !isset($user)) {
            global $cookie;

            $result = sql_query("SELECT level 
                                 FROM " . sql_prefix('users_status') . " 
                                 WHERE uid='$cookie[0]'");

            if (sql_num_rows($result) == 1) {
                list($userlevel) = sql_fetch_row($result);

                if ($userlevel == 1) {
                    Header("Location: index.php");
                    exit;
                }
            }
        }
    }
}

function defaultDisplay()
{
    include('header.php');

    global $user, $anonymous;

    if ($user) {
        $userinfo = getusrinfo($user);
    }

    echo '
    <h2>' . translate("Proposer un article") . '</h2>
    <hr />
    <form action="submit.php" method="post" name="adminForm">';

    echo '<p class="lead"><strong>' . translate("Votre nom") . '</strong> : ';

    if ($user) {
        echo '<a href="user.php">' . $userinfo['uname'] . '</a> [ <a href="user.php?op=logout">' . translate("Déconnexion") . '</a> ]</p>
        <input type="hidden" name="name" value="' . $userinfo['name'] . '" />';
    } else {
        echo $anonymous . '[ <a href="user.php">' . translate("Nouveau membre") . '</a> ]</p>
        <input type="hidden" name="name" value="' . $anonymous . '" />';
    }

    echo '
        <div class="mb-3 row">
            <label class="col-form-label col-sm-3" for="subject">' . translate("Titre") . '</label>
            <div class="col-sm-9">
                <input type="text" id="subject" name="subject" class="form-control" autofocus="autofocus">
                <p class="help-block">' . translate("Faites simple") . '! ' . translate("Mais ne titrez pas -un article-, ou -à lire-,...") . '</p>
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-form-label col-sm-3" for="topic">' . translate("Sujet") . '</label>
            <div class="col-sm-9">
                <select class="form-select" name="topic">';

    $toplist = sql_query("SELECT topicid, topicname, topictext 
                          FROM " . sql_prefix('topics') . " 
                          ORDER BY topictext");

    echo '<option value="">' . translate("Sélectionner un sujet") . '</option>';

    settype($topic, 'string');
    settype($sel, 'string');

    while (list($topicid, $topiname, $topics) = sql_fetch_row($toplist)) {
        if ($topicid == $topic) {
            $sel = 'selected="selected" ';
        }

        echo '<option ' . $sel . ' value="' . $topicid . '">';

        if ($topics != '') {
            echo aff_langue($topics);
        } else {
            echo $topiname;
        }

        echo '</option>';

        $sel = '';
    }

    echo '
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-form-label col-sm-12" for="story" >' . translate("Texte d'introduction") . '</label>
            <div class="col-sm-12">
                <textarea class=" form-control tin" rows="25" id="story" name="story"></textarea>
            </div>
        </div>';

    echo aff_editeur('story', '');

    echo '
        <div class="mb-3 row">
            <label class="col-form-label col-sm-12" for="bodytext">' . translate("Texte complet") . '</label>
            <div class="col-sm-12">
                <textarea class="form-control tin " rows="25" id="bodytext" name="bodytext"></textarea>
            </div>
        </div>';

    echo aff_editeur('bodytext', '');

    publication('', '', '', '', 0);

    echo '
        <div class="mb-3 row">
            <div class="col-sm-12">
                <span class="help-block">' . translate("Vous devez prévisualiser avant de pouvoir envoyer") . '</span>
                <input class="btn btn-outline-primary" type="submit" name="op" value="' . translate("Prévisualiser") . '" />
            </div>
        </div>
    </form>';

    include('footer.php');
}

function PreviewStory($name, $subject, $story, $bodytext, $topic, $dd_pub, $fd_pub, $dh_pub, $fh_pub, $epur)
{
    global $tipath, $topicimage;

    include('header.php');

    $story = stripslashes(dataimagetofileurl($story, 'cache/ai'));
    $bodytext = stripslashes(dataimagetofileurl($bodytext, 'cache/ac'));
    $subject = stripslashes(str_replace('"', '&quot;', (strip_tags($subject))));

    echo '
    <h2>' . translate("Proposer un article") . '</h2>
    <hr />
    <form action="submit.php" method="post" name="adminForm">
        <p class="lead"><strong>' . translate("Votre nom") . '</strong> : ' . $name . '</p>
        <input type="hidden" name="name" value="' . $name . '" />
        <div class="card card-body mb-4">';

    if ($topic == '') {
        $topicimage = 'all-topics.gif';
        $warning = '<div class="alert alert-danger"><strong>' . translate("Sélectionner un sujet") . '</strong></div>';
    } else {
        $warning = '';

        $result = sql_query("SELECT topictext, topicimage, topicname 
                             FROM " . sql_prefix('topics') . " 
                             WHERE topicid='$topic'");

        list($topictext, $topicimage, $topicname) = sql_fetch_row($result);
    }

    $topiclogo = '<span class="badge bg-secondary float-end" title="' . aff_langue($topictext) . '" data-bs-toggle="tooltip">' . aff_langue($topicname) . '</span>';

    if ($topicimage !== '') {
        if (!$imgtmp = theme_image('topics/' . $topicimage)) {
            $imgtmp = $tipath . $topicimage;
        }

        $timage = $imgtmp;

        if (file_exists($imgtmp)) {
            $topiclogo = '<img class="img-fluid n-sujetsize" src="' . $timage . '" align="right" alt="logo du sujet" loading="lazy" />';
        }
    }

    $storyX = aff_code($story);
    $bodytextX = aff_code($bodytext);

    themepreview('<h3>' . $subject . $topiclogo . '</h3>', '<div class="text-body-secondary">' . $storyX . '</div>', $bodytextX);

    echo '
    </div>
        <div class="mb-3 row">
            <label class="col-form-label col-sm-3" for="subject">' . translate("Titre") . '</label>
            <div class="col-sm-9">
                <input type="text" name="subject" class="form-control" value="' . $subject . '" />
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-form-label col-sm-3" for="topic">' . translate("Sujet") . '</label>
            <div class="col-sm-9">
                <select class="form-select" name="topic">';

    $toplist = sql_query("SELECT topicid, topictext 
                          FROM " . sql_prefix('topics') . " 
                          ORDER BY topictext");

    echo '<option value="">' . translate("Sélectionner un sujet") . '</option>';

    while (list($topicid, $topics) = sql_fetch_row($toplist)) {

        if ($topicid == $topic) {
            $sel = 'selected="selected" ';
        }

        echo '<option ' . $sel . ' value="' . $topicid . '">' . aff_langue($topics) . '</option>';

        $sel = '';
    }

    echo '
                </select>
                <span class="help-block text-danger">' . $warning . '</span>
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-form-label col-sm-12" for="story">' . translate("Texte d'introduction") . '</label>
            <div class="col-sm-12">
                <span class="help-block">' . translate("Les spécialistes peuvent utiliser du HTML, mais attention aux erreurs") . '</span>
                <textarea class="tin form-control" rows="25" name="story">' . $story . '</textarea>';

    echo aff_editeur('story', '');

    echo '</div>
        </div>
            <div class="mb-3 row">
                <label class="col-form-label col-sm-12">' . translate("Texte complet") . '</label>
                <div class="col-sm-12">
                <textarea class="tin form-control" rows="25" name="bodytext">' . $bodytext . '</textarea>
                </div>
            </div>';

    echo aff_editeur('bodytext', '');

    publication($dd_pub, $fd_pub, $dh_pub, $fh_pub, $epur);

    echo Q_spambot();

    echo '
            <div class="mb-3 row">
                <div class="col-sm-12">
                <input class="btn btn-secondary" type="submit" name="op" value="' . translate("Prévisualiser") . '" />&nbsp;
                <input class="btn btn-primary" type="submit" name="op" value="Ok" />
                </div>
            </div>
    </form>';

    include('footer.php');
}

function submitStory($subject, $story, $bodytext, $topic, $date_debval, $date_finval, $epur, $asb_question, $asb_reponse)
{
    global $user, $EditedMessage, $anonymous, $notify;

    if ($user != '') {
        global $cookie;
        $uid = $cookie[0];
        $name = $cookie[1];
    } else {
        $uid = -1;
        $name = $anonymous;

        //anti_spambot
        if (!R_spambot($asb_question, $asb_reponse, '')) {
            Ecr_Log('security', "Submit Anti-Spam : uid=" . $uid . " / name=" . $name, '');

            redirect_url("index.php");
            die();
        }
    }

    $story = dataimagetofileurl($story, 'cache/ai');
    $bodytext = dataimagetofileurl($bodytext, 'cache/ac');
    $subject = removeHack(stripslashes(FixQuotes(str_replace("\"", "&quot;", (strip_tags($subject))))));
    $story = removeHack(stripslashes(FixQuotes($story)));
    $bodytext = removeHack(stripslashes(FixQuotes($bodytext)));

    $result = sql_query("INSERT INTO " . sql_prefix('queue') . " 
                         VALUES (NULL, '$uid', '$name', '$subject', '$story', '$bodytext', now(), '$topic','$date_debval','$date_finval','$epur')");
    
    if (sql_last_id()) {
        if ($notify) {
            global $notify_email, $notify_subject, $notify_message, $notify_from;
            
            send_email($notify_email, $notify_subject, $notify_message, $notify_from, false, "html", '');
        }

        include('header.php');

        echo '
        <h2>' . translate("Proposer un article") . '</h2>
        <hr />
        <div class="alert alert-success lead">' . translate("Merci pour votre contribution.") . '</div>';

        include('footer.php');
    } else {
        include('header.php');

        echo sql_error();

        include('footer.php');
    }
}

settype($op, 'string');

switch ($op) {
    case 'Prévisualiser':
    case translate("Prévisualiser"):
        if ($user) {
            $userinfo = getusrinfo($user);
            $name = $userinfo['uname'];
        } else {
            $name = $anonymous;
        }

        PreviewStory($name, $subject, $story, $bodytext, $topic, $dd_pub, $fd_pub, $dh_pub, $fh_pub, $epur);

        break;

    case 'Ok':
        settype($date_debval, 'string');

        if (!$date_debval) {
            $date_debval = $dd_pub . ' ' . $dh_pub . ':01';
        }

        settype($date_finval, 'string');

        if (!$date_finval) {
            $date_finval = $fd_pub . ' ' . $fh_pub . ':01';
        }

        if ($date_finval < $date_debval) {
            $date_finval = $date_debval;
        }

        SubmitStory($subject, $story, $bodytext, $topic, $date_debval, $date_finval, $epur, $asb_question, $asb_reponse);
        break;

    default:
        defaultDisplay();
        break;
}
