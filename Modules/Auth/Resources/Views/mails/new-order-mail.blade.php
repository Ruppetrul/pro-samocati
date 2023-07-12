@component('mail::message')
# У вас новый заказ на {{ config('app.name') }}
Скорее обработайте его!

Thanks,<br>
{{ config('app.name') }}
@endcomponent
