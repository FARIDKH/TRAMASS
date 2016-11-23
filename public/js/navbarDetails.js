$(window).scroll(function(){
	var wScroll = $(this).scrollTop();
	if (wScroll ) {

    $('.secondNav')
		.stop()
    .fadeIn(200)
	$(this)
  $('.subMenu')
  .css({
    background:'white'
  })
  $('.first , .second , .third , .fourth , .fifth  , .logo , .icon .fa')
  .css({
    color:'white'
  });
  $('#firstItem').hover(function (){
        $(' .first')
        .css({
          color:'white'
        });
      })

$(' #secondItem').hover(function (){
      $(' .second')
      .css({
        color:'white'
      });
    })
  }
  else{

      $('.secondNav')
			.stop()
      .fadeOut(200)
    $(this)
    $('.subMenu')
    .css({
      background:'none'
    });
    $('.first , .second , .third , .fourth , .fifth  , .logo , .icon .fa ')
    .css({
      color:'black'
    });

    $('#firstItem').hover(function (){
          $(' .first')
          .css({
            color:'black'
          });
        })

    $('#secondItem').hover(function (){
          $(' .second ')
          .css({
            color:'black'
          });
        })
  }
})
