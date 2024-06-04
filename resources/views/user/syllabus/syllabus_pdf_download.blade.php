<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-v8FpMN7PZIWiDRfM7czPpOVCKaHcJK4jO3kI+KTO9vMjCExH0EeZ3rAaxiylpDcT" crossorigin="anonymous">

</head>
<body>

<div class="container">

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

  @php
    $results = \App\Models\Tp_option::where('option_name', 'theme_option_school_info')->first();
    $school_info = json_decode($results->option_value);
  @endphp
  
  @if (@$syllabus->count() > 0)
  <div style="text-align: right;">
    <img src="{{ asset('public/img/mujib.png') }}" alt="" style="height: 100; width:100"/>
  </div>
      <div class="school-name" style="color: #000">
        <h2 style=""><b>{{ @$school_info->school_name }}</b></h2>
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
                      <h5 class="text-center" style="color: #000"><b>{{ @$syllabus_item->examination->name }}</b></h5>
      
                      @foreach ($relatedSyllabus as $related_item)
                          @if (!in_array($related_item->subject->id, $displayedSubjects))
                              @php
                                  $displayedSubjects[] = $related_item->subject->id;
                                  $relatedLessons = $relatedSyllabus->where('subject_id', $related_item->subject->id);
                              @endphp
      
                              <div class="">
                                  <h5 class="text-center" style="color: #000"><b>Subject: {{ @$related_item->subject->name }}</b></h5>
      
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
     @endif 
 
  
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-k3A1LmfFiBCL0h9pzyvLWNs/zFwMIGg/2IQXO48JAU0MTrvYV4R8aG3g7AgL73n9" crossorigin="anonymous"></script>
{{-- <script>
    window.print();
    window.onafterprint = back;

    function back() {
        window.close();
        window.history.back();
    }
</script> --}}
</div>
</body>
</html>