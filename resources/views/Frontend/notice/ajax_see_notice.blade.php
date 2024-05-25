@foreach ($notices as $notice)
<article id="post-405" class="et_pb_post post-405 post type-post status-publish format-standard hentry category-notice-and-events">
<h2 class="entry-title"><a href="{{ route('frontend.notice_details',$notice->id) }}">{{ @$notice->name }}</a></h2>
<p class="post-meta">
     {{-- by <span class="author vcard"><a href="https://sunshinecssc.com/author/director-cssc/" title="Posts by Sameer Rahman" rel="author">Sameer Rahman</a></span> | --}}
     <span class="published">{{ @$notice->created_at->diffForHumans() }}</span> | 
     <a href="{{ route('frontend.notice_details',$notice->id) }}" rel="category tag">Notice type : {{ @$notice->type }}</a>
</p>
{!! @$notice->description !!}
</article>
@endforeach