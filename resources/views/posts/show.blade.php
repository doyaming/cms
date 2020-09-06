@extends('template.master')

@section('page-title')
<title>Laravel Blog #</title>
@endsection

@section('main')

{{-- @foreach($posts as $post) --}}

<h1 class="mt-4">{{$post->title}}</h1>
<p class="lead">
    by <a href="#">{{$post->user->name}}
    </a>
</p>
<hr>
建立時間 {{$post->created_at}}
<hr>
<img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
<hr>
<div>
    {{$post->content}}
</div>
<hr>


<div class="mb-3">
最後更新時間 {{$post->updated_at}}
</div>
<a href="/" class="btn btn-info">文章列表</a>
@auth
@if($post->user_id === Auth::id())
<a href="{{ route('posts.edit',['id'=>$post->id]) }}" class="btn btn-success">編輯文章</a>
<form action="{{ route('posts.destroy',['id'=>$post->id]) }}" method="post" class="d-inline-block">
    @csrf
    @method('delete')
    <input type="submit" class="btn btn-danger" value="刪除文章" onclick="return confirm('確認刪除？')">
</form>
@endif
@endauth
{{-- @endforeach --}}

@endsection
