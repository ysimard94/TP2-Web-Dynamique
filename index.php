<?php
//S'il n'y a pas de session active, en commencer une
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once 'config/config.php';
require_once 'lib/core.php';

//Mettre une timezone de base pour que la création de nouveau message
//utilise la date courrante
date_default_timezone_set('EST');

// module = controlleur
$module = isset($_REQUEST['module'])? safe($_REQUEST['module']):$config['default_module'];

//action = fonction dedans le controlleur
$action = isset($_REQUEST['action'])? safe($_REQUEST['action']):$config['default_action'];

//Pour faire référence dynamiquement au fichier controlleur désiré
$controller_file = 'controllers/'.ucfirst($module).'Controller.php';

//Si le fichier controlleur n'existe pas, afficher une erreur
if(!file_exists($controller_file)){
    trigger_error('Invalid Controller');
    exit;
}

require_once($controller_file);

//faire appel à une fonction controlleur dynamiquement avec le nom
//du module et de l'action désiré
$function = strtolower($module).'_controller_'.$action;

//Si la fonction du module n'existe pas, afficher un message d'erreur
if(!function_exists($function)){
    trigger_error('Invalid Function');
    exit;
}

//Appeller la fonction associée à la requête de l'utilisateur
call_user_func($function, $_REQUEST);

?>