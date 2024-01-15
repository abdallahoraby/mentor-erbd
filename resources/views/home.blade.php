@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">@lang('crud.dashboard')</h3>
        </div>
        <div class="section-body">
           <div class="row">
               <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                       <div class="card card-statistic-1">
                           <a href="{{ route('admin.users.index') }}">
                               <div class="card-icon bg-primary">
                                   <i class="far fa-user"></i>
                               </div>
                               <div class="card-wrap">
                                   <div class="card-header">
                                       <h4>@lang('crud.Users')</h4>
                                   </div>
                                   <div class="card-body">
                                       {{ App\Models\User::count() }}
                                   </div>
                               </div>
                           </a>
                       </div>
               </div>

               <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                   <div class="card card-statistic-1">
                       <a href="{{ route('admin.themes.index') }}">
                           <div class="card-icon bg-secondary">
                               <i class="fas fa-photo-video"></i>
                           </div>
                           <div class="card-wrap">
                               <div class="card-header">
                                   <h4>@lang('models/themes.plural')</h4>
                               </div>
                               <div class="card-body">
                                   {{ App\Models\Theme::count() }}
                               </div>
                           </div>
                       </a>
                   </div>
               </div>

               <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                   <div class="card card-statistic-1">
                       <a href="{{ route('admin.sites.index') }}">
                           <div class="card-icon bg-info">
                               <i class="fas fa-sitemap"></i>
                           </div>
                           <div class="card-wrap">
                               <div class="card-header">
                                   <h4>@lang('models/sites.plural')</h4>
                               </div>
                               <div class="card-body">
                                   {{ App\Models\Site::count() }}
                               </div>
                           </div>
                       </a>
                   </div>
               </div>

               <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                   <div class="card card-statistic-1">
                       <a href="{{ route('admin.inquiries.index') }}">
                           <div class="card-icon bg-success">
                               <i class="fas fa-question"></i>
                           </div>
                           <div class="card-wrap">
                               <div class="card-header">
                                   <h4>@lang('models/inquiries.plural')</h4>
                               </div>
                               <div class="card-body">
                                   {{ App\Models\Inquiry::count() }}
                               </div>
                           </div>
                       </a>
                   </div>
               </div>

          </div>

        </div>
    </section>
@endsection
