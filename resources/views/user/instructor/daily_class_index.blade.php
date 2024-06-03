@extends('user.layouts.master-layout')
@section('head')
@section('title','- Manage Daily Class')

@endsection
@section('main_content')

<div class="right_section">
    <div>
        <h3>Manage Daily Class</h3>
    </div>
</div>

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
    {{-- success message start --}}

<div style="overflow-x:auto;">
    <table class="table table-striped mt-3" style="min-width: 800px;">
        <thead >
          <tr class="" style="background-color: var(--seller_frontend_color);color:var(--seller_text_color)">
            <th scope="col">SL</th>
            <th scope="col">Class Name</th>
            <th scope="col">Subject</th>
            <th scope="col">Lesson</th>
            <th scope="col">Page</th>
            <th scope="col">Status</th>
            <th class="wd-10p">Action</th>
          </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp
            @if (count($daily_classes) > 0)
            @foreach ($daily_classes as $daily_class)
              <tr>
                  <td>{{ $i++ }}</td>
                  <td>{{ @$daily_class->class->name }}</td>
                  <td>{{ @$daily_class->subject->name }}</td>
                  <td>{{ @$daily_class->lession->name }}</td>
                  <td>{{ @$daily_class->page_number }}</td>
                  <td>
                    @if(@$daily_class->status == 0)
                    <a href="{{ route('instructor.daily_class.status',$daily_class->id) }}" class="btn btn-sm btn-warning">Inactive</a>
                    @elseif(@$daily_class->status == 1)
                    <a href="{{ route('instructor.daily_class.status',@$daily_class->id) }}" class="btn btn-sm btn-success">Active</a>
                    @endif
                  </td>
                  <td>
                    <a href="{{ route('instructor.daily_class.edit', @$daily_class->id ) }}"><i class="fa-duotone fa fa-edit"></i></a>
                    &nbsp;
                    {{-- <a href="{{ url('course/view/'.$course->slug) }}"><i class="fa-duotone fa fa-eye"></i></a> --}}
                    &nbsp;
                    <button class="btn text-danger delete-button" courseId="{{ @$daily_class->id }}"><i class="icon fa fa-trash tx-28"></i></button>

                    {{-- <a class="btn text-info" href="{{ route('admin.daily_class.edit', $daily_class->id) }}"><i class="icon ion-compose tx-28"></i></a>
                    <button class="btn text-danger bg-white"  value="{{$daily_class->id}}" id="dataDeleteModal"><i class="icon ion-trash-a tx-28"></i></button> --}}
                  </td>
              </tr>
              <!--_-- ########### Start Delete Category MODAL ############---->
              <div id="delete-modal"  class="modal">
                  <div class="modal-dialog modal-dialog-top" role="document">
                  <div class="modal-content tx-size-sm">
                      <div class="modal-body tx-center pd-y-20 pd-x-20">
                          <form action="{{ route('instructor.daily_class.delete') }}" method="post">
                              @csrf
                              {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button> --}}
                              {{-- <i class="icon icon ion-ios-close-outline tx-60 tx-danger lh-1 mg-t-20 d-inline-block"></i> --}}
                              <h4 class="tx-semibold mg-b-20 mt-2 " >Are you sure! you want to delete this?</h4>
                              <input type="hidden" value="{{ @$daily_class->id }}" name="daily_class_id" id="course_id">
                              <button type="submit"  class="btn btn-danger mr-2 text-white tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium mg-b-20" id="confirm-yes">
                                  yes
                              </button>
                              <button type="button"  class="btn btn-success tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium mg-b-20" id="confirm-no">
                                  No
                              </button>
                          </form>
                      </div><!-- modal-body -->
                  </div><!-- modal-content -->
                  </div><!-- modal-dialog -->
              </div><!-- modal -->
              <!--_-- ########### Start Delete Category MODAL ############---->
            @endforeach
            @endif
        </tbody>

    </table>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="script.js"></script>
<script>
$(document).ready(function() {
$(".delete-button").click(function() {
    $("#delete-modal").show();
    $("#course_id").val($(this).attr('courseId'))

});
$("#confirm-no").click(function() {
    $("#delete-modal").hide();
});
$("#confirm-yes").click(function() {
    $("#delete-modal").hide();
});
});

</script>


@endsection
