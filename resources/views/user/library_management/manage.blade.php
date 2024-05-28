@extends('user.layouts.master-layout')
@section('head')
@section('title','- Manage Borrow Books')

@endsection
@section('main_content')

<div class="right_section">
    <div>
        <h3 style="color: black">Manage Borrow Books</h3>
    </div>
</div>


<div style="overflow-x:auto;">
    <table class="table table-striped mt-3" style="min-width: 800px;">
        <thead >
        <tr class="" style="background-color: var(--seller_frontend_color);color:var(--seller_text_color)">
            <th scope="col">SL</th>
            <th scope="col">Book Name</th>
            <th scope="col">Student ID</th>
            <th scope="col">Student</th>
            <th scope="col">Date</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp
            @if (count($borrows) > 0)
            @foreach ($borrows as $borrow)

            <tr>
            <td>{{ $i++ }}</td>
            <td>
                @foreach ($borrow->borrowItems as $borrowItem)
                <ul>
                    <li>
                        {{ @$borrowItem->book->book_code }}-{{ @$borrowItem->book->name }}
                    </li>
                </ul>
                @endforeach
            </td>
            <td>{{ @$borrow->student->student_id_number }}</td>
            <td>{{ @$borrow->student->student_name }}</td>
            <td>{{ \Carbon\Carbon::parse($borrow->form_date)->format('j M Y') }} - {{ \Carbon\Carbon::parse($borrow->to_date)->format('j M Y') }}</td>

            <td>
                <a href="{{ route('instructor.edit_course', $borrow->id ) }}"><i class="fa-duotone fa fa-edit"></i></a>
                &nbsp;
                {{-- <a href="{{ url('course/view/'.$course->slug) }}"><i class="fa-duotone fa fa-eye"></i></a> --}}
                &nbsp;
                <button class="btn text-danger delete-button" courseId="{{ $borrow->id }}"><i class="icon fa fa-trash tx-28"></i></button>



            <!--_-- ########### Start Delete Category MODAL ############---->

            <div id="delete-modal"  class="modal">
                <div class="modal-dialog modal-dialog-top" role="document">
                <div class="modal-content tx-size-sm">
                    <div class="modal-body tx-center pd-y-20 pd-x-20">
                        <form action="{{ route('teacher.library_borrow.delete') }}" method="post">
                            @csrf
                            <h4 class="tx-semibold mg-b-20 mt-2 " >Are you sure! you want to delete this?</h4>
                            <input type="hidden" value="{{ $borrow->id }}" name="borrow_id" id="course_id">
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
