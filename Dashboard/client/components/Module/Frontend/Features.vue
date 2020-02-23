
<template>
<section class="page-section page-menu bg-white"
    id="features">
    <div class="container">
        <div class="text-center opacity-3"
            style="margin-top:-50px;">
            <a href="#features"
                class="nav-link text-nowrap js-scroll-trigger">
                <i class="lnr lnr-chevron-down icon-3x text-theme1" /></a>
        </div>

        <h2 class="text-center mt-0 text-theme1">Features</h2>
        <hr class="divider my-4" />
        <div class="row">
            <div v-for="(feature, i) in features"
                :key="i"
                class="col-lg-3 col-md-6 text-center p-1 pb-2 ">
                <div class="mt-5 bg-white h-100 pt-5 ig-rounded shadow">
                    <i class="lnr icon-feature icon-7x text-theme1 mb-4"
                        :class="feature.icon" />
                    <h3 class="h4 mb-2">{{feature.title}}</h3>
                    <p class="text-muted mb-0 px-2">
                        {{feature.description}}
                    </p>
                </div>
            </div>

        </div>
    </div>

</section>
</template>
<script>

export default {
  data () {
    return {
      features: [
        {
          title: 'Awesome Visual',
          icon: 'lnr-diamond',
          description: 'This template was created with the main objective of having a clean and extremely pleasant look.'
        },
        {
          title: 'Optional Server',
          icon: 'lnr-laptop',
          description: 'To facilitate your life, along with template is sent an optional server, modular, and with access to several databases.'
        },
        {
          title: 'Fast Publish',
          icon: 'lnr-rocket',
          description: 'Easily change its components to suit any business!'
        },
        {
          title: 'Made for Developers',
          icon: 'lnr-heart',
          description: 'Designed to make life easier for developers and entrepreneurs..'
        }

      ]
    }
  }
}

</script>


<style lang="scss" scoped>
.icon-feature {
  -webkit-text-stroke: 2px white;
}

</style>


