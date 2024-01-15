<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('models/sites.fields.name').':') !!}
    <p>{{ $site->name }}</p>
</div>

<!-- Url Field -->
<div class="form-group">
    {!! Form::label('url', __('models/sites.fields.url').':') !!}
    <p>{{ $site->url }}</p>
</div>

<!-- Theme Id Field -->
<div class="form-group">
    {!! Form::label('theme_id', __('models/sites.fields.theme_id').':') !!}
    <p>{{ $site->theme_id }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/sites.fields.created_at').':') !!}
    <p>{{ $site->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/sites.fields.updated_at').':') !!}
    <p>{{ $site->updated_at }}</p>
</div>

