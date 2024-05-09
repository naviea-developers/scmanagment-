@section('title')
 Theme Seo
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


.select2-container--default .select2-selection--multiple .select2-selection__choice{
	background-color: #13bbd1!important;
	border: 1px solid #010142!important;
}

.select2-container--default .select2-selection--multiple .select2-selection__choice__remove:hover{
	background-color: #6f76db!important;
    color: #070707!important;
}

.select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
	color: #060505!important;
	border-right:1px solid #010142!important;
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
								{{ __('SEO') }}
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
							{{-- <form novalidate="" data-validate="parsley" id="DataEntry_formId"> --}}
                            <form novalidate="" method="post" action="{{ route('backend.theme-options-seo-save') }}"  data-validate="parsley" id="DataEntry_formId" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
									<div class="col-lg-12">
										<div class="form-group">
											<label for="og_title">{{ __('SEO Title') }}</label>
											{{-- <input value="{{ old('og_title',$datalist['og_title']) }}" type="text" name="og_title" id="og_title" class="form-control"> --}}
											<select id="seo-title" class="form-control multipleSelect2Search Select2 add-no-exists" name="og_title[]" multiple>
												<option value="">Enter Keyword</option>
												@foreach ($datalist['og_title'] as $item )
												<option selected value="{{  $item }}">{{ $item }}</option>
												@endforeach
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-12">
										<div class="form-group">
											<label for="og_keywords">{{ __('SEO Keywords') }}</label>
											{{-- <input value="{{ old('og_keywords',$datalist['og_keywords']) }}" type="text"  name="og_keywords" id="og_keywords" class="form-control"> --}}
											<select id="seo-key" class="form-control multipleSelect2Search Select2 add-no-exists" name="og_keywords[]" multiple>
												<option value="">Enter Keyword</option>
												@foreach (@$datalist['og_keywords'] as $item )
												<option selected value="{{  $item }}">{{ $item }}</option>
												@endforeach
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label for="og_description">{{ __('SEO Description') }}</label>
											<textarea name="og_description" id="og_description" class="form-control" rows="2">{{ old('og_description',$datalist['og_description']) }}</textarea>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label for="og_image">{{ __('Open Graph Image') }}</label>
											{{-- <div class="tp-upload-field">
												<input value="{{ $datalist['og_image'] }}" type="text" name="og_image" id="og_image" class="form-control" readonly>
												<a onClick="onGlobalMediaModalView()" href="javascript:void(0);" class="tp-upload-btn"><i class="fa fa-window-restore"></i>{{ __('Browse') }}</a>
											</div> --}}

                                            <div class="col-sm-7 mg-t-10 mg-sm-t-0">
                                                <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 76px;">
                                                    <img class="display-upload-img" style="width: 76px;height: 70px;" src="{{ asset('public/upload/seo/'.$datalist['og_image']) }}" alt="">
                                                        <input type="file" name="og_image" class="form-control upload-img" placeholder="Enter Activity Image"
                                                        style="position: absolute;top: 0;opacity: 0;height: 100%;">
                                                </div>
                                            </div>
											<em>Recommended image size width: 600px and height: 315px.</em>
											<div id="remove_og_image" class="select-image dnone">
												<div class="inner-image" id="view_og_image">
												</div>
												<a onClick="onMediaImageRemove('og_image')" class="media-image-remove" href="javascript:void(0);"><i class="fa fa-remove"></i></a>
											</div>
										</div>
									</div>
								</div>
								{{-- <div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label for="is_publish">{{ __('Status') }}</label>
											<select name="is_publish" id="is_publish" class="chosen-select form-control">
											@foreach($statuslist as $row)
												<option {{ $row->id == $datalist['is_publish'] ? "selected=selected" : '' }} value="{{ $row->id }}">
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
<!-- css/js -->
<script type="text/javascript">

</script>
<script src="{{asset('public/backend/pages/theme_option_seo.js')}}"></script>
<script src="{{asset('public/backend/pages/global-media.js')}}"></script>

{{-- ---------03-02-2024------------ --}}
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        $('.multipleSelect2Search').select2();
    });
    $(document).ready(function() {
        $('.multipleSelectSearch').select2();
    });
</script>

<script>
    $(document).ready(function() {
    $(".add-no-exists").select2({
         tags: true,
        createTag: function (params) {
            var term = $.trim(params.term);
            console.log(term);
            if (term === '') {
                return null;
            }
            return {
                id: term,
                text: term,
                newTag: true
            }
        },
        //tags: true
    }).on('select2:select', function(e){
        // console.log(e.params.data.tag)
        // console.log(e.params.data.newTag)
        // var select2element = $(this);
        // console.log( $(this).attr('id'));
        // if (e.params.data.newTag === true) {
        //     select2function(e.params.data.text,$(this).attr('id'),select2element)
        // }
    });

    function select2function(val,type,select2element){
        console.log(type);
        let url = '{{ url("add-new-select2-car") }}' ;
        let data = {val:val,'type':type};
        axios({
            method: 'post',
            url: url,
            data: data
        }).then(res => {
            if(res.data.status == "ok"){
                data = {
                    "id":res.data.res_data.id,
                    "text": res.data.res_data.name,
                }
                var selection = select2element.val();

                if ($(select2element).find("option[value='" + res.data.res_data.name + "']").length) {
                    $(select2element).find("option[value='" + res.data.res_data.name + "']").attr('value',res.data.res_data.id);
                    $(select2element).val(res.data.res_data.id).trigger('change');
                } else {
                    var option = new Option(res.data.res_data.name, res.data.res_data.id, true, true);
                    $(select2element).append(option).trigger('change');
                    // console.log("selection =", selection);
                }
                console.log("selection =", selection);
            }
        })
    }
});

</script>

@endsection
