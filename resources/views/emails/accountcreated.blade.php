@component('mail::message')
# Welcome to the Family!

Hello, {{ $employee->FirstName . ' ' . $employee->LastName}}.

We would like to welcome you to our Online Employee Portal. Our administrator has created your personal account.<br>
Click on the button below to log in. <br>

Your Username: {{ $user->Username }}
Your Password is your [Lastname] + [Firstname], all in lower case.<br>

<strong>REMINDER:</strong> In your first login, you need to change your password. 


@component('mail::button', ['url' => 'http://127.0.0.1:8000/employee_portal'])
Log In Here
@endcomponent

Thanks,<br>
{{ config('app.name') }} Team
@endcomponent
