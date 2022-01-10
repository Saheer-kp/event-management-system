@component('mail::message')
# Hi {{ $user->full_name }}

We are invite you to following event.

<strong>Event Details</strong> <br>
Name : {{ $event->name }} <br>
Start Date : {{ Carbon\Carbon::parse($event->start_date)->format('F d, Y') }} <br>
End Date : {{ Carbon\Carbon::parse($event->end_date)->format('F d, Y') }}


Regards,<br>
Team {{ config('app.name') }}
@endcomponent
