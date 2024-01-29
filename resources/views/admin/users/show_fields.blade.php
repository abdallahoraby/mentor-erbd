<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('models/users.fields.name').':') !!}
    <p>{{ $user->name }}</p>
</div>


<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', __('models/users.fields.email').':') !!}
    <p>{{ $user->email }}</p>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('phone', __('models/users.fields.phone').':') !!}
    <p>{{ $user->phone }}</p>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('role', __('models/users.fields.role').':') !!}
    <p>
         @foreach(\App\Models\Role::all()->pluck('name') as $name)
            @if(isset($user) && $user->getRoleNames()->first() == $name)
                {{$name}}
            @endif
        @endforeach
    </p>
</div>
<div class="form-group col-sm-6">
    {!! Form::label('avatar', __('models/users.fields.avatar').':') !!}
    @if(isset($user) && $user->avatar)
    <img src="{{ url($user->avatar) }}" class="card-img-top img-responsive"  alt="{{ $user->name }}">
    @endif
</div>





