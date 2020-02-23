<template>
  <SectionStyle section-class="iq-counter-box-2 overview-block-pb it-works re4-mt-50" section-id="iq-counter">
    <h3 slot="sectionTitle" class="title iq-tw-7">
      Happy Downloads
    </h3>
    <p slot="sectionDescription">
      Lorem Ipsum is simply dummy text of the printing and typesetting industry.
      Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley,
      Lorem Ipsum is simply dummy text of the printing and typesetting industry.
    </p>
    <div slot="sectionContent">
      <Counter />
    </div>
  </SectionStyle>
</template>
<script>
import Counter from '../../components/LandingPage8/Counter'
export default {
  name: 'Downloads',
  components: {
    Counter
  }
}
</script>
