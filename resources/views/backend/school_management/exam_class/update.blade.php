@extends('Backend.layouts.layouts')

@section('title', 'Edit Exams')


<link rel="stylesheet" href="#">

@section('main_contain')

<div class="br-mainpanel">

        <div class="p-2">

            <div class="br-section-wrapper">

                <div class="br-pagetitle">
                    <i class="fa-duotone fa-person-chalkboard"></i>
                    <div>
                      <h4>Update exam Class</h4>
                      <p class="mg-b-0">Update exam Class Information</p>
                    </div>
                  </div>

               {{-- validate start  --}}
               @if(count($errors) > 0)
               @foreach($errors->all() as $error)
                   <div class="alert alert-danger">{{ $error }}</div>
               @endforeach
               @endif
               {{-- validate End  --}}

                <form action="{{ route('admin.examclass.update',$editData->id) }}" method="POST">
                    @csrf
                    <div class="row mb-3">

                        <div class="col-md-3">
                            <label for="">Exam title :</label>
                            <select name="examination_id" id="" class="form-select">
                                <option value="">Select Exam title</option>
                                @foreach (@$examinations as $examination)
                                    <option @if($examination->id == $editData->examination_id)  Selected @endif value="{{ $examination->id }}">{{ $examination->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label>Select Class : </label>
                            <select name="class_id" id=""class="form-select">
                                <option value="">Select Class</option>
                                @foreach ($className as $class)
                                    <option @if($class->id == $editData->class_id)  Selected @endif value="{{ $class->id}}">{{ $class->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="">Group :</label>
                            <select name="group_id" id="" class="form-select">
                                <option value="">Select group</option>
                                @foreach (@$groups as $group)
                                    <option @if($group->id == $editData->group_id)  Selected @endif value="{{ $group->id }}">{{ $group->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label>Select Subject : </label>
                            <select name="subject_id" id=""class="form-select">
                                <option value="">Select Subject</option>
                                @foreach ($subjectName as $subject)
                                    <option @if($subject->id == $editData->subject_id)  Selected @endif value="{{ $subject->id }}">{{ $subject->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3 mt-3">
                            <label>Select Exam Types : </label>
                            <select name="examtype_id" id=""class="form-select">
                                <option value="">select exam type</option>
                                @foreach ($examTypes as $examType)
                                    <option @if($examType->id == $editData->examtype_id)  Selected @endif value="{{ $examType->id }}">{{ $examType->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3 mt-3">
                            <label for="">Marke :</label>
                            <input type="number" value="{{ $editData->marke }}" name="marke" class="form-control">
                        </div>
                        <div class="col-md-3 mt-3">
                            <label for="">Pass Marke :</label>
                            <input type="number" value="{{ $editData->pass_marke }}" name="pass_marke" class="form-control">
                        </div>
                    
                        <div class="col-md-3 mt-3">
                            <label for="">Date :</label>
                            <input type="date" value="{{ $editData->date }}" name="date" class="form-control">
                        </div>
                        <div class="col-md-3 mt-3">
                            <label for="">Start Time :</label>
                            <input type="time" value="{{ $editData->start_time }}" name="start_time" class="form-control">
                        </div>
                        <div class="col-md-3 mt-3">
                            <label for="">End Time :</label>
                            <input type="time" value="{{ $editData->end_time }}" name="end_time" class="form-control">
                        </div>
                    </div>
                    

                    <div class="col-md-12 mt-4" >
                        <button type="submit" style="margin-left: -14px;" class="btn btn-primary createClass">
                            Create New Exam Class</button>
                    </div>
                </form>

            </div>


        </div>

<script src="js/custom/addTeacherForClass.js"></script>
</div>

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

        $(document).on('click','.minus-btn-data-old',function(){
             $(this).parent().parent().append('<input type="hidden" name="delete_exam_schedule_item[]" value="'+$(this).attr('exam_schedule_item_id')+'">');
            $(this).parent().remove();
        });

    });

    //Course Pre Requisites End
</script>
    
@endsection

