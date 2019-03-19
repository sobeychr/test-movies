'use strict';

module.exports = grunt => {

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