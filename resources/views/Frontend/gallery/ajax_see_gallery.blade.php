@foreach ($gallerys as $key=>$gallery)
<div class="col-xl-3 col-md-6">
    <div class="">
    <a href="javascript:void(0)" class="course-card_img d-block pt-4 px-4" data-toggle="modal" data-target="#GalleryModal" data-key="{{ $key }}" data-image="{{ @$gallery->image_show }}">
      <img src="{{ @$gallery->image_show }}" class="img-fluid rounded-2 w-100" alt="{{ @$gallery->name }}">
    </a>
  </div>
</div>
@endforeach