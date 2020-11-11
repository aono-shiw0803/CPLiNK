

<?php $__env->startSection('breadcrumbs'); ?>
<ul>
  <li><a href="<?php echo e(url('/posts')); ?>">TOP</a></li>
  <li>&nbsp;/&nbsp;</li>
  <li>案件一覧</li>
</ul>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
  <div class="head-title">
    <h1>案件一覧</h1>
  </div>
  <div class="head-btn">
    <ul>
      <li><a class="new" href="<?php echo e(url('/posts/create')); ?>">案件追加</a></li>
    </ul>
  </div>
  <table class="posts-index-table">
    <thead>
      <tr>
        <th>リンク一覧</th>
        <th>ID</th>
        <th>客先名</th>
        <th>サービス名</th>
        <th>企画</th>
        <th>担当営業</th>
        <th>契約開始日</th>
        <th>契約終了日</th>
        <th>編集</th>
        <th>削除</th>
      </tr>
    </thead>
    <tbody>
      <?php $__empty_1 = true; $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
      <tr>
        <td class="text-center"><a class="check" href="http://127.0.0.1:8000/links?page_url=&matter=<?php echo e($post->matter); ?>&service=&link_url=&at=&start_date=">確認</a></td>
        <!-- <td class="text-center"><a class="check" href="http://link.communication-products.jp/links?key_page_url=&matter=<?php echo e($post->matter); ?>&service=&key_link_url=&key_at=&key_start_date=">確認</a></td> -->
        <td class="text-center"><?php echo e($post->id); ?></td>
        <td><?php echo e($post->matter); ?></td>
        <td><?php echo e($post->service); ?></td>
        <td><?php echo e($post->plan); ?></td>
        <td class="text-center"><?php echo e($post->staff); ?></td>
        <td class="text-center"><?php echo e($post->start_date); ?></td>
        <td class="text-center"><?php echo e($post->end_date); ?></td>
        <td class="text-center"><a class="edit" href="<?php echo e(url('posts/' . $post->id . '/edit')); ?>">編集</a></td>
        <td class="text-center">
          <form method="post" action="/posts/delete/<?php echo e($post->id); ?>">
            <?php echo csrf_field(); ?>
            <input class="delete" type="submit" value="削除" onClick="return confirm('本当に削除してもよろしいですか？')">
          </form>
        </td>
      </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
      <tr>
        <td colspan="10" class="null">案件はありません。</td>
      </tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\cplink\resources\views/posts/index.blade.php ENDPATH**/ ?>