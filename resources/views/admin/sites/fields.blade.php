<ul class="nav nav-pills" id="myPillTab" role="tablist">

    @foreach (Config::get('languages') as $lang => $language)

        <li class="nav-item"><a class="nav-link @if ($lang===App::getLocale()) active show @endif " id="#{{ $lang }}-icon-pill" data-toggle="pill" href="#{{ $lang }}" role="tab" aria-controls="homePIll" aria-selected="true">{{ $language }}</a>
        </li>
    @endforeach

</ul>

<div class="tab-content" id="myPillTabContent">
    @foreach (Config::get('languages') as $lang => $language)

        <div class="tab-pane  @if ($lang===App::getLocale()) fade active show @endif " id="{{ $lang }}" role="tabpanel"
             aria-labelledby="{{ $lang }}-icon-pill">

            <!-- Title Field -->
            <div class="form-group">
                {!! Form::label('title', __('models/siteInfos.fields.title').':') !!} {{$language}}
                {!! Form::text('title[' . $lang . ']', isset($site) && isset($site->getTranslations('title')[$lang])?$site->getTranslations('title')[$lang] : null, ['class' => 'form-control']) !!}
            </div>

            <!-- Short Desc Field -->
            <div class="form-group">
                {!! Form::label('short_desc', __('models/siteInfos.fields.short_desc').':') !!} {{$language}}
                {!! Form::textarea('short_desc[' . $lang . ']', isset($site)&& isset($site->getTranslations('short_desc')[$lang])?$site->getTranslations('short_desc')[$lang] : null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('content', __('models/siteInfos.fields.content').':') !!} {{$language}}
                {!! Form::textarea('content[' . $lang . ']', isset($site) && isset($site->getTranslations('content')[$lang])?$site->getTranslations('content')[$lang] : null, ['class' => 'form-control tiny_editor']) !!}
            </div>


            <!-- about Title Field -->
            <div class="form-group">
                {!! Form::label('about_title', __('models/siteInfos.fields.about_title').':') !!} {{$language}}
                {!! Form::text('about_title[' . $lang . ']', isset($site) && isset($site->getTranslations('about_title')[$lang])?$site->getTranslations('about_title')[$lang] : null, ['class' => 'form-control']) !!}
            </div>

            <!-- about Desc Field -->
            <div class="form-group">
                {!! Form::label('about_desc', __('models/siteInfos.fields.about_desc').':') !!} {{$language}}
                {!! Form::textarea('about_desc[' . $lang . ']', isset($site)&& isset($site->getTranslations('about_desc')[$lang])?$site->getTranslations('about_desc')[$lang] : null, ['class' => 'form-control']) !!}
            </div>

            <div class="row">
            <!-- Call To Action Button Content Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('call_to_action_button_content', __('models/siteInfos.fields.call_to_action_button_content').':') !!}{{$language}}
                {!! Form::text('call_to_action_button_content[' . $lang . ']', isset($site) && isset($site->getTranslations('call_to_action_button_content')[$lang])?$site->getTranslations('call_to_action_button_content')[$lang] : null, ['class' => 'form-control']) !!}
            </div>

            <!-- Copy Right Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('copy_right', __('models/siteInfos.fields.copy_right').':') !!}{{$language}}
                    {!! Form::text('copy_right[' . $lang . ']', isset($site) && isset($site->getTranslations('copy_right')[$lang])?$site->getTranslations('copy_right')[$lang] : null, ['class' => 'form-control']) !!}
                </div>

            </div>


        </div>
    @endforeach
</div>

<div class="row">
<!-- Theme Id Field -->
    @foreach(\App\Models\Theme::get() as $theme)
        <div class="form-group col-sm-6">
         <label for="{{ $theme->id }}" >
             {{ $theme->title }}
        <input type="radio" id="{{ $theme->id }}" name="theme_id" class="form-control" {{ isset($site) && $theme->id ==$site->theme_id ? 'checked':'' }} value="{{ $theme->id }}">
            <img height="200px" src="{{ url($theme->image) }}" alt="{{ $theme->title }}">
        </label>
        </div>
    @endforeach


<!-- Country Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('country_id', __('models/countries.singular').':') !!}
    {!! Form::select('country_id', App\Models\Country::pluck('name','id'),old('country_id'), ['class' => 'form-control']) !!}
</div>


    <!-- Url Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('url', __('models/sites.fields.url').':') !!}
        {!! Form::text('url', null, ['class' => 'form-control']) !!}
    </div>

<!-- Logo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('logo', __('models/siteInfos.fields.logo').':') !!}
    {!! Form::file('logo') !!}
</div>
    @if(isset($site))
        <img src="{{ url($site->logo) }}" alt="{{ $site->title }}">
    @endif
<div class="clearfix"></div>

<!-- Banner Field -->
<div class="form-group col-sm-6">
    {!! Form::label('banner', __('models/siteInfos.fields.banner').':') !!}
    {!! Form::file('banner') !!}
</div>
    @if(isset($site))
        <img  src="{{ url($site->banner) }}" alt="{{ $site->title }}">
    @endif
<div class="clearfix"></div>

<!-- About Image Field -->
<div class="form-group col-sm-6">
    {!! Form::label('about_image', __('models/siteInfos.fields.about_image').':') !!}
    {!! Form::file('about_image') !!}
</div>
    @if(isset($site))
        <img  src="{{ url($site->about_image) }}" alt="{{ $site->title }}">
    @endif
<div class="clearfix"></div>

</div>

<div class="row">
    <!-- Call To Action Button Content Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('page_color', __('models/siteInfos.fields.page_color').':') !!}
        {!! Form::color('page_color', '#000000', ['class' => 'form-control']) !!}
    </div>


    <!-- Call To Action Button Content Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('page_background_color', __('models/siteInfos.fields.page_background_color').':') !!}
        {!! Form::color('page_background_color', '#ffffff', ['class' => 'form-control']) !!}
    </div>

<!-- Call To Action Button Content Field -->
<div class="form-group col-sm-4">
    {!! Form::label('call_to_action_button_color', __('models/siteInfos.fields.call_to_action_button_color').':') !!}
    {!! Form::color('call_to_action_button_color', '#567df4', ['class' => 'form-control']) !!}
</div>

<!-- Linkedin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('linkedin', __('models/siteInfos.fields.linkedin').':') !!}
    {!! Form::text('linkedin', null, ['class' => 'form-control']) !!}
</div>

<!-- Facebook Field -->
<div class="form-group col-sm-6">
    {!! Form::label('facebook', __('models/siteInfos.fields.facebook').':') !!}
    {!! Form::text('facebook', null, ['class' => 'form-control']) !!}
</div>

<!-- Instgram Field -->
<div class="form-group col-sm-6">
    {!! Form::label('instagram', __('models/siteInfos.fields.instagram').':') !!}
    {!! Form::text('instagram', null, ['class' => 'form-control']) !!}
</div>

<!-- Youtube Field -->
<div class="form-group col-sm-6">
    {!! Form::label('youtube', __('models/siteInfos.fields.youtube').':') !!}
    {!! Form::text('youtube', null, ['class' => 'form-control']) !!}
</div>

<!-- Twitter Field -->
<div class="form-group col-sm-6">
    {!! Form::label('twitter', __('models/siteInfos.fields.twitter').':') !!}
    {!! Form::text('twitter', null, ['class' => 'form-control']) !!}
</div>


<div class="form-group col-12 col-sm-12">
        <div class="card ">
            <div class="card-body text-center">
                <h4>{{__('models/siteInfos.fields.partners')}} </h4>

                @if (isset($site) && count($site->partners) > 0)
                    <div class="row mt-2 mb-2">
                        <div class="col-12">
                            <hr>
                            <h6>{{__('models/siteInfos.fields.partners')}} :</h6>
                        </div>
                        @foreach($site->partners as $file)
                            <div class="col-6 col-md-2 mb-1 mt-1">
                                <a href="{{route('delete_file',$file->id)}}" class = 'btn btn-danger btn-xs m-1',
                                   onclick = 'return confirm("هل أنت متأكد من الحذف ؟")'>
                                    <i class="fa fa-trash"></i>
                                </a>
                                <img  class="img-fluid" src="{{ url($file->logo) }}">
                            </div>
                        @endforeach
                    </div>
                @endif


                <div class="col-12  image-bg">
                    <div class="files"
                         x-data="{ isUploading: false, progress: 0 }"
                         x-on:livewire-upload-start="isUploading = true"
                         x-on:livewire-upload-finish="isUploading = false"
                         x-on:livewire-upload-error="isUploading = false"
                         x-on:livewire-upload-progress="progress = $event.detail.progress"
                    >
                        <!-- File Input -->
                        <input name="partners[]" class="" type="file" multiple=""  placeholder=" {{__('models/siteInfos.fields.partners')}} ا">
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('admin.sites.index') }}" class="btn btn-light">@lang('crud.cancel')</a>
</div>
</div>
