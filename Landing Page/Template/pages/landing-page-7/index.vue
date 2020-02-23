<template>
  <div class="main-content">
    <Home />
    <About/>
    <Service/>
    <Specialities/>
    <Counter/>
    <Testimonial/>
    <Pricing/>
    <Team/>
    <CompareServices/>
    <Faq/>
    <Blog/>
    <Client/>
    <footer>
      <ParallaxStyle1 :bg-image="require('assets/images/bg/01.jpg')" class-names="iq-ptb-100 iq-newsletter iq-bg-over iq-over-blue-90 jarallax">
        <div class="container">
          <div class="row">
            <div class="col-sm-12">
              <div class="heading-title white iq-mb-25">
                <h3 class="title iq-tw-7">Subscribe Our Newsletter</h3>
              </div>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-lg-7">
              <form class="form-inline">
                <input type="text" name="email" value="..." autocomplete="username email" style="display: none;" />
                <div class="form-group">
                  <label for="inputPassword2" class="sr-only">Password</label>
                  <input type="email" class="form-control" id="inputPassword2" placeholder="Enter your email" autocomplete="new-password">
                </div>
                <a class="button bt-black iq-ml-25" href="javascript:void(0)">subscribe</a>
              </form>
            </div>
          </div>
        </div>
      </ParallaxStyle1>
      <Contact />
      <FooterStyle3>
        <template slot="address">1234 North Avenue Luke Lane, South Bend, IN 360001</template>
        <template slot="phone">+0123 456 789
          <br>Mon-Fri 8:00am - 8:00pm
          <br>
        </template>
        <template slot="mail">support@sofbox.com
          <br>24 X 7 online support
          <br>
        </template>
        <ul slot="links">
          <li><a href="javascript:void(0)"><i class="fab fa-twitter"></i></a></li>
          <li><a href="javascript:void(0)"><i class="fab fa-facebook"></i></a></li>
          <li><a href="javascript:void(0)"><i class="fab fa-google"></i></a></li>
          <li><a href="javascript:void(0)"><i class="fab fa-github"></i></a></li>
        </ul>
      </FooterStyle3>
    </footer>
  </div>
</template>

<script>
import { sofbox } from '../../assets/app/app'
import Home from '../../components/LandingPage7/Home'
import About from '../../components/LandingPage7/About'
import Service from '../../components/LandingPage7/Service'
import Specialities from '../../components/LandingPage7/Specialities'
import Counter from '../../components/LandingPage7/Counter'
import Testimonial from '../../components/LandingPage7/Testimonial'
import Pricing from '../../components/LandingPage7/Pricing'
import Team from '../../components/LandingPage7/Team'
import CompareServices from '../../components/LandingPage7/CompareServices'
import Faq from '../../components/LandingPage7/Faq'
import Blog from '../../components/LandingPage7/Blog'
import Client from '../../components/LandingPage7/Client'
import Contact from '../../components/LandingPage7/Contact'
import Footer from '../../components/LandingPage7/Footer'

export default {
  name: 'Index',
  layout: 'LandingPage7',
  components: {
      Home,
      About,
      Service,
      Specialities,
      Counter,
      Testimonial,
      Pricing,
      Team,
      CompareServices,
      Faq,
      Blog,
      Client,
      Contact,
      Footer
  },
  mounted () {
    sofbox.index()
  }
}
</script>
