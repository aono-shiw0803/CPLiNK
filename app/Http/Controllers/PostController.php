<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Carbon\Carbon;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
      $posts = Post::orderBy('start_date', 'asc')->get();
      $today = Carbon::today()->format('Y年m月d日');
      return view('posts.index', ['posts'=>$posts, 'today'=>$today]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
      $today = Carbon::today()->format('Y年m月d日');
      return view('posts.create', ['today'=>$today]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request){
      $post = new Post();
      $post->matter = $request->matter;
      $post->service = $request->service;
      $post->plan = $request->plan;
      $post->staff = $request->staff;
      $post->start_date = $request->start_date;
      $post->end_date = $request->end_date;
      $post->user_id = $request->user_id;
      $post->content = $request->content;
      $post->save();
      session()->flash('flash_message', '案件を追加しました！');
      return redirect('/posts');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post){
      $today = Carbon::today()->format('Y年m月d日');
      return view('posts.edit', ['post'=>$post, 'today'=>$today]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post){
      $post->matter = $request->matter;
      $post->service = $request->service;
      $post->plan = $request->plan;
      $post->staff = $request->staff;
      $post->start_date = $request->start_date;
      $post->end_date = $request->end_date;
      $post->user_id = $request->user_id;
      $post->content = $request->content;
      $post->save();
      session()->flash('flash_message', '案件情報を変更しました！');
      return redirect('/posts');
    }

    public function delete(Request $request){
      Post::find($request->id)->delete();
      session()->flash('flash_message', '削除が完了しました！');
      return redirect('/posts');
    }

}
