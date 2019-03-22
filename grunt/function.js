'use strict';

module.exports = grunt => {

    const leadingZeros = (number, zeros=2) => {
        var num = number.toString();
        var repeat = Math.max(0, zeros - num.length);
        return '0'.repeat(repeat) + num;
    };
    grunt.config.set('leadingZeros', leadingZeros);

    const dateString = (timestamp=-1) => {
        if(timestamp < 0) {
            timestamp = new Date().getTime();
        }
        const date = new Date(timestamp);
        
        return [
            date.getFullYear(),
            leadingZeros( date.getMonth()+1 ),
            leadingZeros( date.getDate() ),
        ].join('-') + ' ' + [
            leadingZeros( date.getHours() ),
            leadingZeros( date.getMinutes() ),
            leadingZeros( date.getSeconds() ),
        ].join(':');
    };
    grunt.config.set('dateString', dateString);

    const repaceAll = (string, search, replace) => {
        if(replace.indexOf(search) >= 0) {
            grunt.fail.warn('Endless -replaceAll()- function in motion with "'+search+'" => "'+replace+'"', 3);
            return;
        }

        while(string.indexOf(search) >= 0) {
            string = string.replace(search, replace);
        }

        return string;
    };
    grunt.config.set('repaceAll', repaceAll);

    const ucFirst = string => string.substring(0,1).toUpperCase() + string.substring(1);
    grunt.config.set('ucFirst', ucFirst);
};