<div class="br-section-wrapper data-create" style="display: none;">
  <h6 class="br-section-label text-center mb-4"> Add New Rooms</h6>
      {{-- validate start  --}}
      <div id="create_errors"></div>
      {{-- validate End  --}}


  <div class="col-xl-7 mx-auto">
      <div class="form-layout form-layout-4 py-5">

          <form id="data-form-create" action="{{ route('admin.room.store') }}" method="post" enctype="multipart/form-data">
              @csrf

              <div class="row">
                <div class="col-sm-12">
                  <label class="form-control-label">Bulding Name: <span class="tx-danger">*</span></label>
                  <div class="mg-t-10 mg-sm-t-0">
                    <select name="bulding_id" class="form-control" id="bulding">
                      <option value=""> Select Bulding</option>
                      @foreach ($buldings as $bulding)
                      <option value="{{ $bulding->id }}">{{ $bulding->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="col-sm-12 mt-3">
                  <label class="form-control-label">Floor Name: <span class="tx-danger">*</span></label>
                  <div class="mg-t-10 mg-sm-t-0">
                    <select name="floor_id" class="form-control" id="floor">
                      <option value=""> Select Floor</option>
                      {{-- @foreach ($floors as $floor)
                      <option value="{{ $floor->id }}">{{ $floor->name }}</option>
                      @endforeach --}}
                    </select>
                  </div>
                </div>

            
                <div class="col-sm-12 mt-3">
                    <label class="form-control-label">Room Name: <span class="tx-danger">*</span></label>
                    <div class="mg-t-10 mg-sm-t-0">
                      <input type="text" name="name" class="form-control" placeholder="Enter Room Name" value="{{ old('name') }}" required>
                    </div>
                </div>
              </div>

              <div class="row mt-3">
                <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-right">
                  <a href="javascript:void(0);" type="button" class="btn btn-secondary text-white mr-2 btn-cancel" >Cancel</a>
                  <button type="submit" class="btn btn-info btn-create">Save</button>
                </div>
              </div>
          </form>

      </div>
  </div>
</div>
        
