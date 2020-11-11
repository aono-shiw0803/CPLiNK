@extends('layouts.index')

@section('breadcrumbs')
<ul>
  <li><a href="{{url('/posts')}}">TOP</a></li>
  <li>&nbsp;/&nbsp;</li>
  <li><a href="{{url('/links')}}">発リンク一覧</a></li>
  <li>&nbsp;/&nbsp;</li>
  <li><a href="{{url('links/' .$link->id)}}">発リンク詳細</a></li>
  <li>&nbsp;/&nbsp;</li>
  <li>編集</li>
</ul>
@endsection

@section('content')
<div class="container">
  <div class="head-title">
    <h1>発リンク編集</h1>
  </div>
  <div class="links-must-text">
    <p><span class="must">※</span>は入力必須項目です。</p>
  </div>
  <form method="post" action="{{url('/links', $link->id)}}">
    @csrf
    @method('PATCH')
    <table class="links-create-table">
      <tbody>
        <input type="hidden" name="user_id" value="{{$link->user_id}}">
        <input type="hidden" name="domain_sub" value="{{old('domain_sub', $link->domain_sub)}}">
        <tr>
          <th>ページURL&nbsp;<span class="must">※</span></th>
          <td>
            <input type="url" name="page_url" value="{{old('page_url', $link->page_url)}}">
            @if($errors->has('page_url'))
              <span class="error">{{$errors->first('page_url')}}</span>
            @endif
          </td>
        </tr>
        <tr>
          <th>客先名&nbsp;<span class="must">※</span></th>
          <td>
            <select name="matter">
              @foreach($posts as $post)
                <option value="{{$post->matter}}" @if(old('matter', $link->matter) == $post->matter) selected @endif>{{$post->matter}}</option>
              @endforeach
            </select>
            @if($errors->has('matter'))
              <span class="error">{{$errors->first('matter')}}</span>
            @endif
          </td>
        </tr>
        <tr>
          <th>サービス名&nbsp;<span class="must">※</span></th>
          <td>
            <select name="service">
              @foreach($posts as $post)
                <option value="{{$post->service}}" @if(old('service', $link->service) == $post->service) selected @endif>{{$post->service}}</option>
              @endforeach
            </select>
            @if($errors->has('service'))
              <span class="error">{{$errors->first('service')}}</span>
            @endif
          </td>
        </tr>
        <tr>
          <th>発リンクURL&nbsp;<span class="must">※</span></th>
          <td>
            <input type="text" name="link_url" value="{{old('link_url', $link->link_url)}}">
            @if($errors->has('link_url'))
              <span class="error">{{$errors->first('link_url')}}</span>
            @endif
          </td>
        </tr>
        <tr>
          <th>AT&nbsp;<span class="must">※</span></th>
          <td>
            <input type="text" name="at" value="{{old('at', $link->at)}}">
            @if($errors->has('at'))
              <span class="error">{{$errors->first('at')}}</span>
            @endif
          </td>
        </tr>
        <tr>
          <th>リンク添付日&nbsp;<span class="must">※</span></th>
          <td>
            <input type="date" name="start_date" value="{{old('start_date', $link->start_date)}}">
            @if($errors->has('start_date'))
              <span class="error">{{$errors->first('start_date')}}</span>
            @endif
          </td>
        </tr>
        <tr>
          <th>メモ</th>
          <td>
            <textarea name="content">{{old('content', $link->content)}}</textarea>
            @if($errors->has('content'))
              <span class="error">{{$errors->first('content')}}</span>
            @endif
          </td>
        </tr>
      </tbody>
    </table>
    <div class="bottom-btn">
      <ul>
        <li><a class="back" href="{{url('/links')}}">発リンク一覧へ</a></li>
        <li><input class="new" type="submit" value="更新" onClick="return confirm('変更してもよろしいですか？')"></li>
      </ul>
    </div>
  </form>
</div>
@endsection
