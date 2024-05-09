@section('title')
Admin - Event Participant
@endsection

@extends('Backend.layouts.layouts')

@section('main_contain')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">

        <div class="br-pagebody">
          <div class="br-section-wrapper">
            <h6 class="br-section-label text-center">All Event Participant</h6>
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
                    <th class="wd-15p">Event Order Number</th>
                    <th class="wd-15p">Student Name</th>
                    <th class="wd-15p">Student Mobile</th>
                    <th class="wd-15p">Student Email</th>
                    <th class="wd-15p">Course Amound</th>
                    <th class="wd-10p">Payment Status</th>
                    <th class="wd-10p">Status</th>
                    <th class="wd-10p">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($events as $event)
                      <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $event->order_number }}</td>
                          <td>{{ $event->name }}</td>
                          <td>{{ $event->mobile }}</td>
                          <td>{{ $event->email }}</td>
                          <td>{{ $event->total_amount }}</td>
                          <td>
                            @if($event->payment_status == "paid")
                               Paid
                            @elseif($event->payment_status == "unpaid")
                               Unpaid
                            @endif
                          </td>

                          <td>
                            @if($event->status == "new")
                            New
                         @elseif($event->status == "process")
                            Process
                          @elseif($event->status == "delivered")
                             Delivered
                          @elseif($event->status == "cancel")
                             Cancel
                         @endif
                        </td>

                          <td>
                            <button class="btn text-success bg-white"  value="{{$event->id}}" id="dataDeleteModal"><i class="icon ion-compose tx-28"></i></button>
                            <a class="btn text-info" href="{{ route('event.order.details', $event->id) }}"><i class="fa fa-eye tx-28"></i></a>
                          </td>


                      </tr>
                    @endforeach
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
                <form action="{{ route('event.status.change.index') }}" method="post">
                    @csrf
                    <h4 class="tx-success  tx-semibold mg-b-20 mt-2">Change Status</h4>
                    <select class="form-control" name="status">
                        <option value="">Select Status type</option>
                        <option value="new">New</option>
                        <option value="process">Process</option>
                        <option value="delivered">Delivered</option>
                        <option value="cancel">Cancel</option>
                      </select>
                     <input type="hidden" name="eventstatus_id" id="modal_data_id">

                     <button type="submit" class="btn btn-success mr-2 text-white tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium mg-b-20">
                        yes
                    </button>
                    <button type="button" class="btn btn-danger tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium mg-b-20" data-dismiss="modal" aria-label="Close">
                        No
                    </button>
                </form>
            </div><!-- modal-body -->
        </div><!-- modal-content -->
        </div><!-- modal-dialog -->
    </div><!-- modal -->

    <!--_-- ########### End Delete Category MODAL ############---->

@endsection
