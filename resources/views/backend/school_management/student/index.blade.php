@section('title')
Admin - All Student
@endsection

@extends('Backend.layouts.layouts')

@section('main_contain')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">

        <div class="br-pagebody">
          <div class="br-section-wrapper">
            <h6 class="br-section-label text-center">All Students</h6>
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


            <div class="col-md-12 mt-5 mb-5" style="border: 1px solid; padding: 10px">
              <div class="row">
                <div class="col-md-3">
                  <label class=" form-control-label"><b>Academic Year:</b></label>
                  <select class="form-control searchbtn" name="academic_year_id" id="academic_year_id">
                      <option value="">Select Year</option>
                      @foreach ($academic_years as $academic_year)
                      <option value="{{ $academic_year->id }}">{{ $academic_year->year }}</option>
                      @endforeach
                  </select>
                </div>
                <div class="col-md-3">
                  <label class=" form-control-label"><b>Session:</b></label>
                  <select class="form-control" name="session_id" id="session_id">
                      <option value="">Select Session</option>
                      @foreach ($sessions as $session)
                      <option value="{{ $session->id }}">{{ $session->start_year->year }} - {{ $session->end_year->year }}</option>
                      @endforeach
                  </select>
                </div>
                
                <div class="col-md-3">
                  <label class=" form-control-label"><b>Class:</b></label>
                  <select class="form-control" name="class_id" id="class_id">
                      <option value="">Select Class</option>
                      @foreach ($classes as $class)
                      <option value="{{ $class->id }}">{{ $class->name }}</option>
                      @endforeach
                  </select>
                </div>
                <div class="col-md-3">
                  <label class=" form-control-label"><b>Section:</b></label>
                  <select class="form-control" name="section_id" id="section_id">
                      <option value="">Select Section</option>
                      @foreach ($sections as $section)
                      <option value="{{ $section->id }}">{{ $section->name }}</option>
                      @endforeach
                  </select>
                </div>
              </div>
            </div>



            <div class="table-wrapper">
              {{-- <table  class="table display responsive nowrap"> --}}
              <table id="datatable1" class="table display responsive nowrap">
                <thead>
                  <tr>
                    <th class="wd-10p">Id</th>
                    <th class="wd-15p">Student Image</th>
                    <th class="wd-15p">Student Name</th>
                    <th class="wd-15p">Class</th>
                    <th class="wd-15p">Academic Year</th>
                    <th class="wd-15p">Session</th>
                    <th class="wd-15p">Section</th>
                    <th class="wd-15p">Group</th>
                    <th class="wd-10p">Status</th>
                    <th class="wd-10p">Action</th>
                  </tr>
                </thead>
                <tbody id="admission-list">
                    @php
                        $i = 1;
                    @endphp
                  @if (count($admissions) > 0)
                    @foreach ($admissions as $admission)
                      <tr>
                          <td>{{ $i++ }}</td>
                          <td>
                            <img src="{{$admission->image_show}}" alt="" width="60px" height="40px" srcset="">
                          </td>
                          
                          <td>{{ $admission->student_name }}</td>
                          <td>{{ @$admission->class->name }}</td>
                          <td>{{ @$admission->academic_year->year }}</td>
                          <td>{{ @$admission->session->start_year->year }} - {{ @$admission->session->end_year->year }}</td>
                          <td>{{ @$admission->section->name }}</td>
                          <td>{{ @$admission->group->name }}</td>
                          <td>
                            @if($admission->status == 0)
                            <a href="{{ route('admin.school_student.status',$admission->id) }}" class="btn btn-sm btn-warning">Inactive</a>
                            @elseif($admission->status == 1)
                            <a href="{{ route('admin.school_student.status',$admission->id) }}" class="btn btn-sm btn-success">Active</a>
                            @endif
                          </td>
                          <td>
                            {{-- <a class="btn text-info" href="{{ route('admin.admission.details', $admission->id) }}"><i class="icon ion-eye tx-28"></i></i></a> --}}
                            <a class="btn text-info" href="{{ route('admin.school_student.edit', $admission->id) }}"><i class="icon ion-compose tx-28"></i></a>
                            <button class="btn text-danger bg-white"  value="{{$admission->id}}" id="dataDeleteModal"><i class="icon ion-trash-a tx-28"></i></button>
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
          {{-- <div class="footer-left">
            <div class="mg-b-2">Copyright &copy; <?php echo date('Y');?> NavieaSoft. All Rights Reserved.</div>
            <div>Attentively and carefully made by NavieaSoft.</div>
          </div> --}}
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
                <form action="{{ route('admin.school_student.delete') }}" method="post">
                    @csrf
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <i class="icon icon ion-ios-close-outline tx-60 tx-danger lh-1 mg-t-20 d-inline-block"></i>
                    <h4 class="tx-danger  tx-semibold mg-b-20 mt-2">Are you sure! you want to delete this?</h4>
                     <input type="hidden" name="student_id" id="modal_data_id">
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
{{-- <script>
  $('#search-category').on('change',function(){
      $('#searchbtn').click();
  })
</script> --}}

  {{-- <script>
      $(document).ready(function(){
          $('#academic_year_id, #session_id, #class_id, #section_id').change(function(){
              var academicYearId = $('#academic_year_id').val();
              // console.log(academicYearId);
              var sessionId = $('#session_id').val();
              var classId = $('#class_id').val();
              var sectionId = $('#section_id').val();

              
              if(academicYearId){
                  $.ajax({
                      url: '/get-search-student',
                      type: 'GET',
                      data: {
                          academic_year_id: academicYearId,
                          session_id: sessionId,
                          class_id: classId,
                          section_id: sectionId
                      },
                      dataType: 'json',
                      success: function(data){
                          $('select[name="session_id"]').empty();
                          $.each(data, function(key, value){
                              $('select[name="session_id"]').append('<option value="'+ key +'">' + value + '</option>');
                          });
                      }
                  });
              }else{
                  $('select[name="session_id"]').empty();
              }
          });
      });
  </script> --}}

  <script>
        $(document).ready(function(){
        $('#academic_year_id, #session_id, #class_id, #section_id').change(function(){
            var academicYearId = $('#academic_year_id').val();
            var sessionId = $('#session_id').val();
            var classId = $('#class_id').val();
            var sectionId = $('#section_id').val();
            
            $.ajax({
                url: '/get-search-student',
                type: 'GET',
                data: {
                    academic_year_id: academicYearId,
                    session_id: sessionId,
                    class_id: classId,
                    section_id: sectionId
                },
                dataType: 'json',
                success: function(data){
                    // Update the student table with the received data
                }
            });
        });
    });
  </script>
@endsection
