@section('title')
Admin - Manage Month
@endsection

@extends('Backend.layouts.layouts')

@section('main_contain')
 <div class="br-mainpanel">

    <div class="br-pagebody">
        <div class="br-section-wrapper pt-0">
        <div class="content-area">
            <div class="container-fluid">
                <div class="row row-card-one">
                    <div class="col-sm-12 ">
                        <div class="row report-title  ">
                            <h4 class=" "> <b>Month Manage</b></h4>
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

                       @include('Hr.monthManage.add_modal')
                       @include('Hr.monthManage.edit_modal')
                        <!-- end modal -->
                        <br/><br/>

                        <table id="dataTable" class="table display responsive nowrap">
                          <thead>
                            <tr>
                              <th>SN.</th>
                              <th>Month</th>
                              <th>Total Day</th>
                              <th>Total Working Day</th>
                              <th>Total Holiday</th>
                              <th>Actions</th>
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
</div>

       
@endsection
@section('script')
<link href="{{ asset('public/backend/css') }}/sweetalert2.min.css" rel="stylesheet">
<script src="{{ asset('public/backend/js') }}/sweetalert2.all.min.js"></script>
<link href="{{ asset('public/backend/css') }}/bootstrap-datepicker.min.css" rel="stylesheet">
<script src="{{ asset('public/backend/js') }}/bootstrap-datepicker.min.js"></script>
<!-- month manage Edit-->
<script type="text/javascript">
    $(document).ready(function(){
       
        var s_data = $('#dataTable').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax":{
                "url": "{{ route('monthManage.ajax') }}",
                "dataType": "json",
                "type": "POST",
                data: function(data){
                    data._token = "{{ csrf_token() }}";
                },
            },
            "columns": [
                { "data": "id"},
                { "data": "month"},
                { "data": "total_day"},
                { "data": "today_working_day"},
                { "data": "today_holiday"},
                { "data": "options"},
            ],
            "columnDefs": [ {
            "targets": 5,
            "orderable": false
            } ]

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
        var variableName1="{{ date('Y-m') }}";
        function edit_datpicker(variableName1){
            var flstt= flatpickr(document.querySelector(".datetimepicker1"), {
             altInput:true,
             defaultDate: new Date(variableName1),
            plugins: [
                new monthSelectPlugin({
                shorthand: true, //defaults to false
                dateFormat: "Y-m", //defaults to "F Y"
                altFormat: "Y-m", //defaults to "F Y"
                theme: "dark" // defaults to "light"
                })
            ]
        });
        }

        //  $(".datetimepicker").flatpickr({
        //     altInput:true,
        //     defaultDate: new Date(variableName),
        //     plugins: [
        //         new monthSelectPlugin({
        //         shorthand: true, //defaults to false
        //         dateFormat: "Y-m", //defaults to "F Y"
        //         altFormat: "Y-m", //defaults to "F Y"
        //         theme: "dark" // defaults to "light"
        //         })
        //     ]
        // });
        $(document).on('click','#monthManageEdit',function(){
         var id=$(this).attr('data-id');
         // var termID=$('#termID').val();
          // alert(id);
            $.ajax({
                url: "{{route('monthManage.edit') }}?id=" + id,
                method: 'GET',
                success: function(data) {
                    // $('#fetchDepartment').html(data.html);
                    $('#monthManageID').val(data.monthManageID);
                    $('#monthDate').val(data.monthDate);
                    edit_datpicker(data.monthDate);
                //    variableName1 = data.monthDate;
                //     flstt.setDate(data.monthDate+'-01');
                //     flstt.redraw();
                //     console.log(flstt);
                    $('#monthTotalDay').val(data.monthTotalDay);
                    $('#workingDay').val(data.workingDay);
                    $('#holiday').val(data.holiday);
                }
            });
        });
    });
</script>

<script>


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
                window.location = "{{ url('monthManage-delete') }}/"+id;
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
                    $('#updateModal').modal('toggle');

                    toastr.success(response.success, 'Success', { "showMethod": "fadeIn", "hideMethod": "fadeOut", timeOut: 5000 });
                    location.reload();
                }

            }
        }).then(function(){
            form.find('button[type=submit]').attr('disabled', false).html('Save');
        });
        return false;
    })
</script>
@endsection
