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

                    <form action="{{ route('admin.event.contact.update', $contact->id) }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <label class="col-sm-3 form-control-label mt-3">Event Name: </label>
                            <div class="col-sm-9 mg-t-10 mg-sm-t-0 mt-3">
                            <input value="{{ $contact->event->name ?? '' }}" disabled type="text" name="designation" class="form-control" >
                            <input value="{{ $contact->event->id ?? '' }}" type="hidden" name="event_id" class="form-control" >
                            </div>
                        </div><!-- row -->
                        {{-- <div class="row">
                            <label class="col-sm-3 form-control-label mt-3">Course Teacher: </label>
                            <div class="col-sm-9 mg-t-10 mg-sm-t-0 mt-3">
                            <input value="{{ $review->course->teacher->name ?? '' }}" disabled type="text" class="form-control">
                            </div>
                        </div><!-- row --> --}}

                        <div class="row">
                            <label class="col-sm-3 form-control-label mt-3">Student Name : </label>
                            <div class="col-sm-9 mg-t-10 mg-sm-t-0 mt-3">
                            <input value="{{ $contact->user->name ?? '' }}" disabled type="text" name="name" class="form-control">
                            <input value="{{ $contact->user->id ?? '' }}" type="hidden" name="user_id" class="form-control" placeholder="Enter Person Name">
                            </div>
                        </div><!-- row -->
                        <div class="row">
                            <label class="col-sm-3 form-control-label mt-3">Student Email : </label>
                            <div class="col-sm-9 mg-t-10 mg-sm-t-0 mt-3">
                            <input value="{{ $contact->user->email ?? '' }}" disabled type="text"class="form-control">
                            </div>
                        </div><!-- row -->
                        <div class="row">
                            <label class="col-sm-3 form-control-label mt-3">Student Phone : </label>
                            <div class="col-sm-9 mg-t-10 mg-sm-t-0 mt-3">
                            <input value="{{ $contact->user->mobile ?? '' }}" disabled type="text"class="form-control">
                            </div>
                        </div><!-- row -->


                        <div class="row mt-3">
                            <label class="col-sm-3 form-control-label">Student Comment: </label>
                            <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                               <textarea id="summernote" name="details">{{ $contact->details }}</textarea>
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
