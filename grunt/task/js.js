'use strict';

module.exports = grunt => {

    const isDev = grunt.config.get('isDev');

    const tasks = [
        isDev ? 'babel:dev' : 'babel:dist',
    ];
    if(!isDev) {
        tasks.push('uglify');
    }

    grunt.task.registerTask('js', tasks);
};
