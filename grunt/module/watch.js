'use strict';

module.exports = grunt => {
    return {
        options: {
            dateFormat: (time) => {
                grunt.log.writeln('Watched finished in '+time+'ms');
                grunt.log.writeln('Waiting on more changes...');
            }
        },

        sass: {
            files: ['./public/asset/scss/**/*.scss'],
            tasks: ['sass']
        }
    };
};
