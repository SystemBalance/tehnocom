$(document).ready(function(){
    $(".domtabs li a").click(function(e) {
    e.preventDefault();
    $(".domtabs li a").removeClass('d_activetab');
    $(this).addClass('d_activetab');
  })
});