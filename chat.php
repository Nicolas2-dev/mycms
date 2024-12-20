<?php

declare(strict_types=1);

use Npds\Page\PageRef;
use Npds\Config\Config;
use Npds\Http\Controller;

use Npds\Support\Sanitize;
use Npds\Support\Facades\Css;
use Npds\Support\Facades\Auth;
use Npds\Support\Facades\Chat;
use Npds\Support\Facades\Date;
use Npds\Support\Facades\User;
use Npds\Support\Facades\Crypt;
use Npds\Support\Facades\Request;
use Npds\Support\Facades\Smilies;


if (!function_exists("Mysql_Connexion")) {
    include("Boot/grab_globals.php");
}

/**
 * Pour le lancement du Chat : 
 *      chat.php?id=gp_id&auto=token_de_securite
 * 
 * gp_id = ID du groupe au sens NPDS du terme :
 * 
 * 0            : tous
 * -127         : Admin
 * -1           : Anonyme
 * 1            : membre
 * 2 ... 126    : groupe de membre
 */
class ChatController extends Controller
{

    use Rafraich, Input, Top, Set;

    /**
     * [chat description]
     *
     * @param   int     $id    [$id description]
     * @param   string  $auto  [$auto description]
     *
     * @return  [type]         [return description]
     */
    public function chat(?int $id, ?string $auto)
    {
        $Titlesitename  = 'NPDS';
        $meta_op        = '';
        $meta_doctype   = '<!DOCTYPE html>';

        include(storage_path('meta/meta.php'));

        echo '
            <link rel="shortcut icon" href="' . asset_url('images/favicon.ico') . '" type="image/x-icon" />
            </head>  
                <div style="height:1vh;" class="">
                    <iframe src="' . site_url('chat.php?op=chatrafraich&amp;repere=0&amp;aff_entetes=1&amp;connectes=-1&amp;id=' . $id . '&amp;auto=' . $auto) . '" frameborder="0" scrolling="no" noresize="noresize" name="rafraich" width="100%" height="100%"></iframe>
                </div>
                <div style="height:58vh;" class="">
                    <iframe src="' . site_url('chat.php?op=chattop') . '" frameborder="0" scrolling="yes" noresize="noresize" name="haut" width="100%" height="100%"></iframe>
                </div>
                <div style="height:39vh;" class="">
                    <iframe src="' . site_url('chat.php?op=chatinput&amp;id=' . $id . '&amp;auto=' . $auto) . '" frameborder="0" scrolling="yes" noresize="noresize" name="bas" width="100%" height="100%"></iframe>
                </div>
        </html>';
    }

}

/**
 * [Rafraich description]
 */
trait Rafraich
{

    /**
     * [chatRafraich description]
     *
     * @param   int     $repere       [$repere description]
     * @param   int     $aff_entetes  [$aff_entetes description]
     * @param   int     $connectes    [$connectes description]
     * @param   int     $id           [$id description]
     * @param   string  $auto         [$auto description]
     *
     * @return  [type]                [return description]
     */
    protected function chatRafraich(int $repere, int $aff_entetes, int $connectes, int $id, string $auto)
    {
        global $user, $language;

        // chatbox avec salon privatif - on utilise id pour filtrer les messages -> id = l'id du groupe au sens autorisation de NPDS (-127,-1,0,1,2...126)
        if ($id === '' || unserialize(Crypt::decrypt($auto)) != $id) {
            die();
        }

        // Savoir si le 'connecté' a le droit à ce chat ?
        if (!Auth::autorisation($id)) {
            die();
        }

        $page_ref = with(new PageRef())->initialize();

        if (isset($user) and $user != '') {

            global $cookie;
            if ($cookie[9] != '') {
                $ibix = explode('+', urldecode($cookie[9]));

                if (array_key_exists(0, $ibix)) {
                    $theme = $ibix[0];
                } else {
                    $theme = Config::get('npds.Default_Theme');
                }

                if (array_key_exists(1, $ibix)) {
                    $skin = $ibix[1];
                } else {
                    $skin = Config::get('npds.Default_Skin');
                }

                $tmp_theme = $theme;

                if (!$file = @opendir(theme_path($theme))) {
                    $tmp_theme = Config::get('npds.Default_Theme');
                }
            } else {
                $tmp_theme = Config::get('npds.Default_Theme');
            }
        } else {
            $theme = Config::get('npds.Default_Theme');
            $skin = Config::get('npds.Default_Skin');
            $tmp_theme = $theme;
        }

        $result = sql_query("SELECT username, message, dbname, date 
                            FROM " . sql_prefix('chatbox') . " 
                            WHERE id='$id' 
                            AND date>'$repere' 
                            ORDER BY date ASC");

        $thing = '';

        if ($result) {
            include(theme_path('themes-dynamic/theme.php'));

            while (list($username, $message, $dbname, $date_message) = sql_fetch_row($result)) {

                $thing .= '<div class="chatmessage">
                    <div class="chatheure">
                        ' . Date::getPartOfTime($date_message, 'H:mm d MMM') . '
                    </div>';

                if ($dbname == 1) {
                    if ((!$user) and ($member_list == 1) and (!$admin)) {
                        $thing .= '<div class="chatnom">' . $username . '</div>';
                    } else {
                        $thing .= '<div class="chatnom">
                            <div class="float-start">
                                ' . str_replace('"', '\"', User::userpopover($username, 36, 1)) . '
                            </div> 
                            <a href="' . site_url('user.php?op=userinfo&amp;uname=' . $username) . '" target="_blank">
                                ' . $username . '
                            </a>
                        </div>';
                    }
                } else {
                    $thing .= '<div class="chatnom">' . $username . '</div>';
                }

                $message = Smilies::smilie($message);

                $chat_forbidden_words = array(
                    "'\"'i" => '&quot;',
                    "'OxOA'i" => '',
                    "'OxOD'i" => '',
                    "'\n'i" => '',
                    "'\r'i" => '',
                    "'\t'i" => ''
                );

                $message = preg_replace(array_keys($chat_forbidden_words), array_values($chat_forbidden_words), $message);

                $message = str_replace('"', '\"', Sanitize::make_clickable($message));
                $thing .= '<div class="chattexte">' . removeHack($message) . '</div></div>';
                $repere = $date_message;
            }

            $thing = "\"" . $thing . "\"";
        }

        if ($aff_entetes == '1') {
            $meta_op = true;

            settype($Xthing, 'string');

            include(storage_path('meta/meta.php'));

            $Xthing .= $l_meta;
            $Xthing .= str_replace("\n", "", Css::import_css_javascript($tmp_theme, $language, $skin));
            $Xthing .= str_replace("\n", "", $page_ref->cssImport($tmp_theme, false));
            $Xthing .= "</head><body id='chat'>";
            $Xthing = "\"" . str_replace("'", "\'", $Xthing) . "\"";
        }

        $result = sql_query("SELECT DISTINCT ip 
                            FROM " . sql_prefix('chatbox') . " 
                            WHERE id='$id' 
                            AND date >= " . (time() - (60 * 2)) . "");
                            
        $numofchatters = sql_num_rows($result);

        $rafraich_connectes = 0;

        if (intval($connectes) != $numofchatters) {
            $rafraich_connectes = 1;

            if (($numofchatters == 1) or ($numofchatters == 0)) {
                $nbre_connectes = "'" . $numofchatters . " " . Sanitize::utf8_java(html_entity_decode(translate("personne connectée."), ENT_QUOTES | ENT_HTML401, 'UTF-8')) . " GP [$id]'";
            } else {
                $nbre_connectes = "'" . $numofchatters . " " . Sanitize::utf8_java(html_entity_decode(translate("personnes connectées."), ENT_QUOTES | ENT_HTML401, 'UTF-8')) . " GP [$id]'";
            }
        }

        $commande = "self.location='" . site_url('chat.php?op=chatrafraich&repere=' . $repere . '&aff_entetes=0&connectes=' . $numofchatters . '&id=' . $id . '&auto=' . $auto) ."'";

        include(storage_path('meta/meta.php'));

        echo "</head>\n<body id='chat'>
            <script type='text/javascript'>
                //<![CDATA[
                    function scroll_messages() {
                        if (typeof(scrollBy) != 'undefined') {
                            parent.frames[1].scrollBy(0, 20000);
                            parent.frames[1].scrollBy(0, 20000);
                        }
                        else if (typeof(scroll) != 'undefined') {
                            parent.frames[1].scroll(0, 20000);
                            parent.frames[1].scroll(0, 20000);
                        }
                    }

                    function rafraichir() {
                        $commande;
                    }

                    function sur_chargement() {
                        setTimeout(\"rafraichir();\", 5000);";

        if ($aff_entetes == "1") {
            echo "      parent.frames[1].document.write($Xthing);";
        }

        if ($thing != "\"\"") {
            echo "      parent.frames[1].document.write($thing);
                        setTimeout(\"scroll_messages();\", 300);";
        }

        if ($rafraich_connectes == 1) {
            echo "      top.document.title=$nbre_connectes;";
        }

        echo "      }
                    window.onload=sur_chargement();
                //]]>
            </script>
        </body>
        </html>";
    }    
}

/**
 * [Input description]
 */
trait Input 
{

    /**
     * [chatInput description]
     *
     * @param   int     $id    [$id description]
     * @param   string  $auto  [$auto description]
     *
     * @return  [type]         [return description]
     */
    protected function chatInput(int $id, string $auto)
    {
        global $user, $language, $cookie;

        // chatbox avec salon privatif - on utilise id pour filtrer les messages -> id = l'id du groupe au sens autorisation de NPDS (-127,-1,0,1,2...126))
        if ($id === '' || unserialize(Crypt::decrypt($auto)) != $id) {
            die();
        }

        // Savoir si le 'connecté' a le droit à ce chat ?
        // le problème c'est que tous les groupes qui existent on le droit au chat ... donc il faut trouver une solution pour pouvoir l'interdire
        // soit on vient d'un bloc qui par définition autorise en fabricant l'interface
        // soit on viens de WS et là ....

        if (!Auth::autorisation($id)) {
            die();
        }

        $page_ref = with(new PageRef())->initialize();

        if (isset($user) and $user != '') {

            if ($cookie[9] != '') {
                $ibix = explode('+', urldecode($cookie[9]));

                if (array_key_exists(0, $ibix)) {
                    $theme = $ibix[0];
                } else {
                    $theme = Config::get('npds.Default_Theme');
                }

                if (array_key_exists(1, $ibix)) {
                    $skin = $ibix[1];
                } else {
                    $skin = Config::get('npds.Default_Skin');
                }

                $tmp_theme = $theme;

                if (!$file = @opendir(theme_path($theme))) {
                    $tmp_theme = Config::get('npds.Default_Theme');
                }
            } else {
                $tmp_theme = Config::get('npds.Default_Theme');
            }
        } else {
            $theme = Config::get('npds.Default_Theme');
            $skin = Config::get('npds.Default_Skin');
            $tmp_theme = $theme;
        }

        $skin = $skin == '' ? 'default' : $skin;

        $Titlesitename = 'NPDS';

        include(storage_path('meta/meta.php'));

        echo Css::import_css($tmp_theme, $language, $skin);

        echo $page_ref->importCssAndJs($tmp_theme);

        include(asset_path('formhelp.java.php'));

        echo '</head>';

        // cookie chat_info (1 par groupe)
        echo '<script type="text/javascript" src="' . asset_url('js/cookies.js')  . '"></script>';
        echo "<body id=\"chat\" onload=\"setCookie('chat_info_$id', '1', '');\" onUnload=\"deleteCookie('chat_info_$id');\">";

        echo '<script type="text/javascript" src="' . asset_url('js/jquery.min.js')  . '"></script>
                <script type="text/javascript" src="' . asset_url('shared/bootstrap/dist/js/bootstrap.bundle.min.js')  . '"></script>
                <link rel="stylesheet" href="' . asset_url('shared/font-awesome/css/all.min.css')  . '">
                
                <form name="coolsus" action="' . site_url('chat.php') . '" method="post">
                <input type="hidden" name="op" value="set" />
                <input type="hidden" name="id" value="' . $id . '" />
                <input type="hidden" name="auto" value="' . $auto . '" />';

        if (!isset($cookie[1])) {
            $pseudo = isset($name) ? $name : Request::getip();
        } else {
            $pseudo = $cookie[1];
        }

        $xJava = 'name="message" onselect="storeCaret(this);" onclick="storeCaret(this);" onkeyup="storeCaret(this);" onfocus="storeForm(this)"';

        echo translate("Vous êtes connecté en tant que :") . ' <strong>' . $pseudo . '</strong>&nbsp;';

        echo '
            <input type="hidden" name="name" value="' . $pseudo . '" />
            <textarea id="chatarea" class="form-control my-3" type="text" rows="2" ' . $xJava . ' placeholder="🖋"></textarea>
            <div class="float-end">';

        Smilies::putitems("chatarea");

        echo '
                    </div>
                    <input class="btn btn-primary btn-sm" type="submit" tabindex="1" value="' . translate("Valider") . '" />
                    </form>
                    <script src="' . asset_url('js/npds_adapt.js') . '"></script>
                    <script type="text/javascript">
                        //<![CDATA[
                            document.coolsus.message.focus();
                        //]]>
                </script>
            </body>
        </html>';
    }

}

/**
 * [Top description]
 */
trait Top 
{

    /**
     * [chatTop description]
     *
     * @return  [type]  [return description]
     */
    protected function chatTop()
    {
        $Titlesitename  = 'NPDS';
        $nuke_url       = '';
        $meta_op        = '';

        include(storage_path('meta/meta.php'));

        echo '
            </head>
            <body>
            </body>
        </html>';
    }

}

/**
 * [Set description]
 */
trait Set 
{

    /**
     * [update description]
     *
     * @param   int     $id       [$id description]
     * @param   string  $auto     [$auto description]
     * @param   string  $name     [$name description]
     * @param   string  $message  [$message description]
     *
     * @return  [type]            [return description]
     */
    protected function chatUpdate(int $id, string $auto, string $name, string $message)
    {
        global $cookie;

        $this->chatInput($id, $auto);

        if (!isset($cookie[1]) && isset($name)) {
                $uname  = $name;
                $dbname = 0;
        } else {
                $uname  = $cookie[1];
                $dbname = 1;
        }

        Chat::insertChat($uname, $message, $dbname, $id);        
    }

}


switch (Request::input('op')) 
{

    case 'chattop':
        controllerStart(ChatController::class, 'chatTop');
        break;

    case 'chatrafraich':
        controllerStart(ChatController::class, 'chatRafraich',
            [
                // int
                Request::query('repere'),
                // int
                Request::query('aff_entetes'),
                // int
                Request::query('connectes'),
                // int
                Request::query('id'),
                // string
                Request::query('auto'),
            ]
        );
        break;

    case 'chatinput':
        controllerStart(ChatController::class, 'chatInput',
            [
                // int
                Request::query('id'),
                // string
                Request::query('auto'),
            ]
        );
        break;

    case 'set':
        controllerStart(ChatController::class, 'chatUpdate',
            [
                // int
                Request::input('id'),
                // string
                Request::input('auto'),
                // string
                Request::input('name'),
                // string
                Request::input('message')  
            ]
        );
        break;

    default:
        controllerStart(ChatController::class, 'chat',
            [
                // ?int nullable
                Request::query('id'),
                // ?sring nullable
                Request::query('auto'),
            ]
        );
        break;

}
