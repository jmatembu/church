@component('mail::message')
# Feedback

{{ $details['name'] }} ({{ $details['email'] }}) wrote:

{{ $details['body'] }}

<br>
<br>
======================================================

Thanks,<br>
{{ config('app.name') }}
@endcomponent
