@component('mail::message')

        {!!  __('models/inquiries.fields.name').':' !!}  {{ $inquiry->name }}

        {!!  __('models/inquiries.fields.email').':' !!}   {{ $inquiry->email }}

        {!!  __('models/inquiries.fields.phone').':' !!} {{ $inquiry->phone }}

        {!!  __('models/inquiries.fields.created_at').':' !!} {{ $inquiry->created_at }}

        {!!  __('models/inquiries.fields.start_date').':' !!} {{ $inquiry->start_date }}

        {!!  __('models/inquiries.fields.end_date').':' !!}   {{ $inquiry->end_date }}

        {!!  __('models/inquiries.fields.adult').':' !!} {{ $inquiry->adult }}

        {!!  __('models/inquiries.fields.kid').':' !!} {{ $inquiry->kid }}

        {!!  __('models/inquiries.fields.nationality').':' !!} {{ $inquiry->nationality }}

        {!!  __('models/inquiries.fields.url').':' !!}   {{ $inquiry->url }}

        {!!  __('models/inquiries.fields.comment').':' !!} {{ $inquiry->comment }}


        @if($inquiry->ip_address )
        ip_address : {{$inquiry->ip_address }}
                    
        @foreach( user_ip_address_info($inquiry->ip_address)  as $i=>$key)
        {{$i}} : {{$key}}
        @endforeach

        @endif

Thanks,
{{ config('app.name') }}
@endcomponent
