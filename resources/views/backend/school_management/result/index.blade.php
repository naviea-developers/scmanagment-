@section('title')
Admin - All Results
@endsection

@extends('Backend.layouts.layouts')

@section('main_contain')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">

        <div class="br-pagebody">
          <div class="br-section-wrapper">
            <h6 class="br-section-label text-center">All Results</h6>

            {{-- <a style="margin-bottom: 20px" href="{{ route('admin.exam_result.create') }}" class="btn btn-primary btn-sm float-right">
              <i class="fa fa-plus"></i> Add Designation
            </a> --}}

               {{-- success message start --}}
            @if(session()->has('message'))
            <div class="alert alert-success">
            {{-- <button type="button" class="close" data-bs-dismiss="alert" aria-hidden="true"></button> --}}
            {{session()->get('message')}}
            </div>
            <script>
                setTimeout(function(){
                    $('.alert.alert-success').hide();
                }, 3000);
            </script>
            @endif
            {{-- success message End --}}



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
                {{-- <div class="col-md-2">
                  <label class=" form-control-label"><b>Roll Number:</b></label>
                  <input type="number" class="form-control" name="roll_number" id="roll_number">
                </div> --}}
              </div>
            </div>



            <div class="table-wrapper">
              <table id="dataTableB" class="table display responsive nowrap">
              {{-- <table id="datatable1" class="table display responsive nowrap"> --}}
                <thead>
                  <tr>
                    <th class="wd-10p">Id</th>
                    <th class="wd-15p">Exam Name</th>
                    <th class="wd-15p">Teacher</th>
                    <th class="wd-15p">Class</th>
                    <th class="wd-15p">Roll</th>
                    <th class="wd-15p">Sutdent</th>
                    <th class="wd-15p">Session</th>
                    <th class="wd-15p">Section</th>
                    <th class="wd-15p">Full Marks</th>
                    <th class="wd-15p">Pass Marks</th>
                    <th class="wd-15p">Obtained Marks</th>
                    <th class="wd-15p">Status</th>
                    <th class="wd-10p">Action</th>
                  </tr>
                </thead>
                <tbody>
                    {{-- @php
                        $i = 1;
                    @endphp
                  @if (count($results) > 0)
                    @foreach ($results as $result)
                      <tr>
                          <td>{{ $i++ }}</td>
                          <td>{{ @$result->examination->name }}</td>
                          <td>{{ @$result->class->name }}</td>
                          <td>{{ @$result->roll_number }}</td>
                          <td>{{ @$result->student->student_name }}</td>
                          <td>{{ @$result->session->start_year }} - {{ @$result->session->end_year }}</td>
                          <td>{{ @$result->marke }}</td>
                          <td>{{ @$result->pass_marke }}</td>
                          <td>{{ @$result->obtained_marke }}</td>

                          <td>
                            @if(@$result->status == 0)
                            <a href="{{ route('admin.exam_result.status',$result->id) }}" class="btn btn-sm btn-warning">Inactive</a>
                            @elseif(@$result->status == 1)
                            <a href="{{ route('admin.exam_result.status',$result->id) }}" class="btn btn-sm btn-success">Active</a>
                            @endif
                          </td>
                          <td>
                            <a class="btn text-info" href="{{ route('admin.exam_result.edit', $result->id) }}"><i class="icon ion-compose tx-28"></i></a>
                            <button class="btn text-danger bg-white"  value="{{$result->id}}" id="dataDeleteModal"><i class="icon ion-trash-a tx-28"></i></button>
                          </td>
                      </tr> 
                    @endforeach
                  @endif --}}

                </tbody>
              </table>
            </div><!-- table-wrapper -->


          </div><!-- br-section-wrapper -->
        </div><!-- br-pagebody -->
        <footer class="br-footer">
          <div class="footer-left">
            <div class="mg-b-2">Copyright &copy; <?php echo date('Y');?> NavieaSoft. All Rights Reserved.</div>
            <div>Attentively and carefully made by NavieaSoft.</div>
          </div>
        </footer>
    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

    <!--_-- ########### Start Add Category MODAL ############---->


    <!--_-- ########### End Add Category MODAL ############---->


    <!--_-- ########### Start Delete Category MODAL ############---->

    {{-- <div id="datamodalshow" class="modal fade">
        <div class="modal-dialog modal-dialog-top" role="document">
        <div class="modal-content tx-size-sm">
            <div class="modal-body tx-center pd-y-20 pd-x-20">
                <form action="{{ route('admin.exam_result.delete') }}" method="post">
                    @csrf
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <i class="icon icon ion-ios-close-outline tx-60 tx-danger lh-1 mg-t-20 d-inline-block"></i>
                    <h4 class="tx-danger  tx-semibold mg-b-20 mt-2">Are you sure! you want to delete this?</h4>
                     <input type="hidden" name="designation_id" id="modal_data_id">
                    <button type="submit" class="btn btn-danger mr-2 text-white tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium mg-b-20">
                        yes
                    </button>
                    <button type="button" class="btn btn-success tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium mg-b-20" data-dismiss="modal" aria-label="Close">
                        No
                    </button>
                </form>
            </div><!-- modal-body -->
        </div><!-- modal-content -->
        </div><!-- modal-dialog -->
    </div><!-- modal --> --}}

   
@endsection






@section('script')

  <script>
    var s_data = $('#dataTableB').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax":{
            "url": "{{ route('admin.getResultByAjax') }}",
            "dataType": "json",
            "type": "POST",
            data: function(data){
              data.examination_id= $('#examination_id').val(),
              data.session_id=$('#session_id').val(),
              data.class_id= $('.class_id').val(),
              // data.group_id= $('.group_id').val(),
              data.section_id= $('.section_id').val(),
              // data.roll_number= $('.roll_number').val(),
              data._token = "{{ csrf_token() }}";

            },
        },
        "columns": [
            { "data": "id"},
            { "data": "examination_id"},
            { "data": "teacher_id"},
            { "data": "class_id"},
            { "data": "roll_number"},
            { "data": "student_id"},
            { "data": "session_id"},
            { "data": "section_id"},
            { "data": "marke"},
            { "data": "pass_marke"},
            { "data": "obtained_marke"},
            { "data": "status"},
            { "data": "options"},
        ],
        "columnDefs": [ {
          "targets": 12,
          "orderable": false
          } ]

    });
    $('#examination_id, #session_id, .class_id, .group_id, .section_id, #roll_number').change(function(){
      console.log(this);
      console.log(s_data);
      s_data.draw();
    });
    
  </script>
@endsection