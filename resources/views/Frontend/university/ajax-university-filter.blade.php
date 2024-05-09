<div class="column is-2">
    <div class="filters-button">
        <span class="filter-open"><img src="https://d2xtzyi0kjzog2.cloudfront.net/static/assets/assets_new_design/img/icons/filter.642602b57b41.svg"
                alt="filters">Filters</span>
        <span class="filter-opened"> <img src="https://d2xtzyi0kjzog2.cloudfront.net/static/assets/assets_new_design/img/icons/filter.642602b57b41.svg"
                alt="filters">Close Filters</span>
    </div>
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
                            <input type="checkbox" name="continent" value="{{ $continent->id }}" @if($select_continent == $continent->id) @checked(true) @endif class="search-checkbox checkbox_unselected city_find">
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
        @if($countries->count() > 0)
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
        @if($states->count() > 0)
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
        @if($cities->count() > 0)
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
                    @if($select_search != "")
                    <span class="tag filterTags" data-field="search_val" data-keyword="{{$select_search }}">{{ $select_search }}<span class="delete-tag">X</span></span>
                    @endif
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