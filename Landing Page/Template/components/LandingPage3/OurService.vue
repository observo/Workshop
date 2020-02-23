<template>
  <div id="software-features" class="overview-block-ptb services-page grey-bg">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="text-center">
            <h3 class="iq-tw-6 iq-mb-25 ">
              Sofbox Features
            </h3>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-4">
          <CardStyle9>
            <img :src="require('../../assets/images/icon/01.png')" class="img-fluid" alt="" slot="cardMedia">
            <h4 slot="cardTitle">
              Fully Support
            </h4>
            <p slot="cardBody">
              We offer support to our customers. We will reply within 48 hours.
            </p>
          </CardStyle9>
        </div>
        <div class="col-sm-4">
          <CardStyle9>
            <img :src="require('../../assets/images/icon/02.png')" class="img-fluid" alt="" slot="cardMedia">
            <h4 slot="cardTitle">
              Market Analysis
            </h4>
            <p slot="cardBody">
              Keeps record of the business in statistical data. Which can be further analyzed.
            </p>
          </CardStyle9>
        </div>
        <div class="col-sm-4">
          <CardStyle9>
            <img :src="require('../../assets/images/icon/03.png')" class="img-fluid" alt="" slot="cardMedia">
            <h4 slot="cardTitle">
              Product Review
            </h4>
            <p slot="cardBody">
              Sofbox has unique and creative elements that makes website look elegant.
            </p>
          </CardStyle9>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import CardStyle9 from '../sofbox/Card/CardStyle9'
export default {
  name: 'OurService',
  components: { CardStyle9 }
}
</script>

<style scoped>

</style>
