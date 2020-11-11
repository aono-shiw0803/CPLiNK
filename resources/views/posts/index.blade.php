@extends('layouts.index')

@section('breadcrumbs')
<ul>
  <li><a href="{{url('/posts')}}">TOP</a></li>
  <li>&nbsp;/&nbsp;</li>
  <li>案件一覧</li>
</ul>
@endsection

@section('content')
<div class="container">
  <div class="head-title">
    <h1>案件一覧</h1>
  </div>
  <div class="head-btn">
    <ul>
      <li><a class="new" href="{{url('/posts/create')}}">案件追加</a></li>
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
      @forelse($posts as $post)
      <tr>
        <td class="text-center"><a class="check" href="http://127.0.0.1:8000/links?page_url=&matter={{$post->matter}}&service=&link_url=&at=&start_date=">確認</a></td>
        <!-- <td class="text-center"><a class="check" href="http://link.communication-products.jp/links?key_page_url=&matter={{$post->matter}}&service=&key_link_url=&key_at=&key_start_date=">確認</a></td> -->
        <td class="text-center">{{$post->id}}</td>
        <td>{{$post->matter}}</td>
        <td>{{$post->service}}</td>
        <td>{{$post->plan}}</td>
        <td class="text-center">{{$post->staff}}</td>
        <td class="text-center">{{$post->start_date}}</td>
        <td class="text-center">{{$post->end_date}}</td>
        <td class="text-center"><a class="edit" href="{{url('posts/' . $post->id . '/edit')}}">編集</a></td>
        <td class="text-center">
          <form method="post" action="/posts/delete/{{$post->id}}">
            @csrf
            <input class="delete" type="submit" value="削除" onClick="return confirm('本当に削除してもよろしいですか？')">
          </form>
        </td>
      </tr>
      @empty
      <tr>
        <td colspan="10" class="null">案件はありません。</td>
      </tr>
      @endforelse
    </tbody>
  </table>
</div>
@endsection
