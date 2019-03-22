'use strict';

module.exports = grunt => {
    
    grunt.task.registerTask('default', () => {
        const tasks = {
            'asset' : 'Compiles JS and SCSS for the browser',
            'clean' : 'Removes various GitIgnore files',
            'watch' : 'Watches JS and SCSS files > grunt asset',
        };
        const envs = {
            '--env=stage' : 'Runs tasks under Stage environment',
            '--env=live'  : 'Runs tasks under Live environment',
        };

        grunt.log.writeln('Cannot use `default` task, please use from the list below:'['red']);

        for(let name in tasks)
        {
            let desc = tasks[name];
            grunt.log.write('>', name['cyan']);
            grunt.log.writeln('', desc);
        }

        for(let option in envs)
        {
            let desc = envs[option];
            grunt.log.write('> grunt [task]'['gray'], option['cyan']);
            grunt.log.writeln('', desc);
        }
    });
};
