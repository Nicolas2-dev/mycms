<?php

namespace Npds\Filesystem;


class File
{

    public $Url = '';

    public $Extention = '';

    public $Size = 0;


    public function __construct($Url)
    {
        $this->Url = $Url;
    }

    function Size()
    {
        $this->Size = @filesize($this->Url);
    }

    function Extention()
    {
        $extension = strtolower(substr(strrchr($this->Url, '.'), 1));

        $this->Extention = $extension;
    }

    function Affiche_Extention($Format)
    {
        $this->Extention();

        switch ($Format) {
            case "IMG":
                if ($ibid = theme_image("upload/file_types/" . $this->Extention . ".gif")) {
                    $imgtmp = $ibid;
                } else {
                    $imgtmp = "public/assets/images/upload/file_types/" . $this->Extention . ".gif";
                }

                if (@file_exists($imgtmp)) {
                    return '<img src="' . $imgtmp . '" />';
                } else {
                    return '<img src="public/assets/images/upload/file_types/unknown.gif" />';
                }
                break;

            case "webfont":
                return '
                <span class="fa-stack">
                <i class="fa fa-file fa-stack-2x"></i>
                <span class="fa-stack-1x filetype-text">' . $this->Extention . '</span>
                </span>';
                break;
        }
    }
}
