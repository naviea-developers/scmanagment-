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
                </tr>
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
