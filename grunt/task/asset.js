'use strict';

module.exports = grunt => {

    const isDev = grunt.config.get('isDev');

    const tasks = [
        isDev ? 'sass:dev' : 'sass:dist',
        'js',
        'copy:image',
    ];

    grunt.task.registerTask('asset', tasks);
};
