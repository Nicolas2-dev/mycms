<?php

declare(strict_types=1);

use Npds\Config\Config;
use Npds\Http\Controller;
use Npds\Support\Facades\Log;
use Npds\Support\Facades\Url;
use Npds\Support\Facades\Spam;
use Npds\Support\Facades\Theme;
use Npds\Support\Facades\Mailer;
use Npds\Support\Facades\Request;


if (!function_exists("Mysql_Connexion")) {
    include("Boot/grab_globals.php");
}


/**
 * [FriendController description]
 */
class LnlController extends Controller
{

    /**
     * [description]
     */
    use LnlPrivate;


    /**
     * [subscribe description]
     *
     * @param   string  $email  [$var description]
     *
     * @return  void
     */
    public function subscribe(string $email)
    {
        if ($email != '') {
            Theme::header();

            echo '
            <h2>' . translate("La lettre") . '</h2>
            <hr />
            <p class="lead mb-2">' . translate("Gestion de vos abonnements") . ' : <strong>' . $email . '</strong></p>
            <form action="'. site_url('lnl.php') . '" method="POST">
                ' . Spam::Q_spambot() . '
                <input type="hidden" name="email" value="' . $email . '" />
                <input type="hidden" name="op" value="subscribeOK" />
                <input type="submit" class="btn btn-outline-primary me-2" value="' . translate("Valider") . '" />
                <a href="index.php" class="btn btn-outline-secondary">' . translate("Retour en arrière") . '</a>
            </form>';

            Theme::footer();
        } else {
            header('location:' . site_url('index.php'));
        }
    }

    /**
     * [subscribeOk description]
     *
     * @param   string   $email        [$xemail description]
     * @param   ?string  $asb_question  [$asb_question description]
     * @param   ?string  $asb_reponse   [$asb_reponse description]
     *
     * @return  void
     */
    public function subscribeOk(string $email, ?string $asb_question, ?string $asb_reponse)
    {
        //anti_spambot
        if (!Spam::R_spambot($asb_question, $asb_reponse, "")) {
            Log::Ecr_Log("security", "LNL Anti-Spam : email=" . $email, "");

            Url::redirect_url('index.php');
            die();
        }

        Theme::header();

        if ($email != '') {
            $stop = $this->SuserCheck($email);

            if ($stop == '') {
                $host_name = Request::getip();

                $timeX = date("Y-m-d H:m:s", time());

                // Troll Control
                list($troll) = sql_fetch_row(sql_query("SELECT COUNT(*) 
                                                        FROM " . sql_prefix('lnl_outside_users') . " 
                                                        WHERE (host_name='$host_name') 
                                                        AND (to_days(now()) - to_days(date) < 3)"));
                
                if ($troll < 6) {
                    sql_query("INSERT INTO " . sql_prefix('lnl_outside_users') . " 
                            VALUES ('$email', '$host_name', '$timeX', 'OK')");

                    // Email validation + url to unsubscribe
                    $subject = html_entity_decode(translate("La lettre"), ENT_COMPAT | ENT_HTML401, 'UTF-8') . ' / ' . Config::get('npds.sitename');
                    
                    $message = translate("Merci d'avoir consacré du temps pour vous enregistrer.") . '<br /><br />
                        ' . translate("Pour supprimer votre abonnement à notre lettre, merci d'utiliser") . ' : 
                        <br />' . site_url('lnl.php?op=unsubscribe&email=' . $email) . '<br /><br />';
                    
                    include(config_path('signat.php'));

                    Mailer::send_email($email, $subject, $message, '', true, 'html', '');

                    echo '
                    <div class="alert alert-success">' . translate("Merci d'avoir consacré du temps pour vous enregistrer.") . '</div>
                    <a href="index.php">' . translate("Retour en arrière") . '</a>';
                } else {
                    $_stop = translate("Compte ou adresse IP désactivée. Cet émetteur a participé plus de x fois dans les dernières heures, merci de contacter le webmaster pour déblocage.") . "<br />";
                    
                    $this->errorHandler($_stop);
                }
            } else {
                $this->errorHandler($stop);
            }
        } else {
            $this->errorHandler(translate("Cette donnée ne doit pas être vide.") . "<br />");
        }

        Theme::footer();
    }

    /**
     * [unsubscribe description]
     *
     * @param   string  $xemail  [$xemail description]
     *
     * @return  [type]           [return description]
     */
    public function unsubscribe(string $email)
    {
        if ($email != '') {

            if ((!$email) || ($email == '') || (!preg_match('#^[_\.0-9a-z-]+@[0-9a-z-\.]+\.+[a-z]{2,4}$#i', $email))) {
                header('location:' . site_url('index.php'));
            }

            if (strrpos($email, ' ') > 0) {
                header('location:' . site_url('index.php'));
            }

            if (sql_num_rows(sql_query("SELECT email    
                                        FROM " . sql_prefix('lnl_outside_users') . " 
                                        WHERE email='$email'")) > 0) {

                $host_name = Request::getip();

                // Troll Control
                list($troll) = sql_fetch_row(sql_query("SELECT COUNT(*) 
                                                        FROM " . sql_prefix('lnl_outside_users') . " 
                                                        WHERE (host_name='$host_name') 
                                                        AND (to_days(now()) - to_days(date) < 3)"));
                
                if ($troll < 6) {
                    sql_query("UPDATE " . sql_prefix('lnl_outside_users') . " 
                            SET status='NOK' 
                            WHERE email='$email'");

                    Theme::header();

                    echo '
                    <div class="alert alert-success">' . translate("Merci") . '</div>
                    <a href="'  . site_url('index.php') . '">' . translate("Retour en arrière") . '</a>';

                    Theme::footer();
                } else {
                    Theme::header();

                    $stop = translate("Compte ou adresse IP désactivée. Cet émetteur a participé plus de x fois dans les dernières heures, merci de contacter le webmaster pour déblocage.") . "<br />";
                    
                    $this->errorHandler($stop);

                    Theme::footer();
                }
            } else {
                Url::redirect_url('index.php');
            }
        } else {
            Url::redirect_url('index.php');
        }
    }

}

/**
 * [LnlPrivate description]
 */
trait LnlPrivate
{

    /**
     * [SuserCheck description]
     *
     * @param   string  $email  [$email description]
     *
     * @return  [type]          [return description]
     */
    protected function SuserCheck(string $email)
    {
        $stop = '';

        if ((!$email) || ($email == '') || (!preg_match('#^[_\.0-9a-z-]+@[0-9a-z-\.]+\.+[a-z]{2,4}$#i', $email))) {
            $stop = translate("Erreur : Email invalide");
        }

        if (strrpos($email, ' ') > 0) {
            $stop = translate("Erreur : une adresse Email ne peut pas contenir d'espaces");
        }

        if (Mailer::checkdnsmail($email) === false) {
            $stop = translate("Erreur : DNS ou serveur de mail incorrect");
        }

        if (sql_num_rows(sql_query("SELECT email 
                                    FROM " . sql_prefix('users') . " 
                                    WHERE email='$email'")) > 0) 
        {
            $stop = translate("Erreur : adresse Email déjà utilisée");
        }

        if (sql_num_rows(sql_query("SELECT email 
                                    FROM " . sql_prefix('lnl_outside_users') . " 
                                    WHERE email='$email'")) > 0) 
        {
            if (sql_num_rows(sql_query("SELECT email 
                                        FROM " . sql_prefix('lnl_outside_users') . " 
                                        WHERE email='$email' 
                                        AND status='NOK'")) > 0) 
            {

                sql_query("DELETE FROM " . sql_prefix('lnl_outside_users') . " 
                        WHERE email='$email'");
            } else {
                $stop = translate("Erreur : adresse Email déjà utilisée");
            }
        }
        
        return $stop;
    }

    /**
     * [error_handler description]
     *
     * @param   string  $ibid  [$ibid description]
     *
     * @return  [type]         [return description]
     */
    protected function errorHandler(string $ibid)
    {
        echo '
        <h2>' . translate("La lettre") . '</h2>
        <hr />
        <p class="lead mb-2">' . translate("Merci d'entrer l'information en fonction des spécifications") . '</p>
        <div class="alert alert-danger">' . $ibid . '</div>
        <a href="' . site_url('index.php') . '" class="btn btn-outline-secondary">' . translate("Retour en arrière") . '</a>';
    }

}


switch (Request::input('op')) 
{
    case 'subscribe':
        controllerStart(
            LnlController::class, 'subscribe',
            [
                // string
                Request::input('email')
            ]
        );
        break;

    case 'subscribeOK':
        controllerStart(
            LnlController::class, 'subscribeOk',
            [
                // string
                Request::input('email'),
                // ?string nullable
                Request::input('asb_question'),                
                // ?string  nullable
                Request::input('asb_reponse'),             
            ]
        );
        break;

    case 'unsubscribe':
        controllerStart(
            LnlController::class, 'unsubscribe',
            [
                // string
                Request::input('email')
            ]
        );
        break;

}
