@extends('layouts.app')

@section('content')
    @include('vendor.ueditor.assets')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    {!! Form::model($item, ['route' => ['articles.update', $item->id], 'method' => 'PUT']) !!}
                    <div class="panel-heading">编辑文章，请使用 <span class="label label-default">##我是标题##</span> 来添加标题。
                        <button type="submit" class="btn btn-primary btn-sm pull-right">保存并发布</button>
                    </div>

                    <div class="panel-body editor">
                        <div class="category">
                            {!! Form::select('category_id', $categories->pluck('name','id'), $item->category_id, ['class'=>'form-control']) !!}
                        </div>

                        <!-- 实例化编辑器 -->
                        <script type="text/javascript">
                            var ue = UE.getEditor('container', {
                                initialFrameHeight:320
                            });
                            ue.ready(function() {
                                ue.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
                            });
                        </script>

                        <!-- 编辑器容器 -->
                        <script id="container" name="content" type="text/plain"><p>##{{$item->title}}##</p><p>``{{$item->subtitle}}``</p>{!! $item->content !!}</script>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
