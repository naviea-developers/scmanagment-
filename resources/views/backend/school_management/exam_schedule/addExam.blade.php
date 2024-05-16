@extends('Backend.layouts.layouts')

@section('title', 'Add exam Class')

{{-- <link rel="stylesheet" href="css/custom/class.css"> --}}
<link rel="stylesheet" href="{{ asset('public') }}/css/custom/eduStc.css">

@section('main_contain')

<div class="br-mainpanel">



        <div class="p-2">

            <div class="br-section-wrapper">

                <div class="br-pagetitle">
                    <i class="fa-duotone fa-screen-users"></i>
                    <div>
                      <h4>Add Exam Class</h4>
                      <p class="mg-b-0">Add Exams Class</p>
                    </div>
                </div>

               {{-- validate start  --}}
               @if(count($errors) > 0)
               @foreach($errors->all() as $error)
                   <div class="alert alert-danger">{{ $error }}</div>
               @endforeach
               @endif
               {{-- validate End  --}}

                <form action="{{ route('storeExam') }}" method="POST">
                    @csrf
                    <div class="row mb-3">
    
                        <div class="col-md-3">
                            <label for="">Exam title :</label>
                            <select name="examination_id" id="" class="form-select">
                                <option value="">Select Exam title</option>
                                @foreach (@$examinations as $examination)
                                    <option value="{{ $examination->id }}">{{ $examination->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label>Select Class : </label>
                            <select name="class_id" id=""class="form-select">
                                <option value="">Select Class</option>
                                @foreach ($className as $class)
                                    <option value="{{ $class->id}}">{{ $class->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="">Group :</label>
                            <select name="group_id" id="" class="form-select">
                                <option value="">Select group</option>
                                @foreach (@$groups as $group)
                                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label>Select Subject : </label>
                            <select name="subject_id" id=""class="form-select">
                                <option value="">Select Subject</option>
                                @foreach ($subjectName as $subject)
                                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3 mt-3">
                            <label>Select Exam Types : </label>
                            <select name="examtype_id" id=""class="form-select">
                                <option value="">select exam type</option>
                                @foreach ($examTypes as $examType)
                                    <option value="{{ $examType->id }}">{{ $examType->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3 mt-3">
                            <label for="">Marke :</label>
                            <input type="number" name="marke" class="form-control">
                        </div>
                        <div class="col-md-3 mt-3">
                            <label for="">Pass Marke :</label>
                            <input type="number" name="pass_marke" class="form-control">
                        </div>
                    
                        <div class="col-md-3 mt-3">
                            <label for="">Date :</label>
                            <input type="date" name="date" class="form-control">
                        </div>
                        <div class="col-md-3 mt-3">
                            <label for="">Start Time :</label>
                            <input type="time" name="start_time" class="form-control">
                        </div>
                        <div class="col-md-3 mt-3">
                            <label for="">End Time :</label>
                            <input type="time" name="end_time" class="form-control">
                        </div>
                    </div>
                    
                    <button type="button" class="btn btn-sm btn-add" id="plus-btn-data">Add</button>
                
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="mg-t-10 mg-sm-t-0 add-data">
                                {{-- <div class="col-sm-12 mt-3"  style="border: 1px solid;padding:10px"> --}}
                                <div class="d-flex align-items-center mt-2">
                                    <div class="d-flex align-items-center select-add-section" style="width: 97%;">
                                        <div class="row">
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
                                                <label>Select Buldings : </label>
                                                <select name="bulding_id[]" id=""class="form-select">
                                                    <option value="">Select Buldings</option>
                                                    @foreach ($buldings as $bulding)
                                                        <option value="{{ $bulding->id }}">{{ $bulding->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label>Select Floors : </label>
                                                <select name="floor_id[]" id=""class="form-select">
                                                    <option value="">Select Floors</option>
                                                    @foreach ($floors as $floor)
                                                        <option value="{{ $floor->id }}">{{ $floor->name }}</option>
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
                                            <div class="col-md-3 mt-3">
                                                <label for="">Pass Marke :</label>
                                                <input type="number" name="pass_marke[]" class="form-control">
                                            </div>
                                            <div class="col-md-3 mt-3">
                                                <label for="">Fail Marke :</label>
                                                <input type="number" name="fail_marke[]" class="form-control">
                                            </div>
                                        
                                            <div class="col-md-2 mt-3">
                                                <label for="">Exam Date :</label>
                                                <input type="date" name="date[]" class="form-control">
                                            </div>
                                            <div class="col-md-2 mt-3">
                                                <label for="">Start At :</label>
                                                <input type="time" name="start_time[]" class="form-control">
                                            </div>
                                            <div class="col-md-2 mt-3">
                                                <label for="">End At :</label>
                                                <input type="time" name="end_time[]" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <a href="javascript:void(0)" class="minus-btn-data px-1 p-0 m-0 ml-2"><i class="fas fa-minus-circle"></i></a>
                                </div>
                                {{-- </div> --}}
                            </div>
                        </div>
                    </div><!-- row -->
               

                    <div class="col-md-12 mt-4" >
                        <button type="submit" style="margin-left: -14px;" class="btn btn-primary createClass">
                            Create New Exam Routine</button>
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
{{-- <script>
    $(document).ready(function(){
    $("#addInput").click(function(){
    $(".col-1").append(' <select name="subjectName[]" id=""class="form-select mt-2">@foreach ($subjectName as $subject)<option value="{{ $subject->subject }}">{{ $subject->subject }}\
                                    </option>\
                                @endforeach\
                            </select>');
    $(".column-2").append("<div class='col-md-12' style='padding:0'><input type='date' name='date[]' class='mt-2 form-control'></div>");
    $(".column-3").append("<div class='col-md-12' style='padding:0'><input type='time' name='startAt[]' class='mt-2  form-control '></div>");
    $(".column-4").append("<div class='col-md-12' style='padding:0'><input type='time' name='endAt[]' class='mt-2  form-control '></div>");
  });

});

</script>
@stop --}}
@endsection

@section('script')

<script>
//Course Pre Requisites start
$(document).ready(function() {
        $('#plus-btn-data').on('click',function(){

            let myvar = `<div class="d-flex align-items-center mt-2">
                                    <div class="d-flex align-items-center select-add-section" style="width: 97%;">
                                       <div class="row">
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
                                            <label>Select Buldings : </label>
                                            <select name="bulding_id[]" id=""class="form-select">
                                                <option value="">Select Buldings</option>
                                                @foreach ($buldings as $bulding)
                                                    <option value="{{ $bulding->id }}">{{ $bulding->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label>Select Floors : </label>
                                            <select name="floor_id[]" id=""class="form-select">
                                                <option value="">Select Floors</option>
                                                @foreach ($floors as $floor)
                                                    <option value="{{ $floor->id }}">{{ $floor->name }}</option>
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
                                        <div class="col-md-3 mt-3">
                                            <label for="">Pass Marke :</label>
                                            <input type="number" name="pass_marke[]" class="form-control">
                                        </div>
                                        <div class="col-md-3 mt-3">
                                            <label for="">Fail Marke :</label>
                                            <input type="number" name="fail_marke[]" class="form-control">
                                        </div>
                                     
                                        <div class="col-md-2 mt-3">
                                            <label for="">Exam Date :</label>
                                            <input type="date" name="date[]" class="form-control">
                                        </div>
                                        <div class="col-md-2 mt-3">
                                            <label for="">Start At :</label>
                                            <input type="time" name="start_time[]" class="form-control">
                                        </div>
                                        <div class="col-md-2 mt-3">
                                            <label for="">End At :</label>
                                            <input type="time" name="end_time[]" class="form-control">
                                        </div>
                                    </div>
                                    </div>
                                    <a href="javascript:void(0)" class="minus-btn-data px-1 p-0 m-0 ml-2"><i class="fas fa-minus-circle"></i></a>
                                </div>`;




        $('.add-data').prepend(myvar);
            //console.log();
        });
        $(document).on('click','.minus-btn-data',function(){
            $(this).parent().remove();
        });

    });

    //Course Pre Requisites End
</script>
    
@endsection


