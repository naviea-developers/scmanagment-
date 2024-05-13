<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  {{-- <title>Class Routine</title> --}}
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-v8FpMN7PZIWiDRfM7czPpOVCKaHcJK4jO3kI+KTO9vMjCExH0EeZ3rAaxiylpDcT" crossorigin="anonymous">
  <style>
    /* Additional custom styles */
    .school-name {
      text-align: center;
      margin-bottom: 30px;
    }
    .class-routine {
      margin-bottom: 50px;
    }
    .class-routine table {
      width: 100%;
      border-collapse: collapse;
    }
    .class-routine th, .class-routine td {
      border: 1px solid #ccc;
      padding: 8px;
      text-align: center;
    }
    .class-routine th {
      background-color: #f2f2f2;
    }
  </style>
</head>
<body>

<div class="container">

    <div class="col-md-12 px-4 pt-2 pb-4 px-sm-5 pb-sm-5 pt-md-5" >
        <h3 class="text-center">Admission Form</h3>
        
            <div class="row ">
                <div class="col-sm-4" >
                    <div class="mt-1 mr-2" style="position:relative;box-shadow: 0px 0px 1px 1px;width: 180px;">
                        <img class="display-upload-img" style="width: 180px;height: 200px;" src="{{ $details->image_show }}" alt="">
                        <input type="file" name="image" class="form-control upload-img" placeholder="Enter Activity Image" style="position: absolute;top: 0;opacity: 0;height: 100%;">
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <hr>

                <div class="col-sm-4">
                    <label class=" form-control-label"><b>Class: </b></label>
                        <p >{{ @$details->class->name }}</p>
                </div>

                <div class="col-sm-4">
                <label class=" form-control-label"><b>Group: </b></label>
                <p >{{ @$details->group->name }}</p>
                </div>

                <div class="col-sm-4">
                <label class=" form-control-label"><b>Fees: </b></label>
                <p >{{ @$details->feeManagement->fee->particular_name }} - ({{ @$details->feeManagement->fee_amount }})</p>
                </div>
                
            </div>

    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-k3A1LmfFiBCL0h9pzyvLWNs/zFwMIGg/2IQXO48JAU0MTrvYV4R8aG3g7AgL73n9" crossorigin="anonymous"></script>
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