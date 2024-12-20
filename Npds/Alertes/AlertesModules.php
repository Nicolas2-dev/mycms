<?php

namespace Npds\Alertes;


/**
 * Récupérations des états d'alerte des modules. 
 * 
 */
class AlertesModules 
{

    /**
     * Instance Alertes.
     *
     * @var \Npds\Alertes\AlertesModules
     */
    protected static AlertesModules $instance;


    /**
     * get instance class Alertes.
     *
     * @return \Npds\Alertes\AlertesModules $instance
     */
    public static function getInstance(): AlertesModules
    {
        if (isset(static::$instance)) {
            return static::$instance;
        }

        return static::$instance = new static();
    }    

    /**
     * Importation des alertes des modules.
     *
     * @return void
     */
    public function initialise()
    {
        $this->alertes();
    }

    /**
     * Pour les modules installés produisant des notifications.
     *
     * @return void
     */
    private function alertes() 
    {
        if ($modules = sql_select_fetch_array('fonctions', '*', " f 
                       LEFT JOIN " . sql_prefix('modules') . " m ON m.mnom = f.fnom 
                       WHERE m.minstall = 1 
                       AND fcategorie = 9"
            )
        ) {
            while ($alert = $modules) {

                include(module_path($alert['fnom'] . '/admin/adm_alertes.php'));

                $i = 0;

                while ($i < count($reqalertes)) {

                    if ($ibid = sql_num_rows(sql_query($reqalertes[$i][0]))) {
                        sql_update('fonctions', " 
                                   SET fetat = '1',
                                       fretour = '" . $reqalertes[$i][1] != 1 ? $reqalertes[$i][1] : $ibid . "', 
                                       fretour_h = '" . $reqalertes[$i][2] . "' 
                                   WHERE fid = " . $alert['fid'] . "");
                    } else {
                        sql_update('fonctions', " 
                                   SET fetat = '0',
                                       fretour = '' 
                                   WHERE fid = " . $alert['fid'] . "");
                    }
                    
                    $i++;
                }
            }
        }
    }

}
