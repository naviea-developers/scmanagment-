<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php echo $__env->make('inc.css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <title>Manage Product</title>
  </head>

  <body>
    <?php echo $__env->make('inc.left', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('inc.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('inc.right', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



    <div class="br-mainpanel">
        <div class="bodyTitle">
            <i class="fa-duotone fa-boxes-packing"></i>
            Manage Product
        </div>

        <div class="card p-4">

            <div class="row">
                <div class="col-md-6">
                    <input type="text" id="search" class="form-control" placeholder="Search">
                </div>
                <div class="col-md-6">
                    <a href="addProduct" class="btn btn-primary btn-sm float-right">
                        <i class="fa-regular fa-plus"></i> Add  </a>
                </div>
            </div>

            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Image Gallery</th>
                    <th scope="col">Price</th>
                    <th scope="col">Brand</th>
                    <th scope="col">Rating</th>
                    <th scope="col">Short Description</th>
                    <th scope="col">Long Description</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Delevery Charge</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $shopping; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i=>$sp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <tr>
                            <td><?php echo e($i+1); ?></td>
                            <td><img src="<?php echo e(asset($sp->img)); ?>" alt="" style="width: 50px;height: 50px;object-fit: cover;"></td>
                            <td><?php echo e($sp->title); ?></td>
                            <td><?php echo e($sp->imgGallery); ?></td>
                            <td><?php echo e($sp->price); ?></td>
                            <td><?php echo e($sp->brand); ?></td>
                            <td><?php echo e($sp->rating); ?></td>
                            <td><?php echo e(substr($sp->shortdesc, 0, 50)); ?>...</td>
                            <td><?php echo substr($sp->longdesc, 0, 50); ?>...</td>
                            <td><?php echo e($sp->qnt); ?></td>
                            <td><?php echo e($sp->delevery_crg); ?></td>
                            <td>
                                <a href="editProduct/<?php echo e($sp->id); ?>">
                                 <i class="fa-duotone fa-pen-to-square"></i>
                                </a>
                                |
                                <a href="deleteProduct/<?php echo e($sp->id); ?>">
                                    <i class="fa-duotone fa-trash-can"></i>
                                 </a>
                            </td>
                        </tr>


                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
              </table>
        </div>
    </div>

    <?php echo $__env->make('inc.js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  </body>
</html>
<?php /**PATH D:\desktop\MTH\NewAdminTamplate\resources\views/backend/shopping/manage.blade.php ENDPATH**/ ?>