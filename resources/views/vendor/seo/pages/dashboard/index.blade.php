@extends(config('seo.layout'))

@section('tools')
@endsection
@section('content')
     <div class="card">
      <div class="card-header">
        <h4>Dashboard Seo</h4>
      </div>
      <div class="card-body">
        <ul class="nav nav-tabs" id="myTab2" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="false">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="Site-tab" data-toggle="tab" href="#Site" role="tab" aria-controls="Site" aria-selected="false">Site</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="Webmaster-tab" data-toggle="tab" href="#Webmaster" role="tab" aria-controls="Webmaster" aria-selected="false">Webmaster Tools</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="Personal-tab" data-toggle="tab" href="#Personal" role="tab" aria-controls="Personal" aria-selected="false">Personal/Company info</a>
          </li>
        </ul>
        <div class="tab-content tab-bordered" id="myTab3Content">
         <div class="tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="home">
            @include('seo::tabs.dashboard')
          </div>
          <div class="tab-pane fade" id="Site" role="tabpanel" aria-labelledby="Site-tab">
            @include('seo::tabs.site')
          </div>
          <div class="tab-pane fade" id="Webmaster" role="tabpanel" aria-labelledby="Webmaster-tab">
            @include('seo::forms.meta-tag-global',['tags'=>$webmasterTags])
          </div>
          <div class="tab-pane fade" id="Personal" role="tabpanel" aria-labelledby="Personal-tab">
            @include('seo::tabs.ownership')
          </div>

        </div>
      </div>
    </div>



@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function (e) {
            $('#seo-settings-tab a').on('click', function (e) {
                e.preventDefault()
                $(this).tab('show')
            })
        });
    </script>
@endsection