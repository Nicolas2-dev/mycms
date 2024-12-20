<?php

declare(strict_types=1);

namespace Npds\Crypt;

use Npds\Config\Config;


/**
 * Undocumented class
 */
class Crypt 
{

    /**
     * Instance Crypt.
     *
     * @var \Npds\Crypt\Crypt $instance
     */
    protected static Crypt $instance;


    /**
     * Constructeur.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get instance class Crypt.
     *
     * @return \Npds\Crypt $instance
     */
    public static function getInstance()
    {
        if (isset(static::$instance)) {
            return static::$instance;
        }

        return static::$instance = new static();
    }
 
    /**
     * Composant des fonctions encrypt et decrypt.
     *
     * @param   string  $txt          [$txt description]
     * @param   string  $encrypt_key  [$encrypt_key description]
     *
     * @return  string
     */
    public function keyED(string $txt, string $encrypt_key)
    {
        $encrypt_key = md5($encrypt_key);

        $ctr = 0;
        $tmp = '';

        for ($i = 0; $i < strlen($txt); $i++) {
            if ($ctr == strlen($encrypt_key)) {
                $ctr = 0;
            }

            $tmp .= substr($txt, $i, 1) ^ substr($encrypt_key, $ctr, 1);

            $ctr++;
        }

        return $tmp;
    }

    /**
     * retourne une chaine encryptée en utilisant la valeur de $NPDS_Key.
     *
     * @param   string  $txt  [$txt description]
     *
     * @return  string
     */
    public function encrypt(string $txt)
    {
        return $this->encryptK($txt, Config::get('npds.NPDS_Key'));
    }

    /**
     * retourne une chaine encryptée en utilisant la clef : $C_key.
     *
     * @param   string  $txt    [$txt description]
     * @param   string  $C_key  [$C_key description]
     *
     * @return  string
     */
    public function encryptK(string $txt, string $C_key)
    {
        srand((float) microtime() * 1000000);

        $encrypt_key = md5(rand(0, 32000));

        $ctr = 0;
        $tmp = '';

        for ($i = 0; $i < strlen($txt); $i++) {
            if ($ctr == strlen($encrypt_key)) {
                $ctr = 0;
            }

            $tmp .= substr($encrypt_key, $ctr, 1) . (substr($txt, $i, 1) ^ substr($encrypt_key, $ctr, 1));

            $ctr++;
        }

        return base64_encode($this->keyED($tmp, $C_key));
    }

    /**
     * retourne une chaine décryptée en utilisant la valeur de $NPDS_Key.
     *
     * @param   string  $txt  [$txt description]
     *
     * @return  string
     */
    public function decrypt(string $txt)
    {   
        return $this->decryptK($txt, Config::get('npds.NPDS_Key'));
    }

    /**
     * retourne une décryptée en utilisant la clef de $C_Key.
     *
     * @param   string  $txt    [$txt description]
     * @param   string  $C_key  [$C_key description]
     *
     * @return  string
     */
    public function decryptK(string $txt, string $C_key)
    {
        $txt = $this->keyED(base64_decode($txt), $C_key);
        $tmp = '';

        for ($i = 0; $i < strlen($txt); $i++) {
            $md5 = substr($txt, $i, 1);
            
            $i++;

            $tmp .= (substr($txt, $i, 1) ^ $md5);
        }

        return $tmp;
    }

}
