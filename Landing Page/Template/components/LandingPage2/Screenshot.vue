<template>
  <section id="great-screenshots" class="overview-block-ptb iq-tab horizontal blue-bg">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="heading-title iq-font-white white">
            <h3 class="title iq-tw-7 iq-font-white">
              Why Choose Sofbox ?
            </h3>
            <p>Sofbox provides beautiful and elegant look for your website</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <!-- Nav tabs -->
          <ul id="pills-tab2" class="nav nav-pills tabs-left justify-content-center" role="tablist">
            <li v-for="(tab,index) in tabs" :key="index" class="nav-item iq-r-mb-15">
              <a
                :id="tab.id"
                class="nav-link sof-box"
                :class="tab.active ? ' active1 ' : ''"
                data-toggle="pill"
                :href="'#' + tab.href"
                role="tab"
                :aria-controls="tab.href"
                @click="tabActive(tab.href)"
              >
                <i :class="tab.icon"></i> {{ tab.title }}
              </a>
            </li>
          </ul>
          <!-- Tab panes -->
          <div class="tab-content iq-mt-30">
            <div id="retina1" class="tab-pane active">
              <div class="row flex-row-reverse">
                <div class="col-lg-6  col-md-6">
                  <img :src="require('../../assets/images/product/07.png')" class="img-fluid iq-pr-50" alt="">
                </div>
                <div class="col-lg-6  col-md-6 text-left align-self-center">
                  <h3 class="iq-tw-7 iq-font-white">
                    We Are An Agency That Focuses On Digital Design Solutions
                  </h3>
                  <p class="iq-mt-30 iq-font-white">
                    The template can be fully customizable with ease. Clean code which can be understood. Simply choose the layout that suits your needs, customize the sections, headers, sliders, colors, choose from pre-made useful elements.
                  </p>
                  <a href="javascript:void(0)" class="button bt-black">Let's Started</a>
                </div>
              </div>
            </div>
            <div id="designs1" class="tab-pane">
              <div class="row">
                <div class="col-lg-6 col-md-6">
                  <img :src="require('../../assets/images/product/06.png')" class="img-fluid iq-pr-50" alt="">
                </div>
                <div class="col-lg-6 col-md-6 text-left align-self-center">
                  <h3 class="iq-tw-7 iq-font-white">
                    We Are An Agency That Focuses On Digital Design Solutions
                  </h3>
                  <p class="iq-mt-30 iq-font-white">
                    The template can be fully customizable with ease. Clean code which can be understood. Simply choose the layout that suits your needs, customize the sections, headers, sliders, colors, choose from pre-made useful elements.
                  </p>
                  <a href="javascript:void(0)" class="button bt-black">Let's Started</a>
                </div>
              </div>
            </div>
            <div id="customize1" class="tab-pane">
              <div class="row flex-row-reverse">
                <div class="col-lg-6 col-md-6">
                  <img :src="require('../../assets/images/product/07.png')" class="img-fluid iq-pr-50" alt="">
                </div>
                <div class="col-lg-6 col-md-6 text-left align-self-center">
                  <h3 class="iq-tw-7 iq-font-white">
                    We Are An Agency That Focuses On Digital Design Solutions
                  </h3>
                  <p class="iq-mt-30 iq-font-white">
                    The template can be fully customizable with ease. Clean code which can be understood. Simply choose the layout that suits your needs, customize the sections, headers, sliders, colors, choose from pre-made useful elements.
                  </p>
                  <a href="javascript:void(0)" class="button bt-black">Let's Started</a>
                </div>
              </div>
            </div>
            <div id="clean1" class="tab-pane">
              <div class="row">
                <div class="col-lg-6 col-md-6">
                  <img :src="require('../../assets/images/product/05.png')" class="img-fluid iq-pr-50" alt="">
                </div>
                <div class="col-lg-6 col-md-6 text-left align-self-center">
                  <h6 class="iq-font-main iq-font-blue iq-mb-10">
                    We’re Creative Agency
                  </h6>
                  <h3 class="iq-tw-7 iq-font-white">
                    We Are An Agency That Focuses On Digital Design Solutions
                  </h3>
                  <p class="iq-mt-30 iq-font-white">
                    The template can be fully customizable with ease. Clean code which can be understood. Simply choose the layout that suits your needs, customize the sections, headers, sliders, colors, choose from pre-made useful elements.
                  </p>
                  <a href="javascript:void(0)" class="button bt-black">Let's Started</a>
                </div>
              </div>
            </div>
            <div id="revolution1" class="tab-pane">
              <div class="row flex-row-reverse">
                <div class="col-lg-6 col-md-6">
                  <img :src="require('../../assets/images/product/06.png')" class="img-fluid iq-pr-50" alt="">
                </div>
                <div class="col-lg-6 col-md-6 text-left align-self-center">
                  <h6 class="iq-font-main iq-font-blue iq-mb-10">
                    We’re Creative Agency
                  </h6>
                  <h3 class="iq-tw-7 iq-font-white">
                    We Are An Agency That Focuses On Digital Design Solutions
                  </h3>
                  <p class="iq-mt-30 iq-font-white">
                    The template can be fully customizable with ease. Clean code which can be understood. Simply choose the layout that suits your needs, customize the sections, headers, sliders, colors, choose from pre-made useful elements.
                  </p>
                  <a href="javascript:void(0)" class="button bt-black">Let's Started</a>
                </div>
              </div>
            </div>
            <div id="responsive1" class="tab-pane">
              <div class="row">
                <div class="col-lg-6 col-md-6">
                  <img :src="require('../../assets/images/product/07.png')" class="img-fluid iq-pr-50" alt="">
                </div>
                <div class="col-lg-6 col-md-6 text-left align-self-center">
                  <h6 class="iq-font-main iq-font-blue iq-mb-10">
                    We’re Creative Agency
                  </h6>
                  <h3 class="iq-tw-7 iq-font-white">
                    We Are An Agency That Focuses On Digital Design Solutions
                  </h3>
                  <p class="iq-mt-30 iq-font-white">
                    The template can be fully customizable with ease. Clean code which can be understood. Simply choose the layout that suits your needs, customize the sections, headers, sliders, colors, choose from pre-made useful elements.
                  </p>
                  <a href="javascript:void(0)" class="button bt-black">Let's Started</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="clearfix" />
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: 'Screenshot',
  data () {
    return {
      tabs: [
        {
          id: 'retina1-tab',
          href: 'retina1',
          title: 'Retina Ready',
          active: true,
          icon: 'ion-ios-color-wand-outline'
        },
        {
          id: 'designs1-tab',
          href: 'designs1',
          title: 'Latest Designs',
          active: false,
          icon: 'ion-ios-heart-outline'
        },
        {
          id: 'customize1-tab',
          href: 'customize1',
          title: 'Easy to Customize',
          active: false,
          icon: 'ion-ios-settings'
        },
        {
          id: 'clean1-tab',
          href: 'clean1',
          title: 'Clean',
          active: false,
          icon: 'ion-ios-checkmark-outline'
        },
        {
          id: 'revolution1-tab',
          href: 'revolution1',
          title: 'Revolution Slider',
          active: false,
          icon: 'ion-ios-albums-outline'
        }
      ]
    }
  },
  methods: {
    tabActive (id) {
      const jquery = window.$
      jquery('.tab-content').find('.active').removeClass('active')
      jquery('.nav-item').find('.active1').removeClass('active1')
      jquery('#' + id).addClass('active')
    }
  }
}
</script>

<style scoped>

</style>
