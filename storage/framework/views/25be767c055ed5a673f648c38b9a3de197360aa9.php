

<?php $__env->startSection('breadcrumbs'); ?>
<ul>
  <li><a href="<?php echo e(url('/posts')); ?>">TOP</a></li>
  <li>&nbsp;/&nbsp;</li>
  <li><a href="<?php echo e(url('/sites')); ?>">サイト一覧</a></li>
  <li>&nbsp;/&nbsp;</li>
  <li>「<?php echo e($site->site_name); ?>」詳細</li>
</ul>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
  <div class="head-title">
    <h1>「<?php echo e($site->site_name); ?>」詳細</h1>
  </div>
  <div class="head-btn">
    <ul>
      <li><a class="new" href="<?php echo e(url('/sites/create')); ?>">サイト追加</a></li>
      <li><a id="edit" href="<?php echo e(url('sites/' . $site->id . '/edit')); ?>">編集</a></li>
      <li>
        <form method="post" action="/sites/delete/<?php echo e($site->id); ?>">
          <?php echo csrf_field(); ?>
          <input id="delete" type="submit" value="削除" onClick="return confirm('本当に削除してもよろしいですか？')">
        </form>
      </li>
    </ul>
  </div>
  <table class="sites-show-table">
    <tbody>
      <tr>
        <th>ID</th>
        <td><?php echo e($site->id); ?></td>
      </tr>
      <tr>
        <th>サイト名</th>
        <td><?php echo e($site->site_name); ?></td>
      </tr>
      <tr>
        <th>ドメイン</th>
        <td><?php echo e($site->domain); ?></td>
      </tr>
      <tr>
        <th>ログインURL</th>
        <td><a class="link" target="_blank" href="<?php echo e($site->login_url); ?>"><?php echo e($site->login_url); ?></a></td>
      </tr>
      <tr>
        <th>サイトID</th>
        <td><?php echo e($site->site_id); ?></td>
      </tr>
      <tr>
        <th>パス</th>
        <td><?php echo e($site->password); ?></td>
      </tr>
      <tr>
        <th>IP</th>
        <td><?php echo e($site->ip); ?></td>
      </tr>
      <tr>
        <th>Google&nbsp;ID</th>
        <td><?php echo e($site->google_id); ?></td>
      </tr>
      <tr>
        <th>Google&nbsp;Pass</th>
        <td><?php echo e($site->google_pass); ?></td>
      </tr>
      <tr>
        <th>FTP&nbsp;Host</th>
        <td><?php echo e($site->ftp_host); ?></td>
      </tr>
      <tr>
        <th>FTP&nbsp;User</th>
        <td><?php echo e($site->ftp_user); ?></td>
      </tr>
      <tr>
        <th>FTP&nbsp;Pass</th>
        <td><?php echo e($site->ftp_pass); ?></td>
      </tr>
      <tr>
        <th>ファイルdir</th>
        <td><?php echo e($site->file_dir); ?></td>
      </tr>
      <tr>
        <th>サーバー会社</th>
        <td><?php echo e($site->company); ?></td>
      </tr>
      <tr>
        <th>登録者</th>
        <td><?php echo e($site->user->name); ?></td>
      </tr>
      <tr>
        <th>メモ</th>
        <td class="textarea"><?php echo e($site->content); ?></td>
      </tr>
    </tbody>
  </table>
  <div class="link-condition">
    <h2>発リンク状況</h2>
  </div>
  <table class="sites-link-table">
    <thead>
      <tr>
        <th>ID</th>
        <th>ページURL</th>
        <th>客先名</th>
        <th>サービス名</th>
        <th>発リンクURL</th>
        <th>AT</th>
        <th>リンク添付日</th>
        <th>編集</th>
        <th>削除</th>
      </tr>
    </thead>
    <tbody>
      <?php $__empty_1 = true; $__currentLoopData = $links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
      <tr>
        <td class="text-center"><a class="show" href="<?php echo e(url('/links', $link->id)); ?>"><?php echo e($link->id); ?></a></td>
        <td><a class="link" target="_blank" href="<?php echo e($link->page_url); ?>"><p class="abridgement"><?php echo e($link->page_url); ?></p></a></td>
        <td><?php echo e($link->matter); ?></td>
        <td><?php echo e($link->service); ?></td>
        <td><a class="link" target="_blank" href="<?php echo e($link->link_url); ?>"><p class="abridgement"><?php echo e($link->link_url); ?></p></a></td>
        <td><?php echo e($link->at); ?></td>
        <td class="text-center"><?php echo e($link->start_date); ?></td>
        <td class="text-center"><a class="edit" href="<?php echo e(url('links/' . $link->id .'/edit')); ?>">編集</a></td>
        <td class="text-center">
          <form method="post" action="/links/delete/<?php echo e($link->id); ?>">
            <?php echo csrf_field(); ?>
            <input class="delete" type="submit" value="削除" onClick="return confirm('本当に削除してもよろしいですか？')">
          </form>
        </td>
      </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
      <tr>
        <td colspan="9" class="null">該当する発リンクはありません。</td>
      </tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\cplink\resources\views/sites/show.blade.php ENDPATH**/ ?>