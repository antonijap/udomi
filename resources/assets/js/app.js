$(function() {

  $('#first').change(function() {
    var val = $(this).val();
    var file = val.split('\\').pop();
    $("#first-filename").html(file);
  });

  $('#second').change(function() {
    var val = $(this).val();
    var file = val.split('\\').pop();
    $("#second-filename").html(file);
  });

  $('#third').change(function() {
    var val = $(this).val();
    var file = val.split('\\').pop();
    $("#third-filename").html(file);
  });


  $('.gallery').slick({
    dots: true,
    infinite: true,
    speed: 500,
    fade: true,
    cssEase: 'linear'
  });


});
