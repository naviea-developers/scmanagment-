@section('title')
    Admin - Add New Category
@endsection

@extends('Backend.layouts.layouts')

@section('main_contain')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader">
          <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('admin.dashboard')}}">Home</a>
            <a class="breadcrumb-item" href="{{route('home-category.index')}}"> <i class="icon ion-reply text-22"></i> All Category</a>
          </nav>
        </div><!-- br-pageheader -->

        <div class="br-pagebody">
          <div class="br-section-wrapper">
            <h6 class="br-section-label text-center mb-4"> Add New Category</h6>
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

                    <form action="{{ route('home-category.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row mt-3">
                            <label class="col-sm-3 form-control-label">Category Image: <span class="tx-danger">*</span></label>
                            <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                                <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 150px;">
                                        <img class="display-upload-img" style="width: 150px;height: 70px;" src="{{ asset("public/frontend/images/No-image.jpg")}}" alt="">
                                        <input type="file" name="image" class="form-control upload-img" placeholder="Enter Activity Image" style="position: absolute;top: 0;opacity: 0;height: 100%;">
                                    </div>
                            </div>
                        </div><!-- row -->

                        <div class="row">
                            <label class="col-sm-3 form-control-label mt-3">Category : <span class="tx-danger">*</span></label>
                            <div class="col-sm-9 mg-t-10 mg-sm-t-0 mt-3">
                            <input value="{{ old('name') }}" type="text" name="name" class="form-control" placeholder="Enter Category" required>
                            </div>
                        </div><!-- row -->

                        <div class="row">
                            <label class="col-sm-3 form-control-label ">Type : </label>
                            <div class="col-sm-9 mg-t-10 mg-sm-t-0 mt-3">
                              <select  class="form-control" name="type">
                                <option value="">Select type</option>
                                <option value="home">Course</option>
                                <option value="event">Event</option>
                                <option value="blog">Blog</option>
                                <option value="master_course">Master Course</option>
                                <option value="ebook">Ebook</option>
                            </select>
                            </div>
                        </div><!-- row -->

                        <div class="row">
                            <label class="col-sm-3 form-control-label mt-3">Details : <span class="tx-danger">*</span></label>
                            <div class="col-sm-9 mg-t-10 mg-sm-t-0 mt-3">
                                <textarea id="summernote" name="details">{{ old('details') }}</textarea>
                            </div>
                        </div><!-- row -->

                        {{-- <div class="row mt-4">
                            <div class="col-sm-12">
                                <label class="form-control-label"><b>Event About </b><span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <textarea id="summernote" name="about">{{ old('about') }}</textarea>
                                </div>
                            </div>
                        </div> --}}

                        <div class="row mt-4">
                          <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-right">
                            <a href="{{route('home-category.index')}}" type="button" class="btn btn-secondary text-white mr-2" >Cancel</a>
                            <button type="submit" class="btn btn-info ">Save</button>
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
