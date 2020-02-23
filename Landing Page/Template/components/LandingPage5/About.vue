<template>
  <section id="about-us" class=" overview-block-ptb it-works re4-mt-50">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <SectionStyle>
            <div slot="sectionTitle">
              <h3 class="title iq-tw-7">
                What is sofbox
              </h3>
            </div>
            <div slot="sectionDescription">
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
            </div>
          </SectionStyle>
        </div>
      </div>
      <div class="row">
        <div v-for="(card,index) in cardData" :key="index" class="col-md-12 col-lg-3">
          <div class="iq-works-box round-icon text-center">
            <div class="icon-bg center-block">
              <i aria-hidden="true" :class="card.icon" />
            </div>
            <h5 class="iq-tw-7 iq-mt-25 iq-mb-15" :content="cardData">
              {{ card.title }}
            </h5>
            <p :content="cardData">
              {{ card.description }}
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import SectionStyle from '../sofbox/Sections/SectionStyle'
export default {
  name: 'About',
  components: { SectionStyle },
  data () {
    return {
      cardData: [
        {
          title: 'Fully responsive',
          icon: 'ion-ios-monitor-outline',
          description: 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'
        },
        {
          title: 'Well documented',
          icon: 'ion-ios-albums-outline',
          description: 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'
        },
        {
          title: 'Easy to use',
          icon: 'ion-ios-color-wand-outline',
          description: 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'
        },
        {
          title: 'Clean codes',
          icon: 'ion-ios-heart-outline',
          description: 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'
        }
      ]
    }
  }
}
</script>

<style scoped>

</style>
