<template>
  <FooterMain class="iq-footerr iq-pt-40 iq-pb-20">
    <div slot="footerContent">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 iq-mtb-20">
          <FooterLogo
            :section-image="navLogo"
            section-text="Lorem Ipsum has been the industry's standard dummy text ever since the 1500s."
          />
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 iq-mtb-20">
          <FooterAddress :address-content="footerText" class="iq-contact"/>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 iq-mtb-20">
          <FooterLinks title="Menu" :content="footerHome" />
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 iq-mtb-20">
          <FooterLinks title="Help" :content="footerHelp" />
        </div>
      </div>
      <hr>
      <div class="row iq-mt-20 align-items-center">
        <div class="col-lg-8 col-md-7 col-sm-12 text-left iq-font-dark">
          <div class="" >
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
      footerHelp: [
        {
          section: [
            {
              href: 'javascript:void(0)',
              title: 'Help Center'
            },
            {
              href: 'javascript:void(0)',
              title: 'Product'
            },
            {
              href: 'javascript:void(0)',
              title: 'Tool'
            }
          ]
        }
      ],
      /*
      footerTextBottom = '© 2018 Sofbox Developed by <b>iqonicthemes</b>.',
*/

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
