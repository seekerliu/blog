@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">文章分类:
                        <a href="{{route('categories.create')}}" class="btn btn-primary btn-sm pull-right">添加分类</a>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>分类名称</th>
                                <th>分类别名</th>
                                <th width="300">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $item)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$item->name}}</td>
                                <td>{{$item->path}}</td>
                                <td>
                                    <a href="{{route('categories.edit', $item->id)}}">编辑</a>
                                    <a href="{{route('categories.destroy', $item->id)}}" class="delete">删除</a>（如果分类下存在文章则不能删除）
                                </td>
                            </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.delete')
@endsection
