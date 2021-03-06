'use strict';

module.exports = grunt => {
    return {
        asset: [
            '<%= config.assetDest %>css/**/*',
            '<%= config.assetDest %>js/**/*',
            '<%= config.assetDest %>image/**/*',
        ],
        sass: [
            './grunt/.sass-cache',
        ],
        storage: [
            //'./storage/app/',
            //'./storage/framework/cache/',
            './storage/framework/views/**/*.php',
            './storage/logs/**/*.log',
        ],
    };
};
