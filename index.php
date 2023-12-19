<?php
require '../vendor/autoload.php';

$routeur = new AltoRouter();

require '../src/elements/routes.php';

$match = $routeur->match();

if (is_array($match)) {

   if (is_callable($match["target"])) {
      call_user_func_array($match['target'], $match['params']);
   } else {
      $params = $match['params'];
      ob_start();
      require "../src/templates/{$match['target']}.php";
      $pageContent = ob_get_clean();
   }

   require '../src/elements/layout.php';

} else {
   header('Location: /');
}