<template>
  <div class="main-content">
    <Home />
    <About />
    <Licence />
    <!-- <SectionStyle section-class="overview-block-ptb text-center" id="iq-team">
      <h3 slot="sectionTitle" class="title iq-tw-7">
        Meet The Team
      </h3>
      <p slot="sectionDescription">
        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley,
        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
      </p>
      <div slot="sectionContent">
        <Team />
      </div>
      <div slot="sectionFooter">
        <a href="javascript:void(0)" class="button-blue-shadow iq-mt-40">
          Here More Team Members
        </a>
      </div>
    </SectionStyle> -->
    <MeetTeam />
    <!-- <SectionStyle section-class="iq-counter-box-2 overview-block-pb it-works re4-mt-50" section-id="iq-counter">
      <h3 slot="sectionTitle" class="title iq-tw-7">
        Happy Downloads
      </h3>
      <p slot="sectionDescription">
        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley,
        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
      </p>
      <div slot="sectionContent">
        <Counter />
      </div>
    </SectionStyle> -->
    <Downloads />
    
    <Footer />
  </div>
</template>

<script>
import { sofbox } from '../../assets/app/app'
import Home from '../../components/LandingPage8/Home'
import About from '../../components/LandingPage8/About'
import Licence from '../../components/LandingPage8/Licence'
import MeetTeam from '../../components/LandingPage8/MeetTeam'
// import Team from '../../components/LandingPage8/Team'
import Downloads from '../../components/LandingPage8/Downloads'
// import Counter from '../../components/LandingPage8/Counter'
import Footer from '../../components/LandingPage8/Footer'

export default {
  name: 'Index',
  layout: 'LandingPage8',
  components: {
    Home,
    About,
    Licence,
    // Team,
    MeetTeam,
    Downloads,
    // Counter,
    Footer
  },
  mounted () {
    sofbox.index()
  }
}
</script>
