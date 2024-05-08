@extends('backend.master')

@section('title', 'Add Teacher For Class')


<link rel="stylesheet" href="{{ URL::asset('css/custom/pathname') }}">

@section('content')

<div class="br-mainpanel">

        <div class="p-2">

            <div class="br-section-wrapper">

                <div class="br-pagetitle">
                    <i class="fa-duotone fa-person-chalkboard"></i>
                    <div>
                      <h4>Add Teacher For Class</h4>
                      <p class="mg-b-0">All Class Details Here</p>
                    </div>
                  </div>

                <h2>Find The Best Teacher </h2>

               <form action="{{ route('uploadTeacherForClass') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Select Class</label>
                            <select name="class" id="classSelection" class="form-select"
                             required>
                                <option value="">----Select Class-------</option>
                                @foreach ($classlist as $cl)
                                    <option value="{{ $cl->class_id }}">
                                        {{ $cl->class_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label for="">Select Subject</label>
                            <select name="sub" id="SubjectSelection"
                            class="form-select" required>
                            <option value="">-----------</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label for="">Choose Teacher</label>
                            <select name="teacher" required id="chooseTeacher"
                            class="form-select" >
                                <option value=""></option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <button class="btn btn-info"
                        style="width:30%;margin:0 auto; margin-top:30px;">
                        Add this Teacher</button>
                    </div>


               </form>



            </div>


        </div>


<script src="js/custom/addTeacherForClass.js"></script>
</div>
@stop
