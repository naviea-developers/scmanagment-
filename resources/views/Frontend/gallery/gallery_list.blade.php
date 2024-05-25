@extends('Frontend.layouts.master-layout')
@section('title','- Gallery')
@section('main_contend')
@include('Frontend.layouts.parts.header-menu')
<div class="content_search" style="margin-top:130px">
    <link href="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/css/blog.css"rel="stylesheet">
     
    <div class="bg-alice-blue py-3 py-lg-4">
      <h1 class="text-center">Gallery</h1>
        <div class="p-2 p-md-5">
          <div class="row">
            <div class="col-md-12">
              <div class="row g-3 show-gallery-data" >
                @foreach ($gallerys as $key=>$gallery)
                <div class="col-xl-3 col-md-6">
                    <div class="">
                    <a href="javascript:void(0)" class="course-card_img d-block pt-4 px-4" data-toggle="modal" data-target="#GalleryModal" data-key="{{ $key }}" data-image="{{ @$gallery->image_show }}">
                      <img src="{{ @$gallery->image_show }}" class="img-fluid rounded-2 w-100" alt="{{ @$gallery->name }}">
                    </a>
                  </div>
                </div>
                @endforeach
              </div>


              @if($gallerys->lastPage() != 1)
                <div class="text-center mt-5">
                  <div id="load75">
                      <button type="button" id="showMore" onClick="all_course_load('75')"
                          class="btn btn-lg btn-dark-cerulean load browse_more_course_txt">
                            Show more <svg class="ms-2" xmlns="http://www.w3.org/2000/svg" width="28.56" height="15.666" viewBox="0 0 28.56 15.666">
                              <path id="right-arrow_3_" data-name="right-arrow (3)"
                                  d="M20.727,107.5l-1.272,1.272,5.661,5.661H0v1.8H25.116l-5.661,5.661,1.272,1.272,7.833-7.833Z"
                                  transform="translate(0 -107.5)" fill="#fff">
                              </path>
                          </svg>
                      </button>
                  </div>
                </div>
            </div>
            @endif
          </div>
        </div>
      </div>
    </div>
</div>



<!-- Modal Start-->
<div class="modal fade" id="GalleryModal" tabindex="-1" role="dialog" aria-labelledby="audioModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-lg" role="document">
    <div class="modal-content bg-transparent shadow">
        <div class="modal-header">
          {{-- <h5 class="modal-title" id="modalTitle" style="color: white"></h5> --}}
        <button type="button" class="close bg-transparent" data-dismiss="modal" aria-label="Close" style="color: red">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">                         
          <img id="modalImage" src="" alt="lesson_file" style="height: 400px; width:100%">
          <!-- Navigation Icons -->
          <div class="navigation-icons" style="color: yellow">
            <span class="prev-image" style="cursor: pointer;" ><i class="fas fa-chevron-left"></i></span>
            <span class="next-image" style="cursor: pointer;" ><i class="fas fa-chevron-right"></i></span>
          </div>
        </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background: red">Close</button>
      </div>
  </div>
  </div>
</div>
<!-- Modal END-->
			

@include('Frontend.layouts.parts.news-letter')

@endsection




@section('script')

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
  $(document).ready(function() {
    $(document).on('click', '.course-card_img', function() {
      var imageSrc = $(this).data('image');
      var title = $(this).data('title');
      $('#modalImage').attr('src', imageSrc);
      $('#modalTitle').text(title);
    });

    // Previous Image Navigation
    $('.prev-image').click(function() {
      var currentImage = $('#modalImage').attr('src');
      var currentImageIndex = $('.show-gallery-data img[src="' + currentImage + '"]').closest('.col-xl-3').index();
      var prevImageIndex = currentImageIndex - 1;
      var prevImageSrc = $('.show-gallery-data .col-xl-3').eq(prevImageIndex).find('img').attr('src');
      if (prevImageSrc) {
        $('#modalImage').attr('src', prevImageSrc);
        var prevImageTitle = $('.show-gallery-data .col-xl-3').eq(prevImageIndex).find('img').attr('alt');
        $('#modalTitle').text(prevImageTitle);
      }
    });

    // Next Image Navigation
    $('.next-image').click(function() {
      var currentImage = $('#modalImage').attr('src');
      var currentImageIndex = $('.show-gallery-data img[src="' + currentImage + '"]').closest('.col-xl-3').index();
      var nextImageIndex = currentImageIndex + 1;
      var nextImageSrc = $('.show-gallery-data .col-xl-3').eq(nextImageIndex).find('img').attr('src');
      if (nextImageSrc) {
        $('#modalImage').attr('src', nextImageSrc);
        var nextImageTitle = $('.show-gallery-data .col-xl-3').eq(nextImageIndex).find('img').attr('alt');
        $('#modalTitle').text(nextImageTitle);
      }
    });
  });
</script>


  
  <script>
    //lode more
    var curPageNum = "{{ $gallerys->currentPage() }}";
     var lastPage = "{{ $gallerys->lastPage() }}";
     let pageN=curPageNum;
   // console.log(department);
    $('#showMore').on('click',function(){
       console.log('hi');
        if(parseInt(lastPage) > parseInt(curPageNum)){
            pageN=parseInt(curPageNum)+1;
            let url = '{{ url("get-gallery-all-show") }}' +"?page="+pageN;
            axios.get(url)
            .then(res => {
                // console.log(res);
                curPageNum=parseInt(curPageNum)+1;

                $('.show-gallery-data').append(res.data);
                if(parseInt(lastPage) == parseInt(curPageNum)){
                    $(this).parent().hide();
                }

            });
        }else{
            $(this).parent().hide();
        }

    });
  </script>
@endsection