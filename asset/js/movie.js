(function(win, $, doc, undefined) {
    'use strict';

    const movie = (function(){

        const _configs = {

        };

        const init = () => {
            console.log('[MOVIE]', 'init');
        };

        return {
            init
        };
    })();

    $(function(){
        setTimeout(movie.init, 20);
    });

}(window, jQuery, document));
