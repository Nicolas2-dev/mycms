<?php

declare(strict_types=1);

use Npds\Log\Log;
use Npds\Auth\Auth;
use Npds\Code\Code;
use Npds\Date\Date;
use Npds\News\News;
use Npds\Stat\Stat;
use Npds\User\User;
use Npds\Block\Block;
use Npds\Cache\Cache;
use Npds\Edito\Edito;
use Npds\Theme\Theme;
use Npds\Config\Config;
use Npds\Online\Online;
use Npds\Security\Hack;
use Npds\Editeur\Editeur;
use Npds\Download\Download;
use Npds\Language\Language;
use Npds\Metalang\Metalang;
use Npds\Pollbooth\Pollbooth;
use Npds\Support\Facades\Request;


/**
 * 
 */
if (! function_exists('controllerStart')) {
    /**
     * [controllerSart description]
     *
     * @param   string  $controller  [$controller description]
     * @param   string  $method      [$method description]
     * @param   array   $parameters  [$parameters description]
     *
     * @return  
     */
    function controllerStart(string $controller, string $method, array $parameters = [])
    {
        if (! method_exists($instance = new $controller(), $method)) {
            throw new LogicException("Controller [$controller] has no method [$method].");
        }

        $instance->callAction($method, $parameters, $parameters);
    }
}

/**
 * 
 */
if (! function_exists('site_url')) {
    /**
     * Retourne l'url du site.
     *
     * @param ?string $path
     * 
     * @return string
     */
    function site_url(?string $path = '')
    {
        return  Config::get('npds.nuke_url') . '/' . ltrim($path, '/');
    }
}

/**
 * 
 */
if (! function_exists('asset_url')) {
    /**
     * Retourne l'url des assetsdu site.
     *
     * @param string $path
     * @return string
     */
    function asset_url(string $path)
    {
        return site_url('/public/assets/' . $path);
    }
}

/**
 * 
 */
if (! function_exists('base_path')) {
    /**
     * Retourne le chemin racine de l'application.
     * 
     * @param  string  $path
     * @return string
     */
    function base_path(string $path)
    {
        $path = str_replace(['/', '\\'], DS, rtrim($path, '/\\'));

        return dirname(dirname(__DIR__)) . DS . $path;
    }
}

/**
 * 
 */
if (! function_exists('config_path')) {
    /**
     * Retourne le chemin des fichier de configuration de l'application.
     *
     * @param  string  $path
     * @return string
     */
    function config_path(string $path)
    {
        return base_path('Config/' . $path);
    }
}

/**
 * 
 */
if (! function_exists('module_path')) {
    /**
     * Retourne le chemin des modules de l'application.
     *
     * @param  string  $path
     * @return string
     */
    function module_path(string $path)
    {
        return base_path('Modules/' . $path);
    }
}

/**
 * 
 */
if (! function_exists('theme_path')) {
    /**
     * Retourne le chemin des themes de l'application.
     *
     * @param  string  $path
     * @return string
     */
    function theme_path(string $path)
    {
        return base_path('Themes/' . $path);
    }
}

/**
 * 
 */
if (! function_exists('storage_path')) {
    /**
     * Retourne le chemin du storage de l'application.
     *
     * @param  string  $path
     * @return string
     */
    function storage_path(string $path)
    {
        return base_path('storage/' . $path);
    }
}

/**
 * 
 */
if (! function_exists('asset_path')) {
    /**
     * Retourne le chemin des assets de l'application.
     *
     * @param  string  $path
     * @return string
     */
    function asset_path(string $path)
    {
        return base_path('public/assets/' . $path);
    }
}

/**
 * 
 */
if (! function_exists('help_path')) {
    /**
     * [help_path description]
     *
     * @param   string  $hlpfile  Fichier d'aide en ligne.
     *
     * @return  string
     */
    function help_path(string $hlpfile): string
    {
        global $language;

        return base_path('manuels/' . $language . '/' . $hlpfile . '.html');
    }
}

/**
 * 
 */
if (! function_exists('with')) {
    /**
     * Renvoie l'objet donné. Utile pour enchaîner une methode.
     *
     * @param  object  $object
     * @return object
     */
    function with(object $object)
    {
        return $object;
    }
}

// npds base 


#autodoc get_os() : retourne true si l'OS de la station cliente est Windows sinon false
function get_os()
{
    $client = getenv("HTTP_USER_AGENT");

    if (preg_match('#(\(|; )(Win)#', $client, $regs)) {
        if ($regs[2] == "Win") {
            $MSos = true;
        } else {
            $MSos = false;
        }
    } else {
        $MSos = false;
    }

    return $MSos;
}

#autodoc send_file($line,$filename,$extension,$MSos) : compresse et t&eacute;l&eacute;charge un fichier / $line : le flux, $filename et $extension le fichier, $MSos (voir fonction get_os)
function send_file($line, $filename, $extension, $MSos)
{
    $compressed = false;

    if (file_exists("Npds/archive.php")) {
        if (function_exists("gzcompress")) {
            $compressed = true;
        }
    }

    if ($compressed) {
        if ($MSos) {
            $arc = new zipfile();
            $filez = $filename . ".zip";
        } else {
            $arc = new gzfile();
            $filez = $filename . ".gz";
        }

        $arc->addfile($line, $filename . "." . $extension, "");
        $arc->arc_getdata();
        $arc->filedownload($filez);
    } else {
        if ($MSos) {
            header("Content-Type: application/octetstream");
        } else {
            header("Content-Type: application/octet-stream");
        }

        header("Content-Disposition: attachment; filename=\"$filename." . "$extension\"");
        header("Pragma: no-cache");
        header("Expires: 0");
        echo $line;
    }
}

#autodoc send_tofile($line,$repertoire,$filename,$extension,$MSos) : compresse et enregistre un fichier / $line : le flux, $repertoire $filename et $extension le fichier, $MSos (voir fonction get_os)
function send_tofile($line, $repertoire, $filename, $extension, $MSos)
{
    $compressed = false;

    if (file_exists("Npds/archive.php")) {
        if (function_exists("gzcompress")) {
            $compressed = true;
        }
    }

    if ($compressed) {
        if ($MSos) {
            $arc = new zipfile();
            $filez = $filename . ".zip";
        } else {
            $arc = new gzfile();
            $filez = $filename . ".gz";
        }

        $arc->addfile($line, $filename . "." . $extension, "");
        $arc->arc_getdata();

        if (file_exists($repertoire . "/" . $filez)) {
            unlink($repertoire . "/" . $filez);
        }

        $arc->filewrite($repertoire . "/" . $filez, $perms = null);
    } else {
        if ($MSos) {
            header("Content-Type: application/octetstream");
        } else {
            header("Content-Type: application/octet-stream");
        }

        header("Content-Disposition: attachment; filename=\"$filename." . "$extension\"");
        header("Pragma: no-cache");
        header("Expires: 0");

        echo $line;
    }
}

#autodoc JavaPopUp($F,$T,$W,$H) : Personnalise une ouverture de fenêtre (popup)
function JavaPopUp($F, $T, $W, $H)
{
    // 01.feb.2002 by GaWax
    if ($T == "") {
        $T = "@ " . time() . " ";
    }

    return "'$F','$T','menubar=no,location=no,directories=no,status=no,copyhistory=no,height=$H,width=$W,toolbar=no,scrollbars=yes,resizable=yes'";
}

function getip()
{
    return Request::getip();
}

function make_tab_langue()
{
    return Language::getInstance()->make_tab_langue();
}


function charg_metalang()
{
    return Metalang::getInstance()->charg_metalang();
}

function NightDay()
{
    return with(new Date())->NightDay();
}

function formatTimes(string  $time, int $dateStyle = IntlDateFormatter::SHORT, int $timeStyle = IntlDateFormatter::NONE, string $timezone = 'Europe/Paris'
) {
    return with(new Date())->formatTimes($time, $dateStyle, $timeStyle, $timezone);
}

function getPartOfTime(string $time, string $format, string $timezone = 'Europe/Paris'
) {
    return with(new Date())->getPartOfTime($time, $format, $timezone);
}

function language_iso(mixed $l,string $s,mixed $c
) {
    return with(new Language())->language_iso($l, $s, $c);
}

function aff_langue($ibid)
{
    return with(new Language())->aff_langue($ibid);
}

function get_userdata($username)
{
    return with(new User())->get_userdata($username);
}

function AutoReg()
{
    return with(new User())->AutoReg();
}

function autorisation(int|string $auto)
{
    return with(new Auth())->autorisation($auto);
}

function meta_lang($Xcontent)
{
    return with(new Metalang())->meta_lang($Xcontent);
}

function Who_Online_Sub()
{
    return with(new Online())->Who_Online_Sub();
}

function Who_Online()
{
    return with(new Online())->Who_Online();
}

function leftblocks($moreclass)
{
    return with(new Block())->leftblocks($moreclass);
}

function rightblocks($moreclass)
{
    return with(new Block())->rightblocks($moreclass);
}

function req_stat()
{
    return with(new Stat())->req_stat();
}

function removeHack($Xstring)
{
    return with(new Hack())->remove($Xstring);
}

function automatednews()
{
    return with(new News())->automatednews();
}

function aff_news($op, $catid, $marqeur)
{
    return with(new News())->aff_news($op, $catid, $marqeur);
}

function aff_edito()
{
    return with(new Edito())->aff_edito();
}

function aff_code($ibid)
{
    return with(new Code())->aff_code($ibid);
}

function theme_image(string $image)
{
    return with(new Theme())->theme_image($image);
}

function aff_editeur($Xzone, $Xactiv)
{
    return with(new Editeur())->aff_editeur($Xzone, $Xactiv);
}

function Ecr_Log($fic_log, $req_log, $mot_log)
{
    return with(new Log())->Ecr_Log($fic_log, $req_log, $mot_log);
}

function PollNewest(int $id = 0)
{
    return with(new Pollbooth())->PollNewest($id);
}

function topdownload_data($form, $ordre)
{
    return with(new Download())->topdownload_data($form, $ordre);
}

// Cette fonction doit être utilisée pour filtrer les arguments des requêtes SQL et est
// automatiquement appelée par META-LANG lors de passage de paramètres
function arg_filter($arg)
{
    return removeHack(stripslashes(htmlspecialchars(urldecode($arg), ENT_QUOTES, 'UTF-8')));
}

function Q_Select(string $Xquery, int $retention = 3600)
{
    return with(new Cache())->Q_Select($Xquery, $retention = 3600);
}

function SC_infos()
{
    return with(new Cache())->SC_infos();
}
