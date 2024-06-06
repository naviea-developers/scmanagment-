@section('title')
Admin - Student Appliction Edit
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
								{{ __('Personal Information') }}
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
                            <form novalidate="" method="post" action="{{ route('admin.student_appliction_update', $s_appliction->id) }}"  data-validate="parsley" id="DataEntry_formId" enctype="multipart/form-data">
                                @csrf
								<div class="row">
									<div class="col-lg-12">
										<h1>Personal Information</h1>
									</div>

									<div class="col-lg-6">
										<div class="form-group">
											<label for="address">{{ __('application_code:') }}</label>
											<input disabled value="{{ $s_appliction->application_code }}" type="text" name="facebook" id="address" class="form-control">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label for="address">{{ __('First Name:') }}</label>
											<input value="{{ $s_appliction->first_name }}" type="text" name="first_name" id="address" class="form-control">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label for="address">{{ __('Middle Name:') }}</label>
											<input value="{{ $s_appliction->middle_name }}" type="text" name="middle_name" id="address" class="form-control">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label for="address">{{ __('Last Name:') }}</label>
											<input  value="{{ $s_appliction->last_name }}" type="text" name="last_name" id="address" class="form-control">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label for="address">{{ __('chinese Name:') }}</label>
											<input  value="{{ $s_appliction->chinese_name }}" type="text" name="chinese_name" id="address" class="form-control">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label for="address">{{ __('Phone:') }}</label>
											<input  value="{{ $s_appliction->phone }}" type="text" name="phone" id="address" class="form-control">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label for="address">{{ __('Email:') }}</label>
											<input  value="{{ $s_appliction->email }}" type="email" name="email" id="address" class="form-control">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label for="address">{{ __('Date of Birth:') }}</label>
											<input  value="{{ $s_appliction->dob }}" type="date" name="dob" id="address" class="form-control">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label for="address">{{ __('Birth Place:') }}</label>
											<input  value="{{ $s_appliction->birth_place }}" type="date" name="birth_place" id="address" class="form-control">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label for="address">{{ __('Passport Number:') }}</label>
											<input  value="{{ $s_appliction->passport_number }}" type="text" name="passport_number" id="address" class="form-control">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label for="address">{{ __('Passport Exipre Date:') }}</label>
											<input  value="{{ $s_appliction->passport_exipre_date }}" type="date" name="passport_exipre_date" id="address" class="form-control">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label for="address">{{ __('Nationality:') }}</label>
											<select id="continent"  class="form-control" name="nationality" >
												<option value="">Select Nationality</option>
												@foreach ($countries as $country)
												<option @if ($country->id == $s_appliction->nationality) Selected @endif value="{{ $country->id }}">{{ $country->name }}</option>
												@endforeach
											</select>
											{{-- <input  value="{{ $s_appliction->nationality }}" type="text" name="nationality" id="address" class="form-control"> --}}
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label for="address">{{ __('Religion:') }}</label>
											<input  value="{{ $s_appliction->religion }}" type="text" name="religion" id="address" class="form-control">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label for="address">{{ __('Gender:') }}</label>
											<select id="continent"  class="form-control" name="gender" >
												<option value="">Select Gender</option>
												<option @if ($s_appliction->gender == 'Male') Selected @endif value="Male">Male</option>
												<option @if ($s_appliction->gender == 'Female') Selected @endif value="Female">Female</option>
											</select>
											{{-- <input  value="{{ $s_appliction->gender }}" type="text" name="facebook" id="address" class="form-control"> --}}
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label for="address">{{ __('Maritial Status:') }}</label>
											<select id="continent"  class="form-control" name="maritial_status" >
												<option value="">Select Maritial Status</option>
												<option @if ($s_appliction->maritial_status == 'Single') Selected @endif value="Single">Single</option>
												<option @if ($s_appliction->maritial_status == 'Married') Selected @endif value="Married">Married</option>
											</select>
											{{-- <input  value="{{ $s_appliction->maritial_status }}" type="text" name="facebook" id="address" class="form-control"> --}}
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label for="address">{{ __('In Chaina:') }}</label>
											<select id="continent"  class="form-control" name="in_chaina" >
												<option value="">Select In Chaina?</option>
												<option @if ($s_appliction->in_chaina == '0') Selected @endif value="0">No</option>
												<option @if ($s_appliction->in_chaina == '1') Selected @endif value="1">Yes</option>
											</select>
											{{-- <input  value="{{ $s_appliction->in_chaina }}" type="text" name="facebook" id="address" class="form-control"> --}}
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label for="address">{{ __('In Alcoholic:') }}</label>
											<select id="continent"  class="form-control" name="in_alcoholic" >
												<option value="">Select In Chaina?</option>
												<option @if ($s_appliction->in_alcoholic == '0') Selected @endif value="0">No</option>
												<option @if ($s_appliction->in_alcoholic == '1') Selected @endif value="1">Yes</option>
											</select>
											{{-- <input  value="{{ $s_appliction->in_alcoholic }}" type="text" name="facebook" id="address" class="form-control"> --}}
										</div>
									</div>
									<div class="col-lg-12">
										<div class="form-group">
											<label for="address">{{ __('Hobby:') }}</label>
											<textarea type="text" name="hobby" id="address" class="form-control">{{ $s_appliction->hobby }}</textarea>
										</div>
									</div>


									<div class="col-lg-12">
										<h1>Language Proficiency</h1>
									</div>

									

									<div class="col-lg-6">
										<div class="form-group">
											<label for="address">{{ __('Native Language:') }}</label>
											<input  value="{{ $s_appliction->native_language }}" type="text" name="native_language" id="address" class="form-control">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label for="address">{{ __('English Level:') }}</label>
											<select id="continent"  class="form-control" name="english_level" >
												<option value="" selected="">English level</option>
												<option @if ($s_appliction->english_level == '0') Selected @endif value="0">0 - Can't speak English at all </option>
												<option @if ($s_appliction->english_level == '1') Selected @endif value="1">1 - Beginner - not currently good enough to study in English</option>
												<option @if ($s_appliction->english_level == '2') Selected @endif value="2">2 - Intermediate - OK but needs some work</option>
												<option @if ($s_appliction->english_level == '3') Selected @endif value="3">3 - Fluent - very good level </option>
												<option @if ($s_appliction->english_level == '4') Selected @endif value="4">4 - Native English</option>
											</select>
											{{-- <input  value="{{ $s_appliction->english_level }}" type="text" name="facebook" id="address" class="form-control"> --}}
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label for="address">{{ __('Chinese Level:') }}</label>
											<select id="continent"  class="form-control" name="chinese_level" >
												<option value="" selected="">Chinese Level</option>
												<option @if ($s_appliction->chinese_level == '0') Selected @endif value="0">0 - Can't speak English at all </option>
												<option @if ($s_appliction->chinese_level == '1') Selected @endif value="1">1 - Beginner - not currently good enough to study in English</option>
												<option @if ($s_appliction->chinese_level == '2') Selected @endif value="2">2 - Intermediate - OK but needs some work</option>
												<option @if ($s_appliction->chinese_level == '3') Selected @endif value="3">3 - Fluent - very good level </option>
												<option @if ($s_appliction->chinese_level == '4') Selected @endif value="4">4 - Native English</option>
											</select>
											{{-- <input  value="{{ $s_appliction->chinese_level }}" type="text" name="facebook" id="address" class="form-control"> --}}
										</div>
									</div>

									<div class="col-lg-12">
										<h1>Home Address Details</h1>
									</div>

									<div class="col-lg-6">
										<div class="form-group">
											<label for="address">{{ __('Home Country:') }}</label>
											<input  value="{{ $s_appliction->home_country }}" type="text" name="home_country" id="address" class="form-control">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label for="address">{{ __('Home City:') }}</label>
											<input  value="{{ $s_appliction->home_city }}" type="text" name="home_city" id="address" class="form-control">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label for="address">{{ __('Home District:') }}</label>
											<input  value="{{ $s_appliction->home_district }}" type="text" name="home_district" id="address" class="form-control">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label for="address">{{ __('Home Street:') }}</label>
											<input  value="{{ $s_appliction->home_street }}" type="text" name="home_street" id="address" class="form-control">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label for="address">{{ __('Home Zipcode:') }}</label>
											<input  value="{{ $s_appliction->home_zipcode }}" type="text" name="home_zipcode" id="address" class="form-control">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label for="address">{{ __('Home Contact Name:') }}</label>
											<input  value="{{ $s_appliction->home_contact_name }}" type="text" name="home_contact_name" id="address" class="form-control">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label for="address">{{ __('Home Contact Phone:') }}</label>
											<input  value="{{ $s_appliction->home_contact_phone }}" type="text" name="home_contact_phone" id="address" class="form-control">
										</div>
									</div>

									<div class="col-lg-12">
										<h1>Postal Address Details</h1>
									</div>

									<div class="col-lg-6">
										<div class="form-group">
											<label for="address">{{ __('Current Country:') }}</label>
											<input  value="{{ $s_appliction->current_country }}" type="text" name="current_country" id="address" class="form-control">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label for="address">{{ __('Current City:') }}</label>
											<input  value="{{ $s_appliction->current_city }}" type="text" name="current_city" id="address" class="form-control">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label for="address">{{ __('Current District:') }}</label>
											<input  value="{{ $s_appliction->current_district }}" type="text" name="current_district" id="address" class="form-control">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label for="address">{{ __('Current Street:') }}</label>
											<input  value="{{ $s_appliction->current_street }}" type="text" name="current_street" id="address" class="form-control">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label for="address">{{ __('Current Zip Code:') }}</label>
											<input  value="{{ $s_appliction->current_zipcode }}" type="text" name="current_zipcode" id="address" class="form-control">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label for="address">{{ __('Current Contact Name:') }}</label>
											<input  value="{{ $s_appliction->current_contact_name }}" type="text" name="current_contact_name" id="address" class="form-control">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label for="address">{{ __('Current Contact Phone:') }}</label>
											<input  value="{{ $s_appliction->current_contact_phone }}" type="text" name="current_contact_phone" id="address" class="form-control">
										</div>
									</div>

									{{-- <div class="col-lg-12">
										<h1>Education Background</h1>
									</div>

									@foreach ($s_appliction->educations as $item)

										<div class="col-lg-6">
											<div class="form-group">
												<label for="address">{{ __('School:') }}</label>
												<input  value="{{ $item->school }}" type="text" name="school[]" id="address" class="form-control">
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<label for="address">{{ __('Major:') }}</label>
												<input  value="{{ $item->major }}" type="text" name="major[]" id="address" class="form-control">
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<label for="address">{{ __('Start Date:') }}</label>
												<input  value="{{ $item->start_date }}" type="date" name="start_date[]" id="address" class="form-control">
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<label for="address">{{ __('End Date:') }}</label>
												<input  value="{{ $item->end_date }}" type="date" name="end_date[]" id="address" class="form-control">
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<label for="address">{{ __('Gpa Type:') }}</label>
												<select id="continent"  class="form-control" name="gpa_type[]">
													<option @if ($s_appliction->gpa_type == '0') Selected @endif value="0">Very Low (Grade E Average, 40% or less, GPA 1.5 or less)</option>
													<option @if ($s_appliction->gpa_type == '1') Selected @endif value="1"> Below average - (Grade D Average, 45%- 55%, GPA 1.5-2)</option>
													<option @if ($s_appliction->gpa_type == '2') Selected @endif value="2"> Average level - (Grade C-B, 55% - 60%, GPA 2-2.5%) </option>
													<option @if ($s_appliction->gpa_type == '3') Selected @endif value="3"> Above average - (Grade B-A, 60-70%, GPA 2.5-3) </option>
													<option @if ($s_appliction->gpa_type == '4') Selected @endif value="4"> Exceptional - (Grade A, 70%+, GPA 3+)</option>
												</select>
											</div>
										</div>

									@endforeach
									
									<div class="col-lg-12">
										<h1>Work Experience</h1>
									</div>

									@foreach ($s_appliction->work_experiences as $item)

										<div class="col-lg-6">
											<div class="form-group">
												<label for="address">{{ __('Company Name:') }}</label>
												<input  value="{{ $item->company }}" type="text" name="company" id="address" class="form-control">
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<label for="address">{{ __('Job Title:') }}</label>
												<input  value="{{ $item->job_title }}" type="text" name="job_title" id="address" class="form-control">
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<label for="address">{{ __('Start Date:') }}</label>
												<input  value="{{ $item->start_date }}" type="date" name="start_date" id="address" class="form-control">
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<label for="address">{{ __('End Date:') }}</label>
												<input  value="{{ $item->end_date }}" type="date" name="end_date" id="address" class="form-control">
											</div>
										</div>

									@endforeach --}}

								</div>
								

								<hr>
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
