@extends('user.layouts.master-layout')
@section('head')
@section('title','- Add New E-Book')

<link href="{{asset('public/backend')}}/lib/summernote/summernote-bs4.css" rel="stylesheet">
@endsection
@section('main_content')
<section class="">
    <div class="">
        <div class="row" >



            <div class="col-md-12 ">

        <!-- ########## START: MAIN PANEL ########## -->

                @if(count($errors) > 0)
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
                @endif

                    {{-- success message start --}}
                    @if(session()->has('message'))
                    <div class="alert alert-success">
                    {{-- <button type="button" class="close" data-bs-dismiss="alert" aria-hidden="true"></button> --}}
                    {{session()->get('message')}}
                    </div>
                    <script>
                        setTimeout(function(){
                            $('.alert.alert-success').hide();
                        }, 3000);
                    </script>
                    @endif
                    {{-- success message start --}}


                <!----- Start Add Product Form input ------->
                <div class="container  py-3">
                    <div class="card card-body shadow" style="background-color: var(--seller_frontend_color);color:var(--seller_text_color)">
                        <div class="col-md-12">


                            <form action="{{ route('frontend.stor_ebook_audio') }}" method="POST" enctype="multipart/form-data" style="margin-top: 0%">
                                @csrf

                                <div class="card card-body bg-light mb-4 shadow" >
                                    <div class="right_section">
                                        <div>
                                            <h4 class="mt-2 mb-4 " >Add New E-Audio </h4>
                                        </div>
                                    </div>

                                    <div class="row align-items-end">
                                        <div class="col-sm-4">
                                            <label class="form-control-label"><b>Image: </b><span class="tx-danger">*</span></label>
                                                <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 150px;">
                                                    <img class="display-upload-img" style="width: 150px;height: 70px;" src="{{ asset("public/frontend/images/No-image.jpg")}}" alt="">
                                                    <input type="file" name="image" class="form-control upload-img" placeholder="Enter Activity Image" style="position: absolute;top: 0;opacity: 0;height: 100%;" required>
                                                </div>
                                        </div>
                                    </div>

                                    <div class="row mt-4">

                                        <div class="col-sm-6">
                                            <label class="form-control-label"><b>Category :</b><span class="tx-danger">*</span></label>
                                            <div class="mg-t-10 mg-sm-t-0">
                                                <select id="cat"  class="form-control" name="category_id">
                                                    <option value="">Select Category</option>
                                                    @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <label class="form-control-label"><b>Sub Category :</b><span class="tx-danger">*</span></label>
                                            <div class="mg-t-10 mg-sm-t-0">
                                                <select id="subCat"  class="form-control" name="sub_category_id">
                                                    <option value="">------ Select Sub category ------</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 mt-3">
                                            <label class="form-control-label"><b>Subject: </b><span class="tx-danger">*</span></label>
                                            <div class="mg-t-10 mg-sm-t-0">
                                                <input type="text" name="title" value="{{ old('title') }}" class="form-control" placeholder="Enter Subject" required>

                                            </div>
                                        </div>
                                        <div class="col-sm-6 mt-3">
                                            <label class="form-control-label"><b>Lesson: </b><span class="tx-danger">*</span></label>
                                            <div class="mg-t-10 mg-sm-t-0">
                                                <input type="text" name="lesson" value="{{ old('lesson') }}" class="form-control" placeholder="Enter Lesson" required>

                                            </div>
                                        </div>
                                        <div class="col-sm-12 mt-3">
                                            <label class="form-control-label"><b>Headline: </b><span class="tx-danger">*</span></label>
                                            <div class="mg-t-10 mg-sm-t-0">
                                                <input type="text" name="headline" value="{{ old('headline') }}" class="form-control" placeholder="Enter Headline" required>

                                            </div>
                                        </div>

                                        <div class="col-sm-4 mt-3">
                                            <label class="form-control-label"><b>Price: </b><span class="tx-danger">*</span></label>
                                            <div class="mg-t-10 mg-sm-t-0">
                                                <input type="number" name="fee" value="{{ old('fee') }}" class="form-control" placeholder="Enter Price" required>

                                            </div>
                                        </div>
                                        <div class="col-sm-4 mt-3">
                                            <label class="form-control-label"><b>Discount: </b></label>
                                            <div class="mg-t-10 mg-sm-t-0">
                                                <input type="number" name="discount" value="{{ old('discount') }}" class="form-control" placeholder="Enter Discount" >

                                            </div>
                                        </div>

                                        <div class="col-sm-4 mt-3">
                                            <label class="form-control-label"><b>Discount Type:</b> </label>
                                            <div class="mg-t-10 mg-sm-t-0">
                                              <select class="form-control" name="discount_type">
                                                <option value="">Select Discount type</option>
                                                <option value="0">Percent</option>
                                                <option value="1">Fixed</option>
                                              </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 mt-3">
                                            <label class="form-control-label"><b>Related Ebook :</b></label>
                                            <div class="mg-t-10 mg-sm-t-0">
                                                <select class="form-control multipleSelect2Search custom-select" name="relatedebook_id[]" multiple>
                                                  <option value="">Select type</option>
                                                  @foreach ($ebooks as $ebook)
                                                  <option value="{{ $ebook->id }}">{{ $ebook->title }}</option>
                                                  @endforeach
                                                </select>
                                              </div>
                                          </div>

                                        <div class="col-sm-6 mt-3">
                                            <label class="form-control-label"><b>Content Audio: </b></label>
                                            <div class="mg-t-10 mg-sm-t-0">
                                                <input type="file" accept="audio/*" name="content_audio" value="{{ old('content_audio') }}" class="form-control" >

                                            </div>
                                        </div>


                                        <div class="col-sm-12 mt-3">
                                            <label class="form-control-label"><b>Short Description </b></label>
                                            <div class="mg-t-10 mg-sm-t-0">
                                                <textarea type="text" name="short_desctiption" value="{{ old('short_desctiption') }}" class="form-control" id="summernote_two" placeholder="Long Description" ></textarea>
                                            </div><br>
                                        </div>
                                        <div class="col-sm-12 mt-3">
                                            <label class="form-control-label"><b>E-Book Content </b></label>
                                            <div class="mg-t-10 mg-sm-t-0">
                                                <textarea type="text" name="long_desctiption" value="{{ old('long_desctiption') }}" class="form-control" id="summernote" placeholder="Long Description" ></textarea>
                                            </div><br>
                                        </div>




 {{-- Audio Content --}}
 <div class="col-sm-12 mt-3"  style="border: 1px solid;padding:10px">
    <label class="form-control-label"><h5>Audio Content:</h5></label>
    <div class="mg-t-10 mg-sm-t-0 add-data-content">
        <div class="d-flex align-items-center mt-2 row">
            <div class="col-md-5">
                <label class="form-control-label"><b>Audio Name:</b></label>
                <div class="d-flex  align-items-center select-add-section " >
                    <input type="text" name="audio_name[]" value="{{ old('$audio_name') }}" class=" form-control" placeholder="Audio Content Name">
                </div>
            </div>
            <div class="col-md-4">
                <label class="form-control-label"><b>Audio File:</b></label>
                <div class="d-flex  align-items-center select-add-section">
                    <input type="file" accept="audio/*" name="audio_file[]" value="{{ old('$audio_file') }}" class=" form-control">
                </div>
            </div>
            <div class="col-md-3">
                <label class="form-control-label"><b>Is Free:</b></label>
                <div class="d-flex  align-items-center select-add-section" style="width: 50%;">
                    <input type="checkbox" name="is_free_audio[]" value="1" class=" " >
                </div>
            </div>
            <a id="plus-btn-data-content" href="javascript:void(0)" class="plus-btn-data-content px-1 p-0 m-0 ml-2"><i class="fas fa-plus"></i></a>
        </div>
    </div>
</div>



<br>
<br>
<br>
<br>
<br>
<br>



{{-- Video Content --}}
<div class="col-sm-12 mt-3"  style="border: 1px solid;padding:10px">
    <label class="form-control-label"><h5>Video Content:</h5></label>
    <div class="mg-t-10 mg-sm-t-0 add-data-content-video">
        <div class="d-flex align-items-center mt-2 row">
            <div class="col-md-5">
                <label class="form-control-label"><b>Video Name:</b></label>
                <div class="d-flex  align-items-center select-add-section " >
                    <input type="text" name="video_name[]" value="{{ old('$video_name') }}" class=" form-control" placeholder="Video Content Name">
                </div>
            </div>
            <div class="col-md-4">
                <label class="form-control-label"><b>Video File:</b></label>
                <div class="d-flex  align-items-center select-add-section">
                    <input type="file" accept="video/*" name="video_file[]" value="{{ old('$video_file') }}" class=" form-control">
                </div>
            </div>
            <div class="col-md-2">
                <label class="form-control-label"><b>Is Free:</b></label>
                <div class="d-flex  align-items-center select-add-section" style="width: 50%;">
                    <input type="checkbox" name="is_free_video[]" value="1" class=" " >
                </div>
            </div>
            <a id="plus-btn-data-content-video" href="javascript:void(0)" class="plus-btn-data-content-video px-1 p-0 m-0 ml-2"><i class="fas fa-plus"></i></a>
        </div>
    </div>
</div>














                                    </div>

                                </div>

                                <div class="row mt-4">
                                    <div class="mg-sm-t-0 text-right">
                                    <a href="{{route('frontend.manage_ebook_audio')}}" type="button" class="btn btn-danger text-white mr-2" >Close</a>
                                    <button type="submit"  class="btn btn-info ">Save</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</section>
<br>


        <!----- Start Add Category Form input ------->

<!-- ########## END: MAIN PANEL ########## -->

@endsection




@section('script')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        $('.multipleSelect2Search').select2();
    });
    $(document).ready(function() {
        $('.multipleSelectSearch').select2();
    });
</script>

<script>
    $(document).ready(function() {
    $(".add-no-existssss").select2({
         tags: true,
        createTag: function (params) {
            var term = $.trim(params.term);
            console.log(term);
            if (term === '') {
                return null;
            }
            return {
                id: term,
                text: term,
                newTag: true
            }
        },
        //tags: true
    }).on('select2:select', function(e){
        // console.log(e.params.data.tag)
        // console.log(e.params.data.newTag)
        // var select2element = $(this);
        // console.log( $(this).attr('id'));
        // if (e.params.data.newTag === true) {
        //     select2function(e.params.data.text,$(this).attr('id'),select2element)
        // }
    });

    function select2function(val,type,select2element){
        console.log(type);
        let url = '{{ url("add-new-select2-bort-facility") }}' ;
        let data = {val:val,'type':type};
        axios({
            method: 'post',
            url: url,
            data: data
        }).then(res => {
            if(res.data.status == "ok"){
                data = {
                    "id":res.data.res_data.id,
                    "text": res.data.res_data.name,
                }
                var selection = select2element.val();

                if ($(select2element).find("option[value='" + res.data.res_data.name + "']").length) {
                    $(select2element).find("option[value='" + res.data.res_data.name + "']").attr('value',res.data.res_data.id);
                    $(select2element).val(res.data.res_data.id).trigger('change');
                } else {
                    var option = new Option(res.data.res_data.name, res.data.res_data.id, true, true);
                    $(select2element).append(option).trigger('change');
                    // console.log("selection =", selection);
                }
                console.log("selection =", selection);
            }
        })
    }
});

</script>


<script>

    $('#plus-btn-data-car').on('click',function(){


        var myvar = '<div class="d-flex mt-3">'+
'                                <div class="" style="border: 1px solid;padding:10px;width: 97%;">'+
'                                    <div class="row mt-3">'+
''+
'                                        <div class="col-sm-3">'+
'                                           <label class="form-control-label"><b>Schedule </b><span class="tx-danger">*</span></label>'+
'                                            <select class="form-control" name="schedule[]">'+
'                                                <option><-- Select Type --></option>'+
'                                                <option value="0">Day</option>'+
'                                                <option value="1">Hours</option>'+
'                                            </select>'+
''+
'                                        </div>'+
''+
'                                        <div class="col-sm-3">'+
'                                           <label class="form-control-label"><b>Adult or Child </b><span class="tx-danger">*</span></label>'+
'                                            <select class="form-control" name="age_type[]">'+
'                                                <option><-- Select Type --></option>'+
'                                                <option value="0">Adult</option>'+
'                                                <option value="1">Child</option>'+
'                                            </select>'+
'                                        </div>'+
''+
'                                        <div class="col-sm-3">'+
    '                                        <label class="form-control-label"><b>Price </b><span class="tx-danger">*</span></label>'+
'                                            <input  value="" type="number" name="price[]" class="form-control" placeholder="Enter Price">'+
'                                        </div>'+
'                                        <div class="col-sm-3">'+
    '                                        <label class="form-control-label"><b>Discount </b><span class="tx-danger">*</span></label>'+
'                                            <input  value="" type="number" name="discount[]" class="form-control" placeholder="Enter Price">'+
'                                        </div>'+
''+
'                                    </div>'+
''+
'                                </div>'+
'                                 <a href="javascript:void(0)" class="minus-btn-data-car px-1 p-0 m-0 ml-2"><i class="fas fa-minus-circle"></i></a>'+
'                            </div>';




        $('.show-add-car-data').prepend(myvar);

    });
    $(document).on('click','.minus-btn-data-car',function(){
        $(this).parent().remove();
    });

</script>








<script>

// $(document).ready(function() {
//     $(".add-no-exists").select2({
//         // tags: true
//         createTag: function (params) {
//             var term = $.trim(params.term);
//             console.log(term);
//             if (term === '') {
//                 return null;
//             }
//             return {
//                 id: term,
//                 text: term,
//                 newTag: true
//             }
//         },
//         tags: true
//     }).on('select2:select', function(e){
//         // console.log(e.params.data.tag)
//         // console.log(e.params.data.newTag)
//         var select2element = $(this);
//         console.log( $(this).attr('id'));
//         if (e.params.data.newTag === true) {
//             select2function(e.params.data.text,$(this).attr('id'),select2element)
//         }
//     });

//     function select2function(val,type,select2element){
//         console.log(type);
//         let url = '{{ url("add-new-select2-car") }}' ;
//         let data = {val:val,'type':type};
//         axios({
//             method: 'post',
//             url: url,
//             data: data
//         }).then(res => {
//             if(res.data.status == "ok"){
//                 data = {
//                     "id":res.data.res_data.id,
//                     "text": res.data.res_data.name,
//                 }
//                 var selection = select2element.val();

//                 if ($(select2element).find("option[value='" + res.data.res_data.name + "']").length) {
//                     $(select2element).find("option[value='" + res.data.res_data.name + "']").attr('value',res.data.res_data.id);
//                     $(select2element).val(res.data.res_data.id).trigger('change');
//                 } else {
//                     var option = new Option(res.data.res_data.name, res.data.res_data.id, true, true);
//                     $(select2element).append(option).trigger('change');
//                     // console.log("selection =", selection);
//                 }
//                 console.log("selection =", selection);
//             }
//         })
//     }
// });


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



<script src="{{asset('public/backend')}}/lib/summernote/summernote-bs4.min.js"></script>

<!--- Start Summernote Editor Js ---->
<script>

    $(document).ready(function() {
        /*** summernote editor one ***/
        $('#summernote').summernote({
            height: 150
        })
        /*** summernote editor two ***/
        $('#summernote_two').summernote({
            height: 150
        })

        $('#summernote_three').summernote({
            height: 150
        })
        $('#summernote_four').summernote({
            height: 150
        })

    });

    </script>
<!--- End Summernote Editor Js ---->


{{--

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
  $(document).ready(function() {
      $('.multipleSelect2Search').select2();
  });
</script>
<script>
  $(document).ready(function() {
      $('.multipleSelectSearch').select2();
  });
</script>

<script>
  $(function(){
  'use strict';

  $('#datatable1').DataTable({
      responsive: true,
      language: {
      searchPlaceholder: 'Search...',
      sSearch: '',
      lengthMenu: '_MENU_ items/page',
      }
  });

  $('#datatable2').DataTable({
      bLengthChange: false,
      searching: false,
      responsive: true
  });

  // Select2
  $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

  });
</script> --}}




<script>
    var imagecount=0;
    $(document).on('change','.upload-img-pack',function(){
        var files = $(this).get(0).files;

        for(let i=0;i<files.length;i++)
        {
            var file = files[i];
            var reader = new FileReader();
            reader.readAsDataURL(file);
            var arg=this;
            reader.addEventListener("load", function(e) {
                var image = e.target.result;
                var out = '<div class="col-sm-3">';
                    out += '<div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 100px;">';

                    out += '<span id="close" onclick="this.parentNode.parentNode.remove(); return false;">X</span>'
                    out+= '<img class="display-upload-img" style="width: 100px;height: 70px;" src="'+image+'" alt="">';
                    out += '<input type="file" name="file[]" class="form-control load_file_'+imagecount+'" placeholder="Enter Activity Image" style="display:none;">';
                    out += '</div></div>';

                $('.add_image_file').append(out);
                var df = new DataTransfer;
                df.items.add(file);

                $(document).find('.load_file_'+imagecount)[0].files=df.files;

                imagecount++;
            });

        }

    });

</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.3.4/axios.min.js"></script>
<!--- Start ajax Sub Category Get Script-------->
<script>
    $('body').on("change",'#cat',function(){
        let id = $(this).val();

        getSubCategory(id,"subCat");
    });

    function getSubCategory(id,outid){
        let url = '{{ url("/get/subcat/") }}/' + id;
        axios.get(url)
            .then(res => {
                console.log(res);
            $('#'+outid).empty();
                let html = '';
                html += '<option value="">Select Sub category</option>'
                res.data.forEach(element => {
                    html += "<option value=" + element.id + ">" + element.name + "</option>"
                });


                $('#'+outid).append(html);
                $('#'+outid).val("").change();
            });
    }
</script>
<!--- End ajax Sub Category Get Script-------->






<script>

    //Audio Contents start
    $(document).ready(function() {
            $(document).on('click','#plus-btn-data-content',function(){



                var myvar = '<div class="d-flex align-items-center mt-2 row">'+
    '                                            <div class="col-md-5">'+
    '                                                <label class="form-control-label"><b>Audio Name:</b></label>'+
    '                                                <div class="d-flex  align-items-center select-add-section " >'+
    '                                                    <input type="text" name="audio_name[]" value="{{ old('$audio_name') }}" class=" form-control" placeholder="Audio Content Name">'+
    '                                                </div>'+
    '                                            </div>'+
    '                                            <div class="col-md-4">'+
    '                                                <label class="form-control-label"><b>Audio File:</b></label>'+
    '                                                <div class="d-flex  align-items-center select-add-section">'+
    '                                                    <input type="file" accept="audio/*" name="audio_file[]" value="{{ old('$audio_file') }}" class=" form-control">'+
    '                                                </div>'+
    '                                            </div>'+
    '                                            <div class="col-md-2">'+
    '                                                <label class="form-control-label"><b>Is Free:</b></label>'+
    '                                                <div class="d-flex  align-items-center select-add-section" style="width: 50%;">'+
    '                                                    <input type="checkbox" name="is_free_audio[]" value="1" class=" " >'+
    '                                                </div>'+
    '                                            </div>'+
    '                                            <a href="javascript:void(0)" class="minus-btn-data-content px-1 p-0 m-0 ml-2"><i class="fas fa-minus-circle"></i></a>'+
    '                                        </div>';


    $('.add-data-content').prepend(myvar);
                //console.log();
            });

            $(document).on('click','.minus-btn-data-content',function(){
                $(this).parent().remove();
            });


        });

    //Audio Contents end
    </script>


    <script>

        //Video Contents start
        $(document).ready(function() {
                $(document).on('click','#plus-btn-data-content-video',function(){



                    var myvar = '<div class="d-flex align-items-center mt-2 row">'+
        '                                            <div class="col-md-5">'+
        '                                                <label class="form-control-label"><b>Video Name:</b></label>'+
        '                                                <div class="d-flex  align-items-center select-add-section " >'+
        '                                                    <input type="text" name="video_name[]" value="{{ old('$video_name') }}" class=" form-control" placeholder="Video Content Name">'+
        '                                                </div>'+
        '                                            </div>'+
        '                                            <div class="col-md-4">'+
        '                                                <label class="form-control-label"><b>Video File:</b></label>'+
        '                                                <div class="d-flex  align-items-center select-add-section">'+
        '                                                    <input type="file" accept="video/*" name="video_file[]" value="{{ old('$video_file') }}" class=" form-control">'+
        '                                                </div>'+
        '                                            </div>'+
        '                                            <div class="col-md-2">'+
        '                                                <label class="form-control-label"><b>Is Free:</b></label>'+
        '                                                <div class="d-flex  align-items-center select-add-section" style="width: 50%;">'+
        '                                                    <input type="checkbox" name="is_free_video[]" value="1" class=" " >'+
        '                                                </div>'+
        '                                            </div>'+
        '                                            <a href="javascript:void(0)" class="minus-btn-data-content-video px-1 p-0 m-0 ml-2"><i class="fas fa-minus-circle"></i></a>'+
        '                                        </div>';


        $('.add-data-content-video').prepend(myvar);
                    //console.log();
                });

                $(document).on('click','.minus-btn-data-content-video',function(){
                    $(this).parent().remove();
                });


            });

        //Video Contents end
        </script>

@endsection
