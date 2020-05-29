@extends('layouts.app')
@section('content')
<diV class="h3">リスト名：{{ $listing->title }}</diV>
<div class="h3">タスク名：{{ $card->title }}</div>
@canany(['update', 'delete'], $card)
<a class="btn btn-success" href="/listing/{{ $listing->id }}/card/{{ $card->id }}/edit">編集する</a>
<a class="btn btn-danger" href="/listing/{{ $listing->id }}/card/{{ $card->id }}/delete">削除する</a>
@endcanany
<a class="btn btn-primary" href="/">TOPに戻る</a>
@endsection