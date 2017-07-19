/**
 * Responsive Image
 *
 * Inspired by:
 * http://luis-almeida.github.com/unveil
 * http://verge.airve.com/
 */

+function($) {

    // cache img.lazyload collection
    var $lazyload;

    // VIEWPORT HELPER CLASS DEFINITION
    // ================================
    var viewport;
    var ViewPort = function(options){
        this.viewportWidth = 0;
        this.viewportHeight = 0;
        this.options = $.extend({}, ViewPort.DEFAULTS, options);
        this.attrib = "src";
        this.update();
    };

    ViewPort.DEFAULTS = {
        breakpoints : {
            0: 'mobile',
            768: 'tablet',
            992: 'desktop',
            1140: 'large'
        }
    }

    ViewPort.prototype.viewportW = function() {
        var clientWidth = document.documentElement['clientWidth'], innerWidth = window['innerWidth'];
        return this.viewportWidth = clientWidth < innerWidth ? innerWidth : clientWidth;
    };

    ViewPort.prototype.viewportH = function() {
        var clientHeight = document.documentElement['clientHeight'], innerHeight = window['innerHeight'];
        return this.viewportHeight = clientHeight < innerHeight ? innerHeight : clientHeight;
    };

    ViewPort.prototype.inviewport = function(boundingbox) {
        return !!boundingbox && boundingbox.bottom >= 0 && boundingbox.right >= 0 && boundingbox.top <= this.viewportHeight && boundingbox.left <= this.viewportWidth;
    };

    ViewPort.prototype.update = function(){
        this.viewportH();
        this.viewportW();
        var attrib = this.attrib,
            width = this.viewportWidth;

        $.each(this.options.breakpoints, function (breakpoint, datakey) {
            if (width >= breakpoint) {
                attrib = datakey;
            }
        });

        this.attrib = attrib;
    };

    // expose viewportH & viewportW methods
    $.fn.viewportH = ViewPort.prototype.viewportH;
    $.fn.viewportW = ViewPort.prototype.viewportW;

    // RESPONSIVE IMAGES CLASS DEFINITION
    // ==================================
    var ResponsiveImage = function(element, options) {
        this.$element = $(element);
        this.options = $.extend({}, ResponsiveImage.DEFAULTS, options);
        this.attrib = "src";
        this.loaded = false;
        this.checkviewport();
    };

    ResponsiveImage.DEFAULTS = {
        threshold: 0,
        attrib: "src",
        skipInvisible: false,
        preload: false
    };

    ResponsiveImage.prototype.checkviewport = function() {
        if (this.attrib !== viewport.attrib) {
            this.attrib = viewport.attrib;
            this.loaded = false;
        }
        this.unveil();
    };

    ResponsiveImage.prototype.boundingbox = function() {
        var boundingbox = {},
            coords = this.$element[0].getBoundingClientRect(),
            threshold = +this.options.threshold || 0;
        boundingbox['right'] = coords['right'] + threshold; boundingbox['left'] = coords['left'] - threshold;
        boundingbox['bottom'] = coords['bottom'] + threshold; boundingbox['top'] = coords['top'] - threshold;
        return boundingbox;
    };

    ResponsiveImage.prototype.inviewport = function() {
        var boundingbox = this.boundingbox();
        return viewport.inviewport(boundingbox);
    };

    ResponsiveImage.prototype.unveil = function(force) {
        if(this.loaded || !force) {
            if (!this.options.preload && this.options.skipInvisible && this.$element.is(":hidden")) return;
        }

        var inview = force || this.options.preload || this.inviewport();
        if (inview) {
            var source = this.options[this.attrib] || this.options["src"];
            if (source) {
                this.$element.attr("src", source);
                this.$element.css("opacity", 1);
                $(window).trigger('loaded.test.responsiveimage');
                this.loaded = true;
            }
        }
    };

    ResponsiveImage.prototype.print = function() {
        this.unveil(true);
    }

    // RESPONSIVE IMAGES PLUGIN DEFINITION
    // ===================================
    var Plugin = function(option) {
        var that = this;
        $lazyload = that;
        return this.each(function() {
            var $this = $(this);
            var data = $this.data('test.responsiveimage');
            var options = typeof option === 'object' && option;

            if (!data) {
                if (!viewport) viewport = new ViewPort(options && options.breakpoints ? {breakpoints:options.breakpoints} : {});

                if (options && options.breakpoints) options.breakpoints = null;
                options = $.extend({}, $this.data(), options);

                $this.data('test.responsiveimage', (data = new ResponsiveImage(this, options)));
            }
            if (typeof option === 'string') data[option]();
        });
    }

    var old = $.fn.responsiveimages;
    $.fn.responsiveimage = Plugin;
    $.fn.responsiveimage.Constructor = ResponsiveImage;

    // RESPONSIVE IMAGES NO CONFLICT
    // =============================
    $.fn.responsiveimage.noConflict = function() {
        $.fn.responsiveimage = old;
        return this;
    };

    // RESPONSIVE IMAGES API
    // =====================
    $(window).on('load.test.responsiveimage', function() {
        $('img.lazyload').responsiveimage();

        // EVENTS
        // ======
        $(window)
            .on('scroll.test.responsiveimage', function(){
                $lazyload.responsiveimage('unveil');
            })
            .on('resize.test.responsiveimage', function(){
                if (viewport) viewport.update();
                $lazyload.responsiveimage('checkviewport');
            })
            .on('beforeprint.test.responsiveimage', function(){
                $lazyload.responsiveimage('print');
                $(window).trigger("readytoprint.test.responsiveimage");
            });
    });

}(jQuery);
