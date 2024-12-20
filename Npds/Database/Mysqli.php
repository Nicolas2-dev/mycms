<?php

use Npds\Config\Config;

global $debugmysql; 
define('NPDS_DEBUG', $debugmysql);

$sql_nbREQ = 0;

$dblink = Mysql_Connexion();

  
/**
 * Connexion plus détaillée  ($mysql_p = true => persistente connexion) 
 * 
 * - Attention : le type de SGBD n'a pas de lien avec le nom de cette fonction
 *
 * @return  \mysqli|false
 */
function Mysql_Connexion()
{
    // global $mysql_error, $dbhost, $dbname;

    $ret_p = sql_connect();

    if (!$ret_p) {

        $Titlesitename = "NPDS";

        if (file_exists(storage_path('meta/meta.php'))) {
            include(storage_path('meta/meta.php'));
        }

        if (file_exists(storage_path('static/database.txt'))) {
            include(storage_path('static/database.txt'));
        }

        die();
    }

    return $ret_p;
}

/**
 * [sql_connect description]
 *
 * @return  \mysqli|false
 */
function sql_connect()
{
    global $dblink, $mysql_error;

    try {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        $mysql_p    = Config::get('npds.mysql_p');
        $dbhost     = Config::get('npds.dbhost');

        $host = ($mysql_p || !isset($mysql_p)) ? 'p:' . $dbhost : $dbhost;

        $dblink = mysqli_init();
        $dblink->options(MYSQLI_OPT_CONNECT_TIMEOUT, 10);
        $dblink->options(MYSQLI_INIT_COMMAND, "SET NAMES 'utf8mb4' COLLATE 'utf8mb4_unicode_ci'");
        $dblink->options(MYSQLI_SET_CHARSET_NAME, "utf8mb4");

        if (!$dblink->real_connect($host, Config::get('npds.dbuname'), Config::get('npds.dbpass'), Config::get('npds.dbname'))) {
            throw new \mysqli_sql_exception('Impossible de se connecter à la base de données');
        }

        return $dblink;

    } catch (\mysqli_sql_exception $e) {
        $mysql_error = $e->getMessage();

        error_log("Erreur de connexion SQL : " . $mysql_error);

        // if (defined('NPDS_DEBUG') && NPDS_DEBUG) {
        if (Config::has('npds.debugmysql') && Config::get('npds.debugmysql')) {
            Ecr_Log('mysql', "Erreur de connexion SQL :" . $mysql_error, "");
        }

        return false;
    }
}

/**
 * Erreur survenue
 *
 * @return string
 */
function sql_error()
{
    global $dblink;

    if (!$dblink) {
        return "Pas de connexion à la base de données";
    }

    $error = mysqli_error($dblink);

    if ($error) {
        // Log l'erreur pour le debugging
        error_log("Erreur SQL : " . $error);
    }

    return $error;
}
 
/**
 * Exécution de requête
 *
 * @param   string  $sql  [$sql description]
 *
 * @return  \mysqli_result|true
 */
function sql_query(string $sql) 
{
    global $sql_nbREQ, $dblink;

    $sql_nbREQ++;

    //var_dump($sql);// affiche toutes les requêtes du portail //
    // Fonction d'échappement améliorée
    $escape_value = function($value) use ($dblink) {

        // D'abord on retire les slashes existants
        $value = stripslashes($value);

        // On échappe avec mysqli_real_escape_string
        $value = mysqli_real_escape_string($dblink, $value);

        // Debug
        if (defined('NPDS_DEBUG') && NPDS_DEBUG) {
            error_log("Valeur avant échappement : " . $value);
            error_log("Valeur après échappement : " . $value);
        }

        return $value;
    };

    if (stripos($sql, 'INSERT') === 0 || stripos($sql, 'UPDATE') === 0) {
       $pattern = '/^(INSERT\s+INTO.*?VALUES\s*\()(.*)(\))$|^(UPDATE.*?SET\s+)(.*?)(\s*WHERE.*|\s*$)/is';

        if (preg_match($pattern, $sql, $matches)) {
            // INSERT
            if (!empty($matches[2])) { 
                $values = $matches[2];

                // On traite chaque valeur entre guillemets
                $values = preg_replace_callback('/\'((?:[^\'\\\\]|\\\\.)*)\'/s',
                    function($m) use ($escape_value) {
                        return "'" . $escape_value($m[1]) . "'";
                    },
                    $values
                );

                $sql = $matches[1] . $values . $matches[3];
            }
            // UPDATE
            elseif (!empty($matches[5])) { 
                $values = $matches[5];
                $values = preg_replace_callback('/=\s*\'((?:[^\'\\\\]|\\\\.)*)\'/s',
                    function($m) use ($escape_value) {
                        return "= '" . $escape_value($m[1]) . "'";
                    },
                    $values
                );

                $sql = $matches[4] . $values . $matches[6];
            }
        }
    }

    if (defined('NPDS_DEBUG') && NPDS_DEBUG) {
        error_log("Requête finale : " . $sql);

        Ecr_Log('mysql', 'Requête finale : ' . $sql, '');
    }

    $query_id = mysqli_query($dblink, $sql);

    if (!$query_id) {
        // Utilisation de sql_error() pour récupérer l'erreur de requête
        $error = sql_error();

        error_log("Échec de la requête : $sql - Erreur : $error");

        if (defined('NPDS_DEBUG') && NPDS_DEBUG) { 
            Ecr_Log('mysql', 'Échec de la requête : '.$sql.' - Erreur :'.$error, "");
        } 

       return false;
    }

    return $query_id;
 }

/**
 * Undocumented function
 *
 * @param [string $table
 * @param mixed $query
 *
 * @return  \mysqli_result|true
 */
function sql_update(string $table, mixed $query)
{
    return sql_query("UPDATE " . sql_prefix($table) ." ". $query);
}

/**
 * Undocumented function
 *
 * @param string $table
 * @param string $champs
 * @param mixed $query
 * 
 * @return array|false|null
 */
function sql_select_fetch_assoc(string $table, string $champs = '*', mixed $query = null)
{
    return sql_fetch_assoc(sql_query("SELECT ". $champs ." FROM " . sql_prefix($table) ." ". !is_null($query) ?: $query));
}
 
/**
 * Undocumented function
 *
 * @param string $table
 * @param string $champs
 * @param mixed $query
 * 
 * @return string|int
 */
function sql_select_num_rows(string $table, string $champs = '*', mixed $query = null)
{
    return sql_num_rows(sql_query("SELECT ". $champs ." FROM " . sql_prefix($table) ." ". !is_null($query) ?: $query));
}

/**
 * Undocumented function
 *
 * @param string $table
 * @param string $champs
 * @param mixed $query
 * 
 * @return array|false|null
 */
function sql_select_fetch_array(string $table, string $champs = '*', mixed $query = null)
{
    return sql_fetch_array(sql_query("SELECT ". $champs ." FROM " . sql_prefix($table) ." ". !is_null($query) ?: $query));
}

/**
 * [sql_fetch_assoc description]
 *
 * @param   \mysqli_result|string  $q_id  [$q_id description]
 *
 * @return  array|false|null
 */
function sql_fetch_assoc(\mysqli_result|string $q_id = '')
{
    if (empty($q_id)) {
        global $query_id;

        $q_id = $query_id;
    }

    return mysqli_fetch_assoc($q_id);
}

/**
 * [sql_fetch_row description]
 *
 * @param   \mysqli_result|string  $q_id  [$q_id description]
 *
 * @return  array|false|null
 */
function sql_fetch_row(\mysqli_result|string $q_id = '')
{
    if (empty($q_id)) {
        global $query_id;

        $q_id = $query_id;
    }

    return mysqli_fetch_row($q_id);
}

/**
 * Tableau du résultat
 *
 * @param   \mysqli_result|string  $q_id  [$q_id description]
 *
 * @return  array|false|null
 */
function sql_fetch_array(\mysqli_result|string $q_id = '')
{
    if (empty($q_id)) {
        global $query_id;

        $q_id = $query_id;
    }

    return mysqli_fetch_array($q_id);
}

/**
 * Resultat sous forme d'objet
 *
 * @param   \mysqli_result|string  $q_id  [$q_id description]
 *
 * @return  \stdClass|null|false
 */
function sql_fetch_object(\mysqli_result|string $q_id = '')
{
    if (empty($q_id)) {
        global $query_id;

        $q_id = $query_id;
    }

    return mysqli_fetch_object($q_id);
}
 
/**
 * Nombre de lignes d'un résultat
 *
 * @param   \mysqli_result|string  $q_id  [$q_id description]
 *
 * @return  int
 */
function sql_num_rows(\mysqli_result|string $q_id = '')
{
    if (empty($q_id)) {
        global $query_id;

        $q_id = $query_id;
    }

    return mysqli_num_rows($q_id);
}
 
/**
 * Nombre de champs d'une requête
 *
 * @param   \mysqli_result|string  $q_id  [$q_id description]
 *
 * @return  int
 */
function sql_num_fields(\mysqli_result|string $q_id = '')
{
    global $dblink;

    if (empty($q_id)) {
        global $query_id;

        $q_id = $query_id;
    }

    return mysqli_field_count($dblink);
}
 
/**
 * Nombre de lignes affectées par les requêtes de type INSERT, UPDATE et DELETE
 *
 * @return  string|int
 */
function sql_affected_rows()
{
    global $dblink;

    return mysqli_affected_rows($dblink);
}

/**
 * Le dernier identifiant généré par un champ de type AUTO_INCREMENT
 *
 * @return  string|int
 */
function sql_last_id()
{
    global $dblink;

    return mysqli_insert_id($dblink);
}

/**
 * Lister les tables
 *
 * @param   string  $dbnom  [$dbnom description]
 *
 * @return  \mysqli_result|true
 */
function sql_list_tables(string $dbnom = '')
{
    if (empty($dbnom)) {
        global $dbname;

        $dbnom = $dbname;
    }

    return sql_query("SHOW TABLES FROM $dbnom");
}
 
/**
 * Contrôle
 *
 * @return  bool
 */
function sql_select_db()
{
    global $dblink;

    if (!mysqli_select_db($dblink, Config::get('npds.dbname'))) {
        return false;
    } else {
        return true;
    }
}

/**
 * Libère toute la mémoire et les ressources utilisées par la requête $query_id
 *
 * @param   \mysqli_result|array  $q_id  [$q_id description]
 *
 * @return  void
 */
function sql_free_result(\mysqli_result|array $q_id)
{
    if ($q_id instanceof \mysqli_result) {
        return mysqli_free_result($q_id);
    }
}

/**
 * Ferme la connexion avec la Base de données
 *
 * @return true|void
 */
function sql_close()
{
    global $dblink;

    if (!Config::get('npds.mysql_p')) {
        return mysqli_close($dblink);
    }
}

/**
 * Count total.
 *
 * @param string $table
 * @param string $key
 * 
 * @returnarray|false|null
 */
function sql_count(string $table, string $key = 'total')
{
    return sql_fetch_assoc(sql_query("SELECT COUNT(*) AS " . $key . " FROM " . sql_prefix($table)));
}

/**
 * Return la table préfixer.
 *
 * @param string $table
 * 
 * @return string
 */
function sql_prefix(string $table)
{
    return Config::get('npds.NPDS_Prefix') . $table;
}
