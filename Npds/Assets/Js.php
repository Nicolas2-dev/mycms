<?php

declare(strict_types=1);

namespace Npds\Assets;

use Npds\Cache\Cache;


/**
 * Class de chargement js.
 */
class Js 
{

    /**
     * Instance Js.
     *
     * @var \Npds\Assets\Js $instance
     */
    protected static Js $instance;

    /**
     * Instance Cache.
     *
     * @var \Npds\Cache\Cache $instance
     */
    protected static Cache $cache;


    /**
     * Constructeur.
     */
    public function __construct()
    {
        $this->cache = Cache::getInstance();
    }

    /**
     * Get instance class Js.
     *
     * @return \Npds\Assets\Js $instance
     */
    public static function getInstance()
    {
        if (isset(static::$instance)) {
            return static::$instance;
        }

        return static::$instance = new static();
    }

    /**
     * Fabrique un array js à partir de la requete sql et implente un auto complete pour l'input. 
     * Dependence : jquery.min.js, jquery-ui.js 
     *
     * @param   string  $nom_array_js  Nom du tableau javascript.
     * @param   string  $nom_champ     Nom des champs de la table.
     * @param   string  $nom_table     Nom de la table sql.
     * @param   string  $id_input      Nom je champ input html pour le js.
     * @param   string  $temps_cache   Temps de cache de la requête, Si $id_inpu n'est pas défini retourne un array js.
     *
     * @return  string
     */
    public function auto_complete(string $nom_array_js, string $nom_champ, string $nom_table, string $id_input, string $temps_cache)
    {
        $list_json = '';
        $list_json .= 'var ' . $nom_array_js . ' = [';

        $res = $this->cache->Q_select("SELECT " . $nom_champ . " FROM " . sql_prefix($nom_table), $temps_cache);

        foreach ($res as $ar_data) {
            foreach ($ar_data as $val_champ) {
                if ($id_input == '') {
                    $list_json .= '"' . base64_encode($val_champ) . '",';
                } else {
                    $list_json .= '"' . $val_champ . '",';
                }
            }
        }

        $list_json = rtrim($list_json, ',');
        $list_json .= '];';
        $scri_js = '';

        if ($id_input == '') {
            $scri_js .= $list_json;
        } else {
            $scri_js .= '
            <script type="text/javascript">
                //<![CDATA[
                    $(function() {
                    ' . $list_json;

            if ($id_input != '') {
                $scri_js .= '
                        $( "#' . $id_input . '" ).autocomplete({
                            source: ' . $nom_array_js . '
                        });';
            }

            $scri_js .= '
                    });
                //]]>
            </script>';
        }

        return $scri_js;
    }

    /**
     * Fabrique un pseudo array json à partir de la requete sql et implente un auto complete pour le champ input. 
     * Dependence : jquery-2.1.3.min.js , jquery-ui.js
     *
     * @param   string  $nom_array_js  Nom du tableau javascript.
     * @param   string  $nom_champ     Nom des champs de la table.
     * @param   string  $nom_table     Nom de la table sql.
     * @param   string  $id_input      Nom je champ input html pour le js.
     * @param   string  $req           Requete sql.
     *
     * @return  string
     */
    public function auto_complete_multi(string $nom_array_js, string $nom_champ, string $nom_table, string $id_input, string $req)
    {
        $list_json = '';
        $list_json .= $nom_array_js . ' = [';

        $res = sql_query("SELECT " . $nom_champ . " FROM " . sql_prefix($nom_table) . " " . $req);

        while (list($nom_champ) = sql_fetch_row($res)) {
            $list_json .= '\'' . $nom_champ . '\',';
        }

        $list_json = rtrim($list_json, ',');
        $list_json .= '];';

        $scri_js = '';
        $scri_js .= '
            <script type="text/javascript">
                //<![CDATA[
                    var ' . $nom_array_js . ';
                    $(function() {
                        ' . $list_json . '
                        function split( val ) {
                            return val.split( /,\s*/ );
                        }
                        function extractLast( term ) {
                            return split( term ).pop();
                        }
                        $( "#' . $id_input . '" )
                        // dont navigate away from the field on tab when selecting an item
                        .bind( "keydown", function( event ) {
                            if ( event.keyCode === $.ui.keyCode.TAB && $( this ).autocomplete( "instance" ).menu.active ) {
                                event.preventDefault();
                            }
                        })
                        .autocomplete({
                            minLength: 0,
                            source: function( request, response ) {
                                response( $.ui.autocomplete.filter(
                                    ' . $nom_array_js . ', extractLast( request.term ) ) );
                            },
                            focus: function() {
                                return false;
                            },
                            select: function( event, ui ) {
                                var terms = split( this.value );
                                terms.pop();
                                terms.push( ui.item.value );
                                terms.push( "" );
                                this.value = terms.join( ", " );
                                return false;
                            }
                        });
                    });
                //]]>
            </script>' . "\n";

        return $scri_js;
    }

}
