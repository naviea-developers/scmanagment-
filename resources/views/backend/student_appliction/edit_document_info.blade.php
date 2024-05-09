@section('title')
 Documentation Edit
@endsection
@extends('Backend.layouts.layouts')
@section("style")
<style>
    .tabs-area {
	background-color: #f9f9f9;
}
ul.tabs-nav {
    width: 200px;
	float: left;
}
ul.tabs-nav li {
	border-bottom: 1px solid #ddd;
	border-left: none;
	position: relative;
}
ul.tabs-nav li a {
	padding: 15px 15px;
	display: block;
	color: #ece4e4;
}
ul.tabs-nav li a i.fa {
	margin-right: 10px;
}
ul.tabs-nav li a:hover,
ul.tabs-nav li a.active {
	background-color: var(--theme_hover_color);
	width: 101%;
	left: 0;
	right: 0;
}
.tabs-body {
	width: calc(100% - 200px);
	float: left;
	padding: 30px;
	border-left: 1px solid #ddd;
	background: #fff;
	min-height: 675px;
}
.tabs-body-full {
	width: 100%;
	float: left;
	padding: 30px;
	border-left: 1px solid #ddd;
	background: #fff;
	min-height: 500px;
}
.tabs-head {
	margin-bottom: 20px;
	display: inline-block;
	width: 100%;
}
.tabs-head h4 {
	float: left;
	font-size: 18px;
	padding-top: 10px;
}
.tabs-footer {
	border-top: 1px solid #ddd;
	padding: 30px 0px 0px 0px;
	margin-top: 30px;
}
li {
    list-style: none;
}
</style>
@endsection
@section('main_contain')
<div class="br-mainpanel">
    <div class="br-pagebody">
        <div class="br-section-wrapper">
<div class="main-body">
	<div class="container-fluid">
        <div class="row mt-25">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header" style="background-color: var(--theme_color); height:auto">
						<div class="row">
							<div class="col-lg-12" style="color: var(--theme_text_color)">
								{{ __('Documents') }}
							</div>
						</div>
					</div>
					<div class="card-body tabs-area p-0" style="background-color: var(--theme_color); height:auto">
						@include('Backend.student_appliction.theme_options_tabs_nav')
						<div class="tabs-body">
							{{-- success message start --}}
							@if(session()->has('message'))
							<div class="alert alert-success">
							{{session()->get('message')}}
							</div>
							<script>
								setTimeout(function(){
									$('.alert.alert-success').hide();
								}, 3000);
							</script>
							@endif
							@if(session()->has('error-message'))
							<div class="alert alert-danger">
							{{session()->get('error-message')}}
							</div>
							<script>
								setTimeout(function(){
									$('.alert.alert-danger').hide();
								}, 3000);
							</script>
							@endif
							{{-- success message start --}}
							<!--Data Entry Form-->
                            <form novalidate="" method="post" action="{{ route('backend.social-media-save') }}"  data-validate="parsley" id="DataEntry_formId" enctype="multipart/form-data">
                                @csrf
							<div class="row">
									<div class="col-lg-12 mt-3">
                            <b><h4>Documentation</b></h4>
                            <hr>
									</div>
							
							
									@foreach ($s_appliction->documents as $k => $document)
										
									<div class="col-lg-6">
										<div class="form-group">
											<label for="address"><b>{{$loop->iteration}}. {{ __( $document->document_name ) }}</b></label>
											<div class="row">
												{{-- <div class="col-md-8">
													<p>{{ $document->document_file }}</p>
												</div> --}}
												<div class="col-md-5">
													<button style="margin-left: 18px" type="button" data-toggle="modal" data-target="#certificateModal{{ $k }}" class="btn btn-primary"><i class="fa fa-solid fa-eye"></i> Details</button>
												{{-- </div>
												<div class="col-md-6"> --}}
													{{-- <a href="{{ route('frontend.application-file-download', $k) }}" class="btn btn-primary"><i class="fa fa-solid fa-download"></i> Download</a> --}}
												</div>
											</div>
										</div>
									</div>
							
							
									<!-- Modal -->
									<div class="modal fade" id="certificateModal{{ $k }}" tabindex="-1" role="dialog" aria-labelledby="audioModalLabel" aria-hidden="true">
										<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
											<h5 class="modal-title" id="audioModalLabel" style="color: black">{{ $document->document_name }}</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
											</div>
											<div class="modal-body">
											@if ($document->extensions == 'pdf')
												<iframe src="{{ $document->document_file_show  }}" width="100%" height="500"></iframe>
											@else
											<img src="{{ $document->document_file_show  }}" alt="image" style="height: 300px; width:450px">
											@endif
											</div>
											<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											</div>
										</div>
										</div>
									</div>
							
							
									@endforeach
								</div>

								
								<div class="row tabs-footer mt-15">
									<div class="col-lg-12">
                                        <a href="{{ route('admin.student_appliction_list') }}" class="btn blue-btn btn-danger">Close</a>
                                        {{-- <button type="submit" class="btn blue-btn btn-info">Save</button> --}}
										{{-- <a id="submit-form" href="javascript:void(0);" class="btn blue-btn">{{ __('Save') }}</a> --}}
									</div>
								</div>
							</form>
							<!--/Data Entry Form/-->
						</div>
					</div>
				</div>
			</div>


		</div>


    </div>
</div>
</div>
@endsection