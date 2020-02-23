<template>
  <div>
    <Home />
    <About />
    <OurService />
    <Features />
    <Contact />
    <Footer />
    <ColorCustomizer />
    <ScrollTop />
  </div>
</template>

<script>
import Home from '../../components/LandingPage3/Home'
import About from '../../components/LandingPage3/About'
import OurService from '../../components/LandingPage3/OurService'
import Features from '../../components/LandingPage3/Features'
import Contact from '../../components/LandingPage3/Contact'
import Footer from '../../components/LandingPage3/Footer'
import { sofbox } from '../../assets/app/app'

export default {
  layout: 'LandingPage3',
  name: 'Index',
  components: {
    Home, About, OurService, Features, Contact, Footer
  },
  mounted () {
    sofbox.index()
  }
}
</script>

<style scoped>

</style>
