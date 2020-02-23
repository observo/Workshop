<template>
  <FooterMain footer-class="iq-footerr iq-pt-40 iq-pb-20">
    <div slot="footerContent">
      <div class="row">
        <div class="col-lg-2 col-md-4 col-sm-6 iq-mtb-20">
          <FooterLinks title="Platforms" :content="footerPlatform" />
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6 iq-mtb-20">
          <FooterLinks title="Menu" :content="footerHome" />
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6 iq-mtb-20">
          <FooterLinks title="Community" :content="footerCommunity" />
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6 iq-mtb-20">
          <FooterLinks title="Company" :content="footerCompany" />
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 iq-mtb-20">
          <FooterAddress :address-content="footerText" address-color="black" address-class="iq-contact" address-title="Address" />
        </div>
      </div>
      <hr>
      <div class="row iq-mt-20 align-items-center">
        <div class="col-auto mr-auto">
          <ul class="link">
            <li class="d-inline-block img-fluid">
              <img id="logo_img" class="img-fluid logo_img" :src="require('../../assets/images/color-customizer/color-1.png')" alt="#">
            </li>
            <li class="d-inline-block iq-mr-10">
              <a href="javascript:void(0)">Term and Condition</a>
            </li>
            <li class="d-inline-block">
              <a href="javascript:void(0)"> Privacy Policy</a>
            </li>
          </ul>
        </div>
        <div class="col-auto">
          <div class="iq-copyright iq-ml-10">
            © 2018 <a href="index-12.html">Sofbox</a> All Rights Reserved
          </div>
        </div>
      </div>
    </div>
  </FooterMain>
</template>

<script>
import FooterMain from '../sofbox/Partials/Footer/FooterMain'
import FooterLinks from '../sofbox/Partials/FooterComponents/FooterLinks'
import FooterAddress from '../sofbox/Partials/FooterComponents/FooterAddress'
export default {
  name: 'Footer',
  components: { FooterAddress, FooterLinks, FooterMain },

  data () {
    return {
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

      footerPlatform: [
        {
          section: [
            {
              href: 'javascript:void(0)',
              title: 'Linux'
            },
            {
              href: 'javascript:void(0)',
              title: 'Windows'
            },
            {
              href: 'javascript:void(0)',
              title: 'Web'
            },
            {
              href: 'javascript:void(0)',
              title: 'Android'
            }
          ]
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
        }

      ],

      footerCommunity: [
        {
          section: [
            {
              href: 'javascript:void(0)',
              title: 'Knowledge'
            },
            {
              href: 'javascript:void(0)',
              title: 'Developers'
            },
            {
              href: 'javascript:void(0)',
              title: 'FAQ'
            },
            {
              href: 'javascript:void(0)',
              title: 'Forum'
            }
          ]
        }
      ],

      footerCompany: [
        {
          section: [
            {
              href: 'javascript:void(0)',
              title: 'About'
            },
            {
              href: 'javascript:void(0)',
              title: 'Blog'
            },
            {
              href: 'javascript:void(0)',
              title: 'Press'
            },
            {
              href: 'javascript:void(0)',
              title: 'Careers'
            }
          ]
        }
      ]
    }
  }
}
</script>

<style scoped>

</style>
