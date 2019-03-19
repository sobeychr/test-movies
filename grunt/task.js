'use strict';

module.exports = grunt => {
    var configs = {};

    // Loads modules
    const module = {
            'sass'  : 'grunt-contrib-sass',
            'watch' : 'grunt-contrib-watch'
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

    return configs;
};
