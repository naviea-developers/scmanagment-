@section('title')
Admin - All Books
@endsection

@extends('Backend.layouts.layouts')

@section('main_contain')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">

        <div class="br-pagebody">
          @include('Backend.library_management.book.create')

          <div class="br-section-wrapper data-list pt-3">

              <h6 class="br-section-label text-center">All Book</h6>
            




            <div class="col-md-12 mt-5 mb-5" style="border: 1px solid; padding: 10px">
              <div class="row">
                
                <div class="col-md-4">
                  <label class=" form-control-label"><b>Class:</b></label>
                  <select class="form-control" name="class_id" id="class-filter">
                      <option value="">Select Class</option>
                      @foreach ($classes as $class)
                      <option value="{{ $class->id }}">{{ $class->name }}</option>
                      @endforeach
                  </select>
                </div>
                <div class="col-md-4">
                  <label class=" form-control-label"><b>Group:</b></label>
                  <select class="form-control" name="group_id" id="group-filter">
                      <option value="">Select Group</option>
                     
                  </select>
                </div>

                <div class="col-md-4">
                  <label class=" form-control-label"><b>Shelf:</b></label>
                  <select class="form-control" name="shelf_id" id="shelf">
                    <option value="">Select Shelf</option>
                    @foreach ($shelves as $shelf)
                    <option value="{{ $shelf->id }}">{{ $shelf->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>

            <div style="text-align: right;">
              <a style="margin-bottom: 20px" href="javascript:void(0);" class="btn btn-primary btn-sm btn-new">
                  <i class="fa fa-plus"></i> Add Direction
              </a>
          </div>



            <div class="table-wrapper">
                <table id="data_table_list" class="table display responsive nowrap">
                <thead>
                  <tr>
                    <th class="wd-10p">Id</th>
                    <th class="wd-15p">Book Name</th>
                    <th class="wd-15p">Book Code</th>
                    <th class="wd-15p">Class</th>
                    <th class="wd-15p">Group</th>
                    <th class="wd-15p">Shelf Name</th>
                    <th class="wd-15p">Total Set</th>
                    <th class="wd-15p">Stock In</th>
                    <th class="wd-15p">Stock Out</th>
                    <th class="wd-15p">Status</th>
                    <th class="wd-10p">Action</th>
                  </tr>
                </thead>
                <tbody>
                   
                </tbody>
              </table>
            </div>


          </div><!-- br-section-wrapper -->
          <div class="data-edit-res"></div>
        </div><!-- br-pagebody -->
        <footer class="br-footer">
          <div class="footer-left">
            <div class="mg-b-2">Copyright &copy; <?php echo date('Y');?> NavieaSoft. All Rights Reserved.</div>
            <div>Attentively and carefully made by NavieaSoft.</div>
          </div>
        </footer>
    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

    <!--_-- ########### Start Delete Category MODAL ############---->

    <div id="datamodalshow" class="modal fade">
      <div class="modal-dialog modal-dialog-top" role="document">
          <div class="modal-content tx-size-sm">
              <div class="modal-body tx-center pd-y-20 pd-x-20">
                  <form id="data-form-delete" action="{{ route('admin.book.delete') }}" method="post">
                      @csrf
                      <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                      <i class="icon icon ion-ios-close-outline tx-60 tx-danger lh-1 mg-t-20 d-inline-block"></i>
                      <h4 class="tx-danger  tx-semibold mg-b-20 mt-2">Are you sure! you want to delete this?</h4>
                      <input type="hidden" name="book_id" id="modal_data_id">
                      <button type="submit" class="btn-delete btn btn-danger mr-2 text-white tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium mg-b-20"> yes</button>
                      <button type="button" class="btn btn-success tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium mg-b-20" data-bs-dismiss="modal" aria-label="Close"> No</button>
                  </form>
              </div><!-- modal-body -->
          </div><!-- modal-content -->
      </div><!-- modal-dialog -->
  </div><!-- modal -->

@endsection



@section('script')

  <script>
    var datatable = $('#data_table_list').DataTable({
        "order": [[ 0, "desc" ]],
        "processing": true,
        "serverSide": true,
        "ajax":{
            "url": "{{ route('admin.book.ajax') }}",
            "dataType": "json",
            "type": "POST",
            data: function(data){
              data.class_id= $('#class-filter').val(),
              data.group_id= $('#group-filter').val(),
              data.shelf_id= $('#shelf').val(),
              data._token = "{{ csrf_token() }}";

            },
        },
        "columns": [
            { "data": "id"},
            { "data": "name"},
            { "data": "book_code"},
            { "data": "class_id"},
            { "data": "group_id"},
            { "data": "shelf_id"},
            { "data": "total_set"},
            { "data": "stock_in"},
            { "data": "stock_out"},
            { "data": "status"},
            { "data": "options"},
        ],
        "columnDefs": [ {
          "targets": 10,
          "orderable": false
          } ]

    });
    $('#class-filter, #group-filter, #shelf').change(function(){
      console.log(this);
      console.log(datatable);
      datatable.draw();
    });
    
  </script>
@endsection