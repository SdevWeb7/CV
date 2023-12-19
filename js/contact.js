const observer5 = new IntersectionObserver(entries => {
   entries.forEach(entry => {
      if (entry.isIntersecting) {
         entry.target.style.transform = 'scale(1, 1)';
      } else {
         entry.target.style.transform = 'scale(0.3, 0.3)';

      }
   })
})
observer5.observe(document.querySelector('.formulaire-contact'))