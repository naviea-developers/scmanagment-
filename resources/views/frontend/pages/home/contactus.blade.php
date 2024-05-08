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
        background: #a3a9a1c4;
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
    <img src="https://t3.ftcdn.net/jpg/02/88/96/58/360_F_288965895_YSleGrj7q57JdA4LxvwfigPZ3mmq9GaX.jpg" alt="">
</div>

<div class="container">
    <div class="row m-5">
        <div class="box">
           <center>
            <h2>Contact us</h2>
           </center>
            <form action="/SendContactData" method="post">
                @csrf
                <div class="row" padding: 0;margin-left: -13px;>
                    <div class="form-group mb-2">
                        <label for="">Your Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Your E-mail</label>
                        <input type="text" class="form-control" name="mail">
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Your Phone</label>
                        <input type="text" class="form-control" name="phone">
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Your Message</label>
                        <textarea style="resize: none" name="message" class="form-control" id="" cols="30" rows="5"></textarea>
                    </div>
                    <div class="form-group mb-2 text-center">
                        <button class="btn btn-light w-50"> Send </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
