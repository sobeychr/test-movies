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
                '<%= config.assetSrc %>**/*.js',
                '<%= config.assetSrc %>**/_*.js',
                '!<%= config.assetSrc %>**/*.backup.js',
                '!<%= config.assetSrc %>**/*.min.js',
                '!<%= config.assetSrc %>**/_*.min.js',
                '!<%= config.assetSrc %>**/_*.min.backup.js',
            ],
            tasks: ['js']
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
