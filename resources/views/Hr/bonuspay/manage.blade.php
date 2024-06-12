
@section('title')
Manage Bounus
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

    <div class="br-section-wrapper">
        <div class="content-area">
            <div class="container" style="box-shadow: 0 0 2px gray;border-top:4px solid gray;margin-top:5px;">
                <div class="row row-card-one my-1">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <!-- start modal inTime -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insertModal">
                            <i class="fa fa-plus"></i>
                        </button>
                        @include('Hr.bonuspay.add_modal')
                        @include('Hr.bonuspay.edit_modal')
                        {{-- <form method="POST" action="{{route('bonuspay.search')}}" enctype="multipart/form-data" style="float: right;">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="">Occasion</label>
                                        <select class="form-control" name="occation">
                                            <option value="all">All</option>
                                            <option value="Eid ul-Fitr">Eid ul-Fitr</option>
                                            <option value="Eid al-Adha">Eid al-Adha</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="">Years *</label>
                                        <input type="text" class="form-control" name="year" id="monthDate2" autocomplete="off" placeholder="yyyy" required />
                                    </div>
                                    <div class="col-sm-1">
                                        <button class="btn btn-danger mt-4">
                                            Search
                                        </button>
                                    </div>
                                </div>
                        </form> --}}
                        <br/><br/>  <br/><br/>
                        @if(@$Fromdate)
                        <center>
                        <span style="color: red;font-size: 18px">
                            <strong>From: </strong>{{date('F j,Y',strtotime($Fromdate))}}&nbsp;&nbsp;&nbsp;&nbsp;
                            <strong>To: </strong>{{date('F j,Y',strtotime($Todate."-1 day"))}}
                        </span>


                        </center> <br/><br/>
                        @endif
                        <br/>
                         <table id="dataTable" class="table display responsive nowrap">
                            <thead>
                            <tr>
                                <th>SN.</th>
                                <th>Employee</th>
                                <th>Paid Date</th>
                                <th>Occasion</th>
                                {{-- <th>Basic Salary</th> --}}
                                <th>Bonus</th>
                                <th>Paid Method</th>
                                <th>Bank Account</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                           
                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
<link href="{{ asset('public/backend/css') }}/sweetalert2.min.css" rel="stylesheet">
<script src="{{ asset('public/backend/js') }}/sweetalert2.all.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- fetch ledger -->
<script type="text/javascript">
    var s_data = $('#dataTable').DataTable({
        'order':[[0,'desc']],
        "processing": true,
        "serverSide": true,
        "ajax":{
            "url": "{{ route('bonuspay.ajax') }}",
            "dataType": "json",
            "type": "POST",
            data: function(data){
                data._token = "{{ csrf_token() }}";
            },
        },
        "columns": [
            { "data": "id"},
            { "data": "e_name"},
            { "data": "date"},
            { "data": "occation"},
            { "data": "amount"},
            { "data": "p_name"},
            { "data": "ac_name"},
            { "data": "options"},
        ],
        "columnDefs": [ {
        "targets": 7,
        "orderable": false
        } ]

    });
     
   
    $(document).ready(function(){
        $('#user_emp').select2({
            theme: "bootstrap-5",
            placeholder: 'Select Bank Account',
        
            width:'100%',
            dropdownParent: $("#insertModal"),
            dropdownAutoWidth : true,
            containerCssClass: 'select-sm',
            ajax: {
                url: '{{route('select2.emp_by_desig')}}',
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
            placeholder: 'Select Bank Account',
            dropdownParent: $("#insertModal"),
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
       
        $(document).on('click','#salarySlipFetch',function(){
         var id=$(this).attr('data-id');
           // var termID=$('#termID').val();
            alert(id);
            $.ajax({
                url: "{{route('salary.slip.fetch') }}?id=" + id,
                method: 'GET',
                success: function(data) {
                    $('#salarySlipView').html(data.html);
                }
            });
        });
    });
</script>
<!-- pay salary -->
<script type="text/javascript">
    $(document).ready(function(){
        $(".datepicker").flatpickr({
            defaultDate: new Date("{{ date('Y-m-d') }}"),
        });
        $(document).on('click','#bonuspayEdit',function(){

         var id=$(this).attr('data-id');
           // var termID=$('#termID').val();
            // alert(id);
           $('#bonuspayID').val(id);

            $.ajax({
                url: "{{route('bonuspay.edit') }}?id=" + id,
                method: 'GET',
                success: function(res) {
                    console.log(res);
                    let data =res.data;
                    $('#bonuspayID').val(data.id);
                    
                    $('#empID2').html(res.emphtml);
                    $('#desigID2').val(data.desigID);
                    $('#empID2').val(data.empID);
                    $('#bonusAmount').val(data.bonusAmount);
                    $('#payment_method').val(data.paidMethod);
                    $('#paidDate').val(data.paidDate);
                    $('#occation').val(data.occation);
                    $('#edit_account').html(res.accounts);
                    $('#edit_account').val(data.balance_account_id);

                     $(".datepicker").flatpickr();
                      $('#edit_account').select2({
                        theme: "bootstrap-5",
                        placeholder: 'Select Bank Account',
                        dropdownParent: $("#updateModal"),
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

                }
            });

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
                    {{-- window.location = "{{ url('bonuspay-delete') }}/"+id; --}}
                    dataDelete("{{ url('bonuspay-delete') }}/"+id);
                }
            });
        });
    });
</script>



<script type="text/javascript">

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
                    $.each(response.errors,  function(key, val){
                        if($('.add_data_form').find('input[name='+key+']').length > 0)
                        {

                             $('.add_data_form').find('input[name='+key+']').addClass('is-invalid');
                            $('.add_data_form').find('input[name='+key+']').next().html(val);
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
                    $('#insertModal').modal('toggle');

                    toastr.success(response.success, 'Success', { "showMethod": "fadeIn", "hideMethod": "fadeOut", timeOut: 5000 });
                   s_data.draw();
                }

            }
        }).then(function(){
            form.find('button[type=submit]').attr('disabled', false).html('Save');
        });
        return false;
    });
    //add data

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
                            $('.edit_data_form').find('input[name='+key+']').next().html(val);
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
    })
</script>
@endsection
