{!! Form::open(['route' => ['admin.sites.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a target="_blank" href="{{  \App\Models\Site::find($id)->url}}" class='btn btn-info btn-xs m-1' title="view">
        <i class="fa fa-eye"></i>
    </a>
    <a href="{{ route('admin.sites.edit', $id) }}" class='btn btn-warning btn-xs m-1' title="edit">
        <i class="fa fa-edit"></i>
    </a>

    <a href="/admin/custom_fields?site_id={{$id}}" class='btn btn-success btn-xs m-1' title="{{trans(('models/custom_fields.plural'))}}">
        <i class="fa fa-folder-open"></i>
    </a>
    {!! Form::button('<i class="fa fa-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs m-1',
        'onclick' => 'return confirm("'.__('crud.are_you_sure').'")'
    ]) !!}
</div>
{!! Form::close() !!}
