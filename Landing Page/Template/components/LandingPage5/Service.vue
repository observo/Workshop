<template>
  <!-- Who is Sofbox ? -->
  <div>
    <SectionStyle2 id="how-it-works" small="true">
      <div slot="cardMedia" class="col-lg-6">
        <img class="img-fluid" :src="require('../../assets/images/drive/05.png')" alt="drive05">
      </div>
      <div slot="cardBody" class="col-lg-6">
        <div class="heading-title left text-left">
          <h3 class="iq-tw-7 iq-mb-25 title">
            Sofbox features
          </h3>
        </div>
        <div class=" text-discover iq-mb-25">
          <span class="iq-font-blue iq-tw-8">It has survived not only five centuries,</span>
          <p class="iq-font-15 iq-mt-10">
            It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing.
          </p>
        </div>
        <a href="javascript:void(0)" class="button">Click Here</a>
      </div>
    </SectionStyle2>

    <section id="how-works" class="overview-block-ptb how-works">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-6">
            <div class="heading-title left text-left">
              <h3 class="iq-tw-7 iq-mb-25 title">
                Sofbox services
              </h3>
            </div>
            <div class="text-discover iq-mb-25 ">
              <span class="iq-font-blue iq-tw-8">It has survived not only five centuries,</span>
              <p class="iq-font-15 iq-mt-10">
                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
              </p>
            </div>
            <a href="javascript:void(0)" class="button">Click Here</a>
          </div>
          <div class="col-md-12 col-lg-6">
            <img class="iq-works-img" :src="require('../../assets/images/drive/01.png')" alt="drive01">
          </div>
        </div>
      </div>
      <div class="iq-objects">
        <span class="iq-objects-01">
          <img :src="require('../../assets/images/drive/02.png')" alt="drive02">
        </span>
        <span class="iq-objects-02 skrollable skrollable-between" data-bottom="transform:translatey(50px)" data-top="transform:translatey(-100px);" style="transform: translateY(6.77966px);">
          <img :src="require('../../assets/images/drive/03.png')" alt="drive02">
        </span>
        <span class="iq-objects-03 skrollable skrollable-between" data-bottom="transform:translatex(50px)" data-top="transform:translatex(-100px);" style="transform: translateX(-5.74572px);">
          <img :src="require('../../assets/images/drive/04.png')" alt="drive02">
        </span>
        <span class="iq-objects-04 iq-fadebounce">
          <span class="iq-round" />
        </span>
      </div>
    </section>
  </div>
  <!-- Who is Sofbox ? END -->
</template>

<script>
import SectionStyle2 from '../sofbox/Sections/SectionStyle2'
export default {
  name: 'Service',
  components: { SectionStyle2 },
  props: ['small']
}
</script>

<style scoped>

</style>
