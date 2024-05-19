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
        <h5 class="br-section-label text-center mb-4"> Update Homework</h5>
         <p  class="br-section-label text-center mb-1">update Daily Homework For Students</p>

        <hr>
        @if(count($errors) > 0)
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">{{ $error }}</div>
        @endforeach
        @endif

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

                <form action="{{ route('instructor.homework.update',$home_work->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row mt-4">

                        <div class="col-sm-3">
                            <label class="form-control-label"><b>Sessions :</b><span class="tx-danger">*</span></label>
                            <div class="mg-t-10 mg-sm-t-0">
                                <select class="form-control" name="session_id">
                                    <option value="">Select session</option>
                                    @foreach ($sessions as $session)                                   
                                        <option @if($session->id == $home_work->session_id)  Selected @endif value="{{ $session->id }}">{{ $session->start_year->year }} - {{ $session->end_year->year }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <label class="form-control-label"><b>Class Name :</b><span class="tx-danger">*</span></label>
                            <div class="mg-t-10 mg-sm-t-0">
                                <select class="form-control" name="class_id">
                                    <option value="">Select class</option>
                                    @foreach ($teacherAssents as $teacherAssent)                                   
                                        <option @if($teacherAssent->class->id == $home_work->class_id)  Selected @endif value="{{ $teacherAssent->class->id }}">{{ $teacherAssent->class->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        

                        <div class="col-sm-3">
                            <label class="form-control-label"><b>Subject :</b></label>
                            <div class="mg-t-10 mg-sm-t-0">
                                <select class="form-control" name="subject_id">
                                    <option value="">Select Subject</option>
                                    @foreach ($teacherAssents as $teacherAssent)                                   
                                        <option @if($teacherAssent->subject->id == $home_work->subject_id)  Selected @endif  value="{{ $teacherAssent->subject->id }}">{{ $teacherAssent->subject->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <label class="form-control-label"><b>Homework Image :</b></label>
                            <div class="mg-t-10 mg-sm-t-0">
                                <input type="file" name="image" value="{{ $home_work->image }}" class="form-control" placeholder="enter image">
                            </div>
                        </div>

                    </div>

                    {{-- Course Contents End--}}
                
                    <div class="row mt-4">
                        <div class="col-sm-12">
                            <label class="form-control-label"><b>About Homework : </b><span class="tx-danger">*</span></label>
                            <div class="mg-t-10 mg-sm-t-0">
                                <textarea class="form-control" id="summernote_two" name="details">{!! $home_work->details !!}</textarea>
                            </div>
                        </div>
                    </div>

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

