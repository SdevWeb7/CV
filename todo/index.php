<!DOCTYPE html>
<html lang="fr">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="./style.css">
   <script src="./script.js" type=module defer></script>
   <title>Todolist</title>
</head>
<body>


<form class="form1" action="" method="post">
   <label for="todo-content">Ajoutez une tache</label>
   <input class="todo-content" name="todo-content" id="todo-content" type="text" required>
   <input class="button" type="submit" value="Add">
</form>


<?php
session_start();
$error = null;

try  {

   $pdo = new PDO('sqlite:./todosDB.sqlite', null, null, [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
   ]);

   if (isset($_POST['todo-content'])) {

      $query = $pdo->prepare('INSERT INTO todos (content) VALUES (:contents)');
      $query->execute([
         'contents' => htmlentities($_POST['todo-content']),
      ]);
      $_SESSION['message'] = "Todo Ajoutée";
      header("Location: /todo/index.php");

   } else if (isset($_POST['deleting'])) {
      $id = $_POST['deleting'];
      $pdo->query("DELETE FROM todos WHERE id = $id");
      $_SESSION['message'] = "Todo Supprimée";
      header("Location: /todo/index.php");

   } else if (isset($_POST['checking'])) {
      $id = $_POST['checking'];
      $pdo->query("UPDATE todos SET checked = 1 WHERE id = $id");
      $_SESSION['message'] = "Todo Checked";
      header("Location: /todo/index.php");

   } else if (isset($_POST['unchecking'])) {
      $id = $_POST['unchecking'];
      $pdo->query("UPDATE todos SET checked = 0 WHERE id = $id");
      $_SESSION['message'] = "Todo Unchecked";
      header("Location: /todo/index.php");
   }
   
   $query = $pdo->query('SELECT * FROM todos ORDER BY id DESC');
   $todos = $query->fetchAll(PDO::FETCH_CLASS);

} catch (PDOException $e) {
   $error = $e->getMessage();
} 

      
if ($error) : ?>
   <div style="text-align: center; color:red; margin-bottom: 20px"><?= $error ?></div>
<?php endif ?>

<?php if (isset($_SESSION['message'])) : ?>
   <div style="text-align: center; color: green; margin-bottom: 20px"><?= htmlentities($_SESSION['message']) ?></div>
<?php endif ?>


<div class="container-filter">
   <button id='btn1' class="buttons-filter active-btn">Tous</button>
   <button id='btn2' class="buttons-filter">Faites</button>
   <button id='btn3' class="buttons-filter">A Faire</button>
</div>


<div class="todos">

<?php foreach ($todos as $todo) :?>
   <div class="todo <?= $todo->checked === 1 ? 'checked' : 'not-checked' ?>">
      <?php if ($todo->checked === 1) : ?>
         <form class="form3" action="" method="post">
            <input type="text" name="unchecking" value="<?= $todo->id ?>" style="display: none">
            <button class="button3" name="<?= $todo->id ?>" type="submit"><img src="./checked.png" alt="oops"></button>
         </form>
      <?php else : ?>
         <form class="form4" action="" method="post">
            <input type="text" name="checking" value="<?= $todo->id ?>" style="display: none">
            <button class="button4" name="<?= $todo->id ?>" type="submit"></button>
         </form>
      <?php endif ?>
      <div style="width:70%; margin-left:auto; margin-right:auto; overflow-wrap:break-word"><?= $todo->content ?></div>
      <form class="form2" action="" method="post">
         <input type="text" name="deleting" value="<?= $todo->id ?>" style="display: none">
         <button class="button2" name="<?= $todo->id ?>" type="submit"><img src="./delete.jpg" alt="oops"></button>
      </form>
   </div>
<?php endforeach ?>


</div>


</body>
</html>