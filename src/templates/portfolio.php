<?php
$pageTitle = 'Portfolio';
$pageDescription = "Portfolio";

$styleCSS = '<link rel="stylesheet" href="/css/portfolio.css">';
$pageJS = '<script src="/js/portfolio.js" type="module"></script>';

?>


<section id="portfolio">

   <h3>Portfolio</h3>

   <div class="projet">

      <div class="cadre">
         <div class="img-container">
            <a href="https://www.informhacktion.com/" target="_blank">
               <img src="/img/portfolio1.png" alt="projet-1">
            </a>
         </div>
      </div>


      <div class="legende">

         <h4><img src="img/html.png" alt="html"> <img src="img/css.png" alt="css"><img src="/img/php.png" alt="php"><img src="/img/js.png" alt="js"> Site de Présentation</h4>

         <p>Réalisé sans framework.</p><p>Du pur HTML, CSS, PHP et Javascript.</p>

         <a href="https://github.com/Veustyle/Template1" target="_blank"><button><svg><use href="/img/sprite.svg#github"></use></svg> Code source</button></a>

      </div>

   </div>


   <div class="projet">

      <div class="cadre">
         <div class="img-container">
            <a href="/old/index.php" target="_blank">
               <img src="img/portfolio2.png" alt="projet-2">
            </a>
         </div>
      </div>

      <div class="legende">
         <h4><img src="img/html.png" alt="html"> <img src="img/css.png" alt="css"><img src="/img/php.png" alt="php"><img src="/img/js.png" alt="js"> Premier Site</h4>
         <p>Réalisé sans framework.</p><p>Du pur HTML, CSS, PHP et Javascript.</p>

         <a href="https://github.com/Veustyle/Template2" target="_blank"><button><svg><use href="/img/sprite.svg#github"></use></svg> Code source</button></a>
      </div>

   </div>


   <div class="projet">

      <div class="cadre">
         <div class="img-container">
            <a href="https://www.informhacktion.com/todo/index.php" target="_blank">
               <img src="img/portfolio3.png" alt="projet-3">
            </a>
         </div>
      </div>


      <div class="legende">

         <h4><img src="img/html.png" alt="html"> <img src="img/css.png" alt="css"><img src="/img/php.png" alt="php"><img src="/img/js.png" alt="js"> Todolist en Php</h4>

         <p>Réalisé sans framework.</p>
         <p>un peu d'HTML/CSS</p>
         <p>beaucoup de PHP</p>
         <p> une petite base de donnée SQLITE </p>
         <p>et quelques lignes de Javascript.</p>

         <a href="https://github.com/Veustyle/TodolistPHP" target="_blank"><button><svg><use href="/img/sprite.svg#github"></use></svg> Code source</button></a>

      </div>

   </div>


</section>



<section id="other-skills">
   <h3>Autres Compétences</h3>

   <div class="cloud">
      <div class="aos-item">Securité Informatique</div>
      <div class="aos-item2">Anglais</div>
      <div class="aos-item3">Python, C</div>
      <div class="aos-item4">Espagnol</div>
      <div class="aos-item5">Windows</div>
      <div class="aos-item6">Linux</div>
   </div>

</section>

<section id="hobbies">

   <h3>Hobbies</h3>

   <div class="pictures">

      <div class="flip-box">

         <div class="flip-box-inner">

            <div class="flip-box-front">
               <img src="media/running.jpg" alt="runner">
            </div>


            <div class="flip-box-back" style="background-color: #bd5840">
               <div>
                  <p>Course à Pieds</p>
                  <p>Natation</p>
                  <p>Football</p>
               </div>
            </div>

         </div>
      </div>



      <div class="flip-box">
         <div class="flip-box-inner">
            <div class="flip-box-front">
               <img src="media/permaculture.jpg" alt="permaculture">
            </div>

            <div class="flip-box-back" style="background-color: #329d54">
               <div>
                  <p>Permaculture</p>
                  <p>Jardinage</p>
                  <p>Bricolage</p>
               </div>
            </div>
         </div>
      </div>


      <div class="flip-box">
         <div class="flip-box-inner">
            <div class="flip-box-front">
               <img src="media/btc.jpg" alt="cryptomonnaie">
            </div>

            <div class="flip-box-back" style="background-color: #06788c">
               <div>
                  <p>Cryptomonnaie</p>
                  <p>BlockChain</p>
                  <p>Bricolage</p>
               </div>
            </div>
         </div>
      </div>


      <div class="flip-box">
         <div class="flip-box-inner">
            <div class="flip-box-front">
               <img src="media/science.jpg" alt="science">
            </div>

            <div class="flip-box-back" style="background-color: orange">
               <div>
                  <p>High-Tech</p>
                  <p>E-Games</p>
               </div>
            </div>

         </div>
      </div>







   </div>
</section>

<div class="arrow">
   <a href="#portfolio"><svg><use href="/img/sprite.svg#arrowup"></use></svg></a>
</div>