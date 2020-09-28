

$(document).ready(function(){
  $("form#sdgs").submit(function(event){
    event.preventDefault();



    var selectedVariable=$("#cityPicked option:selected").val();
    if(selectedVariable==="nai"){
    $("#NAIROBI1").show();
    $("#NAIROBI2").show();
    $("#NAIROBI3").show();
    }
    else if(selectedVariable==="momb"){
      $("#MOMBASA1").show();
      $("#MOMBASA2").show();
      $("#MOMBASA3").show();
    }
    else if(selectedVariable==="kis"){
      $("#KISUMU1").show();
      $("#KISUMU2").show();
      $("#KISUMU3").show();
    }else if(selectedVariable==="naks"){
      $("#NAKURU1").show();
      $("#NAKURU2").show();
      $("#NAKURU3").show();
    }else{
      alert("Kindly select a city");
    }

    $("#vp").click(function(){
      $("#kempinskiLocation").toggle();
    });
    $("#sh").click(function(){
      $("#serenaLocation").toggle();
    });
    $("#HH").click(function(){
      $("#hemingwaysLocation").toggle();
    });
    $("#SW").click(function(){
      $("#whitesandsLocation").toggle();
    });
    $("#EPM").click(function(){
      $("#pointLocation").toggle();
    });
    $("#MCh").click(function(){
      $("#continentalHotellocation").toggle();
    });
    $("#AP").click(function(){
      $("#acaciaPremierLocation").toggle();
    });
    $("#W").click(function(){
      $("#whirlSpringLocation").toggle();
    });
    $("#I").click(function(){
      $("#imperialLocation").toggle();
    });
    $("#SW").click(function(){
      $("#sarovaWoodlands").toggle();
    });
    $("#L").click(function(){
      $("#legacyLocation").toggle();
    });
    $("#EPN").click(function(){
      $("#eaglePalaceNakuruLocation").toggle();
    });



});
});
