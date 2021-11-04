<h1>Links handler</h1>
<div id="menu"> <?php
    if(isset($_SESSION['id'])) { ?>
    <div id="buttonAdd" title="Ajouter un lien"><i class="fas fa-plus-square"></i></div>
    <div id="stat"><a href="index.php?controller=home&action=stat" title="Statistique"><i class="fas fa-chart-bar"></i></a></div>
    <div id="buttonDisco"><a href="index.php?controller=user&action=logout" title="Déconnexion"><i class="fas fa-sign-out-alt"></i></a></div> <?php
    }?>
</div>
<?php
if(isset($_SESSION['id'])) { ?>
<div id="homePage"></div>
<div id="contact">
    <h2>Contactez nous ici</h2>
    <textarea name="contactText" id="contactText" cols="30" rows="10"></textarea>
    <input type="button" id="sendContact" value="Envoyer">
</div> <?php
}