$(document).ready(function(){
  // when you click on a citation button
  $('div > button').click(function() {
    var citationTag = $( this ).siblings('.citation');
    // close any other citation views
    $('.citation').hide();
    // show citation div
    citationTag.show();
  });
});
// when you click on a copy button
// the attribution is copied to the clipboard

