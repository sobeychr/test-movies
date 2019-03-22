'use strict';

module.exports = grunt => {
    require('./grunt/function.js')(grunt);
    require('./grunt/config.js')(grunt);

    const taskConfigs = require('./grunt/task.js')(grunt);
    taskConfigs.pkg  = grunt.file.readJSON('./package.json');
    taskConfigs.date = grunt.config.get('dateStr');

    grunt.config.init(taskConfigs);
};
