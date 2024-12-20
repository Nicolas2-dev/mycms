<?php

use Npds\Spam\Spam;
use Npds\Config\Config;
use Npds\Support\Debug;
use Npds\Session\Session;
use Npds\Http\HttpProtect;
use Npds\Support\Facades\Date;
use Npds\Support\Facades\Cookie;


if (stristr($_SERVER['PHP_SELF'], 'grab_globals.php') and strlen($_SERVER['QUERY_STRING']) != '') {
    include('admin/die.php');
}

if (!defined('NPDS_GRAB_GLOBALS_INCLUDED')) {
    
    // 
    define('NPDS_GRAB_GLOBALS_INCLUDED', 1);

    // 
    defined('DS') || define('DS', DIRECTORY_SEPARATOR);

    // 
    include("vendor/autoload.php");

    // 
    include(Config_path('Config.php'));

    // 
    Config::load();
    //dump(Config::all());

    // Modify the report level of PHP
    Debug::init();

    // 
    Spam::bootLog();

    // Get values, slash, filter and extract
     if (!empty($_GET)) {
         array_walk_recursive($_GET, [HttpProtect::class, 'addslashes_GPC']);
         reset($_GET); // no need
     
         array_walk_recursive($_GET, [HttpProtect::class, 'url_protect']);
         extract($_GET, EXTR_OVERWRITE);
     }
    
    //
    if (!empty($_POST)) {
        array_walk_recursive($_POST, [HttpProtect::class, 'addslashes_GPC']);

        /*
        array_walk_recursive($_POST, [HttpProtect::class, 'post_protect']);

        if(!isset($_SERVER['HTTP_REFERER'])) {
            Ecr_Log('security','Ghost form in '.$_SERVER['ORIG_PATH_INFO'].' => who playing with form ?','');
            L_spambot('',"false");
            access_denied();
        }
        else if ($_SERVER['HTTP_REFERER'] !== $nuke_url.$_SERVER['ORIG_PATH_INFO']) {
            Ecr_Log('security','Ghost form in '.$_SERVER['ORIG_PATH_INFO'].'. => '.$_SERVER["HTTP_REFERER"],'');
            L_spambot('',"false");
            access_denied();
        }
        */

        extract($_POST, EXTR_OVERWRITE);
    }

    // Cookies - analyse et purge - shiney 07-11-2010
    if (!empty($_COOKIE)) {
        extract($_COOKIE, EXTR_OVERWRITE);
    }

    // 
    if (isset($user)) {
        array_walk(explode(':', base64_decode($user)), [HttpProtect::class, 'url_protect']);
        $user = base64_encode(str_replace("%3A", ":", urlencode(base64_decode($user))));
    }

    // 
    if (isset($user_language)) {
        array_walk(explode(':', $user_language), [HttpProtect::class, 'url_protect']);
        $user_language = str_replace("%3A", ":", urlencode($user_language));
    }

    // 
    if (isset($admin)) {
        array_walk(explode(':', base64_decode($admin)), [HttpProtect::class, 'url_protect']);
        $admin = base64_encode(str_replace('%3A', ':', urlencode(base64_decode($admin))));
    }

    //Cookies - analyse et purge - shiney 07-11-2010
    if (!empty($_SERVER)) {
        extract($_SERVER, EXTR_OVERWRITE);
    }

    //
    if (!empty($_ENV)) {
        extract($_ENV, EXTR_OVERWRITE);
    }

    //
    if (!empty($_FILES)) {
        foreach ($_FILES as $key => $value) {
            $$key = $value['tmp_name'];
        }
    }

    // Multi-language
    settype($user_language, 'string');

    if (file_exists(storage_path('cache/language.php'))) {
        include(storage_path('cache/language.php'));
    } else {
        //include(module_path('manuels/list.php'));
        
        $languageslist = '';
        
        $handle = opendir(module_path('manuels'));

        while (false !== ($file = readdir($handle))) {
            if (!strstr($file, '.')) {
                $languageslist .= "$file ";
            }
        }
        
        closedir($handle);
        
        $file = fopen(storage_path('cache/language.php'), 'w');
        fwrite($file, "<?php \$languageslist=\"" . trim($languageslist) . "\"; ?>");
        
        fclose($file);

    }

    if (isset($choice_user_language)) {
        if ($choice_user_language != '') {

            if ((stristr($languageslist, $choice_user_language)) and ($choice_user_language != ' ')) {

                if ($user_cook_duration <= 0) {
                    $user_cook_duration = 1;
                }

                $timeX = time() + (3600 * $user_cook_duration);

                setcookie('user_language', $choice_user_language, $timeX);

                $user_language = $choice_user_language;
            }
        }
    }

    if ($multi_langue) {
        if (($user_language != '') and ($user_language != " ")) {
            $tmpML = stristr($languageslist, $user_language);
            $tmpML = explode(' ', $tmpML);

            if ($tmpML[0]) {
                $language = $tmpML[0];
            }
        }
    }

    //
    include("Language/$language/lang-$language.php");

    //
    include("Npds/Database/Mysqli.php");

    //
    require_once("Boot/auth.inc.php");

    //
    if (isset($user)) {
        $cookie = Cookie::cookiedecode($user);
    }
    
    //
    with(new Session())->session_manage();
    
    //
    Date::timezoneSet();

}
