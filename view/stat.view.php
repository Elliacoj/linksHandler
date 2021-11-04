<h1>Links handler</h1>
<h2>Statistique de consultation des liens</h2>
<?php
$totalClick = 0;
$totalLink = 0;
$userId = $_SESSION['id']; ?>
<div id="statDiv">
    <h3>Vos statistiques</h3><?php
if(count($data[0]) !== 0) {
    foreach($data[0] as $link) {
        if($userId === $link->getUserFk()->getId()) {
            $totalClick = $totalClick + $link->getClick();
            $totalLink++;?>
    <div class="statLink">Le lien <b><?= $link->getName() ?></b> a été visité <b><?= $link->getClick() ?></b> fois.</div> <?php
        }
    }

} ?>
    <br>
    <div class="statLink total">Il y a <b><?= $totalLink ?></b> liens.</div>
    <div class="statLink total">Il y a eu <b><?= $totalClick ?></b> click au total.</div>
    <div id="canvasDiv"><canvas id="myChart" width="400" height="200"></canvas></div>
</div>
<div class="backButton"><a href="index.php">Retour</a></div>

