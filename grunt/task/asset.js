'use strict';

module.exports = grunt => {

    const isDev = grunt.config.get('isDev');

    const tasks = [
        isDev ? 'sass:dev' : 'sass:dist',
        'copy:cssmin',
        'copy:font',
        'copy:jsmin',
        'js',
        'copy:image',
    ];

    grunt.task.registerTask('asset', tasks);
};
