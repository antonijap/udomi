$(function() {

  $('.gallery').slick({
    dots: true,
    infinite: true,
    speed: 500,
    fade: true,
    cssEase: 'linear'
  });

	$('input[name="files"]').fileuploader({
        addMore: true,
        fileMaxSize: 2,
        extensions: ['jpg', 'jpeg', 'png'],
        limit: 3
  });

});
