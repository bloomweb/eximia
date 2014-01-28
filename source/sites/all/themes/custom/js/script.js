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
        if(pathname.indexOf('the-eximia-story') != -1) {
            $menu_item = $('li.menu-mlid-517');
            if(!$menu_item.hasClass('active')) { $menu_item.addClass('active'); }
            if(!$menu_item.hasClass('is-active')) { $menu_item.addClass('is-active'); }
            if(!$menu_item.hasClass('is-active-trail')) { $menu_item.addClass('is-active-trail'); }
            if(!$menu_item.hasClass('is-expanded')) { $menu_item.addClass('is-expanded'); }
            if(!$menu_item.hasClass('expanded')) { $menu_item.addClass('expanded'); }
            if(!$menu_item.hasClass('active-trail')) { $menu_item.addClass('active-trail'); }
        }
        if(pathname.indexOf('how-can-we-help') != -1) {
            $menu_item = $('li.menu-mlid-635');
            if(!$menu_item.hasClass('active')) { $menu_item.addClass('active'); }
            if(!$menu_item.hasClass('is-active')) { $menu_item.addClass('is-active'); }
            if(!$menu_item.hasClass('is-active-trail')) { $menu_item.addClass('is-active-trail'); }
            if(!$menu_item.hasClass('is-expanded')) { $menu_item.addClass('is-expanded'); }
            if(!$menu_item.hasClass('expanded')) { $menu_item.addClass('expanded'); }
            if(!$menu_item.hasClass('active-trail')) { $menu_item.addClass('active-trail'); }
        }
        if(pathname.indexOf('things-we-like') != -1) {
            $menu_item = $('li.menu-mlid-540');
            if(!$menu_item.hasClass('active')) { $menu_item.addClass('active'); }
            if(!$menu_item.hasClass('is-active')) { $menu_item.addClass('is-active'); }
            if(!$menu_item.hasClass('is-active-trail')) { $menu_item.addClass('is-active-trail'); }
            if(!$menu_item.hasClass('is-expanded')) { $menu_item.addClass('is-expanded'); }
            if(!$menu_item.hasClass('expanded')) { $menu_item.addClass('expanded'); }
            if(!$menu_item.hasClass('active-trail')) { $menu_item.addClass('active-trail'); }
        }

        $(".menu__item.is-expanded:not(.is-active)").hover(function(){
            $(".menu__item.is-active .sub-menu").css('visibility','hidden');
        },function(){
            $(".menu__item.is-active .sub-menu").css('visibility','visible');
        });
    });

    $(function () { //HOME FUNCTIONALITIES


        $.each($("#home-container  .main-text"), function (i, val) {
            $(val).css("margin-top", -($(val).height() / 2) + 'px');
        });


        $("#home-container .home-box").hover(function () {

                $(".main-text.default").hide();
            },
            function () {
                $(".main-text.default").show();
            });
    });

    $(function(){ // Team Member functionalities
        if($('body').is('.node-type-team-member')){
            $('.menu-mlid-517, .menu-mlid-547').addClass("is-active-trail active-trail active").find("a").addClass("is-active-trail active-trail active");
            $(".field-name-field-email .field-item").wrap( "<a href='mailto:"+ $(".field-name-field-email .field-item").text()+"'></a>" );
        }
        if($("body").is(".page-node-2")){
            $('.menu-mlid-517').addClass("is-active-trail active-trail active");
        }

        if($("body").is(".page-things-we-like")){
            $('.menu-mlid-540').addClass("is-active-trail active-trail active");
        }

    });

    $(function() { // FAQ's functionality
        $('.faq-link').click(function(e) {
            e.preventDefault();
            $that = $(this);
            nid = $that.attr('rel');
            $('.faq-link').removeClass("active");
            $that.addClass("active");
            $.ajax({
                'url':'ajax-calls/get-faq/' + nid,
                'cache':false,
                'success':function(response) {
                    $('.faq-wrapper').html(response);
                }
            });
        });

        if($('body').is('.page-node-18')){
            $('.faq-link:first').click();
        }
    });


})(jQuery, Drupal, this, this.document);