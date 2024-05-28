@section('title')
Admin - All Delivery Books
@endsection
@extends('Backend.layouts.layouts')

@section('style')
<style>
  .select2-container--default .select2-selection--single {
      height: 35px;}
</style>
@endsection
@section('main_contain')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">

        <div class="br-pagebody">
          
          <div class="br-section-wrapper">

          

            <h6 class="br-section-label text-center">All Delivery</h6>

            {{-- <a style="margin-bottom: 20px" href="{{ route('admin.book.create') }}" class="btn btn-primary btn-sm float-right">
              <i class="fa fa-plus"></i> Add Book
            </a> --}}

               {{-- success message start --}}
            @if(session()->has('message'))
            <div class="alert alert-success">
            {{-- <button type="button" class="close" data-bs-dismiss="alert" aria-hidden="true"></button> --}}
            {{session()->get('message')}}
            </div>
            <script>
                setTimeout(function(){
                    $('.alert.alert-success').hide();
                }, 3000);
            </script>
            @endif
            {{-- success message End --}}




            <div class="col-md-12 mt-5 mb-5" style="border: 1px solid; padding: 10px">
              <div class="row">
          
                <div class="col-md-6">
                  <label class=" form-control-label"><b>Class :</b></label>
                  <select class="form-control class_id select2" name="class_id" id="class">
                      <option value="">Select Class</option>
                      @foreach ($classes as $class)
                      <option value="{{ $class->id }}">{{ $class->name }}</option>
                      @endforeach
                  </select>
                </div>

                <div class="col-md-6">
                  <label class=" form-control-label"><b>Student Name :</b></label>
                  <select class="form-control select2 student_id" name="student_id" id="student">
                      <option value="">Select Class</option>
                      {{-- @foreach ($students as $student)
                        <option value="{{ $student->id }}" data-class-id="{{ $student->class_id }}" data-student-id-number="{{ $student->student_id_number }}">
                          {{ $student->student_name }} - ({{ $student->class->name }} - Roll {{ $student->roll_number }})
                      </option> --}}
                      {{-- <option value="{{ $student->id }}">{{ $student->student_name }}</option> --}}
                      {{-- @endforeach --}}
                  </select>
                </div>
              </div>
            </div>





            <div class="table-wrapper">
              {{-- <table id="datatable1" class="table display responsive nowrap"> --}}
                <table id="dataTableD" class="table display responsive nowrap">
                <thead>
                  <tr>
                    <th class="wd-10p">Id</th>
                    <th class="wd-10p">Borrow Code</th>
                    <th class="wd-15p">Student ID</th>
                    <th class="wd-15p">Student Name</th>
                    <th class="wd-15p">Class</th>
                    <th class="wd-15p">Book</th>
                    <th class="wd-15p">From Date</th>
                    <th class="wd-15p">To Date</th>
                    <th class="wd-15p">Status</th>
                    {{-- <th class="wd-10p">Action</th> --}}
                  </tr>
                </thead>
                <tbody>
                    {{-- @php
                        $i = 1;
                    @endphp
                  @if (count($books) > 0)
                    @foreach ($books as $book)
                      <tr>
                          <td>{{ $i++ }}</td>
                          <td>{{ $book->name }}</td>
                          <td>{{ @$book->class->name }}</td>
                          <td>{{ @$book->group->name }}</td>
                          <td>{{ @$book->shelf->name }}</td>
                          <td>{{ @$book->total_set }}</td>
                          <td>
                            @if(@$book->status == 0)
                            <a href="{{ route('admin.book.status',$book->id) }}" class="btn btn-sm btn-warning">Inactive</a>
                            @elseif(@$book->status == 1)
                            <a href="{{ route('admin.book.status',$book->id) }}" class="btn btn-sm btn-success">Active</a>
                            @endif
                          </td>
                          <td>
                            <a class="btn text-info" href="{{ route('admin.book.edit', $book->id) }}"><i class="icon ion-compose tx-28"></i></a>
                            <button class="btn text-danger bg-white"  value="{{$book->id}}" id="dataDeleteModal"><i class="icon ion-trash-a tx-28"></i></button>
                          </td>
                      </tr> 
                    @endforeach
                  @endif --}}

                </tbody>
              </table>
            </div><!-- table-wrapper -->


          </div><!-- br-section-wrapper -->
        </div><!-- br-pagebody -->
        <footer class="br-footer">
          <div class="footer-left">
            <div class="mg-b-2">Copyright &copy; <?php echo date('Y');?> NavieaSoft. All Rights Reserved.</div>
            <div>Attentively and carefully made by NavieaSoft.</div>
          </div>
        </footer>
    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

    <!--_-- ########### Start Add Category MODAL ############---->


    <!--_-- ########### End Add Category MODAL ############---->


    <!--_-- ########### Start Delete Category MODAL ############---->

    <div id="datamodalshow" class="modal fade">
        <div class="modal-dialog modal-dialog-top" role="document">
        <div class="modal-content tx-size-sm">
            <div class="modal-body tx-center pd-y-20 pd-x-20">
                <form action="{{ route('admin.book.delete') }}" method="post">
                    @csrf
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <i class="icon icon ion-ios-close-outline tx-60 tx-danger lh-1 mg-t-20 d-inline-block"></i>
                    <h4 class="tx-danger  tx-semibold mg-b-20 mt-2">Are you sure! you want to delete this?</h4>
                     <input type="hidden" name="book_id" id="modal_data_id">
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

   
@endsection



@section('script')

  <script>
    var s_data = $('#dataTableD').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax":{
            "url": "{{ route('admin.libraryDeliveryBookByAjax') }}",
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
            { "data": "student_id_number"},
            { "data": "student_name"},
            { "data": "class_id"},
            { "data": "book"},
            { "data": "from_date"},
            { "data": "to_date"},
            { "data": "is_return"},
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