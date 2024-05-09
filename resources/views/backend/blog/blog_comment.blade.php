@section('title')
Admin - all blog comments
@endsection

@extends('Backend.layouts.layouts')

@section('main_contain')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">

        <div class="br-pagebody">
          <div class="br-section-wrapper">
            <h6 class="br-section-label text-center">All Blog Comments</h6>
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
            {{-- success message End --}}

            <div class="table-wrapper">
              <table id="datatable1" class="table display responsive nowrap">
                <thead>
                  <tr>
                    <th class="wd-25p">Id</th>
                    <th class="wd-25p">Date & Time</th>
                    <th class="wd-25p">Blog Title</th>
                    <th class="wd-25p">User Name</th>
                    <th class="wd-25p">Comments</th>
                    {{-- <th class="wd-25p">Status</th> --}}
                    <th class="wd-25p">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                  @if (count($blog_comments) > 0)
                    @foreach ($blog_comments as $blog_comment)
                      <tr>
                          <td>{{ $i++ }}</td>
                          <td>{{ $blog_comment->created_at }}</td>
                          <td>{{ $blog_comment->blog->title ?? '' }}</td>
                          <td>{{ $blog_comment->user->name ?? '' }}</td>
                          {{-- <td>{{ $blog_comment->content }}</td> --}}
                          <td>{{ Str::words($blog_comment->content, 10) }}</td>
                          {{-- <td>
                            @if($sub_cat->status == 0)
                            <a href="{{ route('home-sub-category.status_toggle',$sub_cat->id) }}" class="btn btn-sm btn-warning">Inactive</a>
                            @elseif($sub_cat->status == 1)
                            <a href="{{ route('home-sub-category.status_toggle',$sub_cat->id) }}" class="btn btn-sm btn-success">Active</a>
                            @endif
                          </td> --}}
                          <td>
                            <a class="btn text-info" href="{{ route('blog.comment_edit', $blog_comment->id) }}"><i class="icon ion-compose tx-28"></i></a>
                            <button class="btn text-danger bg-white"  value="{{$blog_comment->id}}" id="homeSubCatdelete"><i class="icon ion-trash-a tx-28"></i></button>

                          </td>
                      </tr>
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


    <!--_-- ########### Start Delete Category MODAL ############---->

    <div id="homeDeleteSubCategory" class="modal fade">
        <div class="modal-dialog modal-dialog-top" role="document">
        <div class="modal-content tx-size-sm">
            <div class="modal-body tx-center pd-y-20 pd-x-20">
                <form action="{{ route('blog.comment_delete') }}" method="post">
                    @csrf
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <i class="icon icon ion-ios-close-outline tx-60 tx-danger lh-1 mg-t-20 d-inline-block"></i>
                    <h4 class="tx-danger  tx-semibold mg-b-20 mt-2">Are you sure! you want to delete this?</h4>
                     <input type="hidden" name="blog_comment_id" id="subcategory_id">
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

    <!--_-- ########### End Delete Category MODAL ############---->

@endsection
