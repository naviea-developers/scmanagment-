<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Application Form</title>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .container {
        max-width: 800px;
        margin: 50px auto;
        padding: 20px;
    }

    .row {
        display: flex;
        flex-wrap: wrap;
        margin-bottom: 10px;
    }

    .column {
        flex: 1;
        margin-right: 10px;
    }

    .column:last-child {
        margin-right: 0;
    }

    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

</style>
</head>
<body>

<div class="container">
         <h2 style="text-align:center;">Application Form</h2>
        <div class="row ">
            <div class="col-sm-4" >
                <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 180px;">
                    <img class="display-upload-img" style="width: 180px;height: 200px;" src="{{ $details->image_show }}" alt="">
                </div>
            </div>
        </div>
    
        <div class="row">
            <div class="column">
            <div class="column">
                <label for="firstName">Academic Year:</label>
                <p>{{ @$details->academic_year->year }}</p>
            </div>
            <div class="column">
                <label for="firstName">Session:</label>
                <p >{{ @$details->session->start_year }} - {{ @$details->session->end_year }}</p>
            </div>
                <label for="firstName">Class:</label>
                <p>{{ @$details->class->name }}</p>
            </div>
            <div class="column">
                <label for="lastName">Group:</label>
                <p>{{ @$details->group->name }}</p>
            </div>
            <div class="column">
                <label for="email">Fees:</label>
                <p>{{ @$details->feeManagement->fee->particular_name }} - ({{ @$details->feeManagement->fee_amount }})</p>
            </div>
        </div>

        <h2>Student Information</h2>
        <div class="row">
            <div class="column">
                <label for="phone">Student Name :</label>
                <p>{{ @$details->student_name }}</p>
            </div>
            <div class="column">
                <label for="dob">Date of Birth :</label>
                <p>{{ @$details->dob }}</p>
            </div>
            <div class="column">
                <label for="dob">Gender :</label>
                <p >@if ($details->gender=='0') Male
                    @elseif ($details->gender=='1') Female  @endif</p>
            </div>
        </div>

        <div class="row">
            <div class="column">
                <label for="gender">Student Phone :</label>
                <p>{{ @$details->student_phone }}</p>
            </div>
            <div class="column">
                <label for="phone">Student Email :</label>
                <p>{{ @$details->student_email }}</p>
            </div>
            <div class="column">
                <label for="dob">Student NID/Birth Certificate :</label>
                <p>{{ @$details->student_nid }}</p>
            </div>
        </div>

        <div class="row">
            <div class="column">
                <label for="blood_group">Blood Group :</label>
                <p >
                  @if (@$details->blood_group == 'o+')
                      O Positive (O+)
                      @elseif (@$details->blood_group == 'o-')
                      O Negative (O-)
                      @elseif (@$details->blood_group == 'a+')
                      A Positive (A+)
                      @elseif (@$details->blood_group == 'a-')
                      A Negative (A-)
                      @elseif (@$details->blood_group == 'b+')
                      B Positive (B+)
                      @elseif (@$details->blood_group == 'b-')
                      B Negative (B-)
                      @elseif (@$details->blood_group == 'ab+')
                      AB Positive (AB+)
                      @elseif (@$details->blood_group == 'ab-')
                      AB Negative (AB-)
                  @endif
              </p>
            </div>
            <div class="column">
                <label for="gender">Father Name :</label>
                <p>{{ @$details->father_name }}</p>
            </div>
            <div class="column">
                <label for="phone">Father Occupation :</label>
                <p>{{ @$details->father_occupation }}</p>
            </div>
        </div>

        <div class="row">
            <div class="column">
                <label for="dob">Father Phone :</label>
                <p>{{ @$details->father_phone }}</p>
            </div>
            <div class="column">
                <label for="gender">Father NID :</label>
                <p>{{ @$details->father_nid }}</p>
            </div>
            <div class="column">
                <label for="phone">Father Mother Name :</label>
                <p>{{ @$details->mother_name }}</p>
            </div>
        </div>

        <div class="row">
            <div class="column">
                <label for="dob">Mother Occupation :</label>
                <p>{{ @$details->mother_occupation }}</p>
            </div>
            <div class="column">
                <label for="gender">Mother Phone :</label>
                <p>{{ @$details->mother_phone }}</p>
            </div>
            <div class="column">
                <label for="phone">Yearly Income :</label>
                <p>{{ @$details->yearly_income }}</p>
            </div>
        </div>


        
        <h2>Present Address</h2>
        <div class="row">
            <div class="column">
                <label for="phone">Continent Name :</label>
                <p>{{ @$details->present_continent->name }}</p>
            </div>
            <div class="column">
                <label for="dob">Country Name :</label>
                <p>{{ @$details->present_country->name }}</p>
            </div>
            <div class="column">
                <label for="gender">State Name :</label>
                <p>{{ @$details->present_state->name }}</p>
            </div>
        </div>

        <div class="row">
            <div class="column">
                <label for="phone">City Name :</label>
                <p>{{ @$details->present_city->name }}</p>
            </div>
            <div class="column">
                <label for="dob">Address :</label>
                <p>{{ @$details->present_address }}</p>
            </div>
            <div class="column">
            </div>
           
        </div>

        <h2>Permanent Address</h2>
        <div class="row">
            <div class="column">
                <label for="phone">Continent Name :</label>
                <p>{{ @$details->permanent_continent->name }}</p>
            </div>
            <div class="column">
                <label for="dob">Country Name :</label>
                <p>{{ @$details->permanent_country->name }}</p>
            </div>
            <div class="column">
                <label for="gender">State Name :</label>
                <p>{{ @$details->permanent_state->name }}</p>
            </div>
        </div>

        <div class="row">
            <div class="column">
                <label for="phone">City Name :</label>
                <p>{{ @$details->permanent_city->name }}</p>
            </div>
            <div class="column">
                <label for="dob">Address :</label>
                <p>{{ @$details->parmanent_address }}</p>
            </div>
            <div class="column">
            </div>
           
        </div>

        
        
</div>
<script>
    window.print();
    window.onafterprint = back;

    function back() {
        window.close();
        window.history.back();
    }
</script>

</body>
</html>

