<?php

namespace Npds\Download;

use Npds\Auth\Auth;
use Npds\Date\Date;
use Npds\Config\Config;
use Npds\Support\Sanitize;
use Npds\Language\Language;


/**
 * Undocumented class
 */
class Download 
{

    /**
     * Instance Download.
     *
     * @var \Npds\Download\Download $instance
     */
    protected static Download $instance;

    /**
     * Instance Auth.
     *
     * @var \Npds\Auth\Auth $instance
     */
    protected static Auth $auth;

    /**
     * Instance Language.
     *
     * @var  Npds\Language\Language $instance
     */
    protected Language $language;

    /**
     * Instance Date.
     *
     * @var  Npds\Date\Date $instance
     */
    protected Date $date;


    /**
     * Constructeur.
     */
    public function __construct()
    {
        $this->language = Language::getInstance();

        $this->auth     = Auth::getInstance();

        $this->date     = Date::getInstance();
    }

    /**
     * Get instance class Download.
     *
     * @return \Npds\Download\Download $instance
     */
    public static function getInstance()
    {
        if (isset(static::$instance)) {
            return static::$instance;
        }

        return static::$instance = new static();
    }

    /**
     * Bloc topdownload et lastdownload
     *
     * @param   string  $form   [$form description]
     * @param   string  $ordre  [$ordre description]
     *
     * @return  string
     */
    public function topdownload_data(string $form, string $ordre)
    {
        global $long_chain;

        if (!$long_chain) {
            $long_chain = 13;
        }

        settype($top, 'integer');

        $result = sql_query("SELECT did, dcounter, dfilename, dcategory, ddate, perms 
                            FROM " . sql_prefix('downloads') . " 
                            ORDER BY $ordre 
                            DESC LIMIT 0, ". Config::get('npds.top'));
        
        $lugar = 1;
        $ibid = '';

        while (list($did, $dcounter, $dfilename, $dcategory, $ddate, $dperm) = sql_fetch_row($result)) {
            if ($dcounter > 0) {
                $okfile = $this->auth->autorisation($dperm);

                if ($ordre == 'dcounter') {
                    $dd = Sanitize::wrh($dcounter);
                }

                if ($ordre == 'ddate') {
                    $dd = $this->date->formatTimes($ddate, IntlDateFormatter::SHORT, IntlDateFormatter::NONE);
                }

                $ori_dfilename = $dfilename;

                if (strlen($dfilename) > $long_chain) {
                    $dfilename = (substr($dfilename, 0, $long_chain)) . " ...";
                }

                if ($form == 'short') {
                    if ($okfile) {
                        $ibid .= '<li class="list-group-item list-group-item-action d-flex justify-content-start p-2 flex-wrap">
                            ' . $lugar . ' 
                            <a class="ms-2" href="download.php?op=geninfo&amp;did=' . $did . '&amp;out_template=1" title="' . $ori_dfilename . ' ' . $dd . '" data-bs-toggle="tooltip" >
                                ' . $dfilename . '
                            </a>
                            <span class="badge bg-secondary ms-auto align-self-center">' . $dd . '</span>
                        </li>';
                    }
                } else {
                    if ($okfile) {
                        $ibid .= '<li class="ms-4 my-1">
                            <a href="download.php?op=mydown&amp;did=' . $did . '" >
                                ' . $dfilename . '
                            </a> (' . translate("Catégorie") . ' : ' . $this->language->aff_langue(stripslashes($dcategory)) . ')&nbsp;
                            <span class="badge bg-secondary float-end align-self-center">' . Sanitize::wrh($dcounter) . '</span>
                        </li>';
                    }
                }

                if ($okfile) {
                    $lugar++;
                }
            }
        }

        sql_free_result($result);

        return $ibid;
    }

}
