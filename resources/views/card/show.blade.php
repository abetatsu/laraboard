@extends('layouts.app')
@section('content')
<diV class="h3">リスト名：{{ $listing->title }}</diV>
<div class="h3">タスク名：{{ $card->title }}</div>
<div class="h3">概要：{{ $card->content }}</div>
<div class="h3">投稿日時：{{ $card->created_at }}</div>
@canany(['update', 'delete'], $listing)
<a class="btn btn-success" href="/listing/{{ $listing->id }}/card/{{ $card->id }}/edit">編集する</a>
<a class="btn btn-danger" href="/listing/{{ $listing->id }}/card/{{ $card->id }}/delete">削除する</a>
@endcanany
<a class="btn btn-primary" href="/">TOPに戻る</a>
@endsection