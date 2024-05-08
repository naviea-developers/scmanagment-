
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart - Techknowsity</title>
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
            background: #063738;
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
        
        #pay1 ,#pay2 , #pay3 , #pay4 {
            display:none;
        } 
    </style>
</head>
<body>

    @include('frontend.includess.header')
    @include('frontend.includess.nav')

    <div class="container">
        <div class="box mt-5">
            <h3>Summary</h3>
            
            <div class="row title">
                <div class="col-4 text-center">
                    Course Name
                </div>
                <div class="col-4 text-center">
                    Price
                </div>
            </div>
            <div class="row mt-4">
                
                @php
                    $finalPrice = 0;
                @endphp
                
                @foreach ($getData as $data)
                <div class="col-4 text-center">
                    {{ $data->name }}
                </div>
                <div class="col-4 text-center">
                    {{ $data->total_price }}
                    
                     @php
                        $finalPrice = $finalPrice + $data->total_price;
                    @endphp
                    
                </div>

                <div class="col-4 text-center">
                    <a href="/deleteCartProduct/{{ $data->id }}" class="btn btn-light"><i class="fa-duotone fa-trash-can"></i></a>
                </div>
                @endforeach
            </div>
            <br>
            <hr>
            
            <div class="row">
                <div class="col-4 text-center">
                    Total Price : 
                </div>
                <div class="col-4 text-center"> {{ $finalPrice }} </div>
            </div>
            
                <hr>
            <div class="row px-5">
                <div class="col-12">
                    Use Coupon
                </div>
                
                <form action="/usecoupon" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-8">
                            <input type="text" name="coupon" class="form-control">
                        </div>
                        <div class="col-4">
                            <button class="btn btn-success">Use</button>
                        </div>
                    </div>
                    
                </form>
                
            </div>

            @if(isset($coupon))

            <div class="row mt-3 px-5">
                <div class="col-8">
                    Discount Price
                </div>
                <div class="col-4 text-center">
                    
                    @php
                    
                        if($coupon->type == 'Percentage') {
                            
                            $disc_pric = $finalPrice*$coupon->discount/100;
                            echo $disc_pric. " (" .$coupon->discount . "%)";
                            
                        } 
                        else {
                            
                            $disc_pric = $coupon->discount;
                            echo $disc_pric . "(Tk)";
                        
                        }
                        
                    @endphp
                    
                </div>
            </div>
            
            <div class="row mt-3 px-5">
                <div class="col-8">
                    Total Price
                </div>
                <div class="col-4 text-center">
                    {{ $finalPrice }} - {{ $disc_pric }}
                        <br>
                      =  {{ $finalPrice - $disc_pric }}
                    
                </div>
            </div>

            @endif

        </div>
        
        <div class="box mt-5" style="color:#fff;">
            
            <h3 class="text-white">
                Payment Method
            </h3>
            
            <div class="row">
                
                <!--<div class="col-md-3">-->
                <!--    <label for="exampleInputEmail1">-->
                <!--        <input type="radio" sele id="exampleInputEmail1" name="paytype">-->
                <!--        &nbsp; Direct Payment-->
                <!--    </label>-->
                <!--</div>  -->
                
                <div class="col-md-3">
                    <label for="exampleInputEmail2">
                        <input type="radio" id="exampleInputEmail2" name="paytype">
                        &nbsp; Card Payment
                    </label>
                </div>
                
                <div class="col-md-3">
                    <label for="exampleInputEmail3">
                        <input type="radio" id="exampleInputEmail3" name="paytype">
                        &nbsp; Mobile Banking
                    </label>
                </div>
                
                <div class="col-md-3">
                    <label for="exampleInputEmail4">
                        <input type="radio" id="exampleInputEmail4" name="paytype">
                        &nbsp; Bank Payment
                    </label>
                </div>
                
                <div id="pay1"> 
                    
                </div>
                <div id="pay2"> 
                    
                    <div class="row pt-5">
                        <div class="col-4">
                            <lable>Card Type</lable>
                            <select class="form-control">
                                <option>Visa Card</option>
                                <option>Master Card</option>
                                <option>Paypal</option>
                                <option>DBBL</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <lable>First Name</lable>
                            <input class="form-control">
                        </div>   
                        <div class="col-4">
                            <lable>Last Name</lable>
                            <input class="form-control">
                        </div>   
                        
                        <div class="col-6 mt-2">
                            <lable>CVC</lable>
                            <input class="form-control">
                        </div>   
                        <div class="col-6 mt-2">
                            <lable>Card Expiry Date</lable>
                            <input class="form-control">
                        </div>
                        
                    </div>
                
                </div>
                <div id="pay3">
                    
                    <div class="row">
                        
                         <div class="col-4 mt-3">
                            <lable>Provider</lable>
                            <select class="form-control">
                                <option>Bkash</option>
                                <option>Nagad</option>
                                <option>Rokate</option>
                                <option>Upay</option>
                            </select>
                        </div>
                        
                        <div class="col-6 mt-3">
                            <lable>Number</lable>
                            <input type="text" class="form-control" placeholder="01**********">
                        </div>
                        
                    </div>
                
                </div>
                <div id="pay4"> 
                
                    <div class="row">
                        
                         <div class="col-4 mt-3">
                            <lable>Choose Bank</lable>
                            <select class="form-control">
                                <option>Bangladesh Bank</option>
                                <option>Sonali Bank</option>
                                <option>Rupali Bank</option>
                                <option>Pubali Bank</option>
                            </select>
                        </div>
                        
                        <div class="col-4 mt-3">
                            <lable>Routing Number</lable>
                            <input type="text" class="form-control" placeholder="**********">
                        </div>
                        
                        <div class="col-4 mt-3">
                            <lable>Account Number</lable>
                            <input type="text" class="form-control" placeholder="**********">
                        </div>
                        
                    </div>
                
                </div>
                
                
                <div class="col-md-12 p-3 mt-4">
                    
                    <center>
                        <a href="/checkuot" class="btn btn-warning"> Book Now </a>
                    </center>
                    
                </div>
                
            </div>
            
        </div>
        
        
    </div>

<script src="https://code.jquery.com/jquery-3.6.4.js"></script>
<script>
    
    $('#exampleInputEmail1').on('click' , function() {
        
        $('#pay1').css('display' , 'block');
        $('#pay2 , #pay3 , #pay4').css('display' , 'none');
          
    });    
    $('#exampleInputEmail2').on('click' , function() {
        
        $('#pay2').css('display' , 'block');
        $('#pay1 , #pay3 , #pay4').css('display' , 'none');
          
    });    
    $('#exampleInputEmail3').on('click' , function() {
        
        $('#pay3').css('display' , 'block');
        $('#pay2 , #pay1 , #pay4').css('display' , 'none');
          
    });    
    $('#exampleInputEmail4').on('click' , function() {
        
        $('#pay4').css('display' , 'block');
        $('#pay2 , #pay3 , #pay1').css('display' , 'none');
          
    });
    
</script>


</body>
</html>
