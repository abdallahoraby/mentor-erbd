@extends('layouts.app')
@section('title')
     @lang('models/custom_fields.plural')
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>@lang('models/custom_fields.plural')</h1>
            <div class="section-header-breadcrumb">
                <a href="/admin/custom_fields/create?site_id={{request('site_id')}}" class="btn btn-primary form-btn">@lang('crud.add_new')<i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('admin.custom_fields.table')
            </div>
       </div>
   </div>

    </section>
@endsection
