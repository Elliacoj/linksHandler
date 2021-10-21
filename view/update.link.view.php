<div id="updateLinkDiv">
    <form action="index.php?controller=link&action=updateConfirm&id=<?= $data[0]->getId() ?>" method="POST">
        <div>
            <label for="hrefLink">Lien:</label>
            <input type="text" name="hrefLink" id="hrefLink" required value="<?= $data[0]->getHref() ?>">
        </div>

        <div>
            <label for="title">Titre:</label>
            <input type="text" name="title" id="title" required value="<?= $data[0]->getTitle() ?>">
        </div>

        <div>
            <label for="name">Nom:</label>
            <input type="text" name="name" id="name" required value="<?= $data[0]->getName() ?>">
        </div>

        <input type="submit" id="buttonSubmit" value="Ajouter">
    </form>
    <div class="backButton"><a href="index.php?controller=link&action=delete&id=<?= $data[0]->getId() ?>">Supprimer</a></div>
    <div class="backButton"><a href="index.php">Retour</a></div>
</div>