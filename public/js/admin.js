$(function () {
  if ($('.flash-message').length) {
    setTimeout(function () {
      $('.flash-message').fadeOut();
    }, 2000);
  }
});
