$(function() {

  $('#udomljeni').hide();

  $('.gallery').slick({
    dots: true,
    infinite: true,
    speed: 500,
    fade: true,
    cssEase: 'linear'
  });

	var input = $('input[name="files"]').fileuploader({
        addMore: true,
        fileMaxSize: 2,
        extensions: ['jpg', 'jpeg', 'png'],
        limit: 3,
        enableApi: true,
        onRemove: function(item, listEl, parentEl, newInputEl, inputEl) {
          if (api.getFiles().length == 1) {
            // Disable Button
            $(':input[type="submit"]').prop('disabled', true);
            $(".photos-error").append('Obavezno mora biti barem jedna slika.');
          } else {
            // Enable Button
            $(':input[type="submit"]').prop('disabled', false);
            $(".photos-error").append('');
          }
          return true;
        },
        onSelect: function(item, listEl, parentEl, newInputEl, inputEl) {
          $(".photos-error").empty();
          $(':input[type="submit"]').prop('disabled', false);
        },
  });

  // get API methods
  window.api = $.fileuploader.getInstance(input);

  $('#adopted').click(function() {
    // Show #adopted
    $('#aktivni').fadeOut();
    $('#udomljeni').slideUp(300).delay(400).fadeIn(400);

    // Append is-active
    $('#one').removeClass('is-active');
    $('#two').addClass('is-active');
  });

  $('#active').click(function() {
    // Show #adopted
    $('#aktivni').slideUp(300).delay(400).fadeIn(400);
    $('#udomljeni').fadeOut();

    // Append is-active
    $('#one').addClass('is-active');
    $('#two').removeClass('is-active');
  });

});
