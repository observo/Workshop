<template>
  <div class="contact-bg">
    <h5 :class="'iq-tw-7 iq-mb-10 iq-font-'+addressColor">
      {{ addressTitle }}
    </h5>
    <ul :class="addressClass">
      <li v-for="(option,index) in addressContent" :key="index">
        <i v-if="option.icon" :class="option.iconClass"></i>
        <p>{{ option.text }}</p>
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  name: 'FooterAddress',
  // eslint-disable-next-line vue/require-prop-types
  props: ['addressColor', 'addressTitle', 'addressContent', 'addressClass']
}
</script>
