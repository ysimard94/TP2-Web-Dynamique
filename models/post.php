<?php

//Modèle qui va retourner tous les messages avec le nom de
//l'utilisateur lié avec
function post_model_list(){
    require(CONNEX_DIR);
    $sql = "SELECT *, name FROM post INNER JOIN user ON iduser = user_iduser";
    $result = mysqli_query($con, $sql);
    $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_close($con);
    return $result;
}

//MOdèle qui va insérer dans la base de données un message avec 
//l'identifiant de l'utilisateur connecté associé
function post_model_insert($request){
    require(CONNEX_DIR);
    foreach($request as $key=>$value){
        $$key=mysqli_real_escape_string($con,$value);
    }
    $sql = "INSERT INTO post (article, date, title, user_iduser) VALUES ('$article','$date','$title','$user_iduser')";
    mysqli_query($con, $sql);
    mysqli_close($con);
}

//Modèle qui va performer une requête pour supprimer un message
function post_model_delete($request){
    require(CONNEX_DIR);
    $data = $request['idpost'];
    foreach($request as $key=>$value){
        $$key=mysqli_real_escape_string($con, $value);
    }
    $sql = "DELETE FROM post WHERE idpost = '$data'";
    mysqli_query($con, $sql);
    mysqli_close($con);
}

//Modèle qui va retourner les informations nécessaires du message
//que l'utilisateur veut modifier dans la page de modification
function post_model_edit($request) {
    require(CONNEX_DIR);
    foreach($request as $key=>$value){
        $$key=mysqli_real_escape_string($con,$value);
    }
    $sql = "SELECT * FROM post WHERE idpost = '$id'";
    $result = mysqli_query($con, $sql);
    $result = mysqli_fetch_assoc($result);
    mysqli_close($con);
    return $result;
}

//Modèle qui va mettre à jour les informations modifiées du message
//de l'utilisateur
function post_model_editpost($request){
    require(CONNEX_DIR);
    foreach($request as $key=>$value){
        $$key=mysqli_real_escape_string($con,$value);
    }
    $sql = "UPDATE post SET title = '$title', article = '$article' WHERE idpost = '$idpost'";
    mysqli_query($con, $sql);
    mysqli_close($con);
}

?>