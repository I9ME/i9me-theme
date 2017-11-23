/*=========================================================================================
// INICIO MAIN JS
========================================================================================= */

jQuery(function($) {
  $(document).ready(function() {
    $(window).scroll(function() {
      if ($(this).scrollTop() > 1){  
          $('.header').addClass("sticky");
        }
        else{
          $('.header').removeClass("sticky");
        }
      });
/*=========================================================================================
// MENU TOOGLE
=========================================================================================*/

 //menu-toggle
     $(".header__toggle").click(function(event){
         event.preventDefault();
         if ($(this).hasClass('on')){
             $(this).removeClass('on');
                 $(".menu").stop().fadeOut();
         }else{
             $(this).addClass('on');
                 $(".menu").stop().fadeIn();
             }
     });



    var alturaJanela = $(window).height();

    var alturaHeader = $('.header .banner .banner__layer').height();

    var alturaTela = alturaJanela - alturaHeader;



    $('.header .banner  .banner__layer').css({'height' : alturaTela+'vh'}); 

    $('.criacao__lista li').click(function(){
      $('.criacao__lista li').removeClass("active");
      $(this).addClass("active");
    });
// jQuery(document).ready(function($) {
    
//     /* Every time the window is scrolled ... */
//     $(window).scroll( function(){
    
//         /* Check the location of each desired element */
//         $('.scrollFade').each( function(i){
            
//             var bottom_of_object = $(this).offset().top + $(this).outerHeight();
//             var bottom_of_window = $(window).scrollTop() + $(window).height() + 100;
            
//             /* If the object is completely visible in the window, fade it it */
//             if( bottom_of_window > bottom_of_object ){
                
//                 $(this).animate({'opacity':'1'},500);
//         $(this).addClass('scrollFadeON');
                    
//             }
            
//         }); 
    
//     });
      
// });






//ScrollOn

$(window).scroll(function(){


     var scroll = jQuery(window).scrollTop();

     if ( scroll > 0 ) {
      jQuery('.header').addClass('scrollOn');
       jQuery('.header').removeClass('scrollOff');

     } else {
      jQuery('.header').removeClass('scrollOn');
       jQuery('.header').addClass('scrollOff');
     }


    //effects parallax design & web
    //var wScroll = $(this).scrollTop();

    // $('.servicos__sombralapis').css({
    //   'transform' : 'translate(0px, '+ wScroll /2 +'px)'
    // });
    //  $('.servicos__lapisparallax').css({
    //   'transform' : 'translate(0px, '+ wScroll /20 +'px)'
    // });

    // $('.servicos__sombraphone').css({
    //   'transform' : 'translate(0px, '+ wScroll /2 +'px)'
    // });
    //  $('.servicos__phoneparallax').css({
    //   'transform' : 'translate(0px, '+ wScroll /20 +'px)'
    // });

     //if(wScroll > $('.servicos__layerbottom').offset().top - ($(window).height() / 1.2)){


      //  $('.servicos__layerbottom .servicos__sombralapis')each(function(i){

        //  setTimeout(function(){
          //  $('.servicos__layerbottom .servicos__sombralapis').eq(i).addClass('is-showing');
          //}, 150 * (i+1));

       // });

     //}

});

  //o script só funciona se atualizar a página.

    // var larguraTela = $(window).width();

    // if( larguraTela < 768){
    //      jQuery('.containerowl').addClass('owl-carousel');
    //      jQuery('.containerowl').attr('id', 'projetos');
    //   } else{
          
    //   }

// Checa se é um dispositivo móvel

// var portfolio = document.ElementsById("portfolio");
// var largura = window();

      // ///Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) 
      // if( largura > 768) {

      //   portfolio.removeClass("owl-carousel")
      //   //se for desktop
      //   // jQuery('.groupboxes').addClass('owl-carousel');
      //   // jQuery('.groupboxes').addClass('owl-carousel');
      //   // jQuery('.groupboxes').attr('id', 'blog');
      // } else {


      // }
  $(window).resize(function(){
    resizeRemoveOwl();
    resizeWin();
  });

  function resizeRemoveOwl(){
    if ($(window).width() > 767){

        $(".item").removeClass("owl-carousel owl-theme owl-loaded owl-hidden");
        $(".item").removeAttr('id', 'portfolio');
      } 
  }
  //ativa o owl-carousel portfolio em 767 de largura.
  function resizeWin(){

    if ($(window).width() <= 767) {
      owlportfolio();
      owlblog();
    }
      
  }
  function owlportfolio(){
    $("#portfolio").owlCarousel({
      items: 1,
      nav: false,
      dots: false,
      navText: false,
      margin: 0,
        responsive: {
          0: {
            items: 1
          }  
        }
    });
  }
  function owlblog(){
    $("#blog").owlCarousel({
      items: 1,
      nav: false,
      dots: false,
      navText: false,
      margin: 0,
        responsive: {
          0: {
            items: 1
          }  
        }
    });
  }

  









    


    // var alturaJanela = $(window).height();

    // var alturaHeader= $('.header .area_video_banner').height();

    // var alturaTela = alturaJanela - alturaHeader;



    // $('.area_video_banner').css({'height' : alturaTela+'px'}); 
/*=========================================================================================
// OWL
========================================================================================= */

$("#depoimentos").owlCarousel({
  items: 1,
  nav: false,
  dots: true,
  navText: false,
  margin: 50,
  loop: true,
  autoplay:true,
  autoplayTimeout:2600,
  autoplayHoverPause:true,
  responsive: {
    0: {
      items: 1
    },
    600: {
      items: 2
    },
    1000: {
      items: 2,
       dots: false
    }
  }
});
$("#clientes").owlCarousel({
  items: 1,
  nav: false,
  dots: true,
  navText: false,
  margin: 0,
  // animateOut: 'fadeOut',
  // animateIn: 'fadeIn'
  responsive: {
    0: {
      items: 1
    },
    600: {
      items: 4
    },
    1000: {
      items: 6
    }
  }
});

// $("#blog").owlCarousel({
//   items: 1,
//   nav: false,
//   dots: false,
//   navText: false,
//   margin: 0,
//    responsive: {
//     0: {
//       items: 1
//     },
//     600: {
//       items: 2
//     },
//     1000: {
//       items: 2
//     }
//   }

// });
$("#equipe").owlCarousel({
  items: 1,
  nav: false,
  dots: true,
  navText: false,
  margin: 0,
   responsive: {
    0: {
      items: 1
    },
    600: {
      items: 2
    },
    1000: {
      items: 3,
      dots: false
    }
  }

});


/*=========================================================================================
// EQUAL HEIGHT
=========================================================================================*/
// function equalizeHeights(selector) {
//   var heights = new Array();

//   // Loop to get all element heights
//   $(selector).each(function() {

//     // Need to let sizes be whatever they want so no overflow on resize
//     $(this).css('min-height', '0');
//     $(this).css('max-height', 'none');
//     $(this).css('height', 'auto');

//     // Then add size (no units) to array
//     heights.push($(this).height());
//   });

//   // Find max height of all elements
//   var max = Math.max.apply( Math, heights );

//   // Set all heights to max height
//   $(selector).each(function() {
//     $(this).css('height', max + 'px');
//   });
// }

// $(window).on('load resize', function(){
//     equalizeHeights('.news__content');
// });

// /*=========================================================================================
// // CLOSE FUNCTION
// =========================================================================================*/
  });
});