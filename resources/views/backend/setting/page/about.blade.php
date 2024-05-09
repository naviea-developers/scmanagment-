@section('title')
    Admin - About Content Setup
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
            <h6 class="br-section-label text-center mb-4"> About Content Setup</h6>
            @if(count($errors) > 0)
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
            @endif
            <!----- Start Add Category Form input ------->
            <div class="col-xl-12 mx-auto">
                <div class="form-layout form-layout-4 py-5">

                    <form action="{{ route('admin.about_page_setup') }}" method="post" enctype="multipart/form-data">
                        @csrf


                        <div class="row mt-4 mb-4">
                            <div class="col-sm-12">
                                <label class=" form-control-label">About Title:<span class="tx-danger"></span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <textarea  type="text"  name="about_text" class="form-control" placeholder="Enter Banner Text">{{ $about_content->about_text ?? '' }}</textarea>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="row mt-4 mb-4">
                            <div class="col-sm-12">
                                <label class=" form-control-label">About Description:<span class="tx-danger"></span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <textarea  type="text"  name="description1" class="form-control" placeholder="Enter Banner Text">{{ $about_content->description1 ?? '' }}</textarea>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <label class="col-sm-3 mt-4 form-control-label">Video Thumbnail: <span class="tx-danger"></span></label>
                        <div class="col-sm-3 mt-4 mg-t-10 mg-sm-t-0">
                            <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 150px;">
                                <img class="display-upload-img" style="width: 150px;height: 70px;" src="{{ $about_content->video_thumbnail_show }}" alt="">
                                    <input type="file" name="video_thumbnail" class="form-control upload-img" placeholder="Enter Activity Image"
                                    style="position: absolute;top: 0;opacity: 0;height: 100%;">
                            </div>
                        </div>

                        <div class="col-sm-12 mt-4">
                            <label class=" form-control-label">Video URL:<span class="tx-danger"></span></label>
                            <div class="mg-t-10 mg-sm-t-0">
                                <input type="text" class="col-sm-12 form-control" name="video_url" value="{{ $about_content->video_url }}"/>
                            </div>
                        </div>
                        <hr>


                        <div class="row mt-4 mb-4">
                            <div class="col-sm-12">
                                <label class=" form-control-label">About Title 2:<span class="tx-danger"></span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <textarea  type="text"  name="about_text2" class="form-control" placeholder="Enter Banner Text">{{ $about_content->about_text2 ?? '' }}</textarea>
                                </div>
                            </div>

                        </div>
                        <div class="row mt-4 mb-4">
                            <div class="col-sm-12">
                                <label class=" form-control-label">About Description 2:<span class="tx-danger"></span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <textarea  type="text"  name="description2" class="form-control" placeholder="Enter Banner Text">{{ $about_content->description2 ?? '' }}</textarea>
                                </div>
                            </div>

                        </div>
                        <hr>
                        <div class="row mt-4 mb-4">
                            <div class="col-sm-12">
                                <label class=" form-control-label">About Title 3:<span class="tx-danger"></span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <textarea  type="text" name="about_text3" class="form-control" placeholder="Enter Banner Text">{{ $about_content->about_text3 ?? '' }}</textarea>
                                </div>
                            </div>

                        </div>
                        <div class="row mt-4 mb-4">
                            <div class="col-sm-12">
                                <label class=" form-control-label">About Description 3:<span class="tx-danger"></span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <textarea  type="text" name="description3" class="form-control" placeholder="Enter Banner Text">{{ $about_content->description3 ?? '' }}</textarea>
                                </div>
                            </div>

                        </div>
                        <hr>

                        <h2>Freture</h2>

                        <div class="mt-4">
                            <div class="col-sm-12">
                             <div class="show-add-tagline-freture" >
                               @if($faqs->count() == 0)
                               <div class="d-flex mt-3">
                                   <div class="" style="border: 1px solid;padding:10px;width: 97%;">
                                       <div class="row mt-3">
                                           <div class="col-md-12">
                                               <label class="col-sm-3 mt-4 form-control-label">Image: <span class="tx-danger"></span></label>
                                               <div class="col-sm-3 mt-4 mg-t-10 mg-sm-t-0">
                                                   <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 150px;">
                                                       <img class="display-upload-img" style="width: 150px;height: 70px;" src="{{ $about_content->sub_banner_image_show}}" alt="">
                                                           <input type="file" name="image[]" class="form-control upload-img" placeholder="Enter Activity Image"
                                                           style="position: absolute;top: 0;opacity: 0;height: 100%;">
                                                   </div>
                                               </div>
                                           </div>
                                           <div class="col-md-12">
                                               <label class="col-sm-2 mt-3">URL</label>
                                               <div class="col-sm-10 mt-2">
                                                   <input  value="" type="text" name="url[]" class="form-control" placeholder="Enter URL">
                                               </div>
                                           </div>
                                           <div class="col-md-12">
                                               <label class="col-sm-2 mt-3">Description</label>
                                               <div class="col-sm-10 mt-2">
                                                   <textarea  value="" type="text" name="description[]" class="form-control" placeholder="Enter Short Description"></textarea>
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                                   <a id="plus-btn-freture" href="javascript:void(0)" class="px-1 p-0 m-0 ml-2"><i class="fas fa-plus"></i></a>
                               </div>
                               @else
                               @foreach ($faqs as $k=>$faq)
                               <div class="d-flex mt-3">
                                   <div class="" style="border: 1px solid;padding:10px;width: 97%;">
                                       <div class="row mt-3">
                                           <div class="col-md-12">
                                               <label class="col-sm-3 mt-4 form-control-label">Image: <span class="tx-danger"></span></label>
                                               <div class="col-sm-3 mt-4 mg-t-10 mg-sm-t-0">
                                                   <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 150px;">
                                                       <img class="display-upload-img" style="width: 150px;height: 70px;" src="{{ $faq->image_show }}" alt="">
                                                           <input type="file" name="old_image[{{ $faq->id }}]" class="form-control upload-img" placeholder="Enter Activity Image"
                                                           style="position: absolute;top: 0;opacity: 0;height: 100%;">
                                                   </div>
                                               </div>
                                           </div>
                                           <div class="col-md-12">
                                               <label class="col-sm-2 mt-3">URL</label>
                                               <div class="col-sm-10 mt-2">
                                                   <input  value="{{ $faq->url }}" type="text" name="old_url[{{ $faq->id }}]" class="form-control" placeholder="Enter URL">
                                               </div>
                                           </div>
                                           <div class="col-md-12">
                                               <label class="col-sm-2 mt-3">Description</label>
                                               <div class="col-sm-10 mt-2">
                                                   <textarea  value="" type="text" name="old_description[{{ $faq->id }}]" class="form-control" placeholder="Enter Short Description">{{ $faq->description }}</textarea>
                                               </div>
                                           </div>
                                       </div>
                                   </div>

                                   @if($k==$faqs->count() - 1)
                                   <a id="plus-btn-freture" href="javascript:void(0)" class="px-1 p-0 m-0 ml-2"><i class="fas fa-plus"></i></a>
                                   @else
                                   <a about_id="{{ $faq->id }}" href="javascript:void(0)" class="minus-btn-learn-old-data-freture px-1 p-0 m-0 ml-2"><i class="fas fa-minus-circle"></i></a>
                                   @endif

                               </div>
                               @endforeach
                               @endif
                            </div>
                            </div>
                           </div>

                        <hr/>

                        <div class="row mt-4 mb-4">
                            <div class="col-sm-12">
                                <label class=" form-control-label">About Title 4:<span class="tx-danger"></span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <textarea  type="text" name="about_text4" class="form-control" placeholder="Enter Banner Text">{{ $about_content->about_text4 ?? '' }}</textarea>
                                </div>
                            </div>

                        </div>




                        <h4>OUR SERVICE:</h4>
                        <div class="show-add-tagline-data1">
                            @if($about_content->packagetaglines->count() == 0)
                            <div class="d-flex mt-3">
                                <div class="" style="border: 1px solid;padding:10px;width: 97%;">
                                    <div class="row mt-3">
                                        <div class="col-sm-3">
                                            <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 100px;">
                                                <img class="display-upload-img" style="width: 100px;height: 70px;" src="{{ asset("public/frontend/images/No-image.jpg")}}" alt="">
                                                <input type="file" name="tagline_image[]" class="form-control upload-img" placeholder="Enter Activity Image" style="position: absolute;top: 0;opacity: 0;height: 100%;">
                                            </div>
                                        </div>
                                        <div class="col-sm-9">
                                            <input  value="" type="text" name="tagline[]" class="form-control" placeholder="Enter Tagline">
                                        </div>
                                        <hr style="width:95%;">
                                    </div>
                                    <div class="show-add-list-data">
                                        <div class="row mt-3">
                                            <label class="col-sm-3 form-control-label"> </label>
                                            <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                                                <div class="d-flex align-items-center ">
                                                    <input  value="" type="text" name="details[0][]" class="form-control" placeholder="Enter Details">
                                                    <a tag_id="0" href="javascript:void(0)" class="plus-btn-data-detail plus-btn-data px-1 p-0 m-0 ml-2"><i class="fas fa-plus"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a id="plus-btn-data-tagline1" href="javascript:void(0)" class="plus-btn-data px-1 p-0 m-0 ml-2"><i class="fas fa-plus"></i></a>
                            </div>
                            @else
                            @foreach ($about_content->packagetaglines as $k=>$packagetagline)
                                <div class="d-flex mt-3">
                                    <div class="" style="border: 1px solid;padding:10px;width: 97%;">
                                        <div class="row mt-3">
                                            <div class="col-sm-3">
                                                <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 100px;">
                                                    <img class="display-upload-img" style="width: 100px;height: 70px;" src="{{$packagetagline->icon_show}}"alt="">
                                                    <input type="file"  name="old_tagline_image[{{ $packagetagline->id }}]" class="form-control upload-img" placeholder="Enter Activity Image" style="position: absolute;top: 0;opacity: 0;height: 100%;">
                                                </div>
                                            </div>
                                            <div class="col-sm-9">
                                                <input value="{{ $packagetagline->title }}"  type="text"  name="old_tagline[{{ $packagetagline->id }}]" class="form-control">
                                            </div>
                                            <hr style="width:95%;">
                                        </div>
                                        @if ($packagetagline->details->count() == 0)
                                        <div class="show-add-list-data">
                                            <div class="row mt-3">
                                                <label class="col-sm-3 form-control-label"> </label>
                                                <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                                                    <div class="d-flex align-items-center ">
                                                        <input  value="" type="text" name="details[{{ $packagetagline->id }}][]" class="form-control" placeholder="Enter Details">
                                                        <a tag_id="{{  $packagetagline->id }}" href="javascript:void(0)" class="plus-btn-data-detail plus-btn-data px-1 p-0 m-0 ml-2"><i class="fas fa-plus"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @else
                                        <div class="show-add-list-data">
                                        @foreach ($packagetagline->details as $j=>$detail)

                                                <div class="row mt-3">
                                                    <label class="col-sm-3 form-control-label"> </label>
                                                    <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                                                        <div class="d-flex align-items-center ">
                                                            <input  value="{{ $detail->text }}" type="text" name="old_details[{{$packagetagline->id  }}][{{ $detail->id }}]" class="form-control" placeholder="Enter Details">
                                                            @if($j == $packagetagline->details->count()-1)
                                                            <a tag_id="{{ $packagetagline->id }}" id="plus-btn-data" href="javascript:void(0)" class="plus-btn-data px-1 p-0 m-0 ml-2"><i class="fas fa-plus"></i></a>
                                                            @else
                                                            <a d_id="{{ $detail->id }}" tagline_id="{{ $packagetagline->id }}" href="javascript:void(0)" class="minus-btn-details-data-old px-1 p-0 m-0 ml-2"><i class="fas fa-minus-circle"></i></a>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                        @endforeach
                                        </div>
                                        @endif

                                    </div>
                                    @if($k == $about_content->packagetaglines->count()-1)
                                    <a id="plus-btn-data-tagline1" href="javascript:void(0)" class="plus-btn-data px-1 p-0 m-0 ml-2"><i class="fas fa-plus"></i></a>
                                    @else
                                    <a tagline_id="{{ $packagetagline->id }}" href="javascript:void(0)" class="minus-btn-packagetaglines-data-old px-1 p-0 m-0 ml-2"><i class="fas fa-minus-circle"></i></a>
                                    @endif
                                </div>
                            @endforeach
                            @endif


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

    //Course resource file start
$(document).ready(function() {
        $('#plus-btn-freture').on('click',function(){

            var freture = '<div class="d-flex mt-3">'+
'                                    <div class="" style="border: 1px solid;padding:10px;width: 97%;">'+
'                                        <div class="row mt-3">'+
''+
'                                            <div class="col-md-12">'+
'                                                <label class="col-sm-3 mt-4 form-control-label">Image: <span class="tx-danger"></span></label>'+
'                                                <div class="col-sm-3 mt-4 mg-t-10 mg-sm-t-0">'+
'                                                    <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 150px;">'+
'                                                        <img class="display-upload-img" style="width: 150px;height: 70px;" src="{{ $about_content->sub_banner_image_show}}" alt="">'+
'                                                            <input type="file" name="image[]" class="form-control upload-img" placeholder="Enter Activity Image"'+
'                                                            style="position: absolute;top: 0;opacity: 0;height: 100%;">'+
'                                                    </div>'+
'                                                </div>'+
'                                            </div>'+
'                                            <div class="col-md-12">'+
'                                                <label class="col-sm-2 mt-3">URL</label>'+
'                                                <div class="col-sm-10 mt-2">'+
'                                                    <input  value="" type="text" name="url[]" class="form-control" placeholder="Enter URL">'+
'                                                </div>'+
'                                            </div>'+
'                                            <div class="col-md-12">'+
'                                                <label class="col-sm-2 mt-3">Description</label>'+
'                                                <div class="col-sm-10 mt-2">'+
'                                                    <textarea  value="" type="text" name="description[]" class="form-control" placeholder="Enter Short Description"></textarea>'+
'                                                </div>'+
'                                            </div>'+
'                                        </div>'+
'                                    </div>'+
'                                    <a href="javascript:void(0)" class="minus-btn-data-freture px-1 p-0 m-0 ml-2"><i class="fas fa-minus-circle"></i></a>'+
'                                </div>';



        $('.show-add-tagline-freture').prepend(freture);
            //console.log();
        });
        $(document).on('click','.minus-btn-data-freture',function(){
            $(this).parent().remove();
        });

        $(document).on('click','.minus-btn-learn-old-data-freture',function(){
        $(this).parent().parent().parent().parent().append("<input type='hidden' name='old_delete_about_data[]' value='"+$(this).attr('about_id')+"'>");
        $(this).parent().remove();
        });

        $(document).on('click','.minus-btn-resourcefile-old',function(){
             $(this).parent().parent().append('<input type="hidden" name="delete_resourcefile[]" value="'+$(this).attr('resourcefile_id')+'">');
            $(this).parent().remove();
        });

    });













    $(document).ready(function() {height: 150

            /*** summernote editor two ***/
            $('#summernote_three').summernote({
                height: 150
            })
            $('#summernote_two').summernote({
                height: 150
            })
            $('#summernote_one').summernote({
                height: 150
            })
            $('#summernote_four').summernote({
                height: 150
            })

        });
    // $('#plus-btn-data-question').on('click',function(){

    //     var out = '<div class="row">'+
    //              '<div class="col-sm-5 mt-3">'+
    //              '<label class=" form-control-label">Button Text:<span class="tx-danger"></span></label>'+
    //              '<div class="mg-t-10 mg-sm-t-0">'+
    //                 '<input  value="" type="text" name="about_content_ques[]" class="form-control" placeholder="Enter Question">'+
    //                 '</div></div>'+
    //                 ' <div class="col-sm-7 mt-3 d-flex align-items-center ">'+
    //                 '<div style="width: 97%;">'+
    //                     ' <label class=" form-control-label">Button URL:<span class="tx-danger"></span></label>'+
    //                     ' <div class="mg-t-10 mg-sm-t-0">'+
    //                     '<input type="text"  value="" name="about_content_ans[]" class="form-control" placeholder="Enter Answer ">'+
    //                     '</div>'+
    //                     '</div><div>'+
    //                         '<label class=" form-control-label"></label>'+
    //                         '<a href="javascript:void(0)" class="minus-btn-question-data px-1 p-0 m-0 ml-2"><i class="fas fa-minus-circle"></i></a>'+
    //                         '</div></div></div>';

    //                         console.log(out);
    //     $('.add-question-data-show').append(out);

    // });
    // $(document).on('click','.minus-btn-question-data',function(){
    //     $(this).parent().parent().parent().remove();
    // });
    //  $(document).on('click','.minus-btn-question-old-data',function(){

    //     $(this).parent().parent().parent().parent().append("<input type='hidden' name='old_delete_faq_data[]' value='"+$(this).attr('faq_id')+"'>");
    //     $(this).parent().parent().parent().remove();
    // });








//     $('#plus-btn-data-tagline').on('click',function(){


//         var myvar = '<div class="d-flex mt-3">'+
// '                                    <div class="" style="border: 1px solid;padding:10px;width: 97%;">'+
// '                                        <div class="row mt-3">'+
// '                                            '+
// '                                            <div class="col-md-12">'+
// '                                                <label class="col-sm-3 mt-4 form-control-label">Image: <span class="tx-danger"></span></label>'+
// '                                                <div class="col-sm-3 mt-4 mg-t-10 mg-sm-t-0">'+
// '                                                    <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 150px;">'+
// '                                                        <img class="display-upload-img" style="width: 150px;height: 70px;" src="{{ asset("public/frontend/images/No-image.jpg")}}" alt="">'+
// '                                                            <input type="file" name="image[]" class="form-control upload-img" placeholder="Enter Activity Image"'+
// '                                                            style="position: absolute;top: 0;opacity: 0;height: 100%;">'+
// '                                                    </div>'+
// '                                                </div>'+
// '                                            </div>'+
// '                                            <div class="col-md-12">'+
// '                                                <label class="col-sm-2 mt-3">URL</label>'+
// '                                                <div class="col-sm-10 mt-2">'+
// '                                                    <input  value="" type="text" name="url[]" class="form-control" placeholder="Enter URL">'+
// '                                                </div>'+
// '                                            </div>'+
// '                                            <div class="col-md-12">'+
// '                                                <label class="col-sm-2 mt-3">Description</label>'+
// '                                                <div class="col-sm-10 mt-2">'+
// '                                                    <textarea  value="" type="text" name="description[]" class="form-control" placeholder="Enter Short Description"></textarea>'+
// '                                           </div>'+
// '                                           </div>'+
// '                                     </div>'+
// '                                  </div>'+
// '                                   <a href="javascript:void(0)" class="minus-btn-data-tagline px-1 p-0 m-0 ml-2"><i class="fas fa-minus-circle"></i></a>'+
// '                               </div>';

//     $('.show-add-tagline-data').append(myvar);
//     tagline++;
//     $(this).focus();
//     });
//     $(document).on('click','.minus-btn-data-tagline',function(){
//         $(this).parent().remove();
//     });

//     $(document).on('click','.minus-btn-learn-old-data',function(){

//     $(this).parent().parent().parent().parent().append("<input type='hidden' name='old_delete_about_data[]' value='"+$(this).attr('about_id')+"'>");
//     $(this).parent().parent().parent().remove();
//     });
















    var tagline =1;
    $(document).on('click','.plus-btn-data',function(){
        let out = '<div class="row mt-3">'+
                  '<label class="col-sm-3 form-control-label"> </label>'+
                  '<div class="col-sm-9 mg-t-10 mg-sm-t-0">'+
                    '<div class="d-flex align-items-center ">'+
                    '<input  value="" type="text" name="details['+$(this).attr('tag_id')+'][]" class="form-control" placeholder="Enter Details">'+
                    '<a href="javascript:void(0)" class="minus-btn-data px-1 p-0 m-0 ml-2"><i class="fas fa-minus-circle"></i></a>'+
                    '</div></div></div>';
       $(this).parent().parent().parent().parent().prepend(out);
    });
    $(document).on('click','.minus-btn-data',function(){
        $(this).parent().parent().parent().remove();
    });

    $(document).on('click','#plus-btn-data-tagline1',function(){
        var myvar = '<div class="d-flex mt-3">'+
        '                                <div class="" style="border: 1px solid;padding:10px;width: 97%;">'+
        '                                    <div class="row mt-3">'+
        '                                        <div class="col-sm-3">'+
        '                                            <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 100px;">'+
        '                                                <img class="display-upload-img" style="width: 100px;height: 70px;" src="{{ asset("public/frontend/images/No-image.jpg")}}" alt="">'+
        '                                                <input type="file" name="tagline_image[]" class="form-control upload-img" placeholder="Enter Activity Image" style="position: absolute;top: 0;opacity: 0;height: 100%;">'+
        '                                            </div>'+
        '                                        </div>'+
        '                                        <div class="col-sm-9">'+
        '                                            <input  value="" type="text" name="tagline[]" class="form-control" placeholder="Enter Tagline">'+
        '                                        </div>'+
        '                                        <hr style="width:95%;">'+
        '                                    </div>'+
        '                                    <div class="show-add-list-data">'+
        '                                        <div class="row mt-3">'+
        '                                            <label class="col-sm-3 form-control-label"> </label>'+
        '                                            <div class="col-sm-9 mg-t-10 mg-sm-t-0">'+
        '                                                <div class="d-flex align-items-center ">'+
        '                                                    <input  value="" type="text" name="details['+tagline+'][]" class="form-control" placeholder="Enter Details">'+
        '                                                    <a tag_id="'+tagline+'" class="plus-btn-data" href="javascript:void(0)" class="plus-btn-data px-1 p-0 m-0 ml-2"><i class="fas fa-plus"></i></a>'+
        '                                                </div>'+
        '                                            </div>'+
        '                                        </div>'+
        '                                    </div>'+
        '                                </div>'+
        '                                <a href="javascript:void(0)" class="minus-btn-data-tagline px-1 p-0 m-0 ml-2"><i class="fas fa-minus-circle"></i></a>'+
        '                            </div>';

        $('.show-add-tagline-data1').append(myvar);
        tagline++;
        $(this).focus();
    });
    $(document).on('click','.minus-btn-data-tagline',function(){
        $(this).parent().remove();
    });

    $(document).on('click','.minus-btn-details-data-old',function(){
        $(this).parent().parent().parent().parent().append('<input type="hidden" name="delete_details[]" value="'+$(this).attr('d_id')+'">')
        $(this).parent().parent().parent().remove();
    });

    $(document).on('click','.minus-btn-packagetaglines-data-old',function(){
        console.log(this);
        $(this).parent().parent().append('<input type="hidden" name="delete_tagline[]" value="'+$(this).attr('tagline_id')+'">')
        $(this).parent().remove();
    });

</script>

@endsection
