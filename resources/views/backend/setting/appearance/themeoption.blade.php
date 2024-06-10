@section('title')
 Theme Color
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
											{{ __('Color') }}
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
										{{-- <form novalidate="" data-validate="parsley" id="DataEntry_formId"> --}}
										<form novalidate="" method="post" action="{{ route('backend.theme-options-color-save') }}"  data-validate="parsley" id="DataEntry_formId" enctype="multipart/form-data">
											@csrf
											<div class="row">
												{{-- < class="col-lg-8"> --}}
												<div class="col-sm-4">
													<div class="form-group">
														<label>{{ __('Header Background Color') }}<span class="red">*</span></label>
														<div id="color_brand_picker" class="input-group tw-picker">
															<input name="header_color" id="color_brand" type="color" value="{{ $datalist['header_color'] == '' ? '#07477D' : $datalist['header_color'] }}" class="form-control"/>
															<span class="input-group-addon"><i></i></span>
														</div>
														<button type="submit" class="btn blue-btn btn-info mt-1">Save</button>
													</div>
												</div>
												<div class="col-sm-4">
													<div class="form-group">
														<label>{{ __('Header Text Color') }}<span class="red">*</span></label>
														<div id="color_brand_picker" class="input-group tw-picker">
															<input name="header_text_color" id="color_brand" type="color" value="{{ $datalist['header_text_color'] == '' ? '#07477D' : $datalist['header_text_color'] }}" class="form-control"/>
															<span class="input-group-addon"><i></i></span>
														</div>
														<button type="submit" class="btn blue-btn btn-info mt-1">Save</button>
													</div>
												</div>
												<div class="col-sm-4">
													<div class="form-group">
														<label>{{ __('Menu Background Color') }}<span class="red">*</span></label>
														<div id="color_brand_dark_picker" class="input-group tw-picker">
															<input name="menu_color" id="color_brand_dark" type="color" value="{{ $datalist['menu_color'] == '' ? '#212529' : $datalist['menu_color'] }}" class="form-control"/>
															<span class="input-group-addon"><i></i></span>
														</div>
														<button type="submit" class="btn blue-btn btn-info mt-1">Save</button>
													</div>
												</div>
												<div class="col-sm-4">
													<div class="form-group">
														<label>{{ __('Footer color') }}<span class="red">*</span></label>
														<div id="danger_color_picker" class="input-group tw-picker">
															<input name="footer_color" id="danger_color" type="color" value="{{ $datalist['footer_color'] == '' ? '#07477D' : $datalist['footer_color'] }}" class="form-control"/>
															<span class="input-group-addon"><i></i></span>
														</div>
														<button type="submit" class="btn blue-btn btn-info mt-1">Save</button>
													</div>
												</div>
												<div class="col-sm-4">
													<div class="form-group">
														<label>{{ __('Footer Text color') }}<span class="red">*</span></label>
														<div id="danger_color_picker" class="input-group tw-picker">
															<input name="footer_text_color" id="danger_color" type="color" value="{{ $datalist['footer_text_color'] == '' ? '#fff' : $datalist['footer_text_color'] }}" class="form-control"/>
															<span class="input-group-addon"><i></i></span>
														</div>
														<button type="submit" class="btn blue-btn btn-info mt-1">Save</button>
													</div>
												</div>
												<div class="col-sm-4">
													<div class="form-group">
														<label>{{ __('Currency Background Color') }}<span class="red">*</span></label>
														<div id="color_brand_dark_picker" class="input-group tw-picker">
															<input name="currency_background_color" id="color_brand_dark" type="color" value="{{ $datalist['currency_background_color'] == '' ? '#07477D' : $datalist['currency_background_color'] }}" class="form-control"/>
															<span class="input-group-addon"><i></i></span>
														</div>
														<button type="submit" class="btn blue-btn btn-info mt-1">Save</button>
													</div>
												</div>
												<div class="col-sm-4">
													<div class="form-group">
														<label>{{ __('Currency Frontend Color') }}<span class="red">*</span></label>
														<div id="color_brand_dark_picker" class="input-group tw-picker">
															<input name="currency_frontend_color" id="color_brand_dark" type="color" value="{{ $datalist['currency_frontend_color'] == '' ? '#07477D' : $datalist['currency_frontend_color'] }}" class="form-control"/>
															<span class="input-group-addon"><i></i></span>
														</div>
														<button type="submit" class="btn blue-btn btn-info mt-1">Save</button>
													</div>
												</div>
												<div class="col-sm-4">
													<div class="form-group">
														<label>{{ __('Category Color') }}<span class="red">*</span></label>
														<div id="color_brand_dark_picker" class="input-group tw-picker">
															<input name="category_color" id="color_brand_dark" type="color" value="{{ $datalist['category_color'] == '' ? '#07477D' : $datalist['category_color'] }}" class="form-control"/>
															<span class="input-group-addon"><i></i></span>
														</div>
														<button type="submit" class="btn blue-btn btn-info mt-1">Save</button>
													</div>
												</div>
												<div class="col-sm-4">
													<div class="form-group">
														<label>{{ __('Button Color') }}<span class="red">*</span></label>
														<div id="color_brand_2_picker" class="input-group tw-picker">
															<input name="button2_color" id="color_brand_2" type="color" value="{{ $datalist['button2_color'] == '' ? '#07477D' : $datalist['button2_color'] }}" class="form-control"/>
															<span class="input-group-addon"><i></i></span>
														</div>
														<button type="submit" class="btn blue-btn btn-info mt-1">Save</button>
													</div>
												</div>
												<div class="col-sm-4">
													<div class="form-group">
														<label>{{ __('Button Text Color') }}<span class="red">*</span></label>
														<div id="color_brand_2_picker" class="input-group tw-picker">
															<input name="button2_text_color" id="color_brand_2" type="color" value="{{ $datalist['button2_text_color'] == '' ? '#07477D' : $datalist['button2_text_color'] }}" class="form-control"/>
															<span class="input-group-addon"><i></i></span>
														</div>
														<button type="submit" class="btn blue-btn btn-info mt-1">Save</button>
													</div>
												</div>
												<div class="col-sm-4">
													<div class="form-group">
														<label>{{ __('Button Hover Color') }}<span class="red">*</span></label>
														<div id="color_brand_2_picker" class="input-group tw-picker">
															<input name="button2_hover_color" id="color_brand_2" type="color" value="{{ $datalist['button2_hover_color'] == '' ? '#0a58ca' : $datalist['button2_hover_color'] }}" class="form-control"/>
															<span class="input-group-addon"><i></i></span>
														</div>
														<button type="submit" class="btn blue-btn btn-info mt-1">Save</button>
													</div>
												</div>
												<div class="col-sm-4">
													<div class="form-group">
														<label>{{ __('Button Border Color') }}<span class="red">*</span></label>
														<div id="color_brand_2_picker" class="input-group tw-picker">
															<input name="button2_border_color" id="color_brand_2" type="color" value="{{ $datalist['button2_border_color'] == '' ? '#07477D' : $datalist['button2_border_color'] }}" class="form-control"/>
															<span class="input-group-addon"><i></i></span>
														</div>
														<button type="submit" class="btn blue-btn btn-info mt-1">Save</button>
													</div>
												</div>
												<div class="col-sm-4">
													<div class="form-group">
														<label>{{ __('Text Color') }}<span class="red">*</span></label>
														<div id="primary_color_picker" class="input-group tw-picker">
															<input name="text_color" id="primary_color" type="color" value="{{ $datalist['text_color'] == '' ? '#fff' : $datalist['text_color'] }}" class="form-control"/>
															<span class="input-group-addon"><i></i></span>
														</div>
														<button type="submit" class="btn blue-btn btn-info mt-1">Save</button>
													</div>
												</div>
												<div class="col-sm-4">
													<div class="form-group">
														<label>{{ __('Product Text Color') }}<span class="red">*</span></label>
														<div id="primary_color_picker" class="input-group tw-picker">
															<input name="product_text_color" id="primary_color" type="color" value="{{ $datalist['product_text_color'] == '' ? '#fff' : $datalist['product_text_color'] }}" class="form-control"/>
															<span class="input-group-addon"><i></i></span>
														</div>
														<button type="submit" class="btn blue-btn btn-info mt-1">Save</button>
													</div>
												</div>
												<div class="col-sm-4">
													<div class="form-group">
														<label>{{ __('Dashboard Theme color') }}<span class="red">*</span></label>
														<div id="secondary_color_picker" class="input-group tw-picker">
															<input name="theme_color" id="secondary_color" type="color" value="{{ $datalist['theme_color'] == '' ? '#1d2939' : $datalist['theme_color'] }}" class="form-control"/>
															<span class="input-group-addon"><i></i></span>
														</div>
														<button type="submit" class="btn blue-btn btn-info mt-1">Save</button>
													</div>
												</div>
												<div class="col-sm-4">
													<div class="form-group">
														<label>{{ __('Dashboard Theme Text color') }}<span class="red">*</span></label>
														<div id="secondary_color_picker" class="input-group tw-picker">
															<input name="theme_text_color" id="secondary_color" type="color" value="{{ $datalist['theme_text_color'] == '' ? '#adb5bd' : $datalist['theme_text_color'] }}" class="form-control"/>
															<span class="input-group-addon"><i></i></span>
														</div>
														<button type="submit" class="btn blue-btn btn-info mt-1">Save</button>
													</div>
												</div>
												<div class="col-sm-4">
													<div class="form-group">
														<label>{{ __('Dashboard Theme Hover color') }}<span class="red">*</span></label>
														<div id="secondary_color_picker" class="input-group tw-picker">
															<input name="theme_hover_color" id="secondary_color" type="color" value="{{ $datalist['theme_hover_color'] == '' ? '#18222f' : $datalist['theme_hover_color'] }}" class="form-control"/>
															<span class="input-group-addon"><i></i></span>
														</div>
														<button type="submit" class="btn blue-btn btn-info mt-1">Save</button>
													</div>
												</div>
												<div class="col-sm-4">
													<div class="form-group">
														<label>{{ __('Seller Dashboard Background color') }}<span class="red">*</span></label>
														<div id="secondary_color_picker" class="input-group tw-picker">
															<input name="seller_background_color" id="secondary_color" type="color" value="{{ $datalist['seller_background_color'] == '' ? '#1d2939' : $datalist['seller_background_color'] }}" class="form-control"/>
															<span class="input-group-addon"><i></i></span>
														</div>
														<button type="submit" class="btn blue-btn btn-info mt-1">Save</button>
													</div>
												</div>
												<div class="col-sm-4">
													<div class="form-group">
														<label>{{ __('Seller Dashboard Frontend color') }}<span class="red">*</span></label>
														<div id="secondary_color_picker" class="input-group tw-picker">
															<input name="seller_frontend_color" id="secondary_color" type="color" value="{{ $datalist['seller_frontend_color'] == '' ? '#1d2939' : $datalist['seller_frontend_color'] }}" class="form-control"/>
															<span class="input-group-addon"><i></i></span>
														</div>
														<button type="submit" class="btn blue-btn btn-info mt-1">Save</button>
													</div>
												</div>
												<div class="col-sm-4">
													<div class="form-group">
														<label>{{ __('Seller Dashboard Text color') }}<span class="red">*</span></label>
														<div id="secondary_color_picker" class="input-group tw-picker">
															<input name="seller_text_color" id="secondary_color" type="color" value="{{ $datalist['seller_text_color'] == '' ? '#adb5bd' : $datalist['seller_text_color'] }}" class="form-control"/>
															<span class="input-group-addon"><i></i></span>
														</div>
														<button type="submit" class="btn blue-btn btn-info mt-1">Save</button>
													</div>
												</div>
												<div class="col-sm-4">
													<div class="form-group">
														<label>{{ __('Card Color') }}<span class="red">*</span></label>
														<div id="warning_color_picker" class="input-group tw-picker">
															<input name="package1_color" id="warning_color" type="color" value="{{ $datalist['package1_color'] == '' ? '#2D3B68' : $datalist['package1_color'] }}" class="form-control"/>
															<span class="input-group-addon"><i></i></span>
														</div>
														<button type="submit" class="btn blue-btn btn-info mt-1">Save</button>
													</div>
												</div>
												<div class="col-sm-4">
													<div class="form-group">
														<label>{{ __('Card Hover Color') }}<span class="red">*</span></label>
														<div id="warning_color_picker" class="input-group tw-picker">
															<input name="package2_color" id="warning_color" type="color" value="{{ $datalist['package2_color'] == '' ? '#223764' : $datalist['package2_color'] }}" class="form-control"/>
															<span class="input-group-addon"><i></i></span>
														</div>
														<button type="submit" class="btn blue-btn btn-info mt-1">Save</button>
													</div>
												</div>
												<div class="col-sm-4">
													<div class="form-group">
														<label>{{ __('Package Button Color ') }}<span class="red">*</span></label>
														<div id="color_brand_2_picker" class="input-group tw-picker">
															<input name="button1_color" id="color_brand_2" type="color" value="{{ $datalist['button1_color'] == '' ? '#1bbc9d' : $datalist['button1_color'] }}" class="form-control"/>
															<span class="input-group-addon"><i></i></span>
														</div>
														<button type="submit" class="btn blue-btn btn-info mt-1">Save</button>
													</div>
												</div>
												<div class="col-sm-4">
													<div class="form-group">
														<label>{{ __('Package Button Hover Color ') }}<span class="red">*</span></label>
														<div id="color_brand_2_picker" class="input-group tw-picker">
															<input name="button1_hover_color" id="color_brand_2" type="color" value="{{ $datalist['button1_hover_color'] == '' ? '#1bbc9d' : $datalist['button1_hover_color'] }}" class="form-control"/>
															<span class="input-group-addon"><i></i></span>
														</div>
														<button type="submit" class="btn blue-btn btn-info mt-1">Save</button>
													</div>
												</div>
												<div class="col-sm-4">
													<div class="form-group">
														<label>{{ __('Footer News Litter') }}<span class="red">*</span></label>
														<div id="danger_color_picker" class="input-group tw-picker">
															<input name="footer_news_color" id="danger_color" type="color" value="{{ $datalist['footer_news_color'] == '' ? '#25171c' : $datalist['footer_news_color'] }}" class="form-control"/>
															<span class="input-group-addon"><i></i></span>
														</div>
														<button type="submit" class="btn blue-btn btn-info mt-1">Save</button>
													</div>
												</div>
												{{-- </div> --}}
												{{-- <div class="col-lg-4"></div> --}}
											</div>

											{{-- <div class="row tabs-footer mt-15">
												<div class="col-lg-12">
													<button type="submit" class="btn blue-btn btn-info">Save</button>
												</div>
											</div> --}}
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
</div>
</div>
@endsection
