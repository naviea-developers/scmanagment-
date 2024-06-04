<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  {{-- <title>Class Routine</title> --}}
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-v8FpMN7PZIWiDRfM7czPpOVCKaHcJK4jO3kI+KTO9vMjCExH0EeZ3rAaxiylpDcT" crossorigin="anonymous">
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
  </style>
</head>
<body>

<div class="container">
  <div class="school-name">
    <h3>School Name</h3>
    <p>Class Name: {{ @$class->name ?? '' }}</p>
    {{-- <p>Session: {{ @$admission->session->start_year ?? '' }} - {{ $admission->session->end_year ?? '' }}</p>
    <p>Sesction: {{ @$admission->section->name }} </p>
    <h4>Class Routine</h4> --}}
  </div>
  <div class="class-routine">
  <!--Start card-->
  <div class="card border-0 rounded-0 shadow-sm mb-3 page-section" id="book_list">
    <div class="card-body p-4 p-xl-5" style="color: var(--text_color)">
        <!--Start Section Header-->
        <div class="section-header mb-4 position-relative">
            <h4 class="h5 what_will_i_learn_txt">Book List</h4>
            <div class="section-header_divider"></div>
        </div>
        <!--End Section Header-->
        <div class="row">
            @php
            $ungroupedSubjects = $class->subjects->filter(function($subject) {
                return empty($subject->group_id); 
            });
            @endphp

            <div class="subject-list">
                {{-- <h4>subjects list</h4> --}}
                <div class="row">
                    @foreach ($ungroupedSubjects as $subject)
                        <div class="col-sm-6 col-md-2">
                            <ul>
                                <li>{{ $subject->name }}</li> 
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>

            @foreach ($class->groups as $group)
                <div class="col-sm-6 col-md-4">
                    <ul>
                        <li>{{ $group->name }}</li> 
                        <ul>
                            @foreach ($group->subjects as $sub)
                                <li>{{ $sub->name }}</li> 
                            @endforeach
                        </ul>
                    </ul>
                </div>
            @endforeach

        </div>
    </div>
</div>
<!--End card-->

  
                    

    
  </div>
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
</body>
</html>