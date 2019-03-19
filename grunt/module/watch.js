'use strict';

module.exports = grunt => {
    const isDev = grunt.config.get('isDev');

    return {
        options: {
            dateFormat: (time) => {
                grunt.log.writeln('Watched finished in '+time+'ms');
                grunt.log.writeln('Waiting on more changes...');
            }
        },

        babel: {
            files: [
                '**/*.js',
                '**/_*.js',
                '!**/*.backup.js',
                '!**/*.min.js',
                '!**/_*.min.js',
                '!**/_*.min.backup.js',
            ],
            tasks: [isDev ? 'babel:dev' : 'babel:dist']
        },

        jsmin: {
            files: [
                '<%= config.assetSrc %>js/**/*.min.js',
                '!<%= config.assetSrc %>js/**/*.min.backup.js',
            ],
            tasks: ['copy:jsmin']
        },

        sass: {
            files: ['<%= config.assetSrc %>scss/**/*.scss'],
            tasks: [isDev ? 'sass:dev' : 'sass:dist']
        }
    };
};
