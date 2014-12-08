'use strict';
module.exports = function(grunt) {
    // Load all tasks
    require('load-grunt-tasks')(grunt);
    // Show elapsed time
    require('time-grunt')(grunt);

    var jsFileList = [
        'assets/js/plugins/*.js',
        'bower_components/imagesloaded/imagesloaded.pkgd.min.js',
        'bower_components/FitText.js/jquery.fittext.js',
        'assets/js/_*.js'
    ];

    grunt.initConfig({
        jshint: {
            options: {
                jshintrc: '.jshintrc'
            },
        all: [
            'Gruntfile.js',
            'assets/js/*.js',
            '!assets/js/scripts.js',
            '!assets/**/*.min.*'
        ]
    },
    
    sass: {
        dev: {
            style: 'expanded',
            src: 'assets/scss/main.scss',
            dest: 'assets/css/main.css',
            // Source maps are available, but require Sass 3.3.0 to be installed
            // https://github.com/gruntjs/grunt-contrib-sass#sourcemap
            sourcemap: true
        }
    },
   
    concat: {
        options: {
            separator: ';',
        },
        dist: {
            src: [jsFileList],
            dest: 'assets/js/scripts.js',
        },
    },

    uglify: {
        dest: {
            files: {
                'assets/js/scripts.min.js': ['assets/js/scripts.js']
            }
        }
    },

    autoprefixer: {
        options: {
            browsers: ['last 2 versions', 'ie 8', 'ie 9', 'android 2.3', 'android 4', 'opera 12']
        },
        
        dev: {
            options: {
                map: {
                    prev: 'assets/css/'
                }
            },
        
            src: 'assets/css/main.min.css'
        }
    },

    svgstore: {
        options: {
            prefix : 'shape-', // This will prefix each <g> ID
        },
        
        default: {
            files: {
                'views/partials/svg-defs.svg': ['assets/img/svgs/*.svg'],
            }
        }
    },

    cssmin: {
        options: {
            keepSpecialComments: 0
        },
        
        css: {
            src: 'assets/css/main.css',
            dest: 'assets/css/main.min.css'
        }
    },

    watch: {
        sass: {
            files: [
                'assets/scss/*.scss',
                'assets/scss/**/*.scss'
            ],
            tasks: ['sass:dev', 'autoprefixer:dev']
        },

        js: {
            files: [
                jsFileList,
                '<%= jshint.all %>'
            ],
            tasks: ['jshint', 'concat', 'uglify']
        },

        livereload: {
            // Browser live reloading
            // https://github.com/gruntjs/grunt-contrib-watch#live-reloading
            options: {
                livereload: false
            },
            files: [
                'assets/css/main.css',
                'assets/js/scripts.js',
                'views/*.twig',
                '*.php'
            ]
            }
        }
    });

    // Register tasks
    grunt.registerTask('default', [
        'dev'
    ]);
    
    grunt.registerTask('dev', [
        'svgstore',
        'jshint',
        'sass:dev',
        'autoprefixer:dev',
        'concat',
        'cssmin'
    ]);
};
