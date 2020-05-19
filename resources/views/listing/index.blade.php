@extends('layouts.app')
@section('content')

@foreach($listings as $listing)
{{$listing->title}}
<a class="btn btn btn-info" href="{{ url('/listingsedit', $listing->id) }}">編集</a>
<a class="btn btn-danger" href="{{ url('/listingsdelete', $listing->id) }}">削除</a><br>


@foreach($listing->cards as $card)
<a class="btn btn-dark" href="/listing/{{ $listing->id }}/card/{{ $card->id }}"><p>{{ $card->title }}</p></a><br>
@endforeach

<a class="btn btn-success btn" href="/listing/{{ $listing->id }}/card/new">タスクを追加</a><br>


@endforeach
@endsection