@extends('frontend.master')

@section('title')
    Course Page
@endsection

<style>
    .courseImg {
        width: 100%;
        height: 450px;
        object-fit: contain;
        border-radius: 10px;
    }

    .databox img {
        height: 100%;
        cursor: pointer;
    }

    .section2 .col-md-12{
        background: #dedcdc;
        padding:10px;
        border-radius:5px;
    }

    .section3 {
        background: #dedcdc;
        padding:10px;
        border-radius:5px;
    }

    .br {
        border-radius: 5px;
        text-align: center;
        margin: 5px;
        width: calc(25% - 10px) !important;
    }
    .br .name {
        font-size: 18px;
        margin-top: 5px;
    }

    .br .edu{
        font-size: 16px;
    }


    .section3 .col-md-3 img {
        width: 100%;
        height: 150px;
    }

    .courseRoutine {
        background: #dedcdc;
        padding:10px;
        border-radius:5px;
    }

@media only screen and (max-width: 1000px) {

    .courseMainDiv {
        min-width: 100% !important;
    }

}

@media only screen and (max-width: 900px) {
  .container {
    min-width: 100%;
  }
}


@media only screen and (max-width: 768px) {

    .section3 .col-md-3 {
        min-width: calc(50% - 10px);
        float: left;
    }

    .col-md-4 .mt-5 {
        margin-top: 5px !important;
    }

    .col-md-4 a {
        margin: 0 auto;
        display: block;
        width: 50%;
        margin-bottom: 20px;
    }


    .courseMainDiv .col-md-4{
        width: 50% !important;
    }

    .courseMainDiv .col-md-4:last-child{
        width: 100% !important;
    }


}



@media only screen and (max-width: 600px) {
  .section2 .col-md-6 {
    min-width: 100%;
    margin: 0 !important;
    margin-top: 15px !important;
  }

  .section2 .col-md-6:first-child {
    margin-top: 0 !important;
  }
}



@media only screen and (max-width: 550px) {

    .courseMainDiv .col-md-4 {
        width: 100% !important;
    }

}



@media only screen and (max-width: 420px) {

    .section3 .col-md-3 img {
        height: 130px !important;
    }

}

.courseMainDiv .col-md-4 {
    padding: 10px;
}

.courseMainDiv .col-md-4 .databox {
	background: #dedcdc;
	padding: 10px;
	border-radius: 5px;
	height: 245px;
}


.courseRoutine table {
    width: 100%;
    border: 1px solid #000;
    padding: 5px;
}

.courseRoutine table tr td{
    padding: 10px;
	text-align: center;
}

.courseRoutine table tr {
	text-align: center;
}

.courseRoutine table tr:first-child th {
	background: #b7b6c3;
	padding: 5px;
	text-align: center;
}

.courseRoutine table tr:nth-child(odd) {background-color: #a7d3e6;};

</style>

@section('body')
    <div class="container courseMainDiv">
        @foreach ($course as $crs)
            <div class="row p-0">
                <div class="col-md-4">
                    <div class="databox">
                        <img src="{{ asset('video/').'/'.$crs->image }}" alt="" style="width:100%;">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="databox">
                        <h3 class="mt-5">{{ $crs->name }}</h3>
                        <p>
                            {{ $crs->short_description }}
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="databox">
                        <h3 class="mt-5">{{ $crs->course_hour }} - {{ $crs->total_days }} Day's </h3>
                        <h6>Price : {{ $crs->price }}</h6>
                        <a href="/bookNow/{{ $crs->id }}" class="btn btn-primary btn-sm">Book Now</a>
                    </div>
                </div>
            </div>

            <div class="row" style="padding:0px;">
                <div class="col-md-12 mt-4 p-0">
                    <div class="courseRoutine">
                       <center>
                        <h3><b>Course Routine</b></h3>
                       </center>
                        {!! $crs->course_routine !!}
                    </div>
                </div>
            </div>

            <div class="row mt-4 section2">

               <div class="col-md-12" style="margin-right: 0; float: right;">

                <h3><b>Course Description</b></h3>
                {!! $crs->long_description !!}

                </div>
               <div class="col-md-12 mt-4" style="margin-right: 0; float: right;">
                <h3><b>Features</b></h3>
                @php
                    $fts = explode("|",$crs->feature)
                @endphp

               <ul>
                    @foreach ($fts as $ft)
                        <li style="list-style: circel !important">{{ $ft }}</li>
                    @endforeach
               </ul>

               </div>
            </div>


            <div class="row mt-4 section3">
                <h3>
                    <b>Teacher's for this course</b>
                </h3>

                    <div class="col-md-3 bg-white p-2 br">
                        <img src="https://marvel-b1-cdn.bc0a.com/f00000000026007/resilienteducator.com/wp-content/uploads/2014/11/math-teacher.jpg">
                        <div class="name">Ms Bangla</div>
                        <div class="edu">DUET</div>
                    </div>

                    <div class="col-md-3 bg-white p-2 br">
                        <img src="https://www.allisonacademy.com/wp-content/uploads/2021/12/Teacher-in-the-classroom.jpg">
                        <div class="name">Mr English</div>
                        <div class="edu">BUET</div>
                    </div>

                    <div class="col-md-3 bg-white p-2 br">
                        <img src="https://wpvip.edutopia.org/wp-content/uploads/2022/10/alber-169hero-thelook-shutterstock_0.jpg?w=2880&quality=85">
                        <div class="name">Ms Math</div>
                        <div class="edu">DU</div>
                    </div>

                    <div class="col-md-3 bg-white p-2 br">
                        <img src="https://ieg.worldbankgroup.org/sites/default/files/Data/styles/inner_page_style/public/Blog/blog_teachertraining3_0.jpg?itok=9d4Ixm8b">
                        <div class="name">Mr ICT</div>
                        <div class="edu">Tuet</div>
                    </div>

            </div>
        @endforeach
    </div>
@endsection
