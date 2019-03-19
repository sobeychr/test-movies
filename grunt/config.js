'use strict';

module.exports = grunt => {
    const date = new Date();
    const dateStr = [
        date.getFullYear(),
        date.getMonth(),
        date.getDate(),
    ].join('-') + ' ' + [
        date.getHours(),
        date.getMinutes(),
        date.getSeconds(),
    ].join(':');

    grunt.config.set('date',    date);
    grunt.config.set('dateStr', dateStr);
};
