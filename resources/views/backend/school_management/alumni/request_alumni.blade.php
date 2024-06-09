@section('title')
Admin - Requested Alumni
@endsection

@extends('Backend.layouts.layouts')

@section('main_contain')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">

        <div class="br-pagebody">
          <div class="br-section-wrapper">
            <h6 class="br-section-label text-center">All Requested Alumni</h6>
               {{-- success message start --}}
            @if(session()->has('message'))
            <div class="alert alert-success">
            {{-- <button type="button" class="close" data-bs-dismiss="alert" aria-hidden="true"></button> --}}
            {{session()->get('message')}}
            </div>
            <script>
                setTimeout(function(){
                    $('.alert.alert-success').hide();
                }, 3000);
            </script>
            @endif
            {{-- success message End --}}

            <div class="table-wrapper">
              <table id="datatable1" class="table display responsive nowrap">
                <thead>
                  <tr>
                    <th class="wd-10p">SN</th>
                    <th class="wd-15p">Image</th>
                    <th class="wd-15p">Name</th>
                    <th class="wd-15p">Session</th>
                    <th class="wd-15p">Class</th>
                    <th class="wd-15p">Roll Number</th>
                    <th class="wd-15p">Status</th>
                    <th class="wd-15p">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                  @if (count($alumnis) > 0)
                    @foreach ($alumnis as $alumni)
                      <tr>
                          <td>{{ $i++ }}</td> 
                          <td>
                            <img src="{{$alumni->image_show}}" alt="" width="60px" height="40px" srcset="">
                          </td>
                          <td>{{ $alumni->name }}</td>
                          <td>{{ @$alumni->session->start_year }} - {{ @$alumni->session->end_year }}</td>
                          <td>{{ @$alumni->class->name }}</td>
                          <td>{{ $alumni->roll_number }}</td>
                          <td>
                            @if(@$alumni->is_alunmi == 0)
                            <a href="{{ route('admin.requested_alumni.status',$alumni->id) }}" class="btn btn-sm btn-warning">Panding</a>
                            @elseif(@$alumni->is_alunmi == 1)
                            <a href="{{ route('admin.requested_alumni.status',$alumni->id) }}" class="btn btn-sm btn-success">Approved</a>
                            @endif
                          </td>
                          {{-- <td>{{ $alumni->mobile }}</td>
                          <td>{{ $alumni->email }}</td> --}}
                          
                          <td>
                            <a class="btn text-info" href="{{ route('admin.alumni.edit', $alumni->id) }}"><i class="icon ion-compose tx-28"></i></a>
                            <button class="btn text-danger bg-white"  value="{{$alumni->id}}" id="dataDeleteModal"><i class="icon ion-trash-a tx-28"></i></button>
                            {{-- <button class="btn text-white bg-info changePass"  value="{{$alumni->id}}">Change Password</button> --}}
                          </td>
                      </tr>
                    @endforeach
                  @endif

                </tbody>
              </table>
            </div><!-- table-wrapper -->


          </div><!-- br-section-wrapper -->
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
                <form action="{{ route('admin.alumni.delete') }}" method="post">
                    @csrf
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <i class="icon icon ion-ios-close-outline tx-60 tx-danger lh-1 mg-t-20 d-inline-block"></i>
                    <h4 class="tx-danger  tx-semibold mg-b-20 mt-2">Are you sure! you want to delete this?</h4>
                     <input type="hidden" name="alumni_id" id="modal_data_id">
                    <button type="submit" class="btn btn-danger mr-2 text-white tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium mg-b-20">
                        yes
                    </button>
                    <button type="button" class="btn btn-success tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium mg-b-20" data-dismiss="modal" aria-label="Close">
                        No
                    </button>
                </form>
            </div><!-- modal-body -->
        </div><!-- modal-content -->
        </div><!-- modal-dialog -->
    </div><!-- modal -->

    <!--_-- ########### End Delete Category MODAL ############---->

    {{-- <div id="changePassword" class="modal fade">
      <div class="modal-dialog modal-dialog-top" role="document">
      <div class="modal-content tx-size-sm">
          <div class="modal-bodypd-y-20 pd-x-20 p-4">
              <form action="{{ route('backend.admin_change_password') }}" method="post">
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
                       <button type="submit" class="btn btn-success mr-2 text-white tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium mg-b-20">
                      Submit
                      </button>
                      <button type="button" class="btn btn-danger tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium mg-b-20" data-dismiss="modal" aria-label="Close">
                          Close
                      </button>
                  </div>

              </form>
          </div><!-- modal-body -->
      </div><!-- modal-content -->
      </div><!-- modal-dialog -->
  </div> --}}

@endsection
