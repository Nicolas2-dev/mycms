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
            $tmp = "Montag";
            break;
        case "Tuesday":
            $tmp = "Dienstag";
            break;
        case "Wednesday":
            $tmp = "Mittwoch";
            break;
        case "Thursday":
            $tmp = "Donnerstag";
            break;
        case "Friday":
            $tmp = "Freitag";
            break;
        case "Saturday":
            $tmp = "Samstag";
            break;
        case "Sunday":
            $tmp = "Sonntag";
            break;
        case "January":
            $tmp = "Januar";
            break;
        case "February":
            $tmp = "Februar";
            break;
        case "March":
            $tmp = "März";
            break;
        case "April":
            $tmp = "April";
            break;
        case "May":
            $tmp = "Mai";
            break;
        case "June":
            $tmp = "Juni";
            break;
        case "July":
            $tmp = "Juli";
            break;
        case "August":
            $tmp = "August";
            break;
        case "September":
            $tmp = "September";
            break;
        case "October":
            $tmp = "Oktober";
            break;
        case "November":
            $tmp = "November";
            break;
        case "December":
            $tmp = "Dezember";
            break;
        case "english":
            $tmp = "Englisch";
            break;
        case "french":
            $tmp = "Französisch";
            break;
        case "spanish":
            $tmp = "Spanisch";
            break;
        case "chinese":
            $tmp = "Chinesisch";
            break;
        case "german":
            $tmp = "Deutsche";
            break;

        case "0":
            $tmp = "null";
            break;
        case "1":
            $tmp = "eins";
            break;
        case "2":
            $tmp = "zwei";
            break;
        case "3":
            $tmp = "drei";
            break;
        case "4":
            $tmp = "vier";
            break;
        case "5":
            $tmp = "funf";
            break;
        case "6":
            $tmp = "sechs";
            break;
        case "7":
            $tmp = "sieben";
            break;
        case "8":
            $tmp = "acht";
            break;
        case "9":
            $tmp = "neun";
            break;
        case "+":
            $tmp = "plus";
            break;
        case "-":
            $tmp = "minus";
            break;
        case "/":
            $tmp = "geteilt durch";
            break;
        case "*":
            $tmp = "multipliziert mit";
            break;

        case " le...":
            $tmp = " an...";
            break;
        case "-Identifiant : ":
            $tmp = "-Nickname : ";
            break;
        case "-Mot de passe : ":
            $tmp = "-Passwort : ";
            break;
        case ".:Page >> Super-Cache:.":
            $tmp = ".:Seite >> Super-Cache:.";
            break;
        case "(255 caractères max. Entrez votre signature (mise en forme html))":
            $tmp = "(255 Buchstaben maximal. Ihre Signatur kommt hier hinein (in HTML))";
            break;
        case "(255 caractères max). Précisez qui vous êtes, ou votre identification sur ce site)":
            $tmp = "(255 Buchstaben maximal. Schreiben Sie, was andere Benutzer sehen sollen.)";
            break;
        case "(Cette adresse Email ne sera pas divulguée, mais elle nous servira à vous envoyer votre Mot de Passe si vous le perdez)":
            $tmp = "(Diese E-mail Adresse wird nicht veröffentlicht, ist aber nötig, um Ihnen das Passwort zu schicken, falls Sie es vergessen haben.)";
            break;
        case "(Cette adresse Email sera publique. Vous pouvez saisir ce que vous voulez mais attention au Spam)":
            $tmp = "(Die E-mail Adresse wird angezeigt. Schreiben Sie, was Sie wollen. Es wird auf Spam geprüft)";
            break;
        case "(indispensable)":
            $tmp = "(notwendig)";
            break;
        case "(optionnel)":
            $tmp = "(optional)";
            break;
        case "(Pour activer un nouveau mot de passe, introduisez-le dans les 2 cases)":
            $tmp = "(Geben Sie erneut ein neues Passwort ein, um es zu ändern.)";
            break;
        case "* Désigne un champ obligatoire":
            $tmp = "* Pflichtfeld";
            break;
        case "0 : illimité / 1 à":
            $tmp = "0 : unlimitiert / 1 zu";
            break;
        case "à : ":
            $tmp = "an : ";
            break;
        case "à cette personne : ":
            $tmp = "An diese Person : ";
            break;
        case "a écrit :":
            $tmp = "Schreiben Sie :";
            break;
        case "a été envoyé à":
            $tmp = "wurde gesendet an";
            break;
        case "A propos des messages publiés :":
            $tmp = "Über private Nachrichten";
            break;
        case "a trouvé cet article intéressant et a souhaité vous l'envoyer.":
            $tmp = "findet diesen Artikel interessant und will ihn an Sie senden.";
            break;
        case "a trouvé notre site":
            $tmp = "unsere Seite zu finden";
            break;
        case "à":
            $tmp = "an";
            break;
        case "Abon.":
            $tmp = "Sub.";
            break;
        case "Abonnement":
            $tmp = "Abonnement";
            break;
        case "Accepter":
            $tmp = "Akzeptiere";
            break;
        case "Accessible à tous":
            $tmp = "Zugänglich für Alle";
            break;
        case "Activé":
            $tmp = "Aktiviert";
            break;
        case "Activer votre menu personnel":
            $tmp = "Aktivieren Sie ihr persönliches Menu";
            break;
        case "Activité du site":
            $tmp = "Tätigkeit auf der Website";
            break;
        case "Activité":
            $tmp = "Ihr Beruf";
            break;
        case "Actuellement connecté en administrateur... Cette critique sera":
            $tmp = "Als Admin angemeldet... Diese Kritik wird";
            break;
        case "Administrateur : ":
            $tmp = "Administrator : ";
            break;
        case "Adresse DNS de l'utilisateur : ":
            $tmp = "DNS des Benutzers : ";
            break;
        case "Adresse IP de l'utilisateur : ":
            $tmp = "IP Adresse des Benutzers : ";
            break;
        case "Adresse":
            $tmp = "Adresse";
            break;
        case "Adresses IP et informations sur les utilisateurs":
            $tmp = "IP Adresse und Accountinformationen";
            break;
        case "Affichage filtré pour":
            $tmp = "Anzeige gefiltert nach";
            break;
        case "Afficher ce commentaire":
            $tmp = "Diesen Kommentar anzeigen";
            break;
        case "Afficher ce post":
            $tmp = "Diesen Beitrag anzeigen";
            break;
        case "Afficher la signature":
            $tmp = "Signatur anzeigen";
            break;
        case "Ajouté :":
            $tmp = "hinzugefügt :";
            break;
        case "Ajouté le : ":
            $tmp = "Hinzugefügt am : ";
            break;
        case "ajouté":
            $tmp = "hinzugefügt";
            break;
        case "Ajouter à la liste de diffusion":
            $tmp = "zu Mailing-Liste hinzufügen";
            break;
        case "Ajouter la date et l'heure":
            $tmp = "Datum und Uhrzeit hinzufügen";
            break;
        case "Ajouter un article":
            $tmp = "Artikel hinzufügen";
            break;
        case "Ajouter un édito":
            $tmp = "Fügen Sie eine Beschreibung hinzu";
            break;
        case "Ajouter un nouveau lien":
            $tmp = "Fügen Sie einen neuen Link hinzu";
            break;
        case "Ajouter une catégorie principale":
            $tmp = "Fügen Sie eine Hauptkategorie hinzu";
            break;
        case "Ajouter une sous-catégorie":
            $tmp = "Fügen Sie eine Unterkategorie hinzu";
            break;
        case "Ajouter une url":
            $tmp = "Fügen Sie eine URL hinzu";
            break;
        case "Ajouter":
            $tmp = "Hinzufügen";
            break;
        case "Aller à la page":
            $tmp = "Gehe zur Seite : ";
            break;
        case "Anciens articles":
            $tmp = "Alte Artikel";
            break;
        case "Anciens sondages":
            $tmp = "Alte Umfragen";
            break;
        case "Année":
            $tmp = "Jahr";
            break;
        case "Annuler l'envoi":
            $tmp = "Senden abbrechen";
            break;
        case "Annuler la contribution":
            $tmp = "Beitrag verwerfen";
            break;
        case "Annuler la réponse":
            $tmp = "Antwort abbrechen";
            break;
        case "Annuler":
            $tmp = "Abbrechen";
            break;
        case "Anonyme":
            $tmp = "Anonym";
            break;
        case "Anti-Spam / Merci de répondre à la question suivante : ":
            $tmp = "Anti-Spam / Beantworten Sie bitte die Frage. Danke : ";
            break;
        case "Août":
            $tmp = "August";
            break;
        case "Aperçu des sujets :":
            $tmp = "Themenübersicht";
            break;
        case "Archives":
            $tmp = "Archive";
            break;
        case "Article de":
            $tmp = "Beitrag von";
            break;
        case "Article du Jour":
            $tmp = "Artikel des Tages";
            break;
        case "Article en attente d'édition":
            $tmp = "Beitrag wartet auf Freigabe";
            break;
        case "Article intéressant sur":
            $tmp = "Interessanter Artikel bei";
            break;
        case "Articles envoyés : ":
            $tmp = "Sende neuen Artikel : ";
            break;
        case "Articles les plus commentés":
            $tmp = "Meist kommentierte Arktikel";
            break;
        case "Articles les plus lus dans les rubriques spéciales":
            $tmp = "Meistgelesene Artikel in der Spezialkategorie";
            break;
        case "articles les plus lus":
            $tmp = "Meistgelesene Artikel";
            break;
        case "Articles plus anciens":
            $tmp = "Älteste Artikel";
            break;
        case "Articles présents dans les rubriques":
            $tmp = "Beiträge in Rubriken";
            break;
        case "Articles publiés : ":
            $tmp = "Beiträge publiziert : ";
            break;
        case "Articles publiés":
            $tmp = "Veröffentlichte Beiträge";
            break;
        case "Articles":
            $tmp = "Artikel";
            break;
        case "Assurez-vous de l'exactitude de votre information avant de la communiquer. N'écrivez pas en majuscules, votre texte serait automatiquement rejeté":
            $tmp = "Achten Sie darauf, das ihre Texteingabe gültig ist. Benutzen Sie nicht nur Grossbuchstaben und achten Sie auf die Grammatik !";
            break;
        case "ATTENTION : Etes-vous certain de vouloir effacer cette catégorie et tous ses Liens ?":
            $tmp = "WARNUNG : Wollen Sie wirklich die Kategorie und alle darin enthaltenen Links löschen? ?";
            break;
        case "Attention à votre expression écrite. Vous pouvez utiliser du code html si vous savez le faire":
            $tmp = "Bitte geben Sie Ihre Informationen ein";
            break;
        case "Aucun édito n'est disponible pour ce site":
            $tmp = "Keine Beschreibung für diese Seite verfügbar";
            break;
        case "Aucun membre trouvé pour":
            $tmp = "Kein Benutzer gefunden für";
            break;
        case "Aucun nom n'a été entré":
            $tmp = "Kein Name angegeben";
            break;
        case "Aucune catégorie":
            $tmp = "Keine Kategorie";
            break;
        case "Aucune correspondance à votre recherche n'a été trouvée":
            $tmp = "Keine Angaben zu Ihrer Anfrage";
            break;
        case "Aucune langue":
            $tmp = "Keine Sprache vorhanden";
            break;
        case "Aucune nouvelle contribution depuis votre dernière visite.":
            $tmp = "Es gibt keine neuen Einträge seit Ihrem letzten Besuch.";
            break;
        case "Aucune réponse pour les mots que vous cherchez. Elargissez votre recherche.":
            $tmp = "Nichts gefunden zur Anfrage. Erweitern Sie die Suche .";
            break;
        case "Auteur":
            $tmp = "Autor";
            break;
        case "Auteur":
            $tmp = "Autor";
            break;
        case "Auteurs actifs":
            $tmp = "Aktive Autoren";
            break;
        case "Auteurs de news les plus regardées":
            $tmp = "Aktivste Autoren";
            break;
        case "Auteurs les plus actifs":
            $tmp = "Aktivste Autoren";
            break;
        case "Autoriser la création automatique des membres ?":
            $tmp = "Automatisches Anlegen von neuen Benutzern erlauben ?";
            break;
        case "Autoriser la validation automatique des offres ?":
            $tmp = "Automatische Validierung der Angebote akzeptieren ?";
            break;
        case "Autoriser les autres utilisateurs à voir mon Email":
            $tmp = "Andere User können meine E-mail Adresse sehen";
            break;
        case "Autres publications de la sous-rubrique":
            $tmp = "Andere Beiträge in der Unterrubrik";
            break;
        case "Autres":
            $tmp = "Andere";
            break;
        case "Avatar : ":
            $tmp = "Avatar : ";
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
            $tmp = "Banner Statistik";
            break;
        case "Bannières actives pour":
            $tmp = "Aktive Banner für";
            break;
        case "Bannières terminées pour":
            $tmp = "Banner beendet für";
            break;
        case "Bannir cette @Ip":
            $tmp = "Diese @IP bannen";
            break;
        case "Bas de page":
            $tmp = "Unterseite";
            break;
        case "Bienvenue au dernier membre affilié : ":
            $tmp = "Grüsse an unseren neuen Benutzer : ";
            break;
        case "Bienvenue dans la rubrique des critiques":
            $tmp = "Willkommen in der Kritiken Rubrik";
            break;
        case "Bienvenue sur la page de garde de":
            $tmp = "Willkommen auf der Top Seite für";
            break;
        case "Bienvenue sur":
            $tmp = "Willkommen bei";
            break;
        case "Bloc Chat":
            $tmp = "Chat Box";
            break;
        case "Blog du groupe.":
            $tmp = "Gruppe blog.";
            break;
        case "Boîte d'émission":
            $tmp = "Senden Box";
            break;
        case "Boîte de réception":
            $tmp = "Eingangsbox";
            break;
        case "Bonjour":
            $tmp = "Hallo";
            break;
        case "Caché":
            $tmp = "Verborgen";
            break;
        case "caractères au minimum":
            $tmp = "Buchstaben minimal";
            break;
        case "caractères de plus":
            $tmp = "Mehr Bytes";
            break;
        case "caractères":
            $tmp = "Buchstaben";
            break;
        case "Carnet d'adresses":
            $tmp = "Lesezeichen";
            break;
        case "Catégorie : ":
            $tmp = "Kategorie : ";
            break;
        case "Catégorie : ":
            $tmp = "Kategorie : ";
            break;
        case "Catégorie :":
            $tmp = "Kategorie :";
            break;
        case "Catégorie":
            $tmp = "Kategorie";
            break;
        case "Catégories dans la rubrique des liens web":
            $tmp = "Kategorien in den Weblinks";
            break;
        case "Catégories les plus actives":
            $tmp = "Aktivste Kategorien";
            break;
        case "Catégories":
            $tmp = "Kategorien";
            break;
        case "Ce fichier n'existe pas ...":
            $tmp = "Keine Datei vorhanden ...";
            break;
        case "Ce nom n\'est pas disponible":
            $tmp = "Der Name ist nicht verfügbar";
            break;
        case "Ce sujet est verrouillé : il ne peut accueillir aucune nouvelle contribution.":
            $tmp = "Das Thema ist GESCHLOSSEN: Es gibt keine neuen Beiträge.";
            break;
        case "Ce surnom n\'est pas disponible":
            $tmp = "Dieser Spitzname ist nicht verfügbar";
            break;
        case "Ceci est un forum privé. Vous devez entrer le mot de passe pour y accéder":
            $tmp = "Das ist ein privates Forum. Bitte geben Sie ihr Passwort ein, um es zu sehen";
            break;
        case "Cela peut être retiré ou ajouté dans vos paramètres personnels":
            $tmp = "Das kann in Ihrem Profil geändert, oder hinzugefügt werden.";
            break;
        case "Cela pourrait vous intéresser":
            $tmp = "Das könnte Sie interessieren";
            break;
        case "Cela semble-t-il correct ?":
            $tmp = "Sieht das gut aus ?";
            break;
        case "Centres d'interêt":
            $tmp = "Ihre Interessen";
            break;
        case "Cet article provient de":
            $tmp = "Dieser Artikel kommt von";
            break;
        case "Cet utilisateur n'existe pas, refaites un essai.":
            $tmp = "Dieser Benutzer existiert nicht. Versuchen Sie es erneut";
            break;
        case "Cette bannière est affichée sur l'url":
            $tmp = "Dieser Banner ist verbunden mit der URL";
            break;
        case "Cette donnée ne doit pas être vide.":
            $tmp = "Leere Daten sind nicht erlaubt.";
            break;
        case "Cette option changera l'aspect du site.":
            $tmp = "Diese Option verändert das Aussehen der ganzen Webseite.";
            break;
        case "Change le statut à OK / Supprime la demande":
            $tmp = "Status auf OK ändern/ Anfrage löschen";
            break;
        case "Changer le thème":
            $tmp = "Theme änden";
            break;
        case "Changer":
            $tmp = "Ändern";
            break;
        case "Chaque utilisateur peut voir le site avec un thème graphique différent.":
            $tmp = "Jeder User kann sein Template für die Seite einstellen.";
            break;
        case "Chargement de fichiers":
            $tmp = "Download Bereich";
            break;
        case "Chargements":
            $tmp = "Downloads";
            break;
        case "Charger le fichier immédiatement !":
            $tmp = "Laden Sie die Datei jetzt herunter !";
            break;
        case "Charger maintenant":
            $tmp = "Jetzt herunterladen";
            break;
        case "Charger un fichier une fois l'envoi accepté":
            $tmp = "Datei hochladen, nachdem sie akzeptiert wurde";
            break;
        case "Chat du groupe.":
            $tmp = "Gruppen-Chat.";
            break;
        case "Chercher : ":
            $tmp = "Suche : ";
            break;
        case "Chercher n'importe quel terme (par défaut)":
            $tmp = "In allen Themen suchen (Default)";
            break;
        case "Chercher tous les mots":
            $tmp = "Suche nach allen Worten";
            break;
        case "Choisir entre 1 et 10 (1=nul 10=excellent)":
            $tmp = "Wählen Sie zwischen 1 et 10 (1=schlecht 10=sehr gut)";
            break;
        case "Choisir un dossier/sujet":
            $tmp = "Wählen Sie einen Ordner / Thema";
            break;
        case "Choisir un look différent pour le site (si plusieurs proposés)":
            $tmp = "Suchen Sie sich ein Template aus (falls mehrere vorhanden sind)";
            break;
        case "Choisir une charte graphique":
            $tmp = "Wählen Sie ein Thema Grafik";
            break;
        case "Choisir une langue":
            $tmp = "Wählen Sie eine Sprache";
            break;
        case "Citation":
            $tmp = "Zitat";
            break;
        case "Classé par ordre de : ":
            $tmp = "Sortiert nach : ";
            break;
        case "Classé par":
            $tmp = "Sortieren nach";
            break;
        case "Classement":
            $tmp = "Links sortieren nach";
            break;
        case "Classer ce message":
            $tmp = "Klassifizieren Sie diese Nachricht";
            break;
        case "Clics":
            $tmp = "Clics";
            break;
        case "Cliquez ici pour entrer":
            $tmp = "Klicken Sie hier, um das Chatfenster zu öffnen";
            break;
        case "Cliquez ici pour lire votre nouveau message.":
            $tmp = "Hier klicken, um die neue Nachricht zu lesen.";
            break;
        case "Cliquez ici pour revenir à l'index des Forums.":
            $tmp = "Klicken Sie hier, um zum Forumindex zurück zu kehren.";
            break;
        case "Cliquez ici pour voir la mise à jour":
            $tmp = "Klicken Sie hier, um das Update zu sehen";
            break;
        case "Cliquez ici pour voir le nouveau sujet.":
            $tmp = "Klicken Sie hier, um die Änderungen zu sehen.";
            break;
        case "Cliquez pour insérer des emoji dans votre message":
            $tmp = "Klicken Sie auf die emoji um Sie in Ihre Nachricht einzufügen";
            break;
        case "Cliquez pour voir la liste des articles de ce sujet":
            $tmp = "Klicken Sie, um alle BEiträge in diesem Thema zu sehen";
            break;
        case "Co-rédaction":
            $tmp = "kollaboratives Schreiben";
            break;
        case "Cochez et cliquez sur le bouton OK pour recevoir un Email lors d'une nouvelle soumission dans ce forum.":
            $tmp = "Cochez et cliquez sur le bouton OK pour recevoir un Email lors d'une nouvelle soumission dans ce forum.";
            break;
        case "Cochez un forum et cliquez sur le bouton pour recevoir un Email lors d'une nouvelle soumission dans celui-ci.":
            $tmp = "Wählen Sie ein Forum, klicken Sie dann auf den Button um eine E-mail zu erhalten, wenn es einen neuen Beitrag gibt.";
            break;
        case "Code d'erreur :":
            $tmp = "Error Code :";
            break;
        case "Code html autorisé : ":
            $tmp = "HTML erlaubt : ";
            break;
        case "Code postal":
            $tmp = "Postleitzahl";
            break;
        case "Code":
            $tmp = "Code";
            break;
        case "Coller l'ID de votre vidéo entre les deux balises":
            $tmp = "Fügen Sie die Video-ID zwischen die Tags ein";
            break;
        case "Commentaire à propos d'une critique :":
            $tmp = "Kommentar zu einer Kritik :";
            break;
        case "Commentaire":
            $tmp = "Kommentar";
            break;
        case "Commentaire":
            $tmp = "Kommentar";
            break;
        case "Commentaire(s) : ":
            $tmp = "Kommentar (e) : ";
            break;
        case "Commentaire(s)":
            $tmp = "Kommentar(e)";
            break;
        case "Commentaires ?":
            $tmp = "Kommentare ?";
            break;
        case "Commentaires postés : ":
            $tmp = "Gesendete Kommentare : ";
            break;
        case "Commentaires":
            $tmp = "Kommentare";
            break;
        case "Compte ou adresse IP désactivée. Cet émetteur a participé plus de x fois dans les dernières heures, merci de contacter le webmaster pour déblocage.":
            $tmp = "Account oder IP ist vorübergehend deaktiviert. Bitte benachtrichtigen Sie den Administratr.";
            break;
        case "Compteur":
            $tmp = "Zähler";
            break;
        case "Configurer":
            $tmp = "Konfigurieren";
            break;
        case "Confirmation du code pour":
            $tmp = "Konfirmation des Code für";
            break;
        case "Connexion autorisée":
            $tmp = "Connection erlaubt";
            break;
        case "Connexion non autorisée":
            $tmp = "Connection nicht erlaubt";
            break;
        case "Connexion":
            $tmp = "Verbindung";
            break;
        case "Conserver une copie":
            $tmp = "Eine Kopie speichern";
            break;
        case "Consulter l'adresse IP":
            $tmp = "IP Adresse ansehen";
            break;
        case "Contributeur(s)":
            $tmp = "Contributor(s)";
            break;
        case "Contributeurs":
            $tmp = "Mitarbeiter";
            break;
        case "Contribution de":
            $tmp = "Beitrag von";
            break;
        case "Contributions":
            $tmp = "Vorschau der Änderungen";
            break;
        case "Créer un compte":
            $tmp = "Einen Account anlegen";
            break;
        case "Créer":
            $tmp = "Hinzufügen";
            break;
        case "Critique":
            $tmp = "Kritik";
            break;
        case "Critique(s) trouvée(s).":
            $tmp = "Anzahl der gefundenen Kritiken.";
            break;
        case "Critiques les plus lues":
            $tmp = "Meistgelesene Kritiken";
            break;
        case "critiques les plus populaires":
            $tmp = "Populärste Kritiken";
            break;
        case "critiques les plus récentes":
            $tmp = "Meistgelesene Kritiken";
            break;
        case "Critiques pour la lettre":
            $tmp = "Kritiken unter dem Buchstaben";
            break;
        case "critiques":
            $tmp = "Kritiken";
            break;
        case "Critiques":
            $tmp = "Kritiken";
            break;
        case "Critiques":
            $tmp = "wartende Kritiken";
            break;
        case "Croissant":
            $tmp = "Aufsteigend";
            break;
        case "dans la sous-rubrique":
            $tmp = "in den Unterrubriken";
            break;
        case "dans":
            $tmp = "in";
            break;
        case "Date :":
            $tmp = "Datum :";
            break;
        case "Date (les liens les plus récents en premier)":
            $tmp = "Datum (neuste zuerst)";
            break;
        case "Date (les plus vieux liens en premier)":
            $tmp = "Datum (älteste zuerst)";
            break;
        case "Date de chargement sur le serveur":
            $tmp = "Datum des Uploads";
            break;
        case "Date de création":
            $tmp = "Erstellt am";
            break;
        case "Date de début":
            $tmp = "Startdatum";
            break;
        case "Date de fin de publication":
            $tmp = "Anzeige endet an diesem Datum";
            break;
        case "Date de fin":
            $tmp = "Enddatum";
            break;
        case "Date de publication":
            $tmp = "Start Datum des Beitrags";
            break;
        case "Date":
            $tmp = "Datum";
            break;
        case "de":
            $tmp = "bei";
            break;
        case "de":
            $tmp = "von";
            break;
        case "de":
            $tmp = "von";
            break;
        case "de":
            $tmp = "von";
            break;
        case "Début de l'article":
            $tmp = "Anfang des Artikels";
            break;
        case "Décembre":
            $tmp = "Dezember";
            break;
        case "Déconnexion":
            $tmp = "Abmelden";
            break;
        case "Décroissant":
            $tmp = "Absteigend";
            break;
        case "demandes en cours pour le même utilistaeur.":
            $tmp = "Anfrage für den selben Benutzer.";
            break;
        case "Déplacer ce sujet":
            $tmp = "Beitrag verschieben";
            break;
        case "Déplacer le sujet vers : ":
            $tmp = "Beitrag verschieben nach : ";
            break;
        case "Déplacer le sujet":
            $tmp = "Beitrag verschieben";
            break;
        case "Déplier la liste":
            $tmp = "Liste anzeigen";
            break;
        case "Dernier éditeur":
            $tmp = "zuletzt Editor";
            break;
        case "Dernière contribution":
            $tmp = "Letzte Beiträge";
            break;
        case "Dernières contributions":
            $tmp = "Letzte Beiträge";
            break;
        case "Dernières stats":
            $tmp = "Aktuelle Statistik";
            break;
        case "Derniers articles":
            $tmp = "Letzte Beiträge";
            break;
        case "Dès maintenant disponible dans la base de données des critiques.":
            $tmp = "Beitrag ist jetzt verfügbar in der Datenbank.";
            break;
        case "Désabonnement":
            $tmp = "Abmelden";
            break;
        case "Désactivé":
            $tmp = "Deaktiviert";
            break;
        case "Désactiver le html pour cet envoi":
            $tmp = "Deaktivieren Sie HTML für diesen Post";
            break;
        case "Description : ":
            $tmp = "Beschreibung : ";
            break;
        case "Description : (255 caractères max)":
            $tmp = "Beschreibung :  (max. 255 Buchstaben)";
            break;
        case "Description:":
            $tmp = "Beschreibung:";
            break;
        case "Description":
            $tmp = "Beschreibung";
            break;
        case "Désolé, aucune information correspondante pour cet utlilisateur n'a été trouvée":
            $tmp = "Entschuldigung, aber es wurden keine solchen Userdaten gefunden";
            break;
        case "Désolé, votre mot de passe doit faire au moins":
            $tmp = "Entschuldigung, aber Ihr Passwort muss mindestens";
            break;
        case "Destinataire":
            $tmp = "Empfänger";
            break;
        case "Détails supplémentaires":
            $tmp = "Weitere Details";
            break;
        case "Details":
            $tmp = "Details";
            break;
        case "Devenez membre et vous disposerez de fonctions spécifiques : abonnements, forums spéciaux (cachés, membres, ..), statut de lecture, ...":
            $tmp = "Begleiten Sie uns! Als registrierten Benutzer erhalten Sie Zugang zu : Forum, speziellen Foren (versteckt, Mitglieder, ..), Lesestatus, ...";
            break;
        case "Devenez membre privilégié en cliquant":
            $tmp = "Sie könnnen sich hier kostenlos anmelden";
            break;
        case "Dimanche":
            $tmp = "Sonntag";
            break;
        case "Disposer d'un bloc que vous seul verrez dans le menu (pour spécialistes, nécessite du code html)":
            $tmp = "Haben Sie hier eine persönliche Box";
            break;
        case "Document co-rédigé":
            $tmp = "Multi-Dokument Schriftsteller";
            break;
        case "Ecrire à la liste":
            $tmp = "In die Liste schreiben";
            break;
        case "Ecrire un nouveau message privé":
            $tmp = "Neue private Nachricht schreiben";
            break;
        case "Ecrire une critique pour":
            $tmp = "Schreiben Sie eine Kiritk für";
            break;
        case "Ecrire une critique":
            $tmp = "Schreiben Sie eine Kritik";
            break;
        case "écrit":
            $tmp = "schreibe";
            break;
        case "Editer votre journal":
            $tmp = "Editieren Sie ihr Journal";
            break;
        case "Editer votre journal":
            $tmp = "Editieren Sie ihr Journal";
            break;
        case "Editer votre page principale":
            $tmp = "Editieren Sie ihre Homepage";
            break;
        case "Editer":
            $tmp = "Editiere";
            break;
        case "Editeur":
            $tmp = "Editor";
            break;
        case "Edition de la soumission":
            $tmp = "Beitrag editieren";
            break;
        case "EDITO":
            $tmp = "EDITO";
            break;
        case "Editorial par":
            $tmp = "Editiert von";
            break;
        case "Effacer (Efface les liens cassés et les avis pour un lien donné)":
            $tmp = "Lösche (Lösche Defekte Links und die Beschreibungen die zum Link gehören)";
            break;
        case "Effacer ce sujet":
            $tmp = "Beitrag löschen";
            break;
        case "Effacer le sujet":
            $tmp = "Beitrag löschen";
            break;
        case "Effacer les commentaires.":
            $tmp = "Kommentare löschen.";
            break;
        case "Effacer":
            $tmp = "Löschen";
            break;
        case "Email : ":
            $tmp = "E-mail : ";
            break;
        case "Email du destinataire":
            $tmp = "E-mail des Freundes";
            break;
        case "Email non rempli pour : ":
            $tmp = "Es gibt keine E-mai Adresse dazu : ";
            break;
        case "Email non valide (ex.: prenom.nom@hotmail.com)":
            $tmp = "E-mail ungültig (Beispiel.: Vornamen.Name@hotmail.com)";
            break;
        case "Email":
            $tmp = "E-mail";
            break;
        case "Emetteur":
            $tmp = "Einträge";
            break;
        case "Emoticons":
            $tmp = "Emoticons";
            break;
        case "en attente de validation":
            $tmp = "wartet auf Freigabe";
            break;
        case "en cache":
            $tmp = "im Cache";
            break;
        case "En ce jour...":
            $tmp = "Ein Tag wie...";
            break;
        case "en créer un":
            $tmp = "einen anlegen";
            break;
        case "En savoir plus à propos de":
            $tmp = "Mehr über";
            break;
        case "En tant qu'utilisateur enregistré vous pouvez":
            $tmp = "Als registrierter User können Sie";
            break;
        case "Enregistrer":
            $tmp = "Speichern";
            break;
        case "Entrer votre pseudonyme et votre mot de passe.":
            $tmp = "Geben Sie bitte ihren Nicknamen und Ihr Passwort ein.";
            break;
        case "Entrez à nouveau votre mot de Passe":
            $tmp = "Passwort wiederholen";
            break;
        case "Envoi de l'article à un ami":
            $tmp = "Diesen Artikel an einen Freund senden";
            break;
        case "Envoi une demande aux administrateurs pour rejoindre ce groupe. Un message privé vous informera du résultat de votre demande.":
            $tmp = "Senden Sie eine Anfrage an Administratoren, dieser Gruppe beizutreten. Eine private Nachricht informiert Sie über das Ergebnis Ihrer Anfrage.";
            break;
        case "Envoyé à":
            $tmp = "Gesendet an";
            break;
        case "Envoyé par ":
            $tmp = "Eingesendet von ";
            break;
        case "Envoyé":
            $tmp = "Gesendet";
            break;
        case "envoyée par courrier.":
            $tmp = "gesendet per E-mail.";
            break;
        case "Envoyer cet article à un ami":
            $tmp = "Diesen Artikel an einen Freund senden";
            break;
        case "Envoyer un message interne":
            $tmp = "Eine interne Nachricht senden";
            break;
        case "Envoyer une demande":
            $tmp = "Schicken Sie eine Anfrage";
            break;
        case "Envoyer":
            $tmp = "Senden";
            break;
        case "Ephémérides":
            $tmp = "Almanach";
            break;
        case "Epuration de la new à la fin de sa date de validité":
            $tmp = "Das Start und Ende Datum automatisch löschen";
            break;
        case "Erreur : adresse Email déjà utilisée":
            $tmp = "Fehler : Die E-mail Adresse wird schon verwendet";
            break;
        case "Erreur : cet identifiant est déjà utilisé":
            $tmp = "Fehler : Der Nickname ist schon vergeben";
            break;
        case "Erreur : cette url est déjà présente dans la base de données":
            $tmp = "Fehler : Diese URL existiert schon in der Datenbank !";
            break;
        case "Erreur : DNS ou serveur de mail incorrect":
            $tmp = "Fehler: DNS oder falscher Mailserver";
            break;
        case "Erreur : Email invalide":
            $tmp = "Fehler : E-mail Adresse ist falsch";
            break;
        case "Erreur : identifiant invalide":
            $tmp = "Fehler : Nickname ist falsch";
            break;
        case "Erreur : la catégorie":
            $tmp = "Fehler : Die Kategorie";
            break;
        case "Erreur : la sous-catégorie":
            $tmp = "Fehler : Die Unterkategorie";
            break;
        case "Erreur : nom existant.":
            $tmp = "Fehler : Der Nickname ist reserviert.";
            break;
        case "Erreur : une adresse Email ne peut pas contenir d'espaces":
            $tmp = "Fehler : Eine E-mail Adresse enthält keine Leerstellen";
            break;
        case "Erreur : vous devez saisir un titre pour votre lien":
            $tmp = "Fehler : Geben Sie einen Titel für den Link ein !";
            break;
        case "Erreur : vous devez saisir une description pour votre lien":
            $tmp = "Fehler : Geben Sie eine BESCHREIBUNG für den Link ein !";
            break;
        case "Erreur : vous devez saisir une url pour votre lien":
            $tmp = "Fehler : Geben Sie die URL für den Link ein !";
            break;
        case "Erreur de connexion à la base de données":
            $tmp = "Error beim Versuch sich mit der Datenbank zu verbinden";
            break;
        case "Erreur du forum":
            $tmp = "Forum Error";
            break;
        case "Erreur lors de la récupération des messages depuis la base.":
            $tmp = "Fehler beim Aufrufen von Nachrichten aus der Datenbank.";
            break;
        case "Erreur":
            $tmp = "Fehler";
            break;
        case "est associé à votre Email.":
            $tmp = "ist mit dieser E-mail Adresse verbunden.";
            break;
        case "est connecté":
            $tmp = "angeschlossen ist !";
            break;
        case "Etat du topic":
            $tmp = "Themenstatus";
            break;
        case "Etes vous certain de vouloir effacer cette sous-catégorie ?":
            $tmp = "Sind Sie sicher, das Sie die Unterkategorie löschen wollen ?";
            break;
        case "Evaluation":
            $tmp = "Wertung";
            break;
        case "existe déjà":
            $tmp = "existiert bereits !";
            break;
        case "Expéditeur":
            $tmp = "Absender";
            break;
        case "Faites simple":
            $tmp = "Informativ, einfach und klar !";
            break;
        case "FAQ - Questions fréquentes":
            $tmp = "FAQ (Oft gestellte Fragen)";
            break;
        case "favori":
            $tmp = "Favorit";
            break;
        case "Fermé":
            $tmp = "Geschlossen";
            break;
        case "Fermer ce sujet":
            $tmp = "Beitrag schliessen";
            break;
        case "Fermer le sujet":
            $tmp = "Beitrag schliessen";
            break;
        case "Février":
            $tmp = "Februar";
            break;
        case "Fichiers les + récents":
            $tmp = "Neueste Downloads";
            break;
        case "Fichiers":
            $tmp = "Dateien";
            break;
        case "File manager du groupe.":
            $tmp = "Gruppe Dateimanager.";
            break;
        case "Fois":
            $tmp = "Mal";
            break;
        case "Fonctions":
            $tmp = "Funktionen";
            break;
        case "Forum du groupe.":
            $tmp = "Gruppe Forum.";
            break;
        case "forum":
            $tmp = "Forum";
            break;
        case "Forum":
            $tmp = "Forum";
            break;
        case "Forums infos":
            $tmp = "Foreninfos";
            break;
        case "Forums":
            $tmp = "Foren";
            break;
        case "Gérer d'autres options et applications":
            $tmp = "Andere tolle Sachen";
            break;
        case "Gérer votre miniSite":
            $tmp = "Managen Sie ihre Mini Seite";
            break;
        case "Gestion de vos abonnements":
            $tmp = "Verwalten Sie ihre Abbos";
            break;
        case "Gestion des groupes.":
            $tmp = "Gruppen-Einstellung.";
            break;
        case "Gestionnaire fichiers":
            $tmp = "Datei-Manager";
            break;
        case "Gras":
            $tmp = "Fetter";
            break;
        case "Groupe":
            $tmp = "Gruppe";
            break;
        case "Groupe ouvert":
            $tmp = "Offene Gruppe";
            break;
        case "Groupes":
            $tmp = "Gruppen";
            break;
        case "Hasard":
            $tmp = "Zufall";
            break;
        case "Haut de page":
            $tmp = "Nach oben";
            break;
        case "Heure de la soumission":
            $tmp = "Gemeldet von ";
            break;
        case "Heure":
            $tmp = "Stunde";
            break;
        case "Heure(s)":
            $tmp = "Stunden";
            break;
        case "Hits : ":
            $tmp = "Klicks : ";
            break;
        case "Hits":
            $tmp = "Anzahl der Klicks";
            break;
        case "Home":
            $tmp = "Home";
            break;
        case "ici":
            $tmp = "hier";
            break;
        case "Icone du message":
            $tmp = "Icon für die Nachricht";
            break;
        case "Icone":
            $tmp = "Icon";
            break;
        case "ID de la critique":
            $tmp = "ID der Kritik";
            break;
        case "ID utilisateur (pseudo)":
            $tmp = "User ID ";
            break;
        case "Identifiant : ":
            $tmp = "Nickname : ";
            break;
        case "Identifiant ":
            $tmp = "Login ";
            break;
        case "Identifiant incorrect !":
            $tmp = "Login Fehler !";
            break;
        case "Identifiant utilisateur":
            $tmp = "Benutzer Login";
            break;
        case "identifiant":
            $tmp = "Nickname";
            break;
        case "Identifiant":
            $tmp = "Nickname";
            break;
        case "Identité":
            $tmp = "Identität";
            break;
        case "Ignorer (Efface toutes les demandes pour un lien donné)":
            $tmp = "Ignoriere (Lösche alle Anfragen für einen gemeldeten Link)";
            break;
        case "Ignorer":
            $tmp = "Ignoriere";
            break;
        case "Il n'y a aucun sujet pour ce forum. ":
            $tmp = "Es gibt keine Einträge in diesem Forum. ";
            break;
        case "Il n'y a aucune critique pour La lettre":
            $tmp = "Es gibt keine Kritik unter diesem Buchstaben";
            break;
        case "Il n'y a pas d'informations disponibles pour":
            $tmp = "Es gibt keine Informationen zu";
            break;
        case "Il n'y a pas encore d'article du jour.":
            $tmp = "Es gibt keine Tagesgeschichte.";
            break;
        case "Il ne peut pas y avoir d'espace dans le surnom.":
            $tmp = "Der Nickname darf keine Leerstellen enthalten.";
            break;
        case "Il y a actuellement":
            $tmp = "Es gibt momentan";
            break;
        case "Il y a actuellement":
            $tmp = "Wir haben";
            break;
        case "Il y a":
            $tmp = "Es gibt";
            break;
        case "Illimité":
            $tmp = "Unbegrenzt";
            break;
        case "Image de garde":
            $tmp = "Bild : ";
            break;
        case "immédiatement":
            $tmp = "sofort";
            break;
        case "Imp. restantes":
            $tmp = "Imp. Links";
            break;
        case "Impossible d'interroger la base.":
            $tmp = "Kann die Datenbankabfrage nicht machen.";
            break;
        case "Impossible de déplacer le topic dans le Forum, refaites un essai.":
            $tmp = "Kann den Beitrag nicht in das gewünschte Forum verschieben..Bitte versuchen Sie es erneut";
            break;
        case "Impossible de déverrouiller le topic, refaites un essai.":
            $tmp = "Kann den Beitrag nicht freigeben. Bitte versuchen Sie es erneut.";
            break;
        case "Impossible de verrouiller le topic, refaites un essai.":
            $tmp = "Kann den Beitrag nicht schliessen. Bitte versuchen Sie es erneut.";
            break;
        case "Impressions":
            $tmp = "Impressionen";
            break;
        case "Imprimer":
            $tmp = "Drucker freundliche Seite";
            break;
        case "Inconnu":
            $tmp = "Unbekannt";
            break;
        case "Index des rubriques":
            $tmp = "Liste der Rubriken";
            break;
        case "Index du forum":
            $tmp = "Foren Index";
            break;
        case "Index":
            $tmp = "Index";
            break;
        case "Information sur le fichier":
            $tmp = "Datei Informationen";
            break;
        case "Information":
            $tmp = "Information";
            break;
        case "Informations supplémentaires":
            $tmp = "Mehr Informationen";
            break;
        case "Informations sur l'utilisateur :":
            $tmp = "Anbei die Benutzerinformationen :";
            break;
        case "Informations sur le compte":
            $tmp = "Benutzerinformationen";
            break;
        case "Inscription":
            $tmp = "Registrierung";
            break;
        case "intéressant et a voulu vous le faire connaître.":
            $tmp = "interessant und wollte sie an Sie senden.";
            break;
        case "Interface":
            $tmp = "Ansicht";
            break;
        case "Interne":
            $tmp = "Intern";
            break;
        case "Isoloir du vote en cours":
            $tmp = "Aktuelle Abstimmungsergebnisse";
            break;
        case "Isoloir":
            $tmp = "Abstimmen";
            break;
        case "Italique":
            $tmp = "Kursiv";
            break;
        case "Janvier":
            $tmp = "Januar";
            break;
        case "Jeudi":
            $tmp = "Donnerstag";
            break;
        case "Jour":
            $tmp = "Tag";
            break;
        case "Jour(s)":
            $tmp = "Tag(e)";
            break;
        case "Journal en ligne de ":
            $tmp = "Online Journal für ";
            break;
        case "Journal":
            $tmp = "Journal";
            break;
        case "jours":
            $tmp = "Tage";
            break;
        case "Juillet":
            $tmp = "Juli";
            break;
        case "Juin":
            $tmp = "Juni";
            break;
        case "L'accès à cette application est réservé aux utilisateurs Avancés. Merci de vous enregistrer.":
            $tmp = "Der Zugang zu dieser Anwendung ist nur registrierten Benutzern erlaubt. Bitte registrieren Sie sich.";
            break;
        case "L'article le plus consulté aujourd'hui est :":
            $tmp = "Der heute meist gelesene Artikel ist :";
            break;
        case "L'article le plus lu à propos de":
            $tmp = "Meistgelesener Beitrag über";
            break;
        case "L'article":
            $tmp = "Der Beitrag";
            break;
        case "L'url pour cet article est : ":
            $tmp = "Die URL für diesen Artikel ist : ";
            break;
        case "La fonction mise à jour du mot de passe ne peut mettre à jour la base de données. Contactez le WebMaster.":
            $tmp = "Die Funktion Mail_Password konnte nicht gespeichert werden. Bitte kontaktieren Sie den Webmaster.";
            break;
        case "La lettre":
            $tmp = "Newsletter";
            break;
        case "la page":
            $tmp = "Die Seite";
            break;
        case "La seule règle est de ne pas sortir du sujet.":
            $tmp = "Die einzige Regel hir lautet: Bleiben Sie beim Thema der Diskussion und werden Sie nicht beleidigend.";
            break;
        case "La structure de chaque ligne de ce fichier : nom_du_membre; adresse Email; commentaires":
            $tmp = "Die Datenstruktur der Zielen : Name des Users;E-mail Adresse;Kommentare";
            break;
        case "Le compte utilisateur":
            $tmp = "Der Benutzeraccount";
            break;
        case "Le critique":
            $tmp = "Kritiker : ";
            break;
        case "Le forum dans lequel vous tentez de publier n'existe pas, merci de recommencez":
            $tmp = "Das Forum in das Sie schreiben wollen existiert nicht. Bitte versuchen Sie es erneut.";
            break;
        case "Le forum ou le topic que vous tentez de publier n'existe pas, refaites un essai.":
            $tmp = "Das Forum oder der Beitrag in das, oder auf den Sie schreiben bzw. antworten wollen existiert nicht. ";
            break;
        case "Le forum sélectionné n'existe pas.":
            $tmp = "Das gewünschte Forum existiert nicht. Bitte gehen Sie zurück und versuchen Sie es nochmal";
            break;
        case "Le message sélectionné n'existe pas dans la base forum.":
            $tmp = "Die gwählte Nachricht existiert nicht im Forum.";
            break;
        case "Le mot de passe doit contenir au moins un caractère en majuscule.":
            $tmp = "Das Kennwort muss mindestens ein Großbuchstaben-Zeichen enthalten.";
            break;
        case "Le mot de passe doit contenir au moins un caractère en minuscule.":
            $tmp = "Das Kennwort muss mindestens ein Kleinzeichen enthalten.";
            break;
        case "Le mot de passe doit contenir au moins un caractère non alphanumérique.":
            $tmp = "Das Kennwort muss mindestens ein nicht alphanumerisches Zeichen enthalten.";
            break;
        case "Le mot de passe doit contenir au moins un chiffre.":
            $tmp = "Das Passwort muss mindestens eine Zahl enthalten.";
            break;
        case "Le mot de passe doit contenir":
            $tmp = "Das Passwort muss enthalten sein";
            break;
        case "Le mot de passe vous sera envoyé à l'adresse Email indiquée.":
            $tmp = "Das Passort wird an die angegebene E-mail Adresse gesendet.";
            break;
        case "Le moteur de recherche ne trouve pas la base forum.":
            $tmp = "Die Suche in der Forum Datenbank ist nicht möglich.";
            break;
        case "Le nombre de hits doit être un entier positif":
            $tmp = "Die Zahl sollte eine ganze, positive Zahl sein";
            break;
        case "Le séparateur de groupe est la, (12,55,...)":
            $tmp = "Gruppenseparator ist , (12,55,...)";
            break;
        case "Le sujet a été déplacé.":
            $tmp = "Der Beitrag wurde verschoben.";
            break;
        case "le":
            $tmp = "in";
            break;
        case "Lectures":
            $tmp = "Angesehen";
            break;
        case "Les commentaires sont la propriété de leurs auteurs. Nous ne sommes pas responsables de leur contenu.":
            $tmp = "Für die Kommentare sind die Einsender verantwortlich. Der oder die Seitenbetreiben sind nicht verantwortlich für die Inhalte.";
            break;
        case "Les dernières contributions de":
            $tmp = "Die letzten Einsendungen von";
            break;
        case "Les dernières nouvelles à propos de":
            $tmp = "Letzte Neuigkeiten zu";
            break;
        case "Les derniers articles de":
            $tmp = "Last articles sent by";
            break;
        case "Les derniers commentaires de":
            $tmp = "Die letzten Kommentare von";
            break;
        case "Les deux mots de passe ne sont pas identiques.":
            $tmp = "Die beiden Passwörter sind nicht identisch.";
            break;
        case "les Liens":
            $tmp = "les Liens";
            break;
        case "Les modifications seront seulement valides pour vous.":
            $tmp = "Diese Änderung ist nur für Sie persönlich.";
            break;
        case "Les mots de passe sont différents. Ils doivent être identiques.":
            $tmp = "Die Passwörter sind unterschiedlich.Beide Passwörter müssen identisch sein.";
            break;
        case "Les nouveaux Liens ajoutés dans cette catégorie cette semaine":
            $tmp = "Links";
            break;
        case "Les nouveaux liens ajoutés dans cette catégorie dans les 3 derniers jours":
            $tmp = "Links die in den letzten 3 Tagen in dieser Kategorie hizu gekommen sind";
            break;
        case "Les nouveaux liens de cette catégorie ajoutés aujourd'hui":
            $tmp = "Links die Heute in dieser Kategorie hinzu gekommen sind";
            break;
        case "Les nouvelles contributions depuis votre dernière visite.":
            $tmp = "Neue Einträge seit Ihrem letzten Besuch.";
            break;
        case "Les plus téléchargés":
            $tmp = "Am meisten heruntergeladen";
            break;
        case "Les préférences de compte fonctionnent sur la base des cookies.":
            $tmp = "Für diese Funktion müssen Cookies erlaubt sein.";
            break;
        case "Les spécialistes peuvent utiliser du HTML, mais attention aux erreurs":
            $tmp = "HTML ist ok, aber kontrollieren Sie bitte die URLs und die HTML Tags nochmal !";
            break;
        case "Les statistiques pour la bannières ID":
            $tmp = "Statistik für Banner ID";
            break;
        case "Les utilisateurs anonymes peuvent poster de nouveaux sujets et des réponses dans ce forum.":
            $tmp = "Anonyme User können neue Themen und Antworten in diesem Forum posten.";
            break;
        case "Libre":
            $tmp = "Frei";
            break;
        case "Lien n° : ":
            $tmp = "Link ID∞ : ";
            break;
        case "Lien relatif":
            $tmp = "Relativer Link";
            break;
        case "Lien web":
            $tmp = "Weblink";
            break;
        case "Lien":
            $tmp = "Link : ";
            break;
        case "Lien(s) en attente de validation":
            $tmp = "Link wartet auf Freigabe";
            break;
        case "Liens cassés rapportés par un ou plusieurs utilisateurs":
            $tmp = "Defekte Links, die von einem oder mehreren Usern gemeldet wurden";
            break;
        case "Liens présents dans la rubrique des liens web":
            $tmp = "Links in Weblinks";
            break;
        case "Liens relatifs : ":
            $tmp = "Relativer Link : ";
            break;
        case "Liens relatifs":
            $tmp = "Relativer Link";
            break;
        case "Liens Web":
            $tmp = "Web Links";
            break;
        case "Liens":
            $tmp = "Links";
            break;
        case "Limite des référants : pensez à archiver vos référants via l'administration du site.":
            $tmp = "Anzahl der Referer begrenzen : Speichern Sie die Referer via Adminfunktion.";
            break;
        case "Lire la suite...":
            $tmp = "Weiter lesen...";
            break;
        case "Liste de diffusion":
            $tmp = "Mailing list";
            break;
        case "Liste des membres du groupe.":
            $tmp = "Mitglieder der Gruppe aus.";
            break;
        case "Liste des membres":
            $tmp = "Liste der registrierten Benutzer";
            break;
        case "Liste non ordonnnée":
            $tmp = "Geordnete Liste";
            break;
        case "Liste ordonnnée":
            $tmp = "Ungeordnete Liste";
            break;
        case "Liste":
            $tmp = "Liste";
            break;
        case "Localisation":
            $tmp = "Lokalisierung";
            break;
        case "lu : ":
            $tmp = "gelesen : ";
            break;
        case "Lu":
            $tmp = "Lesen";
            break;
        case "Lundi":
            $tmp = "Montag";
            break;
        case "lus":
            $tmp = "gelesen";
            break;
        case "M'envoyer un Email lorsqu'un message interne arrive":
            $tmp = "Schicken Sie mir eine E-mail, wenn ich eine interne Mittelung erhalte";
            break;
        case "M2M bloc":
            $tmp = "M2M Block";
            break;
        case "Ma note : ":
            $tmp = "Meine Note : ";
            break;
        case "Ma page perso : ":
            $tmp = "Meine Homepage : ";
            break;
        case "Mai":
            $tmp = "Mai";
            break;
        case "Mais ne titrez pas -un article-, ou -à lire-,...":
            $tmp = "Schlechter Titel -ein Beitrag-, oder -zu lesen-,...";
            break;
        case "Manuel en ligne":
            $tmp = "Online Hilfe";
            break;
        case "Mardi":
            $tmp = "Dienstag";
            break;
        case "Marquer tous les messages comme lus":
            $tmp = "Alles als gelesen markieren";
            break;
        case "Mars":
            $tmp = "März";
            break;
        case "Masquer ce commentaire":
            $tmp = "Verbergen Sie diesen Kommentar";
            break;
        case "Masquer ce post":
            $tmp = "Diesen Beitrag ausblenden";
            break;
        case "Mèl":
            $tmp = "E-mail : ";
            break;
        case "Membre invisible":
            $tmp = "Benutzer unsichtbar";
            break;
        case "membre(s) en ligne.":
            $tmp = "User online.";
            break;
        case "membres enregistrés.":
            $tmp = "Registierte Benutzer.";
            break;
        case "Membres":
            $tmp = "Mitglieder";
            break;
        case "Menu de":
            $tmp = "Menü für";
            break;
        case "Merci d'avoir consacré du temps pour vous enregistrer.":
            $tmp = "Danke, das Sie sich registriert haben.";
            break;
        case "Merci d'avoir modifié cette critique":
            $tmp = "Vielen Dank für die Bearbeitung dieser Bewertung";
            break;
        case "Merci d'avoir posté cette critique":
            $tmp = "Danke für Ihre Einsendung";
            break;
        case "Merci d'entrer l'information en fonction des spécifications":
            $tmp = "Bitte geben Sie die nötigen Informationen ein";
            break;
        case "Merci de contribuer à la maintenance du site.":
            $tmp = "Danke das Sie uns helfen, die Seite aktuell zu halten.";
            break;
        case "Merci de ne pas abuser, le nom d'utilisateur et l'adresse IP sont enregistrés.":
            $tmp = "Benutzername und IP werden registriert, also spamen Sie hier nicht das System voll.";
            break;
        case "Merci de nous avoir recommandé":
            $tmp = "Danke, das Sie uns weiterempfehlen !";
            break;
        case "Merci de saisir vos informations":
            $tmp = "Bitte";
            break;
        case "Merci de":
            $tmp = "Beliebt";
            break;
        case "Merci pour cette information. Nous allons l'examiner dès que possible.":
            $tmp = "Danke für die Anfrage, wir werden sie uns in Kürze ansehen.";
            break;
        case "Merci pour votre contribution.":
            $tmp = "Danke für Ihre Einsendung.";
            break;
        case "Merci pour votre contribution":
            $tmp = "Danke für Ihre Einsendung !";
            break;
        case "Merci":
            $tmp = "Danke !";
            break;
        case "Mercredi":
            $tmp = "Mittwoch";
            break;
        case "Message à un membre":
            $tmp = "Nachricht an einen Benutzer";
            break;
        case "Message édité par":
            $tmp = "Dieser Beitrag wurde editiert von";
            break;
        case "Message interne":
            $tmp = "Interne Nachricht";
            break;
        case "Message personnel":
            $tmp = "private Nachrichten.";
            break;
        case "Message précédent":
            $tmp = "vorherige Seite";
            break;
        case "Message suivant":
            $tmp = "Vorherige Nachricht";
            break;
        case "Message vide interdit, refaites un essai.":
            $tmp = "Geben Sie einen Text ein. Sie können keinen leeren Beitrag posten. Gehen Sie zurück und geben Sie einen Text ein.";
            break;
        case "Message":
            $tmp = "Nachricht";
            break;
        case "message(s) personnel(s).":
            $tmp = "Private Nachrichten";
            break;
        case "Messages personnels":
            $tmp = "Privat";
            break;
        case "Mettre ce sujet en premier":
            $tmp = "Diesen Beitrag als ersten setzten";
            break;
        case "MiniSite":
            $tmp = "Mini Seite";
            break;
        case "Minute(s)":
            $tmp = "Minuten";
            break;
        case "Mise à jour de la base impossible, refaites un essai.":
            $tmp = "Kann den Beitrag nicht speichern. Bitte versuchen Sie es erneut";
            break;
        case "Mise à jour du compteur des envois impossible.":
            $tmp = "Aktualisierung des Beitragzählers nicht möglich.]";
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
            $tmp = "Moderiert von : ";
            break;
        case "Modification d'une critique":
            $tmp = "Kritik ändern";
            break;
        case "modification":
            $tmp = "Änderung";
            break;
        case "modifié":
            $tmp = "geändert";
            break;
        case "Modifier l'édito":
            $tmp = "Beschreibung ändern";
            break;
        case "Modifier la catégorie":
            $tmp = "Kategorie ändern";
            break;
        case "Modifier les liens":
            $tmp = "Link ändern";
            break;
        case "Modifier":
            $tmp = "Ändern";
            break;
        case "mois":
            $tmp = "Monat";
            break;
        case "Mois":
            $tmp = "Monat";
            break;
        case "mois":
            $tmp = "Monate";
            break;
        case "Mon E-Mail : ":
            $tmp = "Meine E-Mail : ";
            break;
        case "Monnaie":
            $tmp = "Geld";
            break;
        case "Montrer :":
            $tmp = "Zeigen :";
            break;
        case "Mot de passe : ":
            $tmp = "Passwort : ";
            break;
        case "Mot de passe erroné, refaites un essai.":
            $tmp = "Sie haben nicht das richtige Passwort eingegeben.Gehen Sie zurück und versuchen Sie es erneut";
            break;
        case "Mot de passe mis à jour. Merci de vous re-connecter":
            $tmp = "Passwort Update. Bitte melden Sie sich neu an";
            break;
        case "Mot de passe pour":
            $tmp = "Passwort für";
            break;
        case "Mot de passe utilisateur pour":
            $tmp = "Benutzerpasswort für";
            break;
        case "Mot de passe":
            $tmp = "Passwort";
            break;
        case "Mot-clé":
            $tmp = "Schlüsselwort";
            break;
        case "Moteurs de recherche":
            $tmp = "Suchmaschinen";
            break;
        case "mots dans ce texte )":
            $tmp = " Anzahl der Worte im Text )";
            break;
        case "n'est pas connecté":
            $tmp = "ist nicht angeschlossen !";
            break;
        case "Navigateurs web":
            $tmp = "Webbrowser";
            break;
        case "Nb abonnés à lettre infos":
            $tmp = "Anzahl der Besucher LNL";
            break;
        case "Nb hits : ":
            $tmp = "Klicks : ";
            break;
        case "Nb. d'articles":
            $tmp = "Anzahl der Beiträge";
            break;
        case "Nb. de critiques":
            $tmp = "Anzahl der Kritiken";
            break;
        case "Nb. de forums":
            $tmp = "Anzahl der Foren";
            break;
        case "Nb. de membres":
            $tmp = "Anzahl der Mitglieder";
            break;
        case "Nb. de sujets":
            $tmp = "Anzahl der Themen";
            break;
        case "Nb. pages vues":
            $tmp = "Anzahl der Seiten";
            break;
        case "ne peuvent pas être envoyées.":
            $tmp = "kann nicht gesendet werden weil.";
            break;
        case "Nom : ":
            $tmp = "Name : ";
            break;
        case "Nom :":
            $tmp = "Name :";
            break;
        case "Nom d'auteur":
            $tmp = "Name des Autors";
            break;
        case "Nom de fichier de l'image":
            $tmp = "Dateiname des Bilds";
            break;
        case "Nom de l'image principale non obligatoire, la mettre dans images/reviews/":
            $tmp = "Name des Bilds, abgespeichert unter images/reviews/. Nicht unbedingt erforderlich.";
            break;
        case "Nom de la catégorie : ":
            $tmp = "Name der Kategorie : ";
            break;
        case "Nom de la sous-catégorie : ":
            $tmp = "Name der Unterkategorie : ";
            break;
        case "Nom du destinataire":
            $tmp = "Name des Freundes";
            break;
        case "Nom du produit critiqué.":
            $tmp = "Produktname für die Kritik.";
            break;
        case "Nom du programme":
            $tmp = "Vorgeschlagen";
            break;
        case "Nom ou raison sociale":
            $tmp = "Firmenname";
            break;
        case "Nom":
            $tmp = "Name";
            break;
        case "Nombre d'articles sur la page principale":
            $tmp = "Anzahl der Artikel auf der Homepage";
            break;
        case "Nombre d'utilisateurs par thème":
            $tmp = "Nummer der Benutzer pro Thema";
            break;
        case "Nombre de jours maximum pour une offre":
            $tmp = "Maximale Dauer des Angebots in Tagen";
            break;
        case "Nombre total de votes: ":
            $tmp = "Stimmen total: ";
            break;
        case "Non lu":
            $tmp = "Nicht gelesen";
            break;
        case "Non":
            $tmp = "Nein";
            break;
        case "Nos références ont été envoyées à ":
            $tmp = "Der Verweis auf unsere Seite wurde gesendet, um ";
            break;
        case "Nos visiteurs ont visualisé":
            $tmp = "Unsere Besucher haben sich angesehen";
            break;
        case "Note :":
            $tmp = "Zu beachten :";
            break;
        case "Note de ce produit : ":
            $tmp = "Produkt bewerten : ";
            break;
        case "Note non valide... Elle doit se situer entre 1 et 10":
            $tmp = "Eintrag nicht gültig... geben Sie eine Zahl zwischen 1 und 10 ein";
            break;
        case "Note":
            $tmp = "Notiz";
            break;
        case "Note":
            $tmp = "Zu beachten : ";
            break;
        case "Notes":
            $tmp = "Notiz";
            break;
        case "Nous allons vérifier votre contribution. Elle devrait bientôt être disponible !":
            $tmp = "Das Team wird sich Ihre Einsendung ansehen. Sie erscheint in Kürze !";
            break;
        case "Nous avons approuvé votre contribution à notre moteur de recherche.":
            $tmp = "Ihr Link wurde in die Suchfunktion aufgenommen.";
            break;
        case "Nous avons bien reçu votre demande de lien, merci":
            $tmp = "Wir haben Ihren Link erhalten. Danke !";
            break;
        case "Nous ne vendons ni ne communiquons vos informations personnelles à autrui.":
            $tmp = "Ihre Daten werden weder verkauft, noch anderweitig weiter gegeben.";
            break;
        case "Nouveau commentaire":
            $tmp = "Neue Kommentar";
            break;
        case "Nouveau dossier/sujet":
            $tmp = "Neue Ordner/Thema";
            break;
        case "Nouveau lien ajouté dans la base de données":
            $tmp = "Der neue Link wurde in der Datenbank gespeichert";
            break;
        case "Nouveau membre":
            $tmp = "Neuer User";
            break;
        case "Nouveau sujet":
            $tmp = "Neues Thema";
            break;
        case "Nouveau":
            $tmp = "Neu";
            break;
        case "Nouveautés":
            $tmp = "Neue Links";
            break;
        case "Nouveaux liens":
            $tmp = "Neuer Link";
            break;
        case "Nouvel utilisateur : ":
            $tmp = "Neuer User : ";
            break;
        case "Novembre":
            $tmp = "November";
            break;
        case "O=Non - 1=Oui":
            $tmp = "O=Nein - 1=Ja";
            break;
        case "Objet":
            $tmp = "Profil";
            break;
        case "Obligatoire seulement si vous soumettez un lien relatif":
            $tmp = "Erforderlich, wenn Sie einen relativen Link eingeben";
            break;
        case "Octobre":
            $tmp = "Oktober";
            break;
        case "Offre":
            $tmp = "Angebot";
            break;
        case "Offres par page":
            $tmp = "Angebote pro Seite";
            break;
        case "Ok":
            $tmp = "Ok";
            break;
        case "ont été envoyées.":
            $tmp = "ist gesendet an.";
            break;
        case "Option : ":
            $tmp = "Option : ";
            break;
        case "Options":
            $tmp = "Optionen";
            break;
        case "Ordre croissant":
            $tmp = "aufsteigend sortiert";
            break;
        case "Ordre décroissant":
            $tmp = "absteigent sortiert";
            break;
        case "Original":
            $tmp = "Original";
            break;
        case "ou poster des commentaires signés...":
            $tmp = "oder einen Kommentar unter Ihrem Namen abgeben";
            break;
        case "ou":
            $tmp = "oder";
            break;
        case "Oui":
            $tmp = "Ja";
            break;
        case "Outils administrateur":
            $tmp = "Administrations Werkzeuge";
            break;
        case "Ouvrir ce sujet":
            $tmp = "Beitrag freigeben";
            break;
        case "Ouvrir le sujet":
            $tmp = "Beitrag freigeben";
            break;
        case "Ouvrir un salon de chat pour le groupe.":
            $tmp = "Öffnen Sie ein Chat für die groupe.";
            break;
        case "P. annonces":
            $tmp = "Wartende Kleinanzeigen";
            break;
        case "Page d'accueil":
            $tmp = "Startseite";
            break;
        case "Page précédente":
            $tmp = "Vorherige";
            break;
        case "Page spéciale pour impression":
            $tmp = "Private Nachricht";
            break;
        case "Page suivante":
            $tmp = "nächste Seite";
            break;
        case "Page":
            $tmp = "Seite";
            break;
        case "pages depuis le":
            $tmp = "Klicks seit dem";
            break;
        case "Pages vues depuis":
            $tmp = "Seiten angezeigt seit";
            break;
        case "pages":
            $tmp = "Seiten";
            break;
        case "par défaut":
            $tmp = "Standard";
            break;
        case "par":
            $tmp = "per";
            break;
        case "pas affiché dans l'annuaire, message à un membre, ...":
            $tmp = "Nicht anzeigen in der Benutzerliste, Benutzer Mitteilungen, ...";
            break;
        case "Pas de connexion à la base forums.":
            $tmp = "Keine Verbindung zur Forendatenbank.";
            break;
        case "Pas de connexion à la base topics.":
            $tmp = "Keine Verbindung zur Datenbank.";
            break;
        case "Pas de groupe ouvert.":
            $tmp = "Keine offene Gruppe.";
            break;
        case "Pas de problème. Saisissez votre identifiant et le nouveau mot de passe que vous souhaitez utiliser puis cliquez sur envoyer pour recevoir un Email de confirmation.":
            $tmp = "Kein Problem. Schreiben Sie ihren Nicknamen und das neue Passwort das Sie wiollen und klicken Sie auf den Senden Button, damit Sie eine E-mail mit den neuen Daten erhalten.";
            break;
        case "Passer / Gérer une annonce":
            $tmp = "Senden Sie / Managen Sie einen BEitrag";
            break;
        case "Pays":
            $tmp = "Land";
            break;
        case "Période":
            $tmp = "Dauer";
            break;
        case "Personnaliser les commentaires":
            $tmp = "Personalisieren Sie die Kommentare";
            break;
        case "personne connectée.":
            $tmp = "Person verbunden.";
            break;
        case "personnes connectées.":
            $tmp = "Personen verbunden.";
            break;
        case "Plan du site":
            $tmp = "Plan der Seite";
            break;
        case "Plus d'émoticons":
            $tmp = "Mehr Smilies";
            break;
        case "Plus de forum":
            $tmp = "Keine anderen Foren";
            break;
        case "Plus de":
            $tmp = "Mehr als";
            break;
        case "Populaire":
            $tmp = "Kommentare abgeben mit Ihrem Namen";
            break;
        case "Post affiché":
            $tmp = "Normaler Beitrag";
            break;
        case "Post caché":
            $tmp = "Verborgener Beitrag";
            break;
        case "Posté : ":
            $tmp = "Eingesendet";
            break;
        case "Posté le ":
            $tmp = "Gepostet in";
            break;
        case "Posté le":
            $tmp = "Gesendet : ";
            break;
        case "Posté par ":
            $tmp = "Gepostet von";
            break;
        case "Posté par":
            $tmp = "Gepostet in ";
            break;
        case "Posté":
            $tmp = "Autor";
            break;
        case "Poster des commentaires signés":
            $tmp = "Erstellen Sie einen neuen Beitrag unter:";
            break;
        case "Poster un nouveau sujet dans :":
            $tmp = "Antwort zu diesem Beitrag senden";
            break;
        case "Poster une réponse dans le sujet":
            $tmp = "Zeit der Einsendung";
            break;
        case "Pour des raisons de sécurité, votre nom d'utilisateur et votre adresse IP vont être momentanément conservés.":
            $tmp = "Aus Sicherheitsgründen wird Ihr Username und Ihre IP Adresse für einige Zeit gespeichert.";
            break;
        case "pour enregistrer un compte sur":
            $tmp = "pour enregistrer un compte sur";
            break; ///
        case "pour le groupe":
            $tmp = "für die Gruppe";
            break;
        case "Pour les 30 derniers jours":
            $tmp = "In den letzten 30 Tagen";
            break;
        case "Pour supprimer votre abonnement à notre lettre, merci d'utiliser":
            $tmp = "Um sich abzumelden, gehen Sie zu";
            break;
        case "Pour utiliser cette application, vous devez être":
            $tmp = "Um diese Anwendung zu nutzen müssen Sie";
            break;
        case "Pour valider votre nouveau mot de passe, merci de le re-saisir.":
            $tmp = "Wiederholen Sie ihr neues Passwort.";
            break;
        case "Pourcentage":
            $tmp = "Prozente";
            break;
        case "Précédent":
            $tmp = "Preis";
            break;
        case "Préférés":
            $tmp = "Top bewertet";
            break;
        case "Prévenir par Email quand de nouvelles réponses sont postées":
            $tmp = "Benachrichtigen Sie mich per E-mail, wenn neue Antworten eingehen";
            break;
        case "Prévisualiser les modifications":
            $tmp = "Vorschau";
            break;
        case "Prévisualiser":
            $tmp = "vorherige Antworten";
            break;
        case "Principal":
            $tmp = "Startseite";
            break;
        case "Privé":
            $tmp = "Offizielle Webseite des Produkts. Vergewissern Sie sich, dass die URL mit beginnt";
            break;
        case "Prix":
            $tmp = "Drucken";
            break;
        case "Profil":
            $tmp = "Name des Programms";
            break;
        case "Proposé":
            $tmp = "Geschützter Bereich";
            break;
        case "Proposer des articles en votre nom":
            $tmp = "Artikel schreiben unter Ihrem Namen";
            break;
        case "Proposer un article":
            $tmp = "Beitrag freigeben";
            break;
        case "Proposer un seul lien.":
            $tmp = "Senden Sie einen einzelnen Link.";
            break;
        case "Proposition de modification":
            $tmp = "Anfrage zur Linkänderung";
            break;
        case "Proposition de modifications de liens":
            $tmp = "Anfrage zur Linkänderung";
            break;
        case "Propriétaire":
            $tmp = "Besitzer";
            break;
        case "Question":
            $tmp = "Frage";
            break;
        case "Qui est en ligne ?":
            $tmp = "Wer ist online ?";
            break;
        case "Rapport généré le":
            $tmp = "Report generiert auf";
            break;
        case "Rapporter un lien rompu":
            $tmp = "Defekten Link melden";
            break;
        case "Raz de la liste":
            $tmp = "RAZ Benutzerliste";
            break;
        case "Réalisé":
            $tmp = "Gemacht";
            break;
        case "Réalisées":
            $tmp = "Gemacht";
            break;
        case "Recevez par mail les nouveautés du site.":
            $tmp = "Anmelden, um per E-mail unsere Neuigkeiten zu erhalten.";
            break;
        case "Recherche avancée":
            $tmp = "Erweiterte Suche";
            break;
        case "Recherche":
            $tmp = "Suche";
            break;
        case "Rechercher dans la base des utilisateurs":
            $tmp = "Suche in der Benutzer Datenbank";
            break;
        case "Rechercher dans les critiques":
            $tmp = "Suche in den Kritiken";
            break;
        case "Rechercher dans les rubriques":
            $tmp = "Suche in den Rubriken";
            break;
        case "Rechercher dans tous les forums":
            $tmp = "Suche in allen Foren";
            break;
        case "Rechercher dans":
            $tmp = "Suche in";
            break;
        case "Recommander ce site à un ami":
            $tmp = "Diese Seite einem Freund empfehlen";
            break;
        case "Reçus":
            $tmp = "Eingegangen";
            break;
        case "Rejoindre ce groupe":
            $tmp = "Trete dieser Gruppe bei";
            break;
        case "Replier la liste":
            $tmp = "Liste ausblenden";
            break;
        case "Répondre":
            $tmp = "Antworten";
            break;
        case "Réponse postée.":
            $tmp = "Antwort gesendet.";
            break;
        case "Réponse":
            $tmp = "Antworten";
            break;
        case "réponses précédentes":
            $tmp = "Vorschau der Nachricht";
            break;
        case "réponses suivantes":
            $tmp = "weitere Antworten";
            break;
        case "Réponses":
            $tmp = "Antworten";
            break;
        case "Requête de modification d'un lien utilisateur":
            $tmp = "Anfrage zur Änderung eines Userlinks";
            break;
        case "Réseaux sociaux":
            $tmp = "Soziale Netzwerke";
            break;
        case "Réservées":
            $tmp = "Reserviert";
            break;
        case "Résolu":
            $tmp = "Erledigt";
            break;
        case "Restantes":
            $tmp = "Verbleibend";
            break;
        case "Résultats":
            $tmp = "Resultate";
            break;
        case "Retour à l'administration":
            $tmp = "Zurück zur Administration";
            break;
        case "Retour à l'index des critiques":
            $tmp = "Zurück zur Kritiken Übersicht";
            break;
        case "Retour à l'index des rubriques":
            $tmp = "Zurück zur Rubriken Übersicht";
            break;
        case "Retour à l'index FAQ":
            $tmp = "Zurück zum FAQ Index";
            break;
        case "Retour à la sous-rubrique :":
            $tmp = "Zurück zur Unterrubrik :";
            break;
        case "Retour en arrière":
            $tmp = "Zurück";
            break;
        case "Retour vers":
            $tmp = "Zurück zu";
            break;
        case "retour":
            $tmp = "zurück";
            break;
        case "Revenir à":
            $tmp = "Zurück zu";
            break;
        case "Revenir aux avatars standards":
            $tmp = "Standardavatar reaktivieren";
            break;
        case "Revue de l'éditeur":
            $tmp = "Benutzer Bewertung";
            break;
        case "Rien":
            $tmp = "Nichts";
            break;
        case "Robots - Spiders":
            $tmp = "Robots - Spiders";
            break;
        case "Rubriques spéciales":
            $tmp = "Spezial Rubriken";
            break;
        case "Rubriques":
            $tmp = "Rubriken";
            break;
        case "S'inscrire à la liste de diffusion du site":
            $tmp = "Bitte melden Sie sich an";
            break;
        case "Salle":
            $tmp = "Raum";
            break;
        case "Samedi":
            $tmp = "Samstag";
            break;
        case "Sans titre":
            $tmp = "Ohne Titel";
            break;
        case "Sans":
            $tmp = "ohne";
            break;
        case "Sauter à : ":
            $tmp = "Gehe zu : ";
            break;
        case "Sauter à :":
            $tmp = "Gehe zu :";
            break;
        case "Sauver les modifications":
            $tmp = "Änderungen speichern";
            break;
        case "Sauvez votre journal":
            $tmp = "Speichern Sie ihr Journal";
            break;
        case "Se connecter":
            $tmp = "Anmeldung";
            break;
        case "Seconde(s)":
            $tmp = "Sekunden";
            break;
        case "Sélectionner la page":
            $tmp = "Seite wählen";
            break;
        case "Sélectionner le nombre de news que vous souhaitez voir apparaître sur la page principale.":
            $tmp = "Geben Sie an, wieviele News auf der Seite angezeigt werden sollen.";
            break;
        case "Sélectionner un sujet":
            $tmp = "Beitrag wählen";
            break;
        case "Sélectionner une catégorie":
            $tmp = "Wählen Sie eine Kategorie";
            break;
        case "Sélectionnez un forum et participez !":
            $tmp = "Wählen Sie ein Forum, beteiligen Sie sich an den Diskusionen und haben Sie Freude daran !";
            break;
        case "Sélectionnez un thème d'affichage":
            $tmp = "Wählen Sie ein Template";
            break;
        case "semaine":
            $tmp = "Woche";
            break;
        case "semaines":
            $tmp = "Wochen";
            break;
        case "Septembre":
            $tmp = "September";
            break;
        case "Seulement":
            $tmp = "nur";
            break;
        case "Seuls les modérateurs peuvent poster de nouveaux sujets et répondre dans ce forum.":
            $tmp = "Nur Moderatoren können neue Beiträge und Antworten in diesem Forum schreiben.";
            break;
        case "Si vous étiez enregistré, vous pourriez proposer des liens.":
            $tmp = "Nach der Registrierung können Sie Links hinzufügen.";
            break;
        case "Si vous n'avez rien demandé, ne vous inquiétez pas :  vous êtes le seul à lire ce message. Connectez-vous simplement avec ce nouveau mot de passe.":
            $tmp = "Wenn Sie diese Anfrage nicht gestellt haben, seien nicht böse :  löschen Sie bitte diese E-mail. Ansonsten können Sie sich mit dem neuen Passwort anmelden.";
            break;
        case "Si vous n'avez rien demandé, ne vous inquiétez pas. Effacez juste ce Email. ":
            $tmp = "Wenn Sie diese Anfrage nicht gestellt haben, seien Sie bitte nicht verärgert. Bitte löschen Sie die E-mail ";
            break;
        case "Si vous souhaitez personnaliser un peu le site, c'est l'endroit indiqué. ":
            $tmp = "das ist Ihre persönliche Seite. ";
            break;
        case "Signature : ":
            $tmp = "Signatur : ";
            break;
        case "Signature":
            $tmp = "Signatur";
            break;
        case "Site à découvrir : ":
            $tmp = "Interessante Seite : ";
            break;
        case "Site web : ":
            $tmp = "Webseite : ";
            break;
        case "Site web officiel. Veillez à ce que votre url commence bien par":
            $tmp = "Produktname";
            break;
        case "Sites classés par":
            $tmp = "Seite sortieren nach";
            break;
        case "Situation géographique":
            $tmp = "Wo kommen Sie her?";
            break;
        case "Sondage":
            $tmp = "Umfrage";
            break;
        case "sondages avec le meilleur taux de participation":
            $tmp = "Umfrage mit den meisten Stimmen";
            break;
        case "Souligné":
            $tmp = "Unterstrichen";
            break;
        case "Soumettre une offre":
            $tmp = "Angebot abgeben";
            break;
        case "Soumission de liens brisés":
            $tmp = "Defekten Link melden";
            break;
        case "Soumission en cours. Une fois vos fichiers chargés, cliquer sur le bouton OK pour finir.":
            $tmp = "Übertragung ist im Gange. Nach dem Upload klicken Sie bitte auf OK um den Vorgang abzuschliessen.";
            break;
        case "Sous-catégorie :":
            $tmp = "Unterkategorie :";
            break;
        case "Sous-catégorie":
            $tmp = "Unterkategorie";
            break;
        case "Sous-catégories par ligne (page principale)":
            $tmp = "Unterkategorien pro Zeile (Hauptseite)";
            break;
        case "Sous-catégories":
            $tmp = "Unterkategorie";
            break;
        case "Sous-rubrique":
            $tmp = "Unterrubriken";
            break;
        case "Statistiques des chargements":
            $tmp = "Download Statistik";
            break;
        case "Statistiques diverses":
            $tmp = "Diverse Statistiken";
            break;
        case "Statistiques générales":
            $tmp = "Generelle Statistik";
            break;
        case "Statistiques":
            $tmp = "Statistiken";
            break;
        case "Status":
            $tmp = "Status";
            break;
        case "stb=Demande en attente de validation":
            $tmp = "stb = Anfrage wartet auf Antwort";
            break;
        case "Suivant":
            $tmp = "Nächste";
            break;
        case "Sujet : ":
            $tmp = "Thema : ";
            break;
        case "Sujet":
            $tmp = "Subjekt";
            break;
        case "Sujet":
            $tmp = "Thema";
            break;
        case "Sujets actifs : ":
            $tmp = "Aktive Beiträge : ";
            break;
        case "Sujets actifs":
            $tmp = "Zur Zeit aktive Themen";
            break;
        case "Sujets":
            $tmp = "Themen";
            break;
        case "Suppression du message impossible.":
            $tmp = "Kann die Einträge nicht aus der Datenbank löschen.";
            break;
        case "Suppression du message sélectionné impossible.":
            $tmp = "Löschen der gewählten Nachricht nicht möglich.";
            break;
        case "Supprimer ce message":
            $tmp = "Diesen Beitrag löschen";
            break;
        case "Systèmes d'exploitation":
            $tmp = "Betriebssysteme";
            break;
        case "Tableau de bord":
            $tmp = "Administration";
            break;
        case "Tableau":
            $tmp = "Tabelle";
            break;
        case "Taille du fichier":
            $tmp = "Dateigrösse";
            break;
        case "Taille":
            $tmp = "Grösse";
            break;
        case "Téléchargements":
            $tmp = "Downloads";
            break;
        case "Télécharger un avatar personnel":
            $tmp = "Laden Sie einen persönlichen Avatar hoch";
            break;
        case "Terminer":
            $tmp = "Beenden";
            break;
        case "Text aligné à droite":
            $tmp = "Text rechts ausrichten";
            break;
        case "Text aligné à gauche":
            $tmp = "Text links ausrichten";
            break;
        case "Text centré":
            $tmp = "Textmitte";
            break;
        case "Text justifié":
            $tmp = "Text gerechtfertigt";
            break;
        case "Texte : ":
            $tmp = "Text : ";
            break;
        case "Texte complet":
            $tmp = "Volltext";
            break;
        case "Texte d'introduction":
            $tmp = "Einführungstext";
            break;
        case "Texte de critique non valide... Il ne peut pas être vide":
            $tmp = "Text nicht gültig... er darf nicht leer sein";
            break;
        case "Texte étendu":
            $tmp = "Erweiterter Text";
            break;
        case "Texte":
            $tmp = "Text";
            break;
        case "Thème":
            $tmp = "Theme";
            break;
        case "Thème(s)":
            $tmp = "Themen";
            break;
        case "Titre : ":
            $tmp = "Titel : ";
            break;
        case "Titre :":
            $tmp = "Titel :";
            break;
        case "Titre (de A à Z)":
            $tmp = "Titel (von A bis Z)";
            break;
        case "Titre (de Z à A)":
            $tmp = "Titel (von Z bis A)";
            break;
        case "Titre de la page : ":
            $tmp = "Name der Seite : ";
            break;
        case "Titre du lien":
            $tmp = "Name des Links : ";
            break;
        case "Titre du lien":
            $tmp = "Name des Links";
            break;
        case "Titre non valide... Il ne peut pas être vide":
            $tmp = "Ungültiger Titel... er darf nicht leer sein";
            break;
        case "Titre":
            $tmp = "Titel";
            break;
        case "Top":
            $tmp = "Nach oben";
            break;
        case "Total : ":
            $tmp = "Total : ";
            break;
        case "Total des nouveaux liens pour la semaine dernière":
            $tmp = "Anzahl der neuen Links in der letzten Woche";
            break;
        case "Total des nouveaux liens":
            $tmp = "Anzahl der letzten neuen links";
            break;
        case "total votes":
            $tmp = "Alle Stimmen";
            break;
        case "Total":
            $tmp = "Total";
            break;
        case "Tous les auteurs":
            $tmp = "Alle Autoren";
            break;
        case "Tous les liens proposés sont vérifiés avant insertion.":
            $tmp = "Alle Links wurden überprüft, bevor sie hinzugefügt wurden.";
            break;
        case "Tous les sujets":
            $tmp = "Alle Themen";
            break;
        case "Tous les utilisateurs enregistrés peuvent poster de nouveaux sujets et répondre dans ce forum.":
            $tmp = "Alle registrierten User können neue Themen und Antworten in diesem Forum posten.";
            break;
        case "Tous les utilisateurs enregistrés peuvent poster des messages privés.":
            $tmp = "Alle angemeldeten Benutzer können private Nachrichten senden.";
            break;
        case "Tous":
            $tmp = "Alle";
            break;
        case "Tout développer":
            $tmp = "Alles entwickeln";
            break;
        case "Tout regrouper":
            $tmp = "Alles gruppieren";
            break;
        case "trié par ordre":
            $tmp = "Sortiert nach";
            break;
        case "Type":
            $tmp = "Schreiben";
            break;
        case "Un problème est survenu":
            $tmp = "Es ist ein Problem aufgetaucht";
            break;
        case "Un seul vote par jour, merci":
            $tmp = "Wir erlauben nur eine Stimme pro Tag !";
            break;
        case "Un seul vote par sondage.":
            $tmp = "Wir akzeptieren eine Stimme pro Umfrage.";
            break;
        case "Un utilisateur web ayant l'adresse IP ":
            $tmp = "Ein Webuser von dieser IP ";
            break;
        case "Une erreur est survenue lors de l'interrogation de la base.":
            $tmp = "Es gab einen Fehler bei der Datenbankabfrage.";
            break;
        case "Une fois enregistré":
            $tmp = "Als registrierter Benutzer";
            break;
        case "Url : ":
            $tmp = "URL : ";
            break;
        case "Url de la page : ":
            $tmp = "URL der Seite : ";
            break;
        case "Url":
            $tmp = "URL";
            break;
        case "Utilisateur avancé":
            $tmp = "ein angemeldeter Benutzer sein";
            break;
        case "Utilisateur enregistré":
            $tmp = "Registrierter Benutzer";
            break;
        case "Utilisateur ou message inexistant dans la base.":
            $tmp = "Kein Benutzer oder Nachricht in der Datenbank.";
            break;
        case "Utilisateur":
            $tmp = "Benutzer";
            break;
        case "Utilisateurs enregistrés : ":
            $tmp = "Registrierte Benutzer : ";
            break;
        case "Utilisateurs enregistrés":
            $tmp = "Registrierte Benutzer";
            break;
        case "Utilisateurs montrés":
            $tmp = "Benutzer angezeigt";
            break;
        case "Utilisateurs trouvés pour":
            $tmp = "Benutzer gefunden für";
            break;
        case "Utilisateurs trouvés":
            $tmp = "Benutzer gefunden";
            break;
        case "Utilisateurs":
            $tmp = "Benutzer";
            break;
        case "Utilisation : ":
            $tmp = "Benutzung : ";
            break;
        case "Utilisation":
            $tmp = "Benutzung";
            break;
        case "Utilisé":
            $tmp = "Benutzt";
            break;
        case "Valider":
            $tmp = "Validieren";
            break;
        case "Validez cette option et le texte suivant apparaîtra sur votre page d'accueil":
            $tmp = "Aktivieren Sie diese Option und der folgende Text erscheint auf der Startseite";
            break;
        case "Vendredi":
            $tmp = "Freitag";
            break;
        case "Véritable adresse Email":
            $tmp = "Ihre richtige E-mail Adresse";
            break;
        case "Version":
            $tmp = "Version";
            break;
        case "Vidéo Youtube":
            $tmp = "Youtube-Video";
            break;
        case "Vidéos":
            $tmp = "Videos";
            break;
        case "Vider la table chatBox":
            $tmp = "ChatBox Tabelle leeren";
            break;
        case "vient de demander une confirmation pour changer de mot de passe.":
            $tmp = "Hat eine Anfrage für ein neues Passwort gestellt.";
            break;
        case "Ville":
            $tmp = "Ort";
            break;
        case "Visite":
            $tmp = "Besuchen";
            break;
        case "Visiter ce site web":
            $tmp = "Diese Seite jetzt besuchen";
            break;
        case "Visiteur":
            $tmp = "Gast";
            break;
        case "visiteur(s) et":
            $tmp = "Besucher und";
            break;
        case "Visitez le minisite":
            $tmp = "Besuchen Sie die Mini Web site!";
            break;
        case "Voici les articles publiés dans cette rubrique.":
            $tmp = "Nachstehend die Beiträge in dieser Rubrik.";
            break;
        case "Vos centres d'intérêt":
            $tmp = "Ihre Interessen";
            break;
        case "Vos informations personnelles (Nom, Tél., ...)":
            $tmp = "Ihre persönlichen Informationen (Name, Tel., ...)";
            break;
        case "vote":
            $tmp = "Abstimmung";
            break;
        case "Voter":
            $tmp = "Stimme";
            break;
        case "Votes : ":
            $tmp = "Abstimmungen : ";
            break;
        case "votes":
            $tmp = "Stimmen :";
            break;
        case "Votes":
            $tmp = "Stimmen";
            break;
        case "Votre activité":
            $tmp = "Ihr Beruf";
            break;
        case "Votre adresse Email":
            $tmp = "Ihre E-mail Adresse";
            break;
        case "Votre adresse Ip est enregistrée":
            $tmp = "Ihre IP Adresse wurde registriert";
            break;
        case "Votre adresse mèl 'truquée'":
            $tmp = "Falsche E-mail Adresse";
            break;
        case "Votre adresse mèl est obligatoire":
            $tmp = "Ihre E-mail Adresse. Pflichtfeld";
            break;
        case "Votre ami":
            $tmp = "Ihr Freund";
            break;
        case "Votre Avatar":
            $tmp = "Ihr Avatar";
            break;
        case "Votre commentaire : ":
            $tmp = "Ihr Kommentar : ";
            break;
        case "Votre compte":
            $tmp = "Ihr Account";
            break;
        case "Votre contribution n'a pas été supprimée car au moins un post est encore rattaché (forum arbre).":
            $tmp = "Ihr Beitrag wurde nicht gelöscht, da es schon mehrere Beiträge gibt (Forum Baum).";
            break;
        case "Votre Email":
            $tmp = "Ihre E-mail Adresse";
            break;
        case "Votre fiche d'inscription":
            $tmp = "Ihr Anmeldeformular";
            break;
        case "Votre lien":
            $tmp = "Ihr Link";
            break;
        case "Votre message a été posté":
            $tmp = "Ihre Mitteilung wurde gepostet";
            break;
        case "Votre mot de passe est : ":
            $tmp = "Ihr Passwort ist : ";
            break;
        case "Votre mot de passe est erroné ou vous n'avez pas l'autorisation d'éditer ce message, refaites un essai.":
            $tmp = "Ihr Passwort ist nicht korrekt, oder Sie haben keine Berechtigung diesen Beitrag zu editieren. Bitte versuchen Sie es erneut";
            break;
        case "Votre nom complet. C'est indispensable.":
            $tmp = "Ihr voller Name. Pflichtfeld.";
            break;
        case "Votre nom est trop long ou vide. Il doit faire moins de 50 caractères.":
            $tmp = "Der Name ist zu lang oder leer. Er darf max. 50 Buchstaben haben.";
            break;
        case "Votre nom":
            $tmp = "Ihr Name";
            break;
        case "Votre offre":
            $tmp = "Ihr Angebot";
            break;
        case "Votre page Web":
            $tmp = "Ihre Webseite";
            break;
        case "Votre requête":
            $tmp = "Ihre Anfrage";
            break;
        case "Votre situation géographique":
            $tmp = "Wo kommen Sie her?";
            break;
        case "Votre surnom est trop long. Il doit faire moins de 25 caractères.":
            $tmp = "Ihr Nickname ist zu lang! Er darf maximal 25 Buchstaben haben.";
            break;
        case "Votre url de confirmation est :":
            $tmp = "Ihre URL für die Bestätigung ist :";
            break;
        case "Votre url de confirmation est expirée":
            $tmp = "Ihre Best&auml;tigungs-URL ist abgelaufen";
            break;
        case "Votre véritable identité":
            $tmp = "Ihr richtiger Name";
            break;
        case "Vous allez envoyer cet article":
            $tmp = "Sie senden diesen Artikel";
            break;
        case "vous aurez certains avantages, comme pouvoir modifier l'aspect du site,":
            $tmp = "haben Sie viele Möglichkeiten. Beispielsweise können Sie das Template einstellen";
            break;
        case "Vous avez changé l'url de la bannière":
            $tmp = "Sie haben die URL des Banners geändert";
            break;
        case "Vous avez déjà voté aujourd'hui":
            $tmp = "Sie haben heute schon abgestimmt !";
            break;
        case "Vous avez perdu votre mot de passe ?":
            $tmp = "Passwort vergessen ?";
            break;
        case "Vous avez un nouveau message.":
            $tmp = "Sie haben eine neue Nachricht.";
            break;
        case "Vous avez":
            $tmp = "Sie haben";
            break;
        case "Vous devez accepter la charte d'utilisation du site":
            $tmp = "Sie müssen die Nutzungsbedingungen akzeptieren";
            break;
        case "Vous devez choisir un icône pour votre message, refaites un essai.":
            $tmp = "Sie müssen ein Betreff Icon auswählen. Gehen Sie zurück und suchen Sie ein Icon aus.";
            break;
        case "Vous devez choisir un titre et un message pour poster votre sujet.":
            $tmp = "Sie müssen ein Betreff zu deinem Beitrag angeben.";
            break;
        case "Vous devez entrer un titre de lien et une adresse relative, ou laisser les deux zones vides":
            $tmp = "Sie müssen einen Link Titel und einen gültigen Link einfügen, oder Sie lassen beide Felder leer";
            break;
        case "Vous devez entrer votre nom et votre adresse Email":
            $tmp = "Sie müssen Ihren Namen und die E-mail Adresse eingeben";
            break;
        case "Vous devez obligatoirement saisir un sujet, refaites un essai.":
            $tmp = "Sie müssen ein Betreff eingeben. Sie können keinen Beitrag ohne Betreff posten. Gehen Sie zurück und geben Sie einen Betreff ein.";
            break;
        case "Vous devez prévisualiser avant de pouvoir envoyer":
            $tmp = "Nutzen Sie die Vorschau, bevor Sie die Mittelung abschicken können";
            break;
        case "Vous devez taper un message à poster.":
            $tmp = "Sie müssen eine Nachricht schreiben um sie zu senden.";
            break;
        case "Vous devez vous identifier.":
            $tmp = "Sie müssen Ihren Usernamen und Ihr Passwort eingeben.Gehen Sie zurück und machen Sie die nötigen Eingaben.";
            break;
        case "Vous êtes connecté en tant que :":
            $tmp = "Sie sind verbunden als :";
            break;
        case "Vous êtes connecté en tant que":
            $tmp = "Sie sind angemeldet als";
            break;
        case "Vous êtes maintenant enregistré. Vous allez recevoir un code de confirmation dans votre boîte à lettres électronique.":
            $tmp = "Sie sind nun registriert. Bitte heben Sie die Zugansdaten an einem sicheren Ort auf.";
            break;
        case "Vous n'avez aucun message.":
            $tmp = "Sie haben keine Nachrichten.";
            break;
        case "Vous n'avez pas encore de compte personnel ? Vous devriez":
            $tmp = "Sie haben noch keinen Account ? Sie können";
            break;
        case "Vous n'avez pas l'autorisation d'éditer ce message.":
            $tmp = "Sie haben keine Berechtigung den Beitrag zu editieren.";
            break;
        case "Vous n'êtes pas (encore) enregistré ou vous n'êtes pas (encore) connecté.":
            $tmp = "Sie sind noch nicht registriert, oder momentan nicht angemeldet.";
            break;
        case "Vous n'êtes pas autorisé à participer à ce forum":
            $tmp = "Sie haben keine Berechtigungen für dieses Forum.";
            break;
        case "Vous n'êtes pas encore autorisé à vous connecter.":
            $tmp = "Sie haben keine Berechtigung durch den Administrator.";
            break;
        case "Vous n'êtes pas identifié comme modérateur de ce forum. Opération interdite.":
            $tmp = "Da Sie nicht der Moderator des Forums sind, können Sie diese Funktion nicht nutzen.";
            break;
        case "Vous n'êtes pas le modérateur de ce forum, vous ne pouvez utiliser cette fonction.":
            $tmp = "Sie sind nicht der Moderator dieses Forums. Deshalb können Sie diese Funktion nicht nutzen.";
            break;
        case "Vous ne pouvez éditer ce message, vous n'en êtes pas le destinataire.":
            $tmp = "Sie können keine Beiträge editieren, die nicht von Ihnen sind.";
            break;
        case "Vous ne pouvez répondre à ce message, vous n'en êtes pas le destinataire.":
            $tmp = "Sie können auf diese Nachricht nicht antworten. Sie wurde nicht an Sie gesendet.";
            break;
        case "Vous ne pouvez répondre à ce message.":
            $tmp = "Sie können nicht antworten.";
            break;
        case "Vous ne pouvez répondre à ce topic il est verrouillé. Contacter l'administrateur du site.":
            $tmp = "Sie können auf diesen Beitrag nicht antworten, da er geschlossen wurde. Wenn Sie Fragen haben, wenden Sie sich bitte an den Administrator.";
            break;
        case "Vous pourrez le modifier après vous être connecté sur":
            $tmp = "Sie können das Passwort nach der ersten Anmeldung ändern";
            break;
        case "Vous pouvez charger un fichier carnet.txt dans votre miniSite":
            $tmp = "Sie können eine Datei hochladen carnet.txt in Ihre Mini Seite";
            break;
        case "Vous pouvez en poster un ici.":
            $tmp = "Sie können hier einen Beitrag erstellen.";
            break;
        case "Vous pouvez utiliser du code html, pour créer un lien par exemple":
            $tmp = "Sie können HTML Code verwenden um beispielsweise einen Link einzufügen";
            break;
        case "Vous pouvez utiliser notre moteur de recherche sur : ":
            $tmp = "Sie können unsere Suchfunktion nutzen auf : ";
            break;
        case "Vous recevrez un mèl quand elle sera approuvée.":
            $tmp = "Sie bekommen eine Mail, wenn der Vorgang abgeschlossen ist.";
            break;
        case "vous reconnecter.":
            $tmp = "erneutes Login.";
            break;
        case "Vous, ou quelqu'un d'autre, a utilisé votre Email identifiant votre compte":
            $tmp = "Sie, oder jemand anderer hat Ihre E-mail Adresse benutzt";
            break;
        case "Vous":
            $tmp = "User editieren";
            break;
        case "vrai nom":
            $tmp = "richtiger Name";
            break;

        default:
            $tmp = "Es gibt keine Übersetzung [** $phrase **]";
            break;
    }
    return $tmp;
}