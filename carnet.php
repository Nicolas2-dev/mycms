<?php

declare(strict_types=1);

use Npds\Support\Facades\Css;
use Npds\Support\Facades\Crypt;
use Npds\Support\Facades\Theme;


if (!function_exists("Mysql_Connexion")) {
    include("Boot/grab_globals.php");
}

/**
 * [L_encrypt description]
 *
 * @param   string  $txt  [$txt description]
 *
 * @return  string
 */
function L_encrypt(string $txt)
{
    global $userdata;

    $key = substr($userdata[2], 8, 8);

    return Crypt::encryptK($txt, $key);
}


global $user;

if (!$user) {
    Header('Location:' site_url('user.php'));
} else {
    $userX = base64_decode($user);
    $userdata = explode(':', $userX);

    $Default_Theme = Theme::defaultTheme();

    if ($userdata[9] != '') {
        if (!$file = @opendir(theme_path($userdata[9]))) {
            $tmp_theme = $Default_Theme;
        } else {
            $tmp_theme = $userdata[9];
        }
    } else {
        $tmp_theme = $Default_Theme;
    }

    include(theme_path($tmp_theme . '/theme.php'));

    $Titlesitename = translate("Carnet d'adresses");

    include(storage_path('/meta/meta.php'));

    echo '<link id="bsth" rel="stylesheet" href="' . site_url('Themes/_skins/default/bootstrap.min.css') . '" />';

    echo Css::import_css($tmp_theme, $language, "");

    include(asset_path('formhelp.java.php'));

    $fic = storage_path('users_private/' . $userdata[1] . '/mns/carnet.txt');

    echo '
    </head>
    <body class="p-4">';

    if (file_exists($fic)) {
        $fp = fopen($fic, "r");

        if (filesize($fic) > 0) {
            $contents = fread($fp, filesize($fic));
        }

        fclose($fp);

        if (substr($contents, 0, 5) != "CRYPT") {
            $fp = fopen($fic, "w");

            fwrite($fp, "CRYPT" . L_encrypt($contents));
            fclose($fp);
        } else {
            $contents = Crypt::decryptK(substr($contents, 5), substr($userdata[2], 8, 8));
        }

        echo '<div class="row">';

        $contents = explode("\n", $contents);

        foreach ($contents as $tab) {
            $tabi = explode(';', $tab);

            if ($tabi[0] != '') {
                echo '
                <div class="border col-md-4 mb-1 p-3">
                    <a href="javascript: DoAdd(1,\'to_user\',\'' . $tabi[0] . ',\')";><b>' . $tabi[0] . '</b></a><br />
                    <a href="mailto:' . $tabi['1'] . '" >' . $tabi['1'] . '</a><br />
                    ' . $tabi['2'] . '
                </div>';
            }
        }

        echo '</div>';
    } else {
        echo '
            <div class="alert alert-secondary text-break">
                <span>' . translate("Vous pouvez charger un fichier carnet.txt dans votre miniSite") . '.</span><br />
                <span>' . translate("La structure de chaque ligne de ce fichier : nom_du_membre; adresse Email; commentaires") . '</span>
            </div>';
    }

    echo '
    </body>
    </html>';
}
