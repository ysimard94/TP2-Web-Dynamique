<form action="index.php?module=post&action=editpost" method="post" class="create-form">
    <label>
        <input type="hidden" name="idpost" value="<?php echo $data['post']['idpost']; ?>">
    </label>
    <label>
        <p>Titre</p>
        <input type="text" name="title" class="create-title" value="<?php echo $data['post']['title']; ?>">
    </label>
    <label>
        <p>Contenu</p>
        <input type="text" name="article" class="create-article" value="<?php echo $data['post']['article']; ?>">
    </label>
    <br>
    <input type="submit" value="Modifier le message">
</form>