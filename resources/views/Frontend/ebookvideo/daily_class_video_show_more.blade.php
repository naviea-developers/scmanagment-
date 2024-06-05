
@foreach ($dailyClasses as $k=> $item)
<div class="accordion-item border-0">
    <div class="d-flex mb-3 mb-md-2 mb-lg-3">
        {{-- <span> {{ $i++ }}.&nbsp;</span> --}}
        <div class="flex-shrink-1 me-3 me-md-2 me-lg-3">
            <i data-feather="play-circle" class="accordion-icon"></i>
        </div>
        <div class="w-100">
            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                <button class="accordion-button fs-13 text-muted fw-normal pt-1 pb-0 px-0 collapsed" type="button">
                    <svg style="margin-left: -13px;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-play-circle accordion-icon"><circle cx="12" cy="12" r="10"></circle><polygon points="10 8 16 12 10 16 10 8"></polygon></svg>
                    <a href="javascript:void(0)" onclick="showCoursePreview('CO07TDK7B23', 'LE085WSXF464')">Teacher Name :{{ @$item->teacher->name }},Subject :{{ @$item->subject->name }},Lession :{{ @$item->lession->name }},Page Number :{{ @$item->page_number }}</a>
                    <span class="course-duration ms-auto">
                        @if (@$item->sub_banner=='1')
                            <a  data-toggle="modal" data-target="#videoModal{{ $k }}"><u> Play</u> &nbsp;</a>
                        @elseif (@$item->sub_banner=='2')
                            <a class="course-card__hover--content___icon popup-youtube"  href="{{ @$item->video_url }}" autoplay><u style="margin-left: 878px;"> Play</u> &nbsp;</a>
                        @endif                               
                    </span>
                </button>
            </h2>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="videoModal{{ $k }}" tabindex="-1" role="dialog" aria-labelledby="videoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="videoModalLabel">{{ $item->name }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        <!-- Embed your video here -->
        
        <video controls height="350px" width="460px">
            <source src="{{ $item->video_show }}" type="video/mp4" autoplay >
        </video>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </div>
    </div>
</div>

@endforeach