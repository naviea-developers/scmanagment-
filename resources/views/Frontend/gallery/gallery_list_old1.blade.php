@extends('Frontend.layouts.master-layout')
@section('title','- Blogs')
@section('head')

@endsection
@section('main_contend')
@include('Frontend.layouts.parts.header-menu')
<br>
<br>
<br>
<br>
<div class="et_pb_gallery_item et_pb_grid_item et_pb_bg_layout_light" style="display: block;">
    <div class="et_pb_gallery_image landscape">
    <a href="https://sunshinecssc.com/wp-content/uploads/2019/02/IMG20170802105120.jpg" title="IMG20170802105120">
    <img src="https://sunshinecssc.com/wp-content/uploads/2019/02/IMG20170802105120-400x284.jpg" alt="IMG20170802105120">
    <span class="et_overlay"></span>
    </a>
    </div></div>
@include('Frontend.layouts.parts.news-letter')
@endsection