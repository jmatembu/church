@component('mail::message')
# Message from {{ $details['name'] }}

{{ $details['name'] }} wrote:

{{ $details['body'] }}

<br>
<br>
@endcomponent
