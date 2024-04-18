export default class Header {
  constructor() {
    this.header = '#header'
    this.$header = $(this.header)
    this.numberScrol = 0
    this.scrollTop = 0
    this.class = 'pin-header'
  }

  init() {
    if (this.$header.length) {
      this.scrollPinHeader()
    }
  }

  scrollPinHeader() {
    this.settingPin()
    $(window).on('scroll resize orientationchange', () => {
      this.settingPin()
    })
  }

  settingPin() {
    this.scrollTop = $(window).scrollTop()
    if (this.scrollTop > this.numberScrol) {
      this.$header.addClass(this.class)
    } else {
      this.$header.removeClass(this.class)
    }
  }
}
new Header().init()
