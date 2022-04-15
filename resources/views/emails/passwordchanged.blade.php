@component('mail::message')
# Employee Account Updated

Hello, {{ auth()->user()->FirstName }}.
<p>You have successfully changed your password on {{ config('app.name') }}. If you did not make this change, please contact the Adminitrator immediately</p>
<p>Have a nice day!</p>

Thanks,<br>
{{ config('app.name') }} Team
@endcomponent
