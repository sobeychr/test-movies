
(function(win, $, doc, undefined) {
    'use strict';

    const collapse = (function(){

        const _configs = {
            classes: {
                down:  'fa-angle-down',
                right: 'fa-angle-right',
                doubleDown:  'fa-angle-double-down',
                doubleRight: 'fa-angle-double-right',

                contentClose: 'collapse--close'
            },
            dataCollapse : 'data-collapse',
            event        : 'click.collapse',
            selCollapse  : 'i.fas[data-collapse]',
            speed        : 300 // speed in ms
        };

        const disable = ($obj) => {
            $obj.off(_configs.event);
        };

        const disableAll = () => {
            $(_configs.selCollapse).off(_configs.event);
        };

        const enable = ($obj) => {
            $obj.on(_configs.event, onClick);
        };

        const enableAll = () => {
            $(_configs.selCollapse).on(_configs.event, onClick);
        };

        const toggleArrow = ($target) => {
            const isDouble = $target.hasClass(_configs.classes.doubleDown) || $target.hasClass(_configs.classes.doubleRight);

            const clDown  = isDouble ? _configs.classes.doubleDown : _configs.classes.down;
            const clRight = isDouble ? _configs.classes.doubleRight : _configs.classes.right;
            $target.toggleClass(clDown + ' ' + clRight);
        };

        const toggleContent = (sel) => {
            $('*[' + _configs.dataCollapse + '="' + sel + '"]:not(i)')
                .finish()
                .slideToggle(_configs.speed);
        };

        const onClick = (e) => {
            const $target = $(e.target);
            toggleArrow($target);
            toggleContent($target.attr(_configs.dataCollapse));
        };

        return {
            disable,
            disableAll,
            enable,
            enableAll
        };
    })();

    $(function(){
        win.collapse = collapse;
    });

}(window, jQuery, document));