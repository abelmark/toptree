(function($){

	/* Set the width of the side navigation to 250px */
	$('#openNav').on('click', function(){
    document.getElementById("mySidenav").style.zIndex = "9999";
    document.getElementById("mySidenav").style.width = "250px";
	});

	/* Set the width of the side navigation to 0 */
	$('#closeNav').on('click', function(){
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("mySidenav").style.zIndex = "1";
	});

})(jQuery);
