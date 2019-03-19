'use strict';

module.exports = grunt => {

    const isDev = grunt.config.get('isDev');

    const tasks = [
        isDev ? 'sass:dev'  : 'sass:dist',
        isDev ? 'babel:dev' : 'babel:dist',
        'copy:jsmin',
    ];

    grunt.task.registerTask('default', tasks);
};
