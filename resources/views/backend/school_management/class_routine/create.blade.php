@extends('Backend.layouts.layouts')

@section('title', 'Add Class routine')

{{-- <link rel="stylesheet" href="css/custom/class.css"> --}}
<link rel="stylesheet" href="{{ asset('public') }}/css/custom/eduStc.css">

@section('main_contain')

<div class="br-mainpanel">



        <div class="p-2">

            <div class="br-section-wrapper">

                <div class="br-pagetitle">
                    <i class="fa-duotone fa-screen-users"></i>
                    <div>
                      <h4>Add Class Routine</h4>
                      <p class="mg-b-0">Add Class Routine</p>
                    </div>
                </div>

               {{-- validate start  --}}
               @if(count($errors) > 0)
               @foreach($errors->all() as $error)
                   <div class="alert alert-danger">{{ $error }}</div>
               @endforeach
               @endif
               {{-- validate End  --}}

                <form action="{{ route('admin.routine.store') }}" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label>Select Class : </label>
                            <select name="class_id" id=""class="form-select">
                                <option value="">Select Class</option>
                                @foreach ($className as $class)
                                    <option value="{{ $class->id}}">{{ $class->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="">Section :</label>
                            <select name="session_id" id="" class="form-select">
                                <option value="">Select Section</option>
                                @foreach (@$sessions as $session)
                                    <option value="{{ $session->id }}">{{ @$session->start_year->year }} - {{ @$session->end_year->year }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="">Class Type :</label>
                            <select name="class_type" id="" class="form-select">
                                <option value="">Select class type</option>
                                <option value="1">Online</option>
                                <option value="2">Offline</option>
                            </select>
                        </div>
                    </div>
                    
                    <button type="button" class="btn btn-sm btn-add" id="plus-btn-data">Add</button>
                
                  

                    <hr>
                    <h4>Pacakage Details List:</h4>
                    <div class="show-add-tagline-data">
                        <div class="d-flex mt-3">
                            <div class="" style="border: 1px solid;padding:10px;width: 97%;">
                                <div class="row mt-3">
                                    <div class="col-sm-9">
                                        <label>Select Day : </label>
                                        <select name="day_id[0]" id=""class="form-select">
                                            <option value="">Select Day</option>
                                            <option value="1">Saturday</option>
                                            <option value="2">Sunday</option>
                                            <option value="3">Monday</option>
                                            <option value="4">Tuesday</option>
                                            <option value="5">Wednesday</option>
                                            <option value="6">Thursday</option>
                                            <option value="7">Friday</option>
                                        </select>
                                      
                                    </div>
                                    <hr style="width:95%;">
                                </div>

                                <div class="show-add-list-data">
                                    <div class="row mt-3">
                                        <label class="col-sm-3 form-control-label"> </label>
                                        <div class="col-sm-12 mg-t-10 mg-sm-t-0">
                                            <div class="d-flex align-items-center ">
                                                <div class="col-md-3">
                                                    <label>Select Subject : </label>
                                                    <select name="subject_id[0][]" id=""class="form-select">
                                                        <option value="">Select Subject</option>
                                                        @foreach ($subjectName as $subject)
                                                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-md-3">
                                                    <label>Select Teacher : </label>
                                                    <select name="teacher_id[0][]" id=""class="form-select">
                                                        <option value="">Select Teacher</option>
                                                        @foreach ($teachers as $teacher)
                                                            <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-md-2">
                                                    <label>Select Rooms : </label>
                                                    <select name="room_id[0][]" id=""class="form-select">
                                                        <option value="">sel..room</option>
                                                        @foreach ($rooms as $room)
                                                            <option value="{{ $room->id }}">{{ $room->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-md-3">
                                                    <label>Select Period : </label>
                                                    <select name="class_duration_id[0][]" id=""class="form-select">
                                                        <option value="">Select period</option>
                                                        @foreach ($class_durations as $class_duration)
                                                            <option value="{{ $class_duration->id }}">{{ $class_duration->name }} ({{date('h:i:A',strtotime($class_duration->start_time))}} - {{date('h:i:A',strtotime($class_duration->end_time))}})</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <a tag_id="0" href="javascript:void(0)" class="plus-btn-data-detail plus-btn-data px-1 p-0 m-0 ml-2"><i class="fas fa-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <a id="plus-btn-data-tagline" href="javascript:void(0)" class="plus-btn-data px-1 p-0 m-0 ml-2"><i class="fas fa-plus"></i></a>
                        </div>
                    </div>


               

                    <div class="col-md-12 mt-4" >
                        <button type="submit" style="margin-left: -14px;" class="btn btn-primary createClass">
                            Create New Class Routine</button>
                    </div>
                </form>
        </div>

    </div>


</div>
<style>
    .btn-add{
        background-color: #4CAF50 !important; /* Green */
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
    }

    .btn-add:hover{
        background-color: #4CAF50 !important;
        color: white;
    }



</style>

@endsection

@section('script')

<script>
//Course Pre Requisites start
$(document).ready(function() {
        $('#plus-btn-data').on('click',function(){

            let myvar = `<div class="col-sm-12 mt-3"  style="border: 1px solid;padding:10px">
                          <div class="d-flex align-items-center mt-2">
                                    <div class="d-flex align-items-center select-add-section" style="width: 97%;">
                                       <div class="row">
                                        <div class="col-md-3">
                                                <label>Select Day : </label>
                                                <select name="day_id[]" id=""class="form-select">
                                                    <option value="">Select Day</option>
                                                    <option value="1">Saturday</option>
                                                    <option value="2">Sunday</option>
                                                    <option value="3">Monday</option>
                                                    <option value="4">Tuesday</option>
                                                    <option value="5">Wednesday</option>
                                                    <option value="6">Thursday</option>
                                                    <option value="7">Friday</option>
                                                </select>
                                            </div>
                                        <div class="col-md-3">
                                            <label>Select Subject : </label>
                                            <select name="subject_id[]" id=""class="form-select">
                                                <option value="">Select Subject</option>
                                                @foreach ($subjectName as $subject)
                                                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                                <label>Select Teacher : </label>
                                                <select name="teacher_id[]" id=""class="form-select">
                                                    <option value="">Select Teacher</option>
                                                    @foreach ($teachers as $teacher)
                                                        <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        <div class="col-md-3">
                                            <label>Select Rooms : </label>
                                            <select name="room_id[]" id=""class="form-select">
                                                <option value="">Select Rooms</option>
                                                @foreach ($rooms as $room)
                                                    <option value="{{ $room->id }}">{{ $room->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <label>Select Period : </label>
                                            <select name="class_duration_id[]" id=""class="form-select">
                                                <option value="">Select period</option>
                                                @foreach ($class_durations as $class_duration)
                                                    <option value="{{ $class_duration->id }}">{{ $class_duration->name }} ({{date('h:i:A',strtotime($class_duration->start_time))}} - {{date('h:i:A',strtotime($class_duration->end_time))}})</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        
                                    </div>
                                    </div>
                                    <a href="javascript:void(0)" class="minus-btn-data px-1 p-0 m-0 ml-2"><i class="fas fa-minus-circle"></i></a>
                               </div>
                                    </div>`;




        $('.add-data').prepend(myvar);
            //console.log();
        });
        $(document).on('click','.minus-btn-data',function(){
            $(this).parent().parent().remove();
        });

    });

    //Course Pre Requisites End
</script>



<script>
        var tagline =1;
    $(document).on('click','.plus-btn-data-detail',function(){

        let out = `<div class="row mt-3">
                                        <label class="col-sm-3 form-control-label"> </label>
                                        <div class="col-sm-12 mg-t-10 mg-sm-t-0">
                                            <div class="d-flex align-items-center ">
                                                <div class="col-md-3">
                                                    <label>Select Subject : </label>
                                                    <select name="subject_id['+$(this).attr('tag_id')+'][]" class="form-select">
                                                        <option value="">Select Subject</option>
                                                        @foreach ($subjectName as $subject)
                                                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-md-3">
                                                    <label>Select Teacher : </label>
                                                    <select name="teacher_id['+$(this).attr('tag_id')+'][]" class="form-select">
                                                        <option value="">Select Teacher</option>
                                                        @foreach ($teachers as $teacher)
                                                            <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-md-2">
                                                    <label>Select Rooms : </label>
                                                    <select name="room_id['+$(this).attr('tag_id')+'][]" class="form-select">
                                                        <option value="">sel..room</option>
                                                        @foreach ($rooms as $room)
                                                            <option value="{{ $room->id }}">{{ $room->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-md-3">
                                                    <label>Select Period : </label>
                                                    <select name="class_duration_id['+$(this).attr('tag_id')+'][]" class="form-select">
                                                        <option value="">Select period</option>
                                                        @foreach ($class_durations as $class_duration)
                                                            <option value="{{ $class_duration->id }}">{{ $class_duration->name }} ({{date('h:i:A',strtotime($class_duration->start_time))}} - {{date('h:i:A',strtotime($class_duration->end_time))}})</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <a href="javascript:void(0)" class="minus-btn-data px-1 p-0 m-0 ml-2"><i class="fas fa-minus-circle"></i></a>
                                            </div>
                                        </div>
                                    </div>`;

        let out = '<div class="row mt-3">'+
                  '<label class="col-sm-3 form-control-label"> </label>'+
                  '<div class="col-sm-9 mg-t-10 mg-sm-t-0">'+
                    '<div class="d-flex align-items-center ">'+
                    '<input  value="" type="text" name="details['+$(this).attr('tag_id')+'][]" class="form-control" placeholder="Enter Details">'+
                    '<a href="javascript:void(0)" class="minus-btn-data px-1 p-0 m-0 ml-2"><i class="fas fa-minus-circle"></i></a>'+
                    '</div></div></div>';


                    
       $(this).parent().parent().parent().parent().prepend(out);
    });

    $(document).on('click','.minus-btn-data',function(){
        $(this).parent().parent().parent().remove();
    });





    $('#plus-btn-data-tagline').on('click',function(){

        let myvar = `<div class="d-flex mt-3">
                            <div class="" style="border: 1px solid;padding:10px;width: 97%;">
                                <div class="row mt-3">
                                    <div class="col-sm-9">
                                        <label>Select Day : </label>
                                        <select name="day_id['+tagline+']" id=""class="form-select">
                                            <option value="">Select Day</option>
                                            <option value="1">Saturday</option>
                                            <option value="2">Sunday</option>
                                            <option value="3">Monday</option>
                                            <option value="4">Tuesday</option>
                                            <option value="5">Wednesday</option>
                                            <option value="6">Thursday</option>
                                            <option value="7">Friday</option>
                                        </select>
                                      
                                    </div>
                                    <hr style="width:95%;">
                                </div>

                                <div class="show-add-list-data">
                                    <div class="row mt-3">
                                        <label class="col-sm-3 form-control-label"> </label>
                                        <div class="col-sm-12 mg-t-10 mg-sm-t-0">
                                            <div class="d-flex align-items-center ">
                                                <div class="col-md-3">
                                                    <label>Select Subject : </label>
                                                    <select name="subject_id['+tagline+'][]" id=""class="form-select">
                                                        <option value="">Select Subject</option>
                                                        @foreach ($subjectName as $subject)
                                                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-md-3">
                                                    <label>Select Teacher : </label>
                                                    <select name="teacher_id['+tagline+'][]" id=""class="form-select">
                                                        <option value="">Select Teacher</option>
                                                        @foreach ($teachers as $teacher)
                                                            <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-md-2">
                                                    <label>Select Rooms : </label>
                                                    <select name="room_id['+tagline+'][]" id=""class="form-select">
                                                        <option value="">sel..room</option>
                                                        @foreach ($rooms as $room)
                                                            <option value="{{ $room->id }}">{{ $room->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-md-3">
                                                    <label>Select Period : </label>
                                                    <select name="class_duration_id['+tagline+'][]" id=""class="form-select">
                                                        <option value="">Select period</option>
                                                        @foreach ($class_durations as $class_duration)
                                                            <option value="{{ $class_duration->id }}">{{ $class_duration->name }} ({{date('h:i:A',strtotime($class_duration->start_time))}} - {{date('h:i:A',strtotime($class_duration->end_time))}})</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <a tag_id="'+tagline+'" href="javascript:void(0)" class="plus-btn-data-detail plus-btn-data px-1 p-0 m-0 ml-2"><i class="fas fa-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <a href="javascript:void(0)" class="minus-btn-data-tagline px-1 p-0 m-0 ml-2"><i class="fas fa-minus-circle"></i></a>
                        </div>`;



        // var myvar1 = '<div class="d-flex mt-3">'+
        // '                                <div class="" style="border: 1px solid;padding:10px;width: 97%;">'+
        // '                                    <div class="row mt-3">'+
        // '                                        <div class="col-sm-3">'+
        // '                                            <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 100px;">'+
        // '                                                <img class="display-upload-img" style="width: 100px;height: 70px;" src="{{ asset("public/frontend/images/No-image.jpg")}}" alt="">'+
        // '                                                <input type="file" name="tagline_image['+tagline+']" class="form-control upload-img" placeholder="Enter Activity Image" style="position: absolute;top: 0;opacity: 0;height: 100%;">'+
        // '                                            </div>'+
        // '                                        </div>'+
        // '                                        <div class="col-sm-9">'+
        // '                                            <input  value="" type="text" name="tagline['+tagline+']" class="form-control" placeholder="Enter Tagline">'+
        // '                                        </div>'+
        // '                                        <hr style="width:95%;">'+
        // '                                    </div>'+
        // '                                    <div class="show-add-list-data">'+
        // '                                        <div class="row mt-3">'+
        // '                                            <label class="col-sm-3 form-control-label"> </label>'+
        // '                                            <div class="col-sm-9 mg-t-10 mg-sm-t-0">'+
        // '                                                <div class="d-flex align-items-center ">'+
        // '                                                    <input  value="" type="text" name="details['+tagline+'][]" class="form-control" placeholder="Enter Details">'+
        // '                                                    <a tag_id="'+tagline+'" class="plus-btn-data-detail" href="javascript:void(0)" class="plus-btn-data px-1 p-0 m-0 ml-2"><i class="fas fa-plus"></i></a>'+
        // '                                                </div>'+
        // '                                            </div>'+
        // '                                        </div>'+
        // '                                    </div>'+
        // '                                </div>'+
        // '                                <a href="javascript:void(0)" class="minus-btn-data-tagline px-1 p-0 m-0 ml-2"><i class="fas fa-minus-circle"></i></a>'+
        // '                            </div>';



        $('.show-add-tagline-data').prepend(myvar);
        tagline++;
        $(this).focus();
    });
    $(document).on('click','.minus-btn-data-tagline',function(){
        $(this).parent().remove();
    });

</script>
    
@endsection


