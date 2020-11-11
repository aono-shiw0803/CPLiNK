<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Link;
use App\Post;
use Carbon\Carbon;
use App\Http\Requests\LinkRequest;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Link $link){
      $linkMatters = Link::GroupBy('matter')->pluck('matter');
      $linkServices = Link::GroupBy('service')->pluck('service');
      // $start_date = Link::pluck('start_date', 'id');
      $today = Carbon::today()->format('Y年m月d日');
      $link = Link::find($link->id);
      $key_start_date = $request->input('key_start_date');
      $key_page_url = $request->input('key_page_url');
      $key_link_url = $request->input('key_link_url');
      $key_at = $request->input('key_at');
      $query = Link::query();
      $parameter = $request->all();
      if(!empty($key_page_url)){
        $query->where('page_url', 'LIKE', "%{$key_page_url}%");
      }
      if(!empty($key_link_url)){
        $query->where('link_url', 'LIKE', "%{$key_link_url}%");
      }
      if(!empty($key_at)){
        $query->where('at', 'LIKE', "%{$key_at}%");
      }
      if(!empty($key_start_date)){
        $query->where('start_date', 'LIKE', "%{$key_start_date}%");
      }
      // $links = Link::$query()->when($parameter['matter'] ?? null, function($query, $matter)
      $links = $query->when($parameter['matter'] ?? null, function($query, $matter){
        $query->where('matter', $matter);
      })
      ->when($parameter['service'] ?? null, function($query, $service){
        $query->where('service', $service);
      })
      // ->when($parameter['start_date'] ?? null, function($query, $start_date){
      //   $query->where('start_date', $start_date);
      // })
      ->orderBy('id', 'asc')->get();
      return view('links.index', ['links'=>$links, 'today'=>$today, 'parameter'=>$parameter, 'linkMatters'=>$linkMatters, 'linkServices'=>$linkServices, 'key_start_date'=>$key_start_date, 'key_page_url'=>$key_page_url, 'key_link_url'=>$key_link_url, 'key_at'=>$key_at]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Link $link){
      $posts = Post::all();
      $today = Carbon::today()->format('Y年m月d日');
      return view('links.create', ['today'=>$today, 'posts'=>$posts, 'link'=>$link]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LinkRequest $request){
      $link = new Link();
      $link->page_url = $request->page_url;
      $link->matter = $request->matter;
      $link->service = $request->service;
      $link->link_url = $request->link_url;
      $link->at = $request->at;
      $link->start_date = $request->start_date;
      $link->user_id = $request->user_id;
      $link->post_id = $request->post_id;
      $link->content = $request->content;
      $link->domain_sub = $request->domain_sub;
      $link->save();
      session()->flash('flash_message', '発リンクを追加しました！');
      return redirect('links/' . $link->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Link $link){
      $today = Carbon::today()->format('Y年m月d日');
      return view('links.show', ['link'=>$link, 'today'=>$today]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Link $link){
      $posts = Post::all();
      $today = Carbon::today()->format('Y年m月d日');
      return view('links.edit', ['link'=>$link, 'today'=>$today, 'posts'=>$posts]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LinkRequest $request, Link $link){
      $link->page_url = $request->page_url;
      $link->matter = $request->matter;
      $link->service = $request->service;
      $link->link_url = $request->link_url;
      $link->at = $request->at;
      $link->start_date = $request->start_date;
      $link->user_id = $request->user_id;
      $link->post_id = $request->post_id;
      $link->content = $request->content;
      $link->domain_sub = $request->domain_sub;
      $link->save();
      session()->flash('flash_message', '発リンク情報を追加しました！');
      return redirect('links/' . $link->id);
    }

    // public function delete(Request $request){
    //   Link::find($request->id)->delete();
    //   session()->flash('flash_message', '削除が完了しました！');
    //   return redirect('/links');
    // }
    public function delete_link(Request $request){
      $validatedData = $request->validate([
        'ids' => 'array|required'
      ]);
      Link::destroy($request->ids);
      session()->flash('flash_message', '削除が完了しました！');
      return redirect('/links');
    }
}
