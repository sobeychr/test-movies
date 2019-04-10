'use strict';

module.exports = grunt => {
    const presets   = ['@babel/preset-env'];
    const babelify  = ['babelify', { presets }];
    const transform = [ babelify ];

    const remapify = [
        'remapify', [{
            src: ['<%= config.assetSrc %>js/global/**/*.js'],
            expose: 'global',
            cwd: __dirname
        }]
    ];

    return {
        options: {
            plugin: [
                [
                    'remapify', [{
                        src: '<%= config.assetSrc %>js/global/**/*.js',
                        expose: 'global',
                        cwd: __dirname
                    }]
                ]
            ],
            transform
        },
        dist: {
            src: [
                '<%= config.assetSrc %>js/movie.js',
            ],
            dest: '<%= config.assetDest %>js/movie.js'
        }
    };
};
