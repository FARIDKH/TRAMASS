$(window).scroll(function(){
	var wScroll = $(this).scrollTop();
	if (wScroll ){

	  $('.logo')
		.stop()
	  .animate({
	    fontSize:'30px'  },
	      300, function() {
	    });
	    $('.mainMenu')
			.stop()
	  .animate({
	    left:'19em'  },
	      300, function() {
	    });
	}else
	{
	   $('.logo')
		 .stop()
	  .animate({
	    fontSize:'35px'  },
	      300, function() {
	    });
	    $('.mainMenu')
			.stop()
	    .animate({
	      left:'21em'  },
	        300, function() {
	      });
	}
})
