<?php
//Fait que la première ouverture de la page, la personne va être
//redirigée vers la page "welcome"
function base_controller_index(){
    render(VIEW_DIR.'/base/welcome.php');
}
?>