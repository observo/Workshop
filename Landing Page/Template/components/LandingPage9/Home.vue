<template>
  <ParallaxStyle1 :bg-image="bgImage" ids="iq-home" class-names="iq-banner-07 overview-block-ptb iq-bg-over iq-parallax">
    <div class="container">
      <div class="banner-text">
        <div class="row">
          <div class="col-lg-6">
            <h1 class="iq-font-black text-uppercase iq-tw-5">
              <b>We are <span class="iq-font-blue">Building Software</span> to Help</b>
            </h1>
            <p class="iq-font-black iq-pt-15 iq-mb-40">
              Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
            </p>
            <div class="waves-box">
              <a href="http://www.youtube.com/watch?v=0O2aH4XLbto" class="iq-video popup-youtube"><i class="ion-ios-play-outline" /></a>
              <div class="iq-waves">
                <div class="waves wave-1" />
                <div class="waves wave-2" />
                <div class="waves wave-3" />
              </div>
            </div>
            <a href="javascript:void(0)" class="button iq-mt-5 iq-ml-40">Download</a>
          </div>
          <div class="col-lg-6" />
        </div>
      </div>
    </div>
  </ParallaxStyle1>
</template>
<script>

export default {
  name: 'Home',

  data () {
    return {
      bgImage: require('../../assets/images/bg/09.jpg')
    }
  }
}
</script>
