
    # Introduction

    The body of your message.
    Email: {{$user->email}}<br>
    Code: {{$code}}

    <a href="{{ config('app.url') }}/blog/activation/{{$code}}">Activate your code</a>


    Thanks,<br>
    {{ config('app.name') }}

