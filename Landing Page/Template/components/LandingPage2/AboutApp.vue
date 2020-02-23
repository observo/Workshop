<template>
  <section class="overview-block-ptb grey-bg">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center ">
          <h2 class="iq-mb-25 iq-tw-7">
            Develop more beautiful thing with Sofbox
          </h2>
          <p class="">
            Choose unique elements and customize sections as per your business requirements. We are a design company, we create beautiful and creative designs that makes your website look elegant.
          </p>
          <div class="media iq-mt-30">
            <img class="mr-3 rounded-circle align-self-center" :src="require('../../assets/images/testimonial/client-1.png')" alt="Generic placeholder image">
            <div class="media-body iq-pr-30 iq-pt-15">
              <p>"Sofbox’s unique design and super clean looks made my website look beautiful and elegant."</p>
            </div>
          </div>
        </div>
        <div class="col-lg-6 align-self-center r-mt-30">
          <div class="media-wrapper">
            <video id="player1" style="width:100%;height:100%;" :poster="require('../../assets/video/01.jpg')" controls="" preload="none">
<!--              <source type="video/m4v" src="../../static/video/01.m4v">-->
              <source type="video/webm" src="../../static/video/01.webm">
              <source type="video/ogg" src="../../static/video/01.ogv">
            </video>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: 'AboutApp'
}
</script>

<style scoped>

</style>
