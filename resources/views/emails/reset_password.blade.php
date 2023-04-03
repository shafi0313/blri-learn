@component('mail::message')
    Click the Reset Password button to set a new password.

    @component('mail::button', ['url' => route('resetPassword', ['token' => $forgetData->token])])
        Reset Password
    @endcomponent

    
    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
