
<template>
<div>
  <SectionStyle6 :full-width="true" :reverse="true" section-class="blue-bg iq-ptb-40 get-feature iq-font-white iq-mt-30">
    <template slot="sectionTitle">
      Lorem Ipsum is simply
    </template>
    <template slot="sectionImage">
      <img :src="require('../../assets/images/drive/16.png')" class="img-fluid" alt="drive16">
    </template>
    <template slot="sectionDescription">
      Lorem Ipsum is simply dummy text of the printing and typesetting industry.
    </template>
    <div slot="sectionFooter">
      <a href="javascript:void(0)" class="button bt-black iq-mt-10 iq-mr-20">Renew Home</a>
      <a href="javascript:void(0)" class="button-line-white iq-mt-10">Re Download</a>
    </div>
  </SectionStyle6>
  <SectionStyle section-class="overview-block-ptb text-center">
    <h2 slot="sectionTitle" class="title iq-tw-7 iq-mb-20">
      Lorem simply dummy
    </h2>
    <p slot="sectionDescription">
      Lorem Ipsum is simply dummy text of the printing and typesetting industry.
      Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley,
      Lorem Ipsum is simply dummy text of the printing and typesetting industry.
    </p>
    <div slot="sectionFooter">
      <a href="javascript:void(0)" class="button-blue-shadow iq-mt-20 iq-mr-20">Learn More</a>
      <a href="javascript:void(0)" class="button-line-shadow iq-mt-20">Download</a>
    </div>
  </SectionStyle>
  <FooterMain class="iq-footer3 iq-ptb-20">
    <div slot="footerContent">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 iq-mtb-20">
          <FooterLogo
            :section-image="navLogo"
            section-color="white"
            section-text="Lorem Ipsum has been the industry's standard dummy text ever since the 1500s."
          />
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 iq-mtb-20">
          <FooterAddress :address-content="footerText" address-title="Address" address-color="white" class="iq-contact" />
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 iq-mtb-20">
          <FooterAddress :address-content="footerTiming" address-title="Office Days" address-color="white" class="addresss-info" />
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 iq-mtb-20">
          <FooterLinks :content="footerHome" title="Menu" color="white" />
        </div>
      </div>
      <hr>
      <div class="row iq-mt-20 align-items-center">
        <div class="col-lg-8 col-md-7 col-sm-12 text-left iq-font-dark">
          <div class="">
            © 2018 Sofbox Developed by <b>iqonicthemes</b>.
          </div>
        </div>

        <div class="col-md-5 col-lg-4 col-sm-12 align-self-center">
          <ul class="info-share text-center text-sm-right">
            <li v-for="(option,index) in socialNavItems" :key="index">
              <a :href="option.href" v-html="option.icon" />
            </li>
          </ul>
        </div>
      </div>
    </div>
  </FooterMain>
</div>
</template>

<script>
import FooterMain from '../sofbox/Partials/Footer/FooterMain'
import FooterLogo from '../sofbox/Partials/FooterComponents/FooterLogo'
import FooterAddress from '../sofbox/Partials/FooterComponents/FooterAddress'
import FooterLinks from '../sofbox/Partials/FooterComponents/FooterLinks'
import logoImg from '../../assets/images/logo-footer.png'

export default {
  name: 'Footer',
  components: { FooterLinks, FooterAddress, FooterLogo, FooterMain },
  data () {
    return {
      navLogo: logoImg,
      footerText: [
        {
          icon: true,
          iconClass: 'ion-ios-location-outline',
          text: '1234 North Luke Lane, South Bend, IN 360001'
        },
        {
          icon: true,
          iconClass: 'ion-ios-telephone-outline',
          text: '+0123 456 789'
        },
        {
          icon: true,
          iconClass: 'ion-ios-email-outline',
          text: 'mail@sofbox.com'
        }
      ],
      footerHome: [
        {
          section: [
            {
              href: 'javascript:void(0)',
              title: 'Home'
            },
            {
              href: 'javascript:void(0)',
              title: 'About us'
            },
            {
              href: 'javascript:void(0)',
              title: 'Our team'
            },
            {
              href: 'javascript:void(0)',
              title: 'Portfolio'
            }
          ]
        },
        {
          section: [
            {
              href: 'javascript:void(0)',
              title: 'FAQs'
            },
            {
              href: 'javascript:void(0)',
              title: 'Blog'
            },
            {
              href: 'javascript:void(0)',
              title: 'Our services'
            },
            {
              href: 'javascript:void(0)',
              title: 'Contact us'
            }
          ]
        }
      ],
      footerTiming: [
        {

          icon: false,
          text: 'MON - FRI: 09AM - 05PM'
        },
        {
          icon: false,
          text: 'SAT: 09AM - 01PM'
        },
        {
          icon: false,
          text: 'SUN: Enjoy Day'
        }
      ],

      socialNavItems: [
        { href: 'javascript:void(0)', icon: '<i class="fab fa-twitter"></i>' },
        { href: 'javascript:void(0)', icon: '<i class="fab fa-facebook-f"></i>' },
        { href: 'javascript:void(0)', icon: '<i class="fab fa-google"></i>' },
        { href: 'javascript:void(0)', icon: '<i class="fab fa-github"></i>' }
      ]
    }
  }
}
</script>

<style scoped></style>
