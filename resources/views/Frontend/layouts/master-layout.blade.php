<!--============ its for header file call start =============-->

<!doctype html>
<html lang="en">

@php
  $results = \App\Models\Tp_option::where('option_name', 'theme_custom_css')->first();
  $custom_html = \App\Models\Tp_option::where('option_name', 'theme_custom_html')->first();
  $custom_js = \App\Models\Tp_option::where('option_name', 'theme_custom_js')->first();
  $theme_seo = \App\Models\Tp_option::where('option_name', 'theme_options_seo')->first();
  $title = \App\Models\Tp_option::where('option_name', 'theme_option_header')->first();
  $logo = \App\Models\Tp_option::where('option_name', 'theme_logo')->first();

 $customCss = json_decode($results->option_value);
 $custom_html = json_decode($custom_html->option_value);
 $custom_js = json_decode($custom_js->option_value);
 $metadata = json_decode($theme_seo->option_value);

@endphp


<head>

    
<link rel="shortcut icon" href="{{@$logo->favicon_show}}" type="image/x-icon">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<!-- /Added by HTTrack -->
<meta name="csrf-token" content="{{ csrf_token() }}"/>



@php
    $titles = '';
    $keywords = '';
@endphp
@foreach ($metadata->og_title as $k=>$item ) 
 @php
 if(count($metadata->og_title) - 1 == $k){
    $titles .= $item;
 }else{
    $titles .= $item.',';
 }
 @endphp
@endforeach
<meta property="og:title" content="{{ $titles }}" />



@foreach ($metadata->og_keywords as $k=>$item ) 
 @php
 if(count($metadata->og_keywords) - 1 == $k){
    $keywords .= $item;
 }else{
    $keywords .= $item.',';
 }
 @endphp
@endforeach
<meta property="keywords" content="{{ $keywords }}" />




<meta property="og:site_name" content="{{ $title->company_name }}" />
<meta property="og:description" content="{{ $metadata->og_description }}" />
<meta property="og:type" content="website" />
<meta property="og:url" content="{{ url()->current() }}" />
<meta property="og:image" content="{{ asset('public/upload/seo/'.$metadata->og_image) }}" />
<meta property="og:image:width" content="600" />
<meta property="og:image:height" content="315" />



  @if($custom_html)
    {{-- <html> --}}
    {!! $custom_html->custom_headre_html !!}
    {{-- </html> --}}
  @endif


<title> {{ @$title->company_name }}  @yield('title')</title>



@if($customCss)
<style>
    {!! $customCss->custom_headre_css !!}
</style>
@endif

@if($custom_js)
<script>
    {!! $custom_js->custom_head_js !!}
</script>
@endif




@php
  $results = \App\Models\Tp_option::where('option_name', 'theme_color')->first();
 $dataObj = json_decode($results->option_value);
@endphp

@if($dataObj)
<style>
    :root {
         --header_color: {{ $dataObj->header_color }};
        --header_text_color: {{ $dataObj->header_text_color }};
        --button1_color: {{ $dataObj->button1_color }};
        --button1_hover_color: {{ $dataObj->button1_hover_color }};
        --button2_color: {{ $dataObj->button2_color }};
        --button2_hover_color: {{ $dataObj->button2_hover_color }};
        --button2_text_color: {{ $dataObj->button2_text_color }};
        --button2_border_color: {{ $dataObj->button2_border_color }};
        --package1_color: {{ $dataObj->package1_color }};
        --package2_color: {{ $dataObj->package2_color }};
        --footer_news_color: {{ $dataObj->footer_news_color }};
        --text_color: {{ $dataObj->text_color }};
        --product_text_color: {{ $dataObj->product_text_color }};
      
        --menu_color: {{ $dataObj->menu_color }};
        --category_color: {{ $dataObj->category_color }};
        --footer_color: {{ $dataObj->footer_color }};
        --footer_text_color: {{ $dataObj->footer_text_color }};
        --currency_background_color: {{ $dataObj->currency_background_color }};
        --currency_frontend_color: {{ $dataObj->currency_frontend_color }};
    }
</style>
@endif
@include('Frontend.layouts.parts.header-link')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@yield('head')
<style>
    .typeahead .dropdown-item {
        padding: .25rem 0;
        font-size: 14px;
        font-weight: 400;
        line-height: 26px;
        display: block;
        white-space: break-spaces;
    }

    @media screen and (max-width: 575px) {
        .signup-li{
            display: none;
        }
        .languageLi{
            /* display: none; */
        }
        /* .notificationLi{
            display: none;
        } */
        .languageLi a{
            font-size: 8px;
        }
    }

    .headerMenu li a{
        font-family: 'Inter', sans-serif;
    }
  /* multi language css start */
    .skiptranslate iframe{
        display:none;
    }
    .goog-te-gadget{
        position: relative;
        width: 100px;
        overflow: hidden;
        padding: 10px;
    }
    .goog-te-combo{
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        padding: 5px;
    }

     /* multi language css End */

     /* VND css start */
    .currency-menu{
        align-items: center;
        display: flex;
        margin-right: 20px;
        position: relative;
    }
    .currency-menu a{
        color: var(--button2_text_color);
        background: var(--currency_frontend_color)!important;
        padding: 5px 10px;
    }
    .currency-dropdown{
        background: var(--currency_background_color);
        /* background: #fff; */

        border: 1px solid #ececec;
        border-radius: 0 0 4px 4px;
        min-width: 120px;
        opacity: 0;
        padding: 10px 15px;
        position: absolute;
        right: 0;
        top: 100%;
        transform: translateY(20px);
        transition: all 0.25s cubic-bezier(0.645, 0.045, 0.355, 1);
        visibility: hidden;
        z-index: 2;
    }
    .currency-dropdown li{
        text-decoration: none;
        list-style: none;
        padding: 5px 10px;
    }
    .currency-menu:hover a{
        color: #000;;
    }
    .currency-menu:hover .currency-dropdown{
        opacity: 1;
        top: 25px;
        transform: translateY(0);
        visibility: visible;
    }
    #goog-gt-tt{
        display: none!important;
    }

      /* VND css End */
</style>
</head>



<body>

    @if($custom_html)
    {{-- <html> --}}
    {!! $custom_html->custom_body_html !!}
    {{-- </html> --}}
    @endif
    <!-- Google Tag Manager (noscript) -->
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N5DHBNS" height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>
    <!-- End Google Tag Manager (noscript) -->

    <!-- <div class="se-pre-con"></div> -->
    <input type="hidden" id="base_url" value="index.html">
    <input type="hidden" id="enterprise_id" value="1">
    <input type="hidden" id="enterprise_shortname" value="admin">
    <input type="hidden" id="user_type" value="">
    <input type="hidden" id="user_id" value="">
    <input type="hidden" name="CSRF_TOKEN" id="CSRF_TOKEN" value="23b826ad1bc7f991149ab321ac679e99">
    <input type="hidden" id="api_key" value="">
    <input type="hidden" id="cluster" value="">
    <input type="hidden" id="user_ban_login_message" value="">
    <input type="hidden" id="onlynumber_allow" value="@!#$%^&amp;*()_+[]{}?:;|\/~`-=abcdefghijklmnopqrstuvwxyz&gt;&lt;">
    <input type="hidden" id="security_character" value="@!#$%^&amp;*()_+[]{}?;|&#039;`/&gt;&lt;">
    <input type="hidden" id="coursespecial_character" value="@$^*_[]{}`&gt;&lt;">
    <input type="hidden" id="mail_specialcharacter_remove" value="!#$%^&amp;*()_+[]{}?:;|&#039;`/&gt;&lt;">
    <input type="hidden" id="examid" value="">
    <input type="hidden" id="popup" value="">
    <input type="hidden" id="segment1" value="home">
    <input type="hidden" id="segment2" value="">
    <input type="hidden" id="segment3" value="">
    <input type="hidden" id="segment4" value="">
    <input type="hidden" id="segment5" value="">
        <!--Start Back to top button -->
    <button type="button" class="btn btn-outline-dark-cerulean btn-top" id="btn-back-to-top">
        <i class="fas fa-arrow-up"></i>
    </button>
    <!--End Back to top button -->

@include('Frontend.layouts.parts.header')


 @yield('main_contend')

@include('Frontend.layouts.parts.footer')

<!-- Messenger Chat Plugin Code -->
<!-- <div id="fb-root"></div> -->

<!-- Your Chat Plugin code -->
<!-- <div id="fb-customer-chat" class="fb-customerchat">
</div> -->

<!-- Messenger Chat Plugin Code -->
<div id="fb-root"></div>

<style >
    /* body{
    background-color: #1B1464;
    font-family: "Nunito Sans";
    } */
    .bg-custom{
    background-color:#130f40;
    }
    .button-fixed{
    bottom: 0;
    position: fixed;
    right: 0;
    border-radius: 4px;
    }
    .fas{
    cursor: pointer;
    font-size: 24px;
    }
    p{
    font-size: 14px;
    }
    @media screen and (max-width: 600px) {
        .navbar{
            padding: 0 5px !important;
        }
        .currency-menu{
            margin: 0;
        }
        .dropdown-user .nav-link{
            margin: 0 !important;
        }
        .currency-menu:hover .currency-dropdown {
            top: 31px;
        }
        .currency-menu a {
            color: var(--button2_text_color);
            background: #fff;
            padding: 3px 10px!important;
        }
        #google_translate_element{
            margin: 0!important;
        }
        .goog-te-gadget {
            position: relative;
            width: 87px;
            overflow: hidden;
            padding: 8px;
        }
    }
</style>

<!-- Your Chat Plugin code -->
<div id="fb-customer-chat" class="fb-customerchat">
</div>

@include('Frontend.layouts.parts.scripts')
@yield('script')



<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@if (Session::has('success'))
    <script>
        toastr.success("{{ Session::get('success') }}");
    </script>
    {{ Session::forget('success') }}
@endif
@if (Session::has('error'))
    <script>
        toastr.error("{{ Session::get('error') }}");
    </script>
    {{ Session::forget('error') }}
@endif


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>


$(document).ready(function() {
    $(".delete-button").click(function() {
        $("#delete-modal").show();
        $("#car_id").val($(this).attr('CarId'))

    });
    $("#confirm-no").click(function() {
        $("#delete-modal").hide();
    });
    $("#confirm-yes").click(function() {
        $("#delete-modal").hide();
    });
});



$('.addcart').on('click',function(){
    var id=$(this).attr('CarId');

    Swal.fire({
  title: "Add To Cart Successfully!",
  icon: "success",
  confirmButtonText: "Ok",

}).then((result) => {
    if (result.isConfirmed) {
        window.location ="{{ url('/add-to-cart') }}/"+id
    }
    });
});

</script>


<script>
    $(document).ready(function() {
        $(".delete-button").click(function() {
            $("#delete-modal").show();
            $("#car_id").val($(this).attr('CarId'))

        });
        $("#confirm-no").click(function() {
            $("#delete-modal").hide();
        });
        $("#confirm-yes").click(function() {
            $("#delete-modal").hide();
        });
    });



    $('.addebookcart').on('click',function(){
        var id=$(this).attr('CarId');

        Swal.fire({
      title: "Add To Cart Successfully!",
      icon: "success",
      confirmButtonText: "Ok",

    }).then((result) => {
        if (result.isConfirmed) {
            window.location ="{{ url('/add-to-ebook-cart') }}/"+id
        }
        });
    });

    </script>




{{-- //card remove start --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.3.4/axios.min.js"></script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/js/flatpickr.js"></script>
<script src="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/js/jquery.serializejson.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/tippy.js@6.3.7/dist/tippy.umd.js"></script>
<script src="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/plugins/select2/dist/js/select2.min.js"></script>
<script src="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/js/dropzone.js"></script>
@yield('cus_sc')
<script>

$(document).ready(function() {
    $(".delete-button").click(function() {
        $("#delete-modal").show();
        $("#car_id").val($(this).attr('CarId'))

    });
    $("#confirm-no").click(function() {
        $("#delete-modal").hide();
    });
    $("#confirm-yes").click(function() {
        $("#delete-modal").hide();
    });
});



$('.cartremove').on('click',function(){
    var id=$(this).attr('CarId');
    Swal.fire({
        title: "Do you Want to delete ?",
        icon: "error",
        showCancelButton: true,
        confirmButtonText: "Yes !",
        cancelButtonText: "No !",
        reverseButtons: true
        }).then((result) => {
    if (result.isConfirmed) {
        window.location ="{{ url('/remove-from-cart') }}/"+id
    }
    });
});

</script>

{{-- //card remove end --}}


{{-- //Course Save Start --}}
<script>
$('.add-save').on('click',function(){
    let c_id = $(this).attr('c_id');
    let arg = $(this);
    $.ajax({

        type:'Get',

        url:"{{ url('add-to-save') }}/"+c_id,

        success:function(data){   //console.log(data);
            // console.log(data);
            if(data == "ok"){
                $(arg).css('color','#00a662');
                Swal.fire({
                    // position: 'top-end',
                    icon: 'success',
                    title: 'Course Added To Wishlist',
                    showConfirmButton: false,
                    timer: 1500
                });
            }else if(data == "del"){
                $(arg).css('color','#969696');
                 Swal.fire({
                    // position: 'top-end',
                    icon: 'success',
                    title: 'Course Remove From Wishlist',
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        }

     });
});
</script>

{{-- @php
  $results = \App\Models\Tp_option::where('option_name', 'theme_custom_js')->first();
 $customJs = json_decode($results->option_value);
@endphp --}}

{{-- @if($customJs)
<script>
    {!! $customJs->custom_js !!}
</script>
@endif --}}

{{-- Multilanguage start  --}}
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: "en"
        }, "google_translate_element")
    }
    @if(session()->has('message'))
    toastr.success('{{ session()->get("message") }}');
    @endif
</script>
{{-- Multilanguage end  --}}

@if($custom_html)
{!! $custom_html->custom_footer_html !!}
@endif

@if($custom_js)
<script>
    {!! $custom_js->custom_body_js !!}
</script>
@endif

</body>




@if($custom_js)
<script>
    {!! $custom_js->custom_footer_js !!}
</script>
@endif
<!-- Mirrored from lead.academy/home by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 17 Nov 2023 01:45:08 GMT -->
</html>
