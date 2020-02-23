<template>
  <div>
    <div class="row justify-content-md-center">
      <div v-for="(counterContent, index) of counterContents" :key="index" class="col-lg-4 text-center">
        <div class="iq-counter-1">
          <div class="counter-date">
            <span class="timer iq-tw-7 iq-font-dark">
                <count-to :start-val="0" :end-val="counterContent.number" :duration="25000" />
              </span>
            <label class="iq-font-blue">{{ counterContent.title }}</label>
            <p>{{ counterContent.description }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import countTo from 'vue-count-to'
export default {
  name: 'Counter',
  // props: ['countTo', 'from', 'duration'],
  components: {
    countTo
  },
  data () {
    return {
      counterContents: [
        {
          number: 5656123,
          title: 'App Download',
          description: 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'
        },
        {
          number: 2530,
          title: 'Happy Clients',
          description: 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'
        }
      ]
    }
  }
}
</script>
