$(document).ready(function(){
  // when you click on a citation button
  $('div > button').click(function() {
    var parentTag = $( this ).parent();
    console.log(parentTag[0]);
    // close any other citation views
    $('.citation').hide();
    // show an overlay or dropdown div
    var overlay = document.createElement('div');
    overlay.addClass('citation-overlay');
    var overlayContent = document.createTextNode('<p>');
    
  });
});
// which holds the citation information
// either generated from data attributes
// or requested via the api
// when you click on a copy button
// the attribution is copied to the clipboard

