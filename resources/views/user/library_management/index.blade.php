@extends('user.layouts.master-layout')
@section('head')
@section('title','- Change Password')


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
            <h4 style="color: black">Library</h4>
            {{-- <h4 style="color: var(--seller_text_color)">Library</h4> --}}
        </div>
    </div>
    <div class="passwodBox mb-3" style="background-color: var(  --seller_frontend_color); color:white">
        <form action="{{ route('user.password_change', auth()->user()->id) }}" method="POST" style="margin-top: 0%">
            @csrf
                
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="text-center">Student Information</h5>
                        <hr>
                        <label class="mt-3">Student Unique ID</label>
                        <input type="text" name="unique_id" class="form-control"/>

                        <label class="mt-3">Class</label>
                        <div class="mg-t-10 mg-sm-t-0">
                            <select id="class-select" name="class_id" class="form-control">
                                <option value=""> Select Class</option>
                                @foreach ($classes as $class)
                                <option value="{{ $class->id }}">{{ $class->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <label class="mt-3">Student Name</label>
                        <div class="mg-t-10 mg-sm-t-0">
                            <select id="student-select" name="student_id" class="form-control">
                                <option value=""> Select Student</option>
                                @foreach ($students as $student)
                                <option value="{{ $student->id }}" data-class-id="{{ $student->class_id }}">
                                    {{ $student->student_name }} - {{ $student->class->name }} - {{ $student->roll_number }}
                                </option>
                                @endforeach
                            </select>
                        </div>



                        {{-- <label class="mt-3">Student Name</label>
                        <div class="mg-t-10 mg-sm-t-0">
                            <select id="student-select" name="student_id" class="form-control">
                                <option value=""> Select Student</option>
                                @foreach ($students as $student)
                                <option value="{{ $student->id }}" 
                                        data-class-id="{{ $student->class_id }}"
                                        data-session-id="{{ $student->session_id }}"
                                        data-group-id="{{ $student->group_id }}"
                                        data-section-id="{{ $student->section_id }}">
                                    {{ $student->student_name }} - {{ $student->class->name }} - {{ $student->roll_number }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <label class="mt-3">Session</label>
                        <div class="mg-t-10 mg-sm-t-0">
                            <select id="session-select" name="session_id" class="form-control">
                                <option value=""> Select Session</option>
                                @foreach ($sessions as $session)
                                <option value="{{ $session->id }}">{{ $session->start_year }} - {{ $session->end_year }}</option>
                                @endforeach
                            </select>
                        </div>

                        <label class="mt-3">Class</label>
                        <div class="mg-t-10 mg-sm-t-0">
                            <select id="class-select" name="class_id" class="form-control">
                                <option value=""> Select Class</option>
                                @foreach ($classes as $class)
                                <option value="{{ $class->id }}">{{ $class->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <label class="mt-3">Group</label>
                        <div class="mg-t-10 mg-sm-t-0">
                            <select id="group-select" name="group_id" class="form-control">
                                <option value=""> Select Group</option>
                                @foreach ($groups as $group)
                                <option value="{{ $group->id }}">{{ $group->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <label class="mt-3">Section</label>
                        <div class="mg-t-10 mg-sm-t-0">
                            <select id="section-select" name="section_id" class="form-control">
                                <option value=""> Select Section</option>
                                @foreach ($sections as $section)
                                <option value="{{ $section->id }}">{{ $section->name }}</option>
                                @endforeach
                            </select>
                        </div> --}}


                    </div>

                    <div class="col-md-6">
                        <h5 class="text-center">Borrow Information</h5>
                        <hr>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="mt-3">From Date</label>
                                    <input type="date" name="from_date" class="form-control"/>
                                </div>
                                <div class="col-md-6">
                                    <label class="mt-3">To Date</label>
                                    <input type="date" name="to_date" class="form-control"/>
                                </div>
                            </div>
                        </div>
                       
                        <div class="d-flex">
                            <div class="col-md-8">
                                <label class="mt-3">Book List</label>
                                <select id="book-select" name="book_id" class="form-control">
                                    <option value=""> Select Book</option>
                                    @foreach ($books as $book)
                                    <option value="{{ $book->id }}" book_code="{{ $book->id }}"  data-class-id="{{ $book->class_id }}">{{ $book->name }}</option>
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
                        


                        {{-- <label class="mt-3">Student Name</label>
                        <input type="text" name="student_name" class="form-control"/> --}}
                        
                    </div>
                </div>
            </div>
            <hr>
            <div class="row mt-3">
                <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-right">
                  <button type="submit" class="btn btn-info ">Submit</button>
                </div>
            </div>

        </form>
    </div>
@endsection


@section('script')
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
});
</script>

<script>
    $(document).ready(function() {
        $('#add-book-btn').on('click', function() {
            var selectedBook = $('#book-select option:selected');
            var bookId = selectedBook.val();
            // var book_code=attr('book_code');
            var book_code = $(this).attr('book_code');
            console.log(book_code);
            var bookName = selectedBook.text();
            
            // Check if a book is selected and not already added
            if (bookId && !$("#book-" + bookId).length) {
                var bookHtml = `
                    <div id="book-${bookId}" class="row mt-2">
                        <div class="col-md-3">${book_code}</div>
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

@endsection