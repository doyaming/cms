@extends('template.master')

@section('page-title')
<title>Laravel Blog</title>
@endsection
@section('main')
<table class='table'>
    <tr>
        <th>#</th>
        <th>標題</th>
        <th>建立時間</th>
        <th>刪除時間</th>
        <th colspan="2">動作</th>
    </tr>
    @foreach($posts as $post)
    <tr>
        <td>{{$post->id}}</td>
        <td>{{$post->title}}</td>
        @php Carbon\Carbon::setLocale('zh_TW') @endphp

        <td>{{$post->created_at}} <br> {{ Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</td>
        <td>{{$post->deleted_at}} <br> {{ Carbon\Carbon::parse($post->deleted_at)->diffForHumans() }}</td>
        <td>
            <a href="{{ route('trash.restore',['id'=>$post->id]) }}" class="btn btn-success">還原</a>
            <a href="{{ route('trash.delete',['id'=>$post->id]) }}" class="btn btn-danger" onclick="return confirm('此動作無法還原，確認永久刪除?')">永久刪除</a>
        </td>
    </tr>
    @endforeach
</table>
@endsection
