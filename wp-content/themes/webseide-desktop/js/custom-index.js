(function ($) {
    "use strict";

    $('.vc_tta-accordion .vc_tta-controls-icon').removeClass('vc_tta-controls-icon').addClass('acc_icon_expand');
    $('.wpcf7-form').parents('.twelve').removeClass('columns');
    $('.cd-timeline-block').parent().addClass('cd-timeline');

    //Home Sections fit screen

    // function prepareDetailsButton(){
    //     var $target = $('.details-info');
    //     var $action = $(".details");
    //
    //     // hides all by default
    //     $target.hide();
    //
    //     $action.unbind("click");
    //
    //     // shows all
    //     $action.bind("click", function(event) {
    //         event.preventDefault();
    //         $(this).find($target).slideToggle(400);
    //     });
    // }

    $(function () {
        "use strict";
        $('.homex').css({'height': ($(window).height()) + 'px'});
        $(window).resize(function () {
            $('.homex').css({'height': ($(window).height()) + 'px'});
        });
        // prepareDetailsButton();
    });

    /*------------------------------------------
     *          Fake Login Form in Checkout
     *------------------------------------------*/
    /*$(function () {
     $("button#fake-submit").click(function () {
     var fake_username = $("input#fake-username");
     var fake_password = $("input#fake-password");

     var real_username = $("input#username[name='username']");
     var real_password = $("input#password[name='password']");
     var real_rememberme = $("input.checkbox-primary[name='rememberme']");
     var real_submit = $(".login[name='login']");

     $(real_username).val($(fake_username).val());
     $(real_password).val($(fake_password).val());
     $(real_submit).click();
     })
     });*/


    /*------------------------------------------
     *  Hover thumbnails    Resets after hover
     *------------------------------------------*/
    $(function () {
        $(".thumbnails .zoom").hover(

            function () {
                var photo_fullsize = $(this).find('img').attr('src').replace('-180x180', '');
                $(this).parent().parent().children('a.woocommerce-main-image.zoom').children('img.attachment-shop_single.size-shop_single.wp-post-image').attr('src', photo_fullsize).attr('srcset', photo_fullsize);

            },
            function () {
                var original_image = $(this).parent().parent().children('a.woocommerce-main-image.zoom').attr('srcex');
                $(this).parent().parent().children('a.woocommerce-main-image.zoom').children('img.attachment-shop_single.size-shop_single.wp-post-image').attr('src', original_image).attr('srcset', original_image);
            }
        );
    });

    /*------------------------------------------
     * iframeResizer Plugin
     *------------------------------------------*/
    /*
    $(function () {
        var plagFrame = $('#plag-iframe');
        plagFrame && plagFrame.iFrameResize({bodyOffset:'max'});
    });
    */

    /*------------------------------------------
     *          Fake Coupon Submit Form
     *------------------------------------------*/
    $(function () {
        // $(".show-fake-coupon").click(function () {
        //     $(".fake-coupon-form").slideToggle();
        // });

        $(".fake-button[name='fake-apply_coupon']").click(function () {
            var fake_input = $(this).parent().parent().find(".input-text[name='fake-coupon_code']")
            var coupon_code = $(fake_input).val()
            var real_input = $("input.input-text[name='coupon_code']");
            var real_submit = $("input.button[name='apply_coupon']");

            $(fake_input).val("");
            // $(".fake-coupon-form").slideToggle();
            $(real_input).val(coupon_code);
            $(real_submit).click();
        })
    });



    // $('.woocommerce-checkout-review-order').bind("DOMSubtreeModified", prepareDetailsButton);


    $(window).scroll(function(){
        var scrollTop = $(window).scrollTop();
        var cdPrimary = $("#cd-primary-nav");
        var site = '';
        if($('body').hasClass('blog')) {
            site = 125;
        } else {
            site = 135;
        }
        if(scrollTop > site) {
            $('body').addClass('sticky-nav');
            $(".cd-main-header").addClass('sticky');
            // $('.popup-top').addClass('idle');

            if (/Mobi/i.test(navigator.userAgent)) {
                $(cdPrimary).addClass('nav-mobile-scroll');
            }
            else {
                $(cdPrimary).css('margin-top', '0px');
                $(cdPrimary).removeClass('nav-mobile-scroll');
            }
        }else {
            $('body').removeClass('sticky-nav');
            $(".cd-main-header").removeClass('sticky');
            // $('.popup-top').removeClass('idle');

            if (/Mobi/i.test(navigator.userAgent)) {
                $(cdPrimary).removeClass('nav-mobile-scroll');
                $(cdPrimary).addClass('nav-mobile');
            }
            else {
                $(cdPrimary).addClass('.normal-cd-nav');
                $(cdPrimary).addClass('.middle-cd-nav');
            }
        }
    });

    // Function for the slider nav starts here
    var owl;
    $(document).ready(function () {
        var clickEvent = false;
        $('#myCarousel').on('click', '.nav a', function () {
            clickEvent = true;
            $('.nav li').removeClass('active');
            $(this).parent().addClass('active');
        }).on('slid.bs.carousel', function (e) {
            if (!clickEvent) {
                var count = $('.nav').children().length - 1;
                var current = $('.nav li.active');
                current.removeClass('active').next().addClass('active');
                var id = parseInt(current.data('slide-to'));
                if (count == id) {
                    $('.nav li').first().addClass('active');
                }
            }
            clickEvent = false;
        });


        //function customPager() {
        //	$('#owl-home-slider .owl-controls').addClass('col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-xs-12');
        //	$.each(this.owl.userItems, function (i) {
        //		var titleData = jQuery(this).find('img').attr('title');
        //		var paginationLinks = jQuery('.owl-controls .owl-pagination .owl-page');
        //		$(paginationLinks[i]).append(titleData).addClass("col-xs-3 col-md-3") ;
        //	});
        //}
        //
        //$('#owl-home-slider').owlCarousel({
        //	navigation: true, // Show next and prev buttons
        //	navigationText: [
        //		"<i class='fa fa-angle-left'></i>",
        //		"<i class='fa fa-angle-right'></i>"
        //	],
        //	slideSpeed: 300,
        //	paginationSpeed: 400,
        //	singleItem: true,
        //	afterInit: customPager,
        //	afterUpdate: customPager
        //});
        //
        //$('#myCarousel').carousel({
        //	interval:   4000
        //});

    });

    //$('#owl-home-slider .owl-controls .owl-pagination .owl-page:first-child').addClass('')


    // Function for the slider nav ends here


    // Function to show/hide details in the mobile version

    //$("#details .show-hide").hide();
    //$("#details-button").click(function () {
    //    $(this).details.toggle();
    //});



/*
    $(".animsition").animsition({
        linkElement: '.animsition-link',
        // e.g. linkElement   :   'a:not([target="_blank"]):not([href^=#])'
        loading: true,
        loadingParentElement: 'body', //animsition wrapper element
        loadingClass: 'animsition-loading',
        unSupportCss: [
            'animation-duration',
            '-webkit-animation-duration',
            '-o-animation-duration'
        ],
        //"unSupportCss" option allows you to disable the "animsition" in case the css property in the array is not supported by your browser.
        //The default setting is to disable the "animsition" in a browser that does not support "animation-duration".
        overlay: false,
        overlayClass: 'animsition-overlay-slide',
        overlayParentElement: 'body'
    });
*/

    //Page Scroll
    $(document).ready(function () {
        "use strict";

        //Navigation
        $('.cd-primary-nav li a[href^="#"]').click(function () {
            $(this).parent().find('> ul').toggle();
            return false;
        });
        $('.cd-primary-nav li a').click(function () {
            return true;
        });

        //if you change this breakpoint in the style.css file (or _layout.scss if you use SASS), don't forget to update this value as well
        var MqL = 1170;
        //move nav element position according to window width
        moveNavigation();
        $(window).on('resize', function () {
            (!window.requestAnimationFrame) ? setTimeout(moveNavigation, 300) : window.requestAnimationFrame(moveNavigation);
        });

        //mobile - open lateral menu clicking on the menu icon
        $('.cd-nav-trigger').on('click', function (event) {
            event.preventDefault();
            if ($('.cd-main-content').hasClass('nav-is-visible')) {
                closeNav();
                $('.cd-overlay').removeClass('is-visible');
            } else {
                $(this).addClass('nav-is-visible');
                $('.cd-primary-nav').addClass('nav-is-visible');
                $('.cd-main-header').addClass('nav-is-visible');
                $('.cd-main-content').addClass('nav-is-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function () {
                    $('body').addClass('overflow-hidden');
                });
                toggleSearch('close');
                $('.cd-overlay').addClass('is-visible');
            }
        });

        //open search form
        $('.cd-search-trigger').on('click', function (event) {
            event.preventDefault();
            toggleSearch();
            closeNav();
        });

        //close lateral menu on mobile
        $('.cd-overlay').on('swiperight', function () {
            if ($('.cd-primary-nav').hasClass('nav-is-visible')) {
                closeNav();
                $('.cd-overlay').removeClass('is-visible');
            }
        });
        $('.nav-on-left .cd-overlay').on('swipeleft', function () {
            if ($('.cd-primary-nav').hasClass('nav-is-visible')) {
                closeNav();
                $('.cd-overlay').removeClass('is-visible');
            }
        });
        $('.cd-overlay').on('click', function () {
            closeNav();
            toggleSearch('close');
            $('.cd-overlay').removeClass('is-visible');
        });


        //prevent default clicking on direct children of .cd-primary-nav
        $('.cd-primary-nav').children('.has-children').children('a').on('click', function (event) {
            event.preventDefault();
        });
        //open submenu
        $('.has-children').children('a').on('click', function (event) {
            if (!checkWindowWidth()) event.preventDefault();
            var selected = $(this);
            if (selected.next('ul').hasClass('is-hidden')) {
                //desktop version only
                selected.addClass('selected').next('ul').removeClass('is-hidden').end().parent('.has-children').parent('ul').addClass('moves-out');
                selected.parent('.has-children').siblings('.has-children').children('ul').addClass('is-hidden').end().children('a').removeClass('selected');
                $('.cd-overlay').addClass('is-visible');
            } else {
                selected.removeClass('selected').next('ul').addClass('is-hidden').end().parent('.has-children').parent('ul').removeClass('moves-out');
                $('.cd-overlay').removeClass('is-visible');
            }
            toggleSearch('close');
        });

        //submenu items - go back link
        $('.go-back').on('click', function () {
            $(this).parent('ul').addClass('is-hidden').parent('.has-children').parent('ul').removeClass('moves-out');
        });

        function closeNav() {
            $('.cd-nav-trigger').removeClass('nav-is-visible');
            $('.cd-main-header').removeClass('nav-is-visible');
            $('.cd-primary-nav').removeClass('nav-is-visible');
            $('.has-children ul').addClass('is-hidden');
            $('.has-children a').removeClass('selected');
            $('.moves-out').removeClass('moves-out');
            $('.cd-main-content').removeClass('nav-is-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function () {
                $('body').removeClass('overflow-hidden');
            });
        }

        function toggleSearch(type) {
            if (type == "close") {
                //close serach
                $('.cd-search').removeClass('is-visible');
                $('.cd-search-trigger').removeClass('search-is-visible');
            } else {
                //toggle search visibility
                $('.cd-search').toggleClass('is-visible');
                $('.cd-search-trigger').toggleClass('search-is-visible');
                if ($(window).width() > MqL && $('.cd-search').hasClass('is-visible')) $('.cd-search').find('input[type="search"]').focus();
                ($('.cd-search').hasClass('is-visible')) ? $('.cd-overlay').addClass('is-visible') : $('.cd-overlay').removeClass('is-visible');
            }
        }

        function checkWindowWidth() {
            //check window width (scrollbar included)
            var e = window,
                a = 'inner';
            if (!('innerWidth' in window )) {
                a = 'client';
                e = document.documentElement || document.body;
            }
            if (e[a + 'Width'] >= MqL) {
                return true;
            } else {
                return false;
            }
        }

        function moveNavigation() {
            var navigation = $('.cd-nav');
            var desktop = checkWindowWidth();
            if (desktop) {
                navigation.detach();
                navigation.insertBefore('.cd-header-buttons');
            } else {
                navigation.detach();
                navigation.insertAfter('.cd-main-content');
            }
        }

        //Timeline


        var $timeline_block = $('.cd-timeline-block');

        //hide timeline blocks which are outside the viewport
        $timeline_block.each(function () {
            if ($(this).offset().top > $(window).scrollTop() + $(window).height() * 0.75) {
                $(this).find('.cd-timeline-img, .cd-timeline-content').addClass('is-hidden');
            }
        });

        //on scolling, show/animate timeline blocks when enter the viewport
        $(window).on('scroll', function () {
            $timeline_block.each(function () {
                if ($(this).offset().top <= $(window).scrollTop() + $(window).height() * 0.75 && $(this).find('.cd-timeline-img').hasClass('is-hidden')) {
                    $(this).find('.cd-timeline-img, .cd-timeline-content').removeClass('is-hidden').addClass('bounce-in');
                }
            });
        });

        //Parallax

        //$('.parallax-1').parallax("100%", 1);
        //$('.parallax-blog-2').parallax("100%", 1);
        //Top Page Slider


        jQuery(document).ready(function ($) {

            // SearchForm
            //$('#searchform input').attr("placeholder", __("Themen suchen"));
            //<i class="fa fa-search"></i>
            $('#searchform').append('<span class="lnr lnr-magnifier search-magnifier"></span>');
            /*
            $("#owl-top-page-slider").owlCarousel({
                navigation: false,
                slideSpeed: 300,
                autoPlay: 5000,
                singleItem: true
            });
            */
        });

        //Responsive video
        //$(".container").fitVids();

        //Counter
        /*
        $('.counter').counterUp({
            delay: 100,
            time: 2000
        });
        */

        //Interest Point
        //open interest point description
        $('.cd-single-point').children('a').on('click', function () {
            var selectedPoint = $(this).parent('li');
            if (selectedPoint.hasClass('is-open')) {
                selectedPoint.removeClass('is-open').addClass('visited');
            } else {
                selectedPoint.addClass('is-open').siblings('.cd-single-point.is-open').removeClass('is-open').addClass('visited');
            }
        });
        //close interest point description
        $('.cd-close-info').on('click', function (event) {
            event.preventDefault();
            $(this).parents('.cd-single-point').eq(0).removeClass('is-open').addClass('visited');
        });

        //Blockquote
        /*
        $("#owl-blockquotes").owlCarousel({
            navigation: false,
            pagination: false,
            slideSpeed: 300,
            autoPlay: 5000,
            singleItem: true
        });
        */
    });
/*
    $("#owl-blog-big-slider").owlCarousel({
        navigation: false,
        slideSpeed: 300,
        autoPlay: 5000,
        singleItem: true
    });

    $("#owl-portfolio-slider").owlCarousel({
        navigation: false,
        slideSpeed: 300,
        autoPlay: 5000,
        singleItem: true
    });
*/
    //Scroll To Top
    var offset = 450;
    var duration = 500;
    jQuery(window).scroll(function () {
        if (jQuery(this).scrollTop() > offset) {
            jQuery('.scroll-to-top').fadeIn(duration);
        } else {
            jQuery('.scroll-to-top').fadeOut(duration);
        }
    });

    jQuery('.scroll-to-top').click(function (event) {
        event.preventDefault();
        jQuery('html, body').animate({scrollTop: 0}, duration);
        return false;
    });

    //Masonry Blog
    var container = $('#blog-grid-masonry');

    function getNumbColumns() {
        var winWidth = $(window).width(),
            columnNumb = 1;

        if (winWidth > 1500) {
            columnNumb = 3;
        } else if (winWidth > 1200) {
            columnNumb = 3;
        } else if (winWidth > 900) {
            columnNumb = 2;
        } else if (winWidth > 600) {
            columnNumb = 2;
        } else if (winWidth > 300) {
            columnNumb = 1;
        }

        return columnNumb;
    }

    function setColumnWidth() {
        var winWidth = $(window).width(),
            columnNumb = getNumbColumns(),
            postWidth = Math.floor(winWidth / columnNumb);

    }

    $('#portfolio-filter #filter a').click(function () {
        var selector = $(this).attr('data-filter');

        $(this).parent().parent().find('a').removeClass('current');
        $(this).addClass('current');

        /*
        container.isotope({
            filter: selector
        });
*/
        return false;
    });

    /*
    container.imagesLoaded(function () {
        setColumnWidth();


        container.isotope({
            itemSelector: '.blog-box-3',
            layoutMode: 'masonry',
            resizable: false
        });
    });
    */


    //Masonry Portfolio
    var container2 = $('#projects-grid-masonry');

    function getNumbColumns2() {
        var winWidth = $(window).width(),
            columnNumb = 1;


        if (winWidth > 1500) {
            columnNumb = 3;
        } else if (winWidth > 1200) {
            columnNumb = 3;
        } else if (winWidth > 900) {
            columnNumb = 2;
        } else if (winWidth > 600) {
            columnNumb = 2;
        } else if (winWidth > 300) {
            columnNumb = 1;
        }

        return columnNumb;
    }


    function setColumnWidth2() {
        var winWidth = $(window).width(),
            columnNumb = getNumbColumns2(),
            postWidth = Math.floor(winWidth / columnNumb);

    }

    $('#portfolio-filter #filter a').click(function () {
        var selector = $(this).attr('data-filter');

        $(this).parent().parent().find('a').removeClass('current');
        $(this).addClass('current');

        /*
        container2.isotope({
            filter: selector
        });
*/
        setTimeout(function () {
            reArrangeProjects2();
        }, 300);


        return false;
    });

    function reArrangeProjects2() {
        setColumnWidth2();
        //container2.isotope('reLayout');
    }

/*
    container2.imagesLoaded(function () {
        setColumnWidth2();


        container2.isotope({
            itemSelector: '.portfolio-box-3',
            layoutMode: 'masonry',
            resizable: false
        });
    });
*/

    //$('.parallax-about').parallax("50%", 0.4);

    //Colorbox single project pop-up
/*
    $(".colorbox-lightbox").colorbox({maxWidth: '95%', maxHeight: '95%'});
    $(".group1").colorbox({rel: 'group1', transition: "fade", maxWidth: '95%', maxHeight: '95%'});
    $(".group2").colorbox({rel: 'group2', transition: "fade", maxWidth: '95%', maxHeight: '95%'});
    $(".youtube").colorbox({iframe: true, innerWidth: 940, innerHeight: 450});
    $(".vimeo").colorbox({iframe: true, innerWidth: 940, innerHeight: 450});
*/
    //Portfolio filter

    $(window).load(function () {
        var $container = $('#projects-grid');
        var $filter = $('#filter');
        // Initialize isotope
        /*
        $container.isotope({
            filter: '*',
            layoutMode: 'masonry'
        });
        */
        // Filter items when filter link is clicked
        $filter.find('a').click(function () {
            var selector = $(this).attr('data-filter');
            $filter.find('a').removeClass('current');
            $(this).addClass('current');
            /*
            $container.isotope({
                filter: selector
            });
            */
            return false;
        });
    });


    $(window).on('debouncedresize', function () {
        reArrangeProjects();

    });
/*
    $(".owl-office").owlCarousel({

        navigation: false,
        pagination: true,
        slideSpeed: 300,
        autoPlay: 5000,
        singleItem: true

    });
*/
    $('.onepage a[href^="#"]').click(function (event) {

        event.preventDefault();

        var full_url = this.href;
        var parts = full_url.split("#");
        var trgt = parts[1];
        var target_offset = $("#" + trgt).offset();
        var target_top = target_offset.top - 80;

        $('html, body').animate({scrollTop: target_top}, 1000);
    });

    //Image Comparison Slider

    /*
    $(window).load(function () {
        $(".twentytwenty-container[data-orientation!='vertical']").twentytwenty({default_offset_pct: 0.7});
        $(".twentytwenty-container[data-orientation='vertical']").twentytwenty({
            default_offset_pct: 0.3,
            orientation: 'vertical'
        });
    });
    */


    /*var dropdowns = document.querySelectorAll("a.dropdown-toggle");
     for (var i = 0; i < dropdowns.length; ++i) {
     dropdowns[i].onclick = function (evt) {
     location.href = evt.target.href;
     }
     }*/



    $(document).ready(function () {
        var curStep = parseInt(location.search.replace(/.*step=/,""));
        if(isNaN(curStep)) curStep = 1;
        //Initialize tooltips
        //$('.nav-tabs > li a[title]').tooltip();
        $('.wizard-noclick').click(function(e){
            if(!("isTrigger" in e)){
                e.preventDefault();
                e.stopPropagation();
            }
        });

        //Wizard
        $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

            var $target = $(e.target);

            if ($target.parent().hasClass('disabled')) {
                return false;
            }
        });

        function removePaymentsIfNotAvailable(currentShipping, _firstDraw ){
            var firstDraw = _firstDraw !== undefined ? _firstDraw : false;
            var checkedHasBeenRemoved = false;
            if(typeof paymentInfos != "undefined"){
                _.each(paymentInfos.filtered_gateways, function(shipMethods, gatewayId){
                    if(shipMethods.indexOf(currentShipping) == -1){
                        if(! (gatewayId in storedGatewayHtmls)){
                            var cssSelector = ".payment_methods .payment_method_" + gatewayId;
                            var paymentElt = $(cssSelector)[0];
                            if($("#payment_method_" + gatewayId).is(":checked")){
                                checkedHasBeenRemoved = true;
                                $("#payment_method_" + gatewayId).prop("checked", false);
                                if(!firstDraw){
                                    alert("Die Zahlungsart wurde geändert, da diese für die ausgewählte Versandart nicht zur Verfügung steht.");
                                }
                            }
                            storedGatewayHtmls[gatewayId] = {"html": paymentElt, "order": $(paymentElt).index()};
                            $(".payment_methods .payment_method_" + gatewayId).remove();
                        }
                    } else {
                        if(gatewayId in storedGatewayHtmls){
                            $(storedGatewayHtmls[gatewayId]["html"]).insertAfter(".payment_methods tr:eq(2)");
                            delete(storedGatewayHtmls[gatewayId]);
                        }
                    }
                });
            }
            if(checkedHasBeenRemoved){
                $(".payment_methods input[id^='payment_method_']")[0].click();
            }
        }


        if(curStep == 2){
            var storedGatewayHtmls = [];
            var shipMethsSelector = "#shipping_method tbody tr[class^='shipping_method'] input[type='radio']";

            removePaymentsIfNotAvailable($(shipMethsSelector + ":checked").val(), true);

            $(shipMethsSelector).click(function(){
                var currentShipping = $(this).val();
                removePaymentsIfNotAvailable(currentShipping);
            });
        }


        if(curStep == 1) {

            $("#checkout-box-text-1").addClass("active-box-text");

            $("#step-2-div").addClass("checkout-light");
            $("#step-2-div").removeClass("checkout-dark");

            $("#step-3-div").addClass("checkout-last-light");
            $("#step-3-div").removeClass("checkout-last-dark");

            $("#checkout-box-text-2, #checkout-box-text-3").removeClass("active-box-text");

        } else if(curStep == 2) {

            $("#checkout-box-text-1, #checkout-box-text-2").addClass("active-box-text");
            $("#checkout-box-text-3").removeClass("active-box-text");

            $("#step-2-div").addClass("checkout-dark");
            $("#step-2-div").removeClass("checkout-light");

            $("#step-3-div").addClass("checkout-last-light");
            $("#step-3-div").removeClass("checkout-last-dark");

        } else if (curStep == 3) {

            $("#checkout-box-text-1, #checkout-box-text-2, #checkout-box-text-3").addClass("active-box-text");

            $("#step-2-div").addClass("checkout-dark");
            $("#step-2-div").removeClass("checkout-light");

            $("#step-3-div").addClass("checkout-last-dark");
            $("#step-3-div").removeClass("checkout-last-light");

        }


        var active =  $('a[href="#step' + curStep + '"]');
        if(curStep == 3) active = $('a[href="#complete"]');
        active.removeClass("disabled");
        active.click();

        function submitForm(url){
            var form = $("form[name='checkout']");
            form[0].action = url;
            form[0].submit();
        }

        function allRequiredFieldsCompleted(id){

            var completed = true;
            $(id + " .validate-required input").each( function(){
                if($(this).val() == "" && $(this).is(":visible") && $(this).attr("class").indexOf("offscreen") == -1){
                    completed = false;
                }
            });
            return completed;
        }

        function allFieldsValid(id){
            $(id + " .woocommerce-invalid").removeClass('woocommerce-invalid');
            valid_email();
            valid_phone();
            return ($(id + " .woocommerce-invalid").length == 0);
        }

        function valid_email() {
            var $this = $('input.input-text[name="billing_email"]'),
                $parent = $this.closest('.form-row'),
                validated = true;

            if ($parent.is('.validate-required')) {
                if ($this.val() === '') {
                    $parent.removeClass('woocommerce-validated').addClass('woocommerce-invalid woocommerce-invalid-required-field');
                    validated = false;
                }
            }

            if ($parent.is('.validate-email')) {
                if ($this.val()) {

                    /* http://stackoverflow.com/questions/2855865/jquery-validate-e-mail-address-regex */
                    var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);

                    if (!pattern.test($this.val())) {
                        $parent.removeClass('woocommerce-validated').addClass('woocommerce-invalid woocommerce-invalid-email');
                        validated = false;
                    }
                }
            }

            if (validated) {
                $parent.removeClass('woocommerce-invalid woocommerce-invalid-required-field').addClass('woocommerce-validated');
            }
        }

        function valid_phone() {
            var $this = $('input.input-text[name="billing_phone"]'),
                $parent = $this.closest('.form-row'),
                validated = true;

            if ($parent.is('.validate-required')) {
                if ($this.val() === '') {
                    $parent.removeClass('woocommerce-validated').addClass('woocommerce-invalid woocommerce-invalid-required-field');
                    validated = false;

                    /*
                    $this.tooltip({
                        content: "Not a valid phone number!",
                        show: { effect: "blind", duration: 800 }
                    });
                    */
                }
            }

            if ($parent.is('.validate-phone')) {
                if ($this.val()) {

                    var pattern = new RegExp(/[\s\#0-9_\-\+\(\)]/g);
                    if ($this.val().replace(pattern, "").length > 0) {
                        $parent.removeClass('woocommerce-validated').addClass('woocommerce-invalid woocommerce-invalid-phone');
                        validated = false;
                    }
                }
            }

            if (validated) {
                $parent.removeClass('woocommerce-invalid woocommerce-invalid-required-field').addClass('woocommerce-validated');
            }
        }

        $(".next-step").click(function (e) {
            var url = window.location.href.replace(location.search,"") + "?step=" + (curStep + 1);
            if(allRequiredFieldsCompleted("#step" + curStep)){
                if(allFieldsValid("#step" + curStep)){
                    submitForm(url);
                } else {
                    alert("Einige Felder sind nicht gültig. Bitte achten Sie darauf, dass Sie eine gültige E-Mail Adresse eingeben und bei der Telefonnummer KEINE SONDERZEICHEN verwenden.");
                }
            } else {
                alert("Sie müssen alle erforderlichen Felder ausfüllen");
            }

        });
        $(".prev-step").click(function (e) {
            if(curStep > 1) {
                var url = window.location.href.replace(location.search,"") + "?step=" + (curStep - 1);
                submitForm(url);
            } else {
                return false;
            }
        });

        function goToStep(x){
            var url = window.location.href.replace(location.search,"") + "?step=" + x;
            submitForm(url);
        }

        var order_change_arrays = {
            "shipping-method": 2,
            "payment": 2,
            "shipping-address": 1,
            "billing-address": 1
        };
        $("#breadcrumbs").remove();
        $.each(order_change_arrays, function(key, val){
            $("." + key + "-review .order-change").click(function(){
                goToStep(val);
            });
        });

        //bad code, but for some reasons the radio buttons for the checkout are fucked up
        $("input[type=radio].payment-method").click(function(){
            $("input[type=radio].payment-method").each(function(){
                $(this).removeAttr("checked");
            });
            $(this).attr("checked","checked");
        });

        $("input[type=radio].shipping_method").click(function(){
            $("input[type=radio].shipping_method").each(function(){
                $(this).removeAttr("checked");
            });
            $(this).attr("checked","checked");
        });



        //Searchbar to top nav
        search_to_nav();
        function search_to_nav () {
            var search_input = $('#cd-search');
            if($(search_input).css('z-index') == '4') {
                $(search_input).detach().wrap('<li></li>').appendTo('.cd-header-buttons');
            }else{
                $(search_input).detach().appendTo('.cd-nav');
            }
        }
        //Facebook links
        $('#customer-review-1 img').click(function(){
            window.open('https://www.facebook.com/verena.herderich', '_blank');
            return false;
        });
        $('#customer-review-2 img').click(function(){
            window.open('https://www.facebook.com/nicolai.bastian.1', '_blank');
            return false;
        });
        $('#customer-review-3 img').click(function(){
            window.open('https://www.facebook.com/verastorm', '_blank');
            return false;
        });

        //Remove lightbox on products
        var zoom = $("a.zoom");
        $(zoom).attr("href", "javascript:;");
        $(zoom).unbind("click");

        // main menu click
        $(".menu-item a").click(function(e){
            if($(window).width() > 1169) {
                e.preventDefault();
                var l = $(this).attr('href');
                window.open(l, '_self');
            }
        })

        //check if object exists in DOM
        $.fn.exists = function () {
            return this.length !== 0;
        }

	    $('.vc_slide.vc_images_carousel').each(function () {
		    var w = $(this).css('width');
		    $(this).addClass('images-carousel-resp');
		    $(this).css({"width" : "100%", 'max-width':w});
		    $(this).find('.vc_right').click();
		    $(this).find('.vc_left').click();
	    });
    });
})(jQuery);

(function ($) {
    Storage.prototype.setObj = function (key, obj) {
        return this.setItem(key, JSON.stringify(obj))
    };
    Storage.prototype.getObj = function (key) {
        return JSON.parse(this.getItem(key))
    };

    var status = sessionStorage.getObj('gtecPopupStatus');
    function initPopup() {
        $('[data-popup]').each(function () {
            var $this = $(this),
                name = $this.data('popup');
            if (status !== null && typeof status === 'object') {
                if (!(name in status && status[name] === 'hidden')) {
                    $this.addClass('active');
                }
            } else {
                status = {};
                $this.addClass('active');
            }
        });
    }

    function closePopup() {
        var $this = $(this),
            $container = $this.closest('[data-popup]'),
            name = $container.data('popup');
        status[name] = 'hidden';
	    $('[data-popup="' + name + '"]').removeClass('active');
        sessionStorage.setObj('gtecPopupStatus', status);
    }

    $(document)
        .ready(initPopup)
        .on('click', '[data-toggle-popup]', closePopup)
    ;

})(jQuery);
