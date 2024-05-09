<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php echo $__env->make('inc.css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <title>Manage Package</title>
  </head>

  <body>
    <?php echo $__env->make('inc.left', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('inc.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('inc.right', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



    <div class="br-mainpanel">
        <div class="bodyTitle">
            <i class="fa-duotone fa-box-open-full"></i>
            Manage Package
        </div>

        <div class="card p-4">

            <div class="row">
                <div class="col-md-6">
                    <input type="text" id="search" class="form-control" placeholder="Search">
                </div>
                <div class="col-md-6">
                    <a href="addPackage" class="btn btn-primary btn-sm float-right">
                        <i class="fa-regular fa-plus"></i> Add  </a>
                </div>
            </div>

            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Banner</th>
                    <th scope="col">Package Name</th>
                    <th scope="col">Package Details</th>
                    <th scope="col">Location</th>
                    <th scope="col">duration</th>
                    <th scope="col">date</th>
                    <th scope="col">price</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $package; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i=>$pk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($i+1); ?></td>
                            <td><img src="<?php echo e($pk->img); ?>" style="width: 50px;height: 50px;object-fit: cover;" alt=""></td>
                            <td><?php echo e($pk->title); ?></td>
                            <td><?php echo substr($pk->details, 0, 30); ?></td>
                            <td><?php echo e($pk->location); ?></td>
                            <td><?php echo e($pk->duration); ?></td>
                            <td><?php echo e($pk->date); ?></td>
                            <td><?php echo e($pk->price); ?></td>
                            <td>
                                <a href="editPackage/<?php echo e($pk->id); ?>"><i class="fa-duotone fa-pen-to-square"></i></a> |
                                <a href="deletePackage/<?php echo e($pk->id); ?>"><i class="fa-duotone fa-trash-can"></i></a>
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
<?php /**PATH D:\desktop\MTH\NewAdminTamplate\resources\views/backend/package/manage.blade.php ENDPATH**/ ?>