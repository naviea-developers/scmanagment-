(function ($) {
    $(function () {


        if ($('.interested-item-wrap').length) {
            $('.interested-item-wrap').slick({
                dots: false,
                arrows: true,
                autoplay: false,
                autoplaySpeed: 5000,
                infinite: false,
                speed: 300,
                slidesToShow: 3,
                slidesToScroll: 1,
                responsive: [
                    {
                        breakpoint: 1025,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1,
                            swipe: true,
                        }
                },
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1,
                            swipe: true,
                        }
                },
                    {
                        breakpoint: 767,

                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            swipe: true,
                            dots: false,
                            arrows: false,
                        }
                }


            ]
            });
        }
        $(window).on('resize', function () {
            $('.interested-item-wrap').slick('resize');
        });

        if ($('.clients-review-item-wrap').length) {
            $('.clients-review-item-wrap').slick({
                dots: false,
                arrows: true,
                autoplay: false,
                autoplaySpeed: 5000,
                infinite: false,
                speed: 300,
                slidesToShow: 2,
                slidesToScroll: 1,
                responsive: [
                    {
                        breakpoint: 1025,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1,
                            swipe: true,
                        }
                },
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1,
                            swipe: true,
                        }
                },
                    {
                        breakpoint: 767,

                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            swipe: true,
                            dots: false,
                            arrows: false,
                        }
                }


            ]
            });
        }
        $(window).on('resize', function () {
            $('.clients-review-item-wrap').slick('resize');
        });

        if ($('.our-brands-item-wrap').length) {
            $('.our-brands-item-wrap').slick({
                dots: false,
                arrows: true,
                autoplay: false,
                autoplaySpeed: 5000,
                infinite: false,
                speed: 300,
                slidesToShow: 4,
                slidesToScroll: 1,
                responsive: [
                    {
                        breakpoint: 1025,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1,
                            swipe: true,
                        }
                },
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1,
                            swipe: true,
                        }
                },
                    {
                        breakpoint: 767,

                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            swipe: true,
                            dots: false,
                            arrows: false,
                        }
                }


            ]
            });
        }
        $(window).on('resize', function () {
            $('.our-brands-item-wrap').slick('resize');
        });



        $('.scroll-downs a').on('click', function(e) {
            e.preventDefault();
            $('html, body').animate({ scrollTop: $($(this).attr('href')).offset().top}, 900, 'linear');
          });
      



        $('.product-tab-trigger ul li').click(function (e) {
            e.preventDefault();
            $('.product-tab-trigger ul li').removeClass('tab-active');
            $(this).addClass('tab-active');
            $('.product-tab-item-wrap .product-tab-item').hide();
            
            var activeTab = $(this).find('a').attr('href');
            $(activeTab).fadeIn();
            return false;
        });
    

        $('#extend-price, #modal-extend-price').click(function () {
            $("span.price").toggleClass("actived");
        });

        $('.regular-license-btn').click(function () {
            $(".regular-license-hede-content").toggleClass("active");
        });
        
        $('.single-tab-tigger ul li').click(function (e) {
            e.preventDefault();
            $('.single-tab-tigger ul li').removeClass('active');
            $(this).addClass('active');
            $('.single-tab-item').hide();
            
            var activeTab = $(this).find('a').attr('href');
            $(activeTab).fadeIn();
            return false;
        });

        $('.featured-component').slice(0, 12).show();
        $('#loadmore-button').on('click', function (e) {
            e.preventDefault();
            $('.featured-component:hidden').slice(0, 3).slideDown();
            if ($('.featured-component:hidden').length === 0) {
                $('#loadmore-button').replaceWith("<a class='no-more'>No More</a>");
            }
        });
        
        $('.product-page .product-component').slice(0, 12).show();
        $('#product-loadmore-button').on('click', function (e) {
            e.preventDefault();
            $('.product-page .product-component:hidden').slice(0, 4).slideDown();
            if ($('.product-page .product-component:hidden').length === 0) {
                $('#product-loadmore-button').replaceWith("<a class='no-more'>No More</a>");
            }
        });



        $('.cart-modal-btn').click(function (e) {
            e.preventDefault()
            $("body").toggleClass("cartmodalShown");
            $(".cart-modal-wrap").fadeToggle();

            $('.close-cart-modal').click(function (e) {
                e.preventDefault()
                $("body").removeClass("cartmodalShown");
                $(".cart-modal-wrap").fadeOut();
            });
        });
        
        $('.cart-modal-wrap').click(function () {
            $("body").removeClass("cartmodalShown");
            $(".cart-modal-wrap").fadeOut();
        });
        $('.cart-modal-main').click(function (e) {
            e.stopPropagation();
        });


    }) // End ready function.




})(jQuery)
