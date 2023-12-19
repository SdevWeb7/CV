const liens = document.querySelectorAll('a');
const header = document.querySelector('.header');
const header2 = document.querySelector('.header2');
const svgList = document.querySelector('.menu1 svg');
const svgExit = document.querySelector('.menu2 svg');
const menuFutur = document.querySelector('.menu-futur');


/* Animation Barre sous les liens */

liens.forEach(lien => {
   lien.addEventListener('mouseenter', (e) => {
      e.currentTarget.querySelector('.barre').animate([
         {transform: 'translateX(0px)'},
         {transform: 'translateX(90px)'}
      ], {
         duration: 500,
         fill: "both"
      });
   })
})

liens.forEach(lien => {
   lien.addEventListener('mouseleave', (e) => {
      e.currentTarget.querySelector('.barre').animate([
         {transform: 'translateX(90px)'},
         {transform: 'translateX(180px)'}
      ], {
         duration: 500,
         fill: "forwards"
      });
   })
})



/* Animation Header2 */

function scrollUpListener() {
   let lastScrollY = window.scrollY;

   return function() {

      if (window.scrollY < lastScrollY) {
         header2.style.display = 'flex'
         header2.animate([
            {top: '-60px'},
            {top: '0'},
            {opacity: 1}
         ],{
            duration: 1500,
            fill: 'forwards'
         })
      }
      lastScrollY = window.scrollY;
   };
}

function scrollDownListener() {
   let lastScrollY = window.scrollY;

   return function() {
      if (window.scrollY > lastScrollY) {
         header2.style.display = 'none'
         header2.animate([

         ],{
            duration: 400,
            fill: 'forwards'
         })
      }
      lastScrollY = window.scrollY;
   };
}

const observer = new IntersectionObserver(entry => {
   if (entry[0].isIntersecting) {
      header2.style.display = 'none'
      header2.animate([
         {opacity: 0}
      ],{
         duration: 100,
         fill: 'forwards'
      })
   }
})

observer.observe(header)
window.addEventListener('scroll', scrollUpListener())
window.addEventListener('scroll', scrollDownListener());



/* Animation Menu */

svgExit.style.display = "none";
menuFutur.style.display = "none";

svgList.addEventListener('click', () => {

   svgList.animate([
         {opacity: 0},
         {transform: 'rotate(-180deg)'}
      ],
      {
         duration: 500,
         fill: 'forwards'
      })

   setTimeout(() => {
      svgList.style.display = 'none';
      svgExit.style.display = 'inline';
      menuFutur.style.display = "flex";
   }, 300)
   menuFutur.animate([
         {width: 0, height: 0, opacity: 0},
         {width: '300px', height: '400px', opacity: .9},
      ],
      {
         duration: 500,
         fill: "forwards"
      })

   svgExit.animate([
         {opacity: 0},
         {opacity: 1},
         {transform: 'rotate(-180deg)'}
      ],
      {
         duration: 500,
         fill: 'forwards'
      });
});


svgExit.addEventListener('click', () => {

   svgExit.animate([
         {opacity: 0},
         {transform: 'rotate(0deg)'}
      ],
      {
         duration: 100,
         fill: 'forwards'
      })

      svgExit.style.display = 'none';
      svgList.style.display = 'inline';
      menuFutur.style.display = "none";

   menuFutur.animate([
         {width: '300px', height: '400px'},
         {width: 0, height: 0},
      ],
      {
         duration: 500,
         fill: "forwards"
      })

   svgList.animate([
         {opacity: 0},
         {opacity: 1},
         {transform: 'rotate(0deg)'}
      ],
      {
         duration: 500,
         fill: 'forwards'
      });
})

