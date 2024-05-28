@extends('user.layouts.master-layout')
@section('head')
@section('title','- Library')

@endsection
@section('main_content')

<div class="d-flex justify-content-between align-items-center">
    <h3 style="color: black">Library</h3>
    <div>
        <a href="{{ route('teacher.library_shelf_direction.index') }}" class="btn btn-info"><i class="fa-solid fa-bars-progress"></i> Direction</a>
        <a href="{{ route('teacher.library_shelf.index') }}" class="btn btn-info"><i class="fa-solid fa-bars-progress"></i> Shelf</a>
        <a href="{{ route('teacher.library_book.create') }}" class="btn btn-info"><i class="fa fa-plus"></i> Add Book</a>
    </div>
</div>





<div style="overflow-x:auto;">
    <table class="table table-striped mt-3" id="datatable1" style="min-width: 800px;">
        <thead >
        <tr class="" style="background-color: var(--seller_frontend_color);color:var(--seller_text_color)">
            <th scope="col">SL</th>
            <th scope="col">Book ID</th>
            <th scope="col">Book Name</th>
            <th scope="col">Class</th>
            <th scope="col">Total Book</th>
            <th scope="col">Stock In</th>
            <th scope="col">Stock Out</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp
            @if (count($books) > 0)
            @foreach ($books as $book)
                @php
                    $stock_in =@$book->total_set - @$book->stock_out;
                @endphp
            <tr>
            <td>{{ $i++ }}</td>
            <td>{{ @$book->book_code }}</td>
            <td>{{ @$book->name }}</td>
            <td>{{ @$book->class->name }}</td>
            <td>{{ @$book->total_set }}</td>
            <td>{{ @$stock_in }}</td>
            <td>{{ @$book->stock_out }}</td>
            
            <td>
                
                <a href="{{ route('teacher.library_book.edit', $book->id ) }}"><i class="fa-duotone fa fa-edit"></i></a>
                &nbsp;
                <button class="btn text-danger delete-button" courseId="{{ $book->id }}"><i class="icon fa fa-trash tx-28"></i></button>
               
            <!--_-- ########### Start Delete Category MODAL ############---->

            <div id="delete-modal"  class="modal">
                <div class="modal-dialog modal-dialog-top" role="document">
                <div class="modal-content tx-size-sm">
                    <div class="modal-body tx-center pd-y-20 pd-x-20">
                        <form action="{{ route('teacher.library_book.delete') }}" method="post">
                            @csrf
                            <h4 class="tx-semibold mg-b-20 mt-2 " >Are you sure! you want to delete this?</h4>
                            <input type="hidden" value="{{ $book->id }}" name="book_id" id="course_id">
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

