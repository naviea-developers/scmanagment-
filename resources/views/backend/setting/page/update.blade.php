@section('title')
    Admin - Edit Page
@endsection

@extends('Backend.layouts.layouts')

@section('main_contain')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader">
          <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('admin.dashboard')}}">Home</a>
            <a class="breadcrumb-item" href="{{route('all-pages.index')}}"> <i class="icon ion-reply text-22"></i> All Pages</a>
          </nav>
        </div><!-- br-pageheader -->

        <div class="br-pagebody">
          <div class="br-section-wrapper">
            <h6 class="br-section-label text-center mb-4"> Add New Page</h6>
            {{-- validate start  --}}
            @if(count($errors) > 0)
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
            @endif
            {{-- validate End  --}}
            <!----- Start Add Category Form input ------->
            <div class="col-xl-11 mx-auto">
                <div class="form-layout form-layout-4 py-5">

                    <form action="{{ route('all-pages.update', $page->id) }}" method="POST">
                        @csrf
                        {{ method_field('PATCH') }}
                        {{-- <div class="row mb-3">
                            <label class="col-sm-3 form-control-label">Category : <span class="tx-danger">*</span></label>
                            <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                                <select style="height:10px" class="form-control select2" name="category">
                                    <option value="">Select Catgory</option>
                                    @foreach ($categories as $category)
                                    <option @if($category->id == $page->category_id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div><!-- row --> --}}
                        <div class="row">
                            <label class="col-sm-3 form-control-label">Title : <span class="tx-danger">*</span></label>
                            <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                            <input type="text" name="title" value="{{ $page->title }}" class="form-control" placeholder="Enter Title" required>
                            </div>
                        </div><!-- row -->

                         <div class="row mt-3">
                            <label class="col-sm-3 form-control-label">Description : <span class="tx-danger">*</span></label>
                            <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                                <textarea type="text" id="summernote" name="description" class="form-control" placeholder="Enter Description">{{ $page->description }}</textarea>
                            </div>
                        </div><!-- row -->
                         <div class="row mt-3">
                            <label class="col-sm-3 form-control-label">Template : <span class="tx-danger">*</span></label>
                            <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                                <select style="height:10px" class="form-control select2" name="template">
                                    <option value="{{ $page->template }}">{{ $page->template }}</option>
                                    <option value="privacy-policy">Privacy Policy</option>
                                    <option value="refund-policy">Refund and Return Policy</option>
                                    <option value="terms-conditions">Terms & Conditions</option>
                                </select>
                            </div>
                        </div><!-- row -->
                        <div class="row mt-4">
                          <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-right">
                            <a href="{{route('all-pages.index')}}" type="button" class="btn btn-secondary text-white mr-2" >Close</a>
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
