$(function () {
  var slideTop = $('.slide-box').eq(0);
  slideTop.addClass('active box-design');

  function toggleChangeBtn() {
    var slideIndex = $('.slide-box').index($('.active'));
    var slideLength = $('.slide-box').length - 1;
    $('.slide-button').show();
    if (slideIndex == 0) {
      $('.prev').hide();
    } else if (slideIndex == slideLength) {
      $('.next').hide();
    }
  }

  toggleChangeBtn();

  $('.next').click(function () {
    var $displaySlide = $('.active');
    $displaySlide.removeClass('active box-design');
    $displaySlide.next().addClass('active box-design');
    toggleChangeBtn();
  });
  $('.prev').click(function () {
    var $displaySlide = $('.active');
    $displaySlide.removeClass('active box-design');
    $displaySlide.prev().addClass('active box-design');
    toggleChangeBtn();
  });


  $('.modalOpen').each(function () {
    $(this).on('click', function () {
      var target = $(this).data('target');
      var modal = document.getElementById(target);
      console.log(modal);
      $(modal).fadeIn();
      return false;
    });
  });
  $('.modalClose').on('click', function () {
    $('.js-modal').fadeOut();
    return false;
  });


  function addFileInput() {
    if ($('.blog-image').last().val() != "") {
      $('#image-list').append('<li><input type="file" name="image[]" class="blog-image"></li>');
    }
  }

  $(document).on('change', '.blog-image', function () {
    var imageLength = $('#image-list').children().length;
    if (imageLength < 4) {
      if ($(this).val() == "") {
        $(this).parent().remove();
      } else {
        addFileInput();
      }
    } else {
      var index = $('.blog-image').index($(this));
      if (index != 3) {
        $(this).parent().remove();
        addFileInput();
      }
    }
  });
});
