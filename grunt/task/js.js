'use strict';

module.exports = grunt => {

    const isDev = grunt.config.get('isDev');

    const tasks = [
        'browserify'
    ];
    if(!isDev) {
        tasks.push('uglify');
    }

    grunt.task.registerTask('js', tasks);
};
