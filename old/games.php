<?php
$title = 'Games';

require 'elements/header.php';
require 'elements/navbar.php';

$nombreADeviner = 251;

$parfums= [
   'Fraise' => 4,
   'Chocolat' => 5,
   'Banane' => 3
];
$cornets = [
   'Pot' => 2,
   'Cornet' => 3
];
$supplements = [
   'Pépite de chocolat' => 1,
   'Chantilly' => 0.5
];

$ingredients = [];
$total = 0;

foreach (['parfum', 'supplement', 'cornet'] as $name) {
   if (isset($_GET[$name])) {
      $liste = $name . 's';
      if (is_array($_GET[$name])) {
         foreach($_GET[$name] as $value) {
            if (isset($$liste[$value])) {
               $ingredients[] = $value;
               $total += $$liste[$value];
            }
         }
      } else {
         if (isset($$liste[$_GET[$name]])) {
            $ingredients[] = $_GET[$name];
            $total += $$liste[$_GET[$name]];
         }
      }
   }
}
?>

<link rel="stylesheet" href="css/games.css">

<main>
   <h2>Devinez un nombre</h2>


<!-- Nombre à deviner -->
   <p>Saisissez un nombre entre 0 et 500</p>

   <form class="form-games" action="" method="GET">
      <input type="text" name="chiffre" placeholder="ici" value ="<?= isset($_GET['chiffre']) ? htmlentities($_GET['chiffre']) : '' ?>"><br>
      <button type="submit">Tenter votre chance</button>
   </form>

   <p>
      <?php if (isset($_GET['chiffre'])) : ?>
         <?php if ($_GET['chiffre'] > $nombreADeviner) : ?>
            Trop Grand
         <?php elseif ($_GET['chiffre'] < $nombreADeviner) : ?>
            Trop Petit !
         <?php else : ?>
            JACKPOT !
         <?php endif ?>
      <?php endif ?>
   </p>
   <div class="separation"></div>


<!-- Créer sa glace -->
   <h2>Créer une glace</h2>
   <form action="" method="GET">
      <?php foreach($parfums as $parfum => $prix) : ?>
         <?= create_Checkbox('parfum', $parfum, $_GET) ?>
         <?= $parfum ?> - <?= $prix ?> € <br>
      <?php endforeach; ?>
      <br>

      <?php foreach($cornets as $cornet => $prix) : ?>
         <?= create_Radio('cornet', $cornet, $_GET) ?>
         <?= $cornet ?> - <?= $prix ?> € <br>
      <?php endforeach; ?>
      <br>

      <?php foreach($supplements as $supplement => $prix) : ?>
         <?= create_Checkbox('supplement', $supplement, $_GET) ?>
         <?= $supplement ?> - <?= $prix ?> € <br>
      <?php endforeach; ?><br>
      <button type="submit">Créer la glace</button>
   </form>


   <p>Ingrédients Choisis</p>
   <ul>
      <?php foreach($ingredients as $ingredient) : ?>
         <li><?= $ingredient ?></li>
      <?php endforeach; ?>
   </ul>
   <strong>Prix total: <?= $total ?> €</strong>

</main>


<?php require 'elements/footer.php';