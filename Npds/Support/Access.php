<?php

namespace Npds\Support;



class Access
{

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
