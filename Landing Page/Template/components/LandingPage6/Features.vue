<template>
  <div>
    <!-- Feature start -->
    <section id="software-features" class="iq-feature1 overview-block-ptb grey-bg">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12">
            <div class="heading-title text-center">
              <h3 class="title iq-tw-6">
                Our Great Features
              </h3>
              <p>Lorem Ipsum is simply dummy text ever sincehar the 1500s.</p>
            </div>
          </div>
        </div>
        <div class="row">
          <div v-for="(feature,index) in featureList" :key="index" class="col-lg-4 col-md-6 col-sm-12 iq-mb-30">
            <CardStyle2>
              <i slot="cardIcon" class="iq-mb-10" :class="feature.icon" />
              <h5 slot="cardTitle" class="iq-tw-6">
                {{ feature.title }}
              </h5>
              <p slot="cardBody">
                {{ feature.description }}
              </p>
            </CardStyle2>
          </div>
        </div>
      </div>
    </section>
    <section class="overview-block-ptb">
      <div class="container">
        <div class="row align-items-center text-center text-lg-left">
          <div class="col-12 col-md-12 col-lg-6 mr-lg-auto text-center text-md-left">
            <h3 class="iq-tw-7 iq-mb-15">
              We have achieved a trust over 1000+ peoples
            </h3>
            <p class="">
              Simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer.
            </p>
          </div>
          <div class="col-12 col-md-12 col-lg-5">
            <div class="row no-gutters">
              <div class="col-md-6 col-sm-12 mb-3 pr-3 ">
                <div class=" iq-shadow d-flex align-items-center flex-wrap">
                  <i class="ion-ios-person-outline " aria-hidden="true" />
                  <div class="text-left">
                    <span class="timer iq-tw-7 iq-font-30">
                      <count-to :start-val="0" :end-val="8000" :duration="25000" />
                    </span>
                    <p class="m-0 text-uppercase">
                      Users
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                <div class=" iq-shadow d-flex align-items-center flex-wrap">
                  <i class="ion-ios-folder-outline " aria-hidden="true" />
                  <div class="text-left">
                    <span class="timer iq-tw-7 iq-font-30">
                      <count-to :start-val="0" :end-val="4000" :duration="25000" />
                    </span>
                    <p class="m-0 text-uppercase">
                      Downloads
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-sm-12 col-xs-12 pr-3 mb-3">
                <div class=" iq-shadow d-flex align-items-center flex-wrap">
                  <i class="ion-ios-star " aria-hidden="true" />
                  <div class="text-left">
                    <span class="timer iq-tw-7 iq-font-30">
                      <count-to :start-val="0" :end-val="3060" :duration="25000" />
                    </span>
                    <p class="m-0 text-uppercase">
                      App Rate
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-sm-12 col-xs-12">
                <div class=" iq-shadow d-flex align-items-center flex-wrap blue-bg ">
                  <i class="ion-ios-paper-outline iq-font-white" aria-hidden="true" />
                  <div class="text-left">
                    <span class="timer iq-tw-7 iq-font-30 iq-font-white">
                      <count-to :start-val="0" :end-val="450" :duration="25000" />
                    </span>
                    <p class="m-0 text-uppercase iq-font-white">
                      Projects
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  <!-- Feature end -->
  </div>
</template>

<script>
import countTo from 'vue-count-to'
import CardStyle2 from '../sofbox/Card/CardStyle2'
export default {
  name: 'Features',
  components: { CardStyle2, countTo },
  data () {
    return {
      featureList: [
        {
          icon: 'ion-ios-lightbulb-outline',
          title: 'Creative Ideas',
          description: 'Text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make.'
        },
        {
          icon: 'ion-ios-grid-view-outline',
          title: 'Beautiful Blog',
          description: 'Text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make.'
        },
        {
          icon: 'ion-ios-heart-outline',
          title: 'User Friendly',
          description: 'Text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make.'
        },
        {
          icon: 'ion-ios-albums-outline',
          title: 'Perfect Showcase',
          description: 'Text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make.'
        },
        {
          icon: 'ion-ios-settings',
          title: 'Color Schemes',
          description: 'Text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make.'
        },
        {
          icon: 'ion-ios-color-wand-outline',
          title: 'Easy to Use',
          description: 'Text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make.'
        }
      ]
    }
  }
}
</script>

<style scoped>

</style>
