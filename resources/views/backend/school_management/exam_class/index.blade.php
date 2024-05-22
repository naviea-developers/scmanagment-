@extends('Backend.layouts.layouts')

@section('title','All Exam Subject')
{{-- <link rel="stylesheet" href="{{ URL::asset('css/custom/eduStc.css') }}"> --}}
<link rel="stylesheet" href="{{ asset('public') }}/css/custom/eduStc.css">

@section('main_contain')

<div class="br-mainpanel">

        <div class="p-2">

            <div class="br-section-wrapper">

                <div class="br-pagetitle">
                    <i class="fa-duotone fa-chalkboard-user"></i>
                    <div>
                      <h4>View All Exam Subject</h4>
                      <p class="mg-b-0">Manage all Exam Subject</p>
                    </div>
                  </div>

                    <a href="{{ route('admin.examclass.create') }}"
                    class="btn btn-primary btn-sm addclassbtn">
                        Add Exam Subject
                    </a>
                    <br>
                <table class="table" id="datatable1">
                    <thead>
                      <tr>
                        <th scope="col">Exam Title</th>
                        <th scope="col">Class Name</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Exam Type</th>
                        <th scope="col">Date</th>
                        <th scope="col">Time</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>

                      @foreach ($allData as $data)

                        <tr>
                            <td>{{@$data->examination->name}}</td>
                            <td>{{@$data->class->name}}</td>
                            <td>{{@$data->subject->name}}</td>
                            <td>{{@$data->examtype->name}}</td>
                            <td>{{date('d,F,Y',strtotime(@$data->date))}}</td>
                            <td>{{ date('h:i A', strtotime($data->start_time)) }} - {{ date('h:i A', strtotime($data->end_time)) }}</td>
                            <td>
                                <a href="{{ route('admin.examclass.edit',$data->id) }}" class="btn btn-success"><i class="fa-solid fa-edit"></i></a>
                                {{-- <a href="javascript:void(0)" class="btn btn-danger" value="{{$data->id}}" id="dataDeleteModal"><i class="fa-solid fa-trash"></i></a> --}}
                                <button class="btn text-danger bg-white"  value="{{$data->id}}" id="dataDeleteModal"><i class="fa-solid fa-trash"></i></button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>

        </div>

</div>

  
 <!--_-- ########### Start Delete Category MODAL ############---->

 <div id="datamodalshow" class="modal fade">
  <div class="modal-dialog modal-dialog-top" role="document">
  <div class="modal-content tx-size-sm">
      <div class="modal-body tx-center pd-y-20 pd-x-20">
          <form action="{{ route('admin.examclass.delete') }}" method="post">
              @csrf
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
              <i class="icon icon ion-ios-close-outline tx-60 tx-danger lh-1 mg-t-20 d-inline-block"></i>
              <h4 class="tx-danger  tx-semibold mg-b-20 mt-2">Are you sure! you want to delete this?</h4>
               <input type="hidden" name="exam_class_id" id="modal_data_id">
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
