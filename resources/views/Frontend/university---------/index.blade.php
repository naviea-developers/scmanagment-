@extends('Frontend.layouts.master-layout') 
@section('title','- All Universities') 
@section('head') 
<link href="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/css/main_china.css" rel="stylesheet">
<link href="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/css/page_search_china.css" rel="stylesheet">
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
    background: -webkit-linear-gradient(#d7353870, #d7353870), url({{ @$banner->image_show }});
    background: linear-gradient(#d7353870, #d7353870), url({{ @$banner->image_show }});
    background-position: center;
    background-repeat: no-repeat;
    padding-top: 7rem;
    /* height:300px; */
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
<!--main body-->
<header class="hero is-bold is-small top_hero">
    <div class="container">
        <div class="columns">
            <div class="column">
                <h1 class="title is-2 has-text-centered " style="color: #fff;">{{ @$banner->title }}</h1>
                <div class="columns">
                    <div class="column is-three-fifths is-offset-one-fifth">
                        <div class="field has-addons">
                            <div class="control">
                                <input id="search-input" class="input" type="text"
                                    placeholder="Search by university">
                            </div>
                            <div class="control">
                                <a  id="search-input" class="button is-info">
                                    <i class="fas fa-search"></i>
                                </a>
                                {{-- id="applyFilter" --}}
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
        <div class="columns ajax-filter-show">
            <div class="column is-2">
                {{-- <div class="filters-button">
                    <span class="filter-open"><img src="https://d2xtzyi0kjzog2.cloudfront.net/static/assets/assets_new_design/img/icons/filter.642602b57b41.svg"
                            alt="filters">Filters</span>
                    <span class="filter-opened"> <img src="https://d2xtzyi0kjzog2.cloudfront.net/static/assets/assets_new_design/img/icons/filter.642602b57b41.svg"
                            alt="filters">Close Filters</span>
                </div> --}}
                <div class="wrapper-filters">

                    <div class="toggle-header" data-filtersList="5">
                        <h5 class="title is-5">Content</h5>
                        <div class="toggle-icon"></div>
                    </div>
                    <div class="toggle-content" data-filters="5">
                        <div class="toggle-content-wrapper-field continet-list" style="max-height: 500px;">
                            @foreach ($continents as $continent)
                            <div class="field ">
                                <div class="control display-flex">
                                    <label class="checkbox ">
                                        <input type="checkbox" name="continent" value="{{ $continent->id }}" @if($select_continent == $continent->id) @checked(true) @endif class="search-checkbox city_find">
                                        {{ $continent->name }}
                                    </label>
                                    {{-- <div class="toggle-content-right-column">{{ $continent->university_count }} </div> --}}
                                    <div class="toggle-content-right-column">{{ @$continent->universities->count() }} </div>

                                </div>
                            </div>
                            @endforeach
                        </div>
                        
                    </div>
                    <hr>
                    @if(@$countries->count() > 0)
                    <div class="toggle-header" data-filtersList="4">
                        <h5 class="title is-5">Country</h5>
                        <div class="toggle-icon"></div>
                    </div>
                    <div class="toggle-content" data-filters="4">
                        <div class="toggle-content-wrapper-field continet-list" style="max-height: 500px;">
                            @foreach ($countries as $country)
                            <div class="field ">
                                <div class="control display-flex">
                                    <label class="checkbox " >
                                        <input type="checkbox" name="country" value="{{ $country->id }}" @if($select_country == $country->id) @checked(true) @endif class="search-checkbox city_find">
                                        {{ $country->name }}
                                    </label>
                                    {{-- <div class="toggle-content-right-column">{{ $country->university_count }} </div> --}}
                                    <div class="toggle-content-right-column">{{ $country->university->count() }} </div>

                                </div>
                            </div>
                            @endforeach
                        </div>
                        
                    </div>
                    <hr>
                    @endif
                    @if(@$states->count() > 0)
                    <div class="toggle-header" data-filtersList="3">
                        <h5 class="title is-5">State</h5>
                        <div class="toggle-icon"></div>
                    </div>
                    <div class="toggle-content" data-filters="3">
                        <div class="toggle-content-wrapper-field continet-list" style="max-height: 500px;">
                            @foreach ($states as $state)
                            <div class="field ">
                                <div class="control display-flex">
                                    <label class="checkbox ">
                                        <input type="checkbox"  name="state" value="{{ $state->id }}" @if($select_state == $state->id) @checked(true) @endif class="search-checkbox city_find">
                                        {{ $state->name }}
                                    </label>
                                    {{-- <div class="toggle-content-right-column">{{ $state->university_count }} </div> --}}
                                    <div class="toggle-content-right-column">{{ $state->universities->count() }} </div>

                                </div>
                            </div>
                            @endforeach
                        </div>
                        
                    </div>
                    <hr>
                    @endif
                    @if(@$cities->count() > 0)
                    <div class="toggle-header" data-filtersList="2">
                        <h5 class="title is-5">City</h5>
                        <div class="toggle-icon"></div>
                    </div>
                    <div class="toggle-content" data-filters="2">
                        <div class="toggle-content-wrapper-field continet-list" style="max-height: 500px;">
                            @foreach ($cities as $city)
                            <div class="field ">
                                <div class="control display-flex">
                                    <label class="checkbox ">
                                        <input type="checkbox" name="city" value="{{ $city->id }}" @if($select_city == $city->id) @checked(true) @endif class="search-checkbox city_find">
                                        {{ $city->name }}
                                    </label>
                                    {{-- <div class="toggle-content-right-column">{{ $city->university_count }} </div> --}}
                                    <div class="toggle-content-right-column">{{ $city->universities->count() }} </div>

                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            <div class="column is-10" id="schools">
                <div class="columns">
                    <div class="column">
                        <p class="result-search"><span class="count">{{ $universities->count() }}</span> Total University Found</p>
                        <div class="dropdown">
                            {{-- <div class="sorting">Sorting
                                <span class="icon is-small">
                                    <i class="fas fa-angle-down" aria-hidden="true"></i>
                                </span>
                            </div>
                            <div class="dropdown-content" style="left: 0px;">
                                <span id="sort-asc">Ascending order</span>
                                <span id="sort-desc">Descending order</span>
                            </div> --}}
                        </div>
                    </div>
                </div>

                <div class="columns mb-0">
                    <div class="column pt-0 pb-0">
                        <p class="result-search"></p>
                        <div class="pt-0 wrapper-result-tags-and-sort">
                            <div class="tags searchingTags_wrapper">
                                @if($select_continent > 0)
                                    @php
                                        $select_continents = \App\Models\Continent::where('id',$select_continent)->get();
                                    @endphp
                                    @foreach ($select_continents as $select_continent)
                                    <span class="tag filterTags" data-field="continent" data-keyword="{{ $select_continent->id }}">{{ $select_continent->name }}<span class="delete-tag">X</span></span>
                                    @endforeach
                                @endif

                                @if($select_country > 0)
                                    @php
                                        $select_countries = \App\Models\Country::where('id',$select_country)->get();
                                    @endphp
                                    @foreach ($select_countries as $contry)
                                    <span class="tag filterTags" data-field="country" data-keyword="{{ $contry->id }}">{{ $contry->name }}<span class="delete-tag">X</span></span>
                                    @endforeach
                                @endif

                                @if($select_state > 0)
                                    @php
                                        $select_states = \App\Models\State::where('id',$select_state)->get();
                                    @endphp
                                    @foreach ($select_states as $state)
                                    <span class="tag filterTags" data-field="state" data-keyword="{{ $state->id }}">{{ $state->name }}<span class="delete-tag">X</span></span>
                                    @endforeach
                                @endif

                                @if($select_city > 0)
                                    @php
                                        $select_cities = \App\Models\City::where('id',$select_city)->get();
                                    @endphp
                                    @foreach ($select_cities as $city)
                                    <span class="tag filterTags" data-field="city" data-keyword="{{ $city->id }}">{{ $city->name }}<span class="delete-tag">X</span></span>
                                    @endforeach
                                @endif
                                {{-- <a style="display:none;" class="clear-filter">Clear all</a> --}}
                                <a style="" class="clear-filter">Clear all</a>
                            </div>

                        </div>
                    </div>
                </div>
                <ul class="list is-flex" style="flex-wrap:wrap">
                    @foreach ($universities as $university)
                        <li class="school column is-3 is-3-tablet is-12-mobile">
                            <div class="card" style="height: 100%;">
                                <div class="card-content row is-flex" style="flex-direction: column;align-items: center;">
                                    
                                    <img src="{{ $university->image_show }}" style="margin-right:auto; margin-left:auto; width:100%; height:200px" >
                                    
                                    <h5 class="title has-text-centered has-margin-top-2"
                                        style="min-height:3rem;font-size: 1rem; overflow: hidden;margin-bottom: 0px;">{{ $university->name }}
                                    </h5>
                                    {{-- <span class="is-hidden acronymn">None</span> --}}
                                    <span class="is-hidden city">{{ @$university->city->name }}</span>
                                    <!-- <p class="school-name-desktop">ZIBS</p> -->
                                    {{-- <a href="{{ route('frontend.university_details', $university->id) }}" class="stretched-link"> </a> --}}
                                    <a href="{{ route('frontend.university_course_list') }}?university={{ @$university->id }}" class="stretched-link"> </a>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
                @if (@$universities->count() == 0)
                <div class="text-center">
                    <h1 style="font-size: 25px">University Not Found !</h1>
                </div>
                @endif
                {{-- <ul class="school-pagination is-flex"></ul> --}}
            </div>
        </div>
    </div>
</div>

{{-- </body> --}}

  <!-- Subscription start -->
  @include('Frontend.layouts.parts.news-letter')
  <!-- Subscription end -->
  @endsection 



  @section('script') 

  <script>
    var del_name = "";
    var del_val = "";
   $(document).on('click', '.delete-tag', function () {
       del_name = $(this).parent().attr('data-field');
       del_val = $(this).parent().attr('data-keyword');
       filterUniversity(true)
       $(this).parent().remove();
       if ($('.searchingTags_wrapper').children().length == 2) {
         $('.clear-filter').css('display', 'none');
       }
     });
     
     $(document).on('click','.clear-filter',function(){
        window.location ="{{ url('/list/all-universities') }}/"
         $('.filterTags').remove();
            //  op start
              filterUniversity(false,true)
              return false;
            //  end end
         $('.clear-filter').css('display', 'none');
         //location.reload();
     });


     $(document).on('keydown','#search-input',function(e){
        var key = e.which;
        if(key == 13) {
            filterUniversity(false,true)
            return false;
        }
     })

     $(document).on('click','#search-input',function(e){
        filterUniversity(false,true)
        return false;
     })
   </script>


    <script>
        $(document).on('change','input[name="continent"]',function(){
            //filters = $('label.checkbox');
            $(document).find('input[name="continent"]').prop('checked', false);
            $(this).prop('checked', true);
            filterUniversity();
        });
        $(document).on('change','input[name="country"]',function(){
            $(document).find('input[name="country"]').prop('checked', false);
            $(this).prop('checked', true);
            filterUniversity();
        });
        $(document).on('change','input[name="state"]',function(){
            $(document).find('input[name="state"]').prop('checked', false);
            $(this).prop('checked', true);
            filterUniversity();
        });
        $(document).on('change','input[name="city"]',function(){
            $(document).find('input[name="city"]').prop('checked', false);
            $(this).prop('checked', true);
            filterUniversity();
        });
        function filterUniversity(del_filter = false,onsearch_val=false){
            console.log(onsearch_val);
            var continent_id= $(document).find('input[name="continent"]:checked').val();
            var country_id= $(document).find('input[name="country"]:checked').val();
            var state_id= $(document).find('input[name="state"]:checked').val();
            var city_id= $(document).find('input[name="city"]:checked').val();
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
            var search_val = $('#search-input').val();
            if(search_val){
                if(del_filter == true){
                    if(del_name != 'search_val'){
                    data_val.search_val = search_val;
                    }
                }else{
                    data_val.search_val = search_val;
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
            data_val.onsearch_val=onsearch_val;
            $.ajax({
                type:'GET',
                url:"{{ url('ajax-university-filter') }}",
                 data:data_val,
                success:function(data){
                    console.log(data);
                //  document.getElementById("home-proud-hide").style.visibility = "hidden";
                    $(".ajax-filter-show").html(data);
                }

            });
        }
            
    </script>
  @endsection