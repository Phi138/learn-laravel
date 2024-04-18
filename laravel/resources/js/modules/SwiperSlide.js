export default class SwiperSlide {
  constructor() {
    this.$el = $('.mod-swiper')
  }

  init() {
    if (this.$el.length) {
      this.addSwiper()
    }
  }

  addSwiper() {
    new Swiper(this.$el.find('.swiper-1')[0], {
      loop: true,
      navigation: {
        nextEl: this.$el.find('.swiper-button-next')[0],
        prevEl: this.$el.find('.swiper-button-prev')[0],
      },
      pagination: {
        el: this.$el.find('.swiper-pagination')[0],
        clickable: true,
      },
      autoplay: {
        delay: 100000,
        disableOnInteraction: false,
      },
      keyboard: {
        enabled: true,
      },
      a11y: {
        enabled: true,
        prevSlideMessage: 'Previous slide',
        nextSlideMessage: 'Next slide',
        firstSlideMessage: 'This is the first slide',
        lastSlideMessage: 'This is the last slide',
        paginationBulletMessage: 'Go to slide {{index}}',
      },
      on: {
        slideChange: (event) => {
          console.log(event)
          console.log(event.activeIndex)
        },
      },
    })
  }
}
new SwiperSlide().init()
