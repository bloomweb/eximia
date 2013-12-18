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
       /* $("#main-menu .menu__item").hover(
            function () {
                $(this).siblings().addClass('hide');
            },
            function () {
                $(this).siblings().removeClass('hide');
            }
        );*/
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

    });


})(jQuery, Drupal, this, this.document);
