'use strict';

module.exports = grunt => {
    var configs = {};

    // Loads modules
    const module = {
            'babel' : 'grunt-babel',
            'clean' : 'grunt-contrib-clean',
            'copy'  : 'grunt-contrib-copy',
            'sass'  : 'grunt-contrib-sass',
            'uglify': 'grunt-contrib-uglify',
            'watch' : 'grunt-contrib-watch',
        };
    for(let command in module)
    {
        let filename = command + '.js',
            task = module[command],
            path = 

        configs[command] = require('./module/' + filename)(grunt);
        grunt.loadNpmTasks(task);
    }

    // Loads tasks
    grunt.file.recurse('./grunt/task/', (abspath, rootdir, subdir, filename) => {
        require('./task/' + filename)(grunt);
    });

    // Task configs
    configs.config = {
        'assetSrc'  : './asset/',
        'assetDest' : './public/asset/',
    };

    return configs;
};
