/*

Style   : MobApp Script JS
Version : 1.0
Author  : Surjith S M
URI     : https://surjithctly.in/

Copyright © All rights Reserved 

*/

/*-----------------------------------
 * Embed - Google Maps
 *-----------------------------------*/

$(function() {
    "use strict";

    /*-----------------------------------
     * FIXED  MENU - HEADER
     *-----------------------------------*/
    function menuscroll() {
        var $navmenu = $('.nav-menu');
        if ($(window).scrollTop() > 50) {
            $navmenu.addClass('is-scrolling');
        } else {
            $navmenu.removeClass("is-scrolling");
        }
    }
    menuscroll();
    $(window).on('scroll', function() {
        menuscroll();
    });
    /*-----------------------------------
     * NAVBAR CLOSE ON CLICK
     *-----------------------------------*/

    $('.navbar-nav > li:not(.dropdown) > a').on('click', function() {
        $('.navbar-collapse').collapse('hide');
    });
    /* 
     * NAVBAR TOGGLE BG
     *-----------------*/
    var siteNav = $('#navbar');
    siteNav.on('show.bs.collapse', function(e) {
        $(this).parents('.nav-menu').addClass('menu-is-open');
    })
    siteNav.on('hide.bs.collapse', function(e) {
        $(this).parents('.nav-menu').removeClass('menu-is-open');
    })

    /*-----------------------------------
     * ONE PAGE SCROLLING
     *-----------------------------------*/
    // Select all links with hashes
    $('a[href*="#"]').not('[href="#"]').not('[href="#0"]').not('[data-toggle="tab"]').on('click', function(event) {
        // On-page links
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            // Figure out element to scroll to
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            // Does a scroll target exist?
            if (target.length) {
                // Only prevent default if animation is actually gonna happen
                event.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top
                }, 1000, function() {
                    // Callback after animation
                    // Must change focus!
                    var $target = $(target);
                    $target.focus();
                    if ($target.is(":focus")) { // Checking if the target was focused
                        return false;
                    } else {
                        $target.attr('tabindex', '-1'); // Adding tabindex for elements not focusable
                        $target.focus(); // Set focus again
                    };
                });
            }
        }
    });
    /*-----------------------------------
     * OWL CAROUSEL
     *-----------------------------------*/
    var $testimonialsDiv = $('.testimonials');
    if ($testimonialsDiv.length && $.fn.owlCarousel) {
        $testimonialsDiv.owlCarousel({
            items: 3,
            autoPlay: true,
            stopOnHover: true,
            nav: false,
            dots: false
            // navText: ['<span class="ti-arrow-left"></span>', '<span class="ti-arrow-right"></span>']
        });
    }

    var $galleryDiv = $('.img-gallery');
    if ($galleryDiv.length && $.fn.owlCarousel) {
        $galleryDiv.owlCarousel({
            loop: true,
            autoPlay: true,
            dots: false,
            stopOnHover: true,
            slideSpeed: 200,
            // navText: ['<span class="ti-arrow-left"></span>', '<span class="ti-arrow-right"></span>'],
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 1
                }
            }
        });
    }
    $('.owl-carousel .owl-item').on('mouseenter',function(e){
        $(this).closest('.owl-carousel').trigger('stop.owl.autoplay');
    })
    $('.owl-carousel .owl-item').on('mouseleave',function(e){
        $(this).closest('.owl-carousel').trigger('play.owl.autoplay',[500]);
    })
}); /* End Fn */

/* Tiptool for explanation text */
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();


/* ------------------------

    magnify image: Modal JS

-------------------------*/

/* ------------------------
        General Gallery
 -------------------------*/
// Get the modal
    var modal = document.getElementById('generalModal');

    var modalImg = document.getElementById("imgContainer1");
    var captionText = document.getElementById("caption1");

    var indicators1 = document.getElementById("caInd1");

// Get the image and insert it inside the modal - use its "alt" text as a caption
    var img1 = document.getElementById('gen01');
    var img2 = document.getElementById('gen02');
    var img3 = document.getElementById('gen03');
    var img4 = document.getElementById('gen04');
    var img5 = document.getElementById('gen05');
    var img6 = document.getElementById('gen06');
    var img7 = document.getElementById('gen07');

    img1.onclick =
        img2.onclick =
            img3.onclick =
                img4.onclick =
                    img5.onclick =
                        img6.onclick =
                            img7.onclick =
                            function(){
                                modal.style.display = "block";
                                modalImg.src = this.src;
                                captionText.innerHTML = this.alt;
                                indicators1.style.display = "none";
                            };




// Get the <span> element that closes the modal
    var span1 = document.getElementsByClassName("close1")[0];

// When the user clicks on <span> (x), close the modal
    span1.onclick = function() {
        modal.style.display = "none";
    };

/* ------------------------
    Marketing Gallery
 -------------------------*/
// Get the modal
    var mkModal = document.getElementById('mkModal');

    var modalImg2 = document.getElementById("imgContainer2");
    var captionText2 = document.getElementById("caption2");

    var indicators2 = document.getElementById("caInd2");

// Get the image and insert it inside the modal - use its "alt" text as a caption
    var img_mk_1 = document.getElementById('mk01');
    var img_mk_2 = document.getElementById('mk02');
    var img_mk_3 = document.getElementById('mk03');
    var img_mk_4 = document.getElementById('mk04');
    var img_mk_5 = document.getElementById('mk05');

    img_mk_1.onclick =
        img_mk_2.onclick =
            img_mk_3.onclick =
                img_mk_4.onclick =
                    img_mk_5.onclick =
                    function(){
                        mkModal.style.display = "block";
                        modalImg2.src = this.src;
                        captionText2.innerHTML = this.alt;
                        indicators2.style.display = "none";
                    };




// Get the <span> element that closes the modal
    var span2 = document.getElementsByClassName("close2")[0];

// When the user clicks on <span> (x), close the modal
    span2.onclick = function() {
        mkModal.style.display = "none";
    };

    /* ------------------------
        University Gallery
     -------------------------*/
// Get the modal
    var uniModal = document.getElementById('uniModal');

    var modalImg3 = document.getElementById("imgContainer3");
    var captionText3 = document.getElementById("caption3");

    var indicators3 = document.getElementById("caInd3");

// Get the image and insert it inside the modal - use its "alt" text as a caption
    var img_uni_1 = document.getElementById('uni01');
    var img_uni_2 = document.getElementById('uni02');
    var img_uni_3 = document.getElementById('uni03');
    var img_uni_4 = document.getElementById('uni04');
    var img_uni_5 = document.getElementById('uni05');
    var img_uni_6 = document.getElementById('uni06');
    var img_uni_7 = document.getElementById('uni07');
    var img_uni_8 = document.getElementById('uni08');
    var img_uni_9 = document.getElementById('uni09');
    var img_uni_10 = document.getElementById('uni10');
    var img_uni_11 = document.getElementById('uni11');
    var img_uni_12 = document.getElementById('uni12');
    var img_uni_13 = document.getElementById('uni13');
    var img_uni_14 = document.getElementById('uni14');
    var img_uni_15 = document.getElementById('uni15');
    var img_uni_16 = document.getElementById('uni16');
    var img_uni_17 = document.getElementById('uni17');
    var img_uni_18 = document.getElementById('uni18');
    var img_uni_19 = document.getElementById('uni19');
    var img_uni_20 = document.getElementById('uni20');
    var img_uni_21 = document.getElementById('uni21');
    var img_uni_22 = document.getElementById('uni22');
    var img_uni_23 = document.getElementById('uni23');
    var img_uni_24 = document.getElementById('uni24');
    var img_uni_25 = document.getElementById('uni25');
    var img_uni_26 = document.getElementById('uni26');
    var img_uni_27 = document.getElementById('uni27');
    var img_uni_28 = document.getElementById('uni28');
    var img_uni_29 = document.getElementById('uni29');
    var img_uni_30 = document.getElementById('uni30');

    img_uni_1.onclick =
        img_uni_2.onclick =
            img_uni_3.onclick =
                img_uni_4.onclick =
                    img_uni_5.onclick =
                        img_uni_6.onclick =
                            img_uni_7.onclick =
                                img_uni_8.onclick =
                                    img_uni_9.onclick =
                                        img_uni_10.onclick =
                                            img_uni_11.onclick =
                                                img_uni_12.onclick =
                                                    img_uni_13.onclick =
                                                        img_uni_14.onclick =
                                                            img_uni_15.onclick =
                                                                img_uni_16.onclick =
                                                            img_uni_17.onclick =
                                                        img_uni_18.onclick =
                                                    img_uni_19.onclick =
                                                img_uni_20.onclick =
                                            img_uni_21.onclick =
                                        img_uni_22.onclick =
                                    img_uni_23.onclick =
                                img_uni_24.onclick =
                            img_uni_25.onclick =
                        img_uni_26.onclick =
                    img_uni_27.onclick =
                img_uni_28.onclick =
            img_uni_29.onclick =
        img_uni_30.onclick =
        function(){
            uniModal.style.display = "block";
            modalImg3.src = this.src;
            captionText3.innerHTML = this.alt;
            indicators3.style.display = "none";
        };

// Get the <span> element that closes the modal
    var span3 = document.getElementsByClassName("close3")[0];

// When the user clicks on <span> (x), close the modal
    span3.onclick = function() {
        uniModal.style.display = "none";
    };

    /* ------------------------
     Training Gallery
     -------------------------*/
// Get the modal
    var trnModal = document.getElementById('trnModal');

    var modalImg4 = document.getElementById("imgContainer4");
    var captionText4 = document.getElementById("caption4");

    var indicators4 = document.getElementById("caInd4");

// Get the image and insert it inside the modal - use its "alt" text as a caption
    var img_trn_1 = document.getElementById('trn01');
    var img_trn_2 = document.getElementById('trn02');
    var img_trn_3 = document.getElementById('trn03');
    var img_trn_4 = document.getElementById('trn04');
    var img_trn_5 = document.getElementById('trn05');
    var img_trn_6 = document.getElementById('trn06');
    var img_trn_7 = document.getElementById('trn07');
    var img_trn_8 = document.getElementById('trn08');
    var img_trn_9 = document.getElementById('trn09');
    var img_trn_10 = document.getElementById('trn10');
    var img_trn_11 = document.getElementById('trn11');
    var img_trn_12 = document.getElementById('trn12');

    img_trn_1.onclick =
        img_trn_2.onclick =
            img_trn_3.onclick =
                img_trn_4.onclick =
                    img_trn_5.onclick =
                        img_trn_6.onclick =
                        img_trn_7.onclick =
                    img_trn_8.onclick =
                img_trn_9.onclick =
            img_trn_10.onclick =
        img_trn_11.onclick =
    img_trn_12.onclick =
    function(){
            trnModal.style.display = "block";
            modalImg4.src = this.src;
            captionText4.innerHTML = this.alt;
            indicators4.style.display = "none";
        };

// Get the <span> element that closes the modal
    var span4 = document.getElementsByClassName("close4")[0];

// When the user clicks on <span> (x), close the modal
    span4.onclick = function() {
        trnModal.style.display = "none";
    };

    /* ------------------------
         Radio Gallery
     -------------------------*/
// Get the modal
    var rdModal = document.getElementById('rdModal');

    var modalImg5 = document.getElementById("imgContainer5");
    var captionText5 = document.getElementById("caption5");

    var indicators5 = document.getElementById("caInd5");

// Get the image and insert it inside the modal - use its "alt" text as a caption
    var img_rd_1 = document.getElementById('rd01');
    var img_rd_2 = document.getElementById('rd02');
    var img_rd_3 = document.getElementById('rd03');
    var img_rd_4 = document.getElementById('rd04');
    var img_rd_5 = document.getElementById('rd05');
    var img_rd_6 = document.getElementById('rd06');
    var img_rd_7 = document.getElementById('rd07');
    var img_rd_8 = document.getElementById('rd08');
    var img_rd_9 = document.getElementById('rd09');
    var img_rd_10 = document.getElementById('rd10');
    var img_rd_11 = document.getElementById('rd11');
    var img_rd_12 = document.getElementById('rd12');

    img_rd_1.onclick =
        img_rd_2.onclick =
            img_rd_3.onclick =
                img_rd_4.onclick =
                    img_rd_5.onclick =
                        img_rd_6.onclick =
                            img_rd_7.onclick =
                                img_rd_8.onclick =
                                    img_rd_9.onclick =
                                        img_rd_10.onclick =
                                            img_rd_11.onclick =
                                                img_rd_12.onclick =
                                            img_rd_1.onclick =
                                        img_rd_2.onclick =
                                    img_rd_3.onclick =
                                img_rd_4.onclick =
                            img_rd_5.onclick =
                        img_rd_6.onclick =
                    img_rd_7.onclick =
                img_rd_8.onclick =
            img_rd_9.onclick =
        img_rd_10.onclick =
    img_rd_11.onclick =
img_rd_12.onclick =
function(){
    rdModal.style.display = "block";
    modalImg5.src = this.src;
    captionText5.innerHTML = this.alt;
    indicators5.style.display = "none";
};

// Get the <span> element that closes the modal
    var span5 = document.getElementsByClassName("close5")[0];

// When the user clicks on <span> (x), close the modal
    span5.onclick = function() {
        rdModal.style.display = "none";
    };



});

