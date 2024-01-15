
<div class="form-group {{$field->additional_class }} ">
    {!! Form::label($field->name, $field->label_title,['class'=>strpos($field->validation, "Required") !== false||strpos($field->validation, "required") !== false?"required":""]) !!}
    {!! Form::textarea($field->name, $field->default_value, ['class' => 'form-control',strpos($field->validation, "Required") !== false||strpos($field->validation, "required") !== false?"required":""]) !!}
</div>
