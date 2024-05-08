@extends('frontend.master')

@section('title')
    Course Details Page
@endsection

@section('body')

<style>
    .box{
        width: 500px;
        height: auto;
        margin: 0 auto;
        display: block;
        border: 1px solid #ccc;
        padding: 10px;
        border-radius: 10px;
        background: #ccccccba;
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%,-40%);
    }

@media only screen and (max-width: 768px) {
    .container {
        min-width: 100% !important;
        padding: 0px !important;
    }

    .container .m-5 {
        margin: 60px 15px !important;
    }
}


.banner img {
	width: 100%;
	margin-top: -50px;
	height: 800px;
	margin-bottom: -210px;
}

</style>

<div class="banner">
    <img src="https://img.freepik.com/free-photo/smiling-beautiful-woman-holding-money-dollars-pointing-finger-left-showing-logo-company-banner-standing-beige-background_1258-86790.jpg" alt="">
</div>

<div class="container">
    <div class="row m-5">
        <div class="box">
           <center>
            <h2>Carrier with us</h2>
           </center>
            <div class="row" padding: 0;margin-left: -13px;>
                <form action="/SendCarrierData" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-2">
                        <label for="">Your Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Your email</label>
                        <input type="text" class="form-control" name="mail">
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Your phone</label>
                        <input type="text" class="form-control" name="phone">
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Your Education</label>
                        <select name="edu" id="" class="form-control">
                            <option value="BSC">BSC</option>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Your CV</label>
                        <input type="file" class="form-control" accept="document/*" name="cv">
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Your Skill's</label>
                        <textarea style="resize: none" name="skill" class="form-control" id="" cols="30" rows="5"></textarea>
                    </div>
                    <div class="form-group mb-2 text-center">
                        <button type="submit" class="btn btn-light w-50"> Send </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
