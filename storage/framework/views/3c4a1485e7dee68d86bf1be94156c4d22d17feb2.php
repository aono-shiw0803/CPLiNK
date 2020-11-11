

<?php $__env->startSection('breadcrumbs'); ?>
<ul>
  <li><a href="<?php echo e(url('/posts')); ?>">TOP</a></li>
  <li>&nbsp;/&nbsp;</li>
  <li>サイト一覧</li>
</ul>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
  <div class="head-title">
    <h1>サイト一覧</h1>
  </div>
  <div class="head-btn">
    <ul>
      <li><a class="new" href="<?php echo e(url('/sites/create')); ?>">サイト追加</a></li>
    </ul>
  </div>
  <div class="search">
    <form method="get" action="">
      <ul class="search-lists">
        <li class="search-right">
          <label>－サイト名－</label><br>
          <input type="text" name="key_site_name" value="<?php echo e($key_site_name); ?>">
        </li>
        <li class="search-right">
          <label>－ドメイン－</label><br>
          <input type="text" name="key_domain" value="<?php echo e($key_domain); ?>">
        </li>
        <li class="search-right">
          <label>－IP－</label><br>
          <input type="text" name="key_ip" value="<?php echo e($key_ip); ?>">
        </li>
        <li class="search-right">
          <label>－Google&nbsp;ID－</label><br>
          <input type="text" name="key_google_id" value="<?php echo e($key_google_id); ?>">
        </li>
        <li>
          <label>－サーバー会社－</label><br>
          <input type="text" name="key_company" value="<?php echo e($key_company); ?>">
        </li>
      </ul>
      <div class="search-btn">
        <ul>
          <li><input type="submit" value="検索"></li>
          <li><a href="<?php echo e(url('/sites')); ?>">リセット</a></li>
        </ul>
      </div>
    </form>
  </div>
  <form method="post" action="delete_site">
    <?php echo csrf_field(); ?>
    <table class="sites-index-table">
      <thead>
        <tr>
          <th>ID</th>
          <th>サイト名</th>
          <th>ドメイン</th>
          <th>ログインURL</th>
          <th>サイトID</th>
          <th>パス</th>
          <th>IP</th>
          <th>Google&nbsp;ID</th>
          <th>サーバー会社</th>
          <th>編集</th>
          <th>削除</th>
        </tr>
      </thead>
      <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $sites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $site): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <tr>
          <td class="text-center"><a class="check" href="<?php echo e(url('sites/' . $site->id)); ?>"><?php echo e($site->id); ?></a></td>
          <td><input class="border" type="text" value="<?php echo e($site->site_name); ?>"></td>
          <td><input class="border" type="text" value="<?php echo e($site->domain); ?>"></td>
          <td><a class="link" target="_blank" href="<?php echo e($site->login_url); ?>"><p class="abridgement"><?php echo e($site->login_url); ?></p></a></td>
          <td><input class="border" type="text" value="<?php echo e($site->site_id); ?>"></td>
          <td><input class="border" type="text" value="<?php echo e($site->password); ?>"></td>
          <td><input class="border" type="text" value="<?php echo e($site->ip); ?>"></td>
          <td><input class="border" type="text" value="<?php echo e($site->google_id); ?>"></td>
          <td><input class="border" type="text" value="<?php echo e($site->company); ?>"></td>
          <td class="text-center"><a class="edit" href="<?php echo e(url('sites/' . $site->id . '/edit')); ?>">編集</a></td>
          <td class="text-center">
            <input type="checkbox" name="ids[]" value="<?php echo e($site->id); ?>">
          </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <tr>
          <td colspan="11" class="null">サイトはありません。</td>
        </tr>
        <?php endif; ?>
      </tbody>
    </table>
    <div class="delete-btns">
      <input type="submit" value="&#xf2ed" class="fas" onClick="return confirm('本当に削除してもよろしいですか？')">
    </div>
  </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\cplink\resources\views/sites/index.blade.php ENDPATH**/ ?>