
<div class="br-section-wrapper data-create" style="display: none;">
  <h6 class="br-section-label text-center mb-4"> Add New Session</h6>
  {{-- validate start  --}}
  <div id="create_errors"></div>
  {{-- validate End  --}}


  <div class="col-xl-7 mx-auto">
    <div class="form-layout form-layout-4 py-5">

                  @php
                  $currentYear = date("Y");
                  $previewYears = 100;
                  $nextYears = 10; 
                  @endphp

                    <form id="data-form-create" action="{{ route('admin.session.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                 
                        <div class="row">
                            <div class="col-sm-6">
                                <label class="form-control-label">Start Session: <span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                  <div class="mg-t-10 mg-sm-t-0">
                                    <select name="start_month" class="form-control">
                                      <option value=""> Select Month</option>
                                      <option value="1"> January</option>
                                      <option value="2"> February</option>
                                      <option value="3"> March</option>
                                      <option value="4"> April</option>
                                      <option value="5"> May</option>
                                      <option value="6"> June</option>
                                      <option value="7"> July</option>
                                      <option value="8"> August</option>
                                      <option value="9"> September</option>
                                      <option value="10"> October</option>
                                      <option value="11"> November</option>
                                      <option value="12"> December</option>
                                    </select>
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm-6" style="margin-top: 20px">
                                <div class="mg-t-10 mg-sm-t-0">
                                  <div class="mg-t-10 mg-sm-t-0">
                                    <select name="start_year" class="form-control">
                                      <option value=""> Select Year</option>
                                      {{-- @foreach ($years as $year)
                                      <option value="{{ $year->id }}">{{ $year->year }}</option>
                                      @endforeach --}}
                                      @foreach (range($currentYear - $previewYears, $currentYear + $nextYears) as $year)
                                          <option value="{{ $year }}" @if($year == $currentYear) selected @endif>{{ $year }}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                          <div class="col-sm-6">
                              <label class="form-control-label">End Session: <span class="tx-danger">*</span></label>
                              <div class="mg-t-10 mg-sm-t-0">
                                <div class="mg-t-10 mg-sm-t-0">
                                  <select name="end_month" class="form-control">
                                    <option value=""> Select Month</option>
                                    <option value="1"> January</option>
                                    <option value="2"> February</option>
                                    <option value="3"> March</option>
                                    <option value="4"> April</option>
                                    <option value="5"> May</option>
                                    <option value="6"> June</option>
                                    <option value="7"> July</option>
                                    <option value="8"> August</option>
                                    <option value="9"> September</option>
                                    <option value="10"> October</option>
                                    <option value="11"> November</option>
                                    <option value="12"> December</option>
                                  </select>
                                </div>
                              </div>
                          </div>

                          <div class="col-sm-6" style="margin-top: 20px">
                              <div class="mg-t-10 mg-sm-t-0">
                                <div class="mg-t-10 mg-sm-t-0">
                                  <select name="end_year" class="form-control">
                                    <option value=""> Select Year</option>
                                    {{-- @foreach ($years as $year)
                                  <option value="{{ $year->id }}">{{ $year->year }}</option>
                                  @endforeach --}}
                                  @foreach (range($currentYear - $previewYears, $currentYear + $nextYears) as $year)
                                  <option value="{{ $year }}" @if($year == $currentYear) selected @endif>{{ $year }}</option>
                                  @endforeach
                                  </select>
                                </div>
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
        