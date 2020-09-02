@component('mail::message')
# Welcome to MilesGram

Hi,<br>
Welcome to MilesGram

@component('mail::button', ['url' => ''])
Click Here
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
