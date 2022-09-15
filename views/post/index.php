<section>
    <h1>Voici les posts des utilisateurs</h1>
    <?php
    foreach ($data as $row) { ?>
        <article class="post">
            <div>
                <h3><?php echo $row['name'] ?></h3>
                <p><?php echo $row['date'] ?></p>
            </div>
            <div>
                <h2><?php echo $row['title'] ?></h2>
                <p><?php echo $row['article'] ?></p>
                <!-- S'il y a un utilisateur de connecté, et que le message
                possède le même id que celui associé au message, afficher ces boutons -->
                <?php if (isset($_SESSION['nom']) && $_SESSION['nom'] == $row['name']) { ?>
                    <div class="flex">                 
                        <a href="?module=post&action=edit&id=<?php echo $row['idpost'] ?>">Modifier</a>
                        <form action="?module=post&action=delete" method="post">
                            <input type="hidden" name="idpost" value="<?php echo $row['idpost']; ?>">
                            <input type="submit" value="Effacer">
                        </form>
                    </div>
                <?php } ?>
            </div>
        </article>
    <?php } ?>
</section>