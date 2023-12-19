<?php
require '../src/Functions/functions.php';
?>

<!doctype html><html lang="fr">
<head>
   <meta charset="UTF-8">
   <meta name="viewport"
         content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="shortcut icon" href="media/icon.png" type="image/x-icon">

   <title><?= $pageTitle ?? 'Mon Site' ?></title>
   <meta name="description" content="<?= $pageDescription ?? 'Description Générale' ?>">
   <link rel="stylesheet" href="css/home.css">
   <?= $styleCSS ?? '' ?>
</head>
<body>


<!-- HEADER -->
<header id="header">

   <nav id="navbar">

      <div id="nav-title">
         <a class="svgcool" href="/"><svg><use href="img/sprite.svg#cool"></use></svg></a>
      </div>


      <div id="nav-liens">
         <div>
            <a href="/parcours" class="<?= $_SERVER['REQUEST_URI'] === '/parcours' ? ' active' : '' ?>" ><svg><use href="img/sprite.svg#cv"></use></svg><span> Parcours</span></a>
         </div>

         <div>
            <a href="/portfolio" class="<?= $_SERVER['REQUEST_URI'] === '/portfolio' ? ' active' : '' ?>"><svg><use href="img/sprite.svg#portfolio"></use></svg><span> Portfolio</span></a>
         </div>

         <div>
            <a href="/contact" class="<?= $_SERVER['REQUEST_URI'] === '/contact' ? ' active' : '' ?>" ><svg><use href="img/sprite.svg#phone"></use></svg><span> Contact</span></a>
         </div>
      </div>



<!-- MENU DEROULANT -->
      <div class="menu-svg">
         <div class="menu1">
            <svg><use href="img/sprite.svg#list"></use></svg>
         </div>
         <div class="menu2">
            <svg id="svg-exit"><use href="img/sprite.svg#exit"></use></svg>
         </div>
      </div>

      <div class="menu-deroulant">
         <a href="/"><svg id="merci"><use href="img/sprite.svg#cool"></use></svg> Home</a>
         <a href="/parcours"><svg><use href="img/sprite.svg#cv"></use></svg> Parcours</a>
         <a href="/portfolio"><svg><use href="img/sprite.svg#portfolio"></use></svg> Portfolio</a>
         <a href="/contact"><svg><use href="img/sprite.svg#phone"></use></svg> Contact</a>
      </div>

   </nav>
</header>



<!-- MAIN -->
   <main id="main">
      <?= $pageContent ?>

   </main>



<!-- FOOTER -->
<footer id="footer" class="foot">

   <div class="footer-liens">
      <a class="<?= $_SERVER['REQUEST_URI'] === '/' ? ' active' : '' ?>" href="<?= $routeur->generate('home') ?>">Home</a>

      <a class="<?= $_SERVER['REQUEST_URI'] === '/parcours' ? ' active' : '' ?>" href="<?= $routeur->generate('parcours') ?>">Parcours</a>

      <a class="<?= $_SERVER['REQUEST_URI'] === '/contact' ? ' active' : '' ?>" href="<?= $routeur->generate('contact') ?>">Contact</a>
   </div>

   <p>Copyright &copy; 2023</p>

</footer>

<script src='js/home.js' type="module"></script>
<?= $pageJS ?? '' ?>

</body>
</html>