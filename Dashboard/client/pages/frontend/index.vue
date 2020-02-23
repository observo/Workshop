
<template>
<div v-scroll-spy="{ sectionSelector: '.page-menu' , offset: 75 }"
    id="main-container">
    <!-- Navigation -->
    <navigation-one-page> </navigation-one-page>
    <masthead> </masthead>
    <features> </features>
    <feature-list> </feature-list>
    <partners> </partners>
    <component-info> </component-info>

    <compare-image> </compare-image>

    <skin-choose v-if="false"
        class="bg-primary inverse"> </skin-choose>
    <!-- </div> -->
    <portfolio> </portfolio>
    <why-choose v-if="false"
        id="more"> </why-choose>

    <!-- Footer -->
    <footer class="bg-white py-5">
        <div class="container-fluid">
            <div class="small text-center text-muted">Copyright &copy; 2019 - <strong>Ignity.co</strong></div>
        </div>
    </footer>

    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API = Tawk_API || {},
            Tawk_LoadStart = new Date();
        (function() {
            var s1 = document.createElement("script"),
                s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/5db7417ee4c2fa4b6bd8d3c9/default';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script>
    <!--End of Tawk.to Script-->

</div>
</template>
<script>
import FeatureList from '@/components/Module/Frontend/FeatureList'
import SkinChoose from '@/components/Module/Frontend/SkinChoose'
import CompareImage from '@/components/Module/Frontend/CompareImage'
import Portfolio from '@/components/Module/Frontend/Portfolio'
import Masthead from '@/components/Module/Frontend/Masthead'
import Features from '@/components/Module/Frontend/Features'
import WhyChoose from '@/components/Module/Frontend/WhyChoose'
import ComponentInfo from '@/components/Module/Frontend/ComponentInfo'
import Partners3 from '@/components/Module/Frontend/Partners3'
import NavigationOnePage from '@/components/Module/Frontend/NavigationOnePage'
import Partners2 from '@/components/Module/Frontend/Partners2'
import Partners from '@/components/Module/Frontend/Partners'

export default {
  components: {
    FeatureList,
    SkinChoose,
    CompareImage,
    Portfolio,
    Masthead,
    Features,
    WhyChoose,
    ComponentInfo,
    Partners,
    NavigationOnePage,
    Partners2
  },
  layout: 'frontend'
}

</script>


<style lang="scss">
.page-compare {
  -webkit-box-align: stretch;
  -ms-flex-align: stretch;
  align-items: stretch;
  background-color: #fff;
  display: flex;
  -webkit-box-direction: normal;
  -ms-flex-direction: column;
  flex-direction: column;
  -webkit-box-pack: justify;
  -ms-flex-pack: justify;
  justify-content: space-between;
}

</style>


