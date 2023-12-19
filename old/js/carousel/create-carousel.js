import { Carousel } from './Carousel.js'

new Carousel(document.querySelector('#carousel1'), {
  slidesToScroll: 1,
  slidesVisible: 3,
  infinite: true
})
new Carousel(document.querySelector('#carousel2'), {
  slidesToScroll: 1,
  slidesVisible: 4,
  loop: true
})
new Carousel(document.querySelector('#carousel3'), {
  slidesToScroll: 1,
  slidesVisible: 3,
})