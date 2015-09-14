$(document).ready(function(){
  // when you click on a citation button
  $('.result-entry > button').click(function() {
    $('.citation').hide();
    // show citation div
    $(this).siblings('.citation').show();
  });
  $('.citation > button').click(function() {
    var copyCitation = $(this).siblings('.citationCopyText');
    copyCitation.select();
    try {
      var successful = document.execCommand('copy');
      var msg = successful ? 'successful' : 'unsuccessful';
      console.log('Copying text command was ' + msg);
    } catch (err) {
      console.log('Oops, unable to copy');
    }
  });
});

// the attribution is copied to the clipboard

// $(this).siblings('.citation').show();
// // close any other citation views
// $('.citation').hide();
// // when you click on a copy button
// var copyBtn = $(this).siblings('.citation').children('button');
// console.log(copyBtn);
// 
// $(copyBtn).click(function() {
//   // copyBtn.addEventListener('click', function(event) {
//   var copyCitation = document.querySelector('.citationTag > .citation_style_MLA');
//   copyCitation.select();
//   try {
//     var successful = document.execCommand('copy');
//     var msg = successful ? 'successful' : 'unsuccessful';
//     console.log('Copying text command was ' + msg);
//   } catch (err) {
//     console.log('Oops, unable to copy');
//   }
//   // });
// 
// });
