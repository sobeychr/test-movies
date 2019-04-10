(function(win, $, doc, undefined) {
    'use strict';

    const collapse = (function(){

        const _configs = {
            classDisable: 'collapse-off',
            event:        'click.collapse',
            selCollapse:  'i.fas[data-collapse]'
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

        const onClick = (e) => {
            console.log('collapse', 'onclick');
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
