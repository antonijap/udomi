$(function() {

  $('#udomljeni').hide();

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

document.addEventListener('DOMContentLoaded', function () {

  // Get all "navbar-burger" elements
  var $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

  // Check if there are any nav burgers
  if ($navbarBurgers.length > 0) {

    // Add a click event on each of them
    $navbarBurgers.forEach(function ($el) {
      $el.addEventListener('click', function () {

        // Get the target from the "data-target" attribute
        var target = $el.dataset.target;
        var $target = document.getElementById(target);

        // Toggle the class on both the "navbar-burger" and the "navbar-menu"
        $el.classList.toggle('is-active');
        $target.classList.toggle('is-active');

      });
    });
  }

});
