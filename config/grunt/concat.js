// https://github.com/gruntjs/grunt-contrib-concat
module.exports = {
	js: {
		src: [
			'<%= paths.jsSrc %>vendor/jquery.detect_swipe.js',
			'<%= paths.jsSrc %>vendor/featherlight.js',
			'<%= paths.jsSrc %>vendor/featherlight.gallery.js',
			'<%= paths.jsSrc %>wpFeatherlight.js'
		],
		dest: 'js/<%= pkg.nameCamelLow %>.pkgd.js'
	}
};
