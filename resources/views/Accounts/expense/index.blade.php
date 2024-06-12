
@section('title')
Expense Category
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
        <div class="content-area">
            <div class="container-fluid">
                <div class="row row-card-one">
                    <div class="col-sm-12 ">
                        <div class="row report-title ">
                            <h4 class=" "><b>Manage Expense</b> </h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row row-card-one my-4">
                    <div class="col-md-12 col-lg-12 col-sm-12">

                        <!-- start insert modal -->
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                          <i class="fa fa-plus"></i>
                        </button>

                       @include('Accounts.expense.create')

                        <!-- start update modal -->
                        @include('Accounts.expense.edit')

                        <br/><br/>

                         <table id="dataTable" class="table display responsive nowrap">
                          <thead>
                            <tr>
                                <th>SN.</th>
                                <th>Category</th>
                                <th>Reason</th>
                                <th>Date</th>
                                <th>Amount</th>
                                <th>Payment Method</th>
                                <th>Balance Account</th>
                                <th>Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                            {{-- @foreach($expenses as $key=>$expense)
                            <tr class="{{$expense->id}}">
                                <td>{{$key+1}}</td>
                                <td>{{$expense->category?->name}}</td>
                                <td>{{$expense->reason}}</td>
                                <td>{{date('Y-m-d',strtotime($expense->date))}}</td>
                                <td>{{ auth()->user()->currency_symbol }}{{round($expense->amount,2)}}</td>
                                <td>{{$expense->method?->name}}</td>
                                 <td>{{$expense->balance_account?->account_name}}</td>
                                <td>
                                    <a class="btn btn-primary data_edit" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#updateModal"
                                    data-id="{{$expense->id}}"
                                    >
                                        <i class="bx bx-edit"></i>
                                    </a>
                                    <a href="#" data-token="{{csrf_token()}}" data-id="{{$expense->id}}" class="del_hr_data btn btn-danger">
                                        <i class="bx bx-trash"></i>
                                    </a>

                                </td>
                            </tr>
                           @endforeach --}}

                          </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content Area End -->
    </div>
</div>
@endsection
@section('script')
<!-- month manage Edit-->
<script type="text/javascript">
    var s_data = $('#dataTable').DataTable({
        'order':[[0,'desc']],
        "processing": true,
        "serverSide": true,
        "ajax":{
            "url": "{{ route('expense.ajax') }}",
            "dataType": "json",
            "type": "POST",
            data: function(data){
                data._token = "{{ csrf_token() }}";
            },
        },
        "columns": [
            { "data": "id"},
            { "data": "cat_name"},
            { "data": "reason"},
            { "data": "date"},
            { "data": "amount"},
            { "data": "p_name"},
            { "data": "ac_name"},
            { "data": "options"},
        ],
        "columnDefs": [ {
        "targets":7,
        "orderable": false
        }]

    });
    $(document).ready(function(){
        $(".datepicker").flatpickr();
       
        $('#add_payment_method').on('change',function(){
            var id = $(this).val();
            if(id != ""){
                $('.bank_show').show();
            }else{
                $('.bank_show').hide();
            }
        });
        $('#add_account').select2({
            theme: "bootstrap-5",
            placeholder: 'Select Bank Account',
            width:'100%',
            dropdownAutoWidth : true,
            containerCssClass: 'select-sm',
            ajax: {
                url: '{{route('select2.balance_accounts')}}',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        method_id:$('#add_payment_method').val(),
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
        $('#edit_account').select2({
            theme: "bootstrap-5",
            placeholder: 'Select Bank Account',
            allowClear: true,
            width:'100%',
            dropdownAutoWidth : true,
            containerCssClass: 'select-sm',
            ajax: {
                url: '{{route('select2.balance_accounts')}}',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        method_id:$('#payment_method').val(),
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
        $(document).on('click','.data_edit',function(){
         var id=$(this).attr('data-id');
         // var termID=$('#termID').val();
          // alert(id);
            $.ajax({
                url: "{{route('expense.edit') }}?id=" + id,
                method: 'GET',
                success: function(data) {
                    // console.log(data);
                    // $('#fetchDepartment').html(data.html);
                    $('#reason').val(data.reason);
                    $('#category').val(data.category);
                    $('#date').val(data.date);
                    $('#amount').val(data.amount);
                    $('#payment_method').val(data.method);
                    var account_option = new Option(data.account_name,data.account_id, true, true);
                    $('#edit_account').append(account_option).trigger('change');
                    $('#edit_data').val(id);
                }
            });
        });
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
                //window.location = "{{ url('expense-delete') }}/"+id;
                dataDelete("{{ url('expense-delete') }}/"+id);
            }
        });
    });
    //add data

    $(".add_data_form").on('submit', function(){
        var form = $(this);
        var form_data = form.serialize();
        var action = form.attr('action');

        form.find('button[type=submit]').attr('disabled', true).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Processing...');

        $.ajax({
            method:'POST',
            url:action,
            data:form_data,
            dataType:'json',
            success:function(response){
                console.log(response);
                if (0 == response.status) {
                    $('.is-invalid').each(function(){
                        $(this).removeClass('is-invalid');
                    });
                    $('.invalid-feedback').html('');
                    $.each(response.errors,  function(key, val){
                        if($('.add_data_form').find('input[name='+key+']').length > 0)
                        {

                             $('.add_data_form').find('input[name='+key+']').addClass('is-invalid');
                           $('.add_data_form').find('input[name='+key+']').siblings('.invalid-feedback').html(val);
                        }else{
                             $('.add_data_form').find('select[name='+key+']').addClass('is-invalid');
                            $('.add_data_form').find('select[name='+key+']').siblings('.invalid-feedback').html(val);
                        }
                    });
                    if(response.error){
                        toastr.error(response.error, 'Error', { "showMethod": "fadeIn", "hideMethod": "fadeOut", timeOut: 5000 });
                    }

                }
                if (1 == response.status) {
                    $('#exampleModal').modal('toggle');

                    toastr.success(response.success, 'Success', { "showMethod": "fadeIn", "hideMethod": "fadeOut", timeOut: 5000 });
                   s_data.draw();
                }

            }
        }).then(function(){
            form.find('button[type=submit]').attr('disabled', false).html('Save');
        });
        return false;
    });
    //edit data

    $(".edit_data_form").on('submit', function(){
        var form = $(this);
        var form_data = form.serialize();
        var action = form.attr('action');

        form.find('button[type=submit]').attr('disabled', true).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Processing...');

        $.ajax({
            method:'POST',
            url:action,
            data:form_data,
            dataType:'json',
            success:function(response){
                if (0 == response.status) {
                    $.each(response.errors,  function(key, val){

                        if($('.edit_data_form').find('input[name='+key+']').length > 0)
                        {

                             $('.edit_data_form').find('input[name='+key+']').addClass('is-invalid');
                            $('.edit_data_form').find('input[name='+key+']').siblings('.invalid-feedback').html(val);
                        }else{
                             $('.edit_data_form').find('select[name='+key+']').addClass('is-invalid');
                           $('.edit_data_form').find('select[name='+key+']').siblings('.invalid-feedback').html(val);
                        }


                    });
                    if(response.error){
                        toastr.error(response.error, 'Error', { "showMethod": "fadeIn", "hideMethod": "fadeOut", timeOut: 5000 });
                    }

                }
                if (1 == response.status) {
                    $('#updateModal').modal('toggle');

                    toastr.success(response.success, 'Success', { "showMethod": "fadeIn", "hideMethod": "fadeOut", timeOut: 5000 });
                    s_data.draw();
                }

            }
        }).then(function(){
            form.find('button[type=submit]').attr('disabled', false).html('Save');
        });
        return false;
    });
</script>


@endsection
