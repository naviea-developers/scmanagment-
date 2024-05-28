@extends('user.layouts.master-layout')
@section('head')
@section('title','- Library')
<link rel="stylesheet" href="{{asset('public/backend')}}/css/suneditor.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<style>
    .select2-container--default .select2-selection--single {
        height: 35px;}
</style>
@endsection
@section('main_content')
    <div class="right_section">
        <div>
            <h4 style="color: black">Library</h4>
        </div>
    </div>
    <div class="passwodBox mb-3" style="background-color: var(--seller_frontend_color); color:white">
        <form action="{{ route('teacher.library_borrow.store') }}" method="POST" style="margin-top: 0%">
            @csrf
                
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="text-center">Student Information</h5>
                        <hr>
                        <label class="mt-3">Student ID</label>
                        <input type="number" id="student-id-input" name="" class="form-control"/>

                        <label class="mt-3">Class</label>
                        <div class="mg-t-10 mg-sm-t-0">
                            <select id="class-select" name="class_id" class="form-control select2 form-select">
                                <option value=""> Select Class</option>
                                @foreach ($classes as $class)
                                <option value="{{ $class->id }}">{{ $class->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <label class="mt-3">Student Name</label>
                        <div class="mg-t-10 mg-sm-t-0">
                            <select id="student-select" name="student_id" class="form-control select2 form-select">
                                <option value=""> Select Student</option>
                                @foreach ($students as $student)
                                <option value="{{ $student->id }}" data-class-id="{{ $student->class_id }}" data-student-id-number="{{ $student->student_id_number }}">
                                    {{ $student->student_name }} - {{ $student->class->name }} - {{ $student->roll_number }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <h5 class="text-center">Borrow Information</h5>
                        <hr>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="mt-3">From Date</label>
                                    <input type="date" name="from_date" class="form-control" required/>
                                </div>
                                <div class="col-md-6">
                                    <label class="mt-3">To Date</label>
                                    <input type="date" name="to_date" class="form-control" required/>
                                </div>
                            </div>
                        </div>
                       
                        <div class="d-flex">
                            <div class="col-md-8">
                                <label class="mt-3">Book List</label>
                                <select id="book-select" name="book_id" class="form-control">
                                    <option value=""> Select Book</option>
                                    @foreach ($books as $book)
                                    <option value="{{ $book->id }}" data-book-code="{{ $book->book_code }}"  data-class-id="{{ $book->class_id }}">{{ $book->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4" style="margin-top: 40px">
                                <button type="button" id="add-book-btn" class="btn btn-info"><i class="fa fa-plus"></i> Add</button>
                            </div>
                        </div>
                    
                        <div id="selected-books-list" class="col-md-12 mt-3">
                            <!-- Added books will appear here -->
                        </div>
                    
                        <!-- Hidden inputs for selected books -->
                        <div id="selected-books-inputs"></div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row mt-3">
                <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-right">
                  <button type="submit" class="btn btn-info">Submit</button>
                </div>
            </div>

        </form>
    </div>
@endsection


@section('script')
<script src="{{asset('public/backend')}}/js/suneditor.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    $('#class-select').on('change', function() {
        var classId = $(this).val();
        
        // Filter students based on the selected class
        filterStudentsByClass(classId);

        // Filter books based on the selected class
        filterBooksByClass(classId);
    });

    $('#student-id-input').on('input', function() {
        var studentIdNumber = $(this).val();
        updateSelectionsByStudentIdNumber(studentIdNumber);
    });

    function filterStudentsByClass(classId) {
        $('#student-select option').each(function() {
            var studentClassId = $(this).data('class-id');
            if (studentClassId == classId || $(this).val() == "") {
                $(this).show();
            } else {
                $(this).hide();
            }
        });

        // Reset the student select value
        $('#student-select').val('');
    }

    function filterBooksByClass(classId) {
        $('#book-select option').each(function() {
            var bookClassId = $(this).data('class-id');
            if (bookClassId == classId || $(this).val() == "") {
                $(this).show();
            } else {
                $(this).hide();
            }
        });

        // Reset the book select value
        $('#book-select').val('');
    }

    function updateSelectionsByStudentIdNumber(studentIdNumber) {
        $('#student-select option').each(function() {
            if ($(this).data('student-id-number') == studentIdNumber) {
                var classId = $(this).data('class-id');
                $('#class-select').val(classId).trigger('change');
                $('#student-select').val($(this).val());
                return false; // Break the loop once the student is found
            }
        });
    }
});

$(document).ready(function() {
    $('#add-book-btn').on('click', function() {
        var selectedBook = $('#book-select option:selected');
        var bookId = selectedBook.val();
        var bookCode = selectedBook.data('book-code');
        var bookName = selectedBook.text();
        
        // Check if a book is selected and not already added
        if (bookId && !$("#book-" + bookId).length) {
            var bookHtml = `
                <div id="book-${bookId}" class="row mt-2">
                    <div class="col-md-3">${bookCode}</div>
                    <div class="col-md-6">${bookName}</div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-danger btn-sm remove-book-btn" data-book-id="${bookId}">
                            X
                        </button>
                    </div>
                </div>
            `;
            $('#selected-books-list').append(bookHtml);

            // Add hidden input for selected book
            $('#selected-books-inputs').append(`<input type="hidden" name="book_id[]" id="input-book-${bookId}" value="${bookId}">`);
        }
    });

    // Delegate the click event to dynamically added remove buttons
    $('#selected-books-list').on('click', '.remove-book-btn', function() {
        var bookId = $(this).data('book-id');
        $("#book-" + bookId).remove();
        $("#input-book-" + bookId).remove();
    });

    // Handle form submission
    $('#book-form').on('submit', function() {
        // Ensure all hidden inputs are included in the form submission
        $('#selected-books-inputs input').each(function() {
            $(this).appendTo('#book-form');
        });
    });
});
</script>


<script>
       $(document).ready(function() {
        console.log("hi");
    $('.select2').select2();
    });

</script>

@endsection
