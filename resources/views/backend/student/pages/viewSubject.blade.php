@extends('backend.student.master')

@section('content')
    <div class="row mt-5">
        @foreach($subject as $sub)
        <div class="col-md-3">
            <div class="card" style="width: 80%">
                <img src="{{ asset('backend/subject/'.$sub->iamge) }}" height="200" width="200" alt="">
                <div class="card-body">
                    <h3>{{ $sub->subject }}</h3>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<style>
    img{
        padding: 10px 20px;
        position: relative;
    }
    .card{
        position: absolute;
    }
    .col-md-3{
        margin-right: -37px;
    }
</style>
@endsection
