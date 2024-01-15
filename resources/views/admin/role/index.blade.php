@extends('layouts.app')

@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item"> @lang('crud.permissions.Roles & Permissions')</li>
</ol>
<div class="container-fluid">
    <div class="animated fadeIn">

         <div class="row">
             <div class="col-lg-12">
                 <div class="card">
                     <div class="card-header">
                         <i class="fa fa-align-justify"></i>
                          @lang('crud.permissions.Roles & Permissions')

                     </div>
                     <div class="card-body">
                           <div class="row">
                                <div class="col-md-5">
                                    <h3> @lang('crud.permissions.roles')</h3>
                                </div>
                                <div class="col-md-7 page-action text-right">
                                    @can('add_roles')
                                        <a href="#" class="btn btn-sm btn-success pull-right" data-toggle="modal" data-target="#roleModal"> <i class="glyphicon glyphicon-plus"></i> @lang('crud.add_new')</a>
                                    @endcan
                                </div>
                            </div>
                               @forelse ($roles as $role)
                                    {!! Form::model($role, ['method' => 'PUT', 'route' => ['admin.roles.update',  $role->id ], 'class' => 'm-b']) !!}

                                    @if($role->name == 'admin')
                                        @include('admin.shared._permissions', [
                                                      'title' => $role->name .' Permissions',
                                                      'guard' => $role->name,
                                                      'options' => ['disabled'] ])
                                    @else
                                        @include('admin.shared._permissions', [
                                                      'title' => $role->name .' Permissions',
                                                      'guard' => $role->name,
                                                      'model' => $role ])

                                    @endif


                                    {!! Form::close() !!}

                                     {!! Form::open(['route' => ['admin.roles.destroy', $role->id], 'method' => 'delete']) !!}


                                    {!! Form::button(trans('crud.permissions.delete'), [
                                       'type' => 'submit',
                                        'class' => 'btn btn-danger',
                                        'onclick' => 'return confirm("'.__('crud.are_you_sure').'")'
                                    ]) !!}

                                    {!! Form::close() !!}

                                @empty
                                    <p>No Roles defined, please run <code>php artisan db:seed</code> to seed some dummy data.</p>
                                @endforelse
                          <div class="pull-right mr-3">

                          </div>
                     </div>
                 </div>
              </div>
         </div>
     </div>
</div>


 <!-- Modal -->
<div class="modal fade" id="roleModal" tabindex="-1" role="dialog" aria-labelledby="roleModalLabel">
    <div class="modal-dialog" role="document">
        {!! Form::open(['method' => 'post']) !!}

        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title" id="roleModalLabel">@lang('crud.permissions.create_role')</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <!-- name Form Input -->
                <div class="form-group @if ($errors->has('name')) has-error @endif">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Role Name']) !!}
                    @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">@lang('crud.close')</button>

                <!-- Submit Form Button -->
                {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

@endsection
