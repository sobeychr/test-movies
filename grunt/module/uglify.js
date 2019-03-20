'use strict';

module.exports = grunt => {
    const isStage = grunt.config.get('isStage');

    return {
        options: {
            sourceMap: isStage
        },
        dist: {
            files: [{
                expand: true,
                cwd:  '<%= config.assetDest %>js/',
                src:  [
                    '**/*.js',
                    '!**/*.min.js',
                    '!**/*.js.map',
                    '!**/*.min.js.map',
                ],
                dest: '<%= config.assetDest %>js/',
                ext:  '.js'
            }]
        }
    };
};
