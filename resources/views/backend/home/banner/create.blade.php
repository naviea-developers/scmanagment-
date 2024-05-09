@section('title')
    Admin - Add New Banner
@endsection

@extends('Backend.layouts.layouts')

@section('main_contain')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader">
          <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('admin.dashboard')}}">Home</a>
            <a class="breadcrumb-item" href="{{route('home-banner.index')}}"> <i class="icon ion-reply text-22"></i> All Banner</a>
          </nav>
        </div><!-- br-pageheader -->

        <div class="br-pagebody">
          <div class="br-section-wrapper">
            <h6 class="br-section-label text-center mb-4"> Add New Banner</h6>
               {{-- validate start  --}}
               @if(count($errors) > 0)
               @foreach($errors->all() as $error)
                   <div class="alert alert-danger">{{ $error }}</div>
               @endforeach
               @endif
               {{-- validate End  --}}

            <!----- Start Add Category Form input ------->
            <div class="col-xl-10 mx-auto">
                <div class="form-layout form-layout-4 py-5">

                    <form action="{{ route('home-banner.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mt-3">
                            <label class="col-sm-3 form-control-label">Banner Background Image: <span class="tx-danger">*</span></label>
                            <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                                <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 150px;">
                                        <img class="display-upload-img" style="width: 150px;height: 70px;" src="{{ asset("public/frontend/images/No-image.jpg")}}" alt="">
                                        <input type="file" name="image" class="form-control upload-img" placeholder="Enter Activity Image" style="position: absolute;top: 0;opacity: 0;height: 100%;">
                                    </div>
                            </div>
                        </div><!-- row -->

                        {{-- <div class="row mt-3">
                            <label class="col-sm-3 form-control-label">Category: <span class="tx-danger">*</span></label>
                            <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                                <select id="cat"  class="form-control" name="category_id">
                                    <option value="">Select Category</option>
                                    @foreach ($categorys as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div><!-- row --> --}}
                        {{-- <div class="row mt-4">
                            <label class="col-sm-3 form-control-label">Sub Category: <span class="tx-danger">*</span></label>
                            <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                                <select id="subCat"  class="form-control" name="subcategory_id">
                                    <option value="">------ Select Sub category ------</option>
                                </select>
                            </div>
                        </div><!-- row --> --}}
                          <div class="row mt-4">
                            <label class="col-sm-3 form-control-label">Title: <span class="tx-danger">*</span></label>
                            <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                            <input value="{{ old('title') }}" type="text" name="title" class="form-control" placeholder="Enter Title Name" required>
                        </div>
                        </div><!-- row -->

                        <div class="row mt-3">
                            <label class="col-sm-3 form-control-label">Page: <span class="tx-danger">*</span></label>
                            <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                                <select id="cat"  class="form-control" name="type">
                                    <option value="">select page</option>
                                    <option value="course">Course</option>
                                    <option value="event">Event</option>
                                    <option value="blog">Blog</option>
                                    <option value="contact">Contact</option>
                                    <option value="ebook">Ebook</option>
                                    <option value="e-audio">E_Audio</option>
                                    <option value="e-video">E_Video</option>

                                </select>
                            </div>
                        </div><!-- row -->

                        <div class="row">
                            <label class="col-sm-3 form-control-label mt-3">Details : <span class="tx-danger">*</span></label>
                            <div class="col-sm-9 mg-t-10 mg-sm-t-0 mt-3">
                                <textarea id="summernote" name="details">{{ old('details') }}</textarea>
                            </div>
                        </div><!-- row -->

                        <div class="row mt-4">
                          <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-right">
                            <a href="{{route('home-banner.index')}}" type="button" class="btn btn-secondary text-white mr-2" >Cancel</a>
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

{{-- @section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.3.4/axios.min.js"></script>
    <script>
        // $("#cat").on("select2-selecting", function(e) {
        //     console.log(this);
        //    $("#cat").select2("data",e.choice);
        // });
        $('body').on("change",'#cat',function(){
            let id = $(this).val()
            //console.log(id);
            let url = '{{ url("/banner/subcat/") }}/' + id

            axios.get(url)
                .then(res => {
                    //console.log(res);
                $('#subCat').empty();
                    let html = '';
                    html += '<option value="">------ Select Sub category ------</option>'
                    res.data.forEach(element => {
                        html += "<option value=" + element.id + ">" + element.name + "</option>"
                    });


                    $('#subCat').append(html);
                    $('#subCat').val("").change();
                });
        })

    </script>

    <script>
        $('body').on("change",'#subCat',function(){
            let id = $(this).val() == "" ? 0 :  $(this).val();
            //console.log(id);
            let url = '{{ url("/banner/childcat/") }}/' + id

            axios.get(url)
                .then(res => {
                    //console.log(res);
                $('#childCat').empty();
                    let html = '';
                    html += '<option value="">------ Select Child category ------</option>'
                    res.data.forEach(element => {
                        html += "<option value=" + element.id + ">" + element.name + "</option>"
                    });

                    $('#childCat').append(html);
                });
        })

    </script>
@endsection --}}
