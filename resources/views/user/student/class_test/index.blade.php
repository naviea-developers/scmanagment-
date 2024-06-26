@extends('user.layouts.master-layout')
@section('head')
@section('title','- class teat')@endsection
@section('main_content')

<div class="right_section">
    <div><h3>Class Test</h3></div>
</div>

<div style="overflow-x:auto;">
    <table class="table table-striped mt-3" style="min-width: 800px;">
        <thead>
            <tr class="" style="background-color: var(--seller_frontend_color);color:var(--seller_text_color)">
                <th scope="col">SL</th>
                <th scope="col">Title</th>
                <th scope="col">Subject Name</th>
                <th scope="col">Class Test Date</th>
                <th scope="col">Class Test Duration</th>
                <th scope="col">Lession</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp
            @if (count($class_tests) > 0)
                @foreach ($class_tests as $class_test)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{  @$class_test->name }}</td>
                        {{-- <td>{{  @$home_work->session->start_year }} - {{  @$home_work->session->end_year }}</td> --}}
                        <td>{{  @$class_test->subject->name }}</td>
                        <td>{{  date('d,F,Y',strtotime(@$class_test->date)) }}</td>
                        <td>{{  date('h:i:A',strtotime(@$class_test->class_test_duration))  }}</td>
                        <td>{{  @$class_test->lession->name }}</td>
                        {{-- <td>{{  substr($home_work->details, 0, 40) }}</td> --}}
                        <td>
                            <a href="{{ route('student.class_exam.details', $class_test->id ) }}"><i class="fa-duotone fa fa-eye"></i></a>
                            &nbsp;
                            {{-- <button class="btn text-danger delete-button" courseId="{{ $home_work->id }}"><i class="icon fa fa-trash tx-28"></i></button> --}}
                        </td>
                    </tr>
                    {{-- <!--_-- ########### Start Delete Category MODAL ############---->
                    <div id="delete-modal"  class="modal">
                        <div class="modal-dialog modal-dialog-top" role="document">
                        <div class="modal-content tx-size-sm">
                            <div class="modal-body tx-center pd-y-20 pd-x-20">
                                <form action="{{ route('instructor.homework.delete') }}" method="post">
                                    @csrf                                
                                    <h4 class="tx-semibold mg-b-20 mt-2 " >Are you sure! you want to delete this?</h4>
                                    <input type="hidden" value="{{ $class_test->id }}" name="homework_id" id="course_id">
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
                    <!--_-- ########### Start Delete Category MODAL ############----> --}}
                    
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




