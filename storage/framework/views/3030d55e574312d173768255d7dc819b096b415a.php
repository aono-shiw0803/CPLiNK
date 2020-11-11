

<?php $__env->startSection('breadcrumbs'); ?>
<ul>
  <li><a href="<?php echo e(url('/posts')); ?>">TOP</a></li>
  <li>&nbsp;/&nbsp;</li>
  <li><a href="<?php echo e(url('/users')); ?>">メンバー一覧</a></li>
  <li>&nbsp;/&nbsp;</li>
  <li><?php echo e($user->name); ?>の登録情報編集</li>
</ul>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
  <div class="head-title">
    <h1>「<?php echo e($user->name); ?>」の登録情報編集</h1>
  </div>
  <form method="post" action="<?php echo e(url('/users', $user->id)); ?>">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PATCH'); ?>
    <table class="users-edit-table">
      <tbody>
        <tr>
          <th>ID</th>
          <td><?php echo e($user->id); ?><br><span class="caution">IDは変更できません<br>（変更したい場合は開発担当者にお申し付けください）</span></td>
        </tr>
        <tr>
          <th>名前</th>
          <td>
            <input type="text" name="name" value="<?php echo e(old('name', $user->name)); ?>">
            <?php if($errors->has('name')): ?>
              <span class="error"><?php echo e($errors->first('name')); ?></span>
            <?php endif; ?>
          </td>
        </tr>
        <tr>
          <th>ログインID</th>
          <td>
            <input type="text" name="username" value="<?php echo e(old('username', $user->username)); ?>">
            <?php if($errors->has('username')): ?>
              <span class="error"><?php echo e($errors->first('username')); ?></span>
            <?php endif; ?>
          </td>
        </tr>
        <tr>
          <th>メールアドレス</th>
          <td>
            <input type="email" name="email" value="<?php echo e(old('email', $user->email)); ?>">
            <?php if($errors->has('email')): ?>
              <span class="error"><?php echo e($errors->first('email')); ?></span>
            <?php endif; ?>
          </td>
        </tr>
      </tbody>
    </table>
    <div class="bottom-btn">
      <ul>
        <li><a class="back" href="<?php echo e(url('/users')); ?>">メンバー一覧へ</a></li>
        <li><input id="edit" type="submit" value="更新" onClick="return confirm('変更してもよろしいですか？')"></li>
      </ul>
    </div>
  </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\cplink\resources\views/users/edit.blade.php ENDPATH**/ ?>