export default async function (ctx, inject) {
  const icons = {"64x64":"/sofbox-vue/_nuxt/icons/icon_64.4fbc6f.png","120x120":"/sofbox-vue/_nuxt/icons/icon_120.4fbc6f.png","144x144":"/sofbox-vue/_nuxt/icons/icon_144.4fbc6f.png","152x152":"/sofbox-vue/_nuxt/icons/icon_152.4fbc6f.png","192x192":"/sofbox-vue/_nuxt/icons/icon_192.4fbc6f.png","384x384":"/sofbox-vue/_nuxt/icons/icon_384.4fbc6f.png","512x512":"/sofbox-vue/_nuxt/icons/icon_512.4fbc6f.png"}
  const getIcon = size => icons[size + 'x' + size] || ''
  inject('icon', getIcon)
}
