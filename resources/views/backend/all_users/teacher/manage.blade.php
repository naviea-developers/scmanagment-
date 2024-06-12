@section('title')
Admin - all Teacher
@endsection

@extends('Backend.layouts.layouts')

@section('main_contain')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">

        <div class="br-pagebody">
          @include('Backend.all_users.teacher.create')

          <div class="br-section-wrapper data-list pt-3">

              <h6 class="br-section-label text-center">All Teacher</h6>
              <div style="text-align: right;">
                  <a style="margin-bottom: 20px" href="javascript:void(0);" class="btn btn-primary btn-sm btn-new">
                      <i class="fa fa-plus"></i> Add Teacher
                  </a>
              </div>

            <div class="table-wrapper">
              <table id="data_table_list" class="table display responsive nowrap">
                <thead>
                  <tr>
                    <th class="wd-10p">Id</th>
                    <th class="wd-15p">Image</th>
                    <th class="wd-15p">Teacher ID</th>
                    <th class="wd-15p">Name</th>
                    <th class="wd-15p">Designation</th>
                    <th class="wd-15p">Type</th>
                    <th class="wd-15p">mobile</th>
                    <th class="wd-15p">email</th>
                    <th class="wd-15p">gender</th>
                    <th class="wd-10p">Status</th>
                    <th class="wd-10p">Action</th>
                  </tr>
                </thead>
                <tbody>
                    {{-- @php
                        $i = 1;
                    @endphp
                  @if (count($teachers) > 0)
                    @foreach ($teachers as $teacher)
                      <tr>
                          <td>{{ $i++ }}</td>
                          <td>
                            <img src="{{$teacher->image_show}}" alt="" width="60px" height="40px" srcset="">
                          </td>
                          <td>{{ $teacher->name }}</td>
                          <td>{{ @$teacher->user_designation->name }}</td>
                          <td>
                            @if ($teacher->teacher_type == 'permanent')
                            <p>Permanent</p>
                            @elseif ($teacher->teacher_type == 'guest')
                            <p>Guest</p>
                            @endif
                          </td>
                          <td>{{ $teacher->mobile }}</td>
                          <td>{{ $teacher->email }}</td>
                          <td>
                            @if ($teacher->gender=='0')
                              Male
                          @else
                              Female
                          @endif
                        </td>
                          <td>
                            @if($teacher->status == 0)
                            <a href="{{ route('admin.teacher.status',$teacher->id) }}" class="btn btn-sm btn-warning">Inactive</a>
                            @elseif($teacher->status == 1)
                            <a href="{{ route('admin.teacher.status',$teacher->id) }}" class="btn btn-sm btn-success">Active</a>
                            @endif
                          </td>
                          <td>
                            <a class="btn text-info" href="{{ route('admin.teacher.edit', $teacher->id) }}"><i class="icon ion-compose tx-28"></i></a>
                            <button class="btn text-danger bg-white"  value="{{$teacher->id}}" id="dataDeleteModal"><i class="icon ion-trash-a tx-28"></i></button>
                            <button class="btn text-white bg-info changePass"  value="{{$teacher->id}}">Change Password</button>
                          </td>
                      </tr>
                    @endforeach
                  @endif --}}

                </tbody>
              </table>
            </div><!-- table-wrapper -->


          </div><!-- br-section-wrapper -->
          <div class="data-edit-res"></div>
        </div><!-- br-pagebody -->
        <footer class="br-footer">
          <div class="footer-left">
            <div class="mg-b-2">Copyright &copy; <?php echo date('Y');?> NavieaSoft. All Rights Reserved.</div>
            <div>Attentively and carefully made by NavieaSoft.</div>
          </div>
        </footer>
    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->



    <!--_-- ########### Start Delete Category MODAL ############---->

    <div id="datamodalshow" class="modal fade">
      <div class="modal-dialog modal-dialog-top" role="document">
          <div class="modal-content tx-size-sm">
              <div class="modal-body tx-center pd-y-20 pd-x-20">
                  <form id="data-form-delete" action="{{ route('admin.teacher.delete') }}" method="post">
                      @csrf
                      <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                      <i class="icon icon ion-ios-close-outline tx-60 tx-danger lh-1 mg-t-20 d-inline-block"></i>
                      <h4 class="tx-danger  tx-semibold mg-b-20 mt-2">Are you sure! you want to delete this?</h4>
                      <input type="hidden" name="teacher_id" id="modal_data_id">
                      <button type="submit" class="btn-delete btn btn-danger mr-2 text-white tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium mg-b-20"> yes</button>
                      <button type="button" class="btn btn-success tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium mg-b-20" data-bs-dismiss="modal" aria-label="Close"> No</button>
                  </form>
              </div><!-- modal-body -->
          </div><!-- modal-content -->
      </div><!-- modal-dialog -->
  </div><!-- modal -->

    <!--_-- ########### End Delete Category MODAL ############---->

    <div id="changePassword" class="modal fade">
      <div class="modal-dialog modal-dialog-top" role="document">
      <div class="modal-content tx-size-sm">
          <div class="modal-bodypd-y-20 pd-x-20 p-4">
              <form id="data-form-change-pass" action="{{ route('admin.teacher_change_password') }}" method="post">
                  @csrf
                  <h3>Change Password</h3>
                  <input type="hidden" name="user_id" id="user_id_pass">
                  <div class="row">
                      <div class="col-md-12">
                          <label for="">Password</label>
                          <input type="text" name="password" class="form-control">
                      </div>
                  </div>
                  <div class="mt-3">
                       <button type="submit" class="btn-change-pass btn btn-success mr-2 text-white tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium mg-b-20">
                      Submit
                      </button>
                      <button type="button" class="btn btn-danger tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium mg-b-20" data-bs-dismiss="modal" aria-label="Close">
                          Close
                      </button>
                  </div>

              </form>
          </div><!-- modal-body -->
      </div><!-- modal-content -->
      </div><!-- modal-dialog -->
  </div>

@endsection




@section('script')
<script>
   
    var datatable = $('#data_table_list').DataTable({
       // 'pageLength': 2,
        "order": [[ 0, "desc" ]],
        "processing": true,
        "serverSide": true,
        "ajax":{
            "url": "{{ route('admin.teacher.ajax') }}",
            "dataType": "json",
            "type": "POST",
            data: function(data){
              data._token = "{{ csrf_token() }}";
            },
        },
        "columns": [
            { "data": "id"},
            { "data": "image"},
            { "data": "unique_id"},
            { "data": "name"},
            { "data": "designation_id"},
            { "data": "teacher_type"},
            { "data": "mobile"},
            { "data": "email"},
            { "data": "gender"},
            { "data": "status"},
            { "data": "options"},
        ],
        "columnDefs": [ {
          "targets": 10,
          "orderable": false
          } ]

    });
</script>


{{-- teacher Add  --}}
<script>

  //Audio Contents start
  $(document).ready(function() {
          $(document).on('click','#plus-btn-data-content-add',function(){



              var myvar = '<div class="d-flex align-items-center mt-2 row">'+
  '                                            <div class="col-md-7">'+
  '                                                <label class="form-control-label"><b>Certificate Name:</b></label>'+
  '                                                <div class="d-flex  align-items-center select-add-section " >'+
  '                                                    <input type="text" name="certificates_name[]" value="{{ old('$certificates_name') }}" class=" form-control" placeholder="Certificate Name">'+
  '                                                </div>'+
  '                                            </div>'+
  '                                            <div class="col-md-4">'+
  '                                                <label class="form-control-label"><b>Certificate File:</b></label>'+
  '                                                <div class="d-flex  align-items-center select-add-section">'+
  '                                                    <input type="file"  name="certificates_file[]" value="{{ old('$certificates_file') }}" class=" form-control">'+
  '                                                </div>'+
  '                                            </div>'+
  '                                            <div class="col-md-1">'+
  '                                             <a href="javascript:void(0)" class="minus-btn-data-content px-1 p-0 m-0 ml-2"><i class="fas fa-minus-circle"></i></a>'+
  '                                            </div>'+
  '                                        </div>';


  $('.add-data-content').prepend(myvar);
              //console.log();
          });

          $(document).on('click','.minus-btn-data-content',function(){
              $(this).parent().parent().remove();
          });


      });
      $(document).on('click','.minus-btn-data-old-audio',function(){
          console.log(this);
           $(this).parent().parent().parent().append('<input type="hidden" name="delete_certificates_file[]" value="'+$(this).attr('audio_file_id')+'">');
           $(this).parent().parent().remove();
      });

  //Audio Contents end
</script>


{{-- teacher Edit --}}
<script>

  //Audio Contents start
  $(document).ready(function() {
          $(document).on('click','#plus-btn-data-content-edit',function(){



              var myvar = '<div class="d-flex align-items-center mt-2 row">'+
  '                                            <div class="col-md-7">'+
  '                                                <label class="form-control-label"><b>Certificate Name:</b></label>'+
  '                                                <div class="d-flex  align-items-center select-add-section " >'+
  '                                                    <input type="text" name="certificates_name[]" value="{{ old('$certificates_name') }}" class=" form-control" placeholder="Certificate Name">'+
  '                                                </div>'+
  '                                            </div>'+
  '                                            <div class="col-md-4">'+
  '                                                <label class="form-control-label"><b>Certificate File:</b></label>'+
  '                                                <div class="d-flex  align-items-center select-add-section">'+
  '                                                    <input type="file"  name="certificates_file[]" accept="image/jpeg,image/gif,image/png,application/pdf" value="{{ old('$certificates_file') }}" class=" form-control">'+
  '                                                </div>'+
  '                                            </div>'+
  '                                            <div class="col-md-1">'+
  '                                             <a href="javascript:void(0)" class="minus-btn-data-content px-1 p-0 m-0 ml-2"><i class="fas fa-minus-circle"></i></a>'+
  '                                            </div>'+
  '                                        </div>';


  $('.add-data-content').prepend(myvar);
              //console.log();
          });

          $(document).on('click','.minus-btn-data-content',function(){
              $(this).parent().parent().remove();
          });


      });
      $(document).on('click','.minus-btn-data-old-audio',function(){
          console.log(this);
           $(this).parent().parent().parent().append('<input type="hidden" name="delete_certificates_file[]" value="'+$(this).attr('audio_file_id')+'">');
           $(this).parent().parent().remove();
      });

  //Audio Contents end
</script>

@endsection
