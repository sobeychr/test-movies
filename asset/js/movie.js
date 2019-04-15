require('@global/_collapse');
require('@global/_nav');

(function(win, $, doc, undefined) {
    'use strict';

    const movie = (function(){

        const _configs = {
            ratio: 480 / 720,
            selTrailers: '.info-trailer>div',

            delay: 150,
            time:  0,
        };

        const init = () => {
            $(win).on('resize.movie', onResize);
            onResize();
        };

        const onCalc = () => {
            const $trailer = $(_configs.selTrailers);
            const width  = $trailer.width();
            const height = width * _configs.ratio;
            $trailer.height( height );
        }

        const onResize = () => {
            clearTimeout(_configs.time);
            _configs.time = setTimeout(onCalc, _configs.delay);
        };

        return {
            init
        };
    })();

    $(function(){
        setTimeout(movie.init, 20);
    });

}(window, jQuery, document));
