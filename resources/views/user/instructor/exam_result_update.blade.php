@extends('user.layouts.master-layout')

@section('title','- update home_work')
@section('head')
<link href="{{asset('public/backend')}}/lib/summernote/summernote-bs4.css" rel="stylesheet">
@endsection
@section('main_content')

  <!-- ########## START: MAIN PANEL ########## -->
  <div class="br-mainpanel p-4">
    

    <div class="br-pagebody card shadow p-3" style="background-color: var(--seller_frontend_color);color:var(--seller_text_color)">
      <div class="br-section-wrapper">
        <h5 class="br-section-label text-center mb-4"> Update Exam Result</h5>
         {{-- <p  class="br-section-label text-center mb-1">update Daily Homework For Students</p> --}}

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


        <!----- Start Add Product Form input ------->
        <div class="col-xl-12 mx-auto">
            <div class="form-layout form-layout-4">

                <form action="{{ route('instructor.exam_result.update',$examResult->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row mt-4">
                        <div class="col-sm-4">
                            <label class="form-control-label"><b>Student Name :</b></label>
                            <div class="mg-t-10 mg-sm-t-0">
                                <input type="text" readonly name="obtained_marke" value="{{ @$examResult->admissionStudent->student_name }}" class="form-control" placeholder="Enter Student Name">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label class="form-control-label"><b>Roll :</b></label>
                            <div class="mg-t-10 mg-sm-t-0">
                                <input type="text" readonly name="obtained_marke" value="{{ @$examResult->admissionStudent->roll_number }}" class="form-control" placeholder="Enter roll">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label class="form-control-label"><b>Mark :</b></label>
                            <div class="mg-t-10 mg-sm-t-0">
                                <input type="text" readonly name="obtained_marke" value="{{ @$examResult->marke }}" class="form-control" placeholder="Enter Marke">
                            </div>
                        </div>
                        <div class="col-sm-4 mt-3">
                            <label class="form-control-label"><b>Pass Mark :</b></label>
                            <div class="mg-t-10 mg-sm-t-0">
                                <input type="text" readonly name="obtained_marke" value="{{ @$examResult->pass_marke }}" class="form-control" placeholder="Enter Pass Marke">
                            </div>
                        </div>
                        <div class="col-sm-4 mt-3">
                            <label class="form-control-label"><b>Obtained Marke :</b></label>
                            <div class="mg-t-10 mg-sm-t-0">
                                <input type="number" name="obtained_marke" value="{{ $examResult->obtained_marke }}" class="form-control" placeholder="Enter Obtained Marke">
                            </div>
                        </div>

                    </div>

                    {{-- Course Contents End--}}

                    <div class="row mt-4">
                      <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-right">
                        <a href="{{route('instructor.homework.index')}}" type="button" class="btn btn-secondary text-white mr-2" >Close</a>
                        <button type="submit" class="btn btn-info ">Save</button>
                      </div>
                    </div>
                </form>

            </div><!-- form-layout -->
        </div><!-- col-6 -->
        <!----- Start Add Category Form input ------->
      </div><!-- br-section-wrapper -->
    </div><!-- br-pagebody -->

</div><!-- br-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->
  

@endsection

@section('script')
<script src="{{asset('public/backend')}}/lib/summernote/summernote-bs4.min.js"></script>

<!--- Start Summernote Editor Js ---->
<script>

    $(document).ready(function() {
        /*** summernote editor one ***/
        $('#summernote').summernote({
            height: 150
        })
        /*** summernote editor two ***/
        $('#summernote_two').summernote({
            height: 150
        })

        $('#summernote_three').summernote({
            height: 150
        })
        $('#summernote_four').summernote({
            height: 150
        })

    });

    </script>
<!--- End Summernote Editor Js ---->
@endsection

