

@section('title')
    Admin - Add New Testimonial
@endsection

@extends('Backend.layouts.layouts')

@section('main_contain')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader">
          <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('admin.dashboard')}}">Home</a>
            <a class="breadcrumb-item" href="{{route('admin.student_appliction_list')}}"> <i class="icon ion-reply text-22"></i> All Applications</a>
          </nav>
        </div><!-- br-pageheader -->

            {{-- success message start --}}
            @if(session()->has('message'))
            <div class="alert alert-success">
            {{session()->get('message')}}
            </div>
            <script>
                setTimeout(function(){
                    $('.alert.alert-success').hide();
                }, 3000);
            </script>
            @endif
            {{-- success message start --}}


        <div class="br-pagebody">
          <div class="br-section-wrapper">
            {{-- <h6 class="br-section-label text-center mb-4"> Add New Testimonial</h6> --}}
            {{-- validate start  --}}
            @if(count($errors) > 0)
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
            @endif
            {{-- validate End  --}}
            <!----- Start Add Category Form input ------->
            <div class="col-xl-12 mx-auto">
                <div class="form-layout form-layout-4 py-5">

                    <div class="row ">

                        <div class="col-lg-12 mt-3">
                            <h2 class="text-center mb-5" style="color: black"><b>{{ @$s_appliction->student->name }}'s Application Details</b></h2>
                            <b><h4>Program Information</b></h4>
                            <hr>
                        </div>
                
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="address"><b>{{ __('Application Code:') }}</b></label>
                                <p>{{ $s_appliction->application_code }}</p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="address"><b>{{ __('Program Name:') }}</b></label>
                                @foreach ($s_appliction->carts as $cart)
                                <p>{{ @$cart->course->name }}</p>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="address"><b>{{ __('University Name:') }}</b></label>
                                @foreach ($s_appliction->carts as $cart)
                                <p>{{ @$cart->course->university->name }}</p>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="address"><b>{{ __('Continent Name:') }}</b></label>
                                @foreach ($s_appliction->carts as $cart)
                                <p>{{ @$cart->course->university->continent->name }}</p>
                                @endforeach
                            </div>
                        </div>
                
                
                
                        <div class="col-lg-12 mt-3">
                            <b><h4>Personal Information</b></h4>
                            <hr>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="address"><b>{{ __('First Name:') }}</b></label>
                                <p>{{ $s_appliction->first_name }}</p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="address"><b>{{ __('Middle Name:') }}</b></label>
                                <p>{{ $s_appliction->middle_name }}</p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="address"><b>{{ __('Last Name:') }}</b></label>
                                <p>{{ $s_appliction->last_name }}</p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="address"><b>{{ __('chinese Name:') }}</b></label>
                                <p>{{ $s_appliction->chinese_name }}</p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="address"><b>{{ __('Phone:') }}</b></label>
                                <p>{{ $s_appliction->phone }}</p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="address"><b>{{ __('Email:') }}</b></label>
                                <p>{{ $s_appliction->email }}</p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="address"><b>{{ __('Date of Birth:') }}</b></label>
                                <p>{{ $s_appliction->dob }}</p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="address"><b>{{ __('Birth Place:') }}</b></label>
                                <p>{{ $s_appliction->birth_place }}</p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="address"><b>{{ __('Passport Number:') }}</b></label>
                                <p>{{ $s_appliction->passport_number }}</p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="address"><b>{{ __('Passport Exipre Date:') }}</b></label>
                                <p>{{ $s_appliction->passport_exipre_date }}</p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="address"><b>{{ __('Nationality:') }}</b></label>
                                <p>{{ @$s_appliction->nationality_country->name }}</p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="address"><b>{{ __('Religion:') }}</b></label>
                                <p>{{ $s_appliction->religion }}</p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="address"><b>{{ __('Gender:') }}</b></label>
                                <p>{{ $s_appliction->gender }}</p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="address"><b>{{ __('Maritial Status:') }}</b></label>
                                <p>{{ $s_appliction->maritial_status }}</p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="address"><b>{{ __('In Chaina:') }}</b></label>
                                <p>@if ($s_appliction->in_chaina == 1)
                                    No
                                    @else
                                    Yes
                                @endif</p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="address"><b>{{ __('In Alcoholic:') }}</b></label>
                                <p>@if ($s_appliction->in_alcoholic == 1)
                                    No
                                    @else
                                    Yes
                                @endif</p>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="address"><b>{{ __('Hobby:') }}</b></label>
                                <p>{{ $s_appliction->hobby }}</p>
                            </div>
                        </div>
                
                
                        <div class="col-lg-12 mt-3">
                            <b><h4>Language Proficiency</b></h4>
                            <hr>
                        </div>
                
                        
                
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="address"><b>{{ __('Native Language:') }}</b></label>
                                <p>{{ $s_appliction->native_language }}</p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="address"><b>{{ __('English Level:') }}</b></label>
                                <p>@if ($s_appliction->english_level == 0)
                                    Can't speak English at all
                                    @elseif ($s_appliction->english_level == 1)
                                    Beginner - not currently good enough to study in English
                                    @elseif ($s_appliction->english_level == 2)
                                    Intermediate - OK but needs some work
                                    @elseif ($s_appliction->english_level == 3)
                                    Fluent - very good level               
                                    @elseif ($s_appliction->english_level == 4)
                                    Native English            
                                @endif</p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="address"><b>{{ __('Chinese Level:') }}</b></label>
                                <p>@if ($s_appliction->chinese_level == 0)
                                    Can't speak English at all
                                    @elseif ($s_appliction->chinese_level == 1)
                                    Beginner - not currently good enough to study in English
                                    @elseif ($s_appliction->chinese_level == 2)
                                    Intermediate - OK but needs some work
                                    @elseif ($s_appliction->chinese_level == 3)
                                    Fluent - very good level               
                                    @elseif ($s_appliction->chinese_level == 4)
                                    Native English            
                                @endif</p>
                            </div>
                        </div>
                
                        <div class="col-lg-12 mt-3">
                            <b><h4>Home Address Details</b></h4>
                            <hr>
                        </div>
                
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="address"><b>{{ __('Home Country:') }}</b></label>
                                <p>{{ $s_appliction->home_country }}</p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="address"><b>{{ __('Home City:') }}</b></label>
                                <p>{{ $s_appliction->home_city }}</p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="address"><b>{{ __('Home District:') }}</b></label>
                                <p>{{ $s_appliction->home_district }}</p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="address"><b>{{ __('Home Street:') }}</b></label>
                                <p>{{ $s_appliction->home_street }}</p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="address"><b>{{ __('Home Zip Code:') }}</b></label>
                                <p>{{ $s_appliction->home_zipcode }}</p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="address"><b>{{ __('Home Contact Name:') }}</b></label>
                                <p>{{ $s_appliction->home_contact_name }}</p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="address"><b>{{ __('Home Contact Phone:') }}</b></label>
                                <p>{{ $s_appliction->home_contact_phone }}</p>
                            </div>
                        </div>
                
                        <div class="col-lg-12 mt-3">
                            <b><h4>Postal Address Details</b></h4>
                            <hr>
                        </div>
                
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="address"><b>{{ __('Current Country:') }}</b></label>
                                <p>{{ $s_appliction->current_country }}</p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="address"><b>{{ __('Current City:') }}</b></label>
                                <p>{{ $s_appliction->current_city }}</p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="address"><b>{{ __('Current District:') }}</b></label>
                                <p>{{ $s_appliction->current_district }}</p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="address"><b>{{ __('Current Street:') }}</b></label>
                                <p>{{ $s_appliction->current_street }}</p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="address"><b>{{ __('Current Zip Code:') }}</b></label>
                                <p>{{ $s_appliction->current_zipcode }}</p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="address"><b>{{ __('Current Contact Name:') }}</b></label>
                                <p>{{ $s_appliction->current_contact_name }}</p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="address"><b>{{ __('Current Contact Phone:') }}</b></label>
                                <p>{{ $s_appliction->current_contact_phone }}</p>
                            </div>
                        </div>
                
                        <div class="col-lg-12 mt-3">
                            <b><h4>Education Background</b></h4>
                            <hr>
                        </div>
                
                        @foreach ($s_appliction->educations as $item)
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="address"><b>{{ __('School:') }}</b></label>
                                <p>{{ @$item->major }}</p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="address"><b>{{ __('Start Date:') }}</b></label>
                                <p>{{ @$item->start_date }}</p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="address"><b>{{ __('End Date:') }}</b></label>
                                <p>{{ @$item->end_date }}</p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="address"><b>{{ __('Gpa Type:') }}</b></label>
                                <p>@if ($item->gpa_type == 0)
                                    Very Low (Grade E Average, 40% or less, GPA 1.5 or less)
                                    @elseif ($item->gpa_type == 1)
                                    Below average - (Grade D Average, 45%- 55%, GPA 1.5-2)
                                    @elseif ($item->gpa_type == 2)
                                    Average level - (Grade C-B, 55% - 60%, GPA 2-2.5%)
                                    @elseif ($item->gpa_type == 3)
                                    Above average - (Grade B-A, 60-70%, GPA 2.5-3) 
                                    @elseif ($item->gpa_type == 4)
                                    Exceptional - (Grade A, 70%+, GPA 3+)       
                                @endif</p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="address"><b>{{ __('Country:') }}</b></label>
                                <p>{{ @$item->country }}</p>
                            </div>
                        </div>
                        @endforeach
                
                        
                        <div class="col-lg-12 mt-3">
                            <b><h4>Work Experience</b></h4>
                            <hr>
                        </div>
                
                        @foreach ($s_appliction->work_experiences as $item)
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="address"><b>{{ __('Company:') }}</b></label>
                                <p>{{ @$item->company }}</p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="address"><b>{{ __('Job Title:') }}</b></label>
                                <p>{{ @$item->job_title }}</p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="address"><b>{{ __('Start Date:') }}</b></label>
                                <p>{{ @$item->start_date }}</p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="address"><b>{{ __('End Date:') }}</b></label>
                                <p>{{ @$item->end_date }}</p>
                            </div>
                        </div>
                        {{-- <div class="col-lg-3">
                            <div class="form-group">
                                <label for="address"><b>{{ __('Gpa Type:') }}</b></label>
                                <p>{{ @$item->gpa_type }}</p>
                            </div>
                        </div> --}}
                        {{-- <div class="col-lg-3">
                            <div class="form-group">
                                <label for="address"><b>{{ __('Country:') }}</b></label>
                                <p>{{ @$item->country }}</p>
                            </div>
                        </div> --}}
                        @endforeach
                
                
                        <div class="col-lg-12 mt-3">
                            <b><h4>Family Information</b></h4>
                            <hr>
                        </div>
                
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="address"><b>{{ __('Father Name:') }}</b></label>
                                <p>{{ $s_appliction->father_name }}</p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="address"><b>{{ __('Father Nnationlity:') }}</b></label>
                                <p>{{ $s_appliction->father_nationlity }}</p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="address"><b>{{ __('Father Phone:') }}</b></label>
                                <p>{{ $s_appliction->father_phone }}</p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="address"><b>{{ __('Father Email:') }}</b></label>
                                <p>{{ $s_appliction->father_email }}</p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="address"><b>{{ __('Father Workplace:') }}</b></label>
                                <p>{{ $s_appliction->father_workplace }}</p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="address"><b>{{ __('Father Position:') }}</b></label>
                                <p>{{ $s_appliction->father_position }}</p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="address"><b>{{ __('Mother Name:') }}</b></label>
                                <p>{{ $s_appliction->mother_name }}</p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="address"><b>{{ __('Mother Nationlity:') }}</b></label>
                                <p>{{ $s_appliction->mother_nationlity }}</p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="address"><b>{{ __('Mother Phone:') }}</b></label>
                                <p>{{ $s_appliction->mother_phone }}</p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="address"><b>{{ __('Mother Email:') }}</b></label>
                                <p>{{ $s_appliction->mother_email }}</p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="address"><b>{{ __('Mother Workplace:') }}</b></label>
                                <p>{{ $s_appliction->mother_workplace }}</p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="address"><b>{{ __('Mother Position:') }}</b></label>
                                <p>{{ $s_appliction->mother_position }}</p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="address"><b>{{ __('Guarantor Relationship:') }}</b></label>
                                <p>{{ $s_appliction->guarantor_relationship }}</p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="address"><b>{{ __('Guarantor Name:') }}</b></label>
                                <p>{{ $s_appliction->guarantor_name }}</p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="address"><b>{{ __('Guarantor Address:') }}</b></label>
                                <p>{{ $s_appliction->guarantor_address }}</p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="address"><b>{{ __('Guarantor Phone:') }}</b></label>
                                <p>{{ $s_appliction->guarantor_phone }}</p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="address"><b>{{ __('Guarantor Email:') }}</b></label>
                                <p>{{ $s_appliction->guarantor_email }}</p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="address"><b>{{ __('Guarantor Workplace:') }}</b></label>
                                <p>{{ $s_appliction->guarantor_workplace }}</p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="address"><b>{{ __('Guarantor Work Address:') }}</b></label>
                                <p>{{ $s_appliction->guarantor_work_address }}</p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="address"><b>{{ __('Study Fund:') }}</b></label>
                                <p>{{ $s_appliction->study_fund }}</p>
                            </div>
                        </div>
                
                        <div class="col-lg-12 mt-3">
                            <b><h4>Contact in Case of Emergencies</b></h4>
                            <hr>
                        </div>
                
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="address"><b>{{ __('Emergency Contact Name:') }}</b></label>
                                <p>{{ $s_appliction->emergency_contact_name }}</p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="address"><b>{{ __('Emergency Contact Phone:') }}</b></label>
                                <p>{{ $s_appliction->emergency_contact_phone }}</p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="address"><b>{{ __('Emergency Contact Email:') }}</b></label>
                                <p>{{ $s_appliction->emergency_contact_email }}</p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="address"><b>{{ __('Emergency Contact Address:') }}</b></label>
                                <p>{{ $s_appliction->emergency_contact_address }}</p>
                            </div>
                        </div>
                
                
                
                        <div class="col-lg-12 mt-3">
                            <b><h4>Documentation</b></h4>
                            <hr>
                        </div>
                
                
                        @foreach ($s_appliction->documents as $k => $document)
                            
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="address"><b>{{$loop->iteration}}. {{ __( $document->document_name ) }}</b></label>
                                <div class="row">
                                    {{-- <div class="col-md-8">
                                        <p>{{ $document->document_file }}</p>
                                    </div> --}}
                                    <div class="col-md-6">
                                        <button style="margin-left: 18px" type="button" data-toggle="modal" data-target="#certificateModal{{ $k }}" class="btn btn-primary"><i class="fa fa-solid fa-eye"></i> Details</button>
                                    {{-- </div>
                                    <div class="col-md-6"> --}}
                                        <a href="{{ route('admin.application-file-download', $document->id) }}" class="btn btn-primary"><i class="fa fa-solid fa-download"></i> Download</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                
                
                         <!-- Modal -->
                         <div class="modal fade" id="certificateModal{{ $k }}" tabindex="-1" role="dialog" aria-labelledby="audioModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="audioModalLabel" style="color: black">{{ $document->document_name }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                @if ($document->extensions == 'pdf')
                                    <iframe src="{{ $document->document_file_show  }}" width="100%" height="500"></iframe>
                                @else
                                <img src="{{ $document->document_file_show  }}" alt="image" style="height: 300px; width:450px">
                                @endif
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                            </div>
                        </div>
                
                
                        @endforeach
                    </div>

                </div><!-- form-layout -->
            </div><!-- col-6 -->
            <!----- Start Add Category Form input ------->
          </div><!-- br-section-wrapper -->
        </div><!-- br-pagebody -->

    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->







@endsection




















