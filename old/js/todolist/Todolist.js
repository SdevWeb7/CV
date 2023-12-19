export class TodoList {

   #todos = []
   #listElement = []

   constructor (todos) {
      this.#todos = todos
   }

   appendTo (element) {

      element.append(document.getElementById('todolist-layout').content.cloneNode(true))

      this.#listElement = element.querySelector('.todolist-ul')

      for (let todo of this.#todos) {
         const t = new TodoListItem (todo)
         this.#listElement.append(t.element)
      }

      element.querySelector('.form-todolist').addEventListener('submit', e => this.#onSubmit(e))
      element.querySelectorAll('.button-filter').forEach(button => {
         button.addEventListener('click', e => this.#toggleFilter(e))
      });

      this.#listElement.addEventListener('delete', ({detail: todo}) => {
         this.#todos = this.#todos.filter(tasks => tasks !== todo)
         //this.#onUpdate()
      })

      this.#listElement.addEventListener('toggle', ({detail: todo}) => {
         todo.completed = !todo.completed
         //this.#onUpdate()
      })
   }

   #onSubmit (event) {
      event.preventDefault()
      const form = event.currentTarget
      const title = new FormData(form).get('title').toString().trim()

      if (title === '') {
         return
      }
      const todo = {
         id: Date.now(),
         title,
         completed: false
      }

      const item = new TodoListItem(todo)

      this.#listElement.prepend(item.element)

      this.#todos.unshift(todo)
      this.#onUpdate()
      form.reset()
   }

   #onUpdate () {
      //localStorage.setItem('todos', JSON.stringify(this.#todos))
   }

   #toggleFilter (e) {
      e.preventDefault()
      const filter = e.currentTarget.getAttribute('data-filter')
      e.currentTarget.parentElement.querySelector('.active-button').classList.remove('active-button')
      e.currentTarget.classList.add('active-button')

      if (filter === 'todo') {
         this.#listElement.classList.add('hide-completed')
         this.#listElement.classList.remove('hide-todo')
      } else if (filter === 'done') {
         this.#listElement.classList.add('hide-todo')
         this.#listElement.classList.remove('hide-completed')
      } else {
         this.#listElement.classList.remove('hide-completed')
         this.#listElement.classList.remove('hide-todo')
      }
   }
}


export class TodoListItem {

   #element
   #todo

   constructor (todo) {

      this.#todo = todo
      const id = `todo-${todo.id}`

      const li = document.querySelector('#todolist-item').content.cloneNode(true).firstElementChild

      this.#element = li

      const checkbox = li.querySelector('.todo-checkbox')
      checkbox.setAttribute('id', id)
      if(todo.completed) {
         checkbox.setAttribute('checked', '')
      }

      const label = li.querySelector('.todo-label')
      label.setAttribute('for', id)
      label.innerHTML = `${todo.title}`

      const button = li.querySelector('.todo-button')

      this.#toggle(checkbox)

      button.addEventListener('click', e => this.#remove(e))
      checkbox.addEventListener('change', e => this.#toggle(e.currentTarget))
   }

   get element () {
      return this.#element
   }

   #toggle(checkbox) {
      if (checkbox.checked) {
         this.#element.classList.add('is-completed')
      } else {
         this.#element.classList.remove('is-completed')
      }

      const event = new CustomEvent('toggle', {
         detail: this.#todo,
         bubbles: true
      })

      this.#element.dispatchEvent(event)
   }

   #remove(e) {

      e.preventDefault()

      const event = new CustomEvent('delete', {
         detail: this.#todo,
         bubbles: true,
         cancelable: true
      })

      this.#element.dispatchEvent(event)

      if (event.defaultPrevented) {
         return
      }

      this.#element.remove()
   }
}