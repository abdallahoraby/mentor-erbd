<!-- Service Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('site_id', __('models/custom_fields.fields.site_id').':') !!}
    {!! Form::select('site_id', App\Models\Site::pluck('title','id') , request('site_id'), ['class' => 'form-control','readonly '=>'readonly']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('models/custom_fields.fields.name').':') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Default Value Field -->
<div class="form-group col-sm-6">
    {!! Form::label('default_value', __('models/custom_fields.fields.default_value').':') !!}
    {!! Form::text('default_value', null, ['class' => 'form-control']) !!}
</div>

<!-- Label Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('label_title', __('models/custom_fields.fields.label_title').':') !!}
    {!! Form::text('label_title', null, ['class' => 'form-control']) !!}
</div>

<!-- Additional Class Field -->
<div class="form-group col-sm-6">
    {!! Form::label('additional_class', __('models/custom_fields.fields.additional_class').':') !!}
    {!! Form::text('additional_class', null, ['class' => 'form-control']) !!}
</div>

<!-- Validation Field -->
<div class="form-group col-sm-6">
    {!! Form::label('validation', __('models/custom_fields.fields.validation').':') !!} <a href="https://laravel.com/docs/10.x/validation" target="_blank">laravel validation</a>
    {!! Form::text('validation', null, ['class' => 'form-control']) !!}
</div>

<!-- Order Field -->
<div class="form-group col-sm-6">
    {!! Form::label('order', __('models/custom_fields.fields.order').':') !!}
    {!! Form::number('order', null, ['class' => 'form-control']) !!}
</div>

<!-- Type Field -->
<div class="f-item form-group col-sm-6">
    {!! Form::label('type', __('models/custom_fields.fields.type').':') !!}
    {!! Form::select('type', ['text'=>'Text','number'=>'Number','email'=>'Email','password'=>'Password','textarea'=>'TextArea','checkbox'=>'Checkbox','select'=>'Select','date'=>'Date','radio'=>'Radio'], null, ['class' => 'form-control','id'=>'select']) !!}
</div>
</div>

@if(isset($customField))
    @foreach($customField->options as $option)

        <div class="select_option_added">
            <div class="form-group col-sm-12 select_option-content">
                <div class="row">
                    <div class="col-md-2">
                        {!! Form::label('select_options', 'Option') !!}
                    </div>
                    <div class="col-md-6">
                        {!! Form::text('select_options[]', $option->title, ['class' => 'form-control','placeholder'=>'option']) !!}
                    </div>

                    <div class="col-md-1">
                        <button class="btn btn-danger remove-select_option" type="button"><i class="fa fa-trash"></i></button>
                    </div>
                </div>
            </div>
        </div>

    @endforeach

@endif

<div id="options" style="display: none">
    <div class="select_option hide">
        <div class="form-group select_option-content">
            <div class="container">
                <div class="col-md-2">
                    {!! Form::label('select_options', 'Option') !!}
                </div>
                <div class="col-md-6">
                    {!! Form::text('select_options[]', null, ['class' => 'form-control','placeholder'=>'option']) !!}
                </div>

                <div class="col-md-1">
                    <button class="btn btn-danger remove-select_option" type="button">   <i class="fa fa-trash"></i></button>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group select_option-container">
        <label class="control-label col-md-8">
            Please Add your select Options :
            <button type="button" class="btn btn-info add-select_option"><i class="fa fa-plus"></i></button>
        </label>
    </div>
</div>


<!-- Submit Field -->

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('admin.sites.index') }}" class="btn btn-light">@lang('crud.cancel')</a>
</div>


@push('scripts')

    <script type="text/javascript">

        if (this.value =='select'||this.value =='radio'||this.value =='checkbox'||this.value =='multi_select') {
            $('#options').show();
        }
        else {
            $('#options').hide();
        }

        $('#select').on('change', function() {
            if (this.value =='select'||this.value =='radio'||this.value =='checkbox'||this.value =='multi_select')  {
                $('#options').show();
            }
            else {
                $('#options').hide();
            }


        });

        $(document).ready(function()
        {

            $('#title').keyup(function(e) {
                var txtVal = $(this).val();
                txtVal = txtVal.toLowerCase().replace(/\s/g, '_');
                $('#name').val(txtVal);
            });

            //
            $(".add-select_option").click(function(){
                var select_option = $(".select_option").html();
                $(".select_option-container").before(select_option);
            });

            $("body").on("click",".remove-select_option",function(){
                $(this).parents(".select_option-content").remove();
            });


        });
    </script>

@endpush
