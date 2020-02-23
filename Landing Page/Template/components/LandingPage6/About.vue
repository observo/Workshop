<template>
  <div>
    <!-- How it Works -->
    <section class="overview-block-ptb">
      <div id="how-it-works" class="container">
        <div class="row">
          <div class="col-sm-12">
            <SectionStyle>
              <div slot="sectionTitle">
                <h3 class="title iq-tw-7">
                  What is sofbox ?
                </h3>
              </div>
              <div slot="sectionDescription">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
              </div>
            </SectionStyle>
          </div>
          <div class="col-lg-12 col-md-12">
            <div
              class="owl-carousel"
              data-autoplay="true"
              data-loop="true"
              data-nav="false"
              data-dots="false"
              data-items="3"
              data-items-laptop="3"
              data-items-tab="2"
              data-items-mobile="1"
              data-items-mobile-sm="1"
              data-margin="15"
            >
              <div v-for="(list,index) in items" :key="index" class="item">
                <CardStyle4>
                  <i slot="cardMedia" :class="list.icon" />
                  <div slot="cardBody">
                    <h5 class="iq-tw-7 iq-mb-10">
                      {{ list.title }}
                    </h5>
                    <p>{{ list.description }}</p>
                  </div>
                </CardStyle4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <SectionStyle1>
      <div slot="cardMedia" class="col-lg-7">
        <img class="iq-works-img pull-right img-fluid" :src="require('../../assets/images/drive/iPad-Mockup.png')" alt="drive01">
      </div>
      <div slot="cardBody" class="col-lg-5 align-self-center">
        <span class="badge iq-badge blue-bg iq-font-white">Primary new</span>
        <h3 class="iq-tw-7 iq-mb-15">
          What can sofbox do ?
        </h3>
        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
      </div>
    </SectionStyle1>
    <SectionStyle2>
      <div slot="cardMedia" class="col-lg-7">
        <img class="iq-works-img pull-right img-fluid" :src="require('../../assets/images/drive/iPad-Mockup.png')" alt="drive01">
      </div>
      <div slot="cardBody" class="col-lg-5 align-self-center">
        <span class="badge iq-badge blue-bg iq-font-white">Primary new</span>
        <h3 class="iq-tw-7 iq-mb-15">
          Why Choose Sofbox ?
        </h3>
        <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
      </div>
    </SectionStyle2>
    <section class="overview-block-ptb how-works">
      <div class="container">
        <div class="row flex-row-reverse">
          <div class="col-lg-7 ">
            <img class="iq-works-img img-fluid" :src="require('../../assets/images/drive/iPad-Mockup2.png')" alt="drive01">
          </div>
          <div class="col-lg-5 align-self-center ">
            <span class="badge iq-badge blue-bg iq-font-white">Primary new</span>
            <h3 class="iq-tw-7 iq-mb-15">
              Beautiful interfaces
            </h3>
            <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
          </div>
        </div>
      </div>
    </section>
  <!-- How it Works -->
  </div>
</template>

<script>
import SectionStyle from '../sofbox/Sections/SectionStyle'
import CardStyle4 from '../sofbox/Card/CardStyle4'
import SectionStyle1 from '../sofbox/Sections/SectionStyle1'
import SectionStyle2 from '../sofbox/Sections/SectionStyle2'
export default {
  name: 'About',
  components: { SectionStyle2, SectionStyle1, CardStyle4, SectionStyle },
  data () {
    return {
      items: [
        {
          icon: 'ion-ios-monitor-outline',
          title: 'Easy To Customize',
          description: 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.'
        },
        {
          icon: 'ion-ios-settings',
          title: 'Multipurpose Layout',
          description: 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.'
        },
        {
          icon: 'ion-social-googleplus-outline',
          title: 'Unique Design',
          description: 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.'
        },
        {
          icon: 'ion-ios-heart-outline',
          title: 'Clean Codes',
          description: 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.'
        },
        {
          icon: 'ion-ios-color-wand-outline',
          title: 'Easy to Use',
          description: 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.'
        },
        {
          icon: 'ion-ios-checkmark-outline',
          title: 'Responsive Design',
          description: 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.'
        }
      ]
    }
  }
}
</script>

<style scoped>

</style>
