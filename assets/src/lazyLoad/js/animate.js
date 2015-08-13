jQuery.fn.extend({
    lazyAnimate: function (effect) {
        effect = effect || 'zoomIn';

        return this.each(function () {
            $(this).animateCSS(effect);
        });
    }
});
