<?php


// For More security
if (!stristr($_SERVER['PHP_SELF'], 'modules.php')) die();
if (strstr($ModPath, '..') || strstr($ModStart, '..') || stristr($ModPath, 'script') || stristr($ModPath, 'cookie') || stristr($ModPath, 'iframe') || stristr($ModPath, 'applet') || stristr($ModPath, 'object') || stristr($ModPath, 'meta') || stristr($ModStart, 'script') || stristr($ModStart, 'cookie') || stristr($ModStart, 'iframe') || stristr($ModStart, 'applet') || stristr($ModStart, 'object') || stristr($ModStart, 'meta'))
    die();

global $language, sql_prefix(''), $Default_Theme, $Default_Skin, $user;
include_once("modules/$ModPath/lang/$language.php");
// For More security

if (isset($user) and $user != '') {
    global $cookie;
    if ($cookie[9] != '') {
        $ibix = explode('+', urldecode($cookie[9]));
        if (array_key_exists(0, $ibix)) $theme = $ibix[0];
        else $theme = $Default_Theme;
        if (array_key_exists(1, $ibix)) $skin = $ibix[1];
        else $skin = $Default_Skin;
        $tmp_theme = $theme;
        if (!$file = @opendir("themes/$theme")) $tmp_theme = $Default_Theme;
    } else
        $tmp_theme = $Default_Theme;
} else {
    $theme = $Default_Theme;
    $skin = $Default_Skin;
    $tmp_theme = $theme;
}

$Titlesitename = "NPDS wspad";
include("storage/meta/meta.php");
echo '<link rel="shortcut icon" href="public/assets/images/favicon.ico" type="image/x-icon" />';
echo import_css($tmp_theme, $language, $skin, '', '');
echo '
    </head>
    <body style="padding: 10px; background:#ffffff;">';
$wspad = rawurldecode(decrypt($pad));
$wspad = explode("#wspad#", $wspad);
$row = sql_fetch_assoc(sql_query("SELECT content, modtime, editedby, ranq  FROM " . sql_prefix('') . "wspad WHERE page='" . $wspad[0] . "' AND member='" . $wspad[1] . "' AND ranq='" . $wspad[2] . "'"));
echo '
        <h2>' . $wspad[0] . '</h2>
        <span>[ ' . wspad_trans("révision") . ' : ' . $row['ranq'] . ' - ' . $row['editedby'] . " / " . formatTimes($row['modtime'], IntlDateFormatter::MEDIUM, IntlDateFormatter::SHORT) . ' ]</span>
        <hr />
        ' . aff_langue($row['content']) . '
    </body>
    </html>';