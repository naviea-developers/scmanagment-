@extends('Frontend.layouts.master-layout')
@section('title','- Instructor')
@section('head')
{{-- <style>
		
	/* founder and co-funder section */
	.ourteam-section {
		padding-bottom: unset;
	}


	.our-team-title {
		margin-bottom: 15px;
	}
	.our-team-title h2 {
		padding: 0px;
		margin: 0px;
		font-weight: bold;
		border-left: 5px solid var(--header_color);;
		/* border-left: 5px solid #007bff; */
		padding-left: 5px;
		border-radius: 4px;
		font-size: 24px;
	}

	.our-team {
		padding: 30px 0 40px;
		margin-bottom: 30px;
		background-color: #f7f5ec;
		text-align: center;
		overflow: hidden;
		position: relative;
		border: 1px solid var(--header_color);;
		/* border: 1px solid #007bff; */
		border-radius: 8px;
		transition: all 0.4s ease-in 0s;
		cursor: pointer;
	}
	.our-team:hover {
		background: white;
	}
	.our-team .picture {
		display: inline-block;
		height: 130px;
		width: 130px;
		z-index: 1;
		position: relative;
	}

	.our-team .picture::before {
		content: "";
		width: 100%;
		height: 0;
		border-radius: 50%;
		/* background-color: #1369ce; */
		background-color: var(--header_color);
		position: absolute;
		bottom: 135%;
		right: 0;
		left: 0;
		opacity: 0.9;
		transform: scale(3);
		transition: all 0.3s linear 0s;
	}

	.our-team:hover .picture::before {
		height: 100%;
	}

	.our-team .picture::after {
		content: "";
		width: 100%;
		height: 100%;
		border-radius: 50%;
		background-color: var(--header_color);
		/* background-color: #1369ce; */
		position: absolute;
		top: 0;
		left: 0;
		z-index: -1;
	}

	.our-team .picture img {
		width: 100%;
		height: 100%;
		border-radius: 50%;
		transform: scale(1);
		transition: all 0.9s ease 0s;
	}

	.our-team:hover .picture img {
		box-shadow: 0 0 0 14px #f7f5ec;
		transform: scale(0.7);
	}

	.our-team .title {
		display: block;
		font-size: 13px;
		color: #4e5052;
		text-transform: capitalize;
	}

	.our-team .social {
		width: 100%;
		padding: 0;
		margin: 0;
		/* background-color: #1369ce; */
		background-color: var(--header_color);
		position: absolute;
		bottom: -100px;
		left: 0;
		transition: all 0.5s ease 0s;
	}

	.our-team:hover .social {
		bottom: 0;
	}

	.our-team .social li {
		display: inline-block;
	}

	.our-team .social li a {
		display: block;
		padding: 10px;
		font-size: 17px;
		color: white;
		transition: all 0.3s ease 0s;
		text-decoration: none;
	}

	.our-team .social li a:hover {
		color: var(--header_color);
		/* color: #1369ce; */
		background-color: #f7f5ec;
	}

	.team-content .name{
		font-size: 18px;
		color: black;
		margin-top: 30px;
	}
	.closeIcon button{
		display: flex;
		justify-content: center;
		align-items: center;
	}
	.closeIcon button span{
		background: #da0b0b;
		padding: 10px;
		border-radius: 50%;
		height: 35px;
		width: 35px;
		position: absolute;
		margin-top: 3px;
		color: white;
		display: flex;
		justify-content: center;
		align-items: center;
	}

</style> --}}
@endsection
@section('main_contend')
@include('Frontend.layouts.parts.header-menu')
<br><br><br><br><br><br><br><br>
<section class="ourteam-section">
	@foreach (@$designations as $designation)
		<div class="container">
			<div class="our-team-title">
				<h2 style="color: var(--text_color)">{{ @$designation->name }}</h2>
			</div>
			<div class="row">
				@foreach (@$designation->user_designations as $teacher)
					<div class="col-12 col-sm-6 col-md-4 col-lg-3">
						<div class="our-team" data-toggle="modal" data-id="6" data-target=".bd-example-modal-lg" onclick="ViewDetailsModel(6)">
						<div class="picture">
							<img style="height: 131px;" class="img-fluid" src="{{ @$teacher->image_show }}">
						</div>
						<div class="team-content">
							<h3 class="name">{{ @$teacher->name }}</h3>
							<h4 class="title">{{ @$designation->name }}</h4>
						</div>
						<ul class="social">
							<li><a href="{{ @$teacher->facebook_id }}" class="fab fa-facebook" aria-hidden="true"></a></li>
							<li><a href="{{ @$teacher->twitter_id }}" class="fab fa-twitter" aria-hidden="true"></a></li>
							<li><a href="{{ @$teacher->google_id }}" class="fab fa-google-plus" aria-hidden="true"></a></li>
							<li><a href="{{ @$teacher->instagram_id }}" class="fab fa-linkedin" aria-hidden="true"></a></li>
						</ul>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	@endforeach
</section>
@include('Frontend.layouts.parts.news-letter')

@endsection



