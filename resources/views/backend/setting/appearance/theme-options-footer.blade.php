@section('title')
 Theme Footer
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
								{{ __('Footer') }}
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
							<form novalidate="" method="post" action="{{ route('backend.theme-options-footer-save') }}"  data-validate="parsley" id="DataEntry_formId" enctype="multipart/form-data">
                                @csrf
								{{-- <div class="divider_heading">{{ __('About Us') }}</div> --}}
								{{-- <div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label for="about_logo">{{ __('Logo') }}</label>
											<div class="tp-upload-field">
												<input type="text" value="{{ $datalist['payment_gateway_icon'] }}" name="about_logo" id="about_logo" class="form-control" readonly>
												<a id="on_about_logo" href="javascript:void(0);" class="tp-upload-btn"><i class="fa fa-window-restore"></i>{{ __('Browse') }}</a>
											</div>
											<div id="remove_about_logo" class="select-image dnone">
												<div class="inner-image" id="view_about_logo">
												</div>
												<a onClick="onMediaImageRemove('about_logo')" class="media-image-remove" href="javascript:void(0);"><i class="fa fa-remove"></i></a>
											</div>
										</div>
									</div>
								</div> --}}
								{{-- <div class="row">
									<div class="col-lg-12">
										<div class="form-group">
											<label for="about_desc">{{ __('About Us') }}</label>
											<textarea name="about_desc" id="about_desc" class="form-control" rows="2">{{ $datalist['about_desc'] }}</textarea>
										</div>
									</div>
								</div> --}}

								{{-- <div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label for="is_publish_about">{{ __('Status') }}</label>
											<select name="is_publish_about" id="is_publish_about" class="chosen-select form-control">
											@foreach($statuslist as $row)
												<option {{ $row->id == $datalist['is_publish_about'] ? "selected=selected" : '' }} value="{{ $row->id }}">
													{{ $row->status }}
												</option>
											@endforeach
											</select>
										</div>
									</div>
									<div class="col-md-8"></div>
								</div> --}}


								<div class="divider_heading">{{ __('Contact Us') }}</div>
								<div class="row">
									<div class="col-lg-12">
										<div class="form-group">
											<label for="address">{{ __('Address-1') }}</label>
											<input value="{{ @$results->address1 }}" type="text" name="address1" id="address" class="form-control">
										</div>
									</div>
								</div>

                                <div class="row">
									<div class="col-lg-12">
										<div class="form-group">
											<label for="address">{{ __('Address-2') }}</label>
											<input value="{{ @$results->address2 }}" type="text" name="address2" id="address" class="form-control">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-lg-12">
										<div class="form-group">
											<label for="email">{{ __('Email-1') }}</label>
											<input value="{{ @$results->email1 }}" type="text" name="email1" id="email" class="form-control">
										</div>
									</div>
								</div>
                                <div class="row">
									<div class="col-lg-12">
										<div class="form-group">
											<label for="email">{{ __('Email-2') }}</label>
											<input value="{{ @$results->email2 }}" type="text" name="email2" id="email" class="form-control">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-12">
										<div class="form-group">
											<label for="phone">{{ __('Phone-1') }}</label>
											<input value="{{ @$results->phone1 }}" type="text" name="phone1" id="phone" class="form-control">
										</div>
									</div>
								</div>
                                <div class="row">
									<div class="col-lg-12">
										<div class="form-group">
											<label for="phone">{{ __('Phone-2') }}</label>
											<input value="{{ @$results->phone2 }}" type="text" name="phone2" id="phone" class="form-control">
										</div>
									</div>
								</div>

                                <div class="row">
									<div class="col-lg-12">
										<div class="form-group">
											<label for="phone">{{ __('License Number') }}</label>
											<input value="{{ @$results->license_no }}" type="text" name="license_no" id="phone" class="form-control">
										</div>
									</div>
								</div>

								{{-- <div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label for="is_publish_contact">{{ __('Status') }}</label>
											<select name="is_publish_contact" id="is_publish_contact" class="chosen-select form-control">
											@foreach($statuslist as $row)
												<option {{ $row->id == $datalist['is_publish_contact'] ? "selected=selected" : '' }} value="{{ $row->id }}">
													{{ $row->status }}
												</option>
											@endforeach
											</select>
										</div>
									</div>
									<div class="col-md-8"></div>
								</div> --}}

								{{-- <div class="divider_heading">{{ __('Copyright') }}</div> --}}
								<div class="row">
									<div class="col-lg-12">
										<div class="form-group">
											<label for="copyright">{{ __('Copyright') }}</label>
											<input value="{{ @$results->copyright }}" type="text" name="copyright" id="copyright" class="form-control">
										</div>
									</div>
								</div>
								{{-- <div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label for="is_publish_copyright">{{ __('Status') }}</label>
											<select name="is_publish_copyright" id="is_publish_copyright" class="chosen-select form-control">
											@foreach($statuslist as $row)
												<option {{ $row->id == $datalist['is_publish_copyright'] ? "selected=selected" : '' }} value="{{ $row->id }}">
													{{ $row->status }}
												</option>
											@endforeach
											</select>
										</div>
									</div>
									<div class="col-md-8"></div>
								</div> --}}

								<div class="divider_heading">{{ __('Payment Gateway Icon') }}</div>
                                <div class="row mt-4">
                                    <div class="col-sm-12">

                                        <div class="mg-t-10 mg-sm-t-0 add-data">
                                            @if(@$results->paywiths->count() == 0)
                                            <div class="d-flex align-items-center mt-2">

                                             <div class="d-flex align-items-center select-add-section p-2" style="width: 40%;">
                                                <input type="text" name="pay_name[]" class="ml-2 form-control" placeholder="Pay With Name">
                                            </div>

                                            <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 110px;">
                                                <img class="display-upload-img" style="width: 110px;height: 60px;" src="{{ asset("public/frontend/images/No-image.jpg")}}" alt="">
                                                    <input type="file" name="pay_image[]" class="form-control upload-img" placeholder="Enter Activity Image"
                                                    style="position: absolute;top: 0;opacity: 0;height: 100%;">
                                            </div>

                                            <a id="plus-btn-data" href="javascript:void(0)" class="plus-btn-data px-1 p-0 m-0 ml-2"><i class="fas fa-plus"></i></a>
                                            </div>

                                            @else
                                            @foreach (@$results->paywiths as $j=>$paywith)
                                            <div class="d-flex align-items-center mt-2">

                                                <div class="d-flex align-items-center select-add-section p-2" style="width: 40%;">
                                                    <input type="text" name="old_pay_name[{{ @$paywith->id }}]" value="{{ @$paywith->pay_name }}" class="ml-2 form-control" placeholder="Pay With Name">
                                                </div>

                                                <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 110px;">
                                                    <img class="display-upload-img" style="width: 110px;height: 60px;" src="{{ @$paywith->pay_image_show }}" alt="">
                                                        <input type="file" name="old_pay_image[{{ @$paywith->id }}]" class="form-control upload-img" placeholder="Enter Activity Image"
                                                        style="position: absolute;top: 0;opacity: 0;height: 100%;">
                                                </div>

                                                {{-- <div class="d-flex align-items-center select-add-section" style="width: 97%;">

                                                   <input value="{{ $facilitiyitem->car_facility }}" type="text" name="old_car_facility[{{ $facilitiyitem->id }}]" class="ml-2 form-control" placeholder="Seat">
                                               </div> --}}

                                               @if($j == @$results->paywiths->count() - 1)
                                               <a id="plus-btn-data" href="javascript:void(0)" class="plus-btn-data px-1 p-0 m-0 ml-2"><i class="fas fa-plus"></i></a>
                                               @else
                                               <a facilitiyitem_id="{{ @$paywith->id }}" href="javascript:void(0)" class="minus-btn-data-old px-1 p-0 m-0 ml-2"><i class="fas fa-minus-circle"></i></a>
                                               @endif

                                            </div>
                                         @endforeach
                                            @endif
                                        </div>

                                    </div>

                                </div><!-- row -->
								{{-- <div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label for="payment_gateway_icon">{{ __('Payment Gateway Icon') }}</label>
											<div class="tp-upload-field">
												<input value="{{ $datalist['payment_gateway_icon'] }}" type="text" name="payment_gateway_icon" id="payment_gateway_icon" class="form-control" readonly>
												<a id="on_payment_gateway_icon" href="javascript:void(0);" class="tp-upload-btn"><i class="fa fa-window-restore"></i>{{ __('Browse') }}</a>
											</div>
											<em>Recommended image size height:22px.</em>
											<div id="remove_payment_gateway_icon" class="select-image dnone">
												<div class="inner-image" id="view_payment_gateway_icon">
												</div>
												<a onClick="onMediaImageRemove('payment_gateway_icon')" class="media-image-remove" href="javascript:void(0);"><i class="fa fa-remove"></i></a>
											</div>
										</div>
									</div>
								</div> --}}
								{{-- <div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label for="is_publish_payment">{{ __('Status') }}</label>
											<select name="is_publish_payment" id="is_publish_payment" class="chosen-select form-control">
											@foreach($statuslist as $row)
												<option {{ $row->id == $datalist['is_publish_payment'] ? "selected=selected" : '' }} value="{{ $row->id }}">
													{{ $row->status }}
												</option>
											@endforeach
											</select>
										</div>
									</div>
									<div class="col-md-8"></div>
								</div> --}}
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


@section('script')
<script>

$(document).ready(function() {
        $(document).on('click','#plus-btn-data',function(){



var myvar = '<div class="d-flex align-items-center mt-2">'+
''+
'                                     <div class="d-flex align-items-center select-add-section p-2" style="width: 40%;">'+
'                                        <input type="text" name="pay_name[]" class="ml-2 form-control" placeholder="Pay With Name">'+
'                                    </div>'+
''+
'                                    <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 110px;">'+
'                                        <img class="display-upload-img" style="width: 110px;height: 60px;" src="{{ asset("public/frontend/images/No-image.jpg")}}" alt="">'+
'                                            <input type="file" name="pay_image[]" class="form-control upload-img" placeholder="Enter Activity Image"'+
'                                            style="position: absolute;top: 0;opacity: 0;height: 100%;">'+
'                                    </div>'+
''+
'                                   <a href="javascript:void(0)" class="minus-btn-data px-1 p-0 m-0 ml-2"><i class="fas fa-minus-circle"></i></a>'+
'                                    </div>';


$('.add-data').prepend(myvar);
            //console.log();
        });

        $(document).on('click','.minus-btn-data',function(){
            $(this).parent().remove();
        });
        $(document).on('click','.minus-btn-data-old',function(){
             $(this).parent().parent().append('<input type="hidden" name="delete_facilitiyitem[]" value="'+$(this).attr('facilitiyitem_id')+'">');
            $(this).parent().remove();
        });

    });





     $(document).on('change','.upload-img',function(){
            var files = $(this).get(0).files;
            var reader = new FileReader();
            reader.readAsDataURL(files[0]);
            var arg=this;
            reader.addEventListener("load", function(e) {
                var image = e.target.result;
                $(arg).parent().find('.display-upload-img').attr('src', image);
            });
        });
</script>
@endsection
