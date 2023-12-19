export function carouselNavigationPlugin (carousel) {

    let nextButton = carousel.createDivWithClass('carousel__next')
    let prevButton = carousel.createDivWithClass('carousel__prev')

    carousel.root.appendChild(nextButton)
    carousel.root.appendChild(prevButton)

    nextButton.addEventListener('click', carousel.next.bind(carousel))
    prevButton.addEventListener('click', carousel.prev.bind(carousel))



    carousel.onMove(index => {

      if (index === 0 && (carousel.options.loop === false)) {
        prevButton.classList.add('carousel__prev-hidden')
      } else {
        prevButton.classList.remove('carousel__prev-hidden')
      }

      if (index === (carousel.items.length - carousel.slidesVisible) && (carousel.options.loop === false)) {
        nextButton.classList.add('carousel__next-hidden')
      } else {
        nextButton.classList.remove('carousel__next-hidden')
      }
    })
}