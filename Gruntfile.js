module.exports = function(grunt) {

  grunt.initConfig({
    sass: {                              
        dist: {                           
          options: {                      
            style: 'compressed'
          },
          files: {                         
            'dest/main.min.css': 'src/scss/main.scss'
          }
        }
    },    
    uglify: {
      dist: {
        options: {
          sourceMap: true,
          sourceMapName: 'dest/main.min.map'
        },
        files: {
          'dest/main.min.js':['src/js/*.js']
        }
      }
    },
    watch: {
      files: ['src/scss/*.scss', 'src/js/*.js'],
      tasks: ['sass', 'uglify']
    }
  });

  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-uglify');

  grunt.registerTask('default', ['sass', 'uglify', 'watch']);

};