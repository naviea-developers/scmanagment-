@section('title')
Manage Leave Tagline
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
                        <h4 class="my-1"> <b>Leave Tagline Manage</b></h4>
                        </div>
                    </div>
                </div>
            </div>



            <div class="container">
                <div class="row row-card-one my-2">
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
                                    <h5 class="modal-title" id="exampleModalLabel" style="color:white;line-height:18px;">Leave Tagline</h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                    <div class="modal-body">
                                        <div class="container-fluid">
                                            <div class="row row-card-one">
                                                <div class="col-sm-12">
                                                   <!-- form here -->
                                                    <form method="POST" action="{{route('leaveTagline.store')}}" enctype="multipart/form-data" class="add_data_form">
                                                        @csrf
                                                        <div class="row">
                                                            <input type="hidden" value="0" name="id" required>
                                                           	<div class="col-sm-3">
                                                                <label for="">Leave Type *</label>
                                                                <select class="form-control" name="leaveTypeID" required>
                                                                    <option value="">-- Select One --</option>
                                                                    @foreach($leaveTypes as $leaveType)
                                                                    <option value="{{$leaveType->id}}">{{$leaveType->leaveCode}} - {{$leaveType->description}}</option>
                                                                    @endforeach

                                                                </select>
                                                            </div>

                                                            <div class="col-sm-3">
                                                                <label for="">Leave Part *</label>
                                                                <select class="form-control" name="leavePartID" required>
                                                                    <option value="">-- Select One --</option>
                                                                    @foreach($leaveParts as $leavePart)
                                                                    <option value="{{$leavePart->id}}">{{$leavePart->levaePartName}} - {{$leavePart->day}}</option>
                                                                    @endforeach

                                                                </select>
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
                                    <h5 class="modal-title" id="exampleModalLabel" style="color:white;line-height:18px;">Leave Tagline</h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                    <div class="modal-body">
                                        <div class="container-fluid">
                                            <div class="row row-card-one">
                                                <div class="col-sm-12">
                                                   <!-- form here -->
                                                    <form method="POST" action="{{route('leaveTagline.store')}}" enctype="multipart/form-data" class="edit_data_form">
                                                        @csrf
                                                        <div class="row">
                                                           <input type="hidden" value="0" name="id" id="leaveTaglinID" required>
                                                            <div class="col-sm-3">
                                                                <label for="">Leave Type *</label>
                                                                <select class="form-control" id="leaveTypeID" name="leaveTypeID" required>
                                                                    <option value="">-- Select One --</option>
                                                                    @foreach($leaveTypes as $leaveType)
                                                                    <option value="{{$leaveType->id}}">{{$leaveType->leaveCode}} - {{$leaveType->description}}</option>
                                                                    @endforeach

                                                                </select>
                                                            </div>

                                                            <div class="col-sm-3">
                                                                <label for="">Leave Part *</label>
                                                                <select class="form-control" id="leavePartID" name="leavePartID" required>
                                                                    <option value="">-- Select One --</option>
                                                                    @foreach($leaveParts as $leavePart)
                                                                    <option value="{{$leavePart->id}}">{{$leavePart->levaePartName}} - {{$leavePart->day}}</option>
                                                                    @endforeach

                                                                </select>
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
                              <th>Leave Code</th>
                              <th>Leave Description</th>
                              <th>Leave Type</th>
                              <th>Leave Type Day</th>
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
<link href="{{ asset('public/backend/css') }}/sweetalert2.min.css" rel="stylesheet">
<script src="{{ asset('public/backend/js') }}/sweetalert2.all.min.js"></script>
<!-- shift edit  -->
<script type="text/javascript">
 
        var s_data = $('#dataTable').DataTable({
            'order':[[0,'desc']],
            "processing": true,
            "serverSide": true,
            "ajax":{
                "url": "{{ route('leaveTagline.ajax') }}",
                "dataType": "json",
                "type": "POST",
                data: function(data){
                    data._token = "{{ csrf_token() }}";
                },
            },
            "columns": [
                { "data": "id"},
                { "data": "name"},
                { "data": "description"},
                { "data": "part_name"},
                { "data": "day"},
                { "data": "options"},
            ],
            "columnDefs": [ {
            "targets": 5,
            "orderable": false
            } ,{
            "targets": 2,
            "orderable": false
            } ]

        });
        $(document).on('click','#leaveTaglineEdit',function(){
         var id=$(this).attr('data-id');
         // var termID=$('#termID').val();
           // alert(id);
            $.ajax({
                url: "{{route('leaveTagline.edit') }}?id=" + id,
                method: 'GET',
                success: function(data) {
                    $('#leavePartID').html(data.leavePartID);
                    $('#leaveTaglinID').val(data.leaveTaglinID);
                    $('#leaveTypeID').html(data.leaveTypeID);
                }
            });
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
                window.location = "{{ url('leaveTagline-delete') }}/"+id;
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
                console.log(response);
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
    });
</script>
@endsection
