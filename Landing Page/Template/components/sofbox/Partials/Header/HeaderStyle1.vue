<template>
  <!-- Header -->
  <header id="main-header" :class="className">
    <slot name="topBar" />
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12">
          <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="#">
              <img :id="styledLogo ? 'logo_img' : ''" class="img-fluid" :src="logoImg" alt="#">
            </a>
            <button
              class="navbar-toggler"
              type="button"
              data-toggle="collapse"
              data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class="ion-navicon" />
            </button>
            <div id="navbarSupportedContent" class="collapse navbar-collapse">
              <ul class="navbar-nav mr-auto w-100 justify-content-end menu">
                <li v-for="(option,index) in navItemList" :key="index" class="nav-item menu-item">
                  <a class="nav-link" :class="option.active !== undefined && option.active ? ' active ' : ''" :href="option.href" @click="jumpTo(option.href)">
                    {{ option.title }}
                    <i v-if="option.children" class="fa fa-angle-down toggledrop" aria-hidden="true" />
                  </a>
                  <ul v-if="option.children" class="sub-menu" style="display: none;">
                    <li
                      v-for="(child,index) in option.child"
                      id="menu-item-506"
                      :key="index"
                      class="menu-item menu-item-type-post_type menu-item-object-page menu-item-506"
                    >
                      <nuxt-link :to="child.href">
                        <span>{{ child.title }}</span>
                      </nuxt-link>
                    </li>
                  </ul>
                </li>
              </ul>
              <slot name="navContent" />
            </div>
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- Header End -->
</template>

<script>
export default {
  name: 'HeaderStyle1',
  props: {
    // eslint-disable-next-line vue/require-default-prop
    className: String,
    // eslint-disable-next-line vue/require-default-prop
    logoImg: String,
    // eslint-disable-next-line no-undef,vue/require-default-prop
    navItemList: Array,
    // eslint-disable-next-line vue/require-default-prop,vue/require-prop-types
    styledLogo: { Boolean: true }
  },
  created () {
    this.$root.$on('bv::scrollspy::activate', this.onActivate)
  },
  methods: {
    onActivate (target) {
      console.log('Received event: "bv::scrollspy::activate" for target ', target)
    },
    jumpTo (href) {
      window.$('html, body').stop().animate({
        scrollTop: window.$(href).offset().top
      }, 1500)
    }
  }
}
</script>
