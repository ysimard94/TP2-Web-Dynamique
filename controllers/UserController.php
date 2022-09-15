<?php

//Fonction qui va utiliser un modèle pour afficher tous les utilisateurs
function user_controller_index(){
    require(MODEL_DIR.'/user.php');
    $data = user_model_list();
    render(VIEW_DIR.'/user/index.php', $data);
}

//Fonction qui va renvoyer l'utilisateur sur la page de création de compte
function user_controller_create(){
    render(VIEW_DIR.'/user/create.php');
}

//Fonction qui va utiliser un modèle pour insérer le nouvel utilisateur
//créé dans la base de données
function user_controller_insert($request){
    require(MODEL_DIR.'/user.php');
    user_model_insert($request);
    header("Location: ?module=user&action=index");
}

//Fonction qui va vérifier les informations de la tentative de connexion
//si ils correspondent ou non à celles dans la base de données
function user_controller_auth ($request) {
    require(MODEL_DIR.'/user.php');
    $data = user_model_auth($request);
    $count = mysqli_num_rows($data);
    //Si la requête retourne une rangée de data, on rentre dans la condition
   // qui va comparer les données 
    if($count==1){
       $user = mysqli_fetch_array($data, MYSQLI_ASSOC);
    
        $dbpassword = $user['password'];

        //Si le mot de passe de la requête et celle dans la base de données
        //sont correctes, on va débuter une session active avec ces
        //informations et rediriger l'utilisateur à la page index,
        //sinon la personne retourne à la page de connexion
        if(password_verify($request['password'], $dbpassword)){
            print_r($dbpassword);
            $_SESSION['nom'] = $user['name'];
            $_SESSION['userid'] = $user['iduser'];
            $_SESSION['fingerPrint'] =md5($_SERVER['HTTP_USER_AGENT'].$_SERVER['REMOTE_ADDR']); 
            header("Location: ?module=base&action=index");
        }
    }
    else{
        header("Location: ?module=user&action=login");
    }
}

//Fonction qui renvoie l'utilisateur à la page de connexion
function user_controller_login() {
    render(VIEW_DIR.'/user/login.php');
}

//Fonction qui va déconnecter l'utilisateur et le renvoyer à la page d'index
function user_controller_logout() {
    session_destroy();
    header("Location: ?module=base&action=index");
}

?>