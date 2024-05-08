
// Accrodian Tabs
(function() {
  
    $(".panel").on("show.bs.collapse hide.bs.collapse", function(e) {
      if (e.type=='show'){
        $(this).addClass('active');
      }else{
        $(this).removeClass('active');
      }
    });  
  
  }).call(this);



  // Category
    var heroCategory = new Swiper('.hero-category', {
    slidesPerView: 3,
    spaceBetween: 10,
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    breakpoints: {
        640: {
        slidesPerView: 3,
        spaceBetween: 10,
        },
        767: {
        slidesPerView: 5,
        spaceBetween: 10,
        },
        1024: {
        slidesPerView: 6,
        spaceBetween: 10,
        },
    }
    });

    // Our Featured Brand Slider
    var ourFeaturedBrand = new Swiper('.ourFeaturedBrand', {
      slidesPerView: 3,
      spaceBetween: 5,
      navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
      },
      breakpoints: {
          640: {
          slidesPerView: 3,
          spaceBetween: 10,
          },
          767: {
          slidesPerView: 5,
          spaceBetween: 10,
          },
          1024: {
          slidesPerView: 6,
          spaceBetween: 10,
          },
      }
      });



// Single Hero Slider
var singleHeroSlider = new Swiper('.single-hero-slider', {
  autoplay: {
    delay: 2500,
    disableOnInteraction: false,
  },
  loop: true,
  pagination: {
    el: '.swiper-pagination',
  },
});


  // TESTIMONIALS 
  var reviewSwiper = new Swiper('.review-swiper', {
    slidesPerView: 1,
    spaceBetween: 10,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },  
    breakpoints: {
        640: {
        slidesPerView: 1,
        spaceBetween: 10,
        },
        767: {
        slidesPerView: 1,
        spaceBetween: 10,
        },
        1024: {
        slidesPerView: 3,
        spaceBetween: 10,
        },
    }
  });


// Single brands slider
var singleBrandSlider = new Swiper('.single-feature-brand', {
  slidesPerView: 4,
  spaceBetween: 30,
  loop: true,
  autoplay: {
    delay: 2500,
    disableOnInteraction: false,
  },
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  breakpoints: {
      640: {
      slidesPerView: 4,
      spaceBetween: 10,
      },
      767: {
      slidesPerView: 4,
      spaceBetween: 10,
      },
      1024: {
      slidesPerView: 6,
      spaceBetween: 10,
      },
  }
});


// Programming Languages

var ProgrammingLanguages = new Swiper('.programming-languages', {
  slidesPerView: 4,
  spaceBetween: 10,
  loop: true,
  // autoplay: {
  //   delay: 2500,
  //   disableOnInteraction: false,
  // },
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  breakpoints: {
      640: {
      slidesPerView: 4,
      spaceBetween: 10,
      },
      767: {
      slidesPerView: 4,
      spaceBetween: 10,
      },
      1024: {
      slidesPerView: 6,
      spaceBetween: 10,
      },
  }
});



// toggle left profile sidebar
function SidebarToggle() {
  var SidebarMenu = document.getElementById("LeftSidebar");
  if (SidebarMenu.style.display === "none" || SidebarMenu.style.display === "") {
    SidebarMenu.style.display = "block";

  } else {
    SidebarMenu.style.display = "none";
  }
}



// toggle right cart sidebar
function CartSidebarToggle() {
var CartSidebarMenu = document.getElementById("CartSidebar");

if (CartSidebarMenu.style.display === "none"  || CartSidebarMenu.style.display === "") {
  CartSidebarMenu.style.display = "block";
} else {
  CartSidebarMenu.style.display = "none";
}
}


// Mobile toggle menu
function OpenMobileMenu() {
var MobileSidebarMenu = document.getElementById("LeftSidebar");
if (MobileSidebarMenu.style.display === "none" || MobileSidebarMenu.style.display === "") {
  MobileSidebarMenu.style.display = "block";
} else {
  MobileSidebarMenu.style.display = "none";
}
}

// Mobile Cart Sidebar
function MobileCartSidebarToggle() {
var MobileCartSidebarMenu = document.getElementById("CartSidebar");

if (MobileCartSidebarMenu.style.display === "none" || MobileCartSidebarMenu.style.display === "") {
  MobileCartSidebarMenu.style.display = "block";
} else {
  MobileCartSidebarMenu.style.display = "none";
}
}


// Sidebar li click to open dropdown menu
 function openChild(){
   var childdiv = document.querySelector('#childMenu');
   childdiv.classList.toggle("NewChild");
 }



//  Start new js
