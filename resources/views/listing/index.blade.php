@extends('layouts.app')
@section('content')

<form action="/" type="get">
     <input type="text" name="keyword">
     <button class="btn btn-primary">リスト名を検索</button>
</form>


@if(Session::has('flash_message'))
<div class="alert alert-success">
{{ session('flash_message') }}
</div>
@endif

<div class="row">
@foreach($listings as $listing)
<div class="col-lg-3 col-md-6 py-3">
<div class="card">
  <div class="card-header">
  リスト名：{{ $listing->title }}
  @canany(['update', 'delete'],$listing)
  <a class="btn btn btn-info" href="{{ url('/listingsedit', $listing->id) }}">編集</a>
  <a class="btn btn-danger" href="{{ url('/listingsdelete', $listing->id) }}">削除</a>
  @endcanany
  <br>
  投稿者：{{ $listing->user->name }}
  <br>
  投稿日時：{{ $listing->created_at->format('Y.m.d') }}
  </div>
  <ul class="list-group list-group-flush">
     @foreach($listing->cards as $card)
     <li class="list-group-item"><a class="text-dark" href="/listing/{{ $listing->id }}/card/{{ $card->id }}"><p class="h4">{{ $card->title }}</p></a>
     @if($card->users()->where('user_id', Auth::id())->exists())
    <div class="col-md-3">
      <form action="{{ route('cardUnfavorites', $card) }}" method="POST">
          @csrf
          <input type="submit" value="&#xf164;" class="fas btn btn-success">
      </form>
    </div>
    @else
    <div class="col-md-3">
      <form action="{{ route('cardFavorites', $card) }}" method="POST">
          @csrf
          <input type="submit" value="&#xf164;" class="fas btn btn-primary">
      </form>
    </div>
    @endif
    <div class="row justify-content-center">
      <p>いいね数：{{ $card->users()->count() }}</p>
    </div>
    </li>
     @endforeach
     @canany(['update', 'delete'],$listing)
     <li class="list-group-item"><a class="text-success" href="/listing/{{ $listing->user_id }}/{{ $listing->id }}/card/new">タスクを追加</a></li>
     @endcanany
  </ul>
</div>
</div>
@endforeach
</div>
@endsection