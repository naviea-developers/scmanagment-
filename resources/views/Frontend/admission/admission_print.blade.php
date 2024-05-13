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
  <div class="row ">
    <div class="col-sm-4" >
        <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 180px;">
            <img class="display-upload-img" style="width: 180px;height: 200px;" src="{{ $details->image_show }}" alt="">
            <input type="file" name="image" class="form-control upload-img" placeholder="Enter Activity Image" style="position: absolute;top: 0;opacity: 0;height: 100%;">
        </div>
    </div>
</div>
    <h2>Application Form</h2>
        <div class="row">
            <div class="column">
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
                <p>NIaz</p>
            </div>
            <div class="column">
                <label for="dob">Date of Birth :</label>
                <p>NIaz</p>
            </div>
            <div class="column">
                <label for="gender">Student Phone :</label>
                <p>NIaz</p>
            </div>
        </div>

        <div class="row">
          <div class="column">
              <label for="phone">Student Email :</label>
              <p>NIaz</p>
          </div>
          <div class="column">
              <label for="dob">Student NID/Birth Certificate :</label>
              <p>NIaz</p>
          </div>
          <div class="column">
              <label for="gender">Father Name :</label>
              <p>NIaz</p>
          </div>
        </div>

        <div class="row">
          <div class="column">
              <label for="phone">Father Occupation :</label>
              <p>NIaz</p>
          </div>
          <div class="column">
              <label for="dob">Father Phone :</label>
              <p>NIaz</p>
          </div>
          <div class="column">
              <label for="gender">Father NID :</label>
              <p>NIaz</p>
          </div>
        </div>

        <div class="row">
          <div class="column">
              <label for="phone">Father Mother Name :</label>
              <p>NIaz</p>
          </div>
          <div class="column">
              <label for="dob">Mother Occupation :</label>
              <p>NIaz</p>
          </div>
          <div class="column">
              <label for="gender">Mother Phone :</label>
              <p>NIaz</p>
          </div>
        </div>

        <div class="row">
          <div class="column">
              <label for="phone">Yearly Income :</label>
              <p>NIaz</p>
          </div>
        </div>


        
        <h2>Present Address</h2>
        <div class="row">
            <div class="column">
                <label for="phone">Phone:</label>
                <p>NIaz</p>
            </div>
            <div class="column">
                <label for="dob">Date of Birth:</label>
                <p>NIaz</p>
            </div>
            <div class="column">
                <label for="gender">Gender:</label>
                <p>NIaz</p>
            </div>
        </div>

        <h2>Permanent Address</h2>
        <div class="row">
            <div class="column">
                <label for="phone">Phone:</label>
                <p>NIaz</p>
            </div>
            <div class="column">
                <label for="dob">Date of Birth:</label>
                <p>NIaz</p>
            </div>
            <div class="column">
                <label for="gender">Gender:</label>
                <p>NIaz</p>
            </div>
        </div>

        
        
</div>

</body>
</html>