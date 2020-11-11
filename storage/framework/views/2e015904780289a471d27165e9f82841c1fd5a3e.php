

<?php $__env->startSection('breadcrumbs'); ?>
<ul>
  <li><a href="<?php echo e(url('/posts')); ?>">TOP</a></li>
  <li>&nbsp;/&nbsp;</li>
  <li>メンバー一覧</li>
</ul>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
  <div class="head-title">
    <h1>メンバー一覧</h1>
  </div>
  <div class="head-btn">
    <ul>
      <?php if(Auth::User()->id == 1 || Auth::User()->id == 99): ?>
      <li><a class="new" href="<?php echo e(route('register')); ?>">新規メンバー追加</a></li>
      <?php endif; ?>
    </ul>
  </div>
  <table class="users-index-table">
    <thead>
      <tr>
        <th>ID</th>
        <th>名前</th>
        <th>ログインID</th>
        <th>メールアドレス</th>
        <th>参加日時</th>
        <th>最終更新日時</th>
        <th>編集</th>
        <th>削除</th>
      </tr>
    </thead>
    <tbody>
      <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
      <tr>
        <td class="text-center"><?php echo e($user->id); ?></td>
        <td class="text-center"><?php echo e($user->name); ?></td>
        <td><?php echo e($user->username); ?></td>
        <td><?php echo e($user->email); ?></td>
        <td class="text-center"><?php echo e($user->created_at); ?></td>
        <td class="text-center"><?php echo e($user->updated_at); ?></td>
        <td class="text-center"><a class="edit" href="<?php echo e(url('users/' . $user->id . '/edit')); ?>">編集</a></td>
        <td class="text-center">
          <form method="post" action="/users/delete/<?php echo e($user->id); ?>">
            <?php echo csrf_field(); ?>
            <input class="delete" type="submit" value="削除" onClick="return confirm('本当に削除してもよろしいですか？※関連する全てのデータも削除されます。')">
          </form>
        </td>
      </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
      <tr>
        <td colspan="8">メンバーはいません。</td>
      </tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\cplink\resources\views/users/index.blade.php ENDPATH**/ ?>