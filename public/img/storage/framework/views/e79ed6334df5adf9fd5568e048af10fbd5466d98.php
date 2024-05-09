<?php $__env->startSection('title', 'Manage Profile'); ?>
<link rel="stylesheet" href="<?php echo e(asset('frontend/css/singleTrnsportView.css')); ?>">
<?php $__env->startSection('content'); ?>


<div class="bodyContaint">
    <div class="container">

        <div class="row">
            <div class="col-12 navigation">
                <ul>
                    <li><a href="<?php echo e(URL::to('/booking')); ?>/<?php echo e($cat); ?>"><?php echo e($cat); ?></a></li>
                    <li>/</li>
                    <?php $__currentLoopData = $transport; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trns): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($trns->name); ?> - <?php echo e($trns->model); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <div class="col-md-6">
                <div class="imageSecton">
                    <?php $__currentLoopData = $transport; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trns): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <img src="<?php echo e(asset($trns->img)); ?>" alt="">
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="data">
                    <?php $__currentLoopData = $transport; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trns): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <ul>
                            <li><?php echo e($trns->name); ?> - <?php echo e($trns->model); ?></li>

                            <?php if(isset($trns->class) OR isset($trns->type) ): ?>
                                <li><b>Type/Class :</b>
                                <?php if(isset($trns->class)): ?>
                                    <?php echo e($trns->class); ?>

                                <?php endif; ?>
                                <?php if(isset($trns->type)): ?>
                                    <?php echo e($trns->type); ?>

                                <?php endif; ?>
                            <?php endif; ?>


                            </li>
                            <li><b>Location :</b> <?php echo e($trns->form); ?> - <?php echo e($trns->to); ?></li>

                            <li><b>Date :</b> <?php echo e($trns->date); ?></li>

                            <?php if(isset($trns->coach)): ?>
                                <li><b>Coach :</b> <?php echo e($trns->coach); ?></li>
                            <?php endif; ?>

                            <?php if(isset($trns->start_at)): ?>
                                <li><b>Time :</b> <?php echo e($trns->start_at); ?> - <?php echo e($trns->end_at); ?></li>
                                <li><b>Cost :</b> <?php echo e($trns->price); ?></li>
                            <?php endif; ?>


                        </ul>
                        <center>
                            <button class="btn btn-info btn-sm">Book Now</button>
                        </center>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-12">
                <?php $__currentLoopData = $transport; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trns): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <p><?php echo $trns->description; ?></p>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\desktop\MTH\NewAdminTamplate\resources\views/frontend/booking/singleView.blade.php ENDPATH**/ ?>