

<?php $__env->startSection('breadcrumbs'); ?>
<ul>
  <li><a href="<?php echo e(url('/posts')); ?>">TOP</a></li>
  <li>&nbsp;/&nbsp;</li>
  <li><a href="<?php echo e(url('/links')); ?>">発リンク一覧</a></li>
  <li>&nbsp;/&nbsp;</li>
  <li>発リンク詳細</li>
</ul>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
  <div class="head-title">
    <h1>発リンク詳細</h1>
  </div>
  <div class="head-btn">
    <ul>
      <li><a class="new" href="<?php echo e(url('/links/create')); ?>">発リンク追加</a></li>
      <li><a id="edit" href="<?php echo e(url('links/' . $link->id . '/edit')); ?>">編集</a></li>
      <li>
        <form method="post" action="/links/delete/<?php echo e($link->id); ?>">
          <?php echo csrf_field(); ?>
          <input id="delete" type="submit" value="削除" onClick="return confirm('本当に削除してもよろしいですか？')">
        </form>
      </li>
    </ul>
  </div>
  <table class="links-show-table">
    <tbody>
      <tr>
        <th>ID</th>
        <td><?php echo e($link->id); ?></td>
      </tr>
      <tr>
        <th>ページURL</th>
        <td><?php echo e($link->page_url); ?></td>
      </tr>
      <tr>
        <th>客先名</th>
        <td><?php echo e($link->matter); ?></td>
      </tr>
      <tr>
        <th>サービス名</th>
        <td><?php echo e($link->service); ?></td>
      </tr>
      <tr>
        <th>発リンクURL</th>
        <td><?php echo e($link->link_url); ?></td>
      </tr>
      <tr>
        <th>AT</th>
        <td><?php echo e($link->at); ?></td>
      </tr>
      <tr>
        <th>リンク添付日</th>
        <td><?php echo e($link->start_date); ?></td>
      </tr>
      <tr>
        <th>メモ</th>
        <td class="textarea"><?php echo e($link->content); ?></td>
      </tr>
      <tr>
        <th>登録者</th>
        <td><?php echo e($link->user->name); ?></td>
      </tr>
    </tbody>
  </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\cplink\resources\views/links/show.blade.php ENDPATH**/ ?>