<template>
  <section id="our-pricing" class="overview-block-pt iq-mt-20 our-pricing-1 grey-bg">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <SectionStyle>
            <div slot="sectionTitle">
              <h2 class="title iq-tw-6">
                Our Pricing
              </h2>
            </div>
            <div slot="sectionDescription">
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
            </div>
          </SectionStyle>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="panel pricing-table">
        <div class="row">
          <div class="col-lg-4 col-md-12">
            <PricingCardStyle4>
              <div slot="cardIcon">
                <i aria-hidden="true" class="ion-ios-person-outline" />
              </div>
              <div slot="cardTitle">
                <h4 class="iq-tw-5">Personal</h4>
                <ul slot="cardText" class="pricing-features">
                  <li class="pricing-features-item">
                    Custom domains
                  </li>
                  <li class="pricing-features-item">
                    Sleeps after 30 mins of inactivity
                  </li>
                </ul>
                <span slot="cardPrice" class="pricing-price">Free</span>
                <a slot="cardButton" class="iq-mt-40 button" href="javascript:void(0)">Purchase</a>
              </div>
            </PricingCardStyle4>
          </div>
          <div class="col-lg-4 col-md-12">
            <PricingCardStyle4>
              <div slot="cardIcon">
                <i aria-hidden="true" class="ion-ios-people-outline" />
              </div>
              <div slot="cardTitle">
                <h4 class="iq-tw-5">Small Team</h4>
                <ul slot="cardText" class="pricing-features">
                  <li class="pricing-features-item">
                    Never sleeps
                  </li>
                  <li class="pricing-features-item">
                    Multiple workers for more powerful apps
                  </li>
                </ul>
                <div slot="cardPrice">
                  <span class="pricing-price">$150</span>
                </div>
                <div slot="cardButton">
                  <a class="iq-mt-40 button" href="javascript:void(0)">Purchase</a>
                </div>
              </div>
            </PricingCardStyle4>
          </div>
          <div class="col-lg-4 col-md-12">
            <PricingCardStyle4 icon="ion-ios-world-outline" title="Enterprise">
              <div slot="cardIcon">
                <i aria-hidden="true" class="ion-ios-world-outline" />
              </div>
              <div slot="cardTitle">
                <h4 class="iq-tw-5">Enterprise</h4>
                <ul slot="cardText" class="pricing-features">
                  <li class="pricing-features-item">
                    Dedicated
                  </li>
                  <li class="pricing-features-item">
                    Simple horizontal scalability
                  </li>
                </ul>
                <div slot="cardPrice">
                  <span class="pricing-price">$400</span>
                  <a class="iq-mt-40 button" href="javascript:void(0)">Purchase</a>
                </div>
              </div>
            </PricingCardStyle4>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import SectionStyle from '../sofbox/Sections/SectionStyle'
import PricingCardStyle4 from '../sofbox/Card/PricingCardStyle4'
export default {
  name: 'Pricing',
  components: { PricingCardStyle4, SectionStyle }
}
</script>

<style scoped>

</style>
