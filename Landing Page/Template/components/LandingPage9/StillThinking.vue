<template>
  <ParallaxStyle1 :bg-image="bgImage" class-names="overview-block-ptb  text-center iq-screenshots iq-bg-over iq-over-blue-80">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="heading-title white iq-font-white">
            <h3 class="title iq-tw-7">
              Sofbox is Porfect for U
            </h3>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
          </div>
          <a href="javascript:void(0)" class="button bt-black">Let's Started</a>
        </div>
      </div>
    </div>
  </ParallaxStyle1>
</template>
<script>
export default {
  name: 'Features',
  data () {
    return {
      bgImage: require('../../assets/images/bg/04.jpg')
    }
  }
}
</script>
