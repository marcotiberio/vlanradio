import $ from 'jquery'

class SearchButton extends window.HTMLDivElement {
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
    this.$button = $('.searchForm-open', this)
    this.$buttonClose = $('.searchForm-close', this)
    this.$searchForm = $('.searchForm', this)
  }

  bindFunctions () {
    this.showSearchForm = this.showSearchForm.bind(this)
    this.hideSearchForm = this.hideSearchForm.bind(this)
  }

  bindEvents () {
    this.$button.on('click', this.showSearchForm)
    this.$buttonClose.on('click', this.hideSearchForm)
  }

  showSearchForm (e) {
    console.log('search form')
    this.$searchForm.toggleClass('searchForm-show')
    this.$buttonClose.toggle()
    this.$button.toggle()
  }

  hideSearchForm (e) {
    console.log('search form close')
    this.$searchForm.toggleClass('searchForm-show')
    this.$buttonClose.toggle()
    this.$button.toggle()
  }
}

window.customElements.define('flynt-search-button', SearchButton, { extends: 'div' })
