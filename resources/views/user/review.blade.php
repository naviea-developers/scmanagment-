@extends('user.layouts.master-layout')
@section('head')
@section('title','- Review')


@endsection
@section('main_content')

    {{-- success message start --}}
    @if(session()->has('message'))
    <div class="alert alert-success">
    {{-- <button type="button" class="close" data-bs-dismiss="alert" aria-hidden="true"></button> --}}
    {{session()->get('message')}}
    </div>
    <script>
        setTimeout(function(){
            $('.alert.alert-success').hide();
        }, 3000);
    </script>
    @endif
    {{-- success message start --}}
    <div class="right_section">
        <div>
            <h4 style="color: white">My Review</h4>
        </div>
    </div>
    <br>

    <div class="container mt-3">
        <div class="row">
            <div class="card card-body shadow">
                <div class="col-lg-12">
                    <div class="">
                        <table class="table table-hover">
                            <thead>
                                <tr class="text-center">
                                    <th>Customer ID</th>
                                    <th>Customer Name</th>
                                    <th>Customer Phone</th>
                                    <th>Customer Email</th>
                                    <th>Rating</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($reviews as $review)
                                    <tr class="text-center">
                                        <th>{{$review->user->id}}</th>
                                        <td>{{ $review->user->fname}}</td>
                                        <td>{{ $review->user->mobile}}</td>
                                        <td>{{ $review->user->email}}</td>
                                        <td>{{ $review->rating}}</td>

                                    </tr>
                                @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
<script>
    $('#status').on('change',function(){
        $('#search_btn').click();
    })
</script>
@endsection
