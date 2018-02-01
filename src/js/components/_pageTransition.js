//
// Page Transition
//
(function($) {
​
  var pageTransition = {
​
    init: function() {
      var siteURL = 'http://' + top.location.host.toString();
      var transLinks = $('a[href^="' + siteURL + '"], a[href^="/"], a[href^="./"], a[href^="../"]');
      var noTransLinks = transLinks.not('.no-trans');
​
      setTimeout(function() {
        $('body').removeClass('js-fade-in');
      }, 2500);
​
      noTransLinks.click(function(e){
        e.preventDefault();
        var linkLocation = this.href;

        function redirectPage() {
          window.location = linkLocation;
        }

        $('.offcanvas-menu, body').animate({
          opacity: '0'
        }, 
        {
          duration: 500,
          complete: function() { 
            $('body').fadeOut(500, redirectPage); 
          }
        });
      });

      // For Safari
      $(window).bind('pageshow', function(e) {
        if (e.originalEvent.persisted) window.location.reload();
      });
    }
  };

  pageTransition.init();
  
})(jQuery);
