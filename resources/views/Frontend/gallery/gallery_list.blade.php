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
                <div class="col-xl-3 col-md-6" >
                  <!--Start Course Card-->
                  {{-- <div class="course-card rounded bg-white position-relative overflow-hidden shadow-none border"> --}}
                    <div class="">
                    <!--Start Course Image-->
                    <a href="javascript:void(0)" class="course-card_img d-block pt-4 px-4" data-toggle="modal" data-target="#GalleryModal{{ $key }}">
                      <img src="{{ @$gallery->image_show }}" class="img-fluid rounded-2 w-100" alt="{{ @$gallery->name }}">
                      {{-- <p></p> --}}
                    </a>
                  </div>
                  <!--End Course Card-->
                </div>

                    <!-- Modal Start-->
                    <div class="modal fade" id="GalleryModal{{ $key }}" tabindex="-1" role="dialog" aria-labelledby="audioModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">                         
                              <img src="{{ @$gallery->image_show  }}" alt="lession_file" style="height: 300px; width:450px">
                            </div>
                          <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          </div>
                      </div>
                      </div>
                  </div>
                 <!-- Modal END-->
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
              @endif
            </div>
          </div>
        </div>
      </div>
  </div>

@include('Frontend.layouts.parts.news-letter')
@endsection


@section('script')
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