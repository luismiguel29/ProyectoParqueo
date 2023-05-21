@component('mail::message')
{{$mensaje -> Descripcion}}


Thanks,<br>
{{ config('app.name') }}
@endcomponent