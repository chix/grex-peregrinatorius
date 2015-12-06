module.exports = function(grunt) {
	'use strict';

	require('load-grunt-tasks')(grunt);

	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),

		bowercopy: {
			options: {
				runBower: true,
				clean: false
			},
			js: {
				options: {
					destPrefix: 'static/js/lib'
				},
				files: {
					'010_material.min.js': 'material-design-lite/material.min.js'
				}
			},
			css: {
				options: {
					destPrefix: 'static/scss'
				},
				files: {
					'lib/_material.min.scss': 'material-design-lite/material.min.css'
				}
			}
		},

		sass: {
			dev: {
				options:{
					style:'expanded',
					sourcemap: 'inline',
					precision: 10
				},
				files: [{
					expand: true,
					cwd: 'static/scss',
					src: ['styles.scss'],
					dest: 'static/css',
					ext: '.css'
				}]
			},
			dist: {
				options: {
					style:'compressed',
					sourcemap: 'none',
					precision: 10
				},
				files: [{
					expand: true,
					cwd: 'static/scss',
					src: ['styles.scss'],
					dest: 'static/css',
					ext: '.min.css'
				}]
			}
		},

		uglify: {
			dev: {
				options: {
					sourceMap: true
				},
				files: {
					'static/js/scripts.js': [
						'static/js/lib/*.js',
						'static/js/partials/*.js'
					]
				}
			},
			dist: {
				options: {
					sourceMap: false
				},
				files: {
					'static/js/scripts.min.js': [
						'static/js/lib/*.js',
						'static/js/partials/*.js'
					]
				}
			}
		},

		watch: {
			options: {
				livereload: true
			},
			html: {
				files: ['static/html/*.html']
			},
			css: {
				files: ['static/scss/partials/*.scss', 'static/scss/styles.scss'],
				tasks: ['sass:dev']
			},
			js: {
				files: ['static/js/partials/*.js'],
				tasks: ['uglify:dev']
			},
			php: {
				files: ['website/views/**/*.php'],
				tasks: ['uglify:dev']
			}
		}
	});

	grunt.event.on('watch', function(action, filepath, target) {
		grunt.log.writeln(target + ': ' + filepath + ' has ' + action);
	});

	grunt.registerTask('dev',['bowercopy', 'sass:dev', 'uglify:dev', 'watch']);
	grunt.registerTask('prod',['bowercopy', 'sass:dev', 'uglify:dev', 'sass:dist', 'uglify:dist']);
};
