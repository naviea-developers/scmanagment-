@section('title')
    Admin - Edit Blog Comment
@endsection

@extends('Backend.layouts.layouts')

@section('main_contain')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader">
          <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('admin.dashboard')}}">Home</a>
            <a class="breadcrumb-item" href="{{route('blog.comments')}}"> <i class="icon ion-reply text-22"></i> All Blog Comment</a>
          </nav>
        </div><!-- br-pageheader -->

            {{-- success message start --}}
            @if(session()->has('message'))
            <div class="alert alert-success">
            {{session()->get('message')}}
            </div>
            <script>
                setTimeout(function(){
                    $('.alert.alert-success').hide();
                }, 3000);
            </script>
            @endif
            {{-- success message start --}}


        <div class="br-pagebody">
          <div class="br-section-wrapper">
            <h6 class="br-section-label text-center mb-4"> Update blog_comment</h6>
            {{-- validate start  --}}
            @if(count($errors) > 0)
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
            @endif
            {{-- validate End  --}}
            <!----- Start Add Category Form input ------->
            <div class="col-xl-9 mx-auto">
                <div class="form-layout form-layout-4 py-5">

                    <form action="{{ route('blog.comment_update', $blog_comment->id) }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <label class="col-sm-3 form-control-label mt-3">Blog Name: </label>
                            <div class="col-sm-9 mg-t-10 mg-sm-t-0 mt-3">
                            <input value="{{ $blog_comment->blog->title ?? '' }}" disabled type="text" class="form-control" >
                            <input value="{{ $blog_comment->blog->id ?? '' }}" type="hidden" name="blog_id" class="form-control" >
                            </div>
                        </div><!-- row -->
                        

                        <div class="row">
                            <label class="col-sm-3 form-control-label mt-3">User Name : </label>
                            <div class="col-sm-9 mg-t-10 mg-sm-t-0 mt-3">
                            <input value="{{ $blog_comment->user->name ?? '' }}" disabled type="text" class="form-control">
                            <input value="{{ $blog_comment->user->id ?? '' }}" type="hidden" name="user_id" class="form-control" placeholder="Enter Person Name">
                            </div>
                        </div><!-- row -->
                        <div class="row">
                            <label class="col-sm-3 form-control-label mt-3">User Email : </label>
                            <div class="col-sm-9 mg-t-10 mg-sm-t-0 mt-3">
                            <input value="{{ $blog_comment->user->email ?? '' }}" disabled type="text"class="form-control">
                            </div>
                        </div><!-- row -->
                        <div class="row">
                            <label class="col-sm-3 form-control-label mt-3">User Phone : </label>
                            <div class="col-sm-9 mg-t-10 mg-sm-t-0 mt-3">
                            <input value="{{ $blog_comment->user->mobile ?? '' }}" disabled type="text"class="form-control">
                            </div>
                        </div><!-- row -->

                        


                        <div class="row mt-3">
                            <label class="col-sm-3 form-control-label">Comment: </label>
                            <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                               <textarea id="summernote" name="content">{{ $blog_comment->content }}</textarea>
                            </div>
                        </div><!-- row -->

                        <div class="row mt-4">
                          <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-right">
                            <a href="{{route('blog.comments')}}" type="button" class="btn btn-secondary text-white mr-2" >Cancel</a>
                            <button type="submit" class="btn btn-info ">Update</button>
                          </div>
                        </div>
                    </form>

                </div><!-- form-layout -->
            </div><!-- col-6 -->
            <!----- Start Add Category Form input ------->
          </div><!-- br-section-wrapper -->
        </div><!-- br-pagebody -->

    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->







@endsection
