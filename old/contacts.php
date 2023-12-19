<?php
$title = 'Contacts';
require 'elements/config.php';

require 'elements/header.php';
require 'elements/navbar.php';

/* Newsletter */
$error = null;
$success = null;
$email = null;
if (!empty($_POST['email'])) {
   $email = $_POST['email'];
   if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $file = __DIR__ . DIRECTORY_SEPARATOR . 'emails' . DIRECTORY_SEPARATOR . date('Y-m-d') . '.txt';
      file_put_contents($file, $email . PHP_EOL, FILE_APPEND);
      $success = $email;
      $email = null;
   } else {
      $error = 'Email Invalide';
      $email = null;
   }
}

/* Horaires d'ouverture */
setlocale(LC_TIME, 'fr_FR');
date_default_timezone_set('Europe/Paris');

$heure = (int)($_GET['heure'] ?? (int)date('G'));
$jours = (int)($_GET['jour'] ?? date('N') - 1);
$creneaux = CRENEAUX[$jours];

$ouvert = in_creneaux($heure, $creneaux);

$color = $ouvert ? 'green' : 'red';
?>

<link rel="stylesheet" href="css/contacts.css">


   <main>
      <h1>Newsletter</h1>
      <p>Pour nous contacter, veuillez appeler au 05 51 54 54</p>

<!-- Inscription Newsletter -->
      <?php if ($error) : ?>
         <h2 style="color:red"><?= $error ?></h2>
      <?php endif ?>

      <?php if ($success) : ?>
         <h2 style="color:green"><?= $success ?> a bien été enregistré</h2>
      <?php endif ?>

      <form action="contacts.php" method="post" class="form-contact">
         <div class="form-group">
            <input type="email" name="email" class="form-email" placeholder="Entrez votre e-mail" required value="<?= isset($email) ? htmlentities($email) : '' ?>">
         </div>
         <button type="submit" class="form-button">S'inscrire à la Newsletter</button>
      </form>

<!-- Horaires d'ouverture -->
      <h1>Horaires d'ouvertures</h1>

      <p><?= date('l d F Y') ?></p>

      <form class="form-horaires" action="" method="GET">
         <?= select('jour', $jours, JOURS) ?>
         <input type="text" name="heure" value="<?= $heure ?>"> H <br>
         <button type="submit">Vérifier si le magasin sera ouvert</button>
      </form>

      <?php if ($ouvert) : ?>
         <p style="color:green">Le Magasin sera ouvert</p>
      <?php else : ?>
         <p style="color: red">Le Magasin sera fermé</p>
      <?php endif ?>

      <ul class="ul-horaires">
         <?php foreach(JOURS as $key => $jour) : ?>
            <li <?php if ($key === $jours) : ?> style="color:<?= $color ?>" <?php endif ?>>
               <?= "$jour : " . creneaux_html(CRENEAUX[$key]) ?></li>
         <?php endforeach ?>
      </ul>

   </main>

<?php require 'elements/footer.php';