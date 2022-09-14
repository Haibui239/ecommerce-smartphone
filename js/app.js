
$(document).ready(function(){
    $('.slider-container').slick({
        slidesToShow: 6,
        slidesToScroll:1,
        autoplay: true,
        autoplaySpeed: 2000,
        prevArrow:"<button type='button' class='slick-prev pull-left'><i class='fas fa-chevron-left'></i></button>",
        nextArrow:"<button type='button' class='slick-next pull-right'><i class='fas fa-chevron-right'></i></button>",
        mobileFirst:true,//add this one
        responsive: [
          {
            breakpoint: 788,
              settings: {
                        slidesToShow: 6,
                        slidesToScroll: 1,
                        }
           },
          {
            breakpoint: 786,
              settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        }
           },
           {
            breakpoint: 374,
              settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                      }
            }
        ]
      });
  });


  $(document).ready(function(){
    $('.about-image-slider').slick({
        slidesToScroll:1,
        autoplay: true,
        autoplaySpeed: 2000
    });
    
  });
