@extends('layouts.app')

@section('content')
<form method="post" action="{{ route('login') }}">
  @csrf
  <ul>
    <li>
      <label for="username">ログインID</label>
      <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
      @error('username')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </li>
    <li>
      <label for="password">パスワード</label>
      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
      @error('password')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </li>
    <li>
      <button type="submit" class="btn btn-primary">ログイン</button>
    </li>
  </ul>
</form>
@endsection
