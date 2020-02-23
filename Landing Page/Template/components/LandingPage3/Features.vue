<template>
  <div>
    <AnimateSection ids="great-features" class-name="overview-block-ptb how-works r-mt-40" :animation="false">
      <div slot="sectionImage">
        <img class="iq-works-imgs img-fluid" :src="require('../../assets/images/bg/14.png')" alt="drive01">
      </div>
      <div slot="sectionTitle">
        <h2 class="iq-tw-6 iq-mb-25">
          Sofbox speciality
        </h2>
      </div>
      <div slot="sectionBody">
        <p class="iq-font-15 iq-mb-25">
          Sofbox has some popular specialities that can make your website look beautiful. Provided with high resolution images.
        </p>
        <a href="javascript:void(0)" class="button">Click Here</a>
      </div>
    </AnimateSection>
    <AnimateSection class-name="overview-block-pb how-works r-mt-40 iq-rmt-80" reverse="true" :animation="false">
      <div slot="sectionImage">
        <img class="iq-works-imgs img-fluid" :src="require('../../assets/images/bg/15.png')" alt="drive01">
      </div>
      <div slot="sectionTitle">
        <h2 class="iq-mb-25 iq-tw-6 r4-mt-30">
          Variations
        </h2>
      </div>
      <div slot="sectionBody">
        <p class="iq-font-15 iq-mb-25">
          Simply choose the layout that suits your needs, customize the sections, headers, sliders, colors, choose from pre-made useful elements.
        </p>
        <a href="javascript:void(0)" class="button ">Download</a>
      </div>
    </AnimateSection>

    <AnimateSection class-name="overview-block-ptb how-works r-mt-40" :animation="false">
      <div slot="sectionImage">
        <img class="iq-works-imgs img-fluid" :src="require('../../assets/images/bg/16.png')" alt="drive01">
      </div>
      <div slot="sectionTitle">
        <h2 class="iq-tw-6 iq-mb-25">
          Build beautiful with sofbox
        </h2>
      </div>
      <div slot="sectionBody">
        <p class="iq-font-15 iq-mb-25">
          Choose unique elements and customize sections as per your business requirements. We create beautiful and creative designs that makes your website look elegant.
        </p>
        <a href="javascript:void(0)" class="button">Click Here</a>
      </div>
    </AnimateSection>
  </div>
</template>

<script>
import AnimateSection from '../sofbox/Sections/AnimateSection'
export default {
  name: 'Features',
  components: { AnimateSection }
}
</script>

<style scoped>

</style>
