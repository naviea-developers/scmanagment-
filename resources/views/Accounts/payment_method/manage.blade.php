
@section('title')
Payment Method
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
                            <h4 class=" "><b>Manage Payment Method</b> </h4>
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

                        @include('Accounts.payment_method.create')

                        <!-- start update modal -->

                        @include('Accounts.payment_method.edit')
                        <br/><br/>

                        <table id="dataTable" class="table display responsive nowrap">
                          <thead>
                            <tr>
                              <th>SN.</th>
                              <th>Method Name</th>
                              <th>Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                            {{-- @foreach($methods as $key=>$method)
                            <tr class="{{$method->id}}">
                                <td>{{$key+1}}</td>
                                <td>{{$method->name}}</td>
                                <td>
                                    <a class="btn btn-primary data_edit" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#updateModal"
                                    data-id="{{$method->id}}"
                                    >
                                        <i class="bx bx-edit"></i>
                                    </a>
                                    <a href="#" data-token="{{csrf_token()}}" data-id="{{$method->id}}" class="del_hr_data btn btn-danger">
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
<script type="text/javascript">
var s_data = $('#dataTable').DataTable({
    'order':[[0,'desc']],
    "processing": true,
    "serverSide": true,
    "ajax":{
        "url": "{{ route('payment_method.ajax') }}",
        "dataType": "json",
        "type": "POST",
        data: function(data){
            data._token = "{{ csrf_token() }}";
        },
    },
    "columns": [
        { "data": "id"},
        { "data": "name"},
        { "data": "options"},
    ],
    "columnDefs": [ {
    "targets":2,
    "orderable": false
    }]

});
$(document).ready(function(){
    $(document).on('click','.data_edit_e',function(){
        var id=$(this).attr('data-id');
        // var termID=$('#termID').val();
        // alert(id);
        $.ajax({
            url: "{{route('payment_method.edit') }}?id=" + id,
            method: 'GET',
            success: function(data) {
                // $('#fetchDepartment').html(data.html);
                $('#edit_id').val(data.id);
                $('#name').val(data.name);

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
            confirmButtonText: '{{__("yes, Delete It")}}',
            cancelButtonText: '{{__("Cancel")}}',
            confirmButtonClass: 'btn btn-primary',
            cancelButtonClass: 'btn btn-danger ml-1',
		}).then(function (result) {
		    if (result.value) {
                dataDelete("{{ url('payment-method-delete') }}/"+id);
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
                    $(form)[0].reset();
                    $('.is-invalid').each(function(){
                        $(this).removeClass('is-invalid');
                    });
                    $('.invalid-feedback').each(function(){
                        $(this).text('');
                    });
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
                    $('.is-invalid').each(function(){
                        $(this).removeClass('is-invalid');
                    });
                    $('.invalid-feedback').each(function(){
                        $(this).text('');
                    });
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
});
</script>


@endsection
