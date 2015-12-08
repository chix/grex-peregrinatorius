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
					'001_jquery.min.js': 'jquery/dist/jquery.min.js',
					'010_bootstrap.min.js': 'bootstrap/dist/js/bootstrap.min.js'
				}
			},
			css: {
				options: {
					destPrefix: 'static/scss'
				},
				files: {
					'lib/_bootstrap.min.scss': 'bootstrap/dist/css/bootstrap.min.css'
				}
			},
			font: {
				options: {
					destPrefix: 'static/fonts'
				},
				files: {
					'glyphicons-halflings-regular.eot': 'bootstrap/dist/fonts/glyphicons-halflings-regular.eot',
					'glyphicons-halflings-regular.svg': 'bootstrap/dist/fonts/glyphicons-halflings-regular.svg',
					'glyphicons-halflings-regular.ttf': 'bootstrap/dist/fonts/glyphicons-halflings-regular.ttf',
					'glyphicons-halflings-regular.woff': 'bootstrap/dist/fonts/glyphicons-halflings-regular.woff',
					'glyphicons-halflings-regular.woff2': 'bootstrap/dist/fonts/glyphicons-halflings-regular.woff2'
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
