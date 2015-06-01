'use strict';
module.exports = function(grunt) {
    
    // Load all tasks
    require('load-grunt-tasks')(grunt);

    // Show elapsed time
    require('time-grunt')(grunt);

    var jsFileList = [
        'assets/js/build/modernizr.custom.build.js',
        'bower_components/imagesloaded/imagesloaded.pkgd.min.js',
        'bower_components/jquery.lazyload/jquery.lazyload.min.js',
        'bower_components/imagesloaded/imagesloaded.pkgd.min.js',
        'bower_components/FitVids/jquery.fitvids.js',
        'bower_components/matchMedia/matchMedia.js',
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
                'assets/js/build/scripts.min.js': ['assets/js/scripts.js']
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

    cssmin: {
        options: {
            keepSpecialComments: 0
        },
        
        css: {
            src: 'assets/css/main.css',
            dest: 'assets/css/main.min.css'
        }
    },
    
    modernizr: {

        dist: {
            // [REQUIRED] Path to the build you're using for development.
            "devFile" : "assets/js/vendor/modernizr.custom.dev.js",

            // Path to save out the built file.
            "outputFile" : "assets/js/build/modernizr.custom.build.js",

            // Based on default settings on http://modernizr.com/download/
            "extra" : {
                "shiv" : true,
                "printshiv" : false,
                "load" : true,
                "mq" : false,
                "cssclasses" : true,
                "cssvwunit" : true
            },

            // Based on default settings on http://modernizr.com/download/
            "extensibility" : {
                "addtest" : false,
                "prefixed" : false,
                "teststyles" : false,
                "testprops" : false,
                "testallprops" : false,
                "hasevents" : false,
                "prefixes" : false,
                "domprefixes" : false,
                "cssclassprefix": ""
            },

            // By default, source is uglified before saving
            "uglify" : true,

            // Define any tests you want to implicitly include.
            "tests" : [],

            // By default, this task will crawl your project for references to Modernizr tests.
            // Set to false to disable.
            "parseFiles" : true,

            // When parseFiles = true, this task will crawl all *.js, *.css, *.scss and *.sass files,
            // except files that are in node_modules/.
            // You can override this by defining a "files" array below.
            // "files" : {
                // "src": []
            // },

            // This handler will be passed an array of all the test names passed to the Modernizr API, and will run after the API call has returned
            // "handler": function (tests) {},

            // When parseFiles = true, matchCommunityTests = true will attempt to
            // match user-contributed tests.
            "matchCommunityTests" : false,

            // Have custom Modernizr tests? Add paths to their location here.
            "customTests" : []
        }

    },

    svgmin: {
        options: {
            plugins: [
                {
                    removeViewBox: false
                }, {
                    removeUselessStrokeAndFill: false
                }
            ]
        },
        
        dist: {
            expand: true,
            cwd: 'assets/img/svg-raw',
            src: ['*.svg'],
            dest: 'assets/img/svg-min',
            ext: '.min.svg'
        }
    },

    svgstore: {
        options: {
            prefix : 'shape-',
            cleanup: ['style'],
            svg: { 
                viewBox : '0 0 100 100',
                xmlns: 'http://www.w3.org/2000/svg'
            }
        },
        default : {
            files: {
                'views/partials/svg-defs.svg': ['assets/img/svg-min/*.svg'],
            }
        }
    },

    watch: {
        sass: {
            files: [
                'assets/scss/*.scss',
                'assets/scss/**/*.scss'
            ],
            tasks: ['sass:dev']
        },

        css: {
          files: [
                'assets/css/main.css'
            ],
            tasks: ['cssmin:css']  
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
        'jshint',
        'sass:dev',
        'concat',
    ]);

    grunt.registerTask('build', [
        'jshint',
        'sass:dev',
        'autoprefixer:dev',
        'concat',
        'uglify',
        'cssmin'
    ]);

    grunt.registerTask('svgs', [
        'svgmin',
        'svgstore'
    ]);
};
