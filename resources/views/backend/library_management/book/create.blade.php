
<div class="br-section-wrapper data-create" style="display: none;">
  <h6 class="br-section-label text-center mb-4"> Add New Book</h6>
  {{-- validate start  --}}
  <div id="create_errors"></div>
  {{-- validate End  --}}


  <div class="col-xl-7 mx-auto">
    <div class="form-layout form-layout-4 py-5">

      <form id="data-form-create" action="{{ route('admin.book.store') }}" method="post" enctype="multipart/form-data">
          @csrf

          <div class="row">

              <div class="col-sm-12 mt-3">
                  <label class="form-control-label">Book Name: <span class="tx-danger">*</span></label>
                  <div class="mg-t-10 mg-sm-t-0">
                    <input type="text" name="name" class="form-control" placeholder="Enter Book Name" value="{{ old('name') }}" required>
                  </div>
              </div>

              <div class="col-sm-12 mt-3">
                <label class="form-control-label">Class Name: <span class="tx-danger">*</span></label>
                <div class="mg-t-10 mg-sm-t-0">
                  <select name="class_id" class="form-control" id="class">
                    <option value=""> Select Class</option>
                    @foreach ($classes as $class)
                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="col-sm-12 mt-3">
                <label class="form-control-label">Group Name: <span class="tx-danger">*</span></label>
                <div class="mg-t-10 mg-sm-t-0">
                  <select name="group_id" class="form-control" id="group">
                    <option value=""> Select Group</option>
                    {{-- @foreach ($groups as $group)
                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                    @endforeach --}}
                  </select>
                </div>
              </div>

              <div class="col-sm-12 mt-3">
                <label class="form-control-label">Shelf Name: <span class="tx-danger">*</span></label>
                <div class="mg-t-10 mg-sm-t-0">
                  <select name="shelf_id" class="form-control">
                    <option value=""> Select Shelf</option>
                    @foreach ($shelves as $shelf)
                    <option value="{{ $shelf->id }}">{{ $shelf->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>


              <div class="col-sm-12 mt-3">
                <label class="form-control-label">Total Set: <span class="tx-danger">*</span></label>
                <div class="mg-t-10 mg-sm-t-0">
                  <input type="number" name="total_set" class="form-control" placeholder="Enter Total Set Name" value="{{ old('total_set') }}" required>
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
        

