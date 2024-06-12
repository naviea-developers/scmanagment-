<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#01303f;max-height: 50px;">
        <h5 class="modal-title" id="exampleModalLabel" style="color:white;line-height:18px;">Leave Application</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
          <div class="container-fluid">
            <div class="row row-card-one">
              <div class="col-sm-12">
                <!-- form here -->
                <form method="POST" action="{{route('leaveApplication.store')}}" enctype="multipart/form-data" class="add_data_form">
                  @csrf
                  <div class="row">
                    <div class="col-sm-4">
                      <label for="">Designation *</label>
                      <select class="form-control" id="desigID" name="empDesigID" required>
                        <option value="">-- Select One --</option>
                        @foreach($designations as $designation)
                          <option value="{{$designation->id}}">{{$designation->name}}</option>
                        @endforeach

                      </select>
                    </div>
                    <div class="col-sm-4">
                      <label for="">Employee ID *</label>
                      <select class="form-control" id="empID" name="empID" required>
                        <option value="">-- wait --</option>
                      </select>
                    </div>
                    <div class="col-sm-4">
                      <label for="">Leave Type *</label>
                      <select class="form-control" id="leaveTypeID" name="leaveTypeID" required>
                        <option value="">-- Select One --</option>
                        @foreach($leaveTypes as $leaveType)
                          <option value="{{$leaveType->id}}">{{$leaveType->leaveCode}} - {{$leaveType->description}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="col-sm-4">
                      <label for="">Leave Part *</label>
                      <select class="form-control" id="leavePartID" name="leavePartID" required>
                        <option value="">-- Wait --</option>
                      </select>
                    </div>

                    <div class="col-sm-4">
                      <label for="birthdaytime">From Date:</label>
                      <input type="date" class=" form-control datepicker" id="birthdaytime" name="fromDate">
                    </div>
                    <div class="col-sm-4">
                      <label for="">To Date:</label>
                      <input type="date" class=" form-control datepicker" id="birthdaytime" name="toDate">
                    </div>

                    <div class="col-sm-12">
                      <br/>
                      <label for="">Purpose *</label>
                      <textarea class="form-control" name="purpose" id="purpose" cols="5" rows="2" required></textarea>
                    </div>
                  
                    <div class="col-sm-12 text-right">
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
          <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button> -->
        </div>
    </div>
  </div>
</div>