'use strict';

module.exports = grunt => {
    return {
        options: {
            plugin: [
                [
                    'remapify', [
                        {
                            src: '**/*.js',
                            expose: 'global',
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
            src: [
                '<%= config.assetSrc %>js/movie.js',
            ],
            dest: '<%= config.assetDest %>js/movie.js'
        }
    };
};
