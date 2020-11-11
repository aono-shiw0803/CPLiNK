<!DOCTYPE html>
<html lang="ja">
<head>
  <meta cherset="utf-8">
  <meta name="viewport" content="width=device-width, inicial-scale=1.0">
  <meta name=”robots” content=”noindex”>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
  <script src="/js/main.js"></script>
  <title>CPLiNK</title>
  <link rel="stylesheet" href="/css/style.css">
</head>

<body>
  <header>
    <div class="header-logo">
      <a href="<?php echo e(url('/posts')); ?>"><img src="/storage/logo.png"></a>
    </div>
    <div class="header-text">
      <ul>
        <li><?php echo e($today); ?></li>
        <li>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                 onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ログアウト</a>
              <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                  <?php echo csrf_field(); ?>
              </form>
          </div>
        </li>
      </ul>
    </div>
  </header>
  <?php if(session('flash_message')): ?>
    <div class="flash">
      <h2><?php echo e(session('flash_message')); ?></h2>
    </div>
  <?php endif; ?>
  <main>
    <div class="left-side">
      <ul>
        <li><i id="close" class="fas fa-times"></i></li>
        <?php if(Auth::User()->id == 1 || Auth::User()->id == 99): ?>
        <li>あなたは管理者です</li>
        <?php endif; ?>
        <li><a href="<?php echo e(url('/posts')); ?>">案件一覧</a></li>
        <li><a href="<?php echo e(url('/sites')); ?>">サイト一覧</a></li>
        <li><a href="<?php echo e(url('/links')); ?>">発リンク一覧</a></li>
        <?php if(Auth::User()->id == 1 || Auth::User()->id == 99): ?>
        <li><a href="<?php echo e(url('/users')); ?>">メンバー一覧</a></li>
        <?php endif; ?>
      </ul>
    </div>
    <div class="right-head">
      <ul>
        <li id="open"><i id="open" class="fas fa-chevron-circle-right"></i></li>
        <li><?php echo $__env->yieldContent('breadcrumbs'); ?></li>
      </ul>
    </div>
    <div class="right-side">
      <?php echo $__env->yieldContent('content'); ?>
    </div>
    <footer>
      <p>©&nbsp;2020&nbsp;Communication&nbsp;Products</p>
    </footer>
  </main>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\cplink\resources\views/layouts/index.blade.php ENDPATH**/ ?>