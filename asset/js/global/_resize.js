(function(win, $, doc, undefined) {
    'use strict';

    const resize = (function(){
        const _configs = {
            event : 'resize.resize',
            delay : 150,
            time  : 0,
        };

        var _list = [];

        const init = () => {
            $(win).on(_configs.event, onResize);
        };

        const add = (entry) => {
            _list.push(entry);
            onResize();
        };

        const remove = (entry) => {
            _list = _list.filter(func => func !== entry);
            onResize();
        };

        const onCalc = () => {
            _list.forEach(func => {
                func();
            });
        };

        const onResize = () => {
            clearTimeout(_configs.time);
            _configs.time = setTimeout(onCalc, _configs.delay);
        };

        return {
            init,
            add,
            remove,
        };
    })();

    $(function(){
        win.resize = resize;
        setTimeout(resize.init, 20);
    });

}(window, jQuery, document));
