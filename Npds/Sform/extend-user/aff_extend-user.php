<?php

use Npds\Sform\Sform;


$sform_path = 'Sform/';

global $m;
$m = new Sform();
//********************
$m->add_form_title('Register');
$m->add_form_method('post');
$m->add_form_check('false');
$m->add_url('user.php');

/************************************************/
include($sform_path . 'extend-user/aff_formulaire.php');
/************************************************/
echo $m->aff_response('');
