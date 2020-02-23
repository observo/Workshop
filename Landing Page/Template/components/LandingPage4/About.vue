<template>
  <div>
  <section id="how-it-works" class="iq-counter-box-1 overview-block-ptb it-works re4-mt-50">
    <div class="container">
      <div class="row ">
        <div class="col-sm-12">
          <div class="heading-title">
            <h3 class="title iq-tw-7">
              What is sofbox ?
            </h3>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
          </div>
        </div>
      </div>
      <div class="row justify-content-md-center">
        <div class="col col-lg-4 text-center">
          <div class="iq-counter">
            <div class="counter-date">
              <span class="timer iq-tw-7 iq-font-blue">
                <count-to :start-val="0" :end-val="5656123" :duration="25000" />
              </span>
              <label class="iq-font-grey">App Download</label>
            </div>
          </div>
        </div>
        <div class="col-md-auto text-center r4-mt-30">
          <div class="iq-counter">
            <div class="counter-date">
              <span class="timer iq-tw-7 iq-font-blue">
                <count-to :start-val="0" :end-val="2530" :duration="25000" />
              </span>
              <label class="iq-font-grey">Happy Clients</label>
            </div>
          </div>
        </div>
        <div class="col col-lg-4 text-center r4-mt-30">
          <div class="iq-counter">
            <div class="counter-date">
              <span class="timer iq-tw-7 iq-font-blue">
                <count-to :start-val="0" :end-val="8120" :duration="25000" />
              </span>
              <label class="iq-font-grey">Active Accounts</label>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  </div>
  <!-- Who is Sofbox ? END -->
</template>

<script>
import countTo from 'vue-count-to'
export default {
  name: 'About',
  components: {
    countTo
  }

}
</script>
