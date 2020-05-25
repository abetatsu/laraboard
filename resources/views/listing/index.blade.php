@extends('layouts.app')
@section('content')

<form action="/" type="get">
     <input type="text" name="keyword">
     <button class="btn btn-primary">検索</button>
</form>

@if(Session::has('flash_message'))
<div class="alert alert-success">
{{ session('flash_message') }}
</div>
@endif

<div class="row">
@foreach($listings as $listing)
<div class="col-sm-3 py-3">
<div class="card">
  <div class="card-header">
  {{$listing->title}}
  <a class="btn btn btn-info" href="{{ url('/listingsedit', $listing->id) }}">編集</a>
  <a class="btn btn-danger" href="{{ url('/listingsdelete', $listing->id) }}">削除</a>
  </div>
  <ul class="list-group list-group-flush">
     @foreach($listing->cards as $card)
     <li class="list-group-item"><a class="text-dark" href="/listing/{{ $listing->id }}/card/{{ $card->id }}"><p>{{ $card->title }}</p></a><input type="submit" value="&#xf164;" class="fas"></li>
     @endforeach
     <li class="list-group-item"><a class="text-success" href="/listing/{{ $listing->id }}/card/new">タスクを追加</a></li>
  </ul>
</div>
</div>
@endforeach
</div>
@endsection