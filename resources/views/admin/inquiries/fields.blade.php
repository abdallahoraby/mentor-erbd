<!-- Tour Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('site_id', __('models/inquiries.fields.site_id').':') !!}
    {!! Form::select('site_id', [App\Models\Site::pluck('title','id')], null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-4">
    {!! Form::label('name', __('models/inquiries.fields.name').':') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-4">
    {!! Form::label('email', __('models/inquiries.fields.email').':') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Phone Field -->
<div class="form-group col-sm-4">
    {!! Form::label('phone', __('models/inquiries.fields.phone').':') !!}
    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
</div>

<!-- Nationality Field -->
<div class="form-group col-sm-6">
    {!! Form::label('url', __('models/inquiries.fields.url').':') !!}
    {!! Form::text('url', null, ['class' => 'form-control']) !!}
</div>

<!-- Nationality Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ip_address', __('models/inquiries.fields.ip_address').':') !!}
    {!! Form::text('ip_address', null, ['class' => 'form-control']) !!}
</div>

<!-- Comment Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('comment', __('models/inquiries.fields.comment').':') !!}
    {!! Form::textarea('comment', null, ['class' => 'form-control']) !!}
</div>

<!-- Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type', 'Status:') !!}
    {!! Form::select('status', ['New','In contact','Confirmed','Canceled'], null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('admin.inquiries.index') }}" class="btn btn-light">@lang('crud.cancel')</a>
</div>
