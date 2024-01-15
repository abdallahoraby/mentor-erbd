

<div class="form-group {{$field->additional_class }}">
    <input type="number" name="{{$field->name}}" class="form-control" id="{{$field->name}}" value="{{$field->default_value}}"
           {{strpos($field->validation, "Required") !== false||strpos($field->validation, "required") !== false?"required":""}}
           data-error="{{strpos($field->validation, "Required") !== false||strpos($field->validation, "required") !== false?$field->label_title." required":""}}" placeholder="{{$field->label_title}}">
    <div class="help-block with-errors"></div>
</div>
