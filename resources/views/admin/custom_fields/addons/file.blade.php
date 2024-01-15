<div class="form-group {{$field->additional_class }} ">
    {!! Form::label($field->name, $field->label_title,['class'=>strpos($field->validation, "Required") !== false||strpos($field->validation, "required") !== false?"required":""]) !!}
    {!! Form::file($field->name, ['class' => 'form-control',strpos($field->validation, "Required") !== false||strpos($field->validation, "required") !== false?"required":""]) !!}
    <br>
</div>
