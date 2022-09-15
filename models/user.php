<?php

//Modèle qui va retourner la liste d'utilisateurs
function user_model_list(){
    require(CONNEX_DIR);
    $sql = "SELECT * FROM user";
    $result = mysqli_query($con, $sql);
    $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_close($con);
    return $result;
}

//Modèle qui va insérer dans la base de données et crypter le mot de passe
//d'un nouvel utilisateur créé
function user_model_insert($request){
    require(CONNEX_DIR);
    foreach($request as $key=>$value){
        $$key=mysqli_real_escape_string($con,$value);
    }
    $password = password_hash($password, PASSWORD_BCRYPT);
    $sql = "INSERT INTO user (name, username, password, birthday) VALUES ('$name','$username','$password','$birthday')";
    mysqli_query($con, $sql);
    mysqli_close($con);
}

//Modèle qui va retourner les informations nécessaires pour permettre
//l'authentification des données de l'utilisateur qui veut se connecter
function user_model_auth(){
    require(CONNEX_DIR);
    foreach($_POST as $key=>$value){
        $$key=mysqli_real_escape_string($con,$value);
    }
    //1 verifier le username
    $sql = "SELECT * FROM user WHERE username = '$username'";
    
    $result = mysqli_query($con, $sql);
    return $result;
}

?>