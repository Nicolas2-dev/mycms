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

        case " à ":
            $tmp = " a ";
            break;
        case " Actualiser l'Auteur":
            $tmp = "Actualizar el autor";
            break;
        case " Afficher ":
            $tmp = "Visualización";
            break;
        case " Ajouter un Auteur ":
            $tmp = "Añadir un autor";
            break;
        case " et réalisé un gain global de ":
            $tmp = " y realizado una ganancia global de ";
            break;
        case "- Etes-vous certain ?":
            $tmp = "- ¿está usted seguro?";
            break;
        case "- Mot de Passe (si Privé) - Le nom du fichier de formulaire (si Texte étendu) => modules/sform/forum - Les Groupes ID (si Groupe)":
            $tmp = "- Contraseña (Si privado)<br />- Nombre del fichero del formulario (Si texto extendido) en modules/sform/forum<br />- ID del grupo (Si grupo)";
            break;
        case "(255 caractères Max.)":
            $tmp = "(255 caracteres Max.)";
            break;
        case "(Brève description des centres d'intérêt du site. 200 caractères maxi.)":
            $tmp = "(Breve descripción de los centros de interés del sitio web. 200 caracteres máximo.)";
            break;
        case "(C'est le nombre de contributions affichées pour chaque page relative à un Sujet)":
            $tmp = "(Es la cantidad de contribuciones indicadas por cada página relativa a un Tema)";
            break;
        case "(C'est le nombre de Sujets affichés pour chaque page relative à un Forum)":
            $tmp = "(Es la cantidad de temas indicados por cada página relativa a un Foro)";
            break;
        case "(Certain des éventuelles URLs ?)":
            $tmp = "(¿Seguro de la veracidad de las URLs?)";
            break;
        case "(Définissez la méthode d'analyse que doivent adopter les robots des moteurs de recherche)":
            $tmp = "(Defina el método de análisis que deben adoptar los robots de los motores de busqueda)";
            break;
        case "(Définissez le public intéressé par votre site)":
            $tmp = "(Defina el público interesado por su sitio web)";
            break;
        case "(Définissez un ou plusieurs mot(s) clé(s). 1000 caractères maxi. Remarques : une lettre accentuée équivaut le plus souvent à 8 caractères. La majorité des moteurs de recherche font la distinction minuscule/majuscule. Séparez vos mots par une virgule)":
            $tmp = "(Defina una o más palabra(s) clave(s). 1000 caracteres máximo. Observaciones: una letra acentuada equivale generalmente a 8 caracteres. La mayorÌa de los motores de busqueda hacen la distinción minúscula/mayuscula separe sus palabras por una , (coma))";
            break;
        case "(description ou nom complet du Sujet - max : 40 caractères)":
            $tmp = "(El texto completo y/o la descripcion del tema - max: 40 caracteres)";
            break;
        case "(description ou nom complet du sujet)":
            $tmp = "(descripción o nombre completo del tema)";
            break;
        case "(Ex. : 16 days. Remarque : ne définissez pas de fréquence inférieure à 14 jours !)":
            $tmp = "(Ej.: 16 days. Observación: no defina una frecuencia inferior a 14 dìas!)";
            break;
        case "(Ex. : fr(Français), en(Anglais), en-us(Américain), de(Allemand), it(Italien), pt(Portugais), etc)":
            $tmp = "(Ej.: fr (Francés), en (Inglés), en -US (Americano), de (Alemán),IT (Italiano), Pt (Portugués),  es (Espa≤ntilde;ol) etc)";
            break;
        case "(Ex. : l'adresse e-mail du webmaster)":
            $tmp = "(Ej.: la dirección de correo electrónico del webmaster)";
            break;
        case "(Ex. : nom de votre compagnie/service)":
            $tmp = "(Ej.: nombre de su compañÌa/servicio)";
            break;
        case "(Ex. : nom du webmaster)":
            $tmp = "(Ej.: nombre del webmaster)";
            break;
        case "(exemple : tonial.png)":
            $tmp = "(Ejemplo: opinion.gif)";
            break;
        case "(Informations légales)":
            $tmp = "(Información legal)";
            break;
        case "(nom de l'image + extension)":
            $tmp = "(Nombre de la imagen + extension";
            break;
        case "(Redirection sur un forum externe : <.a href...)":
            $tmp = "(Redirigir un foro. poner <.a href...)";
            break;
        case "(seulement pour modifications)":
            $tmp = "(Solo si quiere cambiarla)";
            break;
        case "(un simple nom sans espaces - 20 caractères max.)":
            $tmp = "(solo un nombre y sin espacios - max: 20 caracteres)";
            break;
        case "(un simple nom sans espaces)":
            $tmp = "(un nombre simple sin espacios)";
            break;
        case "* Désigne un champ obligatoire":
            $tmp = "* Designa un campo obligatorio";
            break;
        case "* indique les champs requis":
            $tmp = "* Indica un campo obligatorio";
            break;
        case "0=Tout le monde, 1=Membre seulement, 3=Administrateur seulement, 9=Désactiver":
            $tmp = "(0=Todo el mundo, 1=Solo miembros, 3=Solo administradores, 9=Inactivo)";
            break;
        case "14 ans":
            $tmp = "14 años";
            break;
        case "A ce jour, vous avez effectué ":
            $tmp = "Hasta ahora, efectó ";
            break;
        case "a été envoyée":
            $tmp = "Fué enviado";
            break;
        case "a":
            $tmp = "tiene";
            break;
        case "Abandonner":
            $tmp = "Abandonar";
            break;
        case "Accepter":
            $tmp = "Aceptar";
            break;
        case "Accès restreint":
            $tmp = "Acceso limitado";
            break;
        case "Accès":
            $tmp = "Acceso";
            break;
        case "Actif":
            $tmp = "Activo";
            break;
        case "Actif(s)":
            $tmp = "Activo(s)";
            break;
        case "Action":
            $tmp = "Accion";
            break;
        case "Activation":
            $tmp = "Activación";
            break;
        case "Activer bloc-note du groupe":
            $tmp = "Activar bloc de notas del grupo";
            break;
        case "Activer chat du groupe":
            $tmp = "Activar el chat de grupo";
            break;
        case "Activer export-news":
            $tmp = "Activar Exportación de noticias";
            break;
        case "Activer Facebook":
            $tmp = "Activate Facebook";
            break;
        case "Activer gestionnaire de fichiers du groupe":
            $tmp = "Habilitar el grupo de administrador de archivos";
            break;
        case "Activer l'authentification SMTP(S)":
            $tmp = "Habilitar la autenticación SMTP(S)";
            break;
        case "Activer l'éditeur Tinymce":
            $tmp = "Activar Tinymce editor";
            break;
        case "Activer l'icône [N]ouveau pour les catégories":
            $tmp = "¿Activar el icono [N]uevo para las categorias ?";
            break;
        case "Activer l'upload dans les forums ?":
            $tmp = "Activar upload en los foros";
            break;
        case "Activer la description simplifiée des utilisateurs":
            $tmp = "¿Activar la descripcion simple para el usuario?";
            break;
        case "Activer la résolution DNS pour les posts des forums, IP-Ban, ...":
            $tmp = "¿Activar la Resolución DNS para los mensajes de los foros, IP-Ban... ?";
            break;
        case "Activer le Bloc":
            $tmp = "Activar el Bloque";
            break;
        case "Activer le chiffrement":
            $tmp = "Habilitar el cifrado";
            break;
        case "Activer le multi-langue":
            $tmp = "Activar la compatibilidad del multi-idioma";
            break;
        case "Activer le tri des contributions 'résolues'":
            $tmp = "Activar la selección de las contribuciones ' resueltas ':";
            break;
        case "Activer les avatars":
            $tmp = "¿Activar caritas(Emoticones)?";
            break;
        case "Activer les Bannières ?":
            $tmp = "¿Activar los banners en su sitio?";
            break;
        case "Activer les commentaires des sondages":
            $tmp = "¿Activar los comentarios en las encuestas?";
            break;
        case "Activer les images dans le menu administration":
            $tmp = "¿Activar las imagenes en el menu de la administracion?";
            break;
        case "Activer les menus courts pour l'administration":
            $tmp = "¿Activar los menus cortos para la administracion?";
            break;
        case "Activer les référants HTTP":
            $tmp = "¿Activar los referentes HTTP?";
            break;
        case "Activer les textes cachés":
            $tmp = "Activar los textos ocultos en los foros";
            break;
        case "Activer PAD du groupe":
            $tmp = "Activar PAD del grupo";
            break;
        case "Activer son MiniSite":
            $tmp = "Activar su Mini-Web";
            break;
        case "Activer Twitter":
            $tmp = "Activar Twitter";
            break;
        case "Activité":
            $tmp = "Actividad";
            break;
        case "Actualiser l'administrateur":
            $tmp = "Modificar el administrador";
            break;
        case "Admin-Plugins":
            $tmp = "Admin-Plugins";
            break;
        case "Administrateur ID":
            $tmp = "AdminID";
            break;
        case "Administrateur(s) de la rubrique :":
            $tmp = "Administrador(es) de la rúbrica:";
            break;
        case "Administrateur(s) du Sujet :":
            $tmp = "Administrador(es) del Tema:";
            break;
        case "Administrateur(s) du sujet":
            $tmp = "Topic administrator(es)";
            break;
        case "Administrateur(s)":
            $tmp = "Administrator(es)";
            break;
        case "Administrateurs":
            $tmp = "Administradores";
            break;
        case "Administration de META-LANG":
            $tmp = "META-LANG administración";
            break;
        case "Administration des bannières":
            $tmp = "Administración de los Banners publicitarios";
            break;
        case "Administration des MétaTags":
            $tmp = "MetaTags administración";
            break;
        case "Administration":
            $tmp = "Administración";
            break;
        case "Adresse E-mail de l'administrateur":
            $tmp = "Email del administrador";
            break;
        case "Adresse E-mail masquée":
            $tmp = "Direccion electronica escondida";
            break;
        case "Adresse E-mail où envoyer le message":
            $tmp = "Correo electronico donde se tendra que enviar el mensaje";
            break;
        case "Adresse e-mail principale":
            $tmp = "Dirección correo electrónico principal";
            break;
        case "Adulte":
            $tmp = "Adulto";
            break;
        case "Affectation d'Articles vers une nouvelle Catégorie":
            $tmp = "Afectacion de los articulos a otra categoria";
            break;
        case "Affectation":
            $tmp = "Afectado!";
            break;
        case "Affecter à une autre Catégorie":
            $tmp = "Afectar a otra categoria";
            break;
        case "Affichage":
            $tmp = "Visualización";
            break;
        case "Afficher la liste des prospects":
            $tmp = "Ver la lista de los inscritos";
            break;
        case "Afficher le chemin dans le titre de la page :":
            $tmp = "Indicar el camino en el tÌtulo de la página:";
            break;
        case "Afficher le logo sur la page web links":
            $tmp = "¿Mostrar el logo en la página principal de los vinculos?";
            break;
        case "Afficher les resultats des Sondages":
            $tmp = "Ver los resultados de las encuestas";
            break;
        case "Afficher pendant":
            $tmp = "Indicar durante";
            break;
        case "Afficher signature":
            $tmp = "Mostrar firma";
            break;
        case "Afficher votre signature":
            $tmp = "Mostrar su firma";
            break;
        case "Aide en ligne de ce bloc":
            $tmp = "Ayuda en lìnea de este bloque";
            break;
        case "Aide en ligne":
            $tmp = "Ayuda en lìnea";
            break;
        case "Ajouter Annonceur":
            $tmp = "Añadir Cliente";
            break;
        case "Ajouter cette critique":
            $tmp = "Añadir esta critica";
            break;
        case "Ajouter des Catégories":
            $tmp = "Añadir categorias";
            break;
        case "Ajouter des Liens relatifs au Sujet : ":
            $tmp = "Añadir vinculos relativos a este tema:";
            break;
        case "Ajouter des membres":
            $tmp = "Añadir miembros";
            break;
        case "Ajouter Grands Titres":
            $tmp = "Añadir Grandes Titulos";
            break;
        case "Ajouter la critique N° : ":
            $tmp = "Añadir Critica ID:";
            break;
        case "Ajouter membres":
            $tmp = "Agregar miembro";
            break;
        case "Ajouter plus d'affichages":
            $tmp = "Añadir más visualizaciones: ";
            break;
        case "Ajouter plus de Forum pour":
            $tmp = "Añadir mas Foros para";
            break;
        case "Ajouter un administrateur":
            $tmp = "Añadir un administrador";
            break;
        case "Ajouter un annonceur":
            $tmp = "Añadir Cliente";
            break;
        case "Ajouter un Article dans une Rubrique":
            $tmp = "Añadir un articulo en una rubrica";
            break;
        case "Ajouter un article":
            $tmp = "Añadir articulo";
            break;
        case "Ajouter un Editorial":
            $tmp = "Añadir un Editorial";
            break;
        case "Ajouter un Ephéméride : ":
            $tmp = "Añadir efemeride:";
            break;
        case "Ajouter un éphéméride":
            $tmp = "Añadir un efeméride";
            break;
        case "Ajouter un groupe":
            $tmp = "Añadir un grupo";
            break;
        case "Ajouter un lien":
            $tmp = "Añadir un vinculo";
            break;
        case "Ajouter un nouveau Lien":
            $tmp = "Añadir un nuevo vinculo";
            break;
        case "Ajouter un nouveau Sujet":
            $tmp = "Añadir nuevo tema";
            break;
        case "Ajouter un nouvel Annonceur":
            $tmp = "Añadir cliente";
            break;
        case "Ajouter un ou des membres au groupe":
            $tmp = "Agregar uno o más miembros al grupo";
            break;
        case "Ajouter un Sujet":
            $tmp = "Añadir un tema!";
            break;
        case "Ajouter un Téléchargement":
            $tmp = "Añadir descarga";
            break;
        case "Ajouter un Utilisateur":
            $tmp = "Añadir usuario";
            break;
        case "Ajouter une bannière":
            $tmp = "Añadir un banner";
            break;
        case "Ajouter une Catégorie principale":
            $tmp = "Añadir una categoria principal";
            break;
        case "Ajouter une catégorie":
            $tmp = "Añadir una categoría";
            break;
        case "Ajouter une nouvelle bannière":
            $tmp = "Añadir neuvo Banner publicitario";
            break;
        case "Ajouter une nouvelle Catégorie":
            $tmp = "Añadir nueva categoria";
            break;
        case "Ajouter une nouvelle Rubrique":
            $tmp = "Añadir nueva rubrica";
            break;
        case "Ajouter une nouvelle Sous-Rubrique":
            $tmp = "Añadir una nueva Subdivisión de rúbrica";
            break;
        case "Ajouter une publication":
            $tmp = "Añadir una publicación";
            break;
        case "Ajouter une question réponse":
            $tmp = "Añadir una pregunta respuesta";
            break;
        case "Ajouter une question":
            $tmp = "Añadir una pregunta";
            break;
        case "Ajouter une Rubrique":
            $tmp = "Añadir una rubrica!";
            break;
        case "Ajouter une Sous-catégorie":
            $tmp = "Añadir una subcategoria";
            break;
        case "Ajouter une URL":
            $tmp = "Añadir URL";
            break;
        case "Ajouter":
            $tmp = "Añadir";
            break;
        case "Année":
            $tmp = "Añ";
            break;
        case "Annonceurs faisant de la publicité":
            $tmp = "Clientes que hacen la publicidad";
            break;
        case "Annuler":
            $tmp = "Anular";
            break;
        case "Anonyme":
            $tmp = "Anónimo";
            break;
        case "Anonymes":
            $tmp = "Anónimos";
            break;
        case "Arbre":
            $tmp = "Arbol";
            break;
        case "Archiver les Référants":
            $tmp = "Archivar los referentes";
            break;
        case "Archives articles":
            $tmp = "Archivos de artículos";
            break;
        case "Article en attente de validation":
            $tmp = "Artículos pendientes de validación";
            break;
        case "Article(s) attaché(s)":
            $tmp = "Articulo(s) liado(s)";
            break;
        case "Articles !":
            $tmp = "Articulos dentro!";
            break;
        case "Articles en attente de validation !":
            $tmp = "¡Artículos pendientes de validación!";
            break;
        case "Articles programmés pour la publication.":
            $tmp = "Artículos programados para la publicación.";
            break;
        case "Articles programmés":
            $tmp = "Artículos programados";
            break;
        case "Articles":
            $tmp = "Articulos";
            break;
        case "Assembler une lettre et la tester":
            $tmp = "Pegar una carta y probarla";
            break;
        case "Attachement":
            $tmp = "documento adjunto";
            break;
        case "ATTENTION :  êtes-vous certain de vouloir effacer ce Forum et tous ses Sujets ?":
            $tmp = "ATENCION: ¿Está seguro de querer borrar este Foro y todos sus Temas?";
            break;
        case "ATTENTION :  êtes-vous sûr de vouloir supprimer cette Catégorie, ses Forums et tous ses Sujets ?":
            $tmp = "ATENCION: ¿Está seguro de querer borrar esta Categorìa, sus Foros y todos sus Temas?";
            break;
        case "Attention : ":
            $tmp = "ATENCION :";
            break;
        case "ATTENTION : Etes-vous sûr de vouloir effacer cette Catégorie et tous ses Liens ?":
            $tmp = "ATENCION: Esta seguro de querer borrar esta Categoria y todos sus vínculos?";
            break;
        case "ATTENTION : êtes-vous sûr de vouloir effacer cette FAQ et toutes ses questions ?":
            $tmp = "CUIDADO: ¿Est´ seguro que quiere borrar esta FAQ y todo su contenido?";
            break;
        case "ATTENTION : êtes-vous sûr de vouloir effacer cette question ?":
            $tmp = "CUIDADO: ¿Est´ seguro que quiere borrar esta pregunta?";
            break;
        case "ATTENTION : êtes-vous sûr de vouloir supprimer ce fichier téléchargeable ?":
            $tmp = "CUIDADO: ¿Seguro que quiere borrar esta descarga?";
            break;
        case "ATTENTION : Le Sondage choisi va être supprimé IMMEDIATEMENT de la base de données !":
            $tmp = "ATENCION: La encuesta que selecciono sera retirada de la base de datos definitivamente";
            break;
        case "ATTENTION !!!":
            $tmp = "¡¡¡CUIDADO!!!";
            break;
        case "Au format CSV":
            $tmp = "en formato CSV";
            break;
        case "Aucun lien brisé rapporté.":
            $tmp = "No hay ningun vínculo invalido informado.";
            break;
        case "Aucun Sujet":
            $tmp = "Sin Asunto";
            break;
        case "Aucune catégorie":
            $tmp = "Ninguna categoria";
            break;
        case "Aucune critique à ajouter":
            $tmp = "No hay criticas a Añadir";
            break;
        case "Aucune indexation":
            $tmp = "No indexar";
            break;
        case "Aucune table n'a été trouvée":
            $tmp = "No se encontro ninguna tabla en la base de datos.";
            break;
        case "Audience":
            $tmp = "Audiencia";
            break;
        case "Auteur":
            $tmp = "Autor";
            break;
        case "Auteur(s)":
            $tmp = "Autor(es)";
            break;
        case "Auteurs actuels":
            $tmp = "Autores actuales";
            break;
        case "Auto-Articles":
            $tmp = "Autoartìculos";
            break;
        case "Automatique":
            $tmp = "Automático";
            break;
        case "Autoriser la connexion":
            $tmp = "Autorizar este usuario a conectarse al sitio web";
            break;
        case "Autoriser la création automatique des membres":
            $tmp = "¿Autorizar la creacion automatica de los miembros?";
            break;
        case "Autoriser la création de news pour":
            $tmp = "Autorizar la creacion de noticias para";
            break;
        case "Autoriser le HTML":
            $tmp = "Autorizar el HTML:";
            break;
        case "Autoriser les abonnements":
            $tmp = "¿Autorizar las Suscripciones?";
            break;
        case "Autoriser les autres utilisateurs à voir mon adresse E-mail ?":
            $tmp = "¿Autorizar los otros usuarios a ver mi Email?";
            break;
        case "Autoriser les autres utilisateurs à voir son adresse E-mail":
            $tmp = "¿Autorizar los otros usuarios a ver su Email?";
            break;
        case "Autoriser les commentaires anonymes":
            $tmp = "¿Autoriza los comentarios anonimos?";
            break;
        case "Autoriser les membres invisibles":
            $tmp = "¿Autorizar los Miembros Invisibles?";
            break;
        case "Autoriser les Signatures":
            $tmp = "Autorizar la firmas:";
            break;
        case "Autoriser les Smilies":
            $tmp = "Autorizar las caritas:";
            break;
        case "Autoriser les utilisateurs à choisir leur mot de passe":
            $tmp = "¿Autorizar los usuarios a elegir su Contraseña?";
            break;
        case "Autoriser les utilisateurs à voter plusieurs fois":
            $tmp = "¿Autorizar los usuarios a votar varias veces?";
            break;
        case "Avant de supprimer le groupe":
            $tmp = "Antes de eliminar el grupo";
            break;
        case "Bannières actives":
            $tmp = "Banners publicitarios activos";
            break;
        case "Bannières inactives":
            $tmp = "Pancartas inactivas";
            break;
        case "Bannières terminées":
            $tmp = "Banners acabados";
            break;
        case "Bannières":
            $tmp = "Banners";
            break;
        case "Blackboard":
            $tmp = "Blackboard";
            break;
        case "Bloc Administration":
            $tmp = "Bloque Administración";
            break;
        case "Bloc Principal":
            $tmp = "Bloque Principal";
            break;
        case "Blocs":
            $tmp = "Bloques";
            break;
        case "Bonjour et bienvenue dans l'installation automatique du module":
            $tmp = "Hola y bienvenido a la instalación automática del módulo.";
            break;
        case "Bonjour":
            $tmp = "Hola";
            break;
        case "Caché":
            $tmp = "Escondido";
            break;
        case "car il est modérateur unique de forum. Oter ses droits de modération puis retirer le du groupe.":
            $tmp = "porque es moderador del foro único. Eliminar los derechos de la moderación y eliminar el grupo.";
            break;
        case "Catégorie : ":
            $tmp = "Categoria: ";
            break;
        case "Catégorie :":
            $tmp = "Cat:";
            break;
        case "Catégorie sauvegardée":
            $tmp = "Categoria salvaguardada";
            break;
        case "Catégorie":
            $tmp = "Categoría";
            break;
        case "Catégories :":
            $tmp = "Categorias:";
            break;
        case "Catégories de Forum":
            $tmp = "Categorias de los foros";
            break;
        case "Catégories":
            $tmp = "Categorias";
            break;
        case "Ce fichier est appelé à la fin du header du thème":
            $tmp = "Este fichero se llama al final del header del tema";
            break;
        case "Ce fichier est appelé après la fin de la génération de la page HTML":
            $tmp = "Este fichero se llama después del final de la generación de la página HTML";
            break;
        case "Ce fichier est appelé avant le début du footer du thème":
            $tmp = "Este fichero se llama antes del principio del ' footer ' del tema";
            break;
        case "Ce fichier est appelé avant que de commencer la génération de la page HTML":
            $tmp = "Este fichero se llama antes de comenzar la generación de la página HTML";
            break;
        case "Ce fichier est appelé dans l'évènement ONLOAD de la balise BODY => JAVASCRIPT":
            $tmp = "Este fichero se llama en el acontecimiento ONLOAD de la baliza BODY => JAVASCRIPT";
            break;
        case "Ce fichier est appelé entre le HEAD et /HEAD lors de la génération de la page HTML":
            $tmp = "Este fichero se llama entre el HEAD y /HEAD en la generación de la página HTML";
            break;
        case "Ce fichier permet d'envoyer un MI personnalisé lorsqu'un nouveau membre s'inscrit":
            $tmp = "Este fichero permite enviar un MI personalizado cuando un nuevo miembro se inscribe";
            break;
        case "Ce fichier permet l'affichage d'informations complémentaires dans la page de login":
            $tmp = "Este fichero permite la visualización de información complementaria en la página del login";
            break;
        case "Ce fichier permet la configuration technique de SuperCache":
            $tmp = "Este fichero permite la configuración técnica de la memoria tampon";
            break;
        case "Ce META-MOT existe déjà":
            $tmp = "Este META-MOT ya existe";
            break;
        case "Ce modérateur":
            $tmp = "Este moderador";
            break;
        case "Ce programme d'installation va configurer votre site internet pour utiliser ce module.":
            $tmp = "Este instalador configurará su sitio web para utilizar este módulo.";
            break;
        case "ce site est génial":
            $tmp = "Por ejemplo: Esto es la pera";
            break;
        case "Ceci effacera tous ses articles et ses commentaires !":
            $tmp = "Esto borrara todos los articulos y todos sus comentarios!";
            break;
        case "Ceci va détruire tous ses Articles !":
            $tmp = "Esto borrará tambien los articulos y noticias que hay en ella!";
            break;
        case "Centres d'intérêt":
            $tmp = "Usted se interesa a ";
            break;
        case "cesiteestgénial":
            $tmp = "Por ejemplo: estoeslapera";
            break;
        case "Cet annonceur a les BANNIERES ACTIVES suivantes dans":
            $tmp = "Este cliente tiene Banners activos funcionando en";
            break;
        case "Cet annonceur n'a pas de bannière active pour le moment.":
            $tmp = "Este cliente no tiene, por el momento, ningun banner activo.";
            break;
        case "Cette Catégorie existe déjà !":
            $tmp = "Esta categoria YA existe";
            break;
        case "Cette opération est irréversible elle va affecter votre base de données par la suppression de table(s) ou/et de ligne(s) et la suppression ou modification de certains fichiers.":
            $tmp = "Esta operación es irreversible y afectará a su base de datos mediante la eliminación de tabla(s) o/y línea(s) y la eliminación o modificación de algunos archivos.";
            break;
        case "Cette Rubrique a":
            $tmp = "(Esta rubrica tiene)";
            break;
        case "Changer l'ordre":
            $tmp = "Cambiar el orden";
            break;
        case "Changer l'ordre des publications":
            $tmp = "Cambiar el orden de las publicaciones";
            break;
        case "Changer l'ordre des rubriques":
            $tmp = "Cambiar el orden de las rúbricas";
            break;
        case "Changer l'ordre des sous-rubriques":
            $tmp = "Cambiar el orden de las subdivisión de subrúbricas";
            break;
        case "Changer la date":
            $tmp = "¿cambiar fecha?";
            break;
        case "Changer les Catégories : ":
            $tmp = "Cambiar las categorias:";
            break;
        case "Changer les privilèges ? :":
            $tmp = "¿cambiar privilegios? :";
            break;
        case "Changer":
            $tmp = "Cambiar";
            break;
        case "Chaque bloc peut utiliser SuperCache. La valeur du délai de rétention 0 indique que le bloc ne sera pas caché (obligatoire pour le bloc function#adminblock).":
            $tmp = "Cada bloque puede utilizar la memoria tampon. El valor del plazo de retención 0 (Cero) indica que el bloque no se ocultará (obligatorio para el bloque function#adminblock).";
            break;
        case "Chemin de certaines images (vote, ...)":
            $tmp = "Camino de otros tipos de imagenes (voto,...)";
            break;
        case "Chemin des images des sujets":
            $tmp = "Camino de las imagenes de los temas";
            break;
        case "Chemin des images du menu administrateur":
            $tmp = "Camino para las imagenes de la administracion";
            break;
        case "Chemin et nom de l'image du Smiley":
            $tmp = "Directory and name of the picture of the Smiley";
            break;
        case "Choisir les privilèges ? :":
            $tmp = "¿Escoger privilegios? :";
            break;
        case "Choisir un groupe":
            $tmp = "Escoger un grupo";
            break;
        case "Choisir un modérateur":
            $tmp = "Elegir un moderador";
            break;
        case "Choisir un rôle":
            $tmp = "Elegir un papel";
            break;
        case "Clics":
            $tmp = "Clics";
            break;
        case "Cliquer ici pour proposer une Critique.":
            $tmp = "Presione aqui para proponer una.";
            break;
        case "Cliquez pour éditer":
            $tmp = "Presione para editar";
            break;
        case "Cliquez sur \"Etape suivante\" pour continuer.":
            $tmp = "Haga clic en \"Siguiente paso\" para continuar..";
            break;
        case "Combien de référants au maximum":
            $tmp = "¿Cuantos referentes a lo maximo?";
            break;
        case "comme modérateur du forum":
            $tmp = "Como moderador foro";
            break;
        case "Commentaire":
            $tmp = "Comentario";
            break;
        case "Communication":
            $tmp = "Comunicación";
            break;
        case "Compte E-mail (Provenance)":
            $tmp = "El mensaje proviene de";
            break;
        case "Compteur":
            $tmp = "Contador";
            break;
        case "Configuration de la page":
            $tmp = "Page setting";
            break;
        case "Configuration de PHPmailer SMTP(S)":
            $tmp = "Configuración de PHPmailer SMTP(S)";
            break;
        case "Configuration des Forums":
            $tmp = "Configuración de los Foros";
            break;
        case "Configuration des infos en Backend & Réseaux Sociaux":
            $tmp = "Configuracion del flujo & Redes Sociales";
            break;
        case "Configuration Forums":
            $tmp = "Foros Configuración";
            break;
        case "Configuration par défaut des Liens Web":
            $tmp = "Configuracion por defecto de los vinculos";
            break;
        case "Configurer MySql (Recommandé)":
            $tmp = "Configurar MySql (Recomendado)";
            break;
        case "Confirmer la lecture":
            $tmp = "Confirmar la lectura";
            break;
        case "Connexion":
            $tmp = "Conexión";
            break;
        case "Contacter l'administration du site.":
            $tmp = "Póngase en contacto con la administración del sitio.";
            break;
        case "Contenu :":
            $tmp = "Contenido:";
            break;
        case "Contenu de la table":
            $tmp = "Contenido de la tabla";
            break;
        case "Contenu":
            $tmp = "Contenido";
            break;
        case "Contrôle des serveurs de mails":
            $tmp = "Control de servidores de correo.";
            break;
        case "Contrôler les serveurs de mail de tous les utilisateurs":
            $tmp = "Controla los servidores de email de todos los usuarios.";
            break;
        case "Copié":
            $tmp = "Copiado";
            break;
        case "Copier":
            $tmp = "Copiar";
            break;
        case "Copyright":
            $tmp = "Copyright";
            break;
        case "Corps de message":
            $tmp = "Cuerpo del mensaje";
            break;
        case "Corps":
            $tmp = "Cuerpo";
            break;
        case "courtes":
            $tmp = "Cortas";
            break;
        case "Création":
            $tmp = "Creación";
            break;
        case "Créé":
            $tmp = "Creado";
            break;
        case "Créer forum du groupe":
            $tmp = "Grupo de los foros";
            break;
        case "Créer le bloc WS":
            $tmp = "Crear el bloque WS";
            break;
        case "Créer le fichier en utilisant le modèle":
            $tmp = "Crear el fichero utilizando el modelo";
            break;
        case "Créer le fichier":
            $tmp = "Crear el fichero";
            break;
        case "Créer le(s) bloc(s) à droite":
            $tmp = "Crear el bloque (s) a la derecha";
            break;
        case "Créer le(s) bloc(s) à gauche":
            $tmp = "Crear el bloque (s) de la izquierda";
            break;
        case "Créer MiniSite du groupe":
            $tmp = "Crear Minisite grupo";
            break;
        case "Créer un Bloc droite":
            $tmp = "Crear un bloque derecha";
            break;
        case "Créer un Bloc gauche":
            $tmp = "Crear un bloque en la izquierda";
            break;
        case "Créer un groupe.":
            $tmp = "Crear un grupo.";
            break;
        case "Créer un nouveau Bloc":
            $tmp = "Crear un nuevo bloque a la derecha";
            break;
        case "Créer un nouveau Sondage":
            $tmp = "Crear una nueva encuesta";
            break;
        case "Créer un nouveau":
            $tmp = "Crear un nuevo";
            break;
        case "Créer utilisateur":
            $tmp = "Crear usuario";
            break;
        case "Créer":
            $tmp = "Crear";
            break;
        case "Critique en attente de validation.":
            $tmp = "Crítico esperando la validación";
            break;
        case "Critiques en attente de validation":
            $tmp = "Criticas en sala de espera";
            break;
        case "Critiques":
            $tmp = "Criticas";
            break;
        case "CSS Specifique":
            $tmp = "Specific CSS";
            break;
        case "dans":
            $tmp = "en";
            break;
        case "dans le groupe":
            $tmp = "en el grupo";
            break;
        case "Date :":
            $tmp = "Fecha:";
            break;
        case "Date de début":
            $tmp = "Fécha de inicio";
            break;
        case "Date de démarrage du site":
            $tmp = "Fecha de inicio del sitio";
            break;
        case "Date de fin":
            $tmp = "Fécha de fin";
            break;
        case "Date prévu de publication":
            $tmp = "Date of publication";
            break;
        case "Date":
            $tmp = "Fecha";
            break;
        case "de":
            $tmp = "de";
            break;
        case "Déconnexion":
            $tmp = "Desconectar / Salir";
            break;
        case "Demande acceptée.":
            $tmp = "Petición aceptada.";
            break;
        case "Demande refusée pour votre participation au groupe":
            $tmp = "Solicitud rechazada para su participación en el grupo";
            break;
        case "Déplier la liste":
            $tmp = "Ampliar la lista";
            break;
        case "Dernière optimisation effectuée le":
            $tmp = "Ultima optimizacion efectuada el";
            break;
        case "Derniers":
            $tmp = "Ultimos";
            break;
        case "des modérateurs du forum":
            $tmp = "De los moderadores del foro";
            break;
        case "des":
            $tmp = "de las";
            break;
        case "Désabonner un utilisateur":
            $tmp = "Dar de baja a un usuario";
            break;
        case "Désactiver bloc-note du groupe":
            $tmp = "Desactivar bloc de notas del grupo";
            break;
        case "Désactiver chat du groupe":
            $tmp = "Desactivar grupo de chat";
            break;
        case "Désactiver gestionnaire de fichiers du groupe":
            $tmp = "Desactivar el grupo gestor de archivos";
            break;
        case "Désactiver PAD du groupe":
            $tmp = "Desactivar PAD del grupo";
            break;
        case "Description de l'éphéméride":
            $tmp = "Descripcion de el efemeride:";
            break;
        case "Description de la Page des Critiques":
            $tmp = "Descripcion de la página de criticas:";
            break;
        case "Description:":
            $tmp = "Descripción:";
            break;
        case "Description":
            $tmp = "Descripción";
            break;
        case "Désinstaller le module":
            $tmp = "Desinstalar el modulo";
            break;
        case "Désolé, les nouveaux Mots de Passe ne correspondent pas. Cliquez sur retour et recommencez":
            $tmp = "Lo siento, Las contraseñas no corresponden. presione volver y vuelva a intentarlo";
            break;
        case "Diffusion d'un Message Interne":
            $tmp = "Enviar un mensaje interno";
            break;
        case "Distribution":
            $tmp = "Distribucion";
            break;
        case "Divers":
            $tmp = "Varios";
            break;
        case "DKIM du DNS (si existant et valide).":
            $tmp = "DNS DKIM (si existe y es válido).";
            break;
        case "DNS ou serveur de mail incorrect":
            $tmp = "DNS o servidor de correo no válido";
            break;
        case "Doit être un mot sans espace.":
            $tmp = "Debe ser una palabra sin espacios.";
            break;
        case "Doit être un nom de fichier valide avec une de ces extensions : jpg, jpeg, png, gif.":
            $tmp = "Debe ser un nombre de archivo válido con una de esas extensiones: jpg, jpeg, png, gif.";
            break;
        case "Droits de publication":
            $tmp = "Derechos de publicación";
            break;
        case "Droits des auteurs":
            $tmp = "Derechos de los autores";
            break;
        case "Droits modules":
            $tmp = "Derechos de los módulos";
            break;
        case "Droits":
            $tmp = "Derechos";
            break;
        case "Du DNS":
            $tmp = "Desde DNS";
            break;
        case "du groupe":
            $tmp = "Grupo";
            break;
        case "Durée de vie en heure du cookie Admin":
            $tmp = "Admin'cookie TTL (En horas)";
            break;
        case "Durée de vie en heure du cookie User":
            $tmp = "User'cookie TTL (En horas)";
            break;
        case "E-mail : ":
            $tmp = "Email: ";
            break;
        case "E-mail: ":
            $tmp = "Email contacto: ";
            break;
        case "E-mail":
            $tmp = "Email del contacto";
            break;
        case "Edité":
            $tmp = "Editado";
            break;
        case "Editer ce sondage":
            $tmp = "Editar esta encuesta";
            break;
        case "Editer Ephéméride : ":
            $tmp = "Editar efemerides:";
            break;
        case "Editer groupe":
            $tmp = "Editar grupo";
            break;
        case "Editer l'annonceur":
            $tmp = "Edición del anunciante";
            break;
        case "Editer l'Article Automatique":
            $tmp = "Edición de la noticia automatica";
            break;
        case "Editer l'Article d'ID : ":
            $tmp = "Edicion del articulo ID:";
            break;
        case "Editer la catégorie":
            $tmp = "Editar la categoría";
            break;
        case "Editer la question réponse":
            $tmp = "Editar la pregunta respuesta";
            break;
        case "Editer la rubrique":
            $tmp = "Editar la rúbrica";
            break;
        case "Editer la sous-rubrique":
            $tmp = "Editar la subdivisione de rúbrica";
            break;
        case "Editer le Bloc Administration":
            $tmp = "Editar el bloque Administración";
            break;
        case "Editer le Sujet :":
            $tmp = "Edicion de un Tema:";
            break;
        case "Editer les Administrateurs":
            $tmp = "Editar los administradores";
            break;
        case "Editer les Catégories":
            $tmp = "Edición de categorias";
            break;
        case "Editer les fichiers de configuration":
            $tmp = "Editar los ficheros de configuración";
            break;
        case "Editer les forums":
            $tmp = "Editar los foros";
            break;
        case "Editer les informations concernant":
            $tmp = "Modificar la información de";
            break;
        case "Editer les Liens Relatifs":
            $tmp = "Editar los vinculos relativos";
            break;
        case "Editer les Sondages":
            $tmp = "Editar las encuestas";
            break;
        case "Editer paramètres Grand Titre":
            $tmp = "Editar parametros de los Grandes Titulos";
            break;
        case "Editer Question & Réponse":
            $tmp = "Edición de preguntas y respuestas";
            break;
        case "Editer un Article":
            $tmp = "Edición de un articulo";
            break;
        case "Editer un Téléchargement":
            $tmp = "Edición de la descarga";
            break;
        case "Editer une catégorie":
            $tmp = "Editar una categoría";
            break;
        case "Editer une publication":
            $tmp = "Editar una publicación";
            break;
        case "Editer une Rubrique : ":
            $tmp = "Edicion de la rubrica:";
            break;
        case "Editer":
            $tmp = "Editar";
            break;
        case "Edition Bannière":
            $tmp = "Editar el banner";
            break;
        case "Edition des Blocs de droite":
            $tmp = "Edicion de los bloques de la derecha";
            break;
        case "Edition des Blocs de gauche":
            $tmp = "Edición de los bloques de la izquierda";
            break;
        case "Edition des Catégories":
            $tmp = "Edicion de las categorias";
            break;
        case "Edition des Forums":
            $tmp = "Edición de los Foros";
            break;
        case "Edition des sondages":
            $tmp = "Edicion de las encuestas";
            break;
        case "Edition des Utilisateurs":
            $tmp = "Edición Usuarios";
            break;
        case "Edition du Bloc Principal":
            $tmp = "Edición del bloque principal";
            break;
        case "Edition Forums":
            $tmp = "Foros edición";
            break;
        case "Edition":
            $tmp = "Edición";
            break;
        case "Edito":
            $tmp = "Editorial";
            break;
        case "Editorial ajouté à la base de données":
            $tmp = "Editorial añadido a la base de datos";
            break;
        case "Editorial modifié":
            $tmp = "Editorial modificado";
            break;
        case "Editorial supprimé de la base de données":
            $tmp = "Editorial borrado de la base de datos";
            break;
        case "Effacé":
            $tmp = "Borrado";
            break;
        case "Effacer (Efface les Liens cassés et les avis pour un Lien donné)":
            $tmp = "Borrar (borra los vínculos rotos y los comentarios para un vínculo dado)";
            break;
        case "Effacer / Modifier une Critique":
            $tmp = "Borrar / modificar una critica";
            break;
        case "Effacer Bannière":
            $tmp = "Borrar Banner";
            break;
        case "Effacer ce sondage":
            $tmp = "Borrar este encuesta";
            break;
        case "Effacer l'Article":
            $tmp = "Borrar la noticia";
            break;
        case "Effacer l'Auteur":
            $tmp = "Borrar el autor";
            break;
        case "Effacer la publication :":
            $tmp = "Eliminar la publicación:";
            break;
        case "Effacer la Rubrique : ":
            $tmp = "Borrar la rubrica: ";
            break;
        case "Effacer la sous-rubrique : ":
            $tmp = "Borrar la subdivisión de rúbrica: ";
            break;
        case "Effacer le Sujet !":
            $tmp = "Borrar el tema!";
            break;
        case "Effacer le Sujet":
            $tmp = "Borrar el tema";
            break;
        case "Effacer les Référants":
            $tmp = "Borrar los referentes";
            break;
        case "Effacer les Sondages":
            $tmp = "Borrar las encuestas";
            break;
        case "Effacer un Article : ":
            $tmp = "Borrar articulo: ";
            break;
        case "Effacer un Article !":
            $tmp = "Borrar Articulo!";
            break;
        case "Effacer un Bloc droit":
            $tmp = "Borrar un bloque de la derecha";
            break;
        case "Effacer un Bloc gauche":
            $tmp = "Borrar un bloque de la izquierda";
            break;
        case "Effacer une Rubrique":
            $tmp = "Borrar una rubrica!";
            break;
        case "Effacer":
            $tmp = "Borrar";
            break;
        case "Effectuée le":
            $tmp = "Hecho el";
            break;
        case "En Ligne":
            $tmp = "En linea";
            break;
        case "en tant qu'Administrateur.":
            $tmp = "Siendo administrador.";
            break;
        case "Encodage":
            $tmp = "Codificación del Charset";
            break;
        case "Enfin, pour pouvoir réinstaller le module par la suite avec Module-Install, cliquez sur le bouton \"Marquer le module comme désinstallé\".":
            $tmp = "Lastly, to be able to reinstall the addon with Module-Install thereafter, click on the button \"Mark the addon as uninstalled\".";
            break;
        case "Enregistrer":
            $tmp = "Grabar";
            break;
        case "Entête":
            $tmp = "Encabezado";
            break;
        case "Entrez à nouveau le Mot de Passe":
            $tmp = "Indique otra ver su contraseña";
            break;
        case "Envoyer à tous les membres":
            $tmp = "Enviar a todos los miembros";
            break;
        case "Envoyer La Lettre":
            $tmp = "Enviar la NewsLetter";
            break;
        case "Envoyer par E-mail les nouveaux Articles à l'Administrateur":
            $tmp = "Enviar por correo electronico las nuevas noticias al administrador";
            break;
        case "Envoyer un courriel à":
            $tmp = "Enviar un correo electrónico a";
            break;
        case "Envoyer":
            $tmp = "Enviar";
            break;
        case "Ephémérides":
            $tmp = "Efemérides";
            break;
        case "ERREUR : cet identifiant est déjà utilisé":
            $tmp = "Error : Esta identificación ya esta en uso";
            break;
        case "Erreur : cette URL est déjà présente dans la base de données !":
            $tmp = "ERROR: Este vínculo ya esta presente en la base de datos";
            break;
        case "ERREUR : DNS ou serveur de mail incorrect":
            $tmp = "Error: DNS o servidor de correo incorrecto";
            break;
        case "Erreur : La Catégorie":
            $tmp = "ERROR: La Categoria";
            break;
        case "Erreur : La Sous-catégorie":
            $tmp = "ERROR: La Subcategoria";
            break;
        case "Erreur : vous devez saisir un TITRE pour votre Lien !":
            $tmp = "ERROR: Tiene que poner un TITULO para su vínculo";
            break;
        case "Erreur : vous devez saisir une DESCRIPTION pour votre Lien !":
            $tmp = "ERROR: Tiene que poner una descripción";
            break;
        case "Erreur : vous devez saisir une URL pour votre Lien !":
            $tmp = "ERROR: Tiene que poner un dirección URL para que su vínculo funcione";
            break;
        case "est terminée !":
            $tmp = "ha terminado!";
            break;
        case "et tous ses Commentaires ?":
            $tmp = "y todos su comentarios?";
            break;
        case "et toutes ses bannières !!!":
            $tmp = "¡¡¡Y todos sus banners!!!";
            break;
        case "Etape suivante":
            $tmp = "Etapa siguiente";
            break;
        case "Etat : ":
            $tmp = "Estado:";
            break;
        case "Etat":
            $tmp = "Estado";
            break;
        case "Etes-vous certain de vouloir effacer cette publication ?":
            $tmp = "¿Esta seguro de querer borrar esta publicación?";
            break;
        case "Etes-vous sûr de vouloir effacer ce sujet ?":
            $tmp = "¿Esta seguro de querer borrar este tema?";
            break;
        case "Etes-vous sûr de vouloir effacer cet annonceur et TOUTES ses bannières ?":
            $tmp = "¿Está seguro de querer borrar éste cliente y todos sus banners?";
            break;
        case "Etes-vous sûr de vouloir effacer cet Article ?":
            $tmp = "¿Está seguro que quiere borrar este articulo?";
            break;
        case "Etes-vous sûr de vouloir effacer cette Bannière ?":
            $tmp = "¿Está seguro de querer borrar éste banner?";
            break;
        case "Etes-vous sûr de vouloir effacer cette Rubrique ?":
            $tmp = "¿Está seguro que quiere borrar esta rubrica?";
            break;
        case "Etes-vous sûr de vouloir effacer cette sous-rubrique ?":
            $tmp = "¿Está seguro de querer borrar esta subdivisión de rúbrica?";
            break;
        case "Etes-vous sûr de vouloir effacer l'Article N°":
            $tmp = "¿Está seguro que quiere borrar el articulo numero ID #";
            break;
        case "Etes-vous sûr de vouloir effacer":
            $tmp = "¿Está usted seguro que quiere borrar?";
            break;
        case "Etes-vous sûr de vouloir EFFACER":
            $tmp = "Está seguro de querer BORRAR";
            break;
        case "Etes-vous sûr de vouloir supprimer cette boîte de Titres ?":
            $tmp = "CUIDADO: ¿está seguro que quiere borrar este Grande Titulo?";
            break;
        case "Exclure TOUS les membres du groupe":
            $tmp = "Excluir todos los miembros del grupo";
            break;
        case "Exclure":
            $tmp = "Excluir";
            break;
        case "Exemple":
            $tmp = "Ejemplo";
            break;
        case "existe déjà !":
            $tmp = "Ya existe";
            break;
        case "Expédier en tant":
            $tmp = "Enviar como";
            break;
        case "Extension des fichiers d'image":
            $tmp = "Extensión de los ficheros de imagen";
            break;
        case "Extraire l'annuaire":
            $tmp = "Exportar la lista de miembros";
            break;
        case "Fait : ":
            $tmp = "Hecho: ";
            break;
        case "Faq":
            $tmp = "FAQ";
            break;
        case "FAQ":
            $tmp = "FAQ";
            break;
        case "Fermé":
            $tmp = "Cerrado";
            break;
        case "Fermer les nouvelles inscriptions":
            $tmp = "¿Cerrar las nuevas inscripciones?";
            break;
        case "Fichier de configuration automatique absent. Installation/désinstallation automatique impossible.":
            $tmp = "Archivo de configuración automática ausente. Instalación/desinstalación automática imposible.";
            break;
        case "Fichier de formulaire":
            $tmp = "Form file";
            break;
        case "Fichiers configurations":
            $tmp = "Ficheros configuraciones";
            break;
        case "Fichiers dans /slogs. table par table, lignes par lignes, tables scindées : limite":
            $tmp = " Ficheros en/slogs tabla por tabla, lÌneas por lÌneas, tablas divididas: lÌmite";
            break;
        case "Fichiers dans /slogs. table par table, tables non scindées : limite":
            $tmp = " Ficheros en/slogs tabla por tabla, tablas no divididas: lÌmite";
            break;
        case "Filtre":
            $tmp = "Filtro";
            break;
        case "Fonction mail à utiliser":
            $tmp = "Funcion MAIL que se va a utilizar";
            break;
        case "Fonctions":
            $tmp = "Funciones";
            break;
        case "Format de données":
            $tmp = "Formato de datos";
            break;
        case "Format de fichier":
            $tmp = "Formato de archivo";
            break;
        case "Forum classé en":
            $tmp = "Foro clasificado por";
            break;
        case "Forum d'origine":
            $tmp = "Foro de origen";
            break;
        case "Forum de destination":
            $tmp = "Foro de destino";
            break;
        case "Fréquence de visite des Robots/Spiders":
            $tmp = "Frecuencia de visita de los Robots/Spiders";
            break;
        case "Fusionner des forums":
            $tmp = "Fusionar foros";
            break;
        case "Gain réalisable":
            $tmp = "Ganancia realizable";
            break;
        case "Gain total réalisé":
            $tmp = "Ganancia total realizada";
            break;
        case "génération automatique du DKIM par le portail.":
            $tmp = "Generación automática del DKIM por parte del portal.";
            break;
        case "Gérer les Liens Relatifs : ":
            $tmp = "Gestionar los vinculos relativos:";
            break;
        case "Gestion des blocs":
            $tmp = "Gestión de bloques";
            break;
        case "Gestion des forums":
            $tmp = "Foros gestión";
            break;
        case "Gestion des groupes":
            $tmp = "Gestión de los grupos";
            break;
        case "Gestion des Sujets":
            $tmp = "Gestión de los Temas";
            break;
        case "Gestion des sujets":
            $tmp = "Gestión de temas";
            break;
        case "Gestion modules":
            $tmp = "Gestión de módulos";
            break;
        case "Gestion, Installation Modules":
            $tmp = "Gestión, Instalación Módulos";
            break;
        case "Gestionnaire de Fichiers":
            $tmp = "Gestión de ficheros";
            break;
        case "Gestionnaire Fichiers":
            $tmp = "Gestor de archivos";
            break;
        case "Grands Titres de sites de News":
            $tmp = "Grandes titulos";
            break;
        case "Groupe de travail":
            $tmp = "Grupo de trabajo";
            break;
        case "Groupe ID":
            $tmp = "Grupo ID";
            break;
        case "Groupe":
            $tmp = "Grupo";
            break;
        case "Groupes":
            $tmp = "Grupos";
            break;
        case "Hauteur de l'image du backend":
            $tmp = "Altura de la imagen del Flujo";
            break;
        case "Heure locale":
            $tmp = "Formato de la hora local";
            break;
        case "Heure":
            $tmp = "Hora";
            break;
        case "Hors Ligne":
            $tmp = "Sin conexión";
            break;
        case "Icône":
            $tmp = "Icono";
            break;
        case "ID Article:":
            $tmp = "ID Articulo/noticia:";
            break;
        case "ID Utilisateur":
            $tmp = "ID del usuario";
            break;
        case "ID":
            $tmp = "ID";
            break;
        case "Identifiant ":
            $tmp = "Indentificante";
            break;
        case "Identifiant Utilisateur":
            $tmp = "Identificante/ID del usuario";
            break;
        case "Identifiant":
            $tmp = "Apodo";
            break;
        case "Identification E-mail de l'émetteur":
            $tmp = "Email Message";
            break;
        case "Ignorer (Efface toutes les demandes pour un Lien donné)":
            $tmp = "Ignorar (borre todas las solicitudes para un vìnculo dado)";
            break;
        case "Ignorer":
            $tmp = "Ignorar";
            break;
        case "Il y a":
            $tmp = "Hay";
            break;
        case "Illimité":
            $tmp = "Sin limite";
            break;
        case "Image de garde":
            $tmp = "Imagen de cobertura:";
            break;
        case "Image du Sujet :":
            $tmp = "Imagen del tema:";
            break;
        case "Image pour la Rubrique : ":
            $tmp = "Imagen de la rubrica:";
            break;
        case "Image pour la Sous-Rubrique":
            $tmp = "Imagen para la Subdivisión de rúbrica";
            break;
        case "Image":
            $tmp = "Imagen";
            break;
        case "images":
            $tmp = "imagenes";
            break;
        case "Imp. restantes":
            $tmp = "Imp. restantes";
            break;
        case "Imp.":
            $tmp = "Imp.";
            break;
        case "Impossible d'écrire dans le fichier \"":
            $tmp = "No se puede escribir en el archivo \"";
            break;
        case "Impressions réservées":
            $tmp = "Impresiones reservadas: ";
            break;
        case "Impressions":
            $tmp = "Impresiones";
            break;
        case "Inactif(s)":
            $tmp = "Inactivo(s)";
            break;
        case "Index":
            $tmp = "Index";
            break;
        case "Informations générales du site":
            $tmp = "Informaciones generales del Portal";
            break;
        case "Informations supplémentaires":
            $tmp = "Información suplementaria:";
            break;
        case "Informations":
            $tmp = "Informaciones";
            break;
        case "Infos Groupe":
            $tmp = "Infos del grupo";
            break;
        case "Installer le module":
            $tmp = "Instalar el módulo";
            break;
        case "Interface":
            $tmp = "Interfaz";
            break;
        case "Interne":
            $tmp = "Interno";
            break;
        case "Intitulé du Sondage":
            $tmp = "Titulo de la encuesta";
            break;
        case "Intitulé du Sujet :":
            $tmp = "Nombre del Tema:";
            break;
        case "Intitulé":
            $tmp = "Titulado";
            break;
        case "IP":
            $tmp = "IP";
            break;
        case "Jour":
            $tmp = "Día";
            break;
        case "jour(s)":
            $tmp = "dia(s)";
            break;
        case "L'installation automatique du module":
            $tmp = "Instalación automática del módulo";
            break;
        case "L'utilisation de NPDS et des modules est soumise à l'acceptation des termes de la licence GNU/GPL :":
            $tmp = "El uso de NPDS y módulos está sujeto a la aceptación de los términos de la licencia GNU/GPL:";
            break;
        case "la Catégorie":
            $tmp = "La categoria";
            break;
        case "La configuration de la base de données MySql a réussie !":
            $tmp = "¡La configuración de la base de datos mysql ha tenido éxito!";
            break;
        case "La configuration du(des) bloc(s) a réussi !":
            $tmp = "¡La configuración del(de los) bloque(s) ha tenido éxito!";
            break;
        case "La désinstallation des modules n'est pas prise en charge de façon automatique à l'heure actuelle.":
            $tmp = "Actualmente, la desinstalación de los módulos no es compatible de forma automática.";
            break;
        case "La Lettre":
            $tmp = "La newsletter";
            break;
        case "La nuit commence à":
            $tmp = "La noche empieza a";
            break;
        case "La nuit":
            $tmp = "La noche";
            break;
        case "La publication que vous aviez en attente vient d'être validée.":
            $tmp = "La publicación que tenÌa en espera acaba de ser validada.";
            break;
        case "La ré-affectation est terminée !":
            $tmp = "¡FELICITACIONES! La afectacion se hizo sin problemas!";
            break;
        case "Laisser les utilisateurs anonymes poster de nouveaux liens":
            $tmp = "¿Permitir a los anonimos añadir nuevos vinculos?";
            break;
        case "Langue de Prévisualisation":
            $tmp = "Idioma de previsualizacion";
            break;
        case "Langue du backend":
            $tmp = "Idioma del flujo";
            break;
        case "Langue principale":
            $tmp = "Idioma principal";
            break;
        case "Large":
            $tmp = "Global";
            break;
        case "Largeur de l'image du backend":
            $tmp = "Anchura de la imagen del Flujo";
            break;
        case "Le critique":
            $tmp = "La critica:";
            break;
        case "Le jour commence à":
            $tmp = "El dia empieza a";
            break;
        case "Le jour":
            $tmp = "El dia";
            break;
        case "Le Modérateur sélectionné n'existe pas.":
            $tmp = "El moderador que usted puso no existe.";
            break;
        case "Le programme d'installation va maintenant exécuter le script SQL pour configurer la base de données MySql.":
            $tmp = "El instalador ahora va a ejecutar el script SQL para configurar MySql.";
            break;
        case "Le programme d'installation va maintenant modifier le(s) fichier(s) suivant(s) :":
            $tmp = "El instalador modificará ahora el(los) siguiente(s) archivo(s):";
            break;
        case "Le répertoire courant est : ":
            $tmp = "El directorio corriente es:";
            break;
        case "Le répertoire":
            $tmp = "El directorio";
            break;
        case "Les administrateurs":
            $tmp = "Los administradores";
            break;
        case "Les articles en archive":
            $tmp = "Los artículos en archivo";
            break;
        case "Les articles en ligne":
            $tmp = "Los artículos en línea";
            break;
        case "Les fichiers de configuration":
            $tmp = "Los ficheros de configuración";
            break;
        case "Les modules":
            $tmp = "Los módulos";
            break;
        case "Les paramètres ont été correctement écrits dans le fichier \"":
            $tmp = "Los parámetros se escribieron correctamente en el archivo. \"";
            break;
        case "Les paramètres sont déjà inscrits dans le fichier \"":
            $tmp = "Los parámetros ya están guardados en el archivo \"";
            break;
        case "Les plus récents":
            $tmp = "Los más recientes";
            break;
        case "Les sondages":
            $tmp = "Las encuestas";
            break;
        case "les URLs que vous aurez renseignés ci-après (ne renseigner que la racine de l'URI)":
            $tmp = "The URL that you will have informed below (Inform only the root of the URI)";
            break;
        case "Lettre D'info":
            $tmp = "LNL pequeña Newsletter";
            break;
        case "Lien N° : ":
            $tmp = "ID del vínculo: ";
            break;
        case "Liens à valider.":
            $tmp = "Enlaces a validar.";
            break;
        case "Liens cassés rapportés par un ou plusieurs Utilisateurs":
            $tmp = "Vínculos rotos señalados por los usuarios";
            break;
        case "Liens en attente de validation":
            $tmp = "vínculos en espera";
            break;
        case "Liens locaux sauf page courante":
            $tmp = "VÌnculos locales excepto página corriente";
            break;
        case "Liens relatifs : ":
            $tmp = "Vinculos relativos:";
            break;
        case "Liens rompus à valider.":
            $tmp = "Enlaces rotos a validar.";
            break;
        case "Liens Web":
            $tmp = "Enlaces Web";
            break;
        case "Liens":
            $tmp = "Vínculos";
            break;
        case "Ligne 1":
            $tmp = "Linea 1";
            break;
        case "Ligne 2":
            $tmp = "Linea 2";
            break;
        case "Ligne 3":
            $tmp = "Linea 3";
            break;
        case "Ligne 4":
            $tmp = "Linea 4";
            break;
        case "Liste des articles":
            $tmp = "Lista de artículos";
            break;
        case "Liste des catégories":
            $tmp = "Lista de categorías";
            break;
        case "Liste des Grands Titres de sites de News":
            $tmp = "Headlines list";
            break;
        case "Liste des groupes":
            $tmp = "Lista de los grupos";
            break;
        case "Liste des liens":
            $tmp = "Lista de enlaces";
            break;
        case "Liste des LNL envoyées":
            $tmp = "Lista las Newsletters enviadas";
            break;
        case "Liste des membres":
            $tmp = "Lista de miembros";
            break;
        case "Liste des questions réponses":
            $tmp = "Lista de preguntas respuestas";
            break;
        case "Liste des rubriques":
            $tmp = "Rúbricas lista";
            break;
        case "Liste des sondages":
            $tmp = "Lista de encuestas";
            break;
        case "Logo du site pour les impressions":
            $tmp = "Logotipo del sitio web (Para las funciones de impresion)";
            break;
        case "Logs":
            $tmp = "Logs";
            break;
        case "Longueur minimum du mot de passe des utilisateurs":
            $tmp = "Tamaño minimo de la contraseña de los usuarios";
            break;
        case "M'envoyer un Mel lorsque qu'un Msg Int. arrive":
            $tmp = "enviarme un mensaje cuando  un Msg Int. llega";
            break;
        case "Maintenance des Ephémérides (Editer/Effacer)":
            $tmp = "Mantenimientos de efemerides (Edición/borrar):";
            break;
        case "Maintenance des Ephémérides":
            $tmp = "Mantenimiento de efemerides";
            break;
        case "Maintenance des Forums":
            $tmp = "Mantenimiento de los foros";
            break;
        case "Maintenance Forums":
            $tmp = "Foros mantenimiento";
            break;
        case "Manuel en ligne":
            $tmp = "Manual en lìnea";
            break;
        case "Marquer le module comme désinstallé":
            $tmp = "Marcar el módulo como desinstalado";
            break;
        case "Marquer le module comme installé":
            $tmp = "Señalar el módulo como instalado";
            break;
        case "Marquer tous les Topics comme lus":
            $tmp = "Señalar todos los mensajes como leidos";
            break;
        case "Mauvais Mot de Passe":
            $tmp = "Contraseña invalida";
            break;
        case "max caractères":
            $tmp = "máx caracteres";
            break;
        case "Membre invisible":
            $tmp = "Miembro Invisible";
            break;
        case "Membre":
            $tmp = "Miembro";
            break;
        case "Membres":
            $tmp = "Miembros";
            break;
        case "Menu Administration":
            $tmp = "Menu de administracion";
            break;
        case "Menu":
            $tmp = "Menú";
            break;
        case "Merci d'entrer l'information en fonction des spécifications":
            $tmp = "Por favor éntre la información en función de las especificaciones";
            break;
        case "Merci pour votre Contribution !":
            $tmp = "¡Gracias por su contribución!";
            break;
        case "Merci de fournir une nouvelle adresse Email valide.":
            $tmp = "Por favor proporcione una nueva dirección de correo electrónico válida.";
            break;
        case "Message d'entête":
            $tmp = "Encabezado del mensaje";
            break;
        case "Message de l'E-mail":
            $tmp = "Mensaje del correo electronico";
            break;
        case "Message de pied de page":
            $tmp = "Mensajes de pie de página";
            break;
        case "Message Interne":
            $tmp = "Mensaje Interno";
            break;
        case "Message":
            $tmp = "Mensaje";
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
            $tmp = "Actualizar";
            break;
        case "mise à jour":
            $tmp = "actualización";
            break;
        case "Mode":
            $tmp = "Modo";
            break;
        case "Modérateur":
            $tmp = "Moderador";
            break;
        case "Modérateur(s)":
            $tmp = "Moderador(es)";
            break;
        case "Modérateurs uniquement":
            $tmp = "Solo Moderadores";
            break;
        case "Modérateurs":
            $tmp = "Moderadores";
            break;
        case "Modération par l'Administrateur":
            $tmp = "Moderado por el administrador";
            break;
        case "Modération par les Utilisateurs":
            $tmp = "Moderado por los usuarios";
            break;
        case "Modification de données dans table(s)":
            $tmp = "Modificación de datos en tabla(s)";
            break;
        case "Modification de":
            $tmp = "Modificación de";
            break;
        case "Modifié":
            $tmp = "Modificado";
            break;
        case "Modifier annonceur":
            $tmp = "Cambiar anunciante";
            break;
        case "Modifier l'Article":
            $tmp = "Cambiar el articulo";
            break;
        case "Modifier l'Editorial":
            $tmp = "Modificar un Editorial";
            break;
        case "Modifier l'information":
            $tmp = "Modificar la informacion";
            break;
        case "Modifier la Bannière":
            $tmp = "Cambiar el banner";
            break;
        case "Modifier la Catégorie":
            $tmp = "Modificar categoria";
            break;
        case "Modifier le groupe":
            $tmp = "Editar Grupo";
            break;
        case "Modifier le lien":
            $tmp = "Modificar los vínculo";
            break;
        case "Modifier le(s) fichier(s)":
            $tmp = "Editar(s) archivo(s)";
            break;
        case "Modifier les Liens":
            $tmp = "Modificar los vínculos";
            break;
        case "Modifier un ":
            $tmp = "Modificar un ";
            break;
        case "Modifier un Bloc droit":
            $tmp = "Cambiar un bloque de la derecha";
            break;
        case "Modifier un Bloc gauche":
            $tmp = "Modificar un bloque de la izquierda";
            break;
        case "Modifier un utilisateur":
            $tmp = "Modificar un usuario";
            break;
        case "Modifier":
            $tmp = "Modificar";
            break;
        case "Module installé":
            $tmp = "Módulo instalado";
            break;
        case "Module":
            $tmp = "Módulo";
            break;
        case "Modules":
            $tmp = "Módulos";
            break;
        case "Mois":
            $tmp = "Mes";
            break;
        case "Mot de Passe : ":
            $tmp = "Contraseña cliente: ";
            break;
        case "Mot de Passe":
            $tmp = "Contraseña";
            break;
        case "Mot(s) clé(s)":
            $tmp = "Palabra(s) clave(s)";
            break;
        case "n'a pas été envoyée":
            $tmp = "No fué enviado";
            break;
        case "n'est pas modifiable tant qu'un autre n'est pas nommé pour ce forum":
            $tmp = "Que otro no ha sido designado a este foro";
            break;
        case "Nbre d'envois effectués":
            $tmp = "Cantidad de envios efectuados";
            break;
        case "Ne pas enregistrer les 'hits' des auteurs dans les statistiques":
            $tmp = "NO registrar las visitas de los administradores en la página STATS";
            break;
        case "Ne s'applique que si la catégorie : 'Articles' n'est pas sélectionnée.":
            $tmp = "Solo se aplica si la categoria 'Noticias' no está seleccionada";
            break;
        case "News externes":
            $tmp = "Headlines";
            break;
        case "Niveau d'accès":
            $tmp = "Nivel de acceso";
            break;
        case "Niveau de l'Utilisateur":
            $tmp = "Nivel del usuario";
            break;
        case "Nom : ":
            $tmp = "Nombre:";
            break;
        case "Nom d'utilisateur":
            $tmp = "Nombre del usario";
            break;
        case "Nom d'utilisateur anonyme":
            $tmp = "Nombre por defecto del visitante anonimo:";
            break;
        case "Nom de fichier":
            $tmp = "Nombre del fichero";
            break;
        case "Nom de l'annonceur":
            $tmp = "Nombre del cliente";
            break;
        case "Nom de la Catégorie : ":
            $tmp = "Nombre de la Categoria: ";
            break;
        case "Nom de la Rubrique":
            $tmp = "Nombre de rubrica";
            break;
        case "Nom de la Sous-catégorie : ":
            $tmp = "Nombre de la Subcategoria: ";
            break;
        case "Nom de la Sous-Rubrique : ":
            $tmp = "Nombre de la Subdivisión de rúbrica:";
            break;
        case "Nom du Contact : ":
            $tmp = "Nombre contacto: ";
            break;
        case "Nom du Contact":
            $tmp = "Nombre del contacto";
            break;
        case "Nom du forum":
            $tmp = "Nombre del Foro";
            break;
        case "Nom du produit":
            $tmp = "Nombre del producto:";
            break;
        case "Nom du serveur":
            $tmp = "Nombre del servidor";
            break;
        case "Nom du site : ":
            $tmp = "Nombre del sito web:";
            break;
        case "Nom du site pour la balise title":
            $tmp = "Nombre de su sitio Web para la baliza title";
            break;
        case "Nom du site":
            $tmp = "Nombre del sito web";
            break;
        case "Nom":
            $tmp = "Apellido";
            break;
        case "Nombre d'article par page":
            $tmp = 'Cantidad de artículos por página';
            break;
        case "Nombre d'articles dans le bloc des anciens articles":
            $tmp = "Cantidad de noticias en el bloque de noticias antiguas";
            break;
        case "Nombre d'articles en page principale":
            $tmp = "Cantidad de noticias en la página principal";
            break;
        case "Nombre d'éléments dans la page top":
            $tmp = "Cantidad de elementos en la página TOP";
            break;
        case "Nombre d'utilisateurs listés":
            $tmp = "Cantidad de usuarios listados";
            break;
        case "Nombre de clics sur un lien pour qu'il soit populaire":
            $tmp = "Cantidad de visitas necesarias para que un vinculo sea popular";
            break;
        case "Nombre de contributions par page":
            $tmp = "Cantidad de contribuciones por página";
            break;
        case "Nombre de Forum(s)":
            $tmp = "Cantidad Foro(s)";
            break;
        case "Nombre de Hits":
            $tmp = "Cantidad de Hits";
            break;
        case "Nombre de Liens 'Meilleur'":
            $tmp = "Cantidad de vinculos en 'TOP'";
            break;
        case "Nombre de Liens 'Nouveaux'":
            $tmp = "Cantidad de vinculos en 'Nuevos'";
            break;
        case "Nombre de liens dans les résultats des recherches":
            $tmp = "Cantidad de vinculos en las busquedas";
            break;
        case "Nombre de liens par page":
            $tmp = "Vinculos por página";
            break;
        case "Nombre maximum de choix pour les sondages":
            $tmp = "Cantidad maxima de las opciones de las encuestas";
            break;
        case "Nombre maximum de commentaire par utilisateur en 24H":
            $tmp = "Cantida maxima de comentarios poe usuario (24H)";
            break;
        case "Nombre maximum de contributions par IP et par période de 30 minutes (0=système inactif)":
            $tmp = "cantidad máxima de contribuciones por IP y por perÌodo de 30 minutos(0=sistema inactivo):";
            break;
        case "Nombres d'articles en mode administration":
            $tmp = "Cantidad de noticias en modo administracion";
            break;
        case "Nommer":
            $tmp = "Designado";
            break;
        case "non disponible":
            $tmp = "no disponible";
            break;
        case "non optimisée":
            $tmp = "no optimizada";
            break;
        case "Non":
            $tmp = "No";
            break;
        case "Note : ":
            $tmp = "Nota:";
            break;
        case "Note":
            $tmp = "Nota";
            break;
        case "Notes":
            $tmp = "Notas";
            break;
        case "Notifier les nouvelles contributions par E-mail":
            $tmp = "¿Notificar las nuevas contribuciones por correo electronico?";
            break;
        case "Nous avons approuvé votre contribution à notre moteur de recherche.":
            $tmp = "Hémos aprobado su contribución a nuestro motor de búsqueda.";
            break;
        case "Nouveau Grand Titre":
            $tmp = "Nuevo Headline";
            break;
        case "Nouveau Lien ajouté dans la base de données":
            $tmp = "Nuevo Vínculo añadido en la base de datos";
            break;
        case "Nouveaux Articles postés":
            $tmp = "Nuevos articulos o noticias añadidas";
            break;
        case "Nouvel administrateur":
            $tmp = "Nuevo administrador";
            break;
        case "Nouvel Article":
            $tmp = "Nuevo articulo";
            break;
        case "Nouvelle Catégorie ajoutée":
            $tmp = "Categoria nueva añadida";
            break;
        case "Nouvelles du groupe":
            $tmp = "Nuevo grupo";
            break;
        case "Ok":
            $tmp = "Ok!";
            break;
        case "Optimisation de la base de données":
            $tmp = "Optimización de la base de datos";
            break;
        case "Optimisation effectuée":
            $tmp = "Optimización realizada";
            break;
        case "optimisée":
            $tmp = "optimizada";
            break;
        case "OptimySQL":
            $tmp = "OptimizarMySql";
            break;
        case "Option : ":
            $tmp = "Opcion: ";
            break;
        case "Option":
            $tmp = "Opcion";
            break;
        case "Options des sondages":
            $tmp = "Opciones de las encuestas";
            break;
        case "Options pour les Bannières":
            $tmp = "Opcion de los Banners";
            break;
        case "Options pour les Commentaires":
            $tmp = "Opciones para los comentarios";
            break;
        case "Original":
            $tmp = "Original";
            break;
        case "Oter":
            $tmp = "Eliminar";
            break;
        case "ou les affecter à une autre Catégorie.":
            $tmp = "O afectar todo a otra categoria.";
            break;
        case "Oui":
            $tmp = "Si";
            break;
        case "Page courante sans liens locaux":
            $tmp = "Página corriente sin vìnculos locales";
            break;
        case "Page de démarrage":
            $tmp = "Página de inicio";
            break;
        case "Page(s)":
            $tmp = "página(s)";
            break;
        case "Par défaut, rien ou Tout sauf pour ... [aucune URI] = aucune restriction":
            $tmp = "By defaut, nothing or All except [no URI] = no limitation";
            break;
        case "par exemple : genial.png":
            $tmp = "Por ejemplo: estoeslapera.gif";
            break;
        case "par":
            $tmp = "por";
            break;
        case "Paramètres liés à l'illustration":
            $tmp = "Parametros liados a los graficos";
            break;
        case "Paramètres":
            $tmp = "Ajustes";
            break;
        case "Parcourir":
            $tmp = "Recorrer";
            break;
        case "Pas d'affichage du cache":
            $tmp = "No uso de caché";
            break;
        case "Pas d'installeur disponible":
            $tmp = "No hay instalador disponible";
            break;
        case "Pas d'utilisation des descriptions ODP ou YDIR":
            $tmp = "No uso de ODP o Ydir descripciones";
            break;
        case "Pas de modération":
            $tmp = "Sin moderacion";
            break;
        case "Pas de nouveaux Articles postés":
            $tmp = "No hay nuevos articulos o noticias";
            break;
        case "Petite Lettre D'information":
            $tmp = "LNL pequeña Newsletter";
            break;
        case "Pied":
            $tmp = "pie";
            break;
        case "Port TCP":
            $tmp = "Puerto TCP";
            break;
        case "Position":
            $tmp = "Position";
            break;
        case "Poster un Article ":
            $tmp = "Añadir una noticia";
            break;
        case "Poster un Article Admin":
            $tmp = "Añadir noticia del Administrador";
            break;
        case "Pour les bannières encore plus complexes (Flash, ...), saisir simplement la référence à votre_répertoire/votre_fichier .txt (fichier de code php) dans la zone URL du clic et laisser la zone image vide.":
            $tmp = "Para los banners aún más complejas (Flash...), ponga simplemente la referencia a su_repertorio/su_fichero txt (fichero de código php) en la zona Url/Clic y dejar la zona imagen vacía.";
            break;
        case "Pour les bannières Javascript, saisir seulement le code javascript dans la zone URL du clic et laisser la zone image vide.":
            $tmp = "Para los banners Javascript, indicar solamente el código javascript en la zona Url/Clik y dejar la zona imagen vacía";
            break;
        case "Pour les grands titres de sites de news, activer la vérification de l'existance d'un web sur le Port 80":
            $tmp = "Grandes titulos : Detectar la existencia del puerto 80";
            break;
        case "Pour les pages HTML générées, activer les tags avancés de gestion du cache":
            $tmp = "Control de la memoria tampon : ¿Activar los tags avanzados (pragma ...)?";
            break;
        case "Pour prévisualiser le contenu dans son environnement d'exploitation.":
            $tmp = "Para prévisualizar el contenido en su zona de explotación.";
            break;
        case "Pour supprimer votre abonnement à notre Lettre, suivez ce lien":
            $tmp = "Para suprimir su suscripción a nuestra Newsletter, sigua este vÌnculo";
            break;
        case "Pour un passage automatique au contrôle du (des) prochain(s) lot : cocher.":
            $tmp = "Para el paso automático al control del(los) siguiente(s) lote(s): comprobar.";
            break;
        case "Précédent":
            $tmp = "Precedente";
            break;
        case "Préférences":
            $tmp = "Preferencias";
            break;
        case "Prévisualiser l'Article":
            $tmp = "previsualizar el articulo";
            break;
        case "Prévisualiser":
            $tmp = "Previsualizar";
            break;
        case "Privé":
            $tmp = "Privado";
            break;
        case "Proposé":
            $tmp = "Propuesto";
            break;
        case "Proposition de modifications de Liens":
            $tmp = "Propuestas de modificación de los vínculos";
            break;
        case "Propriétaire de la page Web : ":
            $tmp = "Propietario de la página web:";
            break;
        case "Propriétaire":
            $tmp = "Propietario:";
            break;
        case "Protocole de chiffrement":
            $tmp = "Protocolo de cifrado";
            break;
        case "Public":
            $tmp = "Publico";
            break;
        case "Publication Anonyme autorisée":
            $tmp = "Publicación anónima autorizada";
            break;
        case "publication(s) attachée(s)":
            $tmp = "publicacion(es) vinculada(s)";
            break;
        case "Publication(s) en attente de validation":
            $tmp = "Publicación(es) pendiente de validación";
            break;
        case "Publications connexes":
            $tmp = "Publicaciones conexas";
            break;
        case "publications":
            $tmp = "publicaciones";
            break;
        case "Publier dans la racine ?":
            $tmp = "¿Publicar en la raíz?";
            break;
        case "Publier":
            $tmp = "Publicar";
            break;
        case "Puis votre compte pourra être supprimé.":
            $tmp = "Entonces su cuenta puede ser eliminada.";
            break;
        case "qu'administrateur":
            $tmp = "administrator";
            break;
        case "que membre":
            $tmp = "miembro";
            break;
        case "Que voulez-vous faire ?":
            $tmp = "¿Que quiere hacer?";
            break;
        case "Question : ":
            $tmp = "Pregunta:";
            break;
        case "Question":
            $tmp = "Cuestión";
            break;
        case "Questions & Réponses":
            $tmp = "Preguntas y respuestas";
            break;
        case "Qui parle de nous ?":
            $tmp = "¿Quien habla de nosotros?";
            break;
        case "Rafraîchir":
            $tmp = "Restaurar";
            break;
        case "Re-prévisualiser":
            $tmp = "Vista prévia otra vez";
            break;
        case "Recherche rapide":
            $tmp = "Búsqueda rápida";
            break;
        case "Rechercher utilisateur":
            $tmp = "Buscar usuario";
            break;
        case "Réessayer avec chmod automatique":
            $tmp = "Pruebe de nuevo con chmod automático";
            break;
        case "Remettre cet article en première position ? : ":
            $tmp = "¿Poner este artÌculo en primera posición? : ";
            break;
        case "Replier la liste":
            $tmp = "Veces en la lista";
            break;
        case "Réponse : ":
            $tmp = "Respuesta:";
            break;
        case "Réponse":
            $tmp = "Respuesta";
            break;
        case "Requête de modification d'un Lien Utilisateur":
            $tmp = "Petición de modificación de un vínculo Usuario";
            break;
        case "Réseaux sociaux":
            $tmp = "Redes sociales";
            break;
        case "Réservé : ":
            $tmp = "Reservado: ";
            break;
        case "Restreinte":
            $tmp = "Local";
            break;
        case "Restriction":
            $tmp = "Limitation";
            break;
        case "rétention en secondes":
            $tmp = "Retencion en segundos";
            break;
        case "Rétention":
            $tmp = "Retención";
            break;
        case "Retirer un Sondage existant":
            $tmp = "Quitar una encuesta existente";
            break;
        case "Retirer":
            $tmp = "Quitar";
            break;
        case "Retour à l'index d'administration":
            $tmp = "Volver a la administracion principal";
            break;
        case "Retour à la racine":
            $tmp = "Volver a la raiz";
            break;
        case "Retour en arrière, pour changer le Nom":
            $tmp = "Volver para cambiar de nombre";
            break;
        case "Retour en arrière":
            $tmp = "Retroceso";
            break;
        case "Revenir aux avatars standards":
            $tmp = "Volver de nuevo a los avatares normales";
            break;
        case "Robots/Spiders":
            $tmp = "Robots/Spiders";
            break;
        case "Rôle de l'Utilisateur":
            $tmp = "Papel del Usuario";
            break;
        case "Rubrique de téléchargement":
            $tmp = "Seccion de descargas";
            break;
        case "rubrique":
            $tmp = "rúbrica";
            break;
        case "Rubrique":
            $tmp = "Rúbrica";
            break;
        case "Rubriques actives":
            $tmp = "Rubricas activas";
            break;
        case "Rubriques":
            $tmp = "Rúbricas";
            break;
        case "rubriques":
            $tmp = "rúbricas";
            break;
        case "S.V.P. Choisissez un sondage dans la liste suivante.":
            $tmp = "Por favor, escoga una encuesta de la siguiente lista.";
            break;
        case "S.V.P. entrez chaque option disponible dans un seul champ":
            $tmp = "Por favor, entre cada opcion disponible en cada campo. Una opcion, un campo.";
            break;
        case "Sans nom":
            $tmp = "Sin nombre";
            break;
        case "Sans réponse de votre part sous 60 jours vous ne pourrez plus vous connecter en tant que membre sur ce site.":
            $tmp = "Si no recibe respuesta en 60 días, no podrá iniciar sesión como miembro en este sitio.";
            break;
        case "Sans titre":
            $tmp = "Sin Titulo";
            break;
        case "Sauter cette étape et afficher le code du(des) bloc(s)":
            $tmp = "Omitir este paso y mostrar el código del(de los) bloque(s)";
            break;
        case "Sauter cette étape":
            $tmp = "Omitir este paso";
            break;
        case "Sauvegarde de la base de données":
            $tmp = "Copia de seguridad de la base de datos";
            break;
        case "Sauvegarde terminée. Les fichiers sont disponibles dans le répertoire /slogs":
            $tmp = "Copia de seguridad acabada. Los ficheros están disponibles en el directorio/slogs";
            break;
        case "Sauver l'Article Automatique":
            $tmp = "Grabar Noticia automatica";
            break;
        case "Sauver les modifications":
            $tmp = "Guardas los cambios";
            break;
        case "Sauver":
            $tmp = "Save";
            break;
        case "SavemySQL":
            $tmp = "CopiarMySQL";
            break;
        case "Script":
            $tmp = "Script";
            break;
        case "Sélectionner la langue du site":
            $tmp = "Seleccione el idioma para su sitio";
            break;
        case "Sélectionner la nouvelle Catégorie : ":
            $tmp = "Por favor, seleccione une nueva categoria:";
            break;
        case "Sélectionner un Sujet":
            $tmp = "Seleccione un tema";
            break;
        case "Sélectionner une Catégorie à supprimer":
            $tmp = "Seleccione una categoria para borrar:";
            break;
        case "Sélectionner une Catégorie":
            $tmp = "Seleccionar una categoria";
            break;
        case "seront affectés à":
            $tmp = "serán asignados a";
            break;
        case "Serveurs de mail incorrects":
            $tmp = "Servidor de correo no válido";
            break;
        case "Serveurs de mails contrôlés":
            $tmp = "Los servidores de correo controladas";
            break;
        case "Seuil pour les Sujet 'chauds'":
            $tmp = "Límite para que un tema sea ' Popular ':";
            break;
        case "Seulement aux membres":
            $tmp = "Solo para los miembros";
            break;
        case "Seulement aux prospects":
            $tmp = "Solo a los inscritos a la LNL";
            break;
        case "Seulement pour ...":
            $tmp = "Sólo para que ...";
            break;
        case "Si Super administrateur est coché, cet administrateur aura TOUS les droits.":
            $tmp = "Si Super está activo el administrador tendrá todos los derechos ";
            break;
        case "Si vous le souhaitez, vous pouvez exécuter ce script vous même, si vous souhaitez par exemple l'exécuter sur une autre base que celle du site. Dans ce cas, pensez à reparamétrer le fichier de configuration du module.":
            $tmp = "Si lo desea, puede ejecutar el script usted mismo, por ejemplo, si desea ejecutarlo sobre una base distinta a la del sitio. En este caso, considere configurar el archivo de configuración del módulo.";
            break;
        case "Si vous préférez créer vous même le(s) bloc(s), cliquez sur 'Sauter cette étape et afficher le code du(des) bloc(s)' pour visualiser le code à taper dans le(s) bloc(s).":
            $tmp = "Si prefiere crear usted mismo el(los) bloque(s), haga clic en 'Omitir este paso y mostrar el código del(de los) bloque(s)' para ver el código a escribir en el(los) bloque(s).";
            break;
        case "Signature":
            $tmp = "Firma";
            break;
        case "Sites Référents":
            $tmp = "Sitios referentes";
            break;
        case "Situation géographique":
            $tmp = "Situacion geografica";
            break;
        case "Skin d'affichage par défaut":
            $tmp = "Skin grafico por defecto";
            break;
        case "Slogan du site":
            $tmp = "Lema del sitio web";
            break;
        case "Sondage":
            $tmp = "Encuesta";
            break;
        case "Sondages":
            $tmp = "Encuestas";
            break;
        case "Soumission de Liens brisés":
            $tmp = "Sumision de los enlaces rotos";
            break;
        case "Sous-catégorie :":
            $tmp = "Subcat:";
            break;
        case "sous-rubrique":
            $tmp = "subrúbrica";
            break;
        case "Sous-rubrique":
            $tmp = "Subrúbrica";
            break;
        case "sous-rubrique(s) attachée(s)":
            $tmp = "subrúbrica(s) vinculada(s)";
            break;
        case "sous-rubriques":
            $tmp = "subrúbrica";
            break;
        case "Sous-rubriques":
            $tmp = "subrúbrica";
            break;
        case "Standard":
            $tmp = "Standard";
            break;
        case "Strict":
            $tmp = "Estricto";
            break;
        case "Structure de la table":
            $tmp = "Estructura de la tabla";
            break;
        case "Suivant":
            $tmp = "Siguiente";
            break;
        case "Sujet : ":
            $tmp = "Tema:";
            break;
        case "Sujet de l'E-mail":
            $tmp = "Asunto del correo electronico";
            break;
        case "Sujet":
            $tmp = "Tema";
            break;
        case "Sujets actifs":
            $tmp = "Temas activos";
            break;
        case "Sujets par forum":
            $tmp = "Temas por foro";
            break;
        case "Super administrateur":
            $tmp = "Super administrador";
            break;
        case "SuperCache":
            $tmp = "MemoriaTampon";
            break;
        case "Suppression de table(s)":
            $tmp = "Supresión de tabla(s)";
            break;
        case "Suppression effectuée":
            $tmp = "Supresion efectuada!";
            break;
        case "Supprimer cette Critique":
            $tmp = "Borrar esta critica";
            break;
        case "Supprimer forum du groupe":
            $tmp = "Eliminar el foro del grupo";
            break;
        case "Supprimer groupe":
            $tmp = "Eliminar el grupo";
            break;
        case "Supprimer l'Annonceur":
            $tmp = "Borrar el cliente";
            break;
        case "Supprimer la question réponse":
            $tmp = "Borrar la pregunta respuesta";
            break;
        case "Supprimer la rubrique":
            $tmp = "Borrar la rúbrica";
            break;
        case "Supprimer la sous-rubrique":
            $tmp = "Borrar la subdivisione de rúbrica";
            break;
        case "Supprimer le fichier":
            $tmp = "Borrar el fichero";
            break;
        case "Supprimer massivement les Topics":
            $tmp = "Borrar masivamente los mensajes";
            break;
        case "Supprimer MiniSite du groupe":
            $tmp = "Eliminar Minisite grupo";
            break;
        case "Supprimer un utilisateur":
            $tmp = "Borrar un usuario";
            break;
        case "Supprimer une Catégorie":
            $tmp = "Borrar una categoria";
            break;
        case "Supprimer":
            $tmp = "Borrar";
            break;
        case "Surnom":
            $tmp = "Apodo";
            break;
        case "Synchroniser les forums":
            $tmp = "Sincronizar los foros";
            break;
        case "Système de Messagerie (Email)":
            $tmp = "Sistema de mensajeria electronica";
            break;
        case "Système":
            $tmp = "Sistema";
            break;
        case "Table":
            $tmp = "Tabla";
            break;
        case "Tableau de Bord":
            $tmp = "Administracion Indicadores";
            break;
        case "Taille actuelle":
            $tmp = "Tamaño actual";
            break;
        case "Taille de fichier":
            $tmp = "Tamaño";
            break;
        case "Taille maximum des avatars personnels (largeur * hauteur / 60*80) en pixel":
            $tmp = "Tamaño máximo de los avatares personales (anchura * altura/60*80) en pixeles";
            break;
        case "Taille maximum des fichiers de sauvegarde SaveMysql":
            $tmp = "Tamaño máximo de los ficheros de protección SaveMysql";
            break;
        case "Taille":
            $tmp = "Tamaño";
            break;
        case "Téléchargements":
            $tmp = "Descargas";
            break;
        case "Télécharger URL":
            $tmp = "URL de la descarga:";
            break;
        case "Temps de rétention en secondes":
            $tmp = "Tiempo de retención en segundos";
            break;
        case "Texte : ":
            $tmp = "Texto:";
            break;
        case "Texte complet":
            $tmp = "Texto completo";
            break;
        case "Texte d'introduction":
            $tmp = "Texto de introducción";
            break;
        case "Texte du Sujet :":
            $tmp = "Texto del tema:";
            break;
        case "Texte étendu":
            $tmp = "Texto extendido";
            break;
        case "Texte pour le rôle":
            $tmp = "Texto para el papel";
            break;
        case "Texte":
            $tmp = "Texto";
            break;
        case "TEXTE":
            $tmp = "TEXTO";
            break;
        case "Thème d'affichage par défaut":
            $tmp = "Tema grafico por defecto";
            break;
        case "Titre :":
            $tmp = "Titulo:";
            break;
        case "Titre de la Page des Critiques":
            $tmp = "Titulo de la página de criticas";
            break;
        case "Titre de la Page":
            $tmp = "Titulo de la página";
            break;
        case "Titre du backend":
            $tmp = "Titulo del flujo";
            break;
        case "Titre du lien : ":
            $tmp = "Titulo del vinculo:";
            break;
        case "Titre":
            $tmp = "Titulo";
            break;
        case "Tous les Articles dans":
            $tmp = "TODOS los articulos en";
            break;
        case "Tous les Sujets":
            $tmp = "Todos los temas";
            break;
        case "Tous les Utilisateurs":
            $tmp = "A todos los usuarios";
            break;
        case "Tous sauf pour ...":
            $tmp = "Todos, salvo para....";
            break;
        case "Tous vos abonnements vers cette adresse Email ont été suspendus.":
            $tmp = "Todas sus suscripciones a esta dirección de correo electrónico han sido suspendidas.";
            break;
        case "Tous":
            $tmp = "Todas";
            break;
        case "Tout cocher":
            $tmp = "Marque todas";
            break;
        case "Tout contenu (page/liens/etc)":
            $tmp = "Todo contenido (Páginas/vinculos/etc)";
            break;
        case "Tout décocher":
            $tmp = "Desmarcar todo";
            break;
        case "Tout public":
            $tmp = "Todo público";
            break;
        case "Tout supprimer":
            $tmp = "Borrar todo";
            break;
        case "Toute tables. Fichier envoyé au navigateur. Pas de limite de taille":
            $tmp = "TODAS las tablas. Fichero enviado directamente al navegador. No hay lÌmite";
            break;
        case "Toutes les souscriptions de ces utilisateurs ont été suspendues.":
            $tmp = "Todas las suscripciones de estos usuarios han sido suspendidas.";
            break;
        case "Transférer à Droite":
            $tmp = "Transferir a la derecha";
            break;
        case "Transférer à Gauche":
            $tmp = "Transferir a la izquierda";
            break;
        case "Transitional":
            $tmp = "Transitional";
            break;
        case "Transmission LNL en cours":
            $tmp = "Transmisión LNL en curso";
            break;
        case "Type :":
            $tmp = "Tipo:";
            break;
        case "Type d'éditorial":
            $tmp = "Tipo de editorial";
            break;
        case "Type de modération":
            $tmp = "Tipo de moderacion";
            break;
        case "Type de sauvegarde SaveMysql":
            $tmp = "Tipo de copia de seguridad SaveMysql";
            break;
        case "Type":
            $tmp = "Tipo";
            break;
        case "Un message privé leur a été envoyé sans réponse à ce message sous 60 jours ces utilisateurs ne pourront plus se connecter au site.":
            $tmp = "Se les ha enviado un mensaje privado sin responder a este mensaje dentro de los 60 días que estos usuarios ya no podrán conectarse al sitio.";
            break;
        case "Une erreur est survenue lors de l'exécution du script SQL. Mysql a répondu :":
            $tmp = "Se produjo un error al ejecutar el script SQL. Mysql respondió:";
            break;
        case "Une erreur est survenue lors de la configuration automatique du(des) bloc(s). Mysql a répondu :":
            $tmp = "Se produjo un error al configurar automáticamente el (de los) bloque(s). Mysql respondió:";
            break;
        case "Une fois que vous aurez validé cette publication, elle sera intégrée en base temporaire, et l'administrateur sera prévenu. Il visera cette publication et la mettra en ligne dans les meilleurs délais. Il est normal que pour l'instant, cette publication n'apparaisse pas dans l'arborescence.":
            $tmp = "Una vez que habrá validado esta publicación, será integrada en base temporal, y se avisará al administrador. Leera esta publicación y la pondrá en lÌnea cuanto antes. Es normal que por el momento, esta publicación no aparezca en la estructura";
            break;
        case "Upload":
            $tmp = "Upload";
            break;
        case "URL : ":
            $tmp = "URL: ";
            break;
        case "URL de l'image du backend":
            $tmp = "URL de la imagen del Flujo";
            break;
        case "URL de l'image":
            $tmp = "URL de la imagen";
            break;
        case "URL de la Page":
            $tmp = "URL de la página";
            break;
        case "URL du clic":
            $tmp = "URL para el clic";
            break;
        case "URL du site":
            $tmp = "URL del sitio web";
            break;
        case "URL pour le fichier RDF/XML":
            $tmp = "URL del flujo RDF/XML";
            break;
        case "Url":
            $tmp = "Url";
            break;
        case "URL":
            $tmp = "URL";
            break;
        case "Utilisateur en attente de groupe !":
            $tmp = "Usuario esperando grupo!";
            break;
        case "Utilisateur en attente de validation !":
            $tmp = "Usuario (s) esperando la validación !";
            break;
        case "Utilisateur enregistré uniquement":
            $tmp = "Solo usuario registrado";
            break;
        case "Utilisateur enregistré":
            $tmp = "Usuario registrado";
            break;
        case "Utilisateur inexistant !":
            $tmp = "Este usuario no existe!";
            break;
        case "Utilisateur":
            $tmp = "Usuario";
            break;
        case "Utilisateurs":
            $tmp = "Usuarios";
            break;
        case "Utiliser 587 si vous avez activé le chiffrement TLS":
            $tmp = "Utilice 587 si tiene habilitado el cifrado TLS";
            break;
        case "Validation de votre publication":
            $tmp = "Validación de su publicación";
            break;
        case "Valider":
            $tmp = "Validar";
            break;
        case "Version":
            $tmp = "Versión:";
            break;
        case "Veuillez choisir un type de META-MOT":
            $tmp = "Por favor, seleccione un tipo de META-MOT";
            break;
        case "Veuillez configurer manuellement le(s) bloc(s).":
            $tmp = "Configure manualmente el(s) bloque(s).";
            break;
        case "Veuillez éditer ce fichier manuellement ou réessayez en tentant de faire un chmod automatique sur le(s) fichier(s) concernés.":
            $tmp = "Por favor, edite este archivo manualmente o intente de nuevo haciendo un chmod automático en el(los) archivo(s) correspondiente.";
            break;
        case "Veuillez l'exécuter manuellement via phpMyAdmin.":
            $tmp = "Por favor, ejecútelo manualmente a través de phpMyAdmin.";
            break;
        case "Veuillez nommer différement ce nouveau META-MOT":
            $tmp = "Por favor, elija otro nombre para este nuevo META-MOT";
            break;
        case "Vider le répertoire cache":
            $tmp = "Vaciar la carpeta de la memoria tampon";
            break;
        case "Visite":
            $tmp = "Visita";
            break;
        case "Visiter le site web":
            $tmp = "Visitar la página web";
            break;
        case "Visiter":
            $tmp = "Visitar";
            break;
        case "Visualiser":
            $tmp = "Ver";
            break;
        case "Voici la description du(des) bloc(s) qui sera(seront) créé(s) :":
            $tmp = "Aquí está la descripción del(de los) bloque(s) que será(será) creado(s):";
            break;
        case "Voici le code à taper dans le fichier :":
            $tmp = "Aquí está el código a escribir en el archivo:";
            break;
        case "Voici le code des bloc(s) :":
            $tmp = "Aquí está el código de los bloques(s):";
            break;
        case "Voici le script SQL :":
            $tmp = "Aquí está el script SQL:";
            break;
        case "Voir les forums de cette catégorie":
            $tmp = "Mostrar el foro de esta categoría";
            break;
        case "Voir":
            $tmp = "Ver";
            break;
        case "Vos droits de publications vous permettent de mettre à jour ou de supprimer ce contenu mais pas de la mettre en ligne sur le site.":
            $tmp = "Sus derechos de publicacion le permite poner al dÌa o suprimir en el sitio web este contenido pero no ponerlo en linea.";
            break;
        case "Vos droits de publications vous permettent de mettre à jour, de supprimer ou de le mettre en ligne sur le site ce contenu.":
            $tmp = "Sus derechos de publicacion le permite poner al dÌa, suprimir o poner en lÌnea en el sitio web este contenido.";
            break;
        case "Vos MétaTags ont été modifiés avec succès !":
            $tmp = "¡ Sus MétaTags se modificaron con éxito !";
            break;
        case "Vote fermé":
            $tmp = "Voto cerrado";
            break;
        case "Vote":
            $tmp = "Voto";
            break;
        case "Votre adresse Email est incorrecte.":
            $tmp = "Su dirección de correo electrónico es incorrecta.";
            break;
        case "Votre adresse IP (= ne pas comptabiliser les hits qui en proviennent)":
            $tmp = "Su direccion IP para no contar sus visitas";
            break;
        case "Votre Lien":
            $tmp = "Su vínculo";
            break;
        case "Votre situation géographique":
            $tmp = "Su situacion geografica";
            break;
        case "Vous allez exclure TOUS les membres du groupe":
            $tmp = "Se va a excluir a todos los miembros del grupo";
            break;
        case "Vous allez supprimer le groupe":
            $tmp = "Usted se quitará el grupo";
            break;
        case "Vous avez choisi de configurer manuellement vos blocs. Voici le contenu de ceux-ci :":
            $tmp = "Ha elegido configurar manualmente sus bloques. Aquí está el contenido de los bloques:";
            break;
        case "Vous devez désinstaller le module manuellement. Pour cela, référez vous au fichier install.txt de l'archive du module, et faites les opérations inverses de celles décrites dans la section \"Installation manuelle\", et en partant de la fin.":
            $tmp = "Debe desinstalar el módulo manualmente. Para ello, haga referencia al archivo install.txt del archivo del módulo, y haga las operaciones inversas de las descritas en la sección \"Instalación manual\", y comenzando desde el final.";
            break;
        case "Vous devez remplir tous les Champs":
            $tmp = "Tiene que rellenar todos los campos";
            break;
        case "vous devez supprimer TOUS ses membres !":
            $tmp = "Debe eliminar a todos sus miembros!";
            break;
        case "Vous devez vous identifier aussi en tant que membre pour utiliser cette fonction.":
            $tmp = "Tambien tiene que estar identificado como usuario registrado para poder utilizar esta funcion.";
            break;
        case "Vous êtes sur le point de supprimer cet annonceur : ":
            $tmp = "Está a punto de borrar este cliente:";
            break;
        case "Vous faites désormais partie des membres du groupe":
            $tmp = "Usted es ahora parte del grupo";
            break;
        case "Vous ne faites plus partie des membres du groupe":
            $tmp = "Que ya no forman parte del grupo";
            break;
        case "Vous ne pouvez pas exclure":
            $tmp = "No se puede excluir";
            break;
        case "Vous pouvez choisir maintenant de créer automatiquement un(des) bloc(s) à droite ou à gauche. Cliquer sur \"Créer le(s) bloc(s) à gauche\" ou \"Créer le(s) bloc(s) à droite\" selon votre choix. (Vous pourrez changer leurs positions par la suite dans le panneau d'administration --> Blocs)":
            $tmp = "Ahora puede elegir crear automáticamente un(de los) bloque(s) a la derecha o a la izquierda. Haga clic en \"Crear(s) bloque(s) a la izquierda\" o \"Crear(s) bloque(s) a la derecha\" según su elección. (Podrá cambiar sus posiciones posteriormente en el panel de administración --> Bloques)";
            break;
        case "Vous pouvez simplement Effacer / Modifier les Critiques en naviguant sur":
            $tmp = "Puede simplemente borrar/modificar las criticas navegando sobre";
            break;
        case "Vous pouvez supprimer la Catégorie, les Articles et Commentaires":
            $tmp = "Puede borrar la categoria, los articulos y todos los comentarios en ella";
            break;
        case "Vous pouvez utiliser notre moteur de recherche sur : ":
            $tmp = "Podrá encontrarlo nuestro motor en :";
            break;
        default:
            $tmp = "Necesita una traducción [** $phrase **]";
            break;
    }
    return (htmlentities($tmp, ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401, 'UTF-8'));
}