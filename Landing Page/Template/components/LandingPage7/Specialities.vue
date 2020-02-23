<template>
    <div>
        <section class="overview-block-ptb grey-bg iq-specialities">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="heading-title">
                        <h3 class="title iq-tw-7">Sofbox Specialities </h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-lg-3 col-md-6 iq-mb-30" v-for="(item, index) of list" :key = index >
                        <CardStyle6>
                        <i  slot="cardMedia" aria-hidden="true" :Class="item.icon" ></i>
                        <div slot="cardBody">
                            <h5 class="iq-tw-7 iq-pt-20 iq-pb-10">{{ item.title }}</h5>
                            <p> {{ item.description }} </p>
                        </div>
                        </CardStyle6>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>
<script>
export default {
    data(){
        return {
            list: [
                        {
                            icon: 'ion-ios-monitor-outline',
                            title: 'High Resolution',
                            description: 'Lorem ipsum madolor sit amet, consectetur adipisicing elit.'
                        },
                        {
                            icon: 'ion-ios-settings',
                            title: 'Color Schemes',
                            description: 'Lorem ipsum madolor sit amet, consectetur adipisicing elit.'
                        },
                        {
                            icon: 'ion-social-googleplus-outline',
                            title: 'Google Fonts',
                            description: 'Lorem ipsum madolor sit amet, consectetur adipisicing elit.'
                        },
                        {
                            icon: 'ion-ios-heart-outline',
                            title: 'Clean Codes',
                            description: 'Lorem ipsum madolor sit amet, consectetur adipisicing elit.'
                        },
                        {
                            icon: 'ion-ios-color-wand-outline',
                            title: 'Responsive Design',
                            description: 'Lorem ipsum madolor sit amet, consectetur adipisicing elit.'
                        },
                        {
                            icon: 'ion-ios-checkmark-outline',
                            title: 'Easy to Use',
                            description: 'Lorem ipsum madolor sit amet, consectetur adipisicing elit.'
                        },
                        {
                            icon: 'ion-ios-photos-outline',
                            title: 'Perfect Showcase',
                            description: 'Lorem ipsum madolor sit amet, consectetur adipisicing elit.'
                        },
                        {
                            icon: 'ion-ios-videocam-outline',
                            title: 'Video Animation',
                            description: 'Lorem ipsum madolor sit amet, consectetur adipisicing elit.'
                        }
                    ]
        }
    }
}
</script>