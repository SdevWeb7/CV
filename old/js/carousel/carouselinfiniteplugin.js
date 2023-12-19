export function carouselInfinitePlugin (carousel) {

      carousel.offset = (carousel.options.slidesVisible + carousel.options.slidesToScroll)

      carousel.items = [
        ...carousel.items.slice(carousel.items.length - carousel.offset).map(item => item.cloneNode(true)),
        ...carousel.items,
        ...carousel.items.slice(0, carousel.offset).map(item => item.cloneNode(true)),
      ]

      carousel.items.map(child => {
        let item = carousel.createDivWithClass('carousel__item')
        item.appendChild(child)
        return item
      });

      carousel.items.forEach(item => {
        carousel.container.appendChild(item)
      })


      carousel.goToItem(carousel.offset, false)

      carousel.container.addEventListener('transitionend', () => resetInfinite(carousel))


  function resetInfinite (carousel) {

    if (carousel.currentItem <= carousel.options.slidesToScroll) {
      carousel.goToItem(carousel.currentItem + (carousel.items.length - 2 * carousel.offset), false)
    } else if (carousel.currentItem >= (carousel.items.length - carousel.offset)) {
      carousel.goToItem(carousel.currentItem - (carousel.items.length - 2 * carousel.offset), false)
    }
  }
}