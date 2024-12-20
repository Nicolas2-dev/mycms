<?php


if (!function_exists('admindroits')) {
    include('die.php');
}

$f_meta_nom = 'blocks';

//==> controle droit
admindroits($aid, $f_meta_nom);
//<== controle droit

global $language;
$hlpfile = "manuels/$language/leftblocks.html";

function makelblock($title, $content, $members, $Mmember, $Lindex, $Scache, $BLaide, $SHTML, $css)
{
    if (is_array($Mmember) and ($members == 1)) {
        $members = implode(',', $Mmember);

        if ($members == 0) {
            $members = 1;
        }
    }

    if (empty($Lindex)) {
        $Lindex = 0;
    }

    $title = stripslashes(FixQuotes($title));
    $content = stripslashes(FixQuotes($content));

    if ($SHTML != 'ON') {
        $content = strip_tags(str_replace('<br />', '\n', $content));
    }

    sql_query("INSERT INTO " . sql_prefix('lblocks') . " 
               VALUES (NULL,'$title','$content','$members', '$Lindex', '$Scache', '1','$css', '$BLaide')");

    global $aid;
    Ecr_Log('security', "MakeLeftBlock(" . aff_langue($title) . ") by AID : $aid", "");

    Header("Location: admin.php?op=blocks");
}

function changelblock($id, $title, $content, $members, $Mmember, $Lindex, $Scache, $Sactif, $BLaide, $css)
{
    if (is_array($Mmember) and ($members == 1)) {
        $members = implode(',', $Mmember);

        if ($members == 0) {
            $members = 1;
        }
    }

    if (empty($Lindex)) {
        $Lindex = 0;
    }

    $title = stripslashes(FixQuotes($title));

    if ($Sactif == 'ON') {
        $Sactif = 1;
    } else {
        $Sactif = 0;
    }

    if ($css) {
        $css = 1;
    } else {
        $css = 0;
    }

    $content = stripslashes(FixQuotes($content));
    $BLaide = stripslashes(FixQuotes($BLaide));

    sql_query("UPDATE " . sql_prefix('lblocks') . " 
               SET title='$title', content='$content', member='$members', Lindex='$Lindex', cache='$Scache', actif='$Sactif', aide='$BLaide', css='$css'
               WHERE id='$id'");

    global $aid;
    Ecr_Log('security', "ChangeLeftBlock(" . aff_langue($title) . " - $id) by AID : $aid", '');

    Header("Location: admin.php?op=blocks");
}

function changedroitelblock($id, $title, $content, $members, $Mmember, $Lindex, $Scache, $Sactif, $BLaide, $css)
{
    if (is_array($Mmember) and ($members == 1)) {
        $members = implode(',', $Mmember);

        if ($members == 0) {
            $members = 1;
        }
    }

    if (empty($Lindex)) {
        $Lindex = 0;
    }

    $title = stripslashes(FixQuotes($title));

    if ($Sactif == 'ON') {
        $Sactif = 1;
    } else {
        $Sactif = 0;
    }

    if ($css) {
        $css = 1;
    } else {
        $css = 0;
    }

    $content = stripslashes(FixQuotes($content));
    $BLaide = stripslashes(FixQuotes($BLaide));

    sql_query("INSERT INTO " . sql_prefix('rblocks') . " 
               VALUES (NULL,'$title','$content', '$members', '$Lindex', '$Scache', '$Sactif', '$css', '$BLaide')");

    sql_query("DELETE FROM " . sql_prefix('lblocks') . " 
               WHERE id='$id'");

    global $aid;
    Ecr_Log('security', "MoveLeftBlockToRight(" . aff_langue($title) . " - $id) by AID : $aid", '');

    Header("Location: admin.php?op=blocks");
}

function deletelblock($id)
{
    sql_query("DELETE FROM " . sql_prefix('lblocks') . " 
               WHERE id='$id'");

    global $aid;
    Ecr_Log('security', "DeleteLeftBlock($id) by AID : $aid", '');

    Header("Location: admin.php?op=blocks");
}

settype($css, 'integer');

$Mmember = isset($Mmember) ? $Mmember : '';

settype($Sactif, 'string');
settype($SHTML, 'string');

switch ($op) {
    case 'makelblock':
        makelblock($title, $xtext, $members, $Mmember, $index, $Scache, $Baide, $SHTML, $css);
        break;

    case 'deletelblock':
        deletelblock($id);
        break;

    case 'changelblock':
        changelblock($id, $title, $content, $members, $Mmember, $Lindex, $Scache, $Sactif, $BLaide, $css);
        break;

    case 'droitelblock':
        changedroitelblock($id, $title, $content, $members, $Mmember, $Lindex, $Scache, $Sactif, $BLaide, $css);
        break;
}
