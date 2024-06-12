

<div class="br-section-wrapper data-create" style="display:none;">
    <div class="text-center mb-1">
        <h3 class="">Add Employee Salary</h3>
        <br>
    </div>
    <form id="data-form-create" action="{{ url('storeSalary') }}" method="post">
        @csrf
        <div class="row" style="justify-content: center;">
            <div class="col-md-4" style="margin-bottom: 5px">
                <label for="exampleDataList" class="form-label">Employee Name :</label>
                <select name="empID" id="add_emp" class="form-control">
                    <option value="">Select Employee</option>
                   
                </select>
            </div>
            <div class="col-md-4" style="margin-bottom: 5px">
                <label class="form-label" for="">Salary Month : </label>
                <input type="text" class="form-control datetimepicker" name="monthDate" id="salary_month_date" autocomplete="off" placeholder="yyyy-mm" required>
            </div>
        </div>
        <br><br>
        <center>
            <div class="row">
                <div class="col-md-12">
                    <button type="button" class="btn btn-danger btn-cancel">
                        Back
                    </button>
                    <button class="btn btn-primary btn-create">
                        <i class="fa fa-plus"></i>
                        Add Salary
                    </button>
                </div>
            </div>
        </center>
    </form>
</div>
