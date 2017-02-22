
$(document).on("click", ".sb-icon-search", function(){
   $(this).next('input.sb-search-input').slideToggle();
});
$(document).on("click", ".timeLine span", function(){
   $(this).toggleClass('timeLineOn');
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
