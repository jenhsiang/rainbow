
$(document).on("click", ".sb-icon-search", function(){
   $(this).next('.inputAll').slideToggle();
});
$(document).ready(function(){
   $('.scrollnavShow1').removeClass('scrollnavHidden');
});
$(document).ready(function(){
   $('.swiper-slide1').addClass('swiperClick');
});
$(document).on("click", ".swiper-slide1", function(){
   $('.scrollnavAll').addClass('scrollnavHidden');
   $('.scrollnavShow1').removeClass('scrollnavHidden');
   $('.swiper-slide').removeClass('swiperClick');
   $(this).addClass('swiperClick');
});
$(document).on("click", ".swiper-slide2", function(){
   $('.scrollnavAll').addClass('scrollnavHidden');
   $('.scrollnavShow2').removeClass('scrollnavHidden');
   $('.swiper-slide').removeClass('swiperClick');
   $(this).addClass('swiperClick');
});
$(document).on("click", ".swiper-slide3", function(){
   $('.scrollnavAll').addClass('scrollnavHidden');
   $('.scrollnavShow3').removeClass('scrollnavHidden');
   $('.swiper-slide').removeClass('swiperClick');
   $(this).addClass('swiperClick');
});
$(document).on("click", ".swiper-slide4", function(){
   $('.scrollnavAll').addClass('scrollnavHidden');
   $('.scrollnavShow4').removeClass('scrollnavHidden');
   $('.swiper-slide').removeClass('swiperClick');
   $(this).addClass('swiperClick');
});
$(document).on("click", ".swiper-slide5", function(){
   $('.scrollnavAll').addClass('scrollnavHidden');
   $('.scrollnavShow5').removeClass('scrollnavHidden');
   $('.swiper-slide').removeClass('swiperClick');
   $(this).addClass('swiperClick');
});
// $(document).on("click", ".timeLine div", function(){
//    $(this).toggleClass('timeLineOn');
// });
$(document).ready(function(){
    $(".timeLine span").click(function () {
        $(this).toggleClass('timeLineOn');
    });
    $(".cancelWeek").click(function () {
        $(".timeLine span").removeClass('timeLineOn');
    });
});
  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        $('#blah').attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }

  $("#imgInp").change(function(){
    readURL(this);
  });
