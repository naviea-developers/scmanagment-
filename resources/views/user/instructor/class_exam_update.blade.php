@extends('user.layouts.master-layout')
@section('title','- Update Class Test')
@section('head')
<link href="{{ asset('public/backend/lib/summernote/summernote-bs4.css') }}" rel="stylesheet">
<style>
</style>
@endsection

@section('main_content')

<div class="br-mainpanel p-4">
    <div class="br-pagebody card shadow p-3" style="background-color: var(--seller_frontend_color);color:var(--seller_text_color)">
        <div class="br-section-wrapper">
            <h5 class="br-section-label text-center mb-4"> Update Class Test</h5>
            <hr>
            @if(count($errors) > 0)
            @foreach($errors->all() as $error)
            <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
            @endif

            @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
            <script>
                setTimeout(function(){
                    $('.alert.alert-success').hide();
                }, 3000);
            </script>
            @endif

            <div class="col-xl-12 mx-auto">
                <div class="form-layout form-layout-4">
                    <form action="{{ route('instructor.class_exam.update',$class_test->id) }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row mt-4">
                            <div class="col-sm-4">
                                <label class="form-control-label"><b>Title: </b><span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input type="text" name="name" value="{{ $class_test->name }}" class="form-control" placeholder="Enter title" required>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <label class="form-control-label"><b>Session Name :</b><span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <select name="session_id" class="form-control form-select select2">
                                        <option value=""> Select Session</option>
                                        @foreach ($sessions as $session)                                   
                                        <option @if($session->id == $class_test->session_id)  Selected @endif value="{{ $session->id }}">{{ $session->start_year }} - {{ $session->end_year }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <label class="form-control-label"><b>Class Name :</b><span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <select id="class_ass" class="form-control form-select select2" name="class_id">
                                        <option value="">Select Class</option>
                                        @foreach ($classs as $class)                                   
                                        <option @if($class->id == $class_test->class_id)  Selected @endif value="{{ $class->id }}">{{ $class->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-4 mt-3">
                                <label class="form-control-label"><b>Section Name :</b><span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <select id="section" class="form-control form-select select2" name="section_id">
                                        <option value="">Select section</option>
                                        @foreach ($sections as $section)                                   
                                        <option @if($section->id == $class_test->section_id)  Selected @endif value="{{ $section->id }}">{{ $section->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-4 mt-3">
                                <label class="form-control-label"><b>Subject Name :</b><span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <select id="subject" class="form-control form-select select2" name="subject_id">
                                        <option value="">Select subject</option>
                                        @foreach ($subjects as $subject)                                   
                                        <option @if($subject->id == $class_test->subject_id)  Selected @endif  value="{{ $subject->id }}">{{ $subject->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-4 mt-3">
                                <label class="form-control-label"><b>Lesson Name :</b><span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <select id="lession" class="form-control form-select select2" name="lession_id">
                                        <option value="">Select lesson</option>
                                        @foreach ($lessions as $lession)                                   
                                        <option @if($lession->id == $class_test->lession_id)  Selected @endif  value="{{ $lession->id }}">{{ $lession->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-4 mt-3">
                                <label class="form-control-label"><b>Page: </b><span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input type="text"  name="page_number" value="{{ @$class_test->page_number }}" class="form-control" placeholder="Enter Page" required>
                                </div>
                            </div>

                            {{-- <div class="col-sm-4 mt-3">
                                <label class="form-control-label"><b>Pdf File: </b><span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input type="file" name="home_workpdf" value="{{ old('home_workpdf') }}" class="form-control" accept="application/pdf, application/vnd.ms-excel" placeholder="Enter home_work pdf">
                                </div>
                            </div> --}}

                                <div class="col-sm-4 mt-3">
                                    <label class="form-control-label">Pdf File: </label>
                                    <div class=" mg-t-10 mg-sm-t-0">
                                        <input type="file" name="class_exampdf" value="{{ old('class_exampdf') }}" class="form-control" accept="application/pdf, application/vnd.ms-excel" placeholder="Enter home_work pdf">
                                    </div>
                                </div>
                                
                                <div class="col-sm-2 mt-3">
                                    <label class="form-control-label"><b>View Pdf:</b></label>
                                    <div class="align-items-center select-add-section">
                                        <a href="{{ @$class_test->class_exampdf_show }}" target="_blank"><i class="fa-duotone fa fa-eye"></i></a>
                                    </div>
                                </div>

                                <div class="col-sm-4 mt-3">
                                    <label class="form-control-label"><b>Class Test Date :</b></label>
                                    <div class="mg-t-10 mg-sm-t-0">
                                        <input type="date" name="date" value="{{ @$class_test->date }}" class="form-control" placeholder="enter class test date">
                                    </div>
                                </div>

                                <div class="col-sm-4 mt-3">
                                    <label class="form-control-label"><b>Class Test Duration :</b></label>
                                    <div class="mg-t-10 mg-sm-t-0">
                                        <input type="time" name="class_test_duration" value="{{ @$class_test->class_test_duration }}" class="form-control" placeholder="enter class test duration">
                                    </div>
                                </div>

                                

                        </div>

                        <div class="row mt-4">
                            <div class="col-sm-12">
                                <label class="form-control-label"><b>Details </b><span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <textarea class="form-control" id="summernote_two" name="details">{!! @$class_test->details !!}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-right">
                                <a href="{{ route('instructor.class_exam.index') }}" type="button" class="btn btn-secondary text-white mr-2">Cancel</a>
                                <button type="submit" class="btn btn-info">Save</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')

<script>
   $(document).ready(function() {
    $('#class_ass').change(function() {
        var classId = $(this).val();
        if (classId) {
            $.ajax({
                url: '{{ route('instructor.homework.sectionsSubjects') }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    class_id: classId
                },
                success: function(data) {
                    $('#section').empty().append('<option value="">Select section</option>');
                    $.each(data.sections, function(key, section) {
                        $('#section').append('<option value="' + section.id + '">' + section.name + '</option>');
                    });

                    $('#subject').empty().append('<option value="">Select subject</option>');
                    $.each(data.subjects, function(key, subject) {
                        $('#subject').append('<option value="' + subject.id + '">' + subject.name + '</option>');
                    });
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        } else {
            $('#section').empty().append('<option value="">Select section</option>');
            $('#subject').empty().append('<option value="">Select subject</option>');
        }
    });

    $('#section').change(function() {
        var sectionId = $(this).val();
        var classId = $('#class_ass').val();
        if (sectionId) {
            $.ajax({
                url: '{{ route('instructor.homework.sectionsSubjects') }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    class_id: classId,
                    section_id: sectionId
                },
                success: function(data) {
                    $('#subject').empty().append('<option value="">Select subject</option>');
                    $.each(data.subjects, function(key, subject) {
                        $('#subject').append('<option value="' + subject.id + '">' + subject.name + '</option>');
                    });
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        } else {
            $('#subject').empty().append('<option value="">Select subject</option>');
        }
    });
});
</script>

@endsection































































