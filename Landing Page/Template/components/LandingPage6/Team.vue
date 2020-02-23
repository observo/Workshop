<template>
  <!-- our team -->
  <section id="team" class="overview-block-ptb blue-bg iq-team-main">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 iq-font-white">
          <div class="heading-title white text-center">
            <h2 class="title white iq-tw-6 iq-font-white iq-mb-50">
              Meet Our Creative Team
            </h2>
            <p>Lorem Ipsum is simply dummy text ever sincehar the 1500s.</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div v-for="(list,index) in temeList" :key="index" class="col-lg-3 col-sm-6 iq-mb-30">
          <CardStyle3>
            <div slot="cardMedia">
              <img alt="" class="img-fluid" :src="list.media">
            </div>
            <div slot="cardTitle">
              <a href="team-details-1.html">
                <h6 class="iq-font-white iq-tw-6">{{ list.title }}</h6>
              </a>
              <span>{{ list.subtitle }}</span>
            </div>
            <ul slot="cardFooter" class="list-inline">
              <li v-for="(social,sindex) in list.socialLinks" :key="sindex">
                <a :href="social.link"> <i :class="social.icon" /> </a>
              </li>
            </ul>
          </CardStyle3>
        </div>
      </div>
    </div>
  </section>
  <!-- our team  end-->
</template>

<script>
import CardStyle3 from '../sofbox/Card/CardStyle3'
export default {
  name: 'Team',
  components: { CardStyle3 },
  data () {
    return {
      temeList: [
        {
          media: require('../../assets/images/team/small/01.jpg'),
          title: 'Ellie Davis',
          subtitle: 'CEO, Sofbox',
          socialLinks: [
            { icon: 'fab fa-facebook-f', link: '#' },
            { icon: 'fab fa-twitter', link: '#' },
            { icon: 'fab fa-pinterest-p', link: '#' }
          ]
        },
        {
          media: require('../../assets/images/team/small/02.jpg'),
          title: 'Dylan Wilson',
          subtitle: 'CEO, Sofbox',
          socialLinks: [
            { icon: 'fab fa-facebook-f', link: '#' },
            { icon: 'fab fa-twitter', link: '#' },
            { icon: 'fab fa-pinterest-p', link: '#' }
          ]
        },
        {
          media: require('../../assets/images/team/small/03.jpg'),
          title: 'Alvin Martin',
          subtitle: 'CEO, Sofbox',
          socialLinks: [
            { icon: 'fab fa-facebook-f', link: '#' },
            { icon: 'fab fa-twitter', link: '#' },
            { icon: 'fab fa-pinterest-p', link: '#' }
          ]
        },
        {
          media: require('../../assets/images/team/small/04.jpg'),
          title: 'Caleb Nelson',
          subtitle: 'CEO, Sofbox',
          socialLinks: [
            { icon: 'fab fa-facebook-f', link: '#' },
            { icon: 'fab fa-twitter', link: '#' },
            { icon: 'fab fa-pinterest-p', link: '#' }
          ]
        }
      ]
    }
  }
}
</script>

<style scoped>

</style>
