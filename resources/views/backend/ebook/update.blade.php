
<div class="br-section-wrapper data-update">
    <h6 class="br-section-label text-center mb-4">Update E-Book Info</h6>
      {{-- validate start  --}}
      
      <div id="update_errors"></div>
      {{-- validate End  --}}
  
    <!----- Start Add Category Form input ------->
    <div class="col-xl-12 mx-auto">
        <div class="form-layout form-layout-4 py-5">

            <form id="data-form-update" action="{{ route('admin.ebook.update', $ebook->id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row align-items-end">
                    <div class="col-sm-4">
                        <label class="form-control-label"><b>Image: </b><span class="tx-danger">*</span></label>
                        <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 150px;">
                            <img class="display-upload-img" style="width: 150px;height: 70px;" src="{{ $ebook->image_show }}" alt="">
                            <input type="file" accept="image/*" name="image" class="form-control upload-img" placeholder="Enter Activity Image" style="position: absolute;top: 0;opacity: 0;height: 100%;">
                        </div>
                    </div>
                </div>

                <div class="row mt-4">


                    <div class="col-sm-6">
                        <label class="form-control-label"><b>Seller :</b><span class="tx-danger">*</span></label>
                        <div class="mg-t-10 mg-sm-t-0">
                            <select id="cat"  class="form-control" name="user_id">
                                <option value="">Select seller</option>
                                @foreach ($selerys as $selery)
                                <option @if($selery->id == $ebook->user_id)  Selected @endif  value="{{ $selery->id}}" >{{ $selery->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <label class="form-control-label"><b>Category :</b><span class="tx-danger">*</span></label>
                        <div class="mg-t-10 mg-sm-t-0">
                            <select id="cat"  class="form-control" name="category_id">
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                <option @if($category->id == $ebook->category_id)  Selected @endif  value="{{ $category->id}}" >{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6 mt-3">
                        <label class="form-control-label"><b>Sub Category :</b><span class="tx-danger">*</span></label>
                        <div class="mg-t-10 mg-sm-t-0">
                            <select id="subCat"  class="form-control" name="sub_category_id">
                                <option value="">------ Select Sub category ------</option>
                                @foreach ( $sub_categories as $sub_category)
                                <option @if($sub_category->id == $ebook->sub_category_id)  Selected @endif  value="{{ $sub_category->id}}" >{{ $sub_category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6 mt-3">
                        <label class="form-control-label"><b>Subject: </b><span class="tx-danger">*</span></label>
                        <div class="mg-t-10 mg-sm-t-0">
                            <input type="text" name="title" value="{{ $ebook->title }}" class="form-control" placeholder="Enter Subject" required>

                        </div>
                    </div>
                    <div class="col-sm-6 mt-3">
                        <label class="form-control-label"><b>Lesson: </b><span class="tx-danger">*</span></label>
                        <div class="mg-t-10 mg-sm-t-0">
                            <input type="text" name="lesson" value="{{ $ebook->lesson }}" class="form-control" placeholder="Enter Lesson" required>

                        </div>
                    </div>
                    <div class="col-sm-6 mt-3">
                        <label class="form-control-label"><b>Headline: </b><span class="tx-danger">*</span></label>
                        <div class="mg-t-10 mg-sm-t-0">
                            <input type="text" name="headline" value="{{ $ebook->headline }}" class="form-control" placeholder="Enter Headline" required>

                        </div>
                    </div>

                    <div class="col-sm-4 mt-3">
                        <label class="form-control-label"><b>Price: </b><span class="tx-danger">*</span></label>
                        <div class="mg-t-10 mg-sm-t-0">
                            <input type="number" name="fee" value="{{ $ebook->fee }}" class="form-control" placeholder="Enter Price" required>

                        </div>
                    </div>
                    <div class="col-sm-4 mt-3">
                        <label class="form-control-label"><b>Discount: </b></label>
                        <div class="mg-t-10 mg-sm-t-0">
                            <input type="number" name="discount" value="{{ $ebook->discount }}" class="form-control" placeholder="Enter Discount" >

                        </div>
                    </div>

                    <div class="col-sm-4 mt-3">
                        <label class="form-control-label"><b>Discount Type:</b> </label>
                        <div class="mg-t-10 mg-sm-t-0">
                            <select class="form-control" name="discount_type">
                            <option value="">Select Discount type</option>
                            <option @if ($ebook->discount_type == 0) Selected @endif value="0">Percent (%)</option>
                            <option @if ($ebook->discount_type == 1) Selected @endif value="1">Fixed</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6 mt-3">
                        <label class="form-control-label"><b>Related Ebook :</b></label>
                        <div class="mg-t-10 mg-sm-t-0">
                            <select class="form-control multipleSelect2Search-edit custom-select" name="relatedebook_id[]" multiple>
                                <option value="">Select ebook</option>
                                {{-- @foreach ($ebooks as $ebok)
                                <option @if ($ebok->relatedebooks->where('relatedebook_id', $ebok->id)->first()) Selected @endif value="{{ $ebok->id }}">{{ $ebok->title }}</option>
                                @endforeach --}}
                                @foreach ($ebooks as $ebok)
                                <option @if ($ebok->relatedebooks->where('ebook_id', $ebook->id)->all()) Selected @endif value="{{ $ebok->id }}">{{ $ebok->title }}</option>
                                @endforeach
                            </select>
                            </div>
                    </div>

                    <div class="col-sm-5 mt-3">
                        <label class="form-control-label"><b>Content Audio: </b></label>
                        <div class="mg-t-10 mg-sm-t-0">
                            <input type="file" accept="audio/*" name="content_audio" value="{{ $ebook->content_audio }}" class="form-control" >

                        </div>
                    </div>

                    <div class="col-md-1 mt-3">
                        <label class="form-control-label"><b>Play:</b></label>
                        <div class="d-flex  align-items-center select-add-section">
                            <a class="btn btn-primary"  data-toggle="modal" data-target="#audio_content"> &nbsp;<i class="fa fa-solid fa-play" style="color: white"></i></a>
                        </div>
                    </div>




                    <div class="modal fade" id="audio_content" tabindex="-1" role="dialog" aria-labelledby="audioModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="audioModalLabel">{{ $ebook->title }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                            <!-- Embed your audio here -->
                            <audio controls style="width: 100%">
                                <source src="{{ $ebook->content_audio_show }}" type="audio/mp3">
                                Your browser does not support the audio tag.
                            </audio>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                        </div>
                    </div>

                    <div class="col-sm-12 mt-3">
                        <label class="form-control-label"><b>E-Book Description </b></label>
                        <div class="mg-t-10 mg-sm-t-0">
                            <textarea type="text" name="short_desctiption"  class="form-control" id="summernote_two" placeholder="Long Description" >{{ $ebook->short_desctiption }}</textarea>
                        </div><br>
                    </div>

                    <div class="col-sm-12 mt-3">
                        <label class="form-control-label"><b>E-Book Content </b></label>
                        <div class="mg-t-10 mg-sm-t-0">
                            <textarea type="text" name="long_desctiption" class="form-control" id="summernote" placeholder="Long Description" >{{ $ebook->long_desctiption }}</textarea>
                        </div><br>
                    </div>


                    {{-- Audio Content --}}
                    <div class="col-sm-12 mt-3" style="border: 1px solid;padding:10px">
                        <label class="form-control-label"><h5>Audio Content:</h5></label>
                        <div class="mg-t-10 mg-sm-t-0 add-data-content">
                            @if($ebook->audio->count() == 0)
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
                                <div class="col-md-2">
                                    <label class="form-control-label"><b>Is Free:</b></label>
                                    <div class="d-flex  align-items-center select-add-section" style="width: 50%;">
                                        <input type="checkbox" name="is_free_audio[]" value="1" class=" " >
                                    </div>
                                </div>
                                <a id="plus-btn-data-content" href="javascript:void(0)" class="plus-btn-data-content px-1 p-0 m-0 ml-2"><i class="fas fa-plus"></i></a>
                            </div>
                            @else
                            @foreach ($ebook->audio as $k=>$item)
                            <div class="d-flex align-items-center mt-2 row">
                                <div class="col-md-5">
                                    <label class="form-control-label"><b>Audio Name:</b></label>
                                    <div class="d-flex  align-items-center select-add-section " >
                                        <input type="text" name="old_audio_name[{{ $item->id }}]" value="{{ $item->audio_name }}" class=" form-control" placeholder="Audio Content Name">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-control-label"><b>Audio File:</b></label>
                                    <div class="d-flex  align-items-center select-add-section">
                                        <input type="file"  accept="audio/*"  name="old_audio_file[{{ $item->id }}]"  value="{{ $item->audio_file }}" class=" form-control">
                                        {{-- <input type="hidden"  name="old_audio_file[{{ $item->id }}]"  value="{{ $item->audio_file }}" class=" form-control"> --}}
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <label class="form-control-label"><b>Play:</b></label>
                                    <div class="d-flex  align-items-center select-add-section">
                                        <a class="btn btn-primary"  data-toggle="modal" data-target="#audioModal{{ $k }}"> &nbsp;<i class="fa fa-solid fa-play" style="color: white"></i></a>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label class="form-control-label"><b>Is Free:</b></label>
                                    <div class="d-flex  align-items-center select-add-section" style="width: 50%;">
                                        <input type="checkbox" name="old_is_free_audio[{{ $item->id }}]" @if ($item->is_free == 1) Checked @endif value="1" class=" " >
                                    </div>
                                </div>
                                @if($k == $ebook->audio->count() - 1)
                                <a id="plus-btn-data-content" href="javascript:void(0)" class="plus-btn-data-content px-1 p-0 m-0 ml-2"><i class="fas fa-plus"></i></a>
                                @else
                                <a audio_file_id="{{ $item->id }}" href="javascript:void(0)" class="minus-btn-data-old-audio px-1 p-0 m-0 ml-2"><i class="fas fa-minus-circle"></i></a>
                                @endif

                            </div>



                                <!-- Modal -->
                            <div class="modal fade" id="audioModal{{ $k }}" tabindex="-1" role="dialog" aria-labelledby="audioModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="audioModalLabel">{{ $item->audio_name }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                    <!-- Embed your audio here -->
                                    <audio controls style="width: 100%">
                                        <source src="{{ $item->audio_file_show }}" type="audio/mp3">
                                        Your browser does not support the audio tag.
                                    </audio>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                                </div>
                            </div>


                            @endforeach
                            @endif
                        </div>
                    </div>

                    {{-- Video Content --}}
                    <div class="col-sm-12 mt-3" style="border: 1px solid;padding:10px">
                        <label class="form-control-label"><h5>Video Content:</h5></label>
                        <div class="mg-t-10 mg-sm-t-0 add-data-content-video">
                            @if($ebook->video->count() == 0)
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
                            @else
                            @foreach ($ebook->video as $k=>$item)
                            <div class="d-flex align-items-center mt-2 row">
                                <div class="col-md-5">
                                    <label class="form-control-label"><b>Video Name:</b></label>
                                    <div class="d-flex  align-items-center select-add-section " >
                                        <input type="text" name="old_video_name[{{ $item->id }}]" value="{{ $item->video_name }}" class=" form-control" placeholder="Video Content Name">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-control-label"><b>Video File:</b></label>
                                    <div class="d-flex  align-items-center select-add-section">
                                        <input type="file" accept="video/*" name="old_video_file[{{ $item->id }}]" value="{{ $item->video_file }}" class=" form-control">
                                    </div>
                                </div>


                                <div class="col-md-1">
                                    <label class="form-control-label"><b>Play:</b></label>
                                    <div class="d-flex  align-items-center select-add-section">
                                        <a class="btn btn-primary"  data-toggle="modal" data-target="#videoModal{{ $k }}"> &nbsp;<i class="fa fa-solid fa-play" style="color: white"></i></a>
                                    </div>
                                </div>


                                <div class="col-md-2">
                                    <label class="form-control-label"><b>Is Free:</b></label>
                                    <div class="d-flex  align-items-center select-add-section" style="width: 50%;">
                                        <input type="checkbox" name="old_is_free_video[{{ $item->id }}]" @if ($item->is_free == 1) Checked @endif value="1" class=" " >
                                    </div>
                                </div>
                                @if($k == $ebook->video->count() - 1)
                                <a id="plus-btn-data-content-video" href="javascript:void(0)" class="plus-btn-data-content-video px-1 p-0 m-0 ml-2"><i class="fas fa-plus"></i></a>
                                @else
                                <a video_file_id="{{ $item->id }}" href="javascript:void(0)" class="minus-btn-data-old-video px-1 p-0 m-0 ml-2"><i class="fas fa-minus-circle"></i></a>
                                @endif
                            </div>


                            <!-- Modal -->
                            <div class="modal fade" id="videoModal{{ $k }}" tabindex="-1" role="dialog" aria-labelledby="videoModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="videoModalLabel">{{ $item->video_name }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                    <!-- Embed your video here -->
                                    {{-- <iframe width="100%" height="315" src="{{ $item->video_file }}" frameborder="0" allowfullscreen></iframe> --}}
                                    <video controls height="350px" width="460px">
                                        <source src="{{ $item->video_file_show }}" type="video/mp4" autoplay >
                                    </video>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                                </div>
                            </div>




                            @endforeach
                            @endif
                        </div>
                    </div>


                </div>


                <div class="row mt-4">
                    <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-right">
                        <a href="javascript:void(0);" type="button" class="btn-cancel btn btn-secondary text-white mr-2" >Cancel</a>
                        <button type="submit" class="btn btn-info btn-update">Update</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
       


