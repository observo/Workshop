<template>
  <div>
    <SectionStyle id="iq-team" section-class="overview-block-ptb text-center">
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
    </SectionStyle>
  </div>
</template>
<script>
import Team from '../../components/LandingPage8/Team'
export default {
  name: 'MeetTeam',
  components: {
    Team
  }
}
</script>
