@section('title')
    Admin - Add New Event

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
            <a class="breadcrumb-item" href="{{route('admin.event.index')}}"> <i class="icon ion-reply text-22"></i> All Course</a>
          </nav>
        </div><!-- br-pageheader -->

        <div class="br-pagebody">
          <div class="br-section-wrapper">
            <h6 class="br-section-label text-center mb-4"> Add New Event</h6>
            {{-- validate start  --}}
            @if(session()->has('error_message'))
            <div class="alert alert-danger">{{ session()->get('error_message') }}</div>
            @endif
            @if(count($errors) > 0)
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
            @endif
            {{-- validate End  --}}
            <!----- Start Add Category Form input ------->
            <div class="col-xl-12 mx-auto">
                <div class="form-layout form-layout-4">

                    <form action="{{ route('admin.event.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row mt-4">

                            <div class="col-sm-4">
                                <label class="form-control-label"><b>Category :</b><span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <select id="cat"  class="form-control" name="category_id">
                                        <option value="">Select Category</option>
                                        @foreach ($categorys as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <label class="form-control-label"><b>Event Name :</b><span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Enter Event Name">
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <label class="form-control-label"><b>Star Date :</b></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input type="datetime-local" name="startdate" value="{{ old('startdate') }}" class="form-control" placeholder="Enter start time">
                                </div>
                            </div>


                        </div>

                        <div class="row mt-4">
                            <div class="col-sm-4">
                                <label class="form-control-label"><b>End Date :</b></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input type="datetime-local" name="enddate" value="{{ old('enddate') }}" class="form-control" placeholder="Enter end time">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label class="form-control-label"><b>Recording :</b></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <select class="form-control" name="recording">
                                        <option value="">Select recording</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>

                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <label class="form-control-label"><b>Event Language :</b></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <select class="form-control select2" name="language_id">
                                        <option value="">Select Language</option>
                                        <option value="0">Bangla</option>
                                        <option value="1">English</option>

                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="row mt-4">
                            <div class="col-sm-4">
                                <label class="form-control-label"><b>Event Fee :</b><span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input type="number" name="fee" value="{{ old('fee') }}" class="form-control" placeholder="Enter fee">
                                </div>
                            </div>

                            <div class="col-sm-4 ">
                                <label class="form-control-label"><b>Event Release :</b> <span class="tx-danger">*</span></label>
                                <select  class="form-control" name="release_id">
                                    <option value="">Select</option>
                                    <option  value="0">Passed Event </option>
                                    <option  value="1">Upcoming Event </option>
                                    <option  value="2">Live Event </option>
                                </select>
                            </div>

                            <div class="col-sm-4 ">
                                <label class="form-control-label">Host Name :<span class="tx-danger">*</span></label>
                                <select  class="form-control" name="host_id">
                                    <option value="">Select Host</option>
                                    @foreach ($hosts as $host)
                                    <option  value="{{ $host->id }}">{{ $host->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                            <div class="row mt-4">

                            <div class="col-sm-4">
                                <label class="form-control-label"><b>Organization Name :</b></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input type="text" name="organization_name" value="{{ old('organization_name') }}" class="form-control" placeholder="Organization Name">
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <label class="form-control-label"><b>Event Location :</b></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input type="text" name="location" value="{{ old('location') }}" class="form-control" placeholder="location Name">
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <label class="form-control-label"><b>Event Will Start Time :</b></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input type="datetime-local" name="eventstarttime" value="{{ old('eventstarttime') }}" class="form-control" placeholder="Enter Start Time">
                                </div>
                            </div>
                        </div>
                     <br>

                      {{-- Pre Requisites start --}}
                        <div class="row mt-4">
                            <div class="col-sm-12">
                                <label class="form-control-label"><b>Requisites :</b></label>
                                <div class="mg-t-10 mg-sm-t-0 add-data">
                                    <div class="d-flex align-items-center mt-2">
                                     <div class="d-flex align-items-center select-add-section" style="width: 97%;">
                                        <input type="text" name="requisites[]" value="{{ old('$requisites') }}" class="ml-2 form-control" placeholder="Enter Pre Requisites">
                                    </div>
                                    <a id="plus-btn-data" href="javascript:void(0)" class="plus-btn-data px-1 p-0 m-0 ml-2"><i class="fas fa-plus"></i></a>
                                    </div>
                                </div>
                            </div>

                        </div><!-- row -->
                      {{-- Pre Requisites End --}}

                       {{-- What Will I Learn start --}}
                        <div class="row mt-4">
                            <div class="col-sm-12">
                                <label class="form-control-label"><b>Course Learn :</b> </label>
                                <div class="mg-t-10 mg-sm-t-0 add-data-learn">
                                    <div class="d-flex align-items-center mt-2">
                                     <div class="d-flex align-items-center select-add-section" style="width: 97%;">
                                        <input type="text" name="course_learn[]" value="{{ old('$course_learn') }}" class="ml-2 form-control" placeholder="Enter Course Learn">
                                    </div>
                                    <a id="plus-btn-data-learn" href="javascript:void(0)" class="plus-btn-data-learn px-1 p-0 m-0 ml-2"><i class="fas fa-plus"></i></a>
                                    </div>
                                </div>
                            </div>

                        </div><!-- row -->
                       {{-- What Will I Learn End --}}

                    <div class="row mt-4">
                        <div class="col-sm-12">
                            <label class="form-control-label"><b>Event Schedule :</b> </label>
                            <table class="table border shadow" >
                                <tr class="text-center " style="background-color: #489780; color:white">
                                    <td>Instrutor</td>
                                    <td>Days</td>
                                    <td>Date</td>
                                    <td>Start Time</td>
                                    <td>End Time</td>
                                    <td>Name</td>
                                </tr>
                            </table>

                            <div class="mg-t-10 mg-sm-t-0 add-data-schedule">

                                <div class="d-flex align-items-center mt-2">
                                 <div class="d-flex align-items-center select-add-section" style="width: 97%;">
                                    <select class="form-control" name="instrutor_id[]">
                                        <option>select speakers</option>
                                        @foreach ($instrutors as $instrutor)
                                        <option value="{{ $instrutor->id }}">{{ $instrutor->name }}</option>
                                        @endforeach
                                    </select>
                                    <select class="form-control ml-1" name="day_id[]">
                                        <option>Select Day</option>
                                        <option value="1">Day 1</option>
                                        <option value="2">Day 2</option>
                                        <option value="3">Day 3</option>
                                        <option value="4">Day 4</option>
                                        <option value="5">Day 5</option>
                                        <option value="6">Day 6</option>
                                        <option value="7">Day 7</option>
                                        <option value="8">Day 8</option>
                                        <option value="9">Day 9</option>
                                        <option value="10">Day 10</option>
                                        <option value="11">Day 11</option>
                                        <option value="12">Day 12</option>
                                        <option value="13">Day 13</option>
                                        <option value="14">Day 14</option>
                                        <option value="15">Day 15</option>
                                        <option value="16">Day 16</option>
                                        <option value="17">Day 17</option>
                                        <option value="18">Day 18</option>
                                        <option value="19">Day 19</option>
                                        <option value="20">Day 20</option>
                                        <option value="21">Day 21</option>
                                        <option value="22">Day 22</option>
                                        <option value="23">Day 23</option>
                                        <option value="24">Day 24</option>
                                        <option value="25">Day 25</option>
                                        <option value="26">Day 26</option>
                                        <option value="27">Day 27</option>
                                        <option value="28">Day 28</option>
                                        <option value="29">Day 29</option>
                                        <option value="30">Day 30</option>
                                        <option value="31">Day 31</option>

                                    </select>
                                    <input type="date" name="scheduledate[]" class="ml-1 form-control" placeholder="Start Time">
                                    <input type="time" name="schedulestart_time[]" class="ml-1 form-control" placeholder="Start Time">
                                    <input type="time" name="scheduleend_time[]" class="ml-1 form-control" placeholder="Start Time">
                                    <textarea type="text" name="schedulename[]" class="ml-2 form-control" placeholder="Enter name"></textarea>

                                </div>

                                <a id="plus-btn-data" href="javascript:void(0)" class="plus-btn-data-schedule px-1 p-0 m-0 ml-2"><i class="fas fa-plus"></i></a>
                                </div>

                            </div>
                        </div>

                    </div><!-- row -->


                    <div class="row mt-4">
                        <div class="col-sm-12">
                            <label class="form-control-label"><b>Event About </b><span class="tx-danger">*</span></label>
                            <div class="mg-t-10 mg-sm-t-0">
                                <textarea id="summernote" name="about">{{ old('about') }}</textarea>
                            </div>
                        </div>
                    </div>




                        <div class="row mt-4">
                          <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-right">
                            <a href="{{route('admin.event.index')}}" type="button" class="btn btn-secondary text-white mr-2" >Close</a>
                            <button type="submit" class="btn btn-info ">Save</button>
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

@section('script')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>

    $(document).ready(function() {
        $('.plus-btn-data-schedule').on('click',function(){


            var myschedule = '<div class="d-flex align-items-center mt-2">'+
'                                 <div class="d-flex align-items-center select-add-section" style="width: 97%;">'+
'                                    <select class="form-control" name="instrutor_id[]">'+
'                                        <option>select speakers</option>'+
'                                        @foreach ($instrutors as $instrutor)'+
'                                        <option value="{{ $instrutor->id }}">{{ $instrutor->name }}</option>'+
'                                        @endforeach'+
'                                    </select>'+
'                                    <select class="form-control ml-1" name="day_id[]">'+
'                                        <option>Select Day</option>'+
'                                        <option value="1">Day 1</option>'+
'                                        <option value="2">Day 2</option>'+
'                                        <option value="3">Day 3</option>'+
'                                        <option value="4">Day 4</option>'+
'                                        <option value="5">Day 5</option>'+
'                                        <option value="6">Day 6</option>'+
'                                        <option value="7">Day 7</option>'+
'                                        <option value="8">Day 8</option>'+
'                                        <option value="9">Day 9</option>'+
'                                        <option value="10">Day 10</option>'+
'                                        <option value="11">Day 11</option>'+
'                                        <option value="12">Day 12</option>'+
'                                        <option value="13">Day 13</option>'+
'                                        <option value="14">Day 14</option>'+
'                                        <option value="15">Day 15</option>'+
'                                        <option value="16">Day 16</option>'+
'                                        <option value="17">Day 17</option>'+
'                                        <option value="18">Day 18</option>'+
'                                        <option value="19">Day 19</option>'+
'                                        <option value="20">Day 20</option>'+
'                                        <option value="21">Day 21</option>'+
'                                        <option value="22">Day 22</option>'+
'                                        <option value="23">Day 23</option>'+
'                                        <option value="24">Day 24</option>'+
'                                        <option value="25">Day 25</option>'+
'                                        <option value="26">Day 26</option>'+
'                                        <option value="27">Day 27</option>'+
'                                        <option value="28">Day 28</option>'+
'                                        <option value="29">Day 29</option>'+
'                                        <option value="30">Day 30</option>'+
'                                        <option value="31">Day 31</option>'+
''+
'                                    </select>'+
'                                    <input type="date" name="scheduledate[]" class="ml-1 form-control" placeholder="Start Time">'+
'                                    <input type="time" name="schedulestart_time[]" class="ml-1 form-control" placeholder="Start Time">'+
'                                    <input type="time" name="scheduleend_time[]" class="ml-1 form-control" placeholder="Start Time">'+
'                                    <textarea type="text" name="schedulename[]" class="ml-2 form-control" placeholder="Enter name"></textarea>'+
''+
'                                </div>'+
''+
'                               <a href="javascript:void(0)" class="minus-btn-data-schedule px-1 p-0 m-0 ml-2"><i class="fas fa-minus-circle"></i></a>'+
'                                </div>';


            $('.add-data-schedule').prepend(myschedule);
            //console.log();
        });
        $(document).on('click','.minus-btn-data-schedule',function(){
            $(this).parent().remove();
        });

    });
</script>

<script>

//Course Pre Requisites start
$(document).ready(function() {
        $('#plus-btn-data').on('click',function(){

            var myvar = '<div class="d-flex align-items-center mt-2">'+
'                                     <div class="d-flex align-items-center select-add-section" style="width: 97%;">'+
'                                       <input type="text" name="requisites[]" class="ml-2 form-control" placeholder="Enter Pre Requisites">'+
''+
''+
'                                    </div>'+
''+
'                                      <a href="javascript:void(0)" class="minus-btn-data px-1 p-0 m-0 ml-2"><i class="fas fa-minus-circle"></i></a>'+
'                                    </div>';



        $('.add-data').prepend(myvar);
            //console.log();
        });
        $(document).on('click','.minus-btn-data',function(){
            $(this).parent().remove();
        });

    });

    //Course Pre Requisites End


    //Course What Will I Learn start
$(document).ready(function() {
        $('#plus-btn-data-learn').on('click',function(){

            var myvar = '<div class="d-flex align-items-center mt-2">'+
'                                     <div class="d-flex align-items-center select-add-section" style="width: 97%;">'+
'                                       <input type="text" name="course_learn[]" class="ml-2 form-control" placeholder="Enter Course Learn">'+
''+
''+
'                                    </div>'+
''+
'                                      <a href="javascript:void(0)" class="minus-btn-data-learn px-1 p-0 m-0 ml-2"><i class="fas fa-minus-circle"></i></a>'+
'                                    </div>';



        $('.add-data-learn').prepend(myvar);
            //console.log();
        });
        $(document).on('click','.minus-btn-data-learn',function(){
            $(this).parent().remove();
        });

    });

    //Course What Will I Learn End

</script>




@endsection
