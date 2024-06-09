@extends('Frontend.layouts.master-layout')
@section('title','- Teachers')
@section('head')

@endsection
@section('main_contend')
@include('Frontend.layouts.parts.header-menu')
<br><br><br><br><br><br><br><br>
<section class="ourteam-section">
    @foreach (@$designations as $d => $designation)
        <div class="container">
            <div class="our-team-title">
                <h2 style="color: var(--text_color)">{{ @$designation->name }}</h2>
            </div>
            <div class="row">
                @foreach (@$designation->user_designations as $k => $teacher)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="our-team">
                            <div data-toggle="modal" data-target="#teacherModal{{ $d }}{{ $k }}">
                                <div class="picture">
                                    <img style="height: 131px;" class="img-fluid" src="{{ @$teacher->image_show }}">
                                </div>
                                <div class="team-content">
                                    <h3 class="name" style="color: var(--text_color)">{{ @$teacher->name }}</h3>
                                    <h4 class="title" style="color: var(--text_color)">{{ @$designation->name }}</h4>
                                </div>
                            </div>
                            <ul class="social">
                                <li><a href="{{ @$teacher->facebook_id }}" target="_blank" class="fab fa-facebook" aria-hidden="true"></a></li>
                                <li><a href="{{ @$teacher->twitter_id }}" target="_blank" class="fab fa-twitter" aria-hidden="true"></a></li>
                                <li><a href="{{ @$teacher->google_id }}" target="_blank" class="fab fa-google-plus" aria-hidden="true"></a></li>
                                <li><a href="{{ @$teacher->instagram_id }}" target="_blank" class="fab fa-linkedin" aria-hidden="true"></a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="teacherModal{{ $d }}{{ $k }}" tabindex="-1" role="dialog" aria-labelledby="teacherModalLabel{{ $d }}{{ $k }}" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header" style="background: var(--menu_color)">
                                    <h5 class="modal-title" id="teacherModalLabel{{ $d }}{{ $k }}" style="color: white">Teacher Details</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body"  style="background: var(--menu_color)">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <div class="teacher-details">
                                                <img class="img-fluid" src="{{ @$teacher->image_show }}" alt="Teacher Image">
                                                <h3>{{ @$teacher->name }}</h3>
                                                <h4><b>{{ @$designation->name }}</b></h4>
                                                <h4>{!! @$teacher->description !!}</h4>
                                                <ul class="social">
                                                    <li><a href="{{ @$teacher->facebook_id }}" target="_blank" class="fab fa-facebook" aria-hidden="true"></a></li>
                                                    <li><a href="{{ @$teacher->twitter_id }}" target="_blank" class="fab fa-twitter" aria-hidden="true"></a></li>
                                                    <li><a href="{{ @$teacher->google_id }}" target="_blank" class="fab fa-google-plus" aria-hidden="true"></a></li>
                                                    <li><a href="{{ @$teacher->instagram_id }}" target="_blank" class="fab fa-linkedin" aria-hidden="true"></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach
</section>
@include('Frontend.layouts.parts.news-letter')







<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection



