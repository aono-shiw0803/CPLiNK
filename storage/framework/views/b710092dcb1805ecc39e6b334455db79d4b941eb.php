

<?php $__env->startSection('breadcrumbs'); ?>
<ul>
  <li><a href="<?php echo e(url('/posts')); ?>">TOP</a></li>
  <li>&nbsp;/&nbsp;</li>
  <li><a href="<?php echo e(url('/posts')); ?>">案件一覧</a></li>
  <li>&nbsp;/&nbsp;</li>
  <li>案件追加</li>
</ul>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
  <div class="head-title">
    <h1>案件追加</h1>
  </div>
  <div class="posts-must-text">
    <p><span class="must">※</span>は入力必須項目です。</p>
  </div>
  <form method="post" action="<?php echo e(url('/posts')); ?>">
    <?php echo csrf_field(); ?>
    <table class="posts-create-table">
      <tbody>
        <input type="hidden" name="user_id" value="<?php echo e(Auth::User()->id); ?>">
        <tr>
          <th>客先名&nbsp;<span class="must">※</span></th>
          <td>
            <input type="text" name="matter" value="<?php echo e(old('matter')); ?>">
            <?php if($errors->has('matter')): ?>
              <span class="error"><?php echo e($errors->first('matter')); ?></span>
            <?php endif; ?>
          </td>
        </tr>
        <tr>
          <th>サービ名&nbsp;<span class="must">※</span></th>
          <td>
            <input type="text" name="service" value="<?php echo e(old('service')); ?>">
            <?php if($errors->has('service')): ?>
              <span class="error"><?php echo e($errors->first('service')); ?></span>
            <?php endif; ?>
          </td>
        </tr>
        <tr>
          <th>企画&nbsp;<span class="must">※</span></th>
          <td>
            <input type="text" name="plan" value="<?php echo e(old('plan')); ?>">
            <?php if($errors->has('plan')): ?>
              <span class="error"><?php echo e($errors->first('plan')); ?></span>
            <?php endif; ?>
          </td>
        </tr>
        <tr>
          <th>担当営業&nbsp;<span class="must">※</span></th>
          <td>
            <input type="text" name="staff" value="<?php echo e(old('staff')); ?>">
            <?php if($errors->has('staff')): ?>
              <span class="error"><?php echo e($errors->first('staff')); ?></span>
            <?php endif; ?>
          </td>
        </tr>
        <tr>
          <th>契約開始日&nbsp;<span class="must">※</span></th>
          <td>
            <input type="date" name="start_date" value="<?php echo e(old('start_date')); ?>">
            <?php if($errors->has('start_date')): ?>
              <span class="error"><?php echo e($errors->first('start_date')); ?></span>
            <?php endif; ?>
          </td>
        </tr>
        <tr>
          <th>契約終了日&nbsp;<span class="must">※</span></th>
          <td>
            <input type="date" name="end_date" value="<?php echo e(old('end_date')); ?>">
            <?php if($errors->has('end_date')): ?>
              <span class="error"><?php echo e($errors->first('end_date')); ?></span>
            <?php endif; ?>
          </td>
        </tr>
      </tbody>
    </table>
    <div class="bottom-btn">
      <ul>
        <li><a class="back" href="<?php echo e(url('/posts')); ?>">案件一覧へ</a></li>
        <li><input class="new" type="submit" value="追加" onClick="return confirm('追加してもよろしいですか？')"></li>
      </ul>
    </div>
  </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\cplink\resources\views/posts/create.blade.php ENDPATH**/ ?>