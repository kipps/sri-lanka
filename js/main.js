/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var windowHeight  = $(document).height();

//$("#block2").css('height', $(document).height());

$('#block2').css('height', '750px');

$(".show-all-city").on('click', function(e){
    e.preventDefault();
    $(this).parent('.list-box-main').children('div.hide-city').slideToggle(300);
    if($(this).text() === "Показать все места"){
        $(this).text('Свернуть');
    }else{
        $(this).text("Показать все места");
    }
});


$(".beach-link").on("click", function(e){
  e.preventDefault();
  $(".list-box-main .col-md-6").hide();
  $(".list-box-main .link-block.city.beach").parent(".col-md-6").show();
  $(this).parent("div").children(".button-div").removeClass("active");
  $(this).addClass("active");
});


$(".town-link").on("click", function(e){
  e.preventDefault();
  $(".list-box-main .col-md-6").hide();
  $(".list-box-main .link-block.city.town").parent(".col-md-6").show();
  $(this).parent("div").children(".button-div").removeClass("active");
  $(this).addClass("active");
});


$(".rocks-link").on("click", function(e){
  e.preventDefault();
  $(".list-box-main .col-md-6").hide();
  $(".list-box-main .link-block.city.rocks").parent(".col-md-6").show();
  $(this).parent("div").children(".button-div").removeClass("active");
  $(this).addClass("active");
});


$(".jungly-link").on("click", function(e){
  e.preventDefault();
  $(".list-box-main .col-md-6").hide();
  $(".list-box-main .link-block.city.jungly").parent(".col-md-6").show();
  $(this).parent("div").children(".button-div").removeClass("active");
  $(this).addClass("active");
});

$(".all").on("click", function(e){
  e.preventDefault();
  $(".list-box-main .col-md-6").show();
  $(this).parent("div").children(".button-div").removeClass("active");
  $(this).addClass("active");
});
