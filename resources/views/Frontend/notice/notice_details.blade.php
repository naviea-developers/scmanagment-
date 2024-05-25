@extends('Frontend.layouts.master-layout')
@section('title','- notice details')
@section('head')
<link href="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/css/notice.css" rel="stylesheet">
<link>
@endsection
@section('main_contend')
@include('Frontend.layouts.parts.header-menu')
<br><br><br><br>

<body data-rsssl="1" class="archive category category-notice-and-events category-3 et_pb_button_helper_class et_fullwidth_nav et_non_fixed_nav et_show_nav et_cover_background et_secondary_nav_enabled et_pb_gutter windows et_pb_gutters3 et_primary_nav_dropdown_animation_fade et_secondary_nav_dropdown_animation_fade et_pb_footer_columns4 et_header_style_split et_right_sidebar et_divi_theme et-db et_minified_js et_minified_css">
    <div id="page-container">
        <div id="et-main-area">
            <div id="main-content">
                <div class="container" style="width: 100%; max-width: 1296px;">
                    <div id="content-area" class="clearfix">
                        <div id="left-area">
                            <article id="post-405" class="et_pb_post post-405 post type-post status-publish format-standard hentry category-notice-and-events">
                            <h2 class="entry-title"><a href="{{ route('frontend.notice_details',$notice->id) }}">{{ @$notice->name }}</a></h2>
                            <p class="post-meta">
                                    <span class="published">{{ @$notice->created_at->diffForHumans() }}</span> | 
                                    <a href="{{ route('frontend.notice_details',$notice->id) }}" rel="category tag">Notice type : {{ @$notice->type }}</a>
                            </p>
                            {!! @$notice->description !!}
                            </article>
                        </div> 
                        <div id="sidebar">
                            {{-- <div id="search-2" class="et_pb_widget widget_search">
                                <form role="search"  method="get" id="searchform" class="searchform" action="">
                                    <div>
                                        <label class="screen-reader-text" for="s">Search for:</label>
                                        <input type="text"  name="search" value="{{ @$search }}" id="s" />
                                        <input type="submit" id="searchsubmit" value="Search" />
                                    </div>
                                </form>
                            </div>   --}}
                            <div id="recent-posts-2" class="et_pb_widget widget_recent_entries"> 
                                <h4 class="widgettitle">Recent Posts</h4> 
                                <ul>
                                    @foreach ($notices as $notice)
                                        <li><a href="{{ route('frontend.notice_details',$notice->id) }}">{{ @$notice->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                       </div> 
                    </div> 
                </div> 
            </div> 
        </div> 
    </div> 
</body>

@include('Frontend.layouts.parts.news-letter')
@endsection

