jQuery(document).ready(function($){

    // MOBILE MENU
    $('.mobile-menu').on('click', function(){
      $('body').toggleClass('open-mobile-menu');
    });

    // SITE SEARCH
    $('.ct-site-search i').on('click', function() {
        $('.site-search-field').toggleClass('open-search');
    });

    //Hide search on clicking outside
    $(document).on('click', function(e) {
        if ($(e.target).closest(".ct-site-search").length === 0) {
            $('.site-search-field').removeClass('open-search');
        }
    });

    $(".text-toggle").click(function () {
      $(".text-toggle").toggleClass('open');
      if($(".editor-content").hasClass("toggle-text-content")) {
          $(this).text("Read Less");
      } else {
          $(this).text("Read More");
      }
      if(!$(this).hasClass('single')){
      $(".editor-content").toggleClass("toggle-text-content");    
      }
      
      $(".gen-info-cont").toggleClass("toggle-text-content");
    });
    
   

    $('.testimonial-slider').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: false,
        loop: true,
        dots: true,
        arrows: false,
        autoplaySpeed: 2000,
        responsive: [
          {
            breakpoint: 992,
            settings: {
              slidesToShow: 3,
            }
          },
          {
            breakpoint: 800,
            settings: {
              slidesToShow: 2,
            }
          },
          {
            breakpoint: 667,
            settings: {
              slidesToShow: 2,
            }
          },
          {
            breakpoint: 420,
            settings: {
              slidesToShow: 1,
            }
          },
        ]
      });

   $('.casino-match-options').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: false,
        loop: false,
        dots: false,
        infinite: false,
        //draggable: false,
        arrows: true,
        autoplaySpeed: 2000,
      });

      //Casino match carousel 
      $(document).on('click','input[name="choose-casino-game"],input[name="choose-casino-dealer-type"],input[name="choose-casino-payout-speed"],.casino-match-steps .btn-next',function(){
        $(".casino-match-options").slick('slickNext');
      });
      $(document).on('click','.casino-match-steps .btn-prev',function(){
        $(".casino-match-options").slick('slickPrev');
      });

      $('.game-filter-menu li').click(function(){
        var tab_id = $(this).attr('data-tab');
        $('.game-filter-menu li').removeClass('active');
        $('.tab-content').removeClass('active');
        $(this).addClass('active');
        $("#"+tab_id).addClass('active');
      });

      //Countdown timer for promotions row
      
      setInterval(function() { 
        $('.casino-card-promotions .timer-block').each(function(){
        //console.log($(this).data('date'));
        var date=$(this).data('date');
        makeTimer(date,$(this));
        
      });
      }, 1000);


      //Fixed header  menu
      $(window).scroll(function(){
          if (jQuery(window).scrollTop()>= 700) {
                  jQuery('.sticky-menu').addClass('fixed-top'); 
                  //jQuery('nav div').addClass('visible-title'); 
              }
              else {
                  jQuery('.sticky-menu').removeClass('fixed-top'); 
                  //jQuery('nav div').removeClass('visible-title'); 
              }
              if (jQuery(window).scrollTop()>= 700) {
                  jQuery('.welcome-bonus-bar').addClass('fixed-top'); 
              }
              else {
                  jQuery('.welcome-bonus-bar').removeClass('fixed-top'); 
              }
      });

      //Header sticky menu
      $('.quick-menu a[href^="#"]').on('click', function(event) {
        var target = $(this.getAttribute('href'));
        if( target.length ) {
            event.preventDefault();
            $('html, body').stop().animate({
                scrollTop: target.offset().top-100
            }, 1000);
        }

        $('.quick-menu a').removeClass('active');
        $(this).addClass('active');

      });

      //Filter dropdown FUNCTION ==================
        jQuery(".filter-dropdown").hide();
        jQuery('.filter-btn').click(function() {
          jQuery('.filter-dropdown').slideToggle(100);
          return false;
        });

});



function makeTimer(date,elem) {
  
    var endTime = new Date(date);      
      endTime = (Date.parse(endTime) / 1000);

      var now = new Date();
      now = (Date.parse(now) / 1000);

      var timeLeft = endTime - now;

      var days = Math.floor(timeLeft / 86400); 
      var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
      var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600 )) / 60);
      var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));
  
      if (hours < "10") { hours = "0" + hours; }
      if (minutes < "10") { minutes = "0" + minutes; }
      if (seconds < "10") { seconds = "0" + seconds; }
      elem.find('.timer-box-days').html(days);
      elem.find('.timer-box-hours').html(hours);
      elem.find('.timer-box-mins').html(minutes);
      elem.find('.timer-box-secs').html(seconds);
     
  }

  