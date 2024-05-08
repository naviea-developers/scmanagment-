<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Techknowsity - @yield('title')</title>
    <!-- owl carousel -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
<!-- css -->
    <link rel="stylesheet" href="{{ asset('/') }}frontend/assets/css/style.css" />

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> --}}
      @yield('css')

      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" >
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>


      <link rel="stylesheet" href="{{ asset('/') }}frontend/includes/css/bootstrap.css" />
      <link rel="stylesheet" href="{{ asset('/') }}frontend/includes/css/about.css" />
      {{-- <link rel="stylesheet" href="{{ asset('/') }}frontend/includes/css/course.css" /> --}}
      <link
        rel="stylesheet"
        href="https://site-assets.fontawesome.com/releases/v6.2.1/css/all.css"
      />
      <link rel="stylesheet" href="{{ asset('/') }}frontend/includes/css/home.css" />
      <script src="{{ asset('/') }}frontend/includes/js/bootstrap.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>


      <link rel="icon" href="{{ asset('/') }}frontend/aboutassets/img/icons/Favicon.svg" type="image/gif" sizes="16x16">


<style>
@import url("https://fonts.googleapis.com/css2?family=Poppins&display=swap");
.slick-slide img {
    display: block;
    margin: 0 auto;
}

@media only screen and (min-width: 992px) {
    .navToggleBtn {
        display: none;
    }
}


@media only screen and (max-width: 500px) {
    .p-5 {
        padding: 0px !important;
    }

}
@media only screen and (max-width: 500px) {
    #startLearning .row , .container .row {
        padding: 0px !important;
    }
    .featuresBtnSection {
        margin-left: -20px !important;
    }
    .courseShowCardSection h3 {
        margin-left: 20px !important;
    }

    .courseShowCardSection .row{
        padding-left: 10px !important;
    }

    .courseSlider h3 {
        margin-left: 20px !important;
    }

    .blogSection .w-75 {
        width: 100% !important;
    }
}

.container{
    padding:30px 20px !important;
}

.navbar .container{
    padding: 0px !important;
}

@media only screen and (max-width: 768px) {
    #startLearning {
        margin-bottom:100px !important;
    }
}
</style>

  </head>
