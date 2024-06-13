
@section('title')
Fee Collection
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

    <div class="br-section-wrapper pt-1">

    @include('Accounts.fee_collection.create')

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
                                <h3 class="card-title m-0">Manage Collection</h3>
                            </div>
                            <div class="text-right" >
                                <a href="javascript:void(0)" class="btn btn-primary btn-new">
                                <i class="fa fa-plus ml-0 mr-1"></i> Add Fee Collection
                                </a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="dataTable" class="table display responsive nowrap">
                                    <thead>
                                    <tr>
                                        <th>SL.</th>
                                        <th>Date</th>
                                        <th>Session</th>
                                        <th>Class</th>
                                        <th>Section</th>
                                        <th>Student</th>
                                        <th>Roll Number</th>
                                        <th>Fee Name</th>
                                        <th>Payment Method</th>
                                        <th>Account Name</th>
                                        <th>Fee Amount</th>
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
            "url": "{{ route('fee_collection.ajax') }}",
            "dataType": "json",
            "type": "POST",
            data: function(data){
                data._token = "{{ csrf_token() }}";
            },
        },
        "columns": [
            { "data": "id"},
             { "data": "date"},
            { "data": "session"},
            { "data": "class_name"},
            { "data": "section_name"},
            { "data": "student_name"},
            { "data": "roll_number"},
            { "data": "particular_name"},
            { "data": "p_name"},
            { "data": "ac_name"},
           
            { "data": "fee_amount"},
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
    $(document).ready(function(){
         $(".fl-datepicker").flatpickr();
        function getSection(id,outid){
            let url = '{{ url("get/school_section/") }}/' + id;
            axios.get(url)
                .then(res => {
                    console.log(res);
                $('#'+outid).empty();
                    let html = '';
                    html += '<option value="">Select Section</option>'
                    res.data.forEach(element => {
                        html += "<option value=" + element.id + ">" + element.name + "</option>"
                    });


                    $('#'+outid).append(html);
                    $('#'+outid).val("").change();
            });
        }
        $('#sc_class').on('change',function(){
            
            getSection($(this).val(),'section');
            getFeeList();
            getStudentList();
            $('#student').val('').trigger('change');
        });
        $(document).on('change','#session',function(){
             changeStudentType();
            getFeeList();
            getStudentList();
            $('#student').val('').trigger('change');
        });
        $(document).on('change','#section',function(){
             changeStudentType();
            getStudentList();
            $('#student').val('').trigger('change');
        });
        function getFeeList(){
            if($('#sc_class').val() > 0 && $('#session').val() > 0){
                var form_data = new FormData();
                form_data.append('session_id',$('#session').val());
                form_data.append('class_id',$('#sc_class').val());
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url : "{{route('get_fees_by_filter')}}",
                    data : form_data,
                    type : 'POST',
                    contentType: false,
                    cache: false,
                    processData:false,
                    success : function(res){
                        fee_amount=0;
                        $('#fee_res_s').html(res);
                    }
                });
            }
        }
        var fee_amount=0;
        $(document).on('click','.fee_checkbox',function(){
            var fee=$(this).attr('data-fee');
            fee_amount = fee_amount+parseFloat(fee);
            $(document).find('.fee_amount').val(fee_amount);
            $(document).find('.fee_t_amount').val(fee_amount);
        })
        function getStudentList(){
            if($('#sc_class').val() > 0 && $('#session').val() > 0 && $('#section').val() > 0 && $('#student').val() <= 0){
                var form_data = new FormData();
                form_data.append('session_id',$('#session').val());
                form_data.append('class_id',$('#sc_class').val());
                form_data.append('section_id',$('#section').val());
                form_data.append('total_fee',fee_amount);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url : "{{route('get_student_by_filter')}}",
                    data : form_data,
                    type : 'POST',
                    contentType: false,
                    cache: false,
                    processData:false,
                    success : function(res){
                        $('#student_res_s').html(res);
                    }
                });
            }
        }
        console.log($('#session'));
        function changeStudentType(){
            if($('#student').val() > 0){
                $('#student_res_s').hide();
            }else{
                 getStudentList();
                $('#student_res_s').show(); 
            }
        }
        $('#student').select2({
            theme: "bootstrap-5",
            placeholder: 'Select student',
            width:'100%',
            dropdownAutoWidth : true,
            containerCssClass: 'select-sm',
            ajax: {
                url: '{{route('select2.student')}}',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        session_id:$('#session').val(),
                        class_id:$('#sc_class').val(),
                        section_id:$('#section').val(),
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
        }).on('select2:select', function (e) {
            console.log(e);
            var data = e.params.data;
            console.log(data);
            if(data.id > 0){
                $('#student_res_s').hide();
            }else{
                getStudentList();
                $('#student_res_s').show(); 
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
