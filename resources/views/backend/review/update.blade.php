@section('title')
    Admin - Edit Review
@endsection

@extends('Backend.layouts.layouts')

@section('main_contain')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader">
          <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('admin.dashboard')}}">Home</a>
            <a class="breadcrumb-item" href="{{route('admin.review.index')}}"> <i class="icon ion-reply text-22"></i> All review</a>
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
            <h6 class="br-section-label text-center mb-4"> Update Review</h6>
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

                    <form action="{{ route('admin.review.update', $review->id) }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <label class="col-sm-3 form-control-label mt-3">Type: </label>
                            <div class="col-sm-9 mg-t-10 mg-sm-t-0 mt-3">
                            <input value="{{ $review->type }}" disabled type="text" name="type" class="form-control" >
                            <input value="{{ $review->type }}" type="hidden" name="type" class="form-control" >
                            </div>
                        </div><!-- row -->


                        @if ($review->type=='course')
                        <div class="row">
                            <label class="col-sm-3 form-control-label mt-3">Course Name: </label>
                            <div class="col-sm-9 mg-t-10 mg-sm-t-0 mt-3">
                            <input value="{{ @$review->course->name ?? '' }}" disabled type="text" name="designation" class="form-control" >
                            {{-- <input value="{{ $review->course->id }}" type="hidden" name="course_id" class="form-control" > --}}
                            </div>
                        </div><!-- row -->
                        @elseif ($review->type=='progam')
                        <div class="row">
                            <label class="col-sm-3 form-control-label mt-3">Program Name: </label>
                            <div class="col-sm-9 mg-t-10 mg-sm-t-0 mt-3">
                            <input value="{{ @$review->course->name ?? '' }}" disabled type="text" name="designation" class="form-control" >
                            {{-- <input value="{{ $review->course->id }}" type="hidden" name="course_id" class="form-control" > --}}
                            </div>
                        </div><!-- row -->
                        <div class="row">
                            <label class="col-sm-3 form-control-label mt-3">University Name: </label>
                            <div class="col-sm-9 mg-t-10 mg-sm-t-0 mt-3">
                            <input value="{{ @$review->course->university->name ?? '' }}" disabled type="text" name="designation" class="form-control" >
                            {{-- <input value="{{ $review->course->id }}" type="hidden" name="course_id" class="form-control" > --}}
                            </div>
                        </div><!-- row -->
                        @elseif ($review->type=='university')
                        <div class="row">
                            <label class="col-sm-3 form-control-label mt-3">University Name: </label>
                            <div class="col-sm-9 mg-t-10 mg-sm-t-0 mt-3">
                            <input value="{{ @$review->university->name ?? '' }}" disabled type="text" name="designation" class="form-control" >
                            {{-- <input value="{{ $review->course->id }}" type="hidden" name="course_id" class="form-control" > --}}
                            </div>
                        </div><!-- row -->
                        @elseif($review->type=='ebook')
                        <div class="row">
                            <label class="col-sm-3 form-control-label mt-3">Ebook Name: </label>
                            <div class="col-sm-9 mg-t-10 mg-sm-t-0 mt-3">
                            <input value="{{ @$review->ebook->title ?? '' }}" disabled type="text" name="designation" class="form-control" >
                            {{-- <input value="{{ $review->ebook->id }}" type="hidden" name="ebook_id" class="form-control" > --}}
                            </div>
                        </div><!-- row -->
                        @endif


                        @if ($review->type=='course')
                        <div class="row">
                            <label class="col-sm-3 form-control-label mt-3">Teacher: </label>
                            <div class="col-sm-9 mg-t-10 mg-sm-t-0 mt-3">
                            <input value="{{ $review->course->teacher->name ?? '' }}" disabled type="text" class="form-control">
                            </div>
                        </div><!-- row -->
                        @elseif($review->type=='ebook')
                        <div class="row">
                            <label class="col-sm-3 form-control-label mt-3">Seller: </label>
                            <div class="col-sm-9 mg-t-10 mg-sm-t-0 mt-3">
                            <input value="{{ $review->ebook->user->name ?? '' }}" disabled type="text" class="form-control">
                            </div>
                        </div><!-- row -->
                        @endif

                        
                        

                        <div class="row">
                            <label class="col-sm-3 form-control-label mt-3">User Name : </label>
                            <div class="col-sm-9 mg-t-10 mg-sm-t-0 mt-3">
                            <input value="{{ $review->user->name ?? '' }}" disabled type="text" name="name" class="form-control">
                            <input value="{{ $review->user->id ?? '' }}" type="hidden" name="user_id" class="form-control" placeholder="Enter Person Name">
                            </div>
                        </div><!-- row -->
                        <div class="row">
                            <label class="col-sm-3 form-control-label mt-3">User Email : </label>
                            <div class="col-sm-9 mg-t-10 mg-sm-t-0 mt-3">
                            <input value="{{ $review->user->email ?? '' }}" disabled type="text"class="form-control">
                            </div>
                        </div><!-- row -->
                        <div class="row">
                            <label class="col-sm-3 form-control-label mt-3">User Phone : </label>
                            <div class="col-sm-9 mg-t-10 mg-sm-t-0 mt-3">
                            <input value="{{ $review->user->mobile ?? '' }}" disabled type="text"class="form-control">
                            </div>
                        </div><!-- row -->

                        

                        <div class="row">
                            <label class="col-sm-3 form-control-label mt-3">Star: </label>
                            <div class="col-sm-9 mg-t-10 mg-sm-t-0 mt-3">
                            {{-- <input value="{{ $review->star }}" type="number" name="star" class="form-control" placeholder="Enter Star Number Like, 1, 2, 3, 4, 5" required> --}}
                            
                            <select  class="form-control" name="ratting" >
                                <option value="">Select Star</option>
                                <option @if ($review->ratting == 1) Selected @endif value="1">1 Star</option>
                                <option @if ($review->ratting == 2) Selected @endif value="2">2 Star</option>
                                <option @if ($review->ratting == 3) Selected @endif value="3">3 Star</option>
                                <option @if ($review->ratting == 4) Selected @endif value="4">4 Star</option>
                                <option @if ($review->ratting == 5) Selected @endif value="5">5 Star</option>
                            </select>
                        
                        
                        </div>
                        </div><!-- row -->


                        <div class="row mt-3">
                            <label class="col-sm-3 form-control-label">Comment: </label>
                            <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                               <textarea id="summernote" name="comment">{{ $review->comment }}</textarea>
                            </div>
                        </div><!-- row -->

                        <div class="row mt-4">
                          <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-right">
                            <a href="{{route('admin.review.index')}}" type="button" class="btn btn-secondary text-white mr-2" >Cancel</a>
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
