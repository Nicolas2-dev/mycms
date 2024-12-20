<?php

namespace Npds\Alertes;

use Npds\Config\Config;


/**
 * recupérations des états d'alerte de la messagerie npds. 
 * 
 */
class AlertesMessagerie 
{

    /**
     * Instance Alertes.
     *
     * @var \Npds\Alertes\AlertesMessagerie
     */
    protected static AlertesMessagerie $instance;

    /**
     * Les Messages NPDS.
     */
    protected array $messages_npds = [];

    /**
     * Les Messages NPDS en base de donnée.
     */
    protected array $message_database = [];

    /**
     * Url du fichier de la messagerie.
     */
    const MESSAGERIE_URL = 'https://raw.githubusercontent.com/npds/npds_dune/master/versus.txt';


    /**
     * Constructeur.
     *
     * @return void
     */
    public function __construct()
    {
        $this->loadMessageries();

        $this->getMessageDatabase();
    }

    /**
     * get instance class Alertes.
     *
     * @return \Npds\Alertes\AlertesMessagerie $instance
     */
    public static function getInstance(): AlertesMessagerie
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
     * Return la liste des messages de la messageries.
     *
     * @return array
     */
    public function getMessages()
    {
        array_pop($this->messages_npds);

        return $this->messages_npds;
    }

    /**
     * Return la liste des messages dans la base de donnée.
     *
     * @return array
     */
    public function getMessagesDatabase()
    {
        return $this->message_database;
    }

    /**
     * Récupération et traitement des messages de NPDS.
     *
     * @return void
     */
    private function alertes()
    { 
        // On récupère toutes la liste des messages.
        $messages_npds = $this->getMessages();
        
        // Message check version NPDS.
        $this->messageVersus($messages_npds);

        $messagries = array_slice($messages_npds, 1);

        // Netoyage de la base.
        if (empty($messagries)) {
            $this->netoyageBase();
        } else {
            $this->insertBase($messagries);
        }

        // Si message on compare avec la base.
        if ($messagries) {

            // On check la messageies.
            $this->checkMessagerie($messagries);

            // On suspprimes les messages de la base.
            $this->deleteMessageFromBase();
        }
    }

    /**
     * On check la messageries.
     *
     * @param array $messageries        Le Tableaux de la messageries.
     * 
     * @return void
     */
    private function checkMessagerie(array $messageries)
    {
        for ($i = 0; $i < count($messageries); $i++) {

            $ibid = explode('|', $messageries[$i]);
            
            $f_mes = $this->getMessagesDatabase();

            // Si on trouve le contenu du fichier dans la requete.
            if (in_array($ibid[1], $f_mes, true)) {

                $k = (array_search($ibid[1], $f_mes));

                unset($f_mes[$k]);

                $result = sql_query("SELECT fnom_affich 
                                     FROM " . sql_prefix('fonctions') . " 
                                     WHERE fnom = 'mes_npds_$i'");

                if (sql_num_rows($result) == 1) {
                    $alertinfo = sql_fetch_assoc($result);

                    if ($alertinfo['fnom_affich'] != $ibid[2]) {
                        sql_query('UPDATE' . sql_prefix('fonctions') . '  
                                   SET fdroits1_descr = "", 
                                       fnom_affich = "' . addslashes($ibid[2]) . '" 
                                   WHERE fnom = "mes_npds_' . $i . '"');
                    }
                }
            } 
            // Original defaut.
            // else {
            //     $this->replaceBase($i, $ibid);
            // }

        }
    }


    /**
     * On récupere toutes la messagerie en base de donnée.
     *
     * @return void
     */
    private function getMessageDatabase()
    {
        $QM = sql_query("SELECT * FROM " . sql_prefix('fonctions') . " 
                         WHERE fnom REGEXP'mes_npds_[[:digit:]]'");

        settype($database_message, 'array');

        while ($SQM = sql_fetch_assoc($QM)) {
            $database_message[] = $SQM['fretour_h'];
        }
        
        $this->message_database = $database_message;
    }

    /**
     * On suspprimes les messages de la base de donnée.
     *
     * @return void
     */
    private function deleteMessageFromBase()
    {
        $f_mes = $this->getMessagesDatabase();

        if (count($f_mes) !== 0) {
            foreach ($f_mes as $v) {
                sql_query('DELETE from ' . sql_prefix('fonctions') . ' 
                           WHERE fretour_h = "' . $v . '" 
                           AND fcategorie = "9"');
            }
        }
    }

    /**
     * Si pas de message on nettoie la base de donnée.
     *
     * @return void
     */
    private function netoyageBase()
    {
        //
        sql_query("DELETE FROM " . sql_prefix('fonctions') . " 
                   WHERE fnom REGEXP'mes_npds_[[:digit:]]'");

        //
        sql_query("ALTER TABLE " . sql_prefix('fonctions') . " 
                   AUTO_INCREMENT = (SELECT MAX(fid)+1 
                   FROM " . sql_prefix('fonctions') .")");
    }

    /**
     * On remplace le message ecrit dans la base de donnée.
     *
     * @param integer $i        Id du nom du message.
     * @param array $ibid       Tableau d'argument du message.
     * 
     * @return void
     */
    private function replaceBase(int $i, array $ibid)
    {
        //
        sql_query('REPLACE '. sql_prefix('fonctions')  .' 
                   SET fnom = "mes_npds_'. $i .'",
                       fretour_h = "'. $ibid[1] .'",
                       fcategorie = "9", 
                       fcategorie_nom = "Alerte", 
                       ficone = "'. $ibid[0] != 'Note' ? 'message_a' : 'message_i' .'",
                       fetat = "1", 
                       finterface = "1", 
                       fnom_affich = "'. addslashes($ibid[2]) .'", 
                       furlscript = "data-bs-toggle=\"modal\" data-bs-target=\"#messageModal\"",
                       fdroits1_descr = "vide"');
    }

    /**
     * Si message on insert dans la base de donnée.
     *
     * @param array $mess       Les arguments de messagerie du tableau de messageie.
     * 
     * @return void
     */
    private function insertBase(array $mess)
    {
        $id = 0;

        foreach ($mess as $v) {

            $QM = sql_num_rows(sql_query("SELECT * FROM " . sql_prefix('fonctions') . " 
                                          WHERE fnom = 'mes_npds_" . $id . "'"));
            $ibid = explode('|', $v);

            if ($QM === false)
                sql_query("INSERT INTO " . sql_prefix('fonctions') . " 
                          (fnom, retour_h, fcategorie, fcategorie_nom, ficone, fetat, finterface, fnom_affich, furlscript) 
                           VALUES (
                                'mes_npds_" . $id . "',
                                '" . addslashes($ibid[1]) . "',
                                '9',
                                'Alerte',
                                '" . $ibid[0] != 'Note' ? 'message_npds_a' : 'message_npds_i' . "',
                                '1',
                                '1',
                                '" . addslashes($ibid[2]) . "',
                                'data-bs-toggle=\"modal\" data-bs-target=\"#messageModal\");\n");
            
            $id++;
        }
    }

    /**
     * Traitement specifique car message permanent versus.
     *
     * @param array $messages_npds      Le tableau de messageries.
     * 
     * @return void
     */
    private function messageVersus(array $messages_npds): void
    {
        $Version_Sub = Config::get('npds.Version_Sub');
        $Version_Num = Config::get('npds.Version_Num');

        $versus_info = explode('|', $messages_npds[0]);

        if ($versus_info[1] == $Version_Sub and $versus_info[2] == $Version_Num) {
            sql_query("UPDATE " . sql_prefix('fonctions') . " 
                       SET fetat = '1', 
                           fretour = '', 
                           fretour_h = 'Version NPDS " . $Version_Sub . " " . $Version_Num . "', 
                           furlscript = '' 
                       WHERE fid = '36'");
        } else {
            sql_query("UPDATE " . sql_prefix('fonctions') . " 
                       SET fetat = '1', 
                           fretour = 'N', 
                           furlscript = 'data-bs-toggle=\"modal\" data-bs-target=\"#versusModal\"', 
                           fretour_h = 'Une nouvelle version NPDS est disponible !<br />" . $versus_info[1] . " " . $versus_info[2] . "<br />Cliquez pour télécharger.' 
                       WHERE fid = '36'");
        }
    }

    /**
     * Récupération de la méssageries.
     *
     * @return void
     */
    private function loadMessageries()
    {
        $this->messages_npds = explode("\n", file_get_contents(self::MESSAGERIE_URL));
    }

}
