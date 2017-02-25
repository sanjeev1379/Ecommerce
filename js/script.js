/*
$(document).ready(function(){
  $("#image_home_offer_left").mouseover(function(){
    $("a #image_home_offer_status_left").animate({
      left: '0px',
      height: '+=150px',
    });
  });
  $("button").mouseout(function(){
    $("div").animate({
      left: '0px',
      height: '-=150px',
    });
  });
});
*/
/*
function func(j){
  var a=document.getElementById("menu");
    if(j==1)
      a.innerHTML="<a href=''><img src='images/link1.jpg' height='420px' width='720px' alt='13' />";
    if(j==2)
      a.innerHTML="<a href=''><img src='images/link2.jpg' height='420px' width='720px' alt='b_1' />";
    if(j==3)
      a.innerHTML="<a href=''><img src='images/link3.jpg' height='420px' width='720px' alt='c_1' />";
    if(j==4)
      a.innerHTML="<a href=''><img src='images/link4.jpg' height='420px' width='720px' alt='d_1' />";
    if(j==5)
      a.innerHTML="<a href=''><img src='images/link5.jpg' height='420px' width='720px' alt='e_1' />";
}
*/
NewImg = new Array("images/cover1.jpg", "images/cover2.jpg", "images/cover3.jpg" , "images/cover4.jpg");
var ImgNum = 0;
var ImgLength = NewImg.length - 1;
//Time delay between Slides in milliseconds
var delay = 1000;
var run;
function chgImg(direction) {
  if (document.images) {
    ImgNum = ImgNum + direction;
    if (ImgNum > ImgLength) {
      ImgNum = 0;
    }
    document.slideshow.src = NewImg[ImgNum];
  }
}
function auto() {
  run = setInterval("chgImg(1)", delay);
}


/* for javascript function */
$(document).ready(function() {
  $('#slideshow').fadeIn('slow');
});

$(document).ready(function() {
  $('#product_menu').slideDown(1000);
});

$(document).ready(function(){
  $('#slide').fadeIn();
});

$(document).ready(function() {
  $('#slide').fadeIn(1000 , 'linear');
});

/*
$('#middle_image').hover(function(){
  $('#fade').fadeIn();
});
*/
$('#slide_toggle1').click(function(){
  $('#login_header1').slideToggle('slow','linear');
});

$('#slide_toggle').click(function(){
  $('#login_header').slideToggle('slow','linear');
});

$("#details_hover").hover(function(){
  $("#details_hover_overlay").fadeIn();
  $("#details_hover_img").fadeIn();
});

//animation in index page
$(document).ready(function(){
  $("#middle_index_left").mouseover(function(){
    $("#image_home_offer_index_left img").animate({
      left: '20px',
      height: '+=40px',
      width: '+=40px',
    });
  });
  $("#middle_index_left").mouseout(function(){
    $("#image_home_offer_index_left img").animate({
      left: '0px',
      height: '-=40px',
      width: '-=40px',
    });
  });
  $("#middle_index_left").mouseover(function(){
    $("#image_home_offer_index_left").animate({
      left: '20px',
      height: '+=40px',
      width: '+=40px',
    });
  });
  $("#middle_index_left").mouseout(function(){
    $("#image_home_offer_index_left").animate({
      left: '0px',
      height: '-=40px',
      width: '-=40px',
    });
  });
});

$(document).ready(function(){
  $("#middle_index_left_1").mouseover(function(){
    $("#image_home_offer_index_left_1 img").animate({
      left: '20px',
      height: '+=40px',
      width: '+=40px',
    });
  });
  $("#middle_index_left_1").mouseout(function(){
    $("#image_home_offer_index_left_1 img").animate({
      left: '0px',
      height: '-=40px',
      width: '-=40px',
    });
  });
  $("#middle_index_left_1").mouseover(function(){
    $("#image_home_offer_index_left_1").animate({
      left: '20px',
      height: '+=40px',
      width: '+=40px',
    });
  });
  $("#middle_index_left_1").mouseout(function(){
    $("#image_home_offer_index_left_1").animate({
      left: '0px',
      height: '-=40px',
      width: '-=40px',
    });
  });
});
