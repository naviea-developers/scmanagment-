@extends('Frontend.layouts.master-layout')
@section('title','- notice')
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
                        <div id="left-area" class="show-notice-data">
                            @foreach ($notices as $notice)
                                <article id="post-405" class="et_pb_post post-405 post type-post status-publish format-standard hentry category-notice-and-events">
                                <h2 class="entry-title"><a href="{{ route('frontend.notice_details',$notice->id) }}">{{ @$notice->name }}</a></h2>
                                <p class="post-meta">
                                     {{-- by <span class="author vcard"><a href="https://sunshinecssc.com/author/director-cssc/" title="Posts by Sameer Rahman" rel="author">Sameer Rahman</a></span> | --}}
                                     <span class="published">{{ @$notice->created_at->diffForHumans() }}</span> | 
                                     <a href="{{ route('frontend.notice_details',$notice->id) }}" rel="category tag">Notice type : {{ @$notice->type }}</a>
                                </p>         
                                {{ substr( @$notice->description,0,430) }}...
                                <p><a href="{{ route('frontend.notice_pdf_download',$notice->id) }}">click here to download the PDF file.</a></p>
                                </article>
                            @endforeach

                            @if($notices->count() == 0)
                            <div class="text-center">
                                <h2>Data Not Found !</h2>
                            </div>
                            @endif

                            @if($notices->lastPage() != 1)
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

                        <div id="sidebar">
                            <div id="search-2" class="et_pb_widget widget_search">
                                <form role="search"  method="get" id="searchform" class="searchform" action="">
                                    <div>
                                        <label class="screen-reader-text" for="s">Search for:</label>
                                        <input type="text"  name="search" value="{{ @$search }}" id="s" />
                                        <input type="submit" id="searchsubmit" value="Search" />
                                    </div>
                                </form>
                                {{-- <div id="search-2" class="et_pb_widget widget_search">
                                    <form role="search" method="get" id="searchform" class="searchform" action="">
                                        <div>
                                            <label class="screen-reader-text" for="s">Search for:</label>
                                            <input type="text" name="search" value="{{ @$search }}" id="s" />
                                            <input type="submit" id="searchsubmit" value="Search" />
                                        </div>
                                    </form>
                                </div> --}}

                            </div>  
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
@section('script')

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('s');
        const searchForm = document.getElementById('searchform');
        
        if (searchInput && searchForm) {
            searchInput.addEventListener('keypress', function(event) {
                if (event.key === 'Enter') {
                    event.preventDefault(); // Prevent the default form submission
                    const searchValue = searchInput.value;
                    if (searchValue) {
                        console.log('Search started for: ' + searchValue);
                        // Trigger form submission manually
                        searchForm.submit();
                    } else {
                        console.log('Search input is empty');
                    }
                }
            });
        } else {
            if (!searchInput) console.error('Search input element not found');
            if (!searchForm) console.error('Search form not found');
        }
    });
    </script>
    
  <script>
    //lode more
     var curPageNum = "{{ $notices->currentPage() }}";
     var lastPage = "{{ $notices->lastPage() }}";
     let pageN=curPageNum;
   // console.log(department);
    $('#showMore').on('click',function(){
       console.log('hi');
        if(parseInt(lastPage) > parseInt(curPageNum)){
            pageN=parseInt(curPageNum)+1;
            let url = '{{ url("get-notices-all-show") }}' +"?page="+pageN;
            axios.get(url)
            .then(res => {
                // console.log(res);
                curPageNum=parseInt(curPageNum)+1;

                $('.show-notice-data').append(res.data);
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