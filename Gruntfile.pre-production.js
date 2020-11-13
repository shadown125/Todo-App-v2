module.exports = function (grunt) {
    grunt.initConfig({
        cacheBust: {
            base: {
                options: {
                    length: 16,
                    algorithm: 'md5',
                    baseDir: './build/',
                    assets: ['*', '!**/*.*.*', '!manifest.json'],
                    deleteOriginals: true,
                    jsonOutput: true,
                    jsonOutputFilename: 'manifest.json',
                    outputDir: '',
                    clearOutputDir: true
                },
                src: [
                    'build/main.css',
                    'build/ckeditor.css',
                    'build/main.js'
                ]
            }
        }
    });

    grunt.loadNpmTasks('grunt-cache-bust');
    grunt.registerTask('pre-production', ['cacheBust']);
};