@component('mail::message')
# Hi {{$adminName}},
# Welcome in  Dimax Company

Regarding to your request, password has been reset.

@component('mail::panel')
    # Your New Password is:<br>
    {{$newPassword}}
@endcomponent

@component('mail::button', ['url' => ''])
    Dimax Company
@endcomponent

Thanks,<br>
# {{ config('app.name') }}
@endcomponent
