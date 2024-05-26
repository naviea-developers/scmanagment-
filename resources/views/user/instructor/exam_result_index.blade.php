
@extends('user.layouts.master-layout')
@section('title','- Manage Exam Result')
@section('head')
<!-- start datatable css--->
<link href="{{asset('public/backend')}}/lib/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="{{asset('public/backend')}}/lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet">
@endsection

@section('main_content')

<div class="right_section">
    <div>
        <h3>Manage Exam Result</h3>
    </div>
</div>

    {{-- success message start --}}
    @if(session()->has('message'))
    <div class="alert alert-success">
    {{session()->get('message')}}
    </div>
    <script>
        setTimeout(function(){
            $('.alert.alert-success').hide();
        }, 3000);
    </script>
    @endif
    {{-- success message start --}}




    <div class="col-md-12 mt-5 mb-5" style="border: 1px solid; padding: 10px">
        <div class="row">
          <div class="col-md-3">
            <label class=" form-control-label"><b>Examination:</b></label>
            <select class="form-control searchbtn" name="examination_id" id="examination_id">
                <option value="">Select Examination</option>
                @foreach ($examinations as $examination)
                <option value="{{ $examination->id }}">{{ $examination->name }}</option>
                @endforeach
            </select>
          </div>
          <div class="col-md-3">
            <label class=" form-control-label"><b>Session:</b></label>
            <select class="form-control" name="session_id" id="session_id">
                <option value="">Select Session</option>
                @foreach ($sessions as $session)
                <option value="{{ $session->id }}">{{ $session->start_year }} - {{ $session->end_year }}</option>
                @endforeach
            </select>
          </div>
          
          <div class="col-md-3">
            <label class=" form-control-label"><b>Class:</b></label>
            <select class="form-control class_id" name="class_id" id="class">
                <option value="">Select Class</option>
                @foreach ($classes as $class)
                <option value="{{ $class->id }}">{{ $class->name }}</option>
                @endforeach
            </select>
          </div>
          {{-- <div class="col-md-2">
            <label class=" form-control-label"><b>Group:</b></label>
            <select class="form-control group_id" name="group_id" id="group">
                <option value="">Select Group</option>
               
            </select>
          </div> --}}
          <div class="col-md-3">
            <label class=" form-control-label"><b>Section:</b></label>
            <select class="form-control section_id" name="section_id" id="section">
                <option value="">Select Section</option>
                {{-- @foreach ($sections as $section)
                <option value="{{ $section->id }}">{{ $section->name }}</option>
                @endforeach --}}
            </select>
          </div>
        </div>
      </div>



<div style="overflow-x:auto;">
    <table id="dataTableC" class="table table-striped mt-3" style="min-width: 800px;">
        <thead >
        <tr class="" style="background-color: var(--seller_frontend_color);color:var(--seller_text_color)">
            <th class="wd-10p">Id</th>
            <th class="wd-15p">Exam Name</th>
            <th class="wd-15p">Class</th>
            <th class="wd-15p">Roll</th>
            <th class="wd-15p">Sutdent</th>
            <th class="wd-15p">Session</th>
            <th class="wd-15p">Section</th>
            <th class="wd-15p">Full Marks</th>
            <th class="wd-15p">Pass Marks</th>
            <th class="wd-15p">Obtained Marks</th>
            <th class="wd-10p">Action</th>
        </tr>
        </thead>
        <tbody>
           
        </tbody>
  </table>
</div>

@endsection



@section('script')

<script src="{{asset('public/backend')}}/lib/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{asset('public/backend')}}/lib/datatables.net-dt/js/dataTables.dataTables.min.js"></script>
<script src="{{asset('public/backend')}}/lib/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{asset('public/backend')}}/lib/datatables.net-responsive-dt/js/responsive.dataTables.min.js"></script>



<script>
    $('body').on("change",'#class',function(){
        let id = $(this).val();
            console.log(id);
        getSection(id,"section");
    });

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


<script>
    var s_data = $('#dataTableC').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax":{
            "url": "{{ route('teacher.get_result_by_ajax') }}",
            "dataType": "json",
            "type": "POST",
            data: function(data){
              data.examination_id= $('#examination_id').val(),
              data.session_id=$('#session_id').val(),
              data.class_id= $('.class_id').val(),
              data.section_id= $('.section_id').val(),
              data._token = "{{ csrf_token() }}";

            },
        },
        "columns": [
            { "data": "id"},
            { "data": "examination_id"},
            { "data": "class_id"},
            { "data": "roll_number"},
            { "data": "student_id"},
            { "data": "session_id"},
            { "data": "section_id"},
            { "data": "marke"},
            { "data": "pass_marke"},
            { "data": "obtained_marke"},
            { "data": "options"},
            
        ],
        "columnDefs": [ {
          "targets": 10,
          "orderable": false
          } ]

    });
    $('#examination_id, #session_id, .class_id, .section_id').change(function(){
      console.log(this);
      console.log(s_data);
      s_data.draw();
    });
    
  </script>
@endsection
