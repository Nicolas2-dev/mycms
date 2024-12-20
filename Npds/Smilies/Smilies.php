<?php

declare(strict_types=1);

namespace Npds\Smilies;


/**
 * Undocumented class
 */
class Smilies 
{

    /**
     * Instance Smilies.
     *
     * @var \Npds\Smilies $instance
     */
    protected static Smilies $instance;

    /**
     * Constructeur.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get instance class Smilies.
     *
     * @return \Npds\Smilies $instance
     */
    public static function getInstance()
    {
        if (isset(static::$instance)) {
            return static::$instance;
        }

        return static::$instance = new static();
    }

    function smilie($message)
    {
        // Tranforme un :-) en IMG
        global $theme;
    
        if (theme_image("forum/smilies/smilies.php")) {
            $imgtmp = "themes/$theme/images/forum/smilies/";
        } else {
            $imgtmp = "public/assets/images/forum/smilies/";
        }
    
        if (file_exists($imgtmp . "smilies.php")) {
            include($imgtmp . "smilies.php");
    
            foreach ($smilies as $tab_smilies) {
                $suffix = strtoLower(substr(strrchr($tab_smilies[1], '.'), 1));
    
                if (($suffix == "gif") or ($suffix == "png")) {
                    $message = str_replace($tab_smilies[0], "<img class='n-smil' src='" . $imgtmp . $tab_smilies[1] . "' loading='lazy' />", $message);
                } else {
                    $message = str_replace($tab_smilies[0], $tab_smilies[1], $message);
                }
            }
        }
    
        if (theme_image("forum/smilies/more/smilies.php")) {
            $imgtmp = "themes/$theme/images/forum/smilies/more/";
        } else {
            $imgtmp = "public/assets/images/forum/smilies/more/";
        }
    
        if (file_exists($imgtmp . "smilies.php")) {
            include($imgtmp . "smilies.php");
    
            foreach ($smilies as $tab_smilies) {
                $message = str_replace($tab_smilies[0], "<img class='n-smil' src='" . $imgtmp . $tab_smilies[1] . "' loading='lazy' />", $message);
            }
        }
    
        return $message;
    }
    
    function smile($message)
    {
        // Tranforme une IMG en :-)
        global $theme;
    
        if (theme_image("forum/smilies/smilies.php")) {
            $imgtmp = "themes/$theme/images/forum/smilies/";
        } else {
            $imgtmp = "public/assets/images/forum/smilies/";
        }
    
        if (file_exists($imgtmp . "smilies.php")) {
            include($imgtmp . "smilies.php");
    
            foreach ($smilies as $tab_smilies) {
                $message = str_replace("<img class='n-smil' src='" . $imgtmp . $tab_smilies[1] . "' loading='lazy' />", $tab_smilies[0], $message);
            }
        }
    
        if (theme_image("forum/smilies/more/smilies.php")) {
            $imgtmp = "themes/$theme/images/forum/smilies/more/";
        } else {
            $imgtmp = "public/assets/images/forum/smilies/more/";
        }
    
        if (file_exists($imgtmp . "smilies.php")) {
            include($imgtmp . "smilies.php");
    
            foreach ($smilies as $tab_smilies) {
                $message = str_replace("<img class='n-smil' src='" . $imgtmp . $tab_smilies[1] . "' loading='lazy' />", $tab_smilies[0],  $message);
            }
        }
    
        return $message;
    }
    
    // ne fonctionne pas dans tous les contextes car on a pas la variable du theme !?
    function putitems_more()
    {
        global $theme, $tmp_theme;
    
        if (stristr($_SERVER['PHP_SELF'], "more_emoticon.php")) {
            $theme = $tmp_theme;
        }
    
        echo '<p align="center">' . translate("Cliquez pour insérer des émoticons dans votre message") . '</p>';
    
        if (theme_image("forum/smilies/more/smilies.php")) {
            $imgtmp = "themes/$theme/images/forum/smilies/more/";
        } else {
            $imgtmp = "public/assets/images/forum/smilies/more/";
        }
    
        if (file_exists($imgtmp . "smilies.php")) {
            include($imgtmp . "smilies.php");
    
            echo '<div>';
    
            foreach ($smilies as $tab_smilies) {
                if ($tab_smilies[3]) {
                    echo '<span class ="d-inline-block m-2"><a href="#" onclick="javascript: DoAdd(\'true\',\'message\',\' ' . $tab_smilies[0] . '\');"><img src="' . $imgtmp . $tab_smilies[1] . '" width="32" height="32" alt="' . $tab_smilies[2];
                    
                    if ($tab_smilies[2]) {
                        echo ' => ';
                    }
    
                    echo $tab_smilies[0] . '" loading="lazy" /></a></span>';
                }
            }
    
            echo '</div>';
        }
    }
    
    #autodoc putitems($targetarea) : appel un popover pour la saisie des emoji (Unicode v13) dans un textarea défini par $targetarea
    function putitems($targetarea)
    {
        echo '
        <div title="' . translate("Cliquez pour insérer des emoji dans votre message") . '" data-bs-toggle="tooltip">
            <button class="btn btn-link ps-0" type="button" id="button-textOne" data-bs-toggle="emojiPopper" data-bs-target="#' . $targetarea . '">
                <i class="far fa-smile fa-lg" aria-hidden="true"></i>
            </button>
        </div>
        <script src="public/assets/shared/emojipopper/js/emojiPopper.min.js"></script>
        <script type="text/javascript">
        //<![CDATA[
            $(function () {
                "use strict"
                var emojiPopper = $(\'[data-bs-toggle="emojiPopper"]\').emojiPopper({
                    url: "public/assets/shared/emojipopper/php/emojicontroller.php",
                    title:"Choisir un emoji"
                });
            });
        //]]>
        </script>';
    }
    
    function emotion_add($image_subject)
    {
        global $theme;
    
        if (theme_image('forum/subject/index.html')) {
            $imgtmp = "themes/$theme/images/forum/subject";
        } else {
            $imgtmp = 'public/assets/images/forum/subject';
        }
    
        $handle = opendir($imgtmp);
    
        while (false !== ($file = readdir($handle))) {
            $filelist[] = $file;
        }
    
        asort($filelist);
    
        $temp = '';
        $j = 0;
    
        foreach ($filelist as $key => $file) {
            if (!preg_match('#\.gif|\.jpg|\.png$#i', $file)) {
                continue;
            }
    
            $temp .= '<div class="form-check form-check-inline mb-3">';
    
            if ($image_subject != '') {
                if ($file == $image_subject) {
                    $temp .= '<input type="radio" value="' . $file . '" id="image_subject' . $j . '" name="image_subject" class="form-check-input" checked="checked" />';
                } else {
                    $temp .= '<input type="radio" value="' . $file . '" id="image_subject' . $j . '" name="image_subject" class="form-check-input" />';
                }
            } else {
                $temp .= '<input type="radio" value="' . $file . '" id="image_subject' . $j . '" name="image_subject" class="form-check-input" checked="checked" />';
                $image_subject = 'no image';
            }
    
            $temp .= '<label class="form-check-label" for="image_subject' . $j . '" ><img class="n-smil d-block" src="' . $imgtmp . '/' . $file . '" alt="" loading="lazy" /></label>
            </div>';
    
            $j++;
        }
    
        return $temp;
    }

}
