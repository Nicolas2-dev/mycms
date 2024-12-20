<?php

declare(strict_types=1);

namespace Npds\Subscribe;

use Npds\Config\Config;
use Npds\Mailer\Mailer;


/**
 * Class Subscribe
 */
class Subscribe 
{

    /**
     * Instance Subscribe.
     *
     * @var \Npds\Subscribe\Subscribe $instance
     */
    protected static Subscribe $instance;

    /**
     * Instance Mailer.
     *
     * @var Npds\Mailer\Mailer $instance
     */
    protected Mailer $mailer;


    /**
     * Constructeur.
     */
    public function __construct()
    {
        $this->mailer = Mailer::getInstance();
    }

    /**
     * Get instance class Subscribe.
     *
     * @return \Npds\Subscribe\Susbcribe $instance
     */
    public static function getInstance()
    {
        if (isset(static::$instance)) {
            return static::$instance;
        }

        return static::$instance = new static();
    }

    /**
     * Assure l'envoi d'un mail pour un abonnement
     *
     * @param   int     $Xtype    topic, forum ... 
     * @param   string  $Xtopic   clause WHERE
     * @param   int     $Xforum   id of forum
     * @param   string  $Xresume  Text passed
     * @param   int     $Xsauf    not this userid
     *
     * @return  void
     */
    public function subscribe_mail(int $Xtype, string $Xtopic, int $Xforum, string $Xresume, int $Xsauf)
    {
        if ($Xtype == 'topic') {
            $result = sql_query("SELECT topictext 
                                FROM " . sql_prefix('topics') . " 
                                WHERE topicid='$Xtopic'");

            list($abo) = sql_fetch_row($result);
            
            $result = sql_query("SELECT uid 
                                FROM " . sql_prefix('subscribe') . " 
                                WHERE topicid='$Xtopic'");
        }

        if ($Xtype == 'forum') {
            $result = sql_query("SELECT forum_name, arbre 
                                FROM " . sql_prefix('forums') . " 
                                WHERE forum_id='$Xforum'");

            list($abo, $arbre) = sql_fetch_row($result);
            
            if ($arbre) {
                $hrefX = 'viewtopicH.php';
            } else {
                $hrefX = 'viewtopic.php';
            }

            $resultZ = sql_query("SELECT topic_title 
                                FROM " . sql_prefix('forumtopics') . " 
                                WHERE topic_id='$Xtopic'");

            list($title_topic) = sql_fetch_row($resultZ);

            $result = sql_query("SELECT uid 
                                FROM " . sql_prefix('subscribe') . " 
                                WHERE forumid='$Xforum'");
        }

        include_once(language_path('lang-multi.php'));

        while (list($uid) = sql_fetch_row($result)) {
            if ($uid != $Xsauf) {
                $resultX = sql_query("SELECT email, user_langue 
                                    FROM " . sql_prefix('users') . " 
                                    WHERE uid='$uid'");

                list($email, $user_langue) = sql_fetch_row($resultX);
                
                $sitename = Config::get('npds.sitename');

                if ($Xtype == 'topic') {
                    $entete = translate_ml($user_langue, "Vous recevez ce Mail car vous vous êtes abonné à : ") . translate_ml($user_langue, "Sujet") . " => " . strip_tags($abo) . "\n\n";
                    
                    $resume = translate_ml($user_langue, "Le titre de la dernière publication est") . " => $Xresume\n\n";
                    
                    $url_topic = site_url('search.php?query=&topic=' . $Xtopic);

                    $url = translate_ml($user_langue, "L'URL pour cet article est : ") . "<a href=\"" . $url_topic . "\">" . $url_topic . "</a>\n\n";
                }

                if ($Xtype == 'forum') {
                    $entete = translate_ml($user_langue, "Vous recevez ce Mail car vous vous êtes abonné à : ") . translate_ml($user_langue, "Forum") . " => " . strip_tags($abo) . "\n\n";
                    
                    $url_forum = site_url($hrefX . '?topic=' . $Xtopic . '&forum=' . $Xforum . '&start=9999#lastpost');

                    $url = translate_ml($user_langue, "L'URL pour cet article est : ") . "<a href=\"" . $url_forum . "\">" . $url_forum . "</a>\n\n";
                    
                    $resume = translate_ml($user_langue, "Le titre de la dernière publication est") . " => ";
                    
                    if ($Xresume != '') {
                        $resume .= $Xresume . "\n\n";
                    } else {
                        $resume .= $title_topic . "\n\n";
                    }
                }

                $subject = html_entity_decode(translate_ml($user_langue, "Abonnement"), ENT_COMPAT | ENT_HTML401, 'UTF-8') . " / $sitename";
                
                $message = $entete;
                $message .= $resume;
                $message .= $url;

                include(config_path('signat.php'));

                $this->mailer->send_email($email, $subject, $message, '', true, 'html');
            }
        }
    }

    /**
     * Retourne true si le membre est abonné; à un topic ou forum
     *
     * @param   int     $Xuser  [$Xuser description]
     * @param   string  $Xtype  [$Xtype description]
     * @param   int     $Xclef  [$Xclef description]
     *
     * @return  bool
     */
    public function subscribe_query(int $Xuser, string $Xtype, int $Xclef)
    {
        if ($Xtype == 'topic') {
            $result = sql_query("SELECT topicid 
                                FROM " . sql_prefix('subscribe') . " 
                                WHERE uid='$Xuser' 
                                AND topicid='$Xclef'");
        }

        if ($Xtype == 'forum') {
            $result = sql_query("SELECT forumid 
                                FROM " . sql_prefix('subscribe') . " 
                                WHERE uid='$Xuser' 
                                AND forumid='$Xclef'");
        }

        list($Xtemp) = sql_fetch_row($result);

        if ($Xtemp != '') {
            return true;
        } else {
            return false;
        }
    }

}
