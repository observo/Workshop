<template>
  <div>
    <Home />
    <About />
    <Features />
    <Service />
    <Pricing />
    <Testimonial />
    <Clients />
    <Faq />
    <GetInTouch />
    <div class="footer iq-pt-20">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 text-center iq-font-dark">
            <div class="iq-pb-20">
              © 2019 Sofbox Developed by <b>iqonicthemes</b>.
            </div>
          </div>
        </div>
      </div>
    </div>
    <ColorCustomizer />
    <ScrollTop />
  </div>
</template>

<script>
import { sofbox } from '../../assets/app/app'
import Home from '../../components/LandingPage5/Home'
import About from '../../components/LandingPage5/About'
import Features from '../../components/LandingPage5/Features'
import Service from '../../components/LandingPage5/Service'
import Testimonial from '../../components/LandingPage5/Testimonial'
import Clients from '../../components/LandingPage5/Clients'
import Pricing from '../../components/LandingPage5/Pricing'
import Faq from '../../components/LandingPage5/Faq'
import GetInTouch from '../../components/LandingPage5/GetInTouch'

export default {
  name: 'Index',
  layout: 'LandingPage5',
  components: {
    GetInTouch,
    Faq,
    Pricing,
    Clients,
    Testimonial,
    Service,
    Features,
    About,
    Home

  },
  mounted () {
    sofbox.index()
  }
}
</script>

<style scoped>

</style>
