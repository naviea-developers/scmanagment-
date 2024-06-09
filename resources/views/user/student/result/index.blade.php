@extends('user.layouts.master-layout')
@section('title','- Exam Result')
@section('main_content')

<div class="right_section">
    <div>
        <h3>Your Exam Result</h3>
    </div>
</div>

@if ($uniqueResults->isNotEmpty())
    <div style="overflow-x:auto;">
        <table  class="table table-striped mt-3" style="min-width: 800px;">
            <thead >
            <tr class="" style="background-color: var(--seller_frontend_color);color:var(--seller_text_color)">
                <th scope="col">SL</th>
                <th scope="col">Exam</th>
                <th scope="col">Print</th>
            </tr>
            </thead>
            <tbody>
                @php
                    $i = 1;
                @endphp
                @if (count($uniqueResults) > 0)
                @foreach ($uniqueResults as $examResult)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ @$examResult->examination->name }}</td>
                        <td> 
                            <a href="{{ route('student.exam_result_marksheet_print',@$examResult->examination->id) }}" target="_blank" class="btn btn-light text-capitalize border-0" data-mdb-ripple-color="dark">
                                <i class="fas fa-print text-primary"></i> 
                            </a>
                        </td>
                    </tr>
                @endforeach
                @endif

                {{-- @foreach($uniqueResults as $result)
                <p>Examination Name: {{ $result->examination->name }}</p>
                <!-- Display other exam result details as needed -->
                @endforeach --}}

            </tbody>
    </table>
    </div>
 @else
    <h5 class="text-center" style="color:var(--seller_text_color)">Exam Result not available right now.</h5>
@endif

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
