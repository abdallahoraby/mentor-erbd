
<!-- Name Field -->
<div class="form-group col-sm-4">
    {!! Form::label('name', __('models/inquiries.fields.name').':') !!}
    <p>{{ $inquiry->name }}</p>
</div>

<!-- Email Field -->
<div class="form-group col-sm-4">
    {!! Form::label('email', __('models/inquiries.fields.email').':') !!}
    <p>{{ $inquiry->email }}</p>
</div>

<!-- Phone Field -->
<div class="form-group col-sm-4">
    {!! Form::label('phone', __('models/inquiries.fields.phone').':') !!}
    <p>{{ $inquiry->phone }}</p>
</div>

<!-- Created At Field -->
<div class="form-group col-sm-4">
    {!! Form::label('created_at', __('models/inquiries.fields.created_at').':') !!}
    <p>{{ $inquiry->created_at }}</p>
</div>


<!-- Url Field -->
<div class="form-group col-sm-4">
    {!! Form::label('url', __('models/inquiries.fields.url').':') !!}
    <p>{{ $inquiry->url }}</p>
</div>

@foreach($custom_fields as $field)
    <div class="form-group col-md-6">
        {!! Form::label($field->label_title) !!}
        @if($field->type=='select'||$field->type=='multi_select'||$field->type=='radio')

            @if(isset($custom_saved_data) && isset($custom_saved_data[$field->name]) && $custom_saved_data[$field->name]<>null)
            <p>
                @if(\App\Models\CustomFieldOption::find($custom_saved_data[$field->name]))
                    {{ \App\Models\CustomFieldOption::find($custom_saved_data[$field->name])->title }}
                @else
                    {{ $field->default_value }}
                @endif
            </p>
            @endif
        @else
            <p>{{ (isset($custom_saved_data)&&isset($custom_saved_data[$field->name])&&$custom_saved_data[$field->name]<>null)?$custom_saved_data[$field->name]:$field->default_value }}</p>
        @endif
    </div>
@endforeach

<!-- Ip Address Field -->
<div class="form-group col-sm-4">
    {!! Form::label('ip_address', __('models/inquiries.fields.ip_address').':') !!}
    <p>{{ $inquiry->ip_address }}</p>
</div>

<div class="col-12 col-sm-12 bg-white rounded-lg">
    <div class="table-responsive">
        <table class="table border-1">
            <tbody>
            @if($inquiry->ip_address )
                <tr>
                    <td>ip_address : <i class="fas fa-address-card text-primary"></i> </td>
                    <td>{{$inquiry->ip_address }}</td>
                </tr>

                @foreach( user_ip_address_info($inquiry->ip_address)  as $i=>$key)
                    <tr>
                        <td>{{$i}} : </td>
                        <td>{{$key}}</td>
                    </tr>
                @endforeach

            @endif
            </tbody>
        </table>
    </div>
</div>
