Carousel.prototype.to = function (pos) {
  var that        = this
  var activeIndex = this.getItemIndex(this.$active = this.$element.find('.item.active'))

  if (pos > (this.$items.length - 1) || pos < 0) return

  if (this.sliding)       return this.$element.one('slid.bs.carousel', function () { that.to(pos) }) // yes, "slid"
  if (activeIndex == pos) return this.pause().cycle()

  return this.slide(pos > activeIndex ? 'next' : 'prev', this.$items.eq(pos))
}﻿

Carousel.prototype.next = function () {
  if (this.sliding) return
  return this.slide('next')
}

Carousel.prototype.prev = function () {
  if (this.sliding) return
  return this.slide('prev')
}


Carousel.prototype.slide = function (type, next) {
  var $active   = this.$element.find('.item.active')
  var $next     = next || this.getItemForDirection(type, $active)
  var isCycling = this.interval
  var direction = type == 'next' ? 'left' : 'right'
  var that      = this

  if ($next.hasClass('active')) return (this.sliding = false)

  var relatedTarget = $next[0]
  var slideEvent = $.Event('slide.bs.carousel', {
    relatedTarget: relatedTarget,
    direction: direction
  })
  this.$element.trigger(slideEvent)
  if (slideEvent.isDefaultPrevented()) return

  this.sliding = true

  isCycling && this.pause()

  if (this.$indicators.length) {
    this.$indicators.find('.active').removeClass('active')
    var $nextIndicator = $(this.$indicators.children()[this.getItemIndex($next)])
    $nextIndicator && $nextIndicator.addClass('active')
  }

  var slidEvent = $.Event('slid.bs.carousel', { relatedTarget: relatedTarget, direction: direction }) // yes, "slid"
  if ($.support.transition && this.$element.hasClass('slide')) {
    $next.addClass(type)
    $next[0].offsetWidth // force reflow
    $active.addClass(direction)
    $next.addClass(direction)
    $active
      .one('bsTransitionEnd', function () {
        $next.removeClass([type, direction].join(' ')).addClass('active')
        $active.removeClass(['active', direction].join(' '))
        that.sliding = false
        setTimeout(function () {
          that.$element.trigger(slidEvent)
        }, 0)
      })
      .emulateTransitionEnd(Carousel.TRANSITION_DURATION)
  } else {
    $active.removeClass('active')
    $next.addClass('active')
    this.sliding = false
    this.$element.trigger(slidEvent)
  }

  isCycling && this.cycle()

  return this
}
