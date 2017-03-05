@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    {!! Form::open(['route' => 'categories.store']) !!}
                    <div class="panel-heading">添加分类:
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <input name="name" type="text" class="form-control" id="categoryName" placeholder="分类名称，例如：PHP">
                        </div>
                        <div class="form-group">
                            <input name="path" type="text" class="form-control" id="categoryPath" placeholder="分类别名，用于url中显示。例如：php">
                        </div>
                        <button type="submit" class="btn btn-primary">保存</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
