@component('mail::message')
# Hey Admin

- {{$msg->email}}

@component('mail::panel')
{{$msg->description}}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
