@section('title')
Admin - all Ambulance Boocking Manage
@endsection

@extends('Backend.layouts.layouts')

@section('main_contain')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">

        <div class="br-pagebody">
          <div class="br-section-wrapper">
            <h6 class="br-section-label text-center">Ambulance Boocking Manage</h6>
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

            <div class="table-wrapper">
              <table id="datatable1" class="table display responsive nowrap">
                <thead>
                  <tr>
                    <th class="wd-10p">Id</th>
                    <th class="wd-15p">Driver Name</th>
                    <th class="wd-15p">book_type</th>
                    <th class="wd-15p">date</th>
                    <th class="wd-15p">time</th>
                    <th class="wd-15p">startpoint</th>
                    <th class="wd-15p">endpoint</th>
                    <th class="wd-15p">distance</th>
                    <th class="wd-15p">price</th>
                    <th class="wd-10p">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                  @if (count($bookingdrivers) > 0)
                    @foreach ($bookingdrivers as $bookingdriver)
                      <tr>
                          <td>{{ $i++ }}</td>
                          <td>{{ $bookingdriver->ambulance->name }} </td>
                          <td>
                            @if($bookingdriver->book_type == 1)
                            <p>Ride</p>
                            @elseif($bookingdriver->book_type == 2)
                            <p>Reserve</p>
                            @else
                            <p>Rental</p>
                            @endif
                          </td>
                          <td>{{ $bookingdriver->date }}</td>
                          <td>{{ $bookingdriver->time }}</td>
                          <td>{{ $bookingdriver->startpoint }}</td>
                          <td>{{ $bookingdriver->endpoint }}</td>
                          <td>{{ $bookingdriver->distance }} Km</td>
                          <td>{{ $bookingdriver->price }}</td>
                          <td>
                            {{-- <a class="btn text-info" href="{{ route('admin.ambulance.edit', $bookingdriver->id) }}"><i class="icon ion-compose tx-28"></i></a> --}}
                            <button class="btn text-danger bg-white"  value="{{$bookingdriver->id}}" id="dataDeleteModal"><i class="icon ion-trash-a tx-28"></i></button>
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
                <form action="{{ route('admin.ambulance.booking.delete') }}" method="post">
                    @csrf
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <i class="icon icon ion-ios-close-outline tx-60 tx-danger lh-1 mg-t-20 d-inline-block"></i>
                    <h4 class="tx-danger  tx-semibold mg-b-20 mt-2">Are you sure! you want to delete this?</h4>
                     <input type="hidden" name="ambulance_booking_id" id="modal_data_id">
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
