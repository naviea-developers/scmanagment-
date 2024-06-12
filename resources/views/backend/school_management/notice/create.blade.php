
<div class="br-section-wrapper data-create" style="display: none;">
  <h6 class="br-section-label text-center mb-4"> Add New Notice</h6>
  {{-- validate start  --}}
  <div id="create_errors"></div>
  {{-- validate End  --}}


  <div class="col-xl-7 mx-auto">
    <div class="form-layout form-layout-4 py-5">

      <form id="data-form-create" action="{{ route('admin.notice.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col-sm-12">
              <label class="form-control-label">Notice Type: <span class="tx-danger">*</span></label>
              <div class="mg-t-10 mg-sm-t-0">
                <select name="noticetype_id" class="form-control">
                  <option value=""> Select Notice Type</option>
                  {{-- <option value="daily"> Daily Notice</option>
                  <option value="monthly"> Monthly Notice</option>
                  <option value="yearly"> Yearly Notice</option>
                  <option value="instant"> Instant Notice</option> --}}
                  @foreach ($noticeTypes as $noticeType)
                  <option value="{{ $noticeType->id }}">{{ $noticeType->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>
      </div>



      <div class="row mt-3">
          <div class="col-sm-12">
              <label class="form-control-label">Notice Title: <span class="tx-danger">*</span></label>
              <div class="mg-t-10 mg-sm-t-0">
                  <input type="text" name="name" class="form-control" placeholder="Enter Notice Title" value="{{ old('name') }}" required>
              </div>
          </div>
      </div>

      <div class="row mt-3">
        <div class="col-sm-12">
            <label class="form-control-label">Notice Pdf: <span class="tx-danger">*</span></label>
            <div class="mg-t-10 mg-sm-t-0">
                <input type="file" name="notice_file" accept="application/pdf" class="form-control" placeholder="Enter Notice file" value="{{ old('notice_file') }}">
            </div>
        </div>
      </div>

      <div class="row mt-3">
        <div class="col-sm-12">
            <label class="form-control-label">Description: <span class="tx-danger">*</span></label>
            <div class="mg-t-10 mg-sm-t-0">
                <textarea type="text" name="description" rows="5" class="form-control" placeholder="Enter Description">{{ old('description') }}</textarea>
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

    </div><!-- form-layout -->
  </div><!-- col-6 -->

</div><!-- br-section-wrapper -->
     
