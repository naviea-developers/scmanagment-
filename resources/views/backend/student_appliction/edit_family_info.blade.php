@section('title')
 Family If Edit
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
								{{ __('Family Information') }}
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
                            <form novalidate="" method="post" action="{{ route('admin.student_appliction_update_family', $s_appliction->id) }}"  data-validate="parsley" id="DataEntry_formId" enctype="multipart/form-data">
                                @csrf
								
								<div class="row">
									<div class="col-lg-12">
										<h1>Family Information</h1>
									</div>

									<div class="col-lg-6">
										<div class="form-group">
											<label for="address">{{ __('Father Name:') }}</label>
											<input  value="{{ $s_appliction->father_name }}" type="text" name="father_name" id="address" class="form-control">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label for="address">{{ __('Father Nnationlity:') }}</label>
											<input  value="{{ $s_appliction->father_nationlity }}" type="text" name="father_nationlity" id="address" class="form-control">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label for="address">{{ __('Father Phone:') }}</label>
											<input  value="{{ $s_appliction->father_phone }}" type="text" name="father_phone" id="address" class="form-control">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label for="address">{{ __('Father Email:') }}</label>
											<input  value="{{ $s_appliction->father_email }}" type="email" name="father_email" id="address" class="form-control">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label for="address">{{ __('Father Workplace:') }}</label>
											<input  value="{{ $s_appliction->father_workplace }}" type="text" name="father_workplace" id="address" class="form-control">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label for="address">{{ __('Father Position:') }}</label>
											<input  value="{{ $s_appliction->father_position }}" type="text" name="father_position" id="address" class="form-control">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label for="address">{{ __('Mother Name:') }}</label>
											<input  value="{{ $s_appliction->mother_name }}" type="text" name="mother_name" id="address" class="form-control">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label for="address">{{ __('Mother Nationlity:') }}</label>
											<input  value="{{ $s_appliction->mother_nationlity }}" type="text" name="mother_nationlity" id="address" class="form-control">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label for="address">{{ __('Mother Phone:') }}</label>
											<input  value="{{ $s_appliction->mother_phone }}" type="text" name="mother_phone" id="address" class="form-control">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label for="address">{{ __('Mother Email:') }}</label>
											<input  value="{{ $s_appliction->mother_email }}" type="email" name="mother_email" id="address" class="form-control">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label for="address">{{ __('Mother Workplace:') }}</label>
											<input  value="{{ $s_appliction->mother_workplace }}" type="text" name="mother_workplace" id="address" class="form-control">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label for="address">{{ __('Mother Position:') }}</label>
											<input  value="{{ $s_appliction->mother_position }}" type="text" name="mother_position" id="address" class="form-control">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label for="address">{{ __('Guarantor Relationship:') }}</label>
											<select id="continent"  class="form-control" name="guarantor_relationship" >
												<option value="">Guarantor Relationship</option>
												<option @if ($s_appliction->guarantor_relationship == 'Father') Selected @endif value="Father">Father</option>
												<option @if ($s_appliction->guarantor_relationship == 'Mother') Selected @endif value="Mother">Mother</option>
											</select>
											{{-- <input  value="{{ $s_appliction->guarantor_relationship }}" type="text" name="facebook" id="address" class="form-control"> --}}
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label for="address">{{ __('Guarantor Name:') }}</label>
											<input  value="{{ $s_appliction->guarantor_name }}" type="text" name="guarantor_name" id="address" class="form-control">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label for="address">{{ __('Guarantor Address:') }}</label>
											<input  value="{{ $s_appliction->guarantor_address }}" type="text" name="guarantor_address" id="address" class="form-control">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label for="address">{{ __('Guarantor Phone:') }}</label>
											<input  value="{{ $s_appliction->guarantor_phone }}" type="text" name="guarantor_phone" id="address" class="form-control">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label for="address">{{ __('Guarantor Email:') }}</label>
											<input  value="{{ $s_appliction->guarantor_email }}" type="email" name="guarantor_email" id="address" class="form-control">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label for="address">{{ __('Guarantor Workplace:') }}</label>
											<input  value="{{ $s_appliction->guarantor_workplace }}" type="text" name="guarantor_workplace" id="address" class="form-control">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label for="address">{{ __('Guarantor Work Address:') }}</label>
											<input  value="{{ $s_appliction->guarantor_work_address }}" type="text" name="guarantor_work_address" id="address" class="form-control">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label for="address">{{ __('Study Fund:') }}</label>

											<select id="continent"  class="form-control" name="study_fund" >
												<option value="">Select Study Fund</option>
												<option @if ($s_appliction->study_fund == 'Self finance') Selected @endif value="Self finance">Self finance</option>
												<option @if ($s_appliction->study_fund == 'Chinese Government Scholarship') Selected @endif value="Chinese Government Scholarship">Chinese Government Scholarship</option>
												<option @if ($s_appliction->study_fund == 'Part scholarship part self financed') Selected @endif value="Part scholarship part self financed">Part scholarship part self financed (University scholarship)</option>
											</select>

											{{-- <input  value="{{ $s_appliction->study_fund }}" type="text" name="study_fund" id="address" class="form-control"> --}}
										</div>
									</div>

									<div class="col-lg-12">
										<h1>Contact in Case of Emergencies</h1>
									</div>

									<div class="col-lg-6">
										<div class="form-group">
											<label for="address">{{ __('Emergency Contact Name:') }}</label>
											<input  value="{{ $s_appliction->emergency_contact_name }}" type="text" name="emergency_contact_name" id="address" class="form-control">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label for="address">{{ __('Emergency Contact Phone:') }}</label>
											<input  value="{{ $s_appliction->emergency_contact_phone }}" type="text" name="emergency_contact_phone" id="address" class="form-control">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label for="address">{{ __('Emergency Contact Email:') }}</label>
											<input  value="{{ $s_appliction->emergency_contact_email }}" type="email" name="emergency_contact_email" id="address" class="form-control">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label for="address">{{ __('Emergency Contact Address:') }}</label>
											<input  value="{{ $s_appliction->emergency_contact_address }}" type="text" name="emergency_contact_address" id="address" class="form-control">
										</div>
									</div>

									


								</div>

									<div class="row tabs-footer mt-15">
										<div class="col-lg-12">
											<a href="{{ route('admin.student_appliction_list') }}" class="btn blue-btn btn-danger">Close</a>
											<button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
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
