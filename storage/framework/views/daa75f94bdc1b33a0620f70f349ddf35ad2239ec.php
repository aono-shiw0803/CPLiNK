

<?php $__env->startSection('breadcrumbs'); ?>
<ul>
  <li><a href="<?php echo e(url('/posts')); ?>">TOP</a></li>
  <li>&nbsp;/&nbsp;</li>
  <li><a href="<?php echo e(url('/sites')); ?>">サイト一覧</a></li>
  <li>&nbsp;/&nbsp;</li>
  <li>サイト追加</li>
</ul>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
  <div class="head-title">
    <h1>サイト追加</h1>
  </div>
  <div class="sites-must-text">
    <p><span class="must">※</span>は入力必須項目です。</p>
  </div>
  <form method="post" action="<?php echo e(url('/sites')); ?>">
    <?php echo csrf_field(); ?>
    <table class="sites-create-table">
      <tbody>
        <input type="hidden" name="user_id" value="<?php echo e(Auth::User()->id); ?>">
        <tr>
          <th>サイト名</th>
          <td>
            <input type="text" name="site_name" value="<?php echo e(old('site_name')); ?>">
            <?php if($errors->has('site_name')): ?>
              <span class="error"><?php echo e($errors->first('site_name')); ?></span>
            <?php endif; ?>
          </td>
        </tr>
        <tr>
          <th>ドメイン&nbsp;<span class="must">※</span></th>
          <td>
            <input type="text" name="domain" value="<?php echo e(old('domain')); ?>">
            <?php if($errors->has('domain')): ?>
              <span class="error"><?php echo e($errors->first('domain')); ?></span>
            <?php endif; ?>
          </td>
        </tr>
        <tr>
          <th>ログインURL</th>
          <td>
            <input type="url" name="login_url" value="<?php echo e(old('login_url')); ?>">
            <?php if($errors->has('login_url')): ?>
              <span class="error"><?php echo e($errors->first('login_url')); ?></span>
            <?php endif; ?>
          </td>
        </tr>
        <tr>
          <th>サイトID</th>
          <td>
            <input type="text" name="site_id" value="<?php echo e(old('site_id')); ?>">
            <?php if($errors->has('site_id')): ?>
              <span class="error"><?php echo e($errors->first('site_id')); ?></span>
            <?php endif; ?>
          </td>
        </tr>
        <tr>
          <th>パス</th>
          <td>
            <input type="text" name="password" value="<?php echo e(old('password')); ?>">
            <?php if($errors->has('password')): ?>
              <span class="error"><?php echo e($errors->first('password')); ?></span>
            <?php endif; ?>
          </td>
        </tr>
        <tr>
          <th>IP</th>
          <td>
            <input type="text" name="ip" value="<?php echo e(old('ip')); ?>">
            <?php if($errors->has('ip')): ?>
              <span class="error"><?php echo e($errors->first('ip')); ?></span>
            <?php endif; ?>
          </td>
        </tr>
        <tr>
          <th>Google&nbsp;ID</th>
          <td>
            <input type="text" name="google_id" value="<?php echo e(old('google_id')); ?>">
            <?php if($errors->has('google_id')): ?>
              <span class="error"><?php echo e($errors->first('google_id')); ?></span>
            <?php endif; ?>
          </td>
        </tr>
        <tr>
          <th>Google&nbsp;Pass</th>
          <td>
            <input type="text" name="google_pass" value="<?php echo e(old('google_pass')); ?>">
            <?php if($errors->has('google_pass')): ?>
              <span class="error"><?php echo e($errors->first('google_pass')); ?></span>
            <?php endif; ?>
          </td>
        </tr>
        <tr>
          <th>FTP&nbsp;Host</th>
          <td>
            <input type="text" name="ftp_host" value="<?php echo e(old('ftp_host')); ?>">
            <?php if($errors->has('ftp_host')): ?>
              <span class="error"><?php echo e($errors->first('ftp_host')); ?></span>
            <?php endif; ?>
          </td>
        </tr>
        <tr>
          <th>FTP&nbsp;User</th>
          <td>
            <input type="text" name="ftp_user" value="<?php echo e(old('ftp_user')); ?>">
            <?php if($errors->has('ftp_user')): ?>
              <span class="error"><?php echo e($errors->first('ftp_user')); ?></span>
            <?php endif; ?>
          </td>
        </tr>
        <tr>
          <th>FTP&nbsp;Pass</th>
          <td>
            <input type="text" name="ftp_pass" value="<?php echo e(old('ftp_pass')); ?>">
            <?php if($errors->has('ftp_pass')): ?>
              <span class="error"><?php echo e($errors->first('ftp_pass')); ?></span>
            <?php endif; ?>
          </td>
        </tr>
        <tr>
          <th>ファイルdir</th>
          <td>
            <input type="text" name="file_dir" value="<?php echo e(old('file_dir')); ?>">
            <?php if($errors->has('file_dir')): ?>
              <span class="error"><?php echo e($errors->first('file_dir')); ?></span>
            <?php endif; ?>
          </td>
        </tr>
        <tr>
          <th>サーバー会社</th>
          <td>
            <input type="text" name="company" value="<?php echo e(old('company')); ?>">
            <?php if($errors->has('company')): ?>
              <span class="error"><?php echo e($errors->first('company')); ?></span>
            <?php endif; ?>
          </td>
        </tr>
        <tr>
          <th>メモ</th>
          <td>
            <textarea name="content"><?php echo e(old('content')); ?></textarea>
            <?php if($errors->has('content')): ?>
              <span class="error"><?php echo e($errors->first('content')); ?></span>
            <?php endif; ?>
          </td>
        </tr>
      </tbody>
    </table>
    <div class="bottom-btn">
      <ul>
        <li><a class="back" href="<?php echo e(url('/sites')); ?>">サイト一覧へ</a></li>
        <li><input class="new" type="submit" value="追加" onClick="return confirm('追加してもよろしいですか？')"></li>
      </ul>
    </div>
  </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\cplink\resources\views/sites/create.blade.php ENDPATH**/ ?>