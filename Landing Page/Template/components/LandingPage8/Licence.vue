<template>
  <div>
    <SectionStyle6 :colRight="4" :colLeft="8" section-class="overview-block-ptb blue-bg iq-font-white box-mail">
      <div slot="sectionTitle">
        Renew Your Licence
      </div>
      <div slot="sectionImage">
        <img :src="require('../../assets/images/drive/15.png')" class="img-fluid" alt="drive15">
      </div>
      <template slot="sectionDescription">
        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
      </template>
      <div slot="sectionFooter">
        <a href="javascript:void(0)" class="button bt-black iq-mt-10 iq-mr-20">Renew Home</a>
        <a href="javascript:void(0)" class="button-line-white iq-mt-10">Renew Business</a>
      </div>
    </SectionStyle6>
  </div>
</template>
<script>
export default {
  name: 'Licence'
}
</script>
