module.exports = function(grunt, config) {
    
    var jsFileList = [
    	config.jsSrcDir + '_plugins.js',
        config.jsSrcDir + '_main.js',
    ];  

    console.log(jsFileList);

	grunt.config.merge({
		
		jshint: {
            options: {
                jshintrc: '.jshintrc'
            },
        
            all: [
                'Gruntfile.js',
                config.jsSrcDir + '*.js'
            ],
        },

		concat: {
	        options: {
	        },
	        dist: {
	            src: jsFileList,
	            dest: config.jsConcatDir + 'site.js',
	        },
	    },
		
	    uglify: {
	    	options: {
	    	},
			dist: {
	            files: {
					// For some reason this doesn't accept the config variable for the key. Bleh.
					'assets/js/build/site.min.js': ['<%= concat.dist.dest %>']
	            }
	        }
	    },

	    watch: {
	    	js: {
				files: jsFileList,
				tasks: [
					// 'jshint',
					'concat'
				]
	    	}
	    }

	});

}

