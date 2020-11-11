<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Site;
use App\Link;
use Carbon\Carbon;
use App\Http\Requests\SiteRequest;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
      $key_site_name = $request->input('key_site_name');
      $key_domain = $request->input('key_domain');
      $key_ip = $request->input('key_ip');
      $key_google_id = $request->input('key_google_id');
      $key_company = $request->input('key_company');
      $query = Site::query();
      if(!empty($key_site_name)){
        $query->where('site_name', 'LIKE', "%{$key_site_name}%");
      }
      if(!empty($key_domain)){
        $query->where('domain', 'LIKE', "%{$key_domain}%");
      }
      if(!empty($key_ip)){
        $query->where('ip', 'LIKE', "%{$key_ip}%");
      }
      if(!empty($key_google_id)){
        $query->where('google_id', 'LIKE', "%{$key_google_id}%");
      }
      if(!empty($key_company)){
        $query->where('company', 'LIKE', "%{$key_company}%");
      }
      $sites = $query->get();
      // $sites = Site::orderBy('id', 'asc')->get();
      $today = Carbon::today()->format('Y年m月d日');
      return view('sites.index', ['sites'=>$sites, 'today'=>$today, 'key_site_name'=>$key_site_name, 'key_domain'=>$key_domain, 'key_ip'=>$key_ip, 'key_company'=>$key_company, 'key_google_id'=>$key_google_id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
      $today = Carbon::today()->format('Y年m月d日');
      return view('sites.create', ['today'=>$today]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SiteRequest $request){
      $site = new Site();
      $site->site_name = $request->site_name;
      $site->domain = $request->domain;
      $site->login_url = $request->login_url;
      $site->site_id = $request->site_id;
      $site->password = $request->password;
      $site->ip = $request->ip;
      $site->google_id = $request->google_id;
      $site->google_pass = $request->google_pass;
      $site->ftp_host = $request->ftp_host;
      $site->ftp_user = $request->ftp_user;
      $site->ftp_pass = $request->ftp_pass;
      $site->file_dir = $request->file_dir;
      $site->company = $request->company;
      $site->content = $request->content;
      $site->user_id = $request->user_id;
      $site->save();
      session()->flash('flash_message', 'サイトを追加しました！');
      return redirect('sites/' . $site->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Site $site, Link $link){
      $links = Link::where('domain_sub', $site->domain)->orderBy('id', 'asc')->paginate(10);
      $today = Carbon::today()->format('Y年m月d日');
      return view('sites.show', ['site'=>$site, 'today'=>$today, 'links'=>$links, 'link'=>$link]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Site $site){
      $today = Carbon::today()->format('Y年m月d日');
      return view('sites.edit', ['site'=>$site, 'today'=>$today]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(SiteRequest $request, Site $site){
       $site->site_name = $request->site_name;
       $site->domain = $request->domain;
       $site->login_url = $request->login_url;
       $site->site_id = $request->site_id;
       $site->password = $request->password;
       $site->ip = $request->ip;
       $site->google_id = $request->google_id;
       $site->google_pass = $request->google_pass;
       $site->ftp_host = $request->ftp_host;
       $site->ftp_user = $request->ftp_user;
       $site->ftp_pass = $request->ftp_pass;
       $site->file_dir = $request->file_dir;
       $site->company = $request->company;
       $site->content = $request->content;
       $site->user_id = $request->user_id;
       $site->save();
       session()->flash('flash_message', 'サイト情報を変更しました！');
       return redirect('sites/' . $site->id);
     }

     // public function delete(Request $request){
     //   Site::find($request->id)->delete();
     //   session()->flash('flash_message', '削除が完了しました！');
     //   return redirect('/sites');
     // }
     public function delete_site(Request $request){
       $validatedData = $request->validate([
         'ids' => 'array|required'
       ]);
       Site::destroy($request->ids);
       session()->flash('flash_message', '削除が完了しました！');
       return redirect('/sites');
     }
}
