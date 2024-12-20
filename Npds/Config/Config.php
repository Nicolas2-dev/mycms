<?php

declare(strict_types=1);

namespace Npds\Config;

use Npds\Support\Arr;


/**
 * [Config description]
 */
class Config
{
    /**
     * Le tableaux de toutes la configuration.
     *
     * @var array
     */
    protected static $options = array();


    /**
     * Chargement des fichiers de configuration.
     *
     * @return  void
     */
    public static function load() 
    {
        // provisoire
        $folder = 'Tabs';
        
        foreach(glob(config_path($folder .'/*.php')) as $path) {
            $key = lcfirst(pathinfo($path, PATHINFO_FILENAME));

            static::set($key, require($path));
        }

        static::convertNpdsConfig();
    }

    /**
     * Convertion de la configuration Général.
     *
     * @return  void
     */
    private static function convertNpdsConfig()
    {
        include(config_path('Config.php'));

        static::set('npds.dbhost',                  $dbhost );
        static::set('npds.dbuname',                 $dbuname);
        static::set('npds.dbpass',                  $dbpass);
        static::set('npds.dbname',                  $dbname);
        static::set('npds.mysql_p',                 $mysql_p);
        static::set('npds.mysql_i',                 $mysql_i);
        static::set('npds.debugmysql',              $debugmysql);
        static::set('npds.parse',                   $parse);
        static::set('npds.gzhandler',               $gzhandler);
        static::set('npds.admin_cook_duration',     $admin_cook_duration);
        static::set('npds.user_cook_duration',      $user_cook_duration);
        static::set('npds.sitename',                $sitename);
        static::set('npds.Titlesitename',           $Titlesitename);
        static::set('npds.nuke_url',                $nuke_url);
        static::set('npds.site_logo',               $site_logo);
        static::set('npds.slogan',                  $slogan);
        static::set('npds.startdate',               $startdate);
        static::set('npds.anonpost',                $anonpost);
        static::set('npds.troll_limit',             $troll_limit);
        static::set('npds.moderate',                $moderate);
        static::set('npds.mod_admin_news',          $mod_admin_news);
        static::set('npds.not_admin_count',         $not_admin_count);
        static::set('npds.Default_Theme',           $Default_Theme);
        static::set('npds.Default_Skin',            $Default_Skin);
        static::set('npds.Start_Page',              $Start_Page);
        static::set('npds.foot1',                   $foot1);
        static::set('npds.foot2',                   $foot2);
        static::set('npds.foot3',                   $foot3);
        static::set('npds.foot4',                   $foot4);
        static::set('npds.anonymous',               $anonymous);
        static::set('npds.minpass',                 $minpass);
        static::set('npds.show_user',               $show_user);
        static::set('npds.top',                     $top);
        static::set('npds.storyhome',               $storyhome);
        static::set('npds.oldnum',                  $oldnum);
        static::set('npds.banners',                 $banners);
        static::set('npds.myIP',                    $myIP);
        static::set('npds.backend_title',           $backend_title);
        static::set('npds.backend_language',        $backend_language);
        static::set('npds.backend_image',           $backend_image);
        static::set('npds.backend_width',           $backend_width);
        static::set('npds.backend_height',          $backend_height);
        static::set('npds.ultramode',               $ultramode);
        static::set('npds.npds_twi',                $npds_twi);
        static::set('npds.npds_fcb',                $npds_fcb);
        static::set('npds.language',                $language);
        static::set('npds.multi_langue',            $multi_langue);
        static::set('npds.locale',                  $locale);
        static::set('npds.gmt',                     $gmt);
        static::set('npds.lever',                   $lever);
        static::set('npds.coucher',                 $coucher);
        static::set('npds.perpage',                 $perpage);
        static::set('npds.popular',                 $popular);
        static::set('npds.newlinks',                $newlinks);
        static::set('npds.toplinks',                $toplinks);
        static::set('npds.linksresults',            $linksresults);
        static::set('npds.links_anonaddlinklock',   $links_anonaddlinklock);
        static::set('npds.linkmainlogo',            $linkmainlogo);
        static::set('npds.OnCatNewLink',            $OnCatNewLink);
        static::set('npds.adminmail',               $adminmail);
        static::set('npds.mail_fonction',           $mail_fonction);
        static::set('npds.notify',                  $notify);
        static::set('npds.notify_email',            $notify_email);
        static::set('npds.notify_subject',          $notify_subject);
        static::set('npds.notify_message',          $notify_message);
        static::set('npds.notify_from',             $notify_from);
        static::set('npds.maxOptions',              $maxOptions);
        static::set('npds.setCookies',              $setCookies);
        static::set('npds.pollcomm',                $pollcomm);
        static::set('npds.tipath',                 $tipath);
        static::set('npds.userimg',                 $userimg);
        static::set('npds.adminimg',                $adminimg);
        static::set('npds.short_menu_admin',        $short_menu_admin);
        static::set('npds.admingraphic',            $admingraphic);
        static::set('npds.admf_ext',                $admf_ext);
        static::set('npds.admart',                  $admart);
        static::set('npds.httpref',                 $httpref);
        static::set('npds.httprefmax',              $httprefmax);
        static::set('npds.smilies',                 $smilies);
        static::set('npds.avatar_size',             $avatar_size);
        static::set('npds.short_user',              $short_user);
        static::set('npds.member_list',             $member_list);
        static::set('npds.download_cat',            $download_cat);
        static::set('npds.AutoRegUser',             $AutoRegUser);
        static::set('npds.short_review',            $short_review);
        static::set('npds.subscribe',               $subscribe);
        static::set('npds.member_invisible',        $member_invisible);
        static::set('npds.CloseRegUser',            $CloseRegUser);
        static::set('npds.memberpass',              $memberpass);
        static::set('npds.rss_host_verif',          $rss_host_verif);
        static::set('npds.cache_verif',             $cache_verif);
        static::set('npds.dns_verif',               $dns_verif);
        static::set('npds.savemysql_size',          $savemysql_size);
        static::set('npds.savemysql_mode',          $savemysql_mode);
        static::set('npds.tiny_mce',                $tiny_mce);
        static::set('npds.NPDS_Prefix',             $NPDS_Prefix);
        static::set('npds.NPDS_Key',                $NPDS_Key);
        static::set('npds.Version_Num',             $Version_Num);
        static::set('npds.Version_Id',              $Version_Id);
        static::set('npds.Version_Sub',             $Version_Sub);
        static::set('npds.timezone',                'Europe/Paris');
    }

    /**
     * Retourne le tableau complet de la configuration.
     *
     * @return  array
     */
    public static function all()
    {
        return static::$options;
    }

    /**
     * Verifie si la clée existe dans le tableau de configuration.
     *
     * @param   mixed  $key  Clée de configuration.
     *
     * @return  bool
     */
    public static function has(mixed $key)
    {
        return Arr::has(static::$options, $key);
    }

    /**
     * Retourne la valeur de la clée de configuration.
     *
     * @param   mixed  $key      Clée de configuration.
     * @param   mixed  $default  Valeur par default pour la clée si elle et vide ou null.
     *
     * @return  mixed
     */
    public static function get(mixed $key, mixed $default = null)
    {
        return Arr::get(static::$options, $key, $default);
    }

    /**
     * On attribut une valeur la la clée de configuration.
     *
     * @param   mixed  $key     Clée de configuration.
     * @param   mixed  $value   Valeur de la clée.
     *
     * @return  void
     */
    public static function set(mixed $key, mixed $value)
    {
        Arr::set(static::$options, $key, $value);
    }

}