@extends('Backend.layouts.layouts')

@section('title','All class routine')
@section('style')
<style>
    .select2-container--default .select2-selection--single {
        height: 41px;}
</style>
@endsection
{{-- <link rel="stylesheet" href="{{ URL::asset('css/custom/eduStc.css') }}"> --}}
<link rel="stylesheet" href="{{ asset('public') }}/css/custom/eduStc.css">

@section('main_contain')

<div class="br-mainpanel">

        <div class="p-2">

            <div class="br-section-wrapper">

                <div class="br-pagetitle">
                    <i class="fa-duotone fa-chalkboard-user"></i>
                    <div>
                      <h4>View All Class Routine</h4>
                      <p class="mg-b-0">Manage all Class Routine</p>
                    </div>
                </div>

                    <div class="col-md-12 mt-5 mb-5" style="border: 1px solid; padding: 10px">
                        <div class="row">

                        <div class="col-md-4">
                            <label class="form-control-label"><b>Class:</b></label>
                            <select class="form-control form-select select2" id="class">
                                <option value="">Select Class</option>
                                @foreach ($classes as $class)
                                <option value="{{ $class->id }}">{{ $class->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="col-md-4">
                            <label class="form-control-label"><b>Section:</b></label>
                            <select class="form-control form-select select2 section_id" id="section">
                                <option value="">Select Section</option>
                            </select>
                        </div>
                        
                        <div class="col-md-4">
                            <label class="form-control-label"><b>Session:</b></label>
                            <select class="form-control form-select select2" name="session_id" id="session_id">
                                <option value="">Select Session</option>
                                @foreach ($sessions as $session)
                                <option value="{{ $session->id }}">{{ $session->start_year }} - {{ $session->end_year }}</option>
                                @endforeach
                            </select>
                        </div>
                    
                        </div>
                    </div>


                    <div class="get-search-student-class-routine">
                        <a href="{{ route('admin.routine.create') }}"
                        class="btn btn-primary btn-sm addclassbtn">
                            Add Class Routine
                        </a>
                        <br>
                    
                        <table class="table" id="datatable1">
                            <thead>
                            <tr>
                                <th scope="col">Session</th>
                                <th scope="col">Class Name</th>
                                <th scope="col">Sections</th>
                                <th scope="col">Subject</th>
                                <th scope="col">Teacher</th>
                                <th scope="col">Day</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($allData as $data)

                                <tr>
                                    <td>{{@$data->session->start_year}} - {{@$data->session->end_year}}</td>
                                    <td>{{@$data->class->name}}</td>
                                    <td>{{@$data->schoolsection->name}}</td>
                                    <td>{{@$data->subject->name}}</td>
                                    <td>{{@$data->teacher->name}}</td>
                                    <td>{{@$data->day}}</td>
                                    <td>
                                    
                                        {{-- <a href="{{ route('admin.routine.details',$data->id) }}" class="btn btn-primary"><i class="fa-solid fa-eye"></i></a> --}}
                                        {{-- <a href="{{ route('admin.routine.edit',$data->id) }}" class="btn btn-success"><i class="fa-solid fa-edit"></i></a> --}}
                                        <a class="btn text-info" href="{{ route('admin.routine.edit',$data->id) }}"><i class="icon ion-compose tx-28"></i></a>
                                        <button class="btn text-danger bg-white"  value="{{$data->id}}" id="dataDeleteModal"><i class="fa-solid fa-trash"></i></button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
            </div>

        </div>

</div>

  
 <!--_-- ########### Start Delete Category MODAL ############---->

 <div id="datamodalshow" class="modal fade">
  <div class="modal-dialog modal-dialog-top" role="document">
  <div class="modal-content tx-size-sm">
      <div class="modal-body tx-center pd-y-20 pd-x-20">
          <form action="{{ route('admin.routine.delete') }}" method="post">
              @csrf
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
              <i class="icon icon ion-ios-close-outline tx-60 tx-danger lh-1 mg-t-20 d-inline-block"></i>
              <h4 class="tx-danger  tx-semibold mg-b-20 mt-2">Are you sure! you want to delete this?</h4>
               <input type="hidden" name="class_routine_id" id="modal_data_id">
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


@section('script')

{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
<script>
    $(document).ready(function() {
       
        $('#class,.section_id, #session_id').change(function() {
            fetchClassRoutine();
        });

        function fetchClassRoutine() {
            var classId = $('#class').val();
            var sectionId = $('#section').val();
            var sessionId = $('#session_id').val();

            // if (classId && sectionId && sessionId) {
                $.ajax({
                    url: "{{ route('get.class.routine') }}",
                    type: 'GET',
                    data: { class_id: classId, section_id: sectionId, session_id: sessionId },
                    success: function(response) {
                        console.log(response);
                        $(".get-search-student-class-routine").html(response);
                    }
                });
            // }
        }
    });
</script>
@endsection
