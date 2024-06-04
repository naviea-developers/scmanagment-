@extends('Frontend.layouts.master-layout')
@section('title','- notice')
@section('head')
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<style>
    title-box {
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


    .button_page {
        display: flex;
        justify-content: end;
        align-items: center;
    }
    .button_page a {
        text-decoration: none;
        font-size: 16px;
        color: #000000;
        padding: 6px 10px;
        transition: 0.4s;
    }
    .prev {
        border: 1px solid #000000;
        padding: 6px 20px !important;
    }
    .button_page .next {
        background: none;
        border: 1px solid;
    }
    .button_page a {
        text-decoration: none;
        font-size: 16px;
        color: #000000;
        padding: 6px 10px;
        transition: 0.4s;
    }
    .next {
        background-color: #00a662;
        padding: 6px 20px !important;
        display: inline-block;
        border: 1px solid #00a662;
    }
    .button_page .active {
        background-color: #00a662 !important;
        border-color: #00a662;
    }
</style>

@endsection

@section('main_contend')
@include('Frontend.layouts.parts.header-menu')

{{-- <br><br><br><br><br> --}}
<section class="mt30 mb30" style="margin-top: 128px;">
    <div class="container">
        <div class="row">
            <div class="row">
                <!-- Right Side Start-->
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="col-sm-12 box margin-bottom10">
                        <div class="col-sm-12 title-box margin-bottom10"> <h5>NOTICE BOARD</h5></div>

                        <div class="col-sm-12 margin-bottom10">
                            <form method="GET" action="" accept-charset="UTF-8" enctype="multipart/form-data">
                                <div class="row">
                                    
                                    <div class="col-xs-10 col-sm-10">
                                        <div class="row">
                                            <select class="form-control form-select"  name="search">
                                                <option value=""> All Notice</option>
                                                @foreach (@$noticeTypes as $noticeType)
                                                <option @if (@$noticeType->id == @$search) Selected @endif value="{{ @$noticeType->id }}">{{ @$noticeType->name }}</option>
                                                @endforeach                   
                                            </select>
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

                        @if ($notices->count() > 0)   
                            <div class="row">   
                                <table id="dtBasicExample" class="table responsive" width="100%">
                                    <thead>
                                        <tr>
                                            <th class="th-sm">Publish Date</th>
                                            <th class="th-sm">Srl</th>
                                            <th class="th-sm">Notice Title</th>
                                            <th class="th-sm">View</th>
                                            <th class="th-sm">Download</th>
                                            <th class="th-sm">Department</th>
                                        </tr>
                                    </thead>
                                    <tbody>   
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($notices as $notice)            
                                            <tr>
                                                <td>{{ date('d, F Y', strtotime(@$notice->created_at)) }}</td>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ @$notice->name }}</td>
                                                <td><a href="{{ @$notice->notice_file_show }}" target="_blank">View</a></td>
                                                <td><a href="{{ route('frontend.notice_pdf_download', @$notice->id) }}" target="_blank" download="" class="download">
                                                    <i class="fa fa-download" aria-hidden="true"></i>
                                                    <span style="color:#000; padding:10px">Download</span></a>
                                                </td>
                                                <td>{{ @$notice->noticeType->name }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>	

                            @if($notices->lastPage() != 1)
                            <div class="pagei_NationButton">
                              <div class="button_page">
                                <a class="prev" href="{{ @$notices->previousPageUrl() }}">Previous</a>
                                @for ($i=1;$i <= @$notices->lastPage();$i++)
                                    <a style="margin: 0 5px; border: 1px solid;padding: 6px 10px;" @if($i == @$notices->currentPage()) class="active" @endif href="{{ @$notices->url($i) }}">{{ $i }}</a>
                                @endfor
            
                                <a class="next" href="{{ @$notices->nextPageUrl() }}">Next</a>
                              </div>
                            </div>
                            @endif
                        @else
                        <div class="text-center">
                            <h2 class="">Notice Not Found!</h2>
                        </div> 
                        @endif
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

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

@endsection