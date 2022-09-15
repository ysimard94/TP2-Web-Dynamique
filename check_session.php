<?php
//Fichier qui va vérifier si le user est connecté, sinon le renvoyer
//dans la page de connexion
if(isset($_SESSION['fingerPrint']) and $_SESSION['fingerPrint'] == md5($_SERVER['HTTP_USER_AGENT'].$_SERVER['REMOTE_ADDR'])){

}else{
    render(VIEW_DIR.'/user/login.php');
}

?>