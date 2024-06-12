@section('title')
Manage attendance
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
            <div class="text-center mb-4">
                <h4 class="">Manage All Employee Attendances</h4>
                <br>
            </div>
            <!-- <div class="container" style="box-shadow: 0 0 2px gray;border-top:4px solid gray;margin-top:30px;"> -->
            <div class="row my-4 ">
                <div class="col-md-3 col-lg-3 col-sm-3 float-left">

                    <!-- start modal inTime -->
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#inTimeModal">
                        In
                    </button>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#outTimeModal">
                        Out
                    </button>
                </div>
                <div class="col-md-9 col-lg-9 col-sm-9 float-right">
                    <!-- <h1>jkhyfdkjgtr</h1> -->
                    <!-- <form method="POST" action="" enctype="multipart/form-data" style="float: right;">
                            @csrf -->
                        <div class="row">


                            <div class="col-sm-4">
                                <label for="">Designation *</label>
                                <select class="form-control" id="desigID3" name="desigID" required>
                                    <option value="">-- Select One --</option>
                                    @foreach ($designations as $designation)
                                    <option value="{{ $designation->id }}">{{ $designation->name }}</option>
                                    @endforeach
                                </select>

                            </div>

                            <div class="col-sm-4">
                                <label for="">Employee ID*</label>
                                <select class="form-control" id="empID3" name="empID" required>
                                    <option value="0">-- Select One --</option>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <label for="">From Date *</label>
                                <input type="text" class="form-control fl_datepicker" id="minDate" name="min" data-date-format="Y-m-d" value="{{ date('Y-m-d') }}">                                    
                            </div>
                            <div class="col-sm-4">
                                <label for="">To Date *</label>
                                <!-- <input type="date" class=" form-control form-control-sm" name="tDate" required>                                     -->
                                <input type="text" class="form-control fl_datepicker" id="maxDate" name="max" data-date-format="Y-m-d" value="{{ date('Y-m-d') }}">
                            </div>
                            <div class="col-sm-4">
                                <button class="btn btn-danger mt-4" id="getData">
                                    Search
                                </button>
                            </div>
                        </div>
                    <!-- </form> -->
                </div>
            </div>
            <table id="dataTable" class="table display responsive nowrap">
                <thead>
                    <tr>
                        <th>SN.</th>
                        <th>Employee</th>
                        <th>Duty Date</th>
                        <th>Shift</th>
                        <th>Time-in</th>
                        <th>Time-out</th>
                        <th>Working Time</th>
                        <th>Late</th>
                        <th>Overtime</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody class="refarel_table">

                   
                </tbody>
            </table>

        </div>

        <!-- Modal -->
        @include('Hr.attendance.attentedence_in')
        <!-- end modal inTime -->
        <!-- start modal outTime -->
        @include('Hr.attendance.attentedence_out')
        <!-- end modal outTime -->
        <br/><br/>  <br/><br/>
        <!-- Main Content Area End -->
    </div>


@endsection
@section('script')
<script>
    $(".fl_datepicker").flatpickr();
    $(".datetimepicker").flatpickr({
        static: true,
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        // defaultDate:"{{ date('Y-m-d H:i') }}"
    });
    $(document).ready(function() {
        var s_data = $('#dataTable').DataTable({
            'order':[[0,'desc']],
            "processing": true,
            "serverSide": true,
            "ajax":{
                "url": "{{ route('manageAttendance.ajax') }}",
                "dataType": "json",
                "type": "POST",
                data: function(data){
                    data.designation_id = $('#desigID3').val();
                    data.emp_id = $('#empID3').val();
                    data.from_date = $('#minDate').val();
                    data.to_date = $('#maxDate').val();
                    data._token = "{{ csrf_token() }}";
                },
            },
            "columns": [
                { "data": "id"},
                { "data": "e_name"},
                { "data": "date"},
                { "data": "s_name"},
                { "data": "in_time"},
                { "data": "out_time"},
                { "data": "w_time"},
                { "data": "l_time"},
                { "data": "o_time"},
                { "data": "status"},
                { "data": "options"},
            ],
            "columnDefs": [ {
            "targets": 10,
            "orderable": false
            } ]

        });
        $('#getData').on('click' , function(){
            s_data.draw();
        });
    });
  function calLoan()
  {
    if($("#lamout").val() == "")
    {
      return false;
    }
    else if($("#outTime").val() == "")
    {
      return false;
    }
    else if($("#irate").val() == "")
    {
      return false;
    }
    else{
          var totalamount = 0;
          totalamount = (Number($("#lamout").val()) * Number($("#irate").val())/100) * Number($("#duration").val()) + Number($("#lamout").val())
          $("#tamout").val(totalamount.toFixed(2));
        }
  }

//   $("#inTime").change(function()
//     {
//       if($("#outTime").val()=="")
//       {
//         return false;
//       }
//       var a = Number($("#outTime").val());
//       var CurrentDate = new Date($("#inTime").val());
//       CurrentDate.setMonth(CurrentDate.getMonth() + a);

//       $("#workingTime").val(CurrentDate.toISOString().split('T')[0]);
//     }
//   );

</script>


<script>
   
</script>


<script>

$(document).ready(function(){
    $('#empID').select2({
        theme: "bootstrap-5",
        placeholder: 'Select Bank Account',
        width:'100%',
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
    $('#empID2').select2({
        theme: "bootstrap-5",
        placeholder: 'Select Bank Account',
        width:'100%',
        dropdownAutoWidth : true,
        containerCssClass: 'select-sm',
        ajax: {
            url: '{{route('select2.emp_by_desig')}}',
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    designation_id:$('#desigID2').val(),
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
    $('#empID3').select2({
        theme: "bootstrap-5",
        placeholder: 'Select Bank Account',
        width:'100%',
        dropdownAutoWidth : true,
        containerCssClass: 'select-sm',
        ajax: {
            url: '{{route('select2.emp_by_desig')}}',
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    designation_id:$('#desigID3').val(),
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
        console.log( $(this));
        Swal.fire({
            title: '{{__("lang.are_you_sure")}}',
            text: '{{__("lang.you_wont_be_able_to_revert_this")}}',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '{{__("lang.yes_delete_it")}}',
            cancelButtonText: '{{__("lang.cancel")}}',
            confirmButtonClass: 'btn btn-primary',
            cancelButtonClass: 'btn btn-danger ms-2',
            buttonsStyling: false,
		}).then(function (result) {
		    if (result.value) {
                window.location = "{{ url('deleteAttendance') }}/"+id;
            }
        });
    });
    // $("#myInput").on("keyup", function() {
    //     var value = $(this).val().toLowerCase();
    //     $("#dataTable tr").filter(function() {
    //         $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    //     });
    // });
    $(".in_data_form").on('submit', function(){
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
                        if($('.in_data_form').find('input[name='+key+']').length > 0)
                        {

                             $('.in_data_form').find('input[name='+key+']').addClass('is-invalid');
                             if("inTime" == key){
                                 $('.out_data_form').find('input[name='+key+']').parent().siblings('.invalid-feedback').html(val);
                             }else{
                                 $('.out_data_form').find('input[name='+key+']').siblings('.invalid-feedback').html(val);
                             }
                        }else{
                             $('.in_data_form').find('select[name='+key+']').addClass('is-invalid');
                            if("inTime" == key){
                                 $('.out_data_form').find('input[name='+key+']').parent().siblings('.invalid-feedback').html(val);
                             }else{
                                 $('.out_data_form').find('input[name='+key+']').siblings('.invalid-feedback').html(val);
                             }
                        }
                    });
                    if(response.error){
                        toastr.error(response.error, 'Error', { "showMethod": "fadeIn", "hideMethod": "fadeOut", timeOut: 5000 });
                    }

                }
                if (1 == response.status) {
                    $('#inTimeModal').modal('toggle');

                    toastr.success(response.success, 'Success', { "showMethod": "fadeIn", "hideMethod": "fadeOut", timeOut: 5000 });
                    location.reload();
                }

            }
        }).then(function(){
            form.find('button[type=submit]').attr('disabled', false).html('Save');
        });
        return false;
    });
     $(".out_data_form").on('submit', function(){
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
                        if($('.out_data_form').find('input[name='+key+']').length > 0)
                        {

                             $('.out_data_form').find('input[name='+key+']').addClass('is-invalid');
                             //console.log( $('.out_data_form').find('input[name='+key+']').parent().siblings('.'));
                             if("outTime" == key){
                                 $('.out_data_form').find('input[name='+key+']').parent().siblings('.invalid-feedback').html(val);
                             }else{
                                 $('.out_data_form').find('input[name='+key+']').siblings('.invalid-feedback').html(val);
                             }

                        }else{
                             $('.out_data_form').find('select[name='+key+']').addClass('is-invalid');
                             if("outTime" == key){
                                 $('.out_data_form').find('input[name='+key+']').parent().siblings('.invalid-feedback').html(val);
                             }else{
                                 $('.out_data_form').find('input[name='+key+']').siblings('.invalid-feedback').html(val);
                             }
                        }
                    });
                    if(response.error){
                        toastr.error(response.error, 'Error', { "showMethod": "fadeIn", "hideMethod": "fadeOut", timeOut: 5000 });
                    }

                }
                if (1 == response.status) {
                    $('#outTimeModal').modal('toggle');

                    toastr.success(response.success, 'Success', { "showMethod": "fadeIn", "hideMethod": "fadeOut", timeOut: 5000 });
                    location.reload();
                }

            }
        }).then(function(){
            form.find('button[type=submit]').attr('disabled', false).html('Save');
        });
        return false;
    });
});
</script>


@endsection
