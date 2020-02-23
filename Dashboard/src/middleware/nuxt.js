const { Nuxt, Builder } = require('nuxt')
const nuxtConfig = require('../../nuxt.config')

const nuxt = new Nuxt(nuxtConfig)

// if (nuxtConfig.dev) {
if (nuxtConfig.dev) {
  const builder = new Builder(nuxt)
  builder.build()
} else nuxt.ready()

module.exports = nuxt
