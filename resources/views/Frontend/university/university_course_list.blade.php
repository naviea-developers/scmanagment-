@extends('Frontend.layouts.master-layout')
@section('title','- program list')
@section('head')
<link href="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/css/china_admission.css" rel="stylesheet">
{{-- <link rel="stylesheet" href="https://d2xtzyi0kjzog2.cloudfront.net/static/assets/assets_new_design/css/main.08c7ae06f044.css" /> --}}
    <style type="text/css">
        /* body {
            overflow-x: hidden !important;
            max-width: 100vw;
        } */

        .social a {
            display: inline-block;
            width: 27px;
            height: 27px;
            border-radius: 50%;
            margin: 5px 5px 0 0;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: initial;
            flex-direction: row;
        }

        .navbar-dark .navbar-nav .nav-link {
            color: #fff;
        }

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

        #secondary-nav {
            font-family: 'Lato', sans-serif !important;
        }

        #secondary-nav .navbar-nav>.nav-item>a {
            border-top: 3px solid transparent;
            display: inline-block;

        }

        #secondary-nav .navbar-nav>.nav-item {
            display: inline-block;
            padding-right: 35px;
        }


        #secondary-nav .navbar-nav>.nav-item>a:hover {
            color: #e10707 !important;
            border-color: #e10707 !important;
        }


        #secondary-nav {
            padding-top: 1px;
            border: 1px solid #e5e5e5;
        }

        #secondary-nav li a:hover {
            text-decoration: underline !important;
        }

        #secondary-nav li>.sub-menu .nav-item:hover {
            background: #f8f8f8;
            color: #333;
        }

        #secondary-nav>li a:hover {
            color: #e10707;
            text-decoration: underline !important;
        }

        .success {
            display: none;
            color: #28a745;
            font-weight: 400;
            text-align: center;
        }

        .top-nav a {
            color: #4a4a4a !important;
        }

        #secondary-nav .nav-item {
            font-family: Lato, sans-serif;
            font-weight: 400;
            font-size: 16px;
            display: inline-block;
        }

        .nav-item .nav-ca:hover {
            color: #e10707 !important;
            background: #fff;
            font-weight: 600;
            border-radius: 5px;
            -webkit-transition: all 0.2s;
            -moz-transition: all 0.2s;
            transition: all 0.2s;
        }

        #secondary-nav .sub-menu a {
            border-bottom: 1px solid #dcdadb;
            padding: 7px 20px;
            color: #333;
            font-family: Lato;
            font-weight: 400;
            font-size: 14px;
            line-height: 1.25;
            height: auto;
        }

        @media screen and (max-width: 800px) {
            .menu-content {
                background-color: #fff !important;
            }

            .nav-ca,
            .nav-link,
            .nav-link span,
            .nav-link i {
                color: #4a4a4a !important;
            }
        }

        @media (max-width: 800px) {
            .navbar .container {
                max-width: 100%;
            }
        }

        .custom-select {

            background: #f3f3f3 url("/static/assets/img/dropdownicon.svg") no-repeat right .75rem center;
            background-image: none\9;
            background-size: 8px 10px;
            border: 1px solid rgba(0, 0, 0, .15);

        }


        /* remove flicker on slider initial load */
        sp-no-js {
            visibility: hidden;
        }

        @media (max-width: 767px) {
            .siq_bR {
                bottom: 120px !important;
                right: 20px !important;
            }

            .scroll-top {
                bottom: 200px;
            }
        }

        .zsiq_custommain,
        .zsiq_floatmain {
            z-index: 999 !important;
        }

        #quiz-modal {
            z-index: 99999;
        }

        .i-review-input-checkbox+label,
        .i-review-input-radio+label {
            font-size: 12px;
        }

        .next-step {
            -webkit-font-smoothing: antialiased;
            letter-spacing: 0.04em;
            display: inline-block;
            position: relative;
            height: 36px;
            padding: 0 16px;
            border: none;
            border-radius: 2px;
            outline: none;
            font-size: 14px;
            font-weight: 600;
            line-height: 36px;
            text-align: center;
            text-decoration: none;
            text-transform: uppercase;
            overflow: hidden;
            color: #ffffff;
            background: #d71f27;
        }


        .delete {
            position: absolute;
            right: 0;
            top: -15px;
            padding: 10px;
        }

        .delete .close:hover {
            color: #d71f27;
        }

        .cart-itemList .item .mainContentArea .spec {
            color: #212529
        }

        .program .item .mainContentArea .spec {
            color: #212529
        }

        .itemPool {
            text-align: center;
            padding-bottom: 100px;
        }

        .item {
            position: relative;
            background-color: #ffffff;
            margin: 0 auto 20px;
            border-radius: 5px;
            padding: 2% 3%;
            cursor: pointer;
            text-align: left;
            overflow: hidden;
            min-height: 95px;
        }

        .item a {
            color: #212529
        }

        .item .uniLogo {
            margin: 10px 15px 10px 0;
        }


        .item .mainContentArea .title {
            font-size: 1.5rem;
            font-weight: 700;
            padding-top: 8px;
            line-height: 1.5rem;
        }

        .item .mainContentArea .spec {
            font-size: .8rem;
            margin-bottom: 10px;
            margin-top: 5px;
        }

        .item .mainContentArea .spec span {
            color: #212529
        }

        .item .mainContentArea .details {
            display: block;
        }

        .item .mainContentArea .details .detail {
            display: inline-block;
            vertical-align: top;
            margin: 5px 20px 0 0;
        }

        .item .mainContentArea .details .detail .name {
            color: #212529;
            font-size: .6rem;
        }

        .item .mainContentArea .details .detail .number {
            font-size: 1.3rem;
            font-weight: 700;
            display: inline-block;
            text-transform: uppercase;
        }

        .item .mainContentArea .details .detail .unit {
            font-size: .5rem;
            display: inline-block;
        }

        .item .mainContentArea .details .detail .year {
            font-size: .8rem;
            font-weight: 700;
            display: inline-block;
        }

        .item .actionArea {
            background-color: #fafafa;
            width: 200px;
            height: 100%;
            position: absolute;
            right: 0;
            top: 0;
            text-align: center;
        }

        .item .actionArea .deadline {
            color: #212529;
            font-size: .8rem;
            margin: 15px auto 5px;
        }

        .item .actionArea .deadline .date {
            font-size: 1.5rem;
            font-weight: 700;
        }

        .item .actionArea .button {
            display: inline-block;
        }

        #cart-modal {
            z-index: 99999;
        }
    </style>
    <!-- Zoho chat widget style overide -->
    <style>
        @media (max-width: 767px) {
            .siq_bR {
                bottom: 120px !important;
                right: 20px !important;
            }

            .scroll-top {
                bottom: 200px;
            }
        }

        .zsiq_custommain,
        .zsiq_floatmain {
            z-index: 999 !important;
        }
    </style>
   
    {{-- <link rel="apple-touch-icon" type="image/png" sizes="256x256" href="https://d2xtzyi0kjzog2.cloudfront.net/static/assets/icon/ca-icon@0,5x.a64d9db89f04.png"> --}}
    {{-- <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet"> --}}

<style>
  #header {
    height: 56px;
    width: 100%;
    display: flex;
    background-color: #d71f27;
    padding-right: 1.5em;
  }

  #header nav {
    background-color: #d71f27;
    height: 56px;
  }

  #header img {
    height: 56px;
  }

  #header .right-nav {
    justify-content: flex-end;
    display: flex;
    align-items: center;
    width: auto;
    flex-shrink: 0;
  }

  ul.dropdown {
    display: none;
    position: absolute;
    top: 6%;
    right: 0;
    margin-top: .5em;
    background: #ffffff;
    min-width: 12em;
    padding: 0;
    border-radius: 0 0 .2em .2em;
  }

  ul.dropdown li {
    list-style-type: none;
  }

  ul.dropdown li a {
    text-decoration: none;
    padding: .5em 1em;
    display: block;
    color: #484848
  }

  ul.toggle {
    top: 80%;
  }

  .mr-2,
  .mx-2 {
    margin-right: .5rem !important
  }

  .is-hidden-mobile .right-nav .mdc-button {
    color: white;
    flex-shrink: 0;
  }


  #sort_by .sort_option_list,
  #sort_by .sort_option_sublist {
    list-style: none;
    margin: 0;
    padding: 0;
  }

  #sort_by {
    border-radius: 4px;
    border: 1px solid #6c757d;
    position: relative;
    background: #fff;
    margin: 10px 0;
  }


  #sort_by .sort_label {
    background-color: #fff;
    cursor: default
  }

  #sort_by .sort_option_list {
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-flex-wrap: wrap;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    font-size: 0;
  }


  #sort_by .sort_category {
    border-right: 1px solid;
    border-bottom: 1px solid;
    border-color: #6c757d;
    -webkit-box-flex: 1;
    -webkit-flex-grow: 1;
    -ms-flex-positive: 1;
    flex-grow: 1;
    margin-bottom: -1px;
    display: inline-block;
    font-size: 12px;
    font-weight: normal;
    position: relative
  }

  #sort_by .sort_category:last-child {
    border-right: 0 none !important;
    border-left: 0 none !important
  }

  #sort_by .sort_option,
  #sort_by .deal-container {
    background: 0;
    border-radius: 3px;
    color: #4a4a4a;
    display: block;
    font-size: 14px;
    font-weight: normal;
    line-height: 27px;
    outline: 0;
    padding: 0 .7em;
    text-align: center;
    text-decoration: none;
    white-space: nowrap
  }

  #sort_by .sort_option:hover {
    background-color: #fafcff
  }

  #sort_by .sort_option>i.b-sprite,
  #sort_by .sort_option>.bui__down_orange {
    display: inline-block;
    margin: 0;
    position: static;
    vertical-align: middle
  }

  #sort_by .sort_category.selected {
    background: #4a90e2
  }

  #sort_by .sort_category.selected .sort_option,
  #sort_by .sort_category.selected .deal-container {
    color: #fff
  }

  #sort_by .sort_category.selected .sort_option:hover {
    background-color: #4a90e2
  }

  #sort_by .sort_option_sublist {
    background-color: #fff;
    border-radius: .3em;
    border: 1px solid #c2c2c2;
    padding: .5em 0;
    position: absolute;
    top: 22px;
    width: 100%;
    z-index: 1000;
    text-align: center
  }

  #sort_by .sort_option_sublist_title {
    color: #333;
    display: block;
    font-size: 13px;
    font-weight: bold;
    margin: 5px 0 3px 0;
    padding: 0 0 0 5px;
    white-space: nowrap
  }

  #sort_by .sort_suboption {
    color: #6c757d;
    display: block;
    font-size: 11px;
    font-weight: normal;
    outline: 0;
    padding: .2em .5em .4em;
    text-align: center;
    text-decoration: none;
    white-space: nowrap
  }


  #sort_by .sort_suboption:hover {
    background-color: #4a90e2;
    color: #fff;
  }

  #sort_by .sort_option_sublist .selected .sort_suboption {
    background-color: #4a90e2;
    color: #fff;
  }

  #sort_by .sort_more_options {
    border-top: 1px solid #6c757d;
    -webkit-box-flex: 0;
    -webkit-flex-grow: 0;
    -ms-flex-positive: 0;
    flex-grow: 0;
    padding: 0;
    position: relative;
    text-align: center;
    width: 30px
  }

  #sort_by .sort_more_options__button {
    background: transparent;
    border: 0;
    cursor: pointer;
    margin: 0;
    padding: 0;
    width: 100%
  }

  #sort_by .sort_more_options__dropdown {
    background: #fff;
    border-radius: 0 0 3px 3px;
    border: 1px solid #6c757d;
    display: none;
    padding: 0;
    position: absolute;
    right: -1px;
    top: 100%;
    z-index: 2
  }

  #sort_by .sort_more_options__dropdown:after {
    background: #fff;
    border-right: 1px solid #6c757d;
    border-bottom: 1px solid #6c757d;
    content: '';
    height: 2px;
    position: absolute;
    right: -1px;
    top: -3px;
    width: 2px
  }

  #sort_by .sort_more_options__button:hover~.sort_more_options__dropdown:after {
    background: #fafcff
  }

  #sort_by .sort_more_options__dropdown.is-visible,
  #sort_by .sort_more_options__dropdown.is-visible {
    display: block
  }

  #sort_by .sort_more_options__dropdown .sort_category {
    border: 0;
    height: 28px;
    width: 100%
  }

  #sort_by .sort_more_options__dropdown .sort_option {
    text-align: right
  }

  #sort_by .sort_more_options__dropdown .sort_option_sublist {
    left: auto;
    line-height: 1.2;
    -webkit-transform: none;
    -ms-transform: none;
    transform: none;
    right: 4px
  }

  #sort_by .sort_more_options__dropdown .sort_suboption {
    text-align: right
  }

  #sort_by .sort_option:focus,
  #sort_by .sort_suboption:focus {
    outline: 2px solid #89ceff;
    position: relative;
    z-index: 1
  }

  #sort_by .review_score .sort_option_sublist_title,
  #sort_by .sort_score .sort_option_sublist_title {
    color: #333;
    font-size: 12px;
    font-weight: normal;
    margin: 0;
    padding: .2em .5em .4em
  }

  .sort_category.sort-score {
    border-radius: 4px 0px 0px 4px;
  }

  .with_dd.sort_class.sort_category {
    border-radius: 0px 4px 4px 0px;
  }

  .accending-sort {
    transform: rotate(180deg);
  }

  .discipline-container {
    display: grid;
    grid-gap: 10px;
    grid-template-columns: repeat(auto-fill, minmax(170px, 1fr) );
  }

  .discipline {
    padding: 1em;
    margin: 5px;
    text-align: center;
    box-sizing: border-box;
    overflow: hidden;
    box-shadow: rgb(99 99 99 / 20%) 0px 2px 8px;
    height: 200px !important;
  }
  .discipline img{
    width: 100px;
    height: 100px;
    border-radius: 50%;
    margin-bottom: 10px;
  }
  .search-page-header{
    border-bottom: solid 1px #c2c2c2;
    border-top: solid 1px #c2c2c2;
}
.slick-next:before, .slick-prev:before{
  color: #6c757d!important;
  font-size: 25px!important;
}
.slick-arrow{
  margin-top: -10px!important;
}
.slick-prev{
  display: none!important;
}
.slick-arrow.slick-next{
  right: 0px;
}
@media screen and (max-width: 768px) {
 .why-ca-card{
   min-width: 240px!important
 }
}
</style>

@endsection
@section('main_contend')
<br>
<br>
<section class="section wrapper-search-page search-results">
    <div class="d-lg-none mobile-search p-4">
      <div class="input-group flex-fill search-bar" style="min-width: 300px;">
        <input class="form-control py-2 border-right-0 border " id="mobile-search" name="search_keyword" placeholder="Search by university, program, or city" aria-label="Search">
        <div class="input-group-append">
            <div class="input-group-text mobile-search-btn" style="background:#67BBF4;border: none;"><a href="#" role="button"><i class="fa fa-search" style="color: #fff!important;"></i></a></div>
        </div>
    </div>
    </div>
    <div class="container ajax-course-show">
  
      <div class="columns">
        <div class="column is-3">
          <!--  <button id="showPopupButton" onclick="showQuiz()" class="ca-button d-none" style="width: 160px;">
            Eligibility Quiz
          </button> -->
  
          <div class="wrapper-filters" style="display: block;">
            <div class="toggle-header ">
              {{-- <h5 class="title is-5">Eligibility</h5> --}}
              <h4 class="title is-5"><b>All Programs</b></h4>
            </div> 
            {{-- <div class="toggle-content ">
              <div class="field">
                <div class="control display-flex" style="font-size:14px;">
                  <select name="" id="" class="has-no-auth eligibility p-2 w-100">
                    <option value="not-set">Not Set</option>
                    <option value="take-quiz">Take Eligibility Quiz</option>
                  </select>
                  <select name="" id="" class="has-auth eligibility d-none p-2 w-100">
                    <option value="not-set">Not Set</option>
                    <option value="search-eligible">Show Only Eligible Programs</option>
                    <option value="go-to-profile">Edit Eligibility Criteria</option>
                  </select>
                </div>
              </div>
            </div> --}}
            <hr style="margin: 0.5rem;">
            <div class="toggle-header" data-filterslist="1">
              <h5 class="title is-5">degree</h5>
              <div class="toggle-icon"></div>
            </div>
            <div class="toggle-content" data-filters="1">
              
              @foreach ($degrees as $degree)
                <div class="field">
                    <div class="control display-flex">
                      <label class="checkbox" data-value="{{ @$degree->name }}">
                        <input type="checkbox" name="degree" value="{{ @$degree->id }}" class="search-checkbox">
                        {{ @$degree->name }}
                      </label>
                      <div class="toggle-content-right-column">{{ @$degree->courses->count() }}</div>
                    </div>
                  </div>
                @endforeach             
            </div>
            <hr style="margin: 0.5rem;">
            <div class="toggle-header" data-filterslist="6">
              <h5 class="title is-5">language</h5>
              <div class="toggle-icon" style="transform: rotate(135deg);"></div>
            </div>
            <div class="toggle-content" data-filters="6" style="display: none;">
              @foreach ($languages as $language)
                <div class="field">
                  <div class="control display-flex">
                    <label class="checkbox"  >
                      <input type="checkbox" name="language" value="{{ $language->id }}" class="search-checkbox">
                      {{ $language->name }}
                    </label>
                    <div class="toggle-content-right-column">{{ @$language->courses->count() }}</div>
                  </div>
                </div>
              @endforeach             
            </div>            
            <hr style="margin: 0.5rem;">

            <div class="toggle-header" data-filterslist="0">
              <h5 class="title is-5">start date</h5>
              <div class="toggle-icon" style="transform: rotate(135deg);"></div>
            </div>
            <div class="toggle-content" data-filters="0" style="display: none;">
              @foreach ($sections as $section)
                <div class="field">
                  <div class="control display-flex">
                    <label class="checkbox"  data-value="{{ @$section->name }}">
                      <input type="checkbox" name="section" value="{{ @$section->id }}" class="search-checkbox">
                      {{ @$section->name }}
                    </label>
                    <div class="toggle-content-right-column">{{ @$section->courses->count() }}</div>
                  </div>
                </div>
                @endforeach
            </div>

            <hr style="margin: 0.5rem;">
            <div class="toggle-header" data-filterslist="2">
              <h5 class="title is-5">subject area</h5>
              <div class="toggle-icon" style="transform: rotate(135deg);"></div>
            </div>
            <div class="toggle-content" data-filters="2" style="display: none;">
              <div class="toggle-content-wrapper-field" id="subjects">
                @foreach ($departments as $department)
                  <div class="field subject">
                    <div class="control display-flex">
                      <label class="checkbox"  data-value="{{ @$department->name }}">
                        <input type="checkbox" name="subject" value="{{ @$department->id }}" class="search-checkbox">
                        {{ @$department->name }}
                      </label>
                      <div class="toggle-content-right-column">{{ @$department->courses->count() }}</div>
                    </div>
                  </div>
                @endforeach           
              </div>
            </div>
            <hr style="margin: 0.5rem;">
            {{-- <div class="toggle-header" data-filterslist="4">
              <h5 class="title is-5">Yearly tuition</h5>
              <div class="toggle-icon" style="transform: rotate(135deg);"></div>
            </div>
            <div class="toggle-content" data-filters="4" style="display: none;">
              <div class="toggle-content-wrapper-field">
              
                <div class="field ">
                  <div class="control display-flex">
                    <label class="checkbox" name="fee" data-value="0-0">
                      <input type="checkbox" class="search-checkbox">
                      Free Tuition                      
                    </label>
                    <div class="toggle-content-right-column">3</div>
                  </div>
                </div>
                
                <div class="field ">
                  <div class="control display-flex">
                    <label class="checkbox" name="fee" data-value="0-50000">
                      <input type="checkbox" class="search-checkbox">
                      0 <span style="margin: 0px 4px 0px 4px;"> - </span> <span class="money">760,873 BDT</span>
                    </label>
                    <div class="toggle-content-right-column">512</div>
                  </div>
                </div>               
              </div>
            </div>
            <hr style="margin: 0.5rem;"> --}}
            <div class="toggle-header" data-filterslist="18">
              <h5 class="title is-5">University</h5>
              <div class="toggle-icon" style="transform: rotate(135deg);"></div>
            </div>
            <div class="toggle-content" data-filters="18" style="display: none;">
              <div class="toggle-content-wrapper-field">  
                @foreach ($univerties as $university)
                <div class="field ">
                    <div class="control display-flex">
                      <label class="checkbox" data-value="{{ @$university->name }}">
                        <input type="checkbox"  name="university" value="{{ $university->id }}" class="search-checkbox">
                        {{ @$university->name }}
                      </label>
                      <div class="toggle-content-right-column">{{ @$university->courses->count() }}</div>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
            <hr style="margin: 0.5rem;">
            <div class="toggle-header" data-filterslist="5">
              <h5 class="title is-5">Continents</h5>
              <div class="toggle-icon" style="transform: rotate(135deg);"></div>
            </div>
            <div class="toggle-content" data-filters="5" style="display: none;">
              <div class="toggle-content-wrapper-field">  
                @foreach ($continents as $continent)
                <div class="field ">
                    <div class="control display-flex">
                      <label class="checkbox" data-value="{{ @$continent->name }}">
                        <input type="checkbox"  name="continent" value="{{ $continent->id }}" class="search-checkbox">
                        {{ @$continent->name }}
                      </label>
                      <div class="toggle-content-right-column">
                        @php
                          $continent_universities=[];
                          if ($continent->universities->count() > 0) {
                            $continent_universities=@$continent->universities->pluck('id');
                          }
                          $continent_courses=\App\Models\Course::whereIn('university_id',$continent_universities);
                        @endphp
                        {{ @$continent_courses->count() }}
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
            <hr style="margin: 0.5rem;">
            <div class="toggle-header" data-filterslist="11">
                <h5 class="title is-5"> Country</h5>
                <div class="toggle-icon" style="transform: rotate(135deg);"></div>
            </div>
              <div class="toggle-content" data-filters="11" style="display: none;">
                <div class="toggle-content-wrapper-field">  
                  @foreach ($countries as $country)
                  <div class="field ">
                      <div class="control display-flex">
                        <label class="checkbox" data-value="{{ @$country->name }}">
                          <input type="checkbox" name="country" value="{{ @$country->id }}" class="search-checkbox">
                          {{ @$country->name }}
                        </label>
                        <div class="toggle-content-right-column">
                          @php
                            $country_universities=[];
                            if ($country->universities->count() > 0) {
                              $country_universities=@$country->universities->pluck('id');
                            }
                            $country_courses=\App\Models\Course::whereIn('university_id',$country_universities);
                          @endphp
                           {{ @$country_courses->count() }}
                        </div>
                      </div>
                    </div>
                  @endforeach                           
                </div>
              </div>
              <hr style="margin: 0.5rem;">
                <div class="toggle-header" data-filterslist="12">
                    <h5 class="title is-5"> State</h5>
                    <div class="toggle-icon" style="transform: rotate(135deg);"></div>
                </div>
                <div class="toggle-content" data-filters="12" style="display: none;">
                  <div class="toggle-content-wrapper-field">  
                    @foreach ($states as $state)
                    <div class="field ">
                        <div class="control display-flex">
                          <label class="checkbox" data-value="{{ @$state->name }}">
                            <input type="checkbox" name="state" value="{{ @$state->id }}" class="search-checkbox">
                            {{ @$state->name }}
                          </label>
                          <div class="toggle-content-right-column">
                            @php
                              $state_universities=[];
                              if ($state->universities->count() > 0) {
                                $state_universities=@$state->universities->pluck('id');
                              }
                              $state_courses=\App\Models\Course::whereIn('university_id',$state_universities);
                            @endphp
                              {{ @$state_courses->count() }}
                          </div>
                        </div>
                      </div>
                    @endforeach                           
                  </div>
                </div>
                <hr style="margin: 0.5rem;">
                  <div class="toggle-header" data-filterslist="14">
                    <h5 class="title is-5"> City</h5>
                    <div class="toggle-icon" style="transform: rotate(135deg);"></div>
                  </div>
                  <div class="toggle-content" data-filters="14" style="display: none;">
                    <div class="toggle-content-wrapper-field">  
                      @foreach ($cities as $city)
                      <div class="field ">
                          <div class="control display-flex">
                            <label class="checkbox" data-value="{{ @$city->name }}">
                              <input type="checkbox" name="city" value="{{ @$city->id }}" class="search-checkbox">
                              {{ @$city->name }}
                            </label>
                            <div class="toggle-content-right-column">
                              @php
                                $city_universities=[];
                                if ($city->universities->count() > 0) {
                                  $city_universities=@$city->universities->pluck('id');
                                }
                                $city_courses=\App\Models\Course::whereIn('university_id',$city_universities);
                              @endphp
                              {{ @$city_courses->count() }}
                            </div>
                          </div>
                        </div>
                      @endforeach                           
                    </div>
                  </div>
              <hr style="margin: 0.5rem;">
          </div>
        </div>
        <div class="column is-9">
  
          <div class="column p-0">
            <div class="d-flex justify-content-between">
              <p class="result-search">{{ $courses->total() }} Programs Found</p>
              <div class="filters-button">
                {{-- <span class="filter-open"><img src="https://d2xtzyi0kjzog2.cloudfront.net/static/assets/assets_new_design/img/icons/filter.642602b57b41.svg" alt="filters">Filters</span>
                <span class="filter-opened"> <img src="https://d2xtzyi0kjzog2.cloudfront.net/static/assets/assets_new_design/img/icons/filter.642602b57b41.svg" alt="filters">Close Filters</span> --}}
              </div>
            </div>
  
            <div class="wrapper-result-tags-and-sort">
              <div class="tags searchingTags_wrapper mb-0">
                {{-- <span></span><span class="tag filterTags" data-field="city" data-keyword="Beijing">
                      Beijing
                    <span class="delete-tag"></span></span> --}}
                <!-- <span class="tag filterTags" data-field="degree" data-keyword="BACHELOR">Bachelor’s<span class="delete-tag"></span></span> -->
                <a style="" class="clear-filter">Clear all</a>
              </div>
  
              <form id="filter-form" method="POST" style="display:none"></form>
            </div>
            <div data-block-id="sort_bar" class="d-none d-md-block">
              <div id="sort_by" aria-label="Sort your results" class="mb-4">
                <ul class="sort_option_list ">
                  <li class=" sort_category selected sort-score">
                    <a href="#" class="sort_option sort_category_course_list" cat="1" data-category="sort-score" role="button">
                      Our Top Picks
                    </a>
                  </li>
                  <li class=" sort_category sort-popular">
                    <a href="#" class="sort_option sort_category_course_list" cat="2" data-category="sort-popular" role="button">
                      Most Popular
                    </a>
                  </li>
                  <li class=" sort_category  sort-speed">
                    <a href="#" class="sort_option sort_category_course_list" cat="3" data-category="sort-speed" role="button">
                      Fastest Admissions
                    </a>
                  </li>
                  <li class=" sort_category   sort-rating ">
                    <a href="#" class="sort_option sort_category_course_list" cat="4" data-category="sort-rating" role="button">
                      Highest Rating
                    </a>
                  </li>
                  <li class=" sort_category  sort-rank ">
                    <a href="#" class="sort_option sort_category_course_list" cat="5" data-category="sort-rank" role="button">
                      Top Ranked
                    </a>
                  </li>
                  {{-- <li class="with_dd sort_class sort_category" role="presentation">
                    <span href="#" class="sort_option " role="menubutton">
                      Tuition
                      <svg aria-hidden="true" class="-sprite-down_orange bk-icon" focusable="false" height="10" width="10" viewBox="0 0 10 6" role="presentation">
                        <path d="m10 0-5 6-5-6z"></path>
                      </svg>
                    </span>
                    <ul class="sort_option_sublist d-none" style="" role="menu">
                      <li class="sort_suboption_outer  selected" role="presentation">
                        <span href="#" id="sort-up" class="sort_suboption" role="menuitem">
                          high to low
                        </span>
                      </li>
                      <li class="sort_suboption_outer " role="presentation">
                        <span href="#" id="sort-down" class="sort_suboption" role="menuitem">
                          low to high
                        </span>
                      </li>
                    </ul>
                  </li> --}}
  
                </ul>
              </div>
            </div>
  
          </div>
          {{-- <img id="ajax-loader" src="https://d2xtzyi0kjzog2.cloudfront.net/static/assets/assets_new_design/img/ajax-bar-loader.57ca1a2085d8.gif" style="margin: 20px auto; display: none;"> --}}
          <!-- Search results displayed here -->
    <div class="onSearchResultPage" style="">

        <meta charset="UTF-8">
        <meta name="robots" content="noindex">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>Search results</title>
        <div id="programsFoundCount" style="display:none">{{ $courses->count() }} Programs Found</div>
        <span id="programsfound"></span>
            <div class="show-course-ajax-data-list show-course-paginate-ajax-data">
              @foreach ($courses as $course)
                <div class="columns">
                    <div class="column">
                            <div class="display-flex" style="position: relative;">
                                <div class="choice s-col-11 search-page-list-item">
                                    <div class="choice-wrapper" data-url="{{ url('courses/details/'.$course->id) }}">
                                      
                                        <div class="s-row">
                                            <div class="s-col-9">
                                              <a href="{{ route('frontend.university_program_details',$course->id) }}" class="">
                                                <img style="margin-bottom:25px;" src="{{ @$course->university->image_show }}" >
                                                <h4 class="title mb-1">
                                                    <span class="mr-2" style="vertical-align: middle;"> {{ @$course->name }}</span>
                                                    </h4>
                                                <p class="school-name-desktop">{{ @$course->university->name }}</p>
                                                <div class="mobile-title">
                                                    <img src="{{ @$course->university->image_show }}">
                                                    <div class="d-flex flex-column">
                                                        <h4 class="title" style="flex-direction: column; align-items: flex-start;">
                                                            <span class="mr-2" style="vertical-align: middle;">{{ @$course->name }} </span>                                                    
                                                            <p>{{ @$course->university->name }}</p>
                                                        </h4>
                                                    </div>
                                                </div>
                                              
                                                <div class="tags">
                                                    <span><i class="fa fa-map-marker"></i>
                                                      {{ @$course->university->continent->name }} , {{ @$course->university->country->name }} , {{ @$course->university->state->name }} , {{ @$course->university->city->name }}
                                                      {{-- {{ @$university->continent->name }}  --}}
                                                    </span>
                                                    <span><i class="fa fa-comment"></i>
                                                      {{ @$course->language->name }}
                                                  </span>
                                                </div>

                                                <div class="wrapper-bullts">
                                                    <div class="bulit">
                                                        <div class="title">Next Start Date</div>
                                                        <div class="value">{{ date('d M Y', strtotime( @$course->next_start_date)) }}</div>
                                                    </div>
                                                    <div class="bulit">
                                                        <div class="title">Yearly Tuition</div>                                           
                                                        <div class="value"> <span class="money">{{ format_price(@$course->year_fee)}}</span>
                                                        </div>                                                                                      
                                                    </div>

                                                    <div class="bulit">
                                                        <div class="title">Duration</div>                                                            
                                                        <div class="value">{{ @$course->course_duration }} Year</div>                                                                                      
                                                    </div>

                                                </div>  
                                              </a>               
                                            </div>
                                          
                                            <div class="d-none d-md-block s-col-3 search-page-list-item-bottom">
                                                <div class="wrapper-bullts call-to-action justify-content-center">
                                                    <div class="bulit">
                                                        <div class="title">Application Deadline</div>
                                                        <div class="value">  
                                                          {{ date('d M Y', strtotime( @$course->application_deadline)) }}
                                                
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-center mb-2">
                                                    <section class="apply__action d-flex justify-content-center">
                                                        <button class="ca-button justify-content-center">
                                                          {{-- <a href="{{ route('apply_cart',$course->id) }}" class="stretched-link">Apply Now_1</a> --}}
                                                            <a href="{{ route('apply_cart',$course->id) }}" class="text-white">Apply Now</a>
                                                        </button>
                                                    </section>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <a href="{{ url('courses/details/'.$course->id) }}" class="stretched-link"></a> --}}
                                <a href="{{ route('frontend.university_program_details',$course->id) }}" class=""></a>
                            </div>
                    </div>        
                </div>
              @endforeach

              @if (@$courses->count() == 0)
              <div class="text-center">
                  <h1 style="font-size: 25px">Program Not Found !</h1>
              </div>
              @endif
              
            </div>
        

        <style>
          .pagination-link {
              margin-left: 5px;
              margin-right: 5px;
          }   
        </style>
      <div class="columns">
        @if($courses->lastPage() != 1)
          <div class="column">
              <nav class="pagination" role="navigation" aria-label="pagination" style="padding-left: 15px;">
                <div class="pagination">
                  <a page_no="{{ $courses->currentPage() == 1 ? 1 : $courses->currentPage()-1 }}"  class="page-link course-paginate next_page next pagination-link" href="javascript:void(0)" aria-label="Previous"> &laquo;</a>              
                
                  @for ($i=1; $i <= $courses->lastPage(); $i++)
                  {{-- <span class="current page pagination-link  course-paginate @if($i == $courses->currentPage()) active @endif" page_no="{{ $i }}" @if($i == $courses->currentPage()) @endif href="javascript:void(0)">{{ $i }}</span> --}}
                  <a class="pagination-link course-paginate page current @if( $i==$courses->currentPage()) is-current @endif" page_no="{{ $i }}"  @if($i == $courses->currentPage()) @endif href="javascript:void(0)">{{ $i }}</a>
                  @endfor
                  
                  <a page_no="{{ $courses->currentPage() == $courses->lastPage() ? $courses->lastPage() : $courses->currentPage()+1 }}" class="page-link course-paginate next_page next pagination-link" href="javascript:void(0)" aria-label="Next"> &gt;</a>
                </div>
              </nav>
          </div>
        @endif
      </div>
          
    </div>
        </div>
      </div>
    </div>
  </section>
  
@endsection

@section('script')


<script>
   var del_name = "";
   var del_val = "";
  $(document).on('click', '.delete-tag', function () {
      del_name = $(this).parent().attr('data-field');
      del_val = $(this).parent().attr('data-keyword');
      filterCourse(true);
      $(this).parent().remove();
      if ($('.searchingTags_wrapper').children().length == 2) {
        $('.clear-filter').css('display', 'none');
      }
    });
    $(document).on('click','.clear-filter',function(){
        $('.filterTags').remove();
        $('.clear-filter').css('display', 'none');
        location.reload();
    })
  </script>



{{-- <script src="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/js/china_script.js"></> --}}

<script>

  // all paginate and paginate
   $(document).on('click','.course-paginate',function(){
        let c_val = $(this).attr('page_no');
       console.log(c_val);
       filterCourse(false,c_val);

    });


  $(document).on('change','input[name="continent"]',function(){
      //filters = $('label.checkbox');
      $(document).find('input[name="continent"]').prop('checked', false);
      $(this).prop('checked', true);
      filterCourse();
  });
  $(document).on('change','input[name="country"]',function(){
      $(document).find('input[name="country"]').prop('checked', false);
      $(this).prop('checked', true);
      filterCourse();
  });
  $(document).on('change','input[name="state"]',function(){
      $(document).find('input[name="state"]').prop('checked', false);
      $(this).prop('checked', true);
      filterCourse();
  });
  $(document).on('change','input[name="city"]',function(){
      $(document).find('input[name="city"]').prop('checked', false);
      $(this).prop('checked', true);
      filterCourse();
  });
  $(document).on('change','input[name="degree"]',function(){
      $(document).find('input[name="degree"]').prop('checked', false);
      $(this).prop('checked', true);
      filterCourse();
  });
  $(document).on('change','input[name="language"]',function(){
      $(document).find('input[name="language"]').prop('checked', false);
      $(this).prop('checked', true);
      filterCourse();
  });
  $(document).on('change','input[name="section"]',function(){
      $(document).find('input[name="section"]').prop('checked', false);
      $(this).prop('checked', true);
      filterCourse();
  });
  $(document).on('change','input[name="subject"]',function(){
      $(document).find('input[name="subject"]').prop('checked', false);
      $(this).prop('checked', true);
      filterCourse();
  });
  $(document).on('change','input[name="university"]',function(){
      $(document).find('input[name="university"]').prop('checked', false);
      $(this).prop('checked', true);
      filterCourse();
  });
  function filterCourse(del_filter = false,page=1){
      var continent_id= $(document).find('input[name="continent"]:checked').val();
      var country_id= $(document).find('input[name="country"]:checked').val();
      var state_id= $(document).find('input[name="state"]:checked').val();
      var city_id= $(document).find('input[name="city"]:checked').val();
      var degree_id= $(document).find('input[name="degree"]:checked').val();
      var language_id= $(document).find('input[name="language"]:checked').val();
      var section_id= $(document).find('input[name="section"]:checked').val();
      var subject_id= $(document).find('input[name="subject"]:checked').val();
      var university_id= $(document).find('input[name="university"]:checked').val();
      var data_val={};

      if(continent_id){
        if(del_filter == true){
            if(del_name != 'continent'){
              data_val.continent = continent_id;
            }
        }else{
          data_val.continent = continent_id;
        }        
      }

      if(country_id){
        if(del_filter == true){
            if(del_name != 'country'){
              data_val.country = country_id;
            }
        }else{
          data_val.country = country_id;
        }          
      }

      if(state_id){
        if(del_filter == true){
            if(del_name != 'state'){
              data_val.state = state_id;
            }
        }else{
          data_val.state = state_id;
        }         
      }

      if(city_id){
        if(del_filter == true){
            if(del_name != 'city'){
              data_val.city = city_id;
            }
        }else{
          data_val.city = city_id;
        }         
      }

      if(degree_id){
        if(del_filter == true){
            if(del_name != 'degree'){
              data_val.degree = degree_id;
            }
        }else{
          data_val.degree = degree_id;
        }
      }

      if(language_id){
        if(del_filter == true){
            if(del_name != 'language'){
              data_val.language = language_id;
            }
        }else{
          data_val.language = language_id;
        } 
      }

      if(section_id){
        if(del_filter == true){
            if(del_name != 'section'){
              data_val.section = section_id;
            }
        }else{
          data_val.section = section_id;
        }
      }

      if(subject_id){
        if(del_filter == true){
            if(del_name != 'subject'){
              data_val.subject = subject_id;
            }
        }else{
          data_val.subject = subject_id;
        }         
      }

      if(university_id){
        if(del_filter == true){
            if(del_name != 'university'){
              data_val.university = university_id;
            }
        }else{
          data_val.university = university_id;
        }  
      }
      data_val.page=page;
      $.ajax({
          type:'GET',
          url:"{{ url('ajax-course-filter') }}",
            data:data_val,
          success:function(data){
              console.log(data);
          //  document.getElementById("home-proud-hide").style.visibility = "hidden";
             $(".ajax-course-show").html(data);
          }

      });
  }

//University degree Category show
$(".on_click_university_degree").change(function(e){
  e.preventDefault();
  let id = $(this).val()
  console.log(id);
  $.ajax({

    type:'GET',

     url:"{{ url('get-university-course-degree') }}/"+id,

    // data:{id:id},

    success:function(data){
    //  document.getElementById("home-proud-hide").style.visibility = "hidden";
      $(".university_course_degree-show").html(data);
    }

  });



});

// sort category course ajax
$('body').on("click",'.sort_category_course_list',function(){
        let cat = $(this).attr('cat');
     console.log(cat);
        let url = '{{ url("get-sort-course-list/") }}/' + cat;
        axios.get(url)
        .then(res => {
            $('.show-course-ajax-data-list').html(res.data);
            console.log(res);
        });

    });

  //Ajax continent Course list show
$(".continent_course_list").change(function(e){
  e.preventDefault();
  let id = $(this).val();
  console.log(id);
  $.ajax({
    type:'GET',
     url:"{{ url('get-continent-course-list') }}/"+id,
    // data:{id:id},
    success:function(data){
    //  document.getElementById("home-proud-hide").style.visibility = "hidden";
      $(".continent_course_list_show").html(data);
    }

  });
});


//Ajax country Course list show
$(".country_course_list").change(function(e){
  e.preventDefault();
  let id = $(this).val();
  console.log(id);
  $.ajax({
    type:'GET',
     url:"{{ url('get-country-course-list') }}/"+id,
    // data:{id:id},
    success:function(data){
    //  document.getElementById("home-proud-hide").style.visibility = "hidden";
      $(".country_course_list_show").html(data);
    }

  });
});

//Ajax state Course list show
$(".state_course_list").change(function(e){
  e.preventDefault();
  let id = $(this).val();
  console.log(id);
  $.ajax({
    type:'GET',
     url:"{{ url('get-state-course-list') }}/"+id,
    // data:{id:id},
    success:function(data){
    //  document.getElementById("home-proud-hide").style.visibility = "hidden";
      $(".state_course_list_show").html(data);
    }

  });
});

//Ajax state Course list show
$(".city_course_list").change(function(e){
  e.preventDefault();
  let id = $(this).val();
  console.log(id);
  $.ajax({
    type:'GET',
     url:"{{ url('get-city-course-list') }}/"+id,
    // data:{id:id},
    success:function(data){
    //  document.getElementById("home-proud-hide").style.visibility = "hidden";
      $(".city_course_list_show").html(data);
    }

  });
});
</script>



<script type="text/javascript">
    /*
     drizzle v1.0.0 - 2019-06-13 
    */
    //used to sort the sidebar subject area
    try { !function (n) { n.fn.drizzle = function (t) { const i = ["asc", "desc"]; var e = n.extend({ child: ".child" }, t), c = n(e.child), o = function () { n(e.child).show() }, r = function () { n(e.child).hide() }; return { filter: function (t) { if ("function" != typeof t) { r(); var i = e.child + "" + t; "*" !== t ? n(i).show() : this.rain() } else t.call(this) }, sort: function (t, o) { if ("function" != typeof f && "function" != typeof o) { var r = n(e.child).parent(), f = "asc"; o && o.order && (f = i.indexOf(o.order) ? o.order : "asc"), c.sort(function (i, e) { var c, r; return t ? (c = n(i).find(t).text(), r = n(e).find(t).text()) : (c = n(i).text(), r = n(e).text()), o && !0 === o.isNumber && (c = Number(c), r = Number(r)), c > r ? 1 : c < r ? -1 : 0 }), "desc" == f && (c = Object.assign([], c).reverse()), r.html(c) } else "function" == typeof f && f.call(this), "function" == typeof o && type.call(this) }, init: function () { o() }, rain: function () { o() }, unfilter: function () { o() }, dry: function () { r() }, erase: function () { r() }, destroy: function () { r() } } } }(jQuery) } catch (n) { console.log("Caught an error", n) }
  
    /*
    URLSearchParams Polyfill
    source: https://github.com/jerrybendy/url-search-params-polyfill
    */
    
  
  
    $(document).ready(function () {
  
      $('#mobile-search').change(function() {
            $('#search-input').val($(this).val());
      });
      $('#mobile-search').on('keypress', function (e) {
        if (e.which === 13) {
          //Disable textbox to prevent multiple submit
          $(this).attr("disabled", "disabled");
          $('#applyFilter').click();
          //Enable the textbox again if needed.
          $(this).removeAttr("disabled");
        }
      });
      $('#mobile-search').click(function(){
        $('#applyFilter').click();
      })
  
      //filter toggle 
      $(".filter-open").on("click", function () {
        if (window.innerWidth < 768) {
          $(".wrapper-filters").css({ display: "block" });
          $(this).css({ display: "none" });
          $(".filter-opened").css({ display: "inline" });
        }
      });
  
      $(".filter-opened").on("click", function () {
        if (window.innerWidth < 768) {
          $(".wrapper-filters").css({ display: "none" });
          $(this).css({ display: "none" });
          $(".filter-open").css({ display: "inline" });
        }
      });
      $(window).resize(function () {
        if (window.innerWidth >= 768) {
          $(".wrapper-filters").css({ display: "block" });
        }
      });
  
      $(".with_dd").on('click', function () {
        $(".sort_option_sublist").toggleClass("d-none")
        $(this).addClass("selected")
      });
      $(".sort_suboption_outer").on('click', function () {
        $(".sort_suboption_outer").removeClass("selected");
        $(this).addClass("selected");
      });
  
  
      //Eligibility
      var quizParams = ['age', 'edu_lvl', 'grade', 'hsk', 'ielts'];
      var hasParams = new RegExp(quizParams.join('|')).test(location.search);
      var preferences;
      if (Cookies.get("jwt") != undefined) {
        getPreference().then((response) => {
          preferences = response.data;
          if (response.data["search_quiz_data"] != undefined) {
            if (hasParams)
              $(".eligibility").val("search-eligible");
            $(".has-auth").removeClass("d-none");
          } else {
            $(".has-no-auth").removeClass("d-none");
          }
        })
      } else {
        $(".eligibility").val("not-set");
        $(".has-no-auth").removeClass("d-none");
      }
  
      $(".eligibility").on("change", function () {
        var option = $(this).val();
        if (option == "take-quiz")
          showQuiz();
        else if (option == "not-set")
          window.location = removeQuizParameters();
        else if (option == "search-eligible") {
          preferences.search_quiz_data.replace('hks_lvl', 'hsk');
          preferences.search_quiz_data.replace('ielts_lvl', 'ielts');
          window.location.search = window.location.search +"&"+ preferences.search_quiz_data.split("/search/?")[1];
        }
        else if (option == "go-to-profile")
          window.location = "/account/profile"
      })
  
  
    });
  
    //Sort subjects on the sidebar alphabetically 
    var instance = $('#subjects').drizzle({
      child: '.subject' // child element
    });
    instance.sort('[data-value]', { order: 'asc' });
  
    
    //Sort bar
    var sortOption = "sort"
    var sort_categories = $('.sort_category')
    sort_categories.on('click', function () {
      if ($(this).find(".sort_option").data("category") != undefined) {
        sortOption = ($(this).find(".sort_option").data("category"));
      }
      sort_categories.removeClass("selected");
      if ($(this).hasClass("with_dd") == false) {
        $('#applyFilter').click();
      }
      $(this).addClass("selected")
    });

    $(document).on("click",".toggle-header", function() {
    var vm = this,
      filterslistItem = $(vm).data();

    // function completed() {
      if (
        $(
          ".toggle-content[data-filters=" + filterslistItem.filterslist + "]"
        ).css("display") == "none"
      ) {
        $(
          ".toggle-content[data-filters=" + filterslistItem.filterslist + "]"
        ).css("display",'block');

        $(vm)
          .find(".toggle-icon")
          .css({
            transform: "rotate(-45deg)"
          });
      } else {
        $(
          ".toggle-content[data-filters=" + filterslistItem.filterslist + "]"
        ).css("display",'none');
        $(vm)
          .find(".toggle-icon")
          .css({
            transform: "rotate(135deg)"
          });
      }
    //   return false;
    // }

    // $(
    //   ".toggle-content[data-filters=" + filterslistItem.filterslist + "]"
    // ).toggle("blind", 500, completed());
  });

   
  
  </script>
  
@endsection