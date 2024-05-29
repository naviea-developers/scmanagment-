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
        
    </style>
  </head>
  <body>
    
    <section>
        <div class="container mb-5" >
            <div class="admit-card" style="background-color: #e1e1c2;">

                <div class="BoxE border- mar-bot txt-center" style="background-color: #e1e1c2;">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="school-info">
                                <img  src="school-logo.png" alt="School Logo">
                            </div>
                            <h5>School Name</h5>
                            <p>Mobile :017 <br> Email : shio@gmail.com <br> Website : shio@gmail.com </p>
                            {{-- <p>NH - 79 Gangrar Chittorgarh - 312901 <br> RAJASTHAN, INDIA</p> --}}
                        </div>
                    </div>
                </div>

                <div class="txt-center">
                    <h4>Examination Admit Card</h4>
                    <p>Academic Session({{ $admission->session->start_year ?? '' }} - {{ $admission->session->end_year ?? '' }}) {{ @$examRoutine[0]->examination->name  }}</p>
                </div>
            
                <div class="BoxD border- padding mar-bot" style="background-color: #e1e1c2;">
                    <div class="row">
                        <div class="col-sm-10">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td><b>Student ID : {{ @$admission->student_id_number }}</b></td>
                                        <td><b>Class: </b> {{ @$admission->class->name }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Student Name: </b>{{ @$admission->student_name }}</td>
                                        <td><b>Roll: </b>{{ @$admission->roll_number }}</td>                                  
                                    </tr>
                                    @if (@$admission->group->name)
                                        <tr>
                                            @if (@$admission->father_name)
                                                <td><b>Father Name: </b>{{ @$admission->father_name }}</td>
                                            @else
                                                <td><b>Mother Name: </b>{{ @$admission->mother_name }}</td>
                                            @endif
                                            <td><b>Group: </b>{{ @$admission->group->name }}</td>
                                        </tr> 
                                    @else
                                        <tr>
                                            @if (@$admission->father_name)
                                                <td><b>Father Name: </b>{{ @$admission->father_name }}</td>
                                            @else
                                                <td><b>Mother Name: </b>{{ @$admission->mother_name }}</td>
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
                                    <th scope="row txt-center"><img src="{{ @$admission->image_show }}" width="100px" height="123px" /></th>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="BoxF border- padding mar-bot txt-center" style="background-color: #e1e1c2;">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Subject</th>
                                        <th>Exam Date</th>
                                        <th>Time</th>
                                        <th>Room</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @if (count($examRoutine) > 0)
                                        @foreach ($examRoutine as $routine)
                                            <tr>
                                                <td>{{ $i++ }}</td>                                     
                                                <td>{{ @$routine->examClass->subject->name }}</td>
                                                <td>{{  date('d,F,Y', strtotime(@$routine->examClass->date)) }}</td>
                                                <td>{{ \Carbon\Carbon::parse(@$routine->examClass->start_time)->format('h:iA') }} - {{ \Carbon\Carbon::parse(@$routine->examClass->end_time)->format('h:iA') }}</td>
                                                <td>{{ @$routine->bulding->name }} , {{ @$routine->floor->name }} , {{ @$routine->room->name}}</td>                                              
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

    <script>
        window.print();
        window.onafterprint = back;
    
        function back() {
            window.close();
            window.history.back();
        }
    </script>
  </body>
</html>