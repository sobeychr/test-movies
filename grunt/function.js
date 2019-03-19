'use strict';

module.exports = grunt => {

    const ucFirst = string => string.substring(0,1).toUpperCase() + string.substring(1);
    grunt.config.set('ucFirst', ucFirst);

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

    return {};
};