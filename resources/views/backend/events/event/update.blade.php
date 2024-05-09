@section('title')
    Admin - Edit Event

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
            <a class="breadcrumb-item" href="{{route('admin.event.index')}}"> <i class="icon ion-reply text-22"></i> All Event</a>
          </nav>
        </div><!-- br-pageheader -->

        <div class="br-pagebody">
          <div class="br-section-wrapper">
            <h6 class="br-section-label text-center mb-4"> Edit Event</h6>
            @if(count($errors) > 0)
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
            @endif
            <!----- Start Add Category Form input ------->
            <div class="col-xl-12 mx-auto">
                <div class="form-layout form-layout-4">

                    <form action="{{ route('admin.event.update',$events->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mt-4">
                            <div class="col-sm-4">
                                <label class="form-control-label"><b>Category :</b><span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <select class="form-control " name="category_id" id="cat">
                                        <option  value="">Select Category</option>

                                        @foreach ( $categorys as $category)
                                        <option @if($category->id == $events->category_id)  Selected @endif  value="{{ $category->id}}" >{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <label class="form-control-label"><b>Event Name :</b><span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input type="text" name="name" value="{{ $events->name }}" class="form-control" placeholder="Enter Course Name">
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <label class="form-control-label"><b>Star Date :</b></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input type="datetime-local" name="startdate" value="{{$events->startdate}}" class="form-control" placeholder="Enter start time">
                                </div>
                            </div>

                        </div>



                        <div class="row mt-4">
                            <div class="col-sm-4">
                                <label class="form-control-label"><b>End Date :</b></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input type="datetime-local" name="enddate" value="{{ $events->enddate }}" class="form-control" placeholder="Enter end time">
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <label class="form-control-label"><b>Recording :</b></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <select class="form-control" name="recording">
                                        <option value="">Select racording</option>
                                        <option @if($events->recording == '1')  Selected @endif  value="1">Yes</option>
                                        <option @if($events->recording == '0')  Selected @endif  value="0">No</option>

                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <label class="form-control-label"><b>Event Language :</b></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <select class="form-control select2" name="language_id">
                                        <option value="">Select Language</option>
                                        <option @if($events->language_id == '0')  Selected @endif  value="0">Bangla</option>
                                        <option @if($events->language_id == '1')  Selected @endif  value="1">English</option>

                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-4 mt-3">
                                <label class="form-control-label"><b>Event Fee :</b><span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input type="number" name="fee" value="{{ $events->fee }}" class="form-control" placeholder="Enter fee">
                                </div>
                            </div>

                            <div class="col-sm-4 mt-3">
                                <label class="form-control-label"><b>Event Release :</b> <span class="tx-danger">*</span></label>
                                <select  class="form-control" name="release_id" required>
                                    <option value="">Select</option>
                                    <option @if($events->release_id == '0')  Selected @endif value="0">Passed Event</option>
                                    <option @if($events->release_id == '1')  Selected @endif value="1">Upcoming Event </option>
                                    <option @if($events->release_id == '2')  Selected @endif value="1">Live Event </option>
                                </select>
                            </div>

                              <div class="col-sm-4 mt-3">
                                <label class="form-control-label"><b>Host Name :</b><span class="tx-danger">*</span></label>
                                <select  class="form-control" name="host_id" required>
                                    <option value="">Select Course</option>
                                    @foreach ($hosts as $host)
                                    <option @if($host->id == $events->host_id)  Selected @endif value="{{ $host->id }}">{{ $host->name }}</option>
                                    @endforeach

                                </select>
                            </div>


                            <div class="col-sm-4 mt-3">
                                <label class="form-control-label"><b>Organization Name :</b></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input type="text" name="organization_name" value="{{ $events->organization_name }}" class="form-control" placeholder="Organization Name">
                                </div>
                            </div>

                            <div class="col-sm-4 mt-3">
                                <label class="form-control-label"><b>Event Location :</b></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input type="text" name="location" value="{{ $events->location }}" class="form-control" placeholder="location Name">
                                </div>
                            </div>

                            <div class="col-sm-4 mt-3">
                                <label class="form-control-label"><b>Event Will Start Time :</b></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input type="datetime-local" name="eventstarttime" value="{{ $events->eventstarttime }}" class="form-control" placeholder="Enter Start Time">
                                </div>
                            </div>



                        </div>

                     <br>

                    {{-- Pre Requisites start --}}
                        <div class="row mt-4">
                        <div class="col-sm-12">
                            <label class="form-control-label"><b>Requisites :</b></label>
                            <div class="mg-t-10 mg-sm-t-0 add-data">
                                @if($events->courserequisites->count() == 0)
                                <div class="d-flex align-items-center mt-2">
                                    <div class="d-flex align-items-center select-add-section" style="width: 97%;">
                                    <input type="text" name="requisites[]" value="{{ old('requisites') }}" class="ml-2 form-control" placeholder="Enter Pre Requisites">
                                </div>
                                <a id="plus-btn-data" href="javascript:void(0)" class="plus-btn-data px-1 p-0 m-0 ml-2"><i class="fas fa-plus"></i></a>
                                </div>
                                @else
                                @foreach ($events->courserequisites as $k=>$courserequisite)
                                <div class="d-flex align-items-center mt-2">
                                    <div class="d-flex align-items-center select-add-section" style="width: 97%;">
                                    <input type="text" name="old_requisites[{{ $courserequisite->id }}]" value="{{ $courserequisite->name }}" class="ml-2 form-control" placeholder="Enter Pre Requisites">
                                </div>
                                @if($k == $events->courserequisites->count() - 1)
                                    <a id="plus-btn-data" href="javascript:void(0)" class="plus-btn-data px-1 p-0 m-0 ml-2"><i class="fas fa-plus"></i></a>
                                    @else
                                    <a courserequisite_id="{{ $courserequisite->id }}" href="javascript:void(0)" class="minus-btn-data-old px-1 p-0 m-0 ml-2"><i class="fas fa-minus-circle"></i></a>
                                @endif
                                </div>
                                @endforeach
                                @endif
                            </div>
                        </div>

                        </div><!-- row -->
                    {{-- Pre Requisites End --}}

                    {{-- What Will I Learn start --}}
                    <div class="row mt-4">
                        <div class="col-sm-12">
                            <label class="form-control-label"><b>Course Learn :</b></label>
                            <div class="mg-t-10 mg-sm-t-0 add-data-learn">
                                @if($events->courselearns->count() == 0)
                                <div class="d-flex align-items-center mt-2">
                                    <div class="d-flex align-items-center select-add-section" style="width: 97%;">
                                      <input type="text" name="course_learn[]" value="{{ old('course_learn') }}" class="ml-2 form-control" placeholder="Enter Course Learn">
                                     </div>
                                      <a id="plus-btn-data-learn" href="javascript:void(0)" class="plus-btn-data-learn px-1 p-0 m-0 ml-2"><i class="fas fa-plus"></i></a>
                                </div>
                                @else
                                @foreach ($events->courselearns as $k=>$courselearn)
                                <div class="d-flex align-items-center mt-2">
                                    <div class="d-flex align-items-center select-add-section" style="width: 97%;">
                                      <input type="text" name="old_course_learn[{{ $courselearn->id }}]" value="{{ $courselearn->name }}" class="ml-2 form-control" placeholder="Enter Course Learn">
                                     </div>
                                     @if($k == $events->courselearns->count() - 1)
                                     <a id="plus-btn-data-learn" href="javascript:void(0)" class="plus-btn-data-learn px-1 p-0 m-0 ml-2"><i class="fas fa-plus"></i></a>
                                     @else
                                     <a courselearn_id="{{ $courselearn->id }}" href="javascript:void(0)" class="minus-btn-data-old-learn px-1 p-0 m-0 ml-2"><i class="fas fa-minus-circle"></i></a>
                                     @endif

                                </div>
                                @endforeach
                                @endif
                            </div>
                        </div>

                    </div><!-- row -->
                    {{-- What Will I Learn End --}}


                    <div class="row mt-4">
                        <div class="col-sm-12">
                            <label class="form-control-label"><b>Event Schedule :</b></label>
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
                                @if($events->eventschedules->count() == 0)
                                <div class="d-flex align-items-center mt-2">
                                 <div class="d-flex align-items-center select-add-section" style="width: 97%;">
                                    <select class="form-control" name="instrutor_id[]">
                                        <option>select speakers</option>
                                        @foreach ($instrutors as $instrutor)
                                        <option value="{{ $instrutor->id }}">{{ $instrutor->name }}</option>
                                        @endforeach
                                    </select>

                                    <select class="form-control ml-1" name="day_id[]">
                                        <option><-- Select Day --></option>
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

                                    {{-- <select class="form-control ml-1" name="day_id[]">
                                        <option><-- Select Day --></option>
                                        @foreach ($days as $day)
                                        <option value="{{ $day->id }}">{{ $day->name }}</option>
                                        @endforeach
                                    </select> --}}

                                    <input type="date" name="scheduledate[]" class="ml-1 form-control" placeholder="Start Time">
                                    <input type="time" name="schedulestart_time[]" class="ml-1 form-control" placeholder="Start Time">
                                    <input type="time" name="scheduleend_time[]" class="ml-1 form-control" placeholder="Start Time">
                                    <textarea type="text" name="schedulename[]" class="ml-2 form-control" placeholder="Enter name"></textarea>

                                </div>

                                <a id="plus-btn-data" href="javascript:void(0)" class="plus-btn-data-schedule px-1 p-0 m-0 ml-2"><i class="fas fa-plus"></i></a>
                                </div>
                                @else
                                @foreach ($events->eventschedules as $k=>$eventschedule)
                                <div class="d-flex align-items-center mt-2">
                                    <div class="d-flex align-items-center select-add-section" style="width: 97%;">
                                        <select class="form-control" name="old_instrutor_id[{{ $eventschedule->id }}]">
                                            <option>Select speakers</option>
                                            @foreach ($instrutors as $instrutor)
                                            <option @if ($instrutor->id==$eventschedule->instrutor_id)  Selected @endif  value="{{ $instrutor->id }}">{{ $instrutor->name }}</option>
                                            @endforeach
                                        </select>

                                        <select class="form-control ml-1" name="old_day_id[{{ $eventschedule->id }}]">
                                            <option><-- Select Day --></option>
                                            <option @if ($eventschedule->day_id=='1')  Selected @endif  value="1">Day 1</option>
                                            <option @if ($eventschedule->day_id=='2')  Selected @endif  value="2">Day 2</option>
                                            <option @if ($eventschedule->day_id=='3')  Selected @endif  value="3">Day 3</option>
                                            <option @if ($eventschedule->day_id=='4')  Selected @endif  value="4">Day 4</option>
                                            <option @if ($eventschedule->day_id=='5')  Selected @endif  value="5">Day 5</option>
                                            <option @if ($eventschedule->day_id=='6')  Selected @endif  value="6">Day 6</option>
                                            <option @if ($eventschedule->day_id=='7')  Selected @endif  value="7">Day 7</option>
                                            <option @if ($eventschedule->day_id=='8')  Selected @endif  value="8">Day 8</option>
                                            <option @if ($eventschedule->day_id=='9')  Selected @endif  value="9">Day 9</option>
                                            <option @if ($eventschedule->day_id=='10')  Selected @endif  value="10">Day 10</option>
                                            <option @if ($eventschedule->day_id=='11')  Selected @endif  value="11">Day 11</option>
                                            <option @if ($eventschedule->day_id=='12')  Selected @endif  value="12">Day 12</option>
                                            <option @if ($eventschedule->day_id=='13')  Selected @endif  value="13">Day 13</option>
                                            <option @if ($eventschedule->day_id=='14')  Selected @endif  value="14">Day 14</option>
                                            <option @if ($eventschedule->day_id=='15')  Selected @endif  value="15">Day 15</option>
                                            <option @if ($eventschedule->day_id=='16')  Selected @endif  value="16">Day 16</option>
                                            <option @if ($eventschedule->day_id=='17')  Selected @endif  value="17">Day 17</option>
                                            <option @if ($eventschedule->day_id=='18')  Selected @endif  value="18">Day 18</option>
                                            <option @if ($eventschedule->day_id=='19')  Selected @endif  value="19">Day 19</option>
                                            <option @if ($eventschedule->day_id=='20')  Selected @endif  value="20">Day 20</option>
                                            <option @if ($eventschedule->day_id=='21')  Selected @endif  value="21">Day 21</option>
                                            <option @if ($eventschedule->day_id=='22')  Selected @endif  value="22">Day 22</option>
                                            <option @if ($eventschedule->day_id=='23')  Selected @endif  value="23">Day 23</option>
                                            <option @if ($eventschedule->day_id=='24')  Selected @endif  value="24">Day 24</option>
                                            <option @if ($eventschedule->day_id=='25')  Selected @endif  value="25">Day 25</option>
                                            <option @if ($eventschedule->day_id=='26')  Selected @endif  value="26">Day 26</option>
                                            <option @if ($eventschedule->day_id=='27')  Selected @endif  value="27">Day 27</option>
                                            <option @if ($eventschedule->day_id=='28')  Selected @endif  value="28">Day 28</option>
                                            <option @if ($eventschedule->day_id=='29')  Selected @endif  value="29">Day 29</option>
                                            <option @if ($eventschedule->day_id=='30')  Selected @endif  value="30">Day 30</option>
                                            <option @if ($eventschedule->day_id=='31')  Selected @endif  value="31">Day 31</option>

                                        </select>

                                        {{-- <select class="form-control ml-1" name="old_day_id[{{ $eventschedule->id }}]">
                                           <option><-- Select Day --></option>
                                           @foreach ($days as $day)
                                           <option @if ($day->id==$eventschedule->day_id)  Selected @endif value="{{ $day->id }}">{{ $day->name }}</option>
                                           @endforeach
                                       </select> --}}

                                       <input type="date" name="old_scheduledate[{{ $eventschedule->id }}]" value="{{ $eventschedule->scheduledate }}" class="ml-1 form-control" placeholder="Start Time">
                                       <input type="time" name="old_schedulestart_time[{{ $eventschedule->id }}]" value="{{ $eventschedule->schedulestart_time }}" class="ml-1 form-control" placeholder="Start Time">
                                       <input type="time" name="old_scheduleend_time[{{ $eventschedule->id }}]" value="{{ $eventschedule->scheduleend_time }}" class="ml-1 form-control" placeholder="Start Time">
                                       <textarea type="text" name="old_schedulename[{{ $eventschedule->id }}]" class="ml-2 form-control" placeholder="Enter name">{!! $eventschedule->schedulename  !!}</textarea>

                                   </div>
                                   @if($k == $events->eventschedules->count() - 1)
                                   <a id="plus-btn-data" href="javascript:void(0)" class="plus-btn-data-schedule px-1 p-0 m-0 ml-2"><i class="fas fa-plus"></i></a>
                                   @else
                                   <a eventschedule_id="{{ $eventschedule->id }}" href="javascript:void(0)" class="minus-btn-data-old-schedule px-1 p-0 m-0 ml-2"><i class="fas fa-minus-circle"></i></a>
                                   @endif


                                   </div>

                                @endforeach
                                @endif
                            </div>
                        </div>

                    </div><!-- row -->









                    <div class="row mt-4">
                        <div class="col-sm-12">
                            <label class="form-control-label"><b>Course About </b><span class="tx-danger">*</span></label>
                            <div class="mg-t-10 mg-sm-t-0">
                                <textarea id="summernote" name="about">{!! $events->about !!}</textarea>
                            </div>
                        </div>
                    </div>



                        <div class="row mt-4">
                          <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-right">
                            <a href="{{route('admin.course.index')}}" type="button" class="btn btn-secondary text-white mr-2" >Close</a>
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
'                                        <option><-- Select Day --></option>'+
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
'                                <a href="javascript:void(0)" class="minus-btn-data-schedule px-1 p-0 m-0 ml-2"><i class="fas fa-minus-circle"></i></a>'+
'                                </div>';


            $('.add-data-schedule').prepend(myschedule);

            //console.log();
        });
        $(document).on('click','.minus-btn-data-schedule',function(){
            $(this).parent().remove();
        });

        $(document).on('click','.minus-btn-data-old-schedule ',function(){
             $(this).parent().parent().append('<input type="hidden" name="delete_eventschedule[]" value="'+$(this).attr('eventschedule_id')+'">');
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

        $(document).on('click','.minus-btn-data-old',function(){
             $(this).parent().parent().append('<input type="hidden" name="delete_courserequisite[]" value="'+$(this).attr('courserequisite_id')+'">');
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

        $(document).on('click','.minus-btn-data-old-learn',function(){
             $(this).parent().parent().append('<input type="hidden" name="delete_learn[]" value="'+$(this).attr('courselearn_id')+'">');
            $(this).parent().remove();
        });

    });

    //Course What Will I Learn End



</script>
@endsection
