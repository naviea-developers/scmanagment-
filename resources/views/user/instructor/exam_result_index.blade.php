@extends('user.layouts.master-layout')
@section('head')
@section('title','- Manage Courses')

@endsection
@section('main_content')

<div class="right_section">
    <div>
        <h3>Manage Exam Result</h3>
    </div>
</div>

<div class="col-md-12 mt-5 mb-5" style="border: 1px solid; padding: 10px">
    <div class="row">

    <div class="col-md-3">
        <label class="form-control-label"><b>Exam:</b></label>
        <select class="form-control form-select select2" id="examination_id">
            <option value="">Select Class</option>
            @foreach ($examinations as $examination)
            <option value="{{ $examination->id }}">{{ $examination->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="col-md-3">
        <label class="form-control-label"><b>Class:</b></label>
        <select class="form-control form-select select2" id="teacherAssentClass">
            <option value="">Select Class</option>
            @foreach ($teacherAssents as $teacherAssent)
            <option value="{{ $teacherAssent->class->id }}">{{ $teacherAssent->class->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="col-md-2">
        <label class="form-control-label"><b>Subject:</b></label>
        <select class="form-control form-select select2" id="teacherAssentSubject">
            <option value="">Select subject</option>
        </select>
    </div>
    
    <div class="col-md-2">
        <label class="form-control-label"><b>Section:</b></label>
        <select class="form-control form-select select2" id="teacherAssentSection">
            <option value="">Select Section</option>
            {{-- @foreach ($teacherAssents as $teacherAssent)
            <option value="{{ $teacherAssent->schoolsection->id }}">{{ $teacherAssent->schoolsection->name }}</option>
            @endforeach --}}
        </select>
    </div>
    
    {{-- <div class="col-md-2">
        <label class="form-control-label"><b>Session:</b></label>
        <select class="form-control form-select select2" name="session_id" id="teacherAssentSession">
            <option value="">Select Session</option>
            @foreach ($sessions as $session)
            <option value="{{ $session->id }}">{{ $session->start_year->year }} - {{ $session->end_year->year }}</option>
            @endforeach
            
        </select>
    </div> --}}

    </div>
</div>

<div class="get-search-student-show"></div>

@endsection

@section('script')

<script>
    $(document).ready(function() {
       
        $('#examination_id,#teacherAssentClass, #teacherAssentSubject,#teacherAssentSection').change(function() {
            teacherAssentResult();
        });

        function teacherAssentResult() {
            var examinationId = $('#examination_id').val();
            var teacherAssentClassId = $('#teacherAssentClass').val();
            var AssentSubjectId = $('#teacherAssentSubject').val();
            var AssentSectionId = $('#teacherAssentSection').val();
            // console.log(examinationId,teacherAssentClassId,AssentSubjectId,AssentSectionId)

                $.ajax({
                    url: "{{ route('get.teacher_assent_result') }}",
                    type: 'GET',
                    data: { examination_id: examinationId,class_id: teacherAssentClassId, section_id: AssentSectionId, subject_id: AssentSubjectId },
                    success: function(response) {
                        console.log(response);
                        $(".get-search-student-show").html(response);
                    }
                });
            
        }
    });
</script>


<script>
     $('body').on("change",'#teacherAssentClass',function(){
        let id = $(this).val();
            //  console.log(id);
        getAssentSection(id,"teacherAssentSection");
        getAssentSubject(id,"teacherAssentSubject");
        // getAssentSession(id,"teacherAssentSession");
    });

    function getAssentSection(id,outid){
        let url = '{{ url("get/teacher_assent_school_section/") }}/' + id;
        axios.get(url)
            .then(res => {
                console.log(res);
            $('#'+outid).empty();
                let html = '';
                html += '<option value="">Select Section</option>'
                res.data.forEach(element => {
                    html += "<option value=" + element.schoolsection.id + ">" + element.schoolsection.name + "</option>"
                });
                $('#'+outid).append(html);
                $('#'+outid).val("").change();
            });
    }

    function getAssentSubject(id,outid){
        let url = '{{ url("get/teacher_assent_subject/") }}/' + id;
        axios.get(url)
            .then(res => {
                console.log(res);
            $('#'+outid).empty();
                let html = '';
                html += '<option value="">Select Subject</option>'
                res.data.forEach(element => {
                    html += "<option value=" + element.subject.id + ">" + element.subject.name + "</option>"
                });
                $('#'+outid).append(html);
                $('#'+outid).val("").change();
            });
    }

    // function getAssentSession(id,outid){
    //   let url = '{{ url("get/teacher_assent_session/") }}/' + id;
    //   axios.get(url)
    //       .then(res => {
    //           console.log(res);
    //       $('#'+outid).empty();
    //           let html = '';
    //           html += '<option value="">Select Session</option>'
    //           res.data.forEach(element => {
    //             html += "<option value=" + element.id + ">" + element.session.start_year.year + "</option>";
    //           });

    //           $('#'+outid).append(html);
    //           $('#'+outid).val("").change();
    //       });
    // }
</script>
@endsection