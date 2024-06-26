@extends('Backend.layouts.layouts')

@section('title', 'Admin - All Academic Years')

@section('main_contain')
    <div class="br-mainpanel">
        <div class="br-pagebody">
            @include('Backend.school_management.academic_year.create')

            <div class="br-section-wrapper data-list pt-3">
                <h6 class="br-section-label text-center">All Academic Years</h6>
                <div style="text-align: right;">
                    <a style="margin-bottom: 20px" href="javascript:void(0);" class="btn btn-primary btn-sm btn-new">
                        <i class="fa fa-plus"></i> Add Academic Years
                    </a>
                </div>

                <div class="table-wrapper">
                    <table id="data_table_list" class="table display responsive nowrap">
                        <thead>
                            <tr>
                                <th class="wd-10p">Id</th>
                                <th class="wd-15p">Current Year</th>
                                <th class="wd-15p">Academic Year</th>
                                <th class="wd-15p">Status</th>
                                <th class="wd-10p">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                        </tbody> 
                    </table>
                </div>
            </div>
            
            <div class="data-edit-res"></div>
        </div>
        <footer class="br-footer">
            <div class="footer-left">
                <div class="mg-b-2">Copyright &copy; <?php echo date('Y');?> NavieaSoft. All Rights Reserved.</div>
                <div>Attentively and carefully made by NavieaSoft.</div>
            </div>
        </footer>
    </div>



    <div id="datamodalshow" class="modal fade">
        <div class="modal-dialog modal-dialog-top" role="document">
            <div class="modal-content tx-size-sm">
                <div class="modal-body tx-center pd-y-20 pd-x-20">
                    <form id="data-form-delete" action="{{ route('admin.academic_year.delete') }}" method="post">
                        @csrf
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <i class="icon icon ion-ios-close-outline tx-60 tx-danger lh-1 mg-t-20 d-inline-block"></i>
                        <h4 class="tx-danger  tx-semibold mg-b-20 mt-2">Are you sure! you want to delete this?</h4>
                        <input type="hidden" name="year_id" id="modal_data_id">
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
            "url": "{{ route('admin.academic_year.ajax') }}",
            "dataType": "json",
            "type": "POST",
            data: function(data){
              data._token = "{{ csrf_token() }}";
            },
        },
        "columns": [
                { "data": "id" },
                { 
                    "data": "is_current",
                    "render": function(data, type, row) {
                        return '<input type="radio" name="is_current" value="' + row.id + '" ' + (data == 1 ? 'checked' : '') + '>';
                    }
                },
                { "data": "year" },
                { "data": "status" },
                { "data": "options" }
            ],
            "columnDefs": [{
                "targets": 4,
                "orderable": false
            }]

    });




   $('#data_table_list').on('change', 'input[name="is_current"]', function() {
        var yearId = $(this).val();
        var csrfToken = "{{ csrf_token() }}";

        $.ajax({
            url: "{{ route('admin.academic_year.updateCurrent') }}",
            type: "POST",
            data: {
                year_id: yearId,
                _token: csrfToken
            },
            success: function(response) {
                if (response.success) {
                    alert('Current year updated successfully.');
                    
                    datatable.ajax.reload();
                } else {
                    alert('Failed to update current year.');
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });


  
</script>
@endsection
