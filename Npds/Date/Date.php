<?php

namespace Npds\Date;

use IntlDateFormatter;
use Npds\Config\Config;
use Npds\Language\Language;


/**
 * Undocumented class
 */
class Date 
{

    /**
     * Instance Date.
     *
     * @var \Npds\Date\Date $instance
     */
    protected static Date $instance;


    /**
     * Constructeur.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get instance class Date.
     *
     * @return \Npds\Date $instance
     */
    public static function getInstance()
    {
        if (isset(static::$instance)) {
            return static::$instance;
        }

        return static::$instance = new static();
    }

    /**
     * On définie la timezone.
     *
     * @param   ?string  $timezone  Timezone
     *
     * @return  void
     */
    public static function timezoneSet(?string $timezone = null)
    {
        if (is_null($timezone))
        {
            $timezone = Config::get('npds.timezone');
        }

        date_default_timezone_set($timezone);
    }

    /**
     * Pour obtenir Nuit ou Jour
     *
     * @return  string  return Jour ou Nuit
     */
    public function NightDay()
    {
        $Maintenant = strtotime("now");
        
        if ($Maintenant - strtotime(Config::get('npds.lever')) < 0 xor $Maintenant - strtotime(Config::get('npds.coucher')) > 0) {
            return 'Nuit';
        } else {
            return 'Jour';
        }
    }

    /**
     * Formate un timestamp ou une chaine de date formatée correspondant à l'argument obligatoire $time
     * le décalage $gmt défini dans les préférences n'est pas appliqué
     *
     * @param   string             $time       [$time description]
     * @param   int                $dateStyle  [$dateStyle description]
     * @param   IntlDateFormatter              [ description]
     * @param   SHORT                          [ description]
     * @param   int                $timeStyle  [$timeStyle description]
     * @param   IntlDateFormatter              [ description]
     * @param   NONE                           [ description]
     * @param   string             $timezone   [$timezone description]
     *
     * @return  string                         [return description]
     */
    public function formatTimes(string  $time, int $dateStyle = IntlDateFormatter::SHORT, int $timeStyle = IntlDateFormatter::NONE, string $timezone = 'Europe/Paris')
    {
        $language = Language::getInstance();

        $fmt = datefmt_create(
            $language->language_iso(1, '_', 1), 
            $dateStyle, 
            $timeStyle, 
            $timezone, 
            IntlDateFormatter::GREGORIAN
        );

        return $this->formatDate(
            $fmt->format($this->dateIsNumerique($time))
        );
    }

    /**
     * découpe/extrait/formate et plus grâce au paramètre $format....
     * un timestamp ou une chaine de date formatée correspondant à l'argument obligatoire $time
     *
     * @param   string  $time      [$time description]
     * @param   string  $format    Format
     * @param   string  $timezone  Déclaration de la Timezone 
     *
     * @return  string             [return description]
     */
    public function getPartOfTime(string $time, string $format, string $timezone = 'Europe/Paris')
    {
        $language = Language::getInstance();

        $fmt = new IntlDateFormatter(
            $language->language_iso(1, '_', 1), 
            IntlDateFormatter::FULL, 
            IntlDateFormatter::FULL, 
            $timezone, 
            IntlDateFormatter::GREGORIAN, $format
        );
        
        return $this->formatDate($fmt->format($this->dateIsNumerique($time)));
    }

    /**
     * On vérifie si la date est bien au format numérique.
     *
     * @param   string  $time  [$time description]
     *
     * @return  string         [return description]
     */
    public function dateIsNumerique(string $time)
    {
        return is_numeric($time) ? $time : strtotime($time);
    }

    /**
     * Formatage de la date.
     *
     * @param   string  $date  [$date description]
     *
     * @return  string         [return description]
     */
    public function formatDate(string $date)
    {
        return ucfirst(htmlentities($date, ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401, 'UTF-8'));
    }

}
