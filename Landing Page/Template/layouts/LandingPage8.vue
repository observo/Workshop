<template>
  <div data-spy="scroll" data-offset="80">
    <Loader />
    <HeaderStyle1 :logo-img="logo" :nav-item-list="navItems" :styled-logo="true" class-name="header-white">
        <a href="#" class="button-line pull-right" slot="navContent">Download</a>
    </HeaderStyle1>
    <nuxt />
    <ColorCustomizer />
    <ScrollTop />
  </div>
</template>

<script>
import {menu} from '../config/constant.js'
import logoImg from '../assets/images/logo-footer.png'

export default {
  name: 'LandingPage8',
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

        { href: '#iq-services', title: 'Service' },
        { href: '#iq-team', title: 'Team' },
        { href: '#iq-counter', title: 'Counter' },
        { href: '#contact', title: 'Contact' }
      ]
    }
  }
}
</script>

<style>
    @import url('../assets/css/color/style.css');
</style>
