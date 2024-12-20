<?php

declare(strict_types=1);

namespace Npds\Edito;

use Npds\Date\Date;
use Npds\Theme\Theme;
use Npds\Language\Language;
use Npds\Metalang\Metalang;


/**
 * Undocumented class
 */
class Edito 
{

    /**
     * Instance Edito.
     *
     * @var \Npds\Edito $instance
     */
    protected static Edito $instance;

    /**
     * Instance Language.
     *
     * @var  Npds\Language\Language $instance
     */
    protected Language $language;

    /**
     * Instance Metalang.
     *
     * @var  Npds\Metalang\Metalang $instance
     */
    protected Metalang $metalang;

    /**
     * Instance Date.
     *
     * @var  Npds\Data\Date $instance
     */
    protected Date $date;

    /**
     * Instance Theme.
     *
     * @var  Npds\Theme\Theme $instance
     */
    protected Theme $theme;


    /**
     * Constructeur.
     */
    public function __construct()
    {
        $this->language = Language::getInstance();

        $this->metalang = Metalang::getInstance();

        $this->date = Date::getInstance();

        $this->theme = Theme::getInstance();
    }

    /**
     * Get instance class Edito.
     *
     * @return \Npds\Edito $instance
     */
    public static function getInstance()
    {
        if (isset(static::$instance)) {
            return static::$instance;
        }

        return static::$instance = new static();
    }

    /**
     * [aff_edito description]
     *
     * @return  void
     */
    public function aff_edito()
    {
        list($affich, $Xcontents) = $this->fab_edito();
    
        if (($affich) and ($Xcontents != '')) {
            $notitle = false;
    
            if (strstr($Xcontents, '!edito-notitle!')) {
                $notitle = 'notitle';
                $Xcontents = str_replace('!edito-notitle!', '', $Xcontents);
            }
    
            $ret = false;
    
            //if (function_exists("themedito")) {
            if (method_exists(Theme::class, 'themedito')) {
                $ret = $this->theme->themedito($Xcontents);
            } else {
                //if (function_exists("theme_centre_box")) {
                if (function_exists(Theme::class, 'theme_centre_box')) {
                    $title = (!$notitle) ? translate("EDITO") : '';

                    $this->theme->theme_centre_box($title, $Xcontents);
                    
                    $ret = true;
                }
            }
    
            if ($ret == false) {
                if (!$notitle) {
                    echo '<span class="edito">' . translate("EDITO") . '</span>';
                }
    
                echo $Xcontents;
                echo '<br />';
            }
        }
    }
 
    /**
     * Construit l'edito
     *
     * @return  array
     */
    public function fab_edito()
    {
        global $cookie;

        if (isset($cookie[3])) {
            if (file_exists(storage_path('static/edito_membres.txt'))) {
                $fp = fopen(storage_path('static/edito_membres.txt'), "r");

                if (filesize(storage_path('static/edito_membres.txt')) > 0) {
                    $Xcontents = fread($fp, filesize(storage_path('static/edito_membres.txt')));
                }

                fclose($fp);
            } else {
                if (file_exists(storage_path('static/edito.txt'))) {
                    $fp = fopen(storage_path('static/edito.txt'), "r");

                    if (filesize(storage_path('static/edito.txt')) > 0) {
                        $Xcontents = fread($fp, filesize(storage_path('static/edito.txt')));
                    }

                    fclose($fp);
                }
            }
        } else {
            if (file_exists(storage_path('static/edito.txt'))) {
                $fp = fopen(storage_path('static/edito.txt'), "r");

                if (filesize(storage_path('static/edito.txt')) > 0) { 
                    $Xcontents = fread($fp, filesize(storage_path('static/edito.txt')));
                }

                fclose($fp);
            }
        }

        $affich = false;
        $Xibid = strstr($Xcontents, 'aff_jours');

        if ($Xibid) {
            parse_str($Xibid, $Xibidout);

            if (($Xibidout['aff_date'] + ($Xibidout['aff_jours'] * 86400)) - time() > 0) {
                $affichJ = false;
                $affichN = false;

                if (($this->date->NightDay() == 'Jour') and ($Xibidout['aff_jour'] == 'checked')) {
                    $affichJ = true;
                }

                if (($this->date->NightDay() == 'Nuit') and ($Xibidout['aff_nuit'] == 'checked')) {
                    $affichN = true;
                }
            }

            $XcontentsT = substr($Xcontents, 0, strpos($Xcontents, 'aff_jours'));

            $contentJ = substr($XcontentsT, strpos($XcontentsT, "[jour]") + 6, strpos($XcontentsT, "[/jour]") - 6);
            $contentN = substr($XcontentsT, strpos($XcontentsT, "[nuit]") + 6, strpos($XcontentsT, "[/nuit]") - 19 - strlen($contentJ));
            
            $Xcontents = '';

            if (isset($affichJ) and $affichJ === true) {
                $Xcontents = $contentJ;
            }

            if (isset($affichN) and $affichN === true) {
                $Xcontents = $contentN != '' ? $contentN : $contentJ;
            }

            if ($Xcontents != '') {
                $affich = true;
            }
        } else {
            $affich = true;
        }

        $Xcontents = $this->metalang->meta_lang($this->language->aff_langue($Xcontents));

        return array($affich, $Xcontents);
    }

}
