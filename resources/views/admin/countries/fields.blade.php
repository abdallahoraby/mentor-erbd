<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('models/countries.fields.name').':') !!}
    {!! Form::text('name', (isset($country) && $country->getTranslation('name','en')) ? $country->getTranslation('name','en') : null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('admin.countries.index') }}" class="btn btn-light">@lang('crud.cancel')</a>
</div>
