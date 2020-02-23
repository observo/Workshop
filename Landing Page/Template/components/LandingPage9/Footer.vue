<template>
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
          <FooterAddress :address-content="footerTiming" address-title="Office Days" address-color="white" address-class="addresss-info" />
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 iq-mtb-20">
          <FooterLinks :content="footerHome" title="Menu" color="white" />
        </div>
      </div>
      <hr>
      <div class="row iq-mt-20">
        <div class="col-lg-6 col-md-5 col-sm-12">
          <ul class="link">
            <li class="d-inline-block iq-mr-20">
              <a href="javascript:void(0)">Term and Condition</a>
            </li>
            <li class="d-inline-block">
              <a href="javascript:void(0)"> Privacy Policy</a>
            </li>
          </ul>
        </div>
        <div class="col-lg-6 col-md-7 col-sm-12">
          <div class="iq-copyright">
            © Copyright 2018 Sofbox Developed by <a href="https://iqonicthemes.com/">Iqonic Themes</a>.
          </div>
        </div>
      </div>
    </div>
  </FooterMain>
</template>

<script>
import FooterMain from '../sofbox/Partials/Footer/FooterMain'
import FooterLogo from '../sofbox/Partials/FooterComponents/FooterLogo'
import FooterAddress from '../sofbox/Partials/FooterComponents/FooterAddress'
import FooterLinks from '../sofbox/Partials/FooterComponents/FooterLinks'
import logoImg from '../../assets/images/logo.png'

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
