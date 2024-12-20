<?php

declare(strict_types=1);

namespace Npds\Language;


/**
 * Undocumented class
 */
class Language 
{

    /**
     * Instance Language.
     *
     * @var \Npds\Language $instance
     */
    protected static Language $instance;

    /**
     * [$tab_langue description]
     *
     * @var array
     */
    protected array $tab_langue;

    
    /**
     * [$flag description]
     *
     * @var [type]
     */
    protected array $flags = [
        'french'    => '🇫🇷', 
        'spanish'   => '🇪🇸', 
        'german'    => '🇩🇪', 
        'english'   => '🇺🇸', 
        'chinese'   => '🇨🇳'
    ];


    /**
     * Constructeur.
     */
    public function __construct()
    {
        //
        $this->make_tab_langue();
    }

    /**
     * Get instance class Language.
     *
     * @return \Npds\Language $instance
     */
    public static function getInstance()
    {
        if (isset(static::$instance)) {
            return static::$instance;
        }

        return static::$instance = new static();
    }

    /**
     * [getFlags description]
     *
     * @return  array
     */
    public function getFlags()
    {
        return $this->flags;
    }

    /**
     * [getTabLangue description]
     *
     * @return  array
     */
    public function getTabLangue()
    {
        return $this->tab_langue;
    }

    /**
     * Analyse le contenu d'une chaine et converti la section correspondante ([langue] OU [!langue] ...[/langue]) 
     * à la langue / [transl] ... [/transl] permet de simuler un appel translate("xxxx")
     *
     * @param   string  $ibid  [$ibid description]
     *
     * @return  string
     */
    public function aff_langue(string $ibid)
    {
        global $language; 
        
        $tab_langue = $this->getTabLangue();

        // copie du tableau + rajout de transl pour gestion de l'appel à translate(...); - Theme Dynamic
        $tab_llangue    = $tab_langue;
        $tab_llangue[]  = 'transl';

        reset($tab_llangue);

        $ok_language        = false;
        $trouve_language    = false;

        foreach ($tab_llangue as $key => $lang) {

            $pasfin         = true;
            $pos_deb        = false;
            $abs_pos_deb    = false;
            $pos_fin        = false;

            while ($pasfin) {
                // tags [langue] et [/langue]
                $pos_deb = strpos($ibid, "[$lang]", 0);
                $pos_fin = strpos($ibid, "[/$lang]", 0);

                if ($pos_deb === false) {
                    $pos_deb = -1;
                }

                if ($pos_fin === false) {
                    $pos_fin = -1;
                }

                // tags [!langue]
                $abs_pos_deb = strpos($ibid, "[!$lang]", 0);
                
                if ($abs_pos_deb !== false) {
                    $ibid = str_replace("[!$lang]", "[$lang]", $ibid);
                    $pos_deb = $abs_pos_deb;

                    if ($lang != $language) {
                        $trouve_language = true;
                    }
                }

                $decal = strlen($lang) + 2;

                if (($pos_deb >= 0) and ($pos_fin >= 0)) {
                    $fragment = substr($ibid, $pos_deb + $decal, ($pos_fin - $pos_deb - $decal));

                    if ($trouve_language == false) {
                        if ($lang != 'transl') {
                            $ibid = str_replace("[$lang]" . $fragment . "[/$lang]", $fragment, $ibid);
                        } else {
                            $ibid = str_replace("[$lang]" . $fragment . "[/$lang]", translate($fragment), $ibid);
                        }

                        $ok_language = true;
                    } else {
                        if ($lang != 'transl') {
                            $ibid = str_replace("[$lang]" . $fragment . "[/$lang]", "", $ibid);
                        } else {
                            $ibid = str_replace("[$lang]" . $fragment . "[/$lang]", translate($fragment), $ibid);
                        }
                    }
                } else {
                    $pasfin = false;
                }
            }

            if ($ok_language) {
                $trouve_language = true;
            }
        }

        return $ibid;
    }
 
    /**
     * Charge le tableau TAB_LANGUE qui est utilisé par les fonctions multi-langue
     *
     * @return  void
     */
    public function make_tab_langue()
    {
        global $language, $languageslist;

        $languageslocal = $language . ' ' . str_replace($language, '', $languageslist);

        $languageslocal = trim(str_replace('  ', ' ', $languageslocal));

        $this->tab_langue = explode(' ', $languageslocal);
    }

    /**
     * Charge une zone de formulaire de selection de la langue
     *
     * @param   string  $ibid  [$ibid description]
     *
     * @return  [type]         [return description]
     */
    public function aff_localzone_langue(string $ibid)
    {
        $M_langue = '
            <div class="mb-3">
                <select name="' . $ibid . '" class="form-select" onchange="this.form.submit()" aria-label="' . translate("Choisir une langue") . '">
                    <option value="">' . translate("Choisir une langue") . '</option>';

        $flags = $this->getFlags();

        foreach ($this->getTabLangue() as $bidon => $langue) {
            $M_langue .= '<option value="' . $langue . '">' . $flags[$langue] . ' ' . translate("$langue") . '</option>';
        }

        $M_langue .= '
                    <option value="">- ' . translate("Aucune langue") . '</option>
                </select>
            </div>
            <noscript>
                <input class="btn btn-primary" type="submit" name="local_sub" value="' . translate("Valider") . '" />
            </noscript>';

        return $M_langue;
    }

    /**
     * Charge une FORM de selection de langue
     *
     * @param   string  $ibid_index  URL de la Form
     * @param   string  $ibid        nom du champ
     * @param   string  $mess        [$mess description]
     *
     * @return  string
     */
    public function aff_local_langue(string $ibid_index, string $ibid, string $mess = '')
    {
        global $REQUEST_URI;

        if ($ibid_index == '') {
            
            $ibid_index = $REQUEST_URI;
        }

        $M_langue = '<form action="' . $ibid_index . '" name="local_user_language" method="post">';
        $M_langue .= $mess . $this->aff_localzone_langue($ibid);
        $M_langue .= '</form>';

        return $M_langue;
    }

    /**
     * appel la fonction aff_langue en modifiant temporairement la valeur de la langue
     *
     * @param   string  $local_user_language  [$local_user_language description]
     * @param   string  $ibid                 [$ibid description]
     *
     * @return  string
     */
    public function preview_local_langue(string $local_user_language, string $ibid)
    {
        global $language;

        if ($local_user_language) {
            
            $old_langue     = $language;

            $language       = $local_user_language;

            $this->make_tab_langue();

            $ibid           = $this->aff_langue($ibid);

            $language       = $old_langue;
        }

        return $ibid;
    }


    /**
     * renvoi le code language iso 639-1 et code pays ISO 3166-2
     *
     * @param   mixed   $l  0 ou 1(requis)
     * @param   string  $s  (séparateur - | _)
     * @param   mixed   $c  0 ou 1 (requis)
     *
     * @return  string
     */
    public function language_iso(mixed $l, string $s, mixed $c)
    {
        switch ($this->checkLang()) {
            case "french":
                $iso_lang = 'fr';
                $iso_country = 'FR';
                break;

            case "english":
                $iso_lang = 'en';
                $iso_country = 'US';
                break;

            case "spanish":
                $iso_lang = 'es';
                $iso_country = 'ES';
                break;

            case "german":
                $iso_lang = 'de';
                $iso_country = 'DE';
                break;

            case "chinese":
                $iso_lang = 'zh';
                $iso_country = 'CN';
                break;

            default:
                break;
        }

        if ($c !== 1) {
            return $iso_lang;
        }

        if (($l == 1) and ($c == 1)) {
            return $iso_lang . $s . $iso_country;
        }

        if (($l !== 1) and ($c == 1)) {
            return $iso_country;
        }

        if (($l !== 1) and ($c !== 1)) {
            return '';
        }

        if (($l == 1) and ($c !== 1)) {
            return $iso_lang;
        }
    }

    /**
     * [checkLang description]
     *
     * @return  string  [return description]
     */
    public function checkLang()
    {
        global $language, $user_language;

        return !empty($user_language) ? $user_language : $language;
    }

}
