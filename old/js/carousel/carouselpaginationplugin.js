export function carouselPaginationPlugin (carousel) {

    let pagination = carousel.createDivWithClass('carousel__pagination')
    let buttons = []
    carousel.root.appendChild(pagination)

    for (let i = 0 ; i <= (carousel.items.length  - carousel.options.slidesVisible) ; i = i + carousel.options.slidesToScroll) {
      let button = carousel.createDivWithClass('carousel__pagination__button')
      button.addEventListener('click', () => carousel.goToItem(i + carousel.offset))
      pagination.appendChild(button)
      buttons.push(button)
    }

    carousel.onMove(index => {
      let count = carousel.items.length - 2 * carousel.offset
      let activeButton = buttons[Math.floor(((index - carousel.offset) % count) / (carousel.options.slidesToScroll))]

      if (activeButton) {
        buttons.forEach(button => button.classList.remove('carousel__pagination__button-active'))
        activeButton.classList.add('carousel__pagination__button-active')
      }
    })

}