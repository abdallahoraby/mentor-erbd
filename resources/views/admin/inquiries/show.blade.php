@extends('layouts.app')
@section('title')
    @lang('models/inquiries.singular')  @lang('crud.details')
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
        <h1>@lang('models/inquiries.singular') @lang('crud.details')</h1>
        <div class="section-header-breadcrumb">
            <a href="{{ route('admin.inquiries.index') }}"
                 class="btn btn-primary form-btn float-right">@lang('crud.back')</a>
        </div>
      </div>
   @include('common.errors')
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
               <div class="card">
                <div class="card-body">
                    <div class="row">
                        @include('admin.inquiries.show_fields')
                    </div>
                </div>
               </div>
            </div>
        </div>
    </div>
    </section>
@endsection
