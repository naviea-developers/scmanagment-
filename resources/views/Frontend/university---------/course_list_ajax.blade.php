@foreach ($courses as $course)
<div class="columns">
    <div class="column">
            <div class="display-flex" style="position: relative;">
                <div class="choice s-col-11 search-page-list-item">
                    <div class="choice-wrapper" data-url="/d/pBUSTNKU0/chinese-blcc-ustb-scholarship-program-13-at-university-science-and-technology-beijing/">
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
                                    {{-- <span><i class="fa fa-map-marker"></i>{{ @$continent->name }} </span> --}}
                                    <span><i class="fa fa-map-marker"></i>{{ @$course->university->continent->name }} , {{ @$course->university->country->name }} , {{ @$course->university->state->name }} , {{ @$course->university->city->name }} </span>
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