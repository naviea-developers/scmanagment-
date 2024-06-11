@section('title')
Admin - All Exam Schedule
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
            @include('Backend.school_management.exam_schedule.create')

            <div class="br-section-wrapper data-list pt-3">

                <h6 class="br-section-label text-center">All Exam Schedule</h6>
                <div style="text-align: right;">
                    <a style="margin-bottom: 20px" href="javascript:void(0);" class="btn btn-primary btn-sm btn-new">
                        <i class="fa fa-plus"></i> Add Exam Schedule
                    </a>
                </div>
                

               

                <div class="table-wrapper">
                    <table id="data_table_list" class="table display responsive nowrap">
                        <thead>
                            <tr>
                                <th class="wd-10p">Id</th>
                                <th scope="wd-10p">Examination Title</th>
                                <th scope="wd-10p">Class Name</th>
                                <th scope="wd-10p">Subject</th>
                                {{-- <th scope="wd-10p">Section</th> --}}
                                <th scope="wd-10p">Bulding</th>
                                <th scope="wd-10p">Floor</th>
                                <th scope="wd-10p">Room</th>
                                <th scope="wd-10p">Status</th>
                                <th scope="wd-10p">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            {{-- <a class="btn text-info" href="{{ route('admin.bulding.edit', $bulding->id) }}"><i class="icon ion-compose tx-28"></i></a>
                                        <button class="btn text-danger bg-white"  value="{{$bulding->id}}" id="dataDeleteModal"><i class="icon ion-trash-a tx-28"></i></button> --}}
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
                    <form id="data-form-delete" action="{{ route('admin.examschedule.delete') }}" method="post">
                        @csrf
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <i class="icon icon ion-ios-close-outline tx-60 tx-danger lh-1 mg-t-20 d-inline-block"></i>
                        <h4 class="tx-danger  tx-semibold mg-b-20 mt-2">Are you sure! you want to delete this?</h4>
                        <input type="hidden" name="exam_schedule_id" id="modal_data_id">
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
            "url": "{{ route('admin.examschedule.ajax') }}",
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
            // { "data": "section_id"},
            { "data": "bulding_id"},
            { "data": "floor_id"},
            { "data": "room_id"},
            { "data": "status"},
            { "data": "options"},
        ],
        "columnDefs": [ {
          "targets": 7,
          "orderable": false
          } ]

    });
</script>


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
