<template>
  <BannerStyle1 reverse="true">
    <div slot="media">
      <img :src="require('../../assets/images/bg/17.png')" class="banner-img img-fluid iq-pr-50" alt="">
      <img :src="require('../../assets/images/bg/18.png')" class="img-fluid banner-ani wow fadeInRight" alt="">
    </div>
    <div slot="content">
      <h2 class="iq-mb-20 iq-tw-9 r-mt-30">
        Sofbox
      </h2>
      <p>We are a company boutique for digital transformation and software development that offers state of the art engineering solutions.</p>
      <a href="javascript:void(0)" class="button bt-black iq-mt-5 ">Download</a>
    </div>
  </BannerStyle1>
</template>

<script>
import BannerStyle1 from '../sofbox/Sections/BannerStyle1'
export default {
  name: 'Home',
  components: { BannerStyle1 }
}
</script>

<style scoped>

</style>
