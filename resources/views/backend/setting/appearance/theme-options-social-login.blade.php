@section('title')
 Theme Social Login
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
					<div class="card-header" style="background-color:var(--theme_color); height:auto">
						<div class="row">
							<div class="col-lg-12" style="color: var(--theme_text_color)">
								{{ __('Social Login') }}
							</div>
						</div>
					</div>
					<div class="card-body tabs-area p-0" style="background-color:var(--theme_color); height:auto">
					<div class="card-body tabs-area p-0">
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
							<!--Data Entry Form-->
							<form novalidate="" action="{{ route('backend.theme-options-social-login-save') }}" method="POST" data-validate="parsley" id="DataEntry_formId">
								@csrf
							 <div class="row">
								<h3 style="margin-left: 10px" class="mb-3">Google</h3>
									<div class="col-lg-12">
										<div class="form-group">
											<label for="address">{{ __('GOOGLE CLIENT ID') }}</label>
											<input type="text" value="{{ old('google_client_id',$datalist['google_client_id']) }}" name="google_client_id" id="address" class="form-control">
										</div>
									</div>
									<div class="col-lg-12">
										<div class="form-group">
											<label for="address">{{ __('GOOGLE CLIENT SECRET') }}</label>
											<input type="text" value="{{ old('google_secret_id',$datalist['google_secret_id']) }}" name="google_secret_id" id="address" class="form-control">
										</div>
									</div>
									{{-- <div class="col-lg-12">
										<div class="form-group">
											<label for="address">{{ __('GOOGLE REDIRECT URI') }}</label>
											<input type="text" value="{{ old('google_re_uri',$datalist['google_re_uri']) }}" name="google_re_uri" id="address" class="form-control">
										</div>
									</div> --}}
									<div class="col-lg-12">
										<div class="form-group">
											{{-- <label for="address">{{ __('GOOGLE REDIRECT URI') }}</label> --}}
											<p >GOOGLE REDIRECT URI : {{ url('/google/callback') }}</p>
										</div>
									</div>

							 </div>

							 <div class="row ">
								<div class="col-lg-12">
									<button type="submit" class="btn blue-btn btn-info">Save</button>
									{{-- <a id="submit-form" href="javascript:void(0);" class="btn blue-btn">{{ __('Save') }}</a> --}}
								</div>
							</div>
							<hr/>

							 <div class="row mt-4">

								<h3 style="margin-left: 10px" class="mb-3">Facebook</h3>

									<div class="col-lg-12">
										<div class="form-group">
											<label for="address">{{ __('FACEBOOK CLIENT ID') }}</label>
											<input type="text" value="{{ old('fb_client_id',$datalist['fb_client_id']) }}" name="fb_client_id" id="address" class="form-control">
										</div>
									</div>
									<div class="col-lg-12">
										<div class="form-group">
											<label for="address">{{ __('FACEBOOK CLIENT SECRET') }}</label>
											<input type="text" value="{{ old('fb_secret_id',$datalist['fb_secret_id']) }}" name="fb_secret_id" id="address" class="form-control">
										</div>
									</div>
									{{-- <div class="col-lg-12">
										<div class="form-group">
											<label for="address">{{ __('FACEBOOK REDIRECT URI') }}</label>
											<input type="text" value="{{ old('fb_re_uri',$datalist['fb_re_uri']) }}" name="fb_re_uri" id="address" class="form-control">
										</div>
									</div> --}}
									<div class="col-lg-12">
										<div class="form-group">
											<p >GOOGLE REDIRECT URI : {{ url('/facebook/callback') }}</p>
										</div>
									</div>
									

								</div>

								<div class="row ">
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
