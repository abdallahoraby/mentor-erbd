<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('models/users.fields.name').':') !!}
    <p>{{ $user->name }}</p>
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('first_name', __('models/users.fields.first_name').':') !!}
    <p>{{ $user->first_name }}</p>
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('last_name', __('models/users.fields.last_name').':') !!}
    <p>{{ $user->last_name }}</p>
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('company_name', __('models/users.fields.company_name').':') !!}
    <p>{{ $user->company_name }}</p>
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
    <img src="{{ url($user->avatar) }}" class="card-img-top img-responsive" alt="{{ $user->avatar }}">
    @endif
</div>
<!-- Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('userOpportunities', __('models/userOpportunities.singular').':') !!}
    @foreach($user->UserOpportunity->pluck('title','id') as $id => $Opportunity)
        @php
            $countBooking = \App\Models\UserOpportunity::where('opportunity_id',$id)->where('user_id',$user->id)->count();
        @endphp
        <p><a href="{{ aurl('opportunities/'.$id) }}">{{ $Opportunity }}</a> Booking : {{ $countBooking }}</p>
    @endforeach
</div>





