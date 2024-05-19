@extends('user.layouts.master-layout')
@section('head')
@section('title','- Homework')

@endsection
@section('main_content')

<div class="right_section">
    <div>
        <h3>Home Work</h3>
    </div>
</div>


<div style="overflow-x:auto;">
    <table class="table table-striped mt-3" style="min-width: 800px;">
        <thead >
        <tr class="" style="background-color: var(--seller_frontend_color);color:var(--seller_text_color)">
            <th scope="col">SL</th>
            <th scope="col">Session</th>
            <th scope="col">Class</th>
            <th scope="col">Subject</th>
            <th scope="col">Image/PDF</th>
            <th scope="col">Details</th>
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
            <td>{{  @$home_work->session->start_year->year }} - {{  @$home_work->session->end_year->year }}</td>
            <td>{{  @$home_work->class->name }}</td>
            <td>{{  @$home_work->subject->name }}</td>
            <td>
                @php
                $file = $home_work->image_show; // assuming $details->file contains the file path
                $fileExtension = pathinfo($file, PATHINFO_EXTENSION);
                @endphp
                
                @if(in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif', 'webp']))
                    <img src="{{ asset($file) }}" alt="description" width="60px" height="40px"/>
                @elseif($fileExtension == 'pdf')
                <img src="{{ asset('public/frontend/images/pdf.jpg') }}" alt="description" width="60px" height="40px"/>
                @endif
            </td>
            <td>{{  substr($home_work->details, 0, 40) }}</td>
            <td>
                <a href="{{ route('student.homework.details', $home_work->id ) }}"><i class="fa-duotone fa fa-eye"></i></a>
                &nbsp;
                {{-- <button class="btn text-danger delete-button" courseId="{{ $home_work->id }}"><i class="icon fa fa-trash tx-28"></i></button> --}}
            </td>
            </tr>


            <!--_-- ########### Start Delete Category MODAL ############---->

            <div id="delete-modal"  class="modal">
                <div class="modal-dialog modal-dialog-top" role="document">
                <div class="modal-content tx-size-sm">
                    <div class="modal-body tx-center pd-y-20 pd-x-20">
                        <form action="{{ route('instructor.homework.delete') }}" method="post">
                            @csrf
                           
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
