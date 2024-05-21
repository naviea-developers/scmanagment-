@extends('user.layouts.master-layout')
@section('title','- Manage Courses')
@section('main_content')

<div class="right_section">
    <div>
        <h3>Your Exam Result</h3>
    </div>
</div>

    {{-- success message start --}}
    @if(session()->has('message'))
    <div class="alert alert-success">
    {{session()->get('message')}}
    </div>
    <script>
        setTimeout(function(){
            $('.alert.alert-success').hide();
        }, 3000);
    </script>
    @endif
    {{-- success message start --}}

<div style="overflow-x:auto;">
    <table  class="table table-striped mt-3" style="min-width: 800px;">
        <thead >
        <tr class="" style="background-color: var(--seller_frontend_color);color:var(--seller_text_color)">
            <th scope="col">SL</th>
            <th scope="col">Exam</th>
            <th scope="col">Class Name</th>
            <th scope="col">Subject Name</th>
            <th scope="col">session</th>
            <th scope="col">Section</th>
            <th scope="col">Mark</th>
            <th scope="col">Pass Mark</th>
            <th scope="col">Obtained Marke</th>
        </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp
            @if (count($examResults) > 0)
            @foreach ($examResults as $examResult)

            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ @$examResult->examination->name }}</td>
                <td>{{ @$examResult->class->name }}</td>
                <td>{{ @$examResult->subject->name }}</td>
                <td>{{ @$examResult->session->start_year }}-{{ $examResult->session->end_year }}</td>
                <td>{{ @$examResult->schoolsection->name }}</td>   
                <td>{{ @$examResult->marke }}</td>                    
                <td>{{ @$examResult->pass_marke }}</td>
                <td>{{ @$examResult->obtained_marke }}</td>
            
                {{-- <td>
                    <a href="{{ route('instructor.class_exam.edit', $class_test->id ) }}"><i class="fa-duotone fa fa-edit"></i></a>
                    &nbsp;
                    <a href="{{ url('course/view/'.$course->slug) }}"><i class="fa-duotone fa fa-eye"></i></a>
                    &nbsp;
                    <button class="btn text-danger delete-button" courseId="{{ $class_test->id }}"><i class="icon fa fa-trash tx-28"></i></button>
                </td> --}}
            </tr>

            <!--_-- ########### Start Delete Category MODAL ############---->
            {{-- <div id="delete-modal"  class="modal">
                <div class="modal-dialog modal-dialog-top" role="document">
                <div class="modal-content tx-size-sm">
                    <div class="modal-body tx-center pd-y-20 pd-x-20">
                        <form action="{{ route('instructor.class_exam.delete') }}" method="post">
                            @csrf
                            <h4 class="tx-semibold mg-b-20 mt-2 " >Are you sure! you want to delete this?</h4>
                            <input type="hidden" value="" name="class_test_id" id="course_id">
                            <button type="submit"  class="btn btn-danger mr-2 text-white tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium mg-b-20" id="confirm-yes">
                                yes
                            </button>
                            <button type="button"  class="btn btn-success tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium mg-b-20" id="confirm-no">
                                No
                            </button>
                        </form>
                    </div><!-- modal-body -->
                </div><!-- modal-content -->
                </div><!-- modal-dialog -->
            </div><!-- modal --> --}}
            <!--_-- ########### Start Delete Category MODAL ############---->

            @endforeach
            @endif
        </tbody>
  </table>
</div>


{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
{{-- <script src="script.js"></script> --}}
{{-- <script>
    $(document).ready(function() {
    $(".delete-button").click(function() {
        $("#delete-modal").show();
        $("#course_id").val($(this).attr('courseId'))

    });
    $("#confirm-no").click(function() {
        $("#delete-modal").hide();
    });
    $("#confirm-yes").click(function() {
        $("#delete-modal").hide();
    });
    });

</script> --}}

@endsection

@section('script')
    <script src="{{asset('public/backend')}}/lib/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('public/backend')}}/lib/datatables.net-dt/js/dataTables.dataTables.min.js"></script>
    <script src="{{asset('public/backend')}}/lib/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{asset('public/backend')}}/lib/datatables.net-responsive-dt/js/responsive.dataTables.min.js"></script>
    <script>
        // console.log($('#sun-editor').len());
        if($('#sun-editor').length > 0){
         const suneditor=SUNEDITOR.create('sun-editor',{
            buttonList: [
                ['undo', 'redo', 'font', 'fontSize', 'formatBlock'],
                ['bold', 'underline', 'italic', 'strike', 'subscript', 'superscript', 'removeFormat'],
                '/', //Line break
                ['fontColor', 'hiliteColor', 'outdent', 'indent', 'align', 'horizontalRule', 'list', 'table'],
                ['link', 'image', 'video', 'fullScreen', 'showBlocks', 'codeView', 'preview', 'print', 'save']
            ],
            width: '100%',
            height:204
        });
        $(document).click(function() {
            document.getElementById('sun-editor').value = suneditor.getContents();
        });
        }
        $(function(){
        'use strict';
    
        $('#datatable1').DataTable({
            responsive: true,
            language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
            }
        });
    
        $('#datatable2').DataTable({
            bLengthChange: false,
            searching: false,
            responsive: true
        });
    
        // Select2
        $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });
    
        });
    </script>
@endsection
