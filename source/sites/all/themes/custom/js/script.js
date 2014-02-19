/**
 * @file
 * A JavaScript file for the theme.
 *
 * In order for this JavaScript to be loaded on pages, see the instructions in
 * the README.txt next to this file.
 */

// JavaScript should be made compatible with libraries other than jQuery by
// wrapping it with an "anonymous closure". See:
// - http://drupal.org/node/1446420
// - http://www.adequatelygood.com/2010/3/JavaScript-Module-Pattern-In-Depth
(function ($, Drupal, window, document, undefined) {


// Place your code here.
    $(function () { // Menu funtionalities
        pathname = window.location.pathname;
        if (pathname.indexOf('the-eximia-story') != -1) {
            $menu_item = $('li.menu-mlid-517');
            if (!$menu_item.hasClass('active')) {
                $menu_item.addClass('active');
            }
            if (!$menu_item.hasClass('is-active')) {
                $menu_item.addClass('is-active');
            }
            if (!$menu_item.hasClass('is-active-trail')) {
                $menu_item.addClass('is-active-trail');
            }
            if (!$menu_item.hasClass('is-expanded')) {
                $menu_item.addClass('is-expanded');
            }
            if (!$menu_item.hasClass('expanded')) {
                $menu_item.addClass('expanded');
            }
            if (!$menu_item.hasClass('active-trail')) {
                $menu_item.addClass('active-trail');
            }
        }
        if (pathname.indexOf('how-we-can-help') != -1) {
            $menu_item = $('li.menu-mlid-635');
            if (!$menu_item.hasClass('active')) {
                $menu_item.addClass('active');
            }
            if (!$menu_item.hasClass('is-active')) {
                $menu_item.addClass('is-active');
            }
            if (!$menu_item.hasClass('is-active-trail')) {
                $menu_item.addClass('is-active-trail');
            }
            if (!$menu_item.hasClass('is-expanded')) {
                $menu_item.addClass('is-expanded');
            }
            if (!$menu_item.hasClass('expanded')) {
                $menu_item.addClass('expanded');
            }
            if (!$menu_item.hasClass('active-trail')) {
                $menu_item.addClass('active-trail');
            }
            $("#main-menu.service-type-1 .menu-mlid-636").addClass('is-active-trail active-trail active is-active');
            $("#main-menu.service-type-2 .menu-mlid-637").addClass('is-active-trail active-trail active is-active');
            $("#main-menu.service-type-3 .menu-mlid-638").addClass('is-active-trail active-trail active is-active');
            $("#main-menu.service-type-4 .menu-mlid-639").addClass('is-active-trail active-trail active is-active');
        }
        if (pathname.indexOf('things-we-like') != -1) {

            $menu_item = $('li.menu-mlid-540');
            if (!$menu_item.hasClass('active')) {
                $menu_item.addClass('active');
            }
            if (!$menu_item.hasClass('is-active')) {
                $menu_item.addClass('is-active');
            }
            if (!$menu_item.hasClass('is-active-trail')) {
                $menu_item.addClass('is-active-trail');
            }
            if (!$menu_item.hasClass('is-expanded')) {
                $menu_item.addClass('is-expanded');
            }
            if (!$menu_item.hasClass('expanded')) {
                $menu_item.addClass('expanded');
            }
            if (!$menu_item.hasClass('active-trail')) {
                $menu_item.addClass('active-trail');
            }
            $(".menu-mlid-633").addClass("is-active");
        }

        if(!window.matchMedia("(max-width: 769px)").matches ) {
            $(".menu__item.is-expanded:not(.is-active)").hover(function () {
                $(".menu__item.is-active .sub-menu").css('visibility', 'hidden');
            }, function () {
                $(".menu__item.is-active .sub-menu").css('visibility', 'visible');
            });
        }else{ // ONLY MOBILE
            $("ul.menu > li.menu-mlid-517  > a").click(function(e){
                e.preventDefault();
                if(!$(this).parent().is(".is-clicked")){
                    $(this).parent().siblings().removeClass("is-clicked")
                    $(this).parent().addClass("is-clicked");
                }else{
                    $(this).parent().removeClass("is-clicked")
                }
            });

            $("ul.menu > li.menu-mlid-635  > a").click(function(e){
                e.preventDefault();
                if(!$(this).parent().is(".is-clicked")){
                    $(this).parent().siblings().removeClass("is-clicked")
                    $(this).parent().addClass("is-clicked");
                }else{
                    $(this).parent().removeClass("is-clicked")
                }
            });
        }



    });

    $(function(){
       $(".view-content").append("<div style='clear:both;'></div>");
    });

    $(function(){
        $link = $('.more-intro');
        $node = $('.page-node-65');
        if($node.length != 0 && $link.length >= 1) {
            $link.css('visibility', 'hidden');
        } else {
            if($link.length >= 1) {
                $right = $('.services-description .right');
                $right.css('visibility', 'hidden');
                $link.click(function() {
                    $right.css('visibility', 'visible');
                });
            }
        }
    });

    $(function () { //HOME FUNCTIONALITIES

        var $div = $('#fade');

        try {
            $div.cycle({
                timeout:5000,
                slideResize:1,
                fit:1,
                width:'100%'
            });
        } catch (e) {

        }

        $(window).resize(function(){
            $div.css({
                'width':'100%'
            });
        });

        $.each($("#home-container  .main-text"), function (i, val) {
            $(val).css("margin-top", -($(val).height() / 2) + 'px');
        });


        $("#home-container .home-box").hover(
            function () {

                $(".main-text.default").hide();
            },
            function () {
                $(".main-text.default").show();
            }
        );

        $("div.text-box[data-url]").click(function(){
            window.location = $(this).attr("data-url");
        });
    });

    $(function () { // Team Member functionalities
        if ($('body').is('.node-type-team-member')) {
            $('.menu-mlid-517, .menu-mlid-547').addClass("is-active-trail active-trail active").find("a").addClass("is-active-trail active-trail active");
            $(".field-name-field-email .field-item").wrap("<a href='mailto:" + $(".field-name-field-email .field-item").text() + "'></a>");
        }
        if ($("body").is(".page-node-2")) {
            $('.menu-mlid-517').addClass("is-active-trail active-trail active");
        }

        if ($("body").is(".page-things-we-like")) {
            $('.menu-mlid-540').addClass("is-active-trail active-trail active");
        }

    });

    $(function () { // FAQ's functionality
        $('.faq-link').click(function (e) {
            e.preventDefault();
            $that = $(this);
            nid = $that.attr('rel');
            $('.faq-link').removeClass("active");
            $that.addClass("active");
            $.ajax({
                'url': 'ajax-calls/get-faq/' + nid,
                'cache': false,
                'success': function (response) {
                    $('.faq-wrapper').html(response);
                }
            });
        });

        if ($('body').is('.page-node-18')) {
            $('.faq-link:first').click();
        }
    });

})(jQuery, Drupal, this, this.document);