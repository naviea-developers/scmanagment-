@extends('user.layouts.master-layout')
@section('head')
@section('title','- Manage Homework')

@endsection
@section('main_content')

<div class="right_section">
    <div>
        <h3>Manage Home Work</h3>
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
            <th scope="col">Title</th>
            <th scope="col">Session</th>
            <th scope="col">Date</th>
            <th scope="col">Class</th>
            <th scope="col">Subject</th>
            <th scope="col">Lession</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp
            @if (count($home_works) > 0)
            @foreach ($home_works as $home_work)

            <tr>
            <td>{{ $i++ }}</td>
            <td>{{  @$home_work->name }}</td>
            <td>{{  @$home_work->session->start_year }} - {{  @$home_work->session->end_year }}</td>
            <td>{{date('d,F,Y',strtotime(@$home_work->created_at))}}</td>
            <td>{{  @$home_work->class->name }}</td>
            <td>{{  @$home_work->subject->name }}</td>
            <td>{{  @$home_work->lession->name }}</td>
            <td>
                @if(@$home_work->status == 0)
                <a href="{{ route('instructor.homework.status',$home_work->id) }}" class="btn btn-sm btn-warning">Inactive</a>
                @elseif(@$home_work->status == 1)
                <a href="{{ route('instructor.homework.status',@$home_work->id) }}" class="btn btn-sm btn-success">Active</a>
                @endif
            </td>
            <td>
                <a href="{{ route('student.homework.details', $home_work->id ) }}"><i class="fa-duotone fa fa-eye"></i></a>
                &nbsp;
                &nbsp;
                <a href="{{ route('instructor.homework.edit', $home_work->id ) }}"><i class="fa-duotone fa fa-edit"></i></a>
                {{-- <a href="{{ url('course/view/'.$course->slug) }}"><i class="fa-duotone fa fa-eye"></i></a> --}}
                &nbsp;
                <button class="btn text-danger delete-button" courseId="{{ $home_work->id }}"><i class="icon fa fa-trash tx-28"></i></button>
            </td>
            </tr>


            <!--_-- ########### Start Delete Category MODAL ############---->

            <div id="delete-modal"  class="modal">
                <div class="modal-dialog modal-dialog-top" role="document">
                <div class="modal-content tx-size-sm">
                    <div class="modal-body tx-center pd-y-20 pd-x-20">
                        <form action="{{ route('instructor.homework.delete') }}" method="post">
                            @csrf
                            {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button> --}}
                            {{-- <i class="icon icon ion-ios-close-outline tx-60 tx-danger lh-1 mg-t-20 d-inline-block"></i> --}}
                            <h4 class="tx-semibold mg-b-20 mt-2 " >Are you sure! you want to delete this?</h4>
                            <input type="hidden" value="{{ $home_work->id }}" name="homework_id" id="course_id">
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
