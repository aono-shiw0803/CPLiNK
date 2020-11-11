

<?php $__env->startSection('breadcrumbs'); ?>
<ul>
  <li><a href="<?php echo e(url('/posts')); ?>">TOP</a></li>
  <li>&nbsp;/&nbsp;</li>
  <li>発リンク一覧</li>
</ul>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
  <div class="head-title">
    <h1>発リンク一覧</h1>
  </div>
  <div class="head-btn">
    <ul>
      <li><a class="new" href="<?php echo e(url('/links/create')); ?>">発リンク追加</a></li>
    </ul>
  </div>
  <div class="search">
    <form method="get" action="">
      <ul class="search-lists">
        <li class="search-right">
          <label>－ページURL－</label><br>
          <input type="text" name="key_page_url" value="<?php echo e($key_page_url); ?>">
        </li>
        <li>
          <label>－客先名－</label>
          <select name="matter" class="select">
            <option value=""></option>
            <?php $__currentLoopData = $linkMatters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $linkMatter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($linkMatter); ?>" <?php if(isset($parameter['matter']) && $parameter['matter'] == $linkMatter): ?> selected <?php endif; ?>><?php echo e($linkMatter); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
        </li>
        <li>
          <label>－サービス名－</label>
          <select name="service" class="select">
            <option value=""></option>
            <?php $__currentLoopData = $linkServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $linkService): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($linkService); ?>" <?php if(isset($parameter['service']) && $parameter['service'] == $linkService): ?> selected <?php endif; ?>><?php echo e($linkService); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
        </li>
        <li class="search-right">
          <label>－発リンクURL－</label><br>
          <input type="text" name="key_link_url" value="<?php echo e($key_link_url); ?>">
        </li>
        <li class="search-right">
          <label>－AT－</label><br>
          <input type="text" name="key_at" value="<?php echo e($key_at); ?>">
        </li>
        <li class="start_date">
          <label>－リンク添付日－</label><br>
          <input type="date" name="key_start_date" value="<?php echo e($key_start_date); ?>">
        </li>
      </ul>
      <div class="search-btn">
        <ul>
          <li><input type="submit" value="検索"></li>
          <li><a href="<?php echo e(url('/links')); ?>">リセット</a></li>
        </ul>
      </div>
    </form>
  </div>
  <form method="post" action="delete_link">
    <?php echo csrf_field(); ?>
    <table class="links-index-table">
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
        <?php if($links->count()): ?>
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
            <input type="checkbox" name="ids[]" value="<?php echo e($link->id); ?>">
          </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <tr>
          <td colspan="9" class="null">発リンクはありません。</td>
        </tr>
        <?php endif; ?>
        <?php else: ?>
        <tr>
          <td colspan="9" class="null">見つかりませんでした。</td>
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

<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\cplink\resources\views/links/index.blade.php ENDPATH**/ ?>