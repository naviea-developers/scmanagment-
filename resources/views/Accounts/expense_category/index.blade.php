
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
                            <h4 class=" "><b>Expense Category</b> </h4>
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

                       @include('Accounts.expense_category.create')

                        <!-- start update modal -->
                        @include('Accounts.expense_category.edit')

                        <br/><br/>

                        <table id="dataTable" class="table display responsive nowrap">
                          <thead>
                            <tr>
                                <th>SN.</th>
                                <th>Category Name</th>
                                <th>Expense Type</th>
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
            "url": "{{ route('expense_category.ajax') }}",
            "dataType": "json",
            "type": "POST",
            data: function(data){
                data._token = "{{ csrf_token() }}";
            },
        },
        "columns": [
            { "data": "id"},
            { "data": "name"},
            { "data": "type"},
            { "data": "options"},
        ],
        "columnDefs": [ {
        "targets":3,
        "orderable": false
        }]

    });
     $(document).ready(function(){
        $('#dataTable').dataTable();
        $(document).on('click','.data_edit_e',function(){
         var id=$(this).attr('data-id');
         // var termID=$('#termID').val();
          // alert(id);
            $.ajax({
                url: "{{route('expense_category.edit') }}?id=" + id,
                method: 'GET',
                success: function(data) {
                    // $('#fetchDepartment').html(data.html);
                    $('#name').val(data.name);
                    $('#code').val(data.code);
                    $('#expense_type').val(data.type);
                    $('#edit_id').val(data.id);
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
            confirmButtonText: '{{__("yes, Delete It")}}',
            cancelButtonText: '{{__("Cancel")}}',
            confirmButtonClass: 'btn btn-primary',
            cancelButtonClass: 'btn btn-danger ml-1',
		}).then(function (result) {
		    if (result.value) {
                dataDelete("{{ url('expense-category-delete') }}/"+id)
               
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
