@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level === 'error')
# @lang('Whoops!')
@else
<h1 style="text-align: right !important; font-family: Sakkal Majalla;">
@lang('السلام عليكم ورحمة الله وبركاته')
</h1>
@endif
@endif

{{-- Intro Lines --}}
@foreach ($introLines as $line)
<p  style="font-family: Sakkal Majalla;text-align: right !important;">
{{ $line }}
</p>
@endforeach

{{-- Action Button --}}
@isset($actionText)
<?php
    switch ($level) {
        case 'success':
        case 'error':
            $color = $level;
            break;
        default:
            $color = 'primary';
    }
?>
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{ $actionText }}
@endcomponent
@endisset

{{-- Outro Lines --}}
@foreach ($outroLines as $line)
<p  style="font-family: Sakkal Majalla; text-align: right !important;">
{{ $line }}
</p>
@endforeach

{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
<!-- 
<p  style="font-family: Sakkal Majalla;text-align: right !important;">
@lang('مع التحية')<br>
{{ config('app.name') }}
-->
@endif
</p>
{{-- Subcopy --}}
@isset($actionText)
@slot('subcopy')
@lang(
    "If you’re having trouble clicking the \":actionText\" button, copy and paste the URL below\n".
    'into your web browser: [:actionURL](:actionURL)',
    [
        'actionText' => $actionText,
        'actionURL' => $actionUrl,
    ]
)
@endslot
@endisset
@endcomponent
