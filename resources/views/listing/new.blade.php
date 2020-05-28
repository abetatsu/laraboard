@extends('layouts.app')
@section('content')
<form method="post" action="{{ url('listings') }}">
@csrf
     <diV>
          <label for="newList">タイトルを入力してください</label>
          <input type="text" id="newList" value="{{ old('title_name') }}" name="title_name">
          
     </diV>
     <button type="submit" class="btn btn-info">新規登録</button>
</form>
@endsection