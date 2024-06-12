@section('title')
Admin - All fees
@endsection

@extends('Backend.layouts.layouts')

@section('main_contain')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">

        <div class="br-pagebody">
          @include('Backend.school_management.fee_management.create')

          <div class="br-section-wrapper data-list pt-3">

              <h6 class="br-section-label text-center">Fees Management</h6>
              <div style="text-align: right;">
                  <a style="margin-bottom: 20px" href="javascript:void(0);" class="btn btn-primary btn-sm btn-new">
                      <i class="fa fa-plus"></i> Add Fee
                  </a>
              </div>
              

            <div class="table-wrapper">
              <table id="data_table_list" class="table display responsive nowrap">
                <thead>
                  <tr>
                    <th class="wd-10p">Id</th>
                    <th class="wd-15p">Class</th>
                    <th class="wd-15p">Session</th>
                    <th class="wd-15p">Fee Name</th>
                    <th class="wd-15p">Fee Amount</th>
                    <th class="wd-15p">Status</th>
                    <th class="wd-10p">Action</th>
                  </tr>
                </thead>
                <tbody>
                    {{-- @php
                        $i = 1;
                    @endphp
                  @if (count($fee_managements) > 0)
                    @foreach ($fee_managements as $fee_management)
                      <tr>
                          <td>{{ $i++ }}</td>
                          <td>{{ @$fee_management->class->name }}</td>
                          <td>{{ @$fee_management->session->start_year }} - {{ @$fee_management->session->end_year }}</td>
                          <td>{{ @$fee_management->fee->particular_name }}</td>
                          <td>{{ @$fee_management->fee_amount }}</td>
                          <td>
                            @if(@$fee_management->status == 0)
                            <a href="{{ route('admin.fee_management.status',$fee_management->id) }}" class="btn btn-sm btn-warning">Inactive</a>
                            @elseif(@$fee_management->status == 1)
                            <a href="{{ route('admin.fee_management.status',$fee_management->id) }}" class="btn btn-sm btn-success">Active</a>
                            @endif
                          </td>
                          <td>
                            @if ($fee_management->fee->is_constant == 1 || $fee_management->fee->is_constant == 2)
                            <a class="btn text-info" href="{{ route('admin.fee_management.edit', $fee_management->id) }}"><i class="icon ion-compose tx-28"></i></a>
                            @elseif ($fee_management->fee->is_constant == 0)
                            <a class="btn text-info" href="{{ route('admin.fee_management.edit', $fee_management->id) }}"><i class="icon ion-compose tx-28"></i></a>
                            <button class="btn text-danger bg-white"  value="{{$fee_management->id}}" id="dataDeleteModal"><i class="icon ion-trash-a tx-28"></i></button>
                            @endif
                          </td>
                      </tr> 
                    @endforeach
                  @endif --}}

                </tbody>
              </table>
            </div><!-- table-wrapper -->


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
                  <form id="data-form-delete" action="{{ route('admin.fee_management.delete') }}" method="post">
                      @csrf
                      <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                      <i class="icon icon ion-ios-close-outline tx-60 tx-danger lh-1 mg-t-20 d-inline-block"></i>
                      <h4 class="tx-danger  tx-semibold mg-b-20 mt-2">Are you sure! you want to delete this?</h4>
                      <input type="hidden" name="fee_management_id" id="modal_data_id">
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
       // 'pageLength': 2,
       "order": [[ 0, "desc" ]],
        "processing": true,
        "serverSide": true,
        "ajax":{
            "url": "{{ route('admin.fee_management.ajax') }}",
            "dataType": "json",
            "type": "POST",
            data: function(data){
              data._token = "{{ csrf_token() }}";
            },
        },
        "columns": [
            { "data": "id"},
            { "data": "class_id"},
            { "data": "session_id"},
            { "data": "fee_id"},
            { "data": "fee_amount"},
            { "data": "status"},
            { "data": "options"},
        ],
        "columnDefs": [ {
          "targets": 6,
          "orderable": false
          } ]

    });
</script>

@endsection
