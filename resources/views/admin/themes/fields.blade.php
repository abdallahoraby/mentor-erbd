

<!-- Image Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image', __('models/themes.fields.image').':') !!}
    {!! Form::file('image') !!}
</div>

@if(isset($theme))
    <img height="200px" src="{{ url($theme->image) }}" alt="{{ $theme->title }}">
@endif

<div class="clearfix"></div>

<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', __('models/themes.fields.title').':') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('admin.themes.index') }}" class="btn btn-light">@lang('crud.cancel')</a>
</div>
