<div class="form-group {{$field->additional_class }} ">
    {!! Form::select($field->name,  $field->options()->orderBY('title','asc')->pluck('title','id') , $field->default_value, ['class' => 'form-control',strpos($field->validation, "Required") !== false||strpos($field->validation, "required") !== false?"required":"",'placeholder'=>$field->label_title]) !!}
</div>
