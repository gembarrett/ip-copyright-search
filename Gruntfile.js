module.exports = function(grunt) {

  grunt.initConfig({
    sass: {                              
        dist: {                           
          options: {                      
            style: 'compressed'
          },
          files: {                         
            'dest/main.css': 'src/scss/main.scss'
          }
        }
    },    
    watch: {
      files: ['src/scss/*.scss'],
      tasks: ['sass']
    }
  });

  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-watch');

  grunt.registerTask('default', ['sass', 'watch']);

};