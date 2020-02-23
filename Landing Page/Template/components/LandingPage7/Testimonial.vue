<template>
<div>
    <section class="overview-block-ptb white-bg iq-loved-customers">
    <div class="container">
        <div class="row">
        <div class="col-sm-12">
            <div class="heading-title">
            <h3 class="title iq-tw-7">Loved By Our Customers</h3>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
            </div>
        </div>
        </div>
        <div class="row">
        <div class="col-sm-12">
            <div class="owl-carousel" data-autoplay="true" data-loop="true" data-nav="true" data-dots="false" data-items="3" data-items-laptop="3" data-items-tab="2" data-items-mobile="1" data-items-mobile-sm="1" data-margin="30" >
            <div class="item">
                <CardStyle7>
                <div slot="cardMedia">
                    <img alt="#" class="img-fluid rounded-circle" :src="require('../../assets/images/testimonial/client-1.png')">
                </div>
                <div slot="cardHeader">
                    <h5 class="iq-tw-6">Jason Adams</h5>
                    <span class="sub-title">CEO, Sofbox</span>
                </div>
                <div slot="cardBody">
                    <p>Lorem ipsum madolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</p>
                </div>
                </CardStyle7>
            </div>
            <div class="item">
                <CardStyle7>
                <div slot="cardMedia">
                    <img alt="#" class="img-fluid rounded-circle" :src="require('../../assets/images/testimonial/client-2.jpg')">
                </div>
                <div slot="cardHeader">
                    <h5 class="iq-tw-6">Jenny Adams</h5>
                    <span class="sub-title">CEO, Sofbox</span>
                </div>
                <div slot="cardBody">
                    <p>Lorem ipsum madolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</p>
                </div>
                </CardStyle7>
            </div>
            <div class="item">
                <CardStyle7>
                <div slot="cardMedia">
                    <img alt="#" class="img-fluid rounded-circle" :src="require('../../assets/images/testimonial/client-3.jpg')">
                </div>
                <div slot="cardHeader">
                    <h5 class="iq-tw-6">John Deo</h5>
                    <span class="sub-title">CEO, Sofbox</span>
                </div>
                <div slot="cardBody">
                    <p>Lorem ipsum madolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</p>
                </div>
                </CardStyle7>
            </div>
            </div>
        </div>
        </div>
    </div>
    </section>
</div>
</template>
<script>
export default {
    
}
</script>