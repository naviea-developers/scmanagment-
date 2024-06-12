
@section('title')
Account Head
@endsection
@section('style')
<style>
.swal2-confirm{
    background:rgb(48, 133, 214)!important;
    color: #fff;
    font-size: 1em;
    border: 0;
    border-radius: .25em;
    background: initial;
    margin: .3125em;
    padding: .625em 1.1em;
    transition: box-shadow .1s;
    box-shadow: 0 0 0 3px rgba(0, 0, 0, 0);
    font-weight: 500;
}
.swal2-cancel{
    background:rgb(221, 51, 51)!important;
    color: #fff;
    font-size: 1em;
    border: 0;
    border-radius: .25em;
    background: initial;
    margin: .3125em;
    padding: .625em 1.1em;
    transition: box-shadow .1s;
    box-shadow: 0 0 0 3px rgba(0, 0, 0, 0);
    font-weight: 500;
}
</style>
@endsection

@extends('Backend.layouts.layouts')

@section('main_contain')

<div class="br-mainpanel">

    <div class="br-section-wrapper pt-1">

    @include('Accounts.account_head.create')

    <!-- Main content -->
    <section class="content-header p-0 data-list">
        <div class="container-fluid">
            <div class="row">
                <!-- right column -->
                <div class="col-md-12 p-0">
                    <!-- general form elements disabled -->
                    <div class="card card-warning">
                        <div class="card">
                            <div class="card-header p-1">
                                <h3 class="card-title m-0">Manage Account Head</h3>
                            </div>
                            <div class="text-right" >
                                <a href="javascript:void(0)" class="btn btn-primary btn-new">
                                <i class="fa fa-plus ml-0 mr-1"></i> Add Account Head
                                </a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="dataTable" class="table display responsive nowrap">
                                    <thead>
                                    <tr>
                                        <th>SL.</th>
                                        <th>Accounting Head </th>
                                        <th>Accounting Type </th>
                                        <th>Balance</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                   
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card-header -->

                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
</div>

@endsection
@section('script')

<script>
    var datatable = $('#dataTable').DataTable({
        'order':[[0,'desc']],
        "processing": true,
        "serverSide": true,
        "ajax":{
            "url": "{{ route('account_head.ajax') }}",
            "dataType": "json",
            "type": "POST",
            data: function(data){
                data._token = "{{ csrf_token() }}";
            },
        },
        "columns": [
            { "data": "id"},
            { "data": "name"},
            { "data": "type"},
            { "data": "balance"},
            { "data": "status"},
            { "data": "options"},
        ],
        "columnDefs": [ {
        "targets":3,
        "orderable": false
        } ,{
        "targets": 5,
        "orderable": false
        }]

    });
    $(document).on('click','.del_hr_data',function(){
        let id = $(this).attr('data-id');
        Swal.fire({
            title: '{{__("Are you Sure")}}',
            text: '{{__("Your want to Delete this")}}',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: '{{__("yes,Delete It")}}',
            cancelButtonText: '{{__("Cancel")}}',
            confirmButtonClass: 'btn btn-primary',
            cancelButtonClass: 'btn btn-danger ml-1',
            buttonsStyling: false,
        }).then(function (result) {
            if (result.value) {
               
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type : 'GET',
                    url :"{{ url('account-head-delete') }}/"+id,
                    success : function(res){
                        if(res.status == "yes"){
                            listView();
                            Swal.fire({
                                position: "top-end",
                                icon: "success",
                                title: res.msg,
                                showConfirmButton: false,
                                timer: 1500
                            });
                        
                        }else{
                            Swal.fire({
                                position: "top-end",
                                icon: "error",
                                title: res.msg,
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    },
                    error:function(e){
                        Swal.fire({
                            position: "top-end",
                            icon: "error",
                            title: e.responseJSON.message,
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                });
            }
        });
    });
</script>


@endsection
