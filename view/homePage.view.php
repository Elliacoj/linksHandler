<div id="menu"> <?php
    if(!isset($_SESSION['id'])) { ?>
    <div id="buttonProfile"><a href="index.php?controller=user" title="Connexion"><i class="fas fa-portrait"></i></a></div> <?php
    }
    else { ?>
    <div id="buttonAdd"><a href="index.php?controller=link"><i class="fas fa-plus-square"></i> Ajouter un lien</a></div>
    <div id="buttonProfile"><a href="index.php?controller=user&action=logout" title="Déconnexion"><i class="fas fa-portrait"></i></a></div> <?php
    }?>
</div>
<div id="homePage">
<?php if(count($data) !== 0) {
    foreach($data[0] as $link) { ?>
    <div class="link">
        <div class="imgLink"></div>
        <div class="nameLink"><a href="<?= $link->getHref()?>" target="<?= $link->getTarget()?>"><?= $link->getName()?></a></div>
    </div> <?php
    }
} ?>
</div>