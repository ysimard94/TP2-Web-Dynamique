<form action="index.php?module=post&action=insert" method="post" class="create-form">
    <label>
        <p>Titre</p>
        <input type="text" name="title" class="create-title">
    </label>
    <label>
        <p>Contenu</p>
        <input type="text" name="article" class="create-article ">
    </label>
    <label>
        <input type="hidden" name="user_iduser" value="<?php echo $_SESSION['userid']; ?>">
    </label>
    <label>
        <input type="hidden" name="date" value="<?php echo date('Y-m-d'); ?>">
    </label>
    <br>
    <input type="submit" value="Créer le message">
</form>