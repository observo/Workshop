<template>
  <section class="overview-block-ptb">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="heading-title">
            <h3 class="title iq-tw-7">
              What is sofbox ?
            </h3>
            <p>Sofbox is a sleek, clean and powerful landing page template</p>
          </div>
        </div>

        <div class="container">
          <div class="row">
            <div v-for="(option,index) in cardData" :key="index" class="col-sm-12 col-lg-3 col-md-6">
              <FancyCard
                :icon="option.icon"
                :title="option.title"
                :text="option.text"></FancyCard>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>
<script>
export default {
  name: 'About',

  data () {
    return {
      cardData: [
        {
          icon: 'ion-ios-monitor-outline',
          title: 'High Resolution',
          text: 'Provided with high resolution images.'

        },

        {
          icon: 'ion-ios-settings',
          title: 'Color Schemes',
          text: 'You can use color schemes as you need.'
        },

        {
          icon: 'ion-social-googleplus-outline',
          title: 'Google Fonts',
          text: 'You can change the fonts of the website.'
        },

        {
          icon: 'ion-ios-heart-outline',
          title: 'Clean Codes',
          text: 'Clean code which can be understood.'
        }

      ]
    }
  }
}

</script>
