<script src="js/todolist/create-todolist.js" type="module"></script>
<link rel="stylesheet" href="/js/todolist/css/todolist-template.css">

<section id="todolist"></section>
   <template id="todolist-layout">
      <form class="form-todolist">
         <input required="" class="form-todolist-input" type="text" placeholder="Acheter des patates..." name="title" data-com.bitwarden.browser.user-edited="yes">
         <button>Ajouter</button>
      </form>

         <div class="button-group-todolist" role="group">
            <button type="button" class="button-filter active-button" data-filter="all">Toutes</button>
            <button type="button" class="button-filter" data-filter="todo">A faire</button>
            <button type="button" class="button-filter" data-filter="done">Faites</button>
         </div>

         <ul class="todolist-ul">

         </ul>
   </template>

   <template id="todolist-item">
      <li class="todo-li">
         <input type="checkbox" class="todo-checkbox">
         <label class="todo-label"></label>
         <button class="todo-button"><svg><use href="svg/images.svg#todo-delete"></use></svg></button>
      </li>
   </template>