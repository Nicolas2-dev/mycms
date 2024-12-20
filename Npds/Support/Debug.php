<?php

declare(strict_types=1);

namespace Npds\Support;

use Npds\Config\Config;


/**
 * Class Debug
 */
class Debug
{

    /**
     * Modify the report level of PHP.
     *
     * @return  void
     */
    public static function init()
    {
        $error_reporting = Config::get('debug.error_reporting');

        switch ($error_reporting) {
            case 'default':
            case '-1':
                break;
        
            case 'none':
            case '0':
                error_reporting(0);

                break;
        
            case 'simple':
                error_reporting(E_ERROR | E_WARNING | E_PARSE);
                ini_set('display_errors', 1);
        
                break;
                
            case 'dev':
                error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
                ini_set('display_errors', 1);

                break;

            case 'maximum':
                error_reporting(E_ALL);
                ini_set('display_errors', 1);

                break;
        
            default:
                error_reporting($error_reporting);
                ini_set('display_errors', 1);

                break;
        }
    }

}
