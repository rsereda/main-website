var navbar = $('#headnav'),
didScroll = true;

$(window).scroll(function () {
  didScroll = true;
});


$('#social-media-container-vertical').hide();

setInterval(function () {
  if (didScroll) {
    didScroll = false;
    var doc = $(document);
    var top = doc.scrollTop();
    var jWindow = $(window);

    if(jWindow.width() > 900){
      if(top < 400){
        $('#social-media-container-vertical').fadeOut();

      }else{
        $('#social-media-container-vertical').fadeIn();

      }
    }else {
      $('#social-media-container-vertical').hide();
    }




    $('.fadein').each( function(i){

      var bottom_of_object = $(this).offset().top + $(this).outerHeight()/3;
      var bottom_of_window = jWindow.scrollTop() + jWindow.height();

      /* If the object is completely visible in the window, fade it it */
      if( bottom_of_window > bottom_of_object){

        $(this).animate({'opacity':'1'},1000);
        $(this).removeClass("fadein");
      }

    });
  }
}, 100);

/*$('.contact-link').click(function(){
$('#impressum').fadeIn();
$('body').addClass('no-scroll');
return false;
})

$('#close-impressum').click(function(){
$('#impressum').fadeOut();
$('body').removeClass('no-scroll');
return false;
})*/

$('textarea').autogrow();

/*$(function() {
$('#main-menu').smartmenus({
subIndicators:false
});
});*/


$('body').scrollspy({
  target: '.bs-docs-sidebar',
  offset: 200
});

$(".scrollspy").affix({
  offset: {
    top: function () {
      return (this.top = ($('.bs-docs-sidebar').offset().top))
    }
  }
});

$("#scrollspy").affix({
  offset: {
    top: function () {
      return (this.top = ($('.bs-docs-sidebar').offset().top))
    }
  }
});


$(window).load(function(){
  $('.post-module').hover(function() {
    $(this).find('.news-description').stop().animate({height: "toggle", opacity: "toggle"}, 300);
  });
});



$(function() {
  /*$('a[href*=#]:not([href=#])').not('[href=#society], [href=#refugees], [href=#politics], a.normal').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });*/


  if(!(window.location.hash == '#dev')){
    $('#cf-video-modal').modal();
  }

  $('.box').click(function() {
    $(this).toggleClass('selected');
  });

});



jQuery(document).ready(function($){
  //create the slider

  var maxHeight = Math.max.apply(null, $("div.infos h3").map(function ()
  {
      return $(this).height();
  }).get());

  $("div.infos h3").height(maxHeight);

});
