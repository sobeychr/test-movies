(function(win, $, doc, undefined) {
    'use strict';

    const nav = (function(){

        const _configs = {
            classBlocker : 'nav-blocker--show',
            classIconSub : 'fa-bars fa-arrow-left',
            classMenu    : 'nav-menu--show',

            event: 'click.nav',

            selBlocker : '.nav-blocker',
            selIcon    : '.nav-icon',
            selIconSub : '.nav-icon .fas',
            selMenu    : '.nav-menu'
        };

        const init = () => {
            $(_configs.selBlocker + ', ' + _configs.selIcon).on(_configs.event, onClick);
        };

        const onClick = () => {
            $(_configs.selBlocker).toggleClass(_configs.classBlocker);
            $(_configs.selIconSub).toggleClass(_configs.classIconSub);
            $(_configs.selMenu).toggleClass(_configs.classMenu);
        };

        return {
            init
        };
    })();

    $(function(){
        setTimeout(nav.init, 20);
    });

}(window, jQuery, document));
