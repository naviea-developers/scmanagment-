@section('title')
Admin - All Class Routine
@endsection

@extends('Backend.layouts.layouts')
@section('style')
<style>
    .select2-container--default .select2-selection--single {
      height: 41px;
      width: 185px;
  }
  </style>
@endsection
@section('main_contain')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">

        <div class="br-pagebody">
            @include('Backend.school_management.class_routine.create')

            <div class="br-section-wrapper data-list pt-3">

                <h6 class="br-section-label text-center">All Class Routine</h6>
                <div class="col-md-12 mt-5 mb-5" style="border: 1px solid; padding: 10px">
                    <div class="row">

                    <div class="col-md-4">
                        <label class="form-control-label"><b>Class:</b></label>
                        <select class="form-control form-select " id="routine_class">
                            <option value="">Select Class</option>
                            @foreach ($classes as $class)
                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="col-md-4">
                        <label class="form-control-label"><b>Section:</b></label>
                        <select  class="form-control form-select  section_id" id="routine_class_section">
                            <option value="">Select Section</option>
                        </select>
                    </div>
                    
                    <div class="col-md-4">
                        <label class="form-control-label"><b>Session:</b></label>
                        <select class="form-control form-select" name="session_id" id="session_id">
                            <option  value="">Select Session</option>
                            @foreach ($sessions as $session)
                            <option value="{{ $session->id }}">{{ $session->start_year }} - {{ $session->end_year }}</option>
                            @endforeach
                        </select>
                    </div>
                
                    </div>
                </div>
                <div class="get-search-student-class-routine">
                    <div style="text-align: right;">
                        <a style="margin-bottom: 20px" href="javascript:void(0);" class="btn btn-primary btn-sm btn-new">
                            <i class="fa fa-plus"></i> Add Class Routine
                        </a>
                    </div>

                    <div class="table-wrapper">
                        <table id="data_table_list" class="table display responsive nowrap">
                            <thead>
                                <tr>
                                    <th class="wd-10p">Id</th>
                                    <th scope="wd-10p">Session</th>
                                    <th scope="wd-10p">Class Name</th>
                                    <th scope="wd-10p">Sections</th>
                                    <th scope="wd-10p">Subject</th>
                                    <th scope="wd-10p">Teacher</th>
                                    <th scope="wd-10p">Day</th>
                                    <th class="wd-15p">Status</th>
                                    <th class="wd-10p">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                {{-- <a class="btn text-info" href="{{ route('admin.bulding.edit', $bulding->id) }}"><i class="icon ion-compose tx-28"></i></a>
                                            <button class="btn text-danger bg-white"  value="{{$bulding->id}}" id="dataDeleteModal"><i class="icon ion-trash-a tx-28"></i></button> --}}
                            </tbody>
                        </table>
                    </div><!-- table-wrapper -->
                </div>

            </div><!-- br-section-wrapper -->
            
            <div class="data-edit-res"></div>
        </div><!-- br-pagebody -->
        <footer class="br-footer">
            <div class="footer-left">
                <div class="mg-b-2">Copyright &copy; <?php echo date('Y');?> NavieaSoft. All Rights Reserved.</div>
                <div>Attentively and carefully made by NavieaSoft.</div>
            </div>
        </footer>
    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->




    <!--_-- ########### Start Delete Category MODAL ############---->

    <div id="datamodalshow" class="modal fade">
        <div class="modal-dialog modal-dialog-top" role="document">
            <div class="modal-content tx-size-sm">
                <div class="modal-body tx-center pd-y-20 pd-x-20">
                    <form id="data-form-delete" action="{{ route('admin.routine.delete') }}" method="post">
                        @csrf
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <i class="icon icon ion-ios-close-outline tx-60 tx-danger lh-1 mg-t-20 d-inline-block"></i>
                        <h4 class="tx-danger  tx-semibold mg-b-20 mt-2">Are you sure! you want to delete this?</h4>
                        <input type="hidden" name="class_routine_id" id="modal_data_id">
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
            "url": "{{ route('admin.routine.ajax') }}",
            "dataType": "json",
            "type": "POST",
            data: function(data){
              data._token = "{{ csrf_token() }}";
            },
        },
        "columns": [
            { "data": "id"},
            { "data": "session_id"},
            { "data": "class_id"},
            { "data": "sections_id"},
            { "data": "subject_id"},
            { "data": "teacher_id"},
            { "data": "day_id"},
            { "data": "status"},
            { "data": "options"},
        ],
        "columnDefs": [ {
          "targets": 8,
          "orderable": false
          } ]

    });
</script>


<script>
    $(document).ready(function() {
       
        $('#routine_class,#routine_class_section, #session_id').change(function() {
            fetchClassRoutine();
        });

        function fetchClassRoutine() {
            var classId = $('#routine_class').val();
            var sectionId = $('#routine_class_section').val();
            var sessionId = $('#session_id').val();

            // if (classId && sectionId && sessionId) {
                $.ajax({
                    url: "{{ route('get.class.routine') }}",
                    type: 'GET',
                    data: { class_id: classId, section_id: sectionId, session_id: sessionId },
                    success: function(response) {
                        console.log(response);
                        $(".get-search-student-class-routine").html(response);
                    }
                });
            // }
        }
    });
</script>

@endsection

















