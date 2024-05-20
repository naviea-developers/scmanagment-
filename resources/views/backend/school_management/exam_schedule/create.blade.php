@extends('Backend.layouts.layouts')

@section('title', 'Add exam Schedule')
@section('style')
<style>
    .select2-container--default .select2-selection--single {
        height: 41px;}
</style>
@endsection
{{-- <link rel="stylesheet" href="css/custom/class.css"> --}}
<link rel="stylesheet" href="{{ asset('public') }}/css/custom/eduStc.css">

@section('main_contain')

<div class="br-mainpanel">

        <div class="p-2">

            <div class="br-section-wrapper">

                <div class="br-pagetitle">
                    <i class="fa-duotone fa-screen-users"></i>
                    <div>
                      <h4>Add Exam Schedule</h4>
                      <p class="mg-b-0">Add Exams Schedule</p>
                    </div>
                </div>

               {{-- validate start  --}}
               @if(count($errors) > 0)
               @foreach($errors->all() as $error)
                   <div class="alert alert-danger">{{ $error }}</div>
               @endforeach
               @endif
               {{-- validate End  --}}

                <form action="{{ route('admin.examschedule.store') }}" method="POST">
                    @csrf
                    <div class="row mb-3">
    
                        <div class="col-md-3">
                            <label for="">Exam title :</label>
                            <select name="examination_id" id="examination" class="form-control form-select select2">
                                <option value="">Select Exam title</option>
                                @foreach (@$examinations as $examination)
                                    <option value="{{ $examination->id }}">{{ $examination->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label>Select Class : </label>
                            <select name="class_id" id="class_exam" class="form-control form-select select2">
                                <option value="">Select Class</option>
                                {{-- @foreach ($className as $class)
                                    <option value="{{ $class->id}}">{{ $class->name }}</option>
                                @endforeach --}}
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label for="">Exam Class :</label>
                            <select name="exam_class_id" id="examclassSub" class="form-control form-select select2">
                                <option value="">Select Exam class</option>
                                {{-- @foreach (@$examClasss as $examClass)
                                    <option value="{{ $examClass->id }}">{{ @$examClass->subject->name }}</option>
                                @endforeach --}}
                            </select>
                        </div>
                        
                       

                        <div class="col-md-3">
                            <label>Sections : </label>
                            <select name="section_id" id="section" class="form-control form-select select2">
                                <option value="">Select section</option>
                                {{-- @foreach ($sections as $section)
                                    <option value="{{ $section->id}}">{{ $section->name }}</option>
                                @endforeach --}}
                            </select>
                        </div>
                        

                        <div class="col-md-3 mt-3">
                            <label>Select Buldings : </label>
                            <select name="bulding_id" id="bulding"class="form-control form-select select2">
                                <option value="">Select Buldings</option>
                                @foreach ($buldings as $bulding)
                                    <option value="{{ $bulding->id }}">{{ $bulding->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 mt-3">
                            <label>Select Floors : </label>
                            <select name="floor_id" id="floor" class="form-control form-select select2">
                                <option value="">Select Floors</option>
                                {{-- @foreach ($floors as $floor)
                                    <option value="{{ $floor->id }}">{{ $floor->name }}</option>
                                @endforeach --}}
                            </select>
                        </div>
                        <div class="col-md-3 mt-3">
                            <label>Select Rooms : </label>
                            <select name="room_id" id="room"class="form-control form-select select2">
                                <option value="">Select Rooms</option>
                                {{-- @foreach ($rooms as $room)
                                    <option value="{{ $room->id }}">{{ $room->name }}</option>
                                @endforeach --}}
                            </select>
                        </div>
                    </div>
                    

                    <div class="col-md-12 mt-4" >
                        <button type="submit" style="margin-left: -14px;" class="btn btn-primary createClass">
                            Create New Exam Class</button>
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

    $(document).on('change','#examination',function(e){
        let id = $(this).val();
            console.log(id);
        getClassExam(id,"class_exam");
    });

    function getClassExam(id,outid){
        let url = '{{ url("get/examination_class/") }}/' + id;
        axios.get(url)
            .then(res => {
                console.log(res);
            $('#'+outid).empty();
                let html = '';
                html += '<option value="">Select class</option>'
                res.data.forEach(element => {
                    html += "<option value=" + element.class.id + ">" + element.class.name + "</option>"
                });
                $('#'+outid).append(html);
                $('#'+outid).val("").change();
            });
    }
</script>

<script>
    //  $(document).on('change','#class_exam',function(e){
    //     let id = $(this).val();
    //     console.log(id);
    //     getExamClassSub(id,"examclassSub");
    //     getSection(id,"section");
    // });

    // function getExamClassSub(id,outid){
    //   let url = '{{ url("get/exam-class-subject/") }}/' + id;
    //   axios.get(url)
    //       .then(res => {
    //           console.log(res);
    //       $('#'+outid).empty();
    //           let html = '';
    //           html += '<option value="">Select Exam class subject</option>'
    //           res.data.forEach(element => {
    //               html += "<option value=" + element.subject.id + ">" + element.subject.name + "</option>"
    //           });
    //           $('#'+outid).append(html);
    //           $('#'+outid).val("").change();
    //       });
    // }


    $(document).on('change','#class_exam,#examination',function(e){
    var examinationId = $('#examination').val();
    var classExamId = $('#class_exam').val();
    // console.log({ examinationId, classExamId }); 
    getSection(classExamId,"section");
    getExamClassSub(examinationId, classExamId, "examclassSub");
   
    });

    function getExamClassSub(examinationId, classExamId, outid){
        let url = `{{ url("get/exam-class-subject/") }}/${examinationId}/${classExamId}`;
        axios.get(url)
            .then(res => {
                console.log(res);
                $('#'+outid).empty();
                let html = '<option value="">Select Exam class subject</option>';
                res.data.forEach(element => {
                    html += `<option value="${element.id}">${element.subject.name}</option>`;
                });
                $('#'+outid).append(html);
                $('#'+outid).val("").change();
            })
            .catch(error => {
                console.error("There was an error fetching the data!", error);
            });
    }


    function getSection(id,outid){
        let url = '{{ url("get/school_section/") }}/' + id;
        axios.get(url)
            .then(res => {
                console.log(res);
            $('#'+outid).empty();
                let html = '';
                html += '<option value="">Select Section</option>'
                res.data.forEach(element => {
                    html += "<option value=" + element.id + ">" + element.name + "</option>"
                });


                $('#'+outid).append(html);
                $('#'+outid).val("").change();
            });
    }

</script>
@endsection




