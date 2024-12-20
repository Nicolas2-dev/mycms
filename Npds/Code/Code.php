<?php

declare(strict_types=1);

namespace Npds\Code;


/**
 * Undocumented class
 */
class Code 
{

    /**
     * Instance Code.
     *
     * @var \Npds\Code\Code $instance
     */
    protected static Code $instance;


    /**
     * Constructeur.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get instance class Code.
     *
     * @return \Npds\Code $instance
     */
    public static function getInstance()
    {
        if (isset(static::$instance)) {
            return static::$instance;
        }

        return static::$instance = new static();
    }

    /**
     * Analyse le contenu d'une chaîne et converti les pseudo-balises [code]...[/code] et leur contenu en html
     *
     * @param   array  $r  [$r description]
     *
     * @return  string
     */
    public function change_cod(array $r)
    {
        return '<' . $r[2] . ' class="language-' . $r[3] . '">' . htmlentities($r[5], ENT_COMPAT | ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401, 'UTF-8') . '</' . $r[2] . '>';
    }

    /**
     * [af_cod description]
     *
     * @param   string  $ibid  [$ibid description]
     *
     * @return  string
     */
    public function af_cod(string $ibid)
    {
        $pat = '#(\[)(\w+)\s+([^\]]*)(\])(.*?)\1/\2\4#s';
        $ibid = preg_replace_callback($pat, [__CLASS__, 'change_cod'], $ibid, -1, $nb);
        // $ibid= str_replace(array("\r\n", "\r", "\n"), "<br />",$ibid);

        return $ibid;
    }

    /**
     * Analyse le contenu d'une chaîne et converti les balises html <code>...</code> en pseudo-balises [code]...[/code].
     *
     * @param   string  $ibid  [$ibid description]
     *
     * @return  array|string|null
     */
    public function desaf_cod(string $ibid)
    {
        $pat = '#(<)(\w+)\s+(class="language-)([^">]*)(">)(.*?)\1/\2>#';
        
        function rechange_cod($r)
        {
            return '[' . $r[2] . ' ' . $r[4] . ']' . $r[6] . '[/' . $r[2] . ']';
        }

        return preg_replace_callback($pat, 'rechange_cod', $ibid, -1);
    }
 
    /**
     * Analyse le contenu d'une chaîne et converti les balises [code]...[/code]
     *
     * @param   string  $ibid  [$ibid description]
     *
     * @return  string
     */
    public function aff_code(string $ibid)
    {
        $pasfin = true;

        while ($pasfin) {
            $pos_deb = strpos($ibid, "[code]", 0);
            $pos_fin = strpos($ibid, "[/code]", 0);

            // ne pas confondre la position ZERO et NON TROUVE !
            if ($pos_deb === false) {
                $pos_deb = -1;
            }

            if ($pos_fin === false) {
                $pos_fin = -1;
            }

            if (($pos_deb >= 0) and ($pos_fin >= 0)) {
                ob_start();
                    highlight_string(substr($ibid, $pos_deb + 6, ($pos_fin - $pos_deb - 6)));
                    $fragment = ob_get_contents();
                ob_end_clean();

                $ibid = str_replace(substr($ibid, $pos_deb, ($pos_fin - $pos_deb + 7)), $fragment, $ibid);
            } else {
                $pasfin = false;
            }
        }

        return $ibid;
    }

}
