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
/*                                                                      */
/*                                                                      */
/* Translated by :                                                      */
/*                                                                      */
/************************************************************************/

function translate($phrase)
{
    $tmp = translate_pass1($phrase);
    include("Language/lang-mods.php");
    return (htmlentities($tmp, ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401, 'UTF-8'));
}

function translate_pass1($phrase)
{
    settype($englishname, 'string');
    switch ($phrase) {
        case "$englishname":
            $tmp = "$englishname";
            break;
        case "Monday":
            $tmp = "Monday";
            break;
        case "Tuesday":
            $tmp = "Tuesday";
            break;
        case "Wednesday":
            $tmp = "Wednesday";
            break;
        case "Thursday":
            $tmp = "Thursday";
            break;
        case "Friday":
            $tmp = "Friday";
            break;
        case "Saturday":
            $tmp = "Saturday";
            break;
        case "Sunday":
            $tmp = "Sunday";
            break;
        case "January":
            $tmp = "January";
            break;
        case "February":
            $tmp = "February";
            break;
        case "March":
            $tmp = "March";
            break;
        case "April":
            $tmp = "April";
            break;
        case "May":
            $tmp = "May";
            break;
        case "June":
            $tmp = "June";
            break;
        case "July":
            $tmp = "July";
            break;
        case "August":
            $tmp = "August";
            break;
        case "September":
            $tmp = "September";
            break;
        case "October":
            $tmp = "October";
            break;
        case "November":
            $tmp = "November";
            break;
        case "December":
            $tmp = "December";
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

        case "0":
            $tmp = "zero";
            break;
        case "1":
            $tmp = "one";
            break;
        case "2":
            $tmp = "twho";
            break;
        case "3":
            $tmp = "three";
            break;
        case "4":
            $tmp = "four";
            break;
        case "5":
            $tmp = "five";
            break;
        case "6":
            $tmp = "six";
            break;
        case "7":
            $tmp = "seven";
            break;
        case "8":
            $tmp = "eight";
            break;
        case "9":
            $tmp = "nine";
            break;
        case "+":
            $tmp = "plus";
            break;
        case "-":
            $tmp = "minus";
            break;
        case "/":
            $tmp = "divided by";
            break;
        case "*":
            $tmp = "multiplied by";
            break;

        case " le...":
            $tmp = " on...";
            break;
        case "-Identifiant : ":
            $tmp = "-Nickname: ";
            break;
        case "-Mot de passe : ":
            $tmp = "-Password: ";
            break;
        case ".:Page >> Super-Cache:.":
            $tmp = ".:Page >> Super-Cache:.";
            break;
        case "(255 caractères max. Entrez votre signature (mise en forme html))":
            $tmp = "(255 characters max. Type your signature with HTML coding)";
            break;
        case "(255 caractères max). Précisez qui vous êtes, ou votre identification sur ce site)":
            $tmp = "(255 characters max. Type what others can know about yourself)";
            break;
        case "(Cette adresse Email ne sera pas divulguée, mais elle nous servira à vous envoyer votre Mot de Passe si vous le perdez)":
            $tmp = "(This Email will not be public but is required, will be used to send your password if you lost it)";
            break;
        case "(Cette adresse Email sera publique. Vous pouvez saisir ce que vous voulez mais attention au Spam)":
            $tmp = "(This Email will be public. Just type what you want, Spam proof)";
            break;
        case "(indispensable)":
            $tmp = "(required)";
            break;
        case "(optionnel)":
            $tmp = "(optional)";
            break;
        case "(Pour activer un nouveau mot de passe, introduisez-le dans les 2 cases)":
            $tmp = "(type a new password twice to change it)";
            break;
        case "* Désigne un champ obligatoire":
            $tmp = "* for mandatory field";
            break;
        case "0 : illimité / 1 à":
            $tmp = "0 : unlimited / 1 to";
            break;
        case "à : ":
            $tmp = "To: ";
            break;
        case "à cette personne : ":
            $tmp = "to a specified friend:";
            break;
        case "a écrit :":
            $tmp = "wrote:";
            break;
        case "a été envoyé à":
            $tmp = "has been sent to";
            break;
        case "A propos des messages publiés :":
            $tmp = "About Posting:";
            break;
        case "a trouvé cet article intéressant et a souhaité vous l'envoyer.":
            $tmp = "considered the following article interesting and wanted to send it to you.";
            break;
        case "a trouvé notre site":
            $tmp = "considered our site";
            break;
        case "à":
            $tmp = "to";
            break;
        case "Abon.":
            $tmp = "Sub.";
            break;
        case "Abonnement":
            $tmp = "Subscribe";
            break;
        case "Accepter":
            $tmp = "Accept";
            break;
        case "Accessible à tous":
            $tmp = "Free for All";
            break;
        case "Activé":
            $tmp = "On";
            break;
        case "Activer votre menu personnel":
            $tmp = "Activate Personal Menu";
            break;
        case "Activité du site":
            $tmp = "Website Activity";
            break;
        case "Activité":
            $tmp = "Occupation";
            break;
        case "Actuellement connecté en administrateur... Cette critique sera":
            $tmp = "Currently logged in as admin... this review will be";
            break;
        case "Administrateur : ":
            $tmp = "Admin:";
            break;
        case "Adresse DNS de l'utilisateur : ":
            $tmp = "User DNS: ";
            break;
        case "Adresse IP de l'utilisateur : ":
            $tmp = "User IP: ";
            break;
        case "Adresse":
            $tmp = "Address";
            break;
        case "Adresses IP et informations sur les utilisateurs":
            $tmp = "Users IP and Account information";
            break;
        case "Affichage filtré pour":
            $tmp = "Display filtered with";
            break;
        case "Afficher ce commentaire":
            $tmp = "Show this comment";
            break;
        case "Afficher ce post":
            $tmp = "Show this post";
            break;
        case "Afficher la signature":
            $tmp = "Show signature";
            break;
        case "Ajouté :":
            $tmp = "Added:";
            break;
        case "Ajouté le : ":
            $tmp = "Added on: ";
            break;
        case "ajouté":
            $tmp = "added";
            break;
        case "Ajouter à la liste de diffusion":
            $tmp = "Add to mailing list";
            break;
        case "Ajouter la date et l'heure":
            $tmp = "Add date and time stamp";
            break;
        case "Ajouter un article":
            $tmp = "Add articles";
            break;
        case "Ajouter un édito":
            $tmp = "Add Editorial";
            break;
        case "Ajouter un nouveau lien":
            $tmp = "Add a New Link";
            break;
        case "Ajouter une catégorie principale":
            $tmp = "Add a MAIN Category";
            break;
        case "Ajouter une sous-catégorie":
            $tmp = "Add a SUB-Category";
            break;
        case "Ajouter une url":
            $tmp = "Add URL";
            break;
        case "Ajouter":
            $tmp = "Add";
            break;
        case "Aller à la page":
            $tmp = "Goto Page";
            break;
        case "Anciens articles":
            $tmp = "Past Articles";
            break;
        case "Anciens sondages":
            $tmp = "Past Surveys";
            break;
        case "Année":
            $tmp = "Year";
            break;
        case "Annuler l'envoi":
            $tmp = "Cancel Send";
            break;
        case "Annuler la contribution":
            $tmp = "Cancel Post";
            break;
        case "Annuler la réponse":
            $tmp = "Cancel Reply";
            break;
        case "Annuler":
            $tmp = "Cancel";
            break;
        case "Anonyme":
            $tmp = "Anonymous";
            break;
        case "Anti-Spam / Merci de répondre à la question suivante : ":
            $tmp = "Anti-Spam / Thank to reply to the question :";
            break;
        case "Août":
            $tmp = "August";
            break;
        case "Aperçu des sujets :":
            $tmp = "Topic Review";
            break;
        case "Archives":
            $tmp = "Archives";
            break;
        case "Article de":
            $tmp = "News by";
            break;
        case "Article du Jour":
            $tmp = "Today's Big Story";
            break;
        case "Article en attente d'édition":
            $tmp = "News Waiting to be Published";
            break;
        case "Article intéressant sur":
            $tmp = "Interesting Article at";
            break;
        case "Articles envoyés : ":
            $tmp = "sent news:";
            break;
        case "Articles les plus commentés":
            $tmp = "most commented stories";
            break;
        case "Articles les plus lus dans les rubriques spéciales":
            $tmp = "most read articles in special sections";
            break;
        case "articles les plus lus":
            $tmp = "most read stories";
            break;
        case "Articles plus anciens":
            $tmp = "Older Articles";
            break;
        case "Articles présents dans les rubriques":
            $tmp = "Articles in Sections";
            break;
        case "Articles publiés : ":
            $tmp = "news published:";
            break;
        case "Articles publiés":
            $tmp = "Stories published";
            break;
        case "Articles":
            $tmp = "Stories";
            break;
        case "Assurez-vous de l'exactitude de votre information avant de la communiquer. N'écrivez pas en majuscules, votre texte serait automatiquement rejeté":
            $tmp = "Please make sure that the information entered is 100% valid and uses proper grammar and capitalization. For instance, please do not enter your text in ALL CAPS, as it will be rejected.";
            break;
        case "ATTENTION : Etes-vous certain de vouloir effacer cette catégorie et tous ses Liens ?":
            $tmp = "WARNING: Are you sure you want to delete this Category and ALL its Links?";
            break;
        case "Attention à votre expression écrite. Vous pouvez utiliser du code html si vous savez le faire":
            $tmp = "Please observe proper grammar! Make it at least 100 words, OK? You may also use HTML tags if you know how to use them.";
            break;
        case "Aucun édito n'est disponible pour ce site":
            $tmp = "No editorial is currently available for this website.";
            break;
        case "Aucun membre trouvé pour":
            $tmp = "No Members Found for";
            break;
        case "Aucun nom n'a été entré":
            $tmp = "No name entered";
            break;
        case "Aucune catégorie":
            $tmp = "No category";
            break;
        case "Aucune correspondance à votre recherche n'a été trouvée":
            $tmp = "No matches found to your query";
            break;
        case "Aucune langue":
            $tmp = "No language";
            break;
        case "Aucune nouvelle contribution depuis votre dernière visite.":
            $tmp = "No New Posts since your last visit.";
            break;
        case "Aucune réponse pour les mots que vous cherchez. Elargissez votre recherche.":
            $tmp = "No records match that query. Please broaden your search.";
            break;
        case "Auteur":
            $tmp = "Author";
            break;
        case "Auteur":
            $tmp = "Submitter";
            break;
        case "Auteurs actifs":
            $tmp = "Active Authors";
            break;
        case "Auteurs de news les plus regardées":
            $tmp = "most active news submitters";
            break;
        case "Auteurs les plus actifs":
            $tmp = "most active authors";
            break;
        case "Autoriser la création automatique des membres ?":
            $tmp = "Allow automated new-users configuration?";
            break;
        case "Autoriser la validation automatique des offres ?":
            $tmp = "Allow the automatic validation of offers?";
            break;
        case "Autoriser les autres utilisateurs à voir mon Email":
            $tmp = "Allow other users to view my email address";
            break;
        case "Autres publications de la sous-rubrique":
            $tmp = "Other courses in chapter";
            break;
        case "Autres":
            $tmp = "Other";
            break;
        case "Avatar : ":
            $tmp = "Avatar: ";
            break;
        case "Avatar":
            $tmp = "Avatar";
            break;
        case "Avril":
            $tmp = "April";
            break;
        case "Bannière":
            $tmp = "Banner";
            break;
        case "Bannières - Publicité":
            $tmp = "Advertising Statistics";
            break;
        case "Bannières actives pour":
            $tmp = "Current Active Banners for";
            break;
        case "Bannières terminées pour":
            $tmp = "Banners Finished for";
            break;
        case "Bannir cette @Ip":
            $tmp = "Ban this @IP";
            break;
        case "Bas de page":
            $tmp = "Bottom page";
            break;
        case "Bienvenue au dernier membre affilié : ":
            $tmp = "Greetings to our latest registered user:";
            break;
        case "Bienvenue dans la rubrique des critiques":
            $tmp = "Welcome to Reviews Section";
            break;
        case "Bienvenue sur la page de garde de":
            $tmp = "Welcome to the TOP page for";
            break;
        case "Bienvenue sur":
            $tmp = "Welcome to";
            break;
        case "Bloc Chat":
            $tmp = "Chat box";
            break;
        case "Blog du groupe.":
            $tmp = "Group blog.";
            break;
        case "Boîte d'émission":
            $tmp = "Outbox";
            break;
        case "Boîte de réception":
            $tmp = "Inbox";
            break;
        case "Bonjour":
            $tmp = "Hello";
            break;
        case "Caché":
            $tmp = "Hidden";
            break;
        case "caractères au minimum":
            $tmp = "characters minimum";
            break;
        case "caractères de plus":
            $tmp = "bytes more";
            break;
        case "caractères":
            $tmp = "characters long";
            break;
        case "Carnet d'adresses":
            $tmp = "Bookmark";
            break;
        case "Catégorie : ":
            $tmp = "Category: ";
            break;
        case "Catégorie : ":
            $tmp = "Category:";
            break;
        case "Catégorie :":
            $tmp = "Cat:";
            break;
        case "Catégorie":
            $tmp = "Category";
            break;
        case "Catégories dans la rubrique des liens web":
            $tmp = "Categories in Web Links";
            break;
        case "Catégories les plus actives":
            $tmp = "most active categories";
            break;
        case "Catégories":
            $tmp = "Categories";
            break;
        case "Ce fichier n'existe pas ...":
            $tmp = "There is no such file...";
            break;
        case "Ce nom n\'est pas disponible":
            $tmp = "This name is not available";
            break;
        case "Ce sujet est verrouillé : il ne peut accueillir aucune nouvelle contribution.":
            $tmp = "Topic is Locked - No new posts may be made in it";
            break;
        case "Ce surnom n\'est pas disponible":
            $tmp = "This nickname is not available";
            break;
        case "Ceci est un forum privé. Vous devez entrer le mot de passe pour y accéder":
            $tmp = "This is a Private Forum. Please enter the password to gain access";
            break;
        case "Cela peut être retiré ou ajouté dans vos paramètres personnels":
            $tmp = "This can be altered or added in your profile";
            break;
        case "Cela pourrait vous intéresser":
            $tmp = "You may be interested in";
            break;
        case "Cela semble-t-il correct ?":
            $tmp = "Does this look right?";
            break;
        case "Centres d'interêt":
            $tmp = "Interest";
            break;
        case "Cet article provient de":
            $tmp = "This article comes from";
            break;
        case "Cet utilisateur n'existe pas, refaites un essai.":
            $tmp = "That user does not exist. Please go back and search again.";
            break;
        case "Cette bannière est affichée sur l'url":
            $tmp = "This Banners points to";
            break;
        case "Cette donnée ne doit pas être vide.":
            $tmp = "Empty data not allowed.";
            break;
        case "Cette option changera l'aspect du site.":
            $tmp = "This option will change the look for the whole site.";
            break;
        case "Change le statut à OK / Supprime la demande":
            $tmp = "Change Status to OK / Delete Request";
            break;
        case "Changer le thème":
            $tmp = "Change Theme";
            break;
        case "Changer":
            $tmp = "Change";
            break;
        case "Chaque utilisateur peut voir le site avec un thème graphique différent.":
            $tmp = "Each user can view the site with different theme.";
            break;
        case "Chargement de fichiers":
            $tmp = "Download Section";
            break;
        case "Chargements":
            $tmp = "Downloads";
            break;
        case "Charger le fichier immédiatement !":
            $tmp = "Download This File Now!";
            break;
        case "Charger maintenant":
            $tmp = "Download Now!";
            break;
        case "Charger un fichier une fois l'envoi accepté":
            $tmp = "Upload file after send accepted";
            break;
        case "Chat du groupe.":
            $tmp = "Group chat.";
            break;
        case "Chercher : ":
            $tmp = "Search on:";
            break;
        case "Chercher n'importe quel terme (par défaut)":
            $tmp = "Search for ANY of the terms (Default)";
            break;
        case "Chercher tous les mots":
            $tmp = "Search for ALL of the terms";
            break;
        case "Choisir entre 1 et 10 (1=nul 10=excellent)":
            $tmp = "Select from 1=poor to 10=excelent.";
            break;
        case "Choisir un dossier/sujet":
            $tmp = "Choose a folder/topic";
            break;
        case "Choisir un look différent pour le site (si plusieurs proposés)":
            $tmp = "Select different themes";
            break;
        case "Choisir une charte graphique":
            $tmp = "Select one skin";
            break;
        case "Choisir une langue":
            $tmp = "Select a language";
            break;
        case "Citation":
            $tmp = "Quote";
            break;
        case "Classé par ordre de : ":
            $tmp = "Sort by:";
            break;
        case "Classé par":
            $tmp = "Sort by";
            break;
        case "Classement":
            $tmp = "Sort links by";
            break;
        case "Classer ce message":
            $tmp = "Order your message";
            break;
        case "Clics":
            $tmp = "Clicks";
            break;
        case "Cliquez ici pour entrer":
            $tmp = "click here to open the chat window...";
            break;
        case "Cliquez ici pour lire votre nouveau message.":
            $tmp = "Click here to read your new message.";
            break;
        case "Cliquez ici pour revenir à l'index des Forums.":
            $tmp = "Click here to return to the forum index.";
            break;
        case "Cliquez ici pour voir la mise à jour":
            $tmp = "Click here to view the update";
            break;
        case "Cliquez ici pour voir le nouveau sujet.":
            $tmp = "Click here to view the updated topic.";
            break;
        case "Cliquez pour insérer des emoji dans votre message":
            $tmp = "Click on emoji to insert it on your Message";
            break;
        case "Cliquez pour voir la liste des articles de ce sujet":
            $tmp = "Click to list all articles in this topic";
            break;
        case "Co-rédaction":
            $tmp = "Co-writing";
            break;
        case "Cochez et cliquez sur le bouton OK pour recevoir un Email lors d'une nouvelle soumission dans ce forum.":
            $tmp = "Check me and click on OK button to receive an Email when is a new submission in this forum.";
            break;
        case "Cochez un forum et cliquez sur le bouton pour recevoir un Email lors d'une nouvelle soumission dans celui-ci.":
            $tmp = "Check a forum and click on button for receive an Email when a new submission is made in it.";
            break;
        case "Code d'erreur :":
            $tmp = "Error Code:";
            break;
        case "Code html autorisé : ":
            $tmp = "Allowed HTML:";
            break;
        case "Code postal":
            $tmp = "Zip Code";
            break;
        case "Code":
            $tmp = "Code";
            break;
        case "Coller l'ID de votre vidéo entre les deux balises":
            $tmp = "Paste the video ID between the tags";
            break;
        case "Commentaire à propos d'une critique :":
            $tmp = "Comment on the Review:";
            break;
        case "Commentaire":
            $tmp = "comment";
            break;
        case "Commentaire":
            $tmp = "Comment";
            break;
        case "Commentaire(s) : ":
            $tmp = "comments:";
            break;
        case "Commentaire(s)":
            $tmp = "Comments";
            break;
        case "Commentaires ?":
            $tmp = "comments?";
            break;
        case "Commentaires postés : ":
            $tmp = "Comments Posted: ";
            break;
        case "Commentaires":
            $tmp = "comments";
            break;
        case "Compte ou adresse IP désactivée. Cet émetteur a participé plus de x fois dans les dernières heures, merci de contacter le webmaster pour déblocage.":
            $tmp = "This account or IP has been temporarily disabled. This means that either this IP, or user account has been moderated down more than x times in the last few hours. If you think this is unfair, you should contact the admin.";
            break;
        case "Compteur":
            $tmp = "Counter";
            break;
        case "Configurer":
            $tmp = "Configure";
            break;
        case "Confirmation du code pour":
            $tmp = "Confirmation Code for";
            break;
        case "Connexion autorisée":
            $tmp = "Connection allowed";
            break;
        case "Connexion non autorisée":
            $tmp = "Connection not allowed";
            break;
        case "Connexion":
            $tmp = "Connection";
            break;
        case "Conserver une copie":
            $tmp = "Send a copy to me";
            break;
        case "Consulter l'adresse IP":
            $tmp = "View IP";
            break;
        case "Contributeur(s)":
            $tmp = "Contributor(s)";
            break;
        case "Contributeurs":
            $tmp = "Contributors";
            break;
        case "Contribution de":
            $tmp = "Contributed by";
            break;
        case "Contributions":
            $tmp = "Posts";
            break;
        case "Créer un compte":
            $tmp = "Register for an Account";
            break;
        case "Créer":
            $tmp = "Create";
            break;
        case "Critique":
            $tmp = "Review";
            break;
        case "Critique(s) trouvée(s).":
            $tmp = "Total Review(s) found.";
            break;
        case "Critiques les plus lues":
            $tmp = "most read reviews";
            break;
        case "critiques les plus populaires":
            $tmp = "most popular reviews";
            break;
        case "critiques les plus récentes":
            $tmp = "most recent reviews";
            break;
        case "Critiques pour la lettre":
            $tmp = "Reviews for letter";
            break;
        case "critiques":
            $tmp = "reviews in the database";
            break;
        case "Critiques":
            $tmp = "Reviews";
            break;
        case "Critiques":
            $tmp = "Waiting Reviews";
            break;
        case "Croissant":
            $tmp = "Ascending";
            break;
        case "dans la sous-rubrique":
            $tmp = "in the sub-section";
            break;
        case "dans":
            $tmp = "in";
            break;
        case "Date :":
            $tmp = "Date:";
            break;
        case "Date (les liens les plus récents en premier)":
            $tmp = "Date (New Links Listed First)";
            break;
        case "Date (les plus vieux liens en premier)":
            $tmp = "Date (Old Links Listed First)";
            break;
        case "Date de chargement sur le serveur":
            $tmp = "Upload Date";
            break;
        case "Date de création":
            $tmp = "Creation Date";
            break;
        case "Date de début":
            $tmp = "Start Date";
            break;
        case "Date de fin de publication":
            $tmp = "End Date for this New";
            break;
        case "Date de fin":
            $tmp = "End Date";
            break;
        case "Date de publication":
            $tmp = "Start Date for this New";
            break;
        case "Date":
            $tmp = "Date";
            break;
        case "de":
            $tmp = "at";
            break;
        case "de":
            $tmp = "From";
            break;
        case "de":
            $tmp = "of";
            break;
        case "de":
            $tmp = "off";
            break;
        case "Début de l'article":
            $tmp = "Top of the article";
            break;
        case "Décembre":
            $tmp = "December";
            break;
        case "Déconnexion":
            $tmp = "Logout";
            break;
        case "Décroissant":
            $tmp = "Descending";
            break;
        case "demandes en cours pour le même utilistaeur.":
            $tmp = "request for the same user.";
            break;
        case "Déplacer ce sujet":
            $tmp = "Move this Topic";
            break;
        case "Déplacer le sujet vers : ":
            $tmp = "Move Topic To: ";
            break;
        case "Déplacer le sujet":
            $tmp = "Move Topic";
            break;
        case "Déplier la liste":
            $tmp = "Show list";
            break;
        case "Dernier éditeur":
            $tmp = "Last editor";
            break;
        case "Dernière contribution":
            $tmp = "Last Post";
            break;
        case "Dernières contributions":
            $tmp = "Last Posts";
            break;
        case "Dernières stats":
            $tmp = "Past Stat";
            break;
        case "Derniers articles":
            $tmp = "Last articles";
            break;
        case "Dès maintenant disponible dans la base de données des critiques.":
            $tmp = "It is now available in the reviews database.";
            break;
        case "Désabonnement":
            $tmp = "Unsubscribe";
            break;
        case "Désactivé":
            $tmp = "Off";
            break;
        case "Désactiver le html pour cet envoi":
            $tmp = "Disable HTML on this Post";
            break;
        case "Description : ":
            $tmp = "Description: ";
            break;
        case "Description : (255 caractères max)":
            $tmp = "Description: (255 characters max)";
            break;
        case "Description:":
            $tmp = "Description:";
            break;
        case "Description":
            $tmp = "Description";
            break;
        case "Désolé, aucune information correspondante pour cet utlilisateur n'a été trouvée":
            $tmp = "Sorry, no corresponding user info was found";
            break;
        case "Désolé, votre mot de passe doit faire au moins":
            $tmp = "Sorry, your password must be at least";
            break;
        case "Destinataire":
            $tmp = "Recipient";
            break;
        case "Détails supplémentaires":
            $tmp = "Additional Details";
            break;
        case "Details":
            $tmp = "Details";
            break;
        case "Devenez membre et vous disposerez de fonctions spécifiques : abonnements, forums spéciaux (cachés, membres, ..), statut de lecture, ...":
            $tmp = "Join us ! As a registered user, cool stuff like : forum'subscribing, special forums (hidden, members ...), post and read status, ... are avaliable.";
            break;
        case "Devenez membre privilégié en cliquant":
            $tmp = "You can register for free by clicking";
            break;
        case "Dimanche":
            $tmp = "Sunday";
            break;
        case "Disposer d'un bloc que vous seul verrez dans le menu (pour spécialistes, nécessite du code html)":
            $tmp = "Have a personal box in the Home";
            break;
        case "Document co-rédigé":
            $tmp = "Multi-writers document";
            break;
        case "Ecrire à la liste":
            $tmp = "Write to the list";
            break;
        case "Ecrire un nouveau message privé":
            $tmp = "Write a new Private Message";
            break;
        case "Ecrire une critique pour":
            $tmp = "Write a Review for";
            break;
        case "Ecrire une critique":
            $tmp = "Write a Review";
            break;
        case "écrit":
            $tmp = "writes";
            break;
        case "Editer votre journal":
            $tmp = "Edit Journal";
            break;
        case "Editer votre journal":
            $tmp = "Edit your journal";
            break;
        case "Editer votre page principale":
            $tmp = "Change the home";
            break;
        case "Editer":
            $tmp = "Edit";
            break;
        case "Editeur":
            $tmp = "Editor";
            break;
        case "Edition de la soumission":
            $tmp = "Editing Post";
            break;
        case "EDITO":
            $tmp = "EDITO";
            break;
        case "Editorial par":
            $tmp = "Editorial by";
            break;
        case "Effacer (Efface les liens cassés et les avis pour un lien donné)":
            $tmp = "Delete (Deletes broken link and requests for a given link)";
            break;
        case "Effacer ce sujet":
            $tmp = "Delete this Topic";
            break;
        case "Effacer le sujet":
            $tmp = "Delete Topic";
            break;
        case "Effacer les commentaires.":
            $tmp = "Delete comments.";
            break;
        case "Effacer":
            $tmp = "Delete";
            break;
        case "Email : ":
            $tmp = "Email: ";
            break;
        case "Email du destinataire":
            $tmp = "Friend Email";
            break;
        case "Email non rempli pour : ":
            $tmp = "there isn't an email associated with client";
            break;
        case "Email non valide (ex.: prenom.nom@hotmail.com)":
            $tmp = "Invalid email (eg: you@hotmail.com)";
            break;
        case "Email":
            $tmp = "Email";
            break;
        case "Emetteur":
            $tmp = "Poster";
            break;
        case "Emoticons":
            $tmp = "Smilies";
            break;
        case "en attente de validation":
            $tmp = "waiting for Validation";
            break;
        case "en cache":
            $tmp = "cached";
            break;
        case "En ce jour...":
            $tmp = "One Day like Today...";
            break;
        case "en créer un":
            $tmp = "create one";
            break;
        case "En savoir plus à propos de":
            $tmp = "More about";
            break;
        case "En tant qu'utilisateur enregistré vous pouvez":
            $tmp = "As a registered user you can";
            break;
        case "Enregistrer":
            $tmp = "Save";
            break;
        case "Entrer votre pseudonyme et votre mot de passe.":
            $tmp = "Please enter the Nickname and the Password.";
            break;
        case "Entrez à nouveau votre mot de Passe":
            $tmp = "Retype Password";
            break;
        case "Envoi de l'article à un ami":
            $tmp = "Send Story to a Friend";
            break;
        case "Envoi une demande aux administrateurs pour rejoindre ce groupe. Un message privé vous informera du résultat de votre demande.":
            $tmp = "Send a request to administrators to join this group. A private message will inform you of the outcome of your request.";
            break;
        case "Envoyé à":
            $tmp = "To";
            break;
        case "Envoyé par ":
            $tmp = "Contributed by ";
            break;
        case "Envoyé":
            $tmp = "Sent";
            break;
        case "envoyée par courrier.":
            $tmp = "mailed.";
            break;
        case "Envoyer cet article à un ami":
            $tmp = "Send this Story to a Friend";
            break;
        case "Envoyer un message interne":
            $tmp = "Send internal Message";
            break;
        case "Envoyer une demande":
            $tmp = "Send Request";
            break;
        case "Envoyer":
            $tmp = "Send";
            break;
        case "Ephémérides":
            $tmp = "Ephemerids";
            break;
        case "Epuration de la new à la fin de sa date de validité":
            $tmp = "Auto Delete the New at End Date";
            break;
        case "Erreur : adresse Email déjà utilisée":
            $tmp = "ERROR: Email address already registered";
            break;
        case "Erreur : cet identifiant est déjà utilisé":
            $tmp = "ERROR: Nickname taken";
            break;
        case "Erreur : cette url est déjà présente dans la base de données":
            $tmp = "ERROR: This URL is already listed in the Database!";
            break;
        case "Erreur : DNS ou serveur de mail incorrect":
            $tmp = "ERROR: wrong DNS or mail server";
            break;
        case "Erreur : Email invalide":
            $tmp = "ERROR: Invalid email";
            break;
        case "Erreur : identifiant invalide":
            $tmp = "ERROR: Invalid Nickname";
            break;
        case "Erreur : la catégorie":
            $tmp = "ERROR: The Category";
            break;
        case "Erreur : la sous-catégorie":
            $tmp = "ERROR: The SubCategory";
            break;
        case "Erreur : nom existant.":
            $tmp = "ERROR: Name is reserved.";
            break;
        case "Erreur : une adresse Email ne peut pas contenir d'espaces":
            $tmp = "ERROR: Email addresses do not contain spaces.";
            break;
        case "Erreur : vous devez saisir un titre pour votre lien":
            $tmp = "ERROR: You need to type a TITLE for your URL!";
            break;
        case "Erreur : vous devez saisir une description pour votre lien":
            $tmp = "ERROR: You need to type a DESCRIPTION for your URL!";
            break;
        case "Erreur : vous devez saisir une url pour votre lien":
            $tmp = "ERROR: You need to type a URL for your URL!";
            break;
        case "Erreur de connexion à la base de données":
            $tmp = "Error Connecting to DB";
            break;
        case "Erreur du forum":
            $tmp = "Forum Error";
            break;
        case "Erreur lors de la récupération des messages depuis la base.":
            $tmp = "Error getting messages from the database.";
            break;
        case "Erreur":
            $tmp = "Error";
            break;
        case "est associé à votre Email.":
            $tmp = "has this email associated with it.";
            break;
        case "est connecté":
            $tmp = "is connected !";
            break;
        case "Etat du topic":
            $tmp = "Topic status";
            break;
        case "Etes vous certain de vouloir effacer cette sous-catégorie ?":
            $tmp = "Are you sure you want to delete SubCategory";
            break;
        case "Evaluation":
            $tmp = "Score";
            break;
        case "existe déjà":
            $tmp = "already exist!";
            break;
        case "Expéditeur":
            $tmp = "Sender";
            break;
        case "Faites simple":
            $tmp = "Be Descriptive, Clear and Simple";
            break;
        case "FAQ - Questions fréquentes":
            $tmp = "FAQ (Frequently Ask Question)";
            break;
        case "favori":
            $tmp = "favourite";
            break;
        case "Fermé":
            $tmp = "Closed";
            break;
        case "Fermer ce sujet":
            $tmp = "Lock this Topic";
            break;
        case "Fermer le sujet":
            $tmp = "Lock Topic";
            break;
        case "Février":
            $tmp = "February";
            break;
        case "Fichiers les + récents":
            $tmp = "last downloadable files";
            break;
        case "Fichiers":
            $tmp = "Files";
            break;
        case "File manager du groupe.":
            $tmp = "Group file manager.";
            break;
        case "Fois":
            $tmp = "times";
            break;
        case "Fonctions":
            $tmp = "Functions";
            break;
        case "Forum du groupe.":
            $tmp = "Group forum.";
            break;
        case "forum":
            $tmp = "forum";
            break;
        case "Forum":
            $tmp = "Forum";
            break;
        case "Forums infos":
            $tmp = "Forums infos";
            break;
        case "Forums":
            $tmp = "Forums";
            break;
        case "Gérer d'autres options et applications":
            $tmp = "some other cool stuff...";
            break;
        case "Gérer votre miniSite":
            $tmp = "Manage my Mini-Web site";
            break;
        case "Gestion de vos abonnements":
            $tmp = "Manage your subscribes";
            break;
        case "Gestion des groupes.":
            $tmp = "Groups setting.";
            break;
        case "Gestionnaire fichiers":
            $tmp = "File manager";
            break;
        case "Gras":
            $tmp = "Bold";
            break;
        case "Groupe":
            $tmp = "Group";
            break;
        case "Groupe ouvert":
            $tmp = "Open group";
            break;
        case "Groupes":
            $tmp = "Groups";
            break;
        case "Hasard":
            $tmp = "Random";
            break;
        case "Haut de page":
            $tmp = "Back to Top";
            break;
        case "Heure de la soumission":
            $tmp = "Post Time";
            break;
        case "Heure":
            $tmp = "Hour";
            break;
        case "Heure(s)":
            $tmp = "Hour(s)";
            break;
        case "Hits : ":
            $tmp = "Hits:";
            break;
        case "Hits":
            $tmp = "Hits";
            break;
        case "Home":
            $tmp = "Home";
            break;
        case "ici":
            $tmp = "here";
            break;
        case "Icone du message":
            $tmp = "Message Icon";
            break;
        case "Icone":
            $tmp = "Icon";
            break;
        case "ID de la critique":
            $tmp = "Review ID";
            break;
        case "ID utilisateur (pseudo)":
            $tmp = "User ID";
            break;
        case "Identifiant : ":
            $tmp = "Nickname: ";
            break;
        case "Identifiant ":
            $tmp = "Login";
            break;
        case "Identifiant incorrect !":
            $tmp = "Incorrect Login!";
            break;
        case "Identifiant utilisateur":
            $tmp = "User Login";
            break;
        case "identifiant":
            $tmp = "nickname";
            break;
        case "Identifiant":
            $tmp = "Nickname";
            break;
        case "Identité":
            $tmp = "Identity";
            break;
        case "Ignorer (Efface toutes les demandes pour un lien donné)":
            $tmp = "Ignore (Deletes all requests for a given link)";
            break;
        case "Ignorer":
            $tmp = "Ignore";
            break;
        case "Il n'y a aucun sujet pour ce forum. ":
            $tmp = "There are no topics for this forum. ";
            break;
        case "Il n'y a aucune critique pour La lettre":
            $tmp = "There isn't any Review for letter";
            break;
        case "Il n'y a pas d'informations disponibles pour":
            $tmp = "There is no available info for";
            break;
        case "Il n'y a pas encore d'article du jour.":
            $tmp = "There isn't a Biggest Story for Today, yet.";
            break;
        case "Il ne peut pas y avoir d'espace dans le surnom.":
            $tmp = "There cannot be any spaces in the Nickname.";
            break;
        case "Il y a actuellement":
            $tmp = "There are currently,";
            break;
        case "Il y a actuellement":
            $tmp = "We have";
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
        case "immédiatement":
            $tmp = "immediately";
            break;
        case "Imp. restantes":
            $tmp = "Imp. Left";
            break;
        case "Impossible d'interroger la base.":
            $tmp = "Could not query the database.";
            break;
        case "Impossible de déplacer le topic dans le Forum, refaites un essai.":
            $tmp = "Could not move selected topic to selected forum. Please go back and try again.";
            break;
        case "Impossible de déverrouiller le topic, refaites un essai.":
            $tmp = "Could not unlock the selected topic. Please go back and try again.";
            break;
        case "Impossible de verrouiller le topic, refaites un essai.":
            $tmp = "Could not lock the selected topic. Please go back and try again.";
            break;
        case "Impressions":
            $tmp = "Impressions";
            break;
        case "Imprimer":
            $tmp = "Print";
            break;
        case "Inconnu":
            $tmp = "Unknown";
            break;
        case "Index des rubriques":
            $tmp = "Sections Index";
            break;
        case "Index du forum":
            $tmp = "Forum Index";
            break;
        case "Index":
            $tmp = "Links Main";
            break;
        case "Information sur le fichier":
            $tmp = "File Information";
            break;
        case "Information":
            $tmp = "Info";
            break;
        case "Informations supplémentaires":
            $tmp = "Extra Info";
            break;
        case "Informations sur l'utilisateur :":
            $tmp = "The following is the member information:";
            break;
        case "Informations sur le compte":
            $tmp = "User Informations";
            break;
        case "Inscription":
            $tmp = "Registration";
            break;
        case "intéressant et a voulu vous le faire connaître.":
            $tmp = "interesting and wanted to send it to you.";
            break;
        case "Interface":
            $tmp = "Look";
            break;
        case "Interne":
            $tmp = "Internal";
            break;
        case "Isoloir du vote en cours":
            $tmp = "Current Survey Voting Booth";
            break;
        case "Isoloir":
            $tmp = "Voting Booth";
            break;
        case "Italique":
            $tmp = "Italic";
            break;
        case "Janvier":
            $tmp = "January";
            break;
        case "Jeudi":
            $tmp = "Thursday";
            break;
        case "Jour":
            $tmp = "Day";
            break;
        case "Jour(s)":
            $tmp = "Day(s)";
            break;
        case "Journal en ligne de ":
            $tmp = "Online journal for";
            break;
        case "Journal":
            $tmp = "Journal";
            break;
        case "jours":
            $tmp = "days";
            break;
        case "Juillet":
            $tmp = "July";
            break;
        case "Juin":
            $tmp = "June";
            break;
        case "L'accès à cette application est réservé aux utilisateurs Avancés. Merci de vous enregistrer.":
            $tmp = "Access to this application is reserved to Advance Registered Users. Please Registered.";
            break;
        case "L'article le plus consulté aujourd'hui est :":
            $tmp = "Today's most read Story is:";
            break;
        case "L'article le plus lu à propos de":
            $tmp = "Most read story about";
            break;
        case "L'article":
            $tmp = "Story";
            break;
        case "L'url pour cet article est : ":
            $tmp = "The URL for this story is:";
            break;
        case "La fonction mise à jour du mot de passe ne peut mettre à jour la base de données. Contactez le WebMaster.":
            $tmp = "mail_password: could not update user entry. Contact the Administrator";
            break;
        case "La lettre":
            $tmp = "NewsLetter";
            break;
        case "la page":
            $tmp = "the page";
            break;
        case "La seule règle est de ne pas sortir du sujet.":
            $tmp = "The only rule here is: Stay on topic of the discussions.";
            break;
        case "La structure de chaque ligne de ce fichier : nom_du_membre; adresse Email; commentaires":
            $tmp = "The data structure of any line : name_of_the_member;email;comments";
            break;
        case "Le compte utilisateur":
            $tmp = "The user account";
            break;
        case "Le critique":
            $tmp = "Reviewer";
            break;
        case "Le forum dans lequel vous tentez de publier n'existe pas, merci de recommencez":
            $tmp = "The forum you are attempting to post to does not exist. Please try again.";
            break;
        case "Le forum ou le topic que vous tentez de publier n'existe pas, refaites un essai.":
            $tmp = "The forum or topic you are attempting to post to does not exist. Please try again.";
            break;
        case "Le forum sélectionné n'existe pas.":
            $tmp = "The forum you selected does not exist. Please go back and try again.";
            break;
        case "Le message sélectionné n'existe pas dans la base forum.":
            $tmp = "Selected message was not found in the forum database.";
            break;
        case "Le mot de passe doit contenir au moins un caractère en majuscule.":
            $tmp = "The password must contain at least one uppercase character.";
            break;
        case "Le mot de passe doit contenir au moins un caractère en minuscule.":
            $tmp = "The password must contain at least one lowercase character.";
            break;
        case "Le mot de passe doit contenir au moins un caractère non alphanumérique.":
            $tmp = "The password must contain at least one non-alphanumeric character.";
            break;
        case "Le mot de passe doit contenir au moins un chiffre.":
            $tmp = "The password must contain at least one digit.";
            break;
        case "Le mot de passe doit contenir":
            $tmp = "The password must contain";
            break;
        case "Le mot de passe vous sera envoyé à l'adresse Email indiquée.":
            $tmp = "Password will be sent to the email address you enter.";
            break;
        case "Le moteur de recherche ne trouve pas la base forum.":
            $tmp = "Search Engine was unable to query the forums database.";
            break;
        case "Le nombre de hits doit être un entier positif":
            $tmp = "Hits must be a positive integer";
            break;
        case "Le séparateur de groupe est la, (12,55,...)":
            $tmp = "Group separator is , (12,55,...)";
            break;
        case "Le sujet a été déplacé.":
            $tmp = "The topic has been moved.";
            break;
        case "le":
            $tmp = "on";
            break;
        case "Lectures":
            $tmp = "Views";
            break;
        case "Les commentaires sont la propriété de leurs auteurs. Nous ne sommes pas responsables de leur contenu.":
            $tmp = "The comments are owned by the poster. We aren't responsible for their content.";
            break;
        case "Les dernières contributions de":
            $tmp = "Last news submissions sent by";
            break;
        case "Les dernières nouvelles à propos de":
            $tmp = "Last news about";
            break;
        case "Les derniers articles de":
            $tmp = "Last articles sent by";
            break;
        case "Les derniers commentaires de":
            $tmp = "Last comments by";
            break;
        case "Les deux mots de passe ne sont pas identiques.":
            $tmp = "The two passwords are not identical.";
            break;
        case "les Liens":
            $tmp = "links";
            break;
        case "Les modifications seront seulement valides pour vous.":
            $tmp = "The changes will be valid only to you.";
            break;
        case "Les mots de passe sont différents. Ils doivent être identiques.":
            $tmp = "Both passwords are different. They need to be identical.";
            break;
        case "Les nouveaux Liens ajoutés dans cette catégorie cette semaine":
            $tmp = "New Links in this Category Added this week";
            break;
        case "Les nouveaux liens ajoutés dans cette catégorie dans les 3 derniers jours":
            $tmp = "New Links in this Category Added in the last 3 days";
            break;
        case "Les nouveaux liens de cette catégorie ajoutés aujourd'hui":
            $tmp = "New Links in this Category Added Today";
            break;
        case "Les nouvelles contributions depuis votre dernière visite.":
            $tmp = "New Posts since your last visit.";
            break;
        case "Les plus téléchargés":
            $tmp = "Most downloaded";
            break;
        case "Les préférences de compte fonctionnent sur la base des cookies.":
            $tmp = "Account preferences are cookie based.";
            break;
        case "Les spécialistes peuvent utiliser du HTML, mais attention aux erreurs":
            $tmp = "HTML is fine, but double check those URLs and HTML tags!";
            break;
        case "Les statistiques pour la bannières ID":
            $tmp = "Statistics for Banner ID";
            break;
        case "Les utilisateurs anonymes peuvent poster de nouveaux sujets et des réponses dans ce forum.":
            $tmp = "Anonymous users can post new topics and replies in this forum.";
            break;
        case "Libre":
            $tmp = "Free";
            break;
        case "Lien n° : ":
            $tmp = "Link ID: ";
            break;
        case "Lien relatif":
            $tmp = "Related Link";
            break;
        case "Lien web":
            $tmp = "Web link";
            break;
        case "Lien":
            $tmp = "Link";
            break;
        case "Lien(s) en attente de validation":
            $tmp = "Links Waiting for Validation";
            break;
        case "Liens cassés rapportés par un ou plusieurs utilisateurs":
            $tmp = "User Reported Broken Links";
            break;
        case "Liens présents dans la rubrique des liens web":
            $tmp = "Links in Web Links";
            break;
        case "Liens relatifs : ":
            $tmp = "Related Link:";
            break;
        case "Liens relatifs":
            $tmp = "Related Links";
            break;
        case "Liens Web":
            $tmp = "Web Links";
            break;
        case "Liens":
            $tmp = "Links";
            break;
        case "Limite des référants : pensez à archiver vos référants via l'administration du site.":
            $tmp = "Referer max count limit : Save your referer via Admin function.";
            break;
        case "Lire la suite...":
            $tmp = "read more...";
            break;
        case "Liste de diffusion":
            $tmp = "Mailing list";
            break;
        case "Liste des membres du groupe.":
            $tmp = "Group members list.";
            break;
        case "Liste des membres":
            $tmp = "Members List";
            break;
        case "Liste non ordonnnée":
            $tmp = "Unordered list";
            break;
        case "Liste ordonnnée":
            $tmp = "Ordered list";
            break;
        case "Liste":
            $tmp = "List";
            break;
        case "Localisation":
            $tmp = "Location";
            break;
        case "lu : ":
            $tmp = "read:";
            break;
        case "Lu":
            $tmp = "Read";
            break;
        case "Lundi":
            $tmp = "Monday";
            break;
        case "lus":
            $tmp = "reads";
            break;
        case "M'envoyer un Email lorsqu'un message interne arrive":
            $tmp = "Send me an email when Internal Message arrive";
            break;
        case "M2M bloc":
            $tmp = "M2M box";
            break;
        case "Ma note : ":
            $tmp = "My Score:";
            break;
        case "Ma page perso : ":
            $tmp = "My HomePage:";
            break;
        case "Mai":
            $tmp = "May";
            break;
        case "Mais ne titrez pas -un article-, ou -à lire-,...":
            $tmp = "bad titles='Check This Out!' or 'An Article'.";
            break;
        case "Manuel en ligne":
            $tmp = "Online Manual";
            break;
        case "Mardi":
            $tmp = "Tuesday";
            break;
        case "Marquer tous les messages comme lus":
            $tmp = "Mark all Topics to Read";
            break;
        case "Mars":
            $tmp = "March";
            break;
        case "Masquer ce commentaire":
            $tmp = "Hide this comment";
            break;
        case "Masquer ce post":
            $tmp = "Hide this post";
            break;
        case "Mèl":
            $tmp = "E-Mail";
            break;
        case "Membre invisible":
            $tmp = "Invisible' member";
            break;
        case "membre(s) en ligne.":
            $tmp = "member(s) that are online.";
            break;
        case "membres enregistrés.":
            $tmp = "registered users so far.";
            break;
        case "Membres":
            $tmp = "Members";
            break;
        case "Menu de":
            $tmp = "Menu for";
            break;
        case "Merci d'avoir consacré du temps pour vous enregistrer.":
            $tmp = "Thank you for taking the time to record you in our DataBase.";
            break;
        case "Merci d'avoir modifié cette critique":
            $tmp = "Thanks for editing this review.";
            break;
        case "Merci d'avoir posté cette critique":
            $tmp = "Thanks for submitting this review";
            break;
        case "Merci d'entrer l'information en fonction des spécifications":
            $tmp = "Please enter information according to the specifications";
            break;
        case "Merci de contribuer à la maintenance du site.":
            $tmp = "Thank you for helping to maintain this directory's integrity.";
            break;
        case "Merci de ne pas abuser, le nom d'utilisateur et l'adresse IP sont enregistrés.":
            $tmp = "Username and IP are recorded, so please don't abuse the system.";
            break;
        case "Merci de nous avoir recommandé":
            $tmp = "Thanks for recommend us!";
            break;
        case "Merci de saisir vos informations":
            $tmp = "Please type your client informations";
            break;
        case "Merci de":
            $tmp = "Please";
            break;
        case "Merci pour cette information. Nous allons l'examiner dès que possible.":
            $tmp = "Thanks for this information. We'll look into your request shortly.";
            break;
        case "Merci pour votre contribution.":
            $tmp = "Thanks for your submission.";
            break;
        case "Merci pour votre contribution":
            $tmp = "Thanks for your submission!";
            break;
        case "Merci":
            $tmp = "Thanks!";
            break;
        case "Mercredi":
            $tmp = "Wednesday";
            break;
        case "Message à un membre":
            $tmp = "Message to Member";
            break;
        case "Message édité par":
            $tmp = "This message was edited by";
            break;
        case "Message interne":
            $tmp = "Internal Message";
            break;
        case "Message personnel":
            $tmp = "Private Message";
            break;
        case "Message précédent":
            $tmp = "Previous Messages";
            break;
        case "Message suivant":
            $tmp = "Next Messages";
            break;
        case "Message vide interdit, refaites un essai.":
            $tmp = "You must type a message to post. You can't post an empty message. Go back and enter a message.";
            break;
        case "Message":
            $tmp = "Message";
            break;
        case "message(s) personnel(s).":
            $tmp = "private message(s).";
            break;
        case "Messages personnels":
            $tmp = "Private Messages";
            break;
        case "Mettre ce sujet en premier":
            $tmp = "Make this Topic the first one";
            break;
        case "MiniSite":
            $tmp = "Mini-Web site";
            break;
        case "Minute(s)":
            $tmp = "Minut(s)";
            break;
        case "Mise à jour de la base impossible, refaites un essai.":
            $tmp = "Could not enter data into the database. Please go back and try again.";
            break;
        case "Mise à jour du compteur des envois impossible.":
            $tmp = "Couldn't update post count.";
            break;
        case "Mise à jour":
            $tmp = "Update";
            break;
        case "Modérateur":
            $tmp = "Moderator";
            break;
        case "Modérateur(s)":
            $tmp = "Moderator(s)";
            break;
        case "Modéré par : ":
            $tmp = "Moderated By: ";
            break;
        case "Modification d'une critique":
            $tmp = "Review Modification";
            break;
        case "modification":
            $tmp = "modification";
            break;
        case "modifié":
            $tmp = "modified";
            break;
        case "Modifier l'édito":
            $tmp = "Modify Editorial";
            break;
        case "Modifier la catégorie":
            $tmp = "Modify Category";
            break;
        case "Modifier les liens":
            $tmp = "Modify Links";
            break;
        case "Modifier":
            $tmp = "Modify";
            break;
        case "mois":
            $tmp = "month";
            break;
        case "Mois":
            $tmp = "Month";
            break;
        case "mois":
            $tmp = "months";
            break;
        case "Mon E-Mail : ":
            $tmp = "My E-Mail:";
            break;
        case "Monnaie":
            $tmp = "Money";
            break;
        case "Montrer :":
            $tmp = "Show:";
            break;
        case "Mot de passe : ":
            $tmp = "Password: ";
            break;
        case "Mot de passe erroné, refaites un essai.":
            $tmp = "You did not enter the correct password, please go back and try again.";
            break;
        case "Mot de passe mis à jour. Merci de vous re-connecter":
            $tmp = "Password update, please re-connect you.";
            break;
        case "Mot de passe pour":
            $tmp = "Password for";
            break;
        case "Mot de passe utilisateur pour":
            $tmp = "User Password for";
            break;
        case "Mot de passe":
            $tmp = "Password";
            break;
        case "Mot-clé":
            $tmp = "Keyword";
            break;
        case "Moteurs de recherche":
            $tmp = "Search Engines";
            break;
        case "mots dans ce texte )":
            $tmp = "total words in this text)";
            break;
        case "n'est pas connecté":
            $tmp = "is not connected !";
            break;
        case "Navigateurs web":
            $tmp = "Browsers";
            break;
        case "Nb abonnés à lettre infos":
            $tmp = "Nb Outside Users for LNL";
            break;
        case "Nb hits : ":
            $tmp = "Hits: ";
            break;
        case "Nb. d'articles":
            $tmp = "Nb of articles";
            break;
        case "Nb. de critiques":
            $tmp = "Nb of reviews";
            break;
        case "Nb. de forums":
            $tmp = "Nb of forums";
            break;
        case "Nb. de membres":
            $tmp = "Nb of members";
            break;
        case "Nb. de sujets":
            $tmp = "Nb of topics";
            break;
        case "Nb. pages vues":
            $tmp = "Nb of Pages";
            break;
        case "ne peuvent pas être envoyées.":
            $tmp = "can't be send because";
            break;
        case "Nom : ":
            $tmp = "Name: ";
            break;
        case "Nom :":
            $tmp = "Name:";
            break;
        case "Nom d'auteur":
            $tmp = "Author's Name";
            break;
        case "Nom de fichier de l'image":
            $tmp = "Image filename";
            break;
        case "Nom de l'image principale non obligatoire, la mettre dans images/reviews/":
            $tmp = "Name of the cover image, located in images/reviews/. Not required.";
            break;
        case "Nom de la catégorie : ":
            $tmp = "Category Name: ";
            break;
        case "Nom de la sous-catégorie : ":
            $tmp = "Sub-Category Name: ";
            break;
        case "Nom du destinataire":
            $tmp = "Friend Name";
            break;
        case "Nom du produit critiqué.":
            $tmp = "Name of the Reviewed Product.";
            break;
        case "Nom du programme":
            $tmp = "Program Name";
            break;
        case "Nom ou raison sociale":
            $tmp = "Name or Entrepise";
            break;
        case "Nom":
            $tmp = "Name";
            break;
        case "Nombre d'articles sur la page principale":
            $tmp = "News number in the Home";
            break;
        case "Nombre d'utilisateurs par thème":
            $tmp = "Number of users per theme";
            break;
        case "Nombre de jours maximum pour une offre":
            $tmp = "Max days for offers";
            break;
        case "Nombre total de votes: ":
            $tmp = "Total Votes: ";
            break;
        case "Non lu":
            $tmp = "Not Read";
            break;
        case "Non":
            $tmp = "No";
            break;
        case "Nos références ont été envoyées à ":
            $tmp = "The reference to our site has been sent to";
            break;
        case "Nos visiteurs ont visualisé":
            $tmp = "We received";
            break;
        case "Note :":
            $tmp = "Note:";
            break;
        case "Note de ce produit : ":
            $tmp = "This Product Score:";
            break;
        case "Note non valide... Elle doit se situer entre 1 et 10":
            $tmp = "Invalid score... must be between 1 and 10";
            break;
        case "Note":
            $tmp = "Note";
            break;
        case "Note":
            $tmp = "Score:";
            break;
        case "Notes":
            $tmp = "Notice";
            break;
        case "Nous allons vérifier votre contribution. Elle devrait bientôt être disponible !":
            $tmp = "The editors will look at your submission. It should be available soon!";
            break;
        case "Nous avons approuvé votre contribution à notre moteur de recherche.":
            $tmp = "We approved your link submission for our search engine.";
            break;
        case "Nous avons bien reçu votre demande de lien, merci":
            $tmp = "We received your Link submission. Thanks!";
            break;
        case "Nous ne vendons ni ne communiquons vos informations personnelles à autrui.":
            $tmp = "We don't sell/give to others your personal info.";
            break;
        case "Nouveau commentaire":
            $tmp = "New comment";
            break;
        case "Nouveau dossier/sujet":
            $tmp = "New folder/topic";
            break;
        case "Nouveau lien ajouté dans la base de données":
            $tmp = "New Link added to the Database";
            break;
        case "Nouveau membre":
            $tmp = "New User";
            break;
        case "Nouveau sujet":
            $tmp = "New Topic";
            break;
        case "Nouveau":
            $tmp = "New";
            break;
        case "Nouveautés":
            $tmp = "New links";
            break;
        case "Nouveaux liens":
            $tmp = "New Links";
            break;
        case "Nouvel utilisateur : ":
            $tmp = "New User:";
            break;
        case "Novembre":
            $tmp = "November";
            break;
        case "O=Non - 1=Oui":
            $tmp = "0=No - 1=Yes";
            break;
        case "Objet":
            $tmp = "Product Title";
            break;
        case "Obligatoire seulement si vous soumettez un lien relatif":
            $tmp = "Required if you have a related link, otherwise not required.";
            break;
        case "Octobre":
            $tmp = "October";
            break;
        case "Offre":
            $tmp = "Offer";
            break;
        case "Offres par page":
            $tmp = "Offers per page";
            break;
        case "Ok":
            $tmp = "Ok";
            break;
        case "ont été envoyées.":
            $tmp = "has been send to";
            break;
        case "Option : ":
            $tmp = "Option: ";
            break;
        case "Options":
            $tmp = "Options";
            break;
        case "Ordre croissant":
            $tmp = "Sort Ascending";
            break;
        case "Ordre décroissant":
            $tmp = "Sort Descending";
            break;
        case "Original":
            $tmp = "Original";
            break;
        case "ou poster des commentaires signés...":
            $tmp = "comments configuration and post comments with your name.";
            break;
        case "ou":
            $tmp = "or";
            break;
        case "Oui":
            $tmp = "Yes";
            break;
        case "Outils administrateur":
            $tmp = "Administration Tools";
            break;
        case "Ouvrir ce sujet":
            $tmp = "Unlock this Topic";
            break;
        case "Ouvrir le sujet":
            $tmp = "Unlock Topic";
            break;
        case "Ouvrir un salon de chat pour le groupe.":
            $tmp = "Open a chat for the group.";
            break;
        case "P. annonces":
            $tmp = "Waiting Classifieds";
            break;
        case "Page d'accueil":
            $tmp = "HomePage";
            break;
        case "Page précédente":
            $tmp = "Previous Page";
            break;
        case "Page spéciale pour impression":
            $tmp = "Printer Friendly Page";
            break;
        case "Page suivante":
            $tmp = "Next Page";
            break;
        case "Page":
            $tmp = "Page";
            break;
        case "pages depuis le":
            $tmp = "views since";
            break;
        case "Pages vues depuis":
            $tmp = "Pages showed since";
            break;
        case "pages":
            $tmp = "pages";
            break;
        case "par défaut":
            $tmp = "Default";
            break;
        case "par":
            $tmp = "by";
            break;
        case "pas affiché dans l'annuaire, message à un membre, ...":
            $tmp = "not showed in memberlist, members' message bloc ...";
            break;
        case "Pas de connexion à la base forums.":
            $tmp = "Could not connect to the forums database.";
            break;
        case "Pas de connexion à la base topics.":
            $tmp = "Could not query the topics database.";
            break;
        case "Pas de groupe ouvert.":
            $tmp = "No open group.";
            break;
        case "Pas de problème. Saisissez votre identifiant et le nouveau mot de passe que vous souhaitez utiliser puis cliquez sur envoyer pour recevoir un Email de confirmation.":
            $tmp = "No problem. Just type your Nickname, the new password you want and click on send button to recieve a email with the confirmation code.";
            break;
        case "Passer / Gérer une annonce":
            $tmp = "Submit / Manage Item";
            break;
        case "Pays":
            $tmp = "Country";
            break;
        case "Période":
            $tmp = "Period";
            break;
        case "Personnaliser les commentaires":
            $tmp = "Customize the comments";
            break;
        case "personne connectée.":
            $tmp = "person chatting right now.";
            break;
        case "personnes connectées.":
            $tmp = "people chatting right now.";
            break;
        case "Plan du site":
            $tmp = "Site map";
            break;
        case "Plus d'émoticons":
            $tmp = "More smilies";
            break;
        case "Plus de forum":
            $tmp = "No More Forums";
            break;
        case "Plus de":
            $tmp = "More than";
            break;
        case "Populaire":
            $tmp = "Popular";
            break;
        case "Post affiché":
            $tmp = "Normal post";
            break;
        case "Post caché":
            $tmp = "Hidden post";
            break;
        case "Posté : ":
            $tmp = "Posted: ";
            break;
        case "Posté le ":
            $tmp = "Posted on ";
            break;
        case "Posté le":
            $tmp = "Posted on";
            break;
        case "Posté par ":
            $tmp = "Posted by ";
            break;
        case "Posté par":
            $tmp = "Posted by";
            break;
        case "Posté":
            $tmp = "Posted";
            break;
        case "Poster des commentaires signés":
            $tmp = "Post comments with your name";
            break;
        case "Poster un nouveau sujet dans :":
            $tmp = "Post New Topic in:";
            break;
        case "Poster une réponse dans le sujet":
            $tmp = "Post Reply in Topic";
            break;
        case "Pour des raisons de sécurité, votre nom d'utilisateur et votre adresse IP vont être momentanément conservés.":
            $tmp = "For security reasons your user name and IP address will also be temporarily recorded.";
            break;
        case "pour enregistrer un compte sur":
            $tmp = "to register an account at";
            break;
        case "pour le groupe":
            $tmp = "for group";
            break;
        case "Pour les 30 derniers jours":
            $tmp = "Last 30 days";
            break;
        case "Pour supprimer votre abonnement à notre lettre, merci d'utiliser":
            $tmp = "For Unsubscribe, please goto";
            break;
        case "Pour utiliser cette application, vous devez être":
            $tmp = "To use this application you must be";
            break;
        case "Pour valider votre nouveau mot de passe, merci de le re-saisir.":
            $tmp = "To valid your new password request, just re-type it.";
            break;
        case "Pourcentage":
            $tmp = "Percent";
            break;
        case "Précédent":
            $tmp = "Previous";
            break;
        case "Préférés":
            $tmp = "Top Rated";
            break;
        case "Prévenir par Email quand de nouvelles réponses sont postées":
            $tmp = "Notify by email when replies are posted";
            break;
        case "Prévisualiser les modifications":
            $tmp = "Preview Modifications";
            break;
        case "Prévisualiser":
            $tmp = "Preview";
            break;
        case "Principal":
            $tmp = "Main";
            break;
        case "Privé":
            $tmp = "Private";
            break;
        case "Prix":
            $tmp = "Price";
            break;
        case "Profil":
            $tmp = "Profile";
            break;
        case "Proposé":
            $tmp = "Proposed";
            break;
        case "Proposer des articles en votre nom":
            $tmp = "Send news with your name";
            break;
        case "Proposer un article":
            $tmp = "Submit News";
            break;
        case "Proposer un seul lien.":
            $tmp = "Submit a unique link only once.";
            break;
        case "Proposition de modification":
            $tmp = "Request Link Modification";
            break;
        case "Proposition de modifications de liens":
            $tmp = "Link Modification Requests";
            break;
        case "Propriétaire":
            $tmp = "Owner";
            break;
        case "Question":
            $tmp = "Question";
            break;
        case "Qui est en ligne ?":
            $tmp = "Who's Online";
            break;
        case "Rapport généré le":
            $tmp = "Report Generated on";
            break;
        case "Rapporter un lien rompu":
            $tmp = "Report Broken Link";
            break;
        case "Raz de la liste":
            $tmp = "RAZ member's list";
            break;
        case "Réalisé":
            $tmp = "Made";
            break;
        case "Réalisées":
            $tmp = "Maded";
            break;
        case "Recevez par mail les nouveautés du site.":
            $tmp = "Sign up now to receive our lastest infos.";
            break;
        case "Recherche avancée":
            $tmp = "Advanced Search";
            break;
        case "Recherche":
            $tmp = "Search";
            break;
        case "Rechercher dans la base des utilisateurs":
            $tmp = "Search in Users Database";
            break;
        case "Rechercher dans les critiques":
            $tmp = "Search in Reviews";
            break;
        case "Rechercher dans les rubriques":
            $tmp = "Search in Sections";
            break;
        case "Rechercher dans tous les forums":
            $tmp = "Search All Forums";
            break;
        case "Rechercher dans":
            $tmp = "Search in";
            break;
        case "Recommander ce site à un ami":
            $tmp = "Recommend this Site to a Friend";
            break;
        case "Reçus":
            $tmp = "Received";
            break;
        case "Rejoindre ce groupe":
            $tmp = "Join this group";
            break;
        case "Replier la liste":
            $tmp = "Hide list";
            break;
        case "Répondre":
            $tmp = "Reply";
            break;
        case "Réponse postée.":
            $tmp = "Reply Posted.";
            break;
        case "Réponse":
            $tmp = "Answer";
            break;
        case "réponses précédentes":
            $tmp = "previous matches";
            break;
        case "réponses suivantes":
            $tmp = "next matches";
            break;
        case "Réponses":
            $tmp = "Replies";
            break;
        case "Requête de modification d'un lien utilisateur":
            $tmp = "User Link Modification Requests";
            break;
        case "Réseaux sociaux":
            $tmp = "Social networks";
            break;
        case "Réservées":
            $tmp = "Purchased";
            break;
        case "Résolu":
            $tmp = "Solved";
            break;
        case "Restantes":
            $tmp = "Lefted";
            break;
        case "Résultats":
            $tmp = "Results";
            break;
        case "Retour à l'administration":
            $tmp = "Back to console";
            break;
        case "Retour à l'index des critiques":
            $tmp = "Back to Reviews Index";
            break;
        case "Retour à l'index des rubriques":
            $tmp = "Return to Sections Index";
            break;
        case "Retour à l'index FAQ":
            $tmp = "Back to FAQ Index";
            break;
        case "Retour à la sous-rubrique :":
            $tmp = "Back to chapter:";
            break;
        case "Retour en arrière":
            $tmp = "Go Back";
            break;
        case "Retour vers":
            $tmp = "Back to";
            break;
        case "retour":
            $tmp = "back";
            break;
        case "Revenir à":
            $tmp = "Return to";
            break;
        case "Revenir aux avatars standards":
            $tmp = "Re-activate the standard'avatars";
            break;
        case "Revue de l'éditeur":
            $tmp = "Editor Review";
            break;
        case "Rien":
            $tmp = "No posts";
            break;
        case "Robots - Spiders":
            $tmp = "Robots - Spiders";
            break;
        case "Rubriques spéciales":
            $tmp = "Special Sections";
            break;
        case "Rubriques":
            $tmp = "Sections";
            break;
        case "S'inscrire à la liste de diffusion du site":
            $tmp = "Register to web site' mailing list";
            break;
        case "Salle":
            $tmp = "Room";
            break;
        case "Samedi":
            $tmp = "Saturday";
            break;
        case "Sans titre":
            $tmp = "Untitled";
            break;
        case "Sans":
            $tmp = "Without";
            break;
        case "Sauter à : ":
            $tmp = "Jump To: ";
            break;
        case "Sauter à :":
            $tmp = "Jump To:";
            break;
        case "Sauver les modifications":
            $tmp = "Save Changes";
            break;
        case "Sauvez votre journal":
            $tmp = "Save Journal";
            break;
        case "Se connecter":
            $tmp = "Login box";
            break;
        case "Seconde(s)":
            $tmp = "Second(s)";
            break;
        case "Sélectionner la page":
            $tmp = "Select page";
            break;
        case "Sélectionner le nombre de news que vous souhaitez voir apparaître sur la page principale.":
            $tmp = "Select how many news you want in the Home";
            break;
        case "Sélectionner un sujet":
            $tmp = "Select Topic";
            break;
        case "Sélectionner une catégorie":
            $tmp = "Select Category Folder";
            break;
        case "Sélectionnez un forum et participez !":
            $tmp = "Select forums with discussions of your interest, participate and have a lot of fun!";
            break;
        case "Sélectionnez un thème d'affichage":
            $tmp = "Select One Theme";
            break;
        case "semaine":
            $tmp = "week";
            break;
        case "semaines":
            $tmp = "weeks";
            break;
        case "Septembre":
            $tmp = "September";
            break;
        case "Seulement":
            $tmp = "Only";
            break;
        case "Seuls les modérateurs peuvent poster de nouveaux sujets et répondre dans ce forum.":
            $tmp = "Only Moderators can post new topics and replies in this forum.";
            break;
        case "Si vous étiez enregistré, vous pourriez proposer des liens.":
            $tmp = "If you were registered you could add links on this website.";
            break;
        case "Si vous n'avez rien demandé, ne vous inquiétez pas :  vous êtes le seul à lire ce message. Connectez-vous simplement avec ce nouveau mot de passe.":
            $tmp = "If you didn't ask for this, don't worry. You are seeing this message, not 'them'. If this was an error just login with your new password.";
            break;
        case "Si vous n'avez rien demandé, ne vous inquiétez pas. Effacez juste ce Email. ":
            $tmp = "If you didn't ask for this, don't worry. Just delete this Email.";
            break;
        case "Si vous souhaitez personnaliser un peu le site, c'est l'endroit indiqué. ":
            $tmp = "This is your personal page";
            break;
        case "Signature : ":
            $tmp = "Signature: ";
            break;
        case "Signature":
            $tmp = "Signature";
            break;
        case "Site à découvrir : ":
            $tmp = "Interesting Site:";
            break;
        case "Site web : ":
            $tmp = "Website: ";
            break;
        case "Site web officiel. Veillez à ce que votre url commence bien par":
            $tmp = "Product Official Website. Make sure your URL starts by";
            break;
        case "Sites classés par":
            $tmp = "Sites currently sorted by";
            break;
        case "Situation géographique":
            $tmp = "Location";
            break;
        case "Sondage":
            $tmp = "Survey";
            break;
        case "sondages avec le meilleur taux de participation":
            $tmp = "most voted polls";
            break;
        case "Souligné":
            $tmp = "Underline";
            break;
        case "Soumettre une offre":
            $tmp = "Submit an offer";
            break;
        case "Soumission de liens brisés":
            $tmp = "Broken Link Reports";
            break;
        case "Soumission en cours. Une fois vos fichiers chargés, cliquer sur le bouton OK pour finir.":
            $tmp = "Submission in progress. After Uploading your files, please click on the OK button to finish.";
            break;
        case "Sous-catégorie :":
            $tmp = "Subcat:";
            break;
        case "Sous-catégorie":
            $tmp = "SubCategory";
            break;
        case "Sous-catégories par ligne (page principale)":
            $tmp = "Subcategory per row";
            break;
        case "Sous-catégories":
            $tmp = "SubCategories";
            break;
        case "Sous-rubrique":
            $tmp = "Sub-section";
            break;
        case "Statistiques des chargements":
            $tmp = "Download Stats";
            break;
        case "Statistiques diverses":
            $tmp = "Miscelaneous Stats";
            break;
        case "Statistiques générales":
            $tmp = "General Stats";
            break;
        case "Statistiques":
            $tmp = "Statistics";
            break;
        case "Status":
            $tmp = "Status";
            break;
        case "stb=Demande en attente de validation":
            $tmp = "stb=Request in standby";
            break;
        case "Suivant":
            $tmp = "Next";
            break;
        case "Sujet : ":
            $tmp = "Topic:";
            break;
        case "Sujet":
            $tmp = "Subject";
            break;
        case "Sujet":
            $tmp = "Topic";
            break;
        case "Sujets actifs : ":
            $tmp = "Active Topics: ";
            break;
        case "Sujets actifs":
            $tmp = "Current Active Topics";
            break;
        case "Sujets":
            $tmp = "Topics";
            break;
        case "Suppression du message impossible.":
            $tmp = "Could not remove posts from the database.";
            break;
        case "Suppression du message sélectionné impossible.":
            $tmp = "Can't delete the selected message.";
            break;
        case "Supprimer ce message":
            $tmp = "Delete this Post";
            break;
        case "Systèmes d'exploitation":
            $tmp = "Operating Systems";
            break;
        case "Tableau de bord":
            $tmp = "Administration BlackBoard";
            break;
        case "Tableau":
            $tmp = "Table";
            break;
        case "Taille du fichier":
            $tmp = "File Size";
            break;
        case "Taille":
            $tmp = "Size";
            break;
        case "Téléchargements":
            $tmp = "downloads";
            break;
        case "Télécharger un avatar personnel":
            $tmp = "Upload personal avatar";
            break;
        case "Terminer":
            $tmp = "Finish";
            break;
        case "Texte : ":
            $tmp = "Text:";
            break;
        case "Texte aligné à droite":
            $tmp = "Text align-right";
            break;
        case "Texte aligné à gauche":
            $tmp = "Text align-left";
            break;
        case "Texte centré":
            $tmp = "Text center";
            break;
        case "Texte complet":
            $tmp = "Full Text";
            break;
        case "Texte d'introduction":
            $tmp = "Intro Text";
            break;
        case "Texte de critique non valide... Il ne peut pas être vide":
            $tmp = "Invalid review text... can not be blank";
            break;
        case "Texte étendu":
            $tmp = "Extended Text";
            break;
        case "Texte justifié":
            $tmp = "Text justified";
            break;
        case "Texte":
            $tmp = "Text";
            break;
        case "Thème":
            $tmp = "Theme";
            break;
        case "Thème(s)":
            $tmp = "Theme(s)";
            break;
        case "Titre : ":
            $tmp = "Subject: ";
            break;
        case "Titre :":
            $tmp = "Title:";
            break;
        case "Titre (de A à Z)":
            $tmp = "Title (A to Z)";
            break;
        case "Titre (de Z à A)":
            $tmp = "Title (Z to A)";
            break;
        case "Titre de la page : ":
            $tmp = "Page Title: ";
            break;
        case "Titre du lien":
            $tmp = "Link title";
            break;
        case "Titre du lien":
            $tmp = "Link title";
            break;
        case "Titre non valide... Il ne peut pas être vide":
            $tmp = "Invalid Title... can not be blank";
            break;
        case "Titre":
            $tmp = "Title";
            break;
        case "Top":
            $tmp = "Top";
            break;
        case "Total : ":
            $tmp = "Total:";
            break;
        case "Total des nouveaux liens pour la semaine dernière":
            $tmp = "Total new links: Last week";
            break;
        case "Total des nouveaux liens":
            $tmp = "Total new links for last";
            break;
        case "total votes":
            $tmp = "total votes";
            break;
        case "Total":
            $tmp = "Total";
            break;
        case "Tous les auteurs":
            $tmp = "All Authors";
            break;
        case "Tous les liens proposés sont vérifiés avant insertion.":
            $tmp = "All links are posted pending verification.";
            break;
        case "Tous les sujets":
            $tmp = "All Topics";
            break;
        case "Tous les utilisateurs enregistrés peuvent poster de nouveaux sujets et répondre dans ce forum.":
            $tmp = "All registered users can post new topics and replies to this forum.";
            break;
        case "Tous les utilisateurs enregistrés peuvent poster des messages privés.":
            $tmp = "All registered users can post private messages.";
            break;
        case "Tous":
            $tmp = "All";
            break;
        case "Tout développer":
            $tmp = "All to develop";
            break;
        case "Tout regrouper":
            $tmp = "All to gather";
            break;
        case "trié par ordre":
            $tmp = "sorted by";
            break;
        case "Type":
            $tmp = "Type";
            break;
        case "Un problème est survenu":
            $tmp = "A problem ocurred";
            break;
        case "Un seul vote par jour, merci":
            $tmp = "We allow just one vote per day";
            break;
        case "Un seul vote par sondage.":
            $tmp = "We allow just one vote per poll.";
            break;
        case "Un utilisateur web ayant l'adresse IP ":
            $tmp = "A web user from";
            break;
        case "Une erreur est survenue lors de l'interrogation de la base.":
            $tmp = "An error ocurred while querying the database.";
            break;
        case "Une fois enregistré":
            $tmp = "As registered";
            break;
        case "Url : ":
            $tmp = "URL:";
            break;
        case "Url de la page : ":
            $tmp = "Page URL: ";
            break;
        case "Url":
            $tmp = "URL";
            break;
        case "Utilisateur avancé":
            $tmp = "Advance User";
            break;
        case "Utilisateur enregistré":
            $tmp = "Registered User";
            break;
        case "Utilisateur ou message inexistant dans la base.":
            $tmp = "No such user or post in the database.";
            break;
        case "Utilisateur":
            $tmp = "User";
            break;
        case "Utilisateurs enregistrés : ":
            $tmp = "Registered Users: ";
            break;
        case "Utilisateurs enregistrés":
            $tmp = "Registered Users";
            break;
        case "Utilisateurs montrés":
            $tmp = "users shown";
            break;
        case "Utilisateurs trouvés pour":
            $tmp = "users found for";
            break;
        case "Utilisateurs trouvés":
            $tmp = "users found";
            break;
        case "Utilisateurs":
            $tmp = "Users";
            break;
        case "Utilisation : ":
            $tmp = "Usage:";
            break;
        case "Utilisation":
            $tmp = "Usage";
            break;
        case "Utilisé":
            $tmp = "Used";
            break;
        case "Valider":
            $tmp = "Submit";
            break;
        case "Validez cette option et le texte suivant apparaîtra sur votre page d'accueil":
            $tmp = "Check this option and the following text will appear in the Home";
            break;
        case "Vendredi":
            $tmp = "Friday";
            break;
        case "Véritable adresse Email":
            $tmp = "Real Email";
            break;
        case "Version":
            $tmp = "Version";
            break;
        case "Vidéo Youtube":
            $tmp = "Youtube video";
            break;
        case "Vidéos":
            $tmp = "Videos";
            break;
        case "Vider la table chatBox":
            $tmp = "Clear Chat DB";
            break;
        case "vient de demander une confirmation pour changer de mot de passe.":
            $tmp = "has just requested a Confirmation to change the password.";
            break;
        case "Ville":
            $tmp = "City";
            break;
        case "Visite":
            $tmp = "Visit";
            break;
        case "Visiter ce site web":
            $tmp = "Visit this Website";
            break;
        case "Visiteur":
            $tmp = "Guest";
            break;
        case "visiteur(s) et":
            $tmp = "guest(s) and";
            break;
        case "Visitez le minisite":
            $tmp = "Visit the Mini Web Site !";
            break;
        case "Voici les articles publiés dans cette rubrique.":
            $tmp = "Following are the articles published under this section.";
            break;
        case "Vos centres d'intérêt":
            $tmp = "Your Interest";
            break;
        case "Vos informations personnelles (Nom, Tél., ...)":
            $tmp = "Your client informations (Name, Tel, ...)";
            break;
        case "vote":
            $tmp = "vote";
            break;
        case "Voter":
            $tmp = "Vote";
            break;
        case "Votes : ":
            $tmp = "Votes: ";
            break;
        case "votes":
            $tmp = "votes";
            break;
        case "Votes":
            $tmp = "Votes";
            break;
        case "Votre activité":
            $tmp = "Your Occupation";
            break;
        case "Votre adresse Email":
            $tmp = "Your email";
            break;
        case "Votre adresse Ip est enregistrée":
            $tmp = "Your IP is recorded";
            break;
        case "Votre adresse mèl 'truquée'":
            $tmp = "Fake Email";
            break;
        case "Votre adresse mèl est obligatoire":
            $tmp = "Your E-mail address. Required.";
            break;
        case "Votre ami":
            $tmp = "Your Friend";
            break;
        case "Votre Avatar":
            $tmp = "Your Avatar";
            break;
        case "Votre commentaire : ":
            $tmp = "Your Comment:";
            break;
        case "Votre compte":
            $tmp = "Your account";
            break;
        case "Votre contribution n'a pas été supprimée car au moins un post est encore rattaché (forum arbre).":
            $tmp = "Your post has NOT been deleted because one or more posts is already attached (TREE forum).";
            break;
        case "Votre Email":
            $tmp = "Your Email";
            break;
        case "Votre fiche d'inscription":
            $tmp = "Your registration form";
            break;
        case "Votre lien":
            $tmp = "Your Link at";
            break;
        case "Votre message a été posté":
            $tmp = "Your Message has been Posted";
            break;
        case "Votre mot de passe est : ":
            $tmp = "Your Password is: ";
            break;
        case "Votre mot de passe est erroné ou vous n'avez pas l'autorisation d'éditer ce message, refaites un essai.":
            $tmp = "You did not supply the correct password or do not have permission to edit this post. Please go back and try again.";
            break;
        case "Votre nom complet. C'est indispensable.":
            $tmp = "Your Full Name. Required.";
            break;
        case "Votre nom est trop long ou vide. Il doit faire moins de 50 caractères.":
            $tmp = "Name is too long or empty. It must be less than 50 characters.";
            break;
        case "Votre nom":
            $tmp = "Your name";
            break;
        case "Votre offre":
            $tmp = "Your offer";
            break;
        case "Votre page Web":
            $tmp = "Your HomePage";
            break;
        case "Votre requête":
            $tmp = "Your request";
            break;
        case "Votre situation géographique":
            $tmp = "Your Location";
            break;
        case "Votre surnom est trop long. Il doit faire moins de 25 caractères.":
            $tmp = "Nickname is too long. It must be less than 25 characters.";
            break;
        case "Votre url de confirmation est :":
            $tmp = "Your Confirmation URL is:";
            break;
        case "Votre url de confirmation est expirée":
            $tmp = "Your Confirmation URL is expired";
            break;
        case "Votre véritable identité":
            $tmp = "Real Name";
            break;
        case "Vous allez envoyer cet article":
            $tmp = "You will send the story";
            break;
        case "vous aurez certains avantages, comme pouvoir modifier l'aspect du site,":
            $tmp = "user you have some advantages like theme manager,";
            break;
        case "Vous avez changé l'url de la bannière":
            $tmp = "You changed the URL";
            break;
        case "Vous avez déjà voté aujourd'hui":
            $tmp = "You already voted today!";
            break;
        case "Vous avez perdu votre mot de passe ?":
            $tmp = "Lost your Password?";
            break;
        case "Vous avez un nouveau message.":
            $tmp = "You have a new message.";
            break;
        case "Vous avez":
            $tmp = "You have";
            break;
        case "Vous devez accepter la charte d'utilisation du site":
            $tmp = "You must accept the terms of use of this website";
            break;
        case "Vous devez choisir un icône pour votre message, refaites un essai.":
            $tmp = "You must choose message icon to post. Go back and choose message icon.";
            break;
        case "Vous devez choisir un titre et un message pour poster votre sujet.":
            $tmp = "You must provide subject and message to post your topic.";
            break;
        case "Vous devez entrer un titre de lien et une adresse relative, ou laisser les deux zones vides":
            $tmp = "You must enter BOTH a link title and a related link or leave both blank";
            break;
        case "Vous devez entrer votre nom et votre adresse Email":
            $tmp = "You must enter both your name and your email";
            break;
        case "Vous devez obligatoirement saisir un sujet, refaites un essai.":
            $tmp = "You must type a subject to post. You can't post an empty subject. Go back and enter the subject";
            break;
        case "Vous devez prévisualiser avant de pouvoir envoyer":
            $tmp = "You must preview once before you can submit";
            break;
        case "Vous devez taper un message à poster.":
            $tmp = "You must type a message to post.";
            break;
        case "Vous devez vous identifier.":
            $tmp = "You must enter your username and password. Go back and do so.";
            break;
        case "Vous êtes connecté en tant que :":
            $tmp = "You are logged in as";
            break;
        case "Vous êtes connecté en tant que":
            $tmp = "You are logged as";
            break;
        case "Vous êtes maintenant enregistré. Vous allez recevoir un code de confirmation dans votre boîte à lettres électronique.":
            $tmp = "You are now registered. You should receive your password at the email account you provided.";
            break;
        case "Vous n'avez aucun message.":
            $tmp = "You don't have any Messages.";
            break;
        case "Vous n'avez pas encore de compte personnel ? Vous devriez":
            $tmp = "Don't have an account yet? You can";
            break;
        case "Vous n'avez pas l'autorisation d'éditer ce message.":
            $tmp = "You do not have permission to edit this post.";
            break;
        case "Vous n'êtes pas (encore) enregistré ou vous n'êtes pas (encore) connecté.":
            $tmp = "You are not a registered user or you have not logged in.";
            break;
        case "Vous n'êtes pas autorisé à participer à ce forum":
            $tmp = "You are not allowed to post in this forum";
            break;
        case "Vous n'êtes pas encore autorisé à vous connecter.":
            $tmp = "User not yet allowed by Administrator";
            break;
        case "Vous n'êtes pas identifié comme modérateur de ce forum. Opération interdite.":
            $tmp = "You are not the moderator of this forum therefor you cannot perform this function.";
            break;
        case "Vous n'êtes pas le modérateur de ce forum, vous ne pouvez utiliser cette fonction.":
            $tmp = "You are not the Moderator of this forum therefore you can't perform this function.";
            break;
        case "Vous ne pouvez éditer ce message, vous n'en êtes pas le destinataire.":
            $tmp = "You can't edit a post that's not yours.";
            break;
        case "Vous ne pouvez répondre à ce message, vous n'en êtes pas le destinataire.":
            $tmp = "You can't reply to that message. It wasn't sent to you.";
            break;
        case "Vous ne pouvez répondre à ce message.":
            $tmp = "You can't reply to that message.";
            break;
        case "Vous ne pouvez répondre à ce topic il est verrouillé. Contacter l'administrateur du site.":
            $tmp = "You can't post a reply to this topic, it has been locked. Contact the administrator if you have any question.";
            break;
        case "Vous pourrez le modifier après vous être connecté sur":
            $tmp = "You can change it after you login at";
            break;
        case "Vous pouvez charger un fichier carnet.txt dans votre miniSite":
            $tmp = "You can upload a file carnet.txt in your Mini-Web site";
            break;
        case "Vous pouvez en poster un ici.":
            $tmp = "You can post one here.";
            break;
        case "Vous pouvez utiliser du code html, pour créer un lien par exemple":
            $tmp = "You can use HTML code to put links, for example";
            break;
        case "Vous pouvez utiliser notre moteur de recherche sur : ":
            $tmp = "You can browse our search engine at:";
            break;
        case "Vous recevrez un mèl quand elle sera approuvée.":
            $tmp = "You'll receive and E-mail when it's approved.";
            break;
        case "vous reconnecter.":
            $tmp = "login again";
            break;
        case "Vous, ou quelqu'un d'autre, a utilisé votre Email identifiant votre compte":
            $tmp = "You or someone else has used your email account";
            break;
        case "Vous":
            $tmp = "Edit User";
            break;
        case "vrai nom":
            $tmp = "real name";
            break;

        default:
            $tmp = "Need a translation [** $phrase **]";
            break;
    }
    return $tmp;
}