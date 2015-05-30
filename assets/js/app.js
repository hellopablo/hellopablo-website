var _APP;
_APP = function()
{
    /**
     * Avoid scope issues in callbacks and anonymous functions by referring to `this` as `base`
     * @type {Object}
     */
    var base = this;

    base.target = $('#content');
    base.winWidth = $(window).width();
    base.winHeight = $(window).height();

    // --------------------------------------------------------------------------

    /**
     * Construct the class
     * @return {Void}
     */
    base.__construct = function()
    {
        $(document).on('mousemove', function(e) {

            base.calculateColour(e.pageX, e.pageY);
        });

        $(window).on('resize', function() {

            base.winWidth = $(window).width();
            base.winHeight = $(window).height();
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