<?php

use Npds\Sform\Sform;


$sform_path = 'Sform/';

global $m;
$m = new Sform();

$m->add_form_title("Bugs_Report");
$m->add_form_method("post");
$m->add_form_check("false");
$m->add_mess(" * d&eacute;signe un champ obligatoire ");
$m->add_submit_value("submitS");
$m->add_url("newtopic.php");


include($sform_path . "forum/$formulaire");

if (isset($submitS))
    $message = $m->aff_response('', 'not_echo', '');
else
    echo $m->print_form('');
