<div id="menu"> <?php
    if(!isset($_SESSION['id'])) { ?>
    <div id="buttonProfile"><a href="index.php?controller=user" title="Connexion"><i class="fas fa-sign-in-alt"></i></a></div> <?php
    }
    else { ?>
    <div id="buttonAdd"><i class="fas fa-plus-square"></i></div>
    <div id="buttonProfile"><a href="index.php?controller=user&action=logout" title="Déconnexion"><i class="fas fa-portrait"></i></a></div> <?php
    }?>
</div>
<?php
if(isset($_SESSION['id'])) { ?>
<div id="homePage"></div> <?php
}
?>
