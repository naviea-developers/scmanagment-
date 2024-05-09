@extends('user.layouts.master-layout')
@section('head')
@section('title','- Privacy Policy')
@endsection
@section('main_content')

<br/>
<div class=" bg-light shadow">

    <div class="contentDivs p-4" style="color: var(--seller_text_color)">
        <h1>{{ @$privacy->title }}</h1>
        <span> <i class="fa-duotone fa fa-clock fa-spin-pulse"></i>  Last Update :
            {{ @$privacy->created_at }}
        </span>
        <p>
            </p><p>{!! @$privacy->description !!}</p><p>&nbsp;</p>
        <p></p>
    </div>
</div>
<br/>
<br/>

    <div class=" bg-light shadow ">
    <div class="contentDivs p-4" style="color: var(--seller_text_color)">
        <h1>{{ @$terms_conditions->title }}</h1>
        <span> <i class="fa-duotone fa fa-clock fa-spin-pulse"></i> Last Update :
            {{ @$terms_conditions->created_at }}
        </span>
        <p>
            </p><p>{!! @$terms_conditions->description !!}</p><p>&nbsp;</p>
        <p></p>
    </div>

</div>
<br/>
@endsection
