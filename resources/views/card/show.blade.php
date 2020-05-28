@extends('layouts.app')
@section('content')
<diV>リスト名：{{ $listing->title }}</diV>
<div>タイトル：{{ $card->title }}</div>
@canany(['update', 'delete'], $card)
<button class="btn btn-success"><a href="/listing/{{ $listing->id }}/card/{{ $card->id }}/edit">編集する</a></button>
<button class="btn btn-danger"><a href="/listing/{{ $listing->id }}/card/{{ $card->id }}/delete">削除する</a></button>
@endcanany
@endsection