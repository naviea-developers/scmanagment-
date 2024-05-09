@section('title')
    Admin - Learner Page
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
            <h6 class="br-section-label text-center mb-4"> Home Content Setup</h6>
            @if(count($errors) > 0)
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
            @endif
            <!----- Start Add Category Form input ------->
            <div class="col-xl-12 mx-auto">
                <div class="form-layout form-layout-4 py-5">

                    <form action="{{ route('admin.learner_page_setup') }}" method="post" enctype="multipart/form-data">
                        @csrf


                        <div class="row mt-4 mb-4">
                            <div class="col-sm-12">
                                <label class=" form-control-label">Top Title:<span class="tx-danger"></span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <textarea  type="text"  name="top_title" class="form-control" placeholder="Enter Top Title">{{ @$learner->top_title ?? '' }}</textarea>
                                </div>
                            </div>
                            <hr>
                        </div>

                        <div class="row mt-4 mb-4">
                            <div class="col-sm-12">
                                <label class=" form-control-label"> Description:<span class="tx-danger"></span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <textarea  type="text"  name="description1" class="form-control" placeholder="Enter Banner Text">{{ @$learner->description1 ?? '' }}</textarea>
                                </div>
                            </div>
                            <hr>
                        </div>

                        <div class="row mt-4 mb-4">
                            <div class="col-sm-12">
                                <label class=" form-control-label">Button:<span class="tx-danger"></span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <textarea  type="text"  name="button1" class="form-control" placeholder="Enter Banner Text">{{ @$learner->button1 ?? '' }}</textarea>
                                </div>
                            </div>
                            <hr>
                        </div>

                        <label class="col-sm-3 mt-4 form-control-label">Image Thumbnail: <span class="tx-danger"></span></label>
                        <div class="col-sm-3 mt-4 mg-t-10 mg-sm-t-0">
                            <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 150px;">
                                <img class="display-upload-img" style="width: 150px;height: 70px;" src="{{ @$learner->image1_show }}" alt="">
                                    <input type="file" name="image1" class="form-control upload-img" placeholder="Enter Activity Image"
                                    style="position: absolute;top: 0;opacity: 0;height: 100%;">
                            </div>
                        </div>

                        <hr/>
                        <h2> Second Section</h2>
                        <div class="row mt-4 mb-4">
                            <div class="col-sm-12">
                                <label class=" form-control-label">Top Left Content:<span class="tx-danger"></span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <textarea  type="text"  name="tleftcontent" class="form-control" placeholder="Enter Top Left Content">{!! @$learner->tleftcontent !!}</textarea>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="row mt-4 mb-4">
                            <div class="col-sm-12">
                                <label class=" form-control-label">Middle Content:<span class="tx-danger"></span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <textarea  type="text"  name="tmiddlecontent" class="form-control" placeholder="Enter Top  Middle Content">{!! @$learner->tmiddlecontent !!}</textarea>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="row mt-4 mb-4">
                            <div class="col-sm-12">
                                <label class=" form-control-label">Top Right Content:<span class="tx-danger"></span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <textarea  type="text"  name="trightcontent" class="form-control" placeholder="Enter Top Right Content">{!! @$learner->trightcontent !!}</textarea>
                                </div>
                            </div>
                            <hr>
                        </div>

                        <div class="row mt-4 mb-4">
                            <div class="col-sm-12">
                                <label class=" form-control-label">Bottom Left Content:<span class="tx-danger"></span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <textarea  type="text"  name="bleftcontent" class="form-control" placeholder="Enter Bottom Left Content">{!! @$learner->bleftcontent !!}</textarea>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="row mt-4 mb-4">
                            <div class="col-sm-12">
                                <label class=" form-control-label">Middle Content:<span class="tx-danger"></span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <textarea  type="text"  name="bmiddlecontent" class="form-control" placeholder="Enter Bottom Middle Content">{!! @$learner->bmiddlecontent !!}</textarea>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="row mt-4 mb-4">
                            <div class="col-sm-12">
                                <label class=" form-control-label">Bottom Right Content:<span class="tx-danger"></span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <textarea  type="text"  name="brightcontent" class="form-control" placeholder="Enter Bottom Right Content">{!! @$learner->brightcontent !!}</textarea>
                                </div>
                            </div>
                            <hr>
                        </div>

                        <hr/>
                        <h2> Third Section </h2>
                        <div class="row mt-4 mb-4">
                            <div class="col-sm-12">
                                <label class=" form-control-label">Top Left Text:<span class="tx-danger"></span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <input  type="text"  name="tlefttext" value="{{ @$learner->tlefttext  }}" class="form-control" placeholder="Enter Top Left Text">
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="row mt-4 mb-4">
                            <div class="col-sm-12">
                                <label class=" form-control-label">Top Right Text:<span class="tx-danger"></span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <input  type="text"  name="trighttext" value="{{ @$learner->trighttext  }}" class="form-control" placeholder="Enter Top Right Text">
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="row mt-4 mb-4">
                            <div class="col-sm-12">
                                <label class=" form-control-label">Middle Text:<span class="tx-danger"></span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <input  type="text"  name="middletext" value="{{ @$learner->middletext  }}" class="form-control" placeholder="Enter Middle Text">
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="row mt-4 mb-4">
                            <div class="col-sm-12">
                                <label class=" form-control-label">Bottom Left Text:<span class="tx-danger"></span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <input  type="text"  name="blefttext" value="{{ @$learner->blefttext  }}" class="form-control" placeholder="Enter Bottom Left Text">
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="row mt-4 mb-4">
                            <div class="col-sm-12">
                                <label class=" form-control-label">Bottom Right Text:<span class="tx-danger"></span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <input  type="text"  name="brighttext" value="{{ @$learner->brighttext  }}" class="form-control" placeholder="Enter Bottom Right Text">
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
                 $(this).parent().parent().append('<input type="hidden" name="delete_learnercontent[]" value="'+$(this).attr('learnercontent_id')+'">');
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
