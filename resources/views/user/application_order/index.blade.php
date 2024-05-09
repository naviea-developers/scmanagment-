@extends('user.layouts.master-layout')
@section('head')
@section('title','- Program Applications')


@endsection

@section('main_content')

<link
        href="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/css/owl.carousel.min.css"
        rel="stylesheet">
    <link
        href="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/css/owl.theme.default.min.css"
        rel="stylesheet">
          <link href="#"
        rel="stylesheet">
        <style>
/* Collabration Text */

.coll_text {
    padding-top: 50px;
    font-family: 'Times New Roman', Times, serif;
}

#counter .logo-holder {
    width: 100%;
    display: block;
}

#counter .logo-holder img {
    height: 40px;
    max-width: inherit;
    width: auto;
    float: left;
    margin-right: 15px;
}

#counter .logo-holder h3 {
    display: inline-block;
    background: linear-gradient(90deg, #EA7D26 18.98%, #EDAC1F 81.39%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    text-emphasis-color: transparent;
    font-weight: 600;
    padding-top: 15px;
}

#counter .logo-holder .justify-content-center {
    display: inline-flex;
    margin-bottom: 5px;
    margin-top: 10px;
}

.logo-container ul {
    margin: 0;
    padding: 0;
    list-style: none;
    display: inline-block;
}

.logo-container {
    padding: 0px 50px;
}

.logo-container .logo-holder {
    background: #fff;
    border-radius: 10px;
    margin: 20px;
    box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.25);
    display: flex;
    height: 120px;
}

.logo-container .logo-holder img {
    max-height: 60px;
    max-width: 50%;
    width: auto;
    margin: auto;
}

.owl-dots {
    position: absolute;
    bottom: -30px;
    left: 50%;
    -webkit-transform: translate(-50%, 0);
    transform: translate(-50%, 0);
}

.owl-dots .owl-dot {
    background: #C4C4C4;
    border-radius: 50%;
    width: 10px;
    height: 10px;
    float: left;
    margin-right: 10px;
}

.owl-dots .owl-dot.active {
    background: #494CA2;
}

.s_img1,
.s_img2,
.s_img3,
.s_img4 {
    width: 30%;
}

.s_text1 {
    background: linear-gradient(90deg, #EA7D26 18.98%, #EDAC1F 81.39%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    text-emphasis-color: transparent;
    font-weight: 600;
}


/* Collabration Text */

/* founder and co-funder section */
.ourteam-section {
     padding-bottom: unset;
 }


.our-team-title {
    margin-bottom: 15px;
}
.our-team-title h2 {
    padding: 0px;
    margin: 0px;
    font-weight: bold;
    border-left: 5px solid var(--header_color);;
    /* border-left: 5px solid #007bff; */
    padding-left: 5px;
    border-radius: 4px;
    font-size: 24px;
}

 .our-team {
    padding: 30px 0 40px;
    margin-bottom: 30px;
    background-color: #f7f5ec;
    text-align: center;
    overflow: hidden;
    position: relative;
    border: 1px solid var(--header_color);;
    /* border: 1px solid #007bff; */
    border-radius: 8px;
    transition: all 0.4s ease-in 0s;
    cursor: pointer;
  }
  .our-team:hover {
      background: white;
  }
  .our-team .picture {
    display: inline-block;
    height: 130px;
    width: 130px;
    z-index: 1;
    position: relative;
  }

  .our-team .picture::before {
    content: "";
    width: 100%;
    height: 0;
    border-radius: 50%;
    /* background-color: #1369ce; */
    background-color: var(--header_color);
    position: absolute;
    bottom: 135%;
    right: 0;
    left: 0;
    opacity: 0.9;
    transform: scale(3);
    transition: all 0.3s linear 0s;
  }

  .our-team:hover .picture::before {
    height: 100%;
  }

  .our-team .picture::after {
    content: "";
    width: 100%;
    height: 100%;
    border-radius: 50%;
    background-color: var(--header_color);
    /* background-color: #1369ce; */
    position: absolute;
    top: 0;
    left: 0;
    z-index: -1;
  }

  .our-team .picture img {
    width: 100%;
    height: auto;
    border-radius: 50%;
    transform: scale(1);
    transition: all 0.9s ease 0s;
  }

  .our-team:hover .picture img {
    box-shadow: 0 0 0 14px #f7f5ec;
    transform: scale(0.7);
  }

  .our-team .title {
    display: block;
    font-size: 13px;
    color: #4e5052;
    text-transform: capitalize;
  }

  .our-team .social {
    width: 100%;
    padding: 0;
    margin: 0;
    /* background-color: #1369ce; */
    background-color: var(--header_color);
    position: absolute;
    bottom: -100px;
    left: 0;
    transition: all 0.5s ease 0s;
  }

  .our-team:hover .social {
    bottom: 0;
  }

  .our-team .social li {
    display: inline-block;
  }

  .our-team .social li a {
    display: block;
    padding: 10px;
    font-size: 17px;
    color: white;
    transition: all 0.3s ease 0s;
    text-decoration: none;
  }

  .our-team .social li a:hover {
    color: var(--header_color);
    /* color: #1369ce; */
    background-color: #f7f5ec;
  }

.team-content .name{
    font-size: 18px;
    color: black;
    margin-top: 30px;
}
.closeIcon button{
    display: flex;
    justify-content: center;
    align-items: center;
}
.closeIcon button span{
    background: #da0b0b;
    padding: 10px;
    border-radius: 50%;
    height: 35px;
    width: 35px;
    position: absolute;
    margin-top: 3px;
    color: white;
    display: flex;
    justify-content: center;
    align-items: center;
}

</style>







    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">

        <div class="br-pagebody">
          <div class="br-section-wrapper">
            {{-- <h6 class="br-section-label text-center">All Orders</h6> --}}
             

            <div class="row">
              <div class="col-md-9">
                {{-- <div class="table-wrapper"> --}}

                  <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                      <tr style="background-color: var(--seller_frontend_color);color:var(--seller_text_color)">
                        <th class="wd-10p">Id</th>
                        {{-- <th class="wd-15p">Order Number</th> --}}
                        <th class="wd-15p">Appliction ID</th>
                        <th class="wd-15p">Appliction Fee</th>
                        <th class="wd-15p">Payment Method</th>
                        <th class="wd-10p">Status</th>
                        <th style="width: 200px" class="wd-15p">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                          <tr>
                              <td>{{ @$loop->iteration }}</td>
                              <td>{{ @$order->application_code }}</td>
                              <td>{{ @$order->application_fee }}</td>
                              <td>{{ @$order->payment_method }}</td>
                              <td>
                                @if(@$order->status == 0)
                                   Application Start
                                @elseif(@$order->status == 1)
                                   Processing
                                @elseif(@$order->status == 2)
                                  Approved
                                @elseif(@$order->status == 3)
                                   Cancel
                                @endif
                              </td>
                              <td>                              
                                <a href=" {{ route('apply_admission',@$order->id ) }}"><i class="fa-solid fa-pen-to-square fa-xl" style="color: #1859c9;"></i></a>                 
                                <a class="btn text-info" href="{{ route('user.application_order_details', @$order->id) }}"><i class="fa-solid fa-eye fa-xl" style="color: #1a59c7;"></i></a>                         
                                <a class="btn text-info" href="{{ route('user.application_order_invoice', @$order->id) }}"><i class="fa-solid fa-circle-info fa-xl" style="color: #2e5fb2;"></i></a>
                                <a class="btn text-danger delete-button" orderId="{{ @$order->id }}"><i class="icon fa fa-trash fa-xl tx-28"></i></a>
                                {{-- <button class="btn text-danger delete-button" orderId="{{ @$order->id }}"><i class="icon fa fa-trash tx-28"></i></button> --}}
                              </td>
                          </tr>
                        @endforeach
                    </tbody>
                  </table>

                {{-- </div> --}}

              </div>
              <div class="col-md-3">
                

              @if ($consultant)
    

                  <section class="ourteam-section">
                    <!-- Founder and CEO -->
                    <div class="">
                        <div class="our-team-title mt-3">
                            <h2 style="color: var(--text_color)">Your Consultant</h2>
                        </div>
                        <div class="row">
                            {{-- @foreach ($founders as $founder) --}}
                
                
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 mt-1">
                            <div class="our-team" data-toggle="modal" data-id="1" data-target=".bd-example-modal-lg" onclick="ViewDetailsModel(1)">
                              <div class="picture">
                                <img class="img-fluid" src="{{ @$consultant->image_show }}" alt="{{ @$consultant->name }}"/>
                              </div>
                              <div class="team-content">
                                <h3 class="name" style="color: var(--text_color)">{{ @$consultant->name }}</h3>
                                <h6 class="" style="color: var(--text_color)"><i class="fa-solid fa-earth-americas"></i> {{ @$consultant->continents->name }}</h6>
                                <h6 class="" style="color: var(--text_color)"><i class="fa-solid fa-phone-volume"></i> {{ @$consultant->mobile }}</h6>
                                <h6 class="" style="color: var(--text_color)"><i class="fa-solid fa-envelope"></i> {{ @$consultant->email }}</h6>
                              </div>
                              {{-- <ul class="social">
                                <li><a href="" class="fab fa-facebook" aria-hidden="true"></a></li>
                                <li><a href="" class="fab fa-twitter" aria-hidden="true"></a></li>
                                <li><a href="" class="fab fa-google-plus" aria-hidden="true"></a></li>
                                <li><a href="" class="fab fa-linkedin" aria-hidden="true"></a></li>
                              </ul> --}}
                            </div>
                          </div>
                          {{-- @endforeach --}}
                          
                        </div>
                      </div>
                </section>
                
                
              @endif






              </div>
            </div>
            <!-- table-wrapper -->






          </div><!-- br-section-wrapper -->
        </div><!-- br-pagebody -->
        {{-- <footer class="br-footer">
          <div class="footer-left">
            <div class="mg-b-2">Copyright &copy; <?php echo date('Y');?> NavieaSoft. All Rights Reserved.</div>
            <div>Attentively and carefully made by NavieaSoft.</div>
          </div>
        </footer> --}}
    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

    <!--_-- ########### Start Add Category MODAL ############---->


    <!--_-- ########### End Add Category MODAL ############---->

 <!--_-- ########### Start Delete Category MODAL ############---->

  <div id="delete-modal"  class="modal">
    <div class="modal-dialog modal-dialog-top" role="document">
    <div class="modal-content tx-size-sm">
        <div class="modal-body tx-center pd-y-20 pd-x-20">
            <form action="{{ route('user.application_order_delete') }}" method="post">
                @csrf
                {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> --}}
                {{-- <i class="icon icon ion-ios-close-outline tx-60 tx-danger lh-1 mg-t-20 d-inline-block"></i> --}}
                <h4 class="tx-semibold mg-b-20 mt-2 " >Are you sure! you want to delete this?</h4>
                <input type="hidden" value="{{ @$order->id }}" name="order_id" id="order_id">
                <button type="submit"  class="btn btn-danger mr-2 text-white tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium mg-b-20" id="confirm-yes">
                    yes
                </button>
                <button type="button"  class="btn btn-success tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium mg-b-20" id="confirm-no">
                    No
                </button>
            </form>
        </div><!-- modal-body -->
    </div><!-- modal-content -->
    </div><!-- modal-dialog -->
  </div><!-- modal -->

<!--_-- ########### Start Delete Category MODAL ############---->
    <!--_-- ########### End Delete Category MODAL ############---->

    <script src="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/js/owl.carousel.min.js"></script>
<script src="{{ asset('public/frontend') }}/application/modules/frontend/views/themes/default/assets/js/main.js"></script>

@endsection




@section('script')

<script>
  $(document).ready(function() {
  $(".delete-button").click(function() {
      $("#delete-modal").show();
      $("#order_id").val($(this).attr('orderId'))
  
  });
  $("#confirm-no").click(function() {
      $("#delete-modal").hide();
  });
  $("#confirm-yes").click(function() {
      $("#delete-modal").hide();
  });
  });
  
  </script>
  
@endsection
