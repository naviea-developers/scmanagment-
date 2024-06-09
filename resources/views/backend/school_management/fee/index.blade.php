@section('title')
Admin - All Fees Name
@endsection

@extends('Backend.layouts.layouts')

@section('main_contain')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">

        <div class="br-pagebody">
          <div class="br-section-wrapper">
            <h6 class="br-section-label text-center">All Fees Name</h6>

            <a style="margin-bottom: 20px" href="{{ route('admin.fee.create') }}" class="btn btn-primary btn-sm float-right">
              <i class="fa fa-plus"></i> Add Fee Name
            </a>

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
                    <th class="wd-10p">Id</th>
                    <th class="wd-15p">Particular Fees Name</th>
                    {{-- <th class="wd-15p">Particular Duration</th> --}}
                    {{-- <th class="wd-15p">Is Dynamic</th> --}}
                    <th class="wd-15p">Status</th>
                    <th class="wd-10p">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                  @if (count($fees) > 0)
                    @foreach ($fees as $fee)
                      <tr>
                          <td>{{ $i++ }}</td>
                          <td>{{ $fee->particular_name }}</td>
                          {{-- <td>{{ $fee->particular_duration }}</td> --}}
                          {{-- <td>{{ $fee->is_dynamic }}</td> --}}
                          <td>
                            @if(@$fee->status == 0)
                            <a href="{{ route('admin.fee.status',$fee->id) }}" class="btn btn-sm btn-warning">Inactive</a>
                            @elseif(@$fee->status == 1)
                            <a href="{{ route('admin.fee.status',$fee->id) }}" class="btn btn-sm btn-success">Active</a>
                            @endif
                          </td>
                          <td>
                            @if ($fee->is_constant == 1 || $fee->is_constant == 2)

                            @elseif ($fee->is_constant == 0)
                            <a class="btn text-info" href="{{ route('admin.fee.edit', $fee->id) }}"><i class="icon ion-compose tx-28"></i></a>
                            <button class="btn text-danger bg-white"  value="{{$fee->id}}" id="dataDeleteModal"><i class="icon ion-trash-a tx-28"></i></button>
                            @endif
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

    <!--_-- ########### Start Add Category MODAL ############---->


    <!--_-- ########### End Add Category MODAL ############---->


    <!--_-- ########### Start Delete Category MODAL ############---->

    <div id="datamodalshow" class="modal fade">
        <div class="modal-dialog modal-dialog-top" role="document">
        <div class="modal-content tx-size-sm">
            <div class="modal-body tx-center pd-y-20 pd-x-20">
                <form action="{{ route('admin.fee.delete') }}" method="post">
                    @csrf
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <i class="icon icon ion-ios-close-outline tx-60 tx-danger lh-1 mg-t-20 d-inline-block"></i>
                    <h4 class="tx-danger  tx-semibold mg-b-20 mt-2">Are you sure! you want to delete this?</h4>
                     <input type="hidden" name="fee_id" id="modal_data_id">
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

   
@endsection
