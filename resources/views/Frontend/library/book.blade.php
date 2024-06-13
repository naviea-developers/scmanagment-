@extends('Frontend.layouts.master-layout')
@section('title','- Books')

@section('head')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@endsection

@section('main_contend')
@include('Frontend.layouts.parts.header-menu')
<br>

<div class="content_search" style="margin-top:70px">
    <link href="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/css/blog.css" rel="stylesheet">
    <div class="bg-alice-blue py-3 py-lg-4">
        <div class="container-lg p-2 p-md-5">
            
            <h4 class="text-center mb-3 mt-3"><b>ALL Books</b></h4>

            <div class="col-md-12 mb-5" style="border: 1px solid; padding: 10px">
                <div class="row">
                    <div class="col-md-4">
                        <label class=" form-control-label" style=""><b>Class:</b></label>
                        <select class="form-control class_id" name="class_id" id="class">
                            <option value="">Select Class</option>
                            @foreach ($classes as $class)
                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                            @endforeach
                        </select>
                    </div>
            
                    <div class="col-md-4">
                        <label class=" form-control-label" style=""><b>Group:</b></label>
                        <select class="form-control group_id" name="group_id" id="group">
                            <option value="">Select Group</option>
                            {{-- @foreach ($groups as $group)
                            <option value="{{ $group->id }}">{{ $group->name }}</option>
                            @endforeach --}}
                        </select>
                    </div>
            
                    <div class="col-md-4">
                        <label class="form-control-label" style=""><b>Book Name:</b></label>
                        <input type="text" name="name" class="form-control" id="book_name" placeholder="Search by Name"/>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="row" id="book_list">
                    @foreach ($books as $book)
                    <div class="col-md-3">
                        <div class="mb-3 card card-body shadow">
                            <div class="picture">
                                <img style="height:200px; width:100%;object-fit: fill" class="img-fluid" src="{{ $book->image_show }}">
                            </div>
                            <div>
                                {{-- <h6 class="title mt-2" style="text-align: center;">Book ID: {{ $book->book_code }}</h6> --}}
                                <h6 class="title mt-2" style="text-align: center;">{{ $book->name }}</h6>
                                <h6 class="title" style="text-align: center;">{{ $book->class->name }}</h6>
                                <h6 class="title" style="text-align: center;">Stock In: {{ $book->total_set - $book->stock_out }}</h6>
                            </div>
                        </div>
                    </div>
                    @endforeach   
                </div>                    
            </div>
        </div>

        <div class="text-center my-3 blog_filter_off removebuton_16">
            <button type="button" class="btn btn-lg btn-dark-cerulean" id="load_more">
                Load more
                <svg class="ms-2" xmlns="http://www.w3.org/2000/svg" width="28.56" height="15.666" viewBox="0 0 28.56 15.666">
                    <path id="right-arrow_3_" data-name="right-arrow (3)" d="M20.727,107.5l-1.272,1.272,5.661,5.661H0v1.8H25.116l-5.661,5.661,1.272,1.272,7.833-7.833Z" transform="translate(0 -107.5)" fill="#fff"></path>
                </svg>
            </button>
        </div>
    </div>
</div>

@include('Frontend.layouts.parts.news-letter')

<script>
$(document).ready(function() {
    var page = 2;
    var lastPage = {{ $books->lastPage() }};
    var isFiltering = false;

    function fetchBooks(loadMore = false) {
        var class_id = $('#class').val();
        var group_id = $('#group').val();
        var book_name = $('#book_name').val();

        $.ajax({
            url: '{{ route("books.filter") }}',
            method: 'GET',
            data: {
                class_id: class_id,
                group_id: group_id,
                book_name: book_name,
                page: loadMore ? page : 1
            },
            success: function(response) {
                if (loadMore) {
                    $('#book_list').append(response.html);
                    if (page >= response.lastPage) {
                        $('#load_more').hide();
                    }
                } else {
                    $('#book_list').html(response.html);
                    page = 2;
                    $('#load_more').show();
                    lastPage = response.lastPage;
                }
            }
        });
    }

    $('#class, #group').change(function() {
        isFiltering = true;
        fetchBooks();
        isFiltering = false;
    });

    $('#book_name').keyup(function() {
        isFiltering = true;
        fetchBooks();
        isFiltering = false;
    });

    $('#load_more').click(function() {
        if (page <= lastPage) {
            fetchBooks(true);
            page++;
        }
    });
    
    $('body').on("change", '#class', function() {
        let id = $(this).val();
        getGroup(id, "group");
    });

    function getGroup(id, outid) {
        let url = '{{ url("get/group/") }}/' + id;
        axios.get(url)
            .then(res => {
                console.log(res);
                $('#' + outid).empty();
                let html = '';
                html += '<option value="">Select group</option>'
                res.data.forEach(element => {
                    html += "<option value=" + element.id + ">" + element.name + "</option>"
                });
                $('#' + outid).append(html);
                $('#' + outid).val("").change();
            });
    }
});
</script>

@endsection
