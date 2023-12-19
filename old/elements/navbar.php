<?php
require 'functions.php';
?>

<header class="header">
    <nav class="navbar">
       <?= link_item('/old/index.php', 'MySite', '', 'svg/images.svg#home'); ?>
       <?= link_item('/old/todolist.php', 'TodoList', '', "svg/images.svg#todolist"); ?>
       <?= link_item('/old/mycarousel.php', 'Carrousel', '', "svg/images.svg#carousel"); ?>
       <?= link_item('/old/games.php', 'Games', '', "svg/images.svg#games"); ?>
       <?= link_item('/old/contacts.php', 'Contacts', '', "svg/images.svg#telephone"); ?>
    </nav>

   <div class="menu">
      <div class="menu1">
         <svg><use href="svg/images.svg#list"></use></svg>
      </div>
      <div class="menu2">
         <svg><use href="svg/images.svg#exit"></use></svg>
      </div>
   </div>

</header>


<div class="header2">
   <nav class="navbar2">
      <?= link_item('/old/index.php', 'MySite', '', 'svg/images.svg#home'); ?>
      <?= link_item('/old/todolist.php', 'TodoList', '', "svg/images.svg#todolist"); ?>
      <?= link_item('/old/mycarousel.php', 'Carrousel', '', "svg/images.svg#carousel"); ?>
      <?= link_item('/old/games.php', 'Games', '', "svg/images.svg#games"); ?>
      <?= link_item('/old/contacts.php', 'Contacts', '', "svg/images.svg#telephone"); ?>
   </nav>
</div>


<div class="menu-futur">
   <?= link_item('/old/index.php', 'MySite', '', 'svg/images.svg#home'); ?>
   <?= link_item('/old/todolist.php', 'TodoList', '', "svg/images.svg#todolist"); ?>
   <?= link_item('/old/mycarousel.php', 'Carrousel', '', "svg/images.svg#carousel"); ?>
   <?= link_item('/old/games.php', 'Games', '', "svg/images.svg#games"); ?>
   <?= link_item('/old/contacts.php', 'Contacts', '', "svg/images.svg#telephone"); ?>
</div>
