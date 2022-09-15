<?php
    //Va vérifier s'il y a un session d'active (un utilisateur de connecté)
    require 'check_session.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=à, initial-scale=1.0">
    <title>Forum</title>
    <link rel="stylesheet" href="ressources/css/style.css">
</head>
<body>
    <ul class="navigation">
        </ul>
        <nav>
            <?php if(isset($_SESSION['nom'])){ ?>
                <!-- S'il y a un utilisateur de connecter, afficher le message -->
                <p>Bienvenue à toi, <?php echo $_SESSION['nom']; ?></p>
            <?php } ?>
            <div>
                <a href="?module=base&action=index">Accueil</a>
                <a href="?module=post&action=index">Voir les messages</a>
                <a href="?module=user&action=index">Liste des utilisateurs</a>
                <!-- Si un utilisateur est connecté, afficher ces options de menu -->
                <?php if(isset($_SESSION['nom'])){ ?>
                    <a href="?module=post&action=create">Créer un message</a>
                    <a href="?module=user&action=logout">Déconnexion</a>
                <!-- Sinon celles-ci -->
                <?php } else{ ?>
                    <a href="?module=user&action=create">Créer un compte</a>
                    <a href="?module=user&action=login">Connexion</a>
                <?php } ?>
            </div>
        </nav>
    <!-- Afficher le contenu inséré dans le output buffer -->
    <div class="container">
        <?php echo $content; ?>
    </div>
</body>
</html>