@extends('Backend.layouts.layouts')

@section('title', 'Add Class')

{{-- <link rel="stylesheet" href="css/custom/class.css"> --}}
<link rel="stylesheet" href="{{ asset('public') }}/css/custom/eduStc.css">

@section('main_contain')

<div class="br-mainpanel">



        <div class="p-2">

            <div class="br-section-wrapper">

                <div class="br-pagetitle">
                    <i class="fa-duotone fa-screen-users"></i>
                    <div>
                      <h4>Add Exam</h4>
                      <p class="mg-b-0">Add Exams</p>
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
                    <div class="row mb-3 ">
                        <div class="col-md-6">
                            <label>Select Class : </label>
                            <select name="class_id" id=""class="form-select">
                                <option value="">Select Class</option>
                                @foreach ($className as $class)
                                    <option value="{{ $class->id}}">{{ $class->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="">Exam title :</label>
                            <select name="examination_id" id="" class="form-select">
                                <option value="">Select Exam title</option>
                                @foreach (@$examinations as $examination)
                                    <option value="{{ $examination->id }}">{{ $examination->name }}</option>
                                @endforeach

                                {{-- <option value="Weekly Exam">Weekly Exam</option>
                                <option value="Monthly Exam">Monthly Exam</option>
                                <option value="First periodic">First periodic</option>
                                <option value="Second periodic">Second periodic</option>
                                <option value="Third periodic">Third periodic</option>
                                <option value="Mid term">Mid term</option>
                                <option value="Semester exam">Semester exam</option>
                                <option value="lab">lab</option>
                                <option value="Yearly exam">Yearly exam</option>
                                <option value="Quiz">Quiz</option>
                                <option value="Model Test">Model Test</option>
                                <option value="Final Test">Final Test</option>                            --}}
                            </select>
                        </div>
                    </div>
                    <button type="button" class="btn btn-sm btn-add" id="plus-btn-data">Add</button>

                    {{-- <div class="row">
                        <div class="col-md-3 col-1">
                            <label>Select Subject : </label>
                            <select name="subjectName[]" id=""class="form-select">
                                <option value="">Select Subject</option>
                                @foreach ($subjectName as $subject)
                                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 column-2">
                            <label for="">Exam Date :</label>
                            <input type="date" name="date[]" class="form-control">
                        </div>
                        <div class="col-md-3 column-3">
                            <label for="">Start At :</label>
                            <input type="time" name="startAt[]" class="form-control">
                        </div>
                        <div class="col-md-3 column-4">
                            <label for="">End At :</label>
                            <input type="time" name="endAt[]" class="form-control">
                        </div>
                    </div> --}}

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="mg-t-10 mg-sm-t-0 add-data">
                                <div class="d-flex align-items-center mt-2">
                                    <div class="d-flex align-items-center select-add-section" style="width: 97%;">
                                        <div class="col-md-3 col-1">
                                            <label>Select Subject : </label>
                                            <select name="subject_id[]" id=""class="form-select">
                                                <option value="">Select Subject</option>
                                                @foreach ($subjectName as $subject)
                                                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-3 column-2">
                                            <label for="">Exam Date :</label>
                                            <input type="date" name="date[]" class="form-control">
                                        </div>
                                        <div class="col-md-3 column-3">
                                            <label for="">Start At :</label>
                                            <input type="time" name="start_time[]" class="form-control">
                                        </div>
                                        <div class="col-md-3 column-4">
                                            <label for="">End At :</label>
                                            <input type="time" name="end_time[]" class="form-control">
                                        </div>
                                    </div>
                                    <a href="javascript:void(0)" class="minus-btn-data px-1 p-0 m-0 ml-2"><i class="fas fa-minus-circle"></i></a>
                                </div>
                            </div>
                        </div>
                    </div><!-- row -->

                    <div class="col-md-12 mt-4">
                        <button type="submit" class="btn btn-primary createClass">
                            Create New Class</button>
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
<script>
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
//   $("#btn2").click(function(){
//     $("ol").append("<li>Appended item</li>");
//   });
});

</script>
@stop


@section('script')

<script>
//Course Pre Requisites start
$(document).ready(function() {
        $('#plus-btn-data').on('click',function(){

            let myvar = `<div class="d-flex align-items-center mt-2">
                                    <div class="d-flex align-items-center select-add-section" style="width: 97%;">
                                        <div class="col-md-3 col-1">
                                            <label>Select Subject : </label>
                                            <select name="subject_id[]" id=""class="form-select">
                                                <option value="">Select Subject</option>
                                                @foreach ($subjectName as $subject)
                                                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-3 column-2">
                                            <label for="">Exam Date :</label>
                                            <input type="date" name="date[]" class="form-control">
                                        </div>
                                        <div class="col-md-3 column-3">
                                            <label for="">Start At :</label>
                                            <input type="time" name="start_time[]" class="form-control">
                                        </div>
                                        <div class="col-md-3 column-4">
                                            <label for="">End At :</label>
                                            <input type="time" name="end_time[]" class="form-control">
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


