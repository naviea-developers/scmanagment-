@section('title')
Admin - All Syllabus
@endsection

@extends('Backend.layouts.layouts')

@section('main_contain')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">

        <div class="br-pagebody">
          
          @include('Backend.school_management.syllabus.create')

          <div class="br-section-wrapper data-list pt-3">

              <h6 class="br-section-label text-center">All Syllabus</h6>
             

            <div class="col-md-12 mt-5 mb-5" style="border: 1px solid; padding: 10px">
              <div class="row">
                <div class="col-md-6">
                  <label class="form-control-label"><b>Session:</b></label>
                  <select class="form-control form-select select2" name="session_id" id="session_id">
                      <option value="">Select Session</option>
                      @foreach ($sessions as $session)
                      <option value="{{ $session->id }}">{{ $session->start_year }} - {{ $session->end_year }}</option>
                      @endforeach
                  </select>
                </div>

                  <div class="col-md-6">
                      <label class="form-control-label"><b>Class:</b></label>
                      <select class="form-control form-select select2" id="class_syllbus">
                          <option value="">Select Class</option>
                          @foreach ($classes as $class)
                          <option value="{{ $class->id }}">{{ $class->name }}</option>
                          @endforeach
                      </select>
                  </div>
          
                  

                  {{-- <div class="col-md-4">
                      <label class="form-control-label"><b>Examination:</b></label>
                      <select class="form-control form-select select2" name="examination_id" id="examination">
                          <option value="">Select Examination</option>
                          @foreach ($examinations as $examination)
                          <option value="{{ $examination->id }}">{{ $examination->name }}</option>
                          @endforeach
                      </select>
                  </div> --}}
              </div>
            </div>


            <div class="get-search-syllabus">
            <div style="text-align: right;">
              <a style="margin-bottom: 20px" href="javascript:void(0);" class="btn btn-primary btn-sm btn-new">
                  <i class="fa fa-plus"></i> Add Syllabus
              </a>
            </div>
          


            <div class="table-wrapper">
              <table id="data_table_list" class="table display responsive nowrap">
                <thead>
                  <tr>
                    <th class="wd-10p">Id</th>
                    <th class="wd-15p">Examination</th>
                    <th class="wd-15p">Class Name</th>
                    <th class="wd-15p">Subject Name</th>
                    <th class="wd-15p">Lession Name</th>
                    <th class="wd-15p">Status</th>
                    <th class="wd-10p">Action</th>
                  </tr>
                </thead>
                <tbody>
                    
                </tbody>
              </table>
            </div><!-- table-wrapper -->
          </div>
          </div>
          <div class="data-edit-res"></div>
        </div><!-- br-section-wrapper -->
          
        <footer class="br-footer">
          <div class="footer-left">
            <div class="mg-b-2">Copyright &copy; <?php echo date('Y');?> NavieaSoft. All Rights Reserved.</div>
            <div>Attentively and carefully made by NavieaSoft.</div>
          </div>
        </footer>
    </div>
    <!-- ########## END: MAIN PANEL ########## -->


    <!--_-- ########### Start Delete Category MODAL ############---->
    <div id="datamodalshow" class="modal fade">
      <div class="modal-dialog modal-dialog-top" role="document">
          <div class="modal-content tx-size-sm">
              <div class="modal-body tx-center pd-y-20 pd-x-20">
                  <form id="data-form-delete" action="{{ route('admin.syllabus.delete') }}" method="post">
                      @csrf
                      <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                      <i class="icon icon ion-ios-close-outline tx-60 tx-danger lh-1 mg-t-20 d-inline-block"></i>
                      <h4 class="tx-danger  tx-semibold mg-b-20 mt-2">Are you sure! you want to delete this?</h4>
                      <input type="hidden" name="syllabus_id" id="modal_data_id">
                      <button type="submit" class="btn-delete btn btn-danger mr-2 text-white tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium mg-b-20"> yes</button>
                      <button type="button" class="btn btn-success tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium mg-b-20" data-bs-dismiss="modal" aria-label="Close"> No</button>
                  </form>
              </div><!-- modal-body -->
          </div><!-- modal-content -->
      </div><!-- modal-dialog -->
  </div><!-- modal -->

@endsection


@section('script')
<script>

  var datatable = $('#data_table_list').DataTable({
     // 'pageLength': 2,
     "order": [[ 0, "desc" ]],
      "processing": true,
      "serverSide": true,
      "ajax":{
          "url": "{{ route('admin.syllabus.ajax') }}",
          "dataType": "json",
          "type": "POST",
          data: function(data){
            data._token = "{{ csrf_token() }}";
          },
      },
      "columns": [
          { "data": "id"},
          { "data": "examination_id"},
          { "data": "class_id"},
          { "data": "subject_id"},
          { "data": "lession_id"},
          { "data": "status"},
          { "data": "options"},
      ],
      "columnDefs": [ {
        "targets": 6,
        "orderable": false
        } ]

  });
</script>

<script>
  $(document).ready(function() {
      // $('#class, #session_id, #examination').change(function() {
        $('#class_syllbus, #session_id').change(function() {
          fetchSyllabus();
      });

      function fetchSyllabus() {
          var classId = $('#class_syllbus').val();
          var sessionId = $('#session_id').val();
          console.log(classId,sessionId)
          // var examId = $('#examination').val();

          // if (classId && sessionId && examId) {
          //     $.ajax({
          //         url: "{{ route('get.syllabus') }}",
          //         type: 'GET',
          //         data: {
          //             class_id: classId,
          //             session_id: sessionId,
          //             examination_id: examId
          //         },
          //         success: function(response) {
          //             console.log(response);
          //             $(".get-search-syllabus").html(response);
          //         }
          //     });
          // }
          if (classId && sessionId) {
              $.ajax({
                  url: "{{ route('get.syllabus') }}",
                  type: 'GET',
                  data: {
                      class_id: classId,
                      session_id: sessionId
                  },
                  success: function(response) {
                      console.log(response);
                      $(".get-search-syllabus").html(response);
                  }
              });
          }




      }
  });
</script>
@endsection