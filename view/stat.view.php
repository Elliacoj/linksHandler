<h2>Statistique de consultation des liens</h2>
<?php
$totalClick = 0;
$totalLink = 0;
$userId = $_SESSION['id']; ?>
<div id="statDiv"> <?php
if(count($data[0]) !== 0) {
    foreach($data[0] as $link) { ?>
    <div class="statLink">Le lien <b><?= $link->getName() ?></b> a été visité <b><?= $link->getClick() ?></b></div> <?php
    }
} ?>
</div>
<div class="backButton"><a href="index.php">Retour</a></div>

