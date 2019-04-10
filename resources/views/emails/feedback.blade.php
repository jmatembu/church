@component('mail::message')
# Feedback

{{ $details['name'] }} ({{ $details['feedback_email'] }}) wrote:

{{ $details['body'] }}

<br>
<br>
======================================================

Thanks,<br>
{{ config('app.name') }}
@endcomponent
