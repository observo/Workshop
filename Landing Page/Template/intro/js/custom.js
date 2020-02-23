/*

Template: Sofbox - Responsive Software Landing Page
Author: iqonicthemes.in
Version: 1.0
Design and Developed by: iqonicthemes.in

*/
/*================================================
[  Table of contents  ]
================================================



======================================
[ End table content ]
======================================*/

"use strict";

/*************************
page loader
*************************/
function preloader() {
    $("#load").fadeOut();
    $('#loading').delay().fadeOut();

}

/*************************
Back to top
*************************/
function backtotop() {
    $('#back-to-top').fadeOut();
    $(window).scroll(function () {
        if ($(this).scrollTop() > 250) {
            $('#back-to-top').fadeIn(1500);
        } else {
            $('#back-to-top').fadeOut(500);
        }
    });
    // scroll body to 0px on click
    $('#top').on('click', function () {
        $('top').tooltip('hide');
        $('body,html').animate({
            scrollTop: 0
        }, 800);
        return false;
    });
}





/*************************
Img Skrollr
*************************/
function imgskrollr() {
    var mySkrollr = skrollr.init({
        forceHeight: false,
        easings: {
            easeOutBack: function (p, s) {
                s = 1.70158;
                p = p - 1;
                return (p * p * ((s + 1) * p + s) + 1);
            }
        },
        mobileCheck: function () {
            //hack - forces mobile version to be off
            return false;
        }
    });
}




/********************************
 Skype Plateform menu active
 ********************************/

function skype_plateform() {
    $('#pills-tab li').on('click', function () {
        $('#pills-tab li').children('a').attr('aria-selected', false);
        $(this).children('a').attr('aria-selected', true);
    });
    $(window).on('scroll', function (e) {
        if ($(this).scrollTop() >= ($('#skype_plateform').offset().top - 250)) {
            $('#skype_plateform #pills-tab li').removeClass('active');
            $('#skype_plateform #pills-tab li').children('a[aria-selected=true]').parent('li').addClass('active');
            e.preventDefault();
        }
    });
}



/*************************
Wow Animation
*************************/
function wowanimation() {
    var wow = new WOW({
        boxClass: 'wow',
        animateClass: 'animated',
        offset: 0,
        mobile: false,
        live: true
    });
    wow.init();
}




/*************************
Tilt
*************************/

function skype_plateform() {
    $('#pills-tab li').on('click', function () {
        $('#pills-tab li').children('a').attr('aria-selected', false);
        $(this).children('a').attr('aria-selected', true);
    });
    $(window).on('scroll', function (e) {
        if ($(this).scrollTop() >= ($('#skype_plateform').offset().top - 250)) {
            $('#skype_plateform #pills-tab li').removeClass('active');
            $('#skype_plateform #pills-tab li').children('a[aria-selected=true]').parent('li').addClass('active');
            e.preventDefault();
        }
    });

}


/*************************
All function are called here 
*************************/
$(document).ready(function () {
    backtotop(),
    skype_plateform(),
    imgskrollr(),
    preloader()

});


$(window).on('load', function () {
    wowanimation();


});