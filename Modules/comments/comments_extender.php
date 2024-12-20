<?php

use Npds\Sform\Sform;

global $m;

$m = new Sform();

$m->add_form_title("coolsus");
$m->add_form_method("post");
$m->add_form_check("false");
$m->add_mess("[french]* d�signe un champ obligatoire[/french][english]* required field[/english]");
$m->add_submit_value("submitS");
$m->add_url("modules.php");

include("modules/comments/$formulaire");

if (!isset($GLOBALS["submitS"])) {
    echo aff_langue($m->print_form(''));
} else {
    $message = aff_langue($m->aff_response('', "not_echo", ''));
}
