<?php if(count($breadcrumbs)): ?>
  <ul class="breadcrumb">
    <?php $__currentLoopData = $breadcrumbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $breadcrumb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php if($breadcrumb->url && !$loop->last): ?>
        <li class="breadcrumb-item"><a href="<?php echo e($breadcrumb->url); ?>"><?php echo e($breadcrumb->title); ?></a></li>
        <li>&nbsp;/&nbsp;</li>
      <?php else: ?>
        <li class="breadcrumb-item active"><?php echo e($breadcrumb->title); ?></li>
      <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </ul>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\cplink\resources\views/layouts/breadcrumbs.blade.php ENDPATH**/ ?>