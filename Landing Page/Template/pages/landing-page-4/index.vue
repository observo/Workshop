<template>
  <div>
    <Home />
    <About />
    <Service />
    <Features />
    <blog />
    <AboutMe />
    <Clients />
    <Contact />
    <Footer />
  </div>
</template>

<script>
import Home from '../../components/LandingPage4/Home'
import { sofbox } from '../../assets/app/app'
import About from '../../components/LandingPage4/About'
import Service from '../../components/LandingPage4/Service'
import Features from '../../components/LandingPage4/Features'
import Blog from '../../components/LandingPage4/Blog'
import AboutMe from '../../components/LandingPage4/About-Me'
import Clients from '../../components/LandingPage2/Clients'
import Contact from '../../components/LandingPage4/Contact'
import Footer from '../../components/LandingPage4/Footer'

export default {
  layout: 'LandingPage4',
  name: 'Index',
  components: {
    Home, About, Service, Features, Blog, AboutMe, Clients, Contact, Footer
  },
  mounted () {
    sofbox.index()
  }
}
</script>

<style scoped>

</style>
