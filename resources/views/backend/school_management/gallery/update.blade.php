@section('title')
    Admin - edit gallery
@endsection

@extends('Backend.layouts.layouts')

@section('main_contain')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader">
          <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('admin.dashboard')}}">Home</a>
            <a class="breadcrumb-item" href="{{route('admin.gallery.index')}}"> <i class="icon ion-reply text-22"></i> All Gallery Image</a>
          </nav>
        </div><!-- br-pageheader -->

        <div class="br-pagebody">
          <div class="br-section-wrapper">
            <h6 class="br-section-label text-center mb-4"> Update Gallery Item</h6>
               {{-- validate start  --}}
               @if(count($errors) > 0)
               @foreach($errors->all() as $error)
                   <div class="alert alert-danger">{{ $error }}</div>
               @endforeach
               @endif
               {{-- validate End  --}}

            <!----- Start Update Category Form input ------->
            <div class="col-xl-7 mx-auto">
                <div class="form-layout form-layout-4 py-5">

                    <form action="{{ route('admin.gallery.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12 ">
                                <label class="form-control-label">Name: </label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <input type="text" name="name" class="form-control" placeholder="Enter Item Name" value="{{ $item->name }}">
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <label class="form-control-label">Select Type: <span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="imageRadio" name="media_type" value="image" class="custom-control-input" {{ $item->media_type == 'image' ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="imageRadio">Image</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="videoRadio" name="media_type" value="video" class="custom-control-input" {{ $item->media_type == 'video' ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="videoRadio">Video</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3" id="imageUpload" {{ $item->media_type != 'image' ? 'style=display:none;' : '' }}>
                            <label class="form-control-label">Image: </label>
                            <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                                <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 150px;">
                                    <img class="display-upload-img" style="width: 150px;height: 70px;" src="{{ $item->image_show }}" alt="">
                                    <input type="file" name="image" accept="image/png, image/gif, image/jpeg" class="form-control upload-img" placeholder="Enter Activity Image" style="position: absolute;top: 0;opacity: 0;height: 100%;">
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3" id="videoUpload" {{ $item->media_type != 'video' ? 'style=display:none;' : '' }}>

                          <label class="form-control-label">Video Thumbnail: <span class="tx-danger">*</span></label>
                          <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                              <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 150px;">
                                  <img class="display-upload-img" style="width: 150px;height: 70px;" src="{{ $item->thumbnail_show }}" alt="">
                                  <input type="file" accept="image/png, image/gif, image/jpeg" name="thumbnail" class="form-control upload-img" placeholder="Enter Activity Image" style="position: absolute;top: 0;opacity: 0;height: 100%;">
                              </div>
                          </div>


                          <div class="d-flex mt-2">
                            <div class="col-sm-9 ">
                              <label class="form-control-label">Video: </label>
                              <div class=" mg-t-10 mg-sm-t-0">
                                  <input type="file" name="video" accept="video/*" class="form-control">
                              </div>
                            </div>
                            
                            <div class="col-sm-2 ">
                              <label class="form-control-label"><b>Play:</b></label>
                              <div class="align-items-center select-add-section">
                                  <a class="btn btn-primary"  data-toggle="modal" data-target="#audio_content"> &nbsp;<i class="fa fa-solid fa-play" style="color: white"></i></a>
                              </div>
                            </div>
                          </div>

                        </div>




                      <div class="modal fade" id="audio_content" tabindex="-1" role="dialog" aria-labelledby="audioModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                          <div class="modal-content">
                              <div class="modal-header">
                              <h5 class="modal-title" id="audioModalLabel">{{ $item->name }}</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                              </div>
                              <div class="modal-body">
                              <!-- Embed your audio here -->
                              <video controls style="width: 100%">
                                  <source src="{{ $item->video_show }}" type="video/mp4">
                                  Your browser does not support the audio tag.
                              </video>
                              </div>
                              <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              </div>
                          </div>
                          </div>
                      </div>


                        <hr>
                        <div class="row mt-3">
                          <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-right">
                            <a href="{{route('admin.gallery.index')}}" type="button" class="btn btn-secondary text-white mr-2" >Cancel</a>
                            <button type="submit" class="btn btn-info ">Update</button>
                          </div>
                        </div>
                    </form>

                </div><!-- form-layout -->
            </div><!-- col-6 -->
            <!----- Start Update Category Form input ------->
          </div><!-- br-section-wrapper -->
        </div><!-- br-pagebody -->

    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const imageRadio = document.getElementById('imageRadio');
            const videoRadio = document.getElementById('videoRadio');
            const imageUpload = document.getElementById('imageUpload');
            const videoUpload = document.getElementById('videoUpload');

            imageRadio.addEventListener('change', function () {
                if (this.checked) {
                    imageUpload.style.display = 'block';
                    videoUpload.style.display = 'none';
                }
            });

            videoRadio.addEventListener('change', function () {
                if (this.checked) {
                    imageUpload.style.display = 'none';
                    videoUpload.style.display = 'block';
                }
            });
        });
    </script>

@endsection
