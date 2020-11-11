@extends('layouts.index')

@section('breadcrumbs')
<ul>
  <li><a href="{{url('/posts')}}">TOP</a></li>
  <li>&nbsp;/&nbsp;</li>
  <li>発リンク一覧</li>
</ul>
@endsection

@section('content')
<div class="container">
  <div class="head-title">
    <h1>発リンク一覧</h1>
  </div>
  <div class="head-btn">
    <ul>
      <li><a class="new" href="{{url('/links/create')}}">発リンク追加</a></li>
    </ul>
  </div>
  <div class="search">
    <form method="get" action="">
      <ul class="search-lists">
        <li class="search-right">
          <label>－ページURL－</label><br>
          <input type="text" name="key_page_url" value="{{$key_page_url}}">
        </li>
        <li>
          <label>－客先名－</label>
          <select name="matter" class="select">
            <option value=""></option>
            @foreach($linkMatters as $linkMatter)
              <option value="{{$linkMatter}}" @if(isset($parameter['matter']) && $parameter['matter'] == $linkMatter) selected @endif>{{$linkMatter}}</option>
            @endforeach
          </select>
        </li>
        <li>
          <label>－サービス名－</label>
          <select name="service" class="select">
            <option value=""></option>
            @foreach($linkServices as $linkService)
              <option value="{{$linkService}}" @if(isset($parameter['service']) && $parameter['service'] == $linkService) selected @endif>{{$linkService}}</option>
            @endforeach
          </select>
        </li>
        <li class="search-right">
          <label>－発リンクURL－</label><br>
          <input type="text" name="key_link_url" value="{{$key_link_url}}">
        </li>
        <li class="search-right">
          <label>－AT－</label><br>
          <input type="text" name="key_at" value="{{$key_at}}">
        </li>
        <li class="start_date">
          <label>－リンク添付日－</label><br>
          <input type="date" name="key_start_date" value="{{$key_start_date}}">
        </li>
      </ul>
      <div class="search-btn">
        <ul>
          <li><input type="submit" value="検索"></li>
          <li><a href="{{url('/links')}}">リセット</a></li>
        </ul>
      </div>
    </form>
  </div>
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
      @if($links->count())
      @forelse($links as $link)
      <tr>
        <td class="text-center"><a class="show" href="{{url('/links', $link->id)}}">{{$link->id}}</a></td>
        <td><a class="link" target="_blank" href="{{$link->page_url}}"><p class="abridgement">{{$link->page_url}}</p></a></td>
        <td>{{$link->matter}}</td>
        <td>{{$link->service}}</td>
        <td><a class="link" target="_blank" href="{{$link->link_url}}"><p class="abridgement">{{$link->link_url}}</p></a></td>
        <td>{{$link->at}}</td>
        <td class="text-center">{{$link->start_date}}</td>
        <td class="text-center"><a class="edit" href="{{url('links/' . $link->id .'/edit')}}">編集</a></td>
        <td class="text-center">
          <form method="post" action="/links/delete/{{$link->id}}">
            @csrf
            <input class="delete" type="submit" value="削除" onClick="return confirm('本当に削除してもよろしいですか？')">
          </form>
        </td>
      </tr>
      @empty
      <tr>
        <td colspan="9" class="null">発リンクはありません。</td>
      </tr>
      @endforelse
      @else
      <tr>
        <td colspan="9" class="null">見つかりませんでした。</td>
      </tr>
      @endif
    </tbody>
  </table>
</div>
@endsection
