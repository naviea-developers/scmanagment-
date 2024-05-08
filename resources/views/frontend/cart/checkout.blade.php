
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirm - Techknowsity</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link  rel="stylesheet"  href="https://site-assets.fontawesome.com/releases/v6.3.0/css/all.css">
    <style>

        body{
            padding: 0px !important;
            margin: 0px !important;
        }

        h3 {
            border-bottom: 1px solid gray;
            padding-bottom: 10px;
        }
        body{
            padding: 50px;
        }
        .box{
            background: #e7f3ff;
            border-radius: 9px;
            color: #fff;
            padding: 20px;
        }

        .btn-light {
            background: none !important;
            color: #fff !important;
            border: none !important;
            cursor: pointer !important;
        }

        .title{
            background: #524a4a;
            padding: 5px;
            border-radius: 5px;
        }
  img{
      max-width: 500px;height: 350px;margin: 0 auto;display: block;
  } 
        
@media only screen and (max-width: 550px) {
  img{
      max-width: 100%;height: auto;margin: 0 auto;display: block;
  }
}
        
    </style>
</head>
<body>

    @include('frontend.includess.header')
    @include('frontend.includess.nav')

    <div class="container">
        <div class="box mt-5">
            
            <img src="https://cdn.dribbble.com/users/1238709/screenshots/4069900/success_celebration_800x600.gif">
            
           <center style="margin-top:-50px;">
                <h1 style="color:#000;">Order Successfully</h1>
                <h2> Thank You </h2>
           </center>
                
        </div>
        
    </div>
<script>
const myTimeout = setTimeout(myGreeting, 2000);

function myGreeting() {
  window.location.replace("/");

}
</script>
</body>
</html>
