<?php

namespace Npds\Media;


/**
 * Undocumented class
 */
class Media 
{

    /**
     * Instance Media.
     *
     * @var \Npds\Media $instance
     */
    protected static Media $instance;

    /**
     * Constructeur.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get instance class Media.
     *
     * @return \Npds\Media $instance
     */
    public static function getInstance()
    {
        if (isset(static::$instance)) {
            return static::$instance;
        }

        return static::$instance = new static();
    }

    #autodoc dataimagetofileurl($base_64_string, $output_path) : Analyse la chaine $base_64_string pour touver "src data:image" SI oui : fabrication de fichiers (gif | png | jpeg) (avec $output_path) - redimensionne l'image si supérieure aux dimensions maxi fixées et remplacement de "src data:image" par "src url", et retourne $base_64_string modifié ou pas
    /** 
     * 
     */
    function dataimagetofileurl($base_64_string, $output_path)
    {
        $rechdataimage = '#src=\\\"(data:image/[^"]+)\\\"#m';
        preg_match_all($rechdataimage, $base_64_string, $dataimages);

        $j = 0;
        $timgw = 800;
        $timgh = 600;
        $ra = rand(1, 999);

        foreach ($dataimages[1] as $imagedata) {
            $datatodecode = explode(',', $imagedata);

            $bin = base64_decode($datatodecode[1]);
            $im = imageCreateFromString($bin);

            if (!$im) {
                die('Image non valide');
            }

            $size = getImageSizeFromString($bin);
            $ext = substr($size['mime'], 6);

            if (!in_array($ext, ['png', 'gif', 'jpeg'])) {
                die('Image non supportée');
            }

            $output_file = $output_path . $j . "_" . $ra . "_" . time() . "." . $ext;
            $base_64_string = preg_replace($rechdataimage, 'class="img-fluid" src="' . $output_file . '" loading="lazy"', $base_64_string, 1);
            
            if ($size[0] > $timgw or $size[1] > $timgh) {
                $timgh = round(($timgw / $size[0]) * $size[1]);
                $timgw = round(($timgh / $size[1]) * $size[0]);

                $th = imagecreatetruecolor($timgw, $timgh);

                imagecopyresampled($th, $im, 0, 0, 0, 0, $timgw, $timgh, $size[0], $size[1]);
                $args = [$th, $output_file];
            } else {
                $args = [$im, $output_file];
            }

            if ($ext == 'png') {
                $args[] = 0;
            } else if ($ext == 'jpeg') {
                $args[] = 100;
            }

            $fonc = "image{$ext}";
            call_user_func_array($fonc, $args);
            
            $j++;
        }

        return $base_64_string;
    }

    #autodoc aff_video_yt($ibid) : analyse et génère un tag à la volée pour les video youtube,vimeo, dailymotion $ibid - JPB 01-2011/18
    function aff_video_yt($ibid)
    {
        $videoprovider = array('yt', 'vm', 'dm');

        foreach ($videoprovider as $v) {
            $pasfin = true;

            while ($pasfin) {
                $pos_deb = strpos($ibid, "[video_$v]", 0);
                $pos_fin = strpos($ibid, "[/video_$v]", 0);

                // ne pas confondre la position ZERO et NON TROUVE !
                if ($pos_deb === false) {
                    $pos_deb = -1;
                }

                if ($pos_fin === false) {
                    $pos_fin = -1;
                }

                if (($pos_deb >= 0) and ($pos_fin >= 0)) {

                    $id_vid = substr($ibid, $pos_deb + 10, ($pos_fin - $pos_deb - 10));
                    $fragment = substr($ibid, 0, $pos_deb);
                    $fragment2 = substr($ibid, ($pos_fin + 11));

                    switch ($v) {
                        case 'yt':
                            if (!defined('CITRON'))
                                $ibid_code = '
                                <div class="ratio ratio-16x9 my-3">
                                <iframe src="https://www.youtube.com/embed/' . $id_vid . '?rel=0" allowfullscreen></iframe>
                                </div>';
                            else
                                $ibid_code = '<div class="youtube_player" videoID="' . $id_vid . '"></div>';
                            break;

                        case 'vm':
                            if (!defined('CITRON'))
                                $ibid_code = '
                                <div class="ratio ratio-16x9 my-3">
                                    <iframe src="https://player.vimeo.com/video/' . $id_vid . '" allowfullscreen="" frameborder="0"></iframe>
                                </div>';
                            else
                                $ibid_code = '<div class="vimeo_player" videoID="' . $id_vid . '"></div>';
                            break;

                        case 'dm':
                            if (!defined('CITRON'))
                                $ibid_code = '
                                <div class="ratio ratio-16x9 my-3">
                                    <iframe src="https://www.dailymotion.com/embed/video/' . $id_vid . '" allowfullscreen="" frameborder="0"></iframe>
                                </div>';
                            else
                                $ibid_code = '<div class="dailymotion_player" videoID="' . $id_vid . '"></div>';
                            break;

                    }

                    $ibid = $fragment . $ibid_code . $fragment2;
                } else {
                    $pasfin = false;
                }
            }
        }

        return $ibid;
    }

}
