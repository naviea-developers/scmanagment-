@extends('Frontend.layouts.master-layout')
@section('title','- Gallery')
@section('main_contend')
@include('Frontend.layouts.parts.header-menu')
<div class="content_search container" style="margin-top:130px">
    <link href="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/css/blog.css" rel="stylesheet">
     
    <div class="bg-alice-blue ">
        <div class="p-2 p-md-2">
            <div class="row">

                <div class="col-md-9">
                    <h3 id="gallery-title" style="color: var(--text_color)">Gallery</h3>
                    <hr>
                    <div class="row g-3 show-gallery-data" id="gallery-content">
                        @foreach ($gallerys as $key=>$gallery)
                        <div class="col-xl-4 col-md-6 gallery-item" data-type="{{ $gallery->media_type }}">
                            <div class="">
                                @if ($gallery->media_type == 'image')
                                <a href="javascript:void(0)" class="course-card_img d-block pt-4 px-4" data-toggle="modal" data-target="#GalleryModal" data-key="{{ $key }}" data-image="{{ @$gallery->image_show }}" data-title="{{ @$gallery->name }}">
                                    <img src="{{ @$gallery->image_show }}" class="img-fluid rounded-2 w-100" alt="{{ @$gallery->name }}" style="height: 200px">
                                </a>
                                @elseif ($gallery->media_type == 'video')
                                <a href="#" class="course-card_img d-block pt-4 px-4" data-toggle="modal" data-target="#GalleryModal{{ $key }}">
                                    <div style="position: relative; width: 100%; height: 200px;">
                                        <img src="{{ @$gallery->thumbnail_show }}" class="img-fluid rounded-2 w-100" alt="{{ @$gallery->name }}" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;">
                                        <img src="{{ asset('public/img/play.png') }}" class="img-fluid rounded-2 w-50" alt="play-icon" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); height:100px; width:30px">
                                    </div>
                                </a>
                                @endif
                            </div>
                            
                            <!-- Modal -->
                            <div class="modal fade" id="GalleryModal{{ $key }}" tabindex="-1" role="dialog" aria-labelledby="GalleryModalLabel{{ $key }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content bg-transparent">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="GalleryModalLabel{{ $key }}" style="color: white">{{ @$gallery->name }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <video controls style="width: 100%;">
                                                <source src="{{ @$gallery->video_show }}" type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    @if($gallerys->lastPage() != 1)
                    <div class="text-center mt-5">
                        <div id="load75">
                            <button type="button" id="showMore" onClick="all_course_load('75')" class="btn btn-lg btn-dark-cerulean load browse_more_course_txt">
                                Show more
                            </button>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="col-md-3" style="color: var(--text_color)">
                    <h3 style="color: var(--text_color)">Related Topics</h3>
                    <hr>
                    <div class="page-sidebar-list">
                        <ul class="list-group">                                                                                                                                                                                                                                                                                                                                                                                                   
                            <li class="list-group-item"><a href="#" class="filter-link" data-filter="all"><i class="fa fa-angle-double-right" aria-hidden="true"></i> All</a></li>
                            <li class="list-group-item"><a href="#" class="filter-link" data-filter="image"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Photo Gallery</a></li>
                            <li class="list-group-item"><a href="#" class="filter-link" data-filter="video"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Video Gallery‌</a></li>                                                                                                                                                                                                         
                        </ul>
                    </div>
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
                <h5 class="modal-title" id="modalTitle" style="color: white"></h5>
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
    // Filter gallery items
    $('.filter-link').click(function(e) {
        e.preventDefault();
        var filter = $(this).data('filter');
        filterGallery(filter);
        updateTitle(filter);
    });

    function filterGallery(filter) {
        if (filter === 'all') {
            $('.gallery-item').show();
        } else {
            $('.gallery-item').hide();
            $('.gallery-item[data-type="' + filter + '"]').show();
        }
    }

    function updateTitle(filter) {
        var title = 'Gallery';
        if (filter === 'image') {
            title = 'Photo Gallery';
        } else if (filter === 'video') {
            title = 'Video Gallery';
        }
        $('#gallery-title').text(title);
    }

    // Show image in modal
    $(document).on('click', '.course-card_img', function() {
        var imageSrc = $(this).data('image');
        var title = $(this).data('title');
        $('#modalImage').attr('src', imageSrc);
        $('#modalTitle').text(title);
    });

    // Previous Image Navigation
    $('.prev-image').click(function() {
        var currentImage = $('#modalImage').attr('src');
        var currentImageIndex = $('.show-gallery-data img[src="' + currentImage + '"]').closest('.col-xl-4').index();
        var prevImageIndex = currentImageIndex - 1;
        var prevImageSrc = $('.show-gallery-data .col-xl-4').eq(prevImageIndex).find('img').attr('src');
        if (prevImageSrc) {
            $('#modalImage').attr('src', prevImageSrc);
            var prevImageTitle = $('.show-gallery-data .col-xl-4').eq(prevImageIndex).find('img').attr('alt');
            $('#modalTitle').text(prevImageTitle);
        }
    });

    // Next Image Navigation
    $('.next-image').click(function() {
        var currentImage = $('#modalImage').attr('src');
        var currentImageIndex = $('.show-gallery-data img[src="' + currentImage + '"]').closest('.col-xl-4').index();
        var nextImageIndex = currentImageIndex + 1;
        var nextImageSrc = $('.show-gallery-data .col-xl-4').eq(nextImageIndex).find('img').attr('src');
        if (nextImageSrc) {
            $('#modalImage').attr('src', nextImageSrc);
            var nextImageTitle = $('.show-gallery-data .col-xl-4').eq(nextImageIndex).find('img').attr('alt');
            $('#modalTitle').text(nextImageTitle);
        }
    });

    // Show more button
    $('#showMore').on('click', function() {
        if (parseInt(lastPage) > parseInt(curPageNum)) {
            pageN = parseInt(curPageNum) + 1;
            let url = '{{ url("get-gallery-all-show") }}' + "?page=" + pageN;
            axios.get(url)
                .then(res => {
                    curPageNum = parseInt(curPageNum) + 1;
                    $('#gallery-content').append(res.data);
                    if (parseInt(lastPage) == parseInt(curPageNum)) {
                        $(this).parent().hide();
                    }
                });
        } else {
            $(this).parent().hide();
        }
    });
});
</script>
@endsection
