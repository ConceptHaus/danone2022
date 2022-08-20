jQuery(document).ready(function($){
  // Read more Button
  var defaultHeight = 100;
  var text = $("[data-text-height]");
  var textHeight = text[0].scrollHeight;
  var button = $(".empCt__btn");
  text.css({"max-height": defaultHeight, "overflow": "hidden"});

  button.on("click", function(e){
    e.preventDefault();
    var idx = $(this).attr('data-box-trab');
    var newHeight = 0;
    if ($(idx).hasClass("active")) {
      newHeight = defaultHeight;
      $(idx).removeClass("active");
      $(this).text('Leer más');
    } else {
      newHeight = textHeight;
      $(idx).addClass("active");
      $(this).text('Leer menos');
    }
    $(idx).animate({
      "max-height": newHeight
    }, 500);
    // console.log(newHeight);
  });
});