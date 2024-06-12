@section('title')
Manage Shift
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
                           <h4 class="my-1"><b>All Shift</b></h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row row-card-one my-4">
                    <div class="col-md-12 col-lg-12 col-sm-12">

                    	<!-- start modal for insert -->
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalStore">
                          <i class="fa fa-plus"></i>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalStore" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                  <div class="modal-header" style="background-color:#01303f;max-height: 50px;">
                                    <h5 class="modal-title" id="exampleModalLabel" style="color:white;line-height:18px;">Shift Management</h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                    <div class="modal-body">
                                        <div class="container-fluid">
                                            <div class="row row-card-one">
                                                <div class="col-sm-12">
                                                   <!-- form here -->
                                                    <form method="POST" action="{{route('shiftManage.store')}}" enctype="multipart/form-data" class="add_data_form">
                                                        @csrf
                                                        <div class="row">
                                                            <input type="hidden" value="0" name="id" required>
                                                            <div class="col-sm-3">
                                                                <label for="">Shift Name*</label>
                                                                <input type="text" class=" form-control"  name="shiftName" autocomplete="off" required>
                                                            </div>

                                                            <div class="col-sm-3">
                                                                <label for="">Start Time*</label>
                                                                <input
                                                                onclick="this.showPicker()" type="time" class=" form-control"  name="startTime" autocomplete="off" required>
                                                            </div>

                                                            <div class="col-sm-3">
                                                                <label for="">End Time*</label>
                                                                <input
                                                                onclick="this.showPicker()" type="time" class=" form-control"  name="endTime" autocomplete="off" required>
                                                            </div>

                                                            <div class="col-sm-3">
                                                                <button class="btn btn-primary mt-4 " type="submit">
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
                        <!-- end modal for insert-->
                        <br/><br/>

                        <!-- start modal for edit -->
                        <!-- Button trigger modal -->
                        <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">
                          <i class="fas fa-plus"></i>
                        </button> -->

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                  <div class="modal-header" style="background-color:#01303f;max-height: 50px;">
                                    <h5 class="modal-title" id="exampleModalLabel" style="color:white;line-height:18px;">Shift Management</h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                    <div class="modal-body">
                                        <div class="container-fluid">
                                            <div class="row row-card-one">
                                                <div class="col-sm-12">
                                                   <!-- form here -->
                                                    <form method="POST" action="{{route('shiftManage.store')}}" enctype="multipart/form-data" class="edit_data_form">
                                                        @csrf
                                                        <div class="row">
                                                            <input type="hidden" value="0" name="id" id="shiftID" required>                                                                     <div class="col-sm-3">
                                                                <label for="">Shift Name*</label>
                                                                <input type="text" class=" form-control" id="shiftName" name="shiftName" autocomplete="off" required>
                                                            </div>

                                                            <div class="col-sm-3">
                                                                <label for="">Start Time*</label>
                                                                <input type="time"
                                                                onclick="this.showPicker()"  class=" form-control" id="startTime" name="startTime" autocomplete="off" required>
                                                            </div>

                                                            <div class="col-sm-3">
                                                                <label for="">End Time*</label>
                                                                <input
                                                                onclick="this.showPicker()" type="time" class=" form-control" id="endTime" name="endTime" autocomplete="off" required>
                                                            </div>

                                                            <div class="col-sm-3">
                                                                <button class="btn btn-primary mt-4 " type="submit">
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
                        <!-- end modal for edit -->
                        <br/><br/>

                       <table id="dataTable" class="table display responsive nowrap">
                          <thead>
                            <tr>
                              <th>SN.</th>
                              <th>Shift Name</th>
                              <th>Start Time</th>
                              <th>End Time</th>
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
@endsection
@section('script')
<script>
    var s_data = $('#dataTable').DataTable({
        'order':[[0,'desc']],
        "processing": true,
        "serverSide": true,
        "ajax":{
            "url": "{{ route('shiftManage.ajax') }}",
            "dataType": "json",
            "type": "POST",
            data: function(data){
                data._token = "{{ csrf_token() }}";
            },
        },
        "columns": [
            { "data": "id"},
            { "data": "name"},
            { "data": "start_time"},
            { "data": "end_time"},
            { "data": "options"},
        ],
        "columnDefs": [ {
        "targets": 4,
        "orderable": false
        } ]

    });
    $(document).on('click','#shiftEdit',function(){
        var id=$(this).attr('data-id');
        $.ajax({
            url: "{{route('shiftManage.edit') }}?id=" + id,
            method: 'GET',
            success: function(data) {
                console.log(data);
                $('#shiftID').val(id);
                $('#shiftName').val(data.shiftName);
                $('#startTime').val(data.startTime);
                $('#endTime').val(data.endTime);

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
                 dataDelete("{{ url('shiftManage-delete') }}/"+id);
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
                    $('#exampleModalStore').modal('toggle');

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
                            $('.edit_data_form').find('select[name='+key+']').next().html(val);
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
    })
</script>
@endsection
