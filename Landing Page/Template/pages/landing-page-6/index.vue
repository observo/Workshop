<template>
  <div>
    <!--<Loader />-->
    <Home />
    <About />
    <Features />
    <Team />
    <Pricing />
    <Blog />
    <Clients />
    <Contact />
    <Footer />
  </div>
</template>

<script>
import { sofbox } from '../../assets/app/app'

import Home from '../../components/LandingPage6/Home'
import About from '../../components/LandingPage6/About'
import Features from '../../components/LandingPage6/Features'
import Team from '../../components/LandingPage6/Team'
import Pricing from '../../components/LandingPage6/Pricing'
import Blog from '../../components/LandingPage6/Blog'
import Clients from '../../components/LandingPage6/Clients'
import Contact from '../../components/LandingPage1/Contact'
import Footer from '../../components/LandingPage6/Footer'
/*
import Loader from '../../components/sofbox/Loader'
*/
export default {
  name: 'Index',
  layout: 'LandingPage6',
  components: {
    Home,
    About,
    Footer,
    Contact,
    Clients,
    Blog,
    Pricing,
    Team,
    Features },
  mounted () {
    sofbox.index()
  }
}
</script>
