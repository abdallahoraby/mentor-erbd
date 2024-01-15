@extends('layouts.app')
@section('title')
     @lang('models/inquiries.plural')
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>@lang('models/inquiries.plural')</h1>
            <div class="section-header-breadcrumb">
                <div class="form-group">
                    <select id='site_id' name="site_id" class="form-control" onChange="window.location.href=this.value">
                        <option value="/admin/inquiries">--Select Site--</option>
                        @foreach(App\Models\Site::get() as $site)
                            <option {{$site->id == request('site_id') ? 'selected':''}} value="/admin/inquiries?site_id={{$site->id}}">{{$site->title}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('admin.inquiries.table')
            </div>
       </div>
   </div>

    </section>
@endsection



