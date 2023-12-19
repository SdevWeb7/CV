import { carouselTouchPlugin } from './carouseltouchplugin.js'
import { carouselInfinitePlugin } from "./carouselinfiniteplugin.js";
import { carouselNavigationPlugin } from "./carouselnavigationplugin.js";
import { carouselPaginationPlugin } from "./carouselpaginationplugin.js";

export class Carousel {

      constructor(element, options = {}) {

            this.element = element
            this.moveCallbacks = []
            this.currentItem = 0
            this.isMobile = false
            this.offset = 0

            this.options = Object.assign({}, {
                  slidesToScroll: 1,
                  slidesVisible: 1,
                  navigation: true,
                  pagination: true,
                  loop: false,
                  infinite: false
            }, options)

            this.children = [].slice.call(element.children)


            let ratio = this.children.length / this.slidesVisible

            this.root = this.createDivWithClass('carousel')
            this.container = this.createDivWithClass('carousel__container')


            this.container.style.width = ((ratio * 100) + "%")
            this.root.setAttribute('tabindex', 0)
            this.root.appendChild(this.container)
            this.element.appendChild(this.root)


           this.items = this.children.map(child => {
                  let item = this.createDivWithClass('carousel__item')
                  item.appendChild(child)
                  return item
            });
            this.items.forEach(item => {
               this.container.appendChild(item)
            })

            if (this.options.navigation) {
              carouselNavigationPlugin(this)
              carouselTouchPlugin(this)
            }

            if (this.options.pagination) {
              carouselPaginationPlugin(this)
            }

            if (this.options.infinite) {
              carouselInfinitePlugin(this)
            }

            this.moveCallbacks.forEach(cb => cb(this.currentItem))
            this.onWindowResize()

            window.addEventListener('resize', this.onWindowResize.bind(this))

            this.setStyle()
      }

  goToItem (index, animation = true) {
    if (index <= 0) {
      if (this.options.loop) {
        if (this.currentItem === 0) {
          index = (this.items.length - this.slidesVisible)
        } else {
          index = 0
        }
      } else {
        index = 0
      }
    } else if (index >= (this.items.length - this.slidesVisible)) {
      if (this.options.loop) {
        if (this.currentItem === this.items.length - this.slidesVisible) {
          index = 0
        } else {
          index = (this.items.length - this.slidesVisible)
        }
      }
      else {
        index = (this.items.length - this.slidesVisible)
      }
    }

    let translateX = index * -100 / this.items.length
    if (animation === false) {
      this.disabledTransition()
    }

    this.translate(translateX)
    this.container.offsetHeight

    if (animation === false) {
      this.enableTransition()
    }

    this.currentItem = index
    this.moveCallbacks.forEach(cb => cb(index))

  }

  setStyle() {
            let ratio = this.items.length / this.slidesVisible
            this.container.style.width = (ratio * 100) + "%"
            this.items.forEach(item => {
                  item.style.width = ((100 / this.slidesVisible) / ratio + "%")
            });
      }

  onWindowResize () {
    let mobile = window.innerWidth < 800
    if (mobile !== this.isMobile) {
      this.isMobile = mobile
      this.setStyle()
      this.moveCallbacks.forEach(cb => cb(this.currentItem))
    }
  }

  translate (percent) {
         this.container.style.transform = 'translate3d(' + percent + '%, 0, 0)'
      }

      next () {
         this.goToItem(this.currentItem + this.slidesToScroll)
      }

      prev () {
         this.goToItem(this.currentItem - this.slidesToScroll)
      }

      onMove(cb) {
         this.moveCallbacks.push(cb)
      }

      disabledTransition () {
         this.container.style.transition = 'none'
      }

      enableTransition () {
         this.container.style.transition = ''
      }

      createDivWithClass(className) {
            let div = document.createElement('div')
            div.setAttribute('class', className)
            return div
      }

      get slidesToScroll () {
         return this.isMobile ? 1 : this.options.slidesToScroll
      }

      get slidesVisible () {
         return this.isMobile ? 1 : this.options.slidesVisible
      }

      get containerWidth () {
         return this.container.offsetWidth
      }

      get carouselWidth () {
         return this.root.offsetWidth
      }
}