@extends('user.layouts.master-layout')
@section('head')
@section('title','- Syllabus')@endsection
@section('main_content')

    <style>
        /* Additional custom styles */
        .school-name {
        text-align: center;
        margin-bottom: 30px;
        }
        .class-routine {
        margin-bottom: 50px;
        }
        .class-routine table {
        width: 100%;
        border-collapse: collapse;
        }
        .class-routine th, .class-routine td {
        border: 1px solid #ccc;
        padding: 8px;
        text-align: center;
        }
        .class-routine th {
        background-color: #f2f2f2;
        }
    
        .syllabus-container {
            margin: 20px;
        }
        .examination {
            border: 1px solid #000;
            padding: 10px;
            margin-bottom: 20px;
        }
        .subject {
            border: 1px solid #555;
            padding: 10px;
            margin-bottom: 15px;
            margin-left: 20px;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }
        .table, .table th, .table td {
            border: 1px solid #121212;
        }
        .table th, .table td {
            padding: 8px;
            text-align: left;
        }
    </style>

    <div class="passwodBox mb-3" style="background-color: var(--seller_frontend_color);color:var(--seller_text_color)">
        
            @php
            $results = \App\Models\Tp_option::where('option_name', 'theme_option_school_info')->first();
            $school_info = json_decode($results->option_value);
            @endphp

          @if (@$syllabus->count() > 0)
              <div class="float-end">
                <a href="{{ route('user.syllabus_download') }}?class_id={{ @$syllabus[0]->class_id }}" class="btn btn-light text-capitalize border-0" data-mdb-ripple-color="dark"><i class="fa fa-solid fa-download"></i> Download PDF</a>
              </div>
              <br>
              <br>
              <br>
          
              <div class="school-name " style="color: #000">
                <h1 class="text-center"><b>{{ @$school_info->school_name }}</b></h1>
                <h5><b>Class Name: {{ @$syllabus[0]->class->name }}</b></h5>
                <h5><b>Session: {{@$syllabus[0]->examination->session->start_year}} - {{@$syllabus[0]->examination->session->end_year}}</b></h5>
                <h2><b>Syllabus</b></h2>
              </div>
            <hr style="color: black; height:2px">
              <div class="class-routine">
                
              @php
                  $displayedExaminations = [];
              @endphp
              
              <div class="syllabus-container">
                  @foreach ($syllabus as $syllabus_item)
                      @if (!in_array($syllabus_item->examination->id, $displayedExaminations))
                          @php
                              $displayedExaminations[] = $syllabus_item->examination->id;
                              // Get all syllabus items for the current examination
                              $relatedSyllabus = $syllabus->where('examination_id', $syllabus_item->examination->id);
                              $displayedSubjects = [];
                          @endphp
              
                          <div class="">
                              <h3 class="text-center" style="color: #000"><b>{{ @$syllabus_item->examination->name }}</b></h3>
              
                              @foreach ($relatedSyllabus as $related_item)
                                  @if (!in_array($related_item->subject->id, $displayedSubjects))
                                      @php
                                          $displayedSubjects[] = $related_item->subject->id;
                                          $relatedLessons = $relatedSyllabus->where('subject_id', $related_item->subject->id);
                                      @endphp
              
                                      <div class="">
                                          <h5 class="text-center" style="color: #000"><b>{{ @$related_item->subject->name }}</b></h5>
              
                                          <table class="table" style="border: 1px solid rgb(13, 10, 10);">
                                              <thead>
                                                  <tr>
                                                      <th>Lesson</th>
                                                      <th>Lesson Details</th>
                                                  </tr>
                                              </thead>
                                              <tbody>
                                                  @foreach ($relatedLessons as $lesson_item)
                                                      <tr>
                                                          <td>{{ $lesson_item->lession->name }}</td>
                                                          <td>{!! $lesson_item->lession_item !!}</td>
                                                      </tr>
                                                  @endforeach
                                              </tbody>
                                          </table>
                                      </div>
                                  @endif
                              @endforeach
                          </div>
                      @endif
                  @endforeach
              </div>
              
              {{-- @php
                  $displayedExaminations = [];
              @endphp
              
              <table class="table ">
                  <thead>
                      <tr>
                          <th>Examination</th>
                          <th>Subject</th>
                          <th>Lesson</th>
                          <th>Lesson Details</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($syllabus as $syllabus_item)
                          @if (!in_array($syllabus_item->examination->id, $displayedExaminations))
                              @php
                                  $displayedExaminations[] = $syllabus_item->examination->id;
          
                                  $relatedSyllabus = $syllabus->where('examination_id', $syllabus_item->examination->id);
                                  $displayedSubjects = [];
                                  $examRowSpan = $relatedSyllabus->count();
                              @endphp
              
                              @foreach ($relatedSyllabus as $related_item)
                                  @if (!in_array($related_item->subject->id, $displayedSubjects))
                                      @php
                                          $displayedSubjects[] = $related_item->subject->id;
                                          $relatedLessons = $relatedSyllabus->where('subject_id', $related_item->subject->id);
                                          $subjectDisplayed = true;
                                          $subjectRowSpan = $relatedLessons->count();
                                      @endphp
              
                                      @foreach ($relatedLessons as $lesson_index => $lesson_item)
                                          <tr>
                                              @if ($loop->first && $loop->parent->first)
                                                  <td rowspan="{{ $examRowSpan }}">{{ $syllabus_item->examination->name }}</td>
                                              @endif
              
                                              @if ($loop->first)
                                                  <td rowspan="{{ $subjectRowSpan }}">{{ @$related_item->subject->name }}</td>
                                              @endif
              
                                              <td>{{ @$lesson_item->lession->name }}</td>
                                              <td>{!! @$lesson_item->lession_item !!}</td>
                                          </tr>
                                      @endforeach
                                  @endif
                              @endforeach
                          @endif
                      @endforeach
                  </tbody>
              </table> --}}
              
              </div>
              
              @else
              <div class="text-center">
                <h2>Data Not Found !</h2>
            </div>
            @endif
        
    </div>
@endsection
