<template>
  <div>
    <section class="grey-bg bg-full-features">
      <div class="container-fluid no-padding">
        <div class="row">
          <div class="col-lg-6">
            <ParallaxStyle1 :bg-image="bgImage" class-names="d-inline-block w-100 h-100 iq-parallax" />
          </div>
          <div class="col-lg-4">
            <div class="iq-mtb-100">
              <h2 class="iq-tw-6 iq-mb-25">
                Software Features
              </h2>
              <p class="iq-font-15">
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer.
              </p>
              <p class="iq-font-15">
                It has survived not only five centuries, but also the leap into electronic type setting.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>
<script>
export default {
  name: 'Features',
  data () {
    return {
      bgImage: require('../../assets/images/bg/02.jpg')
    }
  }
}
</script>
