<div id="accordion">
  <div class="accordion">
    <div class="accordion-header" role="button" data-toggle="collapse" data-target="#{{ isset($title) ? str_slug($title) :  'permissionHeading' }}">
      <h4>  {{ $title  }}</h4>
    </div>
    <div class="accordion-body collapse" id="{{ isset($title) ? str_slug($title) :  'permissionHeading' }}" data-parent="#accordion">
     <div class="row">

                @foreach($permissions->get() as $perm)
                    @php
                    $per_found = null;

                    if (isset($role)) {
                        $per_found = $role->hasPermissionTo($perm->name);
                    }

                    if (isset($user)) {
                        $per_found = $user->hasDirectPermission($perm->name);
                    }
                    @endphp

                    @if($perm->name === 'admin')
                 <div class="col-md-12">
                     <div class="checkbox">
                         <label class="text-warning">
                             {!! Form::checkbox("permissions[]", $perm->name, $per_found, isset($options) ? $options : []) !!} {{ $perm->name}}
                         </label>
                     </div>
                 </div>
                    @else
                 <div class="col-md-3">
                     <div class="checkbox">
                         <label class="{{ str_contains($perm->name, 'delete') ? 'text-danger' : '' }}">
                             {!! Form::checkbox("permissions[]", $perm->name, $per_found, isset($options) ? $options : []) !!} {{ $perm->name}}
                         </label>
                     </div>
                 </div>
                    @endif

                @endforeach
            </div>

            @can('edit_roles')
               {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            @endcan
    </div>
  </div>


</div>
