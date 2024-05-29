@section('title')
    Admin - Admit_Card
@endsection
@extends('Backend.layouts.layouts')
@section('style')
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<style>
	.txt-center {
    text-align: center;
}
.border- {
    border: 1px solid #000 !important;
}
.padding {
    padding: 15px;
}
.mar-bot {
    margin-bottom: 15px;
}
.admit-card {
    border: 2px solid #000;
    padding: 15px;
    /* margin: 20px 0; */
    margin-left: 182px;
}
.BoxA h5, .BoxA p {
    margin: 0;
}
h5 {
    text-transform: uppercase;
}
table img {
    width: 100%;
    margin: 0 auto;
}
.table-bordered td, .table-bordered th, .table thead th {
    border: 1px solid #000000 !important;
}

.school-info {
      flex: 1;
      text-align: left;
  }
  .footer {
            text-align: right;
            margin-top: 20px;
        }
  .footer p {
      margin: 5px 0;
  }
</style>
@endsection
@section('main_contain')
<br><br><br><br>
<section>
	<div class="container mb-5" >
		<div class="admit-card" style="background-color: #e1e1c2;">

			{{-- <div class="BoxA border- padding mar-bot"> 
				<div class="row">
					<div class="col-sm-4">
						<h5>MEWAR UNIVERSITY</h5>
						<p>NH - 79 Gangrar Chittorgarh - 312901 <br> RAJASTHAN, INDIA</p>
					</div>
					<div class="col-sm-4 txt-center">
						<img src="http://peoplehelp.in/mewaruni/assets/images/mewaruniversity.jpg" width="100px;" />
					</div>
					<div class="col-sm-4">
						<h5>Admit Card</h5>
						<p>B.Tech - 2019</p>
					</div>
				</div>
			</div> --}}


			{{-- <div class="BoxC border- padding mar-bot">
				<div class="row">
					<div class="col-sm-6">
						<h5>Enrollment No : 9910101</h5>
					</div>
				</div>
			</div> --}}

      <div class="BoxE border- mar-bot txt-center" style="background-color: #e1e1c2;">
				<div class="row">
					<div class="col-sm-12">
            <div class="school-info">
              <img  src="school-logo.png" alt="School Logo">
            </div>
						<h5>School Name</h5>
            <p>Mobile :017 <br> Email : shio@gmail.com <br> Webside : shio@gmail.com </p>
						{{-- <p>NH - 79 Gangrar Chittorgarh - 312901 <br> RAJASTHAN, INDIA</p> --}}
					</div>
          
				</div>
			</div>

      <div class="txt-center">
        <h4>Examination Admit Card</h4>
        <p>Final Exam</p>
      </div>
      
			<div class="BoxD border- padding mar-bot" style="background-color: #e1e1c2;">
				<div class="row">
					<div class="col-sm-10">
						<table class="table table-bordered">
						  <tbody>
							<tr>
							  <td><b>Student ID : 9910101</b></td>
							  <td><b>Class: </b> 1</td>
							</tr>
							<tr>
							  <td><b>Student Name: </b>Vinod Sharma</td>
							  <td><b>Group: </b>s</td>
							</tr>
							<tr>
							  <td><b>Roll: </b>01</td>
							  <td><b>DOB: </b>02 Jul 2019</td>
							</tr>
							{{-- <tr>
							  <td colspan="2" style="    height: 125px;"><b>Address: </b>moh hasnxgxums , moh hasnxgxums, moh hasnxgxums</td>
							</tr> --}}
						  </tbody>
						</table>
					</div>
					<div class="col-sm-2 txt-center">
						<table class="table table-bordered">
						  <tbody>
							<tr>
							  <th scope="row txt-center"><img src="http://peoplehelp.in/mewaruni/assets/uploads/student_photo/cda1af3d3e81a4b46ef182a5336b778b.jpg" width="100px" height="123px" /></th>
							</tr>
							{{-- <tr>
							  <th scope="row txt-center"><img src="http://peoplehelp.in/mewaruni/images/signature.png" /></th>
							</tr> --}}
						  </tbody>
						</table>
					</div>
				</div>
			</div>
			{{-- <div class="BoxE border- padding mar-bot txt-center">
				<div class="row">
					<div class="col-sm-12">
						<h5>EXAMINATION VENUE</h5>
						<p>NH - 79 Gangrar Chittorgarh - 312901 <br> RAJASTHAN, INDIA</p>
					</div>
				</div>
			</div> --}}
			<div class="BoxF border- padding mar-bot txt-center" style="background-color: #e1e1c2;">
				<div class="row">
					<div class="col-sm-12">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>Sr. No.</th>
									<th>Subject</th>
                  <th>Room</th>
									<th>Exam Date</th>
								</tr>
							</thead>
						  <tbody>
							<tr>
							  <td>1</td>
							  <td>English</td>
                <td>100</td>
							  <td>5 July 2019</td>
							</tr>
							<tr>
							  <td>2</td>
							  <td>English</td>
                <td>100</td>
							  <td>5 July 2019</td>
							</tr>
							<tr>
							  <td>3</td>
							  <td>English</td>
                <td>100</td>
							  <td>5 July 2019</td>
							</tr>
						  </tbody>
						</table>
					</div>
				</div>
			</div>
			{{-- <footer class="txt-center">
				<p>*** MEWAR UNIVERSITY ***</p>
			</footer> --}}

      <div class="footer">
        <p>Principal's Signature: _____________________</p>
        <p>Date: _____________________</p>
     </div>
			
		</div>
	</div>
	
</section>
@endsection

@section('script')
{{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
@endsection
    