<template>
  <div>
    <Home />
    <div class="main-content">
      <FancyCards />
      <About />
      <OurService />
      <ScreenShot />
      <AboutApp />
      <Clients />
      <Overview />
      <Footer />
    </div>
    <ColorCustomizer />
    <ScrollTop />
  </div>
</template>
<script>
import Home from '../../components/LandingPage2/Home'
import About from '../../components/LandingPage2/About'
import FancyCards from '../../components/LandingPage2/FancyCards'
import OurService from '../../components/LandingPage2/OurService'
import ScreenShot from '../../components/LandingPage2/Screenshot'
import AboutApp from '../../components/LandingPage2/AboutApp'
import Clients from '../../components/LandingPage2/Clients'
import Overview from '../../components/LandingPage2/Overview'
import Footer from '../../components/LandingPage2/Footer'
import { sofbox } from '../../assets/app/app'

export default {
  layout: 'LandingPage2',
  name: 'Index',
  components: {

    Home, FancyCards, About, OurService, ScreenShot, AboutApp, Clients, Overview, Footer
  },
  data () {
    return {

    }
  },
  mounted () {
    sofbox.index()
  }
}
</script>
