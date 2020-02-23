<template>
  <ParallaxStyle1 ids="iq-home" :bg-image="bgImage" class-names="iq-banner-07 hero-section  overview-block-pt iq-bg-over iq-over-black-10  iq-parallax">
    <div class="container">
      <div class="banner-text">
        <div class="row">
          <div class="col-md-6">
            <h1 class="text-uppercase iq-tw-3">
              Provides To Make Better <b class="iq-tw-7">software</b>
            </h1>
            <p class="iq-pt-15 iq-mb-40">
              Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
            <a href="javascript:void(0)" class="button bt-blue">Download</a>
          </div>
        </div>
      </div>
    </div>
  </ParallaxStyle1>
</template>

<script>
import ParallaxStyle1 from '../sofbox/Parallax/ParallaxStyle1'
export default {
  name: 'Home',
  components: { ParallaxStyle1 },
  data () {
    return {
      bgImage: require('../../assets/images/bg/10.jpg')
    }
  }
}
</script>
