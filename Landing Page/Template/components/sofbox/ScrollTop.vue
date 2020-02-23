<template>
  <div id="back-to-top" style="display: none;">
    <a id="top" class="top" href="javascript:void(0)" @click="scrollTop()"> <i class="ion-ios-upload-outline" /> </a>
  </div>
</template>
<script>
export default {
  name: 'ScrollTop',
  methods: {
    scrollTop () {
      window.$('body,html').animate({
        scrollTop: 0
      }, 800)
    }
  }
}
</script>
