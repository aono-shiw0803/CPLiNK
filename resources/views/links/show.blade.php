@extends('layouts.index')

@section('breadcrumbs')
<ul>
  <li><a href="{{url('/posts')}}">TOP</a></li>
  <li>&nbsp;/&nbsp;</li>
  <li><a href="{{url('/links')}}">発リンク一覧</a></li>
  <li>&nbsp;/&nbsp;</li>
  <li>発リンク詳細</li>
</ul>
@endsection

@section('content')
<div class="container">
  <div class="head-title">
    <h1>発リンク詳細</h1>
  </div>
  <div class="head-btn">
    <ul>
      <li><a class="new" href="{{url('/links/create')}}">発リンク追加</a></li>
      <li><a id="edit" href="{{url('links/' . $link->id . '/edit')}}">編集</a></li>
      <li>
        <form method="post" action="/links/delete/{{$link->id}}">
          @csrf
          <input id="delete" type="submit" value="削除" onClick="return confirm('本当に削除してもよろしいですか？')">
        </form>
      </li>
    </ul>
  </div>
  <table class="links-show-table">
    <tbody>
      <tr>
        <th>ID</th>
        <td>{{$link->id}}</td>
      </tr>
      <tr>
        <th>ページURL</th>
        <td>{{$link->page_url}}</td>
      </tr>
      <tr>
        <th>客先名</th>
        <td>{{$link->matter}}</td>
      </tr>
      <tr>
        <th>サービス名</th>
        <td>{{$link->service}}</td>
      </tr>
      <tr>
        <th>発リンクURL</th>
        <td>{{$link->link_url}}</td>
      </tr>
      <tr>
        <th>AT</th>
        <td>{{$link->at}}</td>
      </tr>
      <tr>
        <th>リンク添付日</th>
        <td>{{$link->start_date}}</td>
      </tr>
      <tr>
        <th>メモ</th>
        <td class="textarea">{{$link->content}}</td>
      </tr>
      <tr>
        <th>登録者</th>
        <td>{{$link->user->name}}</td>
      </tr>
    </tbody>
  </table>
</div>
@endsection
