<?php

/************************************************************************/
/* DUNE by NPDS                                                         */
/* ===========================                                          */
/*                                                                      */
/* Based on PhpNuke 4.x source code                                     */
/*                                                                      */
/* NPDS Copyright (c) 2002-2024 by Philippe Brunier                     */
/*                                                                      */
/* This program is free software. You can redistribute it and/or modify */
/* it under the terms of the GNU General Public License as published by */
/* the Free Software Foundation; either version 3 of the License.       */
/************************************************************************/

function adm_translate($phrase)
{
    settype($englishname, 'string');
    switch ($phrase) {
        case "$englishname":
            $tmp = "$englishname";
            break;
        case "dateforop":
            $tmp = "m-d-y";
            break;
        case "english":
            $tmp = "English";
            break;
        case "french":
            $tmp = "French";
            break;
        case "spanish":
            $tmp = "Spanish";
            break;
        case "chinese":
            $tmp = "Chinese";
            break;
        case "german":
            $tmp = "German";
            break;

        case " à ":
            $tmp = " at ";
            break;
        case " Actualiser l'Auteur":
            $tmp = "Update Author";
            break;
        case " Afficher ":
            $tmp = " View ";
            break;
        case " Ajouter un Auteur ":
            $tmp = "Add Author";
            break;
        case " et réalisé un gain global de ":
            $tmp = " and realised a global gain of ";
            break;
        case "- Etes-vous certain ?":
            $tmp = "- are you sure?";
            break;
        case "- Mot de Passe (si Privé) - Le nom du fichier de formulaire (si Texte étendu) => modules/sform/forum - Les Groupes ID (si Groupe)":
            $tmp = "- Password (if Private) - Form file name (if Extended Text) in modules/sform/forum - Groups ID (if Group)";
            break;
        case "(255 caractères Max.)":
            $tmp = "(255 characters Max.)";
            break;
        case "(Brève description des centres d'intérêt du site. 200 caractères maxi.)":
            $tmp = "(Light description of the interest center of your website. 200 caracters max.)";
            break;
        case "(C'est le nombre de contributions affichées pour chaque page relative à un Sujet)":
            $tmp = "(This is the number of posts per topic that will be displayed per page of a topic)";
            break;
        case "(C'est le nombre de Sujets affichés pour chaque page relative à un Forum)":
            $tmp = "(This is the number of topics per forum that will be displayed per page of a forum)";
            break;
        case "(Certain des éventuelles URLs ?)":
            $tmp = "(Did you check URLs?)";
            break;
        case "(Définissez la méthode d'analyse que doivent adopter les robots des moteurs de recherche)":
            $tmp = "(Choose the method for the search engines analises)";
            break;
        case "(Définissez le public intéressé par votre site)":
            $tmp = "(Public interested by your website)";
            break;
        case "(Définissez un ou plusieurs mot(s) clé(s). 1000 caractères maxi. Remarques : une lettre accentuée équivaut le plus souvent à 8 caractères. La majorité des moteurs de recherche font la distinction minuscule/majuscule. Séparez vos mots par une virgule)":
            $tmp = "(Give one or several keyword(s). 1000 caracters max. Notes : a accentued letter in general count like 8 caracters. More search engines make the difference between min/upper letter. Separate words with , )";
            break;
        case "(description ou nom complet du Sujet - max : 40 caractères)":
            $tmp = "(the full topic text or description - max: 40 characters)";
            break;
        case "(description ou nom complet du sujet)":
            $tmp = "(description or full name topic)";
            break;
        case "(Ex. : 16 days. Remarque : ne définissez pas de fréquence inférieure à 14 jours !)":
            $tmp = "(Ex. : 16 days. Note : not give a frequency < 14 days !)";
            break;
        case "(Ex. : fr(Français), en(Anglais), en-us(Américain), de(Allemand), it(Italien), pt(Portugais), etc)":
            $tmp = "(Ex. : fr(French), en(English), en-us(American), de(Deutch), it(Italian), pt(Portuges), etc)";
            break;
        case "(Ex. : l'adresse e-mail du webmaster)":
            $tmp = "(Ex. : E-mail address of the webmaster)";
            break;
        case "(Ex. : nom de votre compagnie/service)":
            $tmp = "(Ex. : name of your Cie/Service)";
            break;
        case "(Ex. : nom du webmaster)":
            $tmp = "(Ex. : name of the webmaster)";
            break;
        case "(exemple : tonial.png)":
            $tmp = "(example: opinion.gif)";
            break;
        case "(Informations légales)":
            $tmp = "(Legals informations)";
            break;
        case "(nom de l'image + extension)":
            $tmp = "(image name + extension located in";
            break;
        case "(Redirection sur un forum externe : <.a href...)":
            $tmp = "(For forum redirection, put <.a href...)";
            break;
        case "(seulement pour modifications)":
            $tmp = "(for changes only)";
            break;
        case "(un simple nom sans espaces - 20 caractères max.)":
            $tmp = "(just a name without spaces - max: 20 characters)";
            break;
        case "(un simple nom sans espaces)":
            $tmp = "(a single word without space)";
            break;
        case "* Désigne un champ obligatoire":
            $tmp = "* for mandatory field";
            break;
        case "* indique les champs requis":
            $tmp = "* indicates required fields";
            break;
        case "0=Tout le monde, 1=Membre seulement, 3=Administrateur seulement, 9=Désactiver":
            $tmp = "(0=everybody, 1=member only, 3=Admin only, 9=inactive)";
            break;
        case "14 ans":
            $tmp = "14 years";
            break;
        case "A ce jour, vous avez effectué ":
            $tmp = "At this day, you have made ";
            break;
        case "a été envoyée":
            $tmp = "has been sent";
            break;
        case "a":
            $tmp = "has";
            break;
        case "Abandonner":
            $tmp = "Cancel";
            break;
        case "Accepter":
            $tmp = "Accept";
            break;
        case "Accès restreint":
            $tmp = "Restricted access";
            break;
        case "Accès":
            $tmp = "Access";
            break;
        case "Actif":
            $tmp = "Activate";
            break;
        case "Actif(s)":
            $tmp = "Active";
            break;
        case "Action":
            $tmp = "Action";
            break;
        case "Activation":
            $tmp = "Activation";
            break;
        case "Activer bloc-note du groupe":
            $tmp = "Enable notepad of the group";
            break;
        case "Activer chat du groupe":
            $tmp = "Enable Chat for the group";
            break;
        case "Activer export-news":
            $tmp = "Activate Export-News";
            break;
        case "Activer Facebook":
            $tmp = "Activate Facebook";
            break;
        case "Activer gestionnaire de fichiers du groupe":
            $tmp = "Enable File manager of the group";
            break;
        case "Activer l'authentification SMTP(S)":
            $tmp = "Enable SMTP(S) authentication";
            break;
        case "Activer l'éditeur Tinymce":
            $tmp = "Activate Tinymce editor";
            break;
        case "Activer l'icône [N]ouveau pour les catégories":
            $tmp = "Activate New Categories Icons";
            break;
        case "Activer l'upload dans les forums ?":
            $tmp = "Activate forum's upload?";
            break;
        case "Activer la description simplifiée des utilisateurs":
            $tmp = "Short User registration";
            break;
        case "Activer la résolution DNS pour les posts des forums, IP-Ban, ...":
            $tmp = "DNS resolution : activate for Posts in forum, IP-Ban, ...";
            break;
        case "Activer le Bloc":
            $tmp = "Activate the Block";
            break;
        case "Activer le chiffrement":
            $tmp = "Enable encryption";
            break;
        case "Activer le multi-langue":
            $tmp = "Multi-language capability";
            break;
        case "Activer le tri des contributions 'résolues'":
            $tmp = "Activate the sort of the 'solved' contributions";
            break;
        case "Activer les avatars":
            $tmp = "Activate avatars";
            break;
        case "Activer les Bannières ?":
            $tmp = "Activate Banners in your site?";
            break;
        case "Activer les commentaires des sondages":
            $tmp = "Activate Comments in Polls";
            break;
        case "Activer les images dans le menu administration":
            $tmp = "Graphics in Administration Menu";
            break;
        case "Activer les menus courts pour l'administration":
            $tmp = "Short Administration Menu";
            break;
        case "Activer les référants HTTP":
            $tmp = "Activate HTTP Referers";
            break;
        case "Activer les textes cachés":
            $tmp = "Activate hide text";
            break;
        case "Activer PAD du groupe":
            $tmp = "Enable PAD of the group";
            break;
        case "Activer son MiniSite":
            $tmp = "Activate member's Mini-Website";
            break;
        case "Activer Twitter":
            $tmp = "Activate Twitter";
            break;
        case "Activité":
            $tmp = "Occupation";
            break;
        case "Actualiser l'administrateur":
            $tmp = "Update the administrator";
            break;
        case "Admin-Plugins":
            $tmp = "Admin-Plugins";
            break;
        case "Administrateur ID":
            $tmp = "AdminID";
            break;
        case "Administrateur(s) de la rubrique :":
            $tmp = "Administrator(s) of the section:";
            break;
        case "Administrateur(s) du Sujet :":
            $tmp = "Administrator(s) of the topic:";
            break;
        case "Administrateur(s) du sujet":
            $tmp = "Topic administrator(s)";
            break;
        case "Administrateur(s)":
            $tmp = "Administrator(s)";
            break;
        case "Administrateurs":
            $tmp = "Admin / Authors";
            break;
        case "Administration de META-LANG":
            $tmp = "META-LANG administration";
            break;
        case "Administration des bannières":
            $tmp = "Banners Administration";
            break;
        case "Administration des MétaTags":
            $tmp = "MetaTags administration";
            break;
        case "Administration":
            $tmp = "Administration";
            break;
        case "Adresse E-mail de l'administrateur":
            $tmp = "Administrator Email";
            break;
        case "Adresse E-mail masquée":
            $tmp = "Fake Email";
            break;
        case "Adresse E-mail où envoyer le message":
            $tmp = "Email to send the message:";
            break;
        case "Adresse e-mail principale":
            $tmp = "Main E-mail address";
            break;
        case "Adulte":
            $tmp = "Adult";
            break;
        case "Affectation d'Articles vers une nouvelle Catégorie":
            $tmp = "Move Stories to a New Category";
            break;
        case "Affectation":
            $tmp = "Move!";
            break;
        case "Affecter à une autre Catégorie":
            $tmp = "Move my Stories";
            break;
        case "Affichage":
            $tmp = "Displaying";
            break;
        case "Afficher la liste des prospects":
            $tmp = "View Outside User List";
            break;
        case "Afficher le chemin dans le titre de la page :":
            $tmp = "Show path in the title of the webpage:";
            break;
        case "Afficher le logo sur la page web links":
            $tmp = "Activate Logo in Main Web Links";
            break;
        case "Afficher les resultats des Sondages":
            $tmp = "View poll results";
            break;
        case "Afficher pendant":
            $tmp = "Showed for";
            break;
        case "Afficher signature":
            $tmp = "Show signature";
            break;
        case "Afficher votre signature":
            $tmp = "Show signature";
            break;
        case "Aide en ligne de ce bloc":
            $tmp = "Online Help for this block";
            break;
        case "Aide en ligne":
            $tmp = "Online Help";
            break;
        case "Ajouter Annonceur":
            $tmp = "Add Client";
            break;
        case "Ajouter cette critique":
            $tmp = "Add Review";
            break;
        case "Ajouter des Catégories":
            $tmp = "Add Categories";
            break;
        case "Ajouter des Liens relatifs au Sujet":
            $tmp = "Add Related Links";
            break;
        case "Ajouter des membres":
            $tmp = "Add members";
            break;
        case "Ajouter Grands Titres":
            $tmp = "Add Headline";
            break;
        case "Ajouter la critique N° : ":
            $tmp = "Reviews_Add ID:";
            break;
        case "Ajouter membres":
            $tmp = "Add Members";
            break;
        case "Ajouter plus d'affichages":
            $tmp = "Add More Impressions";
            break;
        case "Ajouter plus de Forum pour":
            $tmp = "Add More Forums for";
            break;
        case "Ajouter un administrateur":
            $tmp = "Add an administrator";
            break;
        case "Ajouter un annonceur":
            $tmp = "Add Client";
            break;
        case "Ajouter un Article dans une Rubrique":
            $tmp = "Add Article in Sections";
            break;
        case "Ajouter un article":
            $tmp = "Add article";
            break;
        case "Ajouter un Editorial":
            $tmp = "Add Editorial";
            break;
        case "Ajouter un Ephéméride : ":
            $tmp = "Add Ephemerid:";
            break;
        case "Ajouter un éphéméride":
            $tmp = "Add ephemerid";
            break;
        case "Ajouter un groupe":
            $tmp = "Add group";
            break;
        case "Ajouter un lien":
            $tmp = "Add a link";
            break;
        case "Ajouter un nouveau Lien":
            $tmp = "Add a New Link";
            break;
        case "Ajouter un nouveau Sujet":
            $tmp = "Add a New Topic";
            break;
        case "Ajouter un nouvel Annonceur":
            $tmp = "Add a New Client";
            break;
        case "Ajouter un ou des membres au groupe":
            $tmp = "Add one or several members to the group";
            break;
        case "Ajouter un Sujet":
            $tmp = "Add Topic!";
            break;
        case "Ajouter un Téléchargement":
            $tmp = "Add Download";
            break;
        case "Ajouter un Utilisateur":
            $tmp = "Add User";
            break;
        case "Ajouter une bannière":
            $tmp = "Add Banner";
            break;
        case "Ajouter une Catégorie principale":
            $tmp = "Add a MAIN Category";
            break;
        case "Ajouter une catégorie":
            $tmp = "Add a category";
            break;
        case "Ajouter une nouvelle bannière":
            $tmp = "Add a New Banner";
            break;
        case "Ajouter une nouvelle Catégorie":
            $tmp = "Add a New Category";
            break;
        case "Ajouter une nouvelle Rubrique":
            $tmp = "Add a New Section";
            break;
        case "Ajouter une nouvelle Sous-Rubrique":
            $tmp = "Add a new Sub-Section";
            break;
        case "Ajouter une publication":
            $tmp = "Add a publication";
            break;
        case "Ajouter une question réponse":
            $tmp = "Add Question answer";
            break;
        case "Ajouter une question":
            $tmp = "Add Question";
            break;
        case "Ajouter une Rubrique":
            $tmp = "Add Section!";
            break;
        case "Ajouter une Sous-catégorie":
            $tmp = "Add a SUB-Category";
            break;
        case "Ajouter une URL":
            $tmp = "Add URL";
            break;
        case "Ajouter":
            $tmp = "Add";
            break;
        case "Année":
            $tmp = "Year";
            break;
        case "Annonceurs faisant de la publicité":
            $tmp = "Advertising Clients";
            break;
        case "Annuler":
            $tmp = "Reset";
            break;
        case "Anonyme":
            $tmp = "Anonymous";
            break;
        case "Anonymes":
            $tmp = "Anonymous";
            break;
        case "Arbre":
            $tmp = "Tree";
            break;
        case "Archiver les Référants":
            $tmp = "Save referers";
            break;
        case "Archives articles":
            $tmp = "Articles archives";
            break;
        case "Article en attente de validation":
            $tmp = "Waiting stories for publication";
            break;
        case "Article(s) attaché(s)":
            $tmp = "articles attached";
            break;
        case "Articles !":
            $tmp = "stories inside!";
            break;
        case "Articles en attente de validation !":
            $tmp = "Articles waiting for checking !";
            break;
        case "Articles programmés pour la publication.":
            $tmp = "Programmed Articles";
            break;
        case "Articles programmés":
            $tmp = "Programmed Articles";
            break;
        case "Articles":
            $tmp = "Articles";
            break;
        case "Assembler une lettre et la tester":
            $tmp = "Join Articles and Test Newsletter";
            break;
        case "Attachement":
            $tmp = "Attachment";
            break;
        case "ATTENTION :  êtes-vous certain de vouloir effacer ce Forum et tous ses Sujets ?":
            $tmp = "WARNING: Are you sure you want to delete this Forum and all its Topics?";
            break;
        case "ATTENTION :  êtes-vous sûr de vouloir supprimer cette Catégorie, ses Forums et tous ses Sujets ?":
            $tmp = "WARNING: Are you sure you want to delete this Category, Forums and all its Topics?";
            break;
        case "Attention : ":
            $tmp = "WARNING :";
            break;
        case "ATTENTION : Etes-vous sûr de vouloir effacer cette Catégorie et tous ses Liens ?":
            $tmp = "WARNING: Are you sure you want to delete this Category and ALL its Links?";
            break;
        case "ATTENTION : êtes-vous sûr de vouloir effacer cette FAQ et toutes ses questions ?":
            $tmp = "WARNING: Are you sure you want to delete this FAQ and all its question?";
            break;
        case "ATTENTION : êtes-vous sûr de vouloir effacer cette question ?":
            $tmp = "WARNING: Are you sure you want to delete this Question?";
            break;
        case "ATTENTION : êtes-vous sûr de vouloir supprimer ce fichier téléchargeable ?":
            $tmp = "WARNING: Are you sure you want to delete this Download file?";
            break;
        case "ATTENTION : Le Sondage choisi va être supprimé IMMEDIATEMENT de la base de données !":
            $tmp = "WARNING: The chosen poll will be removed IMMEDIATELY from the database!";
            break;
        case "ATTENTION !!!":
            $tmp = "WARNING!!!";
            break;
        case "Au format CSV":
            $tmp = "CSV format";
            break;
        case "Aucun lien brisé rapporté.":
            $tmp = "No reported broken links.";
            break;
        case "Aucun Sujet":
            $tmp = "No Subject";
            break;
        case "Aucune catégorie":
            $tmp = "No category";
            break;
        case "Aucune critique à ajouter":
            $tmp = "No reviews to add";
            break;
        case "Aucune indexation":
            $tmp = "No indexation";
            break;
        case "Aucune table n'a été trouvée":
            $tmp = "No tables found in database";
            break;
        case "Audience":
            $tmp = "Rating";
            break;
        case "Auteur":
            $tmp = "Author";
            break;
        case "Auteur(s)":
            $tmp = "Author(s)";
            break;
        case "Auteurs actuels":
            $tmp = "current authors";
            break;
        case "Auto-Articles":
            $tmp = "Auto Articles";
            break;
        case "Automatique":
            $tmp = "Automatic";
            break;
        case "Autoriser la connexion":
            $tmp = "Allow connection";
            break;
        case "Autoriser la création automatique des membres":
            $tmp = "Allow automated new-users configuration";
            break;
        case "Autoriser la création de news pour":
            $tmp = "Allow the post of News";
            break;
        case "Autoriser le HTML":
            $tmp = "Allow HTML";
            break;
        case "Autoriser les abonnements":
            $tmp = "Allow Subscriptions";
            break;
        case "Autoriser les autres Utilisateurs à voir mon adresse E-mail ?":
            $tmp = "Allow other users to view my email address?";
            break;
        case "Autoriser les autres utilisateurs à voir son adresse E-mail":
            $tmp = "Allow other users to view his email address";
            break;
        case "Autoriser les commentaires anonymes":
            $tmp = "Allow Anonymous to Post Comments";
            break;
        case "Autoriser les membres invisibles":
            $tmp = "Allow Invisible' Members";
            break;
        case "Autoriser les Signatures":
            $tmp = "Allow Signature";
            break;
        case "Autoriser les Smilies":
            $tmp = "Allow Smilies";
            break;
        case "Autoriser les utilisateurs à choisir leur mot de passe":
            $tmp = "Allow user to choose the member' Password";
            break;
        case "Autoriser les utilisateurs à voter plusieurs fois":
            $tmp = "Allow users to vote several time";
            break;
        case "Avant de supprimer le groupe":
            $tmp = "Before to delete the group";
            break;
        case "Bannières actives":
            $tmp = "Active Banners";
            break;
        case "Bannières inactives":
            $tmp = "Current Inactive Banners";
            break;
        case "Bannières terminées":
            $tmp = "Finished Banners";
            break;
        case "Bannières":
            $tmp = "Banners";
            break;
        case "Blackboard":
            $tmp = "Blackboard";
            break;
        case "Bloc Administration":
            $tmp = "Admin Block";
            break;
        case "Bloc Principal":
            $tmp = "Main Block";
            break;
        case "Blocs":
            $tmp = "Blocks";
            break;
        case "Bonjour et bienvenue dans l'installation automatique du module":
            $tmp = "Hello and welcome on the automatic installation of the module";
            break;
        case "Bonjour":
            $tmp = "Hello";
            break;
        case "Caché":
            $tmp = "Hidden";
            break;
        case "car il est modérateur unique de forum. Oter ses droits de modération puis retirer le du groupe.":
            $tmp = "Because it is unique for a forum moderator.Modify his moderator rights and remove it from the group.";
            break;
        case "Catégorie : ":
            $tmp = "Category: ";
            break;
        case "Catégorie :":
            $tmp = "Cat:";
            break;
        case "Catégorie sauvegardée":
            $tmp = "Category Saved!";
            break;
        case "Catégorie":
            $tmp = "Category";
            break;
        case "Catégories :":
            $tmp = "Categories:";
            break;
        case "Catégories de Forum":
            $tmp = "Forum Categories";
            break;
        case "Catégories":
            $tmp = "Categories";
            break;
        case "Ce fichier est appelé à la fin du header du thème":
            $tmp = "This file is called at the end of the theme' header";
            break;
        case "Ce fichier est appelé après la fin de la génération de la page HTML":
            $tmp = "This file is called at the end of HTML generation";
            break;
        case "Ce fichier est appelé avant le début du footer du thème":
            $tmp = "This file is called at the begining of the theme'footer";
            break;
        case "Ce fichier est appelé avant que de commencer la génération de la page HTML":
            $tmp = "This file is called before HTML generation";
            break;
        case "Ce fichier est appelé dans l'évènement ONLOAD de la balise BODY => JAVASCRIPT":
            $tmp = "This file is called in the ONLOAD event of the BODY tag";
            break;
        case "Ce fichier est appelé entre le HEAD et /HEAD lors de la génération de la page HTML":
            $tmp = "This file is called between HEAD and /HEAD tags";
            break;
        case "Ce fichier permet d'envoyer un MI personnalisé lorsqu'un nouveau membre s'inscrit":
            $tmp = "This file allow you to send a specific MI in the 'new member' process";
            break;
        case "Ce fichier permet l'affichage d'informations complémentaires dans la page de login":
            $tmp = "This file allow you to customize the login page";
            break;
        case "Ce fichier permet la configuration technique de SuperCache":
            $tmp = "This file allow you to configure SuperCache technical points";
            break;
        case "Ce META-MOT existe déjà":
            $tmp = "This META-MOT already exist";
            break;
        case "Ce modérateur":
            $tmp = "This moderator";
            break;
        case "Ce programme d'installation va configurer votre site internet pour utiliser ce module.":
            $tmp = "This installer is going to configure your website to use this module.";
            break;
        case "ce site est génial":
            $tmp = "this web site is amazing";
            break;
        case "Ceci effacera tous ses articles et ses commentaires !":
            $tmp = "This will delete ALL it's stories and it's comments!";
            break;
        case "Ceci va détruire tous ses Articles !":
            $tmp = "This will delete ALL its articles!";
            break;
        case "Centres d'intérêt":
            $tmp = "Interest";
            break;
        case "cesiteestgénial":
            $tmp = "thiswebsiteisamazing";
            break;
        case "Cet annonceur a les BANNIERES ACTIVES suivantes dans":
            $tmp = "This client has the following ACTIVE BANNERS running in";
            break;
        case "Cet annonceur n'a pas de bannière active pour le moment.":
            $tmp = "This client doesn't have any banners running now.";
            break;
        case "Cette Catégorie existe déjà !":
            $tmp = "This Category already exists!";
            break;
        case "Cette opération est irréversible elle va affecter votre base de données par la suppression de table(s) ou/et de ligne(s) et la suppression ou modification de certains fichiers.":
            $tmp = "This operation is irreversible and will affect your database by deleting table(s) or/and line(s) and deleting or modifying certain files.";
            break;
        case "Cette Rubrique a":
            $tmp = "(This Section has)";
            break;
        case "Changer l'ordre des publications":
            $tmp = "Change the order of the publications";
            break;
        case "Changer l'ordre des rubriques":
            $tmp = "Change the order of the sections";
            break;
        case "Changer l'ordre des sous-rubriques":
            $tmp = "Change the order of the sub-sections";
            break;
        case "Changer l'ordre":
            $tmp = "Change the order";
            break;
        case "Changer la date":
            $tmp = "Change Date";
            break;
        case "Changer les Catégories : ":
            $tmp = "Change Categories:";
            break;
        case "Changer les privilèges ? :":
            $tmp = "Change Privileges? :";
            break;
        case "Changer":
            $tmp = "Change";
            break;
        case "Chaque bloc peut utiliser SuperCache. La valeur du délai de rétention 0 indique que le bloc ne sera pas caché (obligatoire pour le bloc function#adminblock).":
            $tmp = "Each block can used SuperCache. The value 0 indicate that no cache is made (mandatory for function#adminblock).";
            break;
        case "Chemin de certaines images (vote, ...)":
            $tmp = "Another Images Path";
            break;
        case "Chemin des images des sujets":
            $tmp = "Topics Images Path";
            break;
        case "Chemin des images du menu administrateur":
            $tmp = "Admin Menu Images Path";
            break;
        case "Chemin et nom de l'image du Smiley":
            $tmp = "Directory and name of the picture of the Smiley";
            break;
        case "Choisir les privilèges ? :":
            $tmp = "Set Privileges? :";
            break;
        case "Choisir un groupe":
            $tmp = "Choice one group";
            break;
        case "Choisir un modérateur":
            $tmp = "Choose one moderator.";
            break;
        case "Choisir un rôle":
            $tmp = "Choice a role";
            break;
        case "Clics":
            $tmp = "Clicks";
            break;
        case "Cliquer ici pour proposer une Critique.":
            $tmp = "Click here to write a review.";
            break;
        case "Cliquez pour éditer":
            $tmp = "Click to Edit";
            break;
        case "Cliquez sur \"Etape suivante\" pour continuer.":
            $tmp = "Click on \"Following stage\" to continue.";
            break;
        case "Combien de référants au maximum":
            $tmp = "How Many Referers you want as Maximum";
            break;
        case "comme modérateur du forum":
            $tmp = "as forum moderator";
            break;
        case "Commentaire":
            $tmp = "Comment";
            break;
        case "Communication":
            $tmp = "Communication";
            break;
        case "Compte E-mail (Provenance)":
            $tmp = "Email Account (From)";
            break;
        case "Compteur":
            $tmp = "Counter";
            break;
        case "Configuration de la page":
            $tmp = "Page setting";
            break;
        case "Configuration de PHPmailer SMTP(S)":
            $tmp = "Configuring PHPmailer SMTP(S)";
            break;
        case "Configuration des Forums":
            $tmp = "Forum Configuration";
            break;
        case "Configuration des infos en Backend & Réseaux Sociaux":
            $tmp = "Configuration for Backend & Social Networks";
            break;
        case "Configuration Forums":
            $tmp = "Forums Configuration";
            break;
        case "Configuration par défaut des Liens Web":
            $tmp = "Web Links Default Config";
            break;
        case "Configurer MySql (Recommandé)":
            $tmp = "Configure MySql (Recommended)";
            break;
        case "Confirmer la lecture":
            $tmp = "Confirm the reading";
            break;
        case "Connexion":
            $tmp = "Login";
            break;
        case "Contacter l'administration du site.":
            $tmp = "Contact the site administration";
            break;
        case "Contenu :":
            $tmp = "Content:";
            break;
        case "Contenu de la table":
            $tmp = "Dumping data for table";
            break;
        case "Contenu":
            $tmp = "Content";
            break;
        case "Contrôle des serveurs de mails":
            $tmp = "Control of mail servers";
            break;
        case "Contrôler les serveurs de mail de tous les utilisateurs":
            $tmp = "Check the email servers of all users";
            break;
        case "Copié":
            $tmp = "Copied";
            break;
        case "Copier":
            $tmp = "Copy";
            break;
        case "Copyright":
            $tmp = "Copyright";
            break;
        case "Corps de message":
            $tmp = "Body Messages";
            break;
        case "Corps":
            $tmp = "Body";
            break;
        case "courtes":
            $tmp = "shorts";
            break;
        case "Création":
            $tmp = "Creating";
            break;
        case "Créé":
            $tmp = "Created";
            break;
        case "Créer forum du groupe":
            $tmp = "Create forum for the group";
            break;
        case "Créer le bloc WS":
            $tmp = "Create the block WS";
            break;
        case "Créer le fichier en utilisant le modèle":
            $tmp = "Create the file with the template";
            break;
        case "Créer le fichier":
            $tmp = "Created the file";
            break;
        case "Créer le(s) bloc(s) à droite":
            $tmp = "Create (the) block(s) to the right";
            break;
        case "Créer le(s) bloc(s) à gauche":
            $tmp = "Create (the) block(s) to the left";
            break;
        case "Créer MiniSite du groupe":
            $tmp = "Create mini Web site for the group";
            break;
        case "Créer un Bloc droite":
            $tmp = "Make right Block";
            break;
        case "Créer un Bloc gauche":
            $tmp = "Make left Block";
            break;
        case "Créer un groupe.":
            $tmp = "Create a group";
            break;
        case "Créer un nouveau Bloc":
            $tmp = "Create New Block";
            break;
        case "Créer un nouveau Sondage":
            $tmp = "Create new poll";
            break;
        case "Créer un nouveau":
            $tmp = "Create a new";
            break;
        case "Créer utilisateur":
            $tmp = "Create user";
            break;
        case "Créer":
            $tmp = "Create";
            break;
        case "Critique en attente de validation.":
            $tmp = "Review awaiting validation";
            break;
        case "Critiques en attente de validation":
            $tmp = "Reviews Waiting for Validation";
            break;
        case "Critiques":
            $tmp = "Reviews";
            break;
        case "CSS Specifique":
            $tmp = "Specific CSS";
            break;
        case "dans":
            $tmp = "in";
            break;
        case "dans le groupe":
            $tmp = "in the group";
            break;
        case "Date :":
            $tmp = "Date:";
            break;
        case "Date de début":
            $tmp = "Date Started";
            break;
        case "Date de démarrage du site":
            $tmp = "Site Start Date";
            break;
        case "Date de fin":
            $tmp = "Date Ended";
            break;
        case "Date prévu de publication":
            $tmp = "Date of publication";
            break;
        case "Date":
            $tmp = "Date";
            break;
        case "de":
            $tmp = "of";
            break;
        case "Déconnexion":
            $tmp = "Logout / Exit";
            break;
        case "Demande acceptée.":
            $tmp = "Request accepted.";
            break;
        case "Demande refusée pour votre participation au groupe":
            $tmp = "Request refused for your participation in the group";
            break;
        case "Déplier la liste":
            $tmp = "Show list";
            break;
        case "Dernière optimisation effectuée le":
            $tmp = "Last optimization made the";
            break;
        case "Derniers":
            $tmp = "Last";
            break;
        case "des modérateurs du forum":
            $tmp = "from the forum moderator";
            break;
        case "des":
            $tmp = "of";
            break;
        case "Désabonner un utilisateur":
            $tmp = "Unsubscribe User";
            break;
        case "Désactiver bloc-note du groupe":
            $tmp = "Disable notepad of the group";
            break;
        case "Désactiver chat du groupe":
            $tmp = "Disable Chat for the group";
            break;
        case "Désactiver gestionnaire de fichiers du groupe":
            $tmp = "Disable File manager of the group";
            break;
        case "Désactiver PAD du groupe":
            $tmp = "Disable PAD of the group";
            break;
        case "Description de l'éphéméride":
            $tmp = "Ephemerid Description";
            break;
        case "Description de la Page des Critiques":
            $tmp = "Reviews Page Description";
            break;
        case "Description:":
            $tmp = "Description:";
            break;
        case "Description":
            $tmp = "Description";
            break;
        case "Désinstaller le module":
            $tmp = "Uninstall the module";
            break;
        case "Désolé, les nouveaux Mots de Passe ne correspondent pas. Cliquez sur retour et recommencez":
            $tmp = "Sorry, the new passwords do not match. Click back and try again";
            break;
        case "Diffusion d'un Message Interne":
            $tmp = "Send an Internal Message";
            break;
        case "Distribution":
            $tmp = "Distribution";
            break;
        case "Divers":
            $tmp = "Miscellaneous";
            break;
        case "DKIM du DNS (si existant et valide).":
            $tmp = "DNS DKIM (if existing and valid).";
            break;
        case "DNS ou serveur de mail incorrect":
            $tmp = "Invalid DNS or mail server";
            break;
        case "Doit être un mot sans espace.":
            $tmp = "Must be a word without space.";
            break;
        case "Doit être un nom de fichier valide avec une de ces extensions : jpg, jpeg, png, gif.":
            $tmp = "Must be a valid file name with one of those extension : jpg, jpeg, png, gif.";
            break;
        case "Droits de publication":
            $tmp = "Publication' rights";
            break;
        case "Droits des auteurs":
            $tmp = "Authors' rights";
            break;
        case "Droits modules":
            $tmp = "Addons perms";
            break;
        case "Droits":
            $tmp = "Perms";
            break;
        case "Du DNS":
            $tmp = "From DNS";
            break;
        case "du groupe":
            $tmp = "from the group";
            break;
        case "Durée de vie en heure du cookie Admin":
            $tmp = "Admin'cookie TTL (in hours)";
            break;
        case "Durée de vie en heure du cookie User":
            $tmp = "User'cookie TTL (in hours)";
            break;
        case "E-mail : ":
            $tmp = "Email: ";
            break;
        case "E-mail: ":
            $tmp = "Contact Email: ";
            break;
        case "E-mail":
            $tmp = "Contact Email";
            break;
        case "Edité":
            $tmp = "Edited";
            break;
        case "Editer ce sondage":
            $tmp = "Edit this Poll";
            break;
        case "Editer Ephéméride : ":
            $tmp = "Edit Ephemerid:";
            break;
        case "Editer groupe":
            $tmp = "Edit group";
            break;
        case "Editer l'annonceur":
            $tmp = "Edit Advertising Client";
            break;
        case "Editer l'Article Automatique":
            $tmp = "Edit Automated Story";
            break;
        case "Editer l'Article d'ID : ":
            $tmp = "Edit Article ID:";
            break;
        case "Editer la catégorie":
            $tmp = "Edit the category";
            break;
        case "Editer la question réponse":
            $tmp = "Edit the Question Answer";
            break;
        case "Editer la rubrique":
            $tmp = "Edit the section";
            break;
        case "Editer la sous-rubrique":
            $tmp = "Edit the sub-section";
            break;
        case "Editer le Bloc Administration":
            $tmp = "Edit Admin Block";
            break;
        case "Editer le Sujet :":
            $tmp = "Edit Topic:";
            break;
        case "Editer les Administrateurs":
            $tmp = "Edit Admins";
            break;
        case "Editer les Catégories":
            $tmp = "Edit Categories";
            break;
        case "Editer les fichiers de configuration":
            $tmp = "Edit configuration files";
            break;
        case "Editer les forums":
            $tmp = "Edit forums";
            break;
        case "Editer les informations concernant":
            $tmp = "Edit the informations about";
            break;
        case "Editer les Liens Relatifs":
            $tmp = "Edit Related Link";
            break;
        case "Editer les Sondages":
            $tmp = "Edit Polls";
            break;
        case "Editer paramètres Grand Titre":
            $tmp = "Edit Headline";
            break;
        case "Editer Question & Réponse":
            $tmp = "Edit Question and Answer";
            break;
        case "Editer un Article":
            $tmp = "Edit Article";
            break;
        case "Editer un Téléchargement":
            $tmp = "Edit Download";
            break;
        case "Editer une catégorie":
            $tmp = "Edit a category";
            break;
        case "Editer une publication":
            $tmp = "Edit a publication";
            break;
        case "Editer une Rubrique : ":
            $tmp = "Edit Section:";
            break;
        case "Editer":
            $tmp = "Edit";
            break;
        case "Edition Bannière":
            $tmp = "Edit Banner";
            break;
        case "Edition des Blocs de droite":
            $tmp = "Edit Right Blocks";
            break;
        case "Edition des Blocs de gauche":
            $tmp = "Edit Left Blocks";
            break;
        case "Edition des Catégories":
            $tmp = "Edit Category";
            break;
        case "Edition des Forums":
            $tmp = "Forum Manager";
            break;
        case "Edition des sondages":
            $tmp = "Polls Edit";
            break;
        case "Edition des Utilisateurs":
            $tmp = "Edit Users";
            break;
        case "Edition du Bloc Principal":
            $tmp = "Edit Main Block";
            break;
        case "Edition Forums":
            $tmp = "Forums Edition";
            break;
        case "Edition":
            $tmp = "Editing";
            break;
        case "Edito":
            $tmp = "Edito";
            break;
        case "Editorial ajouté à la base de données":
            $tmp = "Editorial added to the Database";
            break;
        case "Editorial modifié":
            $tmp = "Editorial Modified";
            break;
        case "Editorial supprimé de la base de données":
            $tmp = "Editorial removed from Database";
            break;
        case "Effacé":
            $tmp = "Deleted";
            break;
        case "Effacer (Efface les Liens cassés et les avis pour un Lien donné)":
            $tmp = "Delete (Deletes broken link and requests for a given link)";
            break;
        case "Effacer / Modifier une Critique":
            $tmp = "Delete / Modify a review";
            break;
        case "Effacer Bannière":
            $tmp = "Delete Banner";
            break;
        case "Effacer ce sondage":
            $tmp = "Delete this Poll";
            break;
        case "Effacer l'Article":
            $tmp = "Delete Story";
            break;
        case "Effacer l'Auteur":
            $tmp = "Delete Author";
            break;
        case "Effacer la publication :":
            $tmp = "Delete a publication:";
            break;
        case "Effacer la Rubrique : ":
            $tmp = "Delete Section: ";
            break;
        case "Effacer la sous-rubrique : ":
            $tmp = "Delete sub-section: ";
            break;
        case "Effacer le Sujet !":
            $tmp = "Delete Topic!";
            break;
        case "Effacer le Sujet":
            $tmp = "Delete Topic";
            break;
        case "Effacer les Référants":
            $tmp = "Delete Referers";
            break;
        case "Effacer les Sondages":
            $tmp = "Delete Polls";
            break;
        case "Effacer un Article : ":
            $tmp = "Delete Article: ";
            break;
        case "Effacer un Article !":
            $tmp = "Delete Article!";
            break;
        case "Effacer un Bloc droit":
            $tmp = "Delete right Block";
            break;
        case "Effacer un Bloc gauche":
            $tmp = "Delete left Block";
            break;
        case "Effacer une Rubrique":
            $tmp = "Delete Section!";
            break;
        case "Effacer":
            $tmp = "Delete";
            break;
        case "Effectuée le":
            $tmp = "Make the";
            break;
        case "En Ligne":
            $tmp = "on line";
            break;
        case "en tant qu'Administrateur.":
            $tmp = "as admin.";
            break;
        case "Encodage":
            $tmp = "Charset encoding";
            break;
        case "Enfin, pour pouvoir réinstaller le module par la suite avec Module-Install, cliquez sur le bouton \"Marquer le module comme désinstallé\".":
            $tmp = "Lastly, to be able to reinstall the addon with Module-Install thereafter, click on the button \"Mark the addon as uninstalled\".";
            break;
        case "Enregistrer":
            $tmp = "Save";
            break;
        case "Entête":
            $tmp = "Header";
            break;
        case "Entrez à nouveau le Mot de Passe":
            $tmp = "Retype Password";
            break;
        case "Envoyer à tous les membres":
            $tmp = "Email to all users";
            break;
        case "Envoyer La Lettre":
            $tmp = "Email NewsLetter";
            break;
        case "Envoyer par E-mail les nouveaux Articles à l'Administrateur":
            $tmp = "Mail New Stories to Admin";
            break;
        case "Envoyer un courriel à":
            $tmp = "Send an Email to";
            break;
        case "Envoyer":
            $tmp = "Send";
            break;
        case "Ephémérides":
            $tmp = "Ephemerids";
            break;
        case "ERREUR : cet identifiant est déjà utilisé":
            $tmp = "ERROR: Nickname taken";
            break;
        case "Erreur : cette URL est déjà présente dans la base de données !":
            $tmp = "ERROR: This URL is already listed in the Database!";
            break;
        case "ERREUR : DNS ou serveur de mail incorrect":
            $tmp = "ERROR : wrong DNS or mail server";
            break;
        case "Erreur : La Catégorie":
            $tmp = "ERROR: The Category";
            break;
        case "Erreur : La Sous-catégorie":
            $tmp = "ERROR: The SubCategory";
            break;
        case "Erreur : vous devez saisir un TITRE pour votre Lien !":
            $tmp = "ERROR: You need to type a TITLE for your URL!";
            break;
        case "Erreur : vous devez saisir une DESCRIPTION pour votre Lien !":
            $tmp = "ERROR: You need to type a DESCRIPTION for your URL!";
            break;
        case "Erreur : vous devez saisir une URL pour votre Lien !":
            $tmp = "ERROR: You need to type a URL for your URL!";
            break;
        case "est terminée !":
            $tmp = "is ended!";
            break;
        case "et tous ses Commentaires ?":
            $tmp = "and all it's comments?";
            break;
        case "et toutes ses bannières !!!":
            $tmp = "and all its Banners!!!";
            break;
        case "Etape suivante":
            $tmp = "Following stage";
            break;
        case "Etat : ":
            $tmp = "Status:";
            break;
        case "Etat":
            $tmp = "Status";
            break;
        case "Etes-vous certain de vouloir effacer cette publication ?":
            $tmp = "Are you sure you want delete this publication?";
            break;
        case "Etes-vous sûr de vouloir effacer ce sujet ?":
            $tmp = "Are you sure you want to delete Topic";
            break;
        case "Etes-vous sûr de vouloir effacer cet annonceur et TOUTES ses bannières ?":
            $tmp = "Are you sure you want to delete this Client and ALL its Banners?";
            break;
        case "Etes-vous sûr de vouloir effacer cet Article ?":
            $tmp = "Are you sure you want to delete this article?";
            break;
        case "Etes-vous sûr de vouloir effacer cette Bannière ?":
            $tmp = "Are you sure you want to delete this Banner?";
            break;
        case "Etes-vous sûr de vouloir effacer cette Rubrique ?":
            $tmp = "Are you sure you want to delete section";
            break;
        case "Etes-vous sûr de vouloir effacer cette sous-rubrique ?":
            $tmp = "Are you sure you want to delete this sub-section?";
            break;
        case "Etes-vous sûr de vouloir effacer l'Article N°":
            $tmp = "Are you sure you want to remove Story ID #";
            break;
        case "Etes-vous sûr de vouloir effacer":
            $tmp = "Are you sure you want to delete";
            break;
        case "Etes-vous sûr de vouloir EFFACER":
            $tmp = "Are you sure you want to DELETE";
            break;
        case "Etes-vous sûr de vouloir supprimer cette boîte de Titres ?":
            $tmp = "WARNING: Are you sure you want to delete this Headline?";
            break;
        case "Exclure TOUS les membres du groupe":
            $tmp = "Exclude ALL members from the group";
            break;
        case "Exclure":
            $tmp = "Exclude";
            break;
        case "Exemple":
            $tmp = "Example";
            break;
        case "existe déjà !":
            $tmp = "already exist!";
            break;
        case "Expédier en tant":
            $tmp = "send as";
            break;
        case "Extension des fichiers d'image":
            $tmp = "Image files'extension";
            break;
        case "Extraire l'annuaire":
            $tmp = "Export Memberlist";
            break;
        case "Fait : ":
            $tmp = "Made: ";
            break;
        case "Faq":
            $tmp = "FAQ";
            break;
        case "FAQ":
            $tmp = "FAQ";
            break;
        case "Fermé":
            $tmp = "Closed";
            break;
        case "Fermer les nouvelles inscriptions":
            $tmp = "Closed New Registration";
            break;
        case "Fichier de configuration automatique absent. Installation/désinstallation automatique impossible.":
            $tmp = "Missing configuration file. Impossible installation/uninstallation.";
            break;
        case "Fichier de formulaire":
            $tmp = "Form file";
            break;
        case "Fichiers configurations":
            $tmp = "Setting files";
            break;
        case "Fichiers dans /slogs. table par table, lignes par lignes, tables scindées : limite":
            $tmp = " Files in /slogs. table by table, row by row, tables fragmented : limit";
            break;
        case "Fichiers dans /slogs. table par table, tables non scindées : limite":
            $tmp = " Files in /slogs. table by table, tables complete : limit";
            break;
        case "Filtre":
            $tmp = "Filter";
            break;
        case "Fonction mail à utiliser":
            $tmp = "What Mail function to be used";
            break;
        case "Fonctions":
            $tmp = "Functions";
            break;
        case "Format de données":
            $tmp = "Data format";
            break;
        case "Format de fichier":
            $tmp = "File format";
            break;
        case "Forum classé en":
            $tmp = "Forum listed at";
            break;
        case "Forum d'origine":
            $tmp = "Source forum";
            break;
        case "Forum de destination":
            $tmp = "Destination forum";
            break;
        case "Fréquence de visite des Robots/Spiders":
            $tmp = "Robots/Spiders visit frequency";
            break;
        case "Fusionner des forums":
            $tmp = "Merge forums";
            break;
        case "Gain réalisable":
            $tmp = "Gained";
            break;
        case "Gain total réalisé":
            $tmp = "Total gain";
            break;
        case "génération automatique du DKIM par le portail.":
            $tmp = "automatic generation of the DKIM by the portal.";
            break;
        case "Gérer les Liens Relatifs : ":
            $tmp = "Manage Related Links:";
            break;
        case "Gestion des blocs":
            $tmp = "Blocs management";
            break;
        case "Gestion des forums":
            $tmp = "Forums management";
            break;
        case "Gestion des groupes":
            $tmp = "Groups management";
            break;
        case "Gestion des sujets":
            $tmp = "Topics management";
            break;
        case "Gestion des Sujets":
            $tmp = "Topics Manager";
            break;
        case "Gestion modules":
            $tmp = "Modules management";
            break;
        case "Gestion, Installation Modules":
            $tmp = "Manage, Instal Addons";
            break;
        case "Gestionnaire de Fichiers":
            $tmp = "File Manager";
            break;
        case "Gestionnaire Fichiers":
            $tmp = "Files Manager";
            break;
        case "Grands Titres de sites de News":
            $tmp = "Headlines";
            break;
        case "Groupe de travail":
            $tmp = "Workgroup";
            break;
        case "Groupe ID":
            $tmp = "Group ID";
            break;
        case "Groupe":
            $tmp = "Group";
            break;
        case "Groupes":
            $tmp = "Groups";
            break;
        case "Hauteur de l'image du backend":
            $tmp = "Backend Image Height";
            break;
        case "Heure locale":
            $tmp = "Local Time Format";
            break;
        case "Heure":
            $tmp = "Hour";
            break;
        case "Hors Ligne":
            $tmp = "off line";
            break;
        case "Icône":
            $tmp = "Icon";
            break;
        case "ID Article:":
            $tmp = "Story ID:";
            break;
        case "ID Utilisateur":
            $tmp = "User ID";
            break;
        case "ID":
            $tmp = "ID";
            break;
        case "Identifiant ":
            $tmp = "Login";
            break;
        case "Identifiant Utilisateur":
            $tmp = "Handle/UserID";
            break;
        case "Identifiant":
            $tmp = "Nickname";
            break;
        case "Identification E-mail de l'émetteur":
            $tmp = "Email Message";
            break;
        case "Ignorer (Efface toutes les demandes pour un Lien donné)":
            $tmp = "Ignore (Deletes all requests for a given link)";
            break;
        case "Ignorer":
            $tmp = "Ignore";
            break;
        case "Il y a":
            $tmp = "There are";
            break;
        case "Illimité":
            $tmp = "Unlimited";
            break;
        case "Image de garde":
            $tmp = "Cover image";
            break;
        case "Image du Sujet :":
            $tmp = "Topic Image:";
            break;
        case "Image pour la Rubrique : ":
            $tmp = "Section Image:";
            break;
        case "Image pour la Sous-Rubrique":
            $tmp = "Sub-Section Image";
            break;
        case "Image":
            $tmp = "Image";
            break;
        case "images":
            $tmp = "images";
            break;
        case "Imp. restantes":
            $tmp = "Imp. Left";
            break;
        case "Imp.":
            $tmp = "Imp.";
            break;
        case "Impossible d'écrire dans le fichier \"":
            $tmp = "Impossible to write in the file \"";
            break;
        case "Impressions réservées":
            $tmp = "Impressions Purchased";
            break;
        case "Impressions":
            $tmp = "Impressions";
            break;
        case "Inactif(s)":
            $tmp = "Inactive";
            break;
        case "Index":
            $tmp = "Index";
            break;
        case "Informations générales du site":
            $tmp = "General Site Info";
            break;
        case "Informations supplémentaires":
            $tmp = "Extra Info";
            break;
        case "Informations":
            $tmp = "Informations";
            break;
        case "Infos Groupe":
            $tmp = "Group Information";
            break;
        case "Installer le module":
            $tmp = "Install the module";
            break;
        case "Interface":
            $tmp = "Interface";
            break;
        case "Interne":
            $tmp = "Internal";
            break;
        case "Intitulé du Sondage":
            $tmp = "Polltitle";
            break;
        case "Intitulé du Sujet :":
            $tmp = "Topic Name:";
            break;
        case "Intitulé":
            $tmp = "Title";
            break;
        case "IP":
            $tmp = "IP";
            break;
        case "Jour":
            $tmp = "Day";
            break;
        case "jour(s)":
            $tmp = "day(s)";
            break;
        case "L'installation automatique du module":
            $tmp = "The automatic installation of the module";
            break;
        case "L'utilisation de NPDS et des modules est soumise à l'acceptation des termes de la licence GNU/GPL :":
            $tmp = "The use of NPDS and the modules is submissive with the acceptance of the terms of licence GNU/GPL:";
            break;
        case "la Catégorie":
            $tmp = "The Category";
            break;
        case "La configuration de la base de données MySql a réussie !":
            $tmp = "The configuration of the MySql database succeeded!";
            break;
        case "La configuration du(des) bloc(s) a réussi !":
            $tmp = "The configuration of (the) block(s) succeeded!";
            break;
        case "La désinstallation des modules n'est pas prise en charge de façon automatique à l'heure actuelle.":
            $tmp = "The desinstallation of the addons is not dealt with automatic of way at the present time.";
            break;
        case "La Lettre":
            $tmp = "Newsletter";
            break;
        case "La nuit commence à":
            $tmp = "Night start at";
            break;
        case "La nuit":
            $tmp = "The night";
            break;
        case "La publication que vous aviez en attente vient d'être validée.":
            $tmp = "The publication that you had on standby has been just validated.";
            break;
        case "La ré-affectation est terminée !":
            $tmp = "Congratulations! The Move has been completed!";
            break;
        case "Laisser les utilisateurs anonymes poster de nouveaux liens":
            $tmp = "Let Anonymous users post new links?";
            break;
        case "Langue de Prévisualisation":
            $tmp = "Preview' Language";
            break;
        case "Langue du backend":
            $tmp = "Backend Language";
            break;
        case "Langue principale":
            $tmp = "Main language";
            break;
        case "Large":
            $tmp = "Global";
            break;
        case "Largeur de l'image du backend":
            $tmp = "Backend Image Width";
            break;
        case "Le critique":
            $tmp = "Reviewer";
            break;
        case "Le jour commence à":
            $tmp = "Day start at";
            break;
        case "Le jour":
            $tmp = "The day";
            break;
        case "Le Modérateur sélectionné n'existe pas.":
            $tmp = "The selected Moderator doesn't exist in the database.";
            break;
        case "Le programme d'installation va maintenant exécuter le script SQL pour configurer la base de données MySql.":
            $tmp = "The installer is now going to run the SQL script to configure MySql.";
            break;
        case "Le programme d'installation va maintenant modifier le(s) fichier(s) suivant(s) :":
            $tmp = "The installer is now going to modify the following file(s) :";
            break;
        case "Le répertoire courant est : ":
            $tmp = "Current Directory is:";
            break;
        case "Le répertoire":
            $tmp = "The directory";
            break;
        case "Les administrateurs":
            $tmp = "The administrators";
            break;
        case "Les articles en archive":
            $tmp = "Articles in the archive";
            break;
        case "Les articles en ligne":
            $tmp = "Online articles";
            break;
        case "Les fichiers de configuration":
            $tmp = "The configuration files";
            break;
        case "Les modules":
            $tmp = "The addons";
            break;
        case "Les paramètres ont été correctement écrits dans le fichier \"":
            $tmp = "Parameters are correctly written in the file \"";
            break;
        case "Les paramètres sont déjà inscrits dans le fichier \"":
            $tmp = "Parameters are already written in the file \"";
            break;
        case "Les plus récents":
            $tmp = "Home";
            break;
        case "Les sondages":
            $tmp = "The Polls";
            break;
        case "les URLs que vous aurez renseignés ci-après (ne renseigner que la racine de l'URI)":
            $tmp = "The URL that you will have informed below (Inform only the root of the URI)";
            break;
        case "Lettre D'info":
            $tmp = "Little Newsletter";
            break;
        case "Lien N° : ":
            $tmp = "Link ID: ";
            break;
        case "Liens à valider.":
            $tmp = "Links waiting for checking.";
            break;
        case "Liens cassés rapportés par un ou plusieurs Utilisateurs":
            $tmp = "User Reported Broken Links";
            break;
        case "Liens en attente de validation":
            $tmp = "Links Waiting for Validation";
            break;
        case "Liens locaux sauf page courante":
            $tmp = "Links but no index";
            break;
        case "Liens relatifs : ":
            $tmp = "Related Links:";
            break;
        case "Liens rompus à valider.":
            $tmp = "Broken links waiting for checking.";
            break;
        case "Liens Web":
            $tmp = "Web Links";
            break;
        case "Liens":
            $tmp = "Links";
            break;
        case "Ligne 1":
            $tmp = "Footer Line 1";
            break;
        case "Ligne 2":
            $tmp = "Footer Line 2";
            break;
        case "Ligne 3":
            $tmp = "Footer Line 3";
            break;
        case "Ligne 4":
            $tmp = "Footer Line 4";
            break;
        case "Liste des articles":
            $tmp = "Articles list";
            break;
        case "Liste des catégories":
            $tmp = "Categories list";
            break;
        case "Liste des Grands Titres de sites de News":
            $tmp = "Headlines list";
            break;
        case "Liste des groupes":
            $tmp = "Groups List";
            break;
        case "Liste des liens":
            $tmp = "Links list";
            break;
        case "Liste des LNL envoyées":
            $tmp = "View Old Newsletter";
            break;
        case "Liste des membres":
            $tmp = "Members List";
            break;
        case "Liste des questions réponses":
            $tmp = "Questions Answers list";
            break;
        case "Liste des rubriques":
            $tmp = "Sections list";
            break;
        case "Liste des sondages":
            $tmp = "Polls list";
            break;
        case "Logo du site pour les impressions":
            $tmp = "Site Logo (for printing functions)";
            break;
        case "Logs":
            $tmp = "Logs";
            break;
        case "Longueur minimum du mot de passe des utilisateurs":
            $tmp = "Minimum users password length";
            break;
        case "M'envoyer un Mel lorsque qu'un Msg Int. arrive":
            $tmp = "Send me an email when Internal Msg arrive";
            break;
        case "Maintenance des Ephémérides (Editer/Effacer)":
            $tmp = "Ephemerid Maintenance (Edit/Delete):";
            break;
        case "Maintenance des Ephémérides":
            $tmp = "Ephemerids Maintenance";
            break;
        case "Maintenance des Forums":
            $tmp = "Forum Maintenance";
            break;
        case "Maintenance Forums":
            $tmp = "Forums Maintenance";
            break;
        case "Manuel en ligne":
            $tmp = "Online Manual";
            break;
        case "Marquer le module comme désinstallé":
            $tmp = "Mark the addon as uninstalled";
            break;
        case "Marquer le module comme installé":
            $tmp = "Mark module as installed";
            break;
        case "Marquer tous les Topics comme lus":
            $tmp = "Mark all Topics as Read";
            break;
        case "Mauvais Mot de Passe":
            $tmp = "bad password";
            break;
        case "max caractères":
            $tmp = "max character";
            break;
        case "Membre invisible":
            $tmp = "Invisible' member";
            break;
        case "Membre":
            $tmp = "Member";
            break;
        case "Membres":
            $tmp = "Members";
            break;
        case "Menu Administration":
            $tmp = "Administration Menu";
            break;
        case "Menu":
            $tmp = "Menu";
            break;
        case "Merci d'entrer l'information en fonction des spécifications":
            $tmp = "Please enter information according to the specifications";
            break;
        case "Merci de fournir une nouvelle adresse Email valide.":
            $tmp = "Please provide a new valid email address.";
            break;
        case "Merci pour votre Contribution !":
            $tmp = "Thanks for your submission!";
            break;
        case "Message d'entête":
            $tmp = "Header Messages";
            break;
        case "Message de l'E-mail":
            $tmp = "Email Message";
            break;
        case "Message de pied de page":
            $tmp = "Footer Messages";
            break;
        case "Message Interne":
            $tmp = "Private message";
            break;
        case "Message":
            $tmp = "Message";
            break;
        case "Meta obligatoire, ne pas le modifier ou le supprimer":
            $tmp = "Compulsory Meta, not to modify it or to suppress it";
            break;
        case "META-LANG":
            $tmp = "META-LANG";
            break;
        case "MétaTAGs":
            $tmp = "MetaTAGs";
            break;
        case "Mettre à jour":
            $tmp = "Update";
            break;
        case "mise à jour":
            $tmp = "update";
            break;
        case "Mode":
            $tmp = "Mode";
            break;
        case "Modérateur":
            $tmp = "Moderator";
            break;
        case "Modérateur(s)":
            $tmp = "Moderator(s)";
            break;
        case "Modérateurs uniquement":
            $tmp = "Moderators only";
            break;
        case "Modérateurs":
            $tmp = "Moderators";
            break;
        case "Modération par l'Administrateur":
            $tmp = "Moderation by Admin";
            break;
        case "Modération par les Utilisateurs":
            $tmp = "Moderation by Users";
            break;
        case "Modification de données dans table(s)":
            $tmp = "Modification of data in table(s)";
            break;
        case "Modification de":
            $tmp = "Modification of";
            break;
        case "Modifié":
            $tmp = "Modified";
            break;
        case "Modifier annonceur":
            $tmp = "Change Client";
            break;
        case "Modifier l'Article":
            $tmp = "ChangeStory";
            break;
        case "Modifier l'Editorial":
            $tmp = "Modify Editorial";
            break;
        case "Modifier l'information":
            $tmp = "Modify Info";
            break;
        case "Modifier la Bannière":
            $tmp = "Change Banner";
            break;
        case "Modifier la Catégorie":
            $tmp = "Modify Category";
            break;
        case "Modifier le groupe":
            $tmp = "Modify the group";
            break;
        case "Modifier le lien":
            $tmp = "Modify the link";
            break;
        case "Modifier le(s) fichier(s)":
            $tmp = "Alter the file(s)";
            break;
        case "Modifier les Liens":
            $tmp = "Modify Links";
            break;
        case "Modifier un ":
            $tmp = "Change a ";
            break;
        case "Modifier un Bloc droit":
            $tmp = "Change right Block";
            break;
        case "Modifier un Bloc gauche":
            $tmp = "Change left Block";
            break;
        case "Modifier un utilisateur":
            $tmp = "Modify User";
            break;
        case "Modifier":
            $tmp = "Modify";
            break;
        case "Module installé":
            $tmp = "Module installed";
            break;
        case "Module":
            $tmp = "Module";
            break;
        case "Modules":
            $tmp = "Addons";
            break;
        case "Mois":
            $tmp = "Month";
            break;
        case "Mot de Passe : ":
            $tmp = "Client Password: ";
            break;
        case "Mot de Passe":
            $tmp = "Password";
            break;
        case "Mot(s) clé(s)":
            $tmp = "Keyword(s)";
            break;
        case "n'a pas été envoyée":
            $tmp = "can't be sent";
            break;
        case "n'est pas modifiable tant qu'un autre n'est pas nommé pour ce forum":
            $tmp = "can not be changed until another is named for this forum";
            break;
        case "Nbre d'envois effectués":
            $tmp = "Number of Mail";
            break;
        case "Ne pas enregistrer les 'hits' des auteurs dans les statistiques":
            $tmp = "Don't record the Admin's hits in stats";
            break;
        case "Ne s'applique que si la catégorie : 'Articles' n'est pas sélectionnée.":
            $tmp = "Only works if Articles category isn't selected";
            break;
        case "News externes":
            $tmp = "Headlines";
            break;
        case "Niveau d'accès":
            $tmp = "Access Level";
            break;
        case "Niveau de l'Utilisateur":
            $tmp = "User Level";
            break;
        case "Nom : ":
            $tmp = "Name: ";
            break;
        case "Nom d'utilisateur":
            $tmp = "User Name";
            break;
        case "Nom d'utilisateur anonyme":
            $tmp = "Anonymous Default Name";
            break;
        case "Nom de fichier":
            $tmp = "File name";
            break;
        case "Nom de l'annonceur":
            $tmp = "Client Name";
            break;
        case "Nom de la Catégorie : ":
            $tmp = "Category Name: ";
            break;
        case "Nom de la Rubrique":
            $tmp = "Section Name";
            break;
        case "Nom de la Sous-catégorie : ":
            $tmp = "Sub-Category Name: ";
            break;
        case "Nom de la Sous-Rubrique : ":
            $tmp = "Sub-Section Name:";
            break;
        case "Nom du Contact : ":
            $tmp = "Contact Name: ";
            break;
        case "Nom du Contact":
            $tmp = "Contact Name";
            break;
        case "Nom du forum":
            $tmp = "Forum Name";
            break;
        case "Nom du produit":
            $tmp = "Product Title";
            break;
        case "Nom du serveur":
            $tmp = "Server Name";
            break;
        case "Nom du site : ":
            $tmp = "Site Name:";
            break;
        case "Nom du site pour la balise title":
            $tmp = "Html Site Name";
            break;
        case "Nom du site":
            $tmp = "Site Name";
            break;
        case "Nom":
            $tmp = "Name";
            break;
        case "Nombre d'article par page":
            $tmp = 'Administration';
            break;
        case "Nombre d'articles dans le bloc des anciens articles":
            $tmp = "Stories in Old Articles Box";
            break;
        case "Nombre d'articles en page principale":
            $tmp = "Stories Number in the Home";
            break;
        case "Nombre d'éléments dans la page top":
            $tmp = "Number of items in TOP Page";
            break;
        case "Nombre d'utilisateurs listés":
            $tmp = "Number of users listed";
            break;
        case "Nombre de clics sur un lien pour qu'il soit populaire":
            $tmp = "Hits to be Popular";
            break;
        case "Nombre de contributions par page":
            $tmp = "Posts per Page";
            break;
        case "Nombre de Forum(s)":
            $tmp = "No. of Forum(s)";
            break;
        case "Nombre de Hits":
            $tmp = "Hits";
            break;
        case "Nombre de Liens 'Meilleur'":
            $tmp = "Number of Links as Best";
            break;
        case "Nombre de Liens 'Nouveaux'":
            $tmp = "Number of Links as New";
            break;
        case "Nombre de liens dans les résultats des recherches":
            $tmp = "Links in Search Results";
            break;
        case "Nombre de liens par page":
            $tmp = "Links per Page";
            break;
        case "Nombre maximum de choix pour les sondages":
            $tmp = "Max Poll Options";
            break;
        case "Nombre maximum de commentaire par utilisateur en 24H":
            $tmp = "Maximum number of comments per user (24H)";
            break;
        case "Nombre maximum de contributions par IP et par période de 30 minutes (0=système inactif)":
            $tmp = "Maximum number of post per IP and per 30' period (0=system off)";
            break;
        case "Nombres d'articles en mode administration":
            $tmp = "Articles Number in Admin";
            break;
        case "Nommer":
            $tmp = "Nominate";
            break;
        case "non disponible":
            $tmp = "not present";
            break;
        case "non optimisée":
            $tmp = "not optimized";
            break;
        case "Non":
            $tmp = "No";
            break;
        case "Note : ":
            $tmp = "Score:";
            break;
        case "Note":
            $tmp = "User AVG Rating";
            break;
        case "Notes":
            $tmp = "Notes";
            break;
        case "Notifier les nouvelles contributions par E-mail":
            $tmp = "Notify new submissions by email";
            break;
        case "Nous avons approuvé votre contribution à notre moteur de recherche.":
            $tmp = "We approved your link submission for our search engine.";
            break;
        case "Nouveau Grand Titre":
            $tmp = "New Headline";
            break;
        case "Nouveau Lien ajouté dans la base de données":
            $tmp = "New Link added to the Database";
            break;
        case "Nouveaux Articles postés":
            $tmp = "New Stories Submissions";
            break;
        case "Nouvel administrateur":
            $tmp = "New administrator";
            break;
        case "Nouvel Article":
            $tmp = "New Article";
            break;
        case "Nouvelle Catégorie ajoutée":
            $tmp = "New Category Added!";
            break;
        case "Nouvelles du groupe":
            $tmp = "Group news.";
            break;
        case "Ok":
            $tmp = "Go!";
            break;
        case "Optimisation de la base de données":
            $tmp = "Optimization of the database";
            break;
        case "Optimisation effectuée":
            $tmp = "Optimization done";
            break;
        case "optimisée":
            $tmp = "optimized";
            break;
        case "OptimySQL":
            $tmp = "OptimizeMySql";
            break;
        case "Option : ":
            $tmp = "Option: ";
            break;
        case "Option":
            $tmp = "Option";
            break;
        case "Options des sondages":
            $tmp = "Voting Options";
            break;
        case "Options pour les Bannières":
            $tmp = "Banners Options";
            break;
        case "Options pour les Commentaires":
            $tmp = "Comments Options";
            break;
        case "Original":
            $tmp = "Original";
            break;
        case "Oter":
            $tmp = "Remove";
            break;
        case "ou les affecter à une autre Catégorie.":
            $tmp = "or you can Move ALL the stories to a New Category.";
            break;
        case "Oui":
            $tmp = "Yes";
            break;
        case "Page courante sans liens locaux":
            $tmp = "Index without links";
            break;
        case "Page de démarrage":
            $tmp = "Start Page";
            break;
        case "Page(s)":
            $tmp = "Page(s)";
            break;
        case "Par défaut, rien ou Tout sauf pour ... [aucune URI] = aucune restriction":
            $tmp = "By defaut, nothing or All except [no URI] = no limitation";
            break;
        case "par exemple : genial.png":
            $tmp = "for example: games.gif";
            break;
        case "par":
            $tmp = "by";
            break;
        case "Paramètres liés à l'illustration":
            $tmp = "Some Graphics Stuff";
            break;
        case "Paramètres":
            $tmp = "Parameters";
            break;
        case "Parcourir":
            $tmp = "Browse";
            break;
        case "Pas d'affichage du cache":
            $tmp = "No use of cache";
            break;
        case "Pas d'installeur disponible":
            $tmp = "No installer available";
            break;
        case "Pas d'utilisation des descriptions ODP ou YDIR":
            $tmp = "No use of ODP or YDIR descriptions";
            break;
        case "Pas de modération":
            $tmp = "No Moderation";
            break;
        case "Pas de nouveaux Articles postés":
            $tmp = "No New Submissions";
            break;
        case "Petite Lettre D'information":
            $tmp = "Little Newsletter";
            break;
        case "Pied":
            $tmp = "Footer";
            break;
        case "Port TCP":
            $tmp = "TCP port";
            break;
        case "Position":
            $tmp = "Position";
            break;
        case "Poster un Article ":
            $tmp = "PostStory";
            break;
        case "Poster un Article Admin":
            $tmp = "Post Admin Story";
            break;
        case "Pour les bannières encore plus complexes (Flash, ...), saisir simplement la référence à votre_répertoire/votre_fichier .txt (fichier de code php) dans la zone URL du clic et laisser la zone image vide.":
            $tmp = "For more complexe Banners (Flash, ...) : just put the ref to your_dir/your_file .txt in ClickUrl TextBox.";
            break;
        case "Pour les bannières Javascript, saisir seulement le code javascript dans la zone URL du clic et laisser la zone image vide.":
            $tmp = "For Javascript Banners with no Image Url : just put the javascript code in ClickUrl TextBox.";
            break;
        case "Pour les grands titres de sites de news, activer la vérification de l'existance d'un web sur le Port 80":
            $tmp = "Headlines : Check the existance of Port 80 web";
            break;
        case "Pour les pages HTML générées, activer les tags avancés de gestion du cache":
            $tmp = "Cache Control : Activate the advanced cache tags (pragma ...)";
            break;
        case "Pour prévisualiser le contenu dans son environnement d'exploitation.":
            $tmp = "Preview the result in production' area.";
            break;
        case "Pour supprimer votre abonnement à notre Lettre, suivez ce lien":
            $tmp = "For Unsubscribe, please goto here";
            break;
        case "Pour un passage automatique au contrôle du (des) prochain(s) lot : cocher.":
            $tmp = "For automatic passage to the control of the next batch(es): check.";
            break;
        case "Précédent":
            $tmp = "Previous";
            break;
        case "Préférences":
            $tmp = "Preferences";
            break;
        case "Prévisualiser l'Article":
            $tmp = "Preview Story";
            break;
        case "Prévisualiser":
            $tmp = "Preview";
            break;
        case "Privé":
            $tmp = "Private";
            break;
        case "Proposé":
            $tmp = "Proposed";
            break;
        case "Proposition de modifications de Liens":
            $tmp = "Link Modification Requests";
            break;
        case "Propriétaire de la page Web":
            $tmp = "Owner Website";
            break;
        case "Propriétaire":
            $tmp = "Owner";
            break;
        case "Protocole de chiffrement":
            $tmp = "Encryption protocol";
            break;
        case "Public":
            $tmp = "Public";
            break;
        case "Publication Anonyme autorisée":
            $tmp = "Anonymous Posting";
            break;
        case "publication(s) attachée(s)":
            $tmp = "attached publication(s)";
            break;
        case "Publication(s) en attente de validation":
            $tmp = "Publication(s) waiting for validation";
            break;
        case "Publications connexes":
            $tmp = "Related publications";
            break;
        case "publications":
            $tmp = "publications";
            break;
        case "Publier dans la racine ?":
            $tmp = "Publish in Home?";
            break;
        case "Publier":
            $tmp = "Publish";
            break;
        case "Puis votre compte pourra être supprimé.":
            $tmp = "Then your account can be deleted.";
            break;
        case "qu'administrateur":
            $tmp = "administrator";
            break;
        case "que membre":
            $tmp = "member";
            break;
        case "Que voulez-vous faire ?":
            $tmp = "What do you want to do?";
            break;
        case "Question : ":
            $tmp = "Question:";
            break;
        case "Question":
            $tmp = "Question";
            break;
        case "Questions & Réponses":
            $tmp = "Questions and Answers";
            break;
        case "Qui parle de nous ?":
            $tmp = "Who is linking our site?";
            break;
        case "Rafraîchir":
            $tmp = "Refresh";
            break;
        case "Re-prévisualiser":
            $tmp = "Preview Again";
            break;
        case "Recherche rapide":
            $tmp = "Fast search";
            break;
        case "Rechercher utilisateur":
            $tmp = "Search for user";
            break;
        case "Réessayer avec chmod automatique":
            $tmp = "Retry with auto chmod";
            break;
        case "Remettre cet article en première position ? : ":
            $tmp = "Put again this New in first position? : ";
            break;
        case "Replier la liste":
            $tmp = "Hide list";
            break;
        case "Réponse : ":
            $tmp = "Answer:";
            break;
        case "Réponse":
            $tmp = "Answer";
            break;
        case "Requête de modification d'un Lien Utilisateur":
            $tmp = "User Link Modification Requests";
            break;
        case "Réseaux sociaux":
            $tmp = "Social networks";
            break;
        case "Réservé : ":
            $tmp = "Purchased: ";
            break;
        case "Restreinte":
            $tmp = "Local";
            break;
        case "Restriction":
            $tmp = "Limitation";
            break;
        case "rétention en secondes":
            $tmp = "retention in seconds";
            break;
        case "Rétention":
            $tmp = "Retention";
            break;
        case "Retirer un Sondage existant":
            $tmp = "Remove an existing poll";
            break;
        case "Retirer":
            $tmp = "Remove";
            break;
        case "Retour à l'index d'administration":
            $tmp = "Go to Admin Section";
            break;
        case "Retour à la racine":
            $tmp = "Back to root";
            break;
        case "Retour en arrière, pour changer le Nom":
            $tmp = "Go Back to Change the Name";
            break;
        case "Retour en arrière":
            $tmp = "Back";
            break;
        case "Revenir aux avatars standards":
            $tmp = "Re-activate the standard'avatars";
            break;
        case "Robots/Spiders":
            $tmp = "Robots/Spiders";
            break;
        case "Rôle de l'Utilisateur":
            $tmp = "Member' role";
            break;
        case "Rubrique de téléchargement":
            $tmp = "Download Section";
            break;
        case "rubrique":
            $tmp = "section";
            break;
        case "Rubrique":
            $tmp = "Section";
            break;
        case "Rubriques actives":
            $tmp = "Current Active Sections";
            break;
        case "Rubriques":
            $tmp = "Sections Manager";
            break;
        case "rubriques":
            $tmp = "sections";
            break;
        case "S.V.P. Choisissez un sondage dans la liste suivante.":
            $tmp = "Please choose a poll from the list below.";
            break;
        case "S.V.P. entrez chaque option disponible dans un seul champ":
            $tmp = "Please enter each available option into a single field";
            break;
        case "Sans nom":
            $tmp = "No name";
            break;
        case "Sans réponse de votre part sous 60 jours vous ne pourrez plus vous connecter en tant que membre sur ce site.":
            $tmp = "Without response from you within 60 days you will not be able to log in as a member on this site.";
            break;
        case "Sans titre":
            $tmp = "Untitled";
            break;
        case "Sauter cette étape et afficher le code du(des) bloc(s)":
            $tmp = "Jump this stage and display (the) code of the block(s)";
            break;
        case "Sauter cette étape":
            $tmp = "Skip this stage";
            break;
        case "Sauvegarde de la base de données":
            $tmp = "Database saved";
            break;
        case "Sauvegarde terminée. Les fichiers sont disponibles dans le répertoire /slogs":
            $tmp = "Save ended. Files are in the directory /slogs";
            break;
        case "Sauver l'Article Automatique":
            $tmp = "Save Auto Story";
            break;
        case "Sauver les modifications":
            $tmp = "Save Changes";
            break;
        case "Sauver":
            $tmp = "Save";
            break;
        case "SavemySQL":
            $tmp = "SavemySQL";
            break;
        case "Script":
            $tmp = "Script";
            break;
        case "Sélectionner la langue du site":
            $tmp = "Select the Language for your Site";
            break;
        case "Sélectionner la nouvelle Catégorie : ":
            $tmp = "Please Select the New Category:";
            break;
        case "Sélectionner un Sujet":
            $tmp = "Select Topic";
            break;
        case "Sélectionner une Catégorie à supprimer":
            $tmp = "Select a Category to Delete:";
            break;
        case "Sélectionner une Catégorie":
            $tmp = "Select a Category";
            break;
        case "seront affectés à":
            $tmp = "will be moved.";
            break;
        case "Serveurs de mail incorrects":
            $tmp = "Invalid mail server";
            break;
        case "Serveurs de mails contrôlés":
            $tmp = "Checked Mail servers";
            break;
        case "Seuil pour les Sujet 'chauds'":
            $tmp = "Hot Topic Threshold";
            break;
        case "Seulement aux membres":
            $tmp = "Only to members";
            break;
        case "Seulement aux prospects":
            $tmp = "Only to outside users";
            break;
        case "Seulement pour ...":
            $tmp = "Only for....";
            break;
        case "Si Super administrateur est coché, cet administrateur aura TOUS les droits.":
            $tmp = "If Super administrator is checked then this administrator will get full right.";
            break;
        case "Si vous le souhaitez, vous pouvez exécuter ce script vous même, si vous souhaitez par exemple l'exécuter sur une autre base que celle du site. Dans ce cas, pensez à reparamétrer le fichier de configuration du module.":
            $tmp = "If you wish it, you can run this script you even, if you wish for example to run it on another base than that of the site. In that case, think of re-setting the file of configuration of the module.";
            break;
        case "Si vous préférez créer vous même le(s) bloc(s), cliquez sur 'Sauter cette étape et afficher le code du(des) bloc(s)' pour visualiser le code à taper dans le(s) bloc(s).":
            $tmp = "If you prefer to create you even (the) block(s), click on 'Jump this stage and display the code of (the) block(s)' to show the code to be typed in (the) block(s).";
            break;
        case "Signature":
            $tmp = "Signature";
            break;
        case "Sites Référents":
            $tmp = "HTTP Referers";
            break;
        case "Situation géographique":
            $tmp = "Location";
            break;
        case "Skin d'affichage par défaut":
            $tmp = "Default Skin for your Site";
            break;
        case "Slogan du site":
            $tmp = "Site Slogan";
            break;
        case "Sondage":
            $tmp = "Survey";
            break;
        case "Sondages":
            $tmp = "Surveys/Polls";
            break;
        case "Soumission de Liens brisés":
            $tmp = "Broken Link Reports";
            break;
        case "Sous-catégorie :":
            $tmp = "Subcat:";
            break;
        case "sous-rubrique":
            $tmp = "sub-section";
            break;
        case "Sous-rubrique":
            $tmp = "Sub-section";
            break;
        case "sous-rubrique(s) attachée(s)":
            $tmp = "attached sub-section(s)";
            break;
        case "sous-rubriques":
            $tmp = "sub-sections";
            break;
        case "Sous-rubriques":
            $tmp = "Sub-sections";
            break;
        case "Standard":
            $tmp = "Standard";
            break;
        case "Strict":
            $tmp = "Strict";
            break;
        case "Structure de la table":
            $tmp = "Table structure for table";
            break;
        case "Suivant":
            $tmp = "Next";
            break;
        case "Sujet : ":
            $tmp = "Topic:";
            break;
        case "Sujet de l'E-mail":
            $tmp = "Email Subject";
            break;
        case "Sujet":
            $tmp = "Topic";
            break;
        case "Sujets actifs":
            $tmp = "Current Active Topics";
            break;
        case "Sujets par forum":
            $tmp = "Topics per Forum";
            break;
        case "Super administrateur":
            $tmp = "Super administrator";
            break;
        case "SuperCache":
            $tmp = "SuperCache";
            break;
        case "Suppression de table(s)":
            $tmp = "Deletion of table(s)";
            break;
        case "Suppression effectuée":
            $tmp = "Deletion Completed!";
            break;
        case "Supprimer cette Critique":
            $tmp = "Delete this notice";
            break;
        case "Supprimer forum du groupe":
            $tmp = "Delete forum of the group";
            break;
        case "Supprimer groupe":
            $tmp = "Delete group";
            break;
        case "Supprimer l'Annonceur":
            $tmp = "Delete Advertising Client";
            break;
        case "Supprimer la question réponse":
            $tmp = "Delete the Question Answer";
            break;
        case "Supprimer la rubrique":
            $tmp = "Delete section";
            break;
        case "Supprimer la sous-rubrique":
            $tmp = "Delete the sub-section";
            break;
        case "Supprimer le fichier":
            $tmp = "Delete the file";
            break;
        case "Supprimer massivement les Topics":
            $tmp = "Massive Topics delete";
            break;
        case "Supprimer MiniSite du groupe":
            $tmp = "Delete mini Web site for the group";
            break;
        case "Supprimer un utilisateur":
            $tmp = "Delete User";
            break;
        case "Supprimer une Catégorie":
            $tmp = "Delete Category";
            break;
        case "Supprimer":
            $tmp = "Delete";
            break;
        case "Surnom":
            $tmp = "Handle";
            break;
        case "Synchroniser les forums":
            $tmp = "Synchronise forums";
            break;
        case "Système de Messagerie (Email)":
            $tmp = "Mail System";
            break;
        case "Système":
            $tmp = "System";
            break;
        case "Table":
            $tmp = "Table";
            break;
        case "Tableau de Bord":
            $tmp = "Administration BlackBoard";
            break;
        case "Taille actuelle":
            $tmp = "Actual size";
            break;
        case "Taille de fichier":
            $tmp = "Filesize";
            break;
        case "Taille maximum des avatars personnels (largeur * hauteur / 60*80) en pixel":
            $tmp = "Maximum size in pixel for uploaded avatars (Width * Height / 60*80)";
            break;
        case "Taille maximum des fichiers de sauvegarde SaveMysql":
            $tmp = "Maximum files size for SaveMysql";
            break;
        case "Taille":
            $tmp = "Size";
            break;
        case "Téléchargements":
            $tmp = "Downloads";
            break;
        case "Télécharger URL":
            $tmp = "Download URL";
            break;
        case "Temps de rétention en secondes":
            $tmp = "Retention time in seconds";
            break;
        case "Texte : ":
            $tmp = "Text:";
            break;
        case "Texte complet":
            $tmp = "Full Text";
            break;
        case "Texte d'introduction":
            $tmp = "Intro Text";
            break;
        case "Texte du Sujet :":
            $tmp = "Topic Text:";
            break;
        case "Texte étendu":
            $tmp = "Extended Text";
            break;
        case "Texte pour le rôle":
            $tmp = "Text for role";
            break;
        case "Texte":
            $tmp = "Text";
            break;
        case "TEXTE":
            $tmp = "TEXT";
            break;
        case "Thème d'affichage par défaut":
            $tmp = "Default Theme for your Site";
            break;
        case "Titre :":
            $tmp = "Title:";
            break;
        case "Titre de la Page des Critiques":
            $tmp = "Reviews Page Title";
            break;
        case "Titre de la page":
            $tmp = "Page title";
            break;
        case "Titre du backend":
            $tmp = "Backend Title";
            break;
        case "Titre du lien : ":
            $tmp = "Link title:";
            break;
        case "Titre":
            $tmp = "Title";
            break;
        case "Tous les Articles dans":
            $tmp = "ALL stories under";
            break;
        case "Tous les Sujets":
            $tmp = "All Topics";
            break;
        case "Tous les Utilisateurs":
            $tmp = "To all users";
            break;
        case "Tous sauf pour ...":
            $tmp = "All except for....";
            break;
        case "Tous vos abonnements vers cette adresse Email ont été suspendus.":
            $tmp = "All your subscriptions to this email address have been suspended.";
            break;
        case "Tous":
            $tmp = "All";
            break;
        case "Tout cocher":
            $tmp = "Check all";
            break;
        case "Tout contenu (page/liens/etc)":
            $tmp = "All content";
            break;
        case "Tout décocher":
            $tmp = "Uncheck all";
            break;
        case "Tout public":
            $tmp = "All public";
            break;
        case "Tout supprimer":
            $tmp = "Delete All";
            break;
        case "Toute tables. Fichier envoyé au navigateur. Pas de limite de taille":
            $tmp = "All tables. file send to navigator. no size limit";
            break;
        case "Toutes les souscriptions de ces utilisateurs ont été suspendues.":
            $tmp = "All subscriptions from these users have been suspended.";
            break;
        case "Transférer à Droite":
            $tmp = "Move to Right-side";
            break;
        case "Transférer à Gauche":
            $tmp = "Move to Left-side";
            break;
        case "Transitional":
            $tmp = "Transitional";
            break;
        case "Transmission LNL en cours":
            $tmp = "LNL Transmit in progress";
            break;
        case "Type :":
            $tmp = "Type:";
            break;
        case "Type d'éditorial":
            $tmp = "Type of editorial";
            break;
        case "Type de modération":
            $tmp = "Type of Moderation";
            break;
        case "Type de sauvegarde SaveMysql":
            $tmp = "SaveMysql save type";
            break;
        case "Type":
            $tmp = "Type";
            break;
        case "Un message privé leur a été envoyé sans réponse à ce message sous 60 jours ces utilisateurs ne pourront plus se connecter au site.":
            $tmp = "A private message has been sent to them without reply to this message within 60 days these users will no longer be able to connect to the site.";
            break;
        case "Une erreur est survenue lors de l'exécution du script SQL. Mysql a répondu :":
            $tmp = "An error arose during the run of the SQL script. Mysql answered:";
            break;
        case "Une erreur est survenue lors de la configuration automatique du(des) bloc(s). Mysql a répondu :":
            $tmp = "An error arose during the configuration of (the) block(s). Mysql answered:";
            break;
        case "Une fois que vous aurez validé cette publication, elle sera intégrée en base temporaire, et l'administrateur sera prévenu. Il visera cette publication et la mettra en ligne dans les meilleurs délais.Il est normal que pour l'instant, cette publication n'apparaisse pas dans l'arborescence.":
            $tmp = "Once that you will have validated this publication, it will be integrated in temporary base, and the administrator will be warned. He will aim this publication. It is normal than for the moment, this publication does not appear in the tree structure.";
            break;
        case "Upload":
            $tmp = "Upload";
            break;
        case "URL : ":
            $tmp = "URL: ";
            break;
        case "URL de l'image du backend":
            $tmp = "Backend Image URL";
            break;
        case "URL de l'image":
            $tmp = "Image URL";
            break;
        case "URL de la Page":
            $tmp = "Page URL";
            break;
        case "URL du clic":
            $tmp = "Click URL";
            break;
        case "URL du site":
            $tmp = "Site URL";
            break;
        case "URL pour le fichier RDF/XML":
            $tmp = "URL for the RDF/XML file";
            break;
        case "Url":
            $tmp = "Url";
            break;
        case "URL":
            $tmp = "URL";
            break;
        case "Utilisateur en attente de groupe !":
            $tmp = "User(s) awaiting group!";
            break;
        case "Utilisateur en attente de validation !":
            $tmp = "User(s) awaiting validation !";
            break;
        case "Utilisateur enregistré uniquement":
            $tmp = "Registered users only";
            break;
        case "Utilisateur enregistré":
            $tmp = "Registered User";
            break;
        case "Utilisateur inexistant !":
            $tmp = "User doesn't exist!";
            break;
        case "Utilisateur":
            $tmp = "user";
            break;
        case "Utilisateurs":
            $tmp = "Users";
            break;
        case "Utiliser 587 si vous avez activé le chiffrement TLS":
            $tmp = "Use 587 if you have TLS encryption enabled";
            break;
        case "Validation de votre publication":
            $tmp = "Validation of your publication";
            break;
        case "Valider":
            $tmp = "Submit";
            break;
        case "Version":
            $tmp = "Version";
            break;
        case "Veuillez choisir un type de META-MOT":
            $tmp = "Please choose a type of META-MOT";
            break;
        case "Veuillez configurer manuellement le(s) bloc(s).":
            $tmp = "Please configure manually the block(s).";
            break;
        case "Veuillez éditer ce fichier manuellement ou réessayez en tentant de faire un chmod automatique sur le(s) fichier(s) concernés.":
            $tmp = "Please edit this file manually or retry by trying to make an automatic chmod on the file(s) concerned.";
            break;
        case "Veuillez l'exécuter manuellement via phpMyAdmin.":
            $tmp = "Please run it manually in phpMyAdmin.";
            break;
        case "Veuillez nommer différement ce nouveau META-MOT":
            $tmp = "Please choose another name for this new META-MOT";
            break;
        case "Vider le répertoire cache":
            $tmp = "Empty the Cache Directory";
            break;
        case "Visite":
            $tmp = "Visit";
            break;
        case "Visiter le site web":
            $tmp = "Visit the web site";
            break;
        case "Visiter":
            $tmp = "Visit";
            break;
        case "Visualiser":
            $tmp = "View";
            break;
        case "Voici la description du(des) bloc(s) qui sera(seront) créé(s) :":
            $tmp = "Here is the description of (the) block(s) which will be created:";
            break;
        case "Voici le code à taper dans le fichier :":
            $tmp = "Here is the code to type in the file:";
            break;
        case "Voici le code des bloc(s) :":
            $tmp = "Here is the code of block(s):";
            break;
        case "Voici le script SQL :":
            $tmp = "Here is the SQL script:";
            break;
        case "Voir les forums de cette catégorie":
            $tmp = "Show the forums of this category";
            break;
        case "Voir":
            $tmp = "See";
            break;
        case "Vos droits de publications vous permettent de mettre à jour ou de supprimer ce contenu mais pas de la mettre en ligne sur le site.":
            $tmp = "Your rights of publications enable you to update or to remove this content but not to put it on line.";
            break;
        case "Vos droits de publications vous permettent de mettre à jour, de supprimer ou de le mettre en ligne sur le site ce contenu.":
            $tmp = "Your rights of publications enable you to update, to remove or to put on line this content.";
            break;
        case "Vos MétaTags ont été modifiés avec succès !":
            $tmp = "Your metatags has been successfully modified !";
            break;
        case "Vote fermé":
            $tmp = "Vote closed";
            break;
        case "Vote":
            $tmp = "Vote";
            break;
        case "Votre adresse Email est incorrecte.":
            $tmp = "Your email address is incorrect.";
            break;
        case "Votre adresse IP (= ne pas comptabiliser les hits qui en proviennent)":
            $tmp = "Your IP for not counting hits";
            break;
        case "Votre Lien":
            $tmp = "Your Link at";
            break;
        case "Votre situation géographique":
            $tmp = "Location";
            break;
        case "Vous allez exclure TOUS les membres du groupe":
            $tmp = "You will exclude ALL members from the group";
            break;
        case "Vous allez supprimer le groupe":
            $tmp = "You will delete the group";
            break;
        case "Vous avez choisi de configurer manuellement vos blocs. Voici le contenu de ceux-ci :":
            $tmp = "You chose to configure manually your blocks. Here is the contents of these:";
            break;
        case "Vous devez désinstaller le module manuellement. Pour cela, référez vous au fichier install.txt de l'archive du module, et faites les opérations inverses de celles décrites dans la section \"Installation manuelle\", et en partant de la fin.":
            $tmp = "You owe to uninstall manually the addon. For that, refer to the file install.txt of the file of the addon, and make the operations opposite of those described in the section \"Installation manual\", and on the basis of the end.";
            break;
        case "Vous devez remplir tous les Champs":
            $tmp = "You must complete all compulsory fields";
            break;
        case "vous devez supprimer TOUS ses membres !":
            $tmp = "you must exclude ALL of this members !";
            break;
        case "Vous devez vous identifier aussi en tant que membre pour utiliser cette fonction.":
            $tmp = "You must be ALSO connected as a member to use this function.";
            break;
        case "Vous êtes sur le point de supprimer cet annonceur : ":
            $tmp = "You are about to delete client:";
            break;
        case "Vous faites désormais partie des membres du groupe":
            $tmp = "From now you are member of the group";
            break;
        case "Vous ne faites plus partie des membres du groupe":
            $tmp = "You are no more member of the group";
            break;
        case "Vous ne pouvez pas exclure":
            $tmp = "You can not exclude";
            break;
        case "Vous pouvez choisir maintenant de créer automatiquement un(des) bloc(s) à droite ou à gauche. Cliquer sur \"Créer le(s) bloc(s) à gauche\" ou \"Créer le(s) bloc(s) à droite\" selon votre choix. (Vous pourrez changer leurs positions par la suite dans le panneau d'administration --> Blocs)":
            $tmp = "You can choose now to create automatically one or many blocks to the right or to the left. Click on \"Create (the) block(s) to the left \" or \"Create (the) block(s) to the right\" according to your choice. (You will be able to change their positions thereafter in the panel of administration --> Blocs)";
            break;
        case "Vous pouvez simplement Effacer / Modifier les Critiques en naviguant sur":
            $tmp = "You can simply delete/modify reviews by browsing";
            break;
        case "Vous pouvez supprimer la Catégorie, les Articles et Commentaires":
            $tmp = "You can Delete this Category and ALL its stories and comments";
            break;
        case "Vous pouvez utiliser notre moteur de recherche sur : ":
            $tmp = "You can browse our search engine at:";
            break;
        default:
            $tmp = "Need to be translated [** $phrase **]";
            break;
    }
    return (htmlentities($tmp, ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401, 'UTF-8'));
}