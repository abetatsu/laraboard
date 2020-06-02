@extends('layouts.app')
@section('content')
<form method="post" action="{{ url('listings') }}" enctype="multipart/form-data">
@csrf
     <diV class="form-group">
          <label for="newList">タイトルを入力してください</label>
          <input type="text" id="newList" value="{{ old('title_name') }}" name="title_name">
     </diV>
     <div class="form-group">
          <label for="image">画像</label>
          <input type="file" class="form-control-file" id="image" name="image">
     </div>
     <button type="submit" class="btn btn-info">新規登録</button>
</form>
@endsection