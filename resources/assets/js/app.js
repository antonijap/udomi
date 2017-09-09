$(document).foundation();
$(window).on('changed.zf.mediaquery', function() {
  $('.is-dropdown-submenu.invisible').removeClass('invisible');
});

$(function() {
  $('#counter').textcounter({
      type: "character",
      max: 100,
      min: 32,
      stopInputAtMaximum: true,
      minimumErrorText: 'Opis mora imati barem 32 znaka.',
      counterText: 'Broj znakova: %d',
      maximumErrorText: 'Maksimalan broj znakova 1000.',
      inputErrorClass: 'danger',
      displayErrorText: true,
      stopInputAtMaximum: false
  });

  $('.owl-carousel').owlCarousel({
      items: 1,
      margin: 10,
      autoHeight: true,
      nav: true,
      loop: true
  });

  $('.gallery').slick({
    dots: true,
    infinite: true,
    speed: 500,
    fade: true,
    cssEase: 'linear'
  });

  $('.flash-message').delay(1000).fadeOut(1000);;

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
});
