<?php

declare(strict_types=1);

namespace Npds\Support;

use Npds\Support\Facades\Log;


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
                <p style="font-size: 24px; font-family: Tahoma, Arial; color: red; text-align:center;"><strong>.: ' . translate("Votre adresse Ip est enregistrée") . ' :.</strong></p>
            </body>
        </html>';
    
        die();
    }

    /**
     * [access_denied description]
     *
     * @return  [type]  [return description]
     */
    public static function denied()
    {
        include("admin/die.php");
    }

    /**
     * [Access_Error description]
     *
     * @return  [type]  [return description]
     */
    public static function error()
    {
        include("admin/die.php");
    }

}
