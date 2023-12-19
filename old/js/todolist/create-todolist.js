import { TodoList } from '/js/todolist/Todolist.js';
import { alertDiv } from '/js/functions.js';

let todosRandom = [
   {
      "userId": 1,
      "id": 1,
      "title": "Faire mes devoirs",
      "completed": false
   },
   {
      "userId": 1,
      "id": 2,
      "title": "Acheter des Patates Douces",
      "completed": false
   },
   {
      "userId": 1,
      "id": 3,
      "title": "Lire le livre : 'Le Seigneur Des Anneaux'",
      "completed": false
   },
   {
      "userId": 1,
      "id": 4,
      "title": "Ranger ma chambre",
      "completed": true
   },
   {
      "userId": 1,
      "id": 5,
      "title": "Jouer au Foot",
      "completed": false
   }
]

let todos = []

/*
let todosInStorage = []
if ((JSON.parse(localStorage.getItem('todos').toString()).length) > 0) {
   for (let store of JSON.parse(localStorage.getItem('todos').toString())) {
      todosInStorage.unshift(store)
   }
   for (let tod of todosInStorage) {
      todos.unshift(tod)
   }
} else {
   for (let random of todosRandom) {
      todos.unshift(random)
   }
}
*/

for (let random of todosRandom) {
   todos.unshift(random)
}
try {
   const list = new TodoList(todos)
   list.appendTo(document.querySelector('#todolist'))

} catch (e) {
   console.log(e)
   alertDiv()
}