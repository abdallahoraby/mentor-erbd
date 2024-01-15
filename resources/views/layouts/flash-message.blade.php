@foreach (session('flash_notification', collect())->toArray() as $message)
    @if ($message['overlay'])

        @push('scripts')
           <script type="text/javascript">
            $( document ).ready(function() {
                var askchance = $('.ms-students').offset().top;
                $('body,html').animate({scrollTop: askchance + 50},300);
                $('#Errorpupup').modal('show');
                $('#Errorpupup .modal-title').html('{{ $message['title'] }}');
                $('#Errorpupup .icon i').addClass('fa fa-envelope fa-4x text-success');
                $('.modal-description').html('{{ $message['message'] }}');
           });
        </script>
        @endpush
    @else
        @push('scripts')
            <script type="text/javascript">
                @if($message['level'] == 'danger')
                iziToast.error({
                    message: '{{ $message['message'] }}',
                    position: 'topCenter'
                });
                @else
                iziToast.success({
                    message: '{{ $message['message'] }}',
                    position: 'topCenter'
                });
                @endif
            </script>
        @endpush
    @endif
@endforeach
{{ session()->forget('flash_notification') }}

@if ($errors->oprequest->getMessages())

@php
$errorsview = '<ul class="list-group">';
  foreach ($errors->oprequest->getMessages() as $errorslogin){
   foreach($errorslogin as $error){
      $errorsview .=  '<li class="list-group-item text-danger mb-2"> '.$error.'</li>';
     }
   }
$errorsview .= '</ul>';
@endphp
@push('scripts')
    <script type="text/javascript">
        $( document ).ready(function() {
            var askchance = $('.ms-students').offset().top;
            $('body,html').animate({scrollTop: askchance + 50},300);
            $('#Errorpupup').modal('show');
            $('#Errorpupup .modal-title').remove();
            $('#Errorpupup .icon i').addClass('fas fa-exclamation-triangle fa-4x text-danger');
            $('.modal-description').html('{!! $errorsview !!}');
       });
    </script>
@endpush

@endif
