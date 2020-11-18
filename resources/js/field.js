Nova.booting((Vue, router, store) => {
  Vue.component('index-BlocklyField', require('./components/IndexField'))
  Vue.component('detail-BlocklyField', require('./components/DetailField'))
  Vue.component('form-BlocklyField', require('./components/FormField'))
})
