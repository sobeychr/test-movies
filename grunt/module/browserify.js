'use strict';

module.exports = grunt => {
    return {
        options: {
            plugin: [
                [
                    'remapify', [
                        {
                            src: '**/*.js',
                            expose: '@global',
                            cwd: '<%= config.assetSrc %>js/global'
                        }
                    ]
                ]
            ],
            transform: [
                [
                    'babelify', {
                        presets: ['@babel/preset-env']
                    }
                ]
            ]
        },
        dist: {
            files: [{
                expand: true,
                cwd:  '<%= config.assetSrc %>js/',
                src:  [
                    '**/*.js',
                    '!**/_*.js',
                    '!**/*.backup.js',
                ],
                dest: '<%= config.assetDest %>js/',
                ext:  '.js'
            }]
        }
    };
};
