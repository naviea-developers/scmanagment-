@extends('inc.master')

@section('head')


<title>Manage Employee Loan</title>
<style>
    label{
        font-size: 1.2rem;
    }
</style>

@endsection
 @section('content')

        <div class="content-area">
            <div class="container-fluid">
                <div class="row row-card-one">
                    <div class="col-sm-12 ">
                        <div class="row report-title">
                             <h4>Employee Loan</h4>
                        </div>
                    </div>
                </div>
            </div>




            <div class="container">
                <div class="row row-card-one my-4">
                    <div class="col-md-12 col-lg-12 col-sm-12">

                    	<!-- start loan view -->
                    	<div class="modal fade" id="loanLedger" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg ledger" role="document">
                                <div class="modal-content">
                                  <div class="modal-header" style="background-color:#01303f;max-height: 50px;">
                                    <h4 class="modal-title" id="exampleModalLabel" style="color:white;line-height:18px;">Loan ledger</h4>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                   <div class="modal-body">
                                       <div class="container-fluid">
                                            <div class="row row-card-one">
                                                <div class="col-sm-12">
                                                	<div id="loanLedgerView" style="overflow-x: auto;"></div>
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
                    	<!-- end loan view -->

                        <!-- start insert modal -->
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                          <i class="bx bx-plus"></i>
                        </button>
                        @include('Hr.empLoan.add_modal')
                        <!-- Modal -->
                       @include('Hr.empLoan.edit_modal')
                        <!-- end modal -->

                        <br/><br/>

                        <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
                          <thead>
                            <tr>
                              <th>SN.</th>
                              <th>Department</th>
                              <th>Designation</th>
                              <th>EmpID</th>
                              <th>Loan Amount</th>
                              <th>Actions</th>
                            </tr>
                          </thead>

                          <tbody>

                            @foreach($emploans as $key=>$emploan)
                            <tr class="{{$emploan->id}}">
                                <td>{{$key+1}}</td>
                                <td>{{$emploan->dept_name}}</td>
                                <td>{{$emploan->desi_name}}</td>
                                <td>{{$emploan->employee_name}}</td>

                                <td>{{ auth()->user()->currency_symbol }}{{round($emploan->loan_amount,2)}}</td>
                                <td>
                                    <a class="btn btn-info" href="javascript:void(0)" data-token="{{csrf_token()}}" id="loanLedgerFetech" data-id="{{$emploan->id}}" data-bs-toggle="modal" data-bs-target="#loanLedger">
                                        <i class="bx bx-show"></i>
                                    </a>
                                	{{-- <span  data-token="{{csrf_token()}}" id="loanLedgerFetech" data-id="{{$emploan->id}}" data-toggle="modal" data-target="#loanLedger">
                                      <i class="bx bx-show text-default"></i>
                                  	</span> --}}

                                </td>
                            </tr>
                           @endforeach

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
<!-- bank account manage Edit-->
<script type="text/javascript">
     $(document).ready(function(){
         $('#dataTable').DataTable();
        $(".datepicker").flatpickr({
            defaultDate: new Date("{{ date('Y-m-d') }}"),
        });
        $(document).on('click','#empbankaccountEdit',function(){
         var id=$(this).attr('data-id');
           var termID=$('#termID').val();
           // alert(id);
            $.ajax({
                url: "{{route('empbankaccount.edit') }}?id=" + id,
                method: 'GET',
                success: function(data) {
                    $('#bankID').html(data.html);
                    $('#bankaccountID').val(data.bankaccountID);
                    $('#acName').val(data.acName);
                    $('#branchName').val(data.branchName);
                    $('#acType').val(data.acType);
                    $('#acNumber').val(data.acNumber);
                    $('#routingNumber').val(data.routingNumber);
                    $('#empIDbank').html(data.empIDbank);
                    $('#desigIDbank').html(data.desigIDbank);
                    $('#deptIDbank').html(data.deptIDbank);
                }
            });
        });
    });
</script>
<!-- fetch ledger -->
<script type="text/javascript">
    $(document).ready(function(){
        $(document).on('change', '#deptID', function(){
            var deptID = $(this).val();
            $.ajax({
                url: '{{ url("getDesigName1") }}',
                method: "POST",
                dataType: "JSON",
                data: {
                "_token": "{{ csrf_token() }}",
                "deptID": deptID
                },
                success: function (response) {
                    console.log(response);
                    var option = '';
                    option += '<option value="" disabled selected>-- Select One --</option>';
                    $.each(response, function (index, value) {
                        option += '<option value="' + value.id + '">' + value.name + '</option>';
                    });
                    $('#desigID').empty().append(option);
                }
            });
        });
        $(document).on('change', '#desigID', function(){
            var desigID = $(this).val();
            $.ajax({
                url: '{{ url("getEmployeeId1") }}',
                method: "POST",
                dataType: "JSON",
                data: {
                "_token": "{{ csrf_token() }}",
                "desigID": desigID
                },
                success: function (response) {
                    console.log(response);
                    var option = '';
                    option += '<option value="" disabled selected>-- Select One --</option>';
                    $.each(response, function (index, value) {
                        option += '<option value="' + value.id + '">' + value.employee_id + '</option>';
                    });
                    $('#empID').empty().append(option);
                }
            });
        });
        $(document).on('click','#loanLedgerFetech',function(){
            var id=$(this).attr('data-id');
           // var termID=$('#termID').val();
            // alert(id);
            $.ajax({
                url: "{{route('emploan.loanLegder') }}?id=" + id,
                method: 'GET',
                success: function(data) {
                    $('#loanLedgerView').html(data.html);
                }
            });
        });
    });
</script>



<!-- get emp bankAccout by bank -->
<script type="text/javascript">
     $(document).ready(function(){
        $("#empBankID").change(function(){
         var id=$(this).val();

          // alert(id);
            $.ajax({
                url: "{{route('empbankaccount.callByBankID') }}?id=" + id,
                method: 'GET',
                success: function(data) {
                    $('#empBankACID').html(data.html);
                }
            });
        });
    });
</script>

<!-- get com bankAccout by bank -->
<script type="text/javascript">
     $(document).ready(function(){
        $("#comBankID").change(function(){
         var id=$(this).val();

          // alert(id);
            $.ajax({
                url: "{{route('combankaccount.callByBankID') }}?id=" + id,
                method: 'GET',
                success: function(data) {
                    $('#comBankACID').html(data.html);
                }
            });
        });
    });
</script>

<!-- show bank depend on cash or bank method -->
<script type="text/javascript">
     $(document).ready(function(){
        $("#method").change(function(){
            var id=$(this).val();
            if(id=='Bank'){
                $('.showBankInfo').show();
            }
            else{
                $('.showBankInfo').hide();
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
                    $.each(response.errors,  function(key, val){
                        if($('.add_data_form').find('input[name='+key+']').length > 0)
                        {

                             $('.add_data_form').find('input[name='+key+']').addClass('is-invalid');
                            $('.add_data_form').find('input[name='+key+']').next().html(val);
                        }else{
                             $('.add_data_form').find('select[name='+key+']').addClass('is-invalid');
                            $('.add_data_form').find('select[name='+key+']').next().html(val);
                        }
                    });
                    if(response.error){
                        toastr.error(response.error, 'Error', { "showMethod": "fadeIn", "hideMethod": "fadeOut", timeOut: 5000 });
                    }

                }
                if (1 == response.status) {
                    $('#exampleModal').modal('toggle');

                    toastr.success(response.success, 'Success', { "showMethod": "fadeIn", "hideMethod": "fadeOut", timeOut: 5000 });
                    location.reload();
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
                            $('.edit_data_form').find('select[name='+key+']').next().html(val);
                        }


                    });
                    if(response.error){
                        toastr.error(response.error, 'Error', { "showMethod": "fadeIn", "hideMethod": "fadeOut", timeOut: 5000 });
                    }

                }
                if (1 == response.status) {
                    $('#insertModal').modal('toggle');

                    toastr.success(response.success, 'Success', { "showMethod": "fadeIn", "hideMethod": "fadeOut", timeOut: 5000 });
                    location.reload();
                }

            }
        }).then(function(){
            form.find('button[type=submit]').attr('disabled', false).html('Save');
        });
        return false;
    });
    $('#add_account').select2({
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
</script>

@endsection
