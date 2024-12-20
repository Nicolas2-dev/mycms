<?php

namespace Npds\Auth;

use Npds\Groupe\Groupe;


/**
 * Class  de gestion Auth.
 */
class Auth 
{

    /**
     * Instance Auth.
     *
     * @var \Npds\Auth\Auth $instance
     */
    protected static Auth $instance;

    /**
     * Instance Groupe.
     *
     * @var Npds\Groupe\Groupe $instance
     */
    protected Groupe $groupe;


    /**
     * Constructeur.
     */
    public function __construct()
    {
        $this->groupe = Groupe::getInstance();
    }

    /**
     * Get instance class Auth.
     *
     * @return \Npds\Auth $instance
     */
    public static function getInstance()
    {
        if (isset(static::$instance)) {
            return static::$instance;
        }

        return static::$instance = new static();
    }

    /**
     * Fonction des paramètres d'autorisation de NPDS.
     * 
     * @param   string|int  $auto   Définie le niveau de la permission de lutilisateur.
     *
     * @return  bool
     */
    public function autorisation(string|int $auto)
    {
        global $user, $admin;

        $affich = false;

        if (($auto == -1) and (!$user)) {
            $affich = true;
        }

        if (($auto == 1) and (isset($user))) {
            $affich = true;
        }

        if ($auto > 1) {
            $tab_groupe = $this->groupe->valid_group($user);

            if ($tab_groupe) {
                foreach ($tab_groupe as $groupevalue) {
                    if ($groupevalue == $auto) {
                        $affich = true;
                        break;
                    }
                }
            }
        }

        if ($auto == 0) {
            $affich = true;
        }

        if (($auto == -127) and ($admin)) {
            $affich = true;
        }

        return $affich;
    }

    /**
     * Pour savoir si le visiteur est un : membre ou admin.
     * 
     * Exemple : static.php et banners.php.
     *
     * @param   string  $sec_type  Définie si c'est un membre ou un admin admin.
     *
     * @return  bool            
     */
    public function secur_static(string $sec_type)
    {
        global $user, $admin;

        switch ($sec_type) {
            case 'member':
                return isset($user);
                break;

            case 'admin':
                return isset($admin);
                break;
        }
    }
 
    /**
     * Affiche URL et Email d'un auteur.
     *
     * @param   string  $aid  Id de l'administrateur.
     *
     * @return  string
     */
    public function formatAidHeader(string $aid)
    {
        $holder = sql_query("SELECT url, email 
                             FROM " . sql_prefix('authors') . " 
                             WHERE aid='$aid'");
        
        if ($holder) {
            list($url, $email) = sql_fetch_row($holder);
            
            if (isset($url)) {
                echo '<a href="' . $url . '" >' . $aid . '</a>';
            } elseif (isset($email)) {
                echo '<a href="mailto:' . $email . '" >' . $aid . '</a>';
            } else {
                echo $aid;
            }
        }
    }

}
