<template>
  <div>
    <AnimateSection ids="how-it-works" class-name="overview-block-ptb how-works" :animation="true">
      <div slot="sectionImage">
        <img class="iq-works-imgs" :src="require('../../assets/images/drive/iPad-Mockup1.png')" alt="drive01">
      </div>
      <div slot="sectionTitle">
        <div class="heading-title left text-left">
          <h3 class="iq-tw-7 iq-mb-25 title">
            What can sofbox do ?
          </h3>
        </div>
      </div>
      <div slot="sectionBody">
        <p class=" iq-font-15 iq-mb-25">
          You can fully customize the template with ease. Every page is fully responsive and retina ready which makes your creation look good on any device.
        </p>
        <a href="javascript:void(0)" class="button ">Click Here</a>
      </div>
    </AnimateSection>
    <AnimateSection ids="how-works" class-name="overview-block-ptb how-works r-mt-40" reverse="true" :animation="true">
      <div slot="sectionImage">
        <img class="iq-works-imgs" :src="require('../../assets/images/drive/iPad-Mockup.png')" alt="drive01">
      </div>
      <div slot="sectionTitle">
        <div class="heading-title left text-left">
          <h3 class="iq-mb-25 iq-tw-7 title">
            Beautiful interface
          </h3>
        </div>
      </div>
      <div slot="sectionBody">
        <p class="">
          Sofbox’s harmonious design and super clean looks will make your website look beautiful and elegant.
        </p>
        <a href="javascript:void(0)" class="button  iq-mt-5 ">Download</a>
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
