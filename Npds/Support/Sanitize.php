<?php

declare(strict_types=1);

namespace Npds\Support;

use Npds\Support\Facades\Mailer;


/**
 * [Sanitize description]
 */
class Sanitize
{
 
    /**
     * Quote une chaîne contenant des '
     *
     * @param   string  $what  [$what description]
     *
     * @return  string
     */
    public static function FixQuotes(string $what = '')
    {
        $what = str_replace(["&#39;", "'"], ["'", "''"], $what);
        
        while (preg_match("#\\\\'#", $what)) {
            $what = preg_replace("#\\\\'#", "'", $what);
        }

        return $what;
    }

    /**
     * [make_clickable description]
     *
     * @param   string  $text  [$text description]
     *
     * @return  string
     */
    public static function make_clickable(string $text)
    {
        $ret = '';
        $ret = preg_replace('#(^|\s)(http|https|ftp|sftp)(://)([^\s]*)#i', ' <a href="$2$3$4" target="_blank">$2$3$4</a>', $text);
        $ret = preg_replace_callback('#([_\.0-9a-z-]+@[0-9a-z-\.]+\.+[a-z]{2,4})#i', [Mailer::class, 'fakedmail'], $ret);

        return $ret;
    }

    /**
     * [undo_htmlspecialchars description]
     *
     * @param   string  $input  [$input description]
     *
     * @return  string
     */
    public static function undo_htmlspecialchars(string $input)
    {
        $input = preg_replace("/&gt;/i", ">", $input);
        $input = preg_replace("/&lt;/i", "<", $input);
        $input = preg_replace("/&quot;/i", "\"", $input);
        $input = preg_replace("/&amp;/i", "&", $input);

        return $input;
    }

    /**
     * Découpe la chaine en morceau de $slpit longueur si celle-ci ne contient pas d'espace / Snipe 2004
     *
     * @param   string  $msg    [$msg description]
     * @param   string  $split  [$split description]
     *
     * @return  string
     */
    public static function split_string_without_space(string $msg, string $split)
    {
        $Xmsg = explode(' ', $msg);
        array_walk($Xmsg, [Sanitize::class, 'wrapper_f'], $split);
        $Xmsg = implode(' ', $Xmsg);

        return $Xmsg;
    }
 
    /**
     * Fonction Wrapper pour split_string_without_space / Snipe 2004
     *
     * @param   string  $string  [$string description]
     * @param   string  $key     [$key description]
     * @param   string  $cols    [$cols description]
     *
     * @return  void
     */
    public static function wrapper_f(string &$string, string $key, string $cols)
    {
        //   if (!(stristr($string,'IMG src=') or stristr($string,'A href=') or stristr($string,'HTTP:') or stristr($string,'HTTPS:') or stristr($string,'MAILTO:') or stristr($string,'[CODE]'))) {
        $outlines = '';

        if (strlen($string) > $cols) {
            while (strlen($string) > $cols) {
                $cur_pos = 0;

                for ($num = 0; $num < $cols - 1; $num++) {
                    $outlines .= $string[$num];
                    $cur_pos++;

                    if ($string[$num] == "\n") {
                        $string = substr($string, $cur_pos, (strlen($string) - $cur_pos));
                        $cur_pos = 0;
                        $num = 0;
                    }
                }

                $outlines .= '<i class="fa fa-cut fa-lg"> </i>';
                $string = substr($string, $cur_pos, (strlen($string) - $cur_pos));
            }

            $string = $outlines . $string;
        }
        //   }
    }
 
    /**
     * Encode une chaine UF8 au format javascript - JPB 2005
     *
     * @param   string  $ibid  [$ibid description]
     *
     * @return  string
     */
    public static function utf8_java(string $ibid)
    {
        // UTF8 = &#x4EB4;&#x6B63;&#7578; / javascript = \u4EB4\u6B63\u.dechex(7578)
        foreach (explode('&#', $ibid) as $bidon) {
            if ($bidon) {
                $bidon = substr($bidon, 0, strpos($bidon, ";"));
                $hex = strpos($bidon, 'x');

                $ibid = ($hex === false) 
                    ? str_replace('&#' . $bidon . ';', '\\u' . dechex((int)$bidon), $ibid) 
                    : str_replace('&#' . $bidon . ';', '\\u' . substr($bidon, 1), $ibid);
            }
        }

        return $ibid;
    }
 
    /**
     * Formate une chaine numérique avec un espace tous les 3 chiffres / cheekybilly 2005
     *
     * @param   string  $ibid  [$ibid description]
     *
     * @return  string
     */
    public static function wrh(string $ibid)
    {
        $tmp = number_format($ibid, 0, ',', ' ');
        $tmp = str_replace(' ', '&nbsp;', $tmp);

        return $tmp;
    }
 
    /**
     * convertie \r \n  BR ... en br XHTML
     *
     * @param   string  $txt  [$txt description]
     *
     * @return  string 
     */
    public static function conv2br(string $txt)
    {
        $Xcontent = str_replace("\r\n", "<br />", $txt);
        $Xcontent = str_replace("\r", "<br />", $Xcontent);
        $Xcontent = str_replace("\n", "<br />", $Xcontent);
        $Xcontent = str_replace("<BR />", "<br />", $Xcontent);
        $Xcontent = str_replace("<BR>", "<br />", $Xcontent);

        return $Xcontent;
    }
  
    /**
     * Les 8 premiers caractères sont convertis en UNE valeur Hexa unique
     *
     * @param   string  $txt  [$txt description]
     *
     * @return  string
     */
    public static function hexfromchr(string $txt)
    {
        $surlignage = substr(md5($txt), 0, 8);
        $tmp = 0;

        for ($ix = 0; $ix <= 5; $ix++) {
            $tmp += hexdec($surlignage[$ix]) + 1;
        }

        return ($tmp %= 16);
    }

    /**
     * [changetoamp description]
     *
     * @param   array  $r  [$r description]
     *
     * @return  string
     */
    public static function changetoamp(array $r)
    {
        return str_replace('&', '&amp;', $r[0]);
    } 

    /**
     * [changetoampadm description]
     *
     * @param   array  $r  [$r description]
     *
     * @return  string
     */
    public static function changetoampadm(array $r)
    {
        return str_replace('&', '&amp;', $r[0]);
    }

    /**
     * Remplacement des balise <br> par une chaine vide.
     *
     * @param   string  $contentX  contenue du block.
     *
     * @return  string
     */
    public static function replaceBR(string $contentX)
    {
        return str_replace(
            ['<br />', '<BR />', '<BR>'], 
            ['', '', ''], 
            $contentX
        );
    }

}
