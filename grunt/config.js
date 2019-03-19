'use strict';

module.exports = grunt => {

    const ucFirst = grunt.config.get('ucFirst');

    // Sets environment
    const availableEnvs = ['dev', 'stage', 'live'];
    const env = grunt.option('env') || 'dev';
    grunt.log.writeln('> Running Grunt on', env);
    if(availableEnvs.indexOf(env) < 0) {
        grunt.log.warn('Grunt must be run on', availableEnvs);
        grunt.fail.warn('Invalid Grunt environment', 1);
    }
    availableEnvs.forEach(entry => {
        grunt.config.set('is' + ucFirst(entry), env === entry);
    });

    // Sets date
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
