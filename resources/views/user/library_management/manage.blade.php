@extends('user.layouts.master-layout')
@section('head')
@section('title','- Manage Borrow Books')
<link href="{{asset('public/backend')}}/lib/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="{{asset('public/backend')}}/lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet">
@endsection

@section('main_content')

<div class="">
    <div>
        <h3 style="color: black">Manage Borrow Books</h3>
    </div>
</div>



{{-- 
<div class="col-md-12 mt-5 mb-5" style="border: 1px solid; padding: 10px">
    <div class="row">

      <div class="col-md-6">
        <label class=" form-control-label"><b>Class :</b></label>
        <select class="form-control class_id" name="class_id" id="class">
            <option value="">Select Class</option>
            @foreach ($classes as $class)
            <option value="{{ $class->id }}">{{ $class->name }}</option>
            @endforeach
        </select>
      </div>

      <div class="col-md-6">
        <label class=" form-control-label"><b>Student Name :</b></label>
        <select class="form-control student_id" name="student_id" id="student">
            <option value="">Select Class</option>
         
        </select>
      </div>
    </div>
  </div> --}}




<div style="overflow-x:auto;">
    <table class="table display responsive nowrap" id="dataTableE" style="min-width: 800px;">
        <thead >
        <tr class="" style="background-color: var(--seller_frontend_color);color:var(--seller_text_color)">
            <th scope="col">SL</th>
            <th scope="col">Borrow ID</th>
            <th scope="col">Book Name</th>
            <th scope="col">Student ID</th>
            <th scope="col">Student</th>
            <th scope="col">From Date</th>
            <th scope="col">To Date</th>
            <th scope="col">Return</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
            {{-- @php
                $i = 1;
            @endphp
            @if (count($borrows) > 0)
            @foreach ($borrows as $borrow)

            <tr>
            <td>{{ $i++ }}</td>
            <td>{{ @$borrow->borrow_id_number }}</td>
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
                @if($borrow->is_return == 0)
                <form method="POST" action="{{ route('teacher.library_borrow.return') }}">
                    @csrf
                    <input type="hidden" name="borrow_id" value="{{ $borrow->id }}">
                    <button type="submit" class="btn btn-info">Return</button>
                </form>
                @else
                    <p>Returned</p>
                @endif
            </td>
            <td>
                @if($borrow->is_return == 0)
                <a href="{{ route('teacher.library_borrow.edit', $borrow->id ) }}"><i class="fa-duotone fa fa-edit"></i></a>
                &nbsp;
                &nbsp;
                <button class="btn text-danger delete-button" courseId="{{ $borrow->id }}"><i class="icon fa fa-trash tx-28"></i></button>
                @else
                <button class="btn text-danger delete-button" courseId="{{ $borrow->id }}"><i class="icon fa fa-trash tx-28"></i></button>
                @endif



            @endforeach
            @endif --}}
        </tbody>
  </table>




            <div id="delete-modal" class="modal">
                <div class="modal-dialog modal-dialog-top" role="document">
                    <div class="modal-content tx-size-sm">
                        <div class="modal-body tx-center pd-y-20 pd-x-20">
                            <form action="{{ route('teacher.library_borrow.delete') }}" method="post">
                                @csrf
                                <h4 class="tx-semibold mg-b-20 mt-2">Are you sure you want to delete this?</h4>
                                <input type="hidden" name="borrow_id" id="borrow_id">
                                <button type="submit" class="btn btn-danger mr-2 text-white tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium mg-b-20" id="confirm-yes">
                                    Yes
                                </button>
                                <button type="button" class="btn btn-success tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium mg-b-20" id="confirm-no">
                                    No
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!--_-- ########### Start Delete Category MODAL ############---->


</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="script.js"></script>



<script>
    $(document).ready(function () {
        $(document).on("click", ".del_data", function () {
            var id = $(this).data("id");
            $("#borrow_id").val(id);
            $("#delete-modal").modal("show");
        });
    });
</script>


@endsection



@section('script')

<script src="{{asset('public/backend')}}/lib/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{asset('public/backend')}}/lib/datatables.net-dt/js/dataTables.dataTables.min.js"></script>
<script src="{{asset('public/backend')}}/lib/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{asset('public/backend')}}/lib/datatables.net-responsive-dt/js/responsive.dataTables.min.js"></script>


  <script>
    var s_data = $('#dataTableE').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax":{
            "url": "{{ route('teacher.getBorrowBook') }}",
            "dataType": "json",
            "type": "POST",
            data: function(data){
              data.class_id= $('.class_id').val(),
              data.student_id= $('.student_id').val(),
              data._token = "{{ csrf_token() }}";

            },
        },
        "columns": [
            { "data": "id"},
            { "data": "borrow_id_number"},
            { "data": "book"},
            { "data": "student_id_number"},
            { "data": "student_id"},
            { "data": "from_date"},
            { "data": "to_date"},
            { "data": "is_return"},
            { "data": "options"},
        ],
        "columnDefs": [ {
          "targets": 8,
          "orderable": false
          } ]

    });
    $('.class_id, .student_id').change(function(){
      console.log(this);
      console.log(s_data);
      s_data.draw();
    });
    
  </script>
@endsection