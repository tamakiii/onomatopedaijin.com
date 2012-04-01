
(function($) {
    $.fn.getInstanceOfSlider = function(params)
    {
        var $this = this;

        var slide = $(params['slide']);
        var children = $(params['children']);

        var width = slide.width();
        var offset = slide.offset();

        // Setting up slide element objects
        jQuery.each(children, function(key, child) {
            var _offset = $(child).offset();
            $(child).css('position', 'relative');
            $(child).css('width', width);
            $(child).css('top', (offset.top - _offset.top));
            $(child).css('left', offset.left + key * width);
        });

        // Setting up slide object
        slide.css('overflow', 'hidden');
        slide.animate({ height: $(children[0]).outerHeight(true) }, { duration: 500 });

        this.goto = function(index) {
            var child = $(children[index]);
            var offset = child.offset();

            slide.animate({ height: child.outerHeight(true) });

            jQuery.each(children, function(key, child) {
                $(child).animate({ left: width * (key - index)}, { duration: 500 });
            });
        };

        // initialize position
        this.goto(0);

        return this;
    };
})(jQuery);

