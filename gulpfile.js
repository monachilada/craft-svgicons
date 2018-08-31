var gulp = require('gulp');
var _ = require('lodash');
var fs = require('fs');
var feather = './node_modules/feather-icons/dist/icons/';
var featherDest = './resources/icons/feather/';
var zondicons = './node_modules/zondicons/dist/icons/';
var zondiconsDest = './resources/icons/zondicons/';

gulp.task('feather', function (done) {
	var files = fs.readdirSync(feather);
	
	_.each(files, function(file) {
		fs.copyFileSync(feather + file, featherDest + file);
	});
	
	done();
});

gulp.task('zondicons', function (done) {
	var files = fs.readdirSync(zondicons);
	
	_.each(files, function(file) {
		fs.copyFileSync(zondicons + file, zondiconsDest + file);
	});
	
	done();
});

gulp.task('default',  gulp.parallel('feather', 'zondicons'));