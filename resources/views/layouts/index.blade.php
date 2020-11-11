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
      <a href="{{url('/posts')}}"><img src="/storage/logo.png"></a>
    </div>
    <div class="header-text">
      <ul>
        <li>{{$today}}</li>
        <li>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('logout') }}"
                 onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ログアウト</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
          </div>
        </li>
      </ul>
    </div>
  </header>
  @if(session('flash_message'))
    <div class="flash">
      <h2>{{session('flash_message')}}</h2>
    </div>
  @endif
  <main>
    <div class="left-side">
      <ul>
        <li><i id="close" class="fas fa-times"></i></li>
        @if(Auth::User()->id == 1 || Auth::User()->id == 99)
        <li>あなたは管理者です</li>
        @endif
        <li><a href="{{url('/posts')}}">案件一覧</a></li>
        <li><a href="{{url('/sites')}}">サイト一覧</a></li>
        <li><a href="{{url('/links')}}">発リンク一覧</a></li>
        @if(Auth::User()->id == 1 || Auth::User()->id == 99)
        <li><a href="{{url('/users')}}">メンバー一覧</a></li>
        @endif
      </ul>
    </div>
    <div class="right-head">
      <ul>
        <li id="open"><i id="open" class="fas fa-chevron-circle-right"></i></li>
        <li>@yield('breadcrumbs')</li>
      </ul>
    </div>
    <div class="right-side">
      @yield('content')
    </div>
    <footer>
      <p>©&nbsp;2020&nbsp;Communication&nbsp;Products</p>
    </footer>
  </main>
</body>

</html>
