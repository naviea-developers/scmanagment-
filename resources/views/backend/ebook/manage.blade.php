@section('title')
Admin - All Ebook
@endsection

@extends('Backend.layouts.layouts')

@section('main_contain')
<style>
    .select2-container--default .select2-selection--single {
      height: 41px;
      width: 185px;
  }
  </style>
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">

        <div class="br-pagebody">
          @include('Backend.ebook.create')

          <div class="br-section-wrapper data-list pt-3">

              <h6 class="br-section-label text-center">All E-Book</h6>
              <div style="text-align: right;">
                  <a style="margin-bottom: 20px" href="javascript:void(0);" class="btn btn-primary btn-sm btn-new">
                      <i class="fa fa-plus"></i> Add E-Book
                  </a>
              </div>

            <div class="table-wrapper">
              <table id="data_table_list" class="table display responsive nowrap">
                <thead>
                  <tr>
                    <th scope="col">SL</th>
                    <th scope="col">Image</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Price</th>
                    <th scope="col">Discount</th>
                    <th scope="col">Status</th>
                    <th class="wd-10p">Action</th>
                  </tr>
                </thead>
                <tbody>
                    {{-- @php
                        $i = 1;
                    @endphp
                  @if (count($ebooks) > 0)
                    @foreach ($ebooks as $ebook)
                      <tr>
                          <td>{{ $i++ }}</td>
                          <td>{{ $ebook->title }}</td>
                          <td>{{ $ebook->fee }}</td>
                          <td>{{ $ebook->discount }}</td>
                          <td>
                            @if($ebook->status == 0)
                            <a href="{{ route('admin.ebook.status',$ebook->id) }}" class="btn btn-sm btn-warning">Inactive</a>
                            @elseif($ebook->status == 1)
                            <a href="{{ route('admin.ebook.status',$ebook->id) }}" class="btn btn-sm btn-success">Active</a>
                            @endif
                          </td>
                          <td>
                            <a class="btn text-info" href="{{ route('admin.ebook.edit', $ebook->id) }}"><i class="icon ion-compose tx-28"></i></a>
                            <button class="btn text-danger bg-white"  value="{{$ebook->id}}" id="dataDeleteModal"><i class="icon ion-trash-a tx-28"></i></button>
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
                  <form id="data-form-delete" action="{{ route('admin.ebook.delete') }}" method="post">
                      @csrf
                      <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                      <i class="icon icon ion-ios-close-outline tx-60 tx-danger lh-1 mg-t-20 d-inline-block"></i>
                      <h4 class="tx-danger  tx-semibold mg-b-20 mt-2">Are you sure! you want to delete this?</h4>
                      <input type="hidden" name="ebook_id" id="modal_data_id">
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
            "url": "{{ route('admin.ebook.ajax') }}",
            "dataType": "json",
            "type": "POST",
            data: function(data){
              data._token = "{{ csrf_token() }}";
            },
        },
        "columns": [
            { "data": "id"},
            { "data": "image"},
            { "data": "title"},
            { "data": "fee"},
            { "data": "discount"},
            { "data": "status"},
            { "data": "options"},
        ],
        "columnDefs": [ {
          "targets": 6,
          "orderable": false
          } ]

    });
</script>


<script>
  $(document).ready(function() {
      $('.multipleSelect2Search').select2();
  });
  $(document).ready(function() {
      $('.multipleSelectSearch').select2();
  });
</script>

<script>
  $(document).ready(function() {
      $('.multipleSelect2Search-edit').select2();
  });
  $(document).ready(function() {
      $('.multipleSelectSearch-edit').select2();
  });
</script>

<script>

  //Audio Contents start
  $(document).ready(function() {
          $(document).on('click','#plus-btn-data-content',function(){



              var myvar = '<div class="d-flex align-items-center mt-2 row">'+
  '                                            <div class="col-md-5">'+
  '                                                <label class="form-control-label"><b>Audio Name:</b></label>'+
  '                                                <div class="d-flex  align-items-center select-add-section " >'+
  '                                                    <input type="text" name="audio_name[]" value="{{ old('$audio_name') }}" class=" form-control" placeholder="Audio Content Name">'+
  '                                                </div>'+
  '                                            </div>'+
  '                                            <div class="col-md-4">'+
  '                                                <label class="form-control-label"><b>Audio File:</b></label>'+
  '                                                <div class="d-flex  align-items-center select-add-section">'+
  '                                                    <input type="file"  accept="audio/*" name="audio_file[]" value="{{ old('$audio_file') }}" class=" form-control">'+
  '                                                </div>'+
  '                                            </div>'+
  '                                            <div class="col-md-2">'+
  '                                                <label class="form-control-label"><b>Is Free:</b></label>'+
  '                                                <div class="d-flex  align-items-center select-add-section" style="width: 50%;">'+
  '                                                    <input type="checkbox" name="is_free_audio[]" value="1" class=" " >'+
  '                                                </div>'+
  '                                            </div>'+
  '                                            <a href="javascript:void(0)" class="minus-btn-data-content px-1 p-0 m-0 ml-2"><i class="fas fa-minus-circle"></i></a>'+
  '                                        </div>';


  $('.add-data-content').prepend(myvar);
              //console.log();
          });

          $(document).on('click','.minus-btn-data-content',function(){
              $(this).parent().remove();
          });


      });
      $(document).on('click','.minus-btn-data-old-audio',function(){
          console.log(this);
           $(this).parent().parent().append('<input type="hidden" name="delete_audio_file[]" value="'+$(this).attr('audio_file_id')+'">');
          $(this).parent().remove();
      });

  //Audio Contents end
  </script>




  <script>

      //Video Contents start
      $(document).ready(function() {
              $(document).on('click','#plus-btn-data-content-video',function(){



                  var myvar = '<div class="d-flex align-items-center mt-2 row">'+
      '                                            <div class="col-md-5">'+
      '                                                <label class="form-control-label"><b>Video Name:</b></label>'+
      '                                                <div class="d-flex  align-items-center select-add-section " >'+
      '                                                    <input type="text" name="video_name[]" value="{{ old('$video_name') }}" class=" form-control" placeholder="Video Content Name">'+
      '                                                </div>'+
      '                                            </div>'+
      '                                            <div class="col-md-4">'+
      '                                                <label class="form-control-label"><b>Video File:</b></label>'+
      '                                                <div class="d-flex  align-items-center select-add-section">'+
      '                                                    <input type="file" accept="video/*" name="video_file[]" value="{{ old('$video_file') }}" class=" form-control">'+
      '                                                </div>'+
      '                                            </div>'+
      '                                            <div class="col-md-2">'+
      '                                                <label class="form-control-label"><b>Is Free:</b></label>'+
      '                                                <div class="d-flex  align-items-center select-add-section" style="width: 50%;">'+
      '                                                    <input type="checkbox" name="is_free_video[]" value="1" class=" " >'+
      '                                                </div>'+
      '                                            </div>'+
      '                                            <a href="javascript:void(0)" class="minus-btn-data-content-video px-1 p-0 m-0 ml-2"><i class="fas fa-minus-circle"></i></a>'+
      '                                        </div>';


      $('.add-data-content-video').prepend(myvar);
                  //console.log();
              });

              $(document).on('click','.minus-btn-data-content-video',function(){
                  $(this).parent().remove();
              });


          });

          $(document).on('click','.minus-btn-data-old-video',function(){
          console.log(this);
           $(this).parent().parent().append('<input type="hidden" name="delete_video_file[]" value="'+$(this).attr('video_file_id')+'">');
          $(this).parent().remove();
      });

      //Video Contents end
      </script>




@endsection
