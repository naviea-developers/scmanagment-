@extends('backend.master')

@section('title', 'Add Result')

<link rel="stylesheet" href="css/custom/class.css">

@section('content')

<div class="br-mainpanel">

      <div class="br-pagetitle">
        <i class="fa-duotone fa-screen-users"></i>
        <div>
          <h4>Add a Result</h4>
          <p class="mg-b-0">Add Student Result</p>
        </div>
      </div><!-- d-flex -->

        <div class="p-5">

            <div class="br-section-wrapper">

                <h2>Add Result</h2>
                <form action="storeResult" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Class : </label>
                                <select name="className" id="className"
                                class="form-select">
                                <option value="">-------Select Class--------</option>
                                @foreach ($className as $class )
                                    <option value="{{ $class->class_id }}">
                                        {{ $class->class_name }}
                                    </option>
                                @endforeach
                            </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label>Student Name : </label>
                            <select name="studentName" id="studentName" class="form-select">
                                <option value=""></option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Roll : </label>
                                <input type="text"
                                class="form-control" name="roll" id="roll">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label>Exam Name : </label>
                            <select name="exam" id=""
                            class="form-select">
                            @foreach ( $examName as $exam)
                                <option value="{{ $exam->title }}">
                                    {{ $exam->title }}
                                </option>
                            @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Subject Name : </label>
                                <input type="subject"
                                class="form-control" name="subject" readonly  value="{{ $subject->sub }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Subject Total Marks : </label>
                                <input type="number"
                                class="form-control" name="total">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Obtained Marks : </label>
                                <input type="number"
                                class="form-control" name="obtained">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Practical Marks : </label>
                                <input type="number"
                                class="form-control" name="practical">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary
                         createClass">
                            Add Result</button>
                    </div>
                </form>
        </div>

    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script>
    // $('#student').on('change',function(){
    //     $('#roll').val('');
    //     $('#class').val('');
    //     $.ajax({
    //         type:'get',
    //         url:'/resultInfo',
    //         headers:
    //         { 'X-CSRF-TOKEN': '{{ csrf_token() }} '},
    //         data:{id: $(this).val()},

    //         success: function(response){
    //             $('#roll').val(response.roll)
    //             $('#class').val(response.class)
    //         }

    //     })
    // })
$('#className').change(function(){

$.ajax({
    type: 'get',
    url: "/getStudent",
    headers: {
        'X-CSRF-Token': '{{ csrf_token() }}',
    },
    data: {
        id: $(this).val(),
    },
    success: function(response) {
        $('#studentName').html(response);
        // console.log(response);
    }
});

});



$('#studentName').on('change' , function(){

//  alert($(this).val());

$.ajax({
    type: 'get',
    url: "/resultInfo",
    headers: {
        'X-CSRF-Token': '{{ csrf_token() }}',
    },
    data: {
        id: $(this).val()
    },
    success: function(response) {
        $('#roll').val(response.roll);
    }
});

});

</script>
@stop

