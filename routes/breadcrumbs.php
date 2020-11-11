<?php

// TOP
Breadcrumbs::for('posts', function ($trail) {
  $trail->push('TOP', url('posts'));
});

// TOP > 案件一覧
Breadcrumbs::for('posts-index', function ($trail) {
  $trail->parent('posts');
  $trail->push('案件一覧', url('posts'));
});

// TOP > 案件追加
Breadcrumbs::for('posts-create', function ($trail) {
  $trail->parent('posts');
  $trail->push('案件一覧', url('posts'));
  $trail->push('案件追加', url('posts/create'));
});

// TOP > 案件一覧 > ○○編集
Breadcrumbs::for('posts-edit', function ($trail){
    $trail->parent('posts');
    $trail->push('案件一覧', url('posts'));
    // $trail->push('編集', url('posts/' .$post->id. '/edit'));
});


// TOP > サイト一覧
Breadcrumbs::for('sites-index', function ($trail) {
  $trail->parent('posts');
  $trail->push('サイト一覧', url('sites'));
});

// TOP > サイト一覧 > サイト追加
Breadcrumbs::for('sites-create', function ($trail) {
  $trail->parent('posts');
  $trail->push('サイト一覧', url('sites'));
  $trail->push('サイト追加');
});

// TOP > サイト一覧 > サイト詳細
Breadcrumbs::for('sites-show', function ($trail) {
  $trail->parent('posts');
  $trail->push('サイト一覧', url('sites'));
  $trail->push('サイト詳細');
});

// TOP > サイト一覧 > サイト詳細 > 編集
Breadcrumbs::for('sites-edit', function ($trail) {
  $trail->parent('posts');
  $trail->push('サイト一覧', url('sites'));
  // $trail->push('サイト詳細', url('site/' .$site->id));
  // $trail->push('サイト情報編集', url('sites' .$site->id. '/edit'));
});

// TOP > リンク一覧
Breadcrumbs::for('links-index', function ($trail) {
  $trail->parent('posts');
  $trail->push('発リンク一覧', url('links'));
});

// TOP > リンク一覧 > リンク追加
Breadcrumbs::for('links-create', function ($trail) {
  $trail->parent('posts');
  $trail->push('発リンク一覧', url('links'));
  $trail->push('発リンク追加');
});

// TOP > リンク一覧 > リンク詳細
Breadcrumbs::for('links-show', function ($trail) {
  $trail->parent('posts');
  $trail->push('発リンク一覧', url('links'));
  $trail->push('発リンク詳細');
});
