<?php $__env->startSection('title', 'Manage Profile'); ?>
<link rel="stylesheet" href="<?php echo e(asset('frontend/css/hotel.css')); ?>">

<?php $__env->startSection('content'); ?>

<div class="bodyContaint" style="margin-bottom:100vh;">
<section></section>
<section class="container" style="padding: 40px 0px;padding-left: 0px;">
    <div class="row mb-5 pb-5">
    <div class="col-3 filter-text" style="max-width: 242px;">
    <div class="side-bg">
        <p> <?php echo e($number_of_hotel->count()); ?> Property found</p>
    </div>
    <div class="filter-head">
        <h6>Filters By</h6>
    </div>
    <div class="filter-border">
    <h6 class="my-md-2">Budget (per night)</h6>
    <div class="form-check form-switch">
        <input class="form-check-input " type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
    </div>
    <div>

        <?php $__currentLoopData = $price_range; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i=>$pr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault<?php echo e($i); ?>">
                <label class="form-check-label chk-txt" for="flexCheckDefault<?php echo e($i); ?>">
                    <?php echo e($pr->price); ?>

                </label>
            </div>


        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


    </div>
    </div>
    <div class="filter-border">
        <h6 class="my-md-3 ">Popular Filters</h6>

        <?php $__currentLoopData = $hotel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i=>$htl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <?php if(!empty($htl->type)): ?>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault<?php echo e($i+99); ?>">
                    <label class="form-check-label chk-txt" for="flexCheckDefault<?php echo e($i+99); ?>">
                        <?php echo e($htl->type); ?>

                    </label>
                </div>
            <?php endif; ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <div class="filter-border">
        <h6 class="my-md-3">Neighbourhood</h6>

        <?php $__currentLoopData = $hotelCity; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i=>$HC): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $ct = explode(" ",$HC->address)
            ?>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault<?php echo e($i+552); ?>">
                <label class="form-check-label chk-txt" for="flexCheckDefault<?php echo e($i+552); ?>">
                    <?php echo e($ct[0]); ?>

                </label>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>
    <button type="button" class="filter-btn m-4">Reset Filter</button>
    </div>

    <div class="col-xl-7 col card mx-3 shadow-sm" style="height: 70px; padding-top: 10px;">
    <ul class="body-head">
        <li class="head-text">Cheapest <br</li> <p class="sub-text">Tk 15,252 </p>
        <li class="head-text">Best <br</li> <p class="sub-text">Tk 15,252</p>
        <li class="head-text">Premium <br</li> <p class="sub-text">Tk 15,252</p>
        <li class="fa-regular fa-bars-sort pt-3 pr-3" style="font-size: 12px;"><span class="icon-text pl-2">OtherSort</span></li>
    </ul>


        <?php $__currentLoopData = $hotel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $htl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="hotel-card mb-4">

                <div class="img-col">

                    <?php $__currentLoopData = $hotelPic; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <?php if($hg->galleryId == $htl->gallery_id): ?>
                            <img class="hotel-img" src="<?php echo e($hg->src); ?>"
                            alt="Hotel">
                        <?php endif; ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                </div>
                <div class="left-col">
                    <h4><?php echo e($htl->name); ?></h4>
                    <div class="none">
                    <a href="#"><?php echo e($htl->address); ?></a>
                    </div>
                    <p class="mt-2">Room Capacity : <b><?php echo e($htl->room_capacity); ?></b> </p>
                    <p class="mt-2">  Room  : <b><?php echo e($htl->num_of_room); ?></b> </p>
                    <h6><?php echo e($htl->price); ?> ريال </h6>
                    <p class="none" style="line-height: 10px;">
                        You can cancel later, so lock in this great price today.
                    </p>
                    <br>
                </div>
                <div class="right-col">
                    <div class="flex mt-5">
                        <div>
                            <h5>Review score</h5>
                            <p>67 Reviews</p>
                        </div>
                        <span class="rating-point text-center">
                            <?php echo e(rand(1, 5) / 2); ?>

                        </span>
                    </div>
                    <div class="close">

                        <div class="flex">
                            <h4 class="price"> </h4>
                        </div>
                        <a href="/hotelFullView/<?php echo e($htl->id); ?>" class="btn btn-primary mt-0" style="color:#fff">View Details</a>
                    </div>

                </div>
                <div>

                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



        <button type="button" class="show-btn">Show More Results</button>
        </div>
        <div class="col-2 border right-bar"
            style="height: 90px; border-radius: 5px;margin-top:-30px;">

            <div class="help-card px-2">
            <div class="help-border">
                <h4>Need Help?</h4>
            </div>
            <div class="mt-3">
                <p>
                +8801636312933
                </p>
                <p>
                contact@navieasoft.com
                </p>
            </div>
            </div>

    </div>
    </div>
</section>


</div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\desktop\MTH\NewAdminTamplate\resources\views/frontend/booking/viewhotel.blade.php ENDPATH**/ ?>