<template>
  <ParallaxStyle1 :bg-image="bgImage" class-names="overview-block-ptb iq-over-blue-80 text-center iq-parallax">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 search-btn">
          <div class="heading-title white iq-mb-25">
            <h3 class="title iq-tw-7">
              Subscribe Our Newsletter
            </h3>
          </div>
          <input type="text" placeholder="Enter your email" name="email">
          <button type="submit">
            <i class="fa fa-search" />
          </button>
        </div>
      </div>
    </div>
  </ParallaxStyle1>
</template>

<script>
import ParallaxStyle1 from '../sofbox/Parallax/ParallaxStyle1'
export default {
  name: 'Contact',
  components: { ParallaxStyle1 },
  data () {
    return {
      bgImage: require('../../assets/images/bg/01.jpg')
    }
  }
}
</script>

<style scoped>

</style>
