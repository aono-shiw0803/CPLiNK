@extends('layouts.app')

@section('content')
<form method="post" action="{{ route('register') }}">
  @csrf
  <ul>
    <li>
      <label for="name">名前</label><br>
      <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
      @error('name')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </li>
    <li>
      <label for="username">ログインID</label><br>
      <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
      @error('username')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </li>
    <li>
      <label for="email">メールアドレス</label><br>
      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
      @error('email')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </li>
    <li>
      <label for="password">パスワード</label><br>
      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
      @error('password')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </li>
    <li>
      <label for="password-confirm" class="col-md-4 col-form-label text-md-right">パスワード（確認）</label><br>
      <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
    </li>
    <li>
      <button type="submit" class="btn btn-primary">登録</button><br>
      <a href="{{url('/users')}}">メンバー一覧に戻る</a>
    </li>
  </ul>
</form>
@endsection
