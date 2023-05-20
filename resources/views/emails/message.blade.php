@component('mail::message')
# Introduction

The body of your message.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

@component('mail::message')
“Hola, Elva. Hemos confirmado que el pago de la factura(XXX) con vencimiento(fecha) aun no se ha efectuado. 
Es necesario que realices el pago lo antes posibles. 
Si tienes dudas al respecto, por favor entra en contacto con nuestra área contable por (canal de contacto)”. 

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent