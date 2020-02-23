<template>
  <div class="main-content">
    <Home />
    <About />
    <Features />
    <Service />
    <FullFeatures />
    <StillThinking />
    <HowWorks />
    <Faq />
    <Footer />
  </div>
</template>

<script>
import { sofbox } from '../../assets/app/app'
import Home from '../../components/LandingPage9/Home'
import About from '../../components/LandingPage9/About'
import Features from '../../components/LandingPage9/Features'
import Service from '../../components/LandingPage9/Service'
import FullFeatures from '../../components/LandingPage9/FullFeatures'
import StillThinking from '../../components/LandingPage9/StillThinking'
import HowWorks from '../../components/LandingPage9/HowWorks'
import Faq from '../../components/LandingPage9/Faq'
import Footer from '../../components/LandingPage9/Footer'

export default {
  name: 'Index',
  layout: 'LandingPage9',
  components: {
    Home,
    About,
    Features,
    Service,
    FullFeatures,
    StillThinking,
    HowWorks,
    Faq,
    Footer
  },
  mounted () {
    sofbox.index()
  }
}
</script>
