<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', __('models/themes.fields.title').':') !!}
    <p>{{ $theme->title }}</p>
</div>

<!-- Image Field -->
<div class="form-group">
    {!! Form::label('image', __('models/themes.fields.image').':') !!}
    <p>{{ $theme->image }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/themes.fields.created_at').':') !!}
    <p>{{ $theme->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/themes.fields.updated_at').':') !!}
    <p>{{ $theme->updated_at }}</p>
</div>

