<?php

use App\Class\Compteur;
use App\Class\DoubleCompteur;

require '../vendor/autoload.php';

$compteur = new Compteur('./compteur');

$compteur->incrementer();
$vues = $compteur->recuperer();
?>

<div>Il y a eu <?= $vues ?> Visites</div>

<?php
$doubleCompteur = new DoubleCompteur('./compteur2');
$doubleCompteur->incrementer();
$vuesDouble = $doubleCompteur->recuperer();

?>

<div>Il y a eu <?= $vuesDouble ?> Visites</div>