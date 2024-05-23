@foreach ($gallerys as $gallery)
    <div class="col-xl-3 col-md-6" >
        <!--Start Course Card-->
        {{-- <div class="course-card rounded bg-white position-relative overflow-hidden shadow-none border"> --}}
        <div class="">
        <!--Start Course Image-->
        <a href="javascript:void(0)" class="course-card_img d-block pt-4 px-4">
            <img src="{{ @$gallery->image_show }}" class="img-fluid rounded-2 w-100" alt="{{ @$gallery->name }}">
        </a>
        </div>
        <!--End Course Card-->
    </div>
@endforeach				