@section('title')
Admin - all E-clinic Service
@endsection

@extends('Backend.layouts.layouts')

@section('main_contain')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">

        <div class="br-pagebody">
          <div class="br-section-wrapper">
            <h6 class="br-section-label text-center">E-clinic Service</h6>
               {{-- success message start --}}
            @if(session()->has('message'))
            <div class="alert alert-success">
            <button type="button" class="close" data-bs-dismiss="alert" aria-hidden="true"></button>
            {{session()->get('message')}}
            </div>
            <script>
                setTimeout(function(){
                    $('.alert.alert-success').hide();
                }, 3000);
            </script>
            @endif
            {{-- success message End --}}
            <div class="mb-3 d-flex justify-content-end">
                <!-- Button trigger modal -->
                <a href="{{ route('admin.e_clinic_service.banner') }}" class="btn btn-info tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium">
                    Service Banner</a>

            </div>
            <div class="table-wrapper">
              <table id="datatable1" class="table display responsive nowrap">
                <thead>
                  <tr>
                    <th class="wd-10p">Id</th>
                    <th class="wd-15p">Service Name</th>
                    <th class="wd-15p">Service Type</th>
                    {{-- <th class="wd-15p">Group Name</th> --}}
                    <th class="wd-15p">Pre Price</th>
                    <th class="wd-15p">Price</th>
                    {{-- <th class="wd-25p">Position</th> --}}

                    {{-- <th class="wd-10p">Status</th> --}}
                    <th class="wd-10p">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                  @if (count($services) > 0)
                    @foreach ($services as $service)
                      <tr>
                        <td>{{ $i++ }}</td>

                        <td>{{ $service->name }}</td>
                        <td>{{ $service->g_type == 0 ? "General" : "Clinic" }}</td>

                        <td>{{ $service->pre_price }}</td>
                        <td>{{ $service->price }}</td>
                          {{-- <td>{{ $department->position }}</td> --}}

                          {{-- <td>
                            @if($service->status == 0)
                            <a href="" class="btn btn-sm btn-warning">Inactive</a>
                            @elseif($service->status == 1)
                            <a href="" class="btn btn-sm btn-success">Active</a>
                            @endif
                          </td> --}}
                          <td>
                            <a class="btn text-info" href="{{ route('admin.e_clinic_service.edit',$service->id) }}"><i class="icon ion-compose tx-28"></i></a>
                            {{-- <button class="btn text-danger bg-white"  value="{{$service->id}}" id="dataDeleteModal"><i class="icon ion-trash-a tx-28"></i></button> --}}
                            {{-- <a class="btn text-info" href=""><i class="icon ion-compose tx-28"></i></a>

                            <button class="btn text-danger bg-white"  value="" id="dataDeleteModal"><i class="icon ion-trash-a tx-28"></i></button> --}}
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
                <form action="{{ route('department.delete') }}" method="post">
                    @csrf
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <i class="icon icon ion-ios-close-outline tx-60 tx-danger lh-1 mg-t-20 d-inline-block"></i>
                    <h4 class="tx-danger  tx-semibold mg-b-20 mt-2">Are you sure! you want to delete this?</h4>
                     <input type="hidden" name="department_id" id="modal_data_id">
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

@endsection
