<?php


// to do ==> translate
// Titre de la Grille de Formulaire
$m->add_title('Fiche Compl&eacute;mentaire');
// Champ text : Longueur = 40 / Pas de vérification
$m->add_field('NW', 'Nom du Webmestre', '', 'text', false, 50, '', '');
// Champ text : Longueur = 50 / Email seulement
$m->add_field('email', 'Adresse de messagerie', '', 'text', false, 50, '', 'email');
// Champ text : Longueur = 200 / TextArea / Pas de Vérification
$m->add_field('AR', 'Autres R&eacute;alisations', '', 'textarea', false, 200, 4, '', '');
// Champ text : Longueur = 200 / TextArea / Pas de Vérification
$m->add_field('AF', 'Autres Informations', '', 'textarea', false, 200, 4, '', '');
// Commentaire
$m->add_comment('<p class="text-center">Ces informations sont publiques, mais vous disposez du droit permanent de modification.</p>');