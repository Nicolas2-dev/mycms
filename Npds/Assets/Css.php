<?php

declare(strict_types=1);

namespace Npds\Assets;

use Npds\Page\PageRef;
use Npds\Theme\Theme;
use Npds\Assets\Assets;
use Npds\Config\Config;
use Npds\Language\Language;


/**
 * Class de chargement css.
 */
class Css 
{

    /**
     * Instance Css.
     *
     * @var \Npds\Assets\Css $instance
     */
    protected static Css $instance;

    /**
     * Instance Language.
     *
     * @var  Npds\Language\Language $instance
     */
    protected Language $language;

    /**
     * Instance Theme.
     *
     * @var  Npds\Theme\Theme $instance
     */
    protected Theme $theme;

    /**
     * Instance Asset.
     *
     * @var  Npds\Assets\Assets $instance
     */
    protected Assets $asset;

    /**
     * Instance PageRef.
     *
     * @var  Npds\Page\PageRef $instance
     */
    protected PageRef $page_ref;


    /**
     * Constructeur.
     */
    public function __construct()
    {
        $this->language = Language::getInstance();

        $this->theme = Theme::getInstance();

        $this->asset = Assets::getInstance();

        $this->page_ref = PageRef::getInstance();
    }

    /**
     * Get instance class Css.
     *
     * @return \Npds\Assets\Css $instance
     */
    public static function getInstance()
    {
        if (isset(static::$instance)) {
            return static::$instance;
        }

        return static::$instance = new static();
    }

    /**
     * Recherche et affiche la CSS (site, langue courante ou par défaut) Charge la CSS complémentaire.
     * Le HTML ne contient que de simple quote pour être compatible avec javascript.
     *
     * @param   string  $tmp_theme      Le theme de l'utilisateur ou su site.
     * @param   string  $language       Le language de l'utilisateur ou du site.
     * @param   string  $fw_css         Le fichier css.
     *
     * @return  string
     */
    public function import_css_javascript(string $tmp_theme, string $language, string $fw_css)
    {
        $tmp = '';

        // CSS framework
        if (file_exists(theme_path('_skins/'. $fw_css .'/bootstrap.min.css'))) {
            $tmp .= "<link href='". site_url('Themes/_skins/'. $fw_css .'/bootstrap.min.css') ."' rel='stylesheet' type='text/css' media='all' />";
        }
        
        // CSS standard 
        if (file_exists(theme_path($tmp_theme .'/style/'. $language .'-style.css'))) {
            
            $tmp .= "<link href='". site_url('Themes/'. $tmp_theme .'/style/'. $language .'-style.css') ."' title='default' rel='stylesheet' type='text/css' media='all' />";
            
            if (file_exists(theme_path($tmp_theme .'/style/$language-style-AA.css'))) {
                $tmp .= "<link href='". site_url('Themes/'. $tmp_theme .'/style/'. $language .'-style-AA.css') ."' title='alternate stylesheet' rel='alternate stylesheet' type='text/css' media='all' />";
            }
            
            if (file_exists(theme_path($tmp_theme .'/style/$language-print.css'))) {
                $tmp .= "<link href='". site_url('Themes/'. $tmp_theme .'/style/'. $language .'-print.css') ."' rel='stylesheet' type='text/css' media='print' />";
            }
        } elseif (theme_path($tmp_theme .'/style/style.css')) {
            $tmp .= "<link href='". site_url('Themes/'. $tmp_theme .'/style/style.css') ."' title='default' rel='stylesheet' type='text/css' media='all' />";

            if (file_exists(theme_path($tmp_theme .'/style/style-AA.css'))) {
                $tmp .= "<link href='". site_url('Themes/'. $tmp_theme .'/style/style-AA.css') ."' title='alternate stylesheet' rel='alternate stylesheet' type='text/css' media='all' />";
            }

            if (file_exists(theme_path($tmp_theme .'/style/print.css'))) {
                $tmp .= "<link href='". site_url('Themes/'. $tmp_theme .'/style/print.css') ."' rel='stylesheet' type='text/css' media='print' />";
            }
        } else {
            $tmp .= "<link href='". site_url('Themes/default/style/style.css') ."' title='default' rel='stylesheet' type='text/css' media='all' />";
        }

        // Chargeur CSS spécifique
        $tmp .= $this->page_ref->cssImport($tmp_theme); 

        return $tmp;
    }

    /**
     * Fonctionnement identique à import_css_javascript sauf que le code HTML en retour ne contient que de double quote
     *
     * @param   string  $tmp_theme      Le theme de l'utilisateur ou su site.
     * @param   string  $language       Le language de l'utilisateur ou du site.
     * @param   string  $fw_css         Le fichier css.
     *
     * @return  string
     */
    public function import_css(string $tmp_theme, string $language, string $fw_css)
    {
        return str_replace("'", "\"", $this->import_css_javascript($tmp_theme, $language, $fw_css));
    }

    /**
     * fin d'affichage avec form validateur ou pas, ses parametres (js), fermeture div admin et inclusion footer.php
     *
     * @param   string  $fv             inclusion du validateur de form.
     * @param   string  $fv_parametres  éléments de l'objet fields differents input (objet js ex :   xxx: {},...) si !###! est trouvé 
     *                                  dans la variable la partie du code suivant sera inclu à la fin de la fonction d'initialisation.
     * @param   string  $arg1           js pur au début du script js.
     * @param   string  $foo            '' </div> et inclusion footer.php.
     *                                  'foo' inclusion footer.php.
     *
     * @return  void
     */
    public function adminfoot(string $fv, string $fv_parametres, string $arg1, string $foo)
    {
        $minpass = Config::get('npds.minpass');

        if ($fv == 'fv') {
            if ($fv_parametres != '') {
                $fv_parametres = explode('!###!', $fv_parametres);
            }

            $locale = $this->language->language_iso(1, '_', 1);

            echo '
            <script type="text/javascript" src="'. $this->asset->url('js/es6-shim.min.js') .'"></script>
            <script type="text/javascript" src="'. $this->asset->url('shared/formvalidation/dist/js/FormValidation.full.min.js') .'"></script>
            <script type="text/javascript" src="'. $this->asset->url('shared/formvalidation/dist/js/locales/' . $locale . '.min.js') .'"></script>
            <script type="text/javascript" src="'. $this->asset->url('shared/formvalidation/dist/js/plugins/Bootstrap5.min.js') .'"></script>
            <script type="text/javascript" src="'. $this->asset->url('shared/formvalidation/dist/js/plugins/L10n.min.js') .'"></script>
            <script type="text/javascript" src="'. $this->asset->url('js/checkfieldinp.js') .'"></script>
            <script type="text/javascript">
            //<![CDATA[
                ' . $arg1 . '
                var diff;
                document.addEventListener("DOMContentLoaded", function(e) {
                    // validateur pour mots de passe
                    const strongPassword = function() {
                        return {
                            validate: function(input) {
                                let score=0;
                                const value = input.value;
                                if (value === "") {
                                    return {
                                        valid: true,
                                        meta:{score:null},
                                    };
                                }
                                if (value === value.toLowerCase()) {
                                    return {
                                        valid: false,
                                        message: "' . translate("Le mot de passe doit contenir au moins un caractère en majuscule.") . '",
                                        meta:{score: score-1},
                                    };
                                }
                                if (value === value.toUpperCase()) {
                                    return {
                                        valid: false,
                                        message: "' . translate("Le mot de passe doit contenir au moins un caractère en minuscule.") . '",
                                        meta:{score: score-2},
                                    };
                                }
                                if (value.search(/[0-9]/) < 0) {
                                    return {
                                        valid: false,
                                        message: "' . translate("Le mot de passe doit contenir au moins un chiffre.") . '",
                                        meta:{score: score-3},
                                    };
                                }
                                if (value.search(/[@\+\-!#$%&^~*_]/) < 0) {
                                    return {
                                        valid: false,
                                        message: "' . translate("Le mot de passe doit contenir au moins un caractère non alphanumérique.") . '",
                                        meta:{score: score-4},
                                    };
                                }
                                if (value.length < 8) {
                                    return {
                                        valid: false,
                                        message: "' . translate("Le mot de passe doit contenir") . ' ' . $minpass . ' ' . translate("caractères au minimum") . '",
                                        meta:{score: score-5},
                                    };
                                }

                                score += ((value.length >= ' . $minpass . ') ? 1 : -1);
                                if (/[A-Z]/.test(value)) score += 1;
                                if (/[a-z]/.test(value)) score += 1; 
                                if (/[0-9]/.test(value)) score += 1;
                                if (/[@\+\-!#$%&^~*_]/.test(value)) score += 1; 
                                return {
                                    valid: true,
                                    meta:{score: score},
                                };
                            },
                        };
                    };
                    FormValidation.validators.checkPassword = strongPassword;
                    formulid.forEach(function(item, index, array) {
                        const fvitem = FormValidation.formValidation(
                            document.getElementById(item),{
                                locale: "' . $locale . '",
                                localization: FormValidation.locales.' . $locale . ',
                                fields: {';

            if ($fv_parametres != '') {
                echo '
                ' . $fv_parametres[0];
            }

            echo '
                                },
                                plugins: {
                                    declarative: new FormValidation.plugins.Declarative({
                                        html5Input: true,
                                    }),
                                    trigger: new FormValidation.plugins.Trigger(),
                                    submitButton: new FormValidation.plugins.SubmitButton(),
                                    defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
                                    bootstrap5: new FormValidation.plugins.Bootstrap5({rowSelector: ".mb-3"}),
                                    icon: new FormValidation.plugins.Icon({
                                        valid: "fa fa-check",
                                        invalid: "fa fa-times",
                                        validating: "fa fa-sync",
                                        onPlaced: function(e) {
                                            e.iconElement.addEventListener("click", function() {
                                                fvitem.resetField(e.field);
                                            });
                                        },
                                    }),
                                },
                            })
                            .on("core.validator.validated", function(e) {
                                if ((e.field === "add_pwd" || e.field === "chng_pwd" || e.field === "pass" || e.field === "add_pass" || e.field === "code" || e.field === "passwd") && e.validator === "checkPassword") {
                                    var score = e.result.meta.score;
                                    const barre = document.querySelector("#passwordMeter_cont");
                                    const width = (score < 0) ? score * -18 + "%" : "100%";
                                    barre.style.width = width;
                                    barre.classList.add("progress-bar","progress-bar-striped","progress-bar-animated","bg-success");
                                    barre.setAttribute("aria-valuenow", width);
                                    if (score === null) {
                                        barre.style.width = "100%";
                                        barre.setAttribute("aria-valuenow", "100%");
                                        barre.classList.replace("bg-success","bg-danger");
                                    } else {
                                        barre.classList.replace("bg-danger","bg-success");
                                    }
                                }

                                if (e.field === "B1" && e.validator === "promise") {
                                    if (e.result.valid && e.result.meta && e.result.meta.source) {
                                        $("#ava_perso").removeClass("border-danger").addClass("border-success")
                                    } else if (!e.result.valid) {
                                        $("#ava_perso").addClass("border-danger")
                                    }
                                }
                            });';

            if ($fv_parametres != '') {
                if (array_key_exists(1, $fv_parametres)) {
                    echo '
                    ' . $fv_parametres[1];
                }
            }

            echo '
                        })
                    });
                //]]>
            </script>';
        }

        switch ($foo) {
            case '':
                echo '</div>';
                $this->theme->footer();

                break;

            case 'foo':
                $this->theme->footer();
                break;
        }
    }

}
