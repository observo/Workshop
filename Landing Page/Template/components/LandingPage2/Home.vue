<template>
  <ParallaxStyle1
    ids="iq-home"
    class-names="iq-banner overview-block-pt iq-bg-over iq-over-blue-90 iq-parallax"
    :bg-image="require('../../assets/images/bg/10.jpg')"
  >
    <div class="container-fluid">
      <div class="banner-text">
        <div class="row">
          <div class="col-lg-6">
            <h1 class="text-uppercase iq-font-white iq-tw-3">
              We are building <b class="iq-tw-7">software</b> to help
            </h1>
            <p class="iq-font-white iq-pt-15 iq-mb-40">
              We are a company boutique for digital transformation and software development that offers state-of - the-art engineering solutions, helping  businesses and business customers untangle complicated problems.
            </p>
            <!--<div class="waves-box">
              <a href="http://www.youtube.com/watch?v=kzyFmrFky7Y" class="iq-video popup-youtube" target="_blank"><i class="ion-ios-play-outline" /></a>
              <div class="iq-waves">
                <div class="waves wave-1" />
                <div class="waves wave-2" />
                <div class="waves wave-3" />
              </div>
            </div>-->
            <a href="javascript:void(0)" class="button bt-black iq-mt-5 ">Download</a>
          </div>
          <div class="col-lg-6">
            <img class="banner-img img-fluid watch-img wow slideInDown" :src="require('../../assets/images/banner/19.png')" alt="">
            <img class="banner-img wow bounceInDown" data-wow-duration="2s" :src="require('../../assets/images/banner/17.png')" alt="">
            <img class="banner-phone img-fluid center-block wow fadeInUp" :src="require('../../assets/images/product/mob.png')" alt="">
          </div>
        </div>
      </div>
    </div>
    <div class="banner-objects">
      <span class="banner-objects-01" data-bottom="transform:translatey(50px)" data-top="transform:translatey(-50px);">
        <img :src="require('../../assets/images/drive/03.png')" alt="drive02">
      </span>
      <span class="banner-objects-02 iq-fadebounce">
        <span class="iq-round" />
      </span>
      <span class="banner-objects-03 iq-fadebounce">
        <span class="iq-round" />
      </span>
    </div>
  </ParallaxStyle1>
</template>
<script>
export default {
  name: 'Home'
}
</script>
