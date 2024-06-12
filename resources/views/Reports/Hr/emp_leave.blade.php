@extends('Backend.layouts.layouts')
@section('title')
Employee Leave Report
@endsection


@section('style')
<style>
    .select2-container .select2-selection--single {
        background-color: #fff;
        border: 1px solid #aaa;
        border-radius: 4px;
        height: 44px!important;
    }
    .select2-container .select2-selection--single .select2-selection__rendered {
        color: #444;
        line-height: 44px;
    }
    .select2-container .select2-selection--single .select2-selection__arrow {
        height: 44px;
        position: absolute;
        top: 1px;
        right: 1px;
        width: 20px;
    }
    .select2-container .select2-selection--single .select2-selection__arrow b {
        border-color: #888 transparent transparent transparent;
        border-style: solid;
        border-width: 5px 4px 0 4px;
        height: 0;
        left: 50%;
        margin-left: -4px;
        margin-top: -2px;
        position: absolute;
        top: 50%;
        width: 0;
    }
    .dtable-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 30px;
        padding: 0 0 0 10px;

    }

    @media only screen and (max-width: 767px) {
        .dtable-footer {

            flex-direction: row;
        }
    }

    @media only screen and (max-width: 480px) {
        .display-per-page {
            display: none;
        }
    }
</style>

@endsection
@section('main_contain')
<div class="br-mainpanel">
    <div class="br-section-wrapper">
        <div class="content-area">
            <div class="container-fluid">
                <div class="row row-card-one">
                    <div class="col-sm-12 ">
                        <div class="row report-title">
                            <h4 class=""><b>Employee Leave Report</b></h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container" style="box-shadow: 0 0 2px gray;border-top:4px solid gray;">
                <div class="row row-card-one my-4">
                    <div class="col-md-12 col-lg-12 col-sm-12">

                        <div class="search-Section">
                            <form action="">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for=""><b>From Date</b></label>
                                    <input type="hidden" name="per_page" id="h_per_page" value="{{ $per_page }}">
                                    <input type="text" class=" form-control  fl_datepicker1 from_date" value="{{ $from_date }}" name="from_date" autocomplete="off" required>
                                </div>
                                <div class="col-md-3">
                                    <label for=""><b>To Date</b></label>
                                    <input type="text" class=" form-control  fl_datepicker2 to_date" value="{{ $to_date }}" name="to_date" autocomplete="off" required>
                                </div>

                              
                                <div class="col-sm-3">
                                    <label for=""><b>Designation</b></label>

                                    <select id="designation" class="form-control " name="designation">
                                        <option value="">-- Select One --</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <label for=""><b>Employee</b></label>

                                    <select id="employee" class="form-control " name="employee">
                                        <option value="">-- Select One --</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label></label>
                                    <Button id="search_btn" type="submit" class="btn btn-primary  mt-3">Search</Button>
                                </div>
                            </div>
                            </form>
                        </div>



                        <br/>
                        <div class="d-flex justify-content-between">
                            <div></div>
                            <div class="d-flex">

                                <form action="{{ route('report_emp_leave_pdf') }}" method="GET">
                                    <input type="hidden" value="{{ $from_date }}" name="p_from_date" class="p_from_date">
                                    <input type="hidden" value="{{ $to_date }}" name="p_to_date" class="p_to_date">
                                    <input type="hidden" name="p_department" class="p_department">
                                    <input type="hidden" name="p_designation" class="p_designation">
                                    <input type="hidden" name="p_employee" class="p_employee">
                                    <button type="submit" class="btn btn-primary px-4 ms-2">PDF</button>
                                </form>
                                <form action="{{ route('report_emp_leave_print') }}" method="GET">
                                    <input type="hidden" value="{{ $from_date }}" name="p_from_date" class="p_from_date">
                                    <input type="hidden" value="{{ $to_date }}" name="p_to_date" class="p_to_date">
                                    <input type="hidden" name="p_department" class="p_department">
                                    <input type="hidden" name="p_designation" class="p_designation">
                                    <input type="hidden" name="p_employee" class="p_employee">
                                    <button type="submit" class="btn btn-success px-4 ms-2">Print</button>
                                </form>
                                <form action="{{ route('report_emp_leave_excel') }}" method="GET">
                                    <input type="hidden" value="{{ $from_date }}" name="p_from_date" class="p_from_date">
                                    <input type="hidden" value="{{ $to_date }}" name="p_to_date" class="p_to_date">
                                   <input type="hidden" name="p_department" class="p_department">
                                    <input type="hidden" name="p_designation" class="p_designation">
                                    <input type="hidden" name="p_employee" class="p_employee">
                                    <button type="submit" class="btn btn-info px-4 ms-2">Excel</button>
                                </form>

                            </div>
                        </div>
                        <br/>
                        <table id="dataTable" class="purchase-list table table-striped table-bordered" style="width:100%">
                          <thead>
                            <tr>
                                <th>Employee Name</th>
                                <th>Leave Type</th>
                                <th>Leave Part</th>
                                <th>From Date</th>
                                <th>To Date</th>
                                <th>Day</th>
                                <th>Status</th>

                            </tr>
                          </thead>
                          <tbody>
                            @php $day=0; @endphp
                            @foreach($reports as $key=>$report)

                                <tr>
                                    <td>{{ $report->employee?->name }}</td>
                                    <td>{{$report->leaveTypeID}}</td>
                                    <td>{{$report->leavePartID}}</td>
                                    <td>{{date('F j, Y',strtotime($report->fromDate))}}</td>
                                    <td>{{date('F j, Y',strtotime($report->toDate))}}</td>
                                    <td>{{$report->leaveDay}}</td>
                                    <td>
                                        @if($report->status==0)
                                            <span style="font-weight: bold;">Pending</span>
                                        @elseif($report->status==1)
                                        <span style="font-weight: bold;">Approved</span>
                                        @php $day+=$report->leaveDay; @endphp
                                        @else
                                        <span style="color:red;font-weight: bold;">Reject</span>
                                        @endif
                                    </td>

                                </tr>
                            @endforeach

                          </tbody>
                        </table>

            @if($reports->count() > 0)
            <div class="dtable-footer my-4">
                <div class="form-group d-flex align-items-center  display-per-page">
                    <label>Per Page </label>
                    <div>
                        <select name="perPage" id="input_per_page" class="form-control ms-1">

                            <option @if($per_page == 50) selected @endif value="50">50</option>
                            <option @if($per_page == 100) selected @endif value="100">100</option>
                            <option @if($per_page == 200) selected @endif value="200">200</option>
                            <option @if($per_page == 500) selected @endif value="500">500</option>
                        </select>
                    </div>
                </div>
                @if( $reports->lastPage() > 1)
                <!-- pagination-start -->
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item">
                            @php
                                $pre_no =$reports->currentPage();
                                if($pre_no != 1){
                                    $pre_no = $pre_no-1;
                                }
                                if(empty($_GET)){
                                    $url = $reports->url($pre_no).'&per_page='.$per_page;
                                }else{
                                    $url =request()->fullUrl().'&page='.$pre_no;
                                }

                            @endphp
                            <a class="page-link" href="{{ $url }}" aria-label="Previous">	<span aria-hidden="true">«</span>
                            </a>
                        </li>
                        @for($i=1;$i <= $reports->lastPage();$i++)
                        <li class="page-item"><a class="page-link {{ $i == $reports->currentPage() ? 'active' : 0 }}" href="{{  empty($_GET) ?  ($reports->url($i).'&per_page='.$per_page) : (request()->fullUrl().'&page='.$i) }}">{{ $i }} </a>
                        </li>
                        @endfor

                        <li class="page-item">
                            @php
                                $next_no =$reports->currentPage();
                                $next_no =$reports->currentPage();
                                if($next_no != 1){
                                    $next_no = $next_no+1;
                                }
                                if(empty($_GET)){
                                    $url = $reports->url($next_no).'&per_page='.$per_page;
                                }else{
                                    $url =request()->fullUrl().'&page='.$next_no;
                                }

                            @endphp
                            <a class="page-link" href="{{ $url }}" aria-label="Next">	<span aria-hidden="true">»</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- pagination-end -->
                @endif
            </div>
            @endif

                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content Area End -->
    </div>
</div>
@endsection
@section('script')
<script>
$(document).ready(function(){
    $(".fl_datepicker1").flatpickr({
        altInput:true,
        defaultDate: new Date("{{ $from_date }}"),

    });
    $(".fl_datepicker2").flatpickr({
        altInput:true,
        defaultDate: new Date("{{ $to_date }}"),

    });
    $('.from_date').on('change',function(){
        $('.p_form_date').val(this.value);
    });
    $('.to_date').on('change',function(){
        $('.p_to_date').val(this.value);
    });
    $('#input_per_page').on('change',function(){
        $('#h_per_page').val(this.value);
        $('#search_btn').click();
    });
   
    $(document).find('#designation').select2({
        placeholder: 'Select Designation',
        allowClear: true,
        width:'100%',
        dropdownAutoWidth : true,
        containerCssClass: 'select-sm',
        ajax: {
            url: '{{route('select2.designation')}}',
            dataType: 'json',
            delay: 250,
            data: function (params) {
            return {
                dept_id : $('#department').val(),
                value: $.trim(params.term),
            };
            },
            processResults: function (response) {
            return {
                results: response
            };
            },
            cache: true
        }
    }).on('select2:select', function (e) {
        var data = e.params.data;
        $('.p_designation').val(data.id);
         $('#employee').val('').trigger('change');

    });
     $(document).find('#employee').select2({
        placeholder: 'Select Employee',
        allowClear: true,
        width:'100%',
        dropdownAutoWidth : true,
        containerCssClass: 'select-sm',
        ajax: {
            url: '{{route('select2.emp_by_desig')}}',
            dataType: 'json',
            delay: 250,
            data: function (params) {
            return {
                desig_id : $('#designation').val(),
                value: $.trim(params.term),
            };
            },
            processResults: function (response) {
            return {
                results: response
            };
            },
            cache: true
        }
    }).on('select2:select', function (e) {
        var data = e.params.data;
        $('.p_employee').val(data.id);

    });
   

    @if(request()->designation)
        @php
            $designation = \App\Models\Hr\Designation::find(request()->designation);
        @endphp
        @if($designation)
            var designation_option = new Option("{{ $designation->name }}","{{ $designation->id }}", true, true);
            $('#designation').append(designation_option).trigger('change');
        @endif
    @endif
    @if(request()->employee)
        @php
            $employee = \App\Models\User::find(request()->employee);
        @endphp
        @if($employee)
            var employee_option = new Option("{{ $employee->name }}","{{ $employee->id }}", true, true);
            $('#employee').append(employee_option).trigger('change');
        @endif
    @endif
});
</script>
@endsection
