<!-- Service Id Field -->
<div class="form-group">
    {!! Form::label('service_id', __('models/custom_fields.fields.service_id').':') !!}
    <p>{{ $customField->service_id }}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('models/custom_fields.fields.name').':') !!}
    <p>{{ $customField->name }}</p>
</div>

<!-- Default Value Field -->
<div class="form-group">
    {!! Form::label('default_value', __('models/custom_fields.fields.default_value').':') !!}
    <p>{{ $customField->default_value }}</p>
</div>

<!-- Label Title Field -->
<div class="form-group">
    {!! Form::label('label_title', __('models/custom_fields.fields.label_title').':') !!}
    <p>{{ $customField->label_title }}</p>
</div>

<!-- Additional Class Field -->
<div class="form-group">
    {!! Form::label('additional_class', __('models/custom_fields.fields.additional_class').':') !!}
    <p>{{ $customField->additional_class }}</p>
</div>

<!-- Validation Field -->
<div class="form-group">
    {!! Form::label('validation', __('models/custom_fields.fields.validation').':') !!}
    <p>{{ $customField->validation }}</p>
</div>

<!-- Type Field -->
<div class="form-group">
    {!! Form::label('type', __('models/custom_fields.fields.type').':') !!}
    <p>{{ $customField->type }}</p>
</div>

<!-- Is Searchable Field -->
<div class="form-group">
    {!! Form::label('is_searchable', __('models/custom_fields.fields.is_searchable').':') !!}
    <p>{{ $customField->is_searchable }}</p>
</div>

<!-- Order Field -->
<div class="form-group">
    {!! Form::label('order', __('models/custom_fields.fields.order').':') !!}
    <p>{{ $customField->order }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/custom_fields.fields.created_at').':') !!}
    <p>{{ $customField->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/custom_fields.fields.updated_at').':') !!}
    <p>{{ $customField->updated_at }}</p>
</div>
