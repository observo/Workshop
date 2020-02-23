<template>
  <div data-spy="scroll" data-offset="80">
    <Loader />
    <HeaderStyle1 :logo-img="logo" :nav-item-list="navItems" :styled-logo="styleLogo">
      <a slot="navContent" href="#" class="button bt-black pull-right">Download</a>
    </HeaderStyle1>
    <nuxt />
  </div>
</template>
<script>
import {menu} from '../config/constant.js'
import logoImg from '../assets/images/logo.png'
export default {
  name: 'LandingPage2',
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
        { href: '#how-it-works', title: 'About' },
        { href: '#software-features', title: 'Service' },
        { href: '#great-screenshots', title: 'Screenshots' },
        { href: '#contact', title: 'Contact' }
      ]
    }
  },
  mounted () {
  }
}
</script>
<style>
  @import url('../assets/css/color/style.css');
</style>
