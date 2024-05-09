<?php $__env->startSection('title', 'Manage Profile'); ?>
<link rel="stylesheet" href="<?php echo e(asset('frontend/css/singleTrnsportView.css')); ?>">
<?php $__env->startSection('content'); ?>


<div class="bodyContaint">
    <div class="container">

        <div class="row">
            <div class="col-12 navigation">
                <ul>
                    <li><a href="">Package</a></li>
                    <li>/</li>
                    <?php $__currentLoopData = $package; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pack): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($pack->title); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <div class="col-md-6">
                <div class="imageSecton">
                    <?php $__currentLoopData = $package; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pack): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <img src="<?php echo e(asset($pack->img)); ?>" alt="">
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="data">
                    <?php $__currentLoopData = $package; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pack): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <ul>
                            <li> <b>Package Name : </b> <?php echo e($pack->title); ?> </li>
                            <li> <b>Location : </b> <?php echo e($pack->location); ?> </li>
                            <li> <b>Duration : </b> <?php echo e($pack->duration); ?> </li>
                            <li> <b>Event Date : </b> <?php echo e($pack->date); ?> </li>
                            <li> <b>Package Price : </b> <?php echo e($pack->price); ?> </li>
                        </ul>
                            <br>
                        <form action="/cart" style="margin-top: -30px;margin-bottom: -10px;" method="post">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="type" value="package">
                            <input type="hidden" name="id" value="<?php echo e($pack->id); ?>">
                            <center>
                                <button class="btn btn-info btn-sm">Book Now</button>
                            </center>
                        </form>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-12">
                <?php $__currentLoopData = $package; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pack): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <p><?php echo $pack->details; ?></p>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\desktop\MTH\NewAdminTamplate\resources\views/frontend/booking/packageVIew.blade.php ENDPATH**/ ?>