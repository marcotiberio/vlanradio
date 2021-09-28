import $ from 'jquery'

class NavigationFooter extends window.HTMLDivElement {
  constructor (...args) {
    const self = super(...args)
    self.init()
    return self
  }

  init () {
    this.$ = $(this)
    this.resolveElements()
    this.bindFunctions()
    this.bindEvents()
  }

  resolveElements () {
    this.$button = $('#backToTop', this)
  }

  bindFunctions () {
    this.scrollToTop = this.scrollToTop.bind(this)
  }

  bindEvents () {
    this.$button.on('click', this.scrollToTop)
  }

  scrollToTop (e) {
    const $body = $('html')
    $body.scrollTop('slow')
  }
}

window.customElements.define('flynt-navigation-footer', NavigationFooter, { extends: 'div' })
