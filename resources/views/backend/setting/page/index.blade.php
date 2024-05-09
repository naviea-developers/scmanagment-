@section('title')
Admin - Manage Page
@endsection

@extends('Backend.layouts.layouts')

@section('main_contain')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">

        <div class="br-pagebody">
          <div class="br-section-wrapper">
            <h6 class="br-section-label text-center"> All Pages</h6>
            {{-- success message start --}}
            @if(session()->has('message'))
            <div class="alert alert-success">
            <button type="button" class="close" data-bs-dismiss="alert" aria-hidden="true"></button>
            {{session()->get('message')}}
            </div>
            <script>
                setTimeout(function(){
                    $('.alert.alert-success').hide();
                }, 3000);
            </script>
            @endif
             {{-- success message start --}}
            <div class="mb-3 d-flex justify-content-end">
                <!-- Button trigger modal -->
                {{-- <a href="" class="btn btn-info tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" data-toggle="modal" data-target="#homeAddcategory"> <i class="fa fa-plus ml-0 mr-1"></i>Add New </a> --}}
            </div>

            <div class="table-wrapper">
              <table id="datatable1" class="table display responsive nowrap">
                <thead>
                  <tr>
                    <th class="wd-25p">Id</th>
                    {{-- <th class="wd-25p">Category</th> --}}
                    <th class="wd-25p">Template</th>
                    <th class="wd-25p">Title</th>
                    {{-- <th class="wd-25p">Status</th> --}}
                    <th class="wd-25p">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                  @if (count($pages) > 0)
                    @foreach ($pages as $page)
                      <tr>
                          <td>{{ $i++ }}</td>
                          {{-- <td>{{ $page->category?->name }}</td> --}}
                          <td>
                            @if ($page->template == 'terms-conditions')
                              Terms & Conditions
                            @elseif ($page->template == 'refund-policy')
                              Refund Policy
                            @elseif ($page->template == 'privacy-policy')
                              Privacy Policy
                            @endif
                          </td>
                          <td>{{ $page->title }}</td>
                          {{-- <td>
                            @if($page->status == 0)
                            <a href="{{ route('page.status_toggle',$page->id) }}" class="btn btn-sm btn-warning">Inactive</a>
                            @elseif($page->status == 1)
                            <a href="{{ route('page.status_toggle',$page->id) }}" class="btn btn-sm btn-success">Active</a>
                            @endif
                          </td> --}}
                          <td>
                            <a class="btn text-info" href="{{ route('all-pages.edit', $page->id) }}"><i class="icon ion-compose tx-28"></i></a>
                            <button class="btn text-danger bg-white"  data-toggle="modal" data-target="#deleteModal{{ $page->id }}"><i class="icon ion-trash-a tx-28"></i></button>

                          </td>
                      </tr>





                      <!--_-- ########### Start Delete Category MODAL ############---->

    <div id="deleteModal{{ $page->id }}" class="modal fade">
        <div class="modal-dialog modal-dialog-top" role="document">
        <div class="modal-content tx-size-sm">
            <div class="modal-body tx-center pd-y-20 pd-x-20">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <i class="icon icon ion-ios-close-outline tx-60 tx-danger lh-1 mg-t-20 d-inline-block"></i>
                    <h4 class="tx-danger  tx-semibold mg-b-20 mt-2">Are you sure! you want to delete this?</h4>
                     <input type="hidden" name="page" id="page_id">
                    <a href="{{ route('page.delete',$page->id) }}" class="btn btn-danger mr-2 text-white tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium mg-b-20">
                        yes
                    </a>
                    <button type="button" class="btn btn-success tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium mg-b-20" data-dismiss="modal" aria-label="Close">
                        No
                    </button>

            </div><!-- modal-body -->
        </div><!-- modal-content -->
        </div><!-- modal-dialog -->
    </div><!-- modal -->

    <!--_-- ########### End Delete Category MODAL ############---->


                    @endforeach
                  @endif

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






@endsection