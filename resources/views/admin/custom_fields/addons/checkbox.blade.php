<div class="form-group {{$field->additional_class }} ">
    {!! Form::label($field->name, $field->label_title,['class'=>strpos($field->validation, "Required") !== false||strpos($field->validation, "required") !== false?"required":""]) !!}
    <label class="checkbox">
            @foreach($field->options()->orderBY('title','asc')->get() as $option)
                <label class="checkbox label-radio">
                    <input type="checkbox" name="{{$field->name}}[]" {{$option->title == $field->default_value ?'checked':''}} value="{{$option->id}}">
                    {{$option->title}}
                </label>
            @endforeach
    </label>
</div>
