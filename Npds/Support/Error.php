<?php

namespace Npds\Support;

use Npds\Config\Config;
use Npds\Support\Facades\Theme;


/**
 * Class Error.
 */
class Error
{

    /**
     * Retourne une presentation de l'erreur.
     *
     * @param   string  $e_code  Code d'erreur.
     *
     * @return  void
     */
    public static function code(string $e_code)
    {
        if (Theme::getHeader()) {
            Theme::header();
        }
    
        $codes = static::codes();

        echo '<div class="alert alert-danger"><strong>' . Config::get('npds.sitename') . '<br />' . translate("Erreur du forum") . '</strong><br />';
        echo translate("Code d'erreur :") . ' ' . $e_code . '<br /><br />';
        echo $codes[$e_code] . '<br /><br />';
        echo '<a href="javascript:history.go(-1)" class="btn btn-secondary">' . translate("Retour en arrière") . '</a><br /></div>';
        
        if (Theme::getFooter()) {
            Theme::footer();
    
            die('');
        }
    }

    /**
     * Le tableau des erreurs.
     *
     * @return  array
     */
    private static function codes()
    {
        return [
            /**
             * 
             */
            '0001' => translate("Pas de connexion à la base forums."),
            '0002' => translate("Le forum sélectionné n'existe pas."),
            '0004' => translate("Pas de connexion à la base topics."),
            '0005' => translate("Erreur lors de la récupération des messages depuis la base."),
            '0006' => translate("Entrer votre pseudonyme et votre mot de passe."),
            '0007' => translate("Vous n'êtes pas le modérateur de ce forum, vous ne pouvez utiliser cette fonction."),
            '0008' => translate("Mot de passe erroné, refaites un essai."),
            '0009' => translate("Suppression du message impossible."),
            '0010' => translate("Impossible de déplacer le topic dans le Forum, refaites un essai."),
            '0011' => translate("Impossible de verrouiller le topic, refaites un essai."),
            '0012' => translate("Impossible de déverrouiller le topic, refaites un essai."),
            '0013' => translate("Impossible d'interroger la base.<br />Error: ". sql_error()),
            '0014' => translate("Utilisateur ou message inexistant dans la base."),
            '0015' => translate("Le moteur de recherche ne trouve pas la base forum."),
            '0016' => translate("Cet utilisateur n'existe pas, refaites un essai."),
            '0017' => translate("Vous devez obligatoirement saisir un sujet, refaites un essai."),
            '0018' => translate("Vous devez choisir un icône pour votre message, refaites un essai."),
            '0019' => translate("Message vide interdit, refaites un essai."),
            '0020' => translate("Mise à jour de la base impossible, refaites un essai."),
            '0021' => translate("Suppression du message sélectionné impossible."),
            '0022' => translate("Une erreur est survenue lors de l'interrogation de la base."),
            '0023' => translate("Le message sélectionné n'existe pas dans la base forum."),
            '0024' => translate("Vous ne pouvez répondre à ce message, vous n'en êtes pas le destinataire."),
            '0025' => translate("Vous ne pouvez répondre à ce topic il est verrouillé. Contacter l'administrateur du site."),
            '0026' => translate("Le forum ou le topic que vous tentez de publier n'existe pas, refaites un essai."),
            '0027' => translate("Vous devez vous identifier."),
            '0028' => translate("Mot de passe erroné, refaites un essai."),
            '0029' => translate("Mise à jour du compteur des envois impossible."),
            '0030' => translate("Le forum dans lequel vous tentez de publier n'existe pas, merci de recommencez"),
            '0035' => translate("Vous ne pouvez éditer ce message, vous n'en êtes pas le destinataire."),
            '0036' => translate("Vous n'avez pas l'autorisation d'éditer ce message."),
            '0037' => translate("Votre mot de passe est erroné ou vous n'avez pas l'autorisation d'éditer ce message, refaites un essai."),
            '0101' => translate("Vous ne pouvez répondre à ce message."),
        ];
    }

}
