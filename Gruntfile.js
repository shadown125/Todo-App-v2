const sass = require('node-sass');
const tildeHelper = require('grunt-sass-tilde-importer');
const webpackConfig = require('./webpack.config.js');

const webpackConfigs = {
    build: webpackConfig,
    watch: {
        ...webpackConfig,
        mode: 'development',
        watch: true
    }
};

module.exports = function (grunt) {
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        watch: {
            options: {
                spawn: false
            },
            styles: {
                files: [
                    'src/styles/*.scss',
                    'src/styles/**/*.scss'
                ],
                tasks: [
                    'sass:base',
                    'postcss:base'
                ]
            }
        },
        sass: {
            options: {
                implementation: sass,
                importer: tildeHelper,
                sourceMap: false,
                includePaths: [
                    'node_modules'
                ]
            },
            base: {
                options: {
                    sourceComments: true,
                    outputStyle: 'expanded'
                },
                files: {
                    'build/main.css': 'src/styles/main.scss',
                }
            }
        },
        postcss: {
            base: {
                options: {
                    processors: [
                        require('autoprefixer')
                    ]
                },
                src: [
                    'build/main.css'
                ]
            },
            build: {
                options: {
                    processors: [
                        require('autoprefixer'),
                        require('postcss-clean')
                    ]
                },
                src: [
                    'build/main.css',
                ]
            }
        },
        webpack: {
            build: webpackConfigs.build,
            watch: webpackConfigs.watch
        },
        copy: {
            media: {
                expand: true,
                flatten: true,
                filter: 'isFile',
                cwd: 'src/',
                src: ['fonts/**/*'],
                dest: 'build/'
            }
        },
        imagemin: {
            pics: {
                options: {
                    plugins: [
                        {removeViewBox: false},
                        {cleanupIDs: false}
                    ],
                },
                expand: true,
                flatten: true,
                filter: 'isFile',
                cwd: 'src/pics/',
                src: ['**/*'],
                dest: 'build/'
            }
        },
        concurrent: {
            options: {
                logConcurrentOutput: true
            },
            build: [
                'webpack:build',
                'styles',
                'imagemin',
                'copy'
            ],
            watch: [
                'webpack:watch',
                'watch:styles'
            ]
        }
    });

    grunt.loadNpmTasks('grunt-concurrent');
    grunt.loadNpmTasks('grunt-webpack');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-sass');
    grunt.loadNpmTasks('grunt-postcss');
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-contrib-imagemin');

    grunt.registerTask('styles', ['sass', 'postcss:build']);
    grunt.registerTask('build', ['concurrent:build']);
};