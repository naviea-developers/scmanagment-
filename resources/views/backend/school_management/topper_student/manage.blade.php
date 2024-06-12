@section('title')
Admin - All Topper Student
@endsection

@extends('Backend.layouts.layouts')

@section('main_contain')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">

        <div class="br-pagebody">
            @include('Backend.school_management.topper_student.create')

            <div class="br-section-wrapper data-list pt-3">

                <h6 class="br-section-label text-center">All Topper Student</h6>
                <div style="text-align: right;">
                    <a style="margin-bottom: 20px" href="javascript:void(0);" class="btn btn-primary btn-sm btn-new">
                        <i class="fa fa-plus"></i> Add Topper Student
                    </a>
                </div>
                

                <div class="table-wrapper">
                    <table id="data_table_list" class="table display responsive nowrap">
                        <thead>
                            <tr>
                                <th class="wd-10p">Id</th>
                                <th class="wd-15p">Academic Year</th>
                                <th class="wd-15p">Examination</th>
                                <th class="wd-15p">Image</th>
                                <th class="wd-15p">Student Name</th>
                                <th class="wd-15p">Class</th>
                                <th class="wd-15p">Section</th>
                                <th class="wd-15p">Group</th>
                                <th class="wd-15p">Status</th>
                                <th class="wd-10p">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div><!-- table-wrapper -->


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
                    <form id="data-form-delete" action="{{ route('admin.topper_student.delete') }}" method="post">
                        @csrf
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <i class="icon icon ion-ios-close-outline tx-60 tx-danger lh-1 mg-t-20 d-inline-block"></i>
                        <h4 class="tx-danger  tx-semibold mg-b-20 mt-2">Are you sure! you want to delete this?</h4>
                        <input type="hidden" name="topper_id" id="modal_data_id">
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
            "url": "{{ route('admin.topper_student.ajax') }}",
            "dataType": "json",
            "type": "POST",
            data: function(data){
              data._token = "{{ csrf_token() }}";
            },
        },
        "columns": [
            { "data": "id"},
            { "data": "academic_year"},
            { "data": "examination"},
            { "data": "image"},
            { "data": "student_name"},
            { "data": "class"},
            { "data": "section"},
            { "data": "group"},
            { "data": "status"},
            { "data": "options"},
        ],
        "columnDefs": [ {
          "targets": 7,
          "orderable": false
          } ]

    });
</script>







{{-- Common script for add and edit --}}
<script>
    $(document).ready(function() {
        function filterGroupsByClass(classId, groupSelectId) {
            $(`#${groupSelectId} option`).each(function() {
                var groupClassId = $(this).data('class-id');
                if (groupClassId == classId || $(this).val() == "") {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
            $(`#${groupSelectId}`).val('');
        }

        function filterSectionsByClass(classId, sectionSelectId) {
            $(`#${sectionSelectId} option`).each(function() {
                var sectionClassId = $(this).data('class-id');
                if (sectionClassId == classId || $(this).val() == "") {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
            $(`#${sectionSelectId}`).val('');
        }

        function filterStudents(classSelectId, groupSelectId, sectionSelectId, studentSelectId) {
            var classId = $(`#${classSelectId}`).val();
            var groupId = $(`#${groupSelectId}`).val();
            var sectionId = $(`#${sectionSelectId}`).val();
            $(`#${studentSelectId} option`).each(function() {
                var studentClassId = $(this).data('class-id');
                var studentGroupId = $(this).data('group-id');
                var studentSectionId = $(this).data('section-id');
                if ((classId == "" || studentClassId == classId) && (groupId == "" || studentGroupId == groupId) && (sectionId == "" || studentSectionId == sectionId)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
            $(`#${studentSelectId}`).val('');
        }

        function updateSelectionsByStudentIdNumber(studentIdNumber, studentSelectId, classSelectId, groupSelectId, sectionSelectId) {
            $(`#${studentSelectId} option`).each(function() {
                if ($(this).data('student-id-number') == studentIdNumber) {
                    var classId = $(this).data('class-id');
                    var groupId = $(this).data('group-id');
                    var sectionId = $(this).data('section-id');
                    $(`#${classSelectId}`).val(classId).trigger('change');
                    $(`#${groupSelectId}`).val(groupId).trigger('change');
                    $(`#${sectionSelectId}`).val(sectionId).trigger('change');
                    $(`#${studentSelectId}`).val($(this).val());
                    return false; 
                }
            });
        }

        function setupEventHandlers(classSelectId, groupSelectId, sectionSelectId, studentSelectId) {
            $(`#${classSelectId}`).on('change', function() {
                var classId = $(this).val();
                filterSectionsByClass(classId, sectionSelectId);
                filterGroupsByClass(classId, groupSelectId);
                filterStudents(classSelectId, groupSelectId, sectionSelectId, studentSelectId);
            });

            $(`#${groupSelectId}`).on('change', function() {
                filterStudents(classSelectId, groupSelectId, sectionSelectId, studentSelectId);
            });

            $(`#${sectionSelectId}`).on('change', function() {
                filterStudents(classSelectId, groupSelectId, sectionSelectId, studentSelectId);
            });

            $('#student-id-input').on('input', function() {
                var studentIdNumber = $(this).val();
                updateSelectionsByStudentIdNumber(studentIdNumber, studentSelectId, classSelectId, groupSelectId, sectionSelectId);
            });
        }

        // for add form
        setupEventHandlers('class-select', 'group-select', 'section-select', 'student-select');

        // for edit form
        setupEventHandlers('class-select-edit', 'group-select-edit', 'section-select-edit', 'student-select-edit');
    });
</script>


@endsection
