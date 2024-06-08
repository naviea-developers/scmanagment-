@extends('Frontend.layouts.master-layout')
@section('title','- Student')
@section('head')

@endsection
@section('main_contend')
@include('Frontend.layouts.parts.header-menu')


<div class="content_search" style="margin-top:70px">
    <link href="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/css/ali.css"
    rel="stylesheet">
<style>
    .brand2-carousel .owl-item {
        padding: 15px 10px;
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 5px;
    }

    .brand2-carousel .owl-item .brand_item {
        display: -webkit-flex;
        display: -moz-flex;
        display: -ms-flex;
        display: -o-flex;
        display: flex;
        height: 100%;
        background: #fff;
        box-shadow: 0 0 15px rgb(0 0 0 / 8%);
        padding: 35px 20px;
        width: 100%;
        align-items: center;
        justify-content: center;
    }

    .brand2-carousel .owl-item img {
        display: block;
        width: auto;
        max-width: 100%;
    }

    .brand2-carousel .owl-stage {
        display: -webkit-flex;
        display: -moz-flex;
        display: -ms-flex;
        display: -o-flex;
        display: flex;
    }
</style>
<br><br><br>

<section class="container" style="color:var(--text_color)">
    <h4 class="text-center mb-3 mt-3"><b>ALL STUDENTS</b></h4>

    <div class="col-md-12" style="border: 1px solid; padding: 10px">
        <div class="row">
              
            <div class="col-md-2">
                <label class=" form-control-label" style=""><b>Session:</b></label>
                <select class="form-control" name="session_id" id="session_id">
                   
                    @foreach ($sessions as $session)
                    <option @if($session->is_current == 1) selected @endif value="{{ $session->id }}">{{ $session->start_year }} - {{ $session->end_year }}</option>
                    @endforeach
                </select>
            </div>
              
            <div class="col-md-2">
                <label class=" form-control-label" style=""><b>Class:</b></label>
                <select class="form-control class_id" name="class_id" id="class">
                    <option value="">Select Class</option>
                    @foreach ($classes as $class)
                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-2">
                <label class=" form-control-label" style=""><b>Section:</b></label>
                <select class="form-control section_id" name="section_id" id="section">
                    <option value="">Select Section</option>
                    {{-- @foreach ($sections as $section)
                    <option value="{{ $section->id }}">{{ $section->name }}</option>
                    @endforeach --}}
                </select>
            </div>

            <div class="col-md-2">
                <label class=" form-control-label" style=""><b>Group:</b></label>
                <select class="form-control group_id" name="group_id" id="group">
                    <option value="">Select Group</option>
                    {{-- @foreach ($groups as $group)
                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                    @endforeach --}}
                </select>
            </div>

            <div class="col-md-2">
                <label class="form-control-label" style=""><b>Student Name:</b></label>
                <input type="text" name="name" class="form-control" id="student_name" placeholder="Student Name"/>
            </div>
            <div class="col-md-2">
                <label class="form-control-label" style=""><b>Roll Number:</b></label>
                <input type="number" name="roll_number" class="form-control" id="roll_number" placeholder="Student Roll"/>
            </div>
            
              

        </div>
    </div>
</section>

<section class="container py-5" style="color:var(--text_color)">
    <div class="col-md-12">
        <div class="row" id="fetchAllStudents-container">
           @foreach ($students as $student)
            <div class="col-md-3 mb-3">
                <div class="card card-body shadow">
                    <img style="height: 150px; width:100%" src="{{ $student->image_show }}" alt="student-image"/>
                    <p class="text-center mt-2"><b>{{ $student->student_name }}</b></p>
                    <p class="text-center"> Session: {{ @$student->session->start_year }} - {{ @$student->session->end_year }}
                        <br>{{ @$student->class->name }} 
                       <br> Section: {{ @$student->section->name }}
                       <br> Group: {{ @$student->group->name }}
                    </p>
                </div>
            </div>
           @endforeach

           

        </div>
        <div class="col-md-12 py-5" id="loading" style="display:none;">
            <h6 class="text-center">Loading...</h6>
        </div>
        <div class="col-md-12 py-5" id="noMoreData" style="display:none;">
            <h6 class="text-center">No More Data...</h6>
        </div>
    </div>
</section>



@include('Frontend.layouts.parts.news-letter')

@endsection


@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $('body').on("change",'#class',function(){
        let id = $(this).val();
            console.log(id);
        getSection(id,"section");
        getGroup(id,"group");
    });

    function getSection(id,outid){
        let url = '{{ url("get/school_section/") }}/' + id;
        axios.get(url)
            .then(res => {
                console.log(res);
            $('#'+outid).empty();
                let html = '';
                html += '<option value="">Select Section</option>'
                res.data.forEach(element => {
                    html += "<option value=" + element.id + ">" + element.name + "</option>"
                });

                $('#'+outid).append(html);
                $('#'+outid).val("").change();
            });
    }

    function getGroup(id,outid){
      let url = '{{ url("get/group/") }}/' + id;
      axios.get(url)
          .then(res => {
              console.log(res);
          $('#'+outid).empty();
              let html = '';
              html += '<option value="">Select group</option>'
              res.data.forEach(element => {
                  html += "<option value=" + element.id + ">" + element.name + "</option>"
              });


              $('#'+outid).append(html);
              $('#'+outid).val("").change();
          });
    }
  
</script>


<script>
    $(document).ready(function() {
        var page = 1;
        var isLoading = false;
        var lastPage = {{ $students->lastPage() }};
        @if($students->lastPage() > 1)
            var disablue_loadmore =0;
        @else
            var disablue_loadmore =1;
        @endif
       
        function fetchFilteredStudents() {
            var session_id = $('#session_id').val();
            var class_id = $('#class').val();
            var group_id = $('#group').val();
            var section_id = $('#section').val();
            var student_name = $('#student_name').val();
            var roll_number = $('#roll_number').val();
    
            $.ajax({
                url: '{{ route("fetch.students") }}', 
                type: 'GET',
                data: {
                    session_id: session_id,
                    class_id: class_id,
                    group_id: group_id,
                    section_id: section_id,
                    name: student_name,
                    roll_number: roll_number,
                    page:page,
                },
                success: function(response) {
                    console.log(response);
                    if(isLoading){
                       
                        if(lastPage <= page){
                            disablue_loadmore=1;
                        }
                        isLoading=false;
                        $('#loading').hide();
                        $('#fetchAllStudents-container').append(response.html); 
                    }else{
                        lastPage = response.last_page;
                        if(lastPage == 1){
                            disablue_loadmore=1;
                        }
                        $('#fetchAllStudents-container').html(response.html);
                    }
                    
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                }
            });
        }
    
        $('#session_id, #class, #group, #section, #student_name, #roll_number').on('change keyup', function() {
            page=1;
            fetchFilteredStudents();
        });
        $(window).scroll(function() {
            var scrollHeight = $(document).height();
            var scrollPosition = $(window).height() + $(window).scrollTop();
            var scrollPercentage = (scrollPosition / scrollHeight) * 100;

            if (scrollPercentage > 60 && page <= lastPage) {
                console.log(disablue_loadmore);
                if(disablue_loadmore == 0){
                    page = parseInt(page)+1;
                    loadMoreProducts();
                }
                
            }
        });

        function loadMoreProducts() {
            if (isLoading) return;

            isLoading = true;
            $('#loading').show();

            fetchFilteredStudents();
        }
    });
</script>
    





@endsection
