<div id="menu"> <?php
    if(!isset($_SESSION['id'])) { ?>
    <div id="buttonProfile"><a href="index.php?controller=user" title="Connexion"><i class="fas fa-sign-in-alt"></i></a></div> <?php
    }
    else { ?>
    <div id="buttonAdd"><i class="fas fa-plus-square"></i></div>
    <div id="buttonProfile"><a href="index.php?controller=user&action=logout" title="Déconnexion"><i class="fas fa-portrait"></i></a></div> <?php
    }?>
</div>
<div id="homePage">
<?php if(count($data) !== 0) {
    foreach($data[0] as $link) {
        $a = '';
        if(isset($_SESSION['id'])) {
            $a = '<a href="index.php?controller=link&action=update&id=' . $link->getId() . '"><i class="far fa-edit"></i></a>';
        }?>
    <div class="link">
        <div class="imgLink"><?= $a ?></div>
        <div class="nameLink"><a href="<?= $link->getHref()?>" target="<?= $link->getTarget()?>"><?= $link->getName()?></a></div>
    </div> <?php
    }
} ?>
</div>