<template>
  <!-- Pricing  -->
  <section id="pricing" class="overview-block-ptb iq-pricing-main">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="heading-title text-center">
            <h3 class="title iq-tw-6">
              Our Pricing
            </h3>
            <p>Lorem Ipsum is simply dummy text ever sincehar the 1500s.</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div v-for="(pckg,index) in packageList" :key="index" class="col-lg-3 col-md-6 col-sm-12 iq-mtb-10">
          <PricingCardStyle1 :item="pckg" :active="pckg.active">
            <ul slot="cardBody" class="iq-mtb-30">
              <li v-for="(item,pindex) in pckg.items" :key="pindex" class="iq-mtb-20">
                <i aria-hidden="true" class="iq-mr-10" :class="item.icon" />{{ item.title }}
              </li>
            </ul>
            <a slot="cardFooter" class="button iq-mr-0" href="#">Purchase</a>
          </PricingCardStyle1>
        </div>
      </div>
    </div>
  </section>
  <!-- Pricing End -->
</template>

<script>
import PricingCardStyle1 from '../sofbox/Card/PricingCardStyle1'
export default {
  name: 'Pricing',
  components: { PricingCardStyle1 },
  data () {
    return {
      packageList: [
        {
          title: 'Start Up',
          price: '$1.99',
          items: [
            { icon: 'ion-checkmark-round', title: 'Photoshop' },
            { icon: 'ion-checkmark-round', title: 'HTML5 & CSS 3' },
            { icon: 'ion-close-round', title: 'Wordpress' },
            { icon: 'ion-close-round', title: 'Javascript' },
            { icon: 'ion-close-round', title: 'Animation' }
          ],
          active: 0
        },
        {
          title: 'Professional',
          price: '$4.99',
          items: [
            { icon: 'ion-checkmark-round', title: 'Photoshop' },
            { icon: 'ion-checkmark-round', title: 'HTML5 & CSS 3' },
            { icon: 'ion-close-round', title: 'Wordpress' },
            { icon: 'ion-close-round', title: 'Javascript' },
            { icon: 'ion-close-round', title: 'Animation' }
          ],
          active: 1
        },
        {
          title: 'Advanced',
          price: '$9.99',
          items: [
            { icon: 'ion-checkmark-round', title: 'Photoshop' },
            { icon: 'ion-checkmark-round', title: 'HTML5 & CSS 3' },
            { icon: 'ion-close-round', title: 'Wordpress' },
            { icon: 'ion-close-round', title: 'Javascript' },
            { icon: 'ion-close-round', title: 'Animation' }
          ],
          active: 0
        },
        {
          title: 'Premium',
          price: '$45.99',
          items: [
            { icon: 'ion-checkmark-round', title: 'Photoshop' },
            { icon: 'ion-checkmark-round', title: 'HTML5 & CSS 3' },
            { icon: 'ion-close-round', title: 'Wordpress' },
            { icon: 'ion-close-round', title: 'Javascript' },
            { icon: 'ion-close-round', title: 'Animation' }
          ],
          active: 0
        }
      ]
    }
  }
}
</script>

<style scoped>

</style>
