export function carouselTouchPlugin (carousel) {

    carousel.container.addEventListener('dragstart', e => e.preventDefault())
    carousel.container.addEventListener('mousedown', e =>  startDrag(e, carousel))
    carousel.container.addEventListener('touchstart', e => startDrag(e, carousel))
    window.addEventListener('mousemove', e => drag(e, carousel))
    window.addEventListener('touchmove', e => drag(e, carousel))
    window.addEventListener('touchend', () => endDrag(carousel))
    window.addEventListener('mouseup', () => endDrag(carousel))
    window.addEventListener('touchcancel', () => endDrag(carousel))

    carousel.root.addEventListener('keyup', () => {
      if (carousel.element.key === 'ArrowRight') {
        carousel.next()
      } else if (carousel.element.key === 'ArrowLeft') {
        carousel.prev()
      }
    })
  }

  function startDrag (e, carousel) {
    if (e.touches) {
      if (e.touches.length > 1) {
        return
      } else {
        e = e.touches[0]
      }
    }
    carousel.origin = {x: e.screenX, y: e.screenY}
    carousel.width = carousel.containerWidth
    carousel.disabledTransition()
  }

function drag (e, carousel) {

    if (carousel.origin) {
      let point = e.touches ? e.touches[0] : e
      let translate = {x: point.screenX - carousel.origin.x, y: point.screenY - carousel.origin.y}
      let baseTranslate = carousel.currentItem * -100 / carousel.items.length

      carousel.lastTranslate = translate
      carousel.translate(baseTranslate + 100 * translate.x / carousel.width)
    }
  }

function endDrag (carousel) {

    if (carousel.origin && carousel.lastTranslate) {

      carousel.enableTransition()

      if (Math.abs(carousel.lastTranslate.x / carousel.carouselWidth) > 0.2) {
        if (carousel.lastTranslate.x < 0) {
          carousel.next()
        } else {
          carousel.prev()
        }
      } else {
        carousel.goToItem(carousel.currentItem)
      }
    }
    carousel.origin = null
  }
