@section('title')
 Theme Logo
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
								{{ __('Logo') }}
							</div>
						</div>
					</div>
					<div class="card-body tabs-area p-0" style="background-color: var(--theme_color); height:auto">
						@include('Backend.setting.appearance.theme_options_tabs_nav')
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
							{{-- success message start --}}
							<!--Data Entry Form-->
							<form novalidate="" action="{{ route('backend.save-theme-logo') }}" method="post" data-validate="parsley" id="DataEntry_formId" enctype="multipart/form-data">
                                @csrf
								<div class="row">
									<div class="col-md-8">
										<div class="form-group">
											<label for="favicon">{{ __('Header Logo') }}<span class="red">*</span></label>
											{{-- <div class="tp-upload-field">
												<input value="{{ $datalist['favicon'] }}" name="favicon" id="favicon" type="text" class="form-control" readonly>
												<a id="on_favicon" href="javascript:void(0);" class="tp-upload-btn"><i class="fa fa-window-restore"></i>{{ __('Browse') }}</a>
											</div> --}}
                                            <div class="col-sm-7 mg-t-10 mg-sm-t-0">
                                                <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 76px;">
                                                    <img class="display-upload-img" style="width: 76px;height: 70px;" src="{{ @$results->header_image == '' ? @$results->no_image : @$results->header_image_show}}" alt="">
                                                        <input type="file" name="header_logo" class="form-control upload-img" placeholder="Enter Activity Image"
                                                        style="position: absolute;top: 0;opacity: 0;height: 100%;">
                                                </div>
                                            </div>
											<em>Recommended favicon.ico size width: 32px and height: 32px.</em>
											<div id="remove_favicon" class="select-image dnone">
												<div class="inner-image" id="view_favicon"></div>
												<a onClick="onMediaImageRemove('favicon')" class="media-image-remove" href="javascript:void(0);"><i class="fa fa-remove"></i></a>
											</div>
										</div>


										<div class="form-group">
											<label for="front_logo">{{ __('Footer Logo') }}<span class="red">*</span></label>
											{{-- <div class="tp-upload-field">
												<input value="{{ $datalist['front_logo'] }}" name="front_logo" id="front_logo" type="text" class="form-control" readonly>
												<a id="on_front_logo" href="javascript:void(0);" class="tp-upload-btn"><i class="fa fa-window-restore"></i>{{ __('Browse') }}</a>
											</div> --}}
                                            <div class="col-sm-7 mg-t-10 mg-sm-t-0">
                                                <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 76px;">
                                                    <img class="display-upload-img" style="width: 76px;height: 70px;" src="{{ @$results->footer_image == '' ? @$results->no_image : @$results->footer_image_show}}" alt="">
                                                        <input type="file" name="footer_logo" class="form-control upload-img" placeholder="Enter Activity Image"
                                                        style="position: absolute;top: 0;opacity: 0;height: 100%;">
                                                </div>
                                            </div>
											<em>Recommended front logo size width: 250px and height: 85px. The logo must be a file of type png</em>
											<div id="remove_front_logo" class="select-image dnone">
												<div class="inner-image" id="view_front_logo"></div>
												<a onClick="onMediaImageRemove('front_logo')" class="media-image-remove" href="javascript:void(0);"><i class="fa fa-remove"></i></a>
											</div>
										</div>

										<div class="form-group">
											<label for="back_logo">{{ __('Favicon') }}<span class="red">*</span></label>
                                            <div class="col-sm-7 mg-t-10 mg-sm-t-0">
                                                <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 76px;">
                                                    <img class="display-upload-img" style="width: 76px;height: 70px;" src="{{ @$results->favicon == '' ? @$results->no_image : @$results->favicon_show}}" alt="">
                                                        <input type="file" name="favicon" class="form-control upload-img" placeholder="Enter Activity Image"
                                                        style="position: absolute;top: 0;opacity: 0;height: 100%;">
                                                </div>
                                            </div>
											<em>Recommended front logo size width: 250px and height: 85px. The logo must be a file of type png</em>
											<div id="remove_back_logo" class="select-image dnone">
												<div class="inner-image" id="view_back_logo"></div>
												<a onClick="onMediaImageRemove('back_logo')" class="media-image-remove" href="javascript:void(0);"><i class="fa fa-remove"></i></a>
											</div>
										</div>

									</div>
									<div class="col-md-4"></div>
								</div>

								<div class="row tabs-footer mt-15">
									<div class="col-lg-12">
                                        <button type="submit" class="btn blue-btn btn-info">Save</button>
										{{-- <a id="submit-form" type="submit" class="btn blue-btn">{{ __('Save') }}</a> --}}
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
