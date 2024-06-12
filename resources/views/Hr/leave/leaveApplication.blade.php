@section('title')
Manage Leave
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

    <div class="br-section-wrapper">
        <div class="content-area">
            <div class="container-fluid">
                <div class="row row-card-one">
                    <div class="col-sm-12 ">
                        <div class="row report-title">
                           <h4 class="my-1"> <b>Leave Application Manage</b></h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row row-card-one my-4">
                    <div class="col-md-12 col-lg-12 col-sm-12">

                        <!-- start modal -->
                        <!-- Button trigger modal -->
                        <div>
                            <button type="button" class="btn btn-primary p-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                          <i style="margin:0;" class="fa fa-plus"></i>
                        </button>
                        </div>


                        <!-- Modal -->
                        @include('Hr.leave.add_leave')
                        <!-- end modal -->
                        <!-- view Modal -->
                        <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                  <div class="modal-header" style="background-color:#01303f;max-height: 50px;">
                                    <h5 class="modal-title" id="viewModalLabel" style="color:white;line-height:18px;">Approved Leave Application</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true" >&times;</span>
                                    </button>
                                  </div>
                                   <div class="modal-body">
                                       <div class="container-fluid">
                                            <div class="row row-card-one">
                                            	<span id="viewApplicationData">oi</span>
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
                        <!-- end view modal -->
                         <!-- update status Modal -->
                        <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                  <div class="modal-header" style="background-color:#01303f;max-height: 50px;">
                                    <h5 class="modal-title" id="updateModalLabel" style="color:white;line-height:18px;">Pending Leave Application</h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                   <div class="modal-body">
                                       <div class="container-fluid">
                                            <div class="row row-card-one">
                                            	<span id="statusViewApplicationData">oi</span>
                                                <div class="col-sm-12">
                                                    <form method="POST" action="{{route('leave.application.update')}}" enctype="multipart/form-data" class="edit_data_form">
                                                        @csrf
                                                        <div class="row">

                                                            <div class="col-sm-6">
                                                               <input type="hidden" value="" id="leaveApplicationID" name="leaveApplicationID">
                                                                <input type="radio" name="status" value="1" checked>Approved &nbsp;&nbsp;
                                                                <input type="radio" name="status" value="-1">Reject
                                                                <br/>
                                                                 <button class="btn btn-primary mt-4 ">
                                                                    <i class="fa fa-save pr-2"></i>Save
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
                        <br/><br/>
                        <!-- endu update status modal -->


                        <form method="POST" action="{{route('leaveApplication.search')}}" enctype="multipart/form-data" style="float: right;">
                            @csrf
                            <div class="row mt-2">

                                <div class="col-sm-3">
                                    <label for="">Department *</label>
                                    <select class="form-control" id="desigID2" name="desigID" required>
                                        <option>-- Select One --</option>
                                        @foreach($designations as $designation)
                                        <option value="{{$designation->id}}">{{$designation->name}}</option>
                                        @endforeach

                                    </select>
                                </div>

                                <div class="col-sm-3">
                                    <label for="">Employee ID *</label>
                                    <select class="form-control" id="empID2" name="empID" required>
                                        <option>-- wait --</option>
                                    </select>
                                </div>

                                <div class="col-sm-3">
                                    <label for="">Leave Type </label>
                                    <select class="form-control" id="leaveType" name="leaveType" >
                                        <option value="0">-- Select One --</option>
                                        @foreach($leaveTypes as $leaveType)
                                        <option value="{{$leaveType->description}}">{{$leaveType->description}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <label for="birthdaytime">From Date *</label>
                                    <input type="date" class=" form-control"  name="fDate" required>

                                </div>
                                <div class="col-sm-3">
                                    <label for="">To Date *</label>
                                    <input type="date" class=" form-control" name="tDate" required>
                                </div>
                                <div class="col-sm-3">
                                    <button class="btn btn-danger mt-4">
                                        Search
                                    </button>
                                </div>
                            </div>
                        </form>
                        <br/><br/>  <br/><br/>
                        @if(@$Fromdate)
                            <center style="color: red;font-size: 18px">
                            <strong>From: </strong>{{date('F j,Y',strtotime($Fromdate))}}&nbsp;&nbsp;&nbsp;&nbsp;
                            <strong>To: </strong>{{date('F j,Y',strtotime($Todate."-1 day"))}}
                            </center> <br/><br/>
                        @endif
                        <table id="dataTable" class="table display responsive nowrap">
                            <thead>
                                <tr>
                                    <th>SN.</th>
                                    <th>Employee</th>
                                    <th>Leave Type</th>
                                    <th>Leave Part</th>
                                    <th>From Date</th>
                                    <th>To Date</th>
                                    <th>Day</th>
                                    <th>Status</th>
                                    <th>Detail</th>
                                </tr>
                            </thead>
                            <tbody>

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
<!-- leave part fetch  by leave type-->
<script type="text/javascript">
    var s_data = $('#dataTable').DataTable({
        'order':[[0,'desc']],
        "processing": true,
        "serverSide": true,
        "ajax":{
            "url": "{{ route('leaveApplication.ajax') }}",
            "dataType": "json",
            "type": "POST",
            data: function(data){
                data._token = "{{ csrf_token() }}";
            },
        },
        "columns": [
            { "data": "id"},
            { "data": "e_name"},
            { "data": "type_name"},
            { "data": "part_name"},
            { "data": "from_date"},
            { "data": "to_date"},
            { "data": "day"},
            { "data": "status"},
            { "data": "options"},
        ],
        "columnDefs": [ {
        "targets": 8,
        "orderable": false
        } ]

    });
    $(document).ready(function(){
        $(".datepicker").flatpickr();
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
        $(document).on('change', '#deptID2', function(){
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
                    $('#desigID2').empty().append(option);
                }
            });
        });
        $(document).on('change', '#desigID2', function(){
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
                    $('#empID2').empty().append(option);
                }
            });
        });
        $(document).on('change', '#deptID3', function(){
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
                    $('#desigID3').empty().append(option);
                }
            });
        });
        $(document).on('change', '#desigID3', function(){
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
                    $('#empID3').empty().append(option);
                }
            });
        });

        $("#leaveTypeID").change(function(){
         var id=$(this).val();

          // alert(id);
            $.ajax({
                url: "{{route('leavePartID.callByLeaveTYpe') }}?id=" + id,
                method: 'GET',
                success: function(data) {
                    $('#leavePartID').html(data.html);
                }
            });
        });
        $(document).on('click','.leaveApplicationView',function(){
            var id=$(this).attr('data-id');
            // var termID=$('#termID').val();
            // alert(id);
            $.ajax({
                url: "{{route('leave.application.single.view') }}?id=" + id,
                method: 'GET',
                success: function(data) {
                    $('#statusViewApplicationData').html(data.viewApplicationData);
                    $('#leaveApplicationID').val(data.leaveApplicationID);
                }
            });
        });
         $(document).on('click','.leaveApplicationEdit',function(){
            var id=$(this).attr('data-id');
            // var termID=$('#termID').val();
            // alert(id);
            $.ajax({
                url: "{{route('leave.application.single.view') }}?id=" + id,
                method: 'GET',
                success: function(data) {
                    $('#statusViewApplicationData').html(data.viewApplicationData);
                    $('#leaveApplicationID').val(data.leaveApplicationID);
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
    });
</script>

@endsection
