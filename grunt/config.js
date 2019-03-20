'use strict';

module.exports = grunt => {

    const leadingZeros = grunt.config.get('leadingZeros');
    const ucFirst = grunt.config.get('ucFirst');

    // Sets environment
    const availableEnvs = ['dev', 'stage', 'live'];
    const env = grunt.option('env') || 'dev';

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
        leadingZeros( date.getMonth()+1 ),
        leadingZeros( date.getDate() ),
    ].join('-') + ' ' + [
        leadingZeros( date.getHours() ),
        leadingZeros( date.getMinutes() ),
        leadingZeros( date.getSeconds() ),
    ].join(':');
    grunt.config.set('date',    date);
    grunt.config.set('dateStr', dateStr);

    grunt.log.subhead('>> Running Grunt on', env['cyan'], dateStr['green']);
};
