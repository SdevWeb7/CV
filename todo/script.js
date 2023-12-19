document.querySelectorAll('.buttons-filter').forEach(button => {
   button.addEventListener('click', toggleFilter)
})


document.querySelector('#btn1').addEventListener('click', btn1);
document.querySelector('#btn2').addEventListener('click', btn2);
document.querySelector('#btn3').addEventListener('click', btn3);



function btn1 () {
   document.querySelectorAll('.todo').forEach(todo => {
      todo.style.display = 'block';
   })
}

function btn2 () {
   document.querySelectorAll('.not-checked').forEach(todo => {
      todo.style.display = 'none';
   })
   document.querySelectorAll('.checked').forEach(todo => {
      todo.style.display = 'block';
   })
}

function btn3 () {
   document.querySelectorAll('.checked').forEach(todo => {
      todo.style.display = 'none';
   })
   document.querySelectorAll('.not-checked').forEach(todo => {
      todo.style.display = 'block';
   })
}


// FILTER
function toggleFilter (e) {
   e.currentTarget.parentElement.querySelector('.active-btn').classList.remove('active-btn');
   e.currentTarget.classList.add("active-btn");
   
}

