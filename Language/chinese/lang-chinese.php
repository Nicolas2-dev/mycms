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
/* Zhang Yingzhu, Li Po, Qian Zhi, Jean Pierre Barbary                  */
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
            $tmp = "星期一";
            break;
        case "Tuesday":
            $tmp = "星期二";
            break;
        case "Wednesday":
            $tmp = "星期三";
            break;
        case "Thursday":
            $tmp = "星期四";
            break;
        case "Friday":
            $tmp = "星期五";
            break;
        case "Saturday":
            $tmp = "星期六";
            break;
        case "Sunday":
            $tmp = "星期日";
            break;
        case "January":
            $tmp = "一月";
            break;
        case "February":
            $tmp = "二月";
            break;
        case "March":
            $tmp = "三月";
            break;
        case "April":
            $tmp = "四月";
            break;
        case "May":
            $tmp = "五月";
            break;
        case "June":
            $tmp = "六月";
            break;
        case "July":
            $tmp = "七月";
            break;
        case "August":
            $tmp = "八月";
            break;
        case "September":
            $tmp = "九月";
            break;
        case "October":
            $tmp = "十月";
            break;
        case "November":
            $tmp = "十一月";
            break;
        case "December":
            $tmp = "十二月";
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

        case "0":
            $tmp = "零";
            break;
        case "1":
            $tmp = "一";
            break;
        case "2":
            $tmp = "二";
            break;
        case "3":
            $tmp = "三";
            break;
        case "4":
            $tmp = "四";
            break;
        case "5":
            $tmp = "五";
            break;
        case "6":
            $tmp = "六";
            break;
        case "7":
            $tmp = "七";
            break;
        case "8":
            $tmp = "八";
            break;
        case "9":
            $tmp = "九";
            break;
        case "+":
            $tmp = "加";
            break;
        case "-":
            $tmp = "减去";
            break;
        case "/":
            $tmp = "除以";
            break;
        case "*":
            $tmp = "乘以";
            break;

        case " le...":
            $tmp = " 于...";
            break;
        case "-Identifiant : ":
            $tmp = "-用户名 : ";
            break;
        case "-Mot de passe : ":
            $tmp = "-密码 : ";
            break;
        case ".:Page >> Super-Cache:.":
            $tmp = ".:Page >> Super-Cache:.";
            break;
        case "(255 caractères max. Entrez votre signature (mise en forme html))":
            $tmp = "(最多255 个字符。说一些您想让别人了解你的话)";
            break;
        case "(255 caractères max). Précisez qui vous êtes, ou votre identification sur ce site)":
            $tmp = "(最多可以输入255个英文字母。请注明您的身份或您在本网站的用户名)";
            break;
        case "(Cette adresse Email ne sera pas divulguée, mais elle nous servira à vous envoyer votre Mot de Passe si vous le perdez)":
            $tmp = "(这个邮件地址不会公开。但是它在您丢失或遗忘密码时是重要的信息。)";
            break;
        case "(Cette adresse Email sera publique. Vous pouvez saisir ce que vous voulez mais attention au Spam)":
            $tmp = "(这个电子邮件地址将是公开的)";
            break;
        case "(indispensable)":
            $tmp = "(必填项)";
            break;
        case "(optionnel)":
            $tmp = "(可选项)";
            break;
        case "(Pour activer un nouveau mot de passe, introduisez-le dans les 2 cases)":
            $tmp = "(输入两次新密码以改变密码)";
            break;
        case "* Désigne un champ obligatoire":
            $tmp = "* 指定必要区域";
            break;
        case "0 : illimité / 1 à":
            $tmp = "0：无限 / 1 至";
            break;
        case "à : ":
            $tmp = " 给 : ";
            break;
        case "à cette personne : ":
            $tmp = "发送给这个朋友 : ";
            break;
        case "a écrit :":
            $tmp = "写道 :";
            break;
        case "a été envoyé à":
            $tmp = "已发送给";
            break;
        case "A propos des messages publiés :":
            $tmp = "关于私人信息";
            break;
        case "a trouvé cet article intéressant et a souhaité vous l'envoyer.":
            $tmp = " 觉得这篇文章有点意思，希望发送给您.";
            break;
        case "a trouvé notre site":
            $tmp = "觉得我们的网站";
            break;
        case "à":
            $tmp = "发送到";
            break;
        case "Abon.":
            $tmp = "预定该服务";
            break;
        case "Abonnement":
            $tmp = "预定该服务";
            break;
        case "Accepter":
            $tmp = "接受";
            break;
        case "Accessible à tous":
            $tmp = "所有人自由进入";
            break;
        case "Activé":
            $tmp = "在";
            break;
        case "Activer votre menu personnel":
            $tmp = "激活个人菜单";
            break;
        case "Activité du site":
            $tmp = "本网站的活动信息";
            break;
        case "Activité":
            $tmp = "职业";
            break;
        case "Actuellement connecté en administrateur... Cette critique sera":
            $tmp = "当前以管理员身份登录... 评论立即发布";
            break;
        case "Administrateur : ":
            $tmp = "完全管理 : ";
            break;
        case "Adresse DNS de l'utilisateur : ":
            $tmp = "使用者的DNS地址 : ";
            break;
        case "Adresse IP de l'utilisateur : ":
            $tmp = "用户的IP地址： : ";
            break;
        case "Adresse":
            $tmp = "地址";
            break;
        case "Adresses IP et informations sur les utilisateurs":
            $tmp = "使用者IP地址和帐号信息。";
            break;
        case "Affichage filtré pour":
            $tmp = "经过以下筛选后显示结果";
            break;
        case "Afficher ce commentaire":
            $tmp = "查看此评论";
            break;
        case "Afficher ce post":
            $tmp = "Afficher ce post";
            break; //
        case "Afficher la signature":
            $tmp = "显示签名";
            break;
        case "Ajouté :":
            $tmp = "已添加： :";
            break;
        case "Ajouté le : ":
            $tmp = "添加于: ";
            break;
        case "ajouté":
            $tmp = "已添加：";
            break;
        case "Ajouter à la liste de diffusion":
            $tmp = "添加到邮件列表";
            break;
        case "Ajouter la date et l'heure":
            $tmp = "加上时间和日期";
            break;
        case "Ajouter un article":
            $tmp = "添加一个物品";
            break;
        case "Ajouter un édito":
            $tmp = "添加社论";
            break;
        case "Ajouter un nouveau lien":
            $tmp = "添加新链接";
            break;
        case "Ajouter une catégorie principale":
            $tmp = "添加主分类";
            break;
        case "Ajouter une sous-catégorie":
            $tmp = "添加子分类";
            break;
        case "Ajouter une url":
            $tmp = "添加一个网址";
            break;
        case "Ajouter":
            $tmp = "添加";
            break;
        case "Aller à la page":
            $tmp = "前往页面: ";
            break;
        case "Anciens articles":
            $tmp = "个被下载最多的文件";
            break;
        case "Anciens sondages":
            $tmp = "以前的调查";
            break;
        case "Année":
            $tmp = "年";
            break;
        case "Annuler l'envoi":
            $tmp = "取消发送";
            break;
        case "Annuler la contribution":
            $tmp = "取消发言";
            break;
        case "Annuler la réponse":
            $tmp = "取消回复";
            break;
        case "Annuler":
            $tmp = "取消";
            break;
        case "Anonyme":
            $tmp = "匿名游客";
            break;
        case "Anti-Spam / Merci de répondre à la question suivante : ":
            $tmp = "反垃圾邮件 / 感谢您回答这个问题 :";
            break;
        case "Août":
            $tmp = "八月";
            break;
        case "Aperçu des sujets :":
            $tmp = "热门主题";
            break;
        case "Archives":
            $tmp = "档案资料";
            break;
        case "Article de":
            $tmp = "新闻提供";
            break;
        case "Article du Jour":
            $tmp = "今天发表最受欢迎文章";
            break;
        case "Article en attente d'édition":
            $tmp = "等待发表的文章";
            break;
        case "Article intéressant sur":
            $tmp = "一篇特别的文章在以下网址";
            break;
        case "Articles envoyés : ":
            $tmp = "文章已经发送 : ";
            break;
        case "Articles les plus commentés":
            $tmp = "篇评论最多的文章";
            break;
        case "Articles les plus lus dans les rubriques spéciales":
            $tmp = "在特别栏目中的焦点文章";
            break;
        case "articles les plus lus":
            $tmp = "人气最高的文章";
            break;
        case "Articles plus anciens":
            $tmp = "较旧文章";
            break;
        case "Articles présents dans les rubriques":
            $tmp = "在精华区中的文章";
            break;
        case "Articles publiés : ":
            $tmp = "已发表文章： : ";
            break;
        case "Articles publiés":
            $tmp = "篇文章被发布";
            break;
        case "Articles":
            $tmp = "文章";
            break;
        case "Assurez-vous de l'exactitude de votre information avant de la communiquer. N'écrivez pas en majuscules, votre texte serait automatiquement rejeté":
            $tmp = "请确保填入的信息均有效、语法正确、注意大小写。比如，不要用大写书写文本，这样会拒绝写入的。 !";
            break;
        case "ATTENTION : Etes-vous certain de vouloir effacer cette catégorie et tous ses Liens ?":
            $tmp = "警告：您确认删除该分类和其下的所有链接？ ?";
            break;
        case "Attention à votre expression écrite. Vous pouvez utiliser du code html si vous savez le faire":
            $tmp = "Attention à votre expression écrite. Vous pouvez utiliser du code html si vous savez le faire";
            break;
        case "Aucun édito n'est disponible pour ce site":
            $tmp = "没有关于此下载项的管理员评论。";
            break;
        case "Aucun membre trouvé pour":
            $tmp = "没有找到任何会员关于";
            break;
        case "Aucun nom n'a été entré":
            $tmp = "没有名字输入";
            break;
        case "Aucune catégorie":
            $tmp = "没有目录";
            break;
        case "Aucune correspondance à votre recherche n'a été trouvée":
            $tmp = "没有与您的查询相关的结果";
            break;
        case "Aucune langue":
            $tmp = "没有语言";
            break;
        case "Aucune nouvelle contribution depuis votre dernière visite.":
            $tmp = "自从您上次访问后没有新消息张贴.";
            break;
        case "Aucune réponse pour les mots que vous cherchez. Elargissez votre recherche.":
            $tmp = "对该关键词的搜索没有结果。请扩大您的搜索范围。";
            break;
        case "Auteur":
            $tmp = "作者 ";
            break;
        case "Auteur":
            $tmp = "提交者";
            break;
        case "Auteurs actifs":
            $tmp = "作品丰富的作者";
            break;
        case "Auteurs de news les plus regardées":
            $tmp = "位最活跃的新闻提交者";
            break;
        case "Auteurs les plus actifs":
            $tmp = "位最活跃的作者";
            break;
        case "Autoriser la création automatique des membres ?":
            $tmp = "允许自动创建新会员？";
            break;
        case "Autoriser la validation automatique des offres ?":
            $tmp = "允许该销售资源的信息自动生效?";
            break;
        case "Autoriser les autres utilisateurs à voir mon Email":
            $tmp = "允许其他注册用户看见我的email地址";
            break;
        case "Autres publications de la sous-rubrique":
            $tmp = "次目录中的其他发布的信息";
            break;
        case "Autres":
            $tmp = "其它的";
            break;
        case "Avatar : ":
            $tmp = "头像 : ";
            break;
        case "Avatar":
            $tmp = "头像";
            break;
        case "Avril":
            $tmp = "四月";
            break;
        case "Bannière":
            $tmp = "广告条";
            break;
        case "Bannières - Publicité":
            $tmp = "广告(Banner)";
            break;
        case "Bannières actives pour":
            $tmp = "当前广告为";
            break;
        case "Bannières terminées pour":
            $tmp = "以下用户的广告结束";
            break;
        case "Bannir cette @Ip":
            $tmp = "禁止这个IP地址";
            break;
        case "Bas de page":
            $tmp = "页脚";
            break;
        case "Bienvenue au dernier membre affilié : ":
            $tmp = "欢迎我们的最新会员";
            break;
        case "Bienvenue dans la rubrique des critiques":
            $tmp = "欢迎光临精华区于";
            break;
        case "Bienvenue sur la page de garde de":
            $tmp = "欢迎光临Top列表在";
            break;
        case "Bienvenue sur":
            $tmp = "欢迎您在";
            break;
        case "Bloc Chat":
            $tmp = "聊天室";
            break;
        case "Blog du groupe.":
            $tmp = "Group blog.";
            break;
        case "Boîte d'émission":
            $tmp = "发件夹";
            break;
        case "Boîte de réception":
            $tmp = "收件夹";
            break;
        case "Bonjour":
            $tmp = "您好";
            break;
        case "Caché":
            $tmp = "隐藏";
            break;
        case "caractères au minimum":
            $tmp = "characters minimum";
            break;
        case "caractères de plus":
            $tmp = "字节";
            break;
        case "caractères":
            $tmp = "个英文字符长";
            break;
        case "Carnet d'adresses":
            $tmp = "地址簿";
            break;
        case "Catégorie : ":
            $tmp = "分类 : ";
            break;
        case "Catégorie : ":
            $tmp = "分类 : ";
            break;
        case "Catégorie :":
            $tmp = "分类 :";
            break;
        case "Catégorie":
            $tmp = "分类";
            break;
        case "Catégories dans la rubrique des liens web":
            $tmp = "Categories in Web Links";
            break;
        case "Catégories les plus actives":
            $tmp = "最活跃的分类";
            break;
        case "Catégories":
            $tmp = "分类";
            break;
        case "Ce fichier n'existe pas ...":
            $tmp = "该文件不存在 ...";
            break;
        case "Ce nom n\'est pas disponible":
            $tmp = "此名称不可用";
            break;
        case "Ce sujet est verrouillé : il ne peut accueillir aucune nouvelle contribution.":
            $tmp = "此主题被锁定：它不能接受任何新的提交信息。";
            break;
        case "Ce surnom n\'est pas disponible":
            $tmp = "此昵称不可用";
            break;
        case "Ceci est un forum privé. Vous devez entrer le mot de passe pour y accéder":
            $tmp = "这是私人论坛。您必须输入密码才能进入。";
            break;
        case "Cela peut être retiré ou ajouté dans vos paramètres personnels":
            $tmp = "本项可以在你的个人参数中添加或撤消";
            break;
        case "Cela pourrait vous intéresser":
            $tmp = "您可能对此感兴趣：";
            break;
        case "Cela semble-t-il correct ?":
            $tmp = "您确定吗？ ?";
            break;
        case "Centres d'interêt":
            $tmp = "您的兴趣";
            break;
        case "Cet article provient de":
            $tmp = "这篇文章来自于";
            break;
        case "Cet utilisateur n'existe pas, refaites un essai.":
            $tmp = "该用户不存在。请返回并重试。";
            break;
        case "Cette bannière est affichée sur l'url":
            $tmp = "此广告张贴于以下URL地址";
            break;
        case "Cette donnée ne doit pas être vide.":
            $tmp = "该数据不能为空.";
            break;
        case "Cette option changera l'aspect du site.":
            $tmp = "发言者";
            break;
        case "Change le statut à OK / Supprime la demande":
            $tmp = "改变状况为是/删除申请";
            break;
        case "Changer le thème":
            $tmp = "更换主题";
            break;
        case "Changer":
            $tmp = "改变";
            break;
        case "Chaque utilisateur peut voir le site avec un thème graphique différent.":
            $tmp = "每个注册用户可以以不同主题样式浏览本站。";
            break;
        case "Chargement de fichiers":
            $tmp = "本地下載";
            break;
        case "Chargements":
            $tmp = "下載次數";
            break;
        case "Charger le fichier immédiatement !":
            $tmp = "馬上下載 !";
            break;
        case "Charger maintenant":
            $tmp = "现在下载";
            break;
        case "Charger un fichier une fois l'envoi accepté":
            $tmp = "在发送被接受后上传文件";
            break;
        case "Chat du groupe.":
            $tmp = "Group chat.";
            break;
        case "Chercher : ":
            $tmp = "搜索 : ";
            break;
        case "Chercher n'importe quel terme (par défaut)":
            $tmp = "搜索评论";
            break;
        case "Chercher tous les mots":
            $tmp = "查找任意主题（默认）";
            break;
        case "Choisir entre 1 et 10 (1=nul 10=excellent)":
            $tmp = "在1与10之间进行选择 （1=差 10=出色）";
            break;
        case "Choisir un dossier/sujet":
            $tmp = "選擇一個文件夾/主題";
            break;
        case "Choisir un look différent pour le site (si plusieurs proposés)":
            $tmp = "选择不同的主题样式";
            break;
        case "Choisir une charte graphique":
            $tmp = "选择一个图形宪章";
            break; //
        case "Choisir une langue":
            $tmp = "选择语言(Select language)";
            break;
        case "Citation":
            $tmp = "引用";
            break;
        case "Classé par ordre de : ":
            $tmp = "排列的顺序依据： : ";
            break;
        case "Classé par":
            $tmp = "排序方法";
            break;
        case "Classement":
            $tmp = "选择网站链接排序方式";
            break;
        case "Classer ce message":
            $tmp = "Classer ce message";
            break;
        case "Clics":
            $tmp = "点击次数";
            break;
        case "Cliquez ici pour entrer":
            $tmp = "点击这里打开聊天窗口";
            break;
        case "Cliquez ici pour lire votre nouveau message.":
            $tmp = "点击这里以浏览您的消息.";
            break;
        case "Cliquez ici pour revenir à l'index des Forums.":
            $tmp = "点击回到主论坛.";
            break;
        case "Cliquez ici pour voir la mise à jour":
            $tmp = "点击以观看更新后的页面";
            break;
        case "Cliquez ici pour voir le nouveau sujet.":
            $tmp = "点击这里看新的主题。";
            break;
        case "Cliquez pour insérer des emoji dans votre message":
            $tmp = "点击表情并加入到您的信息中";
            break;
        case "Cliquez pour voir la liste des articles de ce sujet":
            $tmp = "点击列出本主题的所有文章";
            break;
        case "Co-rédaction":
            $tmp = "Co-writing";
            break;
        case "Cochez et cliquez sur le bouton OK pour recevoir un Email lors d'une nouvelle soumission dans ce forum.":
            $tmp = "Cochez et cliquez sur le bouton OK pour recevoir un Email lors d'une nouvelle soumission dans ce forum.";
            break;
        case "Cochez un forum et cliquez sur le bouton pour recevoir un Email lors d'une nouvelle soumission dans celui-ci.":
            $tmp = "选择一个论坛并点击[预定该服务]按钮，以便于接受邮件通知当有新的信息在这里张贴。";
            break;
        case "Code d'erreur :":
            $tmp = "错误序列号 :";
            break;
        case "Code html autorisé : ":
            $tmp = "允许的HTML： : ";
            break;
        case "Code postal":
            $tmp = "邮政编码";
            break;
        case "Code":
            $tmp = "代碼";
            break;
        case "Coller l'ID de votre vidéo entre les deux balises":
            $tmp = "将视频ID粘贴到标签之间";
            break;
        case "Commentaire à propos d'une critique :":
            $tmp = "对该评论作出简评:";
            break;
        case "Commentaire":
            $tmp = "评论";
            break;
        case "Commentaire":
            $tmp = "评论";
            break;
        case "Commentaire(s) : ":
            $tmp = "评论 : ";
            break;
        case "Commentaire(s)":
            $tmp = "评论";
            break;
        case "Commentaires ?":
            $tmp = "评论 ?";
            break;
        case "Commentaires postés : ":
            $tmp = "发布评语： : ";
            break;
        case "Commentaires":
            $tmp = "评论";
            break;
        case "Compte ou adresse IP désactivée. Cet émetteur a participé plus de x fois dans les dernières heures, merci de contacter le webmaster pour déblocage.":
            $tmp = "此帐号或IP地址被临时封锁，因为在最近的几个小时内它被重复使用多次。如果您有疑问，请联系管理员。";
            break;
        case "Compteur":
            $tmp = "计数器";
            break;
        case "Configurer":
            $tmp = "配置";
            break;
        case "Confirmation du code pour":
            $tmp = "验证代码给";
            break;
        case "Connexion autorisée":
            $tmp = "连接是允许的";
            break;
        case "Connexion non autorisée":
            $tmp = "连接是不允许的";
            break;
        case "Connexion":
            $tmp = "连接";
            break;
        case "Conserver une copie":
            $tmp = "我要保存副本";
            break;
        case "Consulter l'adresse IP":
            $tmp = "查看该IP地址";
            break;
        case "Contributeur(s)":
            $tmp = "Contributeur(s)";
            break; //
        case "Contributeurs":
            $tmp = "Contributeurs";
            break; //
        case "Contribution de":
            $tmp = "提交者";
            break;
        case "Contributions":
            $tmp = "帖子";
            break;
        case "Créer un compte":
            $tmp = "注册";
            break;
        case "Créer":
            $tmp = "创建";
            break;
        case "Critique":
            $tmp = "评论";
            break;
        case "Critique(s) trouvée(s).":
            $tmp = "找到的所有评论.";
            break;
        case "Critiques les plus lues":
            $tmp = "个被阅读最多的评论";
            break;
        case "critiques les plus populaires":
            $tmp = "个最受欢迎评论";
            break;
        case "critiques les plus récentes":
            $tmp = "个最新评论";
            break;
        case "Critiques pour la lettre":
            $tmp = "对信件的评论";
            break;
        case "critiques":
            $tmp = "评论";
            break;
        case "Critiques":
            $tmp = "评论";
            break;
        case "Critiques":
            $tmp = "评论";
            break;
        case "Croissant":
            $tmp = "递增";
            break;
        case "dans la sous-rubrique":
            $tmp = "在次目录中";
            break;
        case "dans":
            $tmp = "在";
            break;
        case "Date :":
            $tmp = "日期 :";
            break;
        case "Date (les liens les plus récents en premier)":
            $tmp = "日期 (先列出新链接)";
            break;
        case "Date (les plus vieux liens en premier)":
            $tmp = "日期 (先列出旧链接)";
            break;
        case "Date de chargement sur le serveur":
            $tmp = "上傳日期";
            break;
        case "Date de création":
            $tmp = "创建日期";
            break;
        case "Date de début":
            $tmp = "起始日期";
            break;
        case "Date de fin de publication":
            $tmp = "该消息结束的日期";
            break;
        case "Date de fin":
            $tmp = "结束日期";
            break;
        case "Date de publication":
            $tmp = "开始公布该消息的日期";
            break;
        case "Date":
            $tmp = "日期";
            break;
        case "de":
            $tmp = " 关";
            break;
        case "de":
            $tmp = "在";
            break;
        case "de":
            $tmp = "来自";
            break;
        case "de":
            $tmp = "来自于";
            break;
        case "Début de l'article":
            $tmp = "盼恼碌钠鹗";
            break;
        case "Décembre":
            $tmp = "十二月";
            break;
        case "Déconnexion":
            $tmp = "注销";
            break;
        case "Décroissant":
            $tmp = "递减";
            break;
        case "demandes en cours pour le même utilistaeur.":
            $tmp = "同一个用户的申请.";
            break;
        case "Déplacer ce sujet":
            $tmp = "移动本帖";
            break;
        case "Déplacer le sujet vers : ":
            $tmp = "将该主题转移到： : ";
            break;
        case "Déplacer le sujet":
            $tmp = "移动本帖";
            break;
        case "Déplier la liste":
            $tmp = "Show list";
            break;
        case "Dernier éditeur":
            $tmp = "Last editor";
            break;
        case "Dernière contribution":
            $tmp = "最后发表";
            break;
        case "Dernières contributions":
            $tmp = "最后发表";
            break;
        case "Dernières stats":
            $tmp = "最后统计数据";
            break;
        case "Derniers articles":
            $tmp = "Last articles";
            break;
        case "Dès maintenant disponible dans la base de données des critiques.":
            $tmp = "在评论的数据库中从此刻开始生效。";
            break;
        case "Désabonnement":
            $tmp = "取消注册服务";
            break;
        case "Désactivé":
            $tmp = "的";
            break;
        case "Désactiver le html pour cet envoi":
            $tmp = "在本贴中禁用HTML";
            break;
        case "Description : ":
            $tmp = "描述 : ";
            break;
        case "Description : (255 caractères max)":
            $tmp = "描述：(最多255 字符)";
            break;
        case "Description:":
            $tmp = "描述:";
            break;
        case "Description":
            $tmp = "程序簡介";
            break;
        case "Désolé, aucune information correspondante pour cet utlilisateur n'a été trouvée":
            $tmp = "对不起，没有找到对应的用户信息。";
            break;
        case "Désolé, votre mot de passe doit faire au moins":
            $tmp = "对不起，你的密码至少应该有";
            break;
        case "Destinataire":
            $tmp = "接受者";
            break;
        case "Détails supplémentaires":
            $tmp = "附加的细节";
            break;
        case "Details":
            $tmp = "详细资料";
            break;
        case "Devenez membre et vous disposerez de fonctions spécifiques : abonnements, forums spéciaux (cachés, membres, ..), statut de lecture, ...":
            $tmp = "注册为会员！您将可以使用许多特别的功能：注册服务，特别论坛（隐藏等），查看张贴和浏览的状况…";
            break;
        case "Devenez membre privilégié en cliquant":
            $tmp = "您可以在此张贴一个主题.";
            break;
        case "Dimanche":
            $tmp = "Dimanche";
            break;
        case "Disposer d'un bloc que vous seul verrez dans le menu (pour spécialistes, nécessite du code html)":
            $tmp = "拥有一个个人站内信箱";
            break;
        case "Document co-rédigé":
            $tmp = "Multi-writers document";
            break;
        case "Ecrire à la liste":
            $tmp = "向列表中写入";
            break;
        case "Ecrire un nouveau message privé":
            $tmp = "寫一個新的私人信息";
            break;
        case "Ecrire une critique pour":
            $tmp = "写评论关于";
            break;
        case "Ecrire une critique":
            $tmp = "写评论";
            break;
        case "écrit":
            $tmp = "撰写";
            break;
        case "Editer votre journal":
            $tmp = "编辑您的报纸";
            break;
        case "Editer votre journal":
            $tmp = "编辑您的日志";
            break;
        case "Editer votre page principale":
            $tmp = "改变首页";
            break;
        case "Editer":
            $tmp = "编辑";
            break;
        case "Editeur":
            $tmp = "出版者";
            break;
        case "Edition de la soumission":
            $tmp = "编辑帖子";
            break;
        case "EDITO":
            $tmp = "管理员评论";
            break;
        case "Editorial par":
            $tmp = "管理员评论发表者";
            break;
        case "Effacer (Efface les liens cassés et les avis pour un lien donné)":
            $tmp = "删除 (删除无效链接和请求)";
            break;
        case "Effacer ce sujet":
            $tmp = "删除本帖";
            break;
        case "Effacer le sujet":
            $tmp = "删除主题";
            break;
        case "Effacer les commentaires.":
            $tmp = "清除评论.";
            break;
        case "Effacer":
            $tmp = "删除";
            break;
        case "Email : ":
            $tmp = "E-mail : ";
            break;
        case "Email du destinataire":
            $tmp = "朋友電郵";
            break;
        case "Email non rempli pour : ":
            $tmp = "没有给该用户的邮件 : ";
            break;
        case "Email non valide (ex.: prenom.nom@hotmail.com)":
            $tmp = "无效Email地址（正确写法：dong@dong.com）";
            break;
        case "Email":
            $tmp = "E-mail";
            break;
        case "Emetteur":
            $tmp = "发表者";
            break;
        case "Emoticons":
            $tmp = "表情符号";
            break;
        case "en attente de validation":
            $tmp = "在等待实现中。";
            break;
        case "en cache":
            $tmp = "隐藏";
            break;
        case "En ce jour...":
            $tmp = "今天...";
            break;
        case "en créer un":
            $tmp = "建立新帐号";
            break;
        case "En savoir plus à propos de":
            $tmp = "更多的有关";
            break;
        case "En tant qu'utilisateur enregistré vous pouvez":
            $tmp = "作为一个注册用户您可以：";
            break;
        case "Enregistrer":
            $tmp = "分数： : ";
            break;
        case "Entrer votre pseudonyme et votre mot de passe.":
            $tmp = "请输入呢称和密码";
            break;
        case "Entrez à nouveau votre mot de Passe":
            $tmp = "重新输入密码";
            break;
        case "Envoi de l'article à un ami":
            $tmp = "发送一篇文章给朋友";
            break;
        case "Envoi une demande aux administrateurs pour rejoindre ce groupe. Un message privé vous informera du résultat de votre demande.":
            $tmp = "向管理员发送加入该群组的请求。 私人消息将告知您请求的结果。";
            break;
        case "Envoyé à":
            $tmp = "至";
            break;
        case "Envoyé par ":
            $tmp = "提交者 ";
            break;
        case "Envoyé":
            $tmp = "已经发送";
            break;
        case "envoyée par courrier.":
            $tmp = "已寄出。";
            break;
        case "Envoyer cet article à un ami":
            $tmp = "发送这篇文章给朋友";
            break;
        case "Envoyer un message interne":
            $tmp = "发送一条Internet信息";
            break;
        case "Envoyer une demande":
            $tmp = "返&#x56DE";
            break;
        case "Envoyer":
            $tmp = "送出";
            break;
        case "Ephémérides":
            $tmp = "历史上的今天";
            break;
        case "Epuration de la new à la fin de sa date de validité":
            $tmp = "在结束日自动删除该消息";
            break;
        case "Erreur : adresse Email déjà utilisée":
            $tmp = "错误: 已经有人用这个Email注册过";
            break;
        case "Erreur : cet identifiant est déjà utilisé":
            $tmp = "错误：这个呢称已经有人使用了。";
            break;
        case "Erreur : cette url est déjà présente dans la base de données":
            $tmp = "错误：这个URL已经在我们的数据库中！ !";
            break;
        case "Erreur : DNS ou serveur de mail incorrect":
            $tmp = "错误：DNS或不正确的邮件服务器";
            break;
        case "Erreur : Email invalide":
            $tmp = "错误：无效的电子邮件";
            break;
        case "Erreur : identifiant invalide":
            $tmp = "错误：您的身份不能被识别";
            break;
        case "Erreur : la catégorie":
            $tmp = "错误：目录";
            break;
        case "Erreur : la sous-catégorie":
            $tmp = "错误：该次目录";
            break;
        case "Erreur : nom existant.":
            $tmp = "错误：这个名字是被保留的，不能被使用。";
            break;
        case "Erreur : une adresse Email ne peut pas contenir d'espaces":
            $tmp = "错误：一个邮件地址不能包含空间";
            break;
        case "Erreur : vous devez saisir un titre pour votre lien":
            $tmp = "错误: 您需要给您的 URL 填写一个名称！";
            break;
        case "Erreur : vous devez saisir une description pour votre lien":
            $tmp = "错误: 您需要给您的 URL 填写一个描述！!";
            break;
        case "Erreur : vous devez saisir une url pour votre lien":
            $tmp = "错误: 您需要给您的 URL 填写一个URL！!";
            break;
        case "Erreur de connexion à la base de données":
            $tmp = "数据库连接有错误";
            break;
        case "Erreur du forum":
            $tmp = "论坛错误";
            break;
        case "Erreur lors de la récupération des messages depuis la base.":
            $tmp = "当从数据库读取数据时出现错误";
            break;
        case "Erreur":
            $tmp = "错误";
            break;
        case "est associé à votre Email.":
            $tmp = "与这封邮件是相连的吗.";
            break;
        case "est connecté":
            $tmp = "已连接 !";
            break;
        case "Etat du topic":
            $tmp = "Etat du topic";
            break; //
        case "Etes vous certain de vouloir effacer cette sous-catégorie ?":
            $tmp = "您肯定要删除该次目录吗 ?";
            break;
        case "Evaluation":
            $tmp = "在所有论坛中查找";
            break;
        case "existe déjà":
            $tmp = "已经存在!";
            break;
        case "Expéditeur":
            $tmp = "寄件人";
            break;
        case "Faites simple":
            $tmp = "描述性的，清楚且简洁 !";
            break;
        case "FAQ - Questions fréquentes":
            $tmp = "常 见 问 题 (FAQ)";
            break;
        case "favori":
            $tmp = "收藏";
            break;
        case "Fermé":
            $tmp = "关闭";
            break;
        case "Fermer ce sujet":
            $tmp = "锁定本帖";
            break;
        case "Fermer le sujet":
            $tmp = "锁定本帖";
            break;
        case "Février":
            $tmp = "二月";
            break;
        case "Fichiers les + récents":
            $tmp = "可下载的文件";
            break;
        case "Fichiers":
            $tmp = "文件";
            break;
        case "File manager du groupe.":
            $tmp = "组文件管理器.";
            break;
        case "Fois":
            $tmp = "times";
            break;
        case "Fonctions":
            $tmp = "功能";
            break;
        case "Forum du groupe.":
            $tmp = "Group forum.";
            break;
        case "forum":
            $tmp = "forum";
            break;
        case "Forum":
            $tmp = "版面管理";
            break;
        case "Forums infos":
            $tmp = "论坛信息";
            break;
        case "Forums":
            $tmp = "版面管理";
            break;
        case "Gérer d'autres options et applications":
            $tmp = "管理其他的选项和应用程序";
            break;
        case "Gérer votre miniSite":
            $tmp = "管理您的小型网站";
            break;
        case "Gestion de vos abonnements":
            $tmp = "管理您的注册用户";
            break;
        case "Gestion des groupes.":
            $tmp = "Groups setting.";
            break;
        case "Gestionnaire fichiers":
            $tmp = "文件管理器";
            break;
        case "Gras":
            $tmp = "Gras";
            break;
        case "Groupe":
            $tmp = "组";
            break;
        case "Groupes":
            $tmp = "组";
            break;
        case "Groupe ouvert":
            $tmp = "公开组";
            break;
        case "Hasard":
            $tmp = "其他网站";
            break;
        case "Haut de page":
            $tmp = "返回页面顶端";
            break;
        case "Heure de la soumission":
            $tmp = "发表时间";
            break;
        case "Heure":
            $tmp = "小时";
            break;
        case "Heure(s)":
            $tmp = "小时";
            break;
        case "Hits : ":
            $tmp = "造访次数: ";
            break;
        case "Hits":
            $tmp = "点击次数";
            break;
        case "Home":
            $tmp = "回到首页";
            break;
        case "ici":
            $tmp = "这里";
            break;
        case "Icone du message":
            $tmp = "消息图标";
            break;
        case "Icone":
            $tmp = "图标";
            break;
        case "ID de la critique":
            $tmp = "评论ID";
            break;
        case "ID utilisateur (pseudo)":
            $tmp = "用户ID";
            break;
        case "Identifiant : ":
            $tmp = "用户名 : ";
            break;
        case "Identifiant ":
            $tmp = "登录 ";
            break;
        case "Identifiant incorrect !":
            $tmp = "登录失败！ !";
            break;
        case "Identifiant utilisateur":
            $tmp = "用户登录";
            break;
        case "identifiant":
            $tmp = "用户名";
            break;
        case "Identifiant":
            $tmp = "用户名";
            break;
        case "Identité":
            $tmp = "身分";
            break;
        case "Ignorer (Efface toutes les demandes pour un lien donné)":
            $tmp = "忽略 (删除所有链接请求)";
            break;
        case "Ignorer":
            $tmp = "忽略";
            break;
        case "Il n'y a aucun sujet pour ce forum. ":
            $tmp = "这个论坛目前没有在讨论的话题. ";
            break;
        case "Il n'y a aucune critique pour La lettre":
            $tmp = "没有对信件的评论";
            break;
        case "Il n'y a pas d'informations disponibles pour":
            $tmp = "没有信息关于";
            break;
        case "Il n'y a pas encore d'article du jour.":
            $tmp = "今天还没有新的文章";
            break;
        case "Il ne peut pas y avoir d'espace dans le surnom.":
            $tmp = "呢称中不能使用空格。";
            break;
        case "Il y a actuellement":
            $tmp = "我们有";
            break;
        case "Il y a actuellement":
            $tmp = "目前有";
            break;
        case "Il y a":
            $tmp = "现在有";
            break;
        case "Illimité":
            $tmp = "无限";
            break;
        case "Image de garde":
            $tmp = "封面图片： : ";
            break;
        case "immédiatement":
            $tmp = "即刻";
            break;
        case "Imp. restantes":
            $tmp = "剩余投放次数";
            break;
        case "Impossible d'interroger la base.":
            $tmp = "访问数据库失败";
            break;
        case "Impossible de déplacer le topic dans le Forum, refaites un essai.":
            $tmp = "不能转移该主题至论坛。请重试。";
            break;
        case "Impossible de déverrouiller le topic, refaites un essai.":
            $tmp = "不能解除对该主题的锁定，请重试。";
            break;
        case "Impossible de verrouiller le topic, refaites un essai.":
            $tmp = "不能锁定该主题，请重试。";
            break;
        case "Impressions":
            $tmp = "投放次数";
            break;
        case "Imprimer":
            $tmp = "打印";
            break;
        case "Inconnu":
            $tmp = "未知";
            break;
        case "Index des rubriques":
            $tmp = "精华区索引";
            break;
        case "Index du forum":
            $tmp = "首页";
            break;
        case "Index":
            $tmp = "链接主页";
            break;
        case "Information sur le fichier":
            $tmp = "文件信息";
            break;
        case "Information":
            $tmp = "資料";
            break;
        case "Informations supplémentaires":
            $tmp = "其它信息";
            break;
        case "Informations sur l'utilisateur :":
            $tmp = "以下是用户信息： :";
            break;
        case "Informations sur le compte":
            $tmp = "帐户信息";
            break;
        case "Inscription":
            $tmp = "注册";
            break;
        case "intéressant et a voulu vous le faire connaître.":
            $tmp = "不错，与您分享.";
            break;
        case "Interface":
            $tmp = "界面";
            break;
        case "Interne":
            $tmp = "内部的";
            break;
        case "Isoloir du vote en cours":
            $tmp = "Current Survey Voting Booth";
            break;
        case "Isoloir":
            $tmp = "投票区";
            break;
        case "Italique":
            $tmp = "斜体";
            break;
        case "Janvier":
            $tmp = "一月";
            break;
        case "Jeudi":
            $tmp = "星期四";
            break;
        case "Jour":
            $tmp = "天";
            break;
        case "Jour(s)":
            $tmp = "日";
            break;
        case "Journal en ligne de ":
            $tmp = "在线读物，为 ";
            break;
        case "Journal":
            $tmp = "Journal";
            break;
        case "jours":
            $tmp = "天";
            break;
        case "Juillet":
            $tmp = "七月";
            break;
        case "Juin":
            $tmp = "六月";
            break;
        case "L'accès à cette application est réservé aux utilisateurs Avancés. Merci de vous enregistrer.":
            $tmp = "本功能只提供给超级注册用户。请您注册。";
            break;
        case "L'article le plus consulté aujourd'hui est :":
            $tmp = "今天最受欢迎文章： :";
            break;
        case "L'article le plus lu à propos de":
            $tmp = "人气最高的文章在";
            break;
        case "L'article":
            $tmp = "文章";
            break;
        case "L'url pour cet article est : ":
            $tmp = "这篇文章的URL是： : ";
            break;
        case "La fonction mise à jour du mot de passe ne peut mettre à jour la base de données. Contactez le WebMaster.":
            $tmp = "邮件密码(Mail_Password)不能更新。请联系网站管理员。";
            break;
        case "La lettre":
            $tmp = "信笺 NewsLetter";
            break;
        case "la page":
            $tmp = "该页";
            break;
        case "La seule règle est de ne pas sortir du sujet.":
            $tmp = "这里唯一的规则是：请不要离题.";
            break;
        case "La structure de chaque ligne de ce fichier : nom_du_membre; adresse Email; commentaires":
            $tmp = "该文件的行格式:   会员名;电子邮件地址; 简评";
            break;
        case "Le compte utilisateur":
            $tmp = "用户帐号";
            break;
        case "Le critique":
            $tmp = "评论者： : ";
            break;
        case "Le forum dans lequel vous tentez de publier n'existe pas, merci de recommencez":
            $tmp = "您尝试张贴信息的论坛不存在。请重试。";
            break;
        case "Le forum ou le topic que vous tentez de publier n'existe pas, refaites un essai.":
            $tmp = " 您所选择的论坛或主题不存在，请重试。";
            break;
        case "Le forum sélectionné n'existe pas.":
            $tmp = "您选择的论坛不存在。请返回并重试。";
            break;
        case "Le message sélectionné n'existe pas dans la base forum.":
            $tmp = "所选的信息在数据库中不存在";
            break;
        case "Le mot de passe doit contenir au moins un caractère en majuscule.":
            $tmp = "密码必须至少包含一个大写字符。";
            break;
        case "Le mot de passe doit contenir au moins un caractère en minuscule.":
            $tmp = "密码必须至少包含一个小写字符。";
            break;
        case "Le mot de passe doit contenir au moins un caractère non alphanumérique.":
            $tmp = "密码必须至少包含一个非字母数字字符。";
            break;
        case "Le mot de passe doit contenir au moins un chiffre.":
            $tmp = "密码必须至少包含一个数字。";
            break;
        case "Le mot de passe doit contenir":
            $tmp = "密码必须包含";
            break;
        case "Le mot de passe vous sera envoyé à l'adresse Email indiquée.":
            $tmp = "Le mot de passe vous sera envoyé à l'adresse Email indiquée.";
            break;
        case "Le moteur de recherche ne trouve pas la base forum.":
            $tmp = "搜索引擎";
            break;
        case "Le nombre de hits doit être un entier positif":
            $tmp = "点击数必须为正整数";
            break;
        case "Le séparateur de groupe est la, (12,55,...)":
            $tmp = "用户组的分隔标志为逗号, 例如 (12, 55, ...)";
            break;
        case "Le sujet a été déplacé.":
            $tmp = "主题已不在当前位置。";
            break;
        case "le":
            $tmp = "开";
            break;
        case "Lectures":
            $tmp = "阅读";
            break;
        case "Les commentaires sont la propriété de leurs auteurs. Nous ne sommes pas responsables de leur contenu.":
            $tmp = "任何评论属于其作者所有。本网站不对其内容负责。";
            break;
        case "Les dernières contributions de":
            $tmp = "最近10篇新闻来自";
            break;
        case "Les dernières nouvelles à propos de":
            $tmp = "最新消息，关于";
            break;
        case "Les derniers articles de":
            $tmp = "Last articles sent by";
            break;
        case "Les derniers commentaires de":
            $tmp = "最近10篇评论来自";
            break;
        case "Les deux mots de passe ne sont pas identiques.":
            $tmp = "这两个密码并不相同。";
            break;
        case "les Liens":
            $tmp = "网站链接";
            break;
        case "Les modifications seront seulement valides pour vous.":
            $tmp = "这些改变只对您在登录后有效。";
            break;
        case "Les mots de passe sont différents. Ils doivent être identiques.":
            $tmp = "这两个密码是不同的。他们必须有所区别。";
            break;
        case "Les nouveaux Liens ajoutés dans cette catégorie cette semaine":
            $tmp = "本分类本周新增加的链接";
            break;
        case "Les nouveaux liens ajoutés dans cette catégorie dans les 3 derniers jours":
            $tmp = "本分类近三天新增加的链接";
            break;
        case "Les nouveaux liens de cette catégorie ajoutés aujourd'hui":
            $tmp = "本分类今天新增加的链接";
            break;
        case "Les nouvelles contributions depuis votre dernière visite.":
            $tmp = "阅读上次访问后的帖子.";
            break;
        case "Les plus téléchargés":
            $tmp = "个被下载最多的文件";
            break;
        case "Les préférences de compte fonctionnent sur la base des cookies.":
            $tmp = "帐户首选项是基于Cookie的。";
            break;
        case "Les spécialistes peuvent utiliser du HTML, mais attention aux erreurs":
            $tmp = "HTML可以使用，请双倍检查URL和HTML标记是否有误！ !";
            break;
        case "Les statistiques pour la bannières ID":
            $tmp = "统计广告条 ID";
            break;
        case "Les utilisateurs anonymes peuvent poster de nouveaux sujets et des réponses dans ce forum.":
            $tmp = "匿名用户可以张贴新的主题或在本论坛回复其他信息";
            break;
        case "Libre":
            $tmp = "自由";
            break;
        case "Lien n° : ":
            $tmp = "链接ID : ";
            break;
        case "Lien relatif":
            $tmp = "相关链接";
            break;
        case "Lien web":
            $tmp = "网页链接";
            break;
        case "Lien":
            $tmp = "链接 : ";
            break;
        case "Lien(s) en attente de validation":
            $tmp = "该链接在等待实现中。";
            break;
        case "Liens cassés rapportés par un ou plusieurs utilisateurs":
            $tmp = "用户报告无效链接";
            break;
        case "Liens présents dans la rubrique des liens web":
            $tmp = "链接资源数";
            break;
        case "Liens relatifs : ":
            $tmp = "相关链接 : ";
            break;
        case "Liens relatifs":
            $tmp = "相关链接";
            break;
        case "Liens Web":
            $tmp = "网站链接";
            break;
        case "Liens":
            $tmp = "链接";
            break;
        case "Limite des référants : pensez à archiver vos référants via l'administration du site.":
            $tmp = "对来访网站的统计限制于以下数量:  请注意保存您的相关统计数据到管理页面.";
            break;
        case "Lire la suite...":
            $tmp = "更多";
            break;
        case "Liste de diffusion":
            $tmp = "邮件列表";
            break;
        case "Liste des membres du groupe.":
            $tmp = "小组成员名单.";
            break;
        case "Liste des membres":
            $tmp = "会员列表";
            break;
        case "Liste non ordonnnée":
            $tmp = "Liste non ordonnnée";
            break;
        case "Liste ordonnnée":
            $tmp = "Liste ordonnnée";
            break;
        case "Liste":
            $tmp = "列表";
            break;
        case "Localisation":
            $tmp = "住所";
            break;
        case "lu : ":
            $tmp = "阅读 : ";
            break;
        case "Lu":
            $tmp = "已經閱讀";
            break;
        case "Lundi":
            $tmp = "Lundi";
            break;
        case "lus":
            $tmp = "阅读次数";
            break;
        case "M'envoyer un Email lorsqu'un message interne arrive":
            $tmp = "通过电子邮件通知我有内部消息的到达";
            break;
        case "M2M bloc":
            $tmp = "M2M 室";
            break;
        case "Ma note : ":
            $tmp = "我的评分： : ";
            break;
        case "Ma page perso : ":
            $tmp = "我的主页： : ";
            break;
        case "Mai":
            $tmp = "五月";
            break;
        case "Mais ne titrez pas -un article-, ou -à lire-,...":
            $tmp = "但是不要命名为”一篇文章”或”读读..”。";
            break;
        case "Manuel en ligne":
            $tmp = "在线手册";
            break;
        case "Mardi":
            $tmp = "星期二";
            break;
        case "Marquer tous les messages comme lus":
            $tmp = "把所有的主题标记为已读";
            break;
        case "Mars":
            $tmp = "三月";
            break;
        case "Masquer ce commentaire":
            $tmp = "隐藏此评论";
            break;
        case "Masquer ce post":
            $tmp = "Masquer ce post";
            break; //
        case "Mèl":
            $tmp = "E-mail";
            break;
        case "Membre invisible":
            $tmp = "隐藏会员";
            break;
        case "membre(s) en ligne.":
            $tmp = "在线会员.";
            break;
        case "membres enregistrés.":
            $tmp = "注册会员";
            break;
        case "Membres":
            $tmp = "Members";
            break;
        case "Menu de":
            $tmp = "菜单";
            break;
        case "Merci d'avoir consacré du temps pour vous enregistrer.":
            $tmp = "谢谢您花费宝贵的时间进行数据输入。";
            break;
        case "Merci d'avoir modifié cette critique":
            $tmp = "感谢编辑本次审查。";
            break;
        case "Merci d'avoir posté cette critique":
            $tmp = "谢谢您的评论";
            break;
        case "Merci d'entrer l'information en fonction des spécifications":
            $tmp = "请依照说明输入信息";
            break;
        case "Merci de contribuer à la maintenance du site.":
            $tmp = "十分感谢您参与维护本目录的完整。";
            break;
        case "Merci de ne pas abuser, le nom d'utilisateur et l'adresse IP sont enregistrés.":
            $tmp = "用户名称与IP已被记录, 请别滥用或破坏系统！.";
            break;
        case "Merci de nous avoir recommandé":
            $tmp = "謝謝您推薦我們!";
            break;
        case "Merci de saisir vos informations":
            $tmp = "请输入您的信息";
            break;
        case "Merci de":
            $tmp = " 请";
            break;
        case "Merci pour cette information. Nous allons l'examiner dès que possible.":
            $tmp = "感谢您的信息。我们将尽快出力您的要求。";
            break;
        case "Merci pour votre contribution.":
            $tmp = "感谢您的提问。我们将会在不久查看它。";
            break;
        case "Merci pour votre contribution":
            $tmp = "感谢您的提问。我们将会在不久查看它。 !";
            break;
        case "Merci":
            $tmp = "谢谢！";
            break;
        case "Mercredi":
            $tmp = "星期三";
            break;
        case "Message à un membre":
            $tmp = "给会员发送的消息";
            break;
        case "Message édité par":
            $tmp = "讯息编辑者";
            break;
        case "Message interne":
            $tmp = "Internal Message";
            break;
        case "Message personnel":
            $tmp = "条个人短消息。";
            break;
        case "Message précédent":
            $tmp = "前一条消息";
            break;
        case "Message suivant":
            $tmp = "下一条消息";
            break;
        case "Message vide interdit, refaites un essai.":
            $tmp = "您必须输入信息以张贴。空的信息无效。请返回并重试。";
            break;
        case "Message":
            $tmp = "留言";
            break;
        case "message(s) personnel(s).":
            $tmp = "条个人短消息。";
            break;
        case "Messages personnels":
            $tmp = "私人消息";
            break;
        case "Mettre ce sujet en premier":
            $tmp = "将该主题排列在先";
            break;
        case "MiniSite":
            $tmp = "小型网站";
            break;
        case "Minute(s)":
            $tmp = "分钟";
            break;
        case "Mise à jour de la base impossible, refaites un essai.":
            $tmp = "写入数据到数据库失败。请返回并重试。";
            break;
        case "Mise à jour du compteur des envois impossible.":
            $tmp = "发布帖子的统计更新失败。";
            break;
        case "Mise à jour":
            $tmp = "更新";
            break;
        case "Modérateur":
            $tmp = "长老";
            break;
        case "Modérateur(s)":
            $tmp = "长老";
            break;
        case "Modéré par : ":
            $tmp = "版主 : ";
            break;
        case "Modification d'une critique":
            $tmp = "修改一个评论";
            break;
        case "modification":
            $tmp = "修改";
            break;
        case "modifié":
            $tmp = "修改";
            break;
        case "Modifier l'édito":
            $tmp = "修改编辑";
            break;
        case "Modifier la catégorie":
            $tmp = "编辑分类";
            break;
        case "Modifier les liens":
            $tmp = "修改链接";
            break;
        case "Modifier":
            $tmp = "修改";
            break;
        case "mois":
            $tmp = "月";
            break;
        case "mois":
            $tmp = "月";
            break;
        case "Mois":
            $tmp = "月";
            break;
        case "Mon E-Mail : ":
            $tmp = "我的 Email： : ";
            break;
        case "Monnaie":
            $tmp = "货币";
            break;
        case "Montrer :":
            $tmp = "显示 :";
            break;
        case "Mot de passe : ":
            $tmp = "密码 : ";
            break;
        case "Mot de passe erroné, refaites un essai.":
            $tmp = "密码不正确，请返回并重新输入";
            break;
        case "Mot de passe mis à jour. Merci de vous re-connecter":
            $tmp = "Password update, please re-connect you.";
            break; //
        case "Mot de passe pour":
            $tmp = "密码给";
            break;
        case "Mot de passe utilisateur pour":
            $tmp = "用户密码关于";
            break;
        case "Mot de passe":
            $tmp = "密码";
            break;
        case "Mot-clé":
            $tmp = "关键词";
            break;
        case "Moteurs de recherche":
            $tmp = "查找所有主题";
            break;
        case "mots dans ce texte )":
            $tmp = " 文本字数 )";
            break;
        case "n'est pas connecté":
            $tmp = "没有连接 !";
            break;
        case "Navigateurs web":
            $tmp = "浏览器访问次数统计";
            break;
        case "Nb abonnés à lettre infos":
            $tmp = "Newsletter潜在用户的统计数";
            break;
        case "Nb hits : ":
            $tmp = "点击次数 : ";
            break;
        case "Nb. d'articles":
            $tmp = "文章数量";
            break;
        case "Nb. de critiques":
            $tmp = "评论数量";
            break;
        case "Nb. de forums":
            $tmp = "论坛数量";
            break;
        case "Nb. de membres":
            $tmp = "会员数";
            break;
        case "Nb. de sujets":
            $tmp = "主题数量";
            break;
        case "Nb. pages vues":
            $tmp = "访问数";
            break;
        case "ne peuvent pas être envoyées.":
            $tmp = "不能发送，因为.";
            break;
        case "Nom : ":
            $tmp = "姓名 : ";
            break;
        case "Nom :":
            $tmp = "名字 :";
            break;
        case "Nom d'auteur":
            $tmp = "作者名字";
            break;
        case "Nom de fichier de l'image":
            $tmp = "图片文件名";
            break;
        case "Nom de l'image principale non obligatoire, la mettre dans images/reviews/":
            $tmp = "封面图片名称，位于 images/reviews/。可选项。";
            break;
        case "Nom de la catégorie : ":
            $tmp = "分类名称 : ";
            break;
        case "Nom de la sous-catégorie : ":
            $tmp = "次目录的名称 :";
            break;
        case "Nom du destinataire":
            $tmp = "朋友姓名";
            break;
        case "Nom du produit critiqué.":
            $tmp = "被评论作品的名称。";
            break;
        case "Nom du programme":
            $tmp = "軟件名稱";
            break;
        case "Nom ou raison sociale":
            $tmp = "姓名或公司名称";
            break;
        case "Nom":
            $tmp = "名称";
            break;
        case "Nombre d'articles sur la page principale":
            $tmp = "主页上的文章数目";
            break;
        case "Nombre d'utilisateurs par thème":
            $tmp = "按不同主题的使用者的数目";
            break;
        case "Nombre de jours maximum pour une offre":
            $tmp = "该销售资源的信息的有效天数";
            break;
        case "Nombre total de votes: ":
            $tmp = "合计投票: ";
            break;
        case "Non lu":
            $tmp = "未读";
            break;
        case "Non":
            $tmp = "否";
            break;
        case "Nos références ont été envoyées à ":
            $tmp = "本站的推薦函已經寄送給";
            break;
        case "Nos visiteurs ont visualisé":
            $tmp = "我们的访问者已经浏览过";
            break;
        case "Note :":
            $tmp = "注意：";
            break;
        case "Note de ce produit : ":
            $tmp = "这个选项将改变整个站点的外观。";
            break;
        case "Note non valide... Elle doit se situer entre 1 et 10":
            $tmp = "无效评分。评分必须在 1与10之间";
            break;
        case "Note":
            $tmp = "分数：";
            break;
        case "Note":
            $tmp = "注意：";
            break;
        case "Notes":
            $tmp = "通知";
            break;
        case "Nous allons vérifier votre contribution. Elle devrait bientôt être disponible !":
            $tmp = "编辑者将看到您的提交内容。她将很快就生效！";
            break;
        case "Nous avons approuvé votre contribution à notre moteur de recherche.":
            $tmp = "我们已经将您提交的链接加入我们的搜索引擎.";
            break;
        case "Nous avons bien reçu votre demande de lien, merci":
            $tmp = "我们已经收到您提交的链接。谢谢！ !";
            break;
        case "Nous ne vendons ni ne communiquons vos informations personnelles à autrui.":
            $tmp = "我们不会把您的个人信息销售或提供给其他人。";
            break;
        case "Nouveau commentaire":
            $tmp = "新评论";
            break;
        case "Nouveau dossier/sujet":
            $tmp = "新文件夾/主題";
            break;
        case "Nouveau lien ajouté dans la base de données":
            $tmp = "新链接已添加到数据库";
            break;
        case "Nouveau membre":
            $tmp = "新用户";
            break;
        case "Nouveau sujet":
            $tmp = "新話題";
            break;
        case "Nouveau":
            $tmp = "最新网站";
            break;
        case "Nouveautés":
            $tmp = "新链接";
            break;
        case "Nouveaux liens":
            $tmp = "新链接";
            break;
        case "Nouvel utilisateur : ":
            $tmp = "新用户 : ";
            break;
        case "Novembre":
            $tmp = "Novembre";
            break;
        case "O=Non - 1=Oui":
            $tmp = "O=否 - 1=是";
            break;
        case "Objet":
            $tmp = "产品名称";
            break;
        case "Obligatoire seulement si vous soumettez un lien relatif":
            $tmp = "如果您有相关链接请填写，否则不必填写。";
            break;
        case "Octobre":
            $tmp = "十月";
            break;
        case "Offre":
            $tmp = "商品资源";
            break;
        case "Offres par page":
            $tmp = "每页展示的商品信息数量";
            break;
        case "Ok":
            $tmp = "Ok";
            break;
        case "ont été envoyées.":
            $tmp = "已经发送给.";
            break;
        case "Option : ":
            $tmp = "选项 : ";
            break;
        case "Options":
            $tmp = "选项";
            break;
        case "Ordre croissant":
            $tmp = "递增排序";
            break;
        case "Ordre décroissant":
            $tmp = "递减排序";
            break;
        case "Original":
            $tmp = "原始的";
            break;
        case "ou poster des commentaires signés...":
            $tmp = "或者张贴有您签名的评论...";
            break;
        case "ou":
            $tmp = "或";
            break;
        case "Oui":
            $tmp = "是";
            break;
        case "Outils administrateur":
            $tmp = "管理工具";
            break;
        case "Ouvrir ce sujet":
            $tmp = "解锁本帖";
            break;
        case "Ouvrir le sujet":
            $tmp = "解锁本帖";
            break;
        case "Ouvrir un salon de chat pour le groupe.":
            $tmp = "Open a chat for the groupe.";
            break;
        case "P. annonces":
            $tmp = "Waiting Classifieds";
            break; //
        case "Page d'accueil":
            $tmp = "軟件網址";
            break;
        case "Page précédente":
            $tmp = "前一页";
            break;
        case "Page spéciale pour impression":
            $tmp = "显示可打印版本";
            break;
        case "Page suivante":
            $tmp = "后一页";
            break;
        case "Page":
            $tmp = "Page";
            break;
        case "pages depuis le":
            $tmp = "页面自从";
            break;
        case "Pages vues depuis":
            $tmp = "页面访问量自从";
            break;
        case "pages":
            $tmp = "页";
            break;
        case "par défaut":
            $tmp = "默认";
            break;
        case "par":
            $tmp = "由";
            break;
        case "pas affiché dans l'annuaire, message à un membre, ...":
            $tmp = "not showed in memberlist, members' message bloc ...";
            break;
        case "Pas de connexion à la base forums.":
            $tmp = "不能连接到论坛的数据库";
            break;
        case "Pas de connexion à la base topics.":
            $tmp = "不能连接到主题的数据库";
            break;
        case "Pas de groupe ouvert.":
            $tmp = "没有开放组";
            break;
        case "Pas de problème. Saisissez votre identifiant et le nouveau mot de passe que vous souhaitez utiliser puis cliquez sur envoyer pour recevoir un Email de confirmation.":
            $tmp = "没问题。 只需输入您的昵称，您想要的新密码，然后点击发送按钮即可接收带有确认码的电子邮件。";
            break;
        case "Passer / Gérer une annonce":
            $tmp = "提交/管理一个留言";
            break;
        case "Pays":
            $tmp = "国家";
            break;
        case "Période":
            $tmp = "时期";
            break;
        case "Personnaliser les commentaires":
            $tmp = "定制您的评论";
            break;
        case "personne connectée.":
            $tmp = "人正在聊天室";
            break;
        case "personnes connectées.":
            $tmp = "人正在聊天室";
            break;
        case "Plan du site":
            $tmp = "网站地图";
            break;
        case "Plus d'émoticons":
            $tmp = "更多的表情";
            break;
        case "Plus de forum":
            $tmp = "没有其他论坛";
            break;
        case "Plus de":
            $tmp = "更加";
            break;
        case "Populaire":
            $tmp = "热门网站";
            break;
        case "Post affiché":
            $tmp = "显示的张贴（位置）";
            break;
        case "Post caché":
            $tmp = "隐藏的张贴（位置）";
            break;
        case "Posté : ":
            $tmp = "发表于 : ";
            break;
        case "Posté le ":
            $tmp = "粘贴 ";
            break;
        case "Posté par ":
            $tmp = "发表者 ";
            break;
        case "Posté par":
            $tmp = "发表者";
            break;
        case "Posté":
            $tmp = "发表于";
            break;
        case "Poster des commentaires signés":
            $tmp = "用您的注册名字发表评论";
            break;
        case "Poster un nouveau sujet dans :":
            $tmp = "张贴一个新的主题在";
            break;
        case "Poster une réponse dans le sujet":
            $tmp = "贴给该主题的回复";
            break;
        case "Pour des raisons de sécurité, votre nom d'utilisateur et votre adresse IP vont être momentanément conservés.":
            $tmp = "出于网络安全的原因，您的拥护名和IP地址将临时保存。";
            break;
        case "pour enregistrer un compte sur":
            $tmp = "注册一个帐号在";
            break;
        case "pour le groupe":
            $tmp = "for group";
            break;
        case "Pour les 30 derniers jours":
            $tmp = "過往 30 日";
            break;
        case "Pour supprimer votre abonnement à notre lettre, merci d'utiliser":
            $tmp = "如果要取消您预定的邮件通知，请使用以下功能";
            break;
        case "Pour utiliser cette application, vous devez être":
            $tmp = "要使用该功能，您必须是";
            break;
        case "Pour valider votre nouveau mot de passe, merci de le re-saisir.":
            $tmp = "To valid your new password request, just re-type it.";
            break; //
        case "Pourcentage":
            $tmp = "总计百分比";
            break;
        case "Précédent":
            $tmp = "上一个";
            break;
        case "Préférés":
            $tmp = "最受欢迎网站";
            break;
        case "Prévenir par Email quand de nouvelles réponses sont postées":
            $tmp = "当有回复时将通过email得到通知";
            break;
        case "Prévisualiser les modifications":
            $tmp = "对修改进行预览";
            break;
        case "Prévisualiser":
            $tmp = "预览";
            break;
        case "Principal":
            $tmp = "主分类";
            break;
        case "Privé":
            $tmp = "非公开";
            break;
        case "Prix":
            $tmp = "价格";
            break;
        case "Profil":
            $tmp = "个人资料";
            break;
        case "Proposé":
            $tmp = "建议修改为";
            break;
        case "Proposer des articles en votre nom":
            $tmp = "用您的注册名字发送新闻";
            break;
        case "Proposer un article":
            $tmp = "提交文章设置";
            break;
        case "Proposer un seul lien.":
            $tmp = "一个链接地址只能提交一次。";
            break;
        case "Proposition de modification":
            $tmp = "请求网站链接修改";
            break;
        case "Proposition de modifications de liens":
            $tmp = "链接修改请求";
            break;
        case "Propriétaire":
            $tmp = "所有者";
            break;
        case "Question":
            $tmp = "问题";
            break;
        case "Qui est en ligne ?":
            $tmp = "谁在线？ ?";
            break;
        case "Rapport généré le":
            $tmp = "总结报告";
            break;
        case "Rapporter un lien rompu":
            $tmp = "报告无效链接";
            break;
        case "Raz de la liste":
            $tmp = "重置会员列表";
            break;
        case "Réalisé":
            $tmp = "完成";
            break;
        case "Réalisées":
            $tmp = "完成";
            break;
        case "Recevez par mail les nouveautés du site.":
            $tmp = "通过email接受本站的最新消息.";
            break;
        case "Recherche avancée":
            $tmp = "高级搜索";
            break;
        case "Recherche":
            $tmp = "搜索";
            break;
        case "Rechercher dans la base des utilisateurs":
            $tmp = "没有找到匹配的用户";
            break;
        case "Rechercher dans les critiques":
            $tmp = "在目录中查找";
            break;
        case "Rechercher dans les rubriques":
            $tmp = "Search in Special Sections";
            break;
        case "Rechercher dans tous les forums":
            $tmp = "搜索引擎没有找到对应数据库";
            break;
        case "Rechercher dans":
            $tmp = "在此间搜索";
            break;
        case "Recommander ce site à un ami":
            $tmp = "推薦本站給朋友";
            break;
        case "Reçus":
            $tmp = "收到";
            break;
        case "Rejoindre ce groupe":
            $tmp = "加入这个群组";
            break;
        case "Replier la liste":
            $tmp = "Hide list";
            break;
        case "Répondre":
            $tmp = "回复";
            break;
        case "Réponse postée.":
            $tmp = "贴的回复";
            break;
        case "Réponse":
            $tmp = "解答";
            break;
        case "réponses précédentes":
            $tmp = "前一个答复";
            break;
        case "réponses suivantes":
            $tmp = "下一个答复";
            break;
        case "Réponses":
            $tmp = "回复";
            break;
        case "Requête de modification d'un lien utilisateur":
            $tmp = "用户链接修改请求";
            break;
        case "Réseaux sociaux":
            $tmp = "社交网络";
            break;
        case "Réservées":
            $tmp = "已付费";
            break;
        case "Résolu":
            $tmp = "解决";
            break;
        case "Restantes":
            $tmp = "余下的";
            break;
        case "Résultats":
            $tmp = "结果";
            break;
        case "Retour à l'administration":
            $tmp = "返回到管理";
            break;
        case "Retour à l'index des critiques":
            $tmp = "返回评论的主列表";
            break;
        case "Retour à l'index des rubriques":
            $tmp = "返回到精华区索引";
            break;
        case "Retour à l'index FAQ":
            $tmp = "回到FAQ的主页";
            break;
        case "Retour à la sous-rubrique :":
            $tmp = "返回到次目录";
            break;
        case "Retour en arrière":
            $tmp = "后退";
            break;
        case "Retour vers":
            $tmp = "返回到";
            break;
        case "retour":
            $tmp = "返回";
            break;
        case "Revenir à":
            $tmp = "回到";
            break;
        case "Revenir aux avatars standards":
            $tmp = "恢复标准头像 ";
            break;
        case "Revue de l'éditeur":
            $tmp = "出版者的对该文章的评论 ";
            break;
        case "Rien":
            $tmp = "没有帖子";
            break;
        case "Robots - Spiders":
            $tmp = "Robots";
            break;
        case "Rubriques spéciales":
            $tmp = "精华区";
            break;
        case "Rubriques":
            $tmp = "精华区";
            break;
        case "S'inscrire à la liste de diffusion du site":
            $tmp = "在网站的邮件列表中注册";
            break;
        case "Salle":
            $tmp = "房间";
            break;
        case "Samedi":
            $tmp = "星期六";
            break;
        case "Sans titre":
            $tmp = "无标题";
            break;
        case "Sans":
            $tmp = "无";
            break;
        case "Sauter à : ":
            $tmp = "转跳到 : ";
            break;
        case "Sauter à :":
            $tmp = "转跳到 :";
            break;
        case "Sauver les modifications":
            $tmp = "保存您的日志";
            break;
        case "Sauvez votre journal":
            $tmp = "保存";
            break;
        case "Se connecter":
            $tmp = "连接";
            break;
        case "Seconde(s)":
            $tmp = "第二";
            break;
        case "Sélectionner la page":
            $tmp = "选择页";
            break;
        case "Sélectionner le nombre de news que vous souhaitez voir apparaître sur la page principale.":
            $tmp = "选择您所希望在主页上看到的消息的条数";
            break;
        case "Sélectionner un sujet":
            $tmp = "选择主题";
            break;
        case "Sélectionner une catégorie":
            $tmp = "选择文件夹类别";
            break;
        case "Sélectionnez un forum et participez !":
            $tmp = "选择并参与一个论坛";
            break;
        case "Sélectionnez un thème d'affichage":
            $tmp = "选择一个主题样式";
            break;
        case "semaine":
            $tmp = "周";
            break;
        case "semaines":
            $tmp = "周";
            break;
        case "Septembre":
            $tmp = "九月";
            break;
        case "Seulement":
            $tmp = "只";
            break;
        case "Seuls les modérateurs peuvent poster de nouveaux sujets et répondre dans ce forum.":
            $tmp = "只有版主才能在本论坛中张贴新主题并回复";
            break;
        case "Si vous étiez enregistré, vous pourriez proposer des liens.":
            $tmp = "如果您是注册用户您可以在本站提交链接。";
            break;
        case "Si vous n'avez rien demandé, ne vous inquiétez pas :  vous êtes le seul à lire ce message. Connectez-vous simplement avec ce nouveau mot de passe.":
            $tmp = "如果您并没有要求发送密码，别担心，您不会收到第二条类似信息。如果您的确忘记密码请使用我们发送的这个新密码登录。";
            break;
        case "Si vous n'avez rien demandé, ne vous inquiétez pas. Effacez juste ce Email. ":
            $tmp = "如果您没有要求它，别担心，只要删除这封Email就行了。 ";
            break;
        case "Si vous souhaitez personnaliser un peu le site, c'est l'endroit indiqué. ":
            $tmp = "本项为栏目";
            break;
        case "Signature : ":
            $tmp = "签名 : ";
            break;
        case "Signature":
            $tmp = "签名";
            break;
        case "Site à découvrir : ":
            $tmp = "推荐网站 : ";
            break;
        case "Site web : ":
            $tmp = "网站 : ";
            break;
        case "Site web officiel. Veillez à ce que votre url commence bien par":
            $tmp = "产品官方站点。您填写的URL开头应有 \"http://\"";
            break;
        case "Sites classés par":
            $tmp = "站点现在排序依照";
            break;
        case "Situation géographique":
            $tmp = "您的住址";
            break;
        case "Sondage":
            $tmp = "调查";
            break;
        case "sondages avec le meilleur taux de participation":
            $tmp = "个投票最多的票选项";
            break;
        case "Souligné":
            $tmp = "Souligné";
            break;
        case "Soumettre une offre":
            $tmp = "提交一个销售资源信息";
            break;
        case "Soumission de liens brisés":
            $tmp = "无效链接报告";
            break;
        case "Soumission en cours. Une fois vos fichiers chargés, cliquer sur le bouton OK pour finir.":
            $tmp = "提交中。等文件上传后，请点击ok以结束操作。";
            break;
        case "Sous-catégorie :":
            $tmp = "次目录 :";
            break;
        case "Sous-catégorie":
            $tmp = "次目录";
            break;
        case "Sous-catégories par ligne (page principale)":
            $tmp = "每行的次目录（主要页面）";
            break;
        case "Sous-catégories":
            $tmp = "子分类";
            break;
        case "Sous-rubrique":
            $tmp = "Sous-rubrique";
            break;
        case "Statistiques des chargements":
            $tmp = "下载的统计数据";
            break;
        case "Statistiques diverses":
            $tmp = "多样的统计数据";
            break;
        case "Statistiques générales":
            $tmp = "数据统计";
            break;
        case "Statistiques":
            $tmp = "行统计";
            break;
        case "Status":
            $tmp = "";
            break;
        case "stb=Demande en attente de validation":
            $tmp = "stb= 请稍等，您的申请在系统处理中";
            break;
        case "Suivant":
            $tmp = "下一个";
            break;
        case "Sujet : ":
            $tmp = "主题 : ";
            break;
        case "Sujet":
            $tmp = "主题";
            break;
        case "Sujet":
            $tmp = "主题";
            break;
        case "Sujets actifs : ":
            $tmp = "活跃的主题： : ";
            break;
        case "Sujets actifs":
            $tmp = "当前活跃的主题";
            break;
        case "Sujets":
            $tmp = "主题";
            break;
        case "Suppression du message impossible.":
            $tmp = "不能删除信息";
            break;
        case "Suppression du message sélectionné impossible.":
            $tmp = "不能删除所选的信息。";
            break;
        case "Supprimer ce message":
            $tmp = "删除此信息";
            break;
        case "Systèmes d'exploitation":
            $tmp = "浏览器";
            break;
        case "Tableau de bord":
            $tmp = "管理参数表";
            break;
        case "Tableau":
            $tmp = "Tableau";
            break;
        case "Taille du fichier":
            $tmp = "檔案大小";
            break;
        case "Taille":
            $tmp = "大小";
            break;
        case "Téléchargements":
            $tmp = "下載次數";
            break;
        case "Télécharger un avatar personnel":
            $tmp = "上传个人头象";
            break;
        case "Terminer":
            $tmp = "完成";
            break;
        case "Texte : ":
            $tmp = "文本 : ";
            break;
        case "Texte aligné à droite":
            $tmp = "文本对齐，右";
            break;
        case "Texte aligné à gauche":
            $tmp = "文字左对齐";
            break;
        case "Texte centré":
            $tmp = "居中的文字";
            break;
        case "Texte complet":
            $tmp = "完整文章";
            break;
        case "Texte d'introduction":
            $tmp = "介绍文章";
            break;
        case "Texte de critique non valide... Il ne peut pas être vide":
            $tmp = "评论文本不能为空";
            break;
        case "Texte étendu":
            $tmp = "文章主体";
            break;
        case "Texte justifié":
            $tmp = "Texte justifié";
            break; //
        case "Texte":
            $tmp = "Texte";
            break;
        case "Thème":
            $tmp = "Thème";
            break;
        case "Thème(s)":
            $tmp = "";
            break;
        case "Titre : ":
            $tmp = "主题 : ";
            break;
        case "Titre :":
            $tmp = "标题 :";
            break;
        case "Titre (de A à Z)":
            $tmp = "标题 (A to Z)";
            break;
        case "Titre (de Z à A)":
            $tmp = "标题 (Z to A)";
            break;
        case "Titre de la page : ":
            $tmp = "网页名称 : ";
            break;
        case "Titre du lien":
            $tmp = "链接名称： : ";
            break;
        case "Titre du lien":
            $tmp = "链接名称：";
            break;
        case "Titre non valide... Il ne peut pas être vide":
            $tmp = "名称不能为空";
            break;
        case "Titre":
            $tmp = "标题";
            break;
        case "Top":
            $tmp = "页面顶部";
            break;
        case "Total : ":
            $tmp = "总计： : ";
            break;
        case "Total des nouveaux liens pour la semaine dernière":
            $tmp = "最近加入的新網站：過往一星期";
            break;
        case "Total des nouveaux liens":
            $tmp = "合计最近新链接";
            break;
        case "total votes":
            $tmp = "合计投票";
            break;
        case "Total":
            $tmp = "总计：";
            break;
        case "Tous les auteurs":
            $tmp = "所有作者";
            break;
        case "Tous les liens proposés sont vérifiés avant insertion.":
            $tmp = "所有张贴出的链接是经过确认的。";
            break;
        case "Tous les sujets":
            $tmp = "所有主题";
            break;
        case "Tous les utilisateurs enregistrés peuvent poster de nouveaux sujets et répondre dans ce forum.":
            $tmp = "所有注册用户可以张贴新的主题并回复其他信息";
            break;
        case "Tous les utilisateurs enregistrés peuvent poster des messages privés.":
            $tmp = "所有注册用户可以发送私人消息.";
            break;
        case "Tous":
            $tmp = "所有";
            break;
        case "Tout développer":
            $tmp = "开发所有";
            break;
        case "Tout regrouper":
            $tmp = " 重组所有";
            break;
        case "trié par ordre":
            $tmp = "选择显示的顺序";
            break;
        case "Type":
            $tmp = "类型";
            break;
        case "Un problème est survenu":
            $tmp = "出现问题";
            break;
        case "Un seul vote par jour, merci":
            $tmp = "我们只允许每天投票一次 !";
            break;
        case "Un seul vote par sondage.":
            $tmp = "每个调查只有一次投票机会";
            break;
        case "Un utilisateur web ayant l'adresse IP ":
            $tmp = "某用户，其地址IP为 ";
            break;
        case "Une erreur est survenue lors de l'interrogation de la base.":
            $tmp = "访问数据库时出现错误";
            break;
        case "Une fois enregistré":
            $tmp = "一旦注册";
            break;
        case "Url : ":
            $tmp = "URL : ";
            break;
        case "Url de la page : ":
            $tmp = "网页URL : ";
            break;
        case "Url":
            $tmp = "URL地址";
            break;
        case "Url":
            $tmp = "URL地址";
            break;
        case "Utilisateur avancé":
            $tmp = "超级用户";
            break;
        case "Utilisateur enregistré":
            $tmp = "注册用户";
            break;
        case "Utilisateur ou message inexistant dans la base.":
            $tmp = "数据库中没有此用户或此信息";
            break;
        case "Utilisateur":
            $tmp = "用户";
            break;
        case "Utilisateurs enregistrés : ":
            $tmp = "注册用户 : ";
            break;
        case "Utilisateurs enregistrés":
            $tmp = "注册用户";
            break;
        case "Utilisateurs montrés":
            $tmp = "显示的用户";
            break;
        case "Utilisateurs trouvés pour":
            $tmp = "找到的用户关于";
            break;
        case "Utilisateurs trouvés":
            $tmp = "找到的用户";
            break;
        case "Utilisateurs":
            $tmp = "用户";
            break;
        case "Utilisation : ":
            $tmp = "用法 : ";
            break;
        case "Utilisation":
            $tmp = "用法";
            break;
        case "Utilisé":
            $tmp = "使用过";
            break;
        case "Valider":
            $tmp = "确定";
            break;
        case "Validez cette option et le texte suivant apparaîtra sur votre page d'accueil":
            $tmp = "Validez cette option et le texte suivant apparaîtra sur votre page d'accueil";
            break;
        case "Vendredi":
            $tmp = "Vendredi";
            break;
        case "Véritable adresse Email":
            $tmp = "您的真实电子邮件地址";
            break;
        case "Version":
            $tmp = "版本";
            break;
        case "Vidéo Youtube":
            $tmp = "视频 Youtube";
            break;
        case "Vidéos":
            $tmp = "视频";
            break;
        case "Vider la table chatBox":
            $tmp = "清空聊天室";
            break;
        case "vient de demander une confirmation pour changer de mot de passe.":
            $tmp = "刚才请求了验证代码已修改密码。";
            break;
        case "Ville":
            $tmp = "城市";
            break;
        case "Visite":
            $tmp = "访问";
            break;
        case "Visiter ce site web":
            $tmp = "访问这个网站";
            break;
        case "Visiteur":
            $tmp = "Guest";
            break;
        case "visiteur(s) et":
            $tmp = "位游客 和";
            break;
        case "Visitez le minisite":
            $tmp = "Visit the Mini Web Site !";
            break;
        case "Voici les articles publiés dans cette rubrique.":
            $tmp = "如下是发布在此区的文章。";
            break;
        case "Vos centres d'intérêt":
            $tmp = "您的兴趣";
            break;
        case "Vos informations personnelles (Nom, Tél., ...)":
            $tmp = "您的个人信息";
            break;
        case "vote":
            $tmp = "票";
            break;
        case "Voter":
            $tmp = "票数";
            break;
        case "Votes : ":
            $tmp = "票数 : ";
            break;
        case "votes":
            $tmp = "票数 :";
            break;
        case "Votes":
            $tmp = "票数";
            break;
        case "Votre activité":
            $tmp = "您的职业";
            break;
        case "Votre adresse Email":
            $tmp = "你的電郵";
            break;
        case "Votre adresse Ip est enregistrée":
            $tmp = "您的IP地址已被登记";
            break;
        case "Votre adresse mèl 'truquée'":
            $tmp = "公开Email";
            break;
        case "Votre adresse mèl est obligatoire":
            $tmp = "您的Email必须填写。";
            break;
        case "Votre ami":
            $tmp = "您的朋友";
            break;
        case "Votre Avatar":
            $tmp = "化身";
            break;
        case "Votre commentaire : ":
            $tmp = "您的评论 : ";
            break;
        case "Votre compte":
            $tmp = "您的帐号";
            break;
        case "Votre contribution n'a pas été supprimée car au moins un post est encore rattaché (forum arbre).":
            $tmp = "您的发言没有被删除，因为有其他的发言与此有关联.";
            break;
        case "Votre Email":
            $tmp = "您的电子邮件地址";
            break;
        case "Votre fiche d'inscription":
            $tmp = "您的注册表";
            break;
        case "Votre lien":
            $tmp = "您的链接在";
            break;
        case "Votre message a été posté":
            $tmp = "您的消息已经发出";
            break;
        case "Votre mot de passe est : ":
            $tmp = "您的密码是： : ";
            break;
        case "Votre mot de passe est erroné ou vous n'avez pas l'autorisation d'éditer ce message, refaites un essai.":
            $tmp = "密码无效或您无权修改此信息。请返回并重试。";
            break;
        case "Votre nom complet. C'est indispensable.":
            $tmp = "您的全名。必填项。";
            break;
        case "Votre nom est trop long ou vide. Il doit faire moins de 50 caractères.":
            $tmp = "名字太长或未输入。名字必须少于50个字符的长度。";
            break;
        case "Votre nom":
            $tmp = "您的名字";
            break;
        case "Votre offre":
            $tmp = "您提供的商品资源";
            break;
        case "Votre page Web":
            $tmp = " 您的主页";
            break;
        case "Votre requête":
            $tmp = "你的要求";
            break;
        case "Votre situation géographique":
            $tmp = "您的住址";
            break;
        case "Votre surnom est trop long. Il doit faire moins de 25 caractères.":
            $tmp = "呢称应少于25个英文字母的长度。";
            break;
        case "Votre url de confirmation est :":
            $tmp = "Votre url de confirmation est :";
            break;
        case "Votre url de confirmation est expirée":
            $tmp = "您的确认网址已过期";
            break;
        case "Votre véritable identité":
            $tmp = "真实姓名";
            break;
        case "Vous allez envoyer cet article":
            $tmp = "您将发送该文章";
            break;
        case "vous aurez certains avantages, comme pouvoir modifier l'aspect du site,":
            $tmp = "您将有某些特权，比如可以修改网站的外观,";
            break;
        case "Vous avez changé l'url de la bannière":
            $tmp = "您改变了URL";
            break;
        case "Vous avez déjà voté aujourd'hui":
            $tmp = "您今天已经对该调查投票了 !";
            break;
        case "Vous avez perdu votre mot de passe ?":
            $tmp = "忘记您的密码了？ ?";
            break;
        case "Vous avez un nouveau message.":
            $tmp = "您收到一条新消息";
            break;
        case "Vous avez":
            $tmp = "您有";
            break;
        case "Vous devez accepter la charte d'utilisation du site":
            $tmp = " 您必须接受本站的用户使用条款";
            break;
        case "Vous devez choisir un icône pour votre message, refaites un essai.":
            $tmp = "您必须选择信息的表示以张贴。请返回并重试。";
            break;
        case "Vous devez choisir un titre et un message pour poster votre sujet.":
            $tmp = "您必须选择一个标题和一个信息以张贴您的主题.";
            break;
        case "Vous devez entrer un titre de lien et une adresse relative, ou laisser les deux zones vides":
            $tmp = "您必须同时填写链接名称及相关URL，否则都空着";
            break;
        case "Vous devez entrer votre nom et votre adresse Email":
            $tmp = "您必须填写您的名字和您的Email";
            break;
        case "Vous devez obligatoirement saisir un sujet, refaites un essai.":
            $tmp = "您必须输入一个主题才能张贴。空主题无效。请返回并重试。";
            break;
        case "Vous devez prévisualiser avant de pouvoir envoyer":
            $tmp = "在提交前您必须预览该文章。";
            break;
        case "Vous devez taper un message à poster.":
            $tmp = "您必须输入一条信息以张贴";
            break;
        case "Vous devez vous identifier.":
            $tmp = "您必须输入您的用户名和密码。请返回并重试。";
            break;
        case "Vous êtes connecté en tant que :":
            $tmp = "您的登录帐号";
            break;
        case "Vous êtes connecté en tant que":
            $tmp = "您是匿名用户。您可以点击这里以免费注册.";
            break;
        case "Vous êtes maintenant enregistré. Vous allez recevoir un code de confirmation dans votre boîte à lettres électronique.":
            $tmp = "您不是本论坛的版主，你不可以使用本项功能.";
            break;
        case "Vous n'avez aucun message.":
            $tmp = "您没有要接收的信息";
            break;
        case "Vous n'avez pas encore de compte personnel ? Vous devriez":
            $tmp = "您还没有个人帐号吗？你可以试试这里";
            break;
        case "Vous n'avez pas l'autorisation d'éditer ce message.":
            $tmp = "您没有权利修改此信息。";
            break;
        case "Vous n'êtes pas (encore) enregistré ou vous n'êtes pas (encore) connecté.":
            $tmp = "您的登录帐号 :";
            break;
        case "Vous n'êtes pas autorisé à participer à ce forum":
            $tmp = "您不是注册用户或者您没有登录。";
            break;
        case "Vous n'êtes pas encore autorisé à vous connecter.":
            $tmp = "您未被允许连接到这个页面。";
            break;
        case "Vous n'êtes pas identifié comme modérateur de ce forum. Opération interdite.":
            $tmp = "您没有被授权在该论坛回复。";
            break;
        case "Vous n'êtes pas le modérateur de ce forum, vous ne pouvez utiliser cette fonction.":
            $tmp = "您不是本论坛的版主。您不能使用该功能。";
            break;
        case "Vous ne pouvez éditer ce message, vous n'en êtes pas le destinataire.":
            $tmp = "您不能修改此信息，它不是发送给你的。";
            break;
        case "Vous ne pouvez répondre à ce message, vous n'en êtes pas le destinataire.":
            $tmp = "您不能回复该信息。它不是发送给您的。";
            break;
        case "Vous ne pouvez répondre à ce message.":
            $tmp = "您不能答复该信息。";
            break;
        case "Vous ne pouvez répondre à ce topic il est verrouillé. Contacter l'administrateur du site.":
            $tmp = "您不能回复该主题，因为它被锁定了。如有疑问请联系管理员。";
            break;
        case "Vous pourrez le modifier après vous être connecté sur":
            $tmp = "您可以访问我们的搜索引擎在 : ";
            break;
        case "Vous pouvez charger un fichier carnet.txt dans votre miniSite":
            $tmp = "点击这里成为会员";
            break;
        case "Vous pouvez en poster un ici.":
            $tmp = "您可以在修改密码，请登录";
            break;
        case "Vous pouvez utiliser du code html, pour créer un lien par exemple":
            $tmp = "您可以在您的小型网站中上传文件carnet.txt。";
            break;
        case "Vous pouvez utiliser notre moteur de recherche sur : ":
            $tmp = "您已经注册成功。您会在您所提交的email信箱中收到您的密码。";
            break;
        case "Vous recevrez un mèl quand elle sera approuvée.":
            $tmp = "当您的链接被我们通过您会收到一封确认信。";
            break;
        case "vous reconnecter.":
            $tmp = "再次登录.";
            break;
        case "Vous, ou quelqu'un d'autre, a utilisé votre Email identifiant votre compte":
            $tmp = "您或者其他某个人已经使用了您的email帐号";
            break; //
        case "Vous":
            $tmp = "您";
            break;
        case "vrai nom":
            $tmp = "真实姓名";
            break;

        default:
            $tmp = "需要翻译稿 [** $phrase **]";
            break;
    }
    return $tmp;
}