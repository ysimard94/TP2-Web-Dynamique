<?php

//Configuration pour le cheminement vers les différents chemins
//tout dépendant du besoin
define('MODEL_DIR', 'models');
define('VIEW_DIR', 'views');
define('CONNEX_DIR', 'lib/connex.php');

//Avoir une configuration de base pour la première ouverture de la page
$config = array(
    //module = controlleur
    'default_module' => 'base',
    //action = fonction dedans le controlleur
    'default_action' => 'index',
);

