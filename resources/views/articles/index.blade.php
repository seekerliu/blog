@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">文章分类:
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>文章标题</th>
                                <th>所属分类</th>
                                <th width="80">作者</th>
                                <th width="200">发表时间</th>
                                <th width="140">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $item)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td><a href="{{route('articles.show', $item->id)}}" target="_blank">{{$item->title}}</a></td>
                                <td>{{$item->category->name}}</td>
                                <td>{{$item->user->name}}</td>
                                <td>{{$item->created_at}}</td>
                                <td>
                                    <a href="{{route('articles.edit', $item->id)}}">编辑</a>
                                    <a href="{{route('articles.destroy', $item->id)}}" class="delete">删除</a>
                                </td>
                            </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $items->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.delete')
@endsection
