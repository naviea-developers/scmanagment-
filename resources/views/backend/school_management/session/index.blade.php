@section('title')
Admin - All Session
@endsection

@extends('Backend.layouts.layouts')

@section('main_contain')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">

        <div class="br-pagebody">
          <div class="br-section-wrapper">
            <h6 class="br-section-label text-center">All Session</h6>

            <a style="margin-bottom: 20px" href="{{ route('admin.session.create') }}" class="btn btn-primary btn-sm float-right">
              <i class="fa fa-plus"></i> Add Session
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
                  <tr class="text-center">
                    <th class="wd-10p">Id</th>
                    <th class="wd-15p">Current Session</th>
                    <th class="wd-15p">Session</th>
                    <th class="wd-15p">Start Session</th>
                    <th class="wd-15p">End Session</th>
                    <th class="wd-15p">Status</th>
                    <th class="wd-10p">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                  @if (count($sessions) > 0)
                    @foreach ($sessions as $session)
                      <tr class="text-center">
                          <td>{{ $i++ }}</td>
                          <td >
                            <input type="radio" name="is_current" value="{{ $session->id }}" {{ $session->is_current ? 'checked' : '' }}>
                          </td>
                          <td>{{ $session->start_year }} - {{ $session->end_year }}</td>
                          <td>
                            @if ($session->start_month == '1') January 
                            @elseif ($session->start_month == '2') February 
                            @elseif ($session->start_month == '3') March 
                            @elseif ($session->start_month == '4') April 
                            @elseif ($session->start_month == '5') May 
                            @elseif ($session->start_month == '6') June 
                            @elseif ($session->start_month == '7') July 
                            @elseif ($session->start_month == '8') August 
                            @elseif ($session->start_month == '9') September 
                            @elseif ($session->start_month == '10') October 
                            @elseif ($session->start_month == '11') November 
                            @elseif ($session->start_month == '12') December
                            @endif {{ @$session->start_year }}
                          </td>

                          <td>
                            @if ($session->end_month == '1') January 
                            @elseif ($session->end_month == '2') February 
                            @elseif ($session->end_month == '3') March 
                            @elseif ($session->end_month == '4') April 
                            @elseif ($session->end_month == '5') May 
                            @elseif ($session->end_month == '6') June 
                            @elseif ($session->end_month == '7') July 
                            @elseif ($session->end_month == '8') August 
                            @elseif ($session->end_month == '9') September 
                            @elseif ($session->end_month == '10') October 
                            @elseif ($session->end_month == '11') November 
                            @elseif ($session->end_month == '12') December 
                            @endif {{  @$session->end_year }}
                          </td>
                          <td>
                            @if(@$session->status == 0)
                            <a href="{{ route('admin.session.status',$session->id) }}" class="btn btn-sm btn-warning">Inactive</a>
                            @elseif(@$session->status == 1)
                            <a href="{{ route('admin.session.status',$session->id) }}" class="btn btn-sm btn-success">Active</a>
                            @endif
                          </td>
                          <td>
                            <a class="btn text-info" href="{{ route('admin.session.edit', $session->id) }}"><i class="icon ion-compose tx-28"></i></a>
                            <button class="btn text-danger bg-white"  value="{{$session->id}}" id="dataDeleteModal"><i class="icon ion-trash-a tx-28"></i></button>
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
                <form action="{{ route('admin.session.delete') }}" method="post">
                    @csrf
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <i class="icon icon ion-ios-close-outline tx-60 tx-danger lh-1 mg-t-20 d-inline-block"></i>
                    <h4 class="tx-danger  tx-semibold mg-b-20 mt-2">Are you sure! you want to delete this?</h4>
                     <input type="hidden" name="session_id" id="modal_data_id">
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


@section('script')

<script>
  document.querySelectorAll('input[name="is_current"]').forEach((radio) => {
      radio.addEventListener('change', function() {
          let sessionId = this.value;
          let csrfToken = document.querySelector('input[name="_token"]').value;

          fetch("{{ route('admin.session.updateCurrent') }}", {
              method: 'POST',
              headers: {
                  'Content-Type': 'application/json',
                  'X-CSRF-TOKEN': csrfToken
              },
              body: JSON.stringify({ session_id: sessionId })
          })
          .then(response => response.json())
          .then(data => {
              if (data.success) {
                  alert('Current session updated successfully.');
              } else {
                  alert('Failed to update current session.');
              }
          })
          .catch(error => console.error('Error:', error));
      });
  });
</script>
@endsection