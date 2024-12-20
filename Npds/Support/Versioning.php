<?php

namespace Npds\Support;

use Npds\Config\Config;


/**
 * [Versioning description]
 */
class Versioning
{

    /**
     * [NPDS_URL description]
     *
     * @var [type]
     */
    const NPDS_URL = 'https://www.npds.org';


    /**
     * [version description]
     *
     * @return  void
     */
    public static function cms()
    {
        echo '
        <h3 class="my-4">' . translate("Cms version") . '</h3>
        <ul class="list-group">
            <li class="list-group-item d-flex justify-content-start align-items-center">
                <i class="fa fa-cogs fa-2x text-body-secondary me-1"></i>
                ' . translate("Version Num") . ' <span class="badge bg-danger ms-auto">' . Config::get('npds.Version_Num') . '</span>
            </li>
            <li class="list-group-item d-flex justify-content-start align-items-center">
                <i class="fa fa-cogs fa-2x text-body-secondary me-1"></i>
                ' . translate("Version Id") . ' <span class="badge bg-danger ms-auto">' . Config::get('npds.Version_Id') . '</span>
            </li>
            <li class="list-group-item d-flex justify-content-start align-items-center">
                <i class="fa fa-cogs fa-2x text-body-secondary me-1"></i>
                ' . translate("Version Sub") . ' <span class="badge bg-danger ms-auto">' . Config::get('npds.Version_Sub') . '</span>
            </li>
        </ul>
        <br />';
    }

    /**
     * [ciopyright description]
     *
     * @return  void
     */
    public static function copyright()
    {
        echo '<p class="text-center">
            <a href="' . static::NPDS_URL .'">
                ' . static::NPDS_URL .'
            </a> - French Portal Generator Gnu/Gpl Licence
        </p>
        <br />';
    }

}
