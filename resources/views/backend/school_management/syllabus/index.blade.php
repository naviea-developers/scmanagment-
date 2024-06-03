@section('title')
Admin - All Syllabus
@endsection

@extends('Backend.layouts.layouts')

@section('main_contain')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">

        <div class="br-pagebody">
          
          <div class="br-section-wrapper">

          

            <h6 class="br-section-label text-center">All Syllabus</h6>
               {{-- success message start --}}
              @if(session()->has('message'))
              <div class="alert alert-success">
              {{session()->get('message')}}
              </div>
              <script>
                  setTimeout(function(){
                      $('.alert.alert-success').hide();
                  }, 3000);
              </script>
              @endif
              {{-- success message End --}}

            <div class="col-md-12 mt-5 mb-5" style="border: 1px solid; padding: 10px">
              <div class="row">
                <div class="col-md-6">
                  <label class="form-control-label"><b>Session:</b></label>
                  <select class="form-control form-select select2" name="session_id" id="session_id">
                      <option value="">Select Session</option>
                      @foreach ($sessions as $session)
                      <option value="{{ $session->id }}">{{ $session->start_year }} - {{ $session->end_year }}</option>
                      @endforeach
                  </select>
                </div>

                  <div class="col-md-6">
                      <label class="form-control-label"><b>Class:</b></label>
                      <select class="form-control form-select select2" id="class">
                          <option value="">Select Class</option>
                          @foreach ($classes as $class)
                          <option value="{{ $class->id }}">{{ $class->name }}</option>
                          @endforeach
                      </select>
                  </div>
          
                  

                  {{-- <div class="col-md-4">
                      <label class="form-control-label"><b>Examination:</b></label>
                      <select class="form-control form-select select2" name="examination_id" id="examination">
                          <option value="">Select Examination</option>
                          @foreach ($examinations as $examination)
                          <option value="{{ $examination->id }}">{{ $examination->name }}</option>
                          @endforeach
                      </select>
                  </div> --}}
              </div>
          </div>



        <div class="get-search-syllabus">
          <a style="margin-bottom: 20px" href="{{ route('admin.syllabus.create') }}" class="btn btn-primary btn-sm float-right">
            <i class="fa fa-plus"></i> Add Syllabus
          </a>
          
          


            <div class="table-wrapper">
              <table id="datatable1" class="table display responsive nowrap">
                <thead>
                  <tr>
                    <th class="wd-10p">Id</th>
                    <th class="wd-15p">Examination</th>
                    <th class="wd-15p">Class Name</th>
                    <th class="wd-15p">Subject Name</th>
                    <th class="wd-15p">Lession Name</th>
                    <th class="wd-15p">Status</th>
                    <th class="wd-10p">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                  @if (count($syllabuses) > 0)
                    @foreach ($syllabuses as $syllabus)
                      <tr>
                          <td>{{ $i++ }}</td>
                          {{-- <td>
                            <img src="{{$syllabus->image_show}}" alt="" width="60px" height="40px" srcset="">
                          </td> --}}
                          <td>{{ @$syllabus->examination->name }} ({{ @$syllabus->examination->session->start_year }}-{{ @$syllabus->examination->session->end_year }})</td>
                          <td>{{ @$syllabus->class->name }}</td>
                          <td>{{ @$syllabus->subject->name }}</td>
                          <td>{{ @$syllabus->lession->name }}</td>
                          <td>
                            @if(@$syllabus->status == 0)
                            <a href="{{ route('admin.syllabus.status',$syllabus->id) }}" class="btn btn-sm btn-warning">Inactive</a>
                            @elseif(@$syllabus->status == 1)
                            <a href="{{ route('admin.syllabus.status',$syllabus->id) }}" class="btn btn-sm btn-success">Active</a>
                            @endif
                          </td>
                          <td>
                            <a class="btn text-info" href="{{ route('admin.syllabus.edit', $syllabus->id) }}"><i class="icon ion-compose tx-28"></i></a>
                            <button class="btn text-danger bg-white"  value="{{$syllabus->id}}" id="dataDeleteModal"><i class="icon ion-trash-a tx-28"></i></button>
                          </td>
                      </tr> 
                    @endforeach
                  @endif

                </tbody>
              </table>
            </div><!-- table-wrapper -->
          </div>

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
                <form action="{{ route('admin.syllabus.delete') }}" method="post">
                    @csrf
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <i class="icon icon ion-ios-close-outline tx-60 tx-danger lh-1 mg-t-20 d-inline-block"></i>
                    <h4 class="tx-danger  tx-semibold mg-b-20 mt-2">Are you sure! you want to delete this?</h4>
                     <input type="hidden" name="syllabus_id" id="modal_data_id">
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
  $(document).ready(function() {
      // $('#class, #session_id, #examination').change(function() {
        $('#class, #session_id').change(function() {
          fetchSyllabus();
      });

      function fetchSyllabus() {
          var classId = $('#class').val();
          var sessionId = $('#session_id').val();
          // var examId = $('#examination').val();

          // if (classId && sessionId && examId) {
          //     $.ajax({
          //         url: "{{ route('get.syllabus') }}",
          //         type: 'GET',
          //         data: {
          //             class_id: classId,
          //             session_id: sessionId,
          //             examination_id: examId
          //         },
          //         success: function(response) {
          //             console.log(response);
          //             $(".get-search-syllabus").html(response);
          //         }
          //     });
          // }
          if (classId && sessionId) {
              $.ajax({
                  url: "{{ route('get.syllabus') }}",
                  type: 'GET',
                  data: {
                      class_id: classId,
                      session_id: sessionId
                  },
                  success: function(response) {
                      console.log(response);
                      $(".get-search-syllabus").html(response);
                  }
              });
          }




      }
  });
</script>
@endsection