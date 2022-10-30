<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Xipearte')
<img src="{{ asset('assets/logo.jpeg') }}" class="logo" alt="Xipearte">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
