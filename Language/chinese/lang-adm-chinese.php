<?php

/************************************************************************/
/* DUNE by NPDS                                                         */
/* ===========================                                          */
/*                                                                      */
/* Based on PhpNuke 4.x source code                                     */
/*                                                                      */
/* NPDS Copyright (c) 2002-2024 by Philippe Brunier                     */
/* Translated by :  Zhang Yingzhu                                       */
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
            $tmp = "英语";
            break;
        case "french":
            $tmp = "法国人";
            break;
        case "spanish":
            $tmp = "西班牙文";
            break;
        case "chinese":
            $tmp = "中文";
            break;
        case "german":
            $tmp = "德语";
            break;

        case " à ":
            $tmp = " 在 ";
            break;
        case " Actualiser l'Auteur":
            $tmp = "作者情况更新";
            break;
        case " Afficher ":
            $tmp = " 张贴 ";
            break;
        case " Ajouter un Auteur ":
            $tmp = "添加一个作者";
            break;
        case " et réalisé un gain global de ":
            $tmp = " 优化后得到的新空间总大小为 ";
            break;
        case "- Etes-vous certain ?":
            $tmp = "- 您肯定吗？";
            break;
        case "- Mot de Passe (si Privé) - Le nom du fichier de formulaire (si Texte étendu) => modules/sform/forum - Les Groupes ID (si Groupe)":
            $tmp = "密码 (如果是私人的) 表格的文件名 => modules/sform/forum - 组的ID (如果是已经存在的组)";
            break;
        case "(255 caractères Max.)":
            $tmp = "(最多255 字符)";
            break;
        case "(Brève description des centres d'intérêt du site. 200 caractères maxi.)":
            $tmp = "（关于您的网站的简介。200字以内。）";
            break;
        case "(C'est le nombre de contributions affichées pour chaque page relative à un Sujet)":
            $tmp = " (一个主题的每页中可显示的帖子数目)";
            break;
        case "(C'est le nombre de Sujets affichés pour chaque page relative à un Forum)":
            $tmp = "(一个论坛的每页中可显示的主题数目)";
            break;
        case "(Certain des éventuelles URLs ?)":
            $tmp = "(您检查了URLs吗？)";
            break;
        case "(Définissez la méthode d'analyse que doivent adopter les robots des moteurs de recherche)":
            $tmp = "(确定搜索引擎所采用的分析方式)";
            break;
        case "(Définissez le public intéressé par votre site)":
            $tmp = "定义您的站点的目标服务客户";
            break;
        case "(Définissez un ou plusieurs mot(s) clé(s). 1000 caractères maxi. Remarques : une lettre accentuée équivaut le plus souvent à 8 caractères. La majorité des moteurs de recherche font la distinction minuscule/majuscule. Séparez vos mots par une virgule)":
            $tmp = "（定义一个或多个关键词。最多1000字。<br />注意：一个特殊字符通常含有8个字符。大多数搜索引擎区分大小写。您定义的关键词之间请用逗号隔开。）";
            break;
        case "(description ou nom complet du Sujet - max : 40 caractères)":
            $tmp = "（精短的介绍 - 最长40个字符）";
            break;
        case "(description ou nom complet du sujet)":
            $tmp = "(description or full name topic)";
            break;
        case "(Ex. : 16 days. Remarque : ne définissez pas de fréquence inférieure à 14 jours !)":
            $tmp = "（例子：16天。注意：不要将访问频率定义为少于14天）";
            break;
        case "(Ex. : fr(Français), en(Anglais), en-us(Américain), de(Allemand), it(Italien), pt(Portugais), etc)":
            $tmp = "例子： fr(法语), en(英语), en-us(美英语), de(德语), it(意大利语), pt(葡萄牙), 等等）";
            break;
        case "(Ex. : l'adresse e-mail du webmaster)":
            $tmp = "例子：网管的邮件地址）";
            break;
        case "(Ex. : nom de votre compagnie/service)":
            $tmp = "（例子：您公司的名字）";
            break;
        case "(Ex. : nom du webmaster)":
            $tmp = "（例子：网管的名字）";
            break;
        case "(exemple : tonial.png)":
            $tmp = "（例子：tonial.gif）";
            break;
        case "(Informations légales)":
            $tmp = "（法律信息）";
            break;
        case "(nom de l'image + extension)":
            $tmp = "图片名+扩展名，位于";
            break;
        case "(Redirection sur un forum externe : <.a href...)":
            $tmp = "转移到其它网站的论坛,  地址为 : <.a href...)";
            break;
        case "(seulement pour modifications)":
            $tmp = "(仅当改变密码时需要)";
            break;
        case "(un simple nom sans espaces - 20 caractères max.)":
            $tmp = "（不能有空格 - 最长20个字符）";
            break;
        case "(un simple nom sans espaces)":
            $tmp = "(a single word without space)";
            break;
        case "* Désigne un champ obligatoire":
            $tmp = "* 指定必要区域";
            break;
        case "* indique les champs requis":
            $tmp = "*标明必须填写该区域";
            break;
        case "0=Tout le monde, 1=Membre seulement, 3=Administrateur seulement, 9=Désactiver":
            $tmp = "0=所有人, 1=仅限会员, 3=仅限管理员, 9=关闭功能";
            break;
        case "14 ans":
            $tmp = "14岁";
            break;
        case "A ce jour, vous avez effectué ":
            $tmp = "目前为止，您已经执行了 ";
            break;
        case "a été envoyée":
            $tmp = "已经发送";
            break;
        case "a":
            $tmp = "&#x6709;";
            break;
        case "Abandonner":
            $tmp = "取消";
            break;
        case "Accepter":
            $tmp = "接受";
            break;
        case "Accès restreint":
            $tmp = "限制进入";
            break;
        case "Accès":
            $tmp = "进入";
            break;
        case "Actif":
            $tmp = "Activate";
            break;
        case "Actif(s)":
            $tmp = "已激活";
            break;
        case "Action":
            $tmp = "记录数";
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
            $tmp = "激活输出文章功能?";
            break;
        case "Activer Facebook":
            $tmp = "Activate Facebook";
            break;
        case "Activer gestionnaire de fichiers du groupe":
            $tmp = "Enable File manager of the group";
            break;
        case "Activer l'authentification SMTP(S)":
            $tmp = "启用 SMTP(S) 身份验证";
            break;
        case "Activer l'éditeur Tinymce":
            $tmp = "激活Tiny-Mce编辑者";
            break;
        case "Activer l'icône [N]ouveau pour les catégories":
            $tmp = " 激活新的分类图标(icon [N])？";
            break;
        case "Activer l'upload dans les forums ?":
            $tmp = "激活论坛的上传功能？";
            break;
        case "Activer la description simplifiée des Utilisateurs":
            $tmp = "激活对用户的简单描述?";
            break;
        case "Activer la résolution DNS pour les posts des forums, IP-Ban, ... ?":
            $tmp = "激活论坛中DNS功能, 这将显示DNS地址?";
            break;
        case "Activer le Bloc":
            $tmp = "激活该栏目框";
            break;
        case "Activer le chiffrement":
            $tmp = "启用加密";
            break;
        case "Activer le multi-langue":
            $tmp = " 激活多语言功能？";
            break;
        case "Activer le tri des contributions 'résolues'":
            $tmp = "激活对最终文章的选择排列";
            break;
        case "Activer les avatars":
            $tmp = "激活表情符号吗？";
            break;
        case "Activer les Bannières ?":
            $tmp = "激活网站的广告条？?";
            break;
        case "Activer les commentaires des sondages":
            $tmp = "激活对调查的评论？";
            break;
        case "Activer les images dans le menu administration":
            $tmp = "在管理菜单上显示图片？?";
            break;
        case "Activer les menus courts pour l'administration":
            $tmp = "激活管理的简短菜单?";
            break;
        case "Activer les référants HTTP":
            $tmp = "激活HTTP来源记录？";
            break;
        case "Activer les textes cachés dans les forums ?":
            $tmp = "激活论坛中的隐藏文字？";
            break;
        case "Activer PAD du groupe":
            $tmp = "Enable PAD of the group";
            break;
        case "Activer son MiniSite":
            $tmp = "激活会员的Mini网站";
            break;
        case "Activer Twitter":
            $tmp = "激活 Twitter";
            break;
        case "Activité":
            $tmp = "职业";
            break;
        case "Actualiser l'administrateur":
            $tmp = "Update the administrator";
            break;
        case "Admin-Plugins":
            $tmp = "管理-插件";
            break;
        case "Administrateur ID":
            $tmp = "管理员ID";
            break;
        case "Administrateur(s) de la rubrique :":
            $tmp = " 栏目的管理员";
            break;
        case "Administrateur(s) du Sujet :":
            $tmp = "主题的管理员";
            break;
        case "Administrateur(s) du sujet":
            $tmp = "Topic administrator(s)";
            break;
        case "Administrateur(s)":
            $tmp = "Administrator(s)";
            break;
        case "Administrateurs":
            $tmp = "管理员";
            break;
        case "Administration de META-LANG":
            $tmp = "META-LANG administration";
            break;
        case "Administration des bannières":
            $tmp = "广告管理";
            break;
        case "Administration des MétaTags":
            $tmp = "管理页首html";
            break;
        case "Administration":
            $tmp = "网站治理";
            break;
        case "Adresse E-mail de l'administrateur":
            $tmp = "管理员Email";
            break;
        case "Adresse E-mail masquée":
            $tmp = "公开Email";
            break;
        case "Adresse E-mail où envoyer le message":
            $tmp = "发送信息的电子邮件地址：";
            break;
        case "Adresse e-mail principale":
            $tmp = "主要的电子邮件地址";
            break;
        case "Adulte":
            $tmp = "成人";
            break;
        case "Affectation d'Articles vers une nouvelle Catégorie":
            $tmp = "将文章移至一个新的类别";
            break;
        case "Affectation":
            $tmp = "转移！";
            break;
        case "Affecter à une autre Catégorie":
            $tmp = "移动我的文章";
            break;
        case "Affichage":
            $tmp = "显示中";
            break;
        case "Afficher la liste des prospects":
            $tmp = "显示潜在用户的列表";
            break;
        case "Afficher le chemin dans le titre de la page :":
            $tmp = "在页面的标题中显示路径:";
            break;
        case "Afficher le logo sur la page web links":
            $tmp = "在网站链接的页面上张贴Logo？";
            break;
        case "Afficher les resultats des Sondages":
            $tmp = "张贴调查的结果";
            break;
        case "Afficher pendant":
            $tmp = "在该期间发表";
            break;
        case "Afficher signature":
            $tmp = "显示签名";
            break;
        case "Afficher votre signature":
            $tmp = "显示签名";
            break;
        case "Aide en ligne de ce bloc":
            $tmp = "对本栏目框的在线帮助";
            break;
        case "Aide en ligne":
            $tmp = "网上帮助";
            break;
        case "Ajouter Annonceur":
            $tmp = "添加客户";
            break;
        case "Ajouter cette critique":
            $tmp = "添加评论";
            break;
        case "Ajouter des Catégories":
            $tmp = "添加一个分类";
            break;
        case "Ajouter des Liens relatifs au Sujet":
            $tmp = "添加相关链接:";
            break;
        case "Ajouter des membres":
            $tmp = "添加会员";
            break;
        case "Ajouter Grands Titres":
            $tmp = "添加头条标题";
            break;
        case "Ajouter la critique N° : ":
            $tmp = "要添加的评论的序号为 :";
            break;
        case "Ajouter membres":
            $tmp = "Add Members";
            break;
        case "Ajouter plus d'affichages":
            $tmp = "添加更多投放: ";
            break;
        case "Ajouter plus de Forum pour":
            $tmp = "增加更多的论坛为了";
            break;
        case "Ajouter un administrateur":
            $tmp = "添加管理员";
            break;
        case "Ajouter un annonceur":
            $tmp = "添加客户";
            break;
        case "Ajouter un Article dans une Rubrique":
            $tmp = "在一个栏目中增加一篇文章";
            break;
        case "Ajouter un article":
            $tmp = "添加一篇文章";
            break;
        case "Ajouter un Editorial":
            $tmp = "添加管理员评论";
            break;
        case "Ajouter un Ephéméride : ":
            $tmp = "在年历上添加历史事件";
            break;
        case "Ajouter un éphéméride":
            $tmp = "Add ephemerid";
            break;
        case "Ajouter un groupe":
            $tmp = "添加新组";
            break;
        case "Ajouter un lien":
            $tmp = "添加新链接";
            break;
        case "Ajouter un nouveau Lien":
            $tmp = "添加新链接";
            break;
        case "Ajouter un nouveau Sujet":
            $tmp = "添加新主题";
            break;
        case "Ajouter un nouvel Annonceur":
            $tmp = "添加客户";
            break;
        case "Ajouter un ou des membres au groupe":
            $tmp = "添加一名或多名成员到群组";
            break;
        case "Ajouter un Sujet":
            $tmp = "添加主题!";
            break;
        case "Ajouter un Téléchargement":
            $tmp = "添加下载";
            break;
        case "Ajouter un Utilisateur":
            $tmp = "添加用户";
            break;
        case "Ajouter une bannière":
            $tmp = "添加广告";
            break;
        case "Ajouter une Catégorie principale":
            $tmp = "添加一个分类";
            break;
        case "Ajouter une catégorie":
            $tmp = "Add a category";
            break;
        case "Ajouter une nouvelle bannière":
            $tmp = "添加广告";
            break;
        case "Ajouter une nouvelle Catégorie":
            $tmp = "添加新分类";
            break;
        case "Ajouter une nouvelle Rubrique":
            $tmp = "添加一个新的栏目";
            break;
        case "Ajouter une nouvelle Sous-Rubrique":
            $tmp = "添加一个新的次目录";
            break;
        case "Ajouter une publication":
            $tmp = "添加一个发表文章";
            break;
        case "Ajouter une question réponse":
            $tmp = "Add Question answer";
            break;
        case "Ajouter une question":
            $tmp = "添加新问题";
            break;
        case "Ajouter une Rubrique":
            $tmp = "添加精华区!";
            break;
        case "Ajouter une Sous-catégorie":
            $tmp = "添加子分类";
            break;
        case "Ajouter une URL":
            $tmp = "添加一个URL地址";
            break;
        case "Ajouter":
            $tmp = "添加";
            break;
        case "Année":
            $tmp = "年";
            break;
        case "Annonceurs faisant de la publicité":
            $tmp = "广告客户";
            break;
        case "Annuler":
            $tmp = "取消";
            break;
        case "Anonyme":
            $tmp = "匿名游客";
            break;
        case "Anonymes":
            $tmp = "匿名游客";
            break;
        case "Arbre":
            $tmp = "树型分支结构";
            break;
        case "Archiver les Référants":
            $tmp = "存档";
            break;
        case "Archives articles":
            $tmp = "Articles archives";
            break;
        case "Article en attente de validation":
            $tmp = "Waiting stories for publication";
            break;
        case "Article(s) attaché(s)":
            $tmp = "附带的文章";
            break;
        case "Articles !":
            $tmp = "文章内部!";
            break;
        case "Articles en attente de validation !":
            $tmp = "Articles waiting for checking !";
            break;
        case "Articles programmés pour la publication.":
            $tmp = "Programmed Articles";
            break;
        case "Articles programmés":
            $tmp = "已安排的文章";
            break;
        case "Articles":
            $tmp = "文章";
            break;
        case "Assembler une lettre et la tester":
            $tmp = "联合一篇文章并测试Newsletter";
            break;
        case "Attachement":
            $tmp = "附件";
            break;
        case "ATTENTION :  êtes-vous certain de vouloir effacer ce Forum et tous ses Sujets ?":
            $tmp = "提醒：您肯定要删除该论坛及其所有主题吗？";
            break;
        case "ATTENTION :  êtes-vous sûr de vouloir supprimer cette Catégorie, ses Forums et tous ses Sujets ?":
            $tmp = "提醒：您肯定要删除该类别，及其相关所有论坛和主题吗？";
            break;
        case "Attention : ":
            $tmp = "警告 :";
            break;
        case "ATTENTION : Etes-vous sûr de vouloir effacer cette Catégorie et tous ses Liens ?":
            $tmp = "提醒：您肯定要删除这个类别和所有相关链接吗？";
            break;
        case "ATTENTION : êtes-vous sûr de vouloir effacer cette FAQ et toutes ses questions ?":
            $tmp = "提醒：您肯定要删除这些FAQ和所有相关问题吗？";
            break;
        case "ATTENTION : êtes-vous sûr de vouloir effacer cette question ?":
            $tmp = "警告:您确定您要删除这个问题？?";
            break;
        case "ATTENTION : êtes-vous sûr de vouloir supprimer ce fichier téléchargeable ?":
            $tmp = "提醒：您肯定要删除该可下载文件吗？";
            break;
        case "ATTENTION : Le Sondage choisi va être supprimé IMMEDIATEMENT de la base de données !":
            $tmp = "提醒：所选择的调查将即刻从数据库中删除！";
            break;
        case "ATTENTION !!!":
            $tmp = "警告!!!";
            break;
        case "Au format CSV":
            $tmp = "为CSV格式";
            break;
        case "Aucun lien brisé rapporté.":
            $tmp = "没有断链接报告";
            break;
        case "Aucun Sujet":
            $tmp = "无主题";
            break;
        case "Aucune catégorie":
            $tmp = "没有目录";
            break;
        case "Aucune critique à ajouter":
            $tmp = "没有要添加的评论";
            break;
        case "Aucune indexation":
            $tmp = "禁止搜索引擎来访该页";
            break;
        case "Aucune table n'a été trouvée":
            $tmp = "数据库中没有表。";
            break;
        case "Audience":
            $tmp = "评价";
            break;
        case "Auteur":
            $tmp = "作者";
            break;
        case "Auteur(s)":
            $tmp = "作者";
            break;
        case "Auteurs actuels":
            $tmp = "当前作者";
            break;
        case "Auto-Articles":
            $tmp = "自动文章";
            break;
        case "Automatique":
            $tmp = "自动的";
            break;
        case "Autoriser la connexion":
            $tmp = "允许连接";
            break;
        case "Autoriser la création automatique des membres":
            $tmp = "允许自动定义新会员吗？";
            break;
        case "Autoriser la création de news pour":
            $tmp = " 仅允许版主/管理员粘贴新帖子";
            break;
        case "Autoriser le HTML":
            $tmp = "允许的HTML";
            break;
        case "Autoriser les abonnements":
            $tmp = "允许预定？";
            break;
        case "Autoriser les autres Utilisateurs à voir mon adresse E-mail ?":
            $tmp = "允许其他注册用户看见我的email地址?";
            break;
        case "Autoriser les autres utilisateurs à voir son adresse E-mail":
            $tmp = "允许其他用户查看他的电子邮件地址";
            break;
        case "Autoriser les commentaires anonymes":
            $tmp = "允许匿名评论吗？";
            break;
        case "Autoriser les membres Invisibles":
            $tmp = " 允许隐藏会员？";
            break;
        case "Autoriser les Signatures":
            $tmp = "允许使用签名档";
            break;
        case "Autoriser les Smilies":
            $tmp = "允许使用表情符号";
            break;
        case "Autoriser les utilisateurs à choisir leur mot de passe":
            $tmp = " 允许用户选择自己的密码？";
            break;
        case "Autoriser les utilisateurs à voter plusieurs fois ?":
            $tmp = "允许用户多次投票评论吗？";
            break;
        case "Avant de supprimer le groupe":
            $tmp = "Before to delete the group";
            break;
        case "Bannières actives":
            $tmp = "当前播放广告";
            break;
        case "Bannières inactives":
            $tmp = "当前非激活的Banners";
            break;
        case "Bannières terminées":
            $tmp = "已完成广告";
            break;
        case "Bannières":
            $tmp = "广告横幅";
            break;
        case "Blackboard":
            $tmp = "Blackboard";
            break;
        case "Bloc Administration":
            $tmp = "管理栏";
            break;
        case "Bloc Principal":
            $tmp = "主块";
            break;
        case "Blocs":
            $tmp = "栏目框";
            break;
        case "Bonjour et bienvenue dans l'installation automatique du module":
            $tmp = "Hello and welcome on the automatic installation of the module";
            break;
        case "Bonjour":
            $tmp = "您好";
            break;
        case "Caché":
            $tmp = "隐藏";
            break;
        case "car il est modérateur unique de forum. Oter ses droits de modération puis retirer le du groupe.":
            $tmp = "Because it is unique for a forum moderator.Modify his moderator rights and remove it from the group.";
            break;
        case "Catégorie : ":
            $tmp = "分类: ";
            break;
        case "Catégorie :":
            $tmp = "分类 :";
            break;
        case "Catégorie sauvegardée":
            $tmp = "分类已保存！!";
            break;
        case "Catégorie":
            $tmp = "分类";
            break;
        case "Catégories :":
            $tmp = "分类:";
            break;
        case "Catégories de Forum":
            $tmp = "论坛的类别";
            break;
        case "Catégories":
            $tmp = "分类";
            break;
        case "Ce fichier est appelé à la fin du header du thème":
            $tmp = "本文件将在主题事件中标题末尾被调用";
            break;
        case "Ce fichier est appelé après la fin de la génération de la page HTML":
            $tmp = "在全面HTML页面标准化之后，本文件将被调用";
            break;
        case "Ce fichier est appelé avant le début du footer du thème":
            $tmp = "本文件将在主题事件中页尾的开始部分被调用";
            break;
        case "Ce fichier est appelé avant que de commencer la génération de la page HTML":
            $tmp = "在生成HTML标准化页面之前，本文件将被调用";
            break;
        case "Ce fichier est appelé dans l'évènement ONLOAD de la balise BODY => JAVASCRIPT":
            $tmp = "本文件将在BODY => JAVASCRIPT中的ONLOAD事件中被调用";
            break;
        case "Ce fichier est appelé entre le HEAD et /HEAD lors de la génération de la page HTML":
            $tmp = "本文件将在头文件(HEAD)中被调用";
            break;
        case "Ce fichier permet d'envoyer un MI personnalisé lorsqu'un nouveau membre s'inscrit":
            $tmp = "当某新会员注册时，本文件允许发送一个个人化的MI";
            break;
        case "Ce fichier permet l'affichage d'informations complémentaires dans la page de login":
            $tmp = "本文件允许在登陆页面上发布补充消息或个人化";
            break;
        case "Ce fichier permet la configuration technique de SuperCache":
            $tmp = "本文件用于设置超级缓存的技术性";
            break;
        case "Ce META-MOT existe déjà":
            $tmp = "This META-MOTalready exist";
            break;
        case "Ce modérateur":
            $tmp = "This moderator";
            break;
        case "Ce programme d'installation va configurer votre site internet pour utiliser ce module.":
            $tmp = "This installer is going to configure your website to use this module.";
            break;
        case "ce site est génial":
            $tmp = "（例如:月昙热爱着蕾蕾）";
            break;
        case "Ceci effacera tous ses articles et ses commentaires !":
            $tmp = "这样将删除其下的文章和评语！!";
            break;
        case "Ceci va détruire tous ses Articles !":
            $tmp = " 该操作将删除所有的文章！";
            break;
        case "Centres d'intérêt":
            $tmp = "您的兴趣";
            break;
        case "cesiteestgénial":
            $tmp = "（例如：晓风流光）";
            break;
        case "Cet annonceur a les BANNIERES ACTIVES suivantes dans":
            $tmp = "该发表者目前有以下有效的Banners在下列位置";
            break;
        case "Cet annonceur n'a pas de bannière active pour le moment.":
            $tmp = " 该发表者目前没有任何有效Banner";
            break;
        case "Cette Catégorie existe déjà !":
            $tmp = "分类已存在！!";
            break;
        case "Cette opération est irréversible elle va affecter votre base de données par la suppression de table(s) ou/et de ligne(s) et la suppression ou modification de certains fichiers.":
            $tmp = "This operation is irreversible and will affect your database by deleting table(s) or/and line(s) and deleting or modifying certain files.";
            break;
        case "Cette Rubrique a":
            $tmp = "这个栏目有";
            break;
        case "Changer l'ordre des publications":
            $tmp = "更改发布的顺序";
            break;
        case "Changer l'ordre des rubriques":
            $tmp = "更改标题的顺序";
            break;
        case "Changer l'ordre des sous-rubriques":
            $tmp = "更改子标题的顺序";
            break;
        case "Changer l'ordre":
            $tmp = "改变顺序";
            break;
        case "Changer la date":
            $tmp = "改变日期";
            break;
        case "Changer les Catégories : ":
            $tmp = "改变类别";
            break;
        case "Changer les privilèges ? :":
            $tmp = "改变优先权";
            break;
        case "Changer":
            $tmp = "改变";
            break;
        case "Chaque bloc peut utiliser SuperCache.La valeur du délai de rétention <b>0</b> indique que le bloc ne sera <b>pas caché</b> (obligatoire pour le bloc function#adminblock).":
            $tmp = " 每个栏目框可以应用SuperCache。<br />数值<b>0</b>表明<b>没有cache</b>（为管理栏目框的必要功能）。";
            break;
        case "Chemin de certaines images (vote, ...)":
            $tmp = "某些图片的路径:";
            break;
        case "Chemin des images des sujets":
            $tmp = "主题图片路径:";
            break;
        case "Chemin des images du menu administrateur":
            $tmp = "管理员菜单的图片路径";
            break;
        case "Chemin et nom de l'image du Smiley":
            $tmp = "Directory and name of the picture of the Smiley";
            break;
        case "Choisir les privilèges ? :":
            $tmp = "选择优先权";
            break;
        case "Choisir un groupe":
            $tmp = " 选择一个组";
            break;
        case "Choisir un modérateur":
            $tmp = "Choose one moderator.";
            break;
        case "Choisir un rôle":
            $tmp = " 选择一个角色";
            break;
        case "Clics":
            $tmp = "点击次数";
            break;
        case "Cliquer ici pour proposer une Critique.":
            $tmp = "点击这里以发表一篇评论";
            break;
        case "Cliquez pour éditer":
            $tmp = "点击以进行编辑 ";
            break;
        case "Cliquez sur \"Etape suivante\" pour continuer.":
            $tmp = "Click on \"Following stage\" to continue.";
            break;
        case "Combien de référants au maximum":
            $tmp = "您希望最多记录多少来访路径？";
            break;
        case "comme modérateur du forum":
            $tmp = "as forum moderator";
            break;
        case "Commentaire":
            $tmp = "评论";
            break;
        case "Communication":
            $tmp = "沟通";
            break;
        case "Compte E-mail (Provenance)":
            $tmp = "Email帐户（来自）：:";
            break;
        case "Compteur":
            $tmp = "计数器";
            break;
        case "Configuration de la page":
            $tmp = "页面设置";
            break;
        case "Configuration de PHPmailer SMTP(S)":
            $tmp = "配置 PHPmailer SMTP(S)";
            break;
        case "Configuration des Forums":
            $tmp = "论坛结构";
            break;
        case "Configuration des infos en Backend & Réseaux Sociaux":
            $tmp = "Configuration for Backend & Social Networks";
            break;
        case "Configuration Forums":
            $tmp = "Forums Configuration";
            break;
        case "Configuration par défaut des Liens Web":
            $tmp = "链接的默认设置";
            break;
        case "Configurer MySql (Recommandé)":
            $tmp = "Configure MySql (Recommended)";
            break;
        case "Confirmer la lecture":
            $tmp = "确认阅读内容";
            break;
        case "Connexion":
            $tmp = "Login";
            break;
        case "Contacter l'administration du site.":
            $tmp = "联系网站的管理部门。";
            break;
        case "Contenu :":
            $tmp = "内容:";
            break;
        case "Contenu de la table":
            $tmp = "表格的内容";
            break;
        case "Contenu":
            $tmp = "内容";
            break;
        case "Contrôle des serveurs de mails":
            $tmp = "控制邮件服务器";
            break;
        case "Contrôler les serveurs de mail de tous les utilisateurs":
            $tmp = "检查所有用户的电子邮件服务器";
            break;
        case "Copié":
            $tmp = "已复制";
            break;
        case "Copier":
            $tmp = "复制";
            break;
        case "Copyright":
            $tmp = "权 ";
            break;
        case "Corps de message":
            $tmp = "消息的主体";
            break;
        case "Corps":
            $tmp = "主体";
            break;
        case "courtes":
            $tmp = "简短";
            break;
        case "Création":
            $tmp = "创建中";
            break;
        case "Créé":
            $tmp = "已创建";
            break;
        case "Créer forum du groupe":
            $tmp = "Create forum for the group";
            break;
        case "Créer le bloc WS":
            $tmp = "Create the block WS";
            break;
        case "Créer le fichier en utilisant le modèle":
            $tmp = "以模版创建新文件";
            break;
        case "Créer le fichier":
            $tmp = "创建文件";
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
            $tmp = "增加一个页右栏目框";
            break;
        case "Créer un Bloc gauche":
            $tmp = "创建一个页左栏目框";
            break;
        case "Créer un groupe.":
            $tmp = "Create a group";
            break;
        case "Créer un nouveau Bloc":
            $tmp = "增加一个新的页右栏目框";
            break;
        case "Créer un nouveau Sondage":
            $tmp = "创建一个新的调查";
            break;
        case "Créer un nouveau":
            $tmp = "Create a new";
            break;
        case "Créer utilisateur":
            $tmp = "Create user";
            break;
        case "Créer":
            $tmp = "创建";
            break;
        case "Critique en attente de validation.":
            $tmp = "Review awaiting validation";
            break;
        case "Critiques en attente de validation":
            $tmp = "等待生效中的评论";
            break;
        case "Critiques":
            $tmp = "评论";
            break;
        case "CSS Specifique":
            $tmp = "Specific CSS";
            break;
        case "dans":
            $tmp = "在";
            break;
        case "dans le groupe":
            $tmp = "在群里";
            break;
        case "Date :":
            $tmp = "日期：:";
            break;
        case "Date de début":
            $tmp = "起始日期";
            break;
        case "Date de démarrage du site":
            $tmp = "站点开通日期:";
            break;
        case "Date de fin":
            $tmp = "结束日期";
            break;
        case "Date prévu de publication":
            $tmp = "Date of publication";
            break;
        case "Date":
            $tmp = "日期";
            break;
        case "de":
            $tmp = "的";
            break;
        case "Déconnexion":
            $tmp = "注销";
            break;
        case "Demande acceptée.":
            $tmp = "请求已接受.";
            break;
        case "Demande refusée pour votre participation au groupe":
            $tmp = "您参加群组的请求被拒绝";
            break;
        case "Déplier la liste":
            $tmp = "Show list";
            break;
        case "Dernière optimisation effectuée le":
            $tmp = "最近一次优化";
            break;
        case "Derniers":
            $tmp = "最近";
            break;
        case "des modérateurs du forum":
            $tmp = "from the forum moderator";
            break;
        case "des":
            $tmp = "属于";
            break;
        case "Désabonner un utilisateur":
            $tmp = " 取消某用户的注册";
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
            $tmp = "历史描述:";
            break;
        case "Description de la Page des Critiques":
            $tmp = "评论页描述:";
            break;
        case "Description:":
            $tmp = "程序簡介:";
            break;
        case "Description":
            $tmp = "描述: ";
            break;
        case "Désinstaller le module":
            $tmp = "卸载该模版";
            break;
        case "Désolé, les nouveaux Mots de Passe ne correspondent pas. Cliquez sur retour et recommencez":
            $tmp = "对不起，新的密码不正确。请返回并重新开始。";
            break;
        case "Diffusion d'un Message Interne":
            $tmp = " 发送一个内部消息";
            break;
        case "Distribution":
            $tmp = "描述";
            break;
        case "Divers":
            $tmp = "多种";
            break;
        case "DKIM du DNS (si existant et valide).":
            $tmp = "DNS DKIM（如果存在且有效）。";
            break;
        case "DNS ou serveur de mail incorrect":
            $tmp = "DNS或不正确的邮件服务器";
            break;
        case "Doit être un mot sans espace.":
            $tmp = "必须是一个没有空格的单词。";
            break;
        case "Doit être un nom de fichier valide avec une de ces extensions : jpg, jpeg, png, gif.":
            $tmp = "必须是带有以下扩展名之一的有效文件名：jpg、jpeg、png、gif。";
            break;
        case "Droits de publication":
            $tmp = "发表文章之权益";
            break;
        case "Droits des auteurs":
            $tmp = "作者所有权";
            break;
        case "Droits modules":
            $tmp = "Addons perms";
            break;
        case "Droits":
            $tmp = "权利";
            break;
        case "Du DNS":
            $tmp = "来自 DNS";
            break;
        case "du groupe":
            $tmp = "from the group";
            break;
        case "Durée de vie en heure du cookie Admin":
            $tmp = " 管理员Cookie的有效时间（小时）";
            break;
        case "Durée de vie en heure du cookie User":
            $tmp = " 用户Cookie的有效时间（小时）";
            break;
        case "E-mail : ":
            $tmp = "您的Email:";
            break;
        case "E-mail: ":
            $tmp = "联系Email: ";
            break;
        case "E-mail":
            $tmp = "联系Email";
            break;
        case "Edité":
            $tmp = "已编辑";
            break;
        case "Editer ce sondage":
            $tmp = "Edit this Poll";
            break;
        case "Editer Ephéméride : ":
            $tmp = "编辑项目:";
            break;
        case "Editer groupe":
            $tmp = "Edit group";
            break;
        case "Editer l'annonceur":
            $tmp = "编辑广告客户";
            break;
        case "Editer l'Article Automatique":
            $tmp = "编辑自动文章";
            break;
        case "Editer l'Article d'ID : ":
            $tmp = "编辑文章ID:";
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
            $tmp = "编辑管理功能栏目框";
            break;
        case "Editer le Sujet :":
            $tmp = "编辑主题:";
            break;
        case "Editer les Administrateurs":
            $tmp = "对管理员进行编辑";
            break;
        case "Editer les Catégories":
            $tmp = "编辑分类";
            break;
        case "Editer les fichiers de configuration":
            $tmp = "对 设置文件 的编辑";
            break;
        case "Editer les forums":
            $tmp = " 编辑论坛";
            break;
        case "Editer les informations concernant":
            $tmp = "Edit the informations about";
            break;
        case "Editer les Liens Relatifs":
            $tmp = "编辑相关链接";
            break;
        case "Editer les Sondages":
            $tmp = "编辑网上调查";
            break;
        case "Editer paramètres Grand Titre":
            $tmp = "编辑头条标题";
            break;
        case "Editer Question & Réponse":
            $tmp = "编辑问题与答案";
            break;
        case "Editer un Article":
            $tmp = "编辑一篇文章";
            break;
        case "Editer un Téléchargement":
            $tmp = "编辑一个下载";
            break;
        case "Editer une catégorie":
            $tmp = "Edit a category";
            break;
        case "Editer une publication":
            $tmp = "编辑一个发表文章";
            break;
        case "Editer une Rubrique : ":
            $tmp = "编辑精华区:";
            break;
        case "Editer":
            $tmp = "编辑";
            break;
        case "Edition Bannière":
            $tmp = "编辑广告";
            break;
        case "Edition des Blocs de droite":
            $tmp = "编辑页右栏目框";
            break;
        case "Edition des Blocs de gauche":
            $tmp = "编辑页左栏目框";
            break;
        case "Edition des Catégories":
            $tmp = "编辑分类";
            break;
        case "Edition des Forums":
            $tmp = "论坛管理";
            break;
        case "Edition des sondages":
            $tmp = "编辑网上调查";
            break;
        case "Edition des Utilisateurs":
            $tmp = "编辑用户";
            break;
        case "Edition du Bloc Principal":
            $tmp = " 对页中主栏目框的编辑";
            break;
        case "Edition Forums":
            $tmp = "Forums Edition";
            break;
        case "Edition":
            $tmp = " 编辑中";
            break;
        case "Edito":
            $tmp = "社论";
            break;
        case "Editorial ajouté à la base de données":
            $tmp = "管理员评论已经添加到数据库";
            break;
        case "Editorial modifié":
            $tmp = "管理员评论已修改";
            break;
        case "Editorial supprimé de la base de données":
            $tmp = "管理员评论已删除";
            break;
        case "Effacé":
            $tmp = "已删除";
            break;
        case "Effacer (Efface les Liens cassés et les avis pour un Lien donné)":
            $tmp = "删除（清除所有关于某链接的 断链接 和 申请）";
            break;
        case "Effacer / Modifier une Critique":
            $tmp = "删除/修改评论";
            break;
        case "Effacer Bannière":
            $tmp = "删除广告";
            break;
        case "Effacer ce sondage":
            $tmp = "Delete this Poll";
            break;
        case "Effacer l'Article":
            $tmp = "删除文章";
            break;
        case "Effacer l'Auteur":
            $tmp = "删除作者";
            break;
        case "Effacer la publication :":
            $tmp = "Delete a publication:";
            break;
        case "Effacer la Rubrique : ":
            $tmp = "删除精华区: ";
            break;
        case "Effacer la sous-rubrique : ":
            $tmp = "删除该次目录 ";
            break;
        case "Effacer le Sujet !":
            $tmp = "删除主题!";
            break;
        case "Effacer le Sujet":
            $tmp = "删除主题";
            break;
        case "Effacer les Référants":
            $tmp = "删除来源";
            break;
        case "Effacer les Sondages":
            $tmp = "删除调查";
            break;
        case "Effacer un Article : ":
            $tmp = "删除文章: ";
            break;
        case "Effacer un Article !":
            $tmp = "删除文章!";
            break;
        case "Effacer un Bloc droit":
            $tmp = "删除一个页右栏目框";
            break;
        case "Effacer un Bloc gauche":
            $tmp = "删除一项页左栏目框";
            break;
        case "Effacer une Rubrique":
            $tmp = "删除精华区!";
            break;
        case "Effacer":
            $tmp = "删除";
            break;
        case "Effectuée le":
            $tmp = " 执行";
            break;
        case "En Ligne":
            $tmp = "在线";
            break;
        case "en tant qu'Administrateur.":
            $tmp = "作为管理员";
            break;
        case "Encodage":
            $tmp = "译码";
            break;
        case "Enfin, pour pouvoir réinstaller le module par la suite avec Module-Install, cliquez sur le bouton \"Marquer le module comme désinstallé\".":
            $tmp = "Lastly, to be able to reinstall the addon with Module-Install thereafter, click on the button \"Mark the addon as uninstalled\".";
            break;
        case "Enregistrer":
            $tmp = "保存";
            break;
        case "Entête":
            $tmp = "抬头";
            break;
        case "Entrez à nouveau le Mot de Passe":
            $tmp = "重新输入密码";
            break;
        case "Envoyer à tous les membres":
            $tmp = "发送给所有会员";
            break;
        case "Envoyer La Lettre":
            $tmp = "发送信件";
            break;
        case "Envoyer par E-mail les nouveaux Articles à l'Administrateur":
            $tmp = "通过Email发送新文章给管理员？";
            break;
        case "Envoyer un courriel à":
            $tmp = "发送电子邮件到";
            break;
        case "Envoyer":
            $tmp = "送出";
            break;
        case "Ephémérides":
            $tmp = "历史上的今天";
            break;
        case "ERREUR : cet identifiant est déjà utilisé":
            $tmp = "错误：这个呢称已经有人使用了。";
            break;
        case "Erreur : cette URL est déjà présente dans la base de données !":
            $tmp = "错误: 这个 URL 已经在我们的数据库中！!";
            break;
        case "ERREUR : DNS ou serveur de mail incorrect":
            $tmp = "错误：DNS或不正确的邮件服务器";
            break;
        case "Erreur : La Catégorie":
            $tmp = "错误：目录";
            break;
        case "Erreur : La Sous-catégorie":
            $tmp = "错误：该次目录";
            break;
        case "Erreur : vous devez saisir un TITRE pour votre Lien !":
            $tmp = "错误: 您需要给您的 URL 填写一个名称！!";
            break;
        case "Erreur : vous devez saisir une DESCRIPTION pour votre Lien !":
            $tmp = "错误: 您需要给您的 URL 填写一个描述！!";
            break;
        case "Erreur : vous devez saisir une URL pour votre Lien !":
            $tmp = "错误: 您需要给您的 URL 填写一个URL！!";
            break;
        case "est terminée !":
            $tmp = "is ended!";
            break;
        case "et tous ses Commentaires ?":
            $tmp = "和所有相关评论？";
            break;
        case "et toutes ses bannières !!!":
            $tmp = "和所有他的Banners !!!";
            break;
        case "Etape suivante":
            $tmp = "下一步";
            break;
        case "Etat : ":
            $tmp = "状态:";
            break;
        case "Etat":
            $tmp = "状态";
            break;
        case "Etes-vous certain de vouloir effacer cette publication ?":
            $tmp = "您肯定要删除该发表信息吗？";
            break;
        case "Etes-vous sûr de vouloir effacer ce sujet ?":
            $tmp = "您确定要删除这个主题吗";
            break;
        case "Etes-vous sûr de vouloir effacer cet annonceur et TOUTES ses bannières ?":
            $tmp = "您肯定要删除该发表者及其所有的Banners吗？";
            break;
        case "Etes-vous sûr de vouloir effacer cet Article ?":
            $tmp = " 您肯定要删除这篇文章吗？";
            break;
        case "Etes-vous sûr de vouloir effacer cette Bannière ?":
            $tmp = "您确定要删除这广告吗？?";
            break;
        case "Etes-vous sûr de vouloir effacer cette Rubrique ?":
            $tmp = " 您肯定要删除这个栏目吗？";
            break;
        case "Etes-vous sûr de vouloir effacer cette sous-rubrique ?":
            $tmp = "您肯定要删除该发表文章吗？";
            break;
        case "Etes-vous sûr de vouloir effacer l'Article N∞":
            $tmp = "您确定要删除文章#";
            break;
        case "Etes-vous sûr de vouloir effacer":
            $tmp = "您肯定要删除吗？";
            break;
        case "Etes-vous sûr de vouloir EFFACER":
            $tmp = "肯定要删除";
            break;
        case "Etes-vous sûr de vouloir supprimer cette boîte de Titres ?":
            $tmp = "WARNING: Are you sure you want to delete this Headline?";
            break;
        case "Exclure TOUS les membres du groupe":
            $tmp = "从组中排除所有成员";
            break;
        case "Exclure":
            $tmp = "排除";
            break;
        case "Exemple":
            $tmp = "例子";
            break;
        case "existe déjà !":
            $tmp = "已经存在!";
            break;
        case "Expédier en tant":
            $tmp = "send as";
            break;
        case "Extension des fichiers d'image":
            $tmp = " 图象文件的扩展";
            break;
        case "Extraire l'annuaire":
            $tmp = "通讯录";
            break;
        case "Fait : ":
            $tmp = "完成: ";
            break;
        case "FAQ":
            $tmp = "FAQ";
            break;
        case "Faq":
            $tmp = "常见问题 (FAQ)";
            break;
        case "Fermé":
            $tmp = "关闭";
            break;
        case "Fermer les nouvelles inscriptions":
            $tmp = "关闭新的注册?";
            break;
        case "Fichier de configuration automatique absent. Installation/désinstallation automatique impossible.":
            $tmp = "自动配置文件丢失。 无法自动安装/卸载。";
            break;
        case "Fichier de formulaire":
            $tmp = "Form file";
            break;
        case "Fichiers configurations":
            $tmp = "配置文件";
            break;
        case "Fichiers dans /slogs. table par table, lignes par lignes, tables scindées : limite":
            $tmp = " 在/slogs.中的文件，是逐次按照表格，行，分裂表格排列的 : 限制";
            break;
        case "Fichiers dans /slogs. table par table, tables non scindées : limite":
            $tmp = " 在/slogs中的文件. 表格逐次排列, 完整表格 : 有限";
            break;
        case "Filtre":
            $tmp = "Filter";
            break;
        case "Fonction mail à utiliser":
            $tmp = "使用什么邮件功能？";
            break;
        case "Fonctions":
            $tmp = "功能";
            break;
        case "Format de données":
            $tmp = "数据格式";
            break;
        case "Format de fichier":
            $tmp = "文件格式";
            break;
        case "Forum classé en":
            $tmp = "论坛分类排列的顺序为";
            break;
        case "Forum d'origine":
            $tmp = "根论坛";
            break;
        case "Forum de destination":
            $tmp = "目标论坛";
            break;
        case "Fréquence de visite des Robots/Spiders":
            $tmp = "Robots访问的频率 ";
            break;
        case "Fusionner des forums":
            $tmp = "合并论坛";
            break;
        case "Gain réalisable":
            $tmp = "可达到的增益";
            break;
        case "Gain total réalisé":
            $tmp = "优化后得到的新空间";
            break;
        case "génération automatique du DKIM par le portail.":
            $tmp = "由门户自动生成 DKIM。";
            break;
        case "Gérer les Liens Relatifs : ":
            $tmp = "管理相关链接";
            break;
        case "Gestion des blocs":
            $tmp = "Blocs management";
            break;
        case "Gestion des forums":
            $tmp = "Forums management";
            break;
        case "Gestion des groupes":
            $tmp = "组的管理";
            break;
        case "Gestion des sujets":
            $tmp = "Topics management";
            break;
        case "Gestion des Sujets":
            $tmp = "主题管理";
            break;
        case "Gestion modules":
            $tmp = "管理模块";
            break;
        case "Gestion, Installation Modules":
            $tmp = "安装-模版";
            break;
        case "Gestionnaire de Fichiers":
            $tmp = "对文件的管理";
            break;
        case "Gestionnaire Fichiers":
            $tmp = "文件管理器";
            break;
        case "Grands Titres de sites de News":
            $tmp = "新闻站点头条标题";
            break;
        case "Groupe de travail":
            $tmp = "Workgroup";
            break;
        case "Groupe ID":
            $tmp = "群组ID";
            break;
        case "Groupe":
            $tmp = "组";
            break;
        case "Groupes":
            $tmp = "组";
            break;
        case "Hauteur de l'image du backend":
            $tmp = "Backend图片的高度";
            break;
        case "Heure locale":
            $tmp = "当地时间:";
            break;
        case "Heure":
            $tmp = "小时";
            break;
        case "Hors Ligne":
            $tmp = "离线";
            break;
        case "Icône":
            $tmp = "图标";
            break;
        case "ID Article:":
            $tmp = "文章ID:";
            break;
        case "ID Utilisateur":
            $tmp = "用户ID";
            break;
        case "ID":
            $tmp = "ID";
            break;
        case "Identifiant ":
            $tmp = "登录";
            break;
        case "Identifiant Utilisateur":
            $tmp = "用户名";
            break;
        case "Identifiant":
            $tmp = "Nickname";
            break;
        case "Identification E-mail de l'émetteur":
            $tmp = "Email Message";
            break;
        case "Ignorer (Efface toutes les demandes pour un Lien donné)":
            $tmp = "忽略（清除所有关于某链接的申请）";
            break;
        case "Ignorer":
            $tmp = "忽略";
            break;
        case "Il y a":
            $tmp = "现在有";
            break;
        case "Illimité":
            $tmp = "无限";
            break;
        case "Image de garde":
            $tmp = "封面图片：:";
            break;
        case "Image du Sujet :":
            $tmp = "主题图标:";
            break;
        case "Image pour la Rubrique : ":
            $tmp = "精华区图标:";
            break;
        case "Image pour la Sous-Rubrique":
            $tmp = "该次目录的图片";
            break;
        case "Image":
            $tmp = "Image";
            break;
        case "images":
            $tmp = " 图片";
            break;
        case "Imp. restantes":
            $tmp = "剩余投放次数";
            break;
        case "Imp.":
            $tmp = "投放次数.";
            break;
        case "Impossible d'écrire dans le fichier \"":
            $tmp = "无法在文件中写入 \"";
            break;
        case "Impressions réservées":
            $tmp = "已付费投放次数: ";
            break;
        case "Impressions":
            $tmp = "投放次数";
            break;
        case "Inactif(s)":
            $tmp = " 关闭（非激活状态）";
            break;
        case "Index":
            $tmp = "索引";
            break;
        case "Informations générales du site":
            $tmp = "网站的简介";
            break;
        case "Informations supplémentaires : ":
            $tmp = "其它信息:";
            break;
        case "Informations":
            $tmp = "Informations";
            break;
        case "Infos Groupe":
            $tmp = "Group Information";
            break;
        case "Installer le module":
            $tmp = "安装模版";
            break;
        case "Interface":
            $tmp = "界面";
            break;
        case "Interne":
            $tmp = "内部的";
            break;
        case "Intitulé du Sondage":
            $tmp = "调查的标题";
            break;
        case "Intitulé du Sujet :":
            $tmp = "主题名称:";
            break;
        case "Intitulé":
            $tmp = "Title";
            break;
        case "IP":
            $tmp = "IP";
            break;
        case "Jour":
            $tmp = "天";
            break;
        case "jour(s)":
            $tmp = "天";
            break;
        case "L'installation automatique du module":
            $tmp = "The automatic installation of the module";
            break;
        case "L'utilisation de NPDS et des modules est soumise à l'acceptation des termes de la licence GNU/GPL :":
            $tmp = "NPDS 和模块的使用必须接受 GNU/GPL 许可条款:";
            break;
        case "la Catégorie":
            $tmp = "目录";
            break;
        case "La configuration de la base de données MySql a réussie !":
            $tmp = "MySql数据库配置成功！";
            break;
        case "La configuration du(des) bloc(s) a réussi !":
            $tmp = "The configuration of (the) block(s) succeeded!";
            break;
        case "La désinstallation des modules n'est pas prise en charge de façon automatique à l'heure actuelle.":
            $tmp = "The desinstallation of the addons is not dealt with automatic of way at the present time.";
            break;
        case "La Lettre":
            $tmp = "信笺 NewsLetter";
            break;
        case "La nuit commence à":
            $tmp = "夜从此时开始？";
            break;
        case "La nuit":
            $tmp = "夜";
            break;
        case "La publication que vous aviez en attente vient d'être validée.":
            $tmp = "您等待中的发表文章刚得到最后生效";
            break;
        case "La ré-affectation est terminée !":
            $tmp = "转移操作完成！";
            break;
        case "Laisser les utilisateurs anonymes poster de nouveaux liens ?":
            $tmp = "允许匿名用户张贴新的链接？";
            break;
        case "Langue de Prévisualisation":
            $tmp = " 预览语言";
            break;
        case "Langue du backend":
            $tmp = "后台语言:";
            break;
        case "Langue principale":
            $tmp = "主要语言";
            break;
        case "Large":
            $tmp = "总共";
            break;
        case "Largeur de l'image du backend":
            $tmp = "Backend图片的宽度";
            break;
        case "Le critique":
            $tmp = "评论者：:";
            break;
        case "Le jour commence à":
            $tmp = "日从此时开始？";
            break;
        case "Le jour":
            $tmp = " 日";
            break;
        case "Le Modérateur sélectionné n'existe pas.":
            $tmp = "在数据库中没有所选择的版主";
            break;
        case "Le programme d'installation va maintenant exécuter le script SQL pour configurer la base de données MySql.":
            $tmp = "The installer is now going to run the SQL script to configure MySql.";
            break;
        case "Le programme d'installation va maintenant modifier le(s) fichier(s) suivant(s) :":
            $tmp = "The installer is now going to modify the following file(s) :";
            break;
        case "Le répertoire courant est : ":
            $tmp = "当前目录为：";
            break;
        case "Le répertoire":
            $tmp = "目录（文件夹）";
            break;
        case "Les administrateurs":
            $tmp = "管理员们";
            break;
        case "Les articles en archive":
            $tmp = "存档中的文章";
            break;
        case "Les articles en ligne":
            $tmp = "在线文章";
            break;
        case "Les fichiers de configuration":
            $tmp = "配置文件";
            break;
        case "Les modules":
            $tmp = "Addons";
            break;
        case "Les paramètres ont été correctement écrits dans le fichier \"":
            $tmp = "文件中参数写入正确 \"";
            break;
        case "Les paramètres sont déjà inscrits dans le fichier \"":
            $tmp = "Parameters are already written in the file \"";
            break;
        case "Les plus récents":
            $tmp = "最新";
            break;
        case "Les sondages":
            $tmp = "民意调查";
            break;
        case "les URLs que vous aurez renseignés ci-après (ne renseigner que la racine de l'URI)":
            $tmp = "The URL that you will have informed below (Inform only the root of the URI)";
            break;
        case "Lettre D'info":
            $tmp = "信笺 NewsLetter";
            break;
        case "Lien N° : ":
            $tmp = "链接ID: ";
            break;
        case "Liens à valider.":
            $tmp = "网页链接等待检查。";
            break;
        case "Liens cassés rapportés par un ou plusieurs Utilisateurs":
            $tmp = "来自用户的断链接的报告";
            break;
        case "Liens en attente de validation":
            $tmp = "等待的链接";
            break;
        case "Liens locaux sauf page courante":
            $tmp = "链接，不含当前页面";
            break;
        case "Liens relatifs : ":
            $tmp = "相关链接:";
            break;
        case "Liens rompus à valider.":
            $tmp = "损坏的网页链接等待检查。";
            break;
        case "Liens Web":
            $tmp = "网站链接";
            break;
        case "Liens":
            $tmp = "链接";
            break;
        case "Ligne 1":
            $tmp = "页面底部内容 1";
            break;
        case "Ligne 2":
            $tmp = "页面底部内容 2";
            break;
        case "Ligne 3":
            $tmp = "页面底部内容 3";
            break;
        case "Ligne 4":
            $tmp = "页面底部内容 4";
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
            $tmp = " 组的列表";
            break;
        case "Liste des liens":
            $tmp = "Links list";
            break;
        case "Liste des LNL envoyées":
            $tmp = "旧Newsletter的列表";
            break;
        case "Liste des membres":
            $tmp = "会员列表";
            break;
        case "Liste des questions réponses":
            $tmp = "Questions Answers list";
            break;
        case "Liste des rubriques":
            $tmp = "Sections list";
            break;
        case "Liste des sondages":
            $tmp = "调查列表";
            break;
        case "Logo du site pour les impressions":
            $tmp = "站点Logo:";
            break;
        case "Logs":
            $tmp = "日志 Logs";
            break;
        case "Longueur minimum du mot de passe des utilisateurs":
            $tmp = "用户的密码的最小长度：";
            break;
        case "M'envoyer un Mel lorsque qu'un Msg Int. arrive":
            $tmp = " 有消息时，以邮件形式通知我";
            break;
        case "Maintenance des Ephémérides (Editer/Effacer)":
            $tmp = "项目维护(编辑/删除)：:";
            break;
        case "Maintenance des Ephémérides":
            $tmp = "维护所有年历历史事件";
            break;
        case "Maintenance des Forums":
            $tmp = "论坛的维护";
            break;
        case "Maintenance Forums":
            $tmp = "Forums Maintenance";
            break;
        case "Manuel en ligne":
            $tmp = "在线手册";
            break;
        case "Marquer le module comme désinstallé":
            $tmp = "Mark the addon as uninstalled";
            break;
        case "Marquer le module comme installé":
            $tmp = "Mark module as installed";
            break;
        case "Marquer tous les Topics comme lus":
            $tmp = "把所有的主题标记为已读";
            break;
        case "Mauvais Mot de Passe":
            $tmp = "密码错误";
            break;
        case "max caractères":
            $tmp = "max character";
            break;
        case "Membre invisible":
            $tmp = "隐藏会员";
            break;
        case "Membre":
            $tmp = "位用户";
            break;
        case "Membres":
            $tmp = "位用户";
            break;
        case "Menu Administration":
            $tmp = "管理菜单";
            break;
        case "Menu":
            $tmp = "菜单";
            break;
        case "Merci d'entrer l'information en fonction des spécifications":
            $tmp = "请依照说明输入信息";
            break;
        case "Merci de fournir une nouvelle adresse Email valide.":
            $tmp = "请提供有效的新电子邮件地址。";
            break;
        case "Merci pour votre Contribution !":
            $tmp = "谢谢您的提交文章！!";
            break;
        case "Message d'entête":
            $tmp = "消息的抬头";
            break;
        case "Message de l'E-mail":
            $tmp = "电子邮件的信息:";
            break;
        case "Message de pied de page":
            $tmp = "页面底部显示信息";
            break;
        case "Message Interne":
            $tmp = "内部私信";
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
            $tmp = "页首的html代码";
            break;
        case "Mettre à jour":
            $tmp = "维护更新";
            break;
        case "mise à jour":
            $tmp = "更新";
            break;
        case "Mode":
            $tmp = "方式";
            break;
        case "Modérateur":
            $tmp = "Moderator";
            break;
        case "Modérateur(s)":
            $tmp = "长老";
            break;
        case "Modérateurs uniquement":
            $tmp = " 仅限版主";
            break;
        case "Modérateurs":
            $tmp = "长老";
            break;
        case "Modération par l'Administrateur":
            $tmp = "管理员处理";
            break;
        case "Modération par les Utilisateurs":
            $tmp = "注册用户处理";
            break;
        case "Modification de données dans table(s)":
            $tmp = "Modification of data in table(s)";
            break;
        case "Modification de":
            $tmp = "修改关于";
            break;
        case "Modifié":
            $tmp = "修改";
            break;
        case "Modifier annonceur":
            $tmp = "修改发表者信息";
            break;
        case "Modifier l'Article":
            $tmp = "修改文章";
            break;
        case "Modifier l'Editorial":
            $tmp = "修改主编评论";
            break;
        case "Modifier l'information":
            $tmp = "修改Information信息";
            break;
        case "Modifier la Bannière":
            $tmp = "改变Banner";
            break;
        case "Modifier la Catégorie":
            $tmp = "编辑分类";
            break;
        case "Modifier le groupe":
            $tmp = "Modify the group";
            break;
        case "Modifier le lien":
            $tmp = "修改链接";
            break;
        case "Modifier le(s) fichier(s)":
            $tmp = "更改文件";
            break;
        case "Modifier les Liens":
            $tmp = "修改链接";
            break;
        case "Modifier un ":
            $tmp = "Change a ";
            break;
        case "Modifier un Bloc droit":
            $tmp = "修改一个页右栏目框";
            break;
        case "Modifier un Bloc gauche":
            $tmp = "修改一项页左栏目框";
            break;
        case "Modifier un utilisateur":
            $tmp = "修改一个用户";
            break;
        case "Modifier":
            $tmp = "修改";
            break;
        case "Module installé":
            $tmp = "模块已安装";
            break;
        case "Module":
            $tmp = "模块";
            break;
        case "Modules":
            $tmp = "模块";
            break;
        case "Mois":
            $tmp = "月";
            break;
        case "Mot de Passe : ":
            $tmp = "客户密码: ";
            break;
        case "Mot de Passe":
            $tmp = "密码";
            break;
        case "Mot(s) clé(s)":
            $tmp = "关键词";
            break;
        case "n'a pas été envoyée":
            $tmp = "没有发送";
            break;
        case "n'est pas modifiable tant qu'un autre n'est pas nommé pour ce forum":
            $tmp = "can not be changed until another is named for this forum";
            break;
        case "Nbre d'envois effectués":
            $tmp = "已发送邮件数";
            break;
        case "Ne pas enregistrer les 'hits' des auteurs dans les statistiques ?":
            $tmp = "在统计中<b>不要</b> 录入作者的点击数";
            break;
        case "Ne s'applique que si la catégorie : <b>'Articles'</b> n'est pas sélectionnée.":
            $tmp = "当<b>文章</b>没被选择时作用";
            break;
        case "News externes":
            $tmp = "Headlines";
            break;
        case "Niveau d'accès":
            $tmp = "进入等级";
            break;
        case "Niveau de l'Utilisateur":
            $tmp = "会员等级";
            break;
        case "Nom : ":
            $tmp = "名字: ";
            break;
        case "Nom d'utilisateur":
            $tmp = "用户名";
            break;
        case "Nom d'utilisateur anonyme":
            $tmp = "匿名默认名:";
            break;
        case "Nom de fichier":
            $tmp = "文件名";
            break;
        case "Nom de l'annonceur":
            $tmp = "客户名";
            break;
        case "Nom de la Catégorie : ":
            $tmp = "分类名称: ";
            break;
        case "Nom de la Rubrique":
            $tmp = " 栏目名称";
            break;
        case "Nom de la Sous-catégorie : ":
            $tmp = "次目录的名称: ";
            break;
        case "Nom de la Sous-Rubrique : ":
            $tmp = "次目录名称";
            break;
        case "Nom du Contact : ":
            $tmp = "联系姓名: ";
            break;
        case "Nom du Contact":
            $tmp = "联系姓名";
            break;
        case "Nom du forum":
            $tmp = "版面名称";
            break;
        case "Nom du produit":
            $tmp = "产品名称:";
            break;
        case "Nom du serveur":
            $tmp = "服务器名称";
            break;
        case "Nom du site : ":
            $tmp = "站点名称:";
            break;
        case "Nom du site pour la balise title":
            $tmp = "网站的标题<b>Title</b>";
            break;
        case "Nom du site":
            $tmp = "站点名称";
            break;
        case "Nom":
            $tmp = "姓名";
            break;
        case "Nombre d'article par page":
            $tmp = 'Administration';
            break;
        case "Nombre d'articles dans le bloc des anciens articles":
            $tmp = "在旧文件栏目框中显示的文件数";
            break;
        case "Nombre d'articles en page principale":
            $tmp = " 在主页上的文章数目：";
            break;
        case "Nombre d'éléments dans la page top":
            $tmp = "在<b>TOP</b>页面上的主题数目";
            break;
        case "Nombre d'utilisateurs listés":
            $tmp = "在列表中的用户的数目";
            break;
        case "Nombre de clics sur un lien pour qu'il soit populaire":
            $tmp = "成为热门链接所需的点击数";
            break;
        case "Nombre de contributions par page":
            $tmp = "每页显示发表数:";
            break;
        case "Nombre de Forum(s)":
            $tmp = "论坛数量";
            break;
        case "Nombre de Hits":
            $tmp = "点击次数 : ";
            break;
        case "Nombre de Liens 'Meilleur'":
            $tmp = "最好的链接数目:";
            break;
        case "Nombre de Liens 'Nouveaux'":
            $tmp = "新链接的数目:";
            break;
        case "Nombre de liens dans les résultats des recherches":
            $tmp = "个链接搜索结果:";
            break;
        case "Nombre de liens par page":
            $tmp = "每页链接数:";
            break;
        case "Nombre maximum de choix pour les sondages":
            $tmp = "在调查中最多可选的数目:";
            break;
        case "Nombre maximum de commentaire par utilisateur (24H) ?":
            $tmp = "一个用户最多能发表评论的数目";
            break;
        case "Nombre maximum de contributions par IP et par période de 30 minutes (0=système inactif) :":
            $tmp = " 同一IP地址每30分钟发布的消息，最多不超过 (0=系统为非激活状态)：";
            break;
        case "Nombres d'articles en mode administration":
            $tmp = "在管理中的文章数目:";
            break;
        case "Nommer":
            $tmp = "Nominate";
            break;
        case "non disponible":
            $tmp = "无法找到";
            break;
        case "non optimisée":
            $tmp = "未优化";
            break;
        case "Non":
            $tmp = "否";
            break;
        case "Note : ":
            $tmp = "记录:";
            break;
        case "Note":
            $tmp = "用户平均评价";
            break;
        case "Notes":
            $tmp = "注释";
            break;
        case "Notifier les nouvelles contributions par E-mail":
            $tmp = "当有新提交时用Email通知";
            break;
        case "Nous avons approuvé votre contribution à notre moteur de recherche.":
            $tmp = "您在我们的搜索中添加的链接被确认";
            break;
        case "Nouveau Grand Titre":
            $tmp = "New Headline";
            break;
        case "Nouveau Lien ajouté dans la base de données":
            $tmp = "新链接已添加到数据库";
            break;
        case "Nouveaux Articles postés":
            $tmp = "新提交文章";
            break;
        case "Nouvel administrateur":
            $tmp = "New administrator";
            break;
        case "Nouvel Article":
            $tmp = "新文章";
            break;
        case "Nouvelle Catégorie ajoutée":
            $tmp = "新分类已添加！!";
            break;
        case "Nouvelles du groupe":
            $tmp = "Group news.";
            break;
        case "Ok":
            $tmp = "完成";
            break;
        case "Optimisation de la base de données":
            $tmp = "优化数据库";
            break;
        case "Optimisation effectuée":
            $tmp = "Optimization done";
            break;
        case "optimisée":
            $tmp = "已优化";
            break;
        case "OptimySQL":
            $tmp = "优化 MySql";
            break;
        case "Option : ":
            $tmp = "选项: ";
            break;
        case "Option":
            $tmp = "选项";
            break;
        case "Options des sondages":
            $tmp = "调查的选项";
            break;
        case "Options pour les Bannières":
            $tmp = "Banners的选项";
            break;
        case "Options pour les Commentaires":
            $tmp = "评论的选项";
            break;
        case "Original":
            $tmp = "原始的";
            break;
        case "Oter":
            $tmp = "去掉";
            break;
        case "ou les affecter à une autre Catégorie.":
            $tmp = "或者您可以移动这些文章和评语到另外一个分类.";
            break;
        case "Oui":
            $tmp = "是";
            break;
        case "Page courante sans liens locaux":
            $tmp = "当前页面，不含链接";
            break;
        case "Page de démarrage":
            $tmp = "起始页";
            break;
        case "Page(s)":
            $tmp = "页";
            break;
        case "Par défaut, rien ou Tout sauf pour ... [aucune URI] = aucune restriction":
            $tmp = "By defaut, nothing or All except [no URI] = no limitation";
            break;
        case "par exemple : genial.png":
            $tmp = "（例如: games.gif）";
            break;
        case "par":
            $tmp = "由";
            break;
        case "Paramètres liés à l'illustration":
            $tmp = "某个插图的参数";
            break;
        case "Paramètres":
            $tmp = "参数";
            break;
        case "Parcourir":
            $tmp = " 浏览";
            break;
        case "Pas d'affichage du cache":
            $tmp = "No use of cache";
            break;
        case "Pas d'installeur disponible":
            $tmp = "没有可执行的自动安装文件";
            break;
        case "Pas d'utilisation des descriptions ODP ou YDIR":
            $tmp = "No use of ODP or YDIR descriptions";
            break;
        case "Pas de modération":
            $tmp = "无处理员";
            break;
        case "Pas de nouveaux Articles postés":
            $tmp = "没有新提交";
            break;
        case "Petite Lettre D'information":
            $tmp = "信笺 NewsLetter";
            break;
        case "Pied":
            $tmp = "页面底部";
            break;
        case "Port TCP":
            $tmp = "TCP 端口";
            break;
        case "Position":
            $tmp = "Position";
            break;
        case "Poster un Article ":
            $tmp = "发表文章";
            break;
        case "Poster un Article Admin":
            $tmp = " 张贴一个管理文章";
            break;
        case "Pour les bannières encore plus complexes (Flash, ...), saisir simplement la référence à votre_répertoire/votre_fichier.txt (fichier de code php) dans la zone URL du clic et laisser la zone image vide.":
            $tmp = "对于复杂的Banners (比如Flash等)：仅在ClickUrl TextBox中书写参数用于表述您的目录/ .txt 文件位置(php编码文件) ";
            break;
        case "Pour les bannières Javascript, saisir seulement le code javascript dans la zone URL du clic et laisser la zone image vide.":
            $tmp = "对于使用Javascript 的Banners，仅在ClickUrl TextBox中书写javascript编码，不用输入图片的URL地址";
            break;
        case "Pour les grands titres de sites de news, activer la vérification de l'existance d'un web sur le Port 80":
            $tmp = "对于新闻站点的头条标题，要核查该站点的Port 80吗？";
            break;
        case "Pour les pages HTML générées, activer les tags avancés de gestion du cache":
            $tmp = "Cache Control : Activate the advanced cache tags (pragma ...)?";
            break;
        case "Pour prévisualiser le contenu dans son environnement d'exploitation.":
            $tmp = "在产品空间中预览结果（内容）";
            break;
        case "Pour supprimer votre abonnement à notre Lettre, suivez ce lien":
            $tmp = "要取消您在本站的预定，请点击这里。";
            break;
        case "Pour un passage automatique au contrôle du (des) prochain(s) lot : cocher.":
            $tmp = "对于自动通过以控制下一批：检查。";
            break;
        case "Précédent":
            $tmp = "上一页";
            break;
        case "Préférences":
            $tmp = "参数";
            break;
        case "Prévisualiser l'Article":
            $tmp = "预览";
            break;
        case "Prévisualiser":
            $tmp = "预览";
            break;
        case "Privé":
            $tmp = "非公开";
            break;
        case "Proposé":
            $tmp = "建议的";
            break;
        case "Proposition de modifications de Liens":
            $tmp = "链接修改请求";
            break;
        case "Propriétaire de la page Web : ":
            $tmp = "该网页的主人是：";
            break;
        case "Propriétaire":
            $tmp = "所有者";
            break;
        case "Protocole de chiffrement":
            $tmp = "加密协议";
            break;
        case "Public":
            $tmp = "公开";
            break;
        case "Publication Anonyme autorisée":
            $tmp = "匿名粘贴";
            break;
        case "publication(s) attachée(s)":
            $tmp = "相关的发表文章";
            break;
        case "Publication(s) en attente de validation":
            $tmp = "等待生效的发表文章";
            break;
        case "Publications connexes":
            $tmp = "相关发表文章";
            break;
        case "publications":
            $tmp = "发表文章";
            break;
        case "Publier dans la racine ?":
            $tmp = "在首页发布吗？";
            break;
        case "Publier":
            $tmp = "发表";
            break;
        case "Puis votre compte pourra être supprimé.":
            $tmp = "然后可以删除您的帐户。";
            break;
        case "qu'administrateur":
            $tmp = "administrator";
            break;
        case "que membre":
            $tmp = "member";
            break;
        case "Que voulez-vous faire ?":
            $tmp = "您想做什么？?";
            break;
        case "Question : ":
            $tmp = "问题:";
            break;
        case "Question":
            $tmp = "Question";
            break;
        case "Questions & Réponses":
            $tmp = "问题和解答";
            break;
        case "Qui parle de nous ?":
            $tmp = "谁链接到了本站？?";
            break;
        case "Rafraîchir":
            $tmp = "刷新";
            break;
        case "Re-prévisualiser":
            $tmp = "再次预览";
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
            $tmp = "将本消息列于首位";
            break;
        case "Replier la liste":
            $tmp = "Hide list";
            break;
        case "Réponse : ":
            $tmp = "解答:";
            break;
        case "Réponse":
            $tmp = "解答";
            break;
        case "Requête de modification d'un Lien Utilisateur":
            $tmp = "修改某用户链接的申请";
            break;
        case "Réseaux sociaux":
            $tmp = "Social networks";
            break;
        case "Réservé : ":
            $tmp = "已付费: ";
            break;
        case "Restreinte":
            $tmp = "局限";
            break;
        case "Restriction":
            $tmp = "Limitation";
            break;
        case "rétention en secondes":
            $tmp = "系统保留时间";
            break;
        case "Rétention":
            $tmp = "Retention";
            break;
        case "Retirer un Sondage existant":
            $tmp = " 删除一个已经存在的调查";
            break;
        case "Retirer":
            $tmp = "卸载";
            break;
        case "Retour à l'index d'administration":
            $tmp = "去管理区";
            break;
        case "Retour à la racine":
            $tmp = "返回根目录";
            break;
        case "Retour en arrière, pour changer le Nom":
            $tmp = " 返回以修改名称";
            break;
        case "Retour en arrière":
            $tmp = "后退";
            break;
        case "Revenir aux avatars standards":
            $tmp = "恢复标准头像";
            break;
        case "Robots/Spiders":
            $tmp = "Robots";
            break;
        case "Rôle de l'Utilisateur":
            $tmp = "会员的角色";
            break;
        case "Rubrique de téléchargement":
            $tmp = "本地下載";
            break;
        case "rubrique":
            $tmp = "目录";
            break;
        case "Rubrique":
            $tmp = "目录";
            break;
        case "Rubriques actives":
            $tmp = "当前激活的栏目";
            break;
        case "rubriques":
            $tmp = "众目录";
            break;
        case "Rubriques":
            $tmp = "精华区";
            break;
        case "S.V.P. Choisissez un sondage dans la liste suivante.":
            $tmp = " 请在下列列表中选择一个调查";
            break;
        case "S.V.P. entrez chaque option disponible dans un seul champ":
            $tmp = "请在一个表栏中输入有效选项";
            break;
        case "Sans nom":
            $tmp = "无名";
            break;
        case "Sans réponse de votre part sous 60 jours vous ne pourrez plus vous connecter en tant que membre sur ce site.":
            $tmp = "如果您在60天内没有回复,您将无法以会员身份登录此站点。";
            break;
        case "Sans titre":
            $tmp = "无标题";
            break;
        case "Sauter cette étape et afficher le code du(des) bloc(s)":
            $tmp = "Jump this stage and display (the) code of the block(s)";
            break;
        case "Sauter cette étape":
            $tmp = "Skip this stage";
            break;
        case "Sauvegarde de la base de données":
            $tmp = "数据库备备份";
            break;
        case "Sauvegarde terminée. Les fichiers sont disponibles dans le répertoire /slogs":
            $tmp = " 已保存。文件保存在目录/slogs";
            break;
        case "Sauver l'Article Automatique":
            $tmp = "保存自动文章";
            break;
        case "Sauver les modifications":
            $tmp = "保存更改";
            break;
        case "Sauver":
            $tmp = "Save";
            break;
        case "SavemySQL":
            $tmp = "保存 mySQL";
            break;
        case "Script":
            $tmp = "脚本";
            break;
        case "Sélectionner la langue du site":
            $tmp = "选择语言:";
            break;
        case "Sélectionner la nouvelle Catégorie : ":
            $tmp = "请选择新分类:";
            break;
        case "Sélectionner un Sujet":
            $tmp = "选择主题";
            break;
        case "Sélectionner une Catégorie à supprimer":
            $tmp = "选择一个要删除的类别";
            break;
        case "Sélectionner une Catégorie":
            $tmp = "选择分类";
            break;
        case "seront affectés à":
            $tmp = "将被转移";
            break;
        case "Serveurs de mail incorrects":
            $tmp = "邮件服务器无效";
            break;
        case "Serveurs de mails contrôlés":
            $tmp = "已检查的邮件服务器";
            break;
        case "Seuil pour les Sujet 'chauds'":
            $tmp = "热门主题的界限";
            break;
        case "Seulement aux membres":
            $tmp = "仅注册用户";
            break;
        case "Seulement aux prospects":
            $tmp = " 仅限于潜在用户";
            break;
        case "Seulement pour ...":
            $tmp = "只为...";
            break;
        case "Si Super administrateur est coché, cet administrateur aura TOUS les droits.":
            $tmp = "如果选择了超级用户，该用户可以使用所有功能。";
            break;
        case "Si vous le souhaitez, vous pouvez exécuter ce script vous même, si vous souhaitez par exemple l'exécuter sur une autre base que celle du site. Dans ce cas, pensez à reparamétrer le fichier de configuration du module.":
            $tmp = "If you wish it, you can run this script you even, if you wish for example to run it on another base than that of the site. In that case, think of re-setting the file of configuration of the module.";
            break;
        case "Si vous préférez créer vous même le(s) bloc(s), cliquez sur 'Sauter cette étape et afficher le code du(des) bloc(s)' pour visualiser le code à taper dans le(s) bloc(s).":
            $tmp = "If you prefer to create you even (the) block(s), click on 'Jump this stage and display the code of (the) block(s)' to show the code to be typed in (the) block(s).";
            break;
        case "Signature":
            $tmp = "签名";
            break;
        case "Sites Référents":
            $tmp = "HTTP来源";
            break;
        case "Situation géographique":
            $tmp = "您的住址";
            break;
        case "Skin d'affichage par défaut":
            $tmp = "Default Skin for your Site";
            break;
        case "Slogan du site":
            $tmp = "站点口号:";
            break;
        case "Sondage":
            $tmp = "投票调查";
            break;
        case "Sondages":
            $tmp = "调查";
            break;
        case "Soumission de Liens brisés":
            $tmp = "无效链接报告";
            break;
        case "Sous-catégorie :":
            $tmp = "次目录 :";
            break;
        case "sous-rubrique":
            $tmp = "次目录";
            break;
        case "Sous-rubrique":
            $tmp = "次目录";
            break;
        case "sous-rubrique(s) attachée(s)":
            $tmp = "附带的次目录";
            break;
        case "Sous-rubriques":
            $tmp = "Sub-sections";
            break;
        case "sous-rubriques":
            $tmp = "众次目录";
            break;
        case "Standard":
            $tmp = "标准";
            break;
        case "Strict":
            $tmp = "严格的";
            break;
        case "Structure de la table":
            $tmp = "表的结构";
            break;
        case "Suivant":
            $tmp = "下一个";
            break;
        case "Sujet : ":
            $tmp = "主题:";
            break;
        case "Sujet de l'E-mail":
            $tmp = "电子邮件的标题:";
            break;
        case "Sujet":
            $tmp = "主题";
            break;
        case "Sujets actifs":
            $tmp = "当前主题";
            break;
        case "Sujets par forum":
            $tmp = "各论坛的主题";
            break;
        case "Super administrateur":
            $tmp = "超级用户";
            break;
        case "SuperCache":
            $tmp = "超级缓存";
            break;
        case "Suppression de table(s)":
            $tmp = "Deletion of table(s)";
            break;
        case "Suppression effectuée":
            $tmp = " 删除操作完成";
            break;
        case "Supprimer cette Critique":
            $tmp = "删除该评论";
            break;
        case "Supprimer forum du groupe":
            $tmp = "Delete forum of the group";
            break;
        case "Supprimer groupe":
            $tmp = "删除组";
            break;
        case "Supprimer l'Annonceur":
            $tmp = "删除广告客户";
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
            $tmp = " 删除该文件";
            break;
        case "Supprimer massivement les Topics":
            $tmp = "大量删除主题";
            break;
        case "Supprimer MiniSite du groupe":
            $tmp = "Delete mini Web site for the group";
            break;
        case "Supprimer un utilisateur":
            $tmp = "删除用户";
            break;
        case "Supprimer une Catégorie":
            $tmp = "删除分类";
            break;
        case "Supprimer":
            $tmp = "删除";
            break;
        case "Surnom":
            $tmp = "别名";
            break;
        case "Synchroniser les forums":
            $tmp = "使论坛同步";
            break;
        case "Système de Messagerie (Email)":
            $tmp = "邮件系统";
            break;
        case "Système":
            $tmp = "系统";
            break;
        case "Table":
            $tmp = "表";
            break;
        case "Tableau de Bord":
            $tmp = "管理参数表";
            break;
        case "Taille actuelle":
            $tmp = "当前尺寸";
            break;
        case "Taille de fichier":
            $tmp = "取消:";
            break;
        case "Taille maximum des avatars personnels (largeur * hauteur / 60*80) en pixel ?":
            $tmp = "个人表情符号的pixel尺寸（宽60高80）？";
            break;
        case "Taille maximum des fichiers de sauvegarde SaveMysql":
            $tmp = "用SaveMysql可保存的文件最大尺寸为";
            break;
        case "Taille":
            $tmp = "大小";
            break;
        case "Téléchargements":
            $tmp = "下载";
            break;
        case "Télécharger URL":
            $tmp = "下载地址：";
            break;
        case "Temps de rétention en secondes":
            $tmp = "保留时间（秒）";
            break;
        case "Texte : ":
            $tmp = "文本:";
            break;
        case "Texte complet":
            $tmp = "完整文章";
            break;
        case "Texte d'introduction":
            $tmp = "介绍文章";
            break;
        case "Texte du Sujet :":
            $tmp = "主题描述:";
            break;
        case "Texte étendu":
            $tmp = "文章主体";
            break;
        case "Texte pour le rôle":
            $tmp = "角色文字";
            break;
        case "Texte":
            $tmp = "Text";
            break;
        case "TEXTE":
            $tmp = "文本";
            break;
        case "Thème d'affichage par défaut":
            $tmp = "默认主题样式";
            break;
        case "Titre :":
            $tmp = "标题:";
            break;
        case "Titre de la Page des Critiques":
            $tmp = "评论页标题";
            break;
        case "Titre de la page":
            $tmp = "Page title";
            break;
        case "Titre de la Page":
            $tmp = "网页名称: ";
            break;
        case "Titre du backend":
            $tmp = "后台标题:";
            break;
        case "Titre du lien : ":
            $tmp = "链接名称：:";
            break;
        case "Titre":
            $tmp = "标题";
            break;
        case "Tous les Articles dans":
            $tmp = "所有在以下位置的文章：";
            break;
        case "Tous les Sujets":
            $tmp = "所有主题";
            break;
        case "Tous les Utilisateurs":
            $tmp = "所有用户";
            break;
        case "Tous sauf pour ...":
            $tmp = "All expect for....";
            break;
        case "Tous":
            $tmp = "佥";
            break;
        case "Tout cocher":
            $tmp = "Check all";
            break;
        case "Tout contenu (page/liens/etc)":
            $tmp = "所有内容";
            break;
        case "Tout décocher":
            $tmp = "Uncheck all";
            break;
        case "Tout public":
            $tmp = "所有公众";
            break;
        case "Tout supprimer":
            $tmp = "删除所有";
            break;
        case "Toute tables. Fichier envoyé au navigateur. Pas de limite de taille":
            $tmp = "所有表格。文件发送到浏览器。没有尺寸限制。";
            break;
        case "Toutes les souscriptions de ces utilisateurs ont été suspendues.":
            $tmp = "这些用户的所有订阅都已暂停。";
            break;
        case "Transférer à Droite":
            $tmp = " 移动到右";
            break;
        case "Transférer à Gauche":
            $tmp = " 移动到左";
            break;
        case "Transitional":
            $tmp = "过度的";
            break;
        case "Transmission LNL en cours":
            $tmp = "正在转换为LNL";
            break;
        case "Type :":
            $tmp = "类型:";
            break;
        case "Type d'éditorial":
            $tmp = "Type of editorial";
            break;
        case "Type de modération":
            $tmp = "论坛版主类别：";
            break;
        case "Type de sauvegarde SaveMysql":
            $tmp = "用SaveMysql可保存的类型";
            break;
        case "Type":
            $tmp = "类型";
            break;
        case "Un message privé leur a été envoyé sans réponse à ce message sous 60 jours ces utilisateurs ne pourront plus se connecter au site.":
            $tmp = "已发送私人消息，但未在60天内回复此消息，这些用户将无法再连接到该网站。";
            break;
        case "Une erreur est survenue lors de l'exécution du script SQL. Mysql a répondu :":
            $tmp = "An error arose during the run of the SQL script. Mysql answered:";
            break;
        case "Une erreur est survenue lors de la configuration automatique du(des) bloc(s). Mysql a répondu :":
            $tmp = "An error arose during the configuration of (the) block(s). Mysql answered:";
            break;
        case "Une fois que vous aurez validé cette publication, elle sera intégrée en base temporaire, et l'administrateur sera prévenu. Il visera cette publication et la mettra en ligne dans les meilleurs délais. Il est normal que pour l'instant, cette publication n'apparaisse pas dans l'arborescence.":
            $tmp = "一旦您使本发表文章确认生效，它将被保存在临时数据库中，系统同时通知管理员。管理员将浏览您的文章并尽快将其在线生效。<br/>因此，您当前在树型结构中还不能看到它。";
            break;
        case "Upload":
            $tmp = "Upload";
            break;
        case "URL : ":
            $tmp = "URL地址:";
            break;
        case "URL de l'image du backend":
            $tmp = "Backend图片的地址";
            break;
        case "URL de l'image":
            $tmp = "图片URL: ";
            break;
        case "URL de la Page":
            $tmp = "网页URL : ";
            break;
        case "URL du clic":
            $tmp = "点击URL地址";
            break;
        case "URL du site":
            $tmp = "站点URL";
            break;
        case "URL pour le fichier RDF/XML : ":
            $tmp = "RDF/XML 文件的地址";
            break;
        case "Url":
            $tmp = "Url";
            break;
        case "URL":
            $tmp = "URL";
            break;
        case "Utilisateur en attente de groupe !":
            $tmp = "用户等待进群！";
            break;
        case "Utilisateur en attente de validation !":
            $tmp = "等待验证的用户";
            break;
        case "Utilisateur enregistré uniquement":
            $tmp = "仅注册用户";
            break;
        case "Utilisateur enregistré":
            $tmp = "注册用户";
            break;
        case "Utilisateur inexistant !":
            $tmp = "用户不存在！!";
            break;
        case "Utilisateur":
            $tmp = "用户";
            break;
        case "Utilisateurs":
            $tmp = "用户";
            break;
        case "Utiliser 587 si vous avez activé le chiffrement TLS":
            $tmp = "如果启用了 TLS 加密，请使用 587";
            break;
        case "Validation de votre publication":
            $tmp = " 对你的发表文章进行确认生效";
            break;
        case "Valider":
            $tmp = "确定";
            break;
        case "Version":
            $tmp = "版本";
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
            $tmp = "清空临时内存目录";
            break;
        case "Visite":
            $tmp = "访问";
            break;
        case "Visiter le site web":
            $tmp = "访问网站";
            break;
        case "Visiter":
            $tmp = "Visit";
            break;
        case "Visualiser":
            $tmp = "查看";
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
            $tmp = "这是 SQL 脚本:";
            break;
        case "Voir les forums de cette catégorie":
            $tmp = "Show the forums of this category";
            break;
        case "Voir":
            $tmp = "见";
            break;
        case "Vos droits de publications vous permettent de mettre à jour ou de supprimer ce contenu mais pas de la mettre en ligne sur le site.":
            $tmp = "您对该发表文章的所有权益允许您更新或删除之，但是不能使之在线生效。";
            break;
        case "Vos droits de publications vous permettent de mettre à jour, de supprimer ou de le mettre en ligne sur le site ce contenu.":
            $tmp = "您对该发表文章的所有权益允许您更新或删除之，亦或使之在线生效。";
            break;
        case "Vos MétaTags ont été modifiés avec succès !":
            $tmp = "您对页首html的修改成功";
            break;
        case "Vote fermé":
            $tmp = "投票结束";
            break;
        case "Vote":
            $tmp = "Vote";
            break;
        case "Votre adresse Email est incorrecte.":
            $tmp = "您的电子邮件地址不正确。";
            break;
        case "Votre adresse IP (= ne pas comptabiliser les hits qui en proviennent) :":
            $tmp = "您的IP，不记入统计:";
            break;
        case "Votre Lien":
            $tmp = "您的链接在";
            break;
        case "Votre situation géographique":
            $tmp = "您的住址";
            break;
        case "Vous allez exclure TOUS les membres du groupe":
            $tmp = "You will exclude ALL members from the group";
            break;
        case "Vous allez supprimer le groupe":
            $tmp = "您将删除该组";
            break;
        case "Vous avez choisi de configurer manuellement vos blocs. Voici le contenu de ceux-ci :":
            $tmp = "You chose to configure manually your blocks. Here is the contents of these:";
            break;
        case "Vous devez désinstaller le module manuellement. Pour cela, référez vous au fichier install.txt de l'archive du module, et faites les opérations inverses de celles décrites dans la section \"Installation manuelle\", et en partant de la fin.":
            $tmp = "You owe to uninstall manually the addon. For that, refer to the file install.txt of the file of the addon, and make the operations opposite of those described in the section \"Installation manual\", and on the basis of the end.";
            break;
        case "Vous devez remplir tous les Champs":
            $tmp = "您必须填写所有的表栏";
            break;
        case "vous devez supprimer TOUS ses membres !":
            $tmp = "you must exclude ALL of this members !";
            break;
        case "Vous devez vous identifier aussi en tant que membre pour utiliser cette fonction.":
            $tmp = "您必须登陆为会员才能使用本功能。";
            break;
        case "Vous êtes sur le point de supprimer cet annonceur : ":
            $tmp = "您正在删除该发表者";
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
            $tmp = "您只要以管理员身份浏览便可以删除/修改评论。";
            break;
        case "Vous pouvez supprimer la Catégorie, les Articles et Commentaires":
            $tmp = "您会删除这个分类及其下所有文章和评语";
            break;
        case "Vous pouvez utiliser notre moteur de recherche sur : ":
            $tmp = "您可以使用我们的该搜索引擎： :";
            break;
        default:
            $tmp = "需要翻译稿 [** $phrase **]";
            break;
    }
    return (htmlentities($tmp, ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401, 'UTF-8'));
}