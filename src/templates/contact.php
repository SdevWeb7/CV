<?php
$pageTitle = 'Contact';
$pageDescription = "Contact";

$styleCSS = '<link rel="stylesheet" href="/css/contact.css">';
$pageJS = '<script src="/js/contact.js" type="module"></script>';

?>


<h1 id="top">Contact</h1>

<div id="container-formulaire">


   <div class="container-icons">
      <div class="icons">
         <a href="https://www.facebook.com/profile.php?id=100091446991510" class="social-link" target="_blank"><svg><use href="/img/sprite.svg#facebook"></use></svg></a>
      </div>

      <div class="icons">
         <a href="https://www.linkedin.com/in/steven-durand-3b347126b/" class="social-link" target="_blank"><svg><use href="/img/sprite.svg#linkedin"></use></svg></a>
      </div>

      <div class="icons">
         <a href="https://github.com/Veustyle" class="social-link" target="_blank"><svg><use href="/img/sprite.svg#github"></use></svg></a>
      </div>

   </div>


   <div class="formulaire-contact">

   <?php if (isset($_POST['email'], $_POST['message']) && $_POST['email'] > 5 && $_POST['message'] > 5) : ?>

      <p>Votre e-mail "<?= htmlentities($_POST['email']) ?>" et votre message ont bien été enregistrés dans la Base de Données.</p>

      <?php
      //ENVOI DES DONNEES
      $error = null;
      $error2 = null;

      $userEmail = htmlentities($_POST['email']);
      $userMessage = htmlentities($_POST['message']);

      $pdo = new PDO('mysql:host=localhost;dbname=u731860874_database1', 'u731860874_veustyle', 'Boss(93310)', [
         PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
         PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
         PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
      ]);

      try  {
         $query = $pdo->query("INSERT INTO contact VALUES ('$userEmail', '$userMessage')");
      } catch (PDOException $e) {
         $error = $e->getMessage();
      } ?>

   <?php endif ?>


      <form method="post" enctype="multipart/form-data" action="/contact">

         <label for="email">Indiquez votre e-mail et votre message</label>

         <input id="email" name="email" type="email" placeholder="Votre E-mail">

         <textarea id="message" name="message" rows="6" cols="10" maxlength="500" placeholder="Votre message" value="test"></textarea>

         <input id="button" type="submit" value="Envoyer">

      </form>

   </div>


</div>



<div class="arrow">
   <a href="#top"><svg><use href="/img/sprite.svg#arrowup"></use></svg></a>
</div>