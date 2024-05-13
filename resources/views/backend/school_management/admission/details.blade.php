@section('title')
    Admin - Add New Admission
@endsection

@extends('Backend.layouts.layouts')

@section('main_contain')
{{-- <style>
    .hidden {
        display: none;
    }
</style> --}}
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader">
          <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('admin.dashboard')}}">Home</a>
            <a class="breadcrumb-item" href="{{route('admin.admission.index')}}"> <i class="icon ion-reply text-22"></i> All Admissions</a>
          </nav>
        </div><!-- br-pageheader -->

        <div class="br-pagebody">
          <div class="br-section-wrapper">
            <h6 class="br-section-label text-center mb-4"> Details Admission Form</h6>
               {{-- validate start  --}}
               @if(count($errors) > 0)
               @foreach($errors->all() as $error)
                   <div class="alert alert-danger">{{ $error }}</div>
               @endforeach
               @endif
               {{-- validate End  --}}

            <!----- Start Add Category Form input ------->
            <div class="col-xl-12 mx-auto">
                <div class="form-layout form-layout-4 py-5">

                   



                    <div class="row ">
                        <div class="col-sm-4" >
                            <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 180px;">
                                <img class="display-upload-img" style="width: 180px;height: 200px;" src="{{ $details->image_show }}" alt="">
                                {{-- <input type="file" name="image" class="form-control upload-img" placeholder="Enter Activity Image" style="position: absolute;top: 0;opacity: 0;height: 100%;"> --}}
                            </div>
                        </div>
                    </div>

                    
                    <div class="row mt-4">
                    <hr>

                        
                        <div class="col-sm-4">
                        <label class=" form-control-label"><b>Academic Year: </b></label>
                        <p >{{ @$details->academic_year->year }}</p>
                        </div>

                        <div class="col-sm-4">
                        <label class=" form-control-label"><b>Session: </b></label>
                        <p >{{ @$details->session->start_year->year }} - {{ @$details->session->end_year->year }}</p>
                        </div>

                        <div class="col-sm-4">
                            <label class=" form-control-label"><b>Class: </b></label>
                                <p >{{ @$details->class->name }}</p>
                        </div>


                        <div class="col-sm-4">
                        <label class=" form-control-label"><b>Group: </b></label>
                        <p >{{ @$details->group->name }}</p>
                        </div>

                        <div class="col-sm-4 mt-3">
                        <label class=" form-control-label"><b>Section: </b></label>
                        <p >{{ @$details->section->name }}</p>
                        </div>

                        <div class="col-sm-4">
                        <label class=" form-control-label"><b>Fees: </b></label>
                        <p >{{ @$details->feeManagement->fee->particular_name }} - ({{ @$details->feeManagement->fee_amount }})</p>
                        </div>
<hr class="mt-3">
<h4>Student Information</h4>
                    {{-- </div>

                    <hr style="border: 5px">
                    <div class="row"> --}}

                        <div class="col-sm-4 mt-3">
                            <label class="form-control-label"><b>Student Name: </b></label>
                            <div class="mg-t-10 mg-sm-t-0">
                                <p >{{ @$details->student_name }}</p>
                            </div>
                        </div>
                        <div class="col-sm-4 mt-3">
                            <label class="form-control-label"><b>Date of Birth: </b></label>
                            <div class="mg-t-10 mg-sm-t-0">
                                <p >{{ @$details->dob }}</p>
                            </div>
                        </div>
                        <div class="col-sm-4 mt-3">
                            <label class="form-control-label"><b>Student Phone: </b></label>
                            <div class="mg-t-10 mg-sm-t-0">
                                <p >{{ @$details->student_phone }}</p>
                            </div>
                        </div>
                        <div class="col-sm-4 mt-3">
                            <label class="form-control-label"><b>Student Email: </b></label>
                            <div class="mg-t-10 mg-sm-t-0">
                                <p >{{ @$details->student_email }}</p>
                            </div>
                        </div>
                        <div class="col-sm-4 mt-3">
                            <label class="form-control-label"><b>Student NID/Birth Certificate: </b></label>
                            <div class="mg-t-10 mg-sm-t-0">
                                <p >{{ @$details->student_nid }}</p>
                            </div>
                        </div>




                        <div class="col-sm-4 mt-3">
                            <label class="form-control-label"><b>Father Name : </b></label>
                            <div class="mg-t-10 mg-sm-t-0">
                                <p >{{ @$details->father_name }}</p>
                            </div>
                        </div>
                        <div class="col-sm-4 mt-3">
                            <label class="form-control-label"><b>Father Occupation : </b></label>
                            <div class="mg-t-10 mg-sm-t-0">
                                <p >{{ @$details->father_occupation }}</p>
                            </div>
                        </div>
                        <div class="col-sm-4 mt-3">
                            <label class="form-control-label"><b>Father Phone : </b></label>
                            <div class="mg-t-10 mg-sm-t-0">
                                <p >{{ @$details->father_phone }}</p>
                            </div>
                        </div>
                        <div class="col-sm-4 mt-3">
                            <label class="form-control-label"><b>Father NID : </b></label>
                            <div class="mg-t-10 mg-sm-t-0">
                                <p >{{ @$details->father_nid }}</p>
                            </div>
                        </div>
                        <div class="col-sm-4 mt-3">
                            <label class="form-control-label"><b>Mother Name : </b></label>
                            <div class="mg-t-10 mg-sm-t-0">
                                <p >{{ @$details->mother_name }}</p>
                            </div>
                        </div>
                        <div class="col-sm-4 mt-3">
                            <label class="form-control-label"><b>Mother Occupation : </b></label>
                            <div class="mg-t-10 mg-sm-t-0">
                                <p >{{ @$details->mother_occupation }}</p>
                            </div>
                        </div>
                        <div class="col-sm-4 mt-3">
                            <label class="form-control-label"><b>Mother Phone : </b></label>
                            <div class="mg-t-10 mg-sm-t-0">
                                <p >{{ @$details->mother_phone }}</p>
                            </div>
                        </div>
                        <div class="col-sm-4 mt-3">
                            <label class="form-control-label"><b>Yearly Income : </b></label>
                            <div class="mg-t-10 mg-sm-t-0">
                                <p >{{ @$details->yearly_income }}</p>
                            </div>
                        </div>




<hr class="mt-3">
<h4>Present Address</h4>
                        <div class="col-sm-4 mt-3">
                            <label class=" form-control-label"><b>Continent Name:</b></label>
                            <p >{{ @$details->present_continent->name }}</p>
                            </div>

                            <div class="col-sm-4 mt-3">
                            <label class=" form-control-label"><b>Country Name:</b></label>
                            <p >{{ @$details->present_country->name }}</p>
                            </div>

                            <div class="col-sm-4 mt-3">
                            <label class=" form-control-label"><b>State Name:</b></label>
                            <p >{{ @$details->present_state->name }}</p>
                            </div>

                            <div class="col-sm-4 mt-3">
                            <label class=" form-control-label"><b>City Name:</b></label>
                            <p >{{ @$details->present_city->name }}</p>
                            </div>


                   
                        <div class="col-sm-8 mt-3">
                            <label class="form-control-label"><b>Address: </b></label>
                            <div class="mg-t-10 mg-sm-t-0">
                                <p >{{ @$details->present_address }}</p>
                            </div>
                        </div>

<hr class="mt-3">
<h4>Permanent Address</h4>
                        <div class="col-sm-4 mt-3">
                            <label class=" form-control-label"><b>Continent Name:</b></label>
                            <p >{{ @$details->permanent_continent->name }}</p>
                            </div>

                            <div class="col-sm-4 mt-3">
                            <label class=" form-control-label"><b>Country Name:</b></label>
                            <p >{{ @$details->permanent_country->name }}</p>
                            </div>

                            <div class="col-sm-4 mt-3">
                            <label class=" form-control-label"><b>State Name:</b></label>
                            <p >{{ @$details->permanent_state->name }}</p>
                            </div>

                            <div class="col-sm-4 mt-3">
                            <label class=" form-control-label"><b>City Name:</b></label>
                            <p >{{ @$details->permanent_city->name }}</p>
                            </div>

                            <div class="col-sm-8 mt-3">
                                <label class="form-control-label"><b>Address: </b></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                <p >{{ @$details->parmanent_address }}</p>
                                </div>
                            </div>


<hr class="mt-3">




@if ($details->pre_school == 1)
<div class="col-sm-4 mt-3">
    <h4>Pre School: </h4>
</div>

                        

                        <div id="inputs" class="hidden">
                            <div class="row">
                                <div class="col-sm-4 mt-3">
                                    <label class="form-control-label"><b>Pre School Name: </b></label>
                                    <div class="mg-t-10 mg-sm-t-0">
                                        <p >{{ @$details->pre_school_name }}</p>
                                    </div>
                                </div>

                                <div class="col-sm-4 mt-3">
                                    <label class=" form-control-label"><b>Pre Class: </b></label>
                                    <p >{{ @$details->pre_class->name }}</p>
                                </div>

                                <div class="col-sm-4 mt-3">
                                    <label class="form-control-label"><b>Roll Number: </b></label>
                                    <div class="mg-t-10 mg-sm-t-0">
                                        <p >{{ @$details->pre_roll_number }}</p>
                                    </div>
                                </div>

                                <div class="col-sm-12 mt-3">
                                    <label class="form-control-label"><b>Pre School Address: </b></label>
                                    <div class="mg-t-10 mg-sm-t-0">
                                        <p >{{ @$details->pre_school_address }}</p>
                                    </div>
                                </div>



                                <div class="mg-t-10 mg-sm-t-0 add-data-content">
                                    @if($details->certificate->count() == 0)
                                    {{-- <div class="d-flex align-items-center mt-2 row">
                                        <div class="col-md-7">
                                            <label class="form-control-label"><b>Certificate Name:</b></label>
                                            <div class="d-flex  align-items-center select-add-section " >
                                                <input type="text" name="certificates_name[]" value="{{ old('$certificates_name') }}" class=" form-control" placeholder="Certificate Name">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-control-label"><b>Certificate File:</b></label>
                                            <div class="d-flex  align-items-center select-add-section">
                                                <input type="file" name="certificates_file[]" accept="image/jpeg,image/gif,image/png,application/pdf" value="{{ old('$certificates_file') }}" class=" form-control">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-1">
                                            <a id="plus-btn-data-content" href="javascript:void(0)" class="plus-btn-data-content px-1 p-0 m-0 ml-2"><i class="fas fa-plus"></i></a>
                                        </div>
                                    </div> --}}
                                    @else
                                    @foreach ($details->certificate as $k=>$item)
                                    <div class="d-flex align-items-center mt-2 row">
                                        <div class="col-md-5">
                                            <label class="form-control-label"><b>Certificate Name:</b></label>
                                                <p>{{ $item->certificates_name }}</p>
                                            {{-- <div class="d-flex  align-items-center select-add-section " >
                                                <input type="text" name="old_certificates_name[{{ $item->id }}]" value="{{ $item->certificates_name }}" class=" form-control" placeholder="Certificate Name">
                                            </div> --}}
                                        </div>
                                        {{-- <div class="col-md-3">
                                            <label class="form-control-label"><b>Certificate File:</b></label>
                                            <div class="d-flex  align-items-center select-add-section">
                                                <input type="file" accept="image/jpeg,image/gif,image/png,application/pdf" name="old_certificates_file[{{ $item->id }}]"  value="{{ $item->certificates_file }}" class=" form-control">
                                            </div>
                                        </div> --}}
                                        <div class="col-md-1">
                                            <label class="form-control-label"><b>View:</b></label>
                                            <div class="d-flex  align-items-center select-add-section">
                                                <a style="color: white" class="btn btn-primary"  data-toggle="modal" data-target="#certificateModal{{ $k }}"> &nbsp;<i class="fa fa-solid fa-eye"></i></a>
                                                <a style="margin-left: 10px" href="{{ route('admin.application-file-download', $details->id) }}" class="btn btn-primary"><i class="fa fa-solid fa-download"></i></a>
                                            </div>
                                        </div>
                                        {{-- <div class="col-md-1">
                                            @if($k == auth()->user()->certificate->count() - 1)
                                            <a id="plus-btn-data-content" href="javascript:void(0)" class="plus-btn-data-content px-1 p-0 m-0 ml-2"><i class="fas fa-plus"></i></a>
                                            @else
                                            <a audio_file_id="{{ $item->id }}" href="javascript:void(0)" class="minus-btn-data-old-audio px-1 p-0 m-0 ml-2"><i class="fas fa-minus-circle"></i></a>
                                            @endif
                                        </div> --}}
                                    </div>
    
    
    
                                     <!-- Modal -->
                                    <div class="modal fade" id="certificateModal{{ $k }}" tabindex="-1" role="dialog" aria-labelledby="audioModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="audioModalLabel" style="color: black">{{ $item->certificates_name }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                                @if ($item->extension == 'pdf')
                                                    <iframe src="{{ $item->certificates_file_show  }}" width="100%" height="500"></iframe>
                                                @else
                                                <img src="{{ $item->certificates_file_show  }}" alt="image" style="height: 300px; width:450px">
                                                @endif
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
    
    
                                    @endforeach 
                                    @endif
                                </div>














                            </div>
                        </div>

        </div>
        @endif
            
                    <div class="row mt-3">
                        <hr>
                      <div class="col-sm-12 mg-t-10 mg-sm-t-0 ">
                        <div class="float-right">
                            <a href="{{route('admin.admission.edit', $details->id)}}" class="btn btn-primary text-white mr-2" ><i class="fa fa-edit"></i> Edit</a>
                            <a href="{{route('frontend.student_admission.edit', $details->id)}}" class="btn btn-primary text-white mr-2" ><i class="fa fa-download"></i> Download</a>
                            <a href="{{route('frontend.student_admission.edit', $details->id)}}" class="btn btn-primary text-white mr-2" ><i class="fa fa-print"></i> Print</a>
                        </div>
                    </div>
                    </div>









                </div><!-- form-layout -->
            </div><!-- col-6 -->
            <!----- Start Add Category Form input ------->
          </div><!-- br-section-wrapper -->
        </div><!-- br-pagebody -->

    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
@endsection

