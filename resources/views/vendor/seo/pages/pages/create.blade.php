@extends(config('seo.layout'))
@section('content')
  <div class="card">
      <div class="card-header">
        <h4>New Page</h4>
      </div>
      <div class="card-body">
        @include('seo::forms.page',['showPageUrl'=>true])
      </div>
    </div>
@endsection