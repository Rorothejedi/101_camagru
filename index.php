<?php
namespace App;

// Autoloader
require 'model/Autoloader.php';
\App\model\Autoloader::register();

// Vérification de l'existence de la session
if(session_id() == "") session_start();

// Instanciation du routeur
$router = new model\router\Router($_GET['url']);

// Vérification de l'existence d'un cookie pour la connexion automatique
if(isset($_COOKIE['auth']) && !isset($_SESSION['user_id']))
{
	$auth = htmlspecialchars($_COOKIE['auth']);
	$auth = explode('---', $auth);
	$user = \App\model\App::getDb()->prepare('
		SELECT * FROM user WHERE id = ?',
		[$auth[0]], true, true, false);
	$key = sha1($user->username . $user->password . $_SERVER['REMOTE_ADDR']);
	// Correspondance entre la key de la bdd et celle du cookie 
	if ($key == $auth[1])
	{
		$_SESSION['user_id']       = $user->id;
		$_SESSION['user_username'] = $user->username;
		setcookie('auth', $user->id . '---' . $key, time() + 3600 * 24 * 365, null, null, false, true);
	}
	else
		setcookie('auth', '', time() - 3600, null, null, false, true);
}

// -----------------------  Router get -------------------------
$router->get('/', "Public#displayGallery");
$router->get('/inscription', "Public#displayRegister");
$router->get('/confirmation_inscription', "Public#displayRegisterConfirm");
$router->get('/connexion', "Public#displayConnection");
$router->get('/mentions_legales', "Public#displayLegal");
$router->get('/processValidation', "Public#processValidation");

$router->get('/disconnect', "Private#disconnect");

// -----------------------  Router post -------------------------
$router->post('/processRegistration', "Public#processRegistration");
$router->post('/processConnection', "Public#processConnection");

//Route execution
$router->run();
