$(document).ready(function(){
  // when you click on a citation button
  $('div > button').click(function() {
    var citationTag = $( this ).siblings('.citation');
    console.log(citationTag[0]);
    // close any other citation views
    $('.citation').hide();
    // show an overlay or dropdown div
    citationTag.show();
  });
});
// when you click on a copy button
// the attribution is copied to the clipboard

