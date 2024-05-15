class App {
    constructor() {
        console.log('construct');
        this.target = $('#header');
        this.winWidth = $(window).width();
        this.winHeight = $(window).height();

        // --------------------------------------------------------------------------

        /**
         * Mouse movement colours
         */
        $(document).on('mousemove', (e) => {
            console.log('move');
            this.calculateColour(e.pageX, e.pageY);
        });

        $(window).on('resize', () => {

            this.winWidth = $(window).width();
            this.winHeight = $(window).height();
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
    }

    calculateColour = function(mouseX, mouseY) {

        var rgb = [
            Math.round(mouseX / this.winWidth * 255),
            Math.round(mouseY / this.winHeight * 255),
            150
        ];

        this.target.css('background-color', 'rgb(' + rgb.join(',') + ')');
    };
}

export default App;
