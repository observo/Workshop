<template>
  <div data-spy="scroll" data-offset="80">
    <Loader />
    <HeaderStyle1 :logo-img="logo" :nav-item-list="navItems" :styled-logo="true" class-name="header-white" />

    <nuxt />
    <ColorCustomizer />
    <ScrollTop />
  </div>
</template>

<script>
import {menu} from '../config/constant.js'
import logoImg from '../assets/images/logo-footer.png'

export default {
  name: 'LandingPage9',
  components: { },
  head () {
    return {
      bodyAttrs: {
        'data-spy': 'scroll',
        'data-offset': '80'
      }
    }
  },

  data () {
    return {
      styleLogo: false,
      logo: logoImg,
      navItems: [
        { href: '#iq-home',
          title: 'Home',
          active: true,
          children: true,
          child: menu
        },

        { href: '#iq-about-us', title: 'About' },
        { href: '#iq-software-features', title: 'Features' },
        { href: '#iq-services', title: 'Services' },
        { href: '#iq-faq', title: 'Faq' },
        { href: '#contact', title: 'Contact' }
      ]
    }
  }
}
</script>

<style>
    @import url('../assets/css/color/style.css');
</style>
