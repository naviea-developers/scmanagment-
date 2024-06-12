
@section('title')
Manage Salary
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
    @include('Hr.salary.add_salary')
    <div class="br-section-wrapper data-list">
        <div class="text-center mb-4">
            <h3 class="">Manage Salary</h3>
            <br>
        </div>
            <!-- start salary slip -->
        <div class="modal fade" id="salarySlip" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg ledger" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color:#01303f;max-height: 50px;">
                    <h5 class="modal-title" id="exampleModalLabel" style="color:white;line-height:18px;">Salary Slip</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" >&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row row-card-one">
                                <div class="col-sm-12">
                                    <span id="salarySlipView"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button> -->
                    </div>
                </div>
            </div>
        </div>
        <!-- end salary slip -->
        <!-- Modal Salary Pay -->
        <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color:#01303f;max-height: 50px;">
                    <h5 class="modal-title" id="exampleModalLabel" style="color:white;line-height:18px;">Salary Pay</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" >&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row row-card-one">
                                <div class="col-sm-12">
                                    <form method="POST" action="{{route('salarySheet.update')}}" enctype="multipart/form-data" class="pay_data_form">
                                        @csrf
                                        <div class="row">
                                            <input type="hidden" value="" name="id" id="salarySheet" required>
                                            <input type="hidden" name="due_amount" id="due_amount_edit">


                                            <div class="col-sm-3">
                                                <label for="">Paid Date *</label>
                                                <input type="date"  class="form-control datepicker" name="paidDate" value="0" required/>
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="">Pay Amount *</label>
                                                <input type="number" step="any" class="form-control " name="paidSalary" placeholder="12000" required/>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-md-8 text-right">
                                                        <strong>Payment Method</strong>
                                                    </label>
                                                    <Select class="form-control {{ $errors->has('payment_method') ? 'is-invalid' : '' }}" name="payment_method" id="payment_method">
                                                        <option value="">Select Method</option>
                                                        @foreach ($methods as $method)
                                                            <option @if(old('payment_method') == $method->id) selected @endif value="{{ $method->id }}">{{ $method->name }}</option>
                                                        @endforeach
                                                    </Select>
                                                    @if ($errors->has('payment_method'))
                                                    <span class="invalid-feedback mb-0">
                                                    <strong>{{ $errors->first('payment_method') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-md-8 text-right">
                                                        <strong>Account *</strong>
                                                    </label>
                                                    <Select class="form-control {{ $errors->has('account') ? 'is-invalid' : '' }}" name="account" id="add_account">
                                                        <option value="">Select Account</option>

                                                    </Select>
                                                    @if ($errors->has('account'))
                                                    <span class="invalid-feedback mb-0">
                                                    <strong>{{ $errors->first('account') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-sm-3">
                                                <button class="btn btn-sm btn-primary mt-4 " type="submit">
                                                    <i class="fa fa-save pr-2"></i>Pay
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button> -->
                    </div>
                </div>
            </div>
        </div>
        <!-- end modal  Salary Pay -->

        <a href="javascript:void(0)" class="btn-new btn btn-primary">Add Salary</a>
        <br>
        <br>
        <table id="dataTable" class="table display responsive nowrap">
            <thead>
                <tr>
                    <th>SN.</th>
                    <th scope="col">Month</th>
                    <th scope="col">Employee Name</th>
                    <th>Net Salary</th>
                    <th>Paid</th>
                    <th>Due</th>
                    <th>Payment Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody >
                

            </tbody>
        </table>
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
        "url": "{{ route('manageSalary.ajax') }}",
        "dataType": "json",
        "type": "POST",
        data: function(data){
            data._token = "{{ csrf_token() }}";
        },
    },
    "columns": [
        { "data": "id"},
        { "data": "month"},
        { "data": "e_name"},
        { "data": "net_amount"},
        { "data": "paid_amount"},
        { "data": "due_amount"},
        { "data": "p_status"},
        { "data": "options"},
    ],
    "columnDefs": [ {
    "targets": 7,
    "orderable": false
    } ]

});
$(document).ready(function(){
    $('#add_emp').select2({
        theme: "bootstrap-5",
        placeholder: 'Select Employee',
    
        width:'100%',
        dropdownAutoWidth : true,
        containerCssClass: 'select-sm',
        ajax: {
            url: '{{route('select2.emp')}}',
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    designation_id:$('#desigID').val(),
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
    $('#add_account').select2({
        theme: "bootstrap-5",
        placeholder: 'Select Account',
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
    var variableName = "{{ date('Y-m') }}";
    const myInput = document.querySelector(".datetimepicker");
    flatpickr(document.querySelector(".datetimepicker"), {
        altInput:true,
        defaultDate: new Date(variableName),
        plugins: [
            new monthSelectPlugin({
            shorthand: true, //defaults to false
            dateFormat: "Y-m", //defaults to "F Y"
            altFormat: "Y-m", //defaults to "F Y"
            theme: "dark" // defaults to "light"
            })
        ]
    });
   $(".datepicker").flatpickr({
      defaultDate: new Date("{{ date('Y-m-d') }}"),
   });
});
 $(document).on('click','#salarySheetEdit',function(){
    var id=$(this).attr('data-id');
    // var termID=$('#termID').val();
    // alert(id);
    $('#due_amount_edit').val($(this).attr('data-due'));
    $('#salarySheet').val(id);
});
$(document).on('click','.salarySlipFetch',function(){
    var id=$(this).attr('data-id');
    // var termID=$('#termID').val();
    // alert(id);
    $.ajax({
        url: "{{route('salary.slip.fetch') }}?id=" + id,
        method: 'GET',
        success: function(data) {
            console.log(data);
            $('#salarySlipView').html(data.html);
        }
    });
});

$(".pay_data_form").on('submit', function(){
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
                $.each(response.errors,  function(key, val){
                    if($('.pay_data_form').find('input[name='+key+']').length > 0)
                    {

                            $('.pay_data_form').find('input[name='+key+']').addClass('is-invalid');
                        $('.pay_data_form').find('input[name='+key+']').next().html(val);
                    }else{
                            $('.pay_data_form').find('select[name='+key+']').addClass('is-invalid');
                        $('.pay_data_form').find('select[name='+key+']').next().html(val);
                    }
                });
                if(response.error){
                    toastr.error(response.error, 'Error', { "showMethod": "fadeIn", "hideMethod": "fadeOut", timeOut: 5000 });
                }

            }
            if (1 == response.status) {
                $('#updateModal').modal('toggle');

                toastr.success(response.success, 'Success', { "showMethod": "fadeIn", "hideMethod": "fadeOut", timeOut: 5000 });
                datatable.draw();
            }

        }
    }).then(function(){
        form.find('button[type=submit]').attr('disabled', false).html('Save');
    });
    return false;
});
$(document).on('click','.del_hr_data',function(){
    let id = $(this).attr('data-id');
    console.log( $(this));
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
           dataDelete("{{ url('deleteSalary') }}/"+id,1);
        }
    });
});
</script>
@endsection
