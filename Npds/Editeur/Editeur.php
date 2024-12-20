<?php

declare(strict_types=1);

namespace Npds\Editeur;

use Npds\Assets\Assets;
use Npds\Language\Language;


/**
 * Undocumented class
 */
class Editeur 
{

    /**
     * Instance Editeur.
     *
     * @var \Npds\Editeur $instance
     */
    protected static Editeur $instance;

    /**
     * Instance Language.
     *
     * @var  Npds\Language\Language $instance
     */
    protected Language $language;

    /**
     * Instance Assets.
     *
     * @var  Npds\Assets\assets
     */
    protected Assets $asset;

    
    /**
     * Constructeur.
     */
    public function __construct()
    {
        $this->language = Language::getInstance();

        $this->asset = Assets::getInstance();
    }

    /**
     * Get instance class Editeur.
     *
     * @return \Npds\Editeur\Editeur $instance
     */
    public static function getInstance()
    {
        if (isset(static::$instance)) {
            return static::$instance;
        }

        return static::$instance = new static();
    }

    /**
     * Charge l'éditeur ... ou non : $Xzone = nom du textarea.
     * 
     * si $Xzone="custom" on utilise $Xactiv pour passer des paramètres spécifiques.
     * 
     * @param   string  $Xzone   Zone de l'editeur.
     * @param   string  $Xactiv  $Xactiv = deprecated
     *
     * @return  string
     */
    public function aff_editeur(string $Xzone, string $Xactiv)
    {
        global $language, $tmp_theme, $tiny_mce, $tiny_mce_theme, $tiny_mce_relurl;

        $tmp = '';

        if ($tiny_mce) {
            static $tmp_Xzone;

            if ($Xzone == 'tiny_mce') {
                if ($Xactiv == 'end') {
                    if (substr((string) $tmp_Xzone, -1) == ',') {
                        $tmp_Xzone = substr_replace((string) $tmp_Xzone, '', -1);
                    }

                    if ($tmp_Xzone) {
                        $tmp = "
                        <script type=\"text/javascript\">
                            //<![CDATA[
                                document.addEventListener(\"DOMContentLoaded\", function(e) {
                                    tinymce.init({
                                    selector: 'textarea.tin',
                                    mobile: {menubar: true},
                                    language : '" . $this->language->language_iso(1, '', '') . "',";

                        include(asset_path('Shared/Editeur/tinymce/themes/advanced/npds.conf.php'));

                        $tmp .= '
                                    });
                                });
                            //]]>
                        </script>';
                    }
                } else {
                    $tmp .= '<script type="text/javascript" src="'. $this->asset->url('Shared/Editeur/tinymce/tinymce.min.js') .'"></script>';
                }
            } else {
                $tmp_Xzone .= $Xzone != 'custom' ? $Xzone . ',' : $Xactiv . ',';
            }
        } else {
            $tmp = '';
        }

        return $tmp;
    }

}
