@section('title')
    Admin - Therapist Edit
@endsection

@extends('Backend.layouts.layouts')
@section('style')
<style>
    .select2-selection__rendered {
    line-height: 40px !important;
}
.select2-container .select2-selection--single {
    height: 45px !important;
}
.select2-selection__arrow {
    height: 44px !important;
}
form label{
    color: #111;
    font-weight: 500;
}
</style>
@endsection

@section('main_contain')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader">
          <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('admin.dashboard')}}">Home</a>
            <a class="breadcrumb-item" href="{{route('admin.therapy.index')}}"> <i class="icon ion-reply text-22"></i> All Therapists</a>
          </nav>
        </div><!-- br-pageheader -->

        <div class="br-pagebody">
          <div class="br-section-wrapper">
            <h6 class="br-section-label text-center mb-4">Update Therapist</h6>
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

                    <form action="{{ route('admin.therapy.update', $therapy->id) }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <label class="form-control-label">Therapist Image: <span class="tx-danger">*</span></label>
                                <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 150px;">
                                    <img class="display-upload-img" style="width: 150px;height: 70px;" src="{{ $therapy->image_show }}" alt="">
                                    <input type="file" name="image" class="form-control upload-img" placeholder="Enter Activity Image" style="position: absolute;top: 0;opacity: 0;height: 100%;">
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-sm-4">
                                <label class="form-control-label">First Name: <span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <input type="text" name="fname" class="form-control" value="{{ $therapy->fname }}">
                            </div>
                            </div>
                            <div class="col-sm-4">
                                <label class="form-control-label">Last Name:</label>
                            <div class="mg-t-10 mg-sm-t-0">
                            <input type="text" name="lname" class="form-control" value="{{ $therapy->lname }}">
                            </div>
                            </div>
                            <div class="col-sm-4">
                                <label class="form-control-label">Email: <span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input type="email" name="email" class="form-control" value="{{ $therapy->email }}">
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">

                            <div class="col-sm-4">
                                <label class="form-control-label">Mobile Number: <span class="tx-danger">*</span></label>
                                <div class="cmg-t-10 mg-sm-t-0">
                                    <input type="number" name="mobile" class="form-control" value="{{ $therapy->mobile }}">
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <label class="form-control-label">Gender: <span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <select class="form-control select2" name="gender">
                                        <option value="">Select </option>
                                        <option value="0" @if($therapy->gender == "0") Selected @endif>Male</option>
                                        <option value="1" @if($therapy->gender == "1") Selected @endif>Female</option>
                                    </select>
                                </div>
                            </div>
                            

                            <div class="col-sm-4">
                                <label class="form-control-label">Consultant Category:</label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <select class="form-control" name="therapy_category">
                                        <option value="">Select Consultant Category</option>
                                        <option @if($therapy->therapy_category == "physical_medicine") Selected @endif value="physical_medicine">Physical Medicine Consultant</option>
                                        <option @if($therapy->therapy_category == "physiotherapist") Selected @endif value="physiotherapist">Physiotherapist Consultant</option>
                                    </select>
                                </div>
                            </div>

                        </div>

                       


                        <div class="row mt-4">
                            <div class="col-sm-4">
                                <label class="form-control-label">Hospital Name:</label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <input type="text" name="hospital_name" class="form-control" value="{{ $therapy->hospital_name }}">
                            </div>
                            </div>
                            <div class="col-sm-4">
                                <label class=" form-control-label">Bmdc Registration:</label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <input type="text" name="bmdc_number" class="form-control" value="{{ $therapy->bmdc_number }}">
                            </div>
                            </div>
                            <div class="col-sm-4">
                                <label class="form-control-label">NID:</label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <input type="text" name="nid" class="form-control" value="{{ $therapy->nid }}">
                            </div>
                            </div>

                        </div>


                        <div class="row mt-4">
                            <div class="col-sm-4">
                                <label class="form-control-label">Experience Year:</label>
                            <div class="mg-t-10 mg-sm-t-0">
                                <input type="number" name="experience_year" class="form-control" value="{{ $therapy->experience_year }}">
                            </div>
                            </div>
                            <div class="col-sm-4">
                                <label class="form-control-label">Fee:</label>
                            <div class="mg-t-10 mg-sm-t-0">
                                <input type="number" name="fee" class="form-control" value="{{ $therapy->fee }}">
                            </div>
                            </div>
                            <div class="col-sm-4">
                                <label class="form-control-label">Pre Fee:</label>
                            <div class="mg-t-10 mg-sm-t-0">
                                <input type="number" name="pre_fee" class="form-control" value="{{ $therapy->pre_fee }}">
                            </div>
                            </div>
                        </div>

                        </div>

                        <div class="row mt-4">
                            <div class="col-sm-4">
                                <label class="form-control-label">Video Thumbnail: <span class="tx-danger"></span></label>
                                <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 150px;">
                                    <img class="display-upload-img" style="width: 150px;height: 70px;" src="{{ $therapy->video_thumbnail_show}}" alt="">
                                    <input type="file" name="video_thumbnail" class="form-control upload-img" placeholder="Enter Activity Image" style="position: absolute;top: 0;opacity: 0;height: 100%;">
                                </div>
                            </div>
                            <div class="col-sm-4 col-lg-8">
                                <label class="form-control-label">Video Link:</label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <input type="text" name="video_file" class="form-control" value="{{ $therapy->video }}">
                            </div>
                            </div>
                            {{-- <div class="col-sm-6">
                                <label class="form-control-label">Video File: <span class="tx-danger"></span></label>
                                <input type="file" name="video_file" value="{{ $therapy->video }}" class="form-control" placeholder="Enter  video">
                            </div> --}}

                        </div>
                        <div class="row mt-4">
                            <div class="col-sm-6">
                                <label class="form-control-label">Address:</label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <textarea value="{{ old('address') }}" name="address"  class="form-control">{!! $therapy->address !!}</textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-control-label">Speciality:</label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <textarea name="speciality"  class="form-control" placeholder="Enter Speciality">{!! $therapy->speciality !!}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-sm-6">
                                <label class="form-control-label">Eudcation:</label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <textarea name="education" id="summernote_two" class="form-control">{!! $therapy->education !!}</textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-control-label">Experience: </label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <textarea name="experience" id="summernote_three" class="form-control" >{!! $therapy->experience !!}</textarea>
                            </div>
                            </div>
                        </div>
                       

              

                <div class="row mt-4">
                    <div class="col-sm-12">
                        <label class="form-control-label">About The Therapist:</label>
                    <div class="mg-t-10 mg-sm-t-0">
                    <textarea name="details" id="summernote" class="form-control">{!! $therapy->details !!}</textarea>
                </div>
                    </div>
                </div>

                        <div class="row mt-4">
                          <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-right">
                            <a href="{{route('admin.doctor.index')}}" type="button" class="btn btn-secondary text-white mr-2" >Cancel</a>
                            <button type="submit" class="btn btn-info ">Update</button>
                          </div>
                        </div>
                    {{-- </form> --}}

                </div><!-- form-layout -->
            </div><!-- col-6 -->
            <!----- Start Add Category Form input ------->
          </div><!-- br-section-wrapper -->
        </div><!-- br-pagebody -->

    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

@endsection


@section('script')

<script>
    //Doctor Chambers js
    $(document).ready(function() {
        $('#plus-btn-data-unit').on('click',function(){

            var myvarschedules = '<div class="d-flex align-items-center mt-3">'+
'                                    <div class="d-flex align-items-center select-add-section" style="width: 97%;">'+
'                                        <input min="0" type="text" name="chamber_name[]" class=" form-control discount_amount" placeholder="Enter Doctor Chambers">'+
'                                        <select class="form-control ml-2" name="onlinestatus[]">'+
'                                            <option><-- Select--></option>'+
'                                            <option value="online">Online</option>'+
'                                            <option value="Offline">Offline</option>'+
'                                        </select>'+
''+
'                                    </div>'+
'                                    <a href="javascript:void(0)" class="minus-btn-schedules px-1 p-0 m-0 ml-2"><i class="fas fa-minus-circle"></i></a>'+
'                                    </div>';


            $('.add-data-show').prepend(myvarschedules);
            //console.log();
        });
        $(document).on('click','.minus-btn-schedules',function(){
            $(this).parent().remove();
        });
        $(document).on('click','.dctorchamber-btn-data-old',function(){
            $(this).parent().parent().append('<input type="hidden" name="delete_chamber[]" value="'+$(this).attr('dctorchamber_id')+'">');
            $(this).parent().remove();
        });
    });
</script>



<script>

    $(document).ready(function() {
        $('#plus-btn-data').on('click',function(){


var myvar = '<div class="d-flex align-items-center mt-2">'+
'                             <div class="d-flex align-items-center select-add-section" style="width: 97%;">'+
'                                <select class="form-control" name="day[]">'+
'                                    <option><-- Select Day --></option>'+
'                                    <option>Sunday</option>'+
'                                    <option>Monday</option>'+
'                                    <option>Tuesday</option>'+
'                                    <option>Wednesday</option>'+
'                                    <option>Thursday</option>'+
'                                    <option>Friday</option>'+
'                                    <option>Saturday</option>'+
'                                </select>'+
'                                <input type="time" name="start_time[]" class="ml-2 form-control" placeholder="Start Time">'+
'                                <input type="time" name="end_time[]" class="ml-2 form-control" placeholder="End Time">'+
''+
'                            </div>'+
''+
'                             <a href="javascript:void(0)" class="minus-btn-data px-1 p-0 m-0 ml-2"><i class="fas fa-minus-circle"></i></a>'+
'                            </div>';


            $('.add-data').prepend(myvar);
            //console.log();
        });
        $(document).on('click','.minus-btn-data',function(){
            $(this).parent().remove();
        });
        $(document).on('click','.minus-btn-data-old',function(){
            $(this).parent().parent().append('<input type="hidden" name="delete_day[]" value="'+$(this).attr('schedule_id')+'">');
            $(this).parent().remove();
        });
    });
</script>
@endsection
