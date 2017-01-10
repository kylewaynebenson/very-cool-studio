/**
 * File jquery.navigate.js.
 *
 * Navigate between posts using keyboard arrows
 */
(function($){
   $(document).ready(function () {
      $(document).keydown(function(e) {
         var url = false;
         if (e.which === 37) {  // Left arrow key code
            url = $('.nav-previous a').attr('href');    }
         else if (e.which === 39) {  // Right arrow key code
            url = $('.nav-next a').attr('href');    }
         if (url) { window.location = url;   }
     });
   });
})(jQuery);
