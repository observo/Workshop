<template>
  <div>
    <section id="iq-services" class="iq-counter-box-1 overview-block-ptb it-works re4-mt-50 iq-font-black text-center">
      <div class="container">
        <div class="row ">
          <div class="col-sm-12">
            <div class="heading-title">
              <h3 class="title iq-tw-7">
                What is sofbox ?
              </h3>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
            </div>
          </div>
        </div>
        <div class="row iq-mb-40">
          <div v-for="(feature,index) of featureList" :key="index" class="col-sm-12 col-lg-4">
            <div class="iq-works-box no-shadow text-center">
              <img :src="feature.icon" class="img-fluid" alt="#">
              <h5 class="iq-tw-7 iq-mt-25 iq-mb-15">
                {{ feature.title }}
              </h5>
              <p>{{ feature.description }}</p>
              <a href="javascript:void(0)"><u>{{ feature.buttonLabel }}</u></a>
            </div>
          </div>
        </div>
        <a href="javascript:void(0)" class="button-blue-shadow iq-mt-10">Read More</a>
      </div>
    </section>
  </div>
</template>
<script>
export default {
  name: 'About',
  data () {
    return {
      featureList: [
        {
          icon: require('../../assets/images/services/icon-4.png'),
          title: 'Easy to customize',
          description: 'Lorem Ipsum is simply dummy text of.',
          buttonLabel: 'Social security'
        },
        {
          icon: require('../../assets/images/services/icon-5.png'),
          title: 'Multipurpose layout',
          description: 'Lorem Ipsum is simply dummy text of.',
          buttonLabel: 'Social security'
        },
        {
          icon: require('../../assets/images/services/icon-6.png'),
          title: 'Unique design',
          description: 'Lorem Ipsum is simply dummy text of.',
          buttonLabel: 'Social security'
        }
      ]
    }
  }
}
</script>
