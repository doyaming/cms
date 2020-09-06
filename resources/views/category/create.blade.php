@extends('template.master')
@section('main')
<div class="pt-4"></div>
<h2>新增分類</h2>
<form action="{{route('category.store')}}" method="post">
    @csrf
    <div class="form-group">
        <label for="title">分類標題</label>
        <input type="text" name="title" id="title" class="form-control">
    </div>
    <div class="form-group">
        <label for="slug">Slug</label>
        <input type="text" name="slug" id="slug" class="form-control">
        <small class="d-block text-muted">分類的英文</small>
    </div>

    <input type="submit" value="新增分類" class="btn btn-primary">
    <input type="button" value="取消" class="btn btn-danger" onclick="history.back()">
</form>

<h2 class="pt-4">分類列表</h2>
<ul class="list-group">
    @foreach($categories as $cate)
    <li class="list-group-item">
        <a href="#">{{$cate->title}}</a>
        <form action="{{route('category.destroy',['id'=>$cate->id])}}" method="post">
            @csrf
            @method('delete')
            <input type="submit" value="刪除" class="btn btn-danger btn-sm" onclick="return confirm('確認刪除？')">
        </form>
    </li>
    @endforeach
</ul>
@endsection
