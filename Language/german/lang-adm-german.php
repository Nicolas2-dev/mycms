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

        case " à ":
            $tmp = " bis ";
            break;
        case " Actualiser l'Auteur":
            $tmp = "Update Author";
            break;
        case " Afficher ":
            $tmp = " Anzeigen ";
            break;
        case " Ajouter un Auteur ":
            $tmp = "Einen Autor hinzufügen";
            break;
        case " et réalisé un gain global de ":
            $tmp = " und einen globalen Gewinn von ";
            break;
        case "- Etes-vous certain ?":
            $tmp = "- Sind Sie sicher?";
            break;
        case "- Mot de Passe (si Privé) - Le nom du fichier de formulaire (si Texte étendu) => modules/sform/forum - Les Groupes ID (si Groupe)":
            $tmp = "- Password (if Private) - Form file name (if Extended Text) in modules/sform/forum - Groups ID (if Group)";
            break;
        case "(255 caractères Max.)":
            $tmp = "(255 Zeichen Max.)";
            break;
        case "(Brève description des centres d'intérêt du site. 200 caractères maxi.)":
            $tmp = "(Kurzbeschrieb der Interessenschwerpunkte auf der Webseite. 200 Maxi-Zeichen.)";
            break;
        case "(C'est le nombre de contributions affichées pour chaque page relative à un Sujet)":
            $tmp = "(Dies ist die Anzahl der Beiträge, die auf jeder Seite zu einem Thema angezeigt werden)";
            break;
        case "(C'est le nombre de Sujets affichés pour chaque page relative à un Forum)":
            $tmp = "(This is the number of topics per forum that will be displayed per page of a forum)";
            break;
        case "(Certain des éventuelles URLs ?)":
            $tmp = "(Did you check URLs?)";
            break;
        case "(Définissez la méthode d'analyse que doivent adopter les robots des moteurs de recherche)":
            $tmp = "(Bestimmen Sie die Analysemethode für Suchmaschinenroboter)";
            break;
        case "(Définissez le public intéressé par votre site)":
            $tmp = "(Bestimmen Sie das Publikum, das an Ihrer Website interessiert ist)";
            break;
        case "(Définissez un ou plusieurs mot(s) clé(s). 1000 caractères maxi. Remarques : une lettre accentuée équivaut le plus souvent à 8 caractères. La majorité des moteurs de recherche font la distinction minuscule/majuscule. Séparez vos mots par une virgule)":
            $tmp = "(Geben Sie ein oder mehrere Wort(e) Schlüssel(e) 1000 Maximalzeichen ein. Hinweis: Ein akzentuierter Buchstabe entspricht meist 8 Zeichen. Die meisten Suchmaschinen unterscheiden klein/gross. Wörter durch Kommata trennen.)";
            break;
        case "(description ou nom complet du Sujet - max : 40 caractères)":
            $tmp = "(the full topic text or description - max: 40 characters)";
            break;
        case "(description ou nom complet du sujet)":
            $tmp = "(Beschreibung oder vollständiger Name des Themas)";
            break;
        case "(Ex. : 16 days. Remarque : ne définissez pas de fréquence inférieure à 14 jours !)":
            $tmp = "(zB. : 16 days. Hinweis: Frequenz nicht unter 14 Tage festlegen!)";
            break;
        case "(Ex. : fr(Français), en(Anglais), en-us(Américain), de(Allemand), it(Italien), pt(Portugais), etc)":
            $tmp = "(z.B. : fr(Französisch), en(Englisch), en-us(Amerikaner), de(Deutsch), it(Italienisch), pt(Portugiesen), etc)";
            break;
        case "(Ex. : l'adresse e-mail du webmaster)":
            $tmp = "(z.B. : die E-Mail-Adresse des Webmasters)";
            break;
        case "(Ex. : nom de votre compagnie/service)":
            $tmp = "(z.B. : Name Ihres Unternehmens/Diensts)";
            break;
        case "(Ex. : nom du webmaster)":
            $tmp = "(z.B. : Name des Webmasters)";
            break;
        case "(exemple : tonial.png)":
            $tmp = "(z.B. : opinion.gif)";
            break;
        case "(Informations légales)":
            $tmp = "(rechtliche Informationen)";
            break;
        case "(nom de l'image + extension)":
            $tmp = "(Bildname + Dateierweiterung)";
            break;
        case "(Redirection sur un forum externe : <.a href...)":
            $tmp = "(Weiterleitung an ein externes Forum : <.a href...)";
            break;
        case "(seulement pour modifications)":
            $tmp = "(for changes only)";
            break;
        case "(un simple nom sans espaces - 20 caractères max.)":
            $tmp = "(Ein einfacher Name ohne Leerzeichen - max. 20 Zeichen.)";
            break;
        case "(un simple nom sans espaces)":
            $tmp = "(ein einfacher Name ohne Leerzeichen)";
            break;
        case "* Désigne un champ obligatoire":
            $tmp = "* gibt die erforderlichen Felder an";
            break;
        case "* indique les champs requis":
            $tmp = "* gibt die erforderlichen Felder an";
            break;
        case "0=Tout le monde, 1=Membre seulement, 3=Administrateur seulement, 9=Désactiver":
            $tmp = "(0=Alle, 1=nur Mitglied, 3=nur Administrator, 9=Deaktivieren)";
            break;
        case "14 ans":
            $tmp = "14 Jahren";
            break;
        case "A ce jour, vous avez effectué ":
            $tmp = "Bisher haben Sie ";
            break;
        case "a été envoyée":
            $tmp = "übermittelt wurde";
            break;
        case "a":
            $tmp = "hat";
            break;
        case "Abandonner":
            $tmp = "Aufgeben";
            break;
        case "Accepter":
            $tmp = "Akzeptieren";
            break;
        case "Accès restreint":
            $tmp = "Beschränkter Zugang";
            break;
        case "Accès":
            $tmp = "Zugang";
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
            $tmp = "Aktivierung";
            break;
        case "Activer bloc-note du groupe":
            $tmp = "Aktivieren der notepad für Gruppe";
            break;
        case "Activer chat du groupe":
            $tmp = "Aktivieren Sie Chat-Gruppe";
            break;
        case "Activer export-news":
            $tmp = "Aktivieren Sie Export-News";
            break;
        case "Activer Facebook":
            $tmp = "Aktivieren Sie Facebook";
            break;
        case "Activer gestionnaire de fichiers du groupe":
            $tmp = "Aktivieren der Datei-Manager-Gruppe";
            break;
        case "Activer l'authentification SMTP(S)":
            $tmp = "Aktivieren Sie die SMTP(S)-Authentifizierung";
            break;
        case "Activer l'éditeur Tinymce":
            $tmp = "Den Tinymce Editor aktivieren";
            break;
        case "Activer l'icône [N]ouveau pour les catégories":
            $tmp = "Activate New Categories Icons";
            break;
        case "Activer l'upload dans les forums ?":
            $tmp = "Activate forum's upload?";
            break;
        case "Activer la description simplifiée des utilisateurs":
            $tmp = "Vereinfachte Benutzerbeschreibung aktivieren";
            break;
        case "Activer la résolution DNS pour les posts des forums, IP-Ban, ...":
            $tmp = "DNS resolution : activate for Posts in forum, IP-Ban, ...";
            break;
        case "Activer le Bloc":
            $tmp = "Den Block aktivieren";
            break;
        case "Activer le chiffrement":
            $tmp = "Verschlüsselung aktivieren";
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
            $tmp = "Aktivieren der PAD für Gruppe";
            break;
        case "Activer son MiniSite":
            $tmp = "Activate member's Mini-Website";
            break;
        case "Activer Twitter":
            $tmp = "Aktivieren Sie Twitter";
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
            $tmp = "Administrator(en) für das Thema:";
            break;
        case "Administrateur(s) du sujet":
            $tmp = "Administrator(en) für das Thema";
            break;
        case "Administrateur(s)":
            $tmp = "Administrator(en)";
            break;
        case "Administrateurs":
            $tmp = "Administratoren";
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
            $tmp = "E-Mail-Adresse, an die die Nachricht gesendet werden soll";
            break;
        case "Adresse e-mail principale":
            $tmp = "Primäre E-Mail Adresse";
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
            $tmp = "Anzeige";
            break;
        case "Afficher la liste des prospects":
            $tmp = "Liste der externen Benutzer anzeigen";
            break;
        case "Afficher le chemin dans le titre de la page :":
            $tmp = "Show path in the title of the webpage:";
            break;
        case "Afficher le logo sur la page web links":
            $tmp = "Activate Logo in Main Web Links";
            break;
        case "Afficher les resultats des Sondages":
            $tmp = "Ergebnisse der Umfragen anzeigen";
            break;
        case "Afficher pendant":
            $tmp = "Anzeige während";
            break;
        case "Afficher signature":
            $tmp = "Unterschrift anzeigen";
            break;
        case "Afficher votre signature":
            $tmp = "Zeigen Sie Ihre Unterschrift an";
            break;
        case "Aide en ligne de ce bloc":
            $tmp = "Online-Hilfe für diesen Block";
            break;
        case "Aide en ligne":
            $tmp = "Online-Hilfe";
            break;
        case "Ajouter Annonceur":
            $tmp = "Werber hinzufügen";
            break;
        case "Ajouter cette critique":
            $tmp = "Diese Kritik hinzufügen";
            break;
        case "Ajouter des Catégories":
            $tmp = "Kategorien hinzufügen";
            break;
        case "Ajouter des Liens relatifs au Sujet":
            $tmp = "Weiterführende Links hinzufügen";
            break;
        case "Ajouter des membres":
            $tmp = "Mitglieder hinzufügen";
            break;
        case "Ajouter Grands Titres":
            $tmp = "Informations Kanäle hinzufügen";
            break;
        case "Ajouter la critique N° : ":
            $tmp = "Reviews_Add ID:";
            break;
        case "Ajouter membres":
            $tmp = "Mitglied hinzufügen";
            break;
        case "Ajouter plus d'affichages":
            $tmp = "Add More Impressions";
            break;
        case "Ajouter plus de Forum pour":
            $tmp = "Add More Forums for";
            break;
        case "Ajouter un administrateur":
            $tmp = "Administrator hinzufügen";
            break;
        case "Ajouter un annonceur":
            $tmp = "Werber einzufügen";
            break;
        case "Ajouter un Article dans une Rubrique":
            $tmp = "Einen Artikel in eine Abschnitt einfügen";
            break;
        case "Ajouter un article":
            $tmp = "Einen Artikel einzufügen";
            break;
        case "Ajouter un Editorial":
            $tmp = "Einen Leitartikel einzufügen";
            break;
        case "Ajouter un Ephéméride : ":
            $tmp = "Ein Ephemerid hinzufügen:";
            break;
        case "Ajouter un éphéméride":
            $tmp = "Ein Ephemerid hinzufügen";
            break;
        case "Ajouter un groupe":
            $tmp = "Gruppe hinzufügen";
            break;
        case "Ajouter un lien":
            $tmp = "Einen Webink hinzufügen";
            break;
        case "Ajouter un nouveau Lien":
            $tmp = "Einen neuen Webink hinzufügen";
            break;
        case "Ajouter un nouveau Sujet":
            $tmp = "Ein neues Thema hinzufügen";
            break;
        case "Ajouter un nouvel Annonceur":
            $tmp = "Einen neuen Werber hinzufügen";
            break;
        case "Ajouter un ou des membres au groupe":
            $tmp = "Fügen Sie ein oder mehrere Mitglieder der Gruppe";
            break;
        case "Ajouter un Sujet":
            $tmp = "Ein Thema hinzufügen";
            break;
        case "Ajouter un Téléchargement":
            $tmp = "Einen Download hinzufügen";
            break;
        case "Ajouter un Utilisateur":
            $tmp = "Benutzer hinzufügen";
            break;
        case "Ajouter une bannière":
            $tmp = "Banner hinzufügen";
            break;
        case "Ajouter une Catégorie principale":
            $tmp = "Eine Hauptkategorie hinzufügen";
            break;
        case "Ajouter une catégorie":
            $tmp = "Eine Kategorie hinzufügen";
            break;
        case "Ajouter une nouvelle bannière":
            $tmp = "Einen neuen Banner hinzufügen";
            break;
        case "Ajouter une nouvelle Catégorie":
            $tmp = "Eine neue Kategorie hinzufügen";
            break;
        case "Ajouter une nouvelle Rubrique":
            $tmp = "Abschnitt hinzufügen";
            break;
        case "Ajouter une nouvelle Sous-Rubrique":
            $tmp = "Unterabschnitt hinzufügen";
            break;
        case "Ajouter une publication":
            $tmp = "Veröffentlichung hinzufügen";
            break;
        case "Ajouter une question réponse":
            $tmp = "Frage Antwort hinzufügen";
            break;
        case "Ajouter une question":
            $tmp = "Fügen Sie eine Frage";
            break;
        case "Ajouter une Rubrique":
            $tmp = "Abschnitt hinzufügen";
            break;
        case "Ajouter une Sous-catégorie":
            $tmp = "Unterkategorie hinzufügen";
            break;
        case "Ajouter une URL":
            $tmp = "URL hinzufügen";
            break;
        case "Ajouter":
            $tmp = "Hinzufügen";
            break;
        case "Année":
            $tmp = "Jahr";
            break;
        case "Annonceurs faisant de la publicité":
            $tmp = "Werber";
            break;
        case "Annuler":
            $tmp = "Abbrechen";
            break;
        case "Anonyme":
            $tmp = "Anonym";
            break;
        case "Anonymes":
            $tmp = "Anonym";
            break;
        case "Arbre":
            $tmp = "Baum";
            break;
        case "Archiver les Référants":
            $tmp = "Referer archivieren";
            break;
        case "Archives articles":
            $tmp = "Articles archives";
            break;
        case "Article en attente de validation":
            $tmp = "Waiting stories for publication";
            break;
        case "Article(s) attaché(s)":
            $tmp = "Verbundene Artikeln";
            break;
        case "Articles !":
            $tmp = "Artikeln";
            break;
        case "Articles en attente de validation !":
            $tmp = "Articles waiting for checking !";
            break;
        case "Articles programmés pour la publication.":
            $tmp = "Für die Veröffentlichung programmierte Artikel.";
            break;
        case "Articles programmés":
            $tmp = "Programmierte Artikel";
            break;
        case "Articles":
            $tmp = "Artikeln";
            break;
        case "Assembler une lettre et la tester":
            $tmp = "Einen kleiner Newsletter zusammenstellen und testen";
            break;
        case "Attachement":
            $tmp = "Anhänge";
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
            $tmp = "Achtung!!!";
            break;
        case "Au format CSV":
            $tmp = "CSV format";
            break;
        case "Aucun lien brisé rapporté.":
            $tmp = "Keine zerbrochenen Weblinks gemeldet.";
            break;
        case "Aucun Sujet":
            $tmp = "Keine Thema";
            break;
        case "Aucune catégorie":
            $tmp = "Keine Kategorie";
            break;
        case "Aucune critique à ajouter":
            $tmp = "Keine Kritik hinzuzufügen";
            break;
        case "Aucune indexation":
            $tmp = "No indexation";
            break;
        case "Aucune table n'a été trouvée":
            $tmp = "Keine Tabelle in der Datenbank gefunden";
            break;
        case "Audience":
            $tmp = "Rating";
            break;
        case "Auteur":
            $tmp = "Autor";
            break;
        case "Auteur(s)":
            $tmp = "Autor(en)";
            break;
        case "Auteurs actuels":
            $tmp = "Die aktuellen Autoren";
            break;
        case "Auto-Articles":
            $tmp = "Auto Articles";
            break;
        case "Automatique":
            $tmp = "Automatisch";
            break;
        case "Autoriser la connexion":
            $tmp = "Verbindung zulassen";
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
            $tmp = "Erlaubt den Benutzern, ihr Passwort zu wählen";
            break;
        case "Autoriser les utilisateurs à voter plusieurs fois":
            $tmp = "Benutzer zur Mehrfachabstimmung ermächtigen";
            break;
        case "Avant de supprimer le groupe":
            $tmp = "Bevor Sie die Gruppe löschen";
            break;
        case "Bannières actives":
            $tmp = "Aktive Banners";
            break;
        case "Bannières inactives":
            $tmp = "Inaktive Banners";
            break;
        case "Bannières terminées":
            $tmp = "Finished Banners";
            break;
        case "Bannières":
            $tmp = "Banner";
            break;
        case "Blackboard":
            $tmp = "Blackboard";
            break;
        case "Bloc Administration":
            $tmp = "Administration Block";
            break;
        case "Bloc Principal":
            $tmp = "Hauptblock";
            break;
        case "Blocs":
            $tmp = "Blöcke";
            break;
        case "Bonjour et bienvenue dans l'installation automatique du module":
            $tmp = "Hallo und willkommen zur automatischen Installation des Moduls";
            break;
        case "Bonjour":
            $tmp = "Hallo";
            break;
        case "Caché":
            $tmp = "Versteckt";
            break;
        case "car il est modérateur unique de forum. Oter ses droits de modération puis retirer le du groupe.":
            $tmp = "denn es ist einzigartiges Forum Moderator. Entfernen Sie die Rechte der Mäßigung und die Gruppe entfernen.";
            break;
        case "Catégorie : ":
            $tmp = "Kategorie: ";
            break;
        case "Catégorie :":
            $tmp = "Cat:";
            break;
        case "Catégorie sauvegardée":
            $tmp = "Kategorie gespeichert!";
            break;
        case "Catégorie":
            $tmp = "Kategorie";
            break;
        case "Catégories :":
            $tmp = "Kategorien :";
            break;
        case "Catégories de Forum":
            $tmp = "Kategorien von Forum";
            break;
        case "Catégories":
            $tmp = "Kategorien";
            break;
        case "Ce fichier est appelé à la fin du header du thème":
            $tmp = "This file is called at the end of the theme' header";
            break;
        case "Ce fichier est appelé après la fin de la génération de la page HTML":
            $tmp = "Diese Datei wird nach dem Ende der HTML-Seitenerzeugung aufgerufen";
            break;
        case "Ce fichier est appelé avant le début du footer du thème":
            $tmp = "This file is called at the begining of the theme'footer";
            break;
        case "Ce fichier est appelé avant que de commencer la génération de la page HTML":
            $tmp = "Diese Datei wird aufgerufen, bevor mit der Erzeugung der HTML-Seite begonnen wird";
            break;
        case "Ce fichier est appelé dans l'évènement ONLOAD de la balise BODY => JAVASCRIPT":
            $tmp = "Diese Datei wird im ONLOAD-Event des BODY-Tags aufgerufen => JAVASCRIPT";
            break;
        case "Ce fichier est appelé entre le HEAD et /HEAD lors de la génération de la page HTML":
            $tmp = "Diese Datei wird beim Erstellen der HTML-Seite zwischen HEAD und /HEAD aufgerufen";
            break;
        case "Ce fichier permet d'envoyer un MI personnalisé lorsqu'un nouveau membre s'inscrit":
            $tmp = "Mit dieser Datei kann eine personalisierte interne Nachricht gesendet werden, wenn sich ein neues Mitglied anmeldet";
            break;
        case "Ce fichier permet l'affichage d'informations complémentaires dans la page de login":
            $tmp = "Diese Datei ermöglicht die Anzeige zusätzlicher Informationen auf der Login-Seite";
            break;
        case "Ce fichier permet la configuration technique de SuperCache":
            $tmp = "Diese Datei ermöglicht die technische Konfiguration von SuperCache";
            break;
        case "Ce META-MOT existe déjà":
            $tmp = "Dieses META-MOT existiert bereits";
            break;
        case "Ce modérateur":
            $tmp = "Dieser Moderator";
            break;
        case "Ce programme d'installation va configurer votre site internet pour utiliser ce module.":
            $tmp = "Der Installer konfiguriert Ihre Webseite um dieses Modul zu nutzen.";
            break;
        case "ce site est génial":
            $tmp = "this web site is amazing";
            break;
        case "Ceci effacera tous ses articles et ses commentaires !":
            $tmp = "Das wird all seine Artikel und Kommentare löschen!";
            break;
        case "Ceci va détruire tous ses Articles !":
            $tmp = "Das wird all seine Artikel auslöschen!";
            break;
        case "Centres d'intérêt":
            $tmp = "Interessenschwerpunkte";
            break;
        case "cesiteestgénial":
            $tmp = "thiswebsiteisamazing";
            break;
        case "Cet annonceur a les BANNIERES ACTIVES suivantes dans":
            $tmp = "Dieser Werber hat folgende AKTIVE BANNER in";
            break;
        case "Cet annonceur n'a pas de bannière active pour le moment.":
            $tmp = "Dieser Werber hat momentan kein aktives Banner.";
            break;
        case "Cette Catégorie existe déjà !":
            $tmp = "Diese Kategorie existiert bereits!";
            break;
        case "Cette opération est irréversible elle va affecter votre base de données par la suppression de table(s) ou/et de ligne(s) et la suppression ou modification de certains fichiers.":
            $tmp = "Diese Operation ist irreversibel und wird Ihre Datenbank durch Löschen von Tabelle(n) oder/und Zeile(n) und Löschen oder Ändern bestimmter Dateien beeinträchtigen.";
            break;
        case "Cette Rubrique a":
            $tmp = "(This Section has)";
            break;
        case "Changer l'ordre":
            $tmp = "Die Reihenfolge ändern";
            break;
        case "Changer l'ordre des publications":
            $tmp = "Reihenfolge der Veröffentlichungen ändern";
            break;
        case "Changer l'ordre des rubriques":
            $tmp = "Reihenfolge der Abschnitte ändern";
            break;
        case "Changer l'ordre des sous-rubriques":
            $tmp = "Reihenfolge der Unterabschnitte ändern";
            break;
        case "Changer la date":
            $tmp = "Ändere das Datum";
            break;
        case "Changer les Catégories : ":
            $tmp = "Kategorien ändern:";
            break;
        case "Changer les privilèges ? :":
            $tmp = "Die Privilegien zu ändern? :";
            break;
        case "Changer":
            $tmp = "Ändern";
            break;
        case "Chaque bloc peut utiliser SuperCache. La valeur du délai de rétention 0 indique que le bloc ne sera pas caché (obligatoire pour le bloc function#adminblock).":
            $tmp = "Jeder Block kann SuperCache verwenden. Der Wert 0 gibt an, dass kein Cache gebildet wird (obligatorisch für Funktion #adminblock).";
            break;
        case "Chemin de certaines images (vote, ...)":
            $tmp = "Another Images Path";
            break;
        case "Chemin des images des sujets":
            $tmp = "Pfad zu den Bildern der Themen";
            break;
        case "Chemin des images du menu administrateur":
            $tmp = "Pfad zu Bildern im Administratormenü";
            break;
        case "Chemin et nom de l'image du Smiley":
            $tmp = "Pfad und Name des Smiley-Bildes";
            break;
        case "Choisir les privilèges ? :":
            $tmp = "Set Privileges? :";
            break;
        case "Choisir un groupe":
            $tmp = "Wählen Sie einen Gruppe";
            break;
        case "Choisir un modérateur":
            $tmp = "Wählen Sie einen Moderator";
            break;
        case "Choisir un rôle":
            $tmp = "Eine Rolle wählen";
            break;
        case "Clics":
            $tmp = "Clicks";
            break;
        case "Cliquer ici pour proposer une Critique.":
            $tmp = "Klicken Sie hier, um eine Kritik vorzuschlagen.";
            break;
        case "Cliquez pour éditer":
            $tmp = "Klicken Sie hier, um zu bearbeiten";
            break;
        case "Cliquez sur \"Etape suivante\" pour continuer.":
            $tmp = "Klicken Sie auf \"Weiter\" um fortzufahren.";
            break;
        case "Combien de référants au maximum":
            $tmp = "How Many Referers you want as Maximum";
            break;
        case "comme modérateur du forum":
            $tmp = "als Moderator";
            break;
        case "Commentaire":
            $tmp = "Kommentar";
            break;
        case "Communication":
            $tmp = "Kommunikation";
            break;
        case "Compte E-mail (Provenance)":
            $tmp = "Email Account (From)";
            break;
        case "Compteur":
            $tmp = "Zähler";
            break;
        case "Configuration de la page":
            $tmp = "Seiteneinstellungen";
            break;
        case "Configuration de PHPmailer SMTP(S)":
            $tmp = "PHPmailer SMTP(S) konfigurieren";
            break;
        case "Configuration des Forums":
            $tmp = "Einstellungen für die Foren";
            break;
        case "Configuration des infos en Backend & Réseaux Sociaux":
            $tmp = "Configuration for Backend & Social Networks";
            break;
        case "Configuration Forums":
            $tmp = "Einstellungen für die Foren";
            break;
        case "Configuration par défaut des Liens Web":
            $tmp = "Standardeinstellungen für Web Links";
            break;
        case "Configurer MySql (Recommandé)":
            $tmp = "Konfiguriere MySql (Erforderlich)";
            break;
        case "Confirmer la lecture":
            $tmp = "Lesung bestätigt";
            break;
        case "Connexion":
            $tmp = "Login";
            break;
        case "Contacter l'administration du site.":
            $tmp = "Kontaktieren Sie die Website-Verwaltung.";
            break;
        case "Contenu :":
            $tmp = "Inhalt :";
            break;
        case "Contenu de la table":
            $tmp = "Inhalt der Tabelle";
            break;
        case "Contenu":
            $tmp = "Inhalt";
            break;
        case "Contrôle des serveurs de mails":
            $tmp = "Kontrolle der Mailserver";
            break;
        case "Contrôler les serveurs de mail de tous les utilisateurs":
            $tmp = "Überprüfen Sie die E-Mail-Server aller Benutzer";
            break;
        case "Copié":
            $tmp = "Kopiert";
            break;
        case "Copier":
            $tmp = "Kopieren";
            break;
        case "Copyright":
            $tmp = "Copyright";
            break;
        case "Corps de message":
            $tmp = "Nachrichtentext";
            break;
        case "Corps":
            $tmp = "Hauptteil";
            break;
        case "courtes":
            $tmp = "kurze";
            break;
        case "Création":
            $tmp = "Schaffung";
            break;
        case "Créé":
            $tmp = "erstellen";
            break;
        case "Créer forum du groupe":
            $tmp = "Forum für die Gruppe erstellen";
            break;
        case "Créer le bloc WS":
            $tmp = "Erstellen Sie den Block WS";
            break;
        case "Créer le fichier en utilisant le modèle":
            $tmp = "Datei mit Vorlage erstellen";
            break;
        case "Créer le fichier":
            $tmp = "Erstelle Datei";
            break;
        case "Créer le(s) bloc(s) à droite":
            $tmp = "Anlegen des (der) rechten Blocks (Blöcke)";
            break;
        case "Créer le(s) bloc(s) à gauche":
            $tmp = "Anlegen des (der) linken Blocks (Blöcke)";
            break;
        case "Créer MiniSite du groupe":
            $tmp = "Minisite Gruppe erstellen";
            break;
        case "Créer un Bloc droite":
            $tmp = "Einen rechten Block anlegen";
            break;
        case "Créer un Bloc gauche":
            $tmp = "Einen linken Block anlegen";
            break;
        case "Créer un groupe.":
            $tmp = "Eine Gruppe erstellen.";
            break;
        case "Créer un nouveau Bloc":
            $tmp = "Einen neuen Block erstellen";
            break;
        case "Créer un nouveau Sondage":
            $tmp = "Eine neue Umfrage erstellen";
            break;
        case "Créer un nouveau":
            $tmp = "Schaffung eines neuen";
            break;
        case "Créer utilisateur":
            $tmp = "Einen Benutzer erstellen";
            break;
        case "Créer":
            $tmp = "Erstellen";
            break;
        case "Critique en attente de validation.":
            $tmp = "Kritische erwartet Validierung";
            break;
        case "Critiques en attente de validation":
            $tmp = "Kritische erwartet Validierung";
            break;
        case "Critiques":
            $tmp = "Kritische";
            break;
        case "CSS Specifique":
            $tmp = "Specific CSS";
            break;
        case "dans":
            $tmp = "in";
            break;
        case "dans le groupe":
            $tmp = "in der Gruppe";
            break;
        case "Date :":
            $tmp = "Datum:";
            break;
        case "Date de début":
            $tmp = "Anfangsdatum";
            break;
        case "Date de démarrage du site":
            $tmp = "Site Start Date";
            break;
        case "Date de fin":
            $tmp = "Enddatum";
            break;
        case "Date prévu de publication":
            $tmp = "Geplantes Datum der Veröffentlichung";
            break;
        case "Date":
            $tmp = "Datum";
            break;
        case "de":
            $tmp = "of";
            break;
        case "Déconnexion":
            $tmp = "Logout / Exit";
            break;
        case "Demande acceptée.":
            $tmp = "Anfrage akzeptiert.";
            break;
        case "Demande refusée pour votre participation au groupe":
            $tmp = "Antrag für Ihre Teilnahme an der Gruppe abgelehnt";
            break;
        case "Déplier la liste":
            $tmp = "Erweitern Sie die Liste";
            break;
        case "Dernière optimisation effectuée le":
            $tmp = "Letzte Optimierung erfolgt am";
            break;
        case "Derniers":
            $tmp = "Letzten";
            break;
        case "des modérateurs du forum":
            $tmp = "der Moderatoren";
            break;
        case "des":
            $tmp = "of";
            break;
        case "Désabonner un utilisateur":
            $tmp = "Einen Benutzer abmelden";
            break;
        case "Désactiver bloc-note du groupe":
            $tmp = "Deaktivieren notepad für Gruppe";
            break;
        case "Désactiver chat du groupe":
            $tmp = "Deaktivieren Chat-Gruppe";
            break;
        case "Désactiver gestionnaire de fichiers du groupe":
            $tmp = "Deaktivieren Sie Datei-Manager-Gruppe";
            break;
        case "Désactiver PAD du groupe":
            $tmp = "Deaktivieren PAD für Gruppe";
            break;
        case "Description de l'éphéméride":
            $tmp = "Beschreibung des Ephemerids";
            break;
        case "Description de la Page des Critiques":
            $tmp = "Beschreibung der Seite der Kritik";
            break;
        case "Description:":
            $tmp = "Beschreibung:";
            break;
        case "Description":
            $tmp = "Beschreibung";
            break;
        case "Désinstaller le module":
            $tmp = "Modul deinstallieren";
            break;
        case "Désolé, les nouveaux Mots de Passe ne correspondent pas. Cliquez sur retour et recommencez":
            $tmp = "Tut mir leid, die neuen Passwörter stimmen nicht überein. Klicken Sie auf Zurück und wiederholen Sie";
            break;
        case "Diffusion d'un Message Interne":
            $tmp = "Senden Sie eine interne Nachricht";
            break;
        case "Distribution":
            $tmp = "Distribution";
            break;
        case "Divers":
            $tmp = "Verschieden";
            break;
        case "DKIM du DNS (si existant et valide).":
            $tmp = "DNS DKIM (falls vorhanden und gültig).";
            break;
        case "DNS ou serveur de mail incorrect":
            $tmp = "Ungültiger DNS oder Mail-Server";
            break;
        case "Doit être un mot sans espace.":
            $tmp = "Muss ein Wort ohne Leerzeichen sein.";
            break;
        case "Doit être un nom de fichier valide avec une de ces extensions : jpg, jpeg, png, gif.":
            $tmp = "Muss ein gültiger Dateiname mit einer der folgenden Erweiterungen sein: jpg, jpeg, png, gif.";
            break;
        case "Droits de publication":
            $tmp = "Veröffentlichungsrechte";
            break;
        case "Droits des auteurs":
            $tmp = "Rechte der Autoren";
            break;
        case "Droits modules":
            $tmp = "Rechte an den Modulen";
            break;
        case "Droits":
            $tmp = "Rechte";
            break;
        case "Du DNS":
            $tmp = "Vom DNS";
            break;
        case "du groupe":
            $tmp = "gruppe";
            break;
        case "Durée de vie en heure du cookie Admin":
            $tmp = "Lebensdauer des Cookie Admin in Stunden";
            break;
        case "Durée de vie en heure du cookie User":
            $tmp = "Lebensdauer des Cookie User in Stunden";
            break;
        case "E-mail : ":
            $tmp = "Email: ";
            break;
        case "E-mail: ":
            $tmp = "Contact Email: ";
            break;
        case "E-mail":
            $tmp = "Email";
            break;
        case "Edité":
            $tmp = "Bearbeitet";
            break;
        case "Editer ce sondage":
            $tmp = "Bearbeiten Sie diese Umfrage";
            break;
        case "Editer Ephéméride : ":
            $tmp = "Editieren Sie die Ephemeriden:";
            break;
        case "Editer groupe":
            $tmp = "Gruppe bearbeiten";
            break;
        case "Editer l'annonceur":
            $tmp = "Werber bearbeiten";
            break;
        case "Editer l'Article Automatique":
            $tmp = "Edit Automated Story";
            break;
        case "Editer l'Article d'ID : ":
            $tmp = "Edit Article ID:";
            break;
        case "Editer la catégorie":
            $tmp = "Bearbeiten Sie die Kategorie";
            break;
        case "Editer la question réponse":
            $tmp = "Frage / Antwort bearbeiten";
            break;
        case "Editer la rubrique":
            $tmp = "Die Abschnitt bearbeiten";
            break;
        case "Editer la sous-rubrique":
            $tmp = "Die Unterabschnitt bearbeiten";
            break;
        case "Editer le Bloc Administration":
            $tmp = "Bearbeiten Sie den Administrationsblock";
            break;
        case "Editer le Sujet :":
            $tmp = "Thema bearbeiten:";
            break;
        case "Editer les Administrateurs":
            $tmp = "Administratoren bearbeiten";
            break;
        case "Editer les Catégories":
            $tmp = "Kategorien bearbeiten";
            break;
        case "Editer les fichiers de configuration":
            $tmp = "Bearbeiten Sie die Konfigurationsdateien";
            break;
        case "Editer les forums":
            $tmp = "Foren bearbeiten";
            break;
        case "Editer les informations concernant":
            $tmp = "Bearbeiten Sie die Informationen auf";
            break;
        case "Editer les Liens Relatifs":
            $tmp = "Edit Related Link";
            break;
        case "Editer les Sondages":
            $tmp = "Umfragen bearbeiten";
            break;
        case "Editer paramètres Grand Titre":
            $tmp = "Informations Kanäle bearbeiten";
            break;
        case "Editer Question & Réponse":
            $tmp = "Bearbeiten Frage / Antwort";
            break;
        case "Editer un Article":
            $tmp = "Einen Artikel bearbeiten";
            break;
        case "Editer un Téléchargement":
            $tmp = "Bearbeiten eines Downloads";
            break;
        case "Editer une catégorie":
            $tmp = "Bearbeiten Sie eine Kategorie";
            break;
        case "Editer une publication":
            $tmp = "Veröffentlichung bearbeiten";
            break;
        case "Editer une Rubrique : ":
            $tmp = "Eine Abschnitt bearbeiten:";
            break;
        case "Editer":
            $tmp = "Bearbeiten";
            break;
        case "Edition Bannière":
            $tmp = "Edit Banner";
            break;
        case "Edition des Blocs de droite":
            $tmp = "Bearbeiten der rechten Blöcke";
            break;
        case "Edition des Blocs de gauche":
            $tmp = "Bearbeiten der linken Blöcke";
            break;
        case "Edition des Catégories":
            $tmp = "Bearbeiten der Kategorien";
            break;
        case "Edition des Forums":
            $tmp = "Forum Manager";
            break;
        case "Edition des sondages":
            $tmp = "Umfragen bearbeiten";
            break;
        case "Edition des Utilisateurs":
            $tmp = "Edit Users";
            break;
        case "Edition du Bloc Principal":
            $tmp = "Edit Main Block";
            break;
        case "Edition Forums":
            $tmp = "Foren bearbeiten";
            break;
        case "Edition":
            $tmp = "Editing";
            break;
        case "Edito":
            $tmp = "Leitartikel";
            break;
        case "Editorial ajouté à la base de données":
            $tmp = "Leitartikel zur Datenbank hinzugefügt";
            break;
        case "Editorial modifié":
            $tmp = "Geänderter Leitartikel";
            break;
        case "Editorial supprimé de la base de données":
            $tmp = "Leitartikel aus der Datenbank entfernt";
            break;
        case "Effacé":
            $tmp = "Gelöscht";
            break;
        case "Effacer (Efface les Liens cassés et les avis pour un Lien donné)":
            $tmp = "Löschen (Löscht gebrochene Weblinks und Nachrichten für einen bestimmten Weblink)";
            break;
        case "Effacer / Modifier une Critique":
            $tmp = "Löschen / Bearbeiten Kritik";
            break;
        case "Effacer Bannière":
            $tmp = "Banner löschen";
            break;
        case "Effacer ce sondage":
            $tmp = "Löschen Sie diese Umfrage";
            break;
        case "Effacer l'Article":
            $tmp = "Artikel löschen";
            break;
        case "Effacer l'Auteur":
            $tmp = "Den Autor löschen";
            break;
        case "Effacer la publication :":
            $tmp = "Delete a publication:";
            break;
        case "Effacer la Rubrique : ":
            $tmp = "Abschnitt Löschen: ";
            break;
        case "Effacer la sous-rubrique : ":
            $tmp = "Löschen Unterabschnitt: ";
            break;
        case "Effacer le Sujet !":
            $tmp = "Löschen Thema!";
            break;
        case "Effacer le Sujet":
            $tmp = "Löschen Thema";
            break;
        case "Effacer les Référants":
            $tmp = "Löschen Referer";
            break;
        case "Effacer les Sondages":
            $tmp = "Löschen Umfragen";
            break;
        case "Effacer un Article : ":
            $tmp = "Einen Artikel löschen: ";
            break;
        case "Effacer un Article !":
            $tmp = "Einen Artikel löschen!";
            break;
        case "Effacer un Bloc droit":
            $tmp = "Einen rechten Block löschen";
            break;
        case "Effacer un Bloc gauche":
            $tmp = "Einen linken Block löschen";
            break;
        case "Effacer une Rubrique":
            $tmp = "Einen Abschnitt Löschen";
            break;
        case "Effacer":
            $tmp = "Löschen";
            break;
        case "Effectuée le":
            $tmp = "Erfolgt am";
            break;
        case "En Ligne":
            $tmp = "on line";
            break;
        case "en tant qu'Administrateur.":
            $tmp = "als der Administrator.";
            break;
        case "Encodage":
            $tmp = "Zeichensatzkodierung";
            break;
        case "Enfin, pour pouvoir réinstaller le module par la suite avec Module-Install, cliquez sur le bouton \"Marquer le module comme dÈsinstallé\".":
            $tmp = "Als letztes, damit Sie in der Lage sind das Addon wieder zu installieren, klicken Sie auf den Button \"Markiere das Addon als deinstalliert\".";
            break;
        case "Enregistrer":
            $tmp = "Aufzeichnen";
            break;
        case "Entête":
            $tmp = "Kopffeld";
            break;
        case "Entrez à nouveau le Mot de Passe":
            $tmp = "Passwort erneut eingeben";
            break;
        case "Envoyer à tous les membres":
            $tmp = "An alle Mitglieder senden";
            break;
        case "Envoyer La Lettre":
            $tmp = "Email NewsLetter";
            break;
        case "Envoyer par E-mail les nouveaux Articles à l'Administrateur":
            $tmp = "Mail New Stories to Admin";
            break;
        case "Envoyer un courriel à":
            $tmp = "Senden Sie eine E-Mail an";
            break;
        case "Envoyer":
            $tmp = "Senden";
            break;
        case "Ephémérides":
            $tmp = "Ephemeriden";
            break;
        case "ERREUR : cet identifiant est déjà utilisé":
            $tmp = "FEHLER : Der Nickname ist schon vergeben";
            break;
        case "Erreur : cette URL est déjà présente dans la base de données !":
            $tmp = "FEHLER: Diese URL ist bereits in der Datenbank enthalten!";
            break;
        case "ERREUR : DNS ou serveur de mail incorrect":
            $tmp = "FEHLER: DNS oder falscher Mailserver";
            break;
        case "Erreur : La Catégorie":
            $tmp = "FEHLER: Die Kategorie";
            break;
        case "Erreur : La Sous-catégorie":
            $tmp = "FEHLER: Die Unterkategorie";
            break;
        case "Erreur : vous devez saisir un TITRE pour votre Lien !":
            $tmp = "FEHLER: Sie müssen einen TITEL für Ihren Link eingeben!";
            break;
        case "Erreur : vous devez saisir une DESCRIPTION pour votre Lien !":
            $tmp = "FEHLER: Sie müssen eine BESCHREIBUNG für Ihren Link eingeben!";
            break;
        case "Erreur : vous devez saisir une URL pour votre Lien !":
            $tmp = "FEHLER: Sie müssen eine URL für Ihren Link eingeben!";
            break;
        case "est terminée !":
            $tmp = "ist beendet!";
            break;
        case "et tous ses Commentaires ?":
            $tmp = "und all seine Kommentare?";
            break;
        case "et toutes ses bannières !!!":
            $tmp = "and all its Banners!!!";
            break;
        case "Etape suivante":
            $tmp = "Weiter";
            break;
        case "Etat : ":
            $tmp = "Status:";
            break;
        case "Etat":
            $tmp = "Status";
            break;
        case "Etes-vous certain de vouloir effacer cette publication ?":
            $tmp = "Sind Sie sicher, dass Sie diese Publikation löschen wollen?";
            break;
        case "Etes-vous sûr de vouloir effacer ce sujet ?":
            $tmp = "Sind Sie sicher, dass Sie dieses Thema löschen wollen? ";
            break;
        case "Etes-vous sûr de vouloir effacer cet annonceur et TOUTES ses bannières ?":
            $tmp = "Sind Sie sicher, dass Sie diesen Werbekunden und alle seine Banner löschen wollen?";
            break;
        case "Etes-vous sûr de vouloir effacer cet Article ?":
            $tmp = "Sind Sie sicher, dass Sie diesen Artikel löschen wollen?";
            break;
        case "Etes-vous sûr de vouloir effacer cette Bannière ?":
            $tmp = "Sind Sie sicher, dass Sie dieses Banner löschen wollen?";
            break;
        case "Etes-vous sûr de vouloir effacer cette Rubrique ?":
            $tmp = "Sind Sie sicher, dass Sie diese Abschnitte löschen wollen?";
            break;
        case "Etes-vous sûr de vouloir effacer cette sous-rubrique ?":
            $tmp = "Sind Sie sicher, dass Sie diese Unterabschnitte löschen wollen?";
            break;
        case "Etes-vous sûr de vouloir effacer l'Article N°":
            $tmp = "Sind Sie sicher, dass Sie den Artikel ID #";
            break;
        case "Etes-vous sûr de vouloir effacer":
            $tmp = "Sind Sie sicher, dass Sie löschen möchten";
            break;
        case "Etes-vous sûr de vouloir EFFACER":
            $tmp = "Sind Sie sicher, dass Sie löschen möchten";
            break;
        case "Etes-vous sûr de vouloir supprimer cette boîte de Titres ?":
            $tmp = "Sind Sie sicher, dass Sie diese Informations Kanäle löschen wollen?";
            break;
        case "Exclure TOUS les membres du groupe":
            $tmp = "Ausschlieﬂen aller Gruppenmitglieder";
            break;
        case "Exclure":
            $tmp = "ausschlieﬂen";
            break;
        case "Exemple":
            $tmp = "Beispiel";
            break;
        case "existe déjà !":
            $tmp = "Ist bereits vorhanden !";
            break;
        case "Expédier en tant":
            $tmp = "Versenden als";
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
            $tmp = "Geschlossen";
            break;
        case "Fermer les nouvelles inscriptions":
            $tmp = "Schließen Sie neue Registrierungen";
            break;
        case "Fichier de configuration automatique absent. Installation/désinstallation impossible.":
            $tmp = "Keine Konfigurationsdatei gefunden. Installation/Deinstallation nicht möglich.";
            break;
        case "Fichier de formulaire":
            $tmp = "Datei für das Formular";
            break;
        case "Fichiers configurations":
            $tmp = "Konfigurationsdateien";
            break;
        case "Fichiers dans /slogs. table par table, lignes par lignes, tables scindées : limite":
            $tmp = "Dateien in /slogs. Tabelle für Tabelle, Zeile für Zeile, Tabelle geteilt: Grenze";
            break;
        case "Fichiers dans /slogs. table par table, tables non scindées : limite":
            $tmp = "Dateien in /slogs. Tabelle für Tabelle, nicht aufgeteilte Tabellen: Grenze";
            break;
        case "Filtre":
            $tmp = "Filter";
            break;
        case "Fonction mail à utiliser":
            $tmp = "Welche E-Mail Funktion verwenden";
            break;
        case "Fonctions":
            $tmp = "Funktionen";
            break;
        case "Format de données":
            $tmp = "Data format";
            break;
        case "Format de fichier":
            $tmp = "Datei Format";
            break;
        case "Forum classé en":
            $tmp = "Forum(s) ist (sind) klassifiziert(en) in";
            break;
        case "Forum d'origine":
            $tmp = "Source forum";
            break;
        case "Forum de destination":
            $tmp = "Destination forum";
            break;
        case "Fréquence de visite des Robots/Spiders":
            $tmp = "Häufigkeit der Besuche der Roboter/Spiders";
            break;
        case "Fusionner des forums":
            $tmp = "Foren zusammenführen";
            break;
        case "Gain réalisable":
            $tmp = "Gained";
            break;
        case "Gain total réalisé":
            $tmp = "Total gain";
            break;
        case "génération automatique du DKIM par le portail.":
            $tmp = "Automatische Generierung des DKIM durch das Portal.";
            break;
        case "Gérer les Liens Relatifs : ":
            $tmp = "Weiterführende Links verwalten:";
            break;
        case "Gestion des blocs":
            $tmp = "Blockverwaltung";
            break;
        case "Gestion des forums":
            $tmp = "Foren Verwaltung";
            break;
        case "Gestion des groupes":
            $tmp = "Gruppenverwaltung";
            break;
        case "Gestion des Sujets":
            $tmp = "Topics Manager";
            break;
        case "Gestion des sujets":
            $tmp = "Verwaltung des Themen";
            break;
        case "Gestion modules":
            $tmp = "Modulverwaltung";
            break;
        case "Gestion, Installation Modules":
            $tmp = "Manage, Instal Addons";
            break;
        case "Gestionnaire de Fichiers":
            $tmp = "Dateimanager";
            break;
        case "Gestionnaire Fichiers":
            $tmp = "Dateimanager";
            break;
        case "Grands Titres de sites de News":
            $tmp = "Informations Kanäle";
            break;
        case "Groupe de travail":
            $tmp = "Arbeitsgruppe";
            break;
        case "Groupe ID":
            $tmp = "Gruppe ID";
            break;
        case "Groupe":
            $tmp = "Gruppe";
            break;
        case "Groupes":
            $tmp = "Gruppen";
            break;
        case "Hauteur de l'image du backend":
            $tmp = "Backend Image Height";
            break;
        case "Heure locale":
            $tmp = "Local Time Format";
            break;
        case "Heure":
            $tmp = "Stunde";
            break;
        case "Hors Ligne":
            $tmp = "offline";
            break;
        case "Icône":
            $tmp = "Icon";
            break;
        case "ID Article:":
            $tmp = "Artikel ID";
            break;
        case "ID Utilisateur":
            $tmp = "Benutzer ID";
            break;
        case "ID":
            $tmp = "ID";
            break;
        case "Identifiant ":
            $tmp = "Login";
            break;
        case "Identifiant Utilisateur":
            $tmp = "Spitzname/Benutzer ID";
            break;
        case "Identifiant":
            $tmp = "Spitzname";
            break;
        case "Identification E-mail de l'émetteur":
            $tmp = "Email Message";
            break;
        case "Ignorer (Efface toutes les demandes pour un Lien donné)":
            $tmp = "Ignore (Deletes all requests for a given link)";
            break;
        case "Ignorer":
            $tmp = "Ignorieren";
            break;
        case "Il y a":
            $tmp = "Es gibt";
            break;
        case "Illimité":
            $tmp = "Unbegrenzt";
            break;
        case "Image de garde":
            $tmp = "Cover image";
            break;
        case "Image du Sujet :":
            $tmp = "Topic Image:";
            break;
        case "Image pour la Rubrique : ":
            $tmp = "Bild für die Abschnitt";
            break;
        case "Image pour la Sous-Rubrique":
            $tmp = "Bild für die Unterabschnitt";
            break;
        case "Image":
            $tmp = "Bild";
            break;
        case "images":
            $tmp = "Bilder";
            break;
        case "Imp. restantes":
            $tmp = "Imp. Left";
            break;
        case "Imp.":
            $tmp = "Imp.";
            break;
        case "Impossible d'écrire dans le fichier \"":
            $tmp = "Unmöglich die Datei zu ändern \"";
            break;
        case "Impressions réservées":
            $tmp = "Impressions Purchased";
            break;
        case "Impressions":
            $tmp = "Impressions";
            break;
        case "Inactif(s)":
            $tmp = "Inaktiv";
            break;
        case "Index":
            $tmp = "Index";
            break;
        case "Informations générales du site":
            $tmp = "Allgemeine Informationen über die Website";
            break;
        case "Informations supplémentaires":
            $tmp = "Zusätzliche Informationen";
            break;
        case "Informations":
            $tmp = "Informationen";
            break;
        case "Infos Groupe":
            $tmp = "Info-Gruppe";
            break;
        case "Installer le module":
            $tmp = "Installieren Sie das Modul";
            break;
        case "Interface":
            $tmp = "Interface";
            break;
        case "Interne":
            $tmp = "Internal";
            break;
        case "Intitulé du Sondage":
            $tmp = "Umfragetitel";
            break;
        case "Intitulé du Sujet :":
            $tmp = "Topic Name:";
            break;
        case "Intitulé":
            $tmp = "Titel";
            break;
        case "IP":
            $tmp = "IP";
            break;
        case "Jour":
            $tmp = "Tag";
            break;
        case "jour(s)":
            $tmp = "Tag(e)";
            break;
        case "L'installation automatique du module":
            $tmp = "Die automatische Installation des Modul";
            break;
        case "L'utilisation de NPDS et des modules est soumise à l'acceptation des termes de la licence GNU/GPL :":
            $tmp = "Um NPDS zu nutzen, müssen Sie die GNU/GPL Lizenz anerkennen:";
            break;
        case "la Catégorie":
            $tmp = "Die Kategorie";
            break;
        case "La configuration de la base de données MySql a réussie !":
            $tmp = "Die MySql Datenbank Konfiguration war erfolgreich!";
            break;
        case "La configuration du(des) bloc(s) a réussi !":
            $tmp = "Konfiguration des (der) Blocks (Blöcke) war erfolgreich!";
            break;
        case "La désinstallation des modules n'est pas prise en charge de façon automatique à l'heure actuelle.":
            $tmp = "Die automatische Deinstallation des Modul ist derzeit nicht möglich.";
            break;
        case "La Lettre":
            $tmp = "Newsletter";
            break;
        case "La nuit commence à":
            $tmp = "Die Nacht beginnt um";
            break;
        case "La nuit":
            $tmp = "Die Nacht";
            break;
        case "La publication que vous aviez en attente vient d'être validée.":
            $tmp = "Die Veröffentlichung, auf die Sie gewartet haben, wurde gerade freigegeben.";
            break;
        case "La ré-affectation est terminée !":
            $tmp = "Congratulations! The Move has been completed!";
            break;
        case "Laisser les utilisateurs anonymes poster de nouveaux liens":
            $tmp = "Anonyme Benutzer in die Lage versetzen, neue Links zu posten";
            break;
        case "Langue de Prévisualisation":
            $tmp = "Sprache für die Vorschau";
            break;
        case "Langue du backend":
            $tmp = "Backend Language";
            break;
        case "Langue principale":
            $tmp = "Hauptsprache";
            break;
        case "Large":
            $tmp = "Global";
            break;
        case "Largeur de l'image du backend":
            $tmp = "Backend Image Width";
            break;
        case "Le critique":
            $tmp = "Kritiker";
            break;
        case "Le jour commence à":
            $tmp = "Der Tag beginnt um";
            break;
        case "Le jour":
            $tmp = "Der Tag";
            break;
        case "Le Modérateur sélectionné n'existe pas.":
            $tmp = "The selected Moderator doesn't exist in the database.";
            break;
        case "Le programme d'installation va maintenant exécuter le script SQL pour configurer la base de données MySql.":
            $tmp = "Der Installer führt jetzt das SQL Script aus um MySQL zu konfigurieren.";
            break;
        case "Le programme d'installation va maintenant modifier le(s) fichier(s) suivant(s) :":
            $tmp = "Der Installer wird nun die Datei(en) ändern :";
            break;
        case "Le répertoire courant est : ":
            $tmp = "Das aktuelle Verzeichnis ist:";
            break;
        case "Le répertoire":
            $tmp = "Verzeichnis";
            break;
        case "Les administrateurs":
            $tmp = "Administratoren";
            break;
        case "Les articles en archive":
            $tmp = "Die Artikel im Archiv";
            break;
        case "Les articles en ligne":
            $tmp = "Online-Artikel";
            break;
        case "Les fichiers de configuration":
            $tmp = "Konfigurationsdateien";
            break;
        case "Les modules":
            $tmp = "Die Module";
            break;
        case "Les paramètres ont été correctement écrits dans le fichier \"":
            $tmp = "Die Parameter wurden korrekt eingegeben \"";
            break;
        case "Les paramètres sont déjà inscrits dans le fichier \"":
            $tmp = "Die Parameter existieren bereits in der Datei \"";
            break;
        case "Les plus récents":
            $tmp = "Home";
            break;
        case "Les sondages":
            $tmp = "Umfragen";
            break;
        case "les URLs que vous aurez renseignés ci-après (ne renseigner que la racine de l'URI)":
            $tmp = "The URL that you will have informed below (Inform only the root of the URI)";
            break;
        case "Lettre D'info":
            $tmp = "Kleiner Newsletter";
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
            $tmp = "Links warten auf Validierung";
            break;
        case "Liens locaux sauf page courante":
            $tmp = "Links but no index";
            break;
        case "Liens relatifs : ":
            $tmp = "Weiterführende Links:";
            break;
        case "Liens rompus à valider.":
            $tmp = "Defekte Links warten auf die Überprüfung.";
            break;
        case "Liens Web":
            $tmp = "Web Links";
            break;
        case "Liens":
            $tmp = "Links";
            break;
        case "Ligne 1":
            $tmp = "Fußzeilen 1";
            break;
        case "Ligne 2":
            $tmp = "Fußzeilen 2";
            break;
        case "Ligne 3":
            $tmp = "Fußzeilen 3";
            break;
        case "Ligne 4":
            $tmp = "Fußzeilen 4";
            break;
        case "Liste des articles":
            $tmp = "Liste der Artikel";
            break;
        case "Liste des catégories":
            $tmp = "Liste der Kategorien";
            break;
        case "Liste des Grands Titres de sites de News":
            $tmp = "Liste der Informations Kanäle";
            break;
        case "Liste des groupes":
            $tmp = "Gruppenliste";
            break;
        case "Liste des liens":
            $tmp = "Liste der Links";
            break;
        case "Liste des LNL envoyées":
            $tmp = "Liste der versandten kleiner Newsletter";
            break;
        case "Liste des membres":
            $tmp = "Mitgliederliste";
            break;
        case "Liste des questions réponses":
            $tmp = "Liste der Fragen und Antworten";
            break;
        case "Liste des rubriques":
            $tmp = "Liste der Abschnitte";
            break;
        case "Liste des sondages":
            $tmp = "Liste der Umfragen";
            break;
        case "Logo du site pour les impressions":
            $tmp = "Site Logo (for printing functions)";
            break;
        case "Logs":
            $tmp = "Logs";
            break;
        case "Longueur minimum du mot de passe des utilisateurs":
            $tmp = "Minimale Passwortlänge für Benutzer";
            break;
        case "M'envoyer un Mel lorsque qu'un Msg Int. arrive":
            $tmp = "Schicken Sie mir eine E-Mail, wenn eine interne Nachricht eintrifft.";
            break;
        case "Maintenance des Ephémérides (Editer/Effacer)":
            $tmp = "Wartung der Ephemeriden (Bearbeiten / Löschen )";
            break;
        case "Maintenance des Ephémérides":
            $tmp = "Wartung der Ephemeriden";
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
            $tmp = "Markieren Sie das Addon als deinstalliert";
            break;
        case "Marquer le module comme installé":
            $tmp = "Markieren Sie das Modul als installiert";
            break;
        case "Marquer tous les Topics comme lus":
            $tmp = "Alle Themen als gelesen markieren";
            break;
        case "Mauvais Mot de Passe":
            $tmp = "Schlechtes Passwort";
            break;
        case "max caractères":
            $tmp = "Maximal Zeichen";
            break;
        case "Membre invisible":
            $tmp = "Unsichtbares Mitglied";
            break;
        case "Membre":
            $tmp = "Mitglieder";
            break;
        case "Membres":
            $tmp = "Mitglieder";
            break;
        case "Menu Administration":
            $tmp = "Administration Menü";
            break;
        case "Menu":
            $tmp = "Menü";
            break;
        case "Merci d'entrer l'information en fonction des spécifications":
            $tmp = "Bitte geben Sie die Information gemäss Spezifikation ein";
            break;
        case "Merci de fournir une nouvelle adresse Email valide.":
            $tmp = "Bitte geben Sie eine neue gültige Email-Adresse ein.";
            break;
        case "Merci pour votre Contribution !":
            $tmp = "Danke für Ihren Beitrag !";
            break;
        case "Message d'entête":
            $tmp = "Nachrichtenvorsatz";
            break;
        case "Message de l'E-mail":
            $tmp = "Nachricht von der E-Mail";
            break;
        case "Message de pied de page":
            $tmp = "Fußzeilen-Nachricht";
            break;
        case "Message Interne":
            $tmp = "Interne Nachricht";
            break;
        case "Message":
            $tmp = "Nachricht";
            break;
        case "Meta obligatoire, ne pas le modifier ou le supprimer":
            $tmp = "Meta obligatorisch, nicht ändern oder löschen";
            break;
        case "META-LANG":
            $tmp = "META-LANG";
            break;
        case "MétaTAGs":
            $tmp = "MetaTAGs";
            break;
        case "Mettre à jour":
            $tmp = "Aktualisieren";
            break;
        case "mise à jour":
            $tmp = "aktualisieren";
            break;
        case "Mode":
            $tmp = "Mode";
            break;
        case "Modérateur":
            $tmp = "Moderator";
            break;
        case "Modérateur(s)":
            $tmp = "Moderator(en)";
            break;
        case "Modérateurs uniquement":
            $tmp = "Nur Moderatoren";
            break;
        case "Modérateurs":
            $tmp = "Moderatoren";
            break;
        case "Modération par l'Administrateur":
            $tmp = "Moderation by Admin";
            break;
        case "Modération par les Utilisateurs":
            $tmp = "Moderation by Users";
            break;
        case "Modification de données dans table(s)":
            $tmp = "Änderung von Daten in Tabelle(n)";
            break;
        case "Modification de":
            $tmp = "Änderung von";
            break;
        case "Modifié":
            $tmp = "Geändert";
            break;
        case "Modifier annonceur":
            $tmp = "Werber bearbeiten";
            break;
        case "Modifier l'Article":
            $tmp = "Änderung von Artikel";
            break;
        case "Modifier l'Editorial":
            $tmp = "Leitartikel ändern";
            break;
        case "Modifier l'information":
            $tmp = "Information bearbeiten";
            break;
        case "Modifier la Bannière":
            $tmp = "Banner bearbeiten";
            break;
        case "Modifier la Catégorie":
            $tmp = "Kategorie bearbeiten";
            break;
        case "Modifier le groupe":
            $tmp = "Gruppe bearbeiten";
            break;
        case "Modifier le lien":
            $tmp = "Weblink bearbeiten";
            break;
        case "Modifier le(s) fichier(s)":
            $tmp = "Dateien modifizieren";
            break;
        case "Modifier les Liens":
            $tmp = "Weblink bearbeiten";
            break;
        case "Modifier un ":
            $tmp = "Änderung eines ";
            break;
        case "Modifier un Bloc droit":
            $tmp = "Ändern Sie einen rechten Block";
            break;
        case "Modifier un Bloc gauche":
            $tmp = "Ändern Sie einen linken Block";
            break;
        case "Modifier un utilisateur":
            $tmp = "Ändern Sie einen Benutzer";
            break;
        case "Modifier":
            $tmp = "Bearbeiten";
            break;
        case "Module installé":
            $tmp = "Modul installiert";
            break;
        case "Module":
            $tmp = "Modul";
            break;
        case "Modules":
            $tmp = "Modulen";
            break;
        case "Mois":
            $tmp = "Monat";
            break;
        case "Mot de Passe : ":
            $tmp = "Passwort: ";
            break;
        case "Mot de Passe":
            $tmp = "Passwort";
            break;
        case "Mot(s) clé(s)":
            $tmp = "Schlüsselwörter";
            break;
        case "n'a pas été envoyée":
            $tmp = "wurde nicht versendet";
            break;
        case "n'est pas modifiable tant qu'un autre n'est pas nommé pour ce forum":
            $tmp = "kann nicht geändert werden, bis ein anderer zu diesem Forum ernannt wird";
            break;
        case "Nbre d'envois effectués":
            $tmp = "Anzahl der durchgeführten Sendungen";
            break;
        case "Ne pas enregistrer les 'hits' des auteurs dans les statistiques":
            $tmp = "Don't record the Admin's hits in stats";
            break;
        case "Ne s'applique que si la catégorie : 'Articles' n'est pas sélectionnée.":
            $tmp = "Funktioniert nur, wenn die Kategorie 'Artikeln' nicht ausgewählt ist";
            break;
        case "News externes":
            $tmp = "Informations Kanäle";
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
            $tmp = "Nutzername";
            break;
        case "Nom d'utilisateur anonyme":
            $tmp = "Name für anonyme Benutzer";
            break;
        case "Nom de fichier":
            $tmp = "Dateiname";
            break;
        case "Nom de l'annonceur":
            $tmp = "Werber Name";
            break;
        case "Nom de la Catégorie : ":
            $tmp = "Kategoriename: ";
            break;
        case "Nom de la Rubrique":
            $tmp = "Abschnitt Name";
            break;
        case "Nom de la Sous-catégorie : ":
            $tmp = "Unterkategorie Name: ";
            break;
        case "Nom de la Sous-Rubrique : ":
            $tmp = "Unterabschnitt Name:";
            break;
        case "Nom du Contact : ":
            $tmp = "Name des Kontaktes: ";
            break;
        case "Nom du Contact":
            $tmp = "Name des Kontaktes";
            break;
        case "Nom du forum":
            $tmp = "Name des Forums";
            break;
        case "Nom du produit":
            $tmp = "Produktname";
            break;
        case "Nom du serveur":
            $tmp = "Name des E-Mail-Servers";
            break;
        case "Nom du site : ":
            $tmp = "Name der Website:";
            break;
        case "Nom du site pour la balise title":
            $tmp = "Html Site Name";
            break;
        case "Nom du site":
            $tmp = "Name der Website";
            break;
        case "Nom":
            $tmp = "Name";
            break;
        case "Nombre d'article par page":
            $tmp = 'Anzahl Artikel pro Seite';
            break;
        case "Nombre d'articles dans le bloc des anciens articles":
            $tmp = "Anzahl Artikel im alten Artikelblock";
            break;
        case "Nombre d'articles en page principale":
            $tmp = "Anzahl Artikel auf Hauptseite";
            break;
        case "Nombre d'éléments dans la page top":
            $tmp = "Anzahl Elemente auf der Top-Seite";
            break;
        case "Nombre d'utilisateurs listés":
            $tmp = "Anzahl der gelisteten Benutzer";
            break;
        case "Nombre de clics sur un lien pour qu'il soit populaire":
            $tmp = "Anzahl Klicks auf einen Link, damit er beliebt wird";
            break;
        case "Nombre de contributions par page":
            $tmp = "Posts per Page";
            break;
        case "Nombre de Forum(s)":
            $tmp = "Anzahl der Foren";
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
            $tmp = "Anzahl Links pro Seite";
            break;
        case "Nombre maximum de choix pour les sondages":
            $tmp = "Max Poll Options";
            break;
        case "Nombre maximum de commentaire par utilisateur en 24H":
            $tmp = "Maximale Anzahl Kommentare pro Benutzer in 24 Stunden";
            break;
        case "Nombre maximum de contributions par IP et par période de 30 minutes (0=système inactif)":
            $tmp = "Maximum number of post per IP and per 30' period (0=system off)";
            break;
        case "Nombres d'articles en mode administration":
            $tmp = "Articles Number in Admin";
            break;
        case "Nommer":
            $tmp = "namens";
            break;
        case "non disponible":
            $tmp = "Nicht verfügbar";
            break;
        case "non optimisée":
            $tmp = "Nicht optimiert";
            break;
        case "Non":
            $tmp = "Nein";
            break;
        case "Note : ":
            $tmp = "Score:";
            break;
        case "Note":
            $tmp = "User AVG Rating";
            break;
        case "Notes":
            $tmp = "Notizen";
            break;
        case "Notifier les nouvelles contributions par E-mail":
            $tmp = "Meldung neuer Beiträge per E-Mail";
            break;
        case "Nous avons approuvé votre contribution à notre moteur de recherche.":
            $tmp = "We approved your link submission for our search engine.";
            break;
        case "Nouveau Grand Titre":
            $tmp = "Neu Informations Kanäle";
            break;
        case "Nouveau Lien ajouté dans la base de données":
            $tmp = "Neuer Link in der Datenbank hinzugefügt";
            break;
        case "Nouveaux Articles postés":
            $tmp = "New Stories Submissions";
            break;
        case "Nouvel administrateur":
            $tmp = "Neuer Administrator";
            break;
        case "Nouvel Article":
            $tmp = "Neuer Artikel";
            break;
        case "Nouvelle Catégorie ajoutée":
            $tmp = "Neue Kategorie hinzugefügt!";
            break;
        case "Nouvelles du groupe":
            $tmp = "News aus der Gruppe";
            break;
        case "Ok":
            $tmp = "Ja";
            break;
        case "Optimisation de la base de données":
            $tmp = "Datenbankoptimierung";
            break;
        case "Optimisation effectuée":
            $tmp = "Optimierung durchgeführt";
            break;
        case "optimisée":
            $tmp = "optimiert";
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
            $tmp = "Optionen für Umfragen";
            break;
        case "Options pour les Bannières":
            $tmp = "Optionen für Banner";
            break;
        case "Options pour les Commentaires":
            $tmp = "Optionen für Kommentare";
            break;
        case "Original":
            $tmp = "Original";
            break;
        case "Oter":
            $tmp = "Entfernen";
            break;
        case "ou les affecter à une autre Catégorie.":
            $tmp = "or you can Move ALL the stories to a New Category.";
            break;
        case "Oui":
            $tmp = "Ja";
            break;
        case "Page courante sans liens locaux":
            $tmp = "Index without links";
            break;
        case "Page de démarrage":
            $tmp = "Startseite";
            break;
        case "Page(s)":
            $tmp = "Seite(n)";
            break;
        case "Par défaut, rien ou Tout sauf pour ... [aucune URI] = aucune restriction":
            $tmp = "Standardmässig nichts oder alles außer ... [keine URI] = keine Beschränkungen";
            break;
        case "par exemple : genial.png":
            $tmp = "zum Beispiel: games.png";
            break;
        case "par":
            $tmp = "by";
            break;
        case "Paramètres liés à l'illustration":
            $tmp = "Illustrationseinstellungen";
            break;
        case "Paramètres":
            $tmp = "Einstellungen";
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
            $tmp = "Keine neuen Artikel gepostet";
            break;
        case "Petite Lettre D'information":
            $tmp = "Kleiner Newsletter";
            break;
        case "Pied":
            $tmp = "Fußzeilen";
            break;
        case "Port TCP":
            $tmp = "TCP-Port";
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
            $tmp = "Für Javascript-Banner nur den Javascript-Code im URL-Bereich eingeben und den Bildbereich leer lassen.";
            break;
        case "Pour les grands titres de sites de news, activer la vérification de l'existance d'un web sur le Port 80":
            $tmp = "Informations Kanäle : Überprüfung des Vorhandenseins eines Webs am Port 80 aktivieren";
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
            $tmp = "Für den automatischen Übergang zur Steuerung der nächsten(n) Charge(n): prüfen.";
            break;
        case "Précédent":
            $tmp = "Vorherige";
            break;
        case "Préférences":
            $tmp = "Einstellungen";
            break;
        case "Prévisualiser l'Article":
            $tmp = "Preview Story";
            break;
        case "Prévisualiser":
            $tmp = "Vorschau";
            break;
        case "Privé":
            $tmp = "Privat";
            break;
        case "Proposé":
            $tmp = "Proposed";
            break;
        case "Proposition de modifications de Liens":
            $tmp = "Link Modification Requests";
            break;
        case "Propriétaire de la page Web":
            $tmp = "Inhaber der Webseite";
            break;
        case "Propriétaire":
            $tmp = "Inhaber";
            break;
        case "Protocole de chiffrement":
            $tmp = "Verschlüsselungsprotokoll";
            break;
        case "Public":
            $tmp = "Public";
            break;
        case "Publication Anonyme autorisée":
            $tmp = "Anonyme Veröffentlichung erlaubt";
            break;
        case "publication(s) attachée(s)":
            $tmp = "Verbundene Veröffentlichungen";
            break;
        case "Publication(s) en attente de validation":
            $tmp = "Veröffentlichung(en), deren Validierung noch aussteht";
            break;
        case "Publications connexes":
            $tmp = "Verwandte Veröffentlichungen";
            break;
        case "publications":
            $tmp = "Veröffentlichungen";
            break;
        case "Publier dans la racine ?":
            $tmp = "Es in die Wurzel zu veröffentlichen?";
            break;
        case "Publier":
            $tmp = "Veröffentlichen";
            break;
        case "Puis votre compte pourra être supprimé.":
            $tmp = "Dann kann Ihr Konto gelöscht werden.";
            break;
        case "qu'administrateur":
            $tmp = "administrator";
            break;
        case "que membre":
            $tmp = "als Mitglied";
            break;
        case "Que voulez-vous faire ?":
            $tmp = "Was möchten Sie tun ?";
            break;
        case "Question : ":
            $tmp = "Frage:";
            break;
        case "Question":
            $tmp = "Frage";
            break;
        case "Questions & Réponses":
            $tmp = "Fragen und Antworten";
            break;
        case "Qui parle de nous ?":
            $tmp = "Wer redet von uns?";
            break;
        case "Rafraîchir":
            $tmp = "Aktualisierung";
            break;
        case "Re-prévisualiser":
            $tmp = "Vorschau Wieder";
            break;
        case "Recherche rapide":
            $tmp = "Schnelle Suche";
            break;
        case "Rechercher utilisateur":
            $tmp = "Benutzer suchen";
            break;
        case "Réessayer avec chmod automatique":
            $tmp = "Mit automatischem chmod wiederholen";
            break;
        case "Remettre cet article en première position ? : ":
            $tmp = "Den Artikel wieder an die erste Stelle setzen? ";
            break;
        case "Replier la liste":
            $tmp = "Falten Sie die Liste";
            break;
        case "Réponse : ":
            $tmp = "Antwort:";
            break;
        case "Réponse":
            $tmp = "Antwort";
            break;
        case "Requête de modification d'un Lien Utilisateur":
            $tmp = "User Link Modification Requests";
            break;
        case "Réseaux sociaux":
            $tmp = "Soziale Netzwerke";
            break;
        case "Réservé : ":
            $tmp = "Reserviert: ";
            break;
        case "Restreinte":
            $tmp = "Local";
            break;
        case "Restriction":
            $tmp = "Beschränkung";
            break;
        case "rétention en secondes":
            $tmp = "Retention in Sekunden";
            break;
        case "Rétention":
            $tmp = "Retention";
            break;
        case "Retirer un Sondage existant":
            $tmp = "Eine bestehende Umfrage entfernen";
            break;
        case "Retirer":
            $tmp = "Entfernen";
            break;
        case "Retour à l'index d'administration":
            $tmp = "Zurück zum Administration";
            break;
        case "Retour à la racine":
            $tmp = "Zurück zur Wurzel";
            break;
        case "Retour en arrière, pour changer le Nom":
            $tmp = "Zurück, um den Namen zu ändern";
            break;
        case "Retour en arrière":
            $tmp = "Zurück";
            break;
        case "Revenir aux avatars standards":
            $tmp = "Re-activate the standard'avatars";
            break;
        case "Robots/Spiders":
            $tmp = "Robots/Spiders";
            break;
        case "Rôle de l'Utilisateur":
            $tmp = "Rolle des Mitglieds";
            break;
        case "Rubrique de téléchargement":
            $tmp = "Rubrik für den Download";
            break;
        case "rubrique":
            $tmp = "Abschnitt";
            break;
        case "Rubrique":
            $tmp = "Abschnitt";
            break;
        case "Rubriques actives":
            $tmp = "Aktive Abschnitt";
            break;
        case "rubriques":
            $tmp = "Abschnitte";
            break;
        case "Rubriques":
            $tmp = "Abschnitte";
            break;
        case "S.V.P. Choisissez un sondage dans la liste suivante.":
            $tmp = "Bitte wählen Sie eine Umfrage aus der folgenden Liste.";
            break;
        case "S.V.P. entrez chaque option disponible dans un seul champ":
            $tmp = "Bitte geben Sie jede verfügbare Option in einem Feld ein";
            break;
        case "Sans nom":
            $tmp = "Namenlos";
            break;
        case "Sans réponse de votre part sous 60 jours vous ne pourrez plus vous connecter en tant que membre sur ce site.":
            $tmp = "Wenn Sie nicht innerhalb von 60 Tagen antworten, können Sie sich nicht mehr als Mitglied auf dieser Website anmelden.";
            break;
        case "Sans titre":
            $tmp = "Ohne Titel";
            break;
        case "Sauter cette étape et afficher le code du(des) bloc(s)":
            $tmp = "Uberspringe diesen Schritt und zeige den Code des (der) Blocks (Blöcke)";
            break;
        case "Sauter cette étape":
            $tmp = "Diesen Schritt überspringen";
            break;
        case "Sauvegarde de la base de données":
            $tmp = "Datenbanksicherung";
            break;
        case "Sauvegarde terminée. Les fichiers sont disponibles dans le répertoire /slogs":
            $tmp = "Speichern abgeschlossen. Die Dateien sind im Verzeichnis/Slogs verfügbar";
            break;
        case "Sauver l'Article Automatique":
            $tmp = "Save Auto Story";
            break;
        case "Sauver les modifications":
            $tmp = "Änderungen speichern";
            break;
        case "Sauver":
            $tmp = "Sichern";
            break;
        case "SavemySQL":
            $tmp = "SavemySQL";
            break;
        case "Script":
            $tmp = "Script";
            break;
        case "Sélectionner la langue du site":
            $tmp = "Wählen Sie die Site Sprache";
            break;
        case "Sélectionner la nouvelle Catégorie : ":
            $tmp = "Wählen Sie die neue Kategorie:";
            break;
        case "Sélectionner un Sujet":
            $tmp = "Auswählen eines Themas";
            break;
        case "Sélectionner une Catégorie à supprimer":
            $tmp = "Wählen Sie eine Kategorie löschen";
            break;
        case "Sélectionner une Catégorie":
            $tmp = "Wählen Sie eine Kategorie";
            break;
        case "seront affectés à":
            $tmp = "will be moved.";
            break;
        case "Serveurs de mail incorrects":
            $tmp = "Ungültiger Mailserver";
            break;
        case "Serveurs de mails contrôlés":
            $tmp = "Geprüfte Mail-Server";
            break;
        case "Seuil pour les Sujet 'chauds'":
            $tmp = "Hot Topic Threshold";
            break;
        case "Seulement aux membres":
            $tmp = "Nur für Mitglieder";
            break;
        case "Seulement aux prospects":
            $tmp = "Nur für externe Benutzer";
            break;
        case "Seulement pour ...":
            $tmp = "Nur für....";
            break;
        case "Si Super administrateur est coché, cet administrateur aura TOUS les droits.":
            $tmp = "Wenn Superadministrator aktiviert ist, erhält dieser Administrator das volle Recht.";
            break;
        case "Si vous le souhaitez, vous pouvez exécuter ce script vous même, si vous souhaitez par exemple l'exécuter sur une autre base que celle du site. Dans ce cas, pensez à reparamétrer le fichier de configuration du module.":
            $tmp = "Wenn Sie wollen, können Sie das Script selbst ausführen, wenn Sie es beispielsweise in einer anderen Datenbank verwenden wollen. In diesem Fall, denken Sie daran die Konfigdatei wieder in ihren Urzustand zu bringen.";
            break;
        case "Si vous préférez créer vous même le(s) bloc(s), cliquez sur 'Sauter cette étape et afficher le code du(des) bloc(s)' pour visualiser le code à taper dans le(s) bloc(s).":
            $tmp = "Wenn Sie den (die) Block (Blöcke) später manuell anlegen wollen klicken Sie bittte auf  '‹berspringen Sie diesen Schritt, wenn Sie die Blöcke manuell anlegen wollen.";
            break;
        case "Signature":
            $tmp = "Unterzeichnung";
            break;
        case "Sites Référents":
            $tmp = "HTTP Referer";
            break;
        case "Situation géographique":
            $tmp = "Geographische Lage";
            break;
        case "Skin d'affichage par défaut":
            $tmp = "Default Skin for your Site";
            break;
        case "Slogan du site":
            $tmp = "Slogan der Website";
            break;
        case "Sondage":
            $tmp = "Umfrage";
            break;
        case "Sondages":
            $tmp = "Umfragen";
            break;
        case "Soumission de Liens brisés":
            $tmp = "Unterwerfung der zerbrochenen Link";
            break;
        case "Sous-catégorie :":
            $tmp = "Subcat:";
            break;
        case "sous-rubrique":
            $tmp = "Unterabschnitt";
            break;
        case "Sous-rubrique":
            $tmp = "Unterabschnitte";
            break;
        case "sous-rubrique(s) attachée(s)":
            $tmp = "Verbundene Unterabschnitte";
            break;
        case "sous-rubriques":
            $tmp = "Unterabschnitte";
            break;
        case "Sous-rubriques":
            $tmp = "Unterabschnitte";
            break;
        case "Standard":
            $tmp = "Standard";
            break;
        case "Strict":
            $tmp = "Strict";
            break;
        case "Structure de la table":
            $tmp = "Tabellenstruktur";
            break;
        case "Suivant":
            $tmp = "Folgenden";
            break;
        case "Sujet : ":
            $tmp = "Topic:";
            break;
        case "Sujet de l'E-mail":
            $tmp = "Email Subject";
            break;
        case "Sujet":
            $tmp = "Thema";
            break;
        case "Sujets actifs":
            $tmp = "Aktuelle aktive Themen";
            break;
        case "Sujets par forum":
            $tmp = "Themen nach Forum";
            break;
        case "Super administrateur":
            $tmp = "Superadministrator";
            break;
        case "SuperCache":
            $tmp = "SuperCache";
            break;
        case "Suppression de table(s)":
            $tmp = "Tabelle(n) löschen";
            break;
        case "Suppression effectuée":
            $tmp = "Löschung abgeschlossen!";
            break;
        case "Supprimer cette Critique":
            $tmp = "Diese Kritik löschen";
            break;
        case "Supprimer forum du groupe":
            $tmp = "Löschen Sie die Gruppe Forum";
            break;
        case "Supprimer groupe":
            $tmp = "Gruppe löschen";
            break;
        case "Supprimer l'Annonceur":
            $tmp = "Delete Advertising Client";
            break;
        case "Supprimer la question réponse":
            $tmp = "Frage / Antwort löschen";
            break;
        case "Supprimer la rubrique":
            $tmp = "Abschnitt löschen";
            break;
        case "Supprimer la sous-rubrique":
            $tmp = "Unterabschnitt löschen";
            break;
        case "Supprimer le fichier":
            $tmp = "Delete the file";
            break;
        case "Supprimer massivement les Topics":
            $tmp = "Massive Topics delete";
            break;
        case "Supprimer MiniSite du groupe":
            $tmp = "Löschen Minisite Gruppe";
            break;
        case "Supprimer un utilisateur":
            $tmp = "Ein Mitglied löschen";
            break;
        case "Supprimer une Catégorie":
            $tmp = "Eine Kategorie löschen";
            break;
        case "Supprimer":
            $tmp = "Entfernen";
            break;
        case "Surnom":
            $tmp = "Spitzname";
            break;
        case "Synchroniser les forums":
            $tmp = "Foren synchronisieren";
            break;
        case "Système de Messagerie (Email)":
            $tmp = "Mail System";
            break;
        case "Système":
            $tmp = "System";
            break;
        case "Table":
            $tmp = "Tabelle";
            break;
        case "Tableau de Bord":
            $tmp = "Administration BlackBoard";
            break;
        case "Taille actuelle":
            $tmp = "Aktuelle Größe";
            break;
        case "Taille de fichier":
            $tmp = "Dateigröße";
            break;
        case "Taille maximum des avatars personnels (largeur * hauteur / 60*80) en pixel":
            $tmp = "Maximum size in pixel for uploaded avatars (Width * Height / 60*80)";
            break;
        case "Taille maximum des fichiers de sauvegarde SaveMysql":
            $tmp = "Maximale Größe der SaveMysql-Sicherungsdateien";
            break;
        case "Taille":
            $tmp = "Größe";
            break;
        case "Téléchargements":
            $tmp = "Downloads";
            break;
        case "Télécharger URL":
            $tmp = "Download URL";
            break;
        case "Temps de rétention en secondes":
            $tmp = "Retentionszeit in Sekunden";
            break;
        case "Texte : ":
            $tmp = "Text:";
            break;
        case "Texte complet":
            $tmp = "Volltext";
            break;
        case "Texte d'introduction":
            $tmp = "Einleitender Text";
            break;
        case "Texte du Sujet :":
            $tmp = "Topic Text:";
            break;
        case "Texte étendu":
            $tmp = "Erweiterter Text";
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
            $tmp = "Titel :";
            break;
        case "Titre de la Page des Critiques":
            $tmp = "Titel der Seite der Kritik";
            break;
        case "Titre de la page":
            $tmp = "Seitentitel";
            break;
        case "Titre du backend":
            $tmp = "Backend Title";
            break;
        case "Titre du lien : ":
            $tmp = "Linktitel:";
            break;
        case "Titre":
            $tmp = "Titel";
            break;
        case "Tous les Articles dans":
            $tmp = "Alle Artikel in";
            break;
        case "Tous les Sujets":
            $tmp = "Alle Themen";
            break;
        case "Tous les Utilisateurs":
            $tmp = "Alle Benutzer";
            break;
        case "Tous sauf pour ...":
            $tmp = "Alle außer für....";
            break;
        case "Tous vos abonnements vers cette adresse Email ont été suspendus.":
            $tmp = "Alle Ihre Abonnements für diese E-Mail-Adresse wurden gesperrt.";
            break;
        case "Tous":
            $tmp = "Alle";
            break;
        case "Tout cocher":
            $tmp = " Alle Kontrollkästchen acktivieren";
            break;
        case "Tout contenu (page/liens/etc)":
            $tmp = "Alle Inhalte (Seite / Links / etcetera)";
            break;
        case "Tout décocher":
            $tmp = "Alle Kontrollkästchen deaktivieren";
            break;
        case "Tout public":
            $tmp = "All public";
            break;
        case "Tout supprimer":
            $tmp = "Alles löschen";
            break;
        case "Toute tables. Fichier envoyé au navigateur. Pas de limite de taille":
            $tmp = "Alle Tabellen. Datei an den Browser gesendet. Keine Größenbeschränkung";
            break;
        case "Toutes les souscriptions de ces utilisateurs ont été suspendues.":
            $tmp = "Alle Abonnements dieser Benutzer wurden ausgesetzt.";
            break;
        case "Transférer à Droite":
            $tmp = "Übertragungsrecht";
            break;
        case "Transférer à Gauche":
            $tmp = "Move to Left-side";
            break;
        case "Transitional":
            $tmp = "Transitional";
            break;
        case "Transmission LNL en cours":
            $tmp = "Übertragung LNL im Gange";
            break;
        case "Type :":
            $tmp = "Typ:";
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
            $tmp = "Typ";
            break;
        case "Un message privé leur a été envoyé sans réponse à ce message sous 60 jours ces utilisateurs ne pourront plus se connecter au site.":
            $tmp = "Eine private Nachricht wurde innerhalb von 60 Tagen ohne Antwort auf diese Nachricht an diese Benutzer gesendet. Diese Benutzer können sich nicht mehr mit der Site verbinden.";
            break;
        case "Une erreur est survenue lors de l'exécution du script SQL. Mysql a répondu :":
            $tmp = "Ein Fehler ist aufgetreten während das SQL Script ausgeführt wurde. Mysql Antwort:";
            break;
        case "Une erreur est survenue lors de la configuration du(des) bloc(s). Mysql a répondu :":
            $tmp = "Es gab einen Fehler beim anlegen des (der) Blocks (Blöcke):";
            break;
        case "Une fois que vous aurez validé cette publication, elle sera intégrée en base temporaire, et l'administrateur sera prévenu. Il visera cette publication et la mettra en ligne dans les meilleurs délais.Il est normal que pour l'instant, cette publication n'apparaisse pas dans l'arborescence.":
            $tmp = "Once that you will have validated this publication, it will be integrated in temporary base, and the administrator will be warned. He will aim this publication.<br/> It is normal than for the moment, this publication does not appear in the tree structure.";
            break;
        case "Upload":
            $tmp = "Upload";
            break;
        case "URL : ":
            $tmp = "URL:";
            break;
        case "URL de l'image du backend":
            $tmp = "Backend Image URL";
            break;
        case "URL de l'image":
            $tmp = "Bild-URL";
            break;
        case "URL de la Page":
            $tmp = "Seite-URL";
            break;
        case "URL du clic":
            $tmp = "Klick-URL";
            break;
        case "URL du site":
            $tmp = "Site-URL";
            break;
        case "URL pour le fichier RDF/XML":
            $tmp = "URL für RDF / XML-Datei";
            break;
        case "Url":
            $tmp = "Url";
            break;
        case "URL":
            $tmp = "URL";
            break;
        case "Utilisateur en attente de groupe !":
            $tmp = "Benutzer wartet auf Gruppe!";
            break;
        case "Utilisateur en attente de validation !":
            $tmp = "Benutzer warten auf Bestätigung !";
            break;
        case "Utilisateur enregistré uniquement":
            $tmp = "Nur registrierter Benutzer";
            break;
        case "Utilisateur enregistré":
            $tmp = "Registrierter Benutzer";
            break;
        case "Utilisateur inexistant !":
            $tmp = "Nicht vorhandener Benutzer!";
            break;
        case "Utilisateur":
            $tmp = "Benutzer";
            break;
        case "Utilisateurs":
            $tmp = "Benutzer";
            break;
        case "Utiliser 587 si vous avez activé le chiffrement TLS":
            $tmp = "Verwenden Sie 587, wenn Sie die TLS-Verschlüsselung aktiviert haben";
            break;
        case "Validation de votre publication":
            $tmp = "Freigabe für Ihre Veröffentlichung";
            break;
        case "Valider":
            $tmp = "Akzeptieren";
            break;
        case "Version":
            $tmp = "Version";
            break;
        case "Veuillez choisir un type de META-MOT":
            $tmp = "Bitte wählen Sie einen META-MOT Typ";
            break;
        case "Veuillez configurer manuellement le(s) bloc(s).":
            $tmp = "Bitte konfigurieren Sie den (die) Block (Blöcke) manuell.";
            break;
        case "Veuillez éditer ce fichier manuellement ou réessayez en tentant de faire un chmod automatique sur le(s) fichier(s) concernés.":
            $tmp = "Editieren Sie die Datei von Hand oder gehen Sie zurück und wählen Sie den automatischen chmod aus.";
            break;
        case "Veuillez l'exécuter manuellement via phpMyAdmin.":
            $tmp = "Bitte manuell ausführen unter phpMyAdmin.";
            break;
        case "Veuillez nommer différement ce nouveau META-MOT":
            $tmp = "Please choose another name for this new META-MOT";
            break;
        case "Vider le répertoire cache":
            $tmp = "Empty the Cache Directory";
            break;
        case "Visite":
            $tmp = "Besuch";
            break;
        case "Visiter le site web":
            $tmp = "Besuchen Sie die Website";
            break;
        case "Visiter":
            $tmp = "Besuchen";
            break;
        case "Visualiser":
            $tmp = "Anzeigen";
            break;
        case "Voici la description du(des) bloc(s) qui sera(seront) créé(s) :":
            $tmp = "Hier ist die Beschreibung der angelegten Blöcke:";
            break;
        case "Voici le code à taper dans le fichier :":
            $tmp = "Hier ist der Code den Sie in die Datei eintragen müssen:";
            break;
        case "Voici le code des bloc(s) :":
            $tmp = "Hier ist der Code des (der) Blocks (Blöcke):";
            break;
        case "Voici le script SQL :":
            $tmp = "Hier ist das SQL Script:";
            break;
        case "Voir les forums de cette catégorie":
            $tmp = "Internetforen in dieser Kategorie anzeigen";
            break;
        case "Voir":
            $tmp = "Sehen";
            break;
        case "Vos droits de publications vous permettent de mettre à jour ou de supprimer ce contenu mais pas de la mettre en ligne sur le site.":
            $tmp = "Your rights of publications enable you to update or to remove this content but not to put it on line.";
            break;
        case "Vos droits de publications vous permettent de mettre à jour, de supprimer ou de le mettre en ligne sur le site ce contenu.":
            $tmp = "Your rights of publications enable you to update, to remove or to put on line this content.";
            break;
        case "Vos MétaTags ont été modifiés avec succès !":
            $tmp = "Ihre MetaTags wurden erfolgreich modifiziert!";
            break;
        case "Vote fermé":
            $tmp = "Geschlossene Abstimmung";
            break;
        case "Vote":
            $tmp = "Abstimmung";
            break;
        case "Votre adresse Email est incorrecte.":
            $tmp = "Ihre E-Mail-Adresse ist falsch.";
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
            $tmp = "Sie werden an alle Mitglieder der Gruppe ausgeschlossen";
            break;
        case "Vous allez supprimer le groupe":
            $tmp = "Sie entfernen die Gruppe";
            break;
        case "Vous avez choisi de configurer manuellement vos blocs. Voici le contenu de ceux-ci :":
            $tmp = "Wählen Sie die manuelle Konfiguration des (der) Blocks (Blöcke). Hier ist der Inhalt:";
            break;
        case "Vous devez désinstaller le module manuellement. Pour cela, référez vous au fichier install.txt de l'archive du module, et faites les opérations inverses de celles décrites dans la section \"Installation manuelle\", et en partant de la fin.":
            $tmp = "Sie müssen das Addon manuell deinstallieren. Lesen Sie dazu die install.txt Datei und führen Sie die nötigen Schritte umgekehrt aus \"Installation manuell\", und beginnen Sie am Ende.";
            break;
        case "Vous devez remplir tous les Champs":
            $tmp = "Sie müssen in allen Feldern des Formulars ausfüllen";
            break;
        case "vous devez supprimer TOUS ses membres !":
            $tmp = "Sie müssen löschen alle seine Mitglieder!";
            break;
        case "Vous devez vous identifier aussi en tant que membre pour utiliser cette fonction.":
            $tmp = "You must be ALSO connected as a member to use this function.";
            break;
        case "Vous êtes sur le point de supprimer cet annonceur : ":
            $tmp = "You are about to delete client:";
            break;
        case "Vous faites désormais partie des membres du groupe":
            $tmp = "Sie sind nun Teil der Gruppe";
            break;
        case "Vous ne faites plus partie des membres du groupe":
            $tmp = "Sie sind nicht mehr Teil der Gruppe";
            break;
        case "Vous ne pouvez pas exclure":
            $tmp = "Sie können nicht ausschlieﬂen,";
            break;
        case "Vous pouvez choisir maintenant de créer automatiquement un(des) bloc(s) à droite ou à gauche. Cliquer sur \"Créer le(s) bloc(s) à gauche\" ou \"Créer le(s) bloc(s) à droite\" selon votre choix. (Vous pourrez changer leurs positions par la suite dans le panneau d'administration --> Blocs)":
            $tmp = "Sie können sich jetzt aussuchen, ob automatisch ein oder mehrere Blöcke links und oder rechts angelegt werden sollen. Klicken Sie auf \"Erstelle den(die) Block(Blöcke) links \" oder \"Erstelle den (die) Block (Blöcke) rechts\" nach Ihrer Wahl. (Sie können deren Position später ändern unter Administration --> Blöcke)";
            break;
        case "Vous pouvez simplement Effacer / Modifier les Critiques en naviguant sur":
            $tmp = "Sie können hier einfach Kritiken löschen/ändern";
            break;
        case "Vous pouvez supprimer la Catégorie, les Articles et Commentaires":
            $tmp = "Sie können Kategorie, Artikel und Kommentare löschen";
            break;
        case "Vous pouvez utiliser notre moteur de recherche sur : ":
            $tmp = "You can browse our search engine at:";
            break;
        default:
            $tmp = "Es gibt keine Übersetzung [** $phrase **]";
            break;
    }
    return (htmlentities($tmp, ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401, 'UTF-8'));
}