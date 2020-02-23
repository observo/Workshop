<template>
  <header id="main-header" :class="className">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="#">
              <img id="styledLogo ? 'logo_img' : ''" class="img-fluid logo_img" :src="logoImg" alt="#">
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
</template>

<script>
export default {
  name: 'HeaderStyle2',
  props: {
    // eslint-disable-next-line vue/require-default-prop
    className: String,
    logoImg: String,
    navItemList: Array,
    styledLogo: { Boolean: true }
  }
}
</script>

<style scoped>

</style>
