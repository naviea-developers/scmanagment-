@extends('Backend.layouts.layouts')

@section('title','All Exam schedule')
{{-- <link rel="stylesheet" href="{{ URL::asset('css/custom/eduStc.css') }}"> --}}
<link rel="stylesheet" href="{{ asset('public') }}/css/custom/eduStc.css">
@section('style')
<style>
    .select2-container--default .select2-selection--single {
        height: 41px;}
</style>
@endsection
@section('main_contain')

<div class="br-mainpanel">

        <div class="p-2">

            <div class="br-section-wrapper">

                <div class="br-pagetitle">
                    <i class="fa-duotone fa-chalkboard-user"></i>
                    <div>
                      <h4>View All Exam Schedule</h4>
                      <p class="mg-b-0">Manage all Exam Schedule</p>
                    </div>
                  </div>

                  {{-- <div class="col-md-12 mt-5 mb-5" style="border: 1px solid; padding: 10px">
                      <div class="row">
                        <div class="col-md-12">
                            <label class="form-control-label"><b>Exam title:</b></label>
                            <select class="form-control form-select select2" id="examination_id">
                                <option value="">Select Exam Title</option>
                                @foreach ($examinations as $examination)
                                <option value="{{ $examination->id }}">{{ $examination->name }}</option>
                                @endforeach
                            </select>
                        </div>               
                      </div>
                  </div> --}}
                  {{-- <div class="get-exam-schedule-routine-show"> --}}
                      <a href="{{ route('admin.examschedule.create') }}"
                      class="btn btn-primary btn-sm addclassbtn">
                          Add Exam Schedule
                      </a>
                      <br>
                      <table class="table" id="datatable1">
                          <thead>
                            <tr>
                              <th scope="col">Exam Title</th>
                              <th scope="col">Class Name</th>
                              <th scope="col">Subject</th>
                              <th scope="col">Section</th>
                              <th scope="col">Bulding</th>
                              <th scope="col">Floor</th>
                              <th scope="col">Room</th>
                              <th scope="col">Status</th>
                              <th scope="col">Action</th>
                            </tr>
                          </thead>
                          <tbody>

                            @foreach ($allData as $data)

                              <tr>
                                  <td>{{@$data->examination->name}}</td>
                                  <td>{{@$data->class->name}}</td>
                                  <td>{{@$data->examClass->subject->name}}</td>
                                  <td>{{@$data->schoolsection->name}}</td>
                                  <td>{{@$data->Bulding->name}}</td>
                                  <td>{{@$data->floor->name}}</td>
                                  <td>{{@$data->room->name}}</td>
                                  <td>
                                      @if(@$data->status == 0)
                                      <a href="{{ route('admin.examschedule.status',$data->id) }}" class="btn btn-sm btn-warning">Inactive</a>
                                      @elseif(@$data->status == 1)
                                      <a href="{{ route('admin.examschedule.status',$data->id) }}" class="btn btn-sm btn-success">Active</a>
                                      @endif
                                    </td>
                                  <td>
                                      <a href="{{ route('admin.examschedule.edit',$data->id) }}" class="btn btn-success"><i class="fa-solid fa-edit"></i></a>
                                      {{-- <a href="javascript:void(0)" class="btn btn-danger" value="{{$data->id}}" id="dataDeleteModal"><i class="fa-solid fa-trash"></i></a> --}}
                                      <button class="btn text-danger bg-white"  value="{{$data->id}}" id="dataDeleteModal"><i class="fa-solid fa-trash"></i></button>
                                  </td>
                              </tr>
                              @endforeach
                          </tbody>
                      </table>
                  {{-- </div> --}}
            </div>

        </div>

</div>

  
 <!--_-- ########### Start Delete Category MODAL ############---->

 <div id="datamodalshow" class="modal fade">
  <div class="modal-dialog modal-dialog-top" role="document">
  <div class="modal-content tx-size-sm">
      <div class="modal-body tx-center pd-y-20 pd-x-20">
          <form action="{{ route('admin.examschedule.delete') }}" method="post">
              @csrf
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
              <i class="icon icon ion-ios-close-outline tx-60 tx-danger lh-1 mg-t-20 d-inline-block"></i>
              <h4 class="tx-danger  tx-semibold mg-b-20 mt-2">Are you sure! you want to delete this?</h4>
               <input type="hidden" name="exam_schedule_id" id="modal_data_id">
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


{{-- @section('script')
<script>
  $(document).on('change','#examination_id',function(e){
    e.preventDefault();
    let id = $(this).val();
    console.log(id);
    $.ajax({
      type:'GET',
      url:"{{ url('get-exam-schedule-routine') }}/"+id,
      success:function(data){
        $(".get-exam-schedule-routine-show").html(data);
      }

    });
  });
</script>
@endsection --}}