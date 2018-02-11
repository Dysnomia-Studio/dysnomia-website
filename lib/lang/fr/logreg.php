<?php
// Form
define('LOGIN_LOGIN','Connexion');
define('LOGIN_REG','Inscription');
define('LOGIN_USERMAIL','Nom d\'utilisateur ou mail');
define('LOGIN_PASSWORD','Mot de passe');
define('LOGIN_REMEMBER','Se souvenir de moi');

define('LOGIN_USERNAME','Nom d\'utilisateur');
define('LOGIN_MAIL','Mail');
define('LOGIN_CPASSWORD','Confirmer mot de passe');
define('LOGIN_CG','En cochant cette case, j\'accepte les <a href="cgu.pdf">Conditions générales d\'utilisation</a> et les <a href="cgv.pdf">Conditions générales de vente</a>');
define('LOGIN_NEWS_UPDATE','J\'accepte de recevoir des mails rapportant les mises à jour majeures du jeu ( Environ tout les 2 mois ).');
define('LOGIN_NEWS_MISC','J\'accepte de recevoir des mails pour les nouveautés mineures, les événements en cours et des mails promotionels.');

define('LOGIN_FORGOTPASS','Mot de passe oublié ?');
define('LOGIN_PASS_RESET','Reinitialistation de mot de passe');
define('LOGIN_FORGOT_SUBMIT','Demander la réinitialisation');
define('PASS_MAIL_SEND','Un e-mail vient de vous être envoyé afin de reinitaliser votre mot de passe.');

define('PASS_MAIL_1','Bonjour !<br/></br>
				Vous avez demandé un lien de reinitalisation de votre mot de passe, afin de continuer cette démarche, veuillez cliquer sur le lien suivant');
define('PASS_MAIL_2','Vous pouvez aussi copier-coller le lien complet dans la barre d\'adresse de votre navigateur. Si vous n\'êtes pas à l\'origine de cette demande, vous pouvez ignorer ce mail.</br></br>
				Bon jeu à vous !<br/></br>
				L\'equipe de Galactae: Space Age Dawn');

define('PASS_SUBMIT','Changer le mot de passe');
define('PASS_INVALID_LINK','Lien non-valide');
define('PASS_CHANGED','Votre mot de passe a bien été modifié.');

define('MAIL_NOREPLY','Ceci est un mail automatique, le serveur qui vous l\'a envoyé n\'est pas encore doué d\'intelligence, il ne pourra donc pas vous repondre.');

define('REGISTER_MAIL_TEXT_1','Bienvenue !<br/></br>
				Derniere étape avant de pouvoir prendre le contrôle de votre nation, veuillez cliquer sur ce lien afin d\'activer votre compte');
define('REGISTER_MAIL_TEXT_2','</br>
				Vous pouvez aussi copier-coller le lien complet dans la barre d\'adresse de votre navigateur.</br></br>
				Bon jeu à vous !<br/></br>
				L\'equipe de Galactae: Space Age Dawn');

define('CONTACT_MAIL','Votre adresse mail');
define('CONTACT_TXT','Votre message');
define('CONTACT_SEND','Envoyer');

// Confirm
define('ERR_FIELD','Erreur: Un champ ou plus est vide.');
define('ERR_BAN','Erreur: Vous êtes banni.');
define('ERR_BAD_LOGIN','Erreur: Couple nom/mot de passe incorrect.');
define('ERR_TOO_LONG_SHORT_USERNAME','Erreur: Votre nom d\'utilisateur est trop court ou trop long');
define('ERR_TOO_LONG_SHORT_PASS','Erreur: Votre mot de passe est trop court (8 caracteres minimum).');
define('ERR_NOT_VALID_MAIL','Erreur: Votre mail est invalide');
define('ERR_NOT_VALID_USERNAME','Erreur: Votre nom d\'utilisateur est invalide');
define('ERR_NOT_VALID_PASS','Erreur: Votre mot de passe est invalide');
define('ERR_NOT_SAME_PASSWD','Erreur: Le mot de passe et sa confirmation ne sont pas les mêmes.');
define('ERR_ACCOUNT_EXISTS','Erreur: Un compte avec ce mail et/ou nom d\'utilisateur existe déjà !');
define('ERR_ACCOUNT_NOT_EXISTS','Erreur: Aucun compte n\'est lié à ce pseudo/mail.');
define('ERR_CG','Erreur: Vous devez accepter les conditions generales du jeu.');
define('ERR_NOT_ACTIVATED','Erreur: Votre compte n\'est pas activé.');
define('ERR_NOT_WHITELISTED','Erreur: Votre compte n\'a pas accès à l\'alpha.');

define('CONNECTED','Vous êtes bien connecté.');
define('ACTIVATION','Vous êtes bien inscrit. Veuillez activer votre compte en confirmant votre mail.');

define('ACCOUNT_ACTIVATED','Votre compte a bien été activé.');
define('ACCOUNT_NOT_ACTIVATED','Erreur inconnue: Votre compte n\'a pas pu être activé.');

define('CLICK_BACK','<a href="#" onclick="window.history.back();">Cliquez ici pour revenir en arriere.</a>');
define('CLICK_HOME','<a href="index">Cliquez ici pour revenir à l\'accueil.</a>');
define('CLICK_GAME','<a href="portal">Cliquez ici pour accéder au portail de jeu.</a>');
define('CLICK_LOGIN','<a href="login">Cliquez ici pour accéder à la page de connexion.</a>');

define('CONTACT_OK','Le message a bien été envoyé.');
define('CONTACT_PAS_OK','Le message n\'a pas été envoyé.');
?>