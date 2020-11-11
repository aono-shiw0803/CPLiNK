@extends('layouts.index')

@section('breadcrumbs')
<ul>
  <li><a href="{{url('/posts')}}">TOP</a></li>
  <li>&nbsp;/&nbsp;</li>
  <li><a href="{{url('/posts')}}">案件一覧</a></li>
  <li>&nbsp;/&nbsp;</li>
  <li>{{$post->matter}}編集</li>
</ul>
@endsection

@section('content')
<div class="container">
  <div class="head-title">
    <h1>{{$post->matter}}編集</h1>
  </div>
  <div class="posts-must-text">
    <p><span class="must">※</span>は入力必須項目です。</p>
  </div>
  <form method="post" action="{{url('/posts', $post->id)}}">
    @csrf
    @method('PATCH')
    <table class="posts-edit-table">
      <tbody>
        <input type="hidden" name="user_id" value="{{old('user_id', $post->user_id)}}">
        <tr>
          <th>客先名&nbsp;<span class="must">※</span></th>
          <td>
            <input type="text" name="matter" value="{{old('matter', $post->matter)}}">
            @if($errors->has('matter'))
              <span class="error">{{$errors->first('matter')}}</span>
            @endif
          </td>
        </tr>
        <tr>
          <th>サービ名&nbsp;<span class="must">※</span></th>
          <td>
            <input type="text" name="service" value="{{old('service', $post->service)}}">
            @if($errors->has('service'))
              <span class="error">{{$errors->first('service')}}</span>
            @endif
          </td>
        </tr>
        <tr>
          <th>企画&nbsp;<span class="must">※</span></th>
          <td>
            <input type="text" name="plan" value="{{old('plan', $post->plan)}}">
            @if($errors->has('plan'))
              <span class="error">{{$errors->first('plan')}}</span>
            @endif
          </td>
        </tr>
        <tr>
          <th>担当営業&nbsp;<span class="must">※</span></th>
          <td>
            <input type="text" name="staff" value="{{old('staff', $post->staff)}}">
            @if($errors->has('staff'))
              <span class="error">{{$errors->first('staff')}}</span>
            @endif
          </td>
        </tr>
        <tr>
          <th>契約開始日&nbsp;<span class="must">※</span></th>
          <td>
            <input type="date" name="start_date" value="{{old('start_date', $post->start_date)}}">
            @if($errors->has('start_date'))
              <span class="error">{{$errors->first('start_date')}}</span>
            @endif
          </td>
        </tr>
        <tr>
          <th>契約終了日&nbsp;<span class="must">※</span></th>
          <td>
            <input type="date" name="end_date" value="{{old('end_date', $post->end_date)}}">
            @if($errors->has('end_date'))
              <span class="error">{{$errors->first('end_date')}}</span>
            @endif
          </td>
        </tr>
      </tbody>
    </table>
    <div class="bottom-btn">
      <ul>
        <li><a class="back" href="{{url('/posts')}}">案件一覧へ</a></li>
        <li><input id="edit" type="submit" value="変更" onClick="return confirm('変更してもよろしいですか？')"></li>
      </ul>
    </div>
  </form>
</div>
@endsection
