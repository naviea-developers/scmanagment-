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
                      <h4>Update Class Routine</h4>
                      <p class="mg-b-0">Update Class Routine Information</p>
                    </div>
                  </div>

               {{-- validate start  --}}
               @if(count($errors) > 0)
               @foreach($errors->all() as $error)
                   <div class="alert alert-danger">{{ $error }}</div>
               @endforeach
               @endif
               {{-- validate End  --}}

                <form action="{{ route('admin.routine.update',$editData->id) }}" method="POST">
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
                        {{-- <div class="col-md-6">
                            <label for="">Exam title :</label>
                            <select name="examination_id" id="" class="form-select">
                                <option value="">Select Exam title</option>
                                @foreach (@$examinations as $examination)
                                    <option @if($examination->id == $editData->examination_id)  Selected @endif value="{{ $examination->id }}">{{ $examination->name }}</option>
                                @endforeach

                            </select>
                        </div> --}}
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

                    {{-- Pre Requisites start --}}
                    <div class="row mt-4">
                        <div class="col-sm-12">
                            <div class="mg-t-10 mg-sm-t-0 add-data">
                                @if($editData->class_routine_items->count() == 0)
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
                                                    <label>Select Teacher : </label>
                                                    <select name="teacher_id[]" id=""class="form-select">
                                                        <option value="">Select Teacher</option>
                                                        @foreach ($teachers as $teacher)
                                                            <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
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
                                                <div class="col-md-2 mt-3">
                                                    <label for="">Start Time :</label>
                                                    <input type="time" name="start_time[]" class="form-control">
                                                </div>
                                                <div class="col-md-2 mt-3">
                                                    <label for="">End Rime :</label>
                                                    <input type="time" name="end_time[]" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <a id="plus-btn-data" href="javascript:void(0)" class="plus-btn-data px-1 p-0 m-0 ml-2"><i class="fas fa-plus"></i></a>
                                    </div>
                                @else
                                    @foreach ($editData->class_routine_items as $k=>$class_routine_item)

                                    <div class="d-flex align-items-center mt-2">
                                        <div class="d-flex align-items-center select-add-section" style="width: 97%;">
                                            <div class="row">
                                                <div class="col-md-3 col-1">
                                                    <label>Select Subject : </label>
                                                    <select name="old_subject_id[{{ $class_routine_item->id }}]" id=""class="form-select">
                                                        <option value="">Select Subject</option>
                                                        @foreach ($subjectName as $subject)
                                                            <option @if($subject->id == $class_routine_item->subject_id)  Selected @endif value="{{ $subject->id }}">{{ $subject->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-md-3">
                                                    <label>Select Teacher : </label>
                                                    <select name="old_teacher_id[{{ $class_routine_item->id }}]" id=""class="form-select">
                                                        <option value="">Select Teacher</option>
                                                        @foreach ($teachers as $teacher)
                                                            <option  @if($teacher->id == $class_routine_item->teacher_id)  Selected @endif value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-md-3">
                                                    <label>Select Buldings : </label>
                                                    <select name="old_bulding_id[{{ $class_routine_item->id }}]" id=""class="form-select">
                                                        <option value="">Select Buldings</option>
                                                        @foreach ($buldings as $bulding)
                                                            <option @if($bulding->id == $class_routine_item->bulding_id)  Selected @endif value="{{ $bulding->id }}">{{ $bulding->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Select Floors : </label>
                                                    <select name="old_floor_id[{{ $class_routine_item->id }}]" id=""class="form-select">
                                                        <option value="">Select Floors</option>
                                                        @foreach ($floors as $floor)
                                                            <option @if($floor->id == $class_routine_item->floor_id)  Selected @endif value="{{ $floor->id }}">{{ $floor->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-md-3 mt-3">
                                                    <label>Select Rooms : </label>
                                                    <select name="old_room_id[{{ $class_routine_item->id }}]" id=""class="form-select">
                                                        <option value="">Select Rooms</option>
                                                        @foreach ($rooms as $room)
                                                            <option @if($room->id == $class_routine_item->room_id)  Selected @endif value="{{ $room->id }}">{{ $room->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                               
                                                <div class="col-md-3 column-3 mt-3">
                                                    <label for="">Start Time :</label>
                                                    <input value="{{ @$class_routine_item->start_time }}" type="time" name="old_start_time[{{ $class_routine_item->id }}]" class="form-control">
                                                </div>
                                                <div class="col-md-3 column-4 mt-3">
                                                    <label for="">End Time :</label>
                                                    <input value="{{ @$class_routine_item->end_time }}" type="time" name="old_end_time[{{ $class_routine_item->id }}]" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        {{-- @if($k == $editData->class_routine_items->count() - 1)
                                        <a id="plus-btn-data" href="javascript:void(0)" class="plus-btn-data px-1 p-0 m-0 ml-2"><i class="fas fa-plus"></i></a>
                                        @else --}}
                                        <a class_routine_item_id="{{ $class_routine_item->id }}" href="javascript:void(0)" class="minus-btn-data-old px-1 p-0 m-0 ml-2"><i class="fas fa-minus-circle"></i></a>
                                        {{-- @endif --}}
                                    </div>

                                    @endforeach
                                @endif
                            </div>
                        </div>

                        </div><!-- row -->
                      {{-- Pre Requisites End --}}

                    <div class="col-md-12 mt-4">
                        <button style="margin-left: -14px;" type="submit" class="btn btn-primary createClass">Create New Class Routine</button>
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
                                                    <label>Select Teacher : </label>
                                                    <select name="teacher_id[]" id=""class="form-select">
                                                        <option value="">Select Teacher</option>
                                                        @foreach ($teachers as $teacher)
                                                            <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
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
                                            <label>Select Rooms : </label>
                                            <select name="room_id[]" id=""class="form-select">
                                                <option value="">Select Rooms</option>
                                                @foreach ($rooms as $room)
                                                    <option value="{{ $room->id }}">{{ $room->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        
                                        <div class="col-md-3 mt-3">
                                            <label for="">Start Time :</label>
                                            <input type="time" name="start_time[]" class="form-control">
                                        </div>
                                        <div class="col-md-3 mt-3">
                                            <label for="">End Time :</label>
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
             $(this).parent().parent().append('<input type="hidden" name="delete_class_routine_item[]" value="'+$(this).attr('class_routine_item_id')+'">');
            $(this).parent().remove();
        });

    });

    //Course Pre Requisites End
</script>
    
@endsection

