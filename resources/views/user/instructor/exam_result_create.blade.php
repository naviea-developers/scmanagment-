@extends('user.layouts.master-layout')
@section('head')
@section('title','- Add Examm Result')

@endsection
@section('main_content')

<div class="right_section">
    <div>
        <h3>Add Exam Result</h3>
    </div>
</div>

<form action="{{ route('instructor.student_result_store') }}" method="post" enctype="multipart/form-data">
    @csrf    
    <div class="col-md-12 mt-5 mb-5" style="border: 1px solid; padding: 10px">
        <div class="row">

        <div class="col-md-3">
            <label class="form-control-label"><b>Exam:</b></label>
            <select class="form-control form-select select2 examination_id" name="" id="examination_id">
                <option value="">Select examination</option>
                @foreach ($examinations as $examination)
                <option value="{{ $examination->id }}">{{ $examination->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-3">
            <label class="form-control-label"><b>Class:</b></label>
                <select class="form-control form-select select2 class t_class" name="" id="teacherAssentClass">
                <option value="">Select Class</option>
                {{-- @foreach ($uniqueAssents as $teacherAssent)
                <option value="{{ $teacherAssent->class->id }}">{{ $teacherAssent->class->name }}</option>
                @endforeach --}}
            </select>
        </div>

        <div class="col-md-2">
            <label class="form-control-label"><b>Session:</b></label>
            <select class="form-control form-select select2" name="session" id="teacherAssentSession">
                <option value="">Select Session</option>
                {{-- @foreach ($sessions as $session)
                <option value="{{ $session->id }}">{{ $session->start_year->year }} - {{ $session->end_year->year }}</option>
                @endforeach --}}
            </select>
        </div>
        
        <div class="col-md-2">
            <label class="form-control-label"><b>Section:</b></label>
            <select class="form-control form-select select2" name="" id="teacherAssentSection">
                <option value="">Select Section</option>
                {{-- @foreach ($teacherAssents as $teacherAssent)
                <option value="{{ $teacherAssent->schoolsection->id }}">{{ $teacherAssent->schoolsection->name }}</option>
                @endforeach --}}
            </select>
        </div>

        <div class="col-md-2">
            <label class="form-control-label"><b>Subject:</b></label>
            <select class="form-control form-select select2" id="teacherAssentSubject">
                <option value="">Select subject</option>
            </select>
        </div>
        
    

        </div>
    </div>

    <div class="get-search-student-show">

    </div>


    <!--search Class and year End -->
    {{-- <div class="row d-none" id="result-generate">
        <div class="col-md-12">
            <table class="table table-bordered table-striped dt-responsive" style="width: 100%">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Roll</th>
                        <th>Student Name</th>
                        <th>Student Father</th>
                        <th>Class</th>
                        <th>Session</th>
                        <th>Section</th>
                        <th>Mark</th>
                        <th>Add Mark</th>
                    </tr>
                </thead>
                <tbody id="result-generate_tr"></tbody>
            </table>
        </div>
    </div>
    <button type="submit" class="btn btn-success btn-sm p:2px">Result Generate</button> --}}
    <button type="submit" class="btn btn-success btn-sm p:2px">Result Submit</button> 
</form>

@endsection

@section('script')
<script>
    $(document).ready(function() {
       
        $('#examination_id,#teacherAssentClass, #teacherAssentSubject,#teacherAssentSection,#teacherAssentSession').change(function() {
            teacherAssentResult();
        });

        function teacherAssentResult() {
            var examinationId = $('#examination_id').val();
            var teacherAssentClassId = $('#teacherAssentClass').val();
            var AssentSubjectId = $('#teacherAssentSubject').val();
            var AssentSectionId = $('#teacherAssentSection').val();
            var AssentSessionId = $('#teacherAssentSession').val();
            // console.log(examinationId,teacherAssentClassId,AssentSubjectId,AssentSectionId)

                $.ajax({
                    url: "{{ route('get.teacher_assent_result') }}",
                    type: 'GET',
                    data: { examination_id: examinationId,class_id: teacherAssentClassId, section_id: AssentSectionId, subject_id: AssentSubjectId,session_id:AssentSessionId },
                    success: function(response) {
                        console.log(response);
                        $(".get-search-student-show").html(response);
                    }
                });
            
        }
    });
</script>

<script>
    $('body').on("change",'.examination_id',function(){
       let id = $(this).val();
            // console.log(id);
        getAssentClass(id,"teacherAssentClass");    
   });

   function getAssentClass(id,outid){
       let url = '{{ url("get/teacher_assent_class/") }}/' + id;
       axios.get(url)
           .then(res => {
            //    console.log(res);
           $('#'+outid).empty();
               let html = '';
               html += '<option value="">Select class</option>'
               res.data.forEach(element => {
                   html += "<option value=" + element.id + ">" + element.name + "</option>"
               });
               $('#'+outid).append(html);
               $('#'+outid).val("").change();
           });
   }

</script>


<script>
     $('body').on("change",'#teacherAssentClass',function(){
    //  $(document).on("change",".t_class", function(e) {
    //     e.preventDefault();
        let id = $(this).val();
        console.log(id);

        getAssentSection(id,"teacherAssentSection");
        getAssentSubject(id,"teacherAssentSubject");
        getAssentSession(id,"teacherAssentSession");
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

    function getAssentSession(id,outid){
      let url = '{{ url("get/teacher_assent_session/") }}/' + id;
      axios.get(url)
          .then(res => {
              console.log(res);
          $('#'+outid).empty();
              let html = '';
              html += '<option value="">Select Session</option>'
              res.data.forEach(element => {
                html += "<option value=" + element.session.id + ">" + element.session.start_year +"-"+ element.session.end_year + "</option>";
              });

              $('#'+outid).append(html);
              $('#'+outid).val("").change();
          });
    }
</script>
@endsection