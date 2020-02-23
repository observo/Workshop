<template>
  <div>
    <AnimateSection ids="how-it-works" class-name="overview-block-ptb how-works r-mt-40"  :animation="false">
      <div slot="sectionImage">
        <img class="iq-works-imgs img-fluid" :src="require('../../assets/images/bg/20.png')" alt="drive01">
      </div>
      <div slot="sectionTitle">
        <h2 class="iq-tw-6 iq-mb-25">
          What is sofbox ?
        </h2>
      </div>
      <div slot="sectionBody">
        <p class="iq-font-15 iq-mb-25">
          Sofbox is a sleek, clean and powerful Saas, Software landing page template. With modern and stunning UI/UX elements.
        </p>
        <a href="javascript:void(0)" class="button">Click Here</a>
      </div>
    </AnimateSection>

    <AnimateSection ids="how-works" class-name="overview-block-ptb how-works r-mt-40 iq-rmt-80" reverse="true" :animation="false">
      <div slot="sectionImage">
        <img class="iq-works-imgs img-fluid" :src="require('../.././assets/images/bg/12.png')" alt="drive01">
      </div>
      <div slot="sectionTitle">
        <h2 class="iq-mb-25 iq-tw-6">
          What sofbox can do ?
        </h2>
      </div>
      <div slot="sectionBody">
        <p class="iq-font-15 iq-mb-25">
          You can fully customize the template with ease. Every page is fully responsive and retina ready which makes your creation look good on any device.
        </p>
        <a href="javascript:void(0)" class="button ">Download</a>
      </div>
    </AnimateSection>
  </div>
</template>

<script>
import AnimateSection from '../sofbox/Sections/AnimateSection'
export default {
  name: 'About',
  components: { AnimateSection }
}
</script>

<style scoped>

</style>
