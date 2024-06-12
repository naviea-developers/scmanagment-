 <div class="modal fade" id="outTimeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#01303f;max-height: 50px;">
                <h5 class="modal-title" id="exampleModalLabel" style="color:white;line-height:18px;">Out Time</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row row-card-one">
                        <div class="col-sm-12">
                            <form method="POST" action="{{ url('attendanceStoreOut') }}" enctype="multipart/form-data" class="out_data_form">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label for="">Department *</label>
                                        <select class="form-control " id="desigID2" name="desigID" required>

                                            <option value="" disabled selected>-- Select One --</option>
                                            @foreach ($designations as $designation)
                                            <option value="{{ $designation->id }}">{{ $designation->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-sm-3">
                                        <label for="">Employee ID *</label>
                                        <select class="form-control " id="empID2" name="empID" required>
                                          
                                        </select>
                                    </div>

                                    <div class="col-sm-3">
                                        <label for="">Duty Date *</label>
                                    <input type="text" class="fl_datepicker form-control " id="dutyDate2" name="dutyDate" autocomplete="off" required>
                                    </div>
                                </div>
                                </br>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="">Out Time *</label>
                                        <input type="text" class=" form-control datetimepicker" id="outTime" name="outTime" autocomplete="off" >
                                         <span class="invalid-feedback mb-0"></span>
                                    </div>


                                    <div class="col-sm-4">
                                        <button class="btn btn-primary mt-4 " type="submit">
                                            <i class="fa fa-save pr-2"></i>Save
                                        </button>
                                    </div>
                                </div>



                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
        </div>

    </div>
</div>
