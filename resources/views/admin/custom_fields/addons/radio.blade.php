<div class="form-group {{$field->additional_class }} {{strpos($field->validation, "Required") !== false||strpos($field->validation, "required") !== false?"required_fieldv2":''}}">

    <label class='{{strpos($field->validation, "Required") !== false||strpos($field->validation, "required") !== false?"required mb-3":"mb-3"}}'>{{$field->label_title}}</label>

        @foreach($field->options()->orderBY('title','asc')->get()  as $key => $option)
            @php
            if($key == 0){
                if(strpos($field->validation, "Required") !== false || strpos($field->validation, "required") !== false){
                    $required = 'required';
                }else{
                    $required = '';
                }
            }
            @endphp
            <label class="radio label-radio">
              {!! Form::radio($field->name, $option->id,$field->default_value
                  ,['id'=>$field->name,'class'=>$required.'_field'])!!}
                {{$option->title}}
            </label>
        @endforeach
</div>
