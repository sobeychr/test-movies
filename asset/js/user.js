require('@global/_collapse');
require('@global/_nav');

(function(win, $, doc, undefined) {
    'use strict';

    const user = (function(){

        const _configs = {

        };

        const init = () => {
            console.log('[USER]', 'init');
        };

        return {
            init
        };
    })();

    $(function(){
        setTimeout(user.init, 20);
    });

}(window, jQuery, document));
