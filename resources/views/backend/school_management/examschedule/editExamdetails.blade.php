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
                      <h4>Update exam</h4>
                      <p class="mg-b-0">Update exam Information</p>
                    </div>
                  </div>

               {{-- validate start  --}}
               @if(count($errors) > 0)
               @foreach($errors->all() as $error)
                   <div class="alert alert-danger">{{ $error }}</div>
               @endforeach
               @endif
               {{-- validate End  --}}

                <form action="{{ route('updateExam',$editData->id) }}" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label>Select Class : </label>
                            <select name="class_id" id=""class="form-select">
                                <option value="">Select Class</option>
                                @foreach ($className as $class)
                                    <option @if($class->id == $editData->class_id)  Selected @endif value="{{ $class->id}}">{{ $class->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="">Exam title :</label>
                            <select name="examination_id" id="" class="form-select">
                                <option value="">Select Exam title</option>
                                @foreach (@$examinations as $examination)
                                    <option @if($examination->id == $editData->examination_id)  Selected @endif value="{{ $examination->id }}">{{ $examination->name }}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                    {{-- <button style="margin-left: 14px;" type="button" class="btn btn-sm btn-add" id="plus-btn-data">Add</button> --}}
                    <button style="   
                    background-color: #4CAF50 !important;
                    border: none;
                    color: white;
                    padding: 15px 32px;
                    text-align: center;
                    text-decoration: none;
                    display: inline-block;
                    font-size: 16px;" type="button" class="btn btn-sm btn-add" id="plus-btn-data">Add</button>

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

                    {{-- Pre Requisites start --}}
                    <div class="row mt-4">
                        <div class="col-sm-12">
                            <div class="mg-t-10 mg-sm-t-0 add-data">
                                @if($editData->exam_schedule_items->count() == 0)
                                    <div class="d-flex align-items-center mt-2">
                                        <div class="d-flex align-items-center select-add-section" style="width: 97%;">
                                            {{-- <div class="col-md-3 col-1">
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
                                            </div> --}}
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
                                                    <label>Select Rooms : </label>
                                                    <select name="room_id[]" id=""class="form-select">
                                                        <option value="">Select Rooms</option>
                                                        @foreach ($rooms as $room)
                                                            <option value="{{ $room->id }}">{{ $room->name }}</option>
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
                                        <a id="plus-btn-data" href="javascript:void(0)" class="plus-btn-data px-1 p-0 m-0 ml-2"><i class="fas fa-plus"></i></a>
                                    </div>
                                @else
                                    @foreach ($editData->exam_schedule_items as $k=>$exam_schedule_item)

                                    <div class="d-flex align-items-center mt-2">
                                        <div class="d-flex align-items-center select-add-section" style="width: 97%;">
                                            <div class="row">
                                                <div class="col-md-3 col-1">
                                                    <label>Select Subject : </label>
                                                    <select name="old_subject_id[{{ $exam_schedule_item->id }}]" id=""class="form-select">
                                                        <option value="">Select Subject</option>
                                                        @foreach ($subjectName as $subject)
                                                            <option @if($subject->id == $exam_schedule_item->subject_id)  Selected @endif value="{{ $subject->id }}">{{ $subject->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-md-3">
                                                    <label>Select Rooms : </label>
                                                    <select name="old_room_id[{{ $exam_schedule_item->id }}]" id=""class="form-select">
                                                        <option value="">Select Rooms</option>
                                                        @foreach ($rooms as $room)
                                                            <option @if($room->id == $exam_schedule_item->room_id)  Selected @endif value="{{ $room->id }}">{{ $room->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Select Buldings : </label>
                                                    <select name="old_bulding_id[{{ $exam_schedule_item->id }}]" id=""class="form-select">
                                                        <option value="">Select Buldings</option>
                                                        @foreach ($buldings as $bulding)
                                                            <option @if($bulding->id == $exam_schedule_item->bulding_id)  Selected @endif value="{{ $bulding->id }}">{{ $bulding->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Select Floors : </label>
                                                    <select name="old_floor_id[{{ $exam_schedule_item->id }}]" id=""class="form-select">
                                                        <option value="">Select Floors</option>
                                                        @foreach ($floors as $floor)
                                                            <option @if($floor->id == $exam_schedule_item->floor_id)  Selected @endif value="{{ $floor->id }}">{{ $floor->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-3 mt-3">
                                                    <label for="">Pass Marke :</label>
                                                    <input type="number" value="{{ $exam_schedule_item->pass_marke }}" name="old_pass_marke[{{ $exam_schedule_item->id }}]" class="form-control">
                                                </div>
                                                <div class="col-md-3 mt-3">
                                                    <label for="">Fail Marke :</label>
                                                    <input type="number" value="{{ $exam_schedule_item->fail_marke }}" name="old_fail_marke[{{ $exam_schedule_item->id }}]" class="form-control">
                                                </div>

                                                <div class="col-md-2 column-2 mt-3">
                                                    <label for="">Exam Date :</label>
                                                    <input value="{{ @$exam_schedule_item->date }}" type="date" name="old_date[{{ $exam_schedule_item->id }}]" class="form-control">
                                                </div>
                                                <div class="col-md-2 column-3 mt-3">
                                                    <label for="">Start At :</label>
                                                    <input value="{{ @$exam_schedule_item->start_time }}" type="time" name="old_start_time[{{ $exam_schedule_item->id }}]" class="form-control">
                                                </div>
                                                <div class="col-md-2 column-4 mt-3">
                                                    <label for="">End At :</label>
                                                    <input value="{{ @$exam_schedule_item->end_time }}" type="time" name="old_end_time[{{ $exam_schedule_item->id }}]" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        {{-- @if($k == $editData->exam_schedule_items->count() - 1)
                                        <a id="plus-btn-data" href="javascript:void(0)" class="plus-btn-data px-1 p-0 m-0 ml-2"><i class="fas fa-plus"></i></a>
                                        @else --}}
                                        <a exam_schedule_item_id="{{ $exam_schedule_item->id }}" href="javascript:void(0)" class="minus-btn-data-old px-1 p-0 m-0 ml-2"><i class="fas fa-minus-circle"></i></a>
                                        {{-- @endif --}}
                                    </div>

                                    @endforeach
                                @endif
                            </div>
                        </div>

                        </div><!-- row -->
                      {{-- Pre Requisites End --}}

                    <div class="col-md-12 mt-4">
                        <button style="margin-left: -14px;" type="submit" class="btn btn-primary createClass">Create New Class</button>
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
                                            <label>Select Rooms : </label>
                                            <select name="room_id[]" id=""class="form-select">
                                                <option value="">Select Rooms</option>
                                                @foreach ($rooms as $room)
                                                    <option value="{{ $room->id }}">{{ $room->name }}</option>
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

