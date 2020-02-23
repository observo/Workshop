
<template>
<div id="main-container">
    <div style="width: 616px;     overflow-x: hidden; "
        class="mx-auto bg-white ig-p-2">
        <!-- Navigation -->
        <features2> </features2>

        <component-info2> </component-info2>

        <partners2> </partners2>

        <full-feature-list> </full-feature-list>
        <feature-list2> </feature-list2>

        <compare-image2> </compare-image2>

        <skin-choose v-if="false"
            class="bg-primary inverse"> </skin-choose>
        <!-- </div> -->
        <portfolio2> </portfolio2>
        <portfolio v-if="false"> </portfolio>
        <why-choose v-if="false"
            id="more"> </why-choose>

        <!-- Footer -->
        <footer class="bg-white py-5">
            <div class="container-fluid">
                <div class="small text-center text-muted">Copyright &copy; 2019 - <strong>Ignity.co</strong></div>
            </div>
        </footer>

        <description-html v-if="false"> </description-html>

    </div>
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
import NavigationOnePage from '@/components/Module/Frontend/NavigationOnePage'
import Portfolio2 from '@/components/Module/Frontend/Portfolio2'
import Features2 from '@/components/Module/Frontend/Features2'
import FeatureList2 from '@/components/Module/Frontend/FeatureList2'
import SectionTitle from '@/components/Module/Frontend/SectionTitle'
import FullFeatureList from '@/components/Module/Frontend/FullFeatureList'
import ComponentInfo2 from '@/components/Module/Frontend/ComponentInfo2'
import CompareImage2 from '@/components/Module/Frontend/CompareImage2'
import DescriptionHtml from '@/components/Module/Frontend/DescriptionHtml'
import Partners2 from '@/components/Module/Frontend/Partners2'

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

    NavigationOnePage,
    Portfolio2,
    Partners2,
    Features2,
    FeatureList2,
    SectionTitle,
    FullFeatureList,
    ComponentInfo2,
    CompareImage2,
    DescriptionHtml
  },
  layout: 'frontend'
}

</script>


<style lang="scss" scoped>
/deep/ .page-compare {
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

/deep/ .page-section {
  padding: 4rem 0rem;
}

.user-html h2 {
  border-bottom: 1px solid #d4d4d4;
  font-size: 20px;
  line-height: 30px;
  padding-bottom: 10px;
}

</style>


