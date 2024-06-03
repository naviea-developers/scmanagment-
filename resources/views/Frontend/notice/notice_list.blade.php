@extends('Frontend.layouts.master-layout')
@section('title','- notice')
@section('head')
<link href="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/css/notice.css" rel="stylesheet"><link>
<style>title-box {
    font-size: 1.5em;
    background-color: #F6F6F6;
    padding-top: 15px;
    padding-bottom: 15px;
    text-align: center;
}
.margin-bottom10 {
    margin-bottom: 10px;
}


.box {
    background: white;
    box-shadow: 0 0 10px rgba(50, 50, 50, .17);
}
.box {
    padding: 10px;
    overflow: hidden;
    background-color: #ffffff;
}

.col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-xs-1, .col-xs-10, .col-xs-11, .col-xs-12, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9 {
    position: relative;
    min-height: 1px;
    padding-right: 15px;
    padding-left: 15px;
}
* {
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
}
* {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
user agent stylesheet
div {
    display: block;
}
Museo-Sans, body, h6, .h6 {
    font-family: "museo-sans", sans-serif;
    font-weight: 100;
}


.download-item:hover {
    box-shadow: 0 0 10px rgba(50, 50, 50, .17);
    text-decoration:none;
}
.border1 {
    border: 1px solid #fff;
}
</style>

<style>
table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}
</style>

@endsection
@section('main_contend')
@include('Frontend.layouts.parts.header-menu')

<br><br><br><br><br>
<section class="mt30 mb30">
    <div class="container">
        <div class="row">
            <div class="row">
                <!-- Right Side Start-->
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="col-sm-12 box margin-bottom10">
                        <div class="col-sm-12 title-box margin-bottom10"> CPSCBUSMS NOTICE BOARD</div>

                        <div class="col-sm-12 margin-bottom10">
                            <form method="GET" action="" accept-charset="UTF-8" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-xs-10 col-sm-10">
                                        <div class="row">
                                            <select class="form-control" name="cmbCategory"><option value="">All Notice</option><option value="1">Academic Notice</option><option value="2" selected="selected">Office Notice</option></select>
                                        </div>
                                    </div>

                                    <div class="col-xs-2 col-sm-2">
                                        <div class="row">
                                            <button type="submit" class="form-control btn btn-info"><i class="fa fa-search" aria-hidden="true"></i></button>
                                        </div>
                                    </div>
                                    
                                </div>
                            </form>
                        </div>

                        <div class="row">   
                            <table id="dtBasicExample" class="table responsive" width="100%">
                                <thead>
                                    <tr>
                                        <th class="th-sm">Publish Date</th>
                                        <th class="th-sm">Srl</th>
                                        <th class="th-sm">Notice Title</th>
                                        <th class="th-sm">View</th>
                                        <th class="th-sm">Download</th>
                                        <th class="th-sm">Depertment </th>
                                    </tr>
                                </thead>
                                <tbody>               
                                    <tr>
                                    <td>24 May, 2024</td>
                                    <td>1</td>
                                    <td>একাদশ শ্রেণিতে ভর্তি বিজ্ঞপ্তি</td>
                                    <td><a href="https://dupl-cms.s3.us-east-2.amazonaws.com/2024/notice/1716538795-a.pdf" target="_blank">View </a></td>
                                    <td><a href="https://cpscbusms.edu.bd/notice/64/2" target="_blank" type="get_object()." download="একাদশ শ্রেণিতে ভর্তি বিজ্ঞপ্তি.pdf" class="download"><i class="fa fa-download" aria-hidden="true"></i>
                                            <span style="color:#000;padding:10px">Download </span> </a></td>
                                    <td>Office Notice</td>

                                    </tr>
                                    
                                    <tr>
                                    <td>13 Feb, 2024</td>
                                    <td>2</td>
                                    <td>২০২৩-২৪ শিক্ষাবর্ষে মেডিকেল ভর্তি পরীক্ষায়   সফল শিক্ষার্থীদের তালিকা।</td>
                                    <td><a href="https://dupl-cms.s3.us-east-2.amazonaws.com/2024/notice/1707816829-aa.pdf" target="_blank">View </a></td>
                                    <td><a href="https://cpscbusms.edu.bd/notice/51/2" target="_blank" type="get_object()." download="২০২৩-২৪ শিক্ষাবর্ষে মেডিকেল ভর্তি পরীক্ষায়   সফল শিক্ষার্থীদের তালিকা।.pdf" class="download"><i class="fa fa-download" aria-hidden="true"></i>
                                            <span style="color:#000;padding:10px">Download </span> </a></td>
                                    <td>Office Notice</td>
                                    </tr>
                                    
                                    <tr>
                                    <td>07 Oct, 2023</td>
                                    <td>3</td>
                                    <td>হোস্টেল আসন বরাদ্দপ্রাপ্ত ছাত্রীদের প্রয়োজনীয় উপকরণসমূহ</td>
                                    <td><a href="" data-toggle="modal" data-target="#myModal42">View</a></td>
                                    <td><a href="https://cpscbusms.edu.bd/notice/42/2" target="_blank" type="get_object()." download="হোস্টেল আসন বরাদ্দপ্রাপ্ত ছাত্রীদের প্রয়োজনীয় উপকরণসমূহ.pdf" class="download"><i class="fa fa-download" aria-hidden="true"></i>
                                            <span style="color:#000;padding:10px">Download </span> </a></td>
                                    <td>Office Notice</td>
                                    </tr>
                                    
                                    <tr>
                                    <td>03 Jun, 2022</td>
                                    <td>4</td>
                                    <td>Rocket-এর মাধ্যমে টিউশন ফি প্রদান করার পদ্ধতি</td>
                                    <td> <a href="https://dupl-cms.s3.us-east-2.amazonaws.com/2022/notice/1654177407-Rocket%20PDF.pdf" target="_blank">View </a></td>
                                    <td><a href="https://cpscbusms.edu.bd/notice/6/2" target="_blank" type="get_object()." download="Rocket-এর মাধ্যমে টিউশন ফি প্রদান করার পদ্ধতি.pdf" class="download"><i class="fa fa-download" aria-hidden="true"></i>
                                            <span style="color:#000;padding:10px">Download </span> </a></td>
                                    <td>Office Notice</td>

                                    </tr>
                                    
                                    <tr>
                                    <td>22 Mar, 2022</td>
                                    <td>5</td>
                                    <td>ID এবং Password ব্যবহার করে SSLCOMMERZ CARD এর মাধ্যমে ফি পরিশোধ করার নিয়ম।</td>
                                    <td><a href="https://dupl-cms.s3.us-east-2.amazonaws.com/2022/notice/1647928679-SSLCOMMARZE%20CARD.pdf" target="_blank">View </a></td>
                                    <td><a href="https://cpscbusms.edu.bd/notice/5/2" target="_blank" type="get_object()." download="ID এবং Password ব্যবহার করে SSLCOMMERZ CARD এর মাধ্যমে ফি পরিশোধ করার নিয়ম।.pdf" class="download"><i class="fa fa-download" aria-hidden="true"></i>
                                            <span style="color:#000;padding:10px">Download </span> </a></td>
                                    <td>Office Notice</td>
                                    </tr>
                                    
                                    <tr>
                                    <td>22 Mar, 2022</td>
                                    <td>6</td>
                                    <td>Bkash-এর মাধ্যমে টিউশন ফি প্রদান করার পদ্ধতি</td>
                                    <td><a href="https://dupl-cms.s3.us-east-2.amazonaws.com/2022/notice/1647927715-CPSCBUSMS%281%29.pdf" target="_blank">View </a></td>
                                    <td><a href="https://cpscbusms.edu.bd/notice/4/2" target="_blank" type="get_object()." download="Bkash-এর মাধ্যমে টিউশন ফি প্রদান করার পদ্ধতি.pdf" class="download"><i class="fa fa-download" aria-hidden="true"></i>
                                            <span style="color:#000;padding:10px">Download </span> </a></td>
                                    <td>Office Notice</td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>						                          
                    </div>
                </div>
                <!-- Right Side Close-->
            </div>
        </div>
    </div>
</section>
@include('Frontend.layouts.parts.news-letter')
@endsection
@section('script')
  <script>
    //lode more
     var curPageNum = "{{ $notices->currentPage() }}";
     var lastPage = "{{ $notices->lastPage() }}";
     let pageN=curPageNum;
   // console.log(department);
    $('#showMore').on('click',function(){
       console.log('hi');
        if(parseInt(lastPage) > parseInt(curPageNum)){
            pageN=parseInt(curPageNum)+1;
            let url = '{{ url("get-notices-all-show") }}' +"?page="+pageN;
            axios.get(url)
            .then(res => {
                // console.log(res);
                curPageNum=parseInt(curPageNum)+1;

                $('.show-notice-data').append(res.data);
                if(parseInt(lastPage) == parseInt(curPageNum)){
                    $(this).parent().hide();
                }

            });
        }else{
            $(this).parent().hide();
        }

    });
  </script>
@endsection