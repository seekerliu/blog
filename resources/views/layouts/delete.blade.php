<!-- Modal Delete -->
{!! Form::open(['url' => '#', 'id' => 'delete-form', 'method' => 'DELETE']) !!}
{!! Form::close() !!}
<div class="modal fade" id="delete-model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">确认删除吗?</h4>
            </div>
            <div class="modal-body">
                删除后将不可恢复。
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default cancel-delete">返回</button>
                <button type="button" class="btn btn-danger confirm-delete">确定删除</button>
            </div>
        </div>
    </div>
</div>