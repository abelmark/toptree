//
// Mast Parallax
//
;(function($) {
  var $window = $(window);
  var windowHeight = $window.height();

  $window.resize(function() {
    windowHeight = $window.height();
  });

  $.fn.parallax = function(xpos, speedFactor, outerHeight) {
    var $this = $(this);
    var getHeight;
    var firstTop;
   
    $this.each(function() {
      firstTop = $this.offset().top;
    });

    if (outerHeight) {
      getHeight = function(jqo) {
        return jqo.outerHeight(true);
      };
    } else {
      getHeight = function(jqo) {
        return jqo.height();
      };
    }

    function translate3d(elm, value) {
      var translate3d = 'translate3d(0px,' + value + 'px, 0px)';
      $this.css({
        '-ms-transform': translate3d,
        '-moz-transform': translate3d,
        '-webkit-transform': translate3d,
        'transform': translate3d
      });
    }

    function updatePosition() {
      var plaxElement = $(this);
      var newPos = scrollY / 3;
      translate3d(plaxElement, newPos);
    }

    if (arguments.length < 1 || speedFactor === null) speedFactor = 0.1;

    function update() {
      var pos = $window.scrollTop();        

      $this.each(function() {
        var $element = $(this);
        var top = $element.offset().top;
        var height = getHeight($element);

        if (top + height < pos || top > pos + windowHeight) return;

        window.requestAnimationFrame(updatePosition);
      });
    }

    $window.bind('scroll', update).resize(update);
    update();
  };
})(jQuery);
