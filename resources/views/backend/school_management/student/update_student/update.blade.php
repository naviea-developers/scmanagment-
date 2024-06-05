@section('title')
    Admin - Student Info Update
@endsection

@extends('Backend.layouts.layouts')

@section('main_contain')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader">
          <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('admin.dashboard')}}">Home</a>
            <a class="breadcrumb-item" href="{{route('admin.student_info_update.index')}}"> <i class="icon ion-reply text-22"></i> All Student Update info</a>
          </nav>
        </div><!-- br-pageheader -->

        <div class="br-pagebody">
          <div class="br-section-wrapper">
            <h6 class="br-section-label text-center mb-4">Update Subject Info</h6>
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

                    <form action="{{ route('admin.student_info_update.update', $student->id) }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row ">
                            <div class="col-sm-4" >
                                <label class="form-control-label">Student Image: </label>
                                <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 150px;">
                                    <img class="display-upload-img" style="width: 150px;height: 70px;" src="{{ $student->image_show }}" alt="">
                                    <input type="file" name="image" class="form-control upload-img" placeholder="Enter Activity Image" style="position: absolute;top: 0;opacity: 0;height: 100%;">
                                </div>
                            </div>
                        </div>
    
                            <div class="row mt-4">
    
    
                                        <hr class="mt-3">

                                    <input type="hidden" name="user_id" value="{{ $student->user_id }}"/>

                                        <div class="col-sm-4 mt-3">
                                            <label class="form-control-label">Student ID: </label>
                                            <div class="mg-t-10 mg-sm-t-0">
                                                <input type="text" name="" class="form-control" placeholder="" value="{{ $student->student_id_number }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 mt-3">
                                            <label class="form-control-label">Student Name: </label>
                                            <div class="mg-t-10 mg-sm-t-0">
                                                <input type="text" name="student_name" class="form-control" placeholder="Enter Student Name" value="{{ $student->student_name }}" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 mt-3">
                                            <label class="form-control-label">Date of Birth: </label>
                                            <div class="mg-t-10 mg-sm-t-0">
                                                <input type="date" name="dob" class="form-control" placeholder="Enter Student Age" value="{{ $student->dob }}" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 mt-3">
                                            <label class="form-control-label">Student Phone: </label>
                                            <div class="mg-t-10 mg-sm-t-0">
                                                <input type="text" name="student_phone" class="form-control" placeholder="Enter Student Phone Num" value="{{ $student->student_phone }}" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 mt-3">
                                            <label class="form-control-label">Student Email: </label>
                                            <div class="mg-t-10 mg-sm-t-0">
                                                <input type="email" name="student_email" class="form-control" placeholder="Enter Student Email" value="{{ $student->student_email }}" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 mt-3">
                                            <label class="form-control-label">Student NID/Birth Certificate: </label>
                                            <div class="mg-t-10 mg-sm-t-0">
                                                <input type="text" name="student_nid" class="form-control" placeholder="Enter NID/Birth Certificate" value="{{ $student->student_nid }}" required>
                                            </div>
                                        </div>
    
    
    
                                        <div class="col-sm-4 mt-3">
                                            <label class=" form-control-label">Blood Group: </label>
                                            <select class="form-control" name="blood_group" >
                                                <option value="">Select Blood Group</option>
                                                <option @if ($student->blood_group == 'o+') Selected @endif value="o+">O Positive (O+)</option>
                                                <option @if ($student->blood_group == 'o-') Selected @endif value="o-">O Negative (O-)</option>
                                                <option @if ($student->blood_group == 'a+') Selected @endif value="a+">A Positive (A+)</option>
                                                <option @if ($student->blood_group == 'a-') Selected @endif value="a-">A Negative (A-)</option>
                                                <option @if ($student->blood_group == 'b+') Selected @endif value="b+">B Positive (B+)</option>
                                                <option @if ($student->blood_group == 'b-') Selected @endif value="b-">B Negative (B-)</option>
                                                <option @if ($student->blood_group == 'ab+') Selected @endif value="ab+">AB Positive (AB+)</option>
                                                <option @if ($student->blood_group == 'ab-') Selected @endif value="ab-">AB Negative (AB-)</option>
                                            </select>
                                        </div>
            
    
                                        <div class="col-sm-4 mt-3">
                                            <label class="form-control-label">Father Name : </label>
                                            <div class="mg-t-10 mg-sm-t-0">
                                                <input type="text" name="father_name" class="form-control" placeholder="Enter Father Name" value="{{ $student->father_name }}" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 mt-3">
                                            <label class="form-control-label">Father Occupation : </label>
                                            <div class="mg-t-10 mg-sm-t-0">
                                                <input type="text" name="father_occupation" class="form-control" placeholder="Enter Father Occupation" value="{{ $student->father_occupation }}" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 mt-3">
                                            <label class="form-control-label">Father Phone : </label>
                                            <div class="mg-t-10 mg-sm-t-0">
                                                <input type="text" name="father_phone" class="form-control" placeholder="Enter Father Phone Number" value="{{ $student->father_phone }}" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 mt-3">
                                            <label class="form-control-label">Father NID : </label>
                                            <div class="mg-t-10 mg-sm-t-0">
                                                <input type="text" name="father_nid" class="form-control" placeholder="Enter Father NID" value="{{ $student->father_nid }}" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 mt-3">
                                            <label class="form-control-label">Mother Name : </label>
                                            <div class="mg-t-10 mg-sm-t-0">
                                                <input type="text" name="mother_name" class="form-control" placeholder="Enter Mother Name" value="{{ $student->mother_name }}" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 mt-3">
                                            <label class="form-control-label">Mother Occupation : </label>
                                            <div class="mg-t-10 mg-sm-t-0">
                                                <input type="text" name="mother_occupation" class="form-control" placeholder="Enter Mother Occupation" value="{{$student->mother_occupation }}" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 mt-3">
                                            <label class="form-control-label">Mother Phone : </label>
                                            <div class="mg-t-10 mg-sm-t-0">
                                                <input type="text" name="mother_phone" class="form-control" placeholder="Enter Mother Phone Number" value="{{$student->mother_phone }}" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 mt-3">
                                            <label class="form-control-label">Yearly Income : </label>
                                            <div class="mg-t-10 mg-sm-t-0">
                                                <input type="number" name="yearly_income" class="form-control" placeholder="Enter Yearly Income" value="{{$student->yearly_income }}" required>
                                            </div>
                                        </div>
    
    
    
    
                                        <hr class="mt-3">
                                        <h4>Present Address</h4>
                                        <div class="col-sm-4 mt-3">
                                            <label class=" form-control-label">Continent Name:</label>
                                            <select id="continent"  class="form-control" name="present_continent_id" >
                                                <option value="">Select Continent</option>
                                                @foreach ($continents as $continent)
                                                <option @if ($continent->id == $student->present_continent_id) Selected @endif value="{{ $continent->id }}">{{ $continent->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
        
                                        <div class="col-sm-4 mt-3">
                                            <label class=" form-control-label">Country Name:</label>
                                            <select  class="form-control" name="present_country_id" id="country" >
                                                <option value="">Select Country</option>
                                                @foreach ($countries as $country)
                                                <option @if ($country->id == $student->present_country_id) Selected @endif value="{{ $country->id }}">{{ $country->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
        
                                        <div class="col-sm-4 mt-3">
                                            <label class=" form-control-label">State Name:</label>
                                            <select  class="form-control state" name="present_state_id" id="state" >
                                                <option value="">Select State</option>
                                                @foreach ($states as $state)
                                                <option @if ($state->id == $student->present_state_id) Selected @endif value="{{ $state->id }}">{{ $state->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
        
                                        <div class="col-sm-4 mt-3">
                                            <label class=" form-control-label">City Name:</label>
                                            <select  class="form-control" name="present_city_id" id="city" >
                                                <option value="">Select City</option>
                                                @foreach ($cities as $city)
                                                <option @if ($city->id == $student->present_city_id) Selected @endif value="{{ $city->id }}">{{ $city->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
    
    
                        
                                        <div class="col-sm-8 mt-3">
                                            <label class="form-control-label">Address: </label>
                                            <div class="mg-t-10 mg-sm-t-0">
                                                <input type="text" name="present_address" class="form-control" placeholder="Enter Present Address" value="{{ $student->present_address }}" >
                                            </div>
                                        </div>
    
    
    
    
                                        <hr class="mt-3">
                                        <h4>Permanent Address</h4>
                                        <div class="col-sm-4 mt-3">
                                            <label class=" form-control-label">Continent Name:</label>
                                            <select id="continent1"  class="form-control" name="permanent_continent_id" >
                                                <option value="">Select Continent</option>
                                                @foreach ($continents as $continent)
                                                <option @if ($continent->id == $student->permanent_continent_id) Selected @endif value="{{ $continent->id }}">{{ $continent->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
        
                                        <div class="col-sm-4 mt-3">
                                            <label class=" form-control-label">Country Name:</label>
                                            <select  class="form-control" name="permanent_country_id" id="country1" >
                                                <option value="">Select Country</option>
                                                @foreach ($countries as $country)
                                                <option @if ($country->id == $student->permanent_country_id) Selected @endif value="{{ $country->id }}">{{ $country->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
        
                                        <div class="col-sm-4 mt-3">
                                            <label class=" form-control-label">State Name:</label>
                                            <select  class="form-control" name="permanent_state_id" id="state1" >
                                                <option value="">Select State</option>
                                                @foreach ($states as $state)
                                                <option @if ($state->id == $student->permanent_state_id) Selected @endif value="{{ $state->id }}">{{ $state->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
        
                                        <div class="col-sm-4 mt-3">
                                            <label class=" form-control-label">City Name:</label>
                                            <select  class="form-control" name="permanent_city_id" id="city1" >
                                                <option value="">Select City</option>
                                                @foreach ($cities as $city)
                                                <option @if ($city->id == $student->permanent_city_id) Selected @endif value="{{ $city->id }}">{{ $city->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
    
                                        <div class="col-sm-8 mt-3">
                                            <label class="form-control-label">Address: </label>
                                            <div class="mg-t-10 mg-sm-t-0">
                                                <input type="text" name="parmanent_address" class="form-control" placeholder="Enter Parmanent Address" value="{{$student->parmanent_address }}" >
                                            </div>
                                        </div>
    
    
                                        <hr class="mt-3">
    
                                        <div class="col-sm-12 mt-3">
                                            <label class="form-control-label">Reason (Why you want to update your profile?): </label>
                                            <div class="mg-t-10 mg-sm-t-0">
                                                <textarea type="text" name="reason" rows="5" class="form-control" placeholder="Enter your Reason here." >{{ $student->reason }}</textarea>
                                            </div>
                                        </div>
                                        
                            </div>
    
                        <div class="row mt-3">
                          <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-right">
                            <a href="{{route('admin.subject.index')}}" type="button" class="btn btn-secondary text-white mr-2" >Cancel</a>
                            <button type="submit" class="btn btn-info ">Approval </button>
                          </div>
                        </div>
                    </form>

                </div><!-- form-layout -->
            </div><!-- col-6 -->
            <!----- Start Add Category Form input ------->
          </div><!-- br-section-wrapper -->
        </div><!-- br-pagebody -->

    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

@endsection
