<?php

//Fonction qui va montrer une page qui va lister tous les utilisateurs.
function post_controller_index(){
    require(MODEL_DIR.'/post.php');
    $data = post_model_list();
    render(VIEW_DIR.'/post/index.php', $data);
}

//Fonction qui va envoyer vers la page de création de messages
function post_controller_create(){
    render(VIEW_DIR.'/post/create.php');
}

//Fonction qui va insérer les informations rentrées dans la page de création
//dans la base de données des messages(posts).
function post_controller_insert($request){
    require(MODEL_DIR.'/post.php');
    post_model_insert($request);
    header("Location: ?module=post&action=index");
}

//Fonction qui va rentrer dans la fonction modèle pour supprimer un
//message de l'utilisateur connecté
function post_controller_delete($request){
    require(MODEL_DIR.'/post.php');
    post_model_delete($request);
    header("Location: ?module=post&action=index");
}

//Fonction qui, lors de l'appuie du bouton modifier, va renvoyer l'utilisateur
//vers la page de modification de message avec l'information de celui-ci
function post_controller_edit($request) {
    require(MODEL_DIR.'/post.php');
    $data = array('post' => post_model_edit($request));
    render(VIEW_DIR.'/post/edit.php', $data);
}

//Fonction qui va prendre utiliser un modèle pour mettre à jour l'information
//modifiée du message dans la base de données
function post_controller_editpost($request){
    require(MODEL_DIR.'/post.php');
    post_model_editpost($request);
    header("Location: ?module=post&action=index");
}
?>
