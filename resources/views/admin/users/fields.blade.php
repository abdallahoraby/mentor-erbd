 <!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('models/users.fields.name').':') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

 <!-- Email Field -->
 <div class="form-group col-sm-6">
     {!! Form::label('email', __('models/users.fields.email').':') !!}
     {!! Form::email('email', null, ['class' => 'form-control']) !!}
 </div>

 <!-- Password Field -->
 <div class="form-group col-sm-6">
     {!! Form::label('password', __('models/users.fields.password').':') !!}
     {!! Form::password('password', ['class' => 'form-control','id'=>'password']) !!}
 </div>

 <!-- Name Field -->
 <div class="form-group col-sm-6">
     {!! Form::label('phone', __('models/users.fields.phone').':') !!}
     {!! Form::tel('phone', null, ['class' => 'form-control']) !!}
 </div>



 <!-- company_name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address', __('models/users.fields.address').':') !!}
    {!! Form::text('address', null, ['class' => 'form-control']) !!}
</div>


<!-- bio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bio', __('models/users.fields.bio').':') !!}
    {!! Form::textarea('bio', null, ['class' => 'form-control']) !!}
</div>

 <div class="form-group col-sm-6">
    {!! Form::label('role', __('models/users.fields.role').':') !!}
    <select class="form-control" name="role">
        @foreach(\App\Models\Role::all()->pluck('name') as $name)
            @if(isset($user) && $user->getRoleNames()->first() == $name)
                <option value="{{$name}}"  selected >{{$name}}</option>
            @else
                <option value="{{$name}}" >{{$name}}</option>
            @endif
        @endforeach
    </select>
</div>

<!-- avatar Field -->
<div class="form-group col-sm-12">
     {!! Form::label('avatar', __('models/users.fields.avatar').':') !!}
    {!! Form::file('avatar',['class'=>'form-control']) !!}
    @if(isset($user) && $user->avatar)
    <img src="{{ url($user->avatar) }}" class="card-img-top img-responsive" alt="{{ $user->avatar }}">
    @endif
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('admin.users.index') }}" class="btn btn-light">@lang('crud.cancel')</a>
</div>
