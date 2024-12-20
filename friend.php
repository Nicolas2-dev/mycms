<?php

declare(strict_types=1);

use Npds\Config\Config;
use Npds\Http\Controller;
use Npds\Support\Facades\Css;
use Npds\Support\Facades\Log;
use Npds\Support\Facades\Url;
use Npds\Support\Facades\Spam;
use Npds\Support\Facades\Theme;
use Npds\Support\Facades\Mailer;
use Npds\Support\Facades\Request;
use Npds\Support\Facades\Language;


if (!function_exists("Mysql_Connexion")) {
    include("Boot/grab_globals.php");
}


/**
 * [FriendController description]
 */
class FriendController extends Controller
{

    /**
     * [FriendSend description]
     *
     * @param   int     $sid      [$sid description]
     * @param   int     $archive  [$archive description]
     *
     * @return  void
     */
    public function FriendSend(int $sid, int $archive)
    {
        global $user, $cookie;

        $result = sql_query("SELECT title, aid 
                            FROM " . sql_prefix('stories') . " 
                            WHERE sid='$sid'");

        list($title, $aid) = sql_fetch_row($result);

        if (!$aid) {
            header('Location:' . site_url('index.php'));
        }

        Theme::header();

        echo '
        <div class="card card-body">
        <h2><i class="fa fa-at fa-lg text-body-secondary"></i>&nbsp;' . translate("Envoi de l'article à un ami") . '</h2>
        <hr />
        <p class="lead">' . translate("Vous allez envoyer cet article") . ' : <strong>' . Language::aff_langue($title) . '</strong></p>
        <form id="friendsendstory" action="' . site_url('friend.php') .'" method="post">
            <input type="hidden" name="sid" value="' . $sid . '" />';

        $yn = '';
        $ye = '';

        if ($user) {
            $result = sql_query("SELECT name, email 
                                FROM " . sql_prefix('users') . " 
                                WHERE uname='$cookie[1]'");

            list($yn, $ye) = sql_fetch_row($result);
        }

        echo '
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="fname" name="fname" maxlength="100" required="required" />
                <label for="fname">' . translate("Nom du destinataire") . '</label>
                <span class="help-block text-end"><span class="muted" id="countcar_fname"></span></span>
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="fmail" name="fmail" maxlength="254" required="required" />
                <label for="fmail">' . translate("Email du destinataire") . '</label>
                <span class="help-block text-end"><span class="muted" id="countcar_fmail"></span></span>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="yname" name="yname" value="' . $yn . '" maxlength="100" required="required" />
                <label for="yname">' . translate("Votre nom") . '</label>
                <span class="help-block text-end"><span class="muted" id="countcar_yname"></span></span>
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="ymail" name="ymail" value="' . $ye . '" maxlength="254" required="required" />
                <label for="ymail">' . translate("Votre Email") . '</label>
                <span class="help-block text-end"><span class="muted" id="countcar_ymail"></span></span>
            </div>';

        echo '' . Spam::Q_spambot();

        echo '
            <input type="hidden" name="archive" value="' . $archive . '" />
            <input type="hidden" name="op" value="SendStory" />
            <button type="submit" class="btn btn-primary" title="' . translate("Envoyer") . '"><i class="fa fa-lg fa-at"></i>&nbsp;' . translate("Envoyer") . '</button>
        </form>';

        $arg1 = '
        var formulid = ["friendsendstory"];
        inpandfieldlen("yname",100);
        inpandfieldlen("ymail",254);
        inpandfieldlen("fname",100);
        inpandfieldlen("fmail",254);';

        Css::adminfoot('fv', '', $arg1, '');
    }

    /**
     * [SendStory description]
     *
     * @param   int     $sid           [$sid description]
     * @param   string  $yname         [$yname description]
     * @param   string  $ymail         [$ymail description]
     * @param   string  $fname         [$fname description]
     * @param   string  $fmail         [$fmail description]
     * @param   int     $archive       [$archive description]
     * @param   string  $asb_question  [$asb_question description]
     * @param   string  $asb_reponse   [$asb_reponse description]
     *
     * @return  [type]                 [return description]
     */
    public function SendStory(int $sid, string $yname, string $ymail, string $fname, string $fmail, int $archive, string $asb_question, string $asb_reponse)
    {
        global $user;

        if (!$user) {
            //anti_spambot
            if (!Spam::R_spambot($asb_question, $asb_reponse, '')) {
                Log::Ecr_Log('security', "Send-Story Anti-Spam : name=" . $yname . " / mail=" . $ymail, '');
                
                Url::redirect_url('index.php');
                die();
            }
        }

        $result2 = sql_query("SELECT title, time, topic 
                            FROM " . sql_prefix('stories') . " 
                            WHERE sid='$sid'");

        list($title, $time, $topic) = sql_fetch_row($result2);

        $result3 = sql_query("SELECT topictext 
                            FROM " . sql_prefix('topics') . " 
                            WHERE topicid='$topic'");
                            
        list($topictext) = sql_fetch_row($result3);

        $subject = html_entity_decode(translate("Article intéressant sur"), ENT_COMPAT | ENT_HTML401, 'UTF-8') . Config::get('npds.sitename');

        $fname = removeHack($fname);

        $message = translate("Bonjour") . " $fname :\n\n"
                 . translate("Votre ami") . " $yname " . translate("a trouvé cet article intéressant et a souhaité vous l'envoyer.") . "\n\n"
                 . Language::aff_langue($title) . "\n" 
                 . translate("Date :") . " $time\n" 
                 . translate("Sujet : ") . " " . Language::aff_langue($topictext) . "\n\n" 
                 . translate("L'article") . " : <a href=\"' . site_url('article.php?sid=' . $sid . '&amp;archive=' . $archive) . '\">
                    '. site_url('article.php?sid=' . $sid . '&amp;archive=' . $archive)
                   </a>\n\n";
        
        include("signat.php");

        $fmail      = removeHack($fmail);
        $subject    = removeHack($subject);
        $message    = removeHack($message);
        $yname      = removeHack($yname);
        $ymail      = removeHack($ymail);
        
        $stop = false;
        
        if ((!$fmail) || ($fmail == "") || (!preg_match('#^[_\.0-9a-z-]+@[0-9a-z-\.]+\.+[a-z]{2,4}$#i', $fmail))) {
            $stop = true;
        }
        
        if ((!$ymail) || ($ymail == "") || (!preg_match('#^[_\.0-9a-z-]+@[0-9a-z-\.]+\.+[a-z]{2,4}$#i', $ymail))) {
            $stop = true;
        }
        
        if (!$stop) {
            Mailer::send_email($fmail, $subject, $message, $ymail, false, 'html', '');
        } else {
            $title = '';
            $fname = '';
        }

        $title = urlencode(Language::aff_langue($title));
        $fname = urlencode($fname);

        Header('Location:' . site_url('friend.php?op=StorySent&title=' . $title . '&fname=' .$fname));
    }

    /**
     * [StorySent description]
     *
     * @param   string  $title  [$title description]
     * @param   string  $fname  [$fname description]
     *
     * @return  [type]          [return description]
     */
    public function StorySent(string $title, string $fname)
    {
        Theme::header();

        $title = urldecode($title);
        $fname = urldecode($fname);

        if ($fname == '') {
            echo '<div class="alert alert-danger">
                ' . translate("Erreur : Email invalide") . '
            </div>';
        } else {
            echo '<div class="alert alert-success">
                ' . translate("L'article") . ' <strong>' . stripslashes($title) . '</strong> ' . translate("a été envoyé à") . '&nbsp;' . $fname . '
                <br />' . translate("Merci") . '
            </div>';
        }

        Theme::footer();
    }

    /**
     * [SendSite description]
     *
     * @param   string  $yname         [$yname description]
     * @param   string  $ymail         [$ymail description]
     * @param   string  $fname         [$fname description]
     * @param   string  $fmail         [$fmail description]
     * @param   string  $asb_question  [$asb_question description]
     * @param   string  $asb_reponse   [$asb_reponse description]
     *
     * @return  [type]                 [return description]
     */
    public function SendSite(string $yname, string $ymail, string $fname, string $fmail, string $asb_question, string $asb_reponse)
    {
        global $user;

        if (!$user) {
            //anti_spambot
            if (!Spam::R_spambot($asb_question, $asb_reponse, '')) {
                Log::Ecr_Log('security', "Friend Anti-Spam : name=" . $yname . " / mail=" . $ymail, '');
                
                Url::redirect_url('index.php');
                die();
            }
        }
        
        $subject = html_entity_decode(translate("Site à découvrir : "), ENT_COMPAT | ENT_HTML401, 'UTF-8') . Config::get('npds.sitename');

        $fname = removeHack($fname);
        $yname = removeHack($yname); 

        $message = translate("Bonjour") . " $fname :\n\n" 
                . translate("Votre ami") . " $yname " . translate("a trouvé notre site") .  Config::get('npds.sitename')  . translate("intéressant et a voulu vous le faire connaître.") . "\n\n
                " . Config::get('npds.sitename') . ": <a href=\"" . site_url() . "\">" . site_url() . "</a>\n\n";
        
        include("signat.php");

        $stop = false;
        
        $fmail = removeHack($fmail);

        $match = '#^[_\.0-9a-z-]+@[0-9a-z-\.]+\.+[a-z]{2,4}$#i';

        if ((!$fmail) || ($fmail == '') || (!preg_match($match, $fmail))) {
            $stop = true;
        }
        
        $ymail = removeHack($ymail);

        if ((!$ymail) || ($ymail == '') || (!preg_match($match, $ymail))) {
            $stop = true;
        }
        
        if (!$stop) {
            Mailer::send_email($fmail, removeHack($subject), removeHack($message), $ymail, false, 'html', '');
        } else { 
            $fname = '';
        }

        Header('Location:' . site_url('friend.php?op=SiteSent&fname=' .$fname));
    }

    /**
     * [SiteSent description]
     *
     * @param   string  $fname  [$fname description]
     *
     * @return  [type]          [return description]
     */
    public function SiteSent(string $fname)
    {
        Theme::header();

        if ($fname == '') {
            echo '
            <div class="alert alert-danger lead" role="alert">
                <i class="fa fa-exclamation-triangle fa-lg"></i>&nbsp;
                ' . translate("Erreur : Email invalide") . '
            </div>';
        } else {
            echo '
            <div class="alert alert-success lead" role="alert">
                <i class="fa fa-exclamation-triangle fa-lg"></i>&nbsp;
                ' . translate("Nos références ont été envoyées à ") . ' ' . $fname . ', <br />
                <strong>' . translate("Merci de nous avoir recommandé") . '</strong>
            </div>';
        }

        Theme::footer();
    }

    /**
     * [RecommendSite description]
     *
     * @return  [type]  [return description]
     */
    public function RecommendSite()
    {
        global $user, $cookie;

        if ($user) {
            $result = sql_query("SELECT name, email 
                                FROM " . sql_prefix('') . "users 
                                WHERE uname='$cookie[1]'");

            list($yn, $ye) = sql_fetch_row($result);
        } else {
            $yn = '';
            $ye = '';
        }

        Theme::header();

        echo '
        <div class="card card-body">
        <h2>' . translate("Recommander ce site à un ami") . '</h2>
        <hr />
        <form id="friendrecomsite" action="' . site_url('friend.php') .'" method="post">
            <input type="hidden" name="op" value="SendSite" />
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="yname" name="yname" value="' . $yn . '" required="required" maxlength="100" />
                <label for="yname">' . translate("Votre nom") . '</label>
                <span class="help-block text-end"><span class="muted" id="countcar_yname"></span></span>
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="ymail" name="ymail" value="' . $ye . '" required="required" maxlength="100" />
                <label for="ymail">' . translate("Votre Email") . '</label>
            </div>
            <span class="help-block text-end"><span class="muted" id="countcar_ymail"></span></span>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="fname" name="fname" required="required" maxlength="100" />
                <label for="fname">' . translate("Nom du destinataire") . '</label>
                <span class="help-block text-end"><span class="muted" id="countcar_fname"></span></span>
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="fmail" name="fmail" required="required" maxlength="100" />
                <label for="fmail">' . translate("Email du destinataire") . '</label>
                <span class="help-block text-end"><span class="muted" id="countcar_fmail"></span></span>
            </div>
            ' . Spam::Q_spambot() . '
            <div class="mb-3 row">
                <div class="col-sm-8 ms-sm-auto">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-lg fa-at"></i>&nbsp;' . translate("Envoyer") . '</button>
                </div>
            </div>
        </form>';

        $arg1 = '
        var formulid = ["friendrecomsite"];
        inpandfieldlen("yname",100);
        inpandfieldlen("ymail",100);
        inpandfieldlen("fname",100);
        inpandfieldlen("fmail",100);';

        Css::adminfoot('fv', '', $arg1, '');
    }

}


switch (Request::input('op')) 
{

    case 'FriendSend':
        controllerStart(
            FriendController::class, 'FriendSend',
            [
                // int
                Request::query('sid'),
                // int
                Request::query('archive'),
            ]
        );
        break;

    case 'SendStory':
        controllerStart(
            FriendController::class, 'SendStory',
            [
                // int
                Request::input('sid'),
                // string
                Request::input('yname'),
                // string
                Request::input('ymail'),
                // string 
                Request::input('fname'),
                // string 
                Request::input('fmail'),
                // int
                Request::input('archive'),
                // string 
                Request::input('asb_question'),
                // string 
                Request::input('asb_reponse'),
            ]
        );
        break;
       
    case 'StorySent':
        controllerStart(
            FriendController::class, 'StorySent',
            [
                // string
                Request::query('title'),
                // string
                Request::query('fname'),
            ]
        );
        break;
       
    case 'SendSite':
        controllerStart(
            FriendController::class, 'SendSite',
            [
                // string
                Request::input('yname'),
                // string
                Request::input('ymail'),
                // string
                Request::input('fname'),
                // string
                Request::input('fmail'),
                // string
                Request::input('asb_question'),
                // string
                Request::input('asb_reponse'),
            ]
        );
        break;
        
        case 'SiteSent':
            controllerStart(
                FriendController::class, 'SiteSent',
                [
                    // string
                    Request::query('fname'),
                ]
            );
            break;

    default:
        controllerStart(
            FriendController::class, 'RecommendSite');
        break;
        
}
