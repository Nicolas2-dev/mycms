<?php

namespace Npds\Support;


class BBCode
{

    function HTML_Add()
    {
        $affich = '
        <div class="mt-2">
            <a href="javascript: addText(\'&lt;b&gt;\',\'&lt;/b&gt;\');" title="' . translate("Gras") . '" data-bs-toggle="tooltip" ><i class="fa fa-bold fa-lg me-2 mb-3"></i></a>
            <a href="javascript: addText(\'&lt;i&gt;\',\'&lt;/i&gt;\');" title="' . translate("Italique") . '" data-bs-toggle="tooltip" ><i class="fa fa-italic fa-lg me-2 mb-3"></i></a>
            <a href="javascript: addText(\'&lt;u&gt;\',\'&lt;/u&gt;\');" title="' . translate("Souligné") . '" data-bs-toggle="tooltip" ><i class="fa fa-underline fa-lg me-2 mb-3"></i></a>
            <a href="javascript: addText(\'&lt;span style=\\\'text-decoration:line-through;\\\'&gt;\',\'&lt;/span&gt;\');" title="" data-bs-toggle="tooltip" ><i class="fa fa-strikethrough fa-lg me-2 mb-3"></i></a>
            <a href="javascript: addText(\'&lt;p class=\\\'text-start\\\'&gt;\',\'&lt;/p&gt;\');" title="' . translate("Texte aligné à gauche") . '" data-bs-toggle="tooltip" ><i class="fa fa-align-left fa-lg me-2 mb-3"></i></a>
            <a href="javascript: addText(\'&lt;p class=\\\'text-center\\\'&gt;\',\'&lt;/p&gt;\');" title="' . translate("Texte centré") . '" data-bs-toggle="tooltip" ><i class="fa fa-align-center fa-lg me-2 mb-3"></i></a>
            <a href="javascript: addText(\'&lt;p class=\\\'text-end\\\'&gt;\',\'&lt;/p&gt;\');" title="' . translate("Texte aligné à droite") . '" data-bs-toggle="tooltip" ><i class="fa fa-align-right fa-lg me-2 mb-3"></i></a>
            <a href="javascript: addText(\'&lt;p align=\\\'justify\\\'&gt;\',\'&lt;/p&gt;\');" title="' . translate("Texte justifié") . '" data-bs-toggle="tooltip" ><i class="fa fa-align-justify fa-lg me-2 mb-3"></i></a>
            <a href="javascript: addText(\'&lt;ul&gt;&lt;li&gt;\',\'&lt;/li&gt;&lt;/ul&gt;\');" title="' . translate("Liste non ordonnnée") . '" data-bs-toggle="tooltip" ><i class="fa fa-list-ul fa-lg me-2 mb-3"></i></a>
            <a href="javascript: addText(\'&lt;ol&gt;&lt;li&gt;\',\'&lt;/li&gt;&lt;/ol&gt;\');" title="' . translate("Liste ordonnnée") . '" data-bs-toggle="tooltip" ><i class="fa fa-list-ol fa-lg me-2 mb-3"></i></a>
            <div class="dropdown d-inline me-2 mb-3" title="' . translate("Lien web") . '" data-bs-toggle="tooltip" data-bs-placement="left">
                <a class=" dropdown-toggle" href="#" role="button" id="protocoletype" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-link fa-lg"></i></a>
                <div class="dropdown-menu" aria-labelledby="protocoletype">
                <a class="dropdown-item" href="javascript: addText(\' http://\',\'\');">http</a>
                <a class="dropdown-item" href="javascript: addText(\' https://\',\'\');">https</a>
                <a class="dropdown-item" href="javascript: addText(\' ftp://\',\'\');">ftp</a>
                <a class="dropdown-item" href="javascript: addText(\' sftp://\',\'\');">sftp</a>
                </div>
            </div>
            <a href="javascript: addText(\'&lt;table class=\\\'table table-bordered table-striped table-sm\\\'&gt;&lt;thead&gt;&lt;tr&gt;&lt;th&gt;&lt;/th&gt;&lt;th&gt;&lt;/th&gt;&lt;th&gt;&lt;/th&gt;&lt;/tr&gt;&lt;/thead&gt;&lt;tbody&gt;&lt;tr&gt;&lt;td&gt;&lt;/td&gt;&lt;td&gt;&lt;/td&gt;&lt;td&gt;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;&lt;/td&gt;&lt;td&gt;&lt;/td&gt;&lt;td&gt;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;&lt;/td&gt;&lt;td&gt;&lt;/td&gt;&lt;td&gt;&lt;/td&gt;&lt;/tr&gt;&lt;/tbody&gt;&lt;/table&gt;\',\'\'); " title="' . translate("Tableau") . '" data-bs-toggle="tooltip"><i class="fa fa-table fa-lg me-2 mb-3"></i></a>
            <div class="dropdown d-inline me-2 mb-3" title="' . translate("Code") . '" data-bs-toggle="tooltip" data-bs-placement="left">
                <a class=" dropdown-toggle" href="#" role="button" id="codeclasslanguage" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-code fa-lg"></i></a>
                <div class="dropdown-menu" aria-labelledby="codeclasslanguage">
                <h6 class="dropdown-header">Languages</h6>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="javascript: addText(\'&lt;pre&gt;[code markup]\',\'[/code]&lt;/pre&gt;\');">Markup</a>
                <a class="dropdown-item" href="javascript: addText(\'&lt;pre&gt;[code php]\',\'[/code]&lt;/pre&gt;\');">Php</a>
                <a class="dropdown-item" href="javascript: addText(\'&lt;pre&gt;[code css]\',\'[/code]&lt;/pre&gt;\');">Css</a>
                <a class="dropdown-item" href="javascript: addText(\'&lt;pre&gt;[code js]\',\'[/code]&lt;/pre&gt;\');">js</a>
                <a class="dropdown-item" href="javascript: addText(\'&lt;pre&gt;[code sql]\',\'[/code]&lt;/pre&gt;\');">SQL</a>
                </div>
            </div>
            <div class="dropdown d-inline me-2 mb-3" title="' . translate("Vidéos") . '" data-bs-toggle="tooltip" data-bs-placement="left">
                <a class=" dropdown-toggle" href="#" role="button" id="typevideo" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-film fa-lg"></i></a>
                <div class="dropdown-menu" aria-labelledby="typevideo">
                <p class="dropdown-header">' . translate("Coller l'ID de votre vidéo entre les deux balises") . ' : <br />[video_yt]xxxx[/video_yt]<br />[video_vm]xxxx[/video_vm]<br />[video_dm]xxxx[/video_dm]</p>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="javascript: addText(\'[video_yt]\',\'[/video_yt]\');"><i class="fab fa-youtube fa-lg fa-fw me-1"></i>Youtube</a>
                <a class="dropdown-item" href="javascript: addText(\'[video_vm]\',\'[/video_vm]\');"><i class="fab fa-vimeo fa-lg fa-fw me-1"></i>Vimeo</a>
                <a class="dropdown-item" href="javascript: addText(\'[video_dm]\',\'[/video_dm]\');"><i class="fas fa-video fa-fw fa-lg me-1"></i>Dailymotion</a>
                </div>
            </div>
        </div>';
    
        return $affich;
    }

}
