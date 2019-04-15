(function(win, $, doc, undefined) {
    'use strict';

    const collapse = (function(){
        const _configs = {
            classes: {
                down        : 'fa-angle-down',
                right       : 'fa-angle-right',
                doubleDown  : 'fa-angle-double-down',
                doubleRight : 'fa-angle-double-right'
            },
            attr       : 'data-collapse',
            event      : 'click.collapse',
            selClick   : '*[data-collapse]',
            selContent : '*[data-collapse-c="{{replace}}"]',
            speed : 300 // speed in ms
        };

        const disable = ($obj) => {
            $obj.off(_configs.event);
        };

        const disableAll = () => {
            $(_configs.selClick).off(_configs.event);
        };

        const enable = ($obj) => {
            $obj.on(_configs.event, onClick);
        };

        const enableAll = () => {
            $(_configs.selClick).on(_configs.event, onClick);
        };

        const toggleArrow = ($arrow) => {
            const isDouble = $arrow.hasClass(_configs.classes.doubleDown) || $arrow.hasClass(_configs.classes.doubleRight);
            const clDown  = _configs.classes[ isDouble ? 'doubleDown'  : 'down'];
            const clRight = _configs.classes[ isDouble ? 'doubleRight' : 'right'];
            $arrow.toggleClass(clDown + ' ' + clRight);
        };

        const toggleContent = (sel) => {
            const selector = _configs.selContent.replace('{{replace}}', sel);
            $(selector).finish().slideToggle();
        };

        const onClick = (e) => {
            const $target = $(e.target);
            toggleArrow($target.is('.fas') ? $target : $target.find('.fas:first'));
            toggleContent($target.attr(_configs.attr));
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