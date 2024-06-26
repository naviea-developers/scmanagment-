@section('title')
 Theme Google Map Address
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
								{{ __('Google Map Address') }}
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
							<form novalidate="" action="{{ route('backend.theme-options-google-map-save') }}" method="POST" data-validate="parsley" id="DataEntry_formId">
								@csrf
							 <div class="row">
									<div class="col-lg-12">
										<div class="form-group">
											<label for="address">{{ __('Google Maps Embed URL') }}</label>
											<input  type="text" value="{{  old('g_location',$datalist['g_location']) }}" name="g_location" id="address" placeholder="" class="form-control">
										</div>
									</div>
									<div class="col-lg-12">
										<div class="form-group">
											<label>
												<input @if (old('status',$datalist['status']) == 1) checked @endif type="radio" name="status" value="1">
												Active
											</label>
											<br>
											<label>
												<input @if (old('status',$datalist['status']) == 2) checked @endif type="radio" name="status" value="2">
												Inactive
											</label>
										</div>
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
