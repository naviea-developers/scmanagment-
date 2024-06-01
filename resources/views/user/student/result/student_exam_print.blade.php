<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>admit Card</title>
    <style>
        .txt-center {
          text-align: center;
      }
      .border- {
          border: 1px solid #000 !important;
      }
      .padding {
          padding: 15px;
      }
      .mar-bot {
          margin-bottom: 15px;
      }
      .admit-card {
          border: 2px solid #000;
          padding: 15px;
          /* margin: 20px 0; */
          margin-left: 182px;
      }
      .BoxA h5, .BoxA p {
          margin: 0;
      }
      h5 {
          text-transform: uppercase;
      }
      table img {
          width: 100%;
          margin: 0 auto;
      }
      .table-bordered td, .table-bordered th, .table thead th {
          border: 1px solid #000000 !important;
      }
    
    .school-info {
        flex: 1;
        text-align: left;
    }
    .footer {
                text-align: right;
                margin-top: 20px;
            }
    .footer p {
        margin: 5px 0;
    }

   .school_logo {
        width: 118px;
        height: 117px;
        border-radius: 50%;
        object-fit: cover;
        padding: 5px;
    }
        
    </style>
  </head>
  <body>
    
    <section>
        <div class="container mb-5" >
            <div class="admit-card" style="background-color: #e1e1c2;">
                @php
                    $results = \App\Models\Tp_option::where('option_name', 'theme_option_school_info')->first();
                    $school_info = json_decode($results->option_value);
                @endphp
                <div class="BoxE border- mar-bot txt-center" style="background-color: #e1e1c2;">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="school-info">
                                <img class="school_logo" src="{{ asset('public/upload/school_logo/'.@$school_info->school_logo) }}" alt="School Logo">
                            </div>
                        </div>    
                        <div class="col-sm-4">    
                            <h5>{{ @$school_info->school_name }}</h5>                       
                            <p>Mobile : {{ @$school_info->phone1 }} <br> Email : {{ @$school_info->email }} <br> Website : {{ @$school_info->website }} </p>
                        </div>
                    </div>
                </div>

                <div class="txt-center">
                    <h4>Marksheet</h4>
                    <p>Academic Session({{ $student->session->start_year ?? '' }} - {{ $student->session->end_year ?? '' }}) {{ @$examRoutine[0]->examination->name  }}</p>
                </div>
            
                <div class="BoxD border- padding mar-bot" style="background-color: #e1e1c2;">
                    <div class="row">
                        <div class="col-sm-10">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td><b>Student ID : {{ @$student->student_id_number }}</b></td>
                                        <td><b>Class: </b> {{ @$student->class->name }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Student Name: </b>{{ @$student->student_name }}</td>
                                        <td><b>Roll: </b>{{ @$student->roll_number }}</td>                                  
                                    </tr>
                                    @if (@$student->group->name)
                                        <tr>
                                            @if (@$student->father_name)
                                                <td><b>Father Name: </b>{{ @$student->father_name }}</td>
                                            @else
                                                <td><b>Mother Name: </b>{{ @$student->mother_name }}</td>
                                            @endif
                                            <td><b>Group: </b>{{ @$student->group->name }}</td>
                                        </tr> 
                                    @else
                                        <tr>
                                            @if (@$student->father_name)
                                                <td><b>Father Name: </b>{{ @$student->father_name }}</td>
                                            @else
                                                <td><b>Mother Name: </b>{{ @$student->mother_name }}</td>
                                            @endif
                                            <td></td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="col-sm-2 txt-center">
                            <table class="table table-bordered">
                                <tbody>
                                <tr>
                                    <th scope="row txt-center"><img src="{{ @$student->image_show }}" width="100px" height="123px" /></th>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="BoxF border- padding mar-bot txt-center" style="background-color: #e1e1c2;">
                    <div class="row">
                        <div class="col-sm-12">
                                {{-- <tbody>
                                    @php
                                        $i = 1;
                            
                                        // Define a function to calculate the grade
                                        function calculateGrade($obtainedMark) {
                                            if ($obtainedMark >= 90) {
                                                return 'A+';
                                            } elseif ($obtainedMark >= 80) {
                                                return 'A';
                                            } elseif ($obtainedMark >= 70) {
                                                return 'B+';
                                            } elseif ($obtainedMark >= 60) {
                                                return 'B';
                                            } elseif ($obtainedMark >= 50) {
                                                return 'C+';
                                            } elseif ($obtainedMark >= 40) {
                                                return 'C';
                                            } elseif ($obtainedMark >= 40) {
                                                return 'C';
                                            } 
                                            else {
                                                return 'F';
                                            }
                                        }
                                    @endphp
                                    @if (count($examResults) > 0)
                                    @foreach ($examResults as $examResult)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ @$examResult->subject->name }}</td>
                                            <td>{{ @$examResult->marke }}</td>                    
                                            <td>{{ @$examResult->pass_marke }}</td>
                                            <td>{{ @$examResult->obtained_marke }}</td>
                                            <td></td>
                                        </tr>
                                    @endforeach
                                    @endif
                                </tbody> --}}
                                {{-- <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">SL</th>
                                            <th scope="col">Subject Name</th>
                                            <th scope="col">Mark</th>
                                            <th scope="col">Pass Mark</th>
                                            <th scope="col">Obtained Mark</th>
                                            <th scope="col">Grade</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @if (count($examResults) > 0)
                                            @foreach ($examResults as $examResult)
                                                @php
                                                    // Function to calculate grade based on obtained marks
                                                    function getGrade($marks, $totalMarks) {
                                                        $percentage = ($marks / $totalMarks) * 100;
                                
                                                        if ($percentage >= 90) {
                                                            return 'A+';
                                                        } elseif ($percentage >= 80) {
                                                            return 'A';
                                                        } elseif ($percentage >= 70) {
                                                            return 'A-';
                                                        } elseif ($percentage >= 60) {
                                                            return 'B';
                                                        } elseif ($percentage >= 50) {
                                                            return 'C';
                                                        } elseif ($percentage >= 40) {
                                                            return 'D';
                                                        } else {
                                                            return 'F';
                                                        }
                                                    }
                                
                                                    $grade = getGrade(@$examResult->obtained_marke, @$examResult->marke);
                                                @endphp
                                                <tr>
                                                    <td>{{ $i++ }}</td>
                                                    <td>{{ @$examResult->subject->name }}</td>
                                                    <td>{{ @$examResult->marke }}</td>                    
                                                    <td>{{ @$examResult->pass_marke }}</td>
                                                    <td>{{ @$examResult->obtained_marke }}</td>
                                                    <td>{{ $grade }}</td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table> --}}

                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">SL</th>
                                            <th scope="col">Subject Name</th>
                                            <th scope="col">Mark</th>
                                            <th scope="col">Pass Mark</th>
                                            <th scope="col">Obtained Mark</th>
                                            {{-- <th scope="col">Grade</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                            // Function to calculate grade
                                            // function calculateGrade($obtainedMarks, $passMarks, $fullMarks) {
                                            //     $percentage = ($obtainedMarks / $fullMarks) * 100;
                                            //     if ($percentage >= 79) {
                                            //         return 'A+';
                                            //     } elseif ($percentage >= 69) {
                                            //         return 'A';
                                            //     } elseif ($percentage >= 59) {
                                            //         return 'A-';
                                            //     } elseif ($percentage >= 49) {
                                            //         return 'B';
                                            //     } elseif ($percentage >= 39) {
                                            //         return 'C';
                                            //     } elseif ($percentage >= @$examResult->pass_marke) {
                                            //         return 'D';
                                            //     } else {
                                            //         return 'F';
                                            //     }
                                            // }
                                        @endphp
                                        @if (count($examResults) > 0)
                                        @foreach ($examResults as $examResult)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ @$examResult->subject->name }}</td>
                                                <td>{{ @$examResult->marke }}</td>                    
                                                <td>{{ @$examResult->pass_marke }}</td>
                                                <td>{{ @$examResult->obtained_marke }}</td>
                                                {{-- <td>{{ calculateGrade($examResult->obtained_marke, $examResult->pass_marke, $examResult->marke) }}</td> --}}
                                            </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                        </div>
                    </div>
                </div>

                <div class="footer">
                    <p>Principal's Signature: _____________________</p>
                    <p>Date: _____________________</p>
                </div>

            </div>
        </div>
        
    </section>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

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