

<?php $__env->startSection('breadcrumbs'); ?>
<ul>
  <li><a href="<?php echo e(url('/posts')); ?>">TOP</a></li>
  <li>&nbsp;/&nbsp;</li>
  <li><a href="<?php echo e(url('/links')); ?>">発リンク一覧</a></li>
  <li>&nbsp;/&nbsp;</li>
  <li><a href="<?php echo e(url('links/' .$link->id)); ?>">発リンク詳細</a></li>
  <li>&nbsp;/&nbsp;</li>
  <li>編集</li>
</ul>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
  <div class="head-title">
    <h1>発リンク編集</h1>
  </div>
  <div class="links-must-text">
    <p><span class="must">※</span>は入力必須項目です。</p>
  </div>
  <form method="post" action="<?php echo e(url('/links', $link->id)); ?>">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PATCH'); ?>
    <table class="links-create-table">
      <tbody>
        <input type="hidden" name="user_id" value="<?php echo e($link->user_id); ?>">
        <input type="hidden" name="domain_sub" value="<?php echo e(old('domain_sub', $link->domain_sub)); ?>">
        <tr>
          <th>ページURL&nbsp;<span class="must">※</span></th>
          <td>
            <input type="url" name="page_url" value="<?php echo e(old('page_url', $link->page_url)); ?>">
            <?php if($errors->has('page_url')): ?>
              <span class="error"><?php echo e($errors->first('page_url')); ?></span>
            <?php endif; ?>
          </td>
        </tr>
        <tr>
          <th>客先名&nbsp;<span class="must">※</span></th>
          <td>
            <select name="matter">
              <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($post->matter); ?>" <?php if(old('matter', $link->matter) == $post->matter): ?> selected <?php endif; ?>><?php echo e($post->matter); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <?php if($errors->has('matter')): ?>
              <span class="error"><?php echo e($errors->first('matter')); ?></span>
            <?php endif; ?>
          </td>
        </tr>
        <tr>
          <th>サービス名&nbsp;<span class="must">※</span></th>
          <td>
            <select name="service">
              <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($post->service); ?>" <?php if(old('service', $link->service) == $post->service): ?> selected <?php endif; ?>><?php echo e($post->service); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <?php if($errors->has('service')): ?>
              <span class="error"><?php echo e($errors->first('service')); ?></span>
            <?php endif; ?>
          </td>
        </tr>
        <tr>
          <th>発リンクURL&nbsp;<span class="must">※</span></th>
          <td>
            <input type="text" name="link_url" value="<?php echo e(old('link_url', $link->link_url)); ?>">
            <?php if($errors->has('link_url')): ?>
              <span class="error"><?php echo e($errors->first('link_url')); ?></span>
            <?php endif; ?>
          </td>
        </tr>
        <tr>
          <th>AT&nbsp;<span class="must">※</span></th>
          <td>
            <input type="text" name="at" value="<?php echo e(old('at', $link->at)); ?>">
            <?php if($errors->has('at')): ?>
              <span class="error"><?php echo e($errors->first('at')); ?></span>
            <?php endif; ?>
          </td>
        </tr>
        <tr>
          <th>リンク添付日&nbsp;<span class="must">※</span></th>
          <td>
            <input type="date" name="start_date" value="<?php echo e(old('start_date', $link->start_date)); ?>">
            <?php if($errors->has('start_date')): ?>
              <span class="error"><?php echo e($errors->first('start_date')); ?></span>
            <?php endif; ?>
          </td>
        </tr>
        <tr>
          <th>メモ</th>
          <td>
            <textarea name="content"><?php echo e(old('content', $link->content)); ?></textarea>
            <?php if($errors->has('content')): ?>
              <span class="error"><?php echo e($errors->first('content')); ?></span>
            <?php endif; ?>
          </td>
        </tr>
      </tbody>
    </table>
    <div class="bottom-btn">
      <ul>
        <li><a class="back" href="<?php echo e(url('/links')); ?>">発リンク一覧へ</a></li>
        <li><input class="new" type="submit" value="更新" onClick="return confirm('変更してもよろしいですか？')"></li>
      </ul>
    </div>
  </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\cplink\resources\views/links/edit.blade.php ENDPATH**/ ?>