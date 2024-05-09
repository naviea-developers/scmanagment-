@section('title')
    Admin - Instructor Page
@endsection

@extends('Backend.layouts.layouts')
@section('style')
<style>
    .select2-selection__rendered {
    line-height: 40px !important;
}
.select2-container .select2-selection--single {
    height: 45px !important;
}
.select2-selection__arrow {
    height: 44px !important;
}
form label{
    color: #111;
    font-weight: 500;
}
</style>
@endsection
@section('main_contain')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader">
          <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('admin.dashboard')}}">Home</a>
          </nav>
        </div><!-- br-pageheader -->

        <div class="br-pagebody">
          <div class="br-section-wrapper">
            <h6 class="br-section-label text-center mb-4"> Instructor Page Setup</h6>
            @if(count($errors) > 0)
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
            @endif
            <!----- Start Add Category Form input ------->
            <div class="col-xl-12 mx-auto">
                <div class="form-layout form-layout-4 py-5">

                    <form action="{{ route('admin.instructor_page_setup') }}" method="post" enctype="multipart/form-data">
                        @csrf


                        <div class="row mt-4 mb-4">
                            <div class="col-sm-12">
                                <label class=" form-control-label">Top Title:<span class="tx-danger"></span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <textarea  type="text"  name="top_title" class="form-control" placeholder="Enter Top Title">{{ @$instructor->top_title ?? '' }}</textarea>
                                </div>
                            </div>
                            <hr>
                        </div>

                        <div class="row mt-4 mb-4">
                            <div class="col-sm-12">
                                <label class=" form-control-label"> Description:<span class="tx-danger"></span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <textarea  type="text"  name="description1" class="form-control" placeholder="Enter Banner Text">{{ @$instructor->description1 ?? '' }}</textarea>
                                </div>
                            </div>
                            <hr>
                        </div>

                        <div class="row mt-4 mb-4">
                            <div class="col-sm-12">
                                <label class=" form-control-label">Button:<span class="tx-danger"></span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <textarea  type="text"  name="button1" class="form-control" placeholder="Enter Banner Text">{{ @$instructor->button1 ?? '' }}</textarea>
                                </div>
                            </div>
                            <hr>
                        </div>

                        <label class="col-sm-3 mt-4 form-control-label">Video Thumbnail: <span class="tx-danger"></span></label>
                        <div class="col-sm-3 mt-4 mg-t-10 mg-sm-t-0">
                            <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 150px;">
                                <img class="display-upload-img" style="width: 150px;height: 70px;" src="{{ @$instructor->image1_show }}" alt="">
                                    <input type="file" name="image1" class="form-control upload-img" placeholder="Enter Activity Image"
                                    style="position: absolute;top: 0;opacity: 0;height: 100%;">
                            </div>
                        </div>

                        <div class="row mt-4 mb-4">
                            <div class="col-sm-12">
                                <label class=" form-control-label">Video Link:<span class="tx-danger"></span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <input  type="text"  name="videolink1" value="{{ @$instructor->videolink1 }}" class="form-control" placeholder="Enter Video Link">
                                </div>
                            </div>
                            <hr>
                        </div>


                        <hr/>

                        <h2> Second Section</h2>
                        <div class="row mt-4 mb-4">
                            <div class="col-sm-12">
                                <label class=" form-control-label">Description:<span class="tx-danger"></span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <textarea  type="text"  name="text1" class="form-control" placeholder="Enter Second Section Description">{!! @$instructor->text1 !!}</textarea>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <h2> Third Section</h2>
                        <div class="row mt-4 mb-4">
                            <div class="col-sm-12">
                                <label class=" form-control-label">Title:<span class="tx-danger"></span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <textarea  type="text"  name="text2" class="form-control" placeholder="Enter  Third Section Title">{!! @$instructor->text2 !!}</textarea>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <h2>Fourth Section</h2>
                        <div class="row mt-4 mb-4">
                            <div class="col-sm-12">
                                <label class=" form-control-label">Title:<span class="tx-danger"></span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <textarea  type="text"  name="text3" class="form-control" placeholder="Enter Fourth Section Title">{!! @$instructor->text3 !!}</textarea>
                                </div>
                            </div>
                        </div>

                                        {{-- <hr/> --}}
                        {{-- <h2> Learner Content</h2> --}}

                        <div class="row mt-4">
                            <div class="col-sm-12">

                                <div class="mg-t-10 mg-sm-t-0 add-data">
                                    @if($instructor->instructorcontents->count() == 0)
                                    <div class="d-flex align-items-center mt-2">

                                     <div class="d-flex align-items-center select-add-section p-2" style="width: 70%;">
                                        <textarea type="text" name="content_name[]" class="ml-2 form-control" placeholder="Enter Content Name"> </textarea>
                                    </div>

                                    <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 110px;">
                                        <img class="display-upload-img" style="width: 110px;height: 60px;" src="{{ asset("public/frontend/images/No-image.jpg")}}" alt="">
                                            <input type="file" name="contentimage[]" class="form-control upload-img" placeholder="Enter Activity Image"
                                            style="position: absolute;top: 0;opacity: 0;height: 100%;">
                                    </div>

                                    <a id="plus-btn-data" href="javascript:void(0)" class="plus-btn-data px-1 p-0 m-0 ml-2"><i class="fas fa-plus"></i></a>
                                    </div>

                                    @else
                                    @foreach ($instructor->instructorcontents as $j=>$instructorcontent)
                                    <div class="d-flex align-items-center mt-2">

                                        <div class="d-flex align-items-center select-add-section p-2" style="width: 70%;">
                                            <textarea type="text" name="old_content_name[{{ $instructorcontent->id }}]" class="ml-2 form-control" placeholder="Enter Content Name">{!! $instructorcontent->content_name !!}</textarea>
                                        </div>

                                        <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 110px;">
                                            <img class="display-upload-img" style="width: 110px;height: 60px;" src="{{ $instructorcontent->contentimage_show }}" alt="">
                                                <input type="file" name="old_contentimage[{{ $instructorcontent->id }}]" class="form-control upload-img" placeholder="Enter Activity Image"
                                                style="position: absolute;top: 0;opacity: 0;height: 100%;">
                                        </div>

                                       @if($j == $instructor->instructorcontents->count() - 1)
                                       <a id="plus-btn-data" href="javascript:void(0)" class="plus-btn-data px-1 p-0 m-0 ml-2"><i class="fas fa-plus"></i></a>
                                       @else
                                       <a instructor_id="{{ $instructorcontent->id }}" href="javascript:void(0)" class="minus-btn-data-old px-1 p-0 m-0 ml-2"><i class="fas fa-minus-circle"></i></a>
                                       @endif

                                    </div>
                                 @endforeach
                                    @endif
                                </div>

                            </div>

                        </div><!-- row -->

                        <hr>
                        <h2>Fifth Section</h2>
                        <div class="row mt-4 mb-4">
                            <div class="col-sm-12">
                                <label class=" form-control-label">Text 1:<span class="tx-danger"></span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <textarea  type="text"  name="ptext1" class="form-control" placeholder="Enter  Text 1">{!! @$instructor->ptext1 !!}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4 mb-4">
                            <div class="col-sm-12">
                                <label class=" form-control-label">Text 2:<span class="tx-danger"></span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <textarea  type="text"  name="ptext2" class="form-control" placeholder="Enter  Text 2">{!! @$instructor->ptext2 !!}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4 mb-4">
                            <div class="col-sm-12">
                                <label class=" form-control-label">Text 3:<span class="tx-danger"></span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <textarea  type="text"  name="ptext3" class="form-control" placeholder="Enter  Text 3">{!! @$instructor->ptext3 !!}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4 mb-4">
                            <div class="col-sm-12">
                                <label class=" form-control-label">Text 4:<span class="tx-danger"></span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <textarea  type="text"  name="ptext4" class="form-control" placeholder="Enter  Text 4">{!! @$instructor->ptext4 !!}</textarea>
                                </div>
                            </div>
                        </div>

                        <hr/>
                        <h2> Sixth  Section</h2>
                        <div class="row mt-4 mb-4">
                            <div class="col-sm-12">
                                <label class=" form-control-label">Title:<span class="tx-danger"></span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <input  type="text"  name="text4" value="{{ @$instructor->text4  }}" class="form-control" placeholder="Enter Text">
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="row mt-4 mb-4">
                            <div class="col-sm-12">
                                <label class=" form-control-label">Email :<span class="tx-danger"></span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <input  type="email"  name="email" value="{{ @$instructor->email  }}" class="form-control" placeholder="Enter Email">
                                </div>
                            </div>
                            <hr>
                        </div>

                        <div class="row mt-4 mb-4">
                            <div class="col-sm-12">
                                <label class=" form-control-label">Bottom:<span class="tx-danger"></span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <input  type="text"  name="button2" value="{{ @$instructor->button2  }}" class="form-control" placeholder="Enter Bottom">
                                </div>
                            </div>
                            <hr>
                        </div>




                        <div class="row mt-4">
                            <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-right">
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
@section('script')

<script>

    $(document).ready(function() {
            $(document).on('click','#plus-btn-data',function(){



    var myvar = '<div class="d-flex align-items-center mt-2">'+
    ''+
    '                                     <div class="d-flex align-items-center select-add-section p-2" style="width: 70%;">'+
    '                                        <textarea type="text" name="content_name[]" class="ml-2 form-control" placeholder="Enter Content Name"></textarea>'+
    '                                    </div>'+
    ''+
    '                                    <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 110px;">'+
    '                                        <img class="display-upload-img" style="width: 110px;height: 60px;" src="{{ asset("public/frontend/images/No-image.jpg")}}" alt="">'+
    '                                            <input type="file" name="contentimage[]" class="form-control upload-img" placeholder="Enter Activity Image"'+
    '                                            style="position: absolute;top: 0;opacity: 0;height: 100%;">'+
    '                                    </div>'+
    ''+
    '                                   <a href="javascript:void(0)" class="minus-btn-data px-1 p-0 m-0 ml-2"><i class="fas fa-minus-circle"></i></a>'+
    '                                    </div>';


    $('.add-data').prepend(myvar);
                //console.log();
            });

            $(document).on('click','.minus-btn-data',function(){
                $(this).parent().remove();
            });
            $(document).on('click','.minus-btn-data-old',function(){
                 $(this).parent().parent().append('<input type="hidden" name="delete_instructor[]" value="'+$(this).attr('instructor_id')+'">');
                $(this).parent().remove();
            });

        });





         $(document).on('change','.upload-img',function(){
                var files = $(this).get(0).files;
                var reader = new FileReader();
                reader.readAsDataURL(files[0]);
                var arg=this;
                reader.addEventListener("load", function(e) {
                    var image = e.target.result;
                    $(arg).parent().find('.display-upload-img').attr('src', image);
                });
            });
    </script>

@endsection
