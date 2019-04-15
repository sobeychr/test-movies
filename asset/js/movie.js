require('@global/_collapse');
require('@global/_nav');
require('@global/_resize');

(function(win, $, doc, undefined) {
    'use strict';

    const movie = (function(){

        const _configs = {
            ratio: 480 / 720,
            selTrailers: '.info-trailer>div',
        };

        const init = () => {
            win.collapse.enableAll();
            win.resize.add(onResize);
        };

        const onResize = () => {
            const $trailer = $(_configs.selTrailers);
            const width  = $trailer.width();
            const height = width * _configs.ratio;
            $trailer.height( height );
        };

        return {
            init
        };
    })();

    $(function(){
        setTimeout(movie.init, 20);
    });

}(window, jQuery, document));
