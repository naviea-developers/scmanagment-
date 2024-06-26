@section('title')
Admin - All Alumni
@endsection

@extends('Backend.layouts.layouts')

@section('main_contain')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">

        <div class="br-pagebody">
            @include('Backend.school_management.alumni.create')

            <div class="br-section-wrapper data-list pt-3">

                <h6 class="br-section-label text-center">All Alumni</h6>
                <div style="text-align: right;">
                    <a style="margin-bottom: 20px" href="javascript:void(0);" class="btn btn-primary btn-sm btn-new">
                        <i class="fa fa-plus"></i> Add Alumni
                    </a>
                </div>
                
                <div class="table-wrapper">
                    <table id="data_table_list" class="table display responsive nowrap">
                        <thead>
                            <tr>
                                <th class="wd-10p">Id</th>
                                <th class="wd-15p">Image</th>
                                <th class="wd-15p">Name</th>
                                <th class="wd-15p">Session</th>
                                <th class="wd-15p">Class</th>
                                <th class="wd-15p">Roll Number</th>
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
                    <form id="data-form-delete" action="{{ route('admin.alumni.delete') }}" method="post">
                        @csrf
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <i class="icon icon ion-ios-close-outline tx-60 tx-danger lh-1 mg-t-20 d-inline-block"></i>
                        <h4 class="tx-danger  tx-semibold mg-b-20 mt-2">Are you sure! you want to delete this?</h4>
                        <input type="hidden" name="alumni_id" id="modal_data_id">
                        <button type="submit" class="btn-delete btn btn-danger mr-2 text-white tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium mg-b-20"> yes</button>
                        <button type="button" class="btn btn-success tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium mg-b-20" data-bs-dismiss="modal" aria-label="Close"> No</button>
                    </form>
                </div><!-- modal-body -->
            </div><!-- modal-content -->
        </div><!-- modal-dialog -->
    </div><!-- modal -->


    <div id="changePassword" class="modal fade">
        <div class="modal-dialog modal-dialog-top" role="document">
        <div class="modal-content tx-size-sm">
            <div class="modal-bodypd-y-20 pd-x-20 p-4">
                <form id="data-form-change-pass" action="{{ route('admin.alumni_change_password') }}" method="post">
                    @csrf
                    <h3>Change Password</h3>
                    <input type="hidden" name="user_id" id="user_id_pass">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="">Password</label>
                            <input type="text" name="password" class="form-control">
                        </div>
                    </div>
                    <div class="mt-3">
                         <button type="submit" class="btn-change-pass btn btn-success mr-2 text-white tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium mg-b-20">
                        Submit
                        </button>
                        <button type="button" class="btn btn-danger tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium mg-b-20" data-bs-dismiss="modal" aria-label="Close">
                            Close
                        </button>
                    </div>
  
                </form>
            </div><!-- modal-body -->
        </div><!-- modal-content -->
        </div><!-- modal-dialog -->
    </div>
  
   
@endsection

@section('script')
<script>
   
    var datatable = $('#data_table_list').DataTable({
       // 'pageLength': 2,
       "order": [[ 0, "desc" ]],
        "processing": true,
        "serverSide": true,
        "ajax":{
            "url": "{{ route('admin.alumni.ajax') }}",
            "dataType": "json",
            "type": "POST",
            data: function(data){
              data._token = "{{ csrf_token() }}";
            },
        },
        "columns": [
            { "data": "id"},
            { "data": "image"},
            { "data": "name"},
            { "data": "session"},
            { "data": "class"},
            { "data": "roll_number"},
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

    $('body').on("change",'.class_fee',function(){
        let id = $(this).val();
        getFees(id, "fee");
    });

    $('body').on("change",'.class_fee_edit',function(){
        let id = $(this).val();
        getFees(id, "fee_edit");
    });
    
    
    function getFees(id, outid){
        let url = '{{ url("get/fee_management/") }}/' + id;
        axios.get(url)
            .then(res => {
                console.log(res);
                $('#' + outid).empty();
                let html = '<option value="">Select Fee</option>';
                res.data.forEach(element => {
                    if (element.fee.is_constant == 1) {
                        html += "<option value=" + element.id + ">" + element.fee.particular_name + " (" + element.fee_amount + ")</option>";
                    }
                });
                $('#' + outid).append(html);
                $('#' + outid).val("").change();
            })
            .catch(error => {
                console.error("There was an error fetching the fees!", error);
            });
    }
    
    </script>
@endsection
