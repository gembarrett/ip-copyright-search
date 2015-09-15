$(document).ready(function(){
  // when you click on a citation button
  $('.result-entry > button').click(function() {
    $('.citation').hide();
    // show citation div
    $(this).siblings('.citation').show();
  });
  // when clicking the button with class of citation
  $('.citation > button').click(function() {
    // copy the button's sibling with a class of citationCopyText into a variable
    var copyCitation = $(this).siblings('.citationCopyText');
    // select all text inside that variable
    copyCitation.select();
    try {
      // copy the text itself to the clipboard
      var successful = document.execCommand('copy');
      // print to console whether the text was successfully copied
      var msg = successful ? 'successful' : 'unsuccessful';
      console.log('Copying text command was ' + msg);
    } catch (err) {
      console.log('Oops, unable to copy');
    }
  });
});