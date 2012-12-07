$(document).ready(function(){
$(".flip").click(function(){
    $(".panel").slideToggle("slow");
  });
});

$(document).ready(function(){
    $("p.box2").hide();
});

$(document).ready(function(){
$("#box").mouseenter(function(){
    $("p.box2").show("slow");
  });
});

$(document).ready(function(){
$("#box").mouseleave(function(){
    $("p.box2").hide("slow");
  });
});