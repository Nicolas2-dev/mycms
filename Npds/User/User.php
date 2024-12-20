<?php

namespace Npds\User;


use Npds\Config\Config;
use Npds\Support\Error;
use Npds\Support\Facades\Auth;
use Npds\Support\Facades\Spam;
use Npds\Support\Facades\Theme;


/**
 * Undocumented class
 */
class User 
{

    /**
     * Instance User.
     *
     * @var \Npds\User $instance
     */
    protected static User $instance;

    /**
     * Constructeur.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get instance class User.
     *
     * @return \Npds\User $instance
     */
    public static function getInstance()
    {
        if (isset(static::$instance)) {
            return static::$instance;
        }

        return static::$instance = new static();
    }

    #autodoc getusrinfo($user) : Renvoi le contenu de la table users pour le user uname
    function getusrinfo($user)
    {
        $cookie = explode(':', base64_decode($user));
        
        $result = sql_query("SELECT pass 
                            FROM " . sql_prefix('users') . " 
                            WHERE uname='$cookie[1]'");

        list($pass) = sql_fetch_row($result);
        
        $userinfo = '';
        
        if (($cookie[2] == md5($pass)) and ($pass != '')) {
            $result = sql_query("SELECT uid, name, uname, email, femail, url, user_avatar, user_occ, user_from, user_intrest, user_sig, user_viewemail, user_theme, pass, storynum, umode, uorder, thold, noscore, bio, ublockon, ublock, theme, commentmax, user_journal, send_email, is_visible, mns, user_lnl 
                                FROM " . sql_prefix('users') . " 
                                WHERE uname='$cookie[1]'");
            
            if (sql_num_rows($result) == 1) {
                $userinfo = sql_fetch_assoc($result);
            } else {
                echo '<strong>' . translate("Un problème est survenu") . '.</strong>';
            }
        }

        return $userinfo;
    }

    #autodoc AutoReg() : Si AutoRegUser=true et que le user ne dispose pas du droit de connexion : RAZ du cookie NPDS<br />retourne False ou True
    function AutoReg()
    {
        global $user;

        if (!Config::get('npds.AutoRegUser')) {
            if (isset($user)) {
                $cookie = explode(':', base64_decode($user));

                list($test) = sql_fetch_row(sql_query("SELECT open 
                                                    FROM " . sql_prefix('users_status') . " 
                                                    WHERE uid='$cookie[0]'"));
                
                if (!$test) {
                    setcookie('user', '', 0);
                    
                    return false;
                } else {
                    return true;
                }
            } else {
                return true;
            }
        } else {
            return true;
        }
    }

    function user_is_moderator($uidX, $passwordX, $forum_accessX)
    {
        $result1 = sql_query("SELECT pass 
                            FROM " . sql_prefix('users') . " 
                            WHERE uid = '$uidX'");

        $result2 = sql_query("SELECT level 
                            FROM " . sql_prefix('users_status') . " 
                            WHERE uid = '$uidX'");

        $userX = sql_fetch_assoc($result1);

        $password = $userX['pass'];

        $userX = sql_fetch_assoc($result2);

        if ((md5($password) == $passwordX) and ($forum_accessX <= $userX['level']) and ($userX['level'] > 1)) {
            return $userX['level'];
        } else {
            return false;
        }
    }

    function get_userdata_from_id($userid)
    {
        $sql1 = "SELECT * 
                FROM " . sql_prefix('users') . " 
                WHERE uid='$userid'";

        $sql2 = "SELECT * 
                FROM " . sql_prefix('users_status') . " 
                WHERE uid='$userid'";

        if (!$result = sql_query($sql1)) {
            Error::code('0016');
        }

        if (!$myrow = sql_fetch_assoc($result)) {
            $myrow = array("uid" => 1);
        } else {
            $myrow = array_merge($myrow, (array) sql_fetch_assoc(sql_query($sql2)));
        }

        return $myrow;
    }

    function get_userdata_extend_from_id($userid)
    {
        $sql1 = "SELECT * 
                FROM " . sql_prefix('users_extend') . " 
                WHERE uid='$userid'";

        $myrow = (array) sql_fetch_assoc(sql_query($sql1));

        return $myrow;
    }

    function get_userdata($username)
    {
        $sql = "SELECT * 
                FROM " . sql_prefix('users') . " 
                WHERE uname='$username'";

        if (!$result = sql_query($sql)) {
            Error::code('0016');
        }

        if (!$myrow = sql_fetch_assoc($result)) {
            $myrow = array("uid" => 1);
        }

        return $myrow;
    }

    #autodoc userpopover($who, $dim, $avpop) : à partir du nom de l'utilisateur ($who) $avpop à 1 : affiche son avatar (ou avatar defaut) au dimension ($dim qui défini la class n-ava-$dim)<br /> $avpop à 2 : l'avatar affiché commande un popover contenant diverses info de cet utilisateur et liens associés
    function userpopover($who, $dim, $avpop)
    {
        global $short_user, $user;

        $result = sql_query("SELECT uname 
                            FROM " . sql_prefix('users') . " 
                            WHERE uname ='$who'");

        if (sql_num_rows($result)) {
            $temp_user = $this->get_userdata($who);

            $socialnetworks = array();
            $posterdata_extend = array();
            $res_id = array();

            $my_rs = '';

            if (!$short_user) {
                if ($temp_user['uid'] != 1) {
                    $posterdata_extend = $this->get_userdata_extend_from_id($temp_user['uid']);

                    include('Modules/reseaux-sociaux/reseaux-sociaux.conf.php');
                    include('Modules/geoloc/geoloc.conf');

                    if ($user or Auth::autorisation(-127)) {
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
                                        $my_rs .= '<a class="me-2 " href="';

                                        if ($v1[2] == 'skype') {
                                            $my_rs .= $v1[1] . $y1[1] . '?chat';
                                        }  else {
                                            $my_rs .= $v1[1] . $y1[1];
                                        }

                                        $my_rs .= '" target="_blank"><i class="fab fa-' . $v1[2] . ' fa-lg fa-fw mb-2"></i></a> ';
                                        break;
                                    } else {
                                        $my_rs .= '';
                                    }
                                }
                            }
                        }
                    }
                }
            }

            settype($ch_lat, 'string');

            $useroutils = '';

            if ($user or Auth::autorisation(-127)) {
                if ($temp_user['uid'] != 1 and $temp_user['uid'] != '') {
                    $useroutils .= '<li><a class="dropdown-item text-center text-md-start" href="user.php?op=userinfo&amp;uname=' . $temp_user['uname'] . '" target="_blank" title="' . translate("Profil") . '" ><i class="fa fa-lg fa-user align-middle fa-fw"></i><span class="ms-2 d-none d-md-inline">' . translate("Profil") . '</span></a></li>';
                }

                if ($temp_user['uid'] != 1 and $temp_user['uid'] != '') { 
                    $useroutils .= '<li><a class="dropdown-item text-center text-md-start" href="powerpack.php?op=instant_message&amp;to_userid=' . urlencode($temp_user['uname']) . '" title="' . translate("Envoyer un message interne") . '" ><i class="far fa-lg fa-envelope align-middle fa-fw"></i><span class="ms-2 d-none d-md-inline">' . translate("Message") . '</span></a></li>';
                }

                if ($temp_user['femail'] != ''){
                    $useroutils .= '<li><a class="dropdown-item  text-center text-md-start" href="mailto:' . Spam::anti_spam($temp_user['femail'], 1) . '" target="_blank" title="' . translate("Email") . '" ><i class="fa fa-at fa-lg align-middle fa-fw"></i><span class="ms-2 d-none d-md-inline">' . translate("Email") . '</span></a></li>';
                }

                if ($temp_user['uid'] != 1 and array_key_exists($ch_lat, $posterdata_extend)) {
                    if ($posterdata_extend[$ch_lat] != '') {
                        $useroutils .= '<li><a class="dropdown-item text-center text-md-start" href="modules.php?ModPath=geoloc&amp;ModStart=geoloc&op=u' . $temp_user['uid'] . '" title="' . translate("Localisation") . '" ><i class="fas fa-map-marker-alt fa-lg align-middle fa-fw">&nbsp;</i><span class="ms-2 d-none d-md-inline">' . translate("Localisation") . '</span></a></li>';
                    }
                }
            }

            if ($temp_user['url'] != '') {
                $useroutils .= '<li><a class="dropdown-item text-center text-md-start" href="' . $temp_user['url'] . '" target="_blank" title="' . translate("Visiter ce site web") . '"><i class="fas fa-external-link-alt fa-lg align-middle fa-fw"></i><span class="ms-2 d-none d-md-inline">' . translate("Visiter ce site web") . '</span></a></li>';
            }

            if ($temp_user['mns']) {
                $useroutils .= '<li><a class="dropdown-item text-center text-md-start" href="minisite.php?op=' . $temp_user['uname'] . '" target="_blank" title="' . translate("Visitez le minisite") . '" ><i class="fa fa-lg fa-desktop align-middle fa-fw"></i><span class="ms-2 d-none d-md-inline">' . translate("Visitez le minisite") . '</span></a></li>';
            }

            if (stristr($temp_user['user_avatar'], 'users_private')) {
                $imgtmp = $temp_user['user_avatar'];
            } else {
                if ($ibid = Theme::image('forum/avatar/' . $temp_user['user_avatar'])) {
                    $imgtmp = $ibid;
                } else {
                    $imgtmp = 'public/assets/images/forum/avatar/' . $temp_user['user_avatar'];
                }
            }

            $userpop = $avpop == 1 ?
                '<img class="btn-outline-primary img-thumbnail img-fluid n-ava-' . $dim . ' me-2" src="' . $imgtmp . '" alt="' . $temp_user['uname'] . '" loading="lazy" />' :
                '
                <div class="dropdown d-inline-block me-4 dropend">
                <a class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                    <img class=" btn-outline-primary img-fluid n-ava-' . $dim . ' me-0" src="' . $imgtmp . '" alt="' . $temp_user['uname'] . '" loading="lazy" />
                </a>
                <ul class="dropdown-menu bg-light">
                    <li><span class="dropdown-item-text text-center py-0 my-0">' . $this->userpopover($who, 64, 1) . '</span></li>
                    <li><h6 class="dropdown-header text-center py-0 my-0">' . $who . '</h6></li>
                    <li><hr class="dropdown-divider"></li>
                    ' . $useroutils . '
                    <li><hr class="dropdown-divider"></li>
                    <li><div class="mx-auto text-center" style="max-width:170px;">' . $my_rs . '</div>
                </ul>
                </div>';

            return $userpop;
        }
    }

}
