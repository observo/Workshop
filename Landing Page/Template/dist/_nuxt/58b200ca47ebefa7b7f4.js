(window.webpackJsonp=window.webpackJsonp||[]).push([[7],{296:function(t,e,n){"use strict";n.d(e,"a",(function(){return c}));var o,r;n(33),n(34),n(2),n(93);if("undefined"!=typeof window){var l=n(94);window.$=l,window.jQuery=l,o=n(308),r=n(201),n(309),n(310),n(202)}var c={index:function(){this.loaderInit(),this.onScroll(),this.toggleDropdown(),this.skrollr(),this.jarallax(),this.accordion(),this.progressBar(),this.wowInit(),this.owlCarousel()},loaderInit:function(){$("#load").fadeOut(),$("#loading").delay(1e3).fadeOut("slow")},onScroll:function(){$(window).on("scroll",(function(){$(this).scrollTop()>100?$("header").addClass("menu-sticky"):$("header").removeClass("menu-sticky")})),$("#back-to-top").fadeOut(),$(window).on("scroll",(function(){$(this).scrollTop()>250?$("#back-to-top").fadeIn(1400):$("#back-to-top").fadeOut(400)})),$(".nav-link").click((function(t){t.preventDefault()})),$('[data-spy="scroll"]').each((function(){$(this).scrollspy("refresh")}))},wowInit:function(){this.checkElement("class","wow")&&new o.WOW({boxClass:"wow",animateClass:"animated",offset:0,live:!1}).init()},toggleDropdown:function(){$("#main-header .menu-item .toggledrop").off("click"),$(window).width()<992&&$("#main-header .menu-item .toggledrop").on("click",(function(t){t.preventDefault(),$(this).closest("li").find(".sub-menu").toggle("d-block")})),$(window).on("resize",(function(){$(".widget .fa.fa-angle-down, #main .fa.fa-angle-down").on("click",(function(){window.$(this).closest("li").find(".sub-menu").toggle("d-block")})),window.$("#main-header .menu-item .toggledrop").off("click"),window.$(window).width()<992&&$("#main-header .menu-item .toggledrop").on("click",(function(t){t.preventDefault(),$(this).closest("li").find(".sub-menu").toggle("d-block")}))}))},skrollr:function(){r.init().destroy(),r.init({forceHeight:!1,easings:{easeOutBack:function(p,s){return(p-=1)*p*(((s=1.70158)+1)*p+s)+1}},mobileCheck:function(){return!1}})},checkElement:function(t,element){var e,n=!1;switch(t){case"class":null!=(e=document.getElementsByClassName(element))&&e.length>0&&(n=!0);break;case"id":null!=(e=document.getElementById(element))&&(n=!0)}return n},jarallax:function(t){function e(){return t.apply(this,arguments)}return e.toString=function(){return t.toString()},e}((function(){jarallax(document.querySelectorAll('[data-parallax="true"]'),{speed:.6})})),accordion:function(){$(".iq-accordion .iq-accordion .accordion-details").hide(),$(".iq-accordion .iq-accordion:first").addClass("accordion-active").children().slideDown("slow"),$(".iq-accordion .iq-accordion").on("click",(function(){$(this).children("div").is(":hidden")&&($(".iq-accordion .iq-accordion").removeClass("accordion-active").children("div").slideUp("slow"),$(this).toggleClass("accordion-active").children("div").slideDown("slow"))}))},progressBar:function(){this.checkElement("class","iq-progress-bar")&&$(".iq-progress-bar > span").each((function(){var t=$(this),e=t.data("percent");t.css({transition:"width 2s"}),setTimeout((function(){t.appear((function(){t.css("width",e+"%")}))}),500)}))},magnific:function(){$(".popup-gallery").magnificPopup({delegate:"a.popup-img",tLoading:"Loading image #%curr%...",type:"image",mainClass:"mfp-img-mobile",gallery:{navigateByImgClick:!0,enabled:!0,preload:[0,1]},image:{tError:'<a href="%url%">The image #%curr%</a> could not be loaded.'}}),$(".popup-youtube, .popup-vimeo, .popup-gmaps").magnificPopup({type:"iframe",disableOn:700,mainClass:"mfp-fade",preloader:!1,removalDelay:160,fixedContentPos:!1})},owlCarousel:function(){this.checkElement("class","owl-carousel")&&$(".owl-carousel").each((function(){var t=$(this);t.owlCarousel({items:t.data("items"),loop:t.data("loop"),margin:t.data("margin"),nav:t.data("nav"),dots:t.data("dots"),autoplay:t.data("autoplay"),autoplayTimeout:t.data("autoplay-timeout"),navText:['<i class="fas fa-angle-left fa-2x"></i>','<i class="fas fa-angle-right fa-2x"></i>'],responsiveClass:!0,responsive:{0:{items:t.data("items-mobile-sm")},480:{items:t.data("items-mobile")},786:{items:t.data("items-tab")},1023:{items:t.data("items-laptop")},1199:{items:t.data("items")}}})}))}}},298:function(t,e,n){t.exports=n.p+"img/8ef617e.png"},299:function(t,e,n){t.exports=n.p+"img/06f8280.png"},300:function(t,e,n){t.exports=n.p+"img/89ffd21.png"},301:function(t,e,n){t.exports=n.p+"img/676df5c.png"},302:function(t,e,n){t.exports=n.p+"img/6424202.png"},303:function(t,e,n){t.exports=n.p+"img/d4b7e4b.png"},304:function(t,e,n){t.exports=n.p+"img/8ef617e.png"},305:function(t,e,n){t.exports=n.p+"img/6424202.png"},307:function(t,e,n){t.exports=function(t){function e(n){if(i[n])return i[n].exports;var a=i[n]={i:n,l:!1,exports:{}};return t[n].call(a.exports,a,a.exports,e),a.l=!0,a.exports}var i={};return e.m=t,e.c=i,e.i=function(t){return t},e.d=function(t,i,n){e.o(t,i)||Object.defineProperty(t,i,{configurable:!1,enumerable:!0,get:n})},e.n=function(t){var i=t&&t.__esModule?function(){return t.default}:function(){return t};return e.d(i,"a",i),i},e.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)},e.p="/dist/",e(e.s=2)}([function(t,e,i){var n=i(4)(i(1),i(5),null,null);t.exports=n.exports},function(t,e,i){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var n=i(3);e.default={props:{startVal:{type:Number,required:!1,default:0},endVal:{type:Number,required:!1,default:2017},duration:{type:Number,required:!1,default:3e3},autoplay:{type:Boolean,required:!1,default:!0},decimals:{type:Number,required:!1,default:0,validator:function(t){return t>=0}},decimal:{type:String,required:!1,default:"."},separator:{type:String,required:!1,default:","},prefix:{type:String,required:!1,default:""},suffix:{type:String,required:!1,default:""},useEasing:{type:Boolean,required:!1,default:!0},easingFn:{type:Function,default:function(t,e,i,n){return i*(1-Math.pow(2,-10*t/n))*1024/1023+e}}},data:function(){return{localStartVal:this.startVal,displayValue:this.formatNumber(this.startVal),printVal:null,paused:!1,localDuration:this.duration,startTime:null,timestamp:null,remaining:null,rAF:null}},computed:{countDown:function(){return this.startVal>this.endVal}},watch:{startVal:function(){this.autoplay&&this.start()},endVal:function(){this.autoplay&&this.start()}},mounted:function(){this.autoplay&&this.start(),this.$emit("mountedCallback")},methods:{start:function(){this.localStartVal=this.startVal,this.startTime=null,this.localDuration=this.duration,this.paused=!1,this.rAF=(0,n.requestAnimationFrame)(this.count)},pauseResume:function(){this.paused?(this.resume(),this.paused=!1):(this.pause(),this.paused=!0)},pause:function(){(0,n.cancelAnimationFrame)(this.rAF)},resume:function(){this.startTime=null,this.localDuration=+this.remaining,this.localStartVal=+this.printVal,(0,n.requestAnimationFrame)(this.count)},reset:function(){this.startTime=null,(0,n.cancelAnimationFrame)(this.rAF),this.displayValue=this.formatNumber(this.startVal)},count:function(t){this.startTime||(this.startTime=t),this.timestamp=t;var e=t-this.startTime;this.remaining=this.localDuration-e,this.useEasing?this.countDown?this.printVal=this.localStartVal-this.easingFn(e,0,this.localStartVal-this.endVal,this.localDuration):this.printVal=this.easingFn(e,this.localStartVal,this.endVal-this.localStartVal,this.localDuration):this.countDown?this.printVal=this.localStartVal-(this.localStartVal-this.endVal)*(e/this.localDuration):this.printVal=this.localStartVal+(this.localStartVal-this.startVal)*(e/this.localDuration),this.countDown?this.printVal=this.printVal<this.endVal?this.endVal:this.printVal:this.printVal=this.printVal>this.endVal?this.endVal:this.printVal,this.displayValue=this.formatNumber(this.printVal),e<this.localDuration?this.rAF=(0,n.requestAnimationFrame)(this.count):this.$emit("callback")},isNumber:function(t){return!isNaN(parseFloat(t))},formatNumber:function(t){t=t.toFixed(this.decimals);var e=(t+="").split("."),i=e[0],n=e.length>1?this.decimal+e[1]:"",a=/(\d+)(\d{3})/;if(this.separator&&!this.isNumber(this.separator))for(;a.test(i);)i=i.replace(a,"$1"+this.separator+"$2");return this.prefix+i+n+this.suffix}},destroyed:function(){(0,n.cancelAnimationFrame)(this.rAF)}}},function(t,e,i){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var a=function(t){return t&&t.__esModule?t:{default:t}}(i(0));e.default=a.default,"undefined"!=typeof window&&window.Vue&&window.Vue.component("count-to",a.default)},function(t,e,i){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var n=0,a="webkit moz ms o".split(" "),o=void 0,r=void 0;if("undefined"==typeof window)e.requestAnimationFrame=o=function(){},e.cancelAnimationFrame=r=function(){};else{e.requestAnimationFrame=o=window.requestAnimationFrame,e.cancelAnimationFrame=r=window.cancelAnimationFrame;for(var s=void 0,u=0;u<a.length&&(!o||!r);u++)s=a[u],e.requestAnimationFrame=o=o||window[s+"RequestAnimationFrame"],e.cancelAnimationFrame=r=r||window[s+"CancelAnimationFrame"]||window[s+"CancelRequestAnimationFrame"];o&&r||(e.requestAnimationFrame=o=function(t){var e=(new Date).getTime(),i=Math.max(0,16-(e-n)),a=window.setTimeout((function(){t(e+i)}),i);return n=e+i,a},e.cancelAnimationFrame=r=function(t){window.clearTimeout(t)})}e.requestAnimationFrame=o,e.cancelAnimationFrame=r},function(t,e){t.exports=function(t,e,i,n){var a,o=t=t||{},r=typeof t.default;"object"!==r&&"function"!==r||(a=t,o=t.default);var s="function"==typeof o?o.options:o;if(e&&(s.render=e.render,s.staticRenderFns=e.staticRenderFns),i&&(s._scopeId=i),n){var u=Object.create(s.computed||null);Object.keys(n).forEach((function(t){var e=n[t];u[t]=function(){return e}})),s.computed=u}return{esModule:a,exports:o,options:s}}},function(t,e){t.exports={render:function(){var t=this,e=t.$createElement;return(t._self._c||e)("span",[t._v("\n  "+t._s(t.displayValue)+"\n")])},staticRenderFns:[]}}])},328:function(t,e,n){t.exports=n.p+"img/b4359c4.jpg"},339:function(t,e,n){"use strict";var o={name:"Clients",data:function(){return{images:[{src:n(298)},{src:n(299)},{src:n(300)},{src:n(301)},{src:n(302)},{src:n(303)},{src:n(304)},{src:n(305)}]}}},r=n(1),component=Object(r.a)(o,(function(){var t=this.$createElement,e=this._self._c||t;return e("div",{staticClass:"iq-our-clients iq-our-new white-bg iq-ptb-50"},[e("div",{staticClass:"container"},[e("div",{staticClass:"row"},[e("div",{staticClass:"col-lg-12 col-md-12"},[e("div",{staticClass:"owl-carousel",attrs:{"data-autoplay":"true","data-loop":"true","data-nav":"true","data-dots":"false","data-items":"5","data-items-laptop":"5","data-items-tab":"4","data-items-mobile":"3","data-items-mobile-sm":"1","data-margin":"30"}},this._l(this.images,(function(option,t){return e("div",{key:t,staticClass:"item"},[e("img",{staticClass:"img-fluid center-block",attrs:{src:option.src,alt:"#"}})])})),0)])])])])}),[],!1,null,"ebcddf90",null);e.a=component.exports},363:function(t,e,n){t.exports=n.p+"img/1682689.jpg"},364:function(t,e,n){t.exports=n.p+"img/04000dc.jpg"},365:function(t,e,n){t.exports=n.p+"img/f865b44.png"},366:function(t,e,n){t.exports=n.p+"img/4dda2ba.png"},367:function(t,e,n){t.exports=n.p+"img/d6486e7.png"},368:function(t,e,n){t.exports=n.p+"img/940025e.png"},369:function(t,e,n){t.exports=n.p+"img/21d55ff.png"},370:function(t,e,n){t.exports=n.p+"img/4d7ffbd.png"},399:function(t,e,n){"use strict";n.r(e);var o={name:"Home",components:{ParallaxStyle1:n(117).default},data:function(){return{bgImage:n(328)}}},r=n(1),l=Object(r.a)(o,(function(){var t=this.$createElement,e=this._self._c||t;return e("ParallaxStyle1",{attrs:{ids:"iq-home","bg-image":this.bgImage,"class-names":"iq-banner-07 hero-section  overview-block-pt iq-bg-over iq-over-black-10  iq-parallax"}},[e("div",{staticClass:"container"},[e("div",{staticClass:"banner-text"},[e("div",{staticClass:"row"},[e("div",{staticClass:"col-md-6"},[e("h1",{staticClass:"text-uppercase iq-tw-3"},[this._v("\n            Provides To Make Better "),e("b",{staticClass:"iq-tw-7"},[this._v("software")])]),this._v(" "),e("p",{staticClass:"iq-pt-15 iq-mb-40"},[this._v("\n            Lorem Ipsum is simply dummy text of the printing and typesetting industry.")]),this._v(" "),e("a",{staticClass:"button bt-blue",attrs:{href:"javascript:void(0)"}},[this._v("Download")])])])])])])}),[],!1,null,null,null).exports,c=n(296),d=n(307),m={name:"About",components:{countTo:n.n(d).a}},f=Object(r.a)(m,(function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",[n("section",{staticClass:"iq-counter-box-1 overview-block-ptb it-works re4-mt-50",attrs:{id:"how-it-works"}},[n("div",{staticClass:"container"},[t._m(0),t._v(" "),n("div",{staticClass:"row justify-content-md-center"},[n("div",{staticClass:"col col-lg-4 text-center"},[n("div",{staticClass:"iq-counter"},[n("div",{staticClass:"counter-date"},[n("span",{staticClass:"timer iq-tw-7 iq-font-blue"},[n("count-to",{attrs:{"start-val":0,"end-val":5656123,duration:25e3}})],1),t._v(" "),n("label",{staticClass:"iq-font-grey"},[t._v("App Download")])])])]),t._v(" "),n("div",{staticClass:"col-md-auto text-center r4-mt-30"},[n("div",{staticClass:"iq-counter"},[n("div",{staticClass:"counter-date"},[n("span",{staticClass:"timer iq-tw-7 iq-font-blue"},[n("count-to",{attrs:{"start-val":0,"end-val":2530,duration:25e3}})],1),t._v(" "),n("label",{staticClass:"iq-font-grey"},[t._v("Happy Clients")])])])]),t._v(" "),n("div",{staticClass:"col col-lg-4 text-center r4-mt-30"},[n("div",{staticClass:"iq-counter"},[n("div",{staticClass:"counter-date"},[n("span",{staticClass:"timer iq-tw-7 iq-font-blue"},[n("count-to",{attrs:{"start-val":0,"end-val":8120,duration:25e3}})],1),t._v(" "),n("label",{staticClass:"iq-font-grey"},[t._v("Active Accounts")])])])])])])])])}),[function(){var t=this.$createElement,e=this._self._c||t;return e("div",{staticClass:"row "},[e("div",{staticClass:"col-sm-12"},[e("div",{staticClass:"heading-title"},[e("h3",{staticClass:"title iq-tw-7"},[this._v("\n            What is sofbox ?\n          ")]),this._v(" "),e("p",[this._v("Lorem Ipsum is simply dummy text of the printing and typesetting industry.")])])])])}],!1,null,null,null).exports,h={name:"Service"},v=Object(r.a)(h,(function(){var t=this.$createElement,e=this._self._c||t;return e("section",{staticClass:"life-work overview-block-ptb how-works",attrs:{id:"software-features"}},[e("div",{staticClass:"container"},[e("div",{staticClass:"row"},[this._m(0),this._v(" "),e("div",{staticClass:"iq-software-demo-1"},[e("img",{staticClass:"img-fluid",attrs:{src:n(363),alt:"drive05"}})])])])])}),[function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",{staticClass:"col-md-12 col-lg-6"},[n("div",{staticClass:"heading-title left text-left"},[n("h3",{staticClass:"iq-tw-7 iq-mb-25 title"},[t._v("What sofbox can do ?")])]),t._v(" "),n("p",{},[t._v("Simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,")]),t._v(" "),n("p",{},[t._v("It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.")]),t._v(" "),n("h6",{staticClass:"iq-tw-6 mb-3"},[t._v("Discover our best ever services.")]),t._v(" "),n("a",{staticClass:"button",attrs:{href:"javascript:void(0)"}},[t._v("Click Here")])])}],!1,null,"db84cf40",null).exports,w={name:"Features"},y=Object(r.a)(w,(function(){var t=this.$createElement,e=this._self._c||t;return e("section",{staticClass:"life-work-1 overview-block-ptb software",attrs:{id:"great-features"}},[e("div",{staticClass:"container"},[e("div",{staticClass:"row"},[e("div",{staticClass:"col-lg-6 col-md-12"},[e("img",{staticClass:"img-fluid",attrs:{src:n(364),alt:"drive05"}})]),this._v(" "),this._m(0)])])])}),[function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",{staticClass:"col-lg-6 col-md-12"},[n("div",{staticClass:"heading-title left text-left mt-md-3"},[n("h3",{staticClass:"iq-tw-7 iq-mb-25 title"},[t._v("\n            Sofbox Service\n          ")])]),t._v(" "),n("p",{staticClass:"iq-mb-25"},[t._v("\n          Simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.\n        ")]),t._v(" "),n("ul",{staticClass:"iq-list"},[n("li",{staticClass:"iq-tw-6"},[n("i",{staticClass:"ion-android-done-all iq-mr-10 iq-font-blue iq-font-30"}),n("span",{staticClass:"iq-font-black"},[t._v("Simply dummy text of the Lorem Ipsum is printing and setting industry.")])]),t._v(" "),n("li",{staticClass:"iq-tw-6"},[n("i",{staticClass:"ion-android-done-all iq-mr-10 iq-font-blue iq-font-30"}),n("span",{staticClass:"iq-font-black"},[t._v("Simply dummy text of the Lorem Ipsum is printing and setting industry.")])]),t._v(" "),n("li",{staticClass:"iq-tw-6"},[n("i",{staticClass:"ion-android-done-all iq-mr-10 iq-font-blue iq-font-30"}),n("span",{staticClass:"iq-font-black"},[t._v("Simply dummy text of the Lorem Ipsum is printing and setting industry.")])]),t._v(" "),n("li",{staticClass:"iq-tw-6"},[n("i",{staticClass:"ion-android-done-all iq-mr-10 iq-font-blue iq-font-30"}),n("span",{staticClass:"iq-font-black"},[t._v("Simply dummy text of the Lorem Ipsum is printing and setting industry.")])]),t._v(" "),n("li",{staticClass:"iq-tw-6"},[n("i",{staticClass:"ion-android-done-all iq-mr-10 iq-font-blue iq-font-30"}),n("span",{staticClass:"iq-font-black"},[t._v("Simply dummy text of the Lorem Ipsum is printing and setting industry.")])])])])}],!1,null,"7a10366d",null).exports,C={name:"Blog"},_=Object(r.a)(C,(function(){var t=this.$createElement,e=this._self._c||t;return e("section",{staticClass:"overview-block-ptb iq-bg-over  iq-over-blue-80 iq-tool-feature  iq-font-white",attrs:{id:"blog"}},[e("div",{staticClass:"soft-about"},[e("img",{staticClass:"box-img1 img-fluid wow fadeInUp",staticStyle:{visibility:"visible","animation-duration":"1.5s","animation-name":"fadeInUp"},attrs:{alt:"",src:n(365),"data-wow-duration":"1.5s"}}),this._v(" "),e("img",{staticClass:"box-img6 img-fluid wow fadeInUp",staticStyle:{visibility:"visible","animation-duration":"2.5s","animation-name":"fadeInUp"},attrs:{alt:"",src:n(366),"data-wow-duration":"2.5s"}}),this._v(" "),e("img",{staticClass:"box-img3 img-fluid wow rotateIn",staticStyle:{visibility:"visible","animation-duration":"1s","animation-name":"rotateIn"},attrs:{alt:"",src:n(367),"data-wow-duration":"1s"}}),this._v(" "),e("img",{staticClass:"box-img4 img-fluid wow fadeInRight",staticStyle:{visibility:"visible","animation-duration":"1.5s","animation-name":"fadeInRight"},attrs:{alt:"",src:n(368),"data-wow-duration":"1.5s"}}),this._v(" "),e("img",{staticClass:"box-img5 img-fluid wow rotateInUpRight",staticStyle:{visibility:"visible","animation-duration":"1.5s","animation-name":"rotateInUpRight"},attrs:{alt:"",src:n(369),"data-wow-duration":"1.5s"}})]),this._v(" "),this._m(0)])}),[function(){var t=this.$createElement,e=this._self._c||t;return e("div",{staticClass:"container"},[e("div",{staticClass:"row"},[e("div",{staticClass:"col-lg-6 col-md-12"},[e("h2",{staticClass:"iq-tw-6 iq-mt-100 iq-mb-20 iq-font-white"},[this._v("\n          How To use Sofbox ?\n        ")]),this._v(" "),e("p",{},[this._v("\n          Simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, Simply dummy text of the printing and typesetting industry.\n        ")])]),this._v(" "),e("div",{staticClass:"col-lg-6 col-md-12 soft-about"})])])}],!1,null,"105c9012",null).exports,x={name:"AboutMe"},$=Object(r.a)(x,(function(){var t=this.$createElement,e=this._self._c||t;return e("div",{staticClass:"overview-block-ptb grey-bg text-center about-me"},[e("div",{staticClass:"container"},[e("div",{staticClass:"row"},[e("div",{staticClass:"col-lg-7 col-md-12"},[e("img",{staticClass:"img-fluid",attrs:{src:n(370),alt:""}})]),this._v(" "),this._m(0)])])])}),[function(){var t=this.$createElement,e=this._self._c||t;return e("div",{staticClass:"col-lg-5 col-md-12"},[e("div",{staticClass:"text-center iq-mt-20"},[e("h6",[e("i",[this._v('"Simply dummy text of the printing and typesetting industry. Lorem Ipsum has been"')])])])])}],!1,null,"6c1a79b8",null).exports,k=n(339),S={name:"Contact"},V=Object(r.a)(S,(function(){var t=this.$createElement;this._self._c;return this._m(0)}),[function(){var t=this.$createElement,e=this._self._c||t;return e("section",{staticClass:"overview-block-ptb blue-bg text-center iq-font-white ",attrs:{id:"contact"}},[e("div",{staticClass:"container"},[e("h2",{staticClass:"iq-tw-6 iq-pb-20 iq-font-white"},[this._v("\n      Get Started Today\n    ")]),this._v(" "),e("p",[this._v("Simply dummy text of the printing and typesetting industry. Lorem Ipsum has been")]),this._v(" "),e("a",{staticClass:"button bt-black iq-mt-10",attrs:{href:"javascript:void(0)"}},[this._v("Let's Started")])])])}],!1,null,"2c072c98",null).exports,F={name:"Footer",components:{FooterStyle4:n(129).default}},A=Object(r.a)(F,(function(){var t=this.$createElement,e=this._self._c||t;return e("FooterStyle4",[e("div",{attrs:{slot:"copyright"},slot:"copyright"},[this._v("\n    © 2018 Sofbox Developed by "),e("b",[this._v("iqonicthemes")]),this._v(".\n  ")]),this._v(" "),e("ul",{attrs:{slot:"links"},slot:"links"},[e("li",[e("a",{attrs:{href:"javascript:void(0)"}},[e("i",{staticClass:"fab fa-twitter"})])]),this._v(" "),e("li",[e("a",{attrs:{href:"javascript:void(0)"}},[e("i",{staticClass:"fab fa-facebook"})])]),this._v(" "),e("li",[e("a",{attrs:{href:"javascript:void(0)"}},[e("i",{staticClass:"fab fa-google"})])]),this._v(" "),e("li",[e("a",{attrs:{href:"javascript:void(0)"}},[e("i",{staticClass:"fab fa-github"})])])])])}),[],!1,null,"03f63bd8",null).exports,I={layout:"LandingPage4",name:"Index",components:{Home:l,About:f,Service:v,Features:y,Blog:_,AboutMe:$,Clients:k.a,Contact:V,Footer:A},mounted:function(){c.a.index()}},j=Object(r.a)(I,(function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",[n("Home"),t._v(" "),n("About"),t._v(" "),n("Service"),t._v(" "),n("Features"),t._v(" "),n("blog"),t._v(" "),n("AboutMe"),t._v(" "),n("Clients"),t._v(" "),n("Contact"),t._v(" "),n("Footer")],1)}),[],!1,null,"fc815826",null);e.default=j.exports}}]);