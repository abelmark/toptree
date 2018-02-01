document.addEventListener('DOMContentLoaded', function(){
  

  window.addEventListener("scroll", function(){
    var elements = document.getElementsByClassName("scrollFade");

    scrollFade[0].style.opacity = (1 - window.top.scrollY / 520);
    scrollFade[1].style.opacity = (1 - window.top.scrollY / 520);
  });

  var movementStrength = 10;
  var height = movementStrength / window.innerWidth;
  var width = movementStrength / window.innerHeight;

  document.addEventListener("mousemove", function(e){
    var pageX = e.pageX - (window.innerWidth / 2);
    var pageY = e.pageY - (window.innerHeight / 2);
    var newvalueX = width * pageX * - 2 - 25;
    var newvalueY = height * pageY * - 2 - 25;
    document.getElementById('wrap-all').style.backgroundPosition = (newvalueX+"px     "+newvalueY+"px");
  });

  var el = document.getElementsByClassName('img');

  setTimeout(function addGlow(){
    var el = document.getElementsByClassName('img');

    el[0].className += ' glow';

  }, 2000)

});
