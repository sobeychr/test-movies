'use strict';

module.exports = grunt => {

    const isDev = grunt.config.get('isDev');

    const tasks = [
        'copy:jsmin',
        isDev ? 'sass:dev' : 'sass:dist',
    ];

    grunt.task.registerTask('default', tasks);
};
