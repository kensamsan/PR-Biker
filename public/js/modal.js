$(".img-modal").click(function(){
  $("#full-image").attr("src", $(this).attr("data-src"));
  $('#image-viewer').show();
});

$("#image-viewer .close").click(function(){
  $('#image-viewer').hide();
});