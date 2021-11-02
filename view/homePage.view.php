<div id="menu"> <?php
    if(!isset($_SESSION['id'])) { ?>
    <div id="buttonProfile"><a href="index.php?controller=user" title="Connexion"><i class="fas fa-sign-in-alt"></i></a></div> <?php
    }
    else { ?>
    <div id="buttonAdd"><i class="fas fa-plus-square"></i></div> <?php
        if(isset($_SESSION['role']) && $_SESSION['role'] === "admin") { ?>
    <div id="stat"><i class="fas fa-chart-bar"></i></div> <?php
        } ?>
    <div id="buttonDisco"><a href="index.php?controller=user&action=logout" title="Déconnexion"><i class="fas fa-portrait"></i></a></div> <?php
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