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
            $tmp = "Lunes";
            break;
        case "Tuesday":
            $tmp = "Martes";
            break;
        case "Wednesday":
            $tmp = "Miércoles";
            break;
        case "Thursday":
            $tmp = "Jueves";
            break;
        case "Friday":
            $tmp = "Viernes";
            break;
        case "Saturday":
            $tmp = "Sábado";
            break;
        case "Sunday":
            $tmp = "Domingo";
            break;
        case "January":
            $tmp = "Enero";
            break;
        case "February":
            $tmp = "Febrero";
            break;
        case "March":
            $tmp = "Marzo";
            break;
        case "April":
            $tmp = "Abril";
            break;
        case "May":
            $tmp = "Mayo";
            break;
        case "June":
            $tmp = "Junio";
            break;
        case "July":
            $tmp = "Julio";
            break;
        case "August":
            $tmp = "Agosto";
            break;
        case "September":
            $tmp = "Septiembre";
            break;
        case "October":
            $tmp = "Octubre";
            break;
        case "November":
            $tmp = "Noviembre";
            break;
        case "December":
            $tmp = "Diciembre";
            break;
        case "english":
            $tmp = "Inglés";
            break;
        case "french":
            $tmp = "Francés";
            break;
        case "spanish":
            $tmp = "Español";
            break;
        case "chinese":
            $tmp = "Chino";
            break;
        case "german":
            $tmp = "Alemán";
            break;

        case "0":
            $tmp = "cero";
            break;
        case "1":
            $tmp = "uno";
            break;
        case "2":
            $tmp = "dos";
            break;
        case "3":
            $tmp = "tres";
            break;
        case "4":
            $tmp = "cuatro";
            break;
        case "5":
            $tmp = "cinco";
            break;
        case "6":
            $tmp = "seis";
            break;
        case "7":
            $tmp = "seite";
            break;
        case "8":
            $tmp = "ocho";
            break;
        case "9":
            $tmp = "nueve";
            break;
        case "+":
            $tmp = "mas";
            break;
        case "-":
            $tmp = "menos";
            break;
        case "/":
            $tmp = "dividir por";
            break;
        case "*":
            $tmp = "multiplicado por";
            break;

        case " le...":
            $tmp = " el...";
            break;
        case "-Identifiant : ":
            $tmp = "-Identificación : ";
            break;
        case "-Mot de passe : ":
            $tmp = "-Contraseña : ";
            break;
        case ".:Page >> Super-Cache:.":
            $tmp = ".:Página  >> Super-Cache:.";
            break;
        case "(255 caractères max. Entrez votre signature (mise en forme html))":
            $tmp = "(255 caracteres max. Su firma (conformidad HTML))";
            break;
        case "(255 caractères max). Précisez qui vous êtes, ou votre identification sur ce site)":
            $tmp = "(255 caracteres max. Diga quien es, o su función en este portal)";
            break;
        case "(Cette adresse Email ne sera pas divulguée, mais elle nous servira à vous envoyer votre Mot de Passe si vous le perdez)":
            $tmp = "(Este E-mail quedara escondido, Solo servirá para enviarle una nueva contraseña si la pide)";
            break;
        case "(Cette adresse Email sera publique. Vous pouvez saisir ce que vous voulez mais attention au Spam)":
            $tmp = "(Este E-mail sera publico. Ponga cualquiera, pero cuidado con el SPAM)";
            break;
        case "(indispensable)":
            $tmp = "(Necesario)";
            break;
        case "(optionnel)":
            $tmp = "(opcional)";
            break;
        case "(Pour activer un nouveau mot de passe, introduisez-le dans les 2 cases)":
            $tmp = "(Para activar una nueva contraseña, confírmela en la segunda casilla)";
            break;
        case "* Désigne un champ obligatoire":
            $tmp = "* Campo obligatorio";
            break;
        case "0 : illimité / 1 à":
            $tmp = "0 : Sin limite de tiempo / 1 a";
            break;
        case "à : ":
            $tmp = "a : ";
            break;
        case "à cette personne : ":
            $tmp = "a esta persona : ";
            break;
        case "a écrit :":
            $tmp = "Escribió :";
            break;
        case "a été envoyé à":
            $tmp = "Fue enviada a";
            break;
        case "A propos des messages publiés :":
            $tmp = "Todo sobre los mensajes privados";
            break;
        case "a trouvé cet article intéressant et a souhaité vous l'envoyer.":
            $tmp = "encontró esta noticia interesante y desea que le eche un vistazo";
            break;
        case "a trouvé notre site":
            $tmp = "considera que nuestra página  web";
            break;
        case "à":
            $tmp = "a";
            break;
        case "Abon.":
            $tmp = "Abon.";
            break;
        case "Abonnement":
            $tmp = "Suscribirse";
            break;
        case "Accepter":
            $tmp = "Aceptar";
            break;
        case "Accessible à tous":
            $tmp = "Accesible a todos";
            break;
        case "Activé":
            $tmp = "Activado";
            break;
        case "Activer votre menu personnel":
            $tmp = "Activar el Menú personal";
            break;
        case "Activité du site":
            $tmp = "Actividad del sitio web";
            break;
        case "Activité":
            $tmp = "Su actividad";
            break;
        case "Actuellement connecté en administrateur... Cette critique sera":
            $tmp = "Actualmente conectado como administrador... esta critica sera";
            break;
        case "Administrateur : ":
            $tmp = "Administrador : ";
            break;
        case "Adresse DNS de l'utilisateur : ":
            $tmp = "Dirección DNS del usuario : ";
            break;
        case "Adresse IP de l'utilisateur : ":
            $tmp = "Dirección IP del usuario : ";
            break;
        case "Adresse":
            $tmp = "Dirección";
            break;
        case "Adresses IP et informations sur les utilisateurs":
            $tmp = "Direcciones IP e informaciones sobre las cuentas de los usuarios";
            break;
        case "Affichage filtré pour":
            $tmp = "Visionado filtrado por";
            break;
        case "Afficher ce commentaire":
            $tmp = "Mostrar este comentario";
            break;
        case "Afficher ce post":
            $tmp = "Mostrar este mensaje";
            break;
        case "Afficher la signature":
            $tmp = "Mostrar firma";
            break;
        case "Ajouté :":
            $tmp = "Insertado :";
            break;
        case "Ajouté le : ":
            $tmp = "Insertado el : ";
            break;
        case "ajouté":
            $tmp = "insertado";
            break;
        case "Ajouter à la liste de diffusion":
            $tmp = "Agregar al lista de correo";
            break;
        case "Ajouter la date et l'heure":
            $tmp = "Añadir la fecha y la hora";
            break;
        case "Ajouter un article":
            $tmp = "Añadir un articulo";
            break;
        case "Ajouter un édito":
            $tmp = "Añadir un editorial";
            break;
        case "Ajouter un nouveau lien":
            $tmp = "Añadir une nuevo vinculo";
            break;
        case "Ajouter une catégorie principale":
            $tmp = "Añadir una categoría principal";
            break;
        case "Ajouter une sous-catégorie":
            $tmp = "Añadir una sub-categoria";
            break;
        case "Ajouter une url":
            $tmp = "Insertar une URL";
            break;
        case "Ajouter":
            $tmp = "Insertar";
            break;
        case "Aller à la page":
            $tmp = "Ir a la página";
            break;
        case "Anciens articles":
            $tmp = "Noticias anteriores";
            break;
        case "Anciens sondages":
            $tmp = "Encuestas anteriores";
            break;
        case "Année":
            $tmp = "Año";
            break;
        case "Annuler l'envoi":
            $tmp = "Cancelar el envío";
            break;
        case "Annuler la contribution":
            $tmp = "Anular la contribución";
            break;
        case "Annuler la réponse":
            $tmp = "Anular la respuesta";
            break;
        case "Annuler":
            $tmp = "Anular";
            break;
        case "Anonyme":
            $tmp = "Anónimo";
            break;
        case "Anti-Spam / Merci de répondre à la question suivante : ":
            $tmp = "Anti-Spam / Merci de répondre à la question suivante : ";
            break;
        case "Août":
            $tmp = "Agosto";
            break;
        case "Aperçu des sujets :":
            $tmp = "Pre visualizar los asuntos";
            break;
        case "Archives":
            $tmp = "Archivos";
            break;
        case "Article de":
            $tmp = "Noticias de";
            break;
        case "Article du Jour":
            $tmp = "Noticia de hoy";
            break;
        case "Article en attente d'édition":
            $tmp = "Noticias que esperan para ser publicadas";
            break;
        case "Article intéressant sur":
            $tmp = "Noticia interesante de";
            break;
        case "Articles envoyés : ":
            $tmp = "Noticias enviadas : ";
            break;
        case "Articles les plus commentés":
            $tmp = "Noticias las mas comentadas";
            break;
        case "Articles les plus lus dans les rubriques spéciales":
            $tmp = "Noticias las mas leídas en las secciones especiales";
            break;
        case "articles les plus lus":
            $tmp = "Noticias las mas leídas";
            break;
        case "Articles plus anciens":
            $tmp = "Noticias mas ancianas";
            break;
        case "Articles présents dans les rubriques":
            $tmp = "Noticias presentes en las secciones";
            break;
        case "Articles publiés : ":
            $tmp = "Noticias publicadas : ";
            break;
        case "Articles publiés":
            $tmp = "Noticias publicadas";
            break;
        case "Articles":
            $tmp = "Noticias";
            break;
        case "Assurez-vous de l'exactitude de votre information avant de la communiquer. N'écrivez pas en majuscules, votre texte serait automatiquement rejeté":
            $tmp = "Asegúrese de la veracidad de las informaciones que somete. No escriba todo en mayúsculas, su texto sera automáticamente borrado !";
            break;
        case "ATTENTION : Etes-vous certain de vouloir effacer cette catégorie et tous ses Liens ?":
            $tmp = "ATENCION : Esta seguro que quiere borrar esta categoría y todos sus vínculos ?";
            break;
        case "Attention à votre expression écrite. Vous pouvez utiliser du code html si vous savez le faire":
            $tmp = "Presta atención a tu expresión escrita. Puedes usar el código html si sabes cómo hacerlo";
            break;
        case "Aucun édito n'est disponible pour ce site":
            $tmp = "Ningún Editorial disponible para este sitio web";
            break;
        case "Aucun membre trouvé pour":
            $tmp = "No se encontró ningún miembro por";
            break;
        case "Aucun nom n'a été entré":
            $tmp = "No se entro ningún nombre";
            break;
        case "Aucune catégorie":
            $tmp = "Ninguna categoría";
            break;
        case "Aucune correspondance à votre recherche n'a été trouvée":
            $tmp = "Ninguna correspondencia a su búsqueda fue encontrada";
            break;
        case "Aucune langue":
            $tmp = "Ningún idioma";
            break;
        case "Aucune nouvelle contribution depuis votre dernière visite.":
            $tmp = "Ninguna contribución desde su última visita.";
            break;
        case "Aucune réponse pour les mots que vous cherchez. Elargissez votre recherche.":
            $tmp = "Ninguna respuesta por las palabras que indico. Ensanche su búsqueda.";
            break;
        case "Auteur":
            $tmp = "Autor";
            break;
        case "Auteur":
            $tmp = "Autor";
            break;
        case "Auteurs actifs":
            $tmp = "Autores activos";
            break;
        case "Auteurs de news les plus regardées":
            $tmp = "Autores de noticias los mas prolíficos";
            break;
        case "Auteurs les plus actifs":
            $tmp = "Autores los más activos";
            break;
        case "Autoriser la création automatique des membres ?":
            $tmp = "Autorizar la creación automática de miembros ?";
            break;
        case "Autoriser la validation automatique des offres ?":
            $tmp = "Autorizar la validación automática de las ofertas ?";
            break;
        case "Autoriser les autres utilisateurs à voir mon Email":
            $tmp = "Autorizar los otros usuarios a ver mi E-mail";
            break;
        case "Autres publications de la sous-rubrique":
            $tmp = "Otras publicaciones de la sub-categoría";
            break;
        case "Autres":
            $tmp = "Otros";
            break;
        case "Avatar : ":
            $tmp = "Avatar : ";
            break;
        case "Avatar":
            $tmp = "Avatar";
            break;
        case "Avril":
            $tmp = "Abril";
            break;
        case "Bannière":
            $tmp = "Banner";
            break;
        case "Bannières - Publicité":
            $tmp = "Banners - Publicidad";
            break;
        case "Bannières actives pour":
            $tmp = "Banners activadas para";
            break;
        case "Bannières terminées pour":
            $tmp = "Banners terminada por";
            break;
        case "Bannir cette @Ip":
            $tmp = "Prohibición de la @IP";
            break;
        case "Bas de page":
            $tmp = "Página inferior";
            break;
        case "Bienvenue au dernier membre affilié : ":
            $tmp = "Bienvenido al ultimo miembro inscrito : ";
            break;
        case "Bienvenue dans la rubrique des critiques":
            $tmp = "Bienvenidos a la sección de criticas";
            break;
        case "Bienvenue sur la page de garde de":
            $tmp = "Bienvenidos a la página  TOP para";
            break;
        case "Bienvenue sur":
            $tmp = "Bienvenidos a";
            break;
        case "Bloc Chat":
            $tmp = "Chat bloc";
            break;
        case "Blog du groupe.":
            $tmp = "Grupo blog.";
            break;
        case "Boîte d'émission":
            $tmp = "Buzón de envío";
            break;
        case "Boîte de réception":
            $tmp = "Buzón de recepción";
            break;
        case "Bonjour":
            $tmp = "Buenos días";
            break;
        case "Caché":
            $tmp = "Escondido";
            break;
        case "caractères au minimum":
            $tmp = "caracteres como mínimo";
            break;
        case "caractères de plus":
            $tmp = "caracteres de mas";
            break;
        case "caractères":
            $tmp = "caracteres";
            break;
        case "Carnet d'adresses":
            $tmp = "Carnet de direcciones";
            break;
        case "Catégorie : ":
            $tmp = "Categoría : ";
            break;
        case "Catégorie : ":
            $tmp = "Categoría : ";
            break;
        case "Catégorie :":
            $tmp = "Categoría :";
            break;
        case "Catégorie":
            $tmp = "Categoría";
            break;
        case "Catégories dans la rubrique des liens web":
            $tmp = "Categorías en la página  de vínculos web";
            break;
        case "Catégories les plus actives":
            $tmp = "Categorías las mas activas";
            break;
        case "Catégories":
            $tmp = "Categorías";
            break;
        case "Ce fichier n'existe pas ...":
            $tmp = "El fichero no existe en el servidor ...";
            break;
        case "Ce nom n\'est pas disponible":
            $tmp = "Este nombre no está disponible";
            break;
        case "Ce sujet est verrouillé : il ne peut accueillir aucune nouvelle contribution.":
            $tmp = "Este Tema esta cerrado : no se pueden añadir mas Asuntos.";
            break;
        case "Ce surnom n\'est pas disponible":
            $tmp = "Este apodo no está disponible";
            break;
        case "Ceci est un forum privé. Vous devez entrer le mot de passe pour y accéder":
            $tmp = "Este es un foro privado. Incorporar por favor la contraseña para acceder";
            break;
        case "Cela peut être retiré ou ajouté dans vos paramètres personnels":
            $tmp = "Esto se puede cambiar en su perfil";
            break;
        case "Cela pourrait vous intéresser":
            $tmp = "Esto podría interesarle";
            break;
        case "Cela semble-t-il correct ?":
            $tmp = "Le parece correcto ?";
            break;
        case "Centres d'interêt":
            $tmp = "Sus centros de interés";
            break;
        case "Cet article provient de":
            $tmp = "Esta noticia proviene de";
            break;
        case "Cet utilisateur n'existe pas, refaites un essai.":
            $tmp = "El usuario seleccionado no existe, inténtelo de nuevo.";
            break;
        case "Cette bannière est affichée sur l'url":
            $tmp = "Este banner señala la URL";
            break;
        case "Cette donnée ne doit pas être vide.":
            $tmp = "Este dato no debe estar vacío.";
            break;
        case "Cette option changera l'aspect du site.":
            $tmp = "Esta opción cambiara el aspecto de la página  web.";
            break;
        case "Change le statut à OK / Supprime la demande":
            $tmp = "Cambia el estatuto a OK / suprime la demanda";
            break;
        case "Changer le thème":
            $tmp = "Cambiar de tema";
            break;
        case "Changer":
            $tmp = "Changer";
            break;
        case "Chaque utilisateur peut voir le site avec un thème graphique différent.":
            $tmp = "Cada usuario puede ver el sitio web con su tema gráfico escogido.";
            break;
        case "Chargement de fichiers":
            $tmp = "Sección de descarga";
            break;
        case "Chargements":
            $tmp = "Descargas";
            break;
        case "Charger le fichier immédiatement !":
            $tmp = "Descargar ahora !";
            break;
        case "Charger maintenant":
            $tmp = "Descargar ahora!";
            break;
        case "Charger un fichier une fois l'envoi accepté":
            $tmp = "Descargar un fichero una vez el envío aceptado";
            break;
        case "Chat du groupe.":
            $tmp = "Grupo de chat.";
            break;
        case "Chercher : ":
            $tmp = "Buscar : ";
            break;
        case "Chercher n'importe quel terme (par défaut)":
            $tmp = "Buscar cualquier termino (por defecto)";
            break;
        case "Chercher tous les mots":
            $tmp = "Buscar todas las palabras";
            break;
        case "Choisir entre 1 et 10 (1=nul 10=excellent)":
            $tmp = "Seleccione entre 1 y 10 (1=malo 10=Excelente)";
            break;
        case "Choisir un dossier/sujet":
            $tmp = "Elegir carpeta / sujeto";
            break;
        case "Choisir un look différent pour le site (si plusieurs proposés)":
            $tmp = "Escoger un tema diferente para el sitio web (si varios propuestos)";
            break;
        case "Choisir une charte graphique":
            $tmp = "Elegir un tema gráfico";
            break;
        case "Choisir une langue":
            $tmp = "Escoja un idioma";
            break;
        case "Citation":
            $tmp = "Citación";
            break;
        case "Classé par ordre de : ":
            $tmp = "Clasificado por orden de : ";
            break;
        case "Classé par":
            $tmp = "Clasificado por";
            break;
        case "Classement":
            $tmp = "Clasificación";
            break;
        case "Classer ce message":
            $tmp = "Clasificar este mensaje";
            break;
        case "Clics":
            $tmp = "Clics";
            break;
        case "Cliquez ici pour entrer":
            $tmp = "Haga clic aquí para entrar";
            break;
        case "Cliquez ici pour lire votre nouveau message.":
            $tmp = "Haga clic aquí para leer su mensaje.";
            break;
        case "Cliquez ici pour revenir à l'index des Forums.":
            $tmp = "Haga click aquí para volver al índice del foro.";
            break;
        case "Cliquez ici pour voir la mise à jour":
            $tmp = "Haga click aquí para ver la actualización";
            break;
        case "Cliquez ici pour voir le nouveau sujet.":
            $tmp = "Haga clic aquí para ver el nuevo asunto.";
            break;
        case "Cliquez pour insérer des emoji dans votre message":
            $tmp = "Haga click en los emoji para insertarlos en su mensaje";
            break;
        case "Cliquez pour voir la liste des articles de ce sujet":
            $tmp = "Haga clic para ver las noticias en este asunto";
            break;
        case "Co-rédaction":
            $tmp = "Co-escrito";
            break;
        case "Cochez et cliquez sur le bouton OK pour recevoir un Email lors d'une nouvelle soumission dans ce forum.":
            $tmp = "Cochez et cliquez sur le bouton OK pour recevoir un Email lors d'une nouvelle soumission dans ce forum.";
            break;
        case "Cochez un forum et cliquez sur le bouton pour recevoir un Email lors d'une nouvelle soumission dans celui-ci.":
            $tmp = "Cochez un forum et cliquez sur le bouton pour recevoir un Email lors d'une nouvelle soumission dans celui-ci.";
            break;
        case "Code d'erreur :":
            $tmp = "Código de error :";
            break;
        case "Code html autorisé : ":
            $tmp = "HTML Autorizado : ";
            break;
        case "Code postal":
            $tmp = "Código postal";
            break;
        case "Code":
            $tmp = "Código";
            break;
        case "Coller l'ID de votre vidéo entre les deux balises":
            $tmp = "Pegue la identificación del video entre las etiquetas";
            break;
        case "Commentaire à propos d'une critique :":
            $tmp = "Comentarios sobre una critica :";
            break;
        case "Commentaire":
            $tmp = "Comentario";
            break;
        case "Commentaire":
            $tmp = "Comentario";
            break;
        case "Commentaire(s) : ":
            $tmp = "Comentario(s) : ";
            break;
        case "Commentaire(s)":
            $tmp = "Comentario(s)";
            break;
        case "Commentaires ?":
            $tmp = "Comentarios ?";
            break;
        case "Commentaires postés : ":
            $tmp = "Comentarios insertados : ";
            break;
        case "Commentaires":
            $tmp = "Comentarios";
            break;
        case "Compte ou adresse IP désactivée. Cet émetteur a participé plus de x fois dans les dernières heures, merci de contacter le webmaster pour déblocage.":
            $tmp = "Cuenta o dirección IP desactivada. Este usuario participo mas x veces en las ultimas horas ! Contacte el Webmaster del sitio web.";
            break;
        case "Compteur":
            $tmp = "Contador";
            break;
        case "Configurer":
            $tmp = "Configurar";
            break;
        case "Confirmation du code pour":
            $tmp = "Confirmación de código para";
            break;
        case "Connexion autorisée":
            $tmp = "Conexión permitido";
            break;
        case "Connexion non autorisée":
            $tmp = "Conexión no autorizada";
            break;
        case "Connexion":
            $tmp = "Conexión";
            break;
        case "Conserver une copie":
            $tmp = "Conservar una copia";
            break;
        case "Consulter l'adresse IP":
            $tmp = "Consultar la dirección IP";
            break;
        case "Contributeur(s)":
            $tmp = "Colaborador(es)";
            break;
        case "Contributeurs":
            $tmp = "Colaboradores";
            break;
        case "Contribution de":
            $tmp = "Contribución de";
            break;
        case "Contributions":
            $tmp = "Discusiones";
            break;
        case "Créer un compte":
            $tmp = "Crear una cuenta";
            break;
        case "Créer":
            $tmp = "Crear";
            break;
        case "Critique":
            $tmp = "Critica";
            break;
        case "Critique(s) trouvée(s).":
            $tmp = "Critica(s) encontrada(s).";
            break;
        case "Critiques les plus lues":
            $tmp = "Las criticas más leídas";
            break;
        case "critiques les plus populaires":
            $tmp = "Las criticas mas populares";
            break;
        case "critiques les plus récentes":
            $tmp = "Las criticas mas recientes";
            break;
        case "Critiques pour la lettre":
            $tmp = "Criticas para la letra";
            break;
        case "critiques":
            $tmp = "criticas";
            break;
        case "Critiques":
            $tmp = "Criticas";
            break;
        case "Critiques":
            $tmp = "Criticas";
            break;
        case "Croissant":
            $tmp = "Ascendente";
            break;
        case "dans la sous-rubrique":
            $tmp = "En la sub-categoría";
            break;
        case "dans":
            $tmp = "en";
            break;
        case "Date :":
            $tmp = "Fecha :";
            break;
        case "Date (les liens les plus récents en premier)":
            $tmp = "Fecha (Los más recientes primero)";
            break;
        case "Date (les plus vieux liens en premier)":
            $tmp = "Fecha (Los más antiguos primero)";
            break;
        case "Date de chargement sur le serveur":
            $tmp = "Fecha del Upload en el servidor";
            break;
        case "Date de création":
            $tmp = "Fecha de creación";
            break;
        case "Date de début":
            $tmp = "Fecha de comienzo";
            break;
        case "Date de fin de publication":
            $tmp = "Fecha de fin de publicación";
            break;
        case "Date de fin":
            $tmp = "Fecha de fin";
            break;
        case "Date de publication":
            $tmp = "Fecha de publicación";
            break;
        case "Date":
            $tmp = "Fecha";
            break;
        case "de":
            $tmp = "de";
            break;
        case "de":
            $tmp = "de";
            break;
        case "de":
            $tmp = "de";
            break;
        case "de":
            $tmp = "De";
            break;
        case "Début de l'article":
            $tmp = "Principio de la noticia";
            break;
        case "Décembre":
            $tmp = "Diciembre";
            break;
        case "Déconnexion":
            $tmp = "Desconectar";
            break;
        case "Décroissant":
            $tmp = "Descendiente";
            break;
        case "demandes en cours pour le même utilistaeur.":
            $tmp = "Pedidos del mismo usuario";
            break;
        case "Déplacer ce sujet":
            $tmp = "Desplazar este Asunto";
            break;
        case "Déplacer le sujet vers : ":
            $tmp = "Desplazar el asunto a : ";
            break;
        case "Déplacer le sujet":
            $tmp = "Desplazar el asunto";
            break;
        case "Déplier la liste":
            $tmp = "Mostrar la lista";
            break;
        case "Dernier éditeur":
            $tmp = "último editor";
            break;
        case "Dernière contribution":
            $tmp = "Ultima publicacion";
            break;
        case "Dernières contributions":
            $tmp = "Ultimas publicaciones";
            break;
        case "Dernières stats":
            $tmp = "Ultimas estadísticas";
            break;
        case "Derniers articles":
            $tmp = "Derniers articles";
            break;
        case "Dès maintenant disponible dans la base de données des critiques.":
            $tmp = "Está disponible ahora en la base de datos de las criticas.";
            break;
        case "Désabonnement":
            $tmp = "Desabonarse";
            break;
        case "Désactivé":
            $tmp = "Desactivado";
            break;
        case "Désactiver le html pour cet envoi":
            $tmp = "Desactivar el código HTML para este envío";
            break;
        case "Description : ":
            $tmp = "Descripción : ";
            break;
        case "Description : (255 caractères max)":
            $tmp = "Descripción :  (255 caracteres máximo)";
            break;
        case "Description:":
            $tmp = "Descripción:";
            break;
        case "Description":
            $tmp = "Descripción";
            break;
        case "Désolé, aucune information correspondante pour cet utlilisateur n'a été trouvée":
            $tmp = "Lo sentimos, no se encontró ninguna información correspondiente a este usuario";
            break;
        case "Désolé, votre mot de passe doit faire au moins":
            $tmp = "Lo sentimos, pero su contraseña debe hacer al menos";
            break;
        case "Destinataire":
            $tmp = "Destinatario";
            break;
        case "Détails supplémentaires":
            $tmp = "Detalles suplementarios";
            break;
        case "Details":
            $tmp = "Detalles";
            break;
        case "Devenez membre et vous disposerez de fonctions spécifiques : abonnements, forums spéciaux (cachés, membres, ..), statut de lecture, ...":
            $tmp = "Inscriba se ahora ! Dispondrá de funciones especiales : Abonos, foros especiales (Escondidos, miembros, ..), status de lectura, ...";
            break;
        case "Devenez membre privilégié en cliquant":
            $tmp = "Conviértase en miembro privilegiado haciendo click";
            break;
        case "Dimanche":
            $tmp = "Domingo";
            break;
        case "Disposer d'un bloc que vous seul verrez dans le menu (pour spécialistes, nécessite du code html)":
            $tmp = "Disponer de un bloque especial para usted solo (para especialistas, necesita conocimientos en HTML)";
            break;
        case "Document co-rédigé":
            $tmp = "Multi-autores del documento";
            break;
        case "Ecrire à la liste":
            $tmp = "Escribir a la lista";
            break;
        case "Ecrire un nouveau message privé":
            $tmp = "Escribir un nuevo mensaje privado";
            break;
        case "Ecrire une critique pour":
            $tmp = "Escribir una critica para";
            break;
        case "Ecrire une critique":
            $tmp = "Escribir una critica";
            break;
        case "écrit":
            $tmp = "Escrito";
            break;
        case "Editer votre journal":
            $tmp = "Editar su diario";
            break;
        case "Editer votre journal":
            $tmp = "Editar su diario";
            break;
        case "Editer votre page principale":
            $tmp = "Editar su página  principal";
            break;
        case "Editer":
            $tmp = "Editar";
            break;
        case "Editeur":
            $tmp = "Editor";
            break;
        case "Edition de la soumission":
            $tmp = "Edición de la contribución";
            break;
        case "EDITO":
            $tmp = "EDITO";
            break;
        case "Editorial par":
            $tmp = "Editorial por";
            break;
        case "Effacer (Efface les liens cassés et les avis pour un lien donné)":
            $tmp = "Borrar (Borra los vínculos rotos y los avisos por un vinculo dado)";
            break;
        case "Effacer ce sujet":
            $tmp = "Borrar este Asunto";
            break;
        case "Effacer le sujet":
            $tmp = "Borrar el asunto";
            break;
        case "Effacer les commentaires.":
            $tmp = "Eliminar comentarios.";
            break;
        case "Effacer":
            $tmp = "Borrar";
            break;
        case "Email : ":
            $tmp = "Email : ";
            break;
        case "Email du destinataire":
            $tmp = "Email del destinatario";
            break;
        case "Email non rempli pour : ":
            $tmp = "no hay un email asociado al cliente : ";
            break;
        case "Email non valide (ex.: prenom.nom@hotmail.com)":
            $tmp = "Su email no es valido (Por ejemplo.: nombre.apellido@servidor.com)";
            break;
        case "Email":
            $tmp = "Email";
            break;
        case "Emetteur":
            $tmp = "Autor";
            break;
        case "Emoticons":
            $tmp = "Emoticones";
            break;
        case "en attente de validation":
            $tmp = "en espera de validación";
            break;
        case "en cache":
            $tmp = "en cache";
            break;
        case "En ce jour...":
            $tmp = "En este día...";
            break;
        case "en créer un":
            $tmp = "Crear una cuenta";
            break;
        case "En savoir plus à propos de":
            $tmp = "Saber mas acerca de";
            break;
        case "En tant qu'utilisateur enregistré vous pouvez":
            $tmp = "En tanto que nuevo usuario usted puede";
            break;
        case "Enregistrer":
            $tmp = "Grabar";
            break;
        case "Entrer votre pseudonyme et votre mot de passe.":
            $tmp = "Entre su identificador y su contraseña.";
            break;
        case "Entrez à nouveau votre mot de Passe":
            $tmp = "Reescriba la contraseña";
            break;
        case "Envoi de l'article à un ami":
            $tmp = "Enviar esta noticia a un amigo";
            break;
        case "Envoi une demande aux administrateurs pour rejoindre ce groupe. Un message privé vous informera du résultat de votre demande.":
            $tmp = "Envíe una solicitud a los administradores para unirse a este grupo. Un mensaje privado le informará del resultado de su solicitud.";
            break;
        case "Envoyé à":
            $tmp = "Enviar a";
            break;
        case "Envoyé par ":
            $tmp = "Enviado por ";
            break;
        case "Envoyé":
            $tmp = "Enviado";
            break;
        case "envoyée par courrier.":
            $tmp = "enviada.";
            break;
        case "Envoyer cet article à un ami":
            $tmp = "Enviar esta noticia a un amigo";
            break;
        case "Envoyer un message interne":
            $tmp = "Enviar un mensaje interno";
            break;
        case "Envoyer une demande":
            $tmp = "Enviar una demanda";
            break;
        case "Envoyer":
            $tmp = "Enviar";
            break;
        case "Ephémérides":
            $tmp = "Efemérides";
            break;
        case "Epuration de la new à la fin de sa date de validité":
            $tmp = "Limpiar la noticia al final de la publicación.";
            break;
        case "Erreur : adresse Email déjà utilisée":
            $tmp = "Error :  este E-mail ya esta en uso";
            break;
        case "Erreur : cet identifiant est déjà utilisé":
            $tmp = "Error : Esta identificación ya esta en uso";
            break;
        case "Erreur : cette url est déjà présente dans la base de données":
            $tmp = "Error : esta URL ya esta presente en la base de datos !";
            break;
        case "Erreur : DNS ou serveur de mail incorrect":
            $tmp = "Error: DNS o servidor de correo incorrecto";
            break;
        case "Erreur : Email invalide":
            $tmp = "Error : E-mail invalido";
            break;
        case "Erreur : identifiant invalide":
            $tmp = "Error : Identificación invalida";
            break;
        case "Erreur : la catégorie":
            $tmp = "Error : La Categoría";
            break;
        case "Erreur : la sous-catégorie":
            $tmp = "Error : La Sub-categoría";
            break;
        case "Erreur : nom existant.":
            $tmp = "Error : Nombre reservado.";
            break;
        case "Erreur : une adresse Email ne peut pas contenir d'espaces":
            $tmp = "Error : una dirección E-mail no puede contener espacios";
            break;
        case "Erreur : vous devez saisir un titre pour votre lien":
            $tmp = "Error : Tiene que poner un titulo a su vinculo !";
            break;
        case "Erreur : vous devez saisir une description pour votre lien":
            $tmp = "Error : Tiene que poner una DESCRICION a su vinculo !";
            break;
        case "Erreur : vous devez saisir une url pour votre lien":
            $tmp = "Error : Tiene que poner una URL a su vinculo !";
            break;
        case "Erreur de connexion à la base de données":
            $tmp = "Error al acceder a la base de datos";
            break;
        case "Erreur du forum":
            $tmp = "Error del foro";
            break;
        case "Erreur lors de la récupération des messages depuis la base.":
            $tmp = "Error en la recuperación de los mensajes en la base.";
            break;
        case "Erreur":
            $tmp = "Erreur";
            break;
        case "est associé à votre Email.":
            $tmp = "está asociada a su cuenta electrónica.";
            break;
        case "est connecté":
            $tmp = "está conectado!";
            break;
        case "Etat du topic":
            $tmp = "Estado del tema";
            break;
        case "Etes vous certain de vouloir effacer cette sous-catégorie ?":
            $tmp = "Esta seguro que quiere borrar esta sub-categoria ?";
            break;
        case "Evaluation":
            $tmp = "Puntos";
            break;
        case "existe déjà":
            $tmp = "Ya existe !";
            break;
        case "Expéditeur":
            $tmp = "Remitente";
            break;
        case "Faites simple":
            $tmp = "Haga simple !";
            break;
        case "FAQ - Questions fréquentes":
            $tmp = "FAQ (Preguntas frecuente)";
            break;
        case "favori":
            $tmp = "favorito";
            break;
        case "Fermé":
            $tmp = "Cerrado";
            break;
        case "Fermer ce sujet":
            $tmp = "Cerrar este Asunto";
            break;
        case "Fermer le sujet":
            $tmp = "Cerrar el asunto";
            break;
        case "Février":
            $tmp = "Febrero";
            break;
        case "Fichiers les + récents":
            $tmp = "Los ficheros los mas recientes";
            break;
        case "Fichiers":
            $tmp = "Ficheros";
            break;
        case "File manager du groupe.":
            $tmp = "Grupo gestor de archivos.";
            break;
        case "Fois":
            $tmp = "veces";
            break;
        case "Fonctions":
            $tmp = "Funciones";
            break;
        case "Forum du groupe.":
            $tmp = "Foro del Grupo.";
            break;
        case "forum":
            $tmp = "foro";
            break;
        case "Forum":
            $tmp = "Foro";
            break;
        case "Forums infos":
            $tmp = "Foros infos";
            break;
        case "Forums":
            $tmp = "Foros";
            break;
        case "Gérer d'autres options et applications":
            $tmp = "Acceso a la gestión de otras opciones y aplicaciones";
            break;
        case "Gérer votre miniSite":
            $tmp = "Gestión de su Mini-página  Web";
            break;
        case "Gestion de vos abonnements":
            $tmp = "Gestión de sus suscripciones";
            break;
        case "Gestion des groupes.":
            $tmp = "Grupos de ajuste.";
            break;
        case "Gestionnaire fichiers":
            $tmp = "gestor de archivos";
            break;
        case "Gras":
            $tmp = "Negrita";
            break;
        case "Groupe":
            $tmp = "Grupo";
            break;
        case "Groupe ouvert":
            $tmp = "Grupo abierto";
            break;
        case "Groupes":
            $tmp = "Grupos";
            break;
        case "Hasard":
            $tmp = "Al azar";
            break;
        case "Haut de page":
            $tmp = "Alto de página ";
            break;
        case "Heure de la soumission":
            $tmp = "Hora de sumisión";
            break;
        case "Heure":
            $tmp = "Hora";
            break;
        case "Heure(s)":
            $tmp = "Hora(s)";
            break;
        case "Hits : ":
            $tmp = "Hits : ";
            break;
        case "Hits":
            $tmp = "Nombre de clics";
            break;
        case "Home":
            $tmp = "Origen";
            break;
        case "ici":
            $tmp = "aquí";
            break;
        case "Icone du message":
            $tmp = "Icono del mensaje : ";
            break;
        case "Icone":
            $tmp = "Icono";
            break;
        case "ID de la critique":
            $tmp = "ID de la critica";
            break;
        case "ID utilisateur (pseudo)":
            $tmp = "ID Usuario (Apodo)";
            break;
        case "Identifiant : ":
            $tmp = "Identificación : ";
            break;
        case "Identifiant ":
            $tmp = "Identificación ";
            break;
        case "Identifiant incorrect !":
            $tmp = "Identificación incorrecta !";
            break;
        case "Identifiant utilisateur":
            $tmp = "Identificación usuario";
            break;
        case "identifiant":
            $tmp = "Identificación";
            break;
        case "Identifiant":
            $tmp = "Identificación";
            break;
        case "Identité":
            $tmp = "Identidad";
            break;
        case "Ignorer (Efface toutes les demandes pour un lien donné)":
            $tmp = "No hacer caso (Borra todas las demandas por un vinculo dado)";
            break;
        case "Ignorer":
            $tmp = "No hacer caso";
            break;
        case "Il n'y a aucun sujet pour ce forum. ":
            $tmp = "No hay ningún Asunto para este foro. ";
            break;
        case "Il n'y a aucune critique pour La lettre":
            $tmp = "No hay ninguna critica para la letra";
            break;
        case "Il n'y a pas d'informations disponibles pour":
            $tmp = "No hay informaciones disponibles para";
            break;
        case "Il n'y a pas encore d'article du jour.":
            $tmp = "Todavia no hay noticias del día.";
            break;
        case "Il ne peut pas y avoir d'espace dans le surnom.":
            $tmp = "No puede haber espacios en el apodo.";
            break;
        case "Il y a actuellement":
            $tmp = "Actualmente hay";
            break;
        case "Il y a actuellement":
            $tmp = "Actualmente hay";
            break;
        case "Il y a":
            $tmp = "Hay";
            break;
        case "Illimité":
            $tmp = "Ilimitado";
            break;
        case "Image de garde":
            $tmp = "Imagen de cobertura : ";
            break;
        case "immédiatement":
            $tmp = "inmediatamente";
            break;
        case "Imp. restantes":
            $tmp = "Imp. restantes";
            break;
        case "Impossible d'interroger la base.":
            $tmp = "Interrogación de la base imposible.";
            break;
        case "Impossible de déplacer le topic dans le Forum, refaites un essai.":
            $tmp = "Imposible de desplazar el Asunto del foro, inténtelo de nuevo.";
            break;
        case "Impossible de déverrouiller le topic, refaites un essai.":
            $tmp = "Imposible de abrir este Asunto, inténtelo de nuevo.";
            break;
        case "Impossible de verrouiller le topic, refaites un essai.":
            $tmp = "Imposible de cerrar este Asunto, inténtelo de nuevo.";
            break;
        case "Impressions":
            $tmp = "Impresiones";
            break;
        case "Imprimer":
            $tmp = "Imprimir";
            break;
        case "Inconnu":
            $tmp = "Desconocido";
            break;
        case "Index des rubriques":
            $tmp = "Página  principal de las secciones";
            break;
        case "Index du forum":
            $tmp = "Õndice del foro";
            break;
        case "Index":
            $tmp = "Index";
            break;
        case "Information sur le fichier":
            $tmp = "Información del fichero";
            break;
        case "Information":
            $tmp = "Información";
            break;
        case "Informations supplémentaires":
            $tmp = "Informaciones complementarias";
            break;
        case "Informations sur l'utilisateur :":
            $tmp = "Informaciones del usuario :";
            break;
        case "Informations sur le compte":
            $tmp = "Informaciones sobre la cuenta usuario";
            break;
        case "Inscription":
            $tmp = "Inscripción";
            break;
        case "intéressant et a voulu vous le faire connaître.":
            $tmp = "es interesante y quiso hacérsela conocer.";
            break;
        case "Interface":
            $tmp = "Interfaz";
            break;
        case "Interne":
            $tmp = "Interno";
            break;
        case "Isoloir du vote en cours":
            $tmp = "Cabina de votación de las criticas actuales";
            break;
        case "Isoloir":
            $tmp = "Isolador";
            break;
        case "Italique":
            $tmp = "Itálica";
            break;
        case "Janvier":
            $tmp = "Enero";
            break;
        case "Jeudi":
            $tmp = "jueves";
            break;
        case "Jour":
            $tmp = "Día";
            break;
        case "Jour(s)":
            $tmp = "día(s)";
            break;
        case "Journal en ligne de ":
            $tmp = "Diario en linea de ";
            break;
        case "Journal":
            $tmp = "Diario";
            break;
        case "jours":
            $tmp = "días";
            break;
        case "Juillet":
            $tmp = "Julio";
            break;
        case "Juin":
            $tmp = "Junio";
            break;
        case "L'accès à cette application est réservé aux utilisateurs Avancés. Merci de vous enregistrer.":
            $tmp = "Acceso denegado. Para acceder a este útil tiene que ser usuario. Registre se o conecte se.";
            break;
        case "L'article le plus consulté aujourd'hui est :":
            $tmp = "La noticia mas vista de hoy es :";
            break;
        case "L'article le plus lu à propos de":
            $tmp = "La noticia mas leída de";
            break;
        case "L'article":
            $tmp = "La noticia";
            break;
        case "L'url pour cet article est : ":
            $tmp = "La URL de esta Noticia es : ";
            break;
        case "La fonction mise à jour du mot de passe ne peut mettre à jour la base de données. Contactez le WebMaster.":
            $tmp = "La función Mail_Password no puede actualizar la base de datos. Contacte con el Webmaster.";
            break;
        case "La lettre":
            $tmp = "Letra de información";
            break;
        case "la page":
            $tmp = "la página ";
            break;
        case "La seule règle est de ne pas sortir du sujet.":
            $tmp = "No salir del Asunto es la sola regla.";
            break;
        case "La structure de chaque ligne de ce fichier : nom_du_membre; adresse Email; commentaires":
            $tmp = "La estructura de cada linea del fichero : nombre_del_miembro; email;comentarios";
            break;
        case "Le compte utilisateur":
            $tmp = "La cuenta de usuario";
            break;
        case "Le critique":
            $tmp = "La critica";
            break;
        case "Le forum dans lequel vous tentez de publier n'existe pas, merci de recommencez":
            $tmp = "El foro en el que intenta publicar no existe - Vuelva a empezar";
            break;
        case "Le forum ou le topic que vous tentez de publier n'existe pas, refaites un essai.":
            $tmp = "El foro o Asunto que intenta agregar no existe, inténtelo de nuevo. ";
            break;
        case "Le forum sélectionné n'existe pas.":
            $tmp = "El foro que selecciono no existe, inténtelo de nuevo.";
            break;
        case "Le message sélectionné n'existe pas dans la base forum.":
            $tmp = "El mensaje seleccionado no existe en la base de foros.";
            break;
        case "Le mot de passe doit contenir au moins un caractère en majuscule.":
            $tmp = "La contraseña debe contener al menos un carácter en mayúsculas.";
            break;
        case "Le mot de passe doit contenir au moins un caractère en minuscule.":
            $tmp = "La contraseña debe contener al menos un carácter en minúscula.";
            break;
        case "Le mot de passe doit contenir au moins un caractère non alphanumérique.":
            $tmp = "La contraseña debe contener al menos un carácter no alfanumérico.";
            break;
        case "Le mot de passe doit contenir au moins un chiffre.":
            $tmp = "La contraseña debe contener al menos un número.";
            break;
        case "Le mot de passe doit contenir":
            $tmp = "La contraseña debe contener";
            break;
        case "Le mot de passe vous sera envoyé à l'adresse Email indiquée.":
            $tmp = "La contraseña le sera enviada a la dirección E-mail que dio.";
            break;
        case "Le moteur de recherche ne trouve pas la base forum.":
            $tmp = "El motor de búsqueda no encontró la base del foro.";
            break;
        case "Le nombre de hits doit être un entier positif":
            $tmp = "El nombre de clics deben ser  nombres enteros positivos";
            break;
        case "Le séparateur de groupe est la, (12,55,...)":
            $tmp = "El separador de grupos es el , (12,55,...)";
            break;
        case "Le sujet a été déplacé.":
            $tmp = "Se desplazo el asunto.";
            break;
        case "le":
            $tmp = "el";
            break;
        case "Lectures":
            $tmp = "Lecturas";
            break;
        case "Les commentaires sont la propriété de leurs auteurs. Nous ne sommes pas responsables de leur contenu.":
            $tmp = "Los comentarios son propiedad de sus autores. Nos descargamos de toda responsabilidad del contenido de ellos.";
            break;
        case "Les dernières contributions de":
            $tmp = "La ultimas contribuciones de";
            break;
        case "Les dernières nouvelles à propos de":
            $tmp = "Las ultimas noticias de";
            break;
        case "Les derniers articles de":
            $tmp = "Last articles sent by";
            break;
        case "Les derniers commentaires de":
            $tmp = "Los últimos comentarios de";
            break;
        case "Les deux mots de passe ne sont pas identiques.":
            $tmp = "Las dos contraseñas no son idénticas.";
            break;
        case "les Liens":
            $tmp = "Los vínculos";
            break;
        case "Les modifications seront seulement valides pour vous.":
            $tmp = "Los cambios solo serán validos para usted.";
            break;
        case "Les mots de passe sont différents. Ils doivent être identiques.":
            $tmp = "Las dos contraseñas son diferentes. Deben ser idénticas.";
            break;
        case "Les nouveaux Liens ajoutés dans cette catégorie cette semaine":
            $tmp = "Los nuevos vínculos insertados en esta categoría esta semana";
            break;
        case "Les nouveaux liens ajoutés dans cette catégorie dans les 3 derniers jours":
            $tmp = "Los nuevos vínculos insertados en esta categoría los 3 últimos días";
            break;
        case "Les nouveaux liens de cette catégorie ajoutés aujourd'hui":
            $tmp = "Nuevos vínculos insertados hoy";
            break;
        case "Les nouvelles contributions depuis votre dernière visite.":
            $tmp = "Las nuevas contribuciones desde su última visita.";
            break;
        case "Les plus téléchargés":
            $tmp = "Los mas descargados";
            break;
        case "Les préférences de compte fonctionnent sur la base des cookies.":
            $tmp = "Las preferencias del usuario funcionan con Cookies.";
            break;
        case "Les spécialistes peuvent utiliser du HTML, mais attention aux erreurs":
            $tmp = "Los que saben pueden utilizar el código HTML, pero cuidado con los errores !";
            break;
        case "Les statistiques pour la bannières ID":
            $tmp = "Las estadísticas por el Banner ID";
            break;
        case "Les utilisateurs anonymes peuvent poster de nouveaux sujets et des réponses dans ce forum.":
            $tmp = "Los usuarios anónimos pueden publicar nuevos Asuntos y responder a los mensajes en este foro..";
            break;
        case "Libre":
            $tmp = "Libre";
            break;
        case "Lien n° : ":
            $tmp = "Vinculo N∞ : ";
            break;
        case "Lien relatif":
            $tmp = "Vínculos relativos";
            break;
        case "Lien web":
            $tmp = "Web links";
            break;
        case "Lien":
            $tmp = "Vinculo : ";
            break;
        case "Lien(s) en attente de validation":
            $tmp = "Vínculos en espera de validación";
            break;
        case "Liens cassés rapportés par un ou plusieurs utilisateurs":
            $tmp = "Vínculos rotos señalados por los usuarios";
            break;
        case "Liens présents dans la rubrique des liens web":
            $tmp = "Vínculos presentes en la página  de vínculos web";
            break;
        case "Liens relatifs : ":
            $tmp = "Vínculos relativos : ";
            break;
        case "Liens relatifs":
            $tmp = "Vínculos relativos";
            break;
        case "Liens Web":
            $tmp = "Vínculos web";
            break;
        case "Liens":
            $tmp = "Vínculos";
            break;
        case "Limite des référants : pensez à archiver vos référants via l'administration du site.":
            $tmp = "Limite de referentes : Archive sus referentes por favor.";
            break;
        case "Lire la suite...":
            $tmp = "Leer lo que sigue...";
            break;
        case "Liste de diffusion":
            $tmp = "Lista de correo";
            break;
        case "Liste des membres du groupe.":
            $tmp = "Lista de los miembros del grupo.";
            break;
        case "Liste des membres":
            $tmp = "Lista de miembros";
            break;
        case "Liste non ordonnnée":
            $tmp = "Lista desordenada";
            break;
        case "Liste ordonnnée":
            $tmp = "Lista ordenada";
            break;
        case "Liste":
            $tmp = "Lista";
            break;
        case "Localisation":
            $tmp = "Localización";
            break;
        case "lu : ":
            $tmp = "Leído : ";
            break;
        case "Lu":
            $tmp = "Leído";
            break;
        case "Lundi":
            $tmp = "Lunes";
            break;
        case "lus":
            $tmp = "leídos";
            break;
        case "M'envoyer un Email lorsqu'un message interne arrive":
            $tmp = "Enviarme un Email si un mensaje interno me es enviado";
            break;
        case "M2M bloc":
            $tmp = "M2M bloc";
            break;
        case "Ma note : ":
            $tmp = "Mi nota : ";
            break;
        case "Ma page perso : ":
            $tmp = "Personalizar mi página  : ";
            break;
        case "Mai":
            $tmp = "Mayo";
            break;
        case "Mais ne titrez pas -un article-, ou -à lire-,...":
            $tmp = "Pero no lo titule -una noticia-, o -para leer-,...";
            break;
        case "Manuel en ligne":
            $tmp = "Manual en linea";
            break;
        case "Mardi":
            $tmp = "Martes";
            break;
        case "Marquer tous les messages comme lus":
            $tmp = "Marcar todos los asuntos como leidos";
            break;
        case "Mars":
            $tmp = "Marzo";
            break;
        case "Masquer ce commentaire":
            $tmp = "Ocultar este comentario";
            break;
        case "Masquer ce post":
            $tmp = "Ocultar este mensaje";
            break;
        case "Mèl":
            $tmp = "E-mail";
            break;
        case "Membre invisible":
            $tmp = "Miembro invisible";
            break;
        case "membre(s) en ligne.":
            $tmp = "miembro(s) conectado(s).";
            break;
        case "membres enregistrés.":
            $tmp = "miembros inscritos.";
            break;
        case "Membres":
            $tmp = "miembros";
            break;
        case "Menu de":
            $tmp = "Menú de";
            break;
        case "Merci d'avoir consacré du temps pour vous enregistrer.":
            $tmp = "Gracias por tomar el tiempo de registrarse en este sitio web.";
            break;
        case "Merci d'avoir modifié cette critique":
            $tmp = "Gracias por editar esta reseña";
            break;
        case "Merci d'avoir posté cette critique":
            $tmp = "Gracias por someter su punto de vista";
            break;
        case "Merci d'entrer l'information en fonction des spécifications":
            $tmp = "Por favor, entre la información en acuerdo a las especificaciones";
            break;
        case "Merci de contribuer à la maintenance du site.":
            $tmp = "Gracias por contribuir al mantenimiento de este sitio web.";
            break;
        case "Merci de ne pas abuser, le nom d'utilisateur et l'adresse IP sont enregistrés.":
            $tmp = "Por favor, no intente abusar del sistema, la dirección IP y el nombre de usuario se han registrado.";
            break;
        case "Merci de nous avoir recommandé":
            $tmp = "Gracias por su recomandación !";
            break;
        case "Merci de saisir vos informations":
            $tmp = "Inserte sus informaciones";
            break;
        case "Merci de":
            $tmp = "Por favor";
            break;
        case "Merci pour cette information. Nous allons l'examiner dès que possible.":
            $tmp = "Gracias, la información que nos sugirió sera examinada lo mas rápido posible.";
            break;
        case "Merci pour votre contribution.":
            $tmp = "Gracias por su contribución.";
            break;
        case "Merci pour votre contribution":
            $tmp = "Gracias por su contribución !";
            break;
        case "Merci":
            $tmp = "Gracias !";
            break;
        case "Mercredi":
            $tmp = "Miércoles";
            break;
        case "Message à un membre":
            $tmp = "Mensaje a un miembro";
            break;
        case "Message édité par":
            $tmp = "Mensaje editado por";
            break;
        case "Message interne":
            $tmp = "Mensaje interno";
            break;
        case "Message personnel":
            $tmp = "Mensaje privado";
            break;
        case "Message précédent":
            $tmp = "Mensajes anteriores";
            break;
        case "Message suivant":
            $tmp = "Siguiente mensaje";
            break;
        case "Message vide interdit, refaites un essai.":
            $tmp = "Mensaje vacío no permitido, inténtelo de nuevo.";
            break;
        case "Message":
            $tmp = "Mensaje";
            break;
        case "message(s) personnel(s).":
            $tmp = "mensaje(s) personal(es).";
            break;
        case "Messages personnels":
            $tmp = "Mensajes personales";
            break;
        case "Mettre ce sujet en premier":
            $tmp = "Poner la noticia en primer lugar";
            break;
        case "MiniSite":
            $tmp = "Mini-página  Web";
            break;
        case "Minute(s)":
            $tmp = "Minuto(s)";
            break;
        case "Mise à jour de la base impossible, refaites un essai.":
            $tmp = "No se pudo insertar datos en la base, inténtelo de nuevo.";
            break;
        case "Mise à jour du compteur des envois impossible.":
            $tmp = "Puesta al día del contador imposible.]";
            break;
        case "Mise à jour":
            $tmp = "Actualización";
            break;
        case "Modérateur":
            $tmp = "Moderador";
            break;
        case "Modérateur(s)":
            $tmp = "Moderador(es)";
            break;
        case "Modéré par : ":
            $tmp = "Moderado por : ";
            break;
        case "Modification d'une critique":
            $tmp = "Modificación de una critica";
            break;
        case "modification":
            $tmp = "modificación";
            break;
        case "modifié":
            $tmp = "modificado";
            break;
        case "Modifier l'édito":
            $tmp = "Modificar el Editorial";
            break;
        case "Modifier la catégorie":
            $tmp = "Modificar la categoría";
            break;
        case "Modifier les liens":
            $tmp = "Modificar los vínculos";
            break;
        case "Modifier":
            $tmp = "Modificar";
            break;
        case "mois":
            $tmp = "mes";
            break;
        case "Mois":
            $tmp = "Mes";
            break;
        case "mois":
            $tmp = "Meses";
            break;
        case "Mon E-Mail : ":
            $tmp = "Mi E-mail : ";
            break;
        case "Monnaie":
            $tmp = "Moneda";
            break;
        case "Montrer :":
            $tmp = "Mostrar :";
            break;
        case "Mot de passe : ":
            $tmp = "Contraseña : ";
            break;
        case "Mot de passe erroné, refaites un essai.":
            $tmp = "Contraseña errónea, inténtelo de nuevo.";
            break;
        case "Mot de passe mis à jour. Merci de vous re-connecter":
            $tmp = "Actualización de contraseña, vuelva a conectarlo.";
            break;
        case "Mot de passe pour":
            $tmp = "Contraseña para";
            break;
        case "Mot de passe utilisateur pour":
            $tmp = "Contraseña usuario para";
            break;
        case "Mot de passe":
            $tmp = "Contraseña";
            break;
        case "Mot-clé":
            $tmp = "Palabra clave";
            break;
        case "Moteurs de recherche":
            $tmp = "Motores de búsqueda";
            break;
        case "mots dans ce texte )":
            $tmp = " palabras en este texto )";
            break;
        case "n'est pas connecté":
            $tmp = "no est· conectado!";
            break;
        case "Navigateurs web":
            $tmp = "Navegadores web";
            break;
        case "Nb abonnés à lettre infos":
            $tmp = "Nb. de usuarios externos para la PLI";
            break;
        case "Nb hits : ":
            $tmp = "Nb Hits : ";
            break;
        case "Nb. d'articles":
            $tmp = "Nb. de noticias";
            break;
        case "Nb. de critiques":
            $tmp = "Nb. de Criticas";
            break;
        case "Nb. de forums":
            $tmp = "Nb. de Foros";
            break;
        case "Nb. de membres":
            $tmp = "Nb. de Miembros";
            break;
        case "Nb. de sujets":
            $tmp = "Nb. de Asuntos";
            break;
        case "Nb. pages vues":
            $tmp = "Nb. Página s vistas";
            break;
        case "ne peuvent pas être envoyées.":
            $tmp = "No pueden ser enviadas.";
            break;
        case "Nom : ":
            $tmp = "Apellido : ";
            break;
        case "Nom :":
            $tmp = "Nombre :";
            break;
        case "Nom d'auteur":
            $tmp = "Nombre del autor";
            break;
        case "Nom de fichier de l'image":
            $tmp = "Nombre del fichero de la imagen";
            break;
        case "Nom de l'image principale non obligatoire, la mettre dans images/reviews/":
            $tmp = "Nombre de la imagen principal, situada en images/reviews/. No es obligatorio.";
            break;
        case "Nom de la catégorie : ":
            $tmp = "Nombre de la categoría : ";
            break;
        case "Nom de la sous-catégorie : ":
            $tmp = "Nombre de la sub-categoría : ";
            break;
        case "Nom du destinataire":
            $tmp = "Nombre del destinatario";
            break;
        case "Nom du produit critiqué.":
            $tmp = "Nombre del producto criticado.";
            break;
        case "Nom du programme":
            $tmp = "Nombre del programa";
            break;
        case "Nom ou raison sociale":
            $tmp = "Apellidos o razón social";
            break;
        case "Nom":
            $tmp = "Nombre";
            break;
        case "Nombre d'articles sur la page principale":
            $tmp = "Cantidad de noticias en la página  principal";
            break;
        case "Nombre d'utilisateurs par thème":
            $tmp = "Cantidad de usuarios por tema";
            break;
        case "Nombre de jours maximum pour une offre":
            $tmp = "Nombre de días máximo para las ofertas";
            break;
        case "Nombre total de votes: ":
            $tmp = "Total de votos: ";
            break;
        case "Non lu":
            $tmp = "No leído";
            break;
        case "Non":
            $tmp = "No";
            break;
        case "Nos références ont été envoyées à ":
            $tmp = "Su Email fue enviado";
            break;
        case "Nos visiteurs ont visualisé":
            $tmp = "Nuestros visitantes han visto";
            break;
        case "Note :":
            $tmp = "Nota :";
            break;
        case "Note de ce produit : ":
            $tmp = "Nota de este producto : ";
            break;
        case "Note non valide... Elle doit se situer entre 1 et 10":
            $tmp = "La notación no es valida... debe estar entre 1 y 10";
            break;
        case "Note":
            $tmp = "Evaluación : ";
            break;
        case "Note":
            $tmp = "Nota";
            break;
        case "Notes":
            $tmp = "Nota";
            break;
        case "Nous allons vérifier votre contribution. Elle devrait bientôt être disponible !":
            $tmp = "Los editores van a estudiar su contribución. Estará disponible pronto !";
            break;
        case "Nous avons approuvé votre contribution à notre moteur de recherche.":
            $tmp = "Su contribución fue aceptada en nuestro útil de búsqueda.";
            break;
        case "Nous avons bien reçu votre demande de lien, merci":
            $tmp = "Hemos recibido su contribución para los vínculos !";
            break;
        case "Nous ne vendons ni ne communiquons vos informations personnelles à autrui.":
            $tmp = "Sus informaciones personales, no son ni vendidas ni cedidas a tercias personas.";
            break;
        case "Nouveau commentaire":
            $tmp = "Nuevo comentario";
            break;
        case "Nouveau dossier/sujet":
            $tmp = "Nuevo carpeta/sujeto";
            break;
        case "Nouveau lien ajouté dans la base de données":
            $tmp = "Nuevo vinculo añadido en la base de datos";
            break;
        case "Nouveau membre":
            $tmp = "Nuevo usuario";
            break;
        case "Nouveau sujet":
            $tmp = "Nuevo tema";
            break;
        case "Nouveau":
            $tmp = "Nuevo";
            break;
        case "Nouveautés":
            $tmp = "Novedades";
            break;
        case "Nouveaux liens":
            $tmp = "Nuevos vínculos";
            break;
        case "Nouvel utilisateur : ":
            $tmp = "Nuevo usuario : ";
            break;
        case "Novembre":
            $tmp = "Noviembre";
            break;
        case "O=Non - 1=Oui":
            $tmp = "O=No - 1=Si";
            break;
        case "Objet":
            $tmp = "Producto criticado";
            break;
        case "Obligatoire seulement si vous soumettez un lien relatif":
            $tmp = "Obligatorio solo si tiene un vinculo relativo";
            break;
        case "Octobre":
            $tmp = "Octubre";
            break;
        case "Offre":
            $tmp = "Oferta";
            break;
        case "Offres par page":
            $tmp = "Ofertas por página ";
            break;
        case "Ok":
            $tmp = "Ok";
            break;
        case "ont été envoyées.":
            $tmp = "fueron enviados.";
            break;
        case "Option : ":
            $tmp = "Opción : ";
            break;
        case "Options":
            $tmp = "Opciones";
            break;
        case "Ordre croissant":
            $tmp = "Orden Ascendente";
            break;
        case "Ordre décroissant":
            $tmp = "Orden descendiente";
            break;
        case "Original":
            $tmp = "Original";
            break;
        case "ou poster des commentaires signés...":
            $tmp = "o añadir comentarios firmados...";
            break;
        case "ou":
            $tmp = "o";
            break;
        case "Oui":
            $tmp = "Si";
            break;
        case "Outils administrateur":
            $tmp = "Herramientas de administración";
            break;
        case "Ouvrir ce sujet":
            $tmp = "Abrir este Asunto";
            break;
        case "Ouvrir le sujet":
            $tmp = "Abrir el asunto";
            break;
        case "Ouvrir un salon de chat pour le groupe.":
            $tmp = "Abra un chat para el Grupo.";
            break;
        case "P. annonces":
            $tmp = "Anuncios clasificados";
            break;
        case "Page d'accueil":
            $tmp = "Página  Principal";
            break;
        case "Page précédente":
            $tmp = "Página anterior";
            break;
        case "Page spéciale pour impression":
            $tmp = "Página  especial para imprimir";
            break;
        case "Page suivante":
            $tmp = "Página siguiente";
            break;
        case "Page":
            $tmp = "Pagina";
            break;
        case "pages depuis le":
            $tmp = "página s desde el";
            break;
        case "Pages vues depuis":
            $tmp = "Página s vistas desde el";
            break;
        case "pages":
            $tmp = "página s";
            break;
        case "par défaut":
            $tmp = "por defecto";
            break;
        case "par":
            $tmp = "de";
            break;
        case "pas affiché dans l'annuaire, message à un membre, ...":
            $tmp = "Escondido en la lista de miembros, bloques de mensaje de los miembros, ...";
            break;
        case "Pas de connexion à la base forums.":
            $tmp = "No hay conexión a la base de los foros.";
            break;
        case "Pas de connexion à la base topics.":
            $tmp = "No hay conexión a la base de Asuntos.";
            break;
        case "Pas de groupe ouvert.":
            $tmp = "No hay grupo abierto.";
            break;
        case "Pas de problème. Saisissez votre identifiant et le nouveau mot de passe que vous souhaitez utiliser puis cliquez sur envoyer pour recevoir un Email de confirmation.":
            $tmp = "No hay problema. Simplemente escriba su Nickname, la nueva contraseña que desea y haga clic en el botón Enviar para recibir un correo electrónico con el código de confirmación.";
            break;
        case "Passer / Gérer une annonce":
            $tmp = "Someter / Gestionar un anuncio";
            break;
        case "Pays":
            $tmp = "País";
            break;
        case "Période":
            $tmp = "Periodo";
            break;
        case "Personnaliser les commentaires":
            $tmp = "Personalizar los comentarios";
            break;
        case "personne connectée.":
            $tmp = "persona conectada.";
            break;
        case "personnes connectées.":
            $tmp = "personas conectadas.";
            break;
        case "Plan du site":
            $tmp = "Plan de la página Web";
            break;
        case "Plus d'émoticons":
            $tmp = "Mas emoticones";
            break;
        case "Plus de forum":
            $tmp = "No hay mas foros";
            break;
        case "Plus de":
            $tmp = "Más de";
            break;
        case "Populaire":
            $tmp = "Popular";
            break;
        case "Post affiché":
            $tmp = "Mensaje visible";
            break;
        case "Post caché":
            $tmp = "Mensaje invisible";
            break;
        case "Posté : ":
            $tmp = "Insertado : ";
            break;
        case "Posté le ":
            $tmp = "Añadido el ";
            break;
        case "Posté le":
            $tmp = "Añadido el";
            break;
        case "Posté par ":
            $tmp = "Añadido por ";
            break;
        case "Posté par":
            $tmp = "Añadido por";
            break;
        case "Posté":
            $tmp = "Insertado";
            break;
        case "Poster des commentaires signés":
            $tmp = "Añadir comentarios firmados";
            break;
        case "Poster un nouveau sujet dans :":
            $tmp = "Añadir nuevo Asunto en :";
            break;
        case "Poster une réponse dans le sujet":
            $tmp = "Enviar la respuesta en el Asunto";
            break;
        case "Pour des raisons de sécurité, votre nom d'utilisateur et votre adresse IP vont être momentanément conservés.":
            $tmp = "Por razones de seguridad, su nombre de usuario y su dirección IP serán guardados momentáneamente.";
            break;
        case "pour enregistrer un compte sur":
            $tmp = "para añadir une cuenta en";
            break;
        case "pour le groupe":
            $tmp = "para el grupo";
            break;
        case "Pour les 30 derniers jours":
            $tmp = "les 30 últimos días";
            break;
        case "Pour supprimer votre abonnement à notre lettre, merci d'utiliser":
            $tmp = "Para describirse, por favor vaya";
            break;
        case "Pour utiliser cette application, vous devez être":
            $tmp = "Para utilizar esta aplicación, usted debe ser";
            break;
        case "Pour valider votre nouveau mot de passe, merci de le re-saisir.":
            $tmp = "Pour valider votre nouveau mot de passe, merci de le re-saisir.";
            break; //
        case "Pourcentage":
            $tmp = "Porcentaje";
            break;
        case "Précédent":
            $tmp = "Precedente";
            break;
        case "Préférés":
            $tmp = "Los mejor notados";
            break;
        case "Prévenir par Email quand de nouvelles réponses sont postées":
            $tmp = "Notificar por correo electrónico cuando nuevas contribuciones serán añadidas";
            break;
        case "Prévisualiser les modifications":
            $tmp = "Pre visualizar las modificaciones";
            break;
        case "Prévisualiser":
            $tmp = "Pre visualizar";
            break;
        case "Principal":
            $tmp = "Principal";
            break;
        case "Privé":
            $tmp = "Privado";
            break;
        case "Prix":
            $tmp = "Precio";
            break;
        case "Profil":
            $tmp = "Perfil";
            break;
        case "Proposé":
            $tmp = "Propuesto";
            break;
        case "Proposer des articles en votre nom":
            $tmp = "Proponer noticias en su nombre";
            break;
        case "Proposer un article":
            $tmp = "Someter una noticia";
            break;
        case "Proposer un seul lien.":
            $tmp = "Proponga un solo vinculo.";
            break;
        case "Proposition de modification":
            $tmp = "Propuesta de modificación";
            break;
        case "Proposition de modifications de liens":
            $tmp = "Propuesta de modificación de vínculos";
            break;
        case "Propriétaire":
            $tmp = "Propietario";
            break;
        case "Question":
            $tmp = "Pregunta";
            break;
        case "Qui est en ligne ?":
            $tmp = "Quién está en línea ?";
            break;
        case "Rapport généré le":
            $tmp = "Reporte generado el";
            break;
        case "Rapporter un lien rompu":
            $tmp = "Señalar un vinculo roto";
            break;
        case "Raz de la liste":
            $tmp = "Poner a cero la lista de miembros";
            break;
        case "Réalisé":
            $tmp = "Realizado";
            break;
        case "Réalisées":
            $tmp = "Realizados";
            break;
        case "Recevez par mail les nouveautés du site.":
            $tmp = "Reciba por correo electrónico las novedades.";
            break;
        case "Recherche avancée":
            $tmp = "Búsqueda avanzada";
            break;
        case "Recherche":
            $tmp = "Buscar";
            break;
        case "Rechercher dans la base des utilisateurs":
            $tmp = "Buscar en la base de usuarios";
            break;
        case "Rechercher dans les critiques":
            $tmp = "Buscar en las criticas";
            break;
        case "Rechercher dans les rubriques":
            $tmp = "Buscar en las secciones";
            break;
        case "Rechercher dans tous les forums":
            $tmp = "Buscar en todos los foros";
            break;
        case "Rechercher dans":
            $tmp = "Buscar en";
            break;
        case "Recommander ce site à un ami":
            $tmp = "Recomiende esta página  web a un amigo";
            break;
        case "Reçus":
            $tmp = "Recibidos";
            break;
        case "Rejoindre ce groupe":
            $tmp = "Unirse a este grupo";
            break;
        case "Replier la liste":
            $tmp = "esconder la lista";
            break;
        case "Répondre":
            $tmp = "Responder";
            break;
        case "Réponse postée.":
            $tmp = "Respuesta enviada.";
            break;
        case "Réponse":
            $tmp = "Respuesta";
            break;
        case "réponses précédentes":
            $tmp = "Respuestas anteriores";
            break;
        case "réponses suivantes":
            $tmp = "respuestas siguientes";
            break;
        case "Réponses":
            $tmp = "Respuestas";
            break;
        case "Requête de modification d'un lien utilisateur":
            $tmp = "Demanda de modificación de vinculo del usuario";
            break;
        case "Réseaux sociaux":
            $tmp = "Redes sociales";
            break;
        case "Réservées":
            $tmp = "Comprados";
            break;
        case "Résolu":
            $tmp = "Resuelto";
            break;
        case "Restantes":
            $tmp = "Quedan";
            break;
        case "Résultats":
            $tmp = "Resultados";
            break;
        case "Retour à l'administration":
            $tmp = "Volver a la administración";
            break;
        case "Retour à l'index des critiques":
            $tmp = "Volver a la página  principal de las criticas";
            break;
        case "Retour à l'index des rubriques":
            $tmp = "Volver a la página  principal de las secciones";
            break;
        case "Retour à l'index FAQ":
            $tmp = "Volver a la página  principal de la FAQ";
            break;
        case "Retour à la sous-rubrique :":
            $tmp = "Volver a la sub-categoría :";
            break;
        case "Retour en arrière":
            $tmp = "Volver";
            break;
        case "Retour vers":
            $tmp = "Volver a";
            break;
        case "retour":
            $tmp = "Volver";
            break;
        case "Revenir à":
            $tmp = "Volver a";
            break;
        case "Revenir aux avatars standards":
            $tmp = "Reactivar los avatares standares";
            break;
        case "Revue de l'éditeur":
            $tmp = "Revista del editor";
            break;
        case "Rien":
            $tmp = "nada";
            break;
        case "Robots - Spiders":
            $tmp = "Robots - Spiders";
            break;
        case "Rubriques spéciales":
            $tmp = "Secciones especiales";
            break;
        case "Rubriques":
            $tmp = "Secciones";
            break;
        case "S'inscrire à la liste de diffusion du site":
            $tmp = "Inscribirse a la lista de difusión de la página  web";
            break;
        case "Salle":
            $tmp = "Sala";
            break;
        case "Samedi":
            $tmp = "Sábado";
            break;
        case "Sans titre":
            $tmp = "Sin titulo";
            break;
        case "Sans":
            $tmp = "Sin";
            break;
        case "Sauter à : ":
            $tmp = "Saltar a: ";
            break;
        case "Sauter à :":
            $tmp = "Saltar a: ";
            break;
        case "Sauver les modifications":
            $tmp = "Guardar cambios";
            break;
        case "Sauvez votre journal":
            $tmp = "Registrar el diario";
            break;
        case "Se connecter":
            $tmp = "Conectarse";
            break;
        case "Seconde(s)":
            $tmp = "Segundo(s)";
            break;
        case "Sélectionner la page":
            $tmp = "Seleccionar la página ";
            break;
        case "Sélectionner le nombre de news que vous souhaitez voir apparaître sur la page principale.":
            $tmp = "Seleccionar la cantidad de noticias que aparecerán en la página  principal.";
            break;
        case "Sélectionner un sujet":
            $tmp = "Seleccione un Asunto";
            break;
        case "Sélectionner une catégorie":
            $tmp = "Seleccione una categoría";
            break;
        case "Sélectionnez un forum et participez !":
            $tmp = "Seleccione un foro y participe !";
            break;
        case "Sélectionnez un thème d'affichage":
            $tmp = "Seleccione un tema";
            break;
        case "semaine":
            $tmp = "semana";
            break;
        case "semaines":
            $tmp = "semanas";
            break;
        case "Septembre":
            $tmp = "Septiembre";
            break;
        case "Seulement":
            $tmp = "Solo";
            break;
        case "Seuls les modérateurs peuvent poster de nouveaux sujets et répondre dans ce forum.":
            $tmp = "Solo los moderadores pueden insertar nuevos asuntos y responder en este foro.";
            break;
        case "Si vous étiez enregistré, vous pourriez proposer des liens.":
            $tmp = "Si estuviera conectado, podría proponer vínculos";
            break;
        case "Si vous n'avez rien demandé, ne vous inquiétez pas :  vous êtes le seul à lire ce message. Connectez-vous simplement avec ce nouveau mot de passe.":
            $tmp = "Si usted no pidió nada, tranquilo :  Solo usted vio este mensaje. Conecte se simplemente con este código.";
            break;
        case "Si vous n'avez rien demandé, ne vous inquiétez pas. Effacez juste ce Email. ":
            $tmp = "Si usted no pidió nada, no se preocupe. no tenga cuenta de este correo. ";
            break;
        case "Si vous souhaitez personnaliser un peu le site, c'est l'endroit indiqué. ":
            $tmp = "Si quiere personalizar el sito web, este es el lugar indicado. ";
            break;
        case "Signature : ":
            $tmp = "Firma : ";
            break;
        case "Signature":
            $tmp = "Firma";
            break;
        case "Site à découvrir : ":
            $tmp = "Página  web a descubrir : ";
            break;
        case "Site web : ":
            $tmp = "Su página  web : ";
            break;
        case "Site web officiel. Veillez à ce que votre url commence bien par":
            $tmp = "Producto oficial de la página  web. Mire bien que su URL comience por";
            break;
        case "Sites classés par":
            $tmp = "Sitios web clasificados por";
            break;
        case "Situation géographique":
            $tmp = "Su situación geográfica";
            break;
        case "Sondage":
            $tmp = "Encuesta";
            break;
        case "sondages avec le meilleur taux de participation":
            $tmp = "Las encuestas con la mejor tasa de participación";
            break;
        case "Souligné":
            $tmp = "Subrayado";
            break;
        case "Soumettre une offre":
            $tmp = "Someter una oferta";
            break;
        case "Soumission de liens brisés":
            $tmp = "Señalar un vinculo no valido";
            break;
        case "Soumission en cours. Une fois vos fichiers chargés, cliquer sur le bouton OK pour finir.":
            $tmp = "Sumisión en curso. al final de la descarga de sus ficheros en el servidor, haga clic sobre el botón ok para acabar.";
            break;
        case "Sous-catégorie :":
            $tmp = "Sub-categoría :";
            break;
        case "Sous-catégorie":
            $tmp = "Sub-categoría";
            break;
        case "Sous-catégories par ligne (page principale)":
            $tmp = "Sub-categorías por linea (Página  principal)";
            break;
        case "Sous-catégories":
            $tmp = "Sub-categorías";
            break;
        case "Sous-rubrique":
            $tmp = "Sub-categoría";
            break;
        case "Statistiques des chargements":
            $tmp = "Estadísticas de descargas";
            break;
        case "Statistiques diverses":
            $tmp = "Estadísticas diversas";
            break;
        case "Statistiques générales":
            $tmp = "Estadísticas generales";
            break;
        case "Statistiques":
            $tmp = "Estadísticas";
            break;
        case "Status":
            $tmp = "Estado";
            break;
        case "stb=Demande en attente de validation":
            $tmp = "stb = Petición en espera de validación";
            break;
        case "Suivant":
            $tmp = "Siguiente";
            break;
        case "Sujet : ":
            $tmp = "Asunto : ";
            break;
        case "Sujet":
            $tmp = "Asunto";
            break;
        case "Sujet":
            $tmp = "Tema";
            break;
        case "Sujets actifs : ":
            $tmp = "Asuntos activos : ";
            break;
        case "Sujets actifs":
            $tmp = "Asuntos activos";
            break;
        case "Sujets":
            $tmp = "Asuntos";
            break;
        case "Suppression du message impossible.":
            $tmp = "Supresión del mensaje imposible.";
            break;
        case "Suppression du message sélectionné impossible.":
            $tmp = "El mensaje seleccionado no se pudo suprimir.";
            break;
        case "Supprimer ce message":
            $tmp = "Borrar este mensaje";
            break;
        case "Systèmes d'exploitation":
            $tmp = "Sistemas operativos";
            break;
        case "Tableau de bord":
            $tmp = "Pizarra de la administración";
            break;
        case "Tableau":
            $tmp = "Tabla";
            break;
        case "Taille du fichier":
            $tmp = "Dimensiones del fichero";
            break;
        case "Taille":
            $tmp = "Tamaño";
            break;
        case "Téléchargements":
            $tmp = "Descargas";
            break;
        case "Télécharger un avatar personnel":
            $tmp = "Descargar un avatar personalizado";
            break;
        case "Terminer":
            $tmp = "Terminar";
            break;
        case "Text aligné à droite":
            $tmp = "Alineación de texto a la derecha";
            break;
        case "Text aligné à gauche":
            $tmp = "Alineación de texto a la izquierda";
            break;
        case "Text centré":
            $tmp = "Texto centrado";
            break;
        case "Text justifié":
            $tmp = "Texto justificado";
            break;
        case "Texte : ":
            $tmp = "Texto : ";
            break;
        case "Texte complet":
            $tmp = "Texto completo";
            break;
        case "Texte d'introduction":
            $tmp = "Texto de introducción";
            break;
        case "Texte de critique non valide... Il ne peut pas être vide":
            $tmp = "El texto de la critica no es valido... No puede estar vacío";
            break;
        case "Texte étendu":
            $tmp = "Texto extendido";
            break;
        case "Texte":
            $tmp = "Texto";
            break;
        case "Thème":
            $tmp = "Tema";
            break;
        case "Thème(s)":
            $tmp = "Tema(s)";
            break;
        case "Titre : ":
            $tmp = "Titulo : ";
            break;
        case "Titre :":
            $tmp = "Titulo :";
            break;
        case "Titre (de A à Z)":
            $tmp = "Titulo (de A a Z)";
            break;
        case "Titre (de Z à A)":
            $tmp = "Titulo (de Z a A)";
            break;
        case "Titre de la page : ":
            $tmp = "Titulo de la página  : ";
            break;
        case "Titre du lien":
            $tmp = "Titulo del vinculo : ";
            break;
        case "Titre du lien":
            $tmp = "Titulo del vinculo";
            break;
        case "Titre non valide... Il ne peut pas être vide":
            $tmp = "El titulo no es valido... No puede estar vacío";
            break;
        case "Titre":
            $tmp = "Titulo";
            break;
        case "Top":
            $tmp = "Top";
            break;
        case "Total : ":
            $tmp = "Total : ";
            break;
        case "Total des nouveaux liens pour la semaine dernière":
            $tmp = "Total de nuevos vínculos la semana pasada";
            break;
        case "Total des nouveaux liens":
            $tmp = "Total de nuevos vínculos";
            break;
        case "total votes":
            $tmp = "Total de votos";
            break;
        case "Total":
            $tmp = "Total";
            break;
        case "Tous les auteurs":
            $tmp = "Todos los autores";
            break;
        case "Tous les liens proposés sont vérifiés avant insertion.":
            $tmp = "Todos los vínculos propuestos, son verificados antes de insertarlos.";
            break;
        case "Tous les sujets":
            $tmp = "Todos los Asuntos";
            break;
        case "Tous les utilisateurs enregistrés peuvent poster de nouveaux sujets et répondre dans ce forum.":
            $tmp = "Todos los usuarios identificados pueden crear Asuntos y responder a los mensajes en este foro.";
            break;
        case "Tous les utilisateurs enregistrés peuvent poster des messages privés.":
            $tmp = "Todos los usuarios registrados pueden enviar mensajes internos.";
            break;
        case "Tous":
            $tmp = "Todos";
            break;
        case "Tout développer":
            $tmp = "Descomprimir todo";
            break;
        case "Tout regrouper":
            $tmp = "Comprimir todo";
            break;
        case "trié par ordre":
            $tmp = "clasificado por";
            break;
        case "Type":
            $tmp = "Tipo";
            break;
        case "Un problème est survenu":
            $tmp = "Ocurrió un problema";
            break;
        case "Un seul vote par jour, merci":
            $tmp = "Solo un voto por día !";
            break;
        case "Un seul vote par sondage.":
            $tmp = "Solo un voto por encuesta.";
            break;
        case "Un utilisateur web ayant l'adresse IP ":
            $tmp = "Un usuario Web con la dirección IP";
            break;
        case "Une erreur est survenue lors de l'interrogation de la base.":
            $tmp = "Ocurrió un error al interrogar la base.";
            break;
        case "Une fois enregistré":
            $tmp = "Una vez registrado";
            break;
        case "Url : ":
            $tmp = "URL : ";
            break;
        case "Url de la page : ":
            $tmp = "URL de la Página  : ";
            break;
        case "Url":
            $tmp = "URL";
            break;
        case "Utilisateur avancé":
            $tmp = "Usuario avanzado";
            break;
        case "Utilisateur enregistré":
            $tmp = "Usuario registrado";
            break;
        case "Utilisateur ou message inexistant dans la base.":
            $tmp = "Usuario o mensaje inexistente en la base.";
            break;
        case "Utilisateur":
            $tmp = "Usuario";
            break;
        case "Utilisateurs enregistrés : ":
            $tmp = "Usuarios registrados : ";
            break;
        case "Utilisateurs enregistrés":
            $tmp = "Usuarios registrados";
            break;
        case "Utilisateurs montrés":
            $tmp = "Usuarios mostrados";
            break;
        case "Utilisateurs trouvés pour":
            $tmp = "Usuarios encontrados por";
            break;
        case "Utilisateurs trouvés":
            $tmp = "Usuarios encontrados";
            break;
        case "Utilisateurs":
            $tmp = "Usuarios";
            break;
        case "Utilisation : ":
            $tmp = "Utilización : ";
            break;
        case "Utilisation":
            $tmp = "Utilización";
            break;
        case "Utilisé":
            $tmp = "Utilizado";
            break;
        case "Valider":
            $tmp = "Validar";
            break;
        case "Validez cette option et le texte suivant apparaîtra sur votre page d'accueil":
            $tmp = "Valide esta opción y el siguiente texto aparecerá en la página  de inicio";
            break;
        case "Vendredi":
            $tmp = "viernes";
            break;
        case "Véritable adresse Email":
            $tmp = "Su verdadero E-mail";
            break;
        case "Version":
            $tmp = "Versión";
            break;
        case "Vidéo Youtube":
            $tmp = "Youtube video";
            break;
        case "Vidéos":
            $tmp = "Videos";
            break;
        case "Vider la table chatBox":
            $tmp = "Vaciar la tabla del chat";
            break;
        case "vient de demander une confirmation pour changer de mot de passe.":
            $tmp = "viene de pedir un código de confirmación para cambiar la contraseña.";
            break;
        case "Ville":
            $tmp = "Ciudad";
            break;
        case "Visite":
            $tmp = "Visita";
            break;
        case "Visiter ce site web":
            $tmp = "Visitar éste sitio web";
            break;
        case "Visiteur":
            $tmp = "Visiteur";
            break;
        case "visiteur(s) et":
            $tmp = "visita(s) et";
            break;
        case "Visitez le minisite":
            $tmp = "Visite el sitio Web de Mini!";
            break;
        case "Voici les articles publiés dans cette rubrique.":
            $tmp = "Las noticias que siguen son publicadas bajo esta sección..";
            break;
        case "Vos centres d'intérêt":
            $tmp = "Sus hobbys";
            break;
        case "Vos informations personnelles (Nom, Tél., ...)":
            $tmp = "Sus informaciones personales (Nombre, apellidos, Tél., ...)";
            break;
        case "vote":
            $tmp = "voto";
            break;
        case "Voter":
            $tmp = "Voto";
            break;
        case "Votes : ":
            $tmp = "Votos : ";
            break;
        case "votes":
            $tmp = "votos :";
            break;
        case "Votes":
            $tmp = "votos";
            break;
        case "Votre activité":
            $tmp = "Su actividad";
            break;
        case "Votre adresse Email":
            $tmp = "Su correo electrónico";
            break;
        case "Votre adresse Ip est enregistrée":
            $tmp = "Se registro su dirección IP";
            break;
        case "Votre adresse mèl 'truquée'":
            $tmp = "Su E-mail 'truncado'";
            break;
        case "Votre adresse mèl est obligatoire":
            $tmp = "Su Email. Obligatorio";
            break;
        case "Votre ami":
            $tmp = "Su amigo";
            break;
        case "Votre Avatar":
            $tmp = "Su Avatar";
            break;
        case "Votre commentaire : ":
            $tmp = "Su comentario : ";
            break;
        case "Votre compte":
            $tmp = "Su cuenta";
            break;
        case "Votre contribution n'a pas été supprimée car au moins un post est encore rattaché (forum arbre).":
            $tmp = "Su contribución no se pudo suprimir porque una o más respuestas se unen. (foro del ¡RBOL).";
            break;
        case "Votre Email":
            $tmp = "Su dirección electrónica";
            break;
        case "Votre fiche d'inscription":
            $tmp = "Su formulario de registro";
            break;
        case "Votre lien":
            $tmp = "Su vinculo";
            break;
        case "Votre message a été posté":
            $tmp = "Su mensaje fu incluido";
            break;
        case "Votre mot de passe est : ":
            $tmp = "Su contraseña es : ";
            break;
        case "Votre mot de passe est erroné ou vous n'avez pas l'autorisation d'éditer ce message, refaites un essai.":
            $tmp = "Su contraseña es errónea o no tiene autorización para editar este mensaje, vuelva a intentarlo.";
            break;
        case "Votre nom complet. C'est indispensable.":
            $tmp = "Su nombre completo. Es necesario.";
            break;
        case "Votre nom est trop long ou vide. Il doit faire moins de 50 caractères.":
            $tmp = "Su nombre es muy largo o esta vacío. Tiene que hacer al menos 50 caracteres.";
            break;
        case "Votre nom":
            $tmp = "Su nombre";
            break;
        case "Votre offre":
            $tmp = "Su oferta";
            break;
        case "Votre page Web":
            $tmp = "Su página  WEB";
            break;
        case "Votre requête":
            $tmp = "Su búsqueda";
            break;
        case "Votre situation géographique":
            $tmp = "Su situación geográfica";
            break;
        case "Votre surnom est trop long. Il doit faire moins de 25 caractères.":
            $tmp = "Su apodo es muy largo. Tiene que hacer máximo 25 caracteres.";
            break;
        case "Votre url de confirmation est :":
            $tmp = "Votre url de confirmation est :";
            break;
        case "Votre url de confirmation est expirée":
            $tmp = "Su URL de confirmación ha caducado";
            break;
        case "Votre véritable identité":
            $tmp = "Nombre real";
            break;
        case "Vous allez envoyer cet article":
            $tmp = "Va a enviar esta noticia";
            break;
        case "vous aurez certains avantages, comme pouvoir modifier l'aspect du site,":
            $tmp = "Tendrá ciertas aventajas, como poder modificar el aspecto del sitio web,";
            break;
        case "Vous avez changé l'url de la bannière":
            $tmp = "Usted cambio el URL del Banner";
            break;
        case "Vous avez déjà voté aujourd'hui":
            $tmp = "Usted ya voto hoy !";
            break;
        case "Vous avez perdu votre mot de passe ?":
            $tmp = "Perdió su contraseña ?";
            break;
        case "Vous avez un nouveau message.":
            $tmp = "Tiene un nuevo mensaje.";
            break;
        case "Vous avez":
            $tmp = "Tiene";
            break;
        case "Vous devez accepter la charte d'utilisation du site":
            $tmp = "Para ser aceptado, tiene que aceptar las condiciones de uso de este sitio web";
            break;
        case "Vous devez choisir un icône pour votre message, refaites un essai.":
            $tmp = "Tiene que escoger un icono para su mensaje, inténtelo de nuevo.";
            break;
        case "Vous devez choisir un titre et un message pour poster votre sujet.":
            $tmp = "Debe proporcionar el Asunto y el mensaje para fijar su publicación.";
            break;
        case "Vous devez entrer un titre de lien et une adresse relative, ou laisser les deux zones vides":
            $tmp = "Debe incorporar un título de vinculo y un vinculo relacionado o dejar ambos en blanco";
            break;
        case "Vous devez entrer votre nom et votre adresse Email":
            $tmp = "Asegúrese de entrar su nombre y su Email";
            break;
        case "Vous devez obligatoirement saisir un sujet, refaites un essai.":
            $tmp = "Debe por obligación escoger un Asunto, inténtelo de nuevo.";
            break;
        case "Vous devez prévisualiser avant de pouvoir envoyer":
            $tmp = "Debe pre visualizar antes de publicar";
            break;
        case "Vous devez taper un message à poster.":
            $tmp = "Debe especificar une mensaje para enviarlo.";
            break;
        case "Vous devez vous identifier.":
            $tmp = "Tiene que identificarse.";
            break;
        case "Vous êtes connecté en tant que :":
            $tmp = "Usted está conectado como :";
            break;
        case "Vous êtes connecté en tant que":
            $tmp = "Conectado como ";
            break;
        case "Vous êtes maintenant enregistré. Vous allez recevoir un code de confirmation dans votre boîte à lettres électronique.":
            $tmp = "Ya esta inscrito. Recibirá un código de confirmación en su correo electrónico";
            break;
        case "Vous n'avez aucun message.":
            $tmp = "No tiene mensajes.";
            break;
        case "Vous n'avez pas encore de compte personnel ? Vous devriez":
            $tmp = "Todavia no tiene una cuenta personal ? Podría tener una";
            break;
        case "Vous n'avez pas l'autorisation d'éditer ce message.":
            $tmp = "Usted no tiene autorización para editar este mensaje.";
            break;
        case "Vous n'êtes pas (encore) enregistré ou vous n'êtes pas (encore) connecté.":
            $tmp = "No esta registrado o no se conecto.";
            break;
        case "Vous n'êtes pas autorisé à participer à ce forum":
            $tmp = "No esta autorizado a participar en este Foro";
            break;
        case "Vous n'êtes pas encore autorisé à vous connecter.":
            $tmp = "Todavía no esta autorizado a conectarse.";
            break;
        case "Vous n'êtes pas identifié comme modérateur de ce forum. Opération interdite.":
            $tmp = "No se identifico como moderador de este foro. Operación prohibida.";
            break;
        case "Vous n'êtes pas le modérateur de ce forum, vous ne pouvez utiliser cette fonction.":
            $tmp = "Usted no es moderador de este foro, esta función no puede utilizarla.";
            break;
        case "Vous ne pouvez éditer ce message, vous n'en êtes pas le destinataire.":
            $tmp = "Usted no puede editar este mensaje, no es el destinatario.";
            break;
        case "Vous ne pouvez répondre à ce message, vous n'en êtes pas le destinataire.":
            $tmp = "Usted no puede responder a este mensaje, no es el destinatario.";
            break;
        case "Vous ne pouvez répondre à ce message.":
            $tmp = "Usted no puede responder a este mensaje.";
            break;
        case "Vous ne pouvez répondre à ce topic il est verrouillé. Contacter l'administrateur du site.":
            $tmp = "No puede responder a este Asunto porque esta cerrado. Contactar el administrador.";
            break;
        case "Vous pourrez le modifier après vous être connecté sur":
            $tmp = "Podrá modificar la después de conectarse a";
            break;
        case "Vous pouvez charger un fichier carnet.txt dans votre miniSite":
            $tmp = "Usted puede descargar un fichero carnet.txt en su mini-pagina  Web";
            break;
        case "Vous pouvez en poster un ici.":
            $tmp = "Puede publicar uno aquí";
            break;
        case "Vous pouvez utiliser du code html, pour créer un lien par exemple":
            $tmp = "Puede utilizar código HTML, para crear un vinculo por ejemplo";
            break;
        case "Vous pouvez utiliser notre moteur de recherche sur : ":
            $tmp = "Puede utilizar nuestro motor de búsqueda en: ";
            break;
        case "Vous recevrez un mèl quand elle sera approuvée.":
            $tmp = "Recibirá un correo electronico cuand oel vinculo sera aceptado.";
            break;
        case "vous reconnecter.":
            $tmp = "Conecte se otra vez.";
            break;
        case "Vous, ou quelqu'un d'autre, a utilisé votre Email identifiant votre compte":
            $tmp = "Usted, o otra persona, utilizo su cuenta de correo electrónico";
            break;
        case "Vous":
            $tmp = "Usted";
            break;
        case "vrai nom":
            $tmp = "Su verdadera identidad";
            break;

        default:
            $tmp = "Necesita una traducción [** $phrase **]";
            break;
    }
    return $tmp;
}