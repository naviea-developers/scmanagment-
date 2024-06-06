@extends('Frontend.layouts.master-layout') 
@section('title','- All Universities') 
@section('head') 

{{-- <link href="https://d2xtzyi0kjzog2.cloudfront.net/static/assets/css/bootstrap.min.8fe708988952.css" rel="stylesheet"> --}}
<link href="https://d2xtzyi0kjzog2.cloudfront.net/static/assets/css/wnoty.min.af5ceb4c7a82.css" rel="stylesheet" />
<link rel="stylesheet" href="https://d2xtzyi0kjzog2.cloudfront.net/static/assets/css/fontawesome.b9d8f62f5168.css">
<link href="https://d2xtzyi0kjzog2.cloudfront.net/static/node_modules/account/css/select2.min.bc523f920a65.css" rel="stylesheet" />
<link rel="stylesheet" href="https://d2xtzyi0kjzog2.cloudfront.net/static/assets/css/animate.2422239f8973.css">
<link rel="stylesheet" href="https://d2xtzyi0kjzog2.cloudfront.net/static/assets/css/ideabox-popup.min.c0175357c0da.css">
<link rel="stylesheet" href="https://d2xtzyi0kjzog2.cloudfront.net/static/assets/css/tippy.ebd6f8ce46a6.css">

<script src="https://js.hcaptcha.com/1/api.js" async defer></script>

<style type="text/css">


   
    

    .scroll-top {
        width: auto !important;
        height: auto !important;
        position: fixed !important;
        bottom: 100px;
        right: 20px !important;
        display: none;
        padding: .5rem 1rem !important;
        font-size: 1.25rem !important;
        line-height: 1.5 !important;
        border-radius: .3rem !important;
        background: #E02200 !important;
        color: #fff !important;
        z-index: 999;
    }

   
</style>



<link rel="stylesheet" href="https://d2xtzyi0kjzog2.cloudfront.net/static/assets/assets_new_design/css/page_search.e63c4dda87f9.css" />
<link rel="stylesheet" href="https://d2xtzyi0kjzog2.cloudfront.net/static/assets/assets_new_design/css/main.08c7ae06f044.css" />
<script src="https://d2xtzyi0kjzog2.cloudfront.net/static/assets/assets_new_design/js/new/script.15d68b3bfa17.js"></script>

<style>



.has-margin-top-2 {
    margin-top: 10px !important;
}

.stretched-link::after {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    z-index: 1;
    pointer-events: auto;
    content: "";
    background-color: rgba(0, 0, 0, 0);
}

.school-pagination li a {
    font-size: 1em;
    padding-left: 0.5em;
    padding-right: 0.5em;
    justify-content: center;
    text-align: center;
    border-color: #dbdbdb !important;
    color: #2f64bf;
    min-width: 2.25em;
    -webkit-appearance: none;
    align-items: center;
    border: 1px solid transparent;
    box-shadow: none;
    display: inline-flex;
    font-size: 1rem;
    height: 2.25em;
    line-height: 1.5;
    padding-bottom: calc(0.375em - 1px);
    padding-left: calc(0.625em - 1px);
    padding-right: calc(0.625em - 1px);
    padding-top: calc(0.375em - 1px);
    position: relative;
    vertical-align: top;

}

.school-pagination li.active a {
    background-color: #2f64bf !important;
    border-color: #2f64bf;
    border-radius: 0;
    color: #fff;

}

.top_hero {
    padding-bottom: 2rem;
    padding-right: 2rem;
    padding-left: 2rem;
    background: #d7353844;
    background: -webkit-linear-gradient(#d7353870, #d7353870), url({{ $banner->image_show }});
    background: linear-gradient(#d7353870, #d7353870), url({{ $banner->image_show }});
    background-position: center;
    background-repeat: no-repeat;
    padding-top: 7rem;
}

.no-result li {
    margin-left: 40px;
}
</style>








@endsection 
@section('main_contend') 
@include('Frontend.layouts.parts.header-menu')
<br>
<br>
<br>
<br>
<br>
{{-- <body class="easing"> --}}




  


    {{-- <div class="verify-account d-none container">
        <div class="alert alert-warning alert-dismissible fade show m-2" role="alert">
            <strong style="color:#363636;font-weight:700">Verify Your Account.</strong> Please click <a
                style="color:#E10707" href="#" onclick="sendVerification()">here</a> to
            resend a verification email.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
    <div class="update-profile d-none container">
        <div class="alert alert-warning alert-dismissible fade show m-2" role="alert">
            <strong style="color:#363636;font-weight:700">Incomplete Profile. </strong> Please click <a
                style="color:#E10707" href="/account/profile">here</a> to
            update your profile and see programs which fit you.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div> --}}

    <!--main body-->
    
<header class="hero is-bold is-small top_hero">
    <div class="container">
        <div class="columns">
            <div class="column">
                <h1 class="title is-2 has-text-centered " style="color: #fff;">{{ $banner->title }}</h1>
                <div class="columns">
                    <div class="column is-three-fifths is-offset-one-fifth">
                        <div class="field has-addons">
                            <div class="control">
                                <input id="search-input" class="input" type="text"
                                    placeholder="Search by university, or city">
                            </div>
                            <div class="control">
                                <a id="applyFilter" class="button is-info">
                                    <i class="fas fa-search"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="section wrapper-search-page">
    <div class="container">
        <div class="columns">
            <div class="column is-2">
                <div class="filters-button">
                    <span class="filter-open"><img src="https://d2xtzyi0kjzog2.cloudfront.net/static/assets/assets_new_design/img/icons/filter.642602b57b41.svg"
                            alt="filters">Filters</span>
                    <span class="filter-opened"> <img src="https://d2xtzyi0kjzog2.cloudfront.net/static/assets/assets_new_design/img/icons/filter.642602b57b41.svg"
                            alt="filters">Close Filters</span>
                </div>
                <div class="wrapper-filters">

                    <div class="toggle-header" data-filtersList="2">
                        <h5 class="title is-5">Country</h5>
                        <div class="toggle-icon"></div>
                    </div>
                    <div class="toggle-content" data-filters="2">

                        <div class="toggle-content-wrapper-field country-list" style="max-height: 500px;">

                        </div>
                    </div>
                    <hr>
                </div>
                <div class="wrapper-filters">

                    <div class="toggle-header" data-filtersList="5">
                        <h5 class="title is-5">city</h5>
                        <div class="toggle-icon"></div>
                    </div>
                    <div class="toggle-content" data-filters="5">

                        <div class="toggle-content-wrapper-field cities-list" style="max-height: 500px;">
                            @foreach ($cities as $city)
                            <div class="field ">
                                <div class="control display-flex">
                                    <label location_type="city" class="checkbox " name="{{ $city->name }}" data-value="{{ $city->id }}">
                                        <input type="checkbox" class="search-checkbox city_find">
                                        {{ $city->name }}
                                    </label>
                                    <div class="toggle-content-right-column">{{ $city->university_count }} </div>

                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
            <div class="column is-10" id="schools">

                <div class="columns">

                    <div class="column">
                        <p class="result-search"><span class="count">{{ $universities->count() }}</span> Total University Found</p>
                        <div class="dropdown">
                            <div class="sorting">Sorting
                                <span class="icon is-small">
                                    <i class="fas fa-angle-down" aria-hidden="true"></i>
                                </span>
                            </div>
                            <div class="dropdown-content" style="left: 0px;">
                                <span id="sort-asc">Ascending order</span>
                                <span id="sort-desc">Descending order</span>
                            </div>
                        </div>
                    </div>




                </div>
                {{-- <div class="columns mb-0">
                    <div class="column pt-0 pb-0">
                        <p class="result-search"></p>
                        <div class="pt-0 wrapper-result-tags-and-sort">
                            <div class="tags searchingTags_wrapper">
                                <span></span>
                                <a style="display:none;" class="clear-filter">
                                    '<span class="tag filterTags" data-field="' + name + '" data-keyword="' + keyword + '">' + label + '<span class="delete-tag"></span></span>
                                </a>
                            </div>

                        </div>
                    </div>
                </div> --}}
                <ul class="list is-flex" style="flex-wrap:wrap">
                    
                    @foreach ($universities as $university)

                    <li class="school column is-3 is-3-tablet is-12-mobile">
                        <div class="card" style="height: 100%;">
                            <div class="card-content row is-flex" style="flex-direction: column;align-items: center;">
                                
                                <img src="{{ $university->image_show }}" style="margin-right:auto; margin-left:auto; width:100%; height:200px" >
                                
                                <h5 class="title has-text-centered has-margin-top-2"
                                    style="min-height:3rem;font-size: 1rem; overflow: hidden;margin-bottom: 0px;">{{ $university->name }}
                                </h5>
                                <span class="is-hidden acronymn">None</span>
                                <span class="is-hidden country">{{ @$university->country->name }}</span>
                                <span class="is-hidden city">{{ @$university->city->name }}</span>
                                <!-- <p class="school-name-desktop">ZIBS</p> -->
                                <a href="/university/2030-school/" class="stretched-link"> </a>
                            </div>
                        </div>
                    </li>
                    
                    @endforeach
                    
                </ul>

                <ul class="school-pagination is-flex">
                    <li class="active"><a class="page" href="javascript:function Z(){Z=&quot;&quot;}Z()">1</a></li>
                </ul>



            </div>
        </div>
    </div>
</div>






    <script src="https://d2xtzyi0kjzog2.cloudfront.net/static/assets/js/jquery-ui.min.e9b0b8e0a29a.js"></script>
    <script src="https://d2xtzyi0kjzog2.cloudfront.net/static/assets/js/auth.0d39501e3520.js"></script>
    <script src="https://d2xtzyi0kjzog2.cloudfront.net/static/assets/js/bootstrap.min.e1d98d47689e.js"></script>
    <script src="https://d2xtzyi0kjzog2.cloudfront.net/static/assets/js/wnoty.0d52b5b2b609.js"></script>
    <script src="https://d2xtzyi0kjzog2.cloudfront.net/static/node_modules/account/js/select2.min.ab32102d4796.js"></script>
    <script src="https://d2xtzyi0kjzog2.cloudfront.net/static/assets/js/popper.min.0554bdb19cb8.js"></script>
    <script src="https://d2xtzyi0kjzog2.cloudfront.net/static/assets/js/tippy-bundle.umd.min.75633eb4e9b8.js"></script>
    <script type="text/javascript">
        //Tag user in sentry 
        if (Cookies.get("jwt") != undefined && localStorage.student_profile) {
            Sentry.configureScope(function (scope) {
                scope.setTag("Authenticated", "true");
                scope.setUser({
                    email: JSON.parse(localStorage.student_profile).data.email,
                });
            });
        }
        var preferences;
        var student_email;
        tippy('[data-tippy-content]');
        $(document).ready(function () {

            $('.custom-select').on('change', function (e) {
                if (($("#searchType").val() == 'program')) {
                    $('[name="search_keyword"]').attr('placeholder', 'What would you like to study?');
                } else if ($("#searchType").val() == 'school') {
                    $('[name="search_keyword"]').attr('placeholder', 'Search uni name or city');
                } else {
                    $('[name="search_keyword"]').attr('placeholder', 'Which topics interest you?');
                }
            });
            $('#search_btn').on('click', function () {
                //search er ajax
                // if (($("#searchType").val() == 'program')) {
                //     location.href = location.protocol + "//" + location.host + "/search/?keyword=" + $('input[name="search_keyword"]').val();
                // } else if ($("#searchType").val() == 'school') {
                //     location.href =
                //         "/universities/?school=" +
                //         $('input[name="search_keyword"]').val();
                // } else {
                //     location.href =
                //         "https://www.china-admissions.com/?s=" +
                //         $('input[name="search_keyword"]').val();
                // }


            });
            // $('.program-page-search input[name="search_keyword"]').on("keypress", function (e) {
            //     if (e.which === 13) {
            //         //Disable textbox to prevent multiple submit
            //         $(this).attr("disabled", "disabled");
            //         if (($("#searchType").val() == 'program')) {
            //             location.href = location.protocol + "//" + location.host + "/search/?keyword=" + $('input[name="search_keyword"]').val();
            //         } else if ($("#searchType").val() == 'school') {
            //             location.href =
            //                 "/universities/?school=" +
            //                 $('input[name="search_keyword"]').val();
            //         } else {
            //             location.href =
            //                 "https://www.china-admissions.com/?s=" +
            //                 $('input[name="search_keyword"]').val();
            //         }
            //     }
            // });
           
            $(window).scroll(function () {
                if ($(this).scrollTop() > 100) {
                    $('.scroll-top').fadeIn();
                } else {
                    $('.scroll-top').fadeOut();
                }
            });

            $('.scroll-top').click(function () {
                $("html, body").animate({
                    scrollTop: 0
                }, 100);
                return false;
            });
            lazyload();

            $.getJSON("/status/", function(data) {
                if (data.code == 0 && data.data.applied_student_count > 0) {
                    $("#students_applied_today").html(`<p style="color: #4D4D4D;">${data.data.applied_student_count} students applied today</p>`);
                }
            });
        });
    </script>


<script src="https://cdn.jsdelivr.net/npm/list.js@1.5.0/dist/list.min.js"></script>
<script>
    // var options = {
    //     valueNames: ['title', "city","country", "acronymn"],
    //     page: 12,
    //     pagination: true,
    //     pagination: [{
    //         name: "school-pagination",
    //         paginationClass: "school-pagination",

    //     }],

    // };
    // var schools = new List('schools', options);



    

   
    $(document).ready(function () {
      
        // var cities = @json($cities_arr);

        // for (c in cities) {
        //     console.log(cities[c]);
            // city = ` <div class="field ">
            //                     <div class="control display-flex">
            //                         <label location_type="city" class="checkbox " name="${cities[c].name}" data-value="${cities[c].id}">
            //                             <input type="checkbox" class="search-checkbox city_find">
            //                             ${cities[c].name}
            //                         </label>
            //                         <div class="toggle-content-right-column">${cities[c].university_count}</div>

            //                     </div>
            //                 </div>`
        //     $(".cities-list").append(city);
        // }
        // function getcitylistoption(cities){
        //     for (c in cities) {
        //         console.log(cities[c]);
        //         city = ` <div class="field ">
        //                             <div class="control display-flex">
        //                                 <label location_type="city" class="checkbox" name="${cities[c].name}" data-value="${cities[c].id}">
        //                                     <input type="checkbox" class="search-checkbox">
        //                                     ${cities[c].name}
        //                                 </label>
        //                                 <div class="toggle-content-right-column">${cities[c].university_count}</div>

        //                             </div>
        //                         </div>`
        //         $(".cities-list").append(city);
        //     }
        // }
        // var countries = @json($countries_arr);

        // for (c in countries) {
        //     console.log(countries[c]);
        //     country = ` <div class="field ">
        //                         <div class="control display-flex">
        //                             <label class="checkbox" location_type="country" name="${countries[c].name}" data-value="${countries[c].id}">
        //                                 <input type="checkbox" class="search-checkbox country_find">
        //                                 ${countries[c].name}
        //                             </label>
        //                             <div class="toggle-content-right-column">${countries[c].university_count}</div>

        //                         </div>
        //                     </div>`
        //     $(".country-list").append(country);
        // }
        // $(".checkbox").click(function (e) {

        // });
        // $(".count").append(schools.size());
    });



</script>




<script type="text/javascript">

    // function isFilterAlreadySelected(name, keyword) {
    //     selector = 'span.tag.filterTags[data-field="' + name + '"][data-keyword="' + keyword + '"]';

    //     if ($(selector).length > 0) {
    //         return true;
    //     }
    //     return false;
    // }

    // function addFilterTagHtml(name, keyword, label) {
    //     return '<span class="tag filterTags" data-field="' + name + '" data-keyword="' + keyword + '">' + label + '<span class="delete-tag"></span></span>';
    // }

    // function addFilterTag(name, keyword, label) {
    //     $('a.clear-filter').prev().fadeIn().after(addFilterTagHtml(name, keyword, label));
    //     $('.clear-filter').css('display', '');
    // }


    //Handle url parameters

    // function getUrlParameter(name) {
    //     name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
    //     var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
    //     var results = regex.exec(location.search);
    //     return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
    // };

    $(document).ready(function () {
        // var searchQuery = getUrlParameter('school');
        // console.log(searchQuery);
        // if(searchQuery.length > 0 ){
        //     $("#search-input").val(searchQuery);
        //     data = schools.search(searchQuery)
        //     $(".count").html(schools.matchingItems.length);
        //     if (data.length == 0) {
        //         $(".list").html(
        //             `<div class="no-result">
        //             <p>Suggestions: </p>
        //             <br>
        //             <ul style="list-style:disc;">
        //                 <li>Please try searching again. </li>
        //                 <li>If the program you are looking for is not listed  please complete the form <a href="https://www.china-admissions.com/apply-to-a-program-not-listed/ ">here</a>, and we will add the program and create your application. </li>
        //             </ul>
        //         </div>`)
        //     }
        // }

        filters = $('label.checkbox');
        city_name = "";
        country_name = "";
        city_value = "";
        country_value = "";
        city_label = "";
        country_label = "";
        var all_data = schools;
        filters.on('change', function (e) {
            e.preventDefault()
           
            if($(this).attr('location_type') == "city"){
                city_name = $(this).attr('name');
                city_value = $(this).attr('data-value');
                city_label = $(this).text().trim();
                addFilterTag(city_name, city_value, city_label);
                filters.find('.city_find').prop('checked', false);
                $(this).find('input').prop('checked', true);
            }else  if($(this).attr('location_type') == "country"){
                country_name = $(this).attr('name');
                country_value = $(this).attr('data-value');
                country_label = $(this).text().trim();
                addFilterTag(country_name, country_value, country_label);
                filters.find('.country_find').prop('checked', false);
                $(this).find('input').prop('checked', true);
            }   

            elems = $('div.searchingTags_wrapper span.filterTags');
            elems.each(function (e) {
                $(this).remove();
            });
            // schools.filter();
           
            // console.log(schools);
            $(this).prop("selectedIndex", 0);
           
            // var search_data =all_data;
            // if(country_name != ""){
            //     search_data = search_data.filter(function (item) {
            //         if (item.values().country == country_name) {
            //             return true;
            //         } else { 
            //             return false;
            //         }  
            //     });
            // }
            // if(city_name != ""){
            //     console.log(city_name);
            //     search_data = search_data.filter(function (item) {
            //         if (item.values().city == city_name) {
            //             console.log("hi");
            //             return true;
            //         } else { 
            //             console.log(item.values().city);
            //             return false;
            //         }  
            //     });
            // }
            // schools=search_data;
            // console.log(schools);
            
            // $(".count").html(schools.matchingItems.length);
        });

        $(document).on('click', '.delete-tag', function () {
            var tagText = $(this).parent().text();
            $(this).parent().remove();

            var tagValue = $(this).parent().data("keyword");
            //uncheck the filter box as well
            $('label.checkbox[data-value="' + tagValue + '"]').find('input').prop('checked', false);
            data = schools.filter();
            $(".count").html(schools.size());
        });
        $("#search-input").keyup(function (e) {
            // data = schools.search($(this).val())
//             $(".count").html(schools.matchingItems.length);
//             if (data.length == 0) {
//                 $(".list").html(
//                     `<div class="no-result">
//     <p>Suggestions: </p>
//     <br>
//     <ul style="list-style:disc;">
//         <li>Please try searching again. </li>
//         <li>If the program you are looking for is not listed  please complete the form <a href="https://www.china-admissions.com/apply-to-a-program-not-listed/ ">here</a>, and we will add the program and create your application. </li>
//     </ul>
// </div>`)
//             }


        });
       



    });




</script>

    





{{-- </body> --}}

  <!-- Subscription start -->
  @include('Frontend.layouts.parts.news-letter')
  <!-- Subscription end -->


 


 
  @endsection 

  @section('script') 

  @endsection