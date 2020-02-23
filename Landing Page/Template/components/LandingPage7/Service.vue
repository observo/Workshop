<template>
    <div>
        <SectionStyle2 id="software-features" :small="true">
            <div slot="cardMedia" class="iq-software-demo">
                <img  class="img-fluid" :src="require('../../assets/images/drive/05.png')" alt="drive05">
            </div>
            <div slot="cardBody" class="col-lg-6 offset-lg-6" >
                <div class="heading-title left text-left">
                    <h3 class="iq-tw-7 iq-mb-25 title">Software Features</h3>
                </div>
                <p>Simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer </p>
                <ul class="iq-mt-40 iq-list">
                    <li class="iq-tw-6 iq-mb-15"><i class="ion-android-done-all iq-mr-10 iq-font-blue iq-font-30"></i><span class="iq-font-black">It is a long established fact that a reader will be distracted by the readable content.</span></li>
                    <li class="iq-tw-6 iq-mb-15"><i class="ion-android-done-all iq-mr-10 iq-font-blue iq-font-30"></i><span class="iq-font-black">There are many variations of passages of Lorem Ipsum available, but the majority have suffered.</span></li>
                    <li class="iq-tw-6 iq-mb-15"><i class="ion-android-done-all iq-mr-10 iq-font-blue iq-font-30"></i><span class="iq-font-black">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece.</span></li>
                    <li class="iq-tw-6 iq-mb-15"><i class="ion-android-done-all iq-mr-10 iq-font-blue iq-font-30"></i><span class="iq-font-black">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque.</span></li>
                    <li class="iq-tw-6 iq-mb-15"><i class="ion-android-done-all iq-mr-10 iq-font-blue iq-font-30"></i><span class="iq-font-black">Simply dummy text of the Lorem Ipsum is printing and type setting industry.</span></li>
                </ul>
            </div>
        </SectionStyle2>
    </div>
</template>
<script>
import SectionStyle2 from '../sofbox/Sections/SectionStyle2'
export default {
  components: { SectionStyle2 }
}
</script>