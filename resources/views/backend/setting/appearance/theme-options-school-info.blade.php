@section('title')
 Theme School info
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
								{{ __('Social Media') }}
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
                            <form novalidate="" method="post" action="{{ route('backend.theme-options-school-info-save') }}"  data-validate="parsley" id="DataEntry_formId" enctype="multipart/form-data">
                                @csrf
								<div class="row">
									<div class="col-lg-12">
										<div class="form-group">
											<label for="address">{{ __('School Name') }}</label>
											<input value="{{ old('school_name', $datalist['school_name']) }}" type="text" name="school_name" id="school_name" class="form-control">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-12">
										<div class="form-group">
											<label for="phone">{{ __('Phone Number 1') }}</label>
											<input value="{{ old('phone1', $datalist['phone1']) }}" type="text" name="phone1" id="phone1" class="form-control">
										</div>
									</div>
								</div>

                                <div class="row">
									<div class="col-lg-12">
										<div class="form-group">
											<label for="phone">{{ __('Phone Number 2') }}</label>
											<input value="{{ old('phone2',$datalist['phone2']) }}" type="text" name="phone2" id="phone" class="form-control">
										</div>
									</div>
								</div>

                                <div class="row">
									<div class="col-lg-12">
										<div class="form-group">
											<label for="phone">{{ __('Email') }}</label>
											<input value="{{ old('email',$datalist['email']) }}" type="text" name="email" id="email" class="form-control">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-lg-12">
										<div class="form-group">
											<label for="phone">{{ __('Website Url') }}</label>
											<input value="{{ old('website',$datalist['website']) }}" type="text" name="website" id="website" class="form-control">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-lg-12">
										<div class="form-group">
											<label for="phone">{{ __('Address') }}</label>
											<input value="{{ old('address',$datalist['address']) }}" type="text" name="address" id="address" class="form-control">
										</div>
									</div>
								</div>

								<div class="col-md-12">
									<div class="form-group">
										<label for="og_image">{{ __('School Logo') }}</label>
										<div class="col-sm-7 mg-t-10 mg-sm-t-0">
											<div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 76px;">
												<img class="display-upload-img" style="width: 76px;height: 70px;" src="{{ asset('public/upload/school_logo/'.$datalist['school_logo']) }}" alt="">
												{{-- <img class="display-upload-img" style="width: 76px;height: 70px;" src="{{ @$results->footer_image == '' ? @$results->no_image : @$results->footer_image_show}}" alt=""> --}}
													<input type="file" name="school_logo" class="form-control upload-img" placeholder="Enter Activity Image"
													style="position: absolute;top: 0;opacity: 0;height: 100%;">
											</div>
										</div>
										<em>Recommended image size width: 600px and height: 315px.</em>
									</div>
								</div>

								<div class="row tabs-footer mt-15">
									<div class="col-lg-12">
                                        <button type="submit" class="btn blue-btn btn-info">Save</button>
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
