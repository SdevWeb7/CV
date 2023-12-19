<?php

function link_item (string $lien, string $title, string $classe = '', string $svg = '') : string {
   if ($_SERVER['SCRIPT_NAME'] === $lien) {
      $classe .= " active";
   }
   return <<<HTML
   <div>
    <a class="$classe" href="$lien"><svg><use href="$svg"></use></svg> <span>$title</span><div class="container-barre">
        <div class="barre"></div>
    </div></a>
   </div>
HTML;
}
