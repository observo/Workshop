<template>
  <div data-spy="scroll" data-offset="80">
    <Loader />
    <HeaderStyle1 :logo-img="logo" :nav-item-list="navItems" :styled-logo="styleLogo" class-name="header-white p-0">
      <a href="#" slot="navContent" class="button pull-right">Download</a>
    </HeaderStyle1>
    <nuxt />
  </div>
</template>

<script>
import {menu} from '../config/constant.js'
import logoImg from '../assets/images/logo-footer.png'
import TopbarStyle1 from '../components/sofbox/Partials/Topbar/TopbarStyle1'

export default {
  name: 'LandingPage7',
  // eslint-disable-next-line vue/no-unused-components
  components: { TopbarStyle1 },
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
        { href: '#pricing', title: 'Pricing' },
        { href: '#team', title: 'Team' },
        { href: '#blog', title: 'Blog' },
        { href: '#contact-us', title: 'Contact' }
      ]
    }
  }
}
</script>

<style>
    @import url('../assets/css/color/style.css');
</style>
