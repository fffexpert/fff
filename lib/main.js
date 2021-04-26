$('.about__slider').slick({
  dots: false,
  infinite: true,
  arrows: true,
  slidesToShow: 3,
  slidesToScroll: 1,
  nextArrow: '<button type="button" class="slick-next"><svg width="42" height="80" viewBox="0 0 42 80" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2 78L40 40L2 2" stroke="#212121" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/></svg></button>', 
  prevArrow: '<button type="button" class="slick-prev"><svg width="42" height="80" viewBox="0 0 42 80" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M40 78L2 40L40 2" stroke="#212121" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/></svg></button>',
    responsive: [
     {
      breakpoint: 1199,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 992,
      settings: "unslick"
    },
  ]
});
$('.gal__slider').slick({
  dots: false,
  infinite: false,
  arrows: true,
  slidesToShow: 4,
  slidesToScroll: 1,
  nextArrow: '<button type="button" class="slick-next"><svg width="42" height="80" viewBox="0 0 42 80" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2 78L40 40L2 2" stroke="#212121" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/></svg></button>', 
  prevArrow: '<button type="button" class="slick-prev"><svg width="42" height="80" viewBox="0 0 42 80" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M40 78L2 40L40 2" stroke="#212121" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/></svg></button>',
    responsive: [
     {
      breakpoint: 1200,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },
     {
      breakpoint: 576,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: true, 
        arrows: false,
        autoplay: true,
        autoplaySpeed: 3000,
      }
    }
  ]
});
$('.rew__slider').slick({
  dots: false,
  infinite: true,
  arrows: true,
  slidesToShow: 1,
  slidesToScroll: 1,
  nextArrow: '<button type="button" class="slick-next"><svg width="42" height="80" viewBox="0 0 42 80" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2 78L40 40L2 2" stroke="#212121" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/></svg></button>', 
  prevArrow: '<button type="button" class="slick-prev"><svg width="42" height="80" viewBox="0 0 42 80" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M40 78L2 40L40 2" stroke="#212121" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/></svg></button>',
});
$('.rew__slider_mob').slick({
  dots: true,
  infinite: true,
  slidesToShow: 1,
  slidesToScroll: 1,
  adaptiveHeight: true,
  autoplay: true,
  autoplaySpeed: 3000,
});
// Burger

 $('.menu .button').click(function(event) {
    $(this).toggleClass('active');
    $('.header__menu').toggleClass('active');
    return false;
  });

 
 // POPUP
 $('.rew__link').click(function (e) {
    e.preventDefault();
    $('#popup-rew').arcticmodal({
    });
    $('#expert').val($('.assist__name').text());
    
});
 $('.wh__link').click(function (e) {
    e.preventDefault();
    $('#popup-wh').arcticmodal({
    });
    $('#expert-wh').val($('.assist__name').text());
    
});
$('.close__pic').click(function () {
  $.arcticmodal('close');
});
$('.close__pic2').click(function () {
  $.arcticmodal('close');
});

$('.wpcf7-submit').click(function() {
    if($(this).siblings('.d-flex').children('.market__group').children('input[name="your-name"]').val() != "" & $(this).siblings('.d-flex').children('.market__group').children('input[name="your-email"]').val() != ""){
        setTimeout(function(){
            $.arcticmodal('close');
            $('.wpcf7-response-output').text('');
        }, 5600);
    }
});


  // Carousel-news
function myFunction(x) {
  if (x.matches) { // If media query matches
    
  } else {
      $('.draw__slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        infinite: true,
        dots: true,
        adaptiveHeight: true
        
      });

      $('.people__cross').click(function(event) {
      $(this).parent().siblings('.front').css('transform','rotateY(0deg)');
      $(this).parent('.back').css('transform','rotateY(180deg)');

      return false;
    });
   $('.card').click(function() {
      $(this).children('.front').css('transform','rotateY(180deg)');
      $(this).children('.back').css('transform','rotateY(360deg)');
    });
      
  }
};

var x = window.matchMedia("(min-width: 992px)");
myFunction(x); // Call listener function at run time
x.addListener(myFunction); // Attach listener function on state changes


 $('.assist__add').click(function() {
    $('.assist__more').fadeIn(100);
    $('.assist__sm').css('display', 'none');
  });


  $('.assist__less').click(function() {
    $('.assist__more').css('display', 'none');
    $('.assist__sm').fadeIn(100);
  });


// TEXTAREA

$(function(){
    $('body')
    .one('focus.textarea', '#form__text', function(e) {
        baseH = this.scrollHeight;
    })
    .on('input.textarea', '#form__text', function(e) {
        if(baseH < this.scrollHeight) {
            $(this).height(0).height(this.scrollHeight);
        }
        else {
            $(this).height(0).height(baseH);
        }
    });
    
   
});


// $(document).ready(function(){
//   $('html').mousemove(function(e){
//         var x = e.pageX - this.offsetLeft;
//         var y = e.pageY - this.offsetTop;
//         $('.header__img').css({'top': x,'left': y}); 
//   });
// });






// $('.header__list li a').click(function(event) {
//    $('.header__list li a').removeClass('active');
//    $(this).addClass('active');
//    return false;
//  });



 $('.header__list').slick({
  dots: false,
  infinite: false,
  rows: 4,
  slidesToShow: 2,
  slidesToScroll: 1,
  arrows: true,
  nextArrow: '<button type="button" class="slick-next"><svg class="slider-arrow" width="34" height="54" viewBox="0 0 34 54" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 53L27 27L1 1" stroke="white" stroke-width="6"/></svg></button>', 
  prevArrow: '<button type="button" class="slick-prev"><svg class="slider-arrow" width="34" height="54" viewBox="0 0 34 54" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M27 0.999998L0.999999 27L27 53" stroke="white" stroke-width="6"/></svg></button>',
    responsive: [
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
          }
        }
 ]
});


if($( window ).width() > 1200){

    
    let bg = document.querySelector('.header__img');
    if(bg){
        window.addEventListener('mousemove', function(e) {
            let x = e.clientX / window.innerWidth;
            let y = e.clientY / window.innerHeight;  
            bg.style.transform = 'translate(-' + x * 50 + 'px, -' + y * 50 + 'px)';
        });
    }
    
    let people = document.querySelector('.header__pink');
    if(people){
        window.addEventListener('mousemove', function(e) {
            let x = e.clientX / window.innerWidth;
            let y = e.clientY / window.innerHeight;  
            people.style.transform = 'translate(-' + x * 80 + 'px, ' + y * 20 + 'px)';
        });
    }
    
    let violet = document.querySelector('.header__violet');
    if(violet){
        window.addEventListener('mousemove', function(e) {
            let x = e.clientX / window.innerWidth;
            let y = e.clientY / window.innerHeight;  
            violet.style.transform = 'translate(' + x * 60 + 'px, -' + y * 20 + 'px)';
        });
    }
    
    let topsun = document.querySelector('.top__sun');
    if(topsun){
        window.addEventListener('mousemove', function(e) {
            let x = e.clientX / window.innerWidth;
            let y = e.clientY / window.innerHeight;  
            topsun.style.transform = 'translate(' + x * 80 + 'px, ' + y * 50 + 'px)';
        });
    }
    
    let toppic = document.querySelector('.header__picture');
    if(toppic){
        window.addEventListener('mousemove', function(e) {
            let x = e.clientX / window.innerWidth;
            let y = e.clientY / window.innerHeight;  
            toppic.style.transform = 'translate(' + x * 50 + 'px, ' + y * 15 + 'px)';
        });
    }
    
    let aboutsun = document.querySelector('.about__sun');
    if(aboutsun){
        window.addEventListener('mousemove', function(e) {
            let x = e.clientX / window.innerWidth;
            let y = e.clientY / window.innerHeight;  
            aboutsun.style.transform = 'translate(' + x * 80 + 'px, -' + y * 80 + 'px)';
        });
    }
    
    let drawsun = document.querySelector('.draw__sun');
    if(drawsun){
        window.addEventListener('mousemove', function(e) {
            let x = e.clientX / window.innerWidth;
            let y = e.clientY / window.innerHeight;  
            drawsun.style.transform = 'translate(' + x * 40 + 'px, -' + y * 40 + 'px)';
        });
    }
    
    let assistfig = document.querySelector('.assist__fig');
    if(assistfig){
        window.addEventListener('mousemove', function(e) {
            let x = e.clientX / window.innerWidth;
            let y = e.clientY / window.innerHeight;  
            assistfig.style.transform = 'translate(-' + x * 60 + 'px, -' + y * 35 + 'px)';
        });
    }
    
    let videofig = document.querySelector('.video__fig');
    if(videofig){
        window.addEventListener('mousemove', function(e) {
            let x = e.clientX / window.innerWidth;
            let y = e.clientY / window.innerHeight;  
            videofig.style.transform = 'translate(-' + x * 30 + 'px, -' + y * 50 + 'px)';
        });
    }
    
    let galfig = document.querySelector('.gal__fig');
    if(galfig){
        window.addEventListener('mousemove', function(e) {
            let x = e.clientX / window.innerWidth;
            let y = e.clientY / window.innerHeight;  
            galfig.style.transform = 'translate(' + x * 50 + 'px, -' + y * 50 + 'px)';
        });
    }
    
    let rewfig = document.querySelector('.rews__fon');
    if(rewfig){
        window.addEventListener('mousemove', function(e) {
            let x = e.clientX / window.innerWidth;
            let y = e.clientY / window.innerHeight;  
            rewfig.style.transform = 'translate(-' + x * 80 + 'px, -' + y * 50 + 'px)';
        });
    }
    
    let peoplebgelem1 = document.querySelector('.people__bgelem1');
    if(peoplebgelem1){
        window.addEventListener('mousemove', function(e) {
            let x = e.clientX / window.innerWidth;
            let y = e.clientY / window.innerHeight;  
            peoplebgelem1.style.transform = 'translate(-' + x * 60 + 'px, -' + y * 60 + 'px)';
        });
    }
    
    let peoplebgelem2 = document.querySelector('.people__bgelem2');
    if(peoplebgelem2){
        window.addEventListener('mousemove', function(e) {
            let x = e.clientX / window.innerWidth;
            let y = e.clientY / window.innerHeight;  
            peoplebgelem2.style.transform = 'translate(' + x * 60 + 'px, ' + y * 60 + 'px)';
        });
    }
    
    let footerfb = document.querySelector('.footer__fb');
    if(footerfb){
        window.addEventListener('mousemove', function(e) {
            let x = e.clientX / window.innerWidth;
            let y = e.clientY / window.innerHeight;  
            footerfb.style.transform = 'translate(-' + x * 40 + 'px, ' + y * 40 + 'px)';
        });
    }
    
    let footerfig = document.querySelector('.footer__site');
    if(footerfig){
        window.addEventListener('mousemove', function(e) {
            let x = e.clientX / window.innerWidth;
            let y = e.clientY / window.innerHeight;  
            footerfig.style.transform = 'translate(-' + x * 50 + 'px, -' + y * 50 + 'px)';
        });
    }
    
    let footerhand = document.querySelector('.footer__hand');
    if(footerhand){
        window.addEventListener('mousemove', function(e) {
            let x = e.clientX / window.innerWidth;
            let y = e.clientY / window.innerHeight;  
            footerhand.style.transform = 'translate(' + x * 60 + 'px, ' + y * 40 + 'px)';
        });
    }

}




$('#email').on('click', function(e){
    e.preventDefault()
    var $tmp = $("<textarea>");
    $("body").append($tmp);
    $tmp.val($(this).data('mail')).select();
    document.execCommand("copy");
    $tmp.remove();
    alert('Email скопирован');
})



