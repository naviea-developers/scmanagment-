{{-- @foreach ($notices as $notice)
<article id="post-405" class="et_pb_post post-405 post type-post status-publish format-standard hentry category-notice-and-events">
<h2 class="entry-title"><a href="{{ route('frontend.notice_details',$notice->id) }}">{{ @$notice->name }}</a></h2>
<p class="post-meta">
     <span class="published">{{ @$notice->created_at->diffForHumans() }}</span> | 
     <a href="{{ route('frontend.notice_details',$notice->id) }}" rel="category tag">Notice type : {{ @$notice->type }}</a>
</p>
{{ substr( @$notice->description,0,430) }}...
<p><a href="{{ route('frontend.notice_pdf_download',$notice->id) }}">click here to download the PDF file.</a></p>
</article>
@endforeach --}}
 


@foreach ($notices as $notice)            
     <tr>
          <td>{{date('d,F,Y',strtotime(@$notice->created_at))}}</td>
          <td>{{ $i++ }}</td>
          <td>{{ @$notice->name }}</td>
          <td><a href="{{ @$notice->notice_file_show }}" target="_blank">View </a></td>
          <td><a href="{{ route('frontend.notice_pdf_download',$notice->id) }}" target="_blank" type="get_object()." download="একাদশ শ্রেণিতে ভর্তি বিজ্ঞপ্তি.pdf" class="download"><i class="fa fa-download" aria-hidden="true"></i>
          <span style="color:#000;padding:10px">Download </span> </a></td>
          <td>{{ @$notice->noticeType->name }}</td>
     </tr>
@endforeach


