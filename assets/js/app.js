var _APP;
_APP = function()
{
    /**
     * Avoid scope issues in callbacks and anonymous functions by referring to `this` as `base`
     * @type {Object}
     */
    var base = this;

    base.target = $('#header');
    base.winWidth = $(window).width();
    base.winHeight = $(window).height();

    // --------------------------------------------------------------------------

    /**
     * Construct the class
     * @return {Void}
     */
    base.__construct = function()
    {
        /**
         * Mouse movement colours
         */
        $(document).on('mousemove', function(e) {

            base.calculateColour(e.pageX, e.pageY);
        });

        $(window).on('resize', function() {

            base.winWidth = $(window).width();
            base.winHeight = $(window).height();
        });

        // --------------------------------------------------------------------------

        /**
         * Fancybox, obvs
         */
        $('.fancybox').fancybox();

        // --------------------------------------------------------------------------

        /**
         * Ta, da! mouseover effect on my cheeky face
         */
        var mouseOverTimeout;
        var animating = false;
        $('#header img')
        .on('mouseover', function() {
            if (animating) {
                return;
            } else {
                animating = true;
            }

            var elem = $(this);
            elem.addClass('animated tada');
            clearTimeout(mouseOverTimeout);
            mouseOverTimeout = setTimeout(function() {
                elem.removeClass('animated tada');
                animating = false;
            }, 1000);
        });

        // --------------------------------------------------------------------------

        /**
         * Nav show/hide
         */
        var header = $('#header');
        var navigation = $('#main-nav');
        var headerHeight = header.outerHeight();

        $(window).on('scroll', function() {

            if ($(this).scrollTop() > headerHeight) {

                navigation.addClass('active');

            } else {

                navigation.removeClass('active');
            }
        });

        // --------------------------------------------------------------------------

        /**
         * Mobile Nav
         */
        var navItems = $('#mobile-nav-items');
        $('#mobile-nav-toggle').on('click', function() {

            if (navItems.hasClass('active')) {

                navItems.slideUp();
                navItems.removeClass('active');

            } else {

                navItems.slideDown();
                navItems.addClass('active');
            }
        });
    };

    // --------------------------------------------------------------------------

    base.calculateColour = function(mouseX, mouseY) {

        var rgb = [
            Math.round(mouseX/base.winWidth * 255),
            Math.round(mouseY/base.winHeight * 255),
            150
        ];

        base.target.css('background-color','rgb('+rgb.join(',')+')');
    };

    // --------------------------------------------------------------------------

    return base.__construct();
}();