<div class="btn-group" data-toggle="buttons">
    @if(\Request::has('attr_id'))
        <a href="{{ route('attribute_value.create',['attr_id'=>\Request::get('attr_id')]) }}"
           class="btn btn-success btn-sm"><i class="fa fa-save"></i>新增</a>
    @else
        <a href="#"
           class="btn btn-success btn-sm disabled"><i class="fa fa-save"></i>新增</a>
                <a href="{{ route('attribute.index') }}" class="btn btn-sm btn-warning">请从属性页面进入...</a>
    @endif
</div>