<div class="columns">
    <div class="column is-3">
      <!--  <button id="showPopupButton" onclick="showQuiz()" class="ca-button d-none" style="width: 160px;">
        Eligibility Quiz
      </button> -->

      <div class="wrapper-filters" style="display: block;">
         <div class="toggle-header ">
          <h4 class="title is-5"><b>All Programs</b></h4>
        </div>
        {{--
        <div class="toggle-content ">
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
                    <input @if($selected_degree == $degree->id) @checked(true) @endif type="checkbox" name="degree" value="{{ @$degree->id }}" class="search-checkbox">
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
          <div class="toggle-icon" @if($selected_language > 0) style="transform:rotate(-45deg)" @else style="transform: rotate(135deg);" @endif></div>
        </div>
        <div class="toggle-content" data-filters="6" @if($selected_language > 0) @else style="display: none;" @endif>
          @foreach ($languages as $language)
            <div class="field">
              <div class="control display-flex">
                <label class="checkbox"  data-value="{{ @$language->name }}">
                  <input type="checkbox" @if(@$selected_language == @$language->id) @checked(true) @endif name="language" value="{{ $language->id }}" class="search-checkbox">
                  {{ @$language->name }}
                </label>
                <div class="toggle-content-right-column">{{ @$language->courses->count() }}</div>
              </div>
            </div>
          @endforeach             
        </div>            
        <hr style="margin: 0.5rem;">

        <div class="toggle-header" data-filterslist="0">
          <h5 class="title is-5">start date</h5>
          <div class="toggle-icon" @if($selected_section > 0) style="transform:rotate(-45deg)" @else style="transform: rotate(135deg);" @endif></div>
        </div>
        <div class="toggle-content" data-filters="0" @if($selected_section > 0) @else style="display: none;" @endif>
          @foreach ($sections as $section)
            <div class="field">
              <div class="control display-flex">
                <label class="checkbox"  data-value="{{ @$section->name }}">
                  <input type="checkbox" @if($selected_section == $section->id) @checked(true) @endif name="section" value="{{ @$section->id }}" class="search-checkbox">
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
          <div class="toggle-icon" @if($selected_subject > 0) style="transform:rotate(-45deg)" @else style="transform: rotate(135deg);" @endif></div>
        </div>
        <div class="toggle-content" data-filters="2" @if($selected_subject > 0) @else style="display: none;" @endif>
          <div class="toggle-content-wrapper-field" id="subjects">
            @foreach ($departments as $department)
              <div class="field subject">
                <div class="control display-flex">
                  <label class="checkbox"  data-value="{{ @$department->name }}">
                    <input type="checkbox" @if($selected_subject == $department->id) @checked(true) @endif name="subject" value="{{ @$department->id }}" class="search-checkbox">
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
          <div class="toggle-icon" @if($selected_university > 0) style="transform:rotate(-45deg)" @else style="transform: rotate(135deg);" @endif></div>
        </div>
        <div class="toggle-content" data-filters="18" @if($selected_university > 0) @else style="display: none;" @endif>
          <div class="toggle-content-wrapper-field">  
            @foreach ($univerties as $university)
            <div class="field ">
                <div class="control display-flex">
                  <label class="checkbox" data-value="{{ @$university->name }}">
                    <input type="checkbox"  name="university"  @if($selected_university == $university->id) @checked(true) @endif value="{{ $university->id }}" class="search-checkbox">
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
          <div class="toggle-icon" @if($select_continent > 0) style="transform:rotate(-45deg)" @else style="transform: rotate(135deg);" @endif></div>
        </div>
        <div class="toggle-content" data-filters="5" @if($select_continent > 0) @else style="display: none;" @endif>
          <div class="toggle-content-wrapper-field">  
            @foreach ($continents as $continent)
            <div class="field ">
                <div class="control display-flex">
                  <label class="checkbox" data-value="{{ @$continent->name }}">
                    <input type="checkbox" @if($select_continent == $continent->id) @checked(true) @endif name="continent" value="{{ $continent->id }}" class="search-checkbox">
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
            <div class="toggle-icon" @if($select_country > 0) style="transform:rotate(-45deg)" @else style="transform: rotate(135deg);" @endif></div>
        </div>
          <div class="toggle-content" data-filters="11" @if($select_country > 0) @else style="display: none;" @endif>
            <div class="toggle-content-wrapper-field">  
              @foreach ($countries as $country)
              <div class="field ">
                  <div class="control display-flex">
                    <label class="checkbox" data-value="{{ @$country->name }}">
                      <input type="checkbox" @if($select_country == $country->id) @checked(true) @endif name="country" value="{{ @$country->id }}" class="search-checkbox">
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
                <div class="toggle-icon" @if($select_state > 0) style="transform:rotate(-45deg)" @else style="transform: rotate(135deg);" @endif></div>
            </div>
            <div class="toggle-content" data-filters="12" @if($select_state > 0) @else style="display: none;" @endif>
              <div class="toggle-content-wrapper-field">  
                @foreach ($states as $state)
                <div class="field ">
                    <div class="control display-flex">
                      <label class="checkbox" data-value="{{ @$state->name }}">
                        <input type="checkbox"  @if($select_state == $state->id) @checked(true) @endif name="state" value="{{ @$state->id }}" class="search-checkbox">
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
                <div class="toggle-icon" @if($select_city > 0) style="transform:rotate(-45deg)" @else style="transform: rotate(135deg);" @endif></div>
              </div>
              <div class="toggle-content" data-filters="14" @if($select_city > 0) @else style="display: none;" @endif>
                <div class="toggle-content-wrapper-field">  
                  @foreach ($cities as $city)
                  <div class="field ">
                      <div class="control display-flex">
                        <label class="checkbox" data-value="{{ @$city->name }}">
                          <input type="checkbox" @if($select_city == $city->id) @checked(true) @endif name="city" value="{{ @$city->id }}" class="search-checkbox">
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


        {{-- <div class="toggle-header" data-filterslist="7">
          <h5 class="title is-5">other filters</h5>
          <div class="toggle-icon" style="transform: rotate(135deg);"></div>
        </div>
        <div class="toggle-content" data-filters="7" style="display: none;">
          <div class="toggle-content-wrapper-field">              
            
            <div class="field ">
              <div class="control display-flex">
                <label class="checkbox" name="other" data-value="noservicefees">
                  <input type="checkbox" class="search-checkbox">
                  No service fees
                </label>
                <div class="toggle-content-right-column">1362</div>
              </div>
            </div>
            
          </div>
        </div>            
        <hr style="margin: 0.5rem;"> --}}
      </div>
    </div>
    <div class="column is-9">

      <div class="column p-0">
        <div class="d-flex justify-content-between">
          <p class="result-search">{{ $courses->total() }} Programs Found</p>
          <div class="filters-button">
            <span class="filter-open"><img src="https://d2xtzyi0kjzog2.cloudfront.net/static/assets/assets_new_design/img/icons/filter.642602b57b41.svg" alt="filters">Filters</span>
            <span class="filter-opened"> <img src="https://d2xtzyi0kjzog2.cloudfront.net/static/assets/assets_new_design/img/icons/filter.642602b57b41.svg" alt="filters">Close Filters</span>
          </div>
        </div>

        <div class="wrapper-result-tags-and-sort">
          <div class="tags searchingTags_wrapper mb-0">
            {{-- <span></span><span class="tag filterTags" data-field="city" data-keyword="Beijing"></span> --}}
                  
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
                      <span class="tag filterTags" data-field="contry" data-keyword="{{ $contry->id }}">{{ $contry->name }}<span class="delete-tag">X</span></span>
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

                  @if($selected_degree > 0)
                      @php
                          $selected_degrees = \App\Models\Degree::where('id',$selected_degree)->get();
                      @endphp
                      @foreach ($selected_degrees as $degree)
                      <span class="tag filterTags" data-field="degree" data-keyword="{{ $degree->id }}">{{ $degree->name }}<span class="delete-tag">X</span></span>
                      @endforeach
                  @endif
                  
                  @if($selected_language > 0)
                  @php
                      $selected_languages = \App\Models\CourseLanguage::where('id',$selected_language)->get();
                  @endphp
                  @foreach ($selected_languages as $language)
                  <span class="tag filterTags" data-field="language" data-keyword="{{ $language->id }}">{{ $language->name }}<span class="delete-tag">X</span></span>
                  @endforeach
                  @endif

                  @if($selected_section > 0)
                  @php
                      $selected_section = \App\Models\Section::where('id',$selected_section)->get();
                  @endphp
                  @foreach ($selected_section as $section)
                  <span class="tag filterTags" data-field="section" data-keyword="{{ $section->id }}">{{ $section->name }}<span class="delete-tag">X</span></span>
                  @endforeach
                  @endif

                  @if($selected_subject > 0)
                  @php
                      $selected_subjects = \App\Models\Department::where('id',$selected_subject)->get();
                  @endphp
                  @foreach ($selected_subjects as $subject)
                  <span class="tag filterTags" data-field="subject" data-keyword="{{ $subject->id }}">{{ $subject->name }}<span class="delete-tag">X</span></span>
                  @endforeach
                  @endif

                  @if($selected_university > 0)
                  @php
                      $selected_university = \App\Models\University::where('id',$selected_university)->get();
                  @endphp
                  @foreach ($selected_university as $university)
                  <span class="tag filterTags" data-field="university" data-keyword="{{ $university->id }}">{{ $university->name }}<span class="delete-tag">X</span></span>
                  @endforeach
                  @endif


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
      <img id="ajax-loader" src="https://d2xtzyi0kjzog2.cloudfront.net/static/assets/assets_new_design/img/ajax-bar-loader.57ca1a2085d8.gif" style="margin: 20px auto; display: none;">
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
                                                <a href="{{ route('apply_cart',$course->id) }}" class="text-white">Apply Now</a>
                                            </button>
                                        </section>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <a href="{{ route('apply_cart',$course->id) }}" class="stretched-link"> --}}
                    </a>
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
{{-- <div class="columns">
    <div class="column">
            <div class="display-flex" style="position: relative;">
                <div class="choice s-col-11 search-page-list-item">

                    <div class="choice-wrapper" data-url="/d/pBUST5180/environment-engineering-at-university-science-and-technology-beijing/">

                        <div class="s-row">
                            <div class="s-col-9">

                                <img style="margin-bottom:25px;" src="https://upload-china-admissions.imgix.net/uploads/school_logos/654151462_0zcEg9M.png?auto=compress?w=200&amp;h=200" data-src="https://upload-china-admissions.imgix.net/uploads/school_logos/654151462_0zcEg9M.png?auto=compress?w=200&amp;h=200">
                                <h4 class="title mb-1">
                                    <span class="mr-2" style="vertical-align: middle;"> Bachelor’s in Environment Engineering
                                    </span>
                                </h4>
                                <p class="school-name-desktop">University of Science and Technology Beijing (USTB)</p>
                                <div class="mobile-title">
                                    <img src="https://upload-china-admissions.imgix.net/uploads/school_logos/654151462_0zcEg9M.png?auto=compress?w=200&amp;h=200" data-src="https://upload-china-admissions.imgix.net/uploads/school_logos/654151462_0zcEg9M.png?auto=compress?w=200&amp;h=200">
                                    <div class="d-flex flex-column">
                                        <h4 class="title" style="flex-direction: column; align-items: flex-start;">
                                            <span class="mr-2" style="vertical-align: middle;">
                                                Bachelor’s in Environment Engineering </span>
                                            <p>University of Science and Technology Beijing (USTB)</p>
                                        </h4>
                                    </div>
                                </div>
                                
                                


                                <div class="tags">
                                    <span><i class="fa fa-map-marker"></i>
                                        
                                        Beijing 
                                        
                                    </span>

                                    <span><i class="fa fa-comment"></i>
                                        English
                                    </span>
                                </div>

                                <div class="wrapper-bullts">

                                    <div class="bulit">
                                        <div class="title">Next Start Date</div>
                                        
                                        
                                        <div class="value">Sep  2024</div>
                                        
                                        

                                    </div>


                                    <div class="bulit">

                                        
                                        <div class="title">Yearly Tuition</div>
                                        
                                        <div class="value"> <span class="money">354,567 BDT</span>
                                        </div>
                                        
                                        

                                    </div>

                                    <div class="bulit">
                                        <div class="title">Duration</div>
                                        
                                        
                                        <div class="value">
                                            4
                                            years
                                        </div>
                                        
                                        

                                    </div>

                                </div>

                                <!-- <div class="text-gray-bg">Application deadline is 5 days from now,
                                  act fast!
                              </div> -->

                            </div>
                            

                            
                            <div class="d-none d-md-block s-col-3 search-page-list-item-bottom">

                                <div class="wrapper-bullts call-to-action justify-content-center">
                                    <div class="bulit">
                                        <div class="title">Application Deadline</div>
                                        <div class="value">
                                            
                                            
                                            Jun 2024
                                            
                                            

                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center mb-2">

                                    <section class="apply__action d-flex justify-content-center">
                        
                                        
                                        <button class="ca-button justify-content-center">
                                            <a href="/d/pBUST5180/environment-engineering-at-university-science-and-technology-beijing/" class="text-white">Apply Now</a>
                                        </button>
                                        
                        
                                    </section>
                        
                                </div>
                            </div>
                        </div>


                    </div>
                    
                </div>
                <a href="/d/pBUST5180/environment-engineering-at-university-science-and-technology-beijing/" class="stretched-link">
                </a>
            </div>
       
    </div>        
</div>--}}

{{-- pagination ajax start--}}
<style>
  .pagination-link {
      margin-left: 5px;
      margin-right: 5px;
  }
</style>
<div class="columns">
@if($courses->lastPage() != 1)
  <div class="column" onclick="window.scrollTo(0, 0);">
      <nav class="pagination" role="navigation" aria-label="pagination" style="padding-left: 15px;">
        <div class="pagination">
          <a page_no="{{ $courses->currentPage() == 1 ? 1 : $courses->currentPage()-1 }}"  class="page-link course-paginate next_page next pagination-link" href="javascript:void(0)" aria-label="Previous">  &laquo;</a>              
         
          @for ($i=1; $i <= $courses->lastPage(); $i++)
          <a class="pagination-link course-paginate page current @if($i == $courses->currentPage())  is-current @endif" page_no="{{ $i }}"  @if($i == $courses->currentPage())  @endif href="javascript:void(0)">{{ $i }}</a>
           @endfor
          
           <a page_no="{{ $courses->currentPage() == $courses->lastPage() ? $courses->lastPage() : $courses->currentPage()+1 }}" class="page-link course-paginate next_page next pagination-link" href="javascript:void(0)" aria-label="Next"> &gt;</a>
        </div>
      </nav>
  </div>
@endif
</div>
{{-- pagination ajax end--}}





  {{-- @if($courses->lastPage() > 1)
    <style>
        .pagination-link {
            margin-left: 5px;
            margin-right: 5px;
        }
    </style>
    <div class="columns">
        <div class="column" onclick="window.scrollTo(0, 0);">
            <nav class="pagination" role="navigation" aria-label="pagination" style="padding-left: 15px;">
              <div class="pagination">
                @for ($i = 1; $i<=$courses->lastPage();$i++)
                    @if($i == $courses->currentPage())
                    <span class="current page pagination-link is-current">{{ $i }}</span>
                    @else
                    <a href="{{ request()->fullUrl() }}@if(empty($_GET))?page=@else&page=@endif{{ $i }}" class="page pagination-link">{{ $i }}</a>
                    @endif
                @endfor
                
                start <a href="?page=2" class="page pagination-link">2</a>
                <a href="?page=3" class="page pagination-link">3</a>
                <a href="?page=4" class="page pagination-link">4</a>
                <a href="?page=5" class="page pagination-link">5</a>
                ...end
                <a href="{{request()->fullUrl()}}@if(empty($_GET))?page=@else&page=@endif{{ $courses->currentPage() == $courses->lastPage() ? 1 :  $courses->currentPage()+1 }}" class="next pagination-link">&gt;</a>
              </div>
            </nav>
        </div>
    </div>
    @endif --}}



</div>
    </div>
  </div>
</div>




