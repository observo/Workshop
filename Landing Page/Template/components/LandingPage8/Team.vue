<template>
  <div>
    <div class="row iq-team-1">
      <div v-for="(teamContent, index) of teamContents" :key="index" class="col-lg-4 col-sm-6 iq-mtb-20">
        <div class="team-blog iq-pall-20 text-center">
          <img :src="teamContent.image" alt="" class="img-fluid text-center">
          <div class="testimonial-name iq-font-dark iq-mt-20">
            <h5 class="iq-font-black iq-tw-6">
              <a :href="teamContent.link">
                {{ teamContent.name }}
              </a>
            </h5>
            <span>{{ teamContent.designation }}</span>
            <div class="iq-star iq-font-green iq-mb-10">
              <i class="fa fa-star" aria-hidden="true" v-for="(rating,rindex) in teamContent.rating" :key=rindex ></i>
            </div>
          </div>
          <p>{{ teamContent.biography }}</p>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: 'Team',
  data () {
    return {
      teamContents: [
        {
          name: 'Rinks Cooper',
          designation: 'CEO, Qwilo',
          biography: 'Simply dummy text ever sincehar the 1500s, when an unknownshil printer took a galley of type and scrambled it.',
          rating: 4,
          image: require('../../assets/images/team/round-img1.png'),
          link: '#'
        },
        {
          name: 'JD Scot',
          designation: 'CEO, Qwilo',
          biography: 'Simply dummy text ever sincehar the 1500s, when an unknownshil printer took a galley of type and scrambled it.',
          rating: 5,
          image: require('../../assets/images/team/round-img2.png'),
          link: '#'
        },
        {
          name: 'Haris Morgan',
          designation: 'CEO, Qwilo',
          biography: 'Simply dummy text ever sincehar the 1500s, when an unknownshil printer took a galley of type and scrambled it.',
          rating: 3,
          image: require('../../assets/images/team/round-img3.png'),
          link: '#'
        }
      ]
    }
  }
}
</script>
