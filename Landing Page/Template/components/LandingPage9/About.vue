<template>
  <div>
    <section id="iq-about-us" class="overview-block-ptb">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="heading-title">
              <h3 class="title iq-tw-7">
                What is sofbox ?
              </h3>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-6 align-self-center">
            <h2 class="iq-tw-6 iq-mb-25">
              The Best Program UI
            </h2>
            <p class="iq-font-15">
              Simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
            </p>
            <div class="media iq-mt-30">
              <img :src="require('../../assets/images/testimonial/client-1.png')" class="mr-3 rounded-circle align-self-center" alt="Generic placeholder image">
              <div class="media-body iq-pr-30 iq-pt-15">
                <p>"Lorem Ipsum is simply dummy text of the printing and typesetting industry."</p>
              </div>
            </div>
          </div>
          <div class="col-lg-6 align-self-center">
            <img :src="require('../../assets/images/drive/01.png')" class="img-fluid" alt="drive01">
          </div>
        </div>
      </div>
    </section>
  </div>
</template>
<script>

export default {
  name: 'About',
  components: { }
}
</script>
