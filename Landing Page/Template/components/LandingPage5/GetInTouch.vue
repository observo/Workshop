<template>
  <ParallaxStyle1
    ids="get-in-tech"
    class-names="overview-block-ptb iq-bg-over text-center  iq-over-blue-80 iq-screenshots iq-parallax"
    :bg-image="require('../../assets/images/bg/07.jpg')"
  >
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="heading-title white iq-font-white">
            <h3 class="title iq-tw-7">
              Still Thinking ?
            </h3>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley,</p>
          </div>
          <a href="javascript:void(0)" class="button bt-black">Let's Started</a>
        </div>
      </div>
    </div>
  </ParallaxStyle1>
</template>

<script>
import ParallaxStyle1 from '../sofbox/Parallax/ParallaxStyle1'
export default {
  name: 'GetInTouch',
  components: { ParallaxStyle1 }
}
</script>

<style scoped>

</style>
