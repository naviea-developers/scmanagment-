@extends('user.layouts.master-layout')
@section('head')
@section('title','- Manage Student')

@endsection
@section('main_content')

<div class="right_section">
    <div>
        <h3 >Manage Student</h3>
    </div>
</div>

    

<div style="overflow-x:auto;">
    <table class="table table-striped mt-3" style="min-width: 800px;">
        <thead >
        <tr class="" style="background-color: var(--seller_frontend_color);color:var(--seller_text_color)">
            <th scope="col">SL</th>
            <th scope="col">Appliction Code</th>
            {{-- <th scope="col">Program Name</th> --}}
            <th scope="col">User Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Application Date</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp
            @if (count($applications) > 0)
            @foreach ($applications as $application)

            <tr>
            <td>{{ $i++ }}</td>
            
            <td>{{  @$application->application_code }}</td>
            {{-- <td>{{  @$application->carts->course->name }}</td> --}}

            <td>{{  @$application->student->name }}</td>
            <td>{{  @$application->student->email }}</td>
            <td>{{  @$application->student->mobile }}</td>
            {{-- <td>{{  @$application->student->continents?->name }}</td> --}}
            <td>{{ $application->created_at->format('d M Y') }}</td>
            <td> @if($application->status == 0)
                <button class="btn btn-primary">Application Start</button>
             @elseif($application->status == 1)
             <button class="btn btn-primary">Processing</button>
             @elseif($application->status == 2)
             <button class="btn btn-success">Approved</button>
             @elseif($application->status == 3)
             <button class="btn btn-danger">Cancel</button>
             @endif</td>
           
            <td>
                {{-- <a href="{{ route('frontend.edit_ebook', $student->id ) }}"><i class="fa-duotone fa fa-edit"></i></a>
                &nbsp; --}}
                <button style="margin-left: 18px" type="button" data-toggle="modal" data-target="#certificateModal{{ $application->id }}" class="btn btn-primary"><i class="fa-solid fa-edit"></i> </button>
                <a href="{{ route('frontend.application-details', $application->id) }}" class="btn btn-primary"><i class="fa-duotone fa fa-eye"></i> </a>
                {{-- <a href="{{ route('frontend.consultant_student_details', $application->id) }}"><i class="fa-duotone fa fa-eye"></i></a> --}}
                {{-- &nbsp;
                    
                <button class="btn text-danger delete-button" courseId="{{ $student->id }}"><i class="icon fa fa-trash tx-28"></i></button> --}}
            </td>



            <!-- Modal -->
            <div class="modal fade" id="certificateModal{{ $application->id }}" tabindex="-1" role="dialog" aria-labelledby="audioModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="audioModalLabel" style="color: black">Application ID: {{ @$application->application_code }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <form action="{{ route('frontend.application-status', $application->id) }}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="col-md-12">
                                <label class="title"><b>Change Status</b></label>
                                <select name="status" class="form-control">
                                    <option value=""> Select Status</option>
                                    <option @if ($application->status == 1) Selected @endif value="1"> Processing</option>
                                    <option @if ($application->status == 2) Selected @endif value="2"> Approved</option>
                                    <option @if ($application->status == 3) Selected @endif value="3"> Cancel</option>
                            </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" >Update</button>
                        </div>
                    </form>
                </div>
                </div>
            </div>
            


            @endforeach
            @endif
        </tbody>
  </table>
</div>

            


 
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="script.js"></script>
<script>
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

</script>


@endsection
