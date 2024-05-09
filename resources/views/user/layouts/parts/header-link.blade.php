<link
href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
rel="stylesheet"
integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
crossorigin="anonymous"
/>
<!-- ------ bootstrap css link end-------------- -->
<!-- ------ font awesome link-------------- -->
@php
// $site_setting = \App\Models\SiteSetting::first();
$logo = \App\Models\Tp_option::where('option_name', 'theme_logo')->first();
@endphp
    <link rel="shortcut icon" href="{{@$logo->favicon_show}}" type="image/x-icon">
<link
rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
crossorigin="anonymous"
referrerpolicy="no-referrer"
/>
<!-- ------------ swiper ------------------ -->
<link
rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"
/>
<!-- -------------- slick --------------- -->
<link rel="stylesheet" href="{{ asset('public/frontend') }}/css/slick-theme.css">
<link rel="stylesheet" href="{{ asset('public/frontend') }}/css/slick.css">
<!----------------------------------------  slick end---------------- -->
<!-- ------ font awesome link end-------------- -->
<!-- ------------------ css link ------------------- -->
<link rel="stylesheet" href="{{ asset('public/frontend') }}/css/global.css" />
<link rel="stylesheet" href="{{ asset('public/frontend') }}/css/footer.css" />
<link rel="stylesheet" href="{{ asset('public/frontend') }}/css/navbar.css" />
<link rel="stylesheet" href="{{ asset('public/frontend') }}/css/User-Profile-page.css" />
