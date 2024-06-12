@section('title')
Balance Account
@endsection
@section('style')
<style>
.select2-container .select2-selection--single {
    background-color: #fff;
    border: 1px solid #aaa;
    border-radius: 4px;
    height: 44px!important;
}
.select2-container .select2-selection--single .select2-selection__rendered {
    color: #444;
    line-height: 44px;
}
.select2-container .select2-selection--single .select2-selection__arrow {
    height: 44px;
    position: absolute;
    top: 1px;
    right: 1px;
    width: 20px;
}
.select2-container .select2-selection--single .select2-selection__arrow b {
    border-color: #888 transparent transparent transparent;
    border-style: solid;
    border-width: 5px 4px 0 4px;
    height: 0;
    left: 50%;
    margin-left: -4px;
    margin-top: -2px;
    position: absolute;
    top: 50%;
    width: 0;
}
</style>
@endsection

@extends('Backend.layouts.layouts')

@section('main_contain')

<div class="br-mainpanel">

    <div class="br-section-wrapper pt-1">

    @include('Accounts.balance_account.create')

    <!-- Main content -->
    <section class="content-head data-list">
        <div class="container-fluid">
            <div class="row">
                <!-- right column -->
                <div class="col-md-12">
                    <!-- general form elements disabled -->
                    <div class="card card-warning">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Manage Account Information</h3>
                            </div>
                            <div class="text-right" >
                                <a href="javascript:void(0)" class="btn btn-primary m-3 btn-new">
                                <i class="fa fa-plus ml-0 mr-1"></i> Add Account Balance
                                </a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                               <table id="dataTable" class="table display responsive nowrap">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Method</th>
                                        <th>Account Name</th>
                                        <th>Bank Name </th>
                                        <th>Branch </th>
                                        <th>Account Number</th>
                                        <th>Routing Number </th>
                                        <th>Balance (BDT)</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    {{-- @php $i=1; @endphp
                                    @foreach($accounts as $item)
                                    <tr>
                                        <td>{{$i}}</td>

                                        <td>{{$item->paymentmethod->name ?? ''}}</td>

                                        <td>{{$item->account_name}}</td>
                                        <td>{{$item->bank_name}}</td>
                                        <td>{{$item->branch_name}}</td>
                                        <td>{{$item->account_number}}</td>
                                        <td>{{$item->routing_number}}</td>
                                        <td>{{ auth()->user()->currency_symbol }}{{ round($item->balance,2)}} </td>

                                        <td>@php
                                            if($item->status == 1){
                                            echo  "<div class='badge bg-success badge-shadow'>Active</div>";
                                            }else{
                                            echo  "<div class='badge bg-danger badge-shadow'>Inactive</div>";
                                            }
                                            @endphp
                                        </td>
                                        <td class="d-flex">

                                            <a href="{{URL::to('balance_account/'.$item->id.'/edit')}}" title="Edit" style="float: left;margin-right: 10px;">
                                                <button type="submit" class="btn btn-primary btn-sm mx-1"><i class="bx bx-edit"></i>
                                                </button>
                                            </a>

                                            <!-- <form action="{{URL::to('admin/balance_account/'.$item->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm" type="submit"><i class="fa fa-trash"></i></button>
                                            </form> -->

                                        </td>
                                    </tr>
                                    @php $i++; @endphp
                                    @endforeach --}}
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
    <div class="data-edit-res">
    </div>

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
            "url": "{{ route('balance_account.ajax') }}",
            "dataType": "json",
            "type": "POST",
            data: function(data){
                data._token = "{{ csrf_token() }}";
            },
        },
        "columns": [
            { "data": "id"},
            { "data": "m_name"},
            { "data": "name"},
            { "data": "bank_name"},
            { "data": "branch_name"},
            { "data": "ac_number"},
            { "data": "r_number"},
            { "data": "balance"},
            { "data": "status"},
            { "data": "options"},
        ],
        "columnDefs": [ {
        "targets":9,
        "orderable": false
        }]

    });
</script>
<script>
    $(document).ready(function(){
        
        $('#add_account_head').select2({
            theme: "bootstrap-5",
            placeholder: 'Select Acount Head',
            width:'100%',
            dropdownAutoWidth : true,
            containerCssClass: 'select-sm',
            ajax: {
                url: '{{route('select2.accounts')}}',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        value: $.trim(params.term),
                    };
                },
                processResults: function (response) {
                    console.log(response);
                    return {
                        results: response
                    };
                },
                cache: true
            }
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
    });
</script>
@endsection
