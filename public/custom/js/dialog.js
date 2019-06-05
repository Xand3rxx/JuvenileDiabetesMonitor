
$(document).ready(function(){
 
// });
// (function() {
//   'use strict';

  $(document).on('click', '.show-modal-example', function(){
      // $(this).closest('div.item-list').find('.pulse-show');
      // let msgTitle = $(this).closest('p').find('.msgTitle').text();
      // let msgTitle = $(this).parents().find('.msgTitle').data('title');
      let msgTitle = $(this).closest('div.ticket-card').find('.msgTitle').data('title');
      $('#Message_Title').val('Re: '+ msgTitle);

      showClickHandler();
  });

  $(document).on('click', '.schedule', function(){
    showClickHandler();
    $('.riskValue, .appointMent').toggleClass('d-none');
  });

  $(document).on('click', '.close-modal-example', function(){
      closeClickHandler();
  });

  var dialog = document.querySelector('#modal-example');
  // var closeButton = dialog.querySelector('button');
  // var showButton = document.querySelector('.show-modal-example');

  if (! dialog.showModal) {
      dialogPolyfill.registerDialog(dialog);
  }
  
  var closeClickHandler = function(event) {
    // event.preventDefault();
      dialog.close();
     
  };
  var showClickHandler = function(event) {
      dialog.showModal();
  };

  

  // showButton.addEventListener('click', showClickHandler);
  // closeButton.addEventListener('click', closeClickHandler);
// }());

  $riskvalue = $('#risk_value').text();
    if($riskvalue > 3){
        showClickHandler();
    }

    $('.cancel').click(function(){
      $('.riskValue, .appointMent').toggleClass('d-none');
    });
});
