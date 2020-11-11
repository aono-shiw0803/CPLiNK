<!DOCTYPE html>
<html lang="ja">
<head>
  <meta cherset="utf-8">
  <meta name="viewport" content="width=device-width, inicial-scale=1.0">
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
  <meta name=”robots” content=”noindex”>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  <script src="/js/main.js"></script>
  <title>CPLiNK</title>
  <link rel="stylesheet" href="/css/style.css">
</head>
<body>
  <div class="auth-main">
    <div class="auth-bg">
    </div>
    <div class="auth-sub">
      <div class="auth-logo">
        <img src="/storage/logo.png">
      </div>
      <div class="auth-text">
        <?php echo $__env->yieldContent('content'); ?>
      </div>
    </div>
  </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\cplink\resources\views/layouts/app.blade.php ENDPATH**/ ?>