
<div class="br-section-wrapper data-update">
  <h6 class="br-section-label text-center mb-4">Update Session Info</h6>
    {{-- validate start  --}}
    
    <div id="update_errors"></div>
    {{-- validate End  --}}

  <!----- Start Add Category Form input ------->
  <div class="col-xl-7 mx-auto">
      <div class="form-layout form-layout-4 py-5">

                  @php
                  $currentYear = date("Y");
                  $previewYears = 100;
                  $nextYears = 10; 
                  @endphp

                    <form id="data-form-update" action="{{ route('admin.session.update', $session->id) }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                          <div class="col-sm-6">
                              <label class="form-control-label">Start Session: <span class="tx-danger">*</span></label>
                              <div class="mg-t-10 mg-sm-t-0">
                                <div class="mg-t-10 mg-sm-t-0">
                                  <select name="start_month" class="form-control">
                                    <option value=""> Select Month</option>
                                    <option @if ($session->start_month == '1') Selected @endif value="1"> January</option>
                                    <option @if ($session->start_month == '2') Selected @endif value="2"> February</option>
                                    <option @if ($session->start_month == '3') Selected @endif value="3"> March</option>
                                    <option @if ($session->start_month == '4') Selected @endif value="4"> April</option>
                                    <option @if ($session->start_month == '5') Selected @endif value="5"> May</option>
                                    <option @if ($session->start_month == '6') Selected @endif value="6"> June</option>
                                    <option @if ($session->start_month == '7') Selected @endif value="7"> July</option>
                                    <option @if ($session->start_month == '8') Selected @endif value="8"> August</option>
                                    <option @if ($session->start_month == '9') Selected @endif value="9"> September</option>
                                    <option @if ($session->start_month == '10') Selected @endif value="10"> October</option>
                                    <option @if ($session->start_month == '11') Selected @endif value="11"> November</option>
                                    <option @if ($session->start_month == '12') Selected @endif value="12"> December</option>
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
                                  <option @if ($year->id == $session->start_year_id) Selected @endif value="{{ $year->id }}">{{ $year->year }}</option>
                                  @endforeach --}}
                                    @foreach (range($currentYear - $previewYears, $currentYear + $nextYears) as $year)
                                      <option value="{{ $year }}" @if($year == $session->start_year) selected @endif>{{ $year }}</option>
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
                                  <option @if ($session->end_month == '1') Selected @endif value="1"> January</option>
                                  <option @if ($session->end_month == '2') Selected @endif value="2"> February</option>
                                  <option @if ($session->end_month == '3') Selected @endif value="3"> March</option>
                                  <option @if ($session->end_month == '4') Selected @endif value="4"> April</option>
                                  <option @if ($session->end_month == '5') Selected @endif value="5"> May</option>
                                  <option @if ($session->end_month == '6') Selected @endif value="6"> June</option>
                                  <option @if ($session->end_month == '7') Selected @endif value="7"> July</option>
                                  <option @if ($session->end_month == '8') Selected @endif value="8"> August</option>
                                  <option @if ($session->end_month == '9') Selected @endif value="9"> September</option>
                                  <option @if ($session->end_month == '10') Selected @endif value="10"> October</option>
                                  <option @if ($session->end_month == '11') Selected @endif value="11"> November</option>
                                  <option @if ($session->end_month == '12') Selected @endif value="12"> December</option>
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
                                  <option  @if ($year->id == $session->end_year_id) Selected @endif  value="{{ $year->id }}">{{ $year->year }}</option>
                                  @endforeach --}}
                                  @foreach (range($currentYear - $previewYears, $currentYear + $nextYears) as $year)
                                  <option value="{{ $year }}" @if($year == $session->end_year) selected @endif>{{ $year }}</option>
                                  @endforeach
                                </select>
                              </div>
                            </div>
                        </div>
                    </div>

                        {{-- <div class="row">
                            <div class="col-sm-12 mt-3">
                                <label class="form-control-label">Class Teacher Name: <span class="tx-danger">*</span></label>
                                <div class="mg-t-10 mg-sm-t-0">
                                  <select name="class_teacher_id" class="form-control">
                                    <option value=""> Select Teacher</option>
                                    @foreach ($teachers as $teacher)
                                    <option @if ($teacher->id == $class->class_teacher_id) Selected @endif value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                    @endforeach
                                  </select>
                                </div>
                              </div>
                        </div> --}}

                        </div>

                        <div class="row mt-3">
                          <div class="col-sm-12 mg-t-10 mg-sm-t-0 text-right">
                            <a href="javascript:void(0);" type="button" class="btn-cancel btn btn-secondary text-white mr-2" >Cancel</a>
                            <button type="submit" class="btn btn-info btn-update">Update</button>
                          </div>
                        </div>
                    </form>

                </div><!-- form-layout -->
</div><!-- col-6 -->

         