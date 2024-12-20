<?php

declare(strict_types=1);

namespace Npds\Support;

use Npds\Support\Facades\Log;


/**
 * Class Access
 */
class Access
{

    /**
     * [Admin_alert description]
     *
     * @param   string  $motif  [$motif description]
     *
     * @return  void
     */
    public static function adminAlert(string $motif)
    {
        global $admin;
    
        setcookie('admin', '', 0);
        unset($admin);
    
        Log::Ecr_Log('security', 'auth.inc.php/Admin_alert : ' . $motif, '');
    
        $Titlesitename = 'NPDS';

        if (file_exists(storage_path('meta/meta.php'))) {
            include(storage_path('meta/meta.php'));
        }
    
        echo '
            </head>
            <body>
                <br /><br /><br />
                <p style="font-size: 24px; font-family: Tahoma, Arial; color: red; text-align:center;">
                    <strong>.: ' . translate("Votre adresse Ip est enregistrée") . ' :.</strong>
                </p>
            </body>
        </html>';
    
        die();
    }

    /**
     * [access_denied description]
     *
     * @return  void
     */
    public static function denied()
    {
        static::adminDie();
    }

    /**
     * [Access_Error description]
     *
     * @return  void
     */
    public static function error()
    {
        static::adminDie();
    }

    /**
     * [adminDie description]
     *
     * @return  void
     */
    private static function adminDie()
    {
        if (!function_exists("Mysql_Connexion")) {
            include("Boot/grab_globals.php");
        }

        $Titlesitename = 'NPDS';

        if (file_exists(storage_path('meta/meta.php'))) {
            include(storage_path('meta/meta.php'));
        }

        echo '
            <link id="bsth" rel="stylesheet" href="'.  asset_url('shared/bootstrap/dist/css/bootstrap.min.css') . '" />
            </head>
            <body>
                <div class="contenair-fluid mt-5">
                    <div class= "card mx-auto p-3" style="width:380px; text-align:center">
                        <span style="font-size: 72px;">🚫</span>
                        <span class="text-danger h3 mb-3" style="">
                        Acc&egrave;s refus&eacute; ! <br />
                        Access denied ! <br />
                        Zugriff verweigert ! <br />
                        Acceso denegado ! <br />
                        &#x901A;&#x5165;&#x88AB;&#x5426;&#x8BA4; ! <br />
                        </span>
                        <hr />
                        <div>
                            <span class="text-body-secondary">NPDS - Portal System</span>
                            <img width="48px" class="adm_img ms-2" src="'  . asset_url('images/admin/message_npds.png') . '" alt="icon_npds">
                        </div>
                    </div>
                </div>
            </body>
            </html>';
            
        die();
    }

}
