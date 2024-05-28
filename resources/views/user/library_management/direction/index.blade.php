@extends('user.layouts.master-layout')
@section('head')
@section('title','- Direction')

@endsection
@section('main_content')
<div class="d-flex justify-content-between align-items-center">
    <h3 style="color: black">Direction</h3>
    <div>
        <a href="{{ route('teacher.library') }}" class="btn btn-info"><i class="fa-solid fa-backward"></i> Library</a>
        <a href="{{ route('teacher.library_shelf_direction.create') }}" class="btn btn-info"><i class="fa fa-plus"></i> Add Direction</a>
    </div>
</div>



<div style="overflow-x:auto;">
    <table class="table table-striped mt-3" id="datatable1" style="min-width: 800px;">
        <thead >
        <tr class="" style="background-color: var(--seller_frontend_color);color:var(--seller_text_color)">
            <th scope="col">SL</th>
            <th scope="col">Direction Name</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp
            @if (count($directions) > 0)
            @foreach ($directions as $direction)

            <tr>
            <td>{{ $i++ }}</td>
            <td>{{ @$direction->name }}</td>
            
            <td>
                
                <a href="{{ route('teacher.library_shelf_direction.edit', $direction->id ) }}"><i class="fa-duotone fa fa-edit"></i></a>
                &nbsp;
                <button class="btn text-danger delete-button" courseId="{{ $direction->id }}"><i class="icon fa fa-trash tx-28"></i></button>
               
            <!--_-- ########### Start Delete Category MODAL ############---->

            <div id="delete-modal"  class="modal">
                <div class="modal-dialog modal-dialog-top" role="document">
                <div class="modal-content tx-size-sm">
                    <div class="modal-body tx-center pd-y-20 pd-x-20">
                        <form action="{{ route('teacher.library_shelf_direction.delete') }}" method="post">
                            @csrf
                            <h4 class="tx-semibold mg-b-20 mt-2 " >Are you sure! you want to delete this?</h4>
                            <input type="hidden" value="{{ $direction->id }}" name="direction_id" id="course_id">
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
