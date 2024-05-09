<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $__env->make('frontend.inc.sitename', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.2.1/css/all.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/style.css')); ?>">
</head>
<body>
    <section class="py-2 bg_image">
        <div class="container-fluid">
            <?php echo $__env->make('frontend.inc.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>

        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">


                <?php $__currentLoopData = $slider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i=>$slid): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <div class="carousel-item
                <?php if($i == '0'): ?>
                    active
                <?php endif; ?>
                " data-bs-interval="10000">
                    <img src="<?php echo e(asset($slid->img)); ?>" class="d-block w-100" alt="...">
                  </div>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>





            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>

    </section>

    <section class="section_round">
        <div class="container">
            <div class="row" style="margin-top: -18px;">
            <div class="col-2 s_round">
                <input type="text" class="form-control left" placeholder="From" />
            </div>
            <div class="col-2">
                <input type="text" class="form-control" placeholder="To" />
            </div>
            <div class="col-2">
                <input type="date" class="form-control" placeholder="JOURNEY DATE"/>
            </div>
            <div class="col-2">
                <input type="text" class="form-control" placeholder="Person" />
            </div>
            <div class="col-2 s_round">
                <input type="text" class="form-control right" placeholder="Search"/>
            </div>
        </div>
    </div>
    </section>

    <section class="py-5" id="FareStarts">
        <div class="container">
            <div class="row">
            <div class="col">
                <h3 class="p_heading">Fare Starts- Travel & Tour</h3>
            </div>
            </div>
            <div class="row mt-3">

                <?php $__currentLoopData = $package; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-4">
                        <a href="viewPackage/<?php echo e($pk->id); ?>">
                            <div class="card card-body border-0">
                                <img  src="<?php echo e(asset($pk->img)); ?>"class="card-img-top tour_img" />
                                <div class="row">
                                    <div class="col-lg-7">
                                    <p class="tour_font">
                                        <?php echo e($pk->title); ?>

                                        <br>
                                        <small style="font-size: 12px;margin-top: -5px;float: left;"> <i class="fa-duotone fa-location-dot"></i> <?php echo e($pk->location); ?></small>
                                    </p>
                                    </div>
                                </div>
                                <form action="cart" style="margin-top: -30px;margin-bottom: -10px;" method="post">
                                    <?php echo csrf_field(); ?>
                                    
                                    <input type="hidden" name="type" value="package">
                                    <input type="hidden" name="id" value="<?php echo e($pk->id); ?>">
                                    <input type="hidden" name="price" value="<?php echo e($pk->price); ?>">
                                    <button class="btn btn-success btn_size btn-sm">Book Now</button>
                                </form>
                            </div>
                        </a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <center>
                    <br>
                    <a href="/viewAllPackage" class="btn btn-primary mb-5">See more</a>
                </center>

            </div>
        </div>
    </section>

      <section class="py-4 airSection">
        <div class="container">
          <div class="row">
            <div class="col">
              <h3 class="p_heading">Airway Booking</h3>
              <div class="btn_size2">

                <?php $__currentLoopData = $airCity; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $airC): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="" class="btn text-light btn-p"><?php echo e($airC->to); ?></a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
              <hr />
            </div>
          </div>
          <div class="row mt-3 row_width">
            <?php $__currentLoopData = $air; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-3">
                <a href="viewTransport/air/<?php echo e($ar->id); ?>">
                <div class="card">
                    <img src="<?php echo e($ar->img); ?>"class="card-img-top tour_img"/>
                    <div class="card-body a_size">
                    <a href=""><?php echo e($ar->name); ?> - <?php echo e($ar->model); ?></a>
                    </div>
                    <p class="paragrap_height" style="text-transform: capitalize;font-weight:bold;"><?php echo e($ar->class); ?></p>
                    <p class="paragrap_height" style="text-transform: capitalize;"><?php echo e($ar->form); ?> to <?php echo e($ar->to); ?></p>
                </div>
            </a>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <center>
                <br>
                <a href="/booking/air" class="btn btn-primary">See more</a>
            </center>

          </div>
        </div>
      </section>

      <section class="py-4 hotelSection">
        <div class="container">
          <div class="row">
            <div class="col">
              <h3 class="p_heading">Hotel Booking</h3>
              <div class="btn_size2">


                <?php $__currentLoopData = $hotelCity; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $ct = explode(" ",$hc->address)
                    ?>

                    <a href="" class="btn text-light btn-p"><?php echo e($ct[0]); ?></a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

              </div>
              <hr />
            </div>
          </div>
          <div class="row mt-3 row_width">

                <?php $__currentLoopData = $hotel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $htl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-3">
                    <div class="card">
                        <a href="hotelFullView/<?php echo e($htl->id); ?>">
                            <?php $__currentLoopData = $hotelPic; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <?php if($hg->galleryId == $htl->gallery_id): ?>
                                    <img src="<?php echo e($hg->src); ?>"class="card-img-top tour_img"/>
                                <?php endif; ?>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <div class="card-body a_size">
                            <a href=""><?php echo e($htl->name); ?></a>
                        </div>
                        <p class="paragrap_height">
                            <?php echo e($htl->address); ?>

                        </p>
                        </a>
                    </div>
                  </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                <center>
                    <br>
                    <a href="/viewAllHotel" class="btn btn-primary">See more</a>
                </center>

          </div>
        </div>
      </section>

      <section class="py-4 busSection">
        <div class="container">
          <div class="row">
            <div class="col">
              <h3 class="p_heading">Bus Booking</h3>


              <div class="btn_size2">

                <?php $__currentLoopData = $busCity; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="" class="btn text-light btn-p"><?php echo e($bc->form); ?></a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


              </div>
              <hr />
            </div>
          </div>
          <div class="row mt-3 row_width">

            <?php $__currentLoopData = $bus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <div class="col-lg-3">
                <a href="viewTransport/bus/<?php echo e($bs->id); ?>">
                <div class="card">
                  <img src="<?php echo e($bs->img); ?>"class="card-img-top tour_img"/>
                  <div class="card-body a_size">
                    <a href=""><?php echo e($bs->name); ?> - <?php echo e($bs->model); ?></a>
                  </div>
                  <p class="paragrap_height" style="font-weight: bold;text-transform:capitalize;"><?php echo e($bs->coach); ?></p>
                  <p class="paragrap_height"><?php echo e($bs->form); ?>  - <?php echo e($bs->to); ?> </p>
                </div>
                </a>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


            <center>
                <br>
                <a href="/booking/bus" class="btn btn-primary">See more</a>
            </center>

          </div>
        </div>
      </section>

      <section class="py-4 busSection">
        <div class="container">
          <div class="row">
            <div class="col">
              <h3 class="p_heading">Car Booking</h3>


              <div class="btn_size2">

                <?php $__currentLoopData = $carCity; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="" class="btn text-light btn-p"><?php echo e($bc->to); ?></a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


              </div>
              <hr />
            </div>
          </div>
          <div class="row mt-3 row_width">

            <?php $__currentLoopData = $car; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <div class="col-lg-3">
                <a href="viewTransport/car/<?php echo e($cr->id); ?>">
                    <div class="card">
                    <img src="<?php echo e($cr->img); ?>"class="card-img-top tour_img"/>
                    <div class="card-body a_size">
                        <a href=""><?php echo e($cr->name); ?> - <?php echo e($cr->model); ?></a>
                    </div>
                    <p class="paragrap_height" style="font-weight: bold;text-transform:capitalize;"><?php echo e($cr->type); ?></p>
                    <p class="paragrap_height"><?php echo e($cr->form); ?>  - <?php echo e($cr->to); ?> </p>
                    </div>
                </a>
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


            <center>
                <br>
                <a href="/booking/car" class="btn btn-primary">See more</a>
            </center>

          </div>
        </div>
      </section>

      <section class="py-4 serviceSection">
        <div class="container">
          <div class="row">
            <div class="col">
              <h3 class="p_heading">All Service for you</h3>
              <div class="btn_size2">

                <?php $__currentLoopData = $AllServiceCity; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $citys): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="" class="btn text-light btn-p">
                        <?php echo e($citys->to); ?>

                    </a>
                    <a href="" class="btn text-light btn-p">
                        <?php echo e($citys->form); ?>

                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



              </div>
              <hr />
            </div>
          </div>
          <div class="row mt-3 row_width">

            <?php $__currentLoopData = $AllServiceAir; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allAir): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <div class="col-lg-3">
                    <a href="/viewTransport/air/<?php echo e($allAir->id); ?>">
                    <div class="card">
                      <img src="<?php echo e(asset($allAir->img)); ?>"class="card-img-top tour_img"/>
                      <div class="card-body a_size">
                        <a href=""><?php echo e($allAir->name); ?> - <?php echo e($allAir->model); ?></a>
                      </div>
                      <p class="paragrap_height">
                        <?php echo e($allAir->form); ?> - to - <?php echo e($allAir->to); ?>

                      </p>
                    </div>
                    </a>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php $__currentLoopData = $AllServiceBus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allAir): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <div class="col-lg-3">
                <a href="/viewTransport/bus/<?php echo e($allAir->id); ?>">
                <div class="card">
                  <img src="<?php echo e(asset($allAir->img)); ?>"class="card-img-top tour_img"/>
                  <div class="card-body a_size">
                    <a href=""><?php echo e($allAir->name); ?> - <?php echo e($allAir->model); ?></a>
                  </div>
                  <p class="paragrap_height">
                    <?php echo e($allAir->form); ?> - to - <?php echo e($allAir->to); ?>

                  </p>
                </div>
                </a>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php $__currentLoopData = $AllServiceCar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allAir): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-3">
                <a href="/viewTransport/car/<?php echo e($allAir->id); ?>">
                <div class="card">
                  <img src="<?php echo e(asset($allAir->img)); ?>"class="card-img-top tour_img"/>
                  <div class="card-body a_size">
                    <a href=""><?php echo e($allAir->name); ?> - <?php echo e($allAir->model); ?></a>
                  </div>
                  <p class="paragrap_height">
                    <?php echo e($allAir->form); ?> - to - <?php echo e($allAir->to); ?>

                  </p>
                </div>
                </a>
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php $__currentLoopData = $AllServiceHotel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allAir): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-3">
                <a href="/viewTransport/hotel/<?php echo e($allAir->id); ?>">
                <div class="card">
                  <img src="<?php echo e(asset($AllServiceHotelImg->src)); ?>"class="card-img-top tour_img"/>
                  <div class="card-body a_size">
                    <a href=""><?php echo e($allAir->name); ?></a>
                  </div>
                  <p class="paragrap_height">
                    <?php echo e($allAir->address); ?>

                  </p>
                </div>
                </a>
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




          </div>
        </div>
      </section>
      <section class="py-5 nextTrip">
        <div class="container">
          <h3 class="p_heading">Idea for next trip</h3>
          <div class="row row_left">
            <div class="col-md-8">

                <?php $__currentLoopData = $Sbanner; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <div class="card">
                    <img src="<?php echo e(asset($sb->img)); ?>"class="card-img-top tour_img img_cl_1"/ style="object-fit: cover">
                    <div class="card-body a_size">
                     <h4> <a href="" style="font-size: unset;margin-left: -20px;"><?php echo $sb->name; ?></a></h4>
                    </div>
                    <?php echo substr($sb->description, 0, 200); ?>...
                  </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
            <div class="col-md-4">

                <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bns): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="box_sizing mt-1">
                    <div class="first_col" style="overflow: hidden">
                        <img src="<?php echo e(asset($bns->img)); ?>" style="width: 100%;border-radius: 10px;" class="img_col">
                    </div>
                    <div class="second_col">
                      <div class="databox">
                            <h4>
                                <b>
                                    <a href=""><?php echo e($bns->name); ?></a>
                                </b>
                            </h4>
                            <p><?php echo substr($bns->description, 0, 50); ?>...</p>
                      </div>
                    </div>
                  </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



            </div>
            </div>
          </div>
        </div>
      </section>

      <section class="py-5 bannerSection">
        <div class="container bg_imgs">
            <div class="">
              <h3 class="text-center add_center">Get a Big discount</h3>
            </div>
        </div>
      </section>

      <section class="helpSection py-3" style="padding-bottom: 50px !important;">
        <div class="container">
          <div class="row mt-4">
            <h3 class="help_heading">Use Coupon for Surprising discount </h3>
          </div>
          <div class="row mt-4">

            <?php $__currentLoopData = $coupon; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cpn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <div class="col-md-4">
                <div class="card card-body help_move">
                    <h3 class="help_head" style="margin: 0px"><?php echo e($cpn->title); ?></h3>
                    <h1><b><?php echo e($cpn->amount); ?>


                        <?php if($cpn->type == 'persent'): ?>
                            %
                        <?php else: ?>
                        ريال
                        <?php endif; ?>

                    </b></h1>
                    <p>Use "<b><?php echo e($cpn->code); ?></b>" this Coupon</p>
                </div>
            </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



          </div>
        </div>
      </section>


      <section class="py-3 shopingSection" style="padding-bottom: 70px !important;">
        <div class="container">
          <div class="row mt-4">

              <div class="col">
                <h3 class="p_heading">Shopping</h3>
                <div class="btn_size2">

                    <?php $__currentLoopData = $shoppingTag; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $spi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="" class="btn text-light btn-p"><?php echo e($spi->category); ?></a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
                <hr />
              </div>
          </div>

          <div class="row mt-4">

            <?php $__currentLoopData = $shopping; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $spp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

              <div class="col-md-3 shoppingDiv" onclick="location.href='single-product/<?php echo e($spp->id); ?>'" style="cursor: pointer">
                <div class="card card-body card-img-top">
                  <div class="shop_bg_image">
                      <img src="<?php echo e(asset($spp->img)); ?>" alt="" style="padding-left: 24px;height: 150px;width: 100%;object-fit: contain;padding: 0;">
                      <div class="productDetails">
                        <h6> <?php echo e($spp->title); ?> </h6>
                        <span> <?php echo e($spp->price); ?> ريال</span>
                      </div>
                      <a href="" class="btn btn-primary ">Buy Now</a>
                      <a href="" class="btn btn-primary ">Add to Cart</a>
                  </div>
                </div>
              </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

              <center>
                <br>
                <a href="/Shop-Category" class="btn btn-primary">
                    See All Category
                </a>
              </center>

          </div>
        </div>
      </section>

      <section class="partner" style="padding: 50px !important;">
        <div class="container">
          <div class="row partner_row">
            <h3 class="partner_head">Brand</h3>
          </div>
          <div class="row mt-4 customer-logos">
            <?php $__currentLoopData = $brand; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bnd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="col-md-2">
                <div class="card card-body card_radious card_sizes" data-toggle="tooltip" data-placement="top" title="<?php echo e($bnd->name); ?>">
                  <center>
                    <img src="<?php echo e($bnd->img); ?>" alt="" class="images_height">
                  </center>
                </div>
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        </div>
      </section>


    <?php echo $__env->make('frontend.inc.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>

    <script src="frontend/js/script.js"></script>
</body>
</html>
<?php /**PATH D:\desktop\MTH\NewAdminTamplate\resources\views/frontend/welcome.blade.php ENDPATH**/ ?>